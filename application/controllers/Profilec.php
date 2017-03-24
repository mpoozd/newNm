<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profilec extends CI_Controller {

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
    $res['company_data'] = $this->General_model->select_where('*','companies',array('com_id'=>$com_id));
      $res['pp_data']=$this->General_model->select_all('pricing_plan','pp_id,pp_name,pp_price,pp_job_post_number,pp_featured_job_post_number,pp_days_listing_duration');
           $res['po_bitc']=1;
		    $res['emp_data']=$this->General_model->select_all('company_employer','*');
		  $res['ctype']=$this->General_model->select_all('company_type','*');
		   $res['title']='Register';
	  $res['uni_data']  =  $this->General_model->select_all('universties','univ_name,univ_id');
	 $res['country_data']  =  $this->General_model->select_all('countries','country_name,country_id');
	 	 $res['spe_data']  =  $this->General_model->select_all('specialists','spe_name,spe_id');
		 $res['location'] = $this->General_model->select_all('cities','city_name,city_id');



 $data['met_des'] 		= 	$this->lang->line('profile_met_des');
			$data['met_key'] 		= 	$this->lang->line('profile_met_key');
			$data['title'] 		= 	$this->lang->line('profile_title');
		$data['content']=$this->load->view('frontend/company/profile_com_view',$res,true);
		$this->load->view('frontend/company/profile_template_view',$data);
			
	
	 }
	 function update_profile(){
			varify_session_company();
		$com_id = get_info('company_info','com_id');
		$this->form_validation->set_rules('com_user_fullname', $this->lang->line('name'), 'required');
		//$this->form_validation->set_rules('user_password', 'Passsword', 'required');
		$this->form_validation->set_rules('com_name', $this->lang->line('com_name'), 'required');
		$this->form_validation->set_rules('short_description',$this->lang->line('short_dec'), 'required');
		$this->form_validation->set_rules('com_website', $this->lang->line('com_website'), 'required|trim');
		$this->form_validation->set_rules('com_location', $this->lang->line('com_location'), 'required|trim');
		$this->form_validation->set_rules('com_email',$this->lang->line('com_email'), 'required|trim|valid_email');
         $this->form_validation->set_rules('com_phone_number', $this->lang->line('com_phone_number'), 'required|trim');


		if ($this->form_validation->run())  
		 {
			
			 
			  if($_FILES["filename"]["name"]!='')
								{
								  $image_name = $_FILES["filename"]["name"];
								  $filename   = time().$_FILES["filename"]["name"];
								  $var=explode(".",basename($_FILES["filename"]["name"]));
								  $image_ext  = end( $var);
								  
								  $move_url   = PATH_DIR.'uploads/company_logo/';
								  
								 $img_d=$this->General_model->select_where('com_logo','companies',array('com_id'=>$com_id));
								if ($img_d->num_rows()> 0 )
								{
									$row=$img_d->row();
									$move_url22 = PATH_DIR.'uploads/company_logo/'.$row->com_logo;
													$move_url322  = PATH_DIR.'uploads/company_logo/thumbs/com'.$row->com_logo;
													@unlink($move_url22);
													@unlink($move_url322);
													}
								
								  if(move_uploaded_file($_FILES["filename"]["tmp_name"],$move_url.$filename))
								  {
												  
									  $source_image_path = $move_url;
									  $source_image_name = $filename;
									  resize_crop_image(43,43,$source_image_path,$source_image_name,'thumbs/com',$image_ext,true);  
									 
									
									} 
									  $data_a['com_logo'] = $filename;
								}
		 	$data_a['com_name']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_name'));
			$data_a['short_description']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('short_description'));
			
			$data_a['com_location']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_location'));
			$data_a['com_website']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_website'));
					$data_a['com_email']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_email'));

		
		$data_a['com_phone_number']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_phone_number'));
		
		$data_a['cemp_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('cemp_id'));
		
		
		$data_a['ctype_id']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('ctype_id'));
		
		
		
         $data_a['com_user_fullname']            = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('com_user_fullname'));
		 if($this->input->post('user_password')!=''){
			$data_a['com_user_password']            = mysqli_real_escape_string(get_mysqliobj(),md5($this->input->post('user_password')));
		 }
			
		 $this->db->where('com_id',$com_id);
       $this->db->update('companies',$data_a);
		
			
			$this->session->set_flashdata('msg',$this->lang->line('profile_success'));
		
			
			$data = array(
                    'log_error' => 'no'
					 
            );
		}
		else
		{
			
		$data = array(
                    'log_error' => validation_errors()
            );
		
		}
		//print_r($data);
		 echo json_encode($data);
	
			}
			
			function contact_resume(){
				varify_session_company();
				$com_id = get_info('company_info','com_id');
				 $jos_id=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('jos_id'));
	
	   $data_a['com_id']=$com_id;
    
	$data_a['jos_id']=$jos_id;
	$data_a['dateadded']=time();
	 $this->General_model->insert_info('comapny_contact',$data_a);
	 	$resume_search_count             = $this->General_model->get_field_value2(array('com_id'=>$com_id),'resume_search_count','companies');
	 $data_cd['resume_search_count']=$resume_search_count-1;
		 $this->db->where('com_id',$com_id);
       $this->db->update('companies',$data_cd);
		
	 echo 'Success';
				}
				//////////////
				
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
	
}?>