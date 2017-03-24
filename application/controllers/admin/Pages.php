<?php

class Pages extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	
	
	function index() {

		$data['class']	= 'page_listing';
		$data['title']  = 'Manage Pages';	
		
		$result['page'] = $this->common_model->select_all('*', 'pages');
		
		$result['table_title'] = "Manage Pages";
		
		$data['content'] = $this->load->view('admin/pages/page_listing',$result,true);
		$this->load->view('admin/template',$data);
	}


	function update_page($page_id = "") {
		
		$this->form_validation->set_rules('page_name', 'Page Name', 'trim|required');
		$this->form_validation->set_rules('page_meta_title', 'Page Meta Title', 'trim|required');
		$this->form_validation->set_rules('page_meta_keywords', 'Page Meta Keyword', 'required');
		$this->form_validation->set_rules('page_meta_desc', 'Page Meta Description', 'required');
		$this->form_validation->set_rules('page_content', 'Page Content', 'required');

		if ($this->form_validation->run() === false) {
			$data['class']	= 'page_listing';
			$data['title']  = 'Update Page';	
			
			$result['page'] = $this->common_model->select_where('*', 'pages', array('page_id' => $page_id))->row();
			
			$result['table_title'] = "Update Page";
			
			$data['content'] = $this->load->view('admin/pages/edit_page',$result,true);
			$this->load->view('admin/template',$data);
		} else {
			
			$page_id					=	$this->input->post('page_id');
			$data['page_name']			=	$this->input->post('page_name');
			$data['page_meta_title']	=	$this->input->post('page_meta_title');
			$data['page_meta_keywords']	=	$this->input->post('page_meta_keywords');
			$data['page_meta_desc']		=	$this->input->post('page_meta_desc');
			$data['page_content']		=	$this->input->post('page_content');
			
			
			$data['page_sef']			=	sef_urls($this->input->post('page_name'));
			
			$result['page'] = $this->common_model->update_array(array('page_id' => $page_id), 'pages', $data);		
			$this->session->set_flashdata('update_page', "The page has been updated successfully");
			redirect (base_url().'admin/pages');
			
		}		
	}
	
	function delete_page($page_id = ""){
		
		$this->common_model->delete_where(array('page_id' => $page_id), 'pages');
		
		$this->session->set_flashdata('delete_msg', "The Page has been deleted successfully");
		redirect (base_url().'admin/pages');
		
	}
	
}