<?php 
class Login extends CI_Controller
{
	function __construct(){ 
		parent::__construct();
		
	}
	
	
	function index(){	
		
		$data['class']	= 'login';
		$data['title']  =  'Login';	
		
		$this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('admin_password', 'Password', 'trim|required');

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('login_error_message', validation_errors());					
			
			$this->load->view('admin/admin_login/login',$data);		
		} else {
		
			$user_email 	= $this->input->post("admin_email");
			$user_passsword = $this->input->post("admin_password");
			
			
			$login_res = $this->common_model->select_where("*" , "admin" , array("admin_email" => $user_email , "admin_password" => md5($user_passsword)));
			
			if($login_res->num_rows() > 0){
				$login_resu = $login_res->row();
				
				$user_id = $login_resu->admin_id;
				$admin_name = $login_resu->admin_name;
				$super_admin = $login_resu->super_admin;
				$admin_avatar = $login_resu->admin_avatar;
				
				
				$this->session->set_userdata("admin_email" , $user_email);
				$this->session->set_userdata("admin_id" , $user_id);
				$this->session->set_userdata("admin_name" , $admin_name);
				$this->session->set_userdata("super_admin" , $super_admin);
				$this->session->set_userdata("admin_avatar" , $admin_avatar);
				
				
				if($this->input->post('remember_me') == '1'){
					setcookie("cook_name_user", $user_email, time()+60*60*24*100, "/");
					setcookie("cook_pass_user", $user_passsword, time()+60*60*24*100, "/");
				}
				
				$this->session->set_flashdata('admin_success_msg', "You are successfully Logged In as Admin");
				
				redirect(base_url().'admin/dashboard' , 'refresh');
				
									
			} else {
				
				$this->session->set_flashdata('error_msg', "Your email or password is incorrect");
				redirect($_SERVER['HTTP_REFERER']);
			}				
		}			
	}
	
	function generate_password($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }	
	
	function forget_password(){
		
		$data['class']	= 'forget_password';
		$data['title']  =  'Forget Password';	
		
		$this->form_validation->set_rules('user_email', 'email', 'trim|required|valid_email');

    	if ($this->form_validation->run() === false) {
			
			$this->session->set_flashdata('forget_error_message', validation_errors());	
			
			$this->load->view('admin/admin_login/recover_password', $data);
									
			
		} else {
					
				$email = $this->input->post("user_email");
				
				$res = $this->common_model->select_where("*" , "admin" , array("admin_email" => $email));
				
				if($res->num_rows() > 0){
					$resu = $res->row();
					
					$username = $resu->admin_name;
					$password = $this->generate_password(8);
					
					
					$update['admin_password'] = md5($password);
					$this->common_model->update_array(array("admin_email" => $email) , "admin" , $update);
					
					
					
					$email_res = $this->common_model->select_where('*', 'email_template', array('email_id' => 3));
					$email_temp = $email_res->row();
					
					$content = $email_temp->email_content;
					
					$email_from = $email_temp->from_email;
					$email_subject = $email_temp->email_subject;
					$email_name = $email_temp->email_from_name;
					
					
					$updated 		= 	str_replace('{user_name}',$username,$content);
					$updated1 		= 	str_replace('{email}',$email,$updated);
					$final_content  = 	str_replace('{password}',$password,$updated1);
	
	
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
					//echo $json;exit;
					send_email($json);*/
					
					
					// sendgrid email starts
     
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
					//var_dump($response,curl_error($session),curl_getinfo($session));exit;
					curl_close($session); 
					 
					 //sendgrid email ends
					
					
					
					$this->session->set_flashdata('success_msg', "Your login details has been sent to your email address.");
					redirect(base_url() . "admin/login");
					
				
				} else {
					$this->session->set_flashdata('error_message', "Sorry! this email is not registered with us.");
					redirect($_SERVER['HTTP_REFERER']);
				}
					
					
						
			}
		
		}
	
	function logout(){
		$this->session->unset_userdata("admin_email" , "");
		$this->session->unset_userdata("admin_id" , "");
		$this->session->unset_userdata("admin_name" , "");
		
		setcookie("cook_name_user", "" , time()-60*60*24*100, "/");
		setcookie("cook_pass_user", "" , time()-60*60*24*100, "/");
		
		$this->session->set_flashdata('success_msg', "Your are successfully logged out.");
		redirect(base_url() . "admin/login");
								
	}		

	function change_password(){
		
		varify_admin_user();
		
		$data['class']	= 'change_password';
		$data['title']  =  'Change Password';	
		
		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required|callback_check_password');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm New Password', 'trim|required');

        	if ($this->form_validation->run() === false) {
				
				$data['content'] = $this->load->view('admin/admin_login/change_password','',true);
				$this->load->view('admin/template',$data);	
				
			} else {
				
				$admin_id = $this->session->userdata("admin_id");
				
					$res_chk = $this->common_model->select_where('admin_password' , 'admin' , array('admin_id' => $admin_id));
				if($res_chk->num_rows() > 0){
					$resu_chk = $res_chk->row_array();
					if($resu_chk['admin_password'] == md5($this->input->post("current_password"))){
						$current_pwd = $this->input->post("current_password");
						$new_pwd = $this->input->post("new_password");
						$confirm_new_pwd = $this->input->post("confirm_password");
						
						$update['admin_password'] = md5($new_pwd);
						
						$this->common_model->update_array(array("admin_id" => $admin_id) , "admin" , $update);
						
						$this->session->set_flashdata('success_msg', "your password has been reset successfully.");
						redirect(base_url() . 'admin/login/change_password');
					} else {
						
						$this->session->set_flashdata('error_msg', "your current password is Invalid.");
						redirect(base_url() . 'admin/login/change_password');
					}
				}
				
				
				
				
			}
		
		}
	
	function check_password(){		
	
		 $admin_id = $this->session->userdata("admin_id");
		 $current_password = $this->input->post("current_password");
		
		 $res = $this->common_model->select_where("*" , "admin" , array("admin_id" => $admin_id , "admin_password" => md5($current_password)));
		
		if($res->num_rows() == 0){
			 $this->form_validation->set_message('check_password', "Your current password is not valid.");
        	 return false;
		} else {
			 return true;	
		}
	}
	
}
?>
