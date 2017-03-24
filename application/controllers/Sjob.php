<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sjob extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index()
	{
varify_session();
	     $jos_id = get_info('user_info','jos_id');
         $res['reg_bits']=1;
		  $data['met_des'] 		= 	$this->lang->line('mng_job_met_des');
			$data['met_key'] 		= 	$this->lang->line('mng_job_met_key');
			$data['title'] 		= 	$this->lang->line('mng_job_title');
		 
		 	
	$res['page_below_title']='هنا قائمة بالوظائف التي تم التقدم عليها';
		$res['page_title']='وظائفي';
           $res['ja_bitc']=1;
		   $res['title']='Applications';
		   $res['job_app']=$this->General_model->get_jobseeker_jobs_list($jos_id);
		 
		   
	 
	$data['content']=$this->load->view('frontend/sjobs/manage_seeker_job_aplication_view',$res,true);
		$this->load->view('frontend/home/main_template',$data);
	
	 }
	 ///////////////////
	 ///////////////////////
	 function assigned(){
		 varify_session();
	     $jos_id = get_info('user_info','jos_id');
         $res['reg_bits']=1;
		  $data['met_des'] 		= 	$this->lang->line('mng_job_met_des');
			$data['met_key'] 		= 	$this->lang->line('mng_job_met_key');
			$data['title'] 		= 	$this->lang->line('mng_job_title');
	$res['page_below_title']=$this->lang->line('a_above_page');
		$res['page_title']=$this->lang->line('a_above_mg_j');
           $res['ja_bitc']=1;
		   $res['title']='Applications';
		   $res['job_app']=$this->General_model->get_jobseeker_jobs_list_assign($jos_id);
		 
		   
	 
	$data['content']=$this->load->view('frontend/sjobs/manage_seeker_job_aplication_view',$res,true);
		$this->load->view('frontend/home/main_template',$data);
		 }
		 /////////////////////////////////
		 
	 
	 ////////////////
	 
	 function cancel_application(){
		  $jap_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jap_id'));
			$this->General_model->delete_where2(array('jap_id'=>$jap_id),'job_applications');
	 $job_title=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_title'));
	  $jos_username=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_username'));
	    $jos_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_id'));
			echo 'success';
		 }
	 
	 /////////////////
	 
	 function apply_job(){
		 
		 
		 $job_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_id'));
		 		$jos_id = get_info('user_info','jos_id');
				 $already_check=$this->General_model->select_where('jos_id','job_applications',array('jos_id'=>$jos_id,'job_id'=>$job_id));
if($already_check->num_rows()>0){
	echo 0;
	}else{
				
			$data_a['job_id']=$job_id;
	    
			$jos_username = get_info('user_info','jos_username');
			$data_a['jos_id']=$jos_id;
		 	$data_a['jap_dateadded']=time();
		    $data_a['jap_status']=0;
			$data_a['jap_accepted_date']=0;
			$last_insert_id                = $this->General_model->insert_info('job_applications',$data_a);
			$com_id             = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_id'));
			$job_title             = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_title'));
			$com_email             = $this->General_model->get_field_value2(array('com_id'=>$com_id),'com_user_email','companies');
			
 $seekr=$this->General_model->select_where('jos_email,jos_sef,jos_id,jos_username','jobseekers',array('jos_id'=>$jos_id));
 
 if($seekr->num_rows()>0){
	$sr=$seekr->row();
	 }
$link='';
	 /*$a 	= array('{user_name}','{job_title}','{resume_link}');
 	 $b 	= array($jos_username,$job_title,$link);
	 set_mail(11,$a,$b,$com_email);*/
	 
	 $email_res = $this->common_model->select_where('*', 'email_template', array('email_id' => 11));
	$email_temp = $email_res->row();
	
	$content = $email_temp->email_content;
	
	$email_from = $email_temp->from_email;
	$email_subject = $email_temp->email_subject;
	$email_name = $email_temp->email_from_name;
	
	$updated 		= 	str_replace('{user_name}',$jos_username,$content);
	$updated1 		= 	str_replace('{job_title}',$job_title,$updated);
	$final_content 		= 	str_replace('{resume_link}',$link,$updated1);
	 
	 				$url = 'https://api.sendgrid.com/';
				
				
				$post_data = array(
				 "api_user" => $this->config->item('api_user'),
				 "api_key" => $this->config->item('api_key'),
				 "to" => $com_email,
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
	 
			echo 1;
	}
			
		 }
}?>