<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact_us extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index()
	{
		$res['contact_bit']=1;
		  $res['page_data'] = $this->General_model->select_where('*','pages',array('page_id'=>6));
		$res['page_below_title']=$this->lang->line('contact_title');
		$res['page_title']=$this->lang->line('footer_contact_us');
		
		$data['met_des'] 		= 	$this->lang->line('contact_met_des');
			$data['met_key'] 		= 	$this->lang->line('contact_met_key');
			$data['title'] 		= 	$this->lang->line('contact_title');
		
		
		$data['content']    = $this->load->view ('frontend/contact_us/contact_us_view',$res,true);
		$this->load->view('frontend/home/main_template',$data);
	 }
	 function contact()
	{
		$this->form_validation->set_rules('cont_name', $this->lang->line('name'), 'required');
		$this->form_validation->set_rules('cont_email',$this->lang->line('email'), 'required|valid_email');
		$this->form_validation->set_rules('cont_text', $this->lang->line('text'), 'required');
		
		
		if ($this->form_validation->run())  
		 {
		 	$data_a['cont_name']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('cont_name'));
			$data_a['cont_email']           = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('cont_email'));
		   $data_a['cont_text']         = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('cont_text'));
			
			$data_a['dateadded']      = time();
			$last_insert_id                       = $this->General_model->insert_info('contact_us',$data_a);
			
			
			$this->contact_us_mail($data_a['cont_name'] ,$data_a['cont_email'],$data_a['cont_text']);
			$this->session->set_flashdata('msg',$this->lang->line('success_contact'));
			$data = array(
                    'log_error' => 'no'
					 
            );
		}
		else
		{
			
		$data = array(
                    'log_error' => validation_errors()
            );
		
		}
		//print_r($data);
		 echo json_encode($data);
	}
	
	function contact_us_mail($name,$email,$message)
	{
			$template 			= $this->General_model->select_where('email_id,email_subject,email_from_name,from_email,email_content','email_template',array('email_id'=>1));
			$em                 =settings('settings_site_email');
			$template_result	= $template->row_array();
	      
			
			$message		    = $message;
			$find 	            = array("{details}");
			$replace            = array($message);
			$new_mess           = str_replace($find,$replace,$message);
			/*$this->phpmailer->AddAddress($template_result['from_email']); 
			//$this->phpmailer->AddCC("contact@audiowaxers.com", "Contact Us");
			$this->phpmailer->IsMail();  
			$this->phpmailer->From     = $email;
			$this->phpmailer->FromName = $name; 
			$this->phpmailer->IsHTML(true);                                  
			$this->phpmailer->Subject  =  $template_result['email_subject'];
			$this->phpmailer->Body     =  $new_mess;
			$this->phpmailer->Send();*/
			
			$url = 'https://api.sendgrid.com/';
				
				
				$post_data = array(
				 "api_user" => $this->config->item('api_user'),
				 "api_key" => $this->config->item('api_key'),
				 "to" => $template_result['from_email'],
				 "toname" => $name,
				 "subject" => $template_result['email_subject'],
				 "html" =>  $new_mess,
				 "from" => $email,
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
?>