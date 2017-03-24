<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_job extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	
			get_lang();
		$this->config->set_item('language', 'ar'); 
		$this->load->library('Pagination');
	}
	function index()
	{
		
		$res['title']='Register'; 
		$res['search_job_bit']='Register';
		$per_page = 10;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		
		$res['jobs']  =  $this->General_model->get_browse_recent_search($page,$per_page);
		$res['cat_data']  =  $this->General_model->select_all('categories','cat_name,cat_id');
		
		$res['type_data']  =  $this->General_model->select_all('job_type','jtype_name,jtype_id');
				  $res['location'] = $this->General_model->select_all('cities','city_name,city_id');
		$count_pro  =  $this->General_model->get_browse_recent_count();
		$config["total_rows"] = $count_pro;
		
		$config['base_url'] = base_url().'Search_job/index/';
		$config['per_page'] = $per_page;
		$this->pagination->initialize($config);
		$res["create_links"] = $this->pagination->create_links();
		 $data['met_des'] 		= 	$this->lang->line('search_job_met_des');
			$data['met_key'] 		= 	$this->lang->line('search_job_met_key');
			$data['title'] 		= 	$this->lang->line('search_job_title');
		$data['content']=$this->load->view('frontend/search_job/search_job_view',$res,true);
		
		$this->load->view('frontend/search_job/search_job_template',$data);
	
	 }
	 
	 function filter_job_list(){
		   $category_id = $this->input->post('category_id');
		 $job_title = $this->input->post('job_title');
		 $job_location = $this->input->post('job_location');
		 $job_type_id = $this->input->post('job_type_id');
		 $salary = $this->input->post('salary');
		 $salary_max = $this->input->post('max_sal');
		 $arr = explode('-',$salary);
		 $min_salary = $arr[0];
		 $max_salary = end($arr);
		 
	
		 $working_hours = $this->input->post('working_hours');
		
	//exit;
		 $params=array('category_id'=>$category_id,'job_title'=>$job_title,'job_location'=>$job_location,'job_type_id'=>$job_type_id,'min_salary'=>$min_salary,'max_salary'=>$max_salary,'working_hours'=>$working_hours,'salary_max' =>$salary_max );
		 $result = $this->General_model->filter_jobs($params);
		
		
		 $data['jobs'] = $result;
		 $this->load->view('frontend/search_job/search_job_ajax_view',$data);
	}
		 ////////////////////////////////
		 
		 
		 
	 function filter_job_list_home(){
     $job_title = $this->input->post('job_title');
     $job_location = $this->input->post('job_location');
  
//exit;
     $params=array('job_title'=>$job_title,'job_location'=>$job_location);
     $result = $this->General_model->filter_jobs_home($params);
	
    
     $data['recent_jobs'] = $result;
     $this->load->view('frontend/home/search_job_home_ajax_view',$data);
		 }
	
}?>