<?php

class Newsletters extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	function index() {

		$data['class']	= 'newsletter';
		$data['title']  = 'Manage Newsletters';	
		
		$res = $this->common_model->select_all_order_by('*', 'newsletters','nl_id','DESC');
		
		if ($res->num_rows() > 0) {
			
			$result['newsletters']	=	$res->result_array();	
		}
		else {
			
			$result['newsletters']	=	'';	
		}
		
		$result['table_title'] = "Manage Newsletters";
		
		$data['content'] = $this->load->view('admin/newsletters/newsletter_listing', $result, true);
		$this->load->view('admin/template',$data);
	}
	
	function add_newsletter(){
		
		$data['class']	= 'newsletter';
		$data['title']	= 'Add Newsletter';		
		
		$this->form_validation->set_rules('nl_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('nl_body', 'Body', 'trim|required');
		$this->form_validation->set_rules('nl_month', 'Month', 'trim|required');
		$this->form_validation->set_rules('nl_email', 'Email', 'trim|required|valid_email|callback_check_email');

        	if ($this->form_validation->run() === false) {
				
				$result['table_title'] = "Add Newsletter";
				
				$data['content'] = $this->load->view('admin/newsletters/add_newsletter',$result,true);
				$this->load->view('admin/template',$data);
				
			} else { 
				
				$insert['nl_title'] 	= $this->input->post("nl_title");
				$insert['nl_body'] 		= $this->input->post("nl_body");
				$insert['nl_month'] 	= $this->input->post("nl_month");
				$insert['nl_email'] 	= $this->input->post("nl_email");
				
				$this->common_model->insert_array('newsletters' , $insert);
				
				$this->session->set_flashdata('success_msg', "Newsletter has been added successfully.");
				redirect(base_url() . 'admin/newsletters');	
				
			}
		
		}
		
		function check_email(){		
		
			$nl_email = $this->input->post("nl_email");
			$res = $this->common_model->select_where("nl_email" , "newsletters" , array("nl_email" => $nl_email));
			
			if($res->num_rows() > 0){
				 $this->form_validation->set_message('check_email', 'This Email has already been registered with us');
				 return false;
			} else {
				 return true;	
			}
		}	

	function update_newsletter($nl_id = "") { 
		
		$this->form_validation->set_rules('nl_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('nl_body', 'Body', 'trim|required');
		$this->form_validation->set_rules('nl_month', 'Month', 'trim|required');
		$this->form_validation->set_rules('nl_email', 'Email', 'trim|required|valid_email|callback_check_email_exist');

		if ($this->form_validation->run() === false) {

			$data['class']	= 'newsletter';
			$data['title']	= 'Update Newsletter';
			
			$res = $this->common_model->select_where('*', 'newsletters', array('nl_id' => $nl_id));
			
			
			if($res->num_rows() > 0){
				$result['newsletter'] = $res->row_array();
			}
			
			
			$result['table_title'] = "Update Newsletter";
			
			$data['content'] = $this->load->view('admin/newsletters/update_newsletter',$result,true);
			$this->load->view('admin/template',$data);
		} else {
			
			$update['nl_title'] 	= $this->input->post("nl_title");
			$update['nl_body'] 		= $this->input->post("nl_body");
			$update['nl_month'] 	= $this->input->post("nl_month");
			$update['nl_email'] 	= $this->input->post("nl_email");
		
			$result['page'] = $this->common_model->update_array(array('nl_id' => $nl_id), 'newsletters', $update);		
			$this->session->set_flashdata('update_success_msg', "The Newsletter has been updated successfully");
			redirect (base_url().'admin/newsletters');
			
		}		

	}
	
	function check_email_exist(){ 

		$nl_email = $this->input->post("nl_email");
		
		$nl_email_old = $this->input->post("nl_email_old");

		if($nl_email == $nl_email_old){
		
			return true;
		} 
		else {     
			$res = $this->common_model->select_where("*" , "newsletters" , array("nl_email" => $nl_email));

			if($res->num_rows() > 0){
				$this->form_validation->set_message('check_email_exist', 'Sorry! This email has already been registered with us');
				return false;
			} 

			else {
				return true; 
			}
		}

	}
	
	function delete_newsletter($nl_id = ""){
		
		$this->common_model->delete_where(array('nl_id' => $nl_id), 'newsletters');
		
		$this->session->set_flashdata('delete_msg', "The Newsletter has been deleted successfully");
		redirect (base_url().'admin/newsletters');
		
	}
	
	function select_subscribers($nl_id = ""){
		
		$data['class']	= 'newsletter';
		$data['title']	= 'Select Subscribers';
		
		$res = $this->common_model->select_all_order_by('*', 'subscribers','sub_id','DESC');
		
		$result['subscribers']	=	$res->result_array();
		
		
		$result['table_title'] = "Select Subscribers";
		$result['newsletter_id'] = $nl_id;
				
		$data['content'] = $this->load->view('admin/newsletters/subscriber_listing',$result,true);
		$this->load->view('admin/template',$data);
		
		
	}
	
	function send_newsletter(){
		
		$sub_id = $this->input->post('sub_id');
		
		$nl_id = $this->input->post('nl_id');
		
		
		
		$res_news = $this->common_model->select_where('*' , 'newsletters' , array('nl_id' => $nl_id));
		
		if($res_news->num_rows() > 0){
			$resu_news = $res_news->row();
			
			$title = $resu_news->nl_title;
			$body = $resu_news->nl_body;
			
		} else { redirect(base_url()); }
		
		
		$settings = get_settings();
		
		
		$from_email = $settings['settings_site_email'];
		$from_name = $settings['settings_site_name'];
		
		
		
		
		for($i=0; $i<count($sub_id); $i++){
	
			/*$this->phpmailer->AddAddress($sub_id[$i]);
			$this->phpmailer->IsMail();
			$this->phpmailer->From = $from_email;
			$this->phpmailer->FromName = $from_name;
			$this->phpmailer->IsHTML(true);
			$this->phpmailer->Subject = $title;
			$this->phpmailer->Body = $body;
			$this->phpmailer->Send();
			$this->phpmailer->ClearAddresses();*/
			
			/*$json = '{
      "content": {
      "from": "'.$from_email.'",
      "subject": "'.$title.'",
      "html": "'.$body.'"
      },
      "recipients": [{ "address": "'.$sub_id[$i].'" }]
     }';
	 
	  send_email($json);*/
	  $url = 'https://api.sendgrid.com/';
				
				
					$post_data = array(
					 "api_user" => $this->config->item('api_user'),
					 "api_key" => $this->config->item('api_key'),
					 "to" => $email,
					 "subject" => $title,
					 "html" => $body,
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
			
			
		
		}
		
		$this->session->set_flashdata('email_success_msg', "Newsletter has been sent successfully.");
		redirect(base_url() . 'admin/newsletters');
		
	}
	
}