<?php
class Companies extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	
	function index(){	
			
		$data['class']	= 'companies';
		$data['title']	= 'Manage Companies';
		
		$result['orders']  = $this->common_model->select_all_order_by("*" , "companies" , 'com_id' , 'DESC');
				
		$result['table_title'] = "Companies";		
				
		$data['content'] = $this->load->view('admin/company/company_listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
		
	function change_company_status($company_id = "" , $status = ""){
		
		$update['status_id'] = $status;
		
		$res = $this->common_model->update_array(array("com_id" => $company_id) , "companies" , $update);
		
		
					$email_res = $this->common_model->select_where('*', 'email_template', array('email_id' => 7));
					$email_temp = $email_res->row();
					
					$content = $email_temp->email_content;
					
					$email_from = $email_temp->from_email;
					$email_subject = $email_temp->email_subject;
					$email_name = $email_temp->email_from_name;
					
					$link = base_url().'admin/login';
					
					$res_com = $this->common_model->select_where('com_user_fullname , com_name , com_user_email' , 'companies' , array('com_id' => $company_id));
					$resu_com = $res_com->row();
					
					
					$username =  $resu_com->com_user_fullname;
					$company_name = $resu_com->com_name;
					$email = $resu_com->com_user_email;
					
					if($status == 0){
						$email_status = "Inactive";
					} else {
						$email_status = "Active";
					}
					
					
					
					
					
					$updated 		= 	str_replace('user_name',$username,$content);
					$updated1 		= 	str_replace('{company_name}',$company_name,$updated);
					$final_content	= 	str_replace('{status}',$email_status,$updated1);
	
	
					/*$this->phpmailer->AddAddress($email);
					$this->phpmailer->IsMail();
					$this->phpmailer->From = $email_from;
					$this->phpmailer->FromName = $email_name;
					$this->phpmailer->IsHTML(true);
					$this->phpmailer->Subject = $email_subject;
					$this->phpmailer->Body = $final_content;
					$this->phpmailer->Send();
					$this->phpmailer->ClearAddresses();*/
					
					  /*$json = '{
      "content": {
      "from": "'.$email_from.'",
      "subject": "'.$email_subject.'",
      "html": "'.$final_content.'"
      },
      "recipients": [{ "address": "'.$email.'" }]
     }';
     
     send_email($json);*/
	 
	 $url = 'https://api.sendgrid.com/';
				
				
					$post_data = array(
					 "api_user" => $this->config->item('api_user'),
					 "api_key" => $this->config->item('api_key'),
					 "to" => $email,
					 "toname" => $email_name,
					 "subject" => $email_subject,
					 "html" => $final_content,
					 "from" => $email_from,
								); 
				
					$request =  $url.'api/mail.send.json';
					
					// Generate curl request
					$session = curl_init($request);
					// Tell curl to use HTTP POST
					curl_setopt ($session, CURLOPT_POST, true);
					// Tell curl that this is the body of the POST
					curl_setopt ($session, CURLOPT_POSTFIELDS, $post_data);
					// Tell curl not to return headers, but do return the response
					curl_setopt($session, CURLOPT_HEADER, false);
					// Tell PHP not to use SSLv3 (instead opting for TLS)
					//curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
					
					//Turn off SSL
					curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
					curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line
					
					curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
					
					// obtain response
					$response = curl_exec($session);
					
					// print everything out
					//var_dump($response,curl_error($session),curl_getinfo($session));
					curl_close($session); 
		
		
		
		
		
		
		$this->session->set_flashdata('success_msg', "Company status has been updated successfully.");
		redirect(base_url().'admin/companies');
	}
	
	function add_company(){
		
		$data['class']	= 'companies';
		$data['title']	= 'Add Companies';
		
		$this->form_validation->set_rules('com_user_name', 'com_user_name', 'trim|required');
		$this->form_validation->set_rules('com_user_email', 'com_user_email', 'trim|required|valid_email');
		$this->form_validation->set_rules('com_user_pwd', 'com_user_pwd', 'trim|required');
		$this->form_validation->set_rules('com_name', 'com_name', 'trim|required');
		$this->form_validation->set_rules('com_phone', 'com_phone', 'trim|required|Integer');
		$this->form_validation->set_rules('com_email', 'com_email', 'trim|required|valid_email|callback_check_email');
		$this->form_validation->set_rules('com_website', 'com_website', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');

        	if ($this->form_validation->run() === false) {
				
				$result['pricing_plan'] = $this->common_model->select_all("*" , "pricing_plan"); 
				
 				$data['content'] = $this->load->view('admin/company/add_company',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				$insert['com_user_fullname'] = $this->input->post('com_user_name');
				$insert['com_user_email'] = $this->input->post('com_user_email');
				$insert['com_user_password'] = md5($this->input->post('com_user_pwd'));
				$insert['com_name'] = $this->input->post('com_name');
				$insert['com_phone_number'] = $this->input->post('com_phone');
				$insert['com_email'] = $this->input->post('com_email');
				$insert['com_website'] = $this->input->post('com_website');
				$insert['short_description'] = $this->input->post('description');
				$insert['price_package_id'] = $this->input->post('package');
				$insert['dateadded'] = time();
				
				if($_FILES['image']['name']!='') {
				  $fname=time().'_'.basename($_FILES['image']['name']);
				  $fname = str_replace(" ","_",$fname);
				  $fname = str_replace("%","_",$fname);
				  //$name_ext = end(explode(".", basename($_FILES['image']['name'])));
				  
				   $tmp = explode('.', basename($_FILES['image']['name']));
				  $name_ext = end($tmp);
				  
				  
				  $name = str_replace('.'.$name_ext,'',basename($_FILES['image']['name']));
				  $uploaddir = PATH_DIR.'uploads/company_logo/';
				  $uploadfile = $uploaddir.$fname;
				  if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
						$source_image_path = PATH_DIR.'uploads/company_logo/';
						$source_image_name = $fname;
						$insert['com_logo']   = $fname;
				  }
				}
				
				
		
				$res = $this->common_model->insert_array("companies" , $insert);
				
				
				
					$email_res = $this->common_model->select_where('*', 'email_template', array('email_id' => 6));
					$email_temp = $email_res->row();
					
					$content = $email_temp->email_content;
					
					$email_from = $email_temp->from_email;
					$email_subject = $email_temp->email_subject;
					$email_name = $email_temp->email_from_name;
					
					$link = base_url().'admin/login';
					
					
					$username = $this->input->post("com_user_name");
					$email = $this->input->post("com_user_email");
					$password = $this->input->post("com_user_pwd");
					$company_name = $this->input->post("com_name");
					
					
					
					
					$updated 		= 	str_replace('user_name',$username,$content);
					$updated1 		= 	str_replace('user_email',$email,$updated);
					$updated2  		= 	str_replace('user_password',$password,$updated1);
					$final_content	= 	str_replace('company_name',$company_name,$updated2);
	
	
				/*	$this->phpmailer->AddAddress($email);
					$this->phpmailer->IsMail();
					$this->phpmailer->From = $email_from;
					$this->phpmailer->FromName = $email_name;
					$this->phpmailer->IsHTML(true);
					$this->phpmailer->Subject = $email_subject;
					$this->phpmailer->Body = $final_content;
					$this->phpmailer->Send();
					$this->phpmailer->ClearAddresses();*/
					
					  /*$json = '{
					  "content": {
					  "from": "'.$email_from.'",
					  "subject": "'.$email_subject.'",
					  "html": "'.$final_content.'"
					  },
					  "recipients": [{ "address": "'.$email.'" }]
					 }';
					 
					 send_email($json);*/
					 
					 $url = 'https://api.sendgrid.com/';
				
					$template_id = 'b65ebb3e-eada-4123-8afb-50c4c7b2e0ef';
$js = array(
  'sub' => array(':name' => array('Elmer')),
  'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => $template_id)))
);
echo json_encode($js);

					$post_data = array(
					 "api_user" => $this->config->item('api_user'),
					 "api_key" => $this->config->item('api_key'),
					 "to" => $email,
					 "toname" => $email_name,
					 "subject" => $email_subject,
					 "html" => $final_content,
					 "from" => $email_from,
					 'x-smtpapi' => json_encode($js),
								); 
				
					$request =  $url.'api/mail.send.json';
					
					// Generate curl request
					$session = curl_init($request);
					// Tell curl to use HTTP POST
					curl_setopt ($session, CURLOPT_POST, true);
					// Tell curl that this is the body of the POST
					curl_setopt ($session, CURLOPT_POSTFIELDS, $post_data);
					// Tell curl not to return headers, but do return the response
					curl_setopt($session, CURLOPT_HEADER, false);
					// Tell PHP not to use SSLv3 (instead opting for TLS)
					//curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
					
					//Turn off SSL
					curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
					curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line
					
					curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
					
					// obtain response
					$response = curl_exec($session);
					
					// print everything out
					//var_dump($response,curl_error($session),curl_getinfo($session));
					curl_close($session); 
				
				
				
				
				
				
				
				$this->session->set_flashdata('success_msg', "Company has been added successfully.");
				redirect(base_url().'admin/companies');
				
				
			}
		
	}
	
	function update_company($company_id = ""){
		
		$data['class']	= 'companies';
		$data['title']	= 'Edit Companies';
		
		$this->form_validation->set_rules('com_user_name', 'com_user_name', 'trim|required');
		$this->form_validation->set_rules('com_user_email', 'com_user_email', 'trim|required|valid_email');
		$this->form_validation->set_rules('com_name', 'com_name', 'trim|required');
		$this->form_validation->set_rules('com_phone', 'com_phone', 'trim|required|Integer');
		$this->form_validation->set_rules('com_email', 'com_email', 'trim|required|valid_email|callback_check_email_edit');
		$this->form_validation->set_rules('com_website', 'com_website', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');

        	if ($this->form_validation->run() === false) {
				
				$result['pricing_plan'] = $this->common_model->select_all("*" , "pricing_plan"); 
				
				$res_jos = $this->common_model->select_where('*' , 'companies' , array('com_id' => $company_id));
				if($res_jos->num_rows() > 0){
					$result['com_info']	 = $res_jos->row_array();
				}
				
				
 				$data['content'] = $this->load->view('admin/company/edit_company',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				$update['com_user_fullname'] = $this->input->post('com_user_name');
				$update['com_user_email'] = $this->input->post('com_user_email');
				
				if($this->input->post('com_user_pwd') != ""){
					$update['com_user_password'] = md5($this->input->post('com_user_pwd'));
				}
				
				$update['com_name'] = $this->input->post('com_name');
				$update['com_phone_number'] = $this->input->post('com_phone');
				$update['com_email'] = $this->input->post('com_email');
				$update['com_website'] = $this->input->post('com_website');
				$update['short_description'] = $this->input->post('description');
				$update['price_package_id'] = $this->input->post('package');
				$update['dateadded'] = time();
				
				if($_FILES['image']['name']!='') {
				  $fname=time().'_'.basename($_FILES['image']['name']);
				  $fname = str_replace(" ","_",$fname);
				  $fname = str_replace("%","_",$fname);
				//  $name_ext = end(explode(".", basename($_FILES['image']['name'])));
				  
				   $tmp = explode('.', basename($_FILES['image']['name']));
				  $name_ext = end($tmp);
				  
				  
				  $name = str_replace('.'.$name_ext,'',basename($_FILES['image']['name']));
				  $uploaddir = PATH_DIR.'uploads/company_logo/';
				  $uploadfile = $uploaddir.$fname;
				  if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
						$source_image_path = PATH_DIR.'uploads/company_logo/';
						$source_image_name = $fname;
						$update['com_logo']   = $fname;
				  }
				}
				
				
		
				$res = $this->common_model->update_array(array('com_id' => $company_id) , "companies" , $update);
				$this->session->set_flashdata('success_msg', "Company has been updated successfully.");
				redirect(base_url().'admin/companies');
				
				
			}
		
	}
	
	function check_email(){		
		$user_email = $this->input->post("com_email");
		$res = $this->common_model->select_where("com_email" , "companies" , array("com_email" => $user_email));
		
		if($res->num_rows() > 0){
			 $this->form_validation->set_message('check_email', "already registered");
        	 return false;
		} else {
			 return true;	
		}
	}	
	
	function check_email_edit(){		
		$user_email = $this->input->post("com_email");
		$user_email_db = $this->input->post("com_email_old");
		
		if($user_email == $user_email_db){
			 return true;
		} else {
		
			$res = $this->common_model->select_where("com_email" , "companies" , array("com_email" => $user_email));
			
			if($res->num_rows() > 0){
				 $this->form_validation->set_message('check_email_edit', "already registered");
				 return false;
			} else {
				 return true;	
			}
		}
	}	
	
	function packages($company_id = ""){
		
		$data['class']	= 'companies';
		$data['title']	= 'Manage Companies Packages';
		
		$result['price_plan']  = $this->common_model->select_all_order_by("*" , "pricing_plan" , 'pp_id' , 'DESC');
				
		$result['table_title'] = "Company Packages";
		$result['obj'] = $this;	
		$result['company_id'] = $company_id;	
				
		$data['content'] = $this->load->view('admin/company/company_packages',$result,true);
		$this->load->view('admin/template',$data);	
		
	}
	
	function get_count($company_id = "" , $package_id = ""){
		$res = $this->db->query("SELECT count(*) as total from orders WHERE com_id = $company_id AND price_package_id = $package_id");
		$resu = $res->row();
		return $resu->total;
	}
	
			
}
?>
