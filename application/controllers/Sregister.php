<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sregister extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
				get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index()
	{	
	
		 $this->General_model->delete_where2(array('jos_id'=>0),'jobseeker_experience');
		$this->General_model->delete_where2(array('jos_id'=>0),'jobseeker_eduation');
		$this->General_model->delete_where2(array('jos_id'=>0),'jobseeker_skills');
		$this->session->set_userdata('s_reg_step2','');
		$this->session->set_userdata('s_reg_step1','');
     
           $res['reg_bits']=1;
		  $res['met_des'] 		= 	$this->lang->line('reg_met_des');
			$res['met_key'] 		= 	$this->lang->line('reg_met_key');
			$res['title'] 		= 	$this->lang->line('reg_title');
	 $res['uni_data']  =  $this->General_model->select_all('universties','univ_name,univ_id');
	 
	  $tags  =  $this->General_model->select_all('portal_tags','*');
	//  $professions = $this->common_models->select_where('*','professions',array('prof_status'=>1));
				if($tags->num_rows() > 0)
				{
					$res['tags_data'] = $tags;
				}
				else
				{
					$res['tags_data'] = '';
				}
				
	 
	 $res['country_data']  =  $this->General_model->select_all('countries','country_name,country_id');
	 $res['city_data']  =  $this->General_model->select_all('cities','city_name,city_id');
	 	 $res['spe_data']  =  $this->General_model->select_all('specialists','spe_name,spe_id');
		  $res['gender_data']  =  $this->General_model->select_all('gender','gender_name,gender_id');
		  $res['graduation_year'] = $this->General_model->select_all('graduation_year','grad_year,grad_id');
		  $res['location'] = $this->General_model->select_all('cities','city_name,city_id');

		$this->load->view('frontend/jobseeker_register/jobseeker_register_view',$res);
			
	
	}
	
	function get_tag_id(){
		$tag_name=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('tag_name'));
	$tag_id=	$this->General_model->get_field_value2(array('tag_name'=>$tag_name),'tag_id','portal_tags');
		echo $tag_id;
		}
	
	 function add_user()
	{
		
	
			
		
		$this->form_validation->set_rules('jos_password','Password', 'required|min_length[6]');
		$this->form_validation->set_rules('univ_id', 'University', 'required');
		$this->form_validation->set_rules('hidden', 'Photo', 'required');
		$this->form_validation->set_rules('grad_id', 'Graduation Year', 'required|trim');
		$this->form_validation->set_rules('jos_email', 'Email', 'required|trim|valid_email|callback_email_check');
      
		if ($this->form_validation->run())  
		 {
			
			  if($_FILES["filename"]["name"]!='')
								{
								  $image_name = $_FILES["filename"]["name"];
								  $filename   = time().$_FILES["filename"]["name"];
								  $var=explode(".",basename($_FILES["filename"]["name"]));
								  $image_ext  = end( $var);
								  
								  $move_url   = PATH_DIR.'uploads/jobseekers/';
								  
								  $logo=get_info('s_reg_step1','photo_document_file');
								if($logo!=''){
										
											$image_name    = $logo;
												if($image_name!=''){
			
													$move_url22 = PATH_DIR.'uploads/jobseekers/'.$image_name;
													//$move_url322  = PATH_DIR.'uploads/jobseekers/thumbs/seek'.$image_name;
													@unlink($move_url22);
												//	@unlink($move_url322);
													
												}
											}
												$filename = str_replace(' ', '', $filename);
				$filename = preg_replace('/\s+/', '', $filename);
								  if(move_uploaded_file($_FILES["filename"]["tmp_name"],$move_url.$filename))
								  {
												  
									  $source_image_path = $move_url;
									  $source_image_name = $filename;
									  //resize_crop_image(43,43,$source_image_path,$source_image_name,'thumbs/seek',$image_ext,true);  
									 
									
									} 
									  $data_a['photo_document_file'] = $filename;
								}
		 	$data_a['univ_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('univ_id'));
			//$data_a['graduation_year']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('graduation_year'));
			$data_a['graduation_year']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('grad_id'));
			$data_a['jos_email']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_email'));
			$data_a['jos_password']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_password'));
		
			
			
			
			//$last_insert_id                = $this->General_model->insert_info('companies',$data_a);
			
			$this->session->set_userdata('s_reg_step1',$data_a);
			
			
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
	
	
	
	   
   /*********** File Type Check *****/
	
	public function upload_handler()
		{ 
			if (isset($_FILES['filename']) && !empty($_FILES['filename']['name']))
      		{		
			$exts = array('gif', 'png', 'jpg'); 
	  	$va=	explode('.',$_FILES['filename']['name']);
				 if(in_array(end($va),$exts)){
					return TRUE;
				 }
				else
				{
		  // throw an error because nothing was uploaded
				$this->form_validation->set_message('upload_handler', 'Upload Image');
				return FALSE;
				}
			}
			else{
					$this->form_validation->set_message('upload_handler', 'Upload Image');
      			    return FALSE;
				}
		
					
		}	

	
	
		function add_resume(){
			
		
		$this->form_validation->set_rules('jos_username', 'Name', 'required');
		$this->form_validation->set_rules('spe_id', 'Specialist', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('location', 'Location', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
         $this->form_validation->set_rules('about_uerself', 'about Yourself', 'required|trim');
		   $this->form_validation->set_rules('country_id', 'Country', 'required|trim');
		     //$this->form_validation->set_rules('age', 'Age', 'required|trim');
			 $this->form_validation->set_rules('age', 'Age', 'required|trim|integer');
			   //$this->form_validation->set_rules('phone', 'Phone', 'required|trim');
			   $this->form_validation->set_rules('phone', 'Phone', 'required|trim|integer|min_length[10]');
			 //    $this->form_validation->set_rules('hidden2', 'Image', 'required|trim');
			   

		if ($this->form_validation->run())  
		 {
			
			  if($_FILES["filename2"]["name"]!='')
								{
								  $image_name = $_FILES["filename2"]["name"];
								  $filename   = time().$_FILES["filename2"]["name"];
								  $var=explode(".",basename($_FILES["filename2"]["name"]));
								  $image_ext  = end( $var);
								  
								  $move_url   = PATH_DIR.'uploads/jobseekers/';
								  
								  $logo=get_info('s_reg_step2','image');
								if($logo!=''){
										
											$image_name    = $logo;
												if($image_name!=''){
			
													$move_url22 = PATH_DIR.'uploads/jobseekers/'.$image_name;
													$move_url322  = PATH_DIR.'uploads/jobseekers/thumbs/simg'.$image_name;
													@unlink($move_url22);
													@unlink($move_url322);
													
												}
											}
												$filename = str_replace(' ', '', $filename);
				$filename = preg_replace('/\s+/', '', $filename);
								  if(move_uploaded_file($_FILES["filename2"]["tmp_name"],$move_url.$filename))
								  {
												  
									  $source_image_path = $move_url;
									  $source_image_name = $filename;
									  resize_crop_image(43,43,$source_image_path,$source_image_name,'thumbs/simg',$image_ext,true);  
									 
									
									} 
									  $data_a['image'] = $filename;
								}else{
									  $data_a['image'] = '';
									}
								if($_FILES["resume_file"]["name"]!='')
								{
								  $image_name = $_FILES["resume_file"]["name"];
								  $filename   = time().$_FILES["resume_file"]["name"];
								  $var=explode(".",basename($_FILES["resume_file"]["name"]));
								  $image_ext  = end( $var);
								  
								  $move_url   = PATH_DIR.'uploads/jobseekers/';
								  
								  $logo=get_info('s_reg_step2','resume_file');
								if($logo!=''){
										
											$image_name    = $logo;
												if($image_name!=''){
			
													$move_url22 = PATH_DIR.'uploads/jobseekers/'.$image_name;
												
													@unlink($move_url22);
													
												}
											}
												$filename = str_replace(' ', '', $filename);
				$filename = preg_replace('/\s+/', '', $filename);
								  if(move_uploaded_file($_FILES["resume_file"]["tmp_name"],$move_url.$filename))
								  {
												  
									 
									 
									 $data_a['resume_file'] = $filename;
									} 
									 
								}else{
										 $data_a['resume_file'] = '';
									}
								
		 	$data_a['jos_username']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_username'));
			$data_a['spe_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('spe_id'));
			
			$data_a['about_uerself']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('about_uerself'));
			$data_a['location']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('location'));
			$data_a['gender']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('gender'));
		
		
		$data_a['country_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('country_id'));
		
		$data_a['age']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('age'));
		$data_a['phone']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('phone'));
		$data_a['email']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('email'));
		$data_a['hide_tags']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('hide_tags'));
			
			
			
			//$last_insert_id                = $this->General_model->insert_info('companies',$data_a);
			
			$this->session->set_userdata('s_reg_step2',$data_a);
			
			
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
		
		///
		
		function save_edu(){
			$this->form_validation->set_rules('degree_title', 'Degree Title', 'required');
			$this->form_validation->set_rules('school_name', 'Name', 'required');
			
		//$this->form_validation->set_rules('start_school', 'Start', 'required');
		$this->form_validation->set_rules('start_school', 'Start', 'required');
		//$this->form_validation->set_rules('end_school', 'End', 'required|trim');
		$this->form_validation->set_rules('end_school', 'End', 'required|trim');
		$this->form_validation->set_rules('notes', 'Notes', 'required|trim');
		
		if ($this->form_validation->run())  
		 {
			 
			

         $data_a['school_name']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('school_name'));
			$data_a['start_school']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('start_school'));
			
			 $data_a['degree_title']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('degree_title'));
			 
			$data_a['end_school']           = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('end_school'));
		
			$data_a['notes']       = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('notes'));
			
			
			/*$a = explode('/', $start_school);
			$data_a['start_school'] = $a[2];
			
			$b = explode('/', $end_school);
			$data_a['end_school'] = $b[2];*/
			
			
			$last_insert_id                = $this->General_model->insert_info('jobseeker_eduation',$data_a);
			
			
			$data = array(
                    'log_error' => 'no',
					 'last_id' => $last_insert_id
					 
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
		
		function delete_edu(){
			$edu_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('edu_id'));
			$this->General_model->delete_where('jedu_id',array('jedu_id'=>$edu_id),'jobseeker_eduation');
			echo 'success';
			}
			/////////////
				
		function save_exp(){
			$this->form_validation->set_rules('comp_name', 'Name', 'required');
		$this->form_validation->set_rules('job_title', 'Title', 'required');
		$this->form_validation->set_rules('start', 'Start', 'required|trim');
		$this->form_validation->set_rules('end', 'End', 'required|trim');
		$this->form_validation->set_rules('notes', 'Notes', 'required|trim');
		
		if ($this->form_validation->run())  
		 {
			 
			

        	 $data_a['comp_name']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('comp_name'));
			$data_a['job_title']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_title'));
			
			$data_a['start_date']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('start'));
		
			$data_a['end_date']      = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('end'));
			
			$data_a['notes']       = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('notes'));
				
							
				
			$last_insert_id                = $this->General_model->insert_info('jobseeker_experience',$data_a);
			
			
			$data = array(
                    'log_error' => 'no',
					 'last_id' => $last_insert_id
					 
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
			
			
			
			
			function save_skill(){
			$this->form_validation->set_rules('skill_name', 'Name', 'required');
		$this->form_validation->set_rules('skill_pro', 'Proffciency', 'required|integer');
		
		
		if ($this->form_validation->run())  
		 {
			 
			

         $data_a['skill_name']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skill_name'));
			$data_a['skill_pro']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skill_pro'));
			
			$last_insert_id                = $this->General_model->insert_info('jobseeker_skills',$data_a);
			
			
			
			$data = array(
                    'log_error' => 'no',
					 'last_id' => $last_insert_id
					 
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
		
		function delete_exp(){
			$exp_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('exp_id'));
			$this->General_model->delete_where('jexp_id',array('jexp_id'=>$exp_id),'jobseeker_experience');
			echo 'success';
			}
			
			function delete_data(){
			//$exp_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('id'));
		 $this->General_model->delete_where2(array('jos_id'=>0),'jobseeker_experience');
		$this->General_model->delete_where2(array('jos_id'=>0),'jobseeker_eduation');
		$this->General_model->delete_where2(array('jos_id'=>0),'jobseeker_skills');
			echo 'success';
			}
			///////////////////////////////////////////////////////
			function delete_skill(){
			$skill_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skill_id'));
			$this->General_model->delete_where('skill_id',array('skill_id'=>$skill_id),'jobseeker_skills');
			echo 'success';
			}
			////////////////
		
	//
	function save_jobseeker(){
			
		
		
			
			 
			 //user info
			$data_c['jos_password']=md5(get_info('s_reg_step1','jos_password'));
			$data_c['jos_email']=get_info('s_reg_step1','jos_email');
			$data_c['univ_id']=get_info('s_reg_step1','univ_id');
			$data_c['graduation_year']=get_info('s_reg_step1','graduation_year');
			$data_c['photo_document_file']=get_info('s_reg_step1','photo_document_file');
			
			
			
			$data_c['resume_file']=get_info('s_reg_step2','resume_file');
			$data_c['image']=get_info('s_reg_step2','image');
			
			
			
			$data_c['spe_id']=get_info('s_reg_step2','spe_id');
			
			$data_c['jos_headline']=get_info('s_reg_step2','spe_id');
			
			
			$data_c['jos_username']=get_info('s_reg_step2','jos_username');
			
			$data_c['name']=get_info('s_reg_step2','jos_username');
			
			$data_c['about_uerself']=get_info('s_reg_step2','about_uerself');
			
			$data_c['location']=get_info('s_reg_step2','location');
			
			
			$data_c['gender']=get_info('s_reg_step2','gender');
			
			
			$data_c['country_id']=get_info('s_reg_step2','country_id');
			$data_c['age']=get_info('s_reg_step2','age');
				$data_c['phone']=get_info('s_reg_step2','phone');
					$data_c['email']=get_info('s_reg_step2','email');
			
			$data_c['dateadded']=time();
		
			$data_c['status_id']=0;
				
			$data_c['activation_link']=md5(get_trans_id(10));
					$data_c['jos_sef']=md5(get_trans_id(12));
					 $data_c['serial_no']=$this->General_model->get_max_id('serial_no','jobseekers');
			$last_id=$this->General_model->insert_info('jobseekers',$data_c);
			
			
			/////////////////////////eduavcooo
			
			$school_name=$this->input->post('school_name');
			$start_school=$this->input->post('start_school');
			$degree_title=$this->input->post('degree_title');
			$end_school=$this->input->post('end_school');
			$notes=$this->input->post('notes');
			
			foreach( $school_name as $key => $n ) {
		  
		  
		     $data_edu_new['school_name']            = $n;
			$data_edu_new['start_school']       =     $start_school[$key];
			
			 $data_edu_new['degree_title']   =      $degree_title[$key]; 
			 $data_edu_new['jos_id']       =  $last_id;
			$data_edu_new['end_school']  =    $end_school[$key];    
			$data_edu_new['notes']       =  $notes[$key];
			$this->General_model->insert_info('jobseeker_eduation',$data_edu_new);
         }
			
		/////////////////
		//expp
		
		
			
			$comp_name=$this->input->post('comp_name');
			$job_title=$this->input->post('job_title');
			$start=$this->input->post('start');
			$end=$this->input->post('end');
			$notes2=$this->input->post('notes2');
			
			
				
			
			foreach( $comp_name as $key => $n ) {
		  
		  
		     $data_exp_new['comp_name']            = $n;
			$data_exp_new['job_title']       =     $job_title[$key];
			
			 $data_exp_new['start_date']   =      $start[$key]; 
			 
			$data_exp_new['end_date']  =    $end[$key];    
			$data_exp_new['notes']       =  $notes2[$key];
				$data_exp_new['jos_id']       =  $last_id;
			$this->General_model->insert_info('jobseeker_experience',$data_exp_new);
         }
		 
		 /////////////////
		//skillsss
		
		
         
			
			$skill_name=$this->input->post('skill_name');
			$skill_pro=$this->input->post('skill_pro');
		
				
			
			foreach( $skill_name as $key => $n ) {
		  
		  
		     $data_skil_new['skill_name']            = $n;
		     $data_skil_new['jos_id']       =  $last_id;
			$data_skil_new['skill_pro']       =  $skill_pro[$key];
			$this->General_model->insert_info('jobseeker_skills',$data_skil_new);
         }
		
		///////////////////	
		
			
			$this->register_mail($last_id,$data_c['activation_link']);
			 
		  
		$this->session->set_flashdata('msg','شكرًا لتسجيلك في SmartLancers ك طالب باحث عن عمل , انتظر تفعيل حسابك في اقرب وقت ممكن ');
		
			
			//$data = array(
                  //  'log_error' => 'no'
					 
           // );
		
		// echo json_encode($data);

	  header('location:'.base_url().'Sregister/thankyou');	
			}
	//////////
	 function email_check()
	{
		$uname=$this->input->post('jos_email');
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
				$this->form_validation->set_message('email_check', $this->lang->line('email_already'));
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
		
			$template 			= $this->General_model->select_where('email_id,email_subject,email_from_name,from_email,email_content','email_template',array('email_id'=>4));
			$template_result	= $template->row_array();
			$user_info=$this->General_model->select_where('jos_id,jos_username,jos_password,jos_email','jobseekers',array('jos_id'=>$user_id));
	       if($user_info->num_rows()>0){
			   $u=$user_info->row();
			  

			$subject		    = $template_result['email_subject'];
			$message		    = $template_result['email_content'];
			$login_link='<a href="'.base_url().'sregister/activate_account/'.$key.'">Click Here to Activate your Account</a>';
			$find 	            = array("{user_password}","{user_email}","{user_name}","{login_url}");
			$replace            = array($u->jos_password,$u->jos_email,$u->jos_username,$login_link);
			$new_mess           = str_replace($find,$replace,$message);
			$this->phpmailer->AddAddress($u->jos_email); 
			$this->phpmailer->IsMail();  
			$this->phpmailer->From     = $template_result['from_email'];
			$this->phpmailer->FromName = $template_result['email_from_name']; 
			$this->phpmailer->IsHTML(true);                                  
			$this->phpmailer->Subject  =  $subject;
			$this->phpmailer->Body     =  $new_mess;
			$this->phpmailer->Send(); 
			}
	}
	
				
	function activate_account($key){
	
 $user_info=$this->General_model->select_where('jos_id,jos_username,jos_password,jos_email,activation_link','jobseekers',array('activation_link'=>$key));

		   if($user_info->num_rows()>0){
			   $u=$user_info->row();

   if($u->activation_link!=''){
	  
	   $data_a['status_id']=1;
	   $data_a['activation_link']='';
	   $this->db->where('jos_id',$u->jos_id);
       $this->db->update('jobseekers',$data_a);
	          $user_info2['jos_email'] 		= $u->jos_email;
				$user_info2['jos_id'] 		= $u->jos_id;
				$user_info2['jos_username'] 	= $u->jos_username;
				
					$user_info2['login_bit'] 	=1;
				$this->session->set_userdata('jobseeker_login',$user_info2['login_bit']); 
				$this->session->set_userdata('user_info',$user_info2); 
	   
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