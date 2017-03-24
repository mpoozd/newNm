<?php
class Gender extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'gender';
		$data['title']	= 'Manage Gender';
		
		$result['gender']  = $this->common_model->select_all_order_by("*" , "gender" , 'gender_id' , 'ASC');	
		
		//print_r($result['gender']->result_array());exit;	
		$result['table_title'] = "Manage Gender";		
		$data['content'] = $this->load->view('admin/gender/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_gender(){
		
		$data['class']	= 'gender';
		$data['title']	= 'Manage Gender';
		
		$this->form_validation->set_rules('gender_name', 'Gender Name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['content'] = $this->load->view('admin/gender/add_gender','',true);
			$this->load->view('admin/template',$data);
		} else { 
			$insert['gender_name'] = $this->input->post('gender_name');
			
			$res = $this->common_model->insert_array("gender" , $insert);
			$this->session->set_flashdata('success_msg', "Gender has been added successfully.");
			redirect(base_url().'admin/gender');
		}
	}	
	
	function update_gender($gender_id = ""){
		
		$data['class']	= 'gender';
		$data['title']	= 'Update Gender';
		
		$this->form_validation->set_rules('gender_name', 'Gender Name', 'trim|required');

        	if ($this->form_validation->run() === false) {
				$res_jos = $this->common_model->select_where('*' , 'gender' , array('gender_id' => $gender_id));
				if($res_jos->num_rows() > 0){
					$result['gender']	 = $res_jos->row_array();
				}
 				$data['content'] = $this->load->view('admin/gender/edit_gender',$result,true);
				$this->load->view('admin/template',$data);
			} else {
				
				$update['gender_name'] = $this->input->post('gender_name');
					
				$res = $this->common_model->update_array(array('gender_id' => $gender_id) , "gender" , $update);
				$this->session->set_flashdata('success_msg', "Gender has been updated successfully.");
				redirect(base_url().'admin/gender');
				
				
			}
		
	}		
	
	function delete_gender($gender_id = ""){
		$this->common_model->delete_where(array('gender_id' => $gender_id) , 'gender');
		$this->session->set_flashdata('success_msg', "Gender has been delete successfully.");
		redirect(base_url().'admin/gender');
	}
}

//E:\wamp64\www\jobportalar\assets\admin\assets\pages\scripts\table-datatables-colreorder.min.js
?>
