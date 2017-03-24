<?php
class Company_type extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'company_type';
		$data['title']	= 'Manage Company Type';
		
		$result['company_type']  = $this->common_model->select_all_order_by("*" , "company_type" , 'ctype_id' , 'DESC');		
		$result['table_title'] = "Manage Company Type";		
		$data['content'] = $this->load->view('admin/company_type/ctype_listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_ctype(){
		
		$data['class']	= 'company_type';
		$data['title']	= 'Add Company Type';
		
		$this->form_validation->set_rules('ctype_name', 'Company Type Name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['content'] = $this->load->view('admin/company_type/add_ctype','',true);
			$this->load->view('admin/template',$data);
		} else {
			$insert['ctype_name'] = $this->input->post('ctype_name');
			
				
			$res = $this->common_model->insert_array("company_type" , $insert);
			$this->session->set_flashdata('success_msg', "Company Type has been added successfully.");
			redirect(base_url().'admin/company_type');
		}
	}	
	
	function update_ctype($ctype_id = ""){
		
		$data['class']	= 'company_type';
		$data['title']	= 'Update Company Type';
		
		$this->form_validation->set_rules('ctype_name', 'Company Type Name', 'trim|required');

        	if ($this->form_validation->run() === false) {
				$res_jos = $this->common_model->select_where('*' , 'company_type' , array('ctype_id' => $ctype_id));
				if($res_jos->num_rows() > 0){
					$result['ctype_name']	 = $res_jos->row_array();
				}
 				$data['content'] = $this->load->view('admin/company_type/edit_ctype',$result,true);
				$this->load->view('admin/template',$data);
			} else {
				
				$update['ctype_name'] = $this->input->post('ctype_name');
					
				$res = $this->common_model->update_array(array('ctype_id' => $ctype_id) , "company_type" , $update);
				$this->session->set_flashdata('success_msg', "Company Type has been updated successfully.");
				redirect(base_url().'admin/company_type');
				
				
			}
		
	}		
	
	function delete_ctype($ctype_id = ""){
		$this->common_model->delete_where(array('ctype_id' => $ctype_id) , 'company_type');
		$this->session->set_flashdata('success_msg', "Company Type has been deleted successfully.");
		redirect(base_url().'admin/company_type');
	}
}
?>
