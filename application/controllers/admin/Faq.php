<?php

class Faq extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	function index() {

		$data['class']	= 'faq';
		$data['title']  = 'Manage FAQs';	
		
		$result['faq'] = $this->common_model->select_all('*', 'faq');
		
		$result['table_title'] = "Manage FAQs";
		
		$data['content'] = $this->load->view('admin/faq/faq_listing',$result,true);
		$this->load->view('admin/template',$data);
	}

	function add_faq(){
		
		$data['class']	= 'faq';
		$data['title']	= 'Add FAQ';
		
		$result['table_title'] = "Add FAQ";
		
		$this->form_validation->set_rules('ftype_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('question', 'Question', 'trim|required');
		$this->form_validation->set_rules('answer', 'Answer', 'trim|required');
		

        	if ($this->form_validation->run() === false) {
				
				
				$result['ftype_name'] = $this->db->query("SELECT * FROM faq_type ORDER BY ftype_id ASC")->result_array();
				
				$data['content'] = $this->load->view('admin/faq/add_faq',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				$insert['faq_type_id'] 	= $this->input->post("ftype_name");
				$insert['question'] 	= $this->input->post("question");
				$insert['answer'] 		= $this->input->post("answer");
				$insert['dateadded']	= time();
				
				$this->common_model->insert_array('faq' , $insert);
				
				$this->session->set_flashdata('success_msg', "New FAQ has been added successfully.");
				redirect(base_url() . 'admin/faq');	
				
			}
		
		}
		
		
	function update_faq($faq_id = ""){
		
		$data['class']	= 'faq';
		$data['title']	= 'Update FAQ';
		
		$result['table_title'] = "Update FAQ";
		
		$this->form_validation->set_rules('ftype_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('question', 'Question', 'trim|required');
		$this->form_validation->set_rules('answer', 'Answer', 'trim|required');
		
        	if ($this->form_validation->run() === false) {
				
				$res = $this->common_model->select_where("*" , "faq" , array('faq_id' => $faq_id));
				
				if($res->num_rows() > 0){
					$result['faq'] = $res->row_array();	
				}
				
				$result['ftype_name'] = $this->db->query("SELECT * FROM faq_type ORDER BY ftype_id ASC")->result_array();
				
				$data['content'] = $this->load->view('admin/faq/update_faq',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {

				$insert['faq_type_id'] 	= $this->input->post("ftype_name");
				$insert['question'] 	= $this->input->post("question");
				$insert['answer'] 		= $this->input->post("answer");
				$insert['dateadded']	= time();
				
					
				$this->common_model->update_array(array('faq_id' => $faq_id) , "faq" , $insert);  
				
				$this->session->set_flashdata('update_success_msg', "FAQ has been updated successfully.");
				redirect(base_url() . 'admin/faq');	
				
			}
		
		}


	function delete_faq($faq_id = ""){
		
		$this->common_model->delete_where(array('faq_id' => $faq_id), 'faq');
		$this->session->set_flashdata('delete_faq_msg', "FAQ has been deleted successfully.");
		redirect(base_url() . 'admin/faq');
		
	}
	
		
}