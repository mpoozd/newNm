<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Package extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		 	get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index()
	{	
			varify_session_company();
				$com_id = get_info('company_info','com_id');
		
	$res['pp_data']=$this->General_model->select_all('pricing_plan','*');

		$res['pack_bitc']='active';
		$res['pack_info']=$this->General_model->select_where('price_package_id,package_expirydate,job_posting_count,job_feature_posting_count,resume_search_count,resume_yes_no','companies',array('com_id'=>$com_id));
		$res['page_below_title']='We have got an awesome pricing table and package selection. You can have three package type.';
		$res['page_title']='Upgrade or Degrade Your Package';
		
		 $res['met_des'] 		= 	$this->lang->line('pkg_price_met_des');
			$res['met_key'] 		= 	$this->lang->line('pkg_price_met_key');
			$res['title'] 		= 	$this->lang->line('pkg_price_title');
		
		
		
	//	$data['content']=$this->load->view('frontend/company/package_view',$res,true);
	    $this->load->view('frontend/company/package_template',$res);
	
	
	}
	
	function upgrade_degrade($pp_id){
		
		
			$res['pack_info']=$this->General_model->select_where('*','pricing_plan',array('pp_id'=>$pp_id));
		$res['page_below_title']='We have got an awesome pricing table and package selection. You can have three package type.';
		$res['page_title']='Upgrade or Degrade Your Package';
		
		 $res['met_des'] 		= 	$this->lang->line('pkg_pur_met_des');
			$res['met_key'] 		= 	$this->lang->line('pkg_pur_met_key');
			$res['title'] 		= 	$this->lang->line('pkg_pur_title');
		
	    $data['content']=$this->load->view('frontend/company/upgrade_degrade_view',$res,true);
	    $this->load->view('frontend/jobs/job_template_view',$data);
		}
		
		function confirm(){
			
	$data_a['price_package_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('pp_id'));
		$com_id = get_info('company_info','com_id');
	
$pp_days_listing_duration             = $this->General_model->get_field_value2(array('pp_id'=>$data_a['price_package_id']),'pp_days_listing_duration','pricing_plan');

               $today=date('d-m-Y');
            $next_date= strtotime($today. ' + '.$pp_days_listing_duration.' days');

			$data_a['package_expirydate']=$next_date;
	
		$data_a['job_feature_posting_count']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('pp_featured_job_post_number'));
		
$data_a['job_posting_count']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('pp_job_post_number'));
			
			
$data_a['resume_yes_no']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('pp_show_contact'));

$data_a['resume_search_count']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('pp_num_of_resume'));

			
		 $this->db->where('com_id',$com_id);
       $this->db->update('companies',$data_a);
	   $user_info2['price_package_id'] 	= 	$data_a['price_package_id'];
	   
	   
	           $user_info2['com_user_email'] 		= get_info('company_info','com_user_email');
				$user_info2['com_id'] 		=get_info('company_info','com_id');
				$user_info2['com_user_fullname'] 	= get_info('company_info','com_user_fullname');
					$user_info2['login_bit'] 	=1;
				$this->session->set_userdata('company_login',$user_info2['login_bit']); 
			
				
				$this->session->set_userdata('company_info',$user_info2); 
	   
			$data = array(
                    'log_error' => 'no'
            );
		
		
		//print_r($data);
		 echo json_encode($data);
			}
}