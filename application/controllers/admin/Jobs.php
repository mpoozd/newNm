<?php
class Jobs extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	
	function index(){	
			
		$data['class']	= 'jobs';
		$data['title']	= 'Manage Jobs';
		
		$result['jobs']  = $this->common_model->select_all_order_by("*" , "jobs" , 'job_id' , 'DESC');
				
		$result['table_title'] = "Jobs";	
		
		$result['go_back'] = "no";	
				
		$data['content'] = $this->load->view('admin/jobs/jobs_listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	function company_jobs($company_id = ""){	
			
		$data['class']	= 'jobs';
		$data['title']	= 'Manage Jobs';
		
		$result['jobs']  = $this->common_model->select_where_ASC_DESC("*" , "jobs" , array('com_id' => $company_id) , 'job_id' , 'DESC');
				
		$result['table_title'] = "Jobs";
		
		$result['go_back'] = "yes";
				
				
		$data['content'] = $this->load->view('admin/jobs/jobs_listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
		
	function change_job_status($job_id = "" , $status = ""){
		
		$update['job_status'] = $status;
		
		$res = $this->common_model->update_array(array("job_id" => $job_id) , "jobs" , $update);
		
		$com_id = $this->common_model->select_single_field('com_id','jobs',array('job_id'=>$job_id));
		
		$job_title = $this->common_model->select_single_field('job_title','jobs',array('job_id'=>$job_id));
		
		$com_user_email = $this->common_model->select_single_field('com_user_email','companies',array('com_id'=>$com_id));
		
		$com_user_fullname = $this->common_model->select_single_field('com_user_fullname','companies',array('com_id'=>$com_id));
		
		$email_res = $this->common_model->select_where('*', 'email_template', array('email_id' => 21));
		$email_temp = $email_res->row();
		
		$content = $email_temp->email_content;
		
		$email_from = $email_temp->from_email;
		$email_subject = $email_temp->email_subject;
		$email_name = $email_temp->email_from_name;
		
		
		$updated 		= 	str_replace('user_name',$com_user_fullname,$content);
		$updated1		= 	str_replace('job_name',$job_title,$updated);
		$final_content 		= 	str_replace('{status}','Active',$updated1);
		
		$url = 'https://api.sendgrid.com/';
			
			
			$post_data = array(
			"api_user" => $this->config->item('api_user'),
			"api_key" => $this->config->item('api_key'),
			"to" => $com_user_email,
			"toname" => $email_name,
			"subject" => $email_subject,
			"html" =>  $final_content,
			"from" => $email_from,
			); 
			
			
			$request =  $url.'api/mail.send.json';
			
			// Generate curl request
			$session = curl_init($request);
			// Tell curl to use HTTP POST
			curl_setopt ($session, CURLOPT_POST, true);
			// Tell curl that this is the body of the POST
			curl_setopt ($session, CURLOPT_POSTFIELDS, $post_data);
			// Tell curl not to return headers, but do return the response
			curl_setopt($session, CURLOPT_HEADER, false);
			// Tell PHP not to use SSLv3 (instead opting for TLS)
			//curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
			
			//Turn off SSL
			curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
			curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line
			
			curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
			
			// obtain response
			$response = curl_exec($session);
			
			// print everything out
			//var_dump($response,curl_error($session),curl_getinfo($session));
			curl_close($session);
		
		$this->session->set_flashdata('success_msg', "Job status has been updated successfully.");
		redirect(base_url().'admin/jobs');
	}
	
	function change_job_feature_status($status = "" , $job_id = "" ){
		
		$update['feature_bit'] = $status;
		
		$res = $this->common_model->update_array(array("job_id" => $job_id) , "jobs" , $update);
		$this->session->set_flashdata('success_msg', "Job feature status has been updated successfully.");
		redirect(base_url().'admin/jobs');
	}
	
	function detail($job_id = ""){
		
		$data['class']	= 'users';
		$data['title']	= 'Manage Users';
		
		$this->form_validation->set_rules('job_title', 'job_title', 'trim|required');
		$this->form_validation->set_rules('salary', 'salary', 'trim|required|callback_check_numeric');
		$this->form_validation->set_rules('working_hours', 'working_hours', 'trim|required|Integer');
		$this->form_validation->set_rules('application_email', 'application_email', 'trim|required|valid_email');
		$this->form_validation->set_rules('responsibilties', 'responsibilties', 'trim|required');
		$this->form_validation->set_rules('skills_required', 'skills_required', 'trim|required');
		$this->form_validation->set_rules('short_desc', 'short_desc', 'trim|required');

        	if ($this->form_validation->run() === false) {
				
				$result['job_type'] = $this->common_model->select_all("*" , "job_type");
				
				$res_job = $this->common_model->select_where('*' , 'jobs' , array('job_id' => $job_id));
				if($res_job->num_rows() > 0){
					$result['job_info']	 = $res_job->row_array();
				}
				
				$data['content'] = $this->load->view('admin/jobs/jobs_detail',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				$update['job_title'] = $this->input->post('job_title');
				$update['salary'] = $this->input->post('salary');
				$update['working_hours'] = $this->input->post('working_hours');
				$update['application_email'] = $this->input->post('application_email');
				$update['responsibilties'] = $this->input->post('responsibilties');
				$update['skills_required'] = $this->input->post('skills_required');
				$update['short_desc'] = $this->input->post('short_desc');
		
				$res = $this->common_model->update_array(array("job_id" => $job_id) , "jobs" , $update);
				$this->session->set_flashdata('success_msg', "Job has been updated successfully.");
				redirect(base_url().'admin/jobs');
				
				
			}
		
	}
	
	function check_numeric(){		
		$salary = $this->input->post("salary");
		
		if(is_numeric($salary)){
			 return true;
		} else {
			 $this->form_validation->set_message('check_numeric', 'Please enter amount');
        	 return false;	
		}
	}	
			
}
?>
