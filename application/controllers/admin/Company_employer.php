<?php
class Company_employer extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'company_employer';
		$data['title']	= 'Manage Company Employer';
		
		$result['company_employer']  = $this->common_model->select_all_order_by("*" , "company_employer" , 'cemp_id' , 'DESC');		
		$result['table_title'] = "Manage Company Employer";		
		$data['content'] = $this->load->view('admin/company_employer/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_company_employer(){
		
		$data['class']	= 'company_employer';
		$data['title']	= 'Add Company Employer';
		
		$this->form_validation->set_rules('cemp_name', 'cemp_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['content'] = $this->load->view('admin/company_employer/add_company_employer','',true);
			$this->load->view('admin/template',$data);
		} else {
			$insert['cemp_name'] = $this->input->post('cemp_name');
				
			$res = $this->common_model->insert_array("company_employer" , $insert);
			$this->session->set_flashdata('success_msg', "Company Employer has been added successfully.");
			redirect(base_url().'admin/company_employer');
		}
	}	
	
	function update_company_employer($cemp_id = "")
	{
		$data['class']	= 'company_employer';
		$data['title']	= 'Edit Company Employer';
		
		$this->form_validation->set_rules('cemp_name', 'cemp_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$res_jos = $this->common_model->select_where('*' , 'company_employer' , array('cemp_id' => $cemp_id));
			if($res_jos->num_rows() > 0){
				$result['cemp_info']	 = $res_jos->row_array();
			}
			$data['content'] = $this->load->view('admin/company_employer/edit_company_employer',$result,true);
			$this->load->view('admin/template',$data);
		} else {
			$update['cemp_name'] = $this->input->post('cemp_name');
							
			$res = $this->common_model->update_array(array('cemp_id' => $cemp_id) , "company_employer" , $update);
			$this->session->set_flashdata('success_msg', "Company Employer has been updated successfully.");
			redirect(base_url().'admin/company_employer');
		}
	}		
	
	function delete_company_employer($cemp_id = ""){
		$this->common_model->delete_where(array('cemp_id' => $cemp_id) , 'company_employer');
		$this->session->set_flashdata('success_msg', "Company Employer has been delete successfully.");
		redirect(base_url().'admin/company_employer');
	}

					
}
?>
