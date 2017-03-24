<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Job extends CI_Controller {

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

      $res['pp_data']=$this->General_model->select_all('pricing_plan','pp_id,pp_name,pp_price,pp_job_post_number,pp_featured_job_post_number,pp_days_listing_duration');
           $res['post_bitc']=1;
		   
		   
	
		   $data['met_des'] 		= 	$this->lang->line('add_job_met_des');
			$data['met_key'] 		= 	$this->lang->line('add_job_met_key');
			$data['title'] 		= 	$this->lang->line('add_job_title');
		   
		   
		   $res['pack_info']=$this->General_model->select_where('price_package_id,package_expirydate,job_posting_count,job_feature_posting_count','companies',array('com_id'=>$com_id));
		 	 $res['gender_data']  =  $this->General_model->select_all('gender','gender_name,gender_id');
		   		$res['location'] = $this->General_model->select_all('cities','city_name,city_id');

	 $res['cats_data']  =  $this->General_model->select_all('categories','cat_name,cat_sef,cat_id');
	  $res['type_data']  =  $this->General_model->select_all('job_type','jtype_id,jtype_name');
		$data['content']=$this->load->view('frontend/jobs/post_job_view',$res,true);
		$this->load->view('frontend/jobs/job_template_view',$data);
	
	 }
	 ///////////////////
	 
	 function edit($job_sef='')
	{
       varify_session_company();
	$com_id = get_info('company_info','com_id');

     
           $res['post_bitc']=1;
		   $res['title']='Add Job';
		   
		    $data['met_des'] 		= 	$this->lang->line('edit_job_met_des');
			$data['met_key'] 		= 	$this->lang->line('edit_job_met_key');
			$data['title'] 		= 	$this->lang->line('edit_job_title');
		   
		   $res['pack_info']=$this->General_model->select_where('price_package_id,package_expirydate,job_posting_count,job_feature_posting_count','companies',array('com_id'=>$com_id));
		  $res['gender_data']  =  $this->General_model->select_all('gender','gender_name,gender_id');
		   $res['job']=   $this->General_model->select_where('*','jobs',array('job_sef'=>$job_sef));
	 $res['cats_data']  =  $this->General_model->select_all('categories','cat_name,cat_sef,cat_id');
	  $res['type_data']  =  $this->General_model->select_all('job_type','jtype_id,jtype_name');
	  		$res['location'] = $this->General_model->select_all('cities','city_name,city_id');

		$data['content']=$this->load->view('frontend/jobs/edit_job_view',$res,true);
		$this->load->view('frontend/jobs/job_template_view',$data);
	
	 }
	 ////////////////
	 
	function edit_job(){
			varify_session_company();
		$com_id = get_info('company_info','com_id');
		$this->form_validation->set_rules('job_title', $this->lang->line('job_title'), 'required');
		$this->form_validation->set_rules('category_id', $this->lang->line('category_id'), 'required');
		$this->form_validation->set_rules('short_dec', $this->lang->line('short_dec'), 'required|trim');
		
		$this->form_validation->set_rules('application_email',$this->lang->line('application_email'), 'required|trim|valid_email');
         $this->form_validation->set_rules('job_location', $this->lang->line('job_location'), 'required|trim');
		 
		  $this->form_validation->set_rules('salary', $this->lang->line('salary'), 'required|trim');

 $this->form_validation->set_rules('working_hours', $this->lang->line('working_hours'), 'required|trim');

 $this->form_validation->set_rules('experience_id',$this->lang->line('experience_id'), 'required|trim');
 $this->form_validation->set_rules('gender',$this->lang->line('gender'), 'required|trim');

 $this->form_validation->set_rules('responsibilties',$this->lang->line('responsibilties'), 'required|trim');

 $this->form_validation->set_rules('skills', $this->lang->line('skills'), 'required|trim');


		if ($this->form_validation->run())  
		 {
			
			 
			
			 
		 	$data_a['job_title']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_title'));
			$data_a['job_sef']=             $this->SEF_URLS($this->input->post('job_title'));
		
			$data_a['category_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('category_id'));
			$data_a['com_id']  =$com_id;
			$data_a['short_desc']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('short_dec'));
			$data_a['application_email']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('application_email'));
			$data_a['job_location']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_location'));
				
				
				$data_a['job_type_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_type_id'));
				
				//$pkg_id=get_info('company_info','price_package_id');
