<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Confirmation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('General_model');
			get_lang();
		$this->config->set_item('language', 'ar'); 
	} 
	
	
	
	public function index()
	{	
		
		$data['page_title'] 		= 	$this->lang->line('thankyou');
			$data['page_below_title'] 		= 	$this->lang->line('acount_active');
			
			$data['met_des'] 		= 	$this->lang->line('confirm_temp_met_des');
			$data['met_key'] 		= 	$this->lang->line('confirm_temp_met_key');
			$data['title'] 		= 	$this->lang->line('confirm_temp_title');
		
		$this->load->view('frontend/confirm_account/confirm_template',$data);
	}
	
	public function already_visited()
	{	
		
		$data['page_title'] 		= 	$this->lang->line('thankyou');
			$data['page_below_title'] 		= 	$this->lang->line('already_visited');
		
		$data['met_des'] 		= 	$this->lang->line('confirm_temp_met_des');
			$data['met_key'] 		= 	$this->lang->line('confirm_temp_met_key');
			$data['title'] 		= 	$this->lang->line('confirm_temp_title');
		$this->load->view('frontend/confirm_account/confirm_template',$data);
	}
	

	public function success()
	{	
		
		$data['contents'] 		= 	$this->load->view('frontend/confirm_account/forget_confirm_email','',true);
		$this->load->view('template',$data);
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */