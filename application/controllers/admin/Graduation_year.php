<?php
class Graduation_year extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'graduation_year';
		$data['title']	= 'Manage Graduation Year';
		
		$result['graduation_year']  = $this->common_model->select_all_order_by("*" , "graduation_year" , 'grad_id' , 'DESC');	
		
		//print_r($result['gender']->result_array());exit;	
		$result['table_title'] = "Manage Graduation Year";		
		$data['content'] = $this->load->view('admin/graduation/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_graduation_year(){
		
		$data['class']	= 'graduation_year';
		$data['title']	= 'Add Graduation Year';
		
		$this->form_validation->set_rules('grad_year', 'Graduation Year', 'trim|required|integer');
		if ($this->form_validation->run() === false) {
			$data['content'] = $this->load->view('admin/graduation/add_graduation_year','',true);
			$this->load->view('admin/template',$data);
		} else { 
			$insert['grad_year'] = $this->input->post('grad_year');
			
			$res = $this->common_model->insert_array("graduation_year" , $insert);
			$this->session->set_flashdata('success_msg', "Graduation Year has been added successfully.");
			redirect(base_url().'admin/graduation_year');
		}
	}	
	
	function update_graduation_year($grad_id = ""){
		
		$data['class']	= 'graduation_year';
		$data['title']	= 'Update Graduation Year';
		
		$this->form_validation->set_rules('grad_year', 'Graduation Year', 'trim|required|integer');

        	if ($this->form_validation->run() === false) {
				$res_jos = $this->common_model->select_where('*' , 'graduation_year' , array('grad_id' => $grad_id));
				if($res_jos->num_rows() > 0){
					$result['graduation_year']	 = $res_jos->row_array();
				}
 				$data['content'] = $this->load->view('admin/graduation/edit_graduation_year',$result,true);
				$this->load->view('admin/template',$data);
			} else {
				
				$update['grad_year'] = $this->input->post('grad_year');
					
				$res = $this->common_model->update_array(array('grad_id' => $grad_id) , "graduation_year" , $update);
				$this->session->set_flashdata('success_msg', "Graduation Year has been updated successfully.");
				redirect(base_url().'admin/graduation_year');
				
				
			}
		
	}		
	
	function delete_graduation_year($grad_id = ""){
		$this->common_model->delete_where(array('grad_id' => $grad_id) , 'graduation_year');
		$this->session->set_flashdata('success_msg', "Graduation Year has been deleted successfully.");
		redirect(base_url().'admin/graduation_year');
	}
}

//E:\wamp64\www\jobportalar\assets\admin\assets\pages\scripts\table-datatables-colreorder.min.js
?>
