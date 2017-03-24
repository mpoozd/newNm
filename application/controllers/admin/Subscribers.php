<?php

class Subscribers extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	function index() {

		$data['class']	= 'subscribers';
		$data['title']  = 'Manage Subscribers';	
		
		$res = $this->common_model->select_all_order_by('*', 'subscribers','sub_id','DESC');
		
		$result['subscribers'] = $res->result_array();
		
		$result['table_title'] = "Manage Subscribers";
		
		$data['content'] = $this->load->view('admin/subscribers/subscribers_listing',$result,true);
		$this->load->view('admin/template',$data);
	}

	function update_subscriber($sub_id = "") {
		
		$this->form_validation->set_rules('sub_email', 'Subscriber Email', 'trim|required|valid_email|callback_check_email');

        	if ($this->form_validation->run() === false) {
				$data['class']	= 'subscribers';
				$data['title']  = 'Update Subscribers';	
				
				$result['table_title'] = "Update Subscriber";
				
				$res = $this->common_model->select_where('*', 'subscribers', array('sub_id' => $sub_id));
				
				
				if($res->num_rows() > 0){
					$result['subscribers'] = $res->row_array();
				}
				
				$data['content'] = $this->load->view('admin/subscribers/edit_subscriber',$result,true);
				$this->load->view('admin/template',$data);
			} else {
				
				$update['sub_email']			=	$this->input->post('sub_email');
			
				
				$result['page'] = $this->common_model->update_array(array('sub_id' => $sub_id), 'subscribers', $update);		
				$this->session->set_flashdata('update_success_msg', "The subscriber has been updated successfully");
				redirect (base_url().'admin/subscribers');
				
			}
		
	}
	
	function check_email(){ 

		$sub_email = $this->input->post("sub_email");
		
		$sub_email_old = $this->input->post("sub_email_old");
		

		if($sub_email == $sub_email_old){
		
			return true;
		} 
		else {     
			$res = $this->common_model->select_where("*" , "subscribers" , array("sub_email" => $sub_email));

			if($res->num_rows() > 0){
				$this->form_validation->set_message('check_email', 'This email is already subscribed with us');
				return false;
			} 

			else {
				return true; 
			}
		}

	}
	
	function delete_subscriber($sub_id = ""){
		
		$this->common_model->delete_where(array('sub_id' => $sub_id), 'subscribers');
		
		$this->session->set_flashdata('delete_success_msg', "The subscriber has been deleted successfully");
		redirect (base_url().'admin/subscribers');
		
	}
	
	
}