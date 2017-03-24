<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_resume extends CI_Controller {

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
		$res['search_resume_bit']='Register';
		$per_page = 10;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$res['res_data']  =  $this->General_model->get_manage_resume_search($page,$per_page);
		
		
		//$res['res_data'] = $this->common_model->select_limit_where_1('*','products',$page,$per_page);
		
		
		$res['cat_data']  =  $this->General_model->select_all('categories','cat_name,cat_id');
		
		$res['univ_data']  =  $this->General_model->select_all('universties','univ_name,univ_id');
		$res['spe_data']  =  $this->General_model->select_all('specialists','spe_name,spe_id');
		
		$res['type_data']  =  $this->General_model->select_all('job_type','jtype_name,jtype_id');
		
		$count_pro  =  $this->General_model->get_manage_resume_search_count();
		$config["total_rows"] = $count_pro;
		
		$config['base_url'] = base_url().'Search_resume/index/';
		$config['per_page'] = $per_page;
		$this->pagination->initialize($config);
		$res["create_links"] = $this->pagination->create_links();
		
		 $data['met_des'] 		= 	$this->lang->line('search_res_met_des');
			$data['met_key'] 		= 	$this->lang->line('search_res_met_key');
			$data['title'] 		= 	$this->lang->line('search_res_title');
		$data['content']=$this->load->view('frontend/search_resume/search_resume_view',$res,true);
		
		$this->load->view('frontend/search_resume/search_resume_template',$data);
	
	}
	 
	function filter_job_list(){
		$univ_id = $this->input->post('univ_id');
		$jos_username = $this->input->post('jos_username');
		$location = $this->input->post('location');
		$gender = $this->input->post('gender');
		$spe_id = $this->input->post('spe_id');
		
		
		$params=array('univ_id'=>$univ_id,'jos_username'=>$jos_username,'location'=>$location,'gender'=>$gender,'spe_id'=>$spe_id);
		$result = $this->General_model->filter_resume($params);

		
		$data['res_data'] = $result;
		
		
		$this->load->view('frontend/search_resume/search_resume_ajax_view',$data);
	}
	 
	
}?>