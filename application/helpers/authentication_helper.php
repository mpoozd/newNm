<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function varify_admin_session(){
		$CI = &get_instance();
		$admin_session_id = $CI->session->userdata('admin_id');
		if($admin_session_id	==	'')	{
			//redirect('admin/login');
			//	header('location:'.base_url().'admin/login');
				redirect(base_url().'admin/login');
		}
	}
	
	
	function varify_session(){
		$CI = &get_instance();
		$user_id = get_info('user_info','jos_id');
		//echo $user_id;
		if($user_id	==''){
		//	redirect('login');
		redirect(base_url().'login');
			//header('location:'.base_url().'login');
		}
	}
	function varify_session_company(){
		$CI = &get_instance();
		$user_id = get_info('company_info','com_id');
		//echo $user_id;
		if($user_id	==''){
		//	redirect('login');
		redirect(base_url().'login');
			//header('location:'.base_url().'login');
		}
	}
	function get_mysqliobj() { 
		$CI = &get_instance();
		$db = (array)get_instance()->db;
		return mysqli_connect('eu-cdbr-azure-west-d.cloudapp.net', $db['username'], $db['password'], $db['database']);
	}

	function get_trans_id($length=14)
{
  $acceptedChars = '123456789';
  $max 			= strlen($acceptedChars)-1;
  $password 	= '';
  $password2 	= '';
  $tmp = '';
  for($i=0; $i < 2; $i++) {
    $password .= $acceptedChars{mt_rand(0, $max)};
  }
   for($i=0; $i < 3; $i++) {
    $password2 .= $acceptedChars{mt_rand(0, $max)};
  } 
  while( @$c++ * 16 < 8 ){
        $tmp   .=  mt_rand();
		}
		$tmp 	= substr( $tmp, 0, 8 );
		$ID 	= substr($password.$tmp.$password2, 0, $length );
		//$token = strtoupper($prefix).substr($password.$tmp.$password2, 0, $length );
    return $ID;
}

function get_info($session_name,$id)
{

  $cih      		= & get_instance();
  if($cih->session->userdata($session_name)!=''){
  	 $session_name 	= $cih->session->userdata($session_name);
  	 $value  		= $session_name[$id];
  }else{
  	 $value 		= '';
  }
  return $value;
}
	
	
	
	
function set_mail($id,$array,$to_b_replaced,$to_mail)
{
	$CIH  	= & get_instance();
	$ml 	= $CIH->General_model->set_mail($id);
	$txt 	= $ml['email_content'];
	$txt 	= str_replace($array,$to_b_replaced,$txt);

	 
	send_mail($ml['email_subject'] ,$ml['from_email'],$ml['email_from_name'],$txt,$to_mail); 
	
}

 /*---Send Emaiil ---*/
