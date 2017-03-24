<?php
class Jobseeker extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	
	function index(){	
			
		$data['class']	= 'users';
		$data['title']	= 'Manage Users';
		
		$result['jobseeker']  = $this->common_model->select_all_order_by("*" , "jobseekers" , 'jos_id' , 'DESC');
				
		$result['table_title'] = "Users / Candidates";		
				
		$data['content'] = $this->load->view('admin/jobseeker/jobseeker_listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
		
	function change_user_status($status = "" , $user_id = ""){
		
		$update['status_id'] = $status;
		
		$res = $this->common_model->update_array(array("jos_id" => $user_id) , "jobseekers" , $update);
	
	
			if($status==1){
		$this->send_activation_email($user_id);
		}else{
			$this->session->set_flashdata('success_msg', "User status has been updated successfully.");
			}
		
		redirect(base_url().'admin/jobseeker');
		}		
	
	function detail($jos_id = ""){
		
		$data['class']	= 'users';
		$data['title']	= 'Manage Users';
		
		$this->form_validation->set_rules('js_username', 'js_username', 'trim|required');
		$this->form_validation->set_rules('js_name', 'js_name', 'trim|required');
		$this->form_validation->set_rules('js_grad_year', 'js_grad_year', 'trim|required|Integer');
		$this->form_validation->set_rules('js_address', 'js_address', 'trim|required');
		$this->form_validation->set_rules('js_phone', 'js_phone', 'trim|required|Integer|min_length[10]');
		$this->form_validation->set_rules('js_overview', 'js_overview', 'trim|required');
		$this->form_validation->set_rules('js_social_urls', 'js_social_urls', 'trim|required');

        	if ($this->form_validation->run() === false) {
				
				$result['countries'] = $this->common_model->select_all("*" , "countries");
				
				$result['universities'] = $this->common_model->select_all("*" , "universties");
				
				$res_jos = $this->common_model->select_where('*' , 'jobseekers' , array('jos_id' => $jos_id));
				if($res_jos->num_rows() > 0){
					$result['user_info']	 = $res_jos->row_array();
				}
				
				$data['content'] = $this->load->view('admin/jobseeker/jobseeker_detail',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				$update['jos_username'] = $this->input->post('js_username');
				$update['name'] = $this->input->post('js_name');
				$update['graduation_year'] = $this->input->post('js_grad_year');
				$update['address'] = $this->input->post('js_address');
				$update['phone'] = $this->input->post('js_phone');
				$update['overview_objective'] = $this->input->post('js_overview');
				$update['social_media_url1'] = $this->input->post('js_social_urls');
				$update['country_id'] = $this->input->post('js_country');
				$update['univ_id'] = $this->input->post('js_university');
		
				$res = $this->common_model->update_array(array("jos_id" => $jos_id) , "jobseekers" , $update);
				$this->session->set_flashdata('success_msg', "User account has been updated successfully.");
				redirect(base_url().'admin/jobseeker');
				
				
			}
		
	}
	
	function send_activation_email($jos_id){
		
		
		
		
	
			
			$template 			= $this->General_model->select_where('email_id,email_subject,email_from_name,from_email,email_content','email_template',array('email_id'=>31));
			$template_result	= $template->row_array();
			
			
				
			$user_info=$this->General_model->select_where('jos_id,jos_username,jos_password,jos_email','jobseekers',array('jos_id'=>$jos_id));
	       if($user_info->num_rows()>0){
			   $u=$user_info->row();
		   }
			/*
			$this->phpmailer->AddAddress($email);
					$this->phpmailer->IsMail();
					$this->phpmailer->From = $email_from;
					$this->phpmailer->FromName = $email_name;
					$this->phpmailer->IsHTML(true);
					$this->phpmailer->Subject = $email_s;
					$this->phpmailer->Send();ubject;
					$this->phpmailer->Body = $final_content
					$this->phpmailer->ClearAddresses();*/
					
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
			"to" => $u->jos_email,
			"toname" => $u->jos_username,
			"subject" => $template_result['email_subject'],
			"html" =>  $template_result['email_content'],
			"from" => $template_result['from_email'],
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
					
			$this->session->set_flashdata('email_msg', " Status Update and Email has been sent successfully.");
			redirect(base_url().'admin/jobseeker');
			
	
	
		}
	function send_email($jos_id){
		
		
		
		$data['class']	= 'send_email';
		$data['title']	= 'Send Email';
		$result['table_title']	=	'Send Email';
		//$result['jos_id']	=	$jos_id;
		
		//$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		

		if ($this->form_validation->run() === false) {
			
			$data['content'] = $this->load->view('admin/jobseeker/send_mail', $result,true);
			$this->load->view('admin/template',$data);
			
		} else {
			
			//$title = $this->input->post('title');
			$subject = $this->input->post('subject');
			$message = $this->input->post('description');
			
			$email  = $this->common_model->select_where("*" , "jobseekers" , array('jos_id'=>$jos_id))->row();
			$from_email = $this->common_model->select_single_field('settings_site_email','settings',array('settings_id'=>1));
				
			
			/*
			$this->phpmailer->AddAddress($email);
					$this->phpmailer->IsMail();
					$this->phpmailer->From = $email_from;
					$this->phpmailer->FromName = $email_name;
					$this->phpmailer->IsHTML(true);
					$this->phpmailer->Subject = $email_s;
					$this->phpmailer->Send();ubject;
					$this->phpmailer->Body = $final_content
					$this->phpmailer->ClearAddresses();*/
					
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
			"to" => $email->jos_email,
			"toname" => $email->jos_username,
			"subject" => $subject,
			"html" =>  $message,
			"from" => $from_email,
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
					
			$this->session->set_flashdata('email_msg', "Email has been sent successfully.");
			redirect(base_url().'admin/jobseeker');
			
			
		}
		
	
	}
			
}
?>
