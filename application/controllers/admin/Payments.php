<?php
class Payments extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	
	function index(){	
			
		$data['class']	= 'pricing';
		$data['title']	= 'Manage Pricing';
		
		$result['payments']  = $this->common_model->select_all_order_by("*" , "pricing_plan" , 'pp_id' , 'DESC');
				
		$result['table_title'] = "Pricing Plan";		
				
		$data['content'] = $this->load->view('admin/payments/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	
	function add_payment(){
		
		$data['class']	= 'pricing';
		$data['title']	= 'Manage Pricing';
		
		$this->form_validation->set_rules('pp_name', 'pp_name', 'trim|required');
		$this->form_validation->set_rules('pp_price', 'pp_price', 'trim|required|Integer');
		$this->form_validation->set_rules('pp_no_post', 'pp_no_post', 'trim|required|Integer');
		$this->form_validation->set_rules('pp_no_featured', 'pp_no_featured', 'trim|required|Integer');
		$this->form_validation->set_rules('pp_no_day', 'pp_no_day', 'trim|required|Integer');

        	if ($this->form_validation->run() === false) {
				
 				$data['content'] = $this->load->view('admin/payments/add_payment','',true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				$insert['pp_name'] = $this->input->post('pp_name');
				$insert['pp_price'] = $this->input->post('pp_price');
				$insert['pp_job_post_number'] = $this->input->post('pp_no_post');
				$insert['pp_featured_job_post_number'] = $this->input->post('pp_no_featured');
				$insert['pp_days_listing_duration'] = $this->input->post('pp_no_day');
				$insert['dateadded'] = time();
					
				$res = $this->common_model->insert_array("pricing_plan" , $insert);
				$this->session->set_flashdata('success_msg', "Pricing plan has been added successfully.");
				redirect(base_url().'admin/payments');
				
				
			}
		
	}	
	
	function update_payment($pp_id = ""){
		
		$data['class']	= 'pricing';
		$data['title']	= 'Manage Pricing';
		
		$this->form_validation->set_rules('pp_name', 'pp_name', 'trim|required');
		$this->form_validation->set_rules('pp_price', 'pp_price', 'trim|required');
		$this->form_validation->set_rules('pp_no_post', 'pp_no_post', 'trim|required|Integer');
		$this->form_validation->set_rules('pp_no_featured', 'pp_no_featured', 'trim|required|Integer');
		$this->form_validation->set_rules('pp_no_day', 'pp_no_day', 'trim|required|Integer');

        	if ($this->form_validation->run() === false) {
				
				$res_jos = $this->common_model->select_where('*' , 'pricing_plan' , array('pp_id' => $pp_id));
				if($res_jos->num_rows() > 0){
					$result['pp_info']	 = $res_jos->row_array();
				}
				
				
				
 				$data['content'] = $this->load->view('admin/payments/edit_payment',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				$update['pp_name'] = $this->input->post('pp_name');
				$update['pp_price'] = $this->input->post('pp_price');
				$update['pp_job_post_number'] = $this->input->post('pp_no_post');
				$update['pp_featured_job_post_number'] = $this->input->post('pp_no_featured');
				$update['pp_days_listing_duration'] = $this->input->post('pp_no_day');
			
					
				$res = $this->common_model->update_array(array('pp_id' => $pp_id) , "pricing_plan" , $update);
				$this->session->set_flashdata('success_msg', "Pricing plan has been updated successfully.");
				redirect(base_url().'admin/payments');
				
				
			}
		
	}		
	
	function delete_payment($pp_id = ""){
		$this->common_model->delete_where(array('pp_id' => $pp_id) , 'pricing_plan');
		$this->session->set_flashdata('success_msg', "Pricing plan has been delete successfully.");
				redirect(base_url().'admin/payments');
	}

					
}
?>