function send_mail($subject,$email_from,$from_name='',$txt,$to_mail)
 {
	$CIH  = & get_instance();
	$CIH->phpmailer->IsMail();
	$CIH->phpmailer->From = $email_from;
	$CIH->phpmailer->FromName = $from_name; 
	$CIH->phpmailer->IsHTML(TRUE);
	$CIH->phpmailer->AddAddress($to_mail);
	$CIH->phpmailer->Subject = $subject;
	$CIH->phpmailer->Body =$txt; 
	$CIH->phpmailer->send();
	$CIH->phpmailer->ClearAddresses();
 }
	
	function settings($field)
	{
		$cih      = & get_instance();
		//$field    = $field;
		$cih->db->select($field);
		$cih->db->from('settings');
		$result = $cih->db->get();
		$result = $result->row();
		$val  = $result->$field;
		//$cih->session->set_userdata($settings);
		return $val;
	}
	//////////
	function job_application_status($jap_id,$jap_staus,$date){
		$st='';
		if($jap_staus==0){
			$st= 'تقدم في '.date('d-m-Y',$date);
			}else if($jap_staus==1)
			{
				
				$st= 'تم القبول في '.date('d-m-Y',$date);
				}
				else if($jap_staus==-1){
						$st= 'رفضت في : '.date('d-m-Y',$date);
					
					}
					
				return $st;	
		}
	
	
	function job_status($job_id,$page,$accepted_date='')
	{
		$cih      = & get_instance();
		//$field    = $field;
		$cih->db->select('job_status,package_expirydate');
		$cih->db->where('job_id',$job_id);
		$cih->db->from('jobs');
		$result = $cih->db->get();
		$result = $result->row();
		$val  = $result->job_status;
		$st='';
		if($val==0){
			return 'بإنتظار الموافقة';
			}
			else if($val==1){
				
				if($page=='manage'){
					if($result->package_expirydate!=0){
				$st='سينتهي في '.date('d-m-Y',$result->package_expirydate);
					}
					else{
						$st='انتهى';
						}
				}
				else{
					$st= 'بإنتظار الموافقة';
					}
				}
				else if($val==2){ // student
					if($page=='reject'){
						$st= 'تم رفض الطلب في '.date('d-m-Y',$accepted_date);
						}
						else{
					if($accepted_date!=''){
					$st= 'بإنتظار الموافقة';
				     }
				     else{
						$cih->db->select('jos_id');
		              $cih->db->where('job_id',$job_id);
	                 	$cih->db->where('jap_status',1);
		                $cih->db->from('job_applications');
							$sf = $cih->db->get();
							$resulto = $sf->row();
							$jos=$resulto->jos_id;
		
		               $cih->db->select('jos_username');
		                $cih->db->where('jos_id',$jos);
	                 	$cih->db->where('status_id',1);
		                $cih->db->from('jobseekers');
		$sfd = $cih->db->get();
		$resultod = $sfd->row();
					// $st= 'Assigned2 to: '.$resultod->jos_username;
					$st='Expires on '.date('d-m-Y',$result->package_expirydate);

					}
						}
				}
				else if($val==3){
				$st= 'مكتمل';
				}
				else if($val==4){
				$st= 'إنتهت';
				}
				else{
					 $st='';
				}
				return $st;
	}
	function posted_date_ago($date){
		$diff = abs($date- time()); 

$years   = floor($diff / (365*60*60*24)); 
$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 

$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 

// if($days=0){
	
	//printf("Posted",date('dd-mm-Y',$date)); 
	//echo "نشرت في : ".date('d-m-Y',$date);
// }
// else{
if($years!=0){
	printf("%d سنة مضت", $years); 

	}
	else if($months!=0){
		printf("منذ %d شهر",  $months); 

		}
		else if($days == 1){
		printf("منذ يوم", $days); 

		}
		else if($days == 2){
		printf("منذ يومين", $days); 

		} 
		else if($days>=3){
		printf("منذ %d ايام", $days); 

		}
		
		else if($hours!=0){
		printf("منذ %d  ساعة ",  $hours); 

		}
		else if($minuts!=0){
		printf("منذ %d دقيقة", $minuts); 

		}
		else if($seconds!=0){
		printf("منذ %d ثانية", $seconds); 

		}
		else{
			//printf("%d years, %d months, %d days, %d hours, %d minuts\n, %d seconds\n", $years, $months, $days, $hours, $minuts, $seconds); 
			echo '';

			}

// }
		}
	
	/////////////
	
	
	function currency($field,$lang_id)
	{
		$cih      = & get_instance();
		//$field    = $field;
		$cih->db->select($field);
		$cih->db->from('language');
		$cih->db->where('lang_id',$lang_id);
		$result = $cih->db->get();
		$result = $result->row();
		$val  = $result->$field;
		//$cih->session->set_userdata($settings);
		return $val;
	}
	
	
function default_language(){
//echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
$var=1;
$cih      = & get_instance();
$d=$cih->general_model->select_where('lang_id,lang_code','language',array('lang_code'=>substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)));
if($d->num_rows()>0){
  $f=$d->row();
 return $f->lang_id.','.$f->lang_code;
}
else{
	return $var.','.'en';
}
}


	
	
?>