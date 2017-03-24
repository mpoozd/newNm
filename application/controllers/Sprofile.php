<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sprofile extends CI_Controller {

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
    $res['seeker_data'] = $this->General_model->select_where('*','jobseekers',array('jos_id'=>$jos_id));
      
           $res['po_bits']=1;
		   $res['title']='Register';
	  $res['uni_data']  =  $this->General_model->select_all('universties','univ_name,univ_id');
	 $res['country_data']  =  $this->General_model->select_all('countries','country_name,country_id');
	 	 $res['spe_data']  =  $this->General_model->select_all('specialists','spe_name,spe_id');
		 $res['graduation_year']  =  $this->General_model->select_all('graduation_year','grad_year,grad_id');
 $data['met_des'] 		= 	$this->lang->line('profile_met_des');
			$data['met_key'] 		= 	$this->lang->line('profile_met_key');
			$data['title'] 		= 	$this->lang->line('profile_title');
		$data['content']=$this->load->view('frontend/jobseeker/profile_seeker_view',$res,true);
		$this->load->view('frontend/jobseeker/profile_template_view',$data);
			
	
	 }
	 function update_profile(){
			varify_session();
	$jos_id = get_info('user_info','jos_id');
			//$this->form_validation->set_rules('jos_password', 'Password', 'required');
		$this->form_validation->set_rules('univ_id', 'University', 'required');
	//	$this->form_validation->set_rules('hidden', 'Photo', 'required');
		//$this->form_validation->set_rules('graduation_year', 'Graduation Year', 'required|trim');
		$this->form_validation->set_rules('grad_id', 'Graduation Year', 'required|trim');
	//	$this->form_validation->set_rules('jos_email', 'Company Email', 'required|trim|valid_email|callback_email_check');
      

		if ($this->form_validation->run())  
		 {
			
			 
			  if($_FILES["filename"]["name"]!='')
								{
								  $image_name = $_FILES["filename"]["name"];
								  $filename   = time().$_FILES["filename"]["name"];
								  $var=explode(".",basename($_FILES["filename"]["name"]));
								  $image_ext  = end( $var);
								  
								  $move_url   = PATH_DIR.'uploads/jobseekers/';
								  
								 $img_d=$this->General_model->select_where('photo_document_file','jobseekers',array('jos_id'=>$jos_id));
								if ($img_d->num_rows()> 0 )
								{
									$row=$img_d->row();
									$move_url22 = PATH_DIR.'uploads/jobseekers/'.$row->photo_document_file;
													$move_url322  = PATH_DIR.'uploads/jobseekers/thumbs/seek'.$row->photo_document_file;
													@unlink($move_url22);
													@unlink($move_url322);
													}
								
								  if(move_uploaded_file($_FILES["filename"]["tmp_name"],$move_url.$filename))
								  {
												  
									  $source_image_path = $move_url;
									  $source_image_name = $filename;
									  resize_crop_image(43,43,$source_image_path,$source_image_name,'thumbs/seek',$image_ext,true);  
									 
									
									} 
									  $data_a['photo_document_file'] = $filename;
								}
		 		$data_a['univ_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('univ_id'));
			$data_a['graduation_year']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('grad_id'));
			
			if(mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_password'))!=''){
			$data_a['jos_password']            = mysqli_real_escape_string(get_mysqliobj(),md5($this->input->post('jos_password')));
			}
			
			 $this->db->where('jos_id',$jos_id);
       $this->db->update('jobseekers',$data_a);
		
		
			
		
			
			$this->session->set_flashdata('msg','Profile Updated!');
		
			
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
			
			function own_detail($jos_sef=''){
				
					varify_session();
				$jos_id = get_info('user_info','jos_id');
				  $res['title']='';
				  $jos_id             = $this->General_model->get_field_value2(array('jos_sef'=>$jos_sef),'jos_id','jobseekers');
		    $res['seeker_data'] = $this->General_model->select_where('*','jobseekers',array('jos_id'=>$jos_id));
			
			
			  $r=$res['seeker_data']->row();
		 $res['met_des'] 		= 	$r->jos_username;
			$res['met_key'] 		= 	$r->jos_username;
			$res['title'] 		= 	$r->jos_username;
	 $res['edu_data'] = $this->General_model->select_where('*','jobseeker_eduation',array('jos_id'=>$jos_id));
	  $res['exp_data'] = $this->General_model->select_where('*','jobseeker_experience',array('jos_id'=>$jos_id));
	   $res['skill_data'] = $this->General_model->select_where('*','jobseeker_skills',array('jos_id'=>$jos_id));

		$this->load->view('frontend/jobseeker/seeker_detail_view_own',$res);
		
		
				}
			
			
			function detail($jos_sef=''){
				
					varify_session_company();
				$com_id = get_info('company_info','com_id');
				  $res['title']='';
				  $jos_id             = $this->General_model->get_field_value2(array('jos_sef'=>$jos_sef),'jos_id','jobseekers');
		    $res['seeker_data'] = $this->General_model->select_where('*','jobseekers',array('jos_id'=>$jos_id));
	 $res['edu_data'] = $this->General_model->select_where('*','jobseeker_eduation',array('jos_id'=>$jos_id));
	  $res['exp_data'] = $this->General_model->select_where('*','jobseeker_experience',array('jos_id'=>$jos_id));
	   $res['skill_data'] = $this->General_model->select_where('*','jobseeker_skills',array('jos_id'=>$jos_id));
  $r=$res['seeker_data']->row();
		 $res['met_des'] 		= 	$r->jos_username;
			$res['met_key'] 		= 	$r->jos_username;
			$res['title'] 		= 	$r->jos_username;
		$this->load->view('frontend/jobseeker/seeker_detail_view',$res);
		
		
				}
				///////////
				function update_resume(){
				
				varify_session();
	$jos_id = get_info('user_info','jos_id');
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		//$this->form_validation->set_rules('spe_id', 'Specialist', 'required');
		//$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('location', 'Location', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
         $this->form_validation->set_rules('about_uerself', 'about Yourself', 'required|trim');
		 //  $this->form_validation->set_rules('country_id', 'Country', 'required|trim');
		     $this->form_validation->set_rules('age', 'Age', 'required|trim|integer');
			   $this->form_validation->set_rules('phone', 'Phone', 'required|trim|integer|min_length[10]');
			    // $this->form_validation->set_rules('hidden2', 'Image', 'required|trim');
			   

		if ($this->form_validation->run())  
		 {
			
			  if($_FILES["filename2"]["name"]!='')
								{
								  $image_name = $_FILES["filename2"]["name"];
								  $filename   = time().$_FILES["filename2"]["name"];
								  $var=explode(".",basename($_FILES["filename2"]["name"]));
								  $image_ext  = end( $var);
								  
								  $move_url   = PATH_DIR.'uploads/jobseekers/';
								  
								  $logo=$this->General_model->select_where('image','jobseekers',array('jos_id'=>$jos_id));
								if($logo->num_rows()>0){
									$r=$logo->row();
										
											$image_name    = $r->image;
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
								}
								if($_FILES["resume_file"]["name"]!='')
								{
								  $image_name = $_FILES["resume_file"]["name"];
								  $filename   = time().$_FILES["resume_file"]["name"];
								  $var=explode(".",basename($_FILES["resume_file"]["name"]));
								  $image_ext  = end( $var);
								  
								  $move_url   = PATH_DIR.'uploads/jobseekers/';
								  
								 $logo2=$this->General_model->select_where('resume_file','jobseekers',array('jos_id'=>$jos_id));
								if($logo2->num_rows()>0){
									$r=$logo2->row();
								
										
											$image_name    = $r->resume_file;
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
									 
								}
								
		 	//$data_a['jos_username']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('name'));
					 	$data_a['name']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('name'));
							$data_a['jos_username']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('name'));
					 	$data_a['jos_headline']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_headline'));


			$data_a['spe_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_headline'));
			
			$data_a['about_uerself']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('about_uerself'));
			$data_a['location']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('location'));
			$data_a['gender']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('gender'));
		
					$data_a['gender']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('gender'));

					$data_a['country_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('country_id'));

		//$data_a['country_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('country_id'));
		
		$data_a['age']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('age'));
		$data_a['phone']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('phone'));
		$data_a['email']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('email'));
		
			$data_a['url2']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('url2'));
		$data_a['url3']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('url3'));
		$data_a['url4']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('url4'));
			$data_a['social_media_url1']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('social_media_url1'));
		
			
			
			
		$this->db->where('jos_id',$jos_id);
       $this->db->update('jobseekers',$data_a);$this->session->set_flashdata('msg','Updated.');
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
				
				////////
				
				function update_resume_details(){
					/////////////////////////eduavcooo
				varify_session();
	$jos_id = get_info('user_info','jos_id');
	
	
			$this->General_model->delete_where('jedu_id',array('jos_id'=>$jos_id),'jobseeker_eduation');
			$this->General_model->delete_where('skill_id',array('jos_id'=>$jos_id),'jobseeker_skills');
			$this->General_model->delete_where('jexp_id',array('jos_id'=>$jos_id),'jobseeker_experience');
			$school_name=$this->input->post('school_name');
			$start_school=$this->input->post('start_date');
			$degree_title=$this->input->post('degree_title');
			$end_school=$this->input->post('end_date');
			$notes=$this->input->post('notes');
			
			foreach( $school_name as $key => $n ) {
		  
		  
		     $data_edu_new['school_name']            = $n;
			$data_edu_new['start_school']       =     $start_school[$key];
			
			 $data_edu_new['degree_title']   =      $degree_title[$key]; 
			 $data_edu_new['jos_id']       =  $jos_id;
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
				$data_exp_new['jos_id']       =  $jos_id;
			$this->General_model->insert_info('jobseeker_experience',$data_exp_new);
         }
		 
		 /////////////////
		//skillsss
		
		
         
			
			$skill_name=$this->input->post('skill_name');
			$skill_pro=$this->input->post('skill_pro');
		
				
			
			foreach( $skill_name as $key => $n ) {
		  
		  
		     $data_skil_new['skill_name']            = $n;
		     $data_skil_new['jos_id']       =  $jos_id;
			$data_skil_new['skill_pro']       =  $skill_pro[$key];
			$this->General_model->insert_info('jobseeker_skills',$data_skil_new);
         }
		 
		 header('location:'.base_url().'Resume');	
					}
				
				//////////////////////////////////////////////////////////
				function save_edu(){
					varify_session();
	$jos_id = get_info('user_info','jos_id');
			$this->form_validation->set_rules('degree_title', 'Degree Title', 'required');
			$this->form_validation->set_rules('school_name', 'Name', 'required');
			
		$this->form_validation->set_rules('start_school', 'Start', 'required|trim|integer');
		$this->form_validation->set_rules('end_school', 'End', 'required|trim|integer');
		$this->form_validation->set_rules('notes', 'Notes', 'required|trim');
		
		if ($this->form_validation->run())  
		 {
			 
			

         $data_a['school_name']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('school_name'));
			$data_a['start_school']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('start_school'));
			
			 $data_a['degree_title']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('degree_title'));
			$data_a['end_school']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('end_school'));
		
			$data_a['notes']       = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('notes'));
			
			$data_a['jos_id'] =$jos_id;
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
			/////////////
			
			function update_edu($id){
					varify_session();
	$jos_id = get_info('user_info','jos_id');
			$this->form_validation->set_rules('degree_title', 'Degree Title', 'required');
			$this->form_validation->set_rules('school_name', 'Name', 'required');
			
		$this->form_validation->set_rules('start_school', 'Start', 'required');
		$this->form_validation->set_rules('end_school', 'End', 'required|trim');
		$this->form_validation->set_rules('notes', 'Notes', 'required|trim');
		
		if ($this->form_validation->run())  
		 {
			 
			

         $data_a['school_name']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('school_name'));
			$data_a['start_school']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('start_school'));
			
			 $data_a['degree_title']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('degree_title'));
			$data_a['end_school']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('end_school'));
		
			$data_a['notes']       = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('notes'));
			
			$data_a['jos_id'] =$jos_id;
			 $jedu_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('edu_'.$id));;
	   $this->db->where('jedu_id',$jedu_id);
       $this->db->update('jobseeker_eduation',$data_a);
			
			
			
			$data = array(
                    'log_error' => 'no',
					 'last_id' => $jedu_id
					 
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
			
			
		/////////////////////
		function delete_edu(){
			varify_session();
	           $jos_id = get_info('user_info','jos_id');
			$edu_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('edu_id'));
			$this->General_model->delete_where('jedu_id',array('jedu_id'=>$edu_id),'jobseeker_eduation');
			echo 'success';
			}
			
			
			function delete_skill(){
			varify_session();
	           $jos_id = get_info('user_info','jos_id');
			$skill_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skill_id'));
			$this->General_model->delete_where('skill_id',array('skill_id'=>$skill_id),'jobseeker_skills');
			echo 'success';
			}
			
			function delete_data(){
			varify_session();
	           $jos_id = get_info('user_info','jos_id');
			$this->General_model->delete_where('jedu_id',array('jos_id'=>$jos_id),'jobseeker_eduation');
			$this->General_model->delete_where('skill_id',array('jos_id'=>$jos_id),'jobseeker_skills');
			$this->General_model->delete_where('jexp_id',array('jos_id'=>$jos_id),'jobseeker_experience');
			echo 'success';
			}
			
			/////////////
				
		function save_exp(){
			varify_session();
	$jos_id = get_info('user_info','jos_id');
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
		
			$data_a['end_date']       = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('end'));
			$data_a['jos_id'] =$jos_id;
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
			
			//////////
			
			function save_skill(){
			varify_session();
	$jos_id = get_info('user_info','jos_id');
			$this->form_validation->set_rules('skill_name', 'Name', 'required');
		$this->form_validation->set_rules('skill_pro', 'Proffciency', 'required|integer');
	
		
		if ($this->form_validation->run())  
		 {
			 
			

         $data_a['skill_name']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skill_name'));
			$data_a['skill_pro']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skill_pro'));
			$data_a['jos_id'] =$jos_id;
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
			/////////////
			
				function update_skill($id){
			varify_session();
	$jos_id = get_info('user_info','jos_id');
			$this->form_validation->set_rules('skill_name', 'Name', 'required');
		$this->form_validation->set_rules('skill_pro', 'Proffciency', 'required|integer');
		
		
		if ($this->form_validation->run())  
		 {
			 
			

         $data_a['skill_name']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skill_name'));
			$data_a['skill_pro']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skill_pro'));
			
		
			 $jexp_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skill_'.$id));;
	   $this->db->where('skill_id',$jexp_id);
       $this->db->update('jobseeker_skills',$data_a);
			
			
			$data = array(
                    'log_error' => 'no',
					 'last_id' => $jexp_id
					 
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
			
			////////////
			
			function update_exp($id){
			varify_session();
	$jos_id = get_info('user_info','jos_id');
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
		
			$data_a['end_date']       = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('end'));
			$data_a['jos_id'] =$jos_id;
				$data_a['notes']       = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('notes'));
		//	$last_insert_id                = $this->General_model->insert_info('jobseeker_experience',$data_a);
			
			 $jexp_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('exp_'.$id));;
	   $this->db->where('jexp_id',$jexp_id);
       $this->db->update('jobseeker_experience',$data_a);
			
			
			$data = array(
                    'log_error' => 'no',
					 'last_id' => $jexp_id
					 
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
		///////////////////////
		function delete_exp(){varify_session();
	$jos_id = get_info('user_info','jos_id');
			$exp_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('exp_id'));
			$this->General_model->delete_where('jexp_id',array('jexp_id'=>$exp_id),'jobseeker_experience');
			echo 'success';
			}
	
}?>