<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pricing extends CI_Controller {

	function __construct()
	{
		parent::__construct();
			get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index()
	{	
			
			
		
	$res['pp_data']=$this->General_model->select_all('pricing_plan','*');

		$res['pricing_bit']='active';
		 $data['met_des'] 		= 	$this->lang->line('pkg_price_met_des');
			$data['met_key'] 		= 	$this->lang->line('pkg_price_met_key');
			$data['title'] 		= 	$this->lang->line('pkg_price_title');
		
		
		$res['page_below_title']=$this->lang->line('pricing_n');
		$res['page_title']=$this->lang->line('pricing_n_h');
		$data['content']=$this->load->view('frontend/home/pricing_view',$res,true);
	    $this->load->view('frontend/home/main_template',$data);
	
	
	}
}