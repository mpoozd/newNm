<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Resume extends CI_Controller {

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
	 $res['edu_data'] = $this->General_model->select_where('*','jobseeker_eduation',array('jos_id'=>$jos_id));
	  $res['exp_data'] = $this->General_model->select_where('*','jobseeker_experience',array('jos_id'=>$jos_id));
	    $res['skill_data'] = $this->General_model->select_where('*','jobseeker_skills',array('jos_id'=>$jos_id));
      
           $res['resm_bits']=1;
		   $data['met_des'] 		= 	$this->lang->line('resu_met_des');
			$data['met_key'] 		= 	$this->lang->line('resu_met_key');
			$data['title'] 		= 	$this->lang->line('resu_title');
	  $res['uni_data']  =  $this->General_model->select_all('universties','univ_name,univ_id');
	 $res['country_data']  =  $this->General_model->select_all('countries','country_name,country_id');
	 	 $res['spe_data']  =  $this->General_model->select_all('specialists','spe_name,spe_id');
		 $res['gender_data']  =  $this->General_model->select_all('gender','gender_name,gender_id');
  $res['location'] = $this->General_model->select_all('cities','city_name,city_id');
		$data['content']=$this->load->view('frontend/resume/edit_resume_view',$res,true);
		$this->load->view('frontend/resume/resume_template_view',$data);
	
	 }
}?>