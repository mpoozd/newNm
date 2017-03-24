<?php

class Emails extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	function index() {

		$data['class']	= 'email';
		$data['title']  = 'Emails';	
		
	$result['email'] = $this->common_model->select_all('*', 'email_template');
	
	$result['table_title'] = "Emails";
	
	$data['content'] = $this->load->view('admin/email/email_listing',$result,true);
	$this->load->view('admin/template',$data);
	}



	function update_email($email_id = "") {
		
		$this->form_validation->set_rules('email_subject', 'Email Subject ', 'trim|required');
		$this->form_validation->set_rules('email_from_name', 'Email From Name', 'trim|required');
		$this->form_validation->set_rules('from_email', 'Email From', 'required|valid_email');
		$this->form_validation->set_rules('email_content', 'Email Content', 'required');

        	if ($this->form_validation->run() === false) {
				
				$data['class']	= 'email';
				$data['title']  = 'Update Email';	
				
				$email_res = $this->common_model->select_where('*', 'email_template', array('email_id' => $email_id));
				
				if($email_res->num_rows() > 0){
					$result['email_info'] = $email_res->row_array();	
				}
				
				$result['table_title'] = "Emails";
				
				$data['content'] = $this->load->view('admin/email/edit_email',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
		
				$data['email_subject']			=	$this->input->post('email_subject');
				$data['email_from_name']		=	$this->input->post('email_from_name');
				$data['	from_email']			=	$this->input->post('from_email');
				$data['email_content']			=	$this->input->post('email_content');
				
				$result['emails'] = $this->common_model->update_array(array('email_id' => $email_id), 'email_template', $data);
				$this->session->set_flashdata('success_msg', "The email has been updated successfully");
				redirect (base_url().'admin/emails');
			}

	}
}