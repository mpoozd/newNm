<?php
class Universities extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'universities';
		$data['title']	= 'Manage Universities';
		
		$result['universties']  = $this->common_model->select_all_order_by("*" , "universties" , 'univ_id' , 'DESC');		
		$result['table_title'] = "Manage Universities";		
		$data['content'] = $this->load->view('admin/universties/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_university(){
		
		$data['class']	= 'universities';
		$data['title']	= 'Manage Universities';
		
		$this->form_validation->set_rules('univ_name', 'univ_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['content'] = $this->load->view('admin/universties/add_university','',true);
			$this->load->view('admin/template',$data);
		} else {
			$insert['univ_name'] = $this->input->post('univ_name');
			$insert['univ_sef'] = sef_urls($this->input->post('univ_name'));
				
			$res = $this->common_model->insert_array("universties" , $insert);
			$this->session->set_flashdata('success_msg', "University has been added successfully.");
			redirect(base_url().'admin/universities');
		}
	}	
	
	function update_university($univ_id = ""){
		
		$data['class']	= 'universities';
		$data['title']	= 'Manage Universities';
		
		$this->form_validation->set_rules('univ_name', 'univ_name', 'trim|required');

        	if ($this->form_validation->run() === false) {
				$res_jos = $this->common_model->select_where('*' , 'universties' , array('univ_id' => $univ_id));
				if($res_jos->num_rows() > 0){
					$result['universties_info']	 = $res_jos->row_array();
				}
 				$data['content'] = $this->load->view('admin/universties/edit_university',$result,true);
				$this->load->view('admin/template',$data);
			} else {
				
				$update['univ_name'] = $this->input->post('univ_name');
				$update['univ_sef'] = sef_urls($this->input->post('univ_name'));
					
				$res = $this->common_model->update_array(array('univ_id' => $univ_id) , "universties" , $update);
				$this->session->set_flashdata('success_msg', "University has been updated successfully.");
				redirect(base_url().'admin/universities');
				
				
			}
		
	}		
	
	function delete_university($univ_id = ""){
		$this->common_model->delete_where(array('univ_id' => $univ_id) , 'universties');
		$this->session->set_flashdata('success_msg', "University has been delete successfully.");
		redirect(base_url().'admin/universities');
	}
}
?>
