<?php
class Job_type extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'job_type';
		$data['title']	= 'Manage Job Type';
		
		$result['job_type']  = $this->common_model->select_all_order_by("*" , "job_type" , 'jtype_id' , 'DESC');		
		$result['table_title'] = "Manage Job Type";		
		$data['content'] = $this->load->view('admin/job_type/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_job_type(){
		
		$data['class']	= 'job_type';
		$data['title']	= 'Manage Job Type';
		
		$this->form_validation->set_rules('jtype_name', 'jtype_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['content'] = $this->load->view('admin/job_type/add_job_type','',true);
			$this->load->view('admin/template',$data);
		} else {
			$insert['jtype_name'] = $this->input->post('jtype_name');
			$insert['jtype_sef'] = sef_urls($this->input->post('jtype_name'));
				
			$res = $this->common_model->insert_array("job_type" , $insert);
			$this->session->set_flashdata('success_msg', "Job Type has been added successfully.");
			redirect(base_url().'admin/job_type');
		}
	}	
	
	function update_job_type($jtype_id = "")
	{
		$data['class']	= 'job_type';
		$data['title']	= 'Manage Job Type';
		
		$this->form_validation->set_rules('jtype_name', 'jtype_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$res_jos = $this->common_model->select_where('*' , 'job_type' , array('jtype_id' => $jtype_id));
			if($res_jos->num_rows() > 0){
				$result['job_type_info']	 = $res_jos->row_array();
			}
			$data['content'] = $this->load->view('admin/job_type/edit_job_type',$result,true);
			$this->load->view('admin/template',$data);
		} else {
			$update['jtype_name'] = $this->input->post('jtype_name');
			$update['jtype_sef'] = sef_urls($this->input->post('jtype_name'));
				
			$res = $this->common_model->update_array(array('jtype_id' => $jtype_id) , "job_type" , $update);
			$this->session->set_flashdata('success_msg', "Job Type has been updated successfully.");
			redirect(base_url().'admin/job_type');
		}
	}		
	
	function delete_job_type($jtype_id = ""){
		$this->common_model->delete_where(array('jtype_id' => $jtype_id) , 'job_type');
		$this->session->set_flashdata('success_msg', "Job Type has been delete successfully.");
		redirect(base_url().'admin/job_type');
	}

					
}
?>
