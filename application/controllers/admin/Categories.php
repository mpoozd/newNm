<?php
class Categories extends CI_Controller
{
	function __construct(){
		parent::__construct();
		varify_admin_user();
	}
	
	function index(){	
			
		$data['class']	= 'categories';
		$data['title']	= 'Manage Categories';
		
		$result['categories']  = $this->common_model->select_all_order_by("*" , "categories" , 'cat_id' , 'DESC');		
		$result['table_title'] = "Manage Categories";		
		$data['content'] = $this->load->view('admin/categories/listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
	function change_category_status($status = "" , $cat_id = ""){
		
		$update['status_id'] = $status;
		
		$res = $this->common_model->update_array(array("cat_id" => $cat_id) , "categories" , $update);
		$this->session->set_flashdata('success_msg', "Category status has been updated successfully.");
		redirect(base_url().'admin/categories');
		}	
	
	
	function add_category(){
		
		$data['class']	= 'categories';
		$data['title']	= 'Add Category';
		
		$this->form_validation->set_rules('cat_name', 'cat_name', 'trim|required');
		$this->form_validation->set_rules('cat_desc', 'cat_desc', 'trim|required');

        	if ($this->form_validation->run() === false) {
				
 				$data['content'] = $this->load->view('admin/categories/add_category','',true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				$insert['cat_name'] = $this->input->post('cat_name');
				$insert['cat_sef'] = sef_urls($this->input->post('cat_name'));
				$insert['cat_desc'] = $this->input->post('cat_desc');
				
				if($_FILES['image']['name']!='') {
				  $fname=time().'_'.basename($_FILES['image']['name']);
				  $fname = str_replace(" ","_",$fname);
				  $fname = str_replace("%","_",$fname);
				 // $name_ext = end(explode(".", basename($_FILES['image']['name'])));
				  
				   $tmp = explode('.', basename($_FILES['image']['name']));
				  $name_ext = end($tmp);
				  
				  $name = str_replace('.'.$name_ext,'',basename($_FILES['image']['name']));
				  $uploaddir = PATH_DIR.'uploads/category_image/';
				  $uploadfile = $uploaddir.$fname;
				  if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
						$source_image_path = PATH_DIR.'uploads/category_image/';
						$source_image_name = $fname;
						$insert['	cat_image']   = $fname;
				  }
				}
					
				$res = $this->common_model->insert_array("categories" , $insert);
				$this->session->set_flashdata('success_msg', "Category has been added successfully.");
				redirect(base_url().'admin/categories');
				
				
			}
		
	}	
	
	function update_category($cat_id = ""){
		
		$data['class']	= 'categories';
		$data['title']	= 'Edit Category';
		
		$this->form_validation->set_rules('cat_name', 'cat_name', 'trim|required');
		$this->form_validation->set_rules('cat_desc', 'cat_desc', 'trim|required');

        	if ($this->form_validation->run() === false) {
				
				$res_jos = $this->common_model->select_where('*' , 'categories' , array('cat_id' => $cat_id));
				if($res_jos->num_rows() > 0){
					$result['categories_info']	 = $res_jos->row_array();
				}
				
 				$data['content'] = $this->load->view('admin/categories/edit_category',$result,true);
				$this->load->view('admin/template',$data);
				
			} else {
				
				$update['cat_name'] = $this->input->post('cat_name');
				$update['cat_sef'] = sef_urls($this->input->post('cat_name'));
				$update['cat_desc'] = $this->input->post('cat_desc');
				
				if($_FILES['image']['name']!='') {
				  $image_obj = $this->common_model->select_single_field('cat_image','categories',array('cat_id'=>$cat_id));
				  @unlink(PATH_DIR.'uploads/category_image/'.$image_obj);
				  $fname=time().'_'.basename($_FILES['image']['name']);
				  $fname = str_replace(" ","_",$fname);
				  $fname = str_replace("%","_",$fname);
				//  $name_ext = end(explode(".", basename($_FILES['image']['name'])));
				  
				   $tmp = explode('.', basename($_FILES['image']['name']));
				  $name_ext = end($tmp);
				  
				  $name = str_replace('.'.$name_ext,'',basename($_FILES['image']['name']));
				  $uploaddir = PATH_DIR.'uploads/category_image/';
				  $uploadfile = $uploaddir.$fname;
				  if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
						$source_image_path = PATH_DIR.'uploads/category_image/';
						$source_image_name = $fname;
						$update['cat_image']   = $fname;
				  }
				}
			
				$res = $this->common_model->update_array(array('cat_id' => $cat_id) , "categories" , $update);
				$this->session->set_flashdata('success_msg', "Category has been updated successfully.");
				redirect(base_url().'admin/categories');
				
				
			}
		
	}		
	
	function delete_category($cat_id = ""){
		$image_obj = $this->common_model->select_single_field('cat_image','categories',array('cat_id'=>$cat_id));
		@unlink(PATH_DIR.'uploads/category_image/'.$image_obj);
		$this->common_model->delete_where(array('cat_id' => $cat_id) , 'categories');
		$this->session->set_flashdata('success_msg', "Category has been delete successfully.");
		redirect(base_url().'admin/categories');
	}

					
}
?>
