<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	
function varify_user(){
		$CI = &get_instance();
		$user_id = $CI->session->userdata('user_id');
	
		if($user_id == '')	{
			redirect(base_url());
		} 
	}
	
function varify_admin_user(){
  $CI = &get_instance();
  
  $user_id = $CI->session->userdata('admin_id');
 
  if($user_id == '') {
   redirect(base_url().'admin/login');
  }
 }
 
function get_faq_type($ftype_id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('ftype_name' , 'faq_type' , array('ftype_id' => $ftype_id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		
		return $resu['ftype_name'];
	}
}
		
function get_location($location_id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('location_name' , 'location' , array('location_id' => $location_id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['location_name'];
		}	
	} 
	
	function get_uni_name($id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('univ_name' , 'universties' , array('univ_id' => $id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['univ_name'];
		}	
	}
	
	function get_sep_name($id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('spe_name' , 'specialists' , array('spe_id' => $id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['spe_name'];
		}	
	}
	
	
	function get_city_name($id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('city_name' , 'cities' , array('city_id' => $id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['city_name'];
		}	
	}
	
function get_job_category($category_id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('job_cat_name' , 'job_categories' , array('job_cat_id' => $category_id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['job_cat_name'];
		}	
	} 	
	
function get_job_type($id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('job_type_name' , 'job_type' , array('job_type_id' => $id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['job_type_name'];
		}	
	}
		
function get_job_color($id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('job_type_color' , 'job_type' , array('job_type_id' => $id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['job_type_color'];
		}	
	}	 	
	
function get_job_paytype($id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('pay_type_name' , 'pay_type' , array('pay_type_id' => $id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['pay_type_name'];
		}	
	} 		
	
function get_job_title($job_id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('job_title' , 'jobs' , array('job_id' => $job_id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['job_title'];
		}
	}	
	
function get_days($date_database = ""){
	
	$CI =& get_instance(); 
	$current_date = date("Y-m-d");        
	$db_date = date('Y-m-d',$date_database);          
	$diff_header = abs(strtotime($current_date) - strtotime($db_date));
	$total_days_header = floor ($diff_header /  (60*60*24));
	
	$msg_time_header = $total_days_header ." days ago";
						
	if($current_date == $db_date){
		$hours_diff = abs(time() - $date_database);
		$msg_time_header = floor($hours_diff / (60*60))." hours ago";
		
		if(floor($hours_diff / (60*60)) == 0){
			$msg_time_header = floor($hours_diff / (60))." mins ago";
		}
		
		
	}
	
	return $msg_time_header;
}	

function get_settings(){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('*' , 'settings' , array('settings_id' => 1));
	if($res->num_rows() > 0){
		return $resu = $res->row_array();
	}
}

function get_pages(){
	$CI = &get_instance();
	
	return $res = $CI->common_model->select_where('*' , 'pages' , array('page_header' => 1));
	
}

function get_experience($experience_id = ""){
 $CI = &get_instance();
 
 $res = $CI->common_model->select_where('experience_name' , 'experience' , array('experience_id' => $experience_id));
 if($res->num_rows() > 0){
  $resu = $res->row_array();
  return $resu['experience_name'];
  } 
 } 

function get_settings_currency(){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('settings_currency' , 'settings' , array('settings_id' => 1));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['settings_currency'];
	}
}

function get_company_name($id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('com_name' , 'companies' , array('com_id' => $id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['com_name'];
	}
}

function get_payment_type_name($id = ""){
	$CI = &get_instance();
	
	$res = $CI->common_model->select_where('pp_name' , 'pricing_plan' , array('pp_id' => $id));
	if($res->num_rows() > 0){
		$resu = $res->row_array();
		return $resu['pp_name'];
	}
}

function get_admin_avatar($id = ""){
 $CI = &get_instance();
 
 $res = $CI->common_model->select_where('admin_avatar' , 'admin' , array('admin_id' => $id));
 if($res->num_rows() > 0){
  $resu = $res->row_array();
  return $resu['admin_avatar'];
 } 
}

function send_email($json = ""){
//print_r(phpinfo());
//echo $json;exit;
	$CI = &get_instance();
	
	$url = $CI->config->item('mail_url');  
	$credentials = $CI->config->item('mail_api_key');
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json"));
	curl_setopt($ch, CURLOPT_USERPWD, $credentials);	
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_POST, true);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $json);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true); 
	
	$response = curl_exec($ch);
	
	
	
	curl_close($ch);
	print_r($response);
	//$result = json_decode($response);
	print_r($response)."2s55";exit;
	
	
}

function get_grad_year($grad_id = ""){
 $CI = &get_instance();
 
 $res = $CI->common_model->select_where('grad_year' , 'graduation_year' , array('grad_id' => $grad_id));
 if($res->num_rows() > 0){
  $resu = $res->row_array();
  
  return $resu['grad_year'];
 }
}

function get_gender($gender = ""){
 $CI = &get_instance();
 
 $res = $CI->common_model->select_where('gender_name' , 'gender' , array('gender_id' => $gender));
 if($res->num_rows() > 0){
  $resu = $res->row_array();
  
  return $resu['gender_name'];
 }}

?>