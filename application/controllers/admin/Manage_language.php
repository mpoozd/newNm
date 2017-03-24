<?php
class Manage_language extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	
	function index(){	
		
			$data['class']	= 'language';
			$data['title']	= 'Manage Language';
			
		
			$file_name = PATH_DIR."application/language/ar/general_lang.php";
			$data_file = htmlentities(file_get_contents($file_name));
			
			
			
			
			$file_data = explode(';',$data_file);
						
			$result['file_data'] = $file_data;
			
			
			$result['data_file'] = $data_file;
			
			
			$data['content'] = $this->load->view('admin/manage_language/manage_language',$result,true);
			$this->load->view('admin/template',$data);
			 
							
	}
	
	function update_language_file(){
		$lng = $this->input->post("lang");
			
			 
			
		$file_name = PATH_DIR."application/language/ar/general_lang.php";
		
		$file = fopen($file_name,"w");
		 fwrite($file,$lng);
		fclose($file);
		
		$this->session->set_flashdata("success_msg" , "Language file has been updated successfully.");
		
		redirect(base_url() . 'admin/manage_language');
		
		
		
	}
	


		
}
?>
