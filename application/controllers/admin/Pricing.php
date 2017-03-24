<?php

class Pricing extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	function index() { 

		$data['class']	= 'pricing';
		$data['title']  = 'Manage Pricing Packages';
		
		$res = $res = $this->db->query("SELECT * FROM pricing_plan ORDER BY dateadded DESC");
		
		
		if ($res->num_rows() > 0) {
			$result['price_plan']	=	$res->result_array();
		}
		else { $result['price_plan'] = ''; }
	
		$result['table_title'] = "Manage Pricing Plans";
	
		$data['content'] = $this->load->view('admin/pricing/pricing_plan', $result, true);
		$this->load->view('admin/template',$data);
	}

	function add_pricing_plan(){
		
		$data['class']	= 'pricing';
		$data['title']	= 'Add Pricing Plan';
		
		$result['table_title'] = "Add Price Plan";
		
		$this->form_validation->set_rules('package_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('package_price', 'Price', 'trim|required|callback_check_numeric');
		$this->form_validation->set_rules('job_post_number', 'Job Post Number', 'trim|required|integer');
		$this->form_validation->set_rules('featured_job_post_number', 'Featured Job Post Number', 'trim|required|integer');
		$this->form_validation->set_rules('job_listing_duration', 'Duration', 'trim|required|integer');
		if($this->input->post("show_contact") == "1"){
			$this->form_validation->set_rules('num_resume', 'Number of Resume', 'trim|required|greater_than[0]');
		}

        	if ($this->form_validation->run() === false) {
				
				$data['content'] = $this->load->view('admin/pricing/add_pricing_plan',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				
				
				
				$insert['pp_name'] 						= $this->input->post("package_name");
				$insert['pp_price'] 					= $this->input->post("package_price");
				$insert['pp_job_post_number'] 			= $this->input->post("job_post_number");
				$insert['pp_featured_job_post_number']	= $this->input->post("featured_job_post_number");
				$insert['pp_days_listing_duration']		= $this->input->post("job_listing_duration");
				$insert['dateadded']					= time();
				if($this->input->post("show_contact") == "1"){
					$insert['pp_show_contact']		= $this->input->post("show_contact");
					$insert['pp_num_of_resume']		= $this->input->post("num_resume");
				}  
				
				
				$this->common_model->insert_array('pricing_plan' , $insert);
				
				$this->session->set_flashdata('price_success_msg', "New Pricing Package has been added successfully.");
				redirect(base_url() . 'admin/pricing');	
				
			}
		
		}
		
		
	function update_plan($plan_id = ""){
		
		$data['class']	= 'pricing';
		$data['title']	= 'Update Pricing Plan';
		
		$result['table_title'] = "Update Pricing Plan";
		
		$this->form_validation->set_rules('package_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('package_price', 'Price', 'trim|required|callback_check_numeric');
		$this->form_validation->set_rules('job_post_number', 'Job Post Number', 'trim|required|integer');
		$this->form_validation->set_rules('featured_job_post_number', 'Featured Job Post Number', 'trim|required|integer');
		$this->form_validation->set_rules('job_listing_duration', 'Duration', 'trim|required|integer');
		if($this->input->post("show_contact") == "1"){
			$this->form_validation->set_rules('num_resume', 'Number of Resume', 'trim|required|greater_than[0]');
		}
		
		
        	if ($this->form_validation->run() === false) {
				
				$res = $this->common_model->select_where("*" , "pricing_plan" , array('pp_id' => $plan_id));
				
				if($res->num_rows() > 0){
					$result['price_plan'] = $res->row_array();	
				}
				
				$data['content'] = $this->load->view('admin/pricing/update_pricing_plan',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {

				$insert['pp_name'] 						= $this->input->post("package_name");
				$insert['pp_price'] 					= $this->input->post("package_price");
				$insert['pp_job_post_number'] 			= $this->input->post("job_post_number");
				$insert['pp_featured_job_post_number'] 	= $this->input->post("featured_job_post_number");
				$insert['pp_days_listing_duration'] 	= $this->input->post("job_listing_duration");
				if($this->input->post("show_contact") == "1"){
					$insert['pp_show_contact']		= $this->input->post("show_contact");
					$insert['pp_num_of_resume']		= $this->input->post("num_resume");
				} else {
					$insert['pp_show_contact']		= '0';
					$insert['pp_num_of_resume']		= '0';
				}
					
				$this->common_model->update_array(array('pp_id' => $plan_id) , "pricing_plan" , $insert);  
				
				$this->session->set_flashdata('update_success_msg', "Pricing Package has been updated successfully.");
				redirect(base_url() . 'admin/pricing');	
				
			}
		
		}


	function delete_plan($plan_id = ""){
		
		$this->common_model->delete_where(array('pp_id' => $plan_id), 'pricing_plan');
		$this->session->set_flashdata('delete_plan_msg', "Package has been deleted successfully.");
		redirect(base_url() . 'admin/pricing');
		
	}
	
	
	function check_numeric(){		
		$package_price = $this->input->post("package_price");
		
		if(is_numeric($package_price)){
			 return true;
		} else {
			 $this->form_validation->set_message('check_numeric', 'Please enter amount');
        	 return false;	
		}
	}	
		
}