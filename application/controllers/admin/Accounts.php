<?php

class Accounts extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	function index() { 

		$data['class']	= 'account';
		$data['title']  = 'Manage Accounts';
		
		$res = $res = $this->db->query("SELECT * FROM admin ORDER BY admin_id DESC");
		
		
		if ($res->num_rows() > 0) {
			$result['accounts']	=	$res->result_array();
		}
		else {
			$result['accounts']	=	'';
		}
	
		$result['table_title'] = "Manage Accounts";
	
		$data['content'] = $this->load->view('admin/accounts/admin_accounts', $result, true);
		$this->load->view('admin/template',$data);
	}

	function add_account(){
		
		$data['class']	= 'account';
		$data['title']	= 'Add Account';
		
		$result['table_title'] = "Add Account";
		
		$this->form_validation->set_rules('admin_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email|callback_check_email');
		$this->form_validation->set_rules('admin_password', 'Password', 'trim|required');

        	if ($this->form_validation->run() === false) {
				
				$data['content'] = $this->load->view('admin/accounts/add_accounts',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				
				$username = $this->input->post("admin_name");
				$email = $this->input->post("admin_email");
				$password = $this->input->post("admin_password");
				
				
				$insert['admin_name'] 		= $this->input->post("admin_name");
				$insert['admin_email']		= $this->input->post("admin_email");
				$insert['admin_password'] 	= md5($this->input->post("admin_password"));
				
				$this->common_model->insert_array('admin' , $insert);
				
				
				
					$email_res = $this->common_model->select_where('*', 'email_template', array('email_id' => 5));
					$email_temp = $email_res->row();
					
					$content = $email_temp->email_content;
					
					$email_from = $email_temp->from_email;
					$email_subject = $email_temp->email_subject;
					$email_name = $email_temp->email_from_name;
					
					$link = base_url().'admin/login';
					
					
					$updated 		= 	str_replace('user_name',$username,$content);
					$updated1 		= 	str_replace('user_email',$email,$updated);
					$updated2  		= 	str_replace('user_password',$password,$updated1);
					$final_content	= 	str_replace('{link}',$link,$updated2);
	
	
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
				
				
				$this->session->set_flashdata('admin_success_msg', "New Admin Account has been added successfully.");
				redirect(base_url() . 'admin/accounts');	
				
			}
		
		}
		
		function check_email(){		
		
			$admin_email = $this->input->post("admin_email");
			$res = $this->common_model->select_where("admin_email" , "admin" , array("admin_email" => $admin_email));
			
			if($res->num_rows() > 0){
				 $this->form_validation->set_message('check_email', 'This Email has already been registered with us');
				 return false;
			} else {
				 return true;	
			}
		}	
		
	function update_account($admin_id = ""){
		
		$data['class']	= 'account';
		$data['title']	= 'Update Account';
		
		$result['table_title'] = "Update Account";
		
		$this->form_validation->set_rules('admin_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email|callback_check_email_exist');
		//$this->form_validation->set_rules('admin_password', 'Password', 'trim|required');

        	if ($this->form_validation->run() === false) {
				
				$res = $this->common_model->select_where("*" , "admin" , array('admin_id' => $admin_id));
				
				if($res->num_rows() > 0){
					$result['account'] = $res->row_array();	
				}
				
				$data['content'] = $this->load->view('admin/accounts/update_account',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {

				$insert['admin_name'] 		= $this->input->post("admin_name");
				$insert['admin_email'] 		= $this->input->post("admin_email");
				
				if($this->input->post("admin_password") != ""){
				
				$insert['admin_password'] 	= md5($this->input->post("admin_password"));
				
				}
								
				$this->common_model->update_array(array('admin_id' => $admin_id) , "admin" , $insert);  
				
				$this->session->set_flashdata('update_success_msg', "Account has been updated successfully.");
				redirect(base_url() . 'admin/accounts');	
				
			}
		
		}
		
		function check_email_exist(){ 

			$admin_email = $this->input->post("admin_email");
			
			$admin_old_email = $this->input->post("admin_old_email");
	
			if($admin_email == $admin_old_email){
			
				return true;
			} 
			else {     
				$res = $this->common_model->select_where("*" , "admin" , array("admin_email" => $admin_email));
	
				if($res->num_rows() > 0){
					$this->form_validation->set_message('check_email_exist', 'Sorry! This email has already been registered with us');
					return false;
				} 
	
				else {
					return true; 
				}
			}
	
		}


	function delete_account($admin_id = ""){
		
		$this->common_model->delete_where(array('admin_id' => $admin_id), 'admin');
		$this->session->set_flashdata('delete_account_msg', "Account has been deleted successfully.");
		redirect(base_url() . 'admin/accounts');
		
	}
}