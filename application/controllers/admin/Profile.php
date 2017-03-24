<?php
class Profile extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	
	function index(){	
		
		$data['class']	= 'profile';
		$data['title']  =  'Admin Profile';
		
		$result['table_title']	=	'Admin Profile';
		
		$admin_id = $this->session->userdata("admin_id");
		
		$this->form_validation->set_rules('image', 'Admin Avatar', 'callback_file_type_check');
		$this->form_validation->set_rules('admin_name', 'Admin Name', 'trim|required');
		$this->form_validation->set_rules('admin_email', 'Admin Email', 'trim|required|valid_email|callback_check_email');

        	if ($this->form_validation->run() === false) {
				
				$admin_res = $this->common_model->select_where("*" , "admin" , array("admin_id" => $admin_id));				
				$result['admin'] = $admin_res->row();
				
				
				$data['content'] = $this->load->view('admin/profile/admin_profile_new',$result,true);
				$this->load->view('admin/template',$data);	
				
			} else {
				
				$update['admin_name'] = $this->input->post("admin_name");
				$update['admin_email'] = $this->input->post("admin_email");
					
				if($_FILES['image']['name']!='') {
				  $fname=time().'_'.basename($_FILES['image']['name']);
				  $fname = str_replace(" ","_",$fname);
				  $fname = str_replace("%","_",$fname);
				//  $name_ext = end(explode(".", basename($_FILES['image']['name'])));
				  
				  $tmp = explode('.', basename($_FILES['image']['name']));
				  $name_ext = end($tmp);
				  
				  $name = str_replace('.'.$name_ext,'',basename($_FILES['image']['name']));
				  $uploaddir = PATH_DIR.'uploads/admin_avatar/';
				  $uploadfile = $uploaddir.$fname;
				  if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
						$source_image_path = PATH_DIR.'uploads/admin_avatar/';
						$source_image_name = $fname;
						
						$update['admin_avatar']   = $fname;
						
						$this->session->set_userdata("admin_avatar" , $fname);
						
						$image_old = $this->input->post('image_old');
						unlink($uploaddir.'/'.$image_old);
						
	
						}
						
				  }
				
				$this->session->set_userdata("admin_email" , $update['admin_email']);
				$this->session->set_userdata("admin_name" , $update['admin_name']);  
				  
				
				$this->common_model->update_array(array('admin_id' => $admin_id) , "admin" , $update);  
				$this->session->set_flashdata('success_msg', "Your profile has been updated successfully.");
				redirect(base_url() . 'admin/profile');
				
				
			}
						
	}
	
	
	function file_type_check(){
		
		$image =  $_FILES['image']['name'];	
		
		//print_r($_FILES);exit;
		
		if($image){		
		
			@$extension=  strtolower(end(explode(".",$image)));		
			$ext = array('jpg','png','jpeg');
		
			if(!in_array($extension,$ext)){		
				$this->form_validation->set_message('file_type_check', 'Image File type not valid');		
				return FALSE;		
			}
		
		}
		return TRUE;
	
	}
	
	function check_email(){		
		$user_email = $this->input->post("admin_email");
		$db_email = $this->input->post("db_email");
		
		if($user_email == $db_email){
			return true;
		} else {
			
			$res = $this->common_model->select_where("admin_email" , "admin" , array("admin_email" => $user_email));
		
			if($res->num_rows() > 0){
				 $this->form_validation->set_message('check_email', "This email is already registered with us.");
				 return false;
			} else {
				 return true;	
			}
			
		}
		
		
	}
	
}
?>
