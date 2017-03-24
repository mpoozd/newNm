<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Registerc extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
				get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index()
	{	
	
		$this->session->set_userdata('c_reg_step3','');
		$this->session->set_userdata('c_reg_step2','');
		$this->session->set_userdata('c_reg_step1','');
		$this->General_model->delete_where2(array('jos_id'=>0),'jobseeker_experience');
		$this->General_model->delete_where2(array('jos_id'=>0),'jobseeker_eduation');
		$res['pp_data']=$this->General_model->select_all('pricing_plan','*');
		$res['emp_data']=$this->General_model->select_all('company_employer','*');
		$res['industry_data']=$this->General_model->select_all('industry','*');
		$res['ctype']=$this->General_model->select_all('company_type','*');
		$res['reg_bitc']=1;
		 $res['met_des'] 		= 	$this->lang->line('reg_met_des');
			$res['met_key'] 		= 	$this->lang->line('reg_met_key');
			$res['title'] 		= 	$this->lang->line('reg_title');
		$res['cats_data']  =  $this->General_model->select_all('categories','cat_name,cat_sef,cat_id');
		$res['type_data']  =  $this->General_model->select_all('job_type','jtype_id,jtype_name');
		$res['gender_data']  =  $this->General_model->select_all('gender','gender_name,gender_id');
		$res['location'] = $this->General_model->select_all('cities','city_name,city_id');
		$this->load->view('frontend/company_register/company_register_view',$res);
			
	
	}
	
	 function register_company()
	{
		
	/*	$this->form_validation->set_rules('user_name',$this->lang->line('name'), 'required');
		$this->form_validation->set_rules('user_password', $this->lang->line('password'), 'required');
		$this->form_validation->set_rules('user_email', $this->lang->line('email'), 
		'required|trim|valid_email|callback_email_check');
		
			*/
		$this->form_validation->set_rules('user_name','name', 'required');
		$this->form_validation->set_rules('user_password', 'password', 'required');
		$this->form_validation->set_rules('user_email', 'email', 
		'required|trim|valid_email|callback_email_check');
		
		if ($this->form_validation->run() === TRUE)
		 {
			 
			

         $data_a['com_user_fullname']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('user_name'));
			$data_a['user_password']            = mysqli_real_escape_string(get_mysqliobj(),md5($this->input->post('user_password')));
			
			$data_a['com_user_email']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('user_email'));
		
			$data_a['dateadded']       = time();
			$data_a['status_id']       = 0;
			
			
			//$last_insert_id                = $this->General_model->insert_info('companies',$data_a);
			
			$this->session->set_userdata('c_reg_step1',$data_a);
			
			
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
	
	
	



	
	////
	function select_plan(){
		
	$plan_id=	$this->input->post('plan_id');
	$data_a['plan_id']=$plan_id;
		$this->session->set_userdata('c_reg_step2',$data_a);
		$data = array(
                    'log_error' => 'no'
            );
		 echo json_encode($data);
		
		}
		///////////
		
		function add_company(){
			
		
		$this->form_validation->set_rules('com_name', $this->lang->line('name'), 'required');
		$this->form_validation->set_rules('com_description', $this->lang->line('short_dec'), 'required');
		$this->form_validation->set_rules('com_website', $this->lang->line('com_website'), 'required|trim');
		$this->form_validation->set_rules('com_location', $this->lang->line('com_location'), 'required|trim');
		$this->form_validation->set_rules('com_email', $this->lang->line('com_email'), 'required|trim|valid_email');
         $this->form_validation->set_rules('com_phone',$this->lang->line('com_phone_number'), 'required|trim');
		   $this->form_validation->set_rules('com_headline', $this->lang->line('com_headline'), 'required|trim');
		

		if ($this->form_validation->run())  
		 {
			
			  if($_FILES["filename"]["name"]!='')
								{
								  $image_name = $_FILES["filename"]["name"];
								  $filename   = time().$_FILES["filename"]["name"];
								  $var=explode(".",basename($_FILES["filename"]["name"]));
								  $image_ext  = end( $var);
								  
								  $move_url   = PATH_DIR.'uploads/company_logo/';
								  
								  $logo=get_info('c_reg_step3','com_logo');
								if($logo!=''){
										
											$image_name    = $logo;
												if($image_name!=''){
			
													$move_url22 = PATH_DIR.'uploads/company_logo/'.$image_name;
													$move_url322  = PATH_DIR.'uploads/company_logo/thumbs/com'.$image_name;
													@unlink($move_url22);
													@unlink($move_url322);
													
												}
											}
								  if(move_uploaded_file($_FILES["filename"]["tmp_name"],$move_url.$filename))
								  {
												  
									  $source_image_path = $move_url;
									  $source_image_name = $filename;
									  resize_crop_image(43,43,$source_image_path,$source_image_name,'thumbs/com',$image_ext,true);  
									 
									
									} 
									  $data_a['com_logo'] = $filename;
								}else{
									  $data_a['com_logo'] = '';
									}
		 	$data_a['com_name']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_name'));
			$data_a['short_description']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_description'));
			
			$data_a['com_location']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_location'));
			$data_a['com_website']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_website'));
			$data_a['com_email']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_email'));
		
		$data_a['com_phone_number']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_phone'));
		
			$data_a['com_headline']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_headline'));
			
	$data_a['ctype_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('ctype_id'));

			$data_a['cemp_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('cemp_id'));

			//$last_insert_id                = $this->General_model->insert_info('companies',$data_a);
			
			$this->session->set_userdata('c_reg_step3',$data_a);
			
			
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
		
		
	//
	function add_job(){
			
		
	$this->form_validation->set_rules('job_title', $this->lang->line('job_title'), 'required');
		$this->form_validation->set_rules('category_id', $this->lang->line('category_id'), 'required');
		$this->form_validation->set_rules('short_dec', $this->lang->line('short_dec'), 'required|trim');
		
		$this->form_validation->set_rules('application_email',$this->lang->line('application_email'), 'required|trim|valid_email');
         $this->form_validation->set_rules('job_location','Location', 'required|trim');
		 
		  $this->form_validation->set_rules('salary', $this->lang->line('salary'), 'required|trim');

 $this->form_validation->set_rules('working_hours', $this->lang->line('working_hours'), 'required|trim');

 $this->form_validation->set_rules('experience_id',$this->lang->line('experience_id'), 'required|trim');
 $this->form_validation->set_rules('gender',$this->lang->line('gender'), 'required|trim');

 $this->form_validation->set_rules('responsibilties',$this->lang->line('responsibilties'), 'required|trim');

 $this->form_validation->set_rules('skills', $this->lang->line('skills'), 'required|trim');



		if ($this->form_validation->run())  
		 {
			
			 
			 //compny info
			$data_c['com_logo']=get_info('c_reg_step3','com_logo');
			
			$data_c['com_name']=get_info('c_reg_step3','com_name');
			$data_c['com_website']=get_info('c_reg_step3','com_website');
			$data_c['com_email']=get_info('c_reg_step3','com_email');
			
			$data_c['com_phone_number']=get_info('c_reg_step3','com_phone_number');
			
			$data_c['com_location']=get_info('c_reg_step3','com_location');
			$data_c['short_description']=get_info('c_reg_step3','short_description');
			$data_c['com_headline']=get_info('c_reg_step3','com_headline');
			
			
			$data_c['com_user_fullname']=get_info('c_reg_step1','com_user_fullname');
			$data_c['com_user_password']=get_info('c_reg_step1','user_password');
			
			$data_c['com_user_email']=get_info('c_reg_step1','com_user_email');
			
			$data_c['price_package_id']=get_info('c_reg_step2','plan_id');
			$pp_days_listing_duration             = $this->General_model->get_field_value2(array('pp_id'=>$data_c['price_package_id']),'pp_days_listing_duration','pricing_plan');
			$job_posting_count             = $this->General_model->get_field_value2(array('pp_id'=>$data_c['price_package_id']),'pp_job_post_number','pricing_plan');
			
			$job_feature_posting_count             = $this->General_model->get_field_value2(array('pp_id'=>$data_c['price_package_id']),'pp_featured_job_post_number','pricing_plan');
			$today=date('d-m-Y');
            $next_date= strtotime($today. ' + '.$pp_days_listing_duration.' days');

			$data_c['package_expirydate']=$next_date;


			$yes_no             = $this->General_model->get_field_value2(array('pp_id'=>$data_c['price_package_id']),'pp_show_contact','pricing_plan');


			$count_resume             = $this->General_model->get_field_value2(array('pp_id'=>$data_c['price_package_id']),'pp_num_of_resume','pricing_plan');

	$data_c['resume_search_count']=$count_resume;
		$data_c['resume_yes_no']=$yes_no;
			
			$data_c['job_posting_count']=$job_posting_count;
			$data_c['job_feature_posting_count']=$job_feature_posting_count;
			
			$data_c['dateadded']=time();
		
			$data_c['status_id']=0;
				
			$data_c['activation_key']=md5(get_trans_id(10));
			$data_c['com_sef']=md5(get_trans_id(14));
			
			
			
			$data_c['ctype_id']            =get_info('c_reg_step3','ctype_id');

			$data_c['cemp_id']            = get_info('c_reg_step3','cemp_id');
			 $data_c['serial_no']=$this->General_model->get_max_id('serial_no','companies');
				
			$last_id=$this->General_model->insert_info('companies',$data_c);
			$this->register_mail($last_id,$data_c['activation_key']);
		
			
			 
		 	$data_a['job_title']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_title'));
			$data_a['job_sef']=             get_trans_id(10);
		
			$data_a['category_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('category_id'));
			$data_a['com_id']  =$last_id;
			$data_a['short_desc']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('short_dec'));
			$data_a['application_email']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('application_email'));
			$data_a['job_location']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_location'));
		
		$data_a['job_type_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_type_id'));
		
		$data_a['salary']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('salary'));
		
		$data_a['working_hours']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('working_hours'));
		
		$data_a['experience_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('experience_id'));
		
		$data_a['gender']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('gender'));
		
		$data_a['responsibilties']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('responsibilties'));
		$data_a['skills_required']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skills'));
		$data_a['price_package_id']=get_info('c_reg_step2','plan_id');
		$data_a['package_expirydate']=$next_date;
			$data_a['dateadded']=time();
			
		
			$data_a['job_status']=0;
			
 
			 	 	
			
			$last_insert_id                = $this->General_model->insert_info('jobs',$data_a); 
			
			$data_f['job_posting_count']=$data_c['job_posting_count']-1;
	   $this->db->where('com_id',$last_id);
       $this->db->update('companies',$data_f);
			$this->session->set_flashdata('msg','شكراً لتسجيلك، سنتواصل معك في اقرب وقت ممكن لتفعيل حساب منشأتك');
		
			
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
	//////////
	 function email_check()
	{
		$uname=$this->input->post('user_email');
	    $query  =  $this->General_model->select_where('com_user_email','companies',array('com_user_email'=>$uname));
		//echo $query->num_rows();
		if ($query->num_rows() > 0)
		{
			$this->form_validation->set_message('email_check', $this->lang->line('email_already'));
			return FALSE;
			 
			
		} 
		else
		{
			 $query2  =  $this->General_model->select_where('jos_email','jobseekers',array('jos_email'=>$uname));
			if ($query2->num_rows() > 0){
				$this->form_validation->set_message('email_check',  $this->lang->line('email_already'));
			return FALSE;
				}
				else{
					return TRUE;
					}
			
		}
		
	}
	
	///////
	
	//Successful Registeration email
	function register_mail($user_id,$key)
	{
			$template 			= $this->General_model->select_where('email_id,email_subject,email_from_name,from_email,email_content','email_template',array('email_id'=>2));
			$template_result	= $template->row_array();
			
			
			$user_info=$this->General_model->select_where('com_id,com_user_fullname,com_user_password,com_user_email','companies',array('com_id'=>$user_id));
	       if($user_info->num_rows()>0){
			   $u=$user_info->row();
			  

			$subject		    = $template_result['email_subject'];
			$message		    = $template_result['email_content'];
			$login_link='<a href="'.base_url().'registerc/activate_account/'.$key.'">Click Here to Activate your Account</a>';
			$find 	            = array("{user_password}","{user_email}","{user_name}","{login_url}");
			$replace            = array($u->com_user_password,$u->com_user_email,$u->com_user_fullname,$login_link);
			$new_mess           = str_replace($find,$replace,$message);
			/*$this->phpmailer->AddAddress($u->com_user_email); 
			$this->phpmailer->IsMail();  
			$this->phpmailer->From     = $template_result['from_email'];
			$this->phpmailer->FromName = $template_result['email_from_name']; 
			$this->phpmailer->IsHTML(true);                                  
			$this->phpmailer->Subject  =  $subject;
			$this->phpmailer->Body     =  $new_mess;
			$this->phpmailer->Send();*/ 
			
				$url = 'https://api.sendgrid.com/';
				
				
				$post_data = array(
				 "api_user" => $this->config->item('api_user'),
				 "api_key" => $this->config->item('api_key'),
				 "to" => $u->com_user_email,
				 "toname" => $template_result['email_from_name'],
				 "subject" => $subject,
				 "html" =>  $new_mess,
				 "from" => $template_result['from_email'],
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
	
				
	function activate_account($key){
	
 $user_info=$this->General_model->select_where('com_id,activation_key,com_user_email,price_package_id,com_user_fullname','companies',array('activation_key'=>$key));

		   if($user_info->num_rows()>0){
			   $u=$user_info->row();

   if($u->activation_key!=''){
	  
	   $data_a['status_id']=1;
	   $data_a['activation_key']='';
	   $this->db->where('com_id',$u->com_id);
       $this->db->update('companies',$data_a);
	          $user_info2['com_user_email'] 		= $u->com_user_email;
				$user_info2['com_id'] 		= $u->com_id;
				$user_info2['com_user_fullname'] 	= $u->com_user_fullname;
				$user_info2['price_package_id'] 	= $u->price_package_id;
					$user_info2['login_bit'] 	=1;
				$this->session->set_userdata('company_login',$user_info2['login_bit']); 
				$this->session->set_userdata('company_info',$user_info2); 
	   
	   header('location:'.base_url().'confirmation');	
	   }else{
		    
		   header('location:'.base_url().'confirmation/already_visited');	
		   }
	}else{
		    
		   header('location:'.base_url().'confirmation/already_visited');	
		   }}
	
	/////
	
	function thankyou(){
		
		$data['page_title'] 		= 	$this->lang->line('thankyou');
			$data['page_below_title'] 		= 	$this->session->flashdata('msg');
			$data['met_des'] 		= 	$this->lang->line('confirm_temp_met_des');
			$data['met_key'] 		= 	$this->lang->line('confirm_temp_met_key');
			$data['title'] 		= 	$this->lang->line('confirm_temp_title');
		$this->load->view('frontend/confirm_account/confirm_template',$data);
		}
		
	///
	function SEF_URLS($str, $replace=array(), $delimiter='-') 
    {
		$str=trim($str);
		if( !empty($replace) )
		{
			 $str = str_replace((array)$replace, ' ', $str);
		}
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
		return $clean;
	}	
}?>