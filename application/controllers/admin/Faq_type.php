<?php
class Faq_type extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'faq_type';
		$data['title']	= 'Manage FAQ Type';
		
		$result['faq_type']  = $this->common_model->select_all_order_by("*" , "faq_type" , 'ftype_id' , 'DESC');		
		$result['table_title'] = "Manage Faq Type";		
		$data['content'] = $this->load->view('admin/faq_type/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_faq_type(){
		
		$data['class']	= 'faq_type';
		$data['title']	= 'Add Faq Type';
		
		$this->form_validation->set_rules('ftype_name', 'ftype_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['content'] = $this->load->view('admin/faq_type/add_faq_type','',true);
			$this->load->view('admin/template',$data);
		} else {
			$insert['ftype_name'] = $this->input->post('ftype_name');
				
			$res = $this->common_model->insert_array("faq_type" , $insert);
			$this->session->set_flashdata('success_msg', "Faq Type has been added successfully.");
			redirect(base_url().'admin/faq_type');
		}
	}	
	
	function update_faq_type($ftype_id = "")
	{
		$data['class']	= 'faq_type';
		$data['title']	= 'Edit Faq Type';
		
		$this->form_validation->set_rules('ftype_name', 'ftype_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$res_jos = $this->common_model->select_where('*' , 'faq_type' , array('ftype_id' => $ftype_id));
			if($res_jos->num_rows() > 0){
				$result['faq_type_info']	 = $res_jos->row_array();
			}
			$data['content'] = $this->load->view('admin/faq_type/edit_faq_type',$result,true);
			$this->load->view('admin/template',$data);
		} else {
			$update['ftype_name'] = $this->input->post('ftype_name');
							
			$res = $this->common_model->update_array(array('ftype_id' => $ftype_id) , "faq_type" , $update);
			$this->session->set_flashdata('success_msg', "Faq Type has been updated successfully.");
			redirect(base_url().'admin/faq_type');
		}
	}		
	
	function delete_faq_type($ftype_id = ""){
		$this->common_model->delete_where(array('ftype_id' => $ftype_id) , 'faq_type');
		$this->session->set_flashdata('success_msg', "Faq Type has been delete successfully.");
		redirect(base_url().'admin/faq_type');
	}

					
}
?>
