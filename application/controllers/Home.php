<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
				get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index()
	{	
	
         $data['home_bit']='active';
        $this->General_model->delete_where2(array('jos_id'=>0),'jobseeker_experience');
		$this->General_model->delete_where2(array('jos_id'=>0),'jobseeker_eduation');
	$data['companies'] 			= $this->General_model->select_where('com_id','companies',array('status_id'=>1));
	
		$data['recent_jobs'] 			= $this->General_model->get_recent_jobs_featured();
	$data['jobs'] 			= $this->General_model->select_all('jobs','job_id');
	
	
	$data['met_des'] 		= 	$this->lang->line('home_met_des');
			$data['met_key'] 		= 	$this->lang->line('home_met_key');
			$data['title'] 		= 	$this->lang->line('home_title');
		
	
	$data['seekers'] 			= $this->General_model->select_where('jos_id','jobseekers',array('status_id'=>1));
	$data['resume'] 			= $this->General_model->select_where('jos_id','jobseekers',array('status_id'=>1));
		$this->load->view('frontend/common/template',$data);
			
	
	}
	
}?>