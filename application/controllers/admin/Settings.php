<?php

class Settings extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	function index() { 
		
		$this->form_validation->set_rules('image', 'Logo', 'callback_file_type_check');
		$this->form_validation->set_rules('site_name', 'site_name', 'required');
		$this->form_validation->set_rules('meta_title', 'meta_title', 'required');
		$this->form_validation->set_rules('meta_keyword', 'meta_keyword', 'required');
		$this->form_validation->set_rules('meta_desc', 'meta_desc', 'required');
		$this->form_validation->set_rules('site_email', 'site_email', 'required|valid_email');
		$this->form_validation->set_rules('copy_rights', 'copy_rights', 'required');
		$this->form_validation->set_rules('site_currency', 'site_currency', 'required');
		$this->form_validation->set_rules('insta_dribble', 'insta_dribble', 'required');
		$this->form_validation->set_rules('fb_link', 'fb_link', 'required');
		$this->form_validation->set_rules('twitter_link', 'twitter_link', 'required');
		$this->form_validation->set_rules('instagram_link', 'instagram_link', 'required');
		$this->form_validation->set_rules('gmail_link', 'gmail_link', 'required');
		$this->form_validation->set_rules('linkedin_link', 'linkedin_link', 'required');

        	if ($this->form_validation->run() === false) {
				
				$data['class']	= 'settings';
				$data['title']  = 'Settings';	
				
				$res_settings = $this->common_model->select_where('*', 'settings', array('settings_id' => '1'));
				
				$result['table_title'] = "Settings";
				
				if($res_settings->num_rows() > 0){
					$result['setting'] = $res_settings->row_array();	
				}
				
				$data['content'] = $this->load->view('admin/settings/edit_settings',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				
				$data['settings_site_name']			=	$this->input->post('site_name');
				$data['settings_site_meta_title']	=	$this->input->post('meta_title');
				$data['settings_meta_keywords']		=	$this->input->post('meta_keyword');
				$data['settings_meta_desc']			=	$this->input->post('meta_desc');
				$data['settings_site_email']		=   $this->input->post('site_email'); 
				$data['settings_copy_rights_text']	=	$this->input->post('copy_rights'); 
				$data['settings_currency']			=	$this->input->post('site_currency'); 
				$data['settings_insta_dribble']		=	$this->input->post('insta_dribble'); 
				$data['settings_fb_link']			=	$this->input->post('fb_link'); 
				$data['settings_twitter_link']		=	$this->input->post('twitter_link'); 
				$data['settings_insta_link']		=	$this->input->post('instagram_link'); 
				$data['	settings_gmail_link']		=	$this->input->post('gmail_link'); 
				$data['settings_linkedin_link']		=	$this->input->post('linkedin_link'); 
				
				
				
				
				
				if($_FILES['image']['name']!='') {
				  $fname=time().'_'.basename($_FILES['image']['name']);
				  $fname = str_replace(" ","_",$fname);
				  $fname = str_replace("%","_",$fname);
				//  $name_ext = end(explode(".", basename($_FILES['image']['name'])));
				  
				  
				  $tmp = explode('.', basename($_FILES['image']['name']));
				  $name_ext = end($tmp);
				  
				  
				  
				  $name = str_replace('.'.$name_ext,'',basename($_FILES['image']['name']));
				  $uploaddir = PATH_DIR.'uploads/logo/';
				  $uploadfile = $uploaddir.$fname;
				  if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
						$source_image_path = PATH_DIR.'uploads/logo/';
						$source_image_name = $fname;
						$data['	settings_logo']   = $fname;
				  }
				}
				
								
				$result['settings'] = $this->common_model->update_array(array('settings_id' => '1'), 'settings', $data);
				$this->session->set_flashdata('success_msg', "The settings have been updated successfully");
				
				redirect (base_url().'admin/settings');
				
			}
		
		
		

	}
	
	
	function file_type_check(){

		$image =  $_FILES['image']['name'];		

		if($image){		

			//$extension=  strtolower(end(explode(".",$image)));	
			
			$tmp = explode('.', $image);
			$extension = end($tmp);
			
				
			$ext = array('jpg','png','jpeg');

		if(!in_array($extension,$ext)){		

			$this->form_validation->set_message('file_type_check', 'Image File type not valid');		
			return FALSE;		
		}

}

		return TRUE;

	

	}
	
	function file_type_check_admin(){

		$image =  $_FILES['image_admin']['name'];		

		if($image){		

			$extension=  strtolower(end(explode(".",$image)));		
			$ext = array('jpg','png','jpeg','gif');

		if(!in_array($extension,$ext)){		

			$this->form_validation->set_message('file_type_check_admin', 'Admin Logo Image File type not valid');		
			return FALSE;		
		}

}

		return TRUE;

	

	}
	
	
	
	
}