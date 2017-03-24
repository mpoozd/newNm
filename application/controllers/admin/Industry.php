<?php
class Industry extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'industry';
		$data['title']	= 'Manage Industry';
		
		$result['specialists']  = $this->common_model->select_all_order_by("*" , "industry" , 'ind_id' , 'DESC');		
		$result['table_title'] = "Manage Industry";		
		$data['content'] = $this->load->view('admin/industry/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_industry(){
		
		$data['class']	= 'industry';
		$data['title']	= 'Manage Industry';
		
		$this->form_validation->set_rules('ind_name', 'ind_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['content'] = $this->load->view('admin/industry/add_industry','',true);
			$this->load->view('admin/template',$data);
		} else {
			$insert['ind_name'] = $this->input->post('ind_name');
			$insert['ind_sef'] = sef_urls($this->input->post('ind_name'));
				
			$res = $this->common_model->insert_array("industry" , $insert);
			$this->session->set_flashdata('success_msg', "Industry has been added successfully.");
			redirect(base_url().'admin/industry');
		}
	}	
	
	function update_industry($ind_id = "")
	{
		$data['class']	= 'industry';
		$data['title']	= 'Manage Industry';
		
		$this->form_validation->set_rules('ind_name', 'ind_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$res_jos = $this->common_model->select_where('*' , 'industry' , array('ind_id' => $ind_id));
			if($res_jos->num_rows() > 0){
				$result['industry_info']	 = $res_jos->row_array();
			}
			$data['content'] = $this->load->view('admin/industry/edit_industry',$result,true);
			$this->load->view('admin/template',$data);
		} else {
			$update['ind_name'] = $this->input->post('ind_name');
			$update['ind_sef'] = sef_urls($this->input->post('ind_name'));
				
			$res = $this->common_model->update_array(array('ind_id' => $ind_id) , "industry" , $update);
			$this->session->set_flashdata('success_msg', "Industry has been updated successfully.");
			redirect(base_url().'admin/industry');
		}
	}		
	
	function delete_industry($ind_id = ""){
		$this->common_model->delete_where(array('ind_id' => $ind_id) , 'industry');
		$this->session->set_flashdata('success_msg', "Industry has been delete successfully.");
		redirect(base_url().'admin/industry');
	}

					
}
?>
