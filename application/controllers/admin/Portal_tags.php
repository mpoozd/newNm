<?php
class Portal_tags extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'portal_tags';
		$data['title']	= 'Manage Portal Tags';
		
		$result['portal_tags']  = $this->common_model->select_all_order_by("*" , "portal_tags" , 'tag_id' , 'DESC');		
		$result['table_title'] = "Manage Portal Tags";		
		$data['content'] = $this->load->view('admin/portal_tags/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_portal_tags(){
		
		$data['class']	= 'portal_tags';
		$data['title']	= 'Add Portal Tags';
		
		$this->form_validation->set_rules('tag_name', 'tag_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['content'] = $this->load->view('admin/portal_tags/add_portal_tags','',true);
			$this->load->view('admin/template',$data);
		} else {
			$insert['tag_name'] = $this->input->post('tag_name');
			$insert['tag_sef'] = sef_urls($this->input->post('tag_name'));
			$insert['dateadded'] = time();
				
			$res = $this->common_model->insert_array("portal_tags" , $insert);
			$this->session->set_flashdata('success_msg', "Portal Tags has been added successfully.");
			redirect(base_url().'admin/portal_tags');
		}
	}	
	
	function update_portal_tags($tag_id = "")
	{
		$data['class']	= 'portal_tags';
		$data['title']	= 'Edit Portal Tags';
		
		$this->form_validation->set_rules('tag_name', 'tag_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$res_jos = $this->common_model->select_where('*' , 'portal_tags' , array('tag_id' => $tag_id));
			if($res_jos->num_rows() > 0){
				$result['portal_tags_info']	 = $res_jos->row_array();
			}
			$data['content'] = $this->load->view('admin/portal_tags/edit_portal_tags',$result,true);
			$this->load->view('admin/template',$data);
		} else {
			$update['tag_name'] = $this->input->post('tag_name');
			$update['tag_sef'] = sef_urls($this->input->post('tag_name'));
			$insert['dateadded'] = time();
							
			$res = $this->common_model->update_array(array('tag_id' => $tag_id) , "portal_tags" , $update);
			$this->session->set_flashdata('success_msg', "Portal Tags has been updated successfully.");
			redirect(base_url().'admin/portal_tags');
		}
	}		
	
	function delete_portal_tags($tag_id = ""){
		$this->common_model->delete_where(array('tag_id' => $tag_id) , 'portal_tags');
		$this->session->set_flashdata('success_msg', "Portal Tags has been delete successfully.");
		redirect(base_url().'admin/portal_tags');
	}

					
}
?>
