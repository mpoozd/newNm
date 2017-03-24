<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Faq extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	 	get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index()
	{	
			
		 $types = 
		 
		
	//$res['faq_data']=$this->General_model->select_all('faq','faq_id,question,answer,faq_type_id');
	$res['types']=$this->General_model->select_all('faq_type','ftype_id,ftype_name');	
	$res['des_data']=$this->General_model->select_where('faq_id,question,answer','faq',array('faq_type_id'=>3));
	$res['security_data']=$this->General_model->select_where('faq_id,question,answer','faq',array('faq_type_id'=>3));
		$res['faq_bit']='active';
		$res['met_des'] 		= 	$this->lang->line('faq_met_des');
			$res['met_key'] 		= 	$this->lang->line('faq_met_key');
			$res['title'] 		= 	$this->lang->line('faq_title');
		
		// print_r($res['gen_data']);
	    $this->load->view('frontend/faq/faq_template',$res);
	
	
	}
}