//$pp_days_listing_duration             = $this->General_model->get_field_value2(array('pp_id'=>$pkg_id),'pp_days_listing_duration','pricing_plan');

              // $today=date('d-m-Y');
          //  $next_date= strtotime($today. ' + '.$pp_days_listing_duration.' days');

			//$data_c['package_expirydate']=$next_date;
		
		$data_a['salary']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('salary'));
		
		$data_a['working_hours']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('working_hours'));
		
		$data_a['experience_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('experience_id'));
		
		$data_a['gender']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('gender'));
		
		$data_a['responsibilties']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('responsibilties'));
		$data_a['skills_required']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skills'));
		
			//$data_a['dateadded']=time();
			
		
		//	$data_a['job_status']=0;
			

			 	 	 $this->db->where('job_id',mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_id')));
       $this->db->update('jobs',$data_a);
			
			//$last_insert_id                = $this->General_model->insert_info('jobs',$data_a);
			$this->session->set_flashdata('msg',$this->lang->line('success_job'));
		
			
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
			
			
			///////////////////////////
			function add_job(){
			varify_session_company();
		$com_id = get_info('company_info','com_id');
		$com_id = get_info('company_info','com_id');
		$this->form_validation->set_rules('job_title', $this->lang->line('job_title'), 'required');
		$this->form_validation->set_rules('category_id', $this->lang->line('category_id'), 'required');
		$this->form_validation->set_rules('short_dec', $this->lang->line('short_dec'), 'required|trim');
		
		$this->form_validation->set_rules('application_email',$this->lang->line('application_email'), 'required|trim|valid_email');
         $this->form_validation->set_rules('job_location', $this->lang->line('job_location'), 'required|trim');
		 
		  $this->form_validation->set_rules('salary', $this->lang->line('salary'), 'required|trim');

 $this->form_validation->set_rules('working_hours', $this->lang->line('working_hours'), 'required|trim');

 $this->form_validation->set_rules('experience_id',$this->lang->line('experience_id'), 'required|trim');
 $this->form_validation->set_rules('gender',$this->lang->line('gender'), 'required|trim');

 $this->form_validation->set_rules('responsibilties',$this->lang->line('responsibilties'), 'required|trim');

 $this->form_validation->set_rules('skills', $this->lang->line('skills'), 'required|trim');


		if ($this->form_validation->run())  
		 {
			
			 
			
			 
		 	$data_a['job_title']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_title'));
			$data_a['job_sef']=               get_trans_id(10);
		
			$data_a['category_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('category_id'));
			$data_a['com_id']  =$com_id;
			$data_a['short_desc']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('short_dec'));
			$data_a['application_email']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('application_email'));
			$data_a['job_location']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_location'));
				
				
				$data_a['job_type_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_type_id'));
				
				$pkg_id=get_info('company_info','price_package_id');
				
$pp_days_listing_duration             = $this->General_model->get_field_value2(array('pp_id'=>$pkg_id),'pp_days_listing_duration','pricing_plan');

               $today=date('d-m-Y');
            //$next_date= strtotime($today. ' + '.$pp_days_listing_duration.' days');
			
			 $com_info=$this->General_model->select_where('com_id,package_expirydate,job_posting_count','companies',array('com_id'=>$com_id));
			 if($com_info->num_rows()>0){
				$rt= $com_info->row();
				 }
		 



			$today=date('d-m-Y');
            $next_date= strtotime($today. ' + '.$pp_days_listing_duration.' days');

			$data_a['package_expirydate']=$next_date;

			
			$data_a['price_package_id']=$pkg_id;
		
		$data_a['salary']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('salary'));
		
		$data_a['working_hours']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('working_hours'));
		
		$data_a['experience_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('experience_id'));
		
		$data_a['gender']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('gender'));
		
		$data_a['responsibilties']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('responsibilties'));
		$data_a['skills_required']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('skills'));
		
			$data_a['dateadded']=time();
			
		
			$data_a['job_status']=1;
			

			 	 	
			
			$last_insert_id                = $this->General_model->insert_info('jobs',$data_a);
			
				$data_f['job_posting_count']=$rt->job_posting_count-1;
	   $this->db->where('com_id',$com_id);
       $this->db->update('companies',$data_f);
			$this->session->set_flashdata('msg',$this->lang->line('success_update'));
		
			
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
			///////////////////////////////////
			
			function manage_jobs(){
				varify_session_company();
				$com_id = get_info('company_info','com_id');

      $res['page_below_title']=$this->lang->line('m_above_page');
		$res['page_title']=$this->lang->line('m_above_mg_j');
           $res['mng_bitc']=1;
		    $data['met_des'] 		= 	$this->lang->line('mng_job_met_des');
			$data['met_key'] 		= 	$this->lang->line('mng_job_met_key');
			$data['title'] 		= 	$this->lang->line('mng_job_title');

	$res['jobs_data']=$this->General_model->get_company_jobs($com_id);
		$data['content']=$this->load->view('frontend/jobs/manage_job_view',$res,true);
		$this->load->view('frontend/home/main_template',$data);
				
				}/////
				
				
				function manage_resume()
				{
						varify_session_company();
				$com_id = get_info('company_info','com_id');

      $res['page_below_title']=$this->lang->line('r_above_page');
		$res['page_title']=$this->lang->line('r_above_mg_j');
           $res['res_bitc']=1;
		    $data['met_des'] 		= 	$this->lang->line('mng_resume_job_met_des');
			$data['met_key'] 		= 	$this->lang->line('mng_resume_job_met_key');
			$data['title'] 		= 	$this->lang->line('mng_resume_job_title');

	$res['res_data']=$this->General_model->get_manage_resume_list($com_id);
		$data['content']=$this->load->view('frontend/jobs/manage_resume_list_com',$res,true);
		$this->load->view('frontend/home/main_template',$data);
					
				}
				
				
				///
				
		function delete_job(){
			$job_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('job_id'));
		//	$this->General_model->delete_where('job_id',array('job_id'=>$job_id),'jobs');
		
		$data_f['job_status']=0;
	   $this->db->where('job_id',$job_id);
       $this->db->update('jobs',$data_f);
			echo 'success';
			}
			////////////////////////////////
				function job_detail($sef=''){
			
       
		   $res['title']='';
		$res['jobs']=$this->General_model->get_company_job_detail($sef);
		$r=$res['jobs']->row();
		 $res['met_des'] 		= 	$r->job_title;
			$res['met_key'] 		= 	$r->job_title;
			$res['title'] 		= 	$r->job_title;
		$this->load->view('frontend/jobs/job_detail_view',$res);
				}
		
			////////////////////////////////
				function company_detail($sef=''){
			
		   $res['title']='';
		   $res['com_info']=$this->General_model->get_company_detail2($sef);
		   
		   $r=$res['com_info']->row();
		 $res['met_des'] 		= 	$r->com_name;
			$res['met_key'] 		= 	$r->com_name;
			$res['title'] 		= 	$r->com_name;
		$res['vacancies']=$this->General_model->get_company_detail($sef);
		$this->load->view('frontend/jobs/company_detail_view',$res);
				
				}/////
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