<?php
class Notification extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'notification';
		$data['title']	= 'Send Notification Messages';
		
		$result['companies']  = $this->common_model->select_all_order_by("*" , "companies" , 'com_id' , 'DESC');
		
		$result['jobseekers']  = $this->common_model->select_all_order_by("*" , "jobseekers" , 'jos_id' , 'DESC');
				
		$result['table_title'] = "Send Notification Messages";		
		$data['content'] = $this->load->view('admin/notification/send_notification',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function send_notification(){
		
		$data['class']	= 'notification';
		$data['title']	= 'Send Notification Messages';
		
		$this->form_validation->set_rules('notification', 'notification', 'trim|required');
		if ($this->form_validation->run() === false) {
			$result['companies']  = $this->common_model->select_all_order_by("*" , "companies" , 'com_id' , 'DESC');
			$result['jobseekers']  = $this->common_model->select_all_order_by("*" , "jobseekers" , 'jos_id' , 'DESC');
			
			$result['table_title'] = "Send Notification Messages";
			$data['content'] = $this->load->view('admin/notification/send_notification',$result,true);
			$this->load->view('admin/template',$data);
		} else {
			$from_email = $this->common_model->select_single_field('settings_site_email','settings',array('settings_id'=>1));
			$notification = $this->input->post('notification');
			$companies_ids = $this->input->post('companies_id');
			$jobseekers_id = $this->input->post('jobseekers_id');
			
			if(!empty($companies_ids) || !empty($jobseekers_id)){
				if($companies_ids){
					for ($i = 0; $i < count($companies_ids); $i++) {
						$email = $companies_ids[$i];
						/*$this->phpmailer->AddAddress($email);
						$this->phpmailer->IsMail();
						$this->phpmailer->From = $from_email;
						$this->phpmailer->FromName = 'Notification';
						$this->phpmailer->IsHTML(true);
						$this->phpmailer->Subject = 'Notification Messages';
						$this->phpmailer->Body = $notification;
						$this->phpmailer->Send();
						$this->phpmailer->ClearAddresses();*/
						$url = 'https://api.sendgrid.com/';
				
				
						$post_data = array(
						 "api_user" => $this->config->item('api_user'),
						 "api_key" => $this->config->item('api_key'),
						 "to" => $email,
						 "toname" => 'Notification',
						 "subject" => 'Notification Messages',
						 "html" => $notification,
						 "from" => $from_email,
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
						
					}
				}
				if($jobseekers_id){
					for ($i = 0; $i < count($jobseekers_id); $i++) {
						$email = $jobseekers_id[$i];
						/*$this->phpmailer->AddAddress($email);
						$this->phpmailer->IsMail();
						$this->phpmailer->From = $from_email;
						$this->phpmailer->FromName = 'Notification';
						$this->phpmailer->IsHTML(true);
						$this->phpmailer->Subject = 'Notification Messages';
						$this->phpmailer->Body = $notification;
						$this->phpmailer->Send();
						$this->phpmailer->ClearAddresses();*/
						$url = 'https://api.sendgrid.com/';
				
				
						$post_data = array(
						 "api_user" => $this->config->item('api_user'),
						 "api_key" => $this->config->item('api_key'),
						 "to" => $email,
						 "toname" => 'Notification',
						 "subject" => 'Notification Messages',
						 "html" => $notification,
						 "from" => $from_email,
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
					}
				}
				$this->session->set_flashdata('success_msg', "Notification Messages has been send successfully.");
				redirect(base_url().'admin/notification');
			}else{
				$this->session->set_flashdata('error_msg', "Please select any company or jobseekers.");
				redirect(base_url().'admin/notification');
			}
		}
	}	
	
}
?>
