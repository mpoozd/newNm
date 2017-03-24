<?php
class Cities extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'cities';
		$data['title']	= 'Manage Cities';
		
		$result['specialists']  = $this->common_model->select_all_order_by("*" , "cities" , 'city_id' , 'DESC');		
		$result['table_title'] = "Manage Cities";		
		$data['content'] = $this->load->view('admin/cities/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_city(){
		
		$data['class']	= 'cities';
		$data['title']	= 'Manage Cities';
		
		$this->form_validation->set_rules('city_name', 'city_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$data['content'] = $this->load->view('admin/cities/add_city','',true);
			$this->load->view('admin/template',$data);
		} else {
			$insert['city_name'] = $this->input->post('city_name');
			$insert['sity_sef'] = sef_urls($this->input->post('city_name'));
				
			$res = $this->common_model->insert_array("cities" , $insert);
			$this->session->set_flashdata('success_msg', "City has been added successfully.");
			redirect(base_url().'admin/cities');
		}
	}	
	
	function update_city($city_id = "")
	{
		$data['class']	= 'cities';
		$data['title']	= 'Manage Cities';
		
		$this->form_validation->set_rules('city_name', 'city_name', 'trim|required');
		if ($this->form_validation->run() === false) {
			$res_jos = $this->common_model->select_where('*' , 'cities' , array('city_id' => $city_id));
			if($res_jos->num_rows() > 0){
				$result['cities_info']	 = $res_jos->row_array();
			}
			$data['content'] = $this->load->view('admin/cities/edit_city',$result,true);
			$this->load->view('admin/template',$data);
		} else {
			$update['city_name'] = $this->input->post('city_name');
			$update['sity_sef'] = sef_urls($this->input->post('city_name'));
				
			$res = $this->common_model->update_array(array('city_id' => $city_id) , "cities" , $update);
			$this->session->set_flashdata('success_msg', "City has been updated successfully.");
			redirect(base_url().'admin/cities');
		}
	}		
	
	function delete_city($city_id = ""){
		$this->common_model->delete_where(array('city_id' => $city_id) , 'cities');
		$this->session->set_flashdata('success_msg', "City has been delete successfully.");
		redirect(base_url().'admin/cities');
	}

					
}
?>
