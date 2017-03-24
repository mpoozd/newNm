<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subscriber extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	
			get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index()
	{
		
		$this->form_validation->set_rules('sub_email', $this->lang->line('sub_email'), 'required|valid_email|callback_verify_email');
	
		
		if ($this->form_validation->run())  
		 {
		 	$data_a['sub_email']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('sub_email'));
			
			$data_a['dateadded']            =    time();
			$last_insert_id                 = $this->General_model->insert_info('subscribers',$data_a);
		
			$this->session->set_flashdata('msg',$this->lang->line('sub_success_msg'));
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
	 
	 function verify_email()
	{
		$email=$this->input->post('sub_email');
		$check=$this->General_model->select_where('sub_email','subscribers',array('sub_email'=>$email));
		if ($check->num_rows()>0)
		{
			$this->form_validation->set_message('verify_email',$this->lang->line('sub_email_already'));
			return false;
			}
		else
		{
			return true;
			
		}
		
		
		}
}?>