<?php
class Specialists extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'specialists';
		$data['title']	= 'Manage Specialists';
		
		$result['specialists']  = $this->common_model->select_all_order_by("*" , "specialists" , 'spe_id' , 'DESC');		
		$result['table_title'] = "Manage Specialists";		
		$data['content'] = $this->load->view('admin/specialists/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_specialist(){
		
		$data['class']	= 'specialists';
		$data['title']	= 'Manage Specialists';
		
		$this->form_validation->set_rules('spe_name', 'spe_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['content'] = $this->load->view('admin/specialists/add_specialist','',true);
			$this->load->view('admin/template',$data);
		} else {
			$insert['spe_name'] = $this->input->post('spe_name');
			$insert['spe_sef'] = sef_urls($this->input->post('spe_name'));
				
			$res = $this->common_model->insert_array("specialists" , $insert);
			$this->session->set_flashdata('success_msg', "Specialist has been added successfully.");
			redirect(base_url().'admin/specialists');
		}
	}	
	
	function update_specialist($spe_id = "")
	{
		$data['class']	= 'specialists';
		$data['title']	= 'Manage Specialists';
		
		$this->form_validation->set_rules('spe_name', 'spe_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$res_jos = $this->common_model->select_where('*' , 'specialists' , array('spe_id' => $spe_id));
			if($res_jos->num_rows() > 0){
				$result['universties_info']	 = $res_jos->row_array();
			}
			$data['content'] = $this->load->view('admin/specialists/edit_specialist',$result,true);
			$this->load->view('admin/template',$data);
		} else {
			$update['spe_name'] = $this->input->post('spe_name');
			$update['spe_sef'] = sef_urls($this->input->post('spe_name'));
				
			$res = $this->common_model->update_array(array('spe_id' => $spe_id) , "specialists" , $update);
			$this->session->set_flashdata('success_msg', "Specialist has been updated successfully.");
			redirect(base_url().'admin/specialists');
		}
	}		
	
	function delete_specialist($spe_id = ""){
		$this->common_model->delete_where(array('spe_id' => $spe_id) , 'specialists');
		$this->session->set_flashdata('success_msg', "Specialist has been delete successfully.");
		redirect(base_url().'admin/specialists');
	}

					
}
?>
