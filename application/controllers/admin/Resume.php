<?php
class Resume extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	
	function index(){	
			
		$data['class']	= 'rsume';
		$data['title']	= 'Manage Resumes';
		
		$result['resume']  = $this->common_model->select_all_order_by("*" , "jobseekers" , 'jos_id' , 'DESC');
				
		$result['table_title'] = "Resumes";		
				
		$data['content'] = $this->load->view('admin/resume/resume_listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
function download($file_name){
					
					$b   = PATH_DIR;
	
	
	$n=$b.'uploads/jobseekers/'.$file_name;

 header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($n).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($n));
    readfile($n);
    exit;



					}
	
	
	
	function jobs_resume($job_id = ""){	
			
		$data['class']	= 'rsume';
		$data['title']	= 'Manage Resumes';
		
		
		$result['resume'] = $this->db->query("SELECT * FROM (`jobseekers`) JOIN `job_applications` ON `jobseekers`.`jos_id` = `job_applications`.`jos_id` WHERE job_applications.job_id = $job_id ");
		
		
				
		$result['table_title'] = "Resumes";		
				
		$data['content'] = $this->load->view('admin/resume/resume_listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
		
	function detail($jos_id = ""){
		
		$data['class']	= 'rsume';
		$data['title']	= 'Manage Resumes';
		
		$this->form_validation->set_rules('js_username', 'js_username', 'trim|required');
		$this->form_validation->set_rules('js_name', 'js_name', 'trim|required');
		$this->form_validation->set_rules('js_grad_year', 'js_grad_year', 'trim|required|Integer');
		$this->form_validation->set_rules('js_address', 'js_address', 'trim|required');
		$this->form_validation->set_rules('js_phone', 'js_phone', 'trim|required|Integer');
		$this->form_validation->set_rules('js_overview', 'js_overview', 'trim|required');
		$this->form_validation->set_rules('js_social_urls', 'js_social_urls', 'trim|required');

        	if ($this->form_validation->run() === false) {
				
				$result['countries'] = $this->common_model->select_all("*" , "countries");
				
				$result['universities'] = $this->common_model->select_all("*" , "universties");
				
				$result['education'] = $this->common_model->select_where("*" , "jobseeker_eduation" , array('jos_id' => $jos_id));
				
				$result['experiance'] = $this->common_model->select_where("*" , "jobseeker_experience" , array('jos_id' => $jos_id));
				
				$result['skills'] = $this->common_model->select_where("*" , "jobseeker_skills" , array('jos_id' => $jos_id));
				
				
				
				
				$res_jos = $this->common_model->select_where('*' , 'jobseekers' , array('jos_id' => $jos_id));
				if($res_jos->num_rows() > 0){
					$result['user_info']	 = $res_jos->row_array();
					
				}
				
				$data['content'] = $this->load->view('admin/resume/resume_detail',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				
						$school_name = $this->input->post('school_name');
						$school_notes = $this->input->post('school_notes');
						$school_start = $this->input->post('school_start');
						$school_end = $this->input->post('school_end');
						
						
						$this->common_model->delete_where(array('jos_id' => $jos_id) , 'jobseeker_eduation');
						
										
						for($i=0; $i < count($school_name); $i++){
							
							$edu_insert['school_name'] = $school_name[$i];
							$edu_insert['start_school'] = $school_start[$i];
							$edu_insert['end_school'] = $school_end[$i];
							$edu_insert['notes'] = $school_notes[$i];
							$edu_insert['jos_id'] = $jos_id;
							
							$this->common_model->insert_array("jobseeker_eduation" , $edu_insert);
						}
						
						
						
						$company_name = $this->input->post('company_name');
						$job_title = $this->input->post('job_title');
						$job_start = $this->input->post('job_start');
						$job_end = $this->input->post('job_end');
						$job_notes = $this->input->post('job_notes');
						
						
						$this->common_model->delete_where(array('jos_id' => $jos_id) , 'jobseeker_experience');
						
										
						for($j=0; $j < count($company_name); $j++){
							
							$exp_insert['comp_name'] = $company_name[$j];
							$exp_insert['job_title'] = $job_title[$j];
							$exp_insert['start_date'] = $job_start[$j];
							$exp_insert['end_date'] = $job_end[$j];
							$exp_insert['notes'] = $job_notes[$j];
							$exp_insert['jos_id'] = $jos_id;
							$exp_insert['dateadded'] = time();
							
							$this->common_model->insert_array("jobseeker_experience" , $exp_insert);
						}
						
						// skilsss starts
						
						$skill_name = $this->input->post('skill_name');
						$skill_pro = $this->input->post('skill_pro');
						
						
						 
						
						
						$this->common_model->delete_where(array('jos_id' => $jos_id) , 'jobseeker_skills');
						
										
						for($k=0; $k < count($skill_name); $k++){
						
							$skill_insert['skill_name'] = $skill_name[$k];
							$skill_insert['skill_pro'] = $skill_pro[$k];
							$skill_insert['skill_sef'] = sef_urls($skill_name[$k]);
							$skill_insert['jos_id'] = $jos_id;
							$skill_insert['dateadded'] = time();
							
							$this->common_model->insert_array("jobseeker_skills" , $skill_insert);
						}
						
						
						// skills ends
						
						
						
						
						
						
				
				
				
				
				$update['jos_username'] = $this->input->post('js_username');
				$update['name'] = $this->input->post('js_name');
				$update['graduation_year'] = $this->input->post('js_grad_year');
				$update['address'] = $this->input->post('js_address');
				$update['phone'] = $this->input->post('js_phone');
				$update['overview_objective'] = $this->input->post('js_overview');
				$update['social_media_url1'] = $this->input->post('js_social_urls');
				$update['country_id'] = $this->input->post('js_country');
				$update['univ_id'] = $this->input->post('js_university');
		
				$res = $this->common_model->update_array(array("jos_id" => $jos_id) , "jobseekers" , $update);
				$this->session->set_flashdata('success_msg', "User resume has been updated successfully.");
				redirect(base_url().'admin/resume');
				
				
			}
		
	}
	
	function delete_education(){
		
		$edu_id = $this->input->post('edu_id');
		
		$this->common_model->delete_where(array('jedu_id' => $edu_id) , 'jobseeker_eduation');
		
	} 
	
	
	function delete_skill(){
		
		$skill_id = $this->input->post('skill_id');
		
		$this->common_model->delete_where(array('skill_id' => $skill_id) , 'jobseeker_skills');
		
	} 
	
	function delete_experiance(){
		
		$exp_id = $this->input->post('exp_id');
		
		$this->common_model->delete_where(array('jexp_id' => $exp_id) , 'jobseeker_experience');
		
	} 
			
}
?>
