<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_company extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	
			get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index()
	{
		
	   $res['title']='Register'; 
	    $res['search_com_bit']='Register';
		
		$per_page = 10;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$res['com']  =  $this->General_model->get_manage_company_search($page,$per_page);
	    $res['cat_data']  =  $this->General_model->select_all('categories','cat_name,cat_id');
		  $res['location'] = $this->General_model->select_all('cities','city_name,city_id');
		$count_pro  =  $this->General_model->get_manage_company_count();
		$config["total_rows"] = $count_pro;
		
		$config['base_url'] = base_url().'Search_company/index/';
		$config['per_page'] = $per_page;
		$this->pagination->initialize($config);
		$res["create_links"] = $this->pagination->create_links();
	 
	  $data['met_des'] 		= 	$this->lang->line('search_com_met_des');
			$data['met_key'] 		= 	$this->lang->line('search_com_met_key');
			$data['title'] 		= 	$this->lang->line('search_com_title');
		$data['content']=$this->load->view('frontend/search_companies/search_com_view',$res,true);
		
		$this->load->view('frontend/search_companies/search_com_template',$data);
	
	 }
	 
	 function filter_job_list(){
		   $category_id = $this->input->post('category_id');
     $com_name = $this->input->post('com_name');
     $com_location = $this->input->post('com_location');
 
     $params=array('category_id'=>$category_id,'com_name'=>$com_name,'com_location'=>$com_location);
     $result = $this->General_model->filter_company($params);
	
    
     $data['com'] = $result;
     $this->load->view('frontend/search_companies/search_com_ajax_view',$data);
		 }
	 
	
}?>