<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Job_applications extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	
			get_lang();
		$this->config->set_item('language', 'ar'); 
		
	}
	function index()
	{
varify_session_company();
	$com_id = get_info('company_info','com_id');

     
		
		$res['page_below_title']=$this->lang->line('a_above_page');
		$res['page_title']=$this->lang->line('a_above_mg_j');
           $res['ja_bitc']=1;
		   $data['met_des'] 		= 	$this->lang->line('app_job_met_des');
			$data['met_key'] 		= 	$this->lang->line('app_job_met_key');
			$data['title'] 		= 	$this->lang->line('app_job_title');
		   $res['job_app']=$this->General_model->get_company_job_applications($com_id);
		 
		   
	 
	$data['content']=$this->load->view('frontend/jobs/manage_job_aplication_view',$res,true);
		$this->load->view('frontend/home/main_template',$data);
	
	 }
	 ////////////////
	 function applicants($job_sef=''){
		 varify_session_company();
	$com_id = get_info('company_info','com_id');

    
		
			$res['page_below_title']=$this->lang->line('a_above_page');
		$res['page_title']=$this->lang->line('a_above_mg_j');
          // $res['ja_bitc']=1;
		   $data['met_des'] 		= 	$this->lang->line('app_job_met_des');
			$data['met_key'] 		= 	$this->lang->line('app_job_met_key');
			$data['title'] 		= 	$this->lang->line('app_job_title');
		   $res['app']='';
		   $job_id=$this->General_model->select_single_field('job_id','jobs',array('job_sef'=>$job_sef));
		   $res['job_app']=$this->General_model->get_company_job_applications_single($com_id,$job_id);
		   $data['content']=$this->load->view('frontend/jobs/manage_job_aplication_view',$res,true);
		$this->load->view('frontend/home/main_template',$data);
		 
		 }
		 ///////////////////////////
	 function reject_application(){
		 $jap_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jap_id'));
			//$this->General_model->delete_where2(array('jap_id'=>$jap_id),'job_applications');
			$data_b['jap_status']=-1;//it means rejected
			
			$data_b['jap_rejected_date']=time();
	   $this->db->where('jap_id',$jap_id);
	   
       $this->db->update('job_applications',$data_b);
	 $job_title=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_title'));
	  $jos_username=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_username'));
	    $jos_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_id'));
	
	
	$jos_email=$this->General_model->select_single_field('jos_email','jobseekers',array('jos_id'=>$jos_id));
	 /*$a 	= array('{username}','{job_title}');
 	 $b 	= array($jos_username,$job_title);
	 set_mail(9,$a,$b,$jos_email);*/
	 
	$email_res = $this->common_model->select_where('*', 'email_template', array('email_id' => 9));
	$email_temp = $email_res->row();
	
	$content = $email_temp->email_content;
	
	$email_from = $email_temp->from_email;
	$email_subject = $email_temp->email_subject;
	$email_name = $email_temp->email_from_name;
	
	$updated 		= 	str_replace('{user_name}',$jos_username,$content);
	$final_content 		= 	str_replace('{job_title}',$job_title,$updated);
	 
	 			$url = 'https://api.sendgrid.com/';
				
				
				$post_data = array(
				 "api_user" => $this->config->item('api_user'),
				 "api_key" => $this->config->item('api_key'),
				 "to" => $jos_email,
				 "toname" => $email_name,
				 "subject" => $email_subject,
				 "html" =>  $final_content,
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
		
			echo 'success';
		 }
		 ///////////////////////////////////////////////////
		 
		 
		  function assign_application(){
			  //assign to single reject remaing,,delte remaining
			  
			$jap_id = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jap_id'));
			
			$job_title = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_title'));
			$jos_username = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_username'));
			$jos_id  =mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_id'));
			$job_id = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_id'));
	
	
	
	   
	   $data_a['job_status']=2;
	   $this->db->where('job_id',$job_id);
       $this->db->update('jobs',$data_a);
	$data_b['jap_status']=1;
	$data_b['jap_accepted_date']=time();
	   $this->db->where('jap_id',$jap_id);
       $this->db->update('job_applications',$data_b);
	
	$jos_email = $this->General_model->select_single_field('jos_email','jobseekers',array('jos_id'=>$jos_id));
	 /*$a 	= array('{username}','{job_title}');
 	 $b 	= array($jos_username,$job_title);
	 set_mail(10,$a,$b,$jos_email);*/
	 
	$email_res = $this->common_model->select_where('*', 'email_template', array('email_id' => 10));
	$email_temp = $email_res->row();
	
	$content = $email_temp->email_content;
	
	$email_from = $email_temp->from_email;
	$email_subject = $email_temp->email_subject;
	$email_name = $email_temp->email_from_name;
	
	$updated 		= 	str_replace('{user_name}',$jos_username,$content);
	$final_content 		= 	str_replace('{job_title}',$job_title,$updated);
	 
	 			$url = 'https://api.sendgrid.com/';
				
				
				$post_data = array(
				 "api_user" => $this->config->item('api_user'),
				 "api_key" => $this->config->item('api_key'),
				 "to" => $jos_email,
				 "toname" => $email_name,
				 "subject" => $email_subject,
				 "html" =>  $final_content,
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
	 
	 
	 
	/* 
	  $remain=$this->General_model->select_where('jap_id,jos_id','job_applications',array('jap_id !='=>$jap_id,'job_id'=>$job_id));
if($remain->num_rows()>0){
	foreach($remain->result() as $ra){
		$jos_email=$this->General_model->select_single_field('jos_email','jobseekers',array('jos_id'=>$ra->jos_id));
	  $data_ss['jap_status']=-1;
		 $this->db->where('jap_id',$ra->jap_id);
       $this->db->update('job_applications',$data_ss);
	 $a 	= array('{username}','{job_title}');
 	 $b 	= array($jos_username,$job_title);
	 set_mail(9,$a,$b,$jos_email);
	// $this->General_model->delete_where2(array('jap_id'=>$ra->jap_id),'job_applications');
		}
	}*/
		
			echo 'success';
		 }
	 
	 
}?>