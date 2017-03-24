<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('General_model');
		 	get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index()
	{
		
		$data['login_bit']='yes';
		$data['title']='Login';
		
		 $data['met_des'] 		= 	$this->lang->line('login_met_des');
			$data['met_key'] 		= 	$this->lang->line('login_met_key');
			$data['title'] 		= 	$this->lang->line('login_title');
		$this->load->view('frontend/company_login/login_view',$data);
	
}
	 //login USING json_encode 
	 function login_user()
	{
		$this->form_validation->set_rules('user_email', $this->lang->line('email'), 'required|valid_email|callback_user_check');
		$this->form_validation->set_rules('user_password', $this->lang->line('password'), 'required');
		  if ($this->form_validation->run())  
		{
		// $remember=$this->input->post('u_remember');
			$password=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('user_email'));
			$uname=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('user_password'));
		
				
	
		$this->session->set_flashdata('msg',$this->lang->line('success_login'));
		
			$data = array(
                    'log_error' => 'no',
				
            );
		}
		else
		{
			
		$data = array(
                    'log_error' => validation_errors()
            );
		//header('location:'.base_url().'home');
		}

		 echo json_encode($data);
	}
	
// checking username or email and password its a call_back function
	 function user_check()
	{
		
	$username_email		= mysqli_real_escape_string(get_mysqliobj(),$this->input->post('user_email'));
	$password 	       = mysqli_real_escape_string(get_mysqliobj(),$this->input->post('user_password'));

	  $result=$this->General_model->select_where('jos_id,status_id,jos_email,jos_password,jos_username','jobseekers',array('jos_email'=>$username_email));
	  //print_r($result);
	  if($result->num_rows()>0)
	 {
		$row 	        = $result->row();
		$user_pass 		= $row->jos_password;
		$status 		= $row->status_id;
		$user_id		= $row->jos_id;
		

		if(md5($password) != $user_pass) //PASSWORD DOES NOT MATCH
		{
		  $this->form_validation->set_message('user_check',$this->lang->line('pass_invalid'));
		     return FALSE;
	    }else if($status!=1)  //ACCOUNT BLOCKED
		{
			$this->form_validation->set_message('user_check',$this->lang->line('acc_acti'));
			return FALSE;
		}else  // ALL IS FINE
		{
		        $user_info2['jos_email'] 		= $row->jos_email;
				$user_info2['jos_id'] 		  = $row->jos_id;
				$user_info2['jos_username'] 	= $row->jos_username;
		        
				$this->session->set_userdata('jobseeker_login',1);
				
				$this->session->set_userdata('user_info',$user_info2); 
			return TRUE;
		}

	 }
	 else{
		 
		 $result=$this->General_model->select_where('com_id,status_id,price_package_id,com_user_email,com_user_password,com_user_fullname','companies',array('com_user_email'=>$username_email));
		   if($result->num_rows()>0)
	       {
		$row 	        = $result->row();
		$user_pass 		= $row->com_user_password;
		$status 		= $row->status_id;
		$user_id		= $row->com_id;
		

		if(md5($password) != $user_pass) //PASSWORD DOES NOT MATCH
		{
		  $this->form_validation->set_message('user_check',$this->lang->line('pass_invalid'));
		     return FALSE;
	    }else if($status!=1)  //ACCOUNT BLOCKED
		{
			$this->form_validation->set_message('user_check',$this->lang->line('acc_acti'));
			return FALSE;
		}else  // ALL IS FINE
		{
		        $user_info2['com_user_email'] 		= $row->com_user_email;
				$user_info2['com_id'] 		= $row->com_id;
				$user_info2['com_user_fullname'] 	= $row->com_user_fullname;
				$user_info2['price_package_id'] 	= $row->price_package_id;
		        
				$this->session->set_userdata('company_login',1);
				
				$this->session->set_userdata('company_info',$user_info2); 
			return TRUE;
		}

	 }
	 else{
		 	$this->form_validation->set_message('user_check',$this->lang->line('email_not'));
		return FALSE;
		 }
		 
	 
	 }
	}
	
//


	
	function logout()
{
	$this->session->set_userdata('user_info','');
	$this->session->set_userdata('company_info','');
	$this->session->set_userdata('company_login','');
    $this->session->set_userdata('jobseeker_login','');
	
	header('location:'.base_url());	
}
	function forget_password(){
	 $data['met_des'] 		= 	$this->lang->line('forget_met_des');
			$data['met_key'] 		= 	$this->lang->line('forget_met_key');
			$data['title'] 		= 	$this->lang->line('forget_title');
	   $data['forget_bit']='yes';
		$this->load->view('frontend/company_login/forget_password_view',$data);
	}
	
	
	
	
   function forget_pass(){
		$this->form_validation->set_rules('user_email', $this->lang->line('email'), 'required|valid_email|callback_check_email');
		  if ($this->form_validation->run())  
		 {
		 	$this->session->set_flashdata('msg',$this->lang->line('forget_succeess'));
			 $user_password =  substr(rand(),0,6);
			$password = md5($user_password);
			
			$in=$this->General_model->select_where('jos_password,jos_id','jobseekers',array('jos_email'=>mysqli_real_escape_string(get_mysqliobj(),$this->input->post('user_email'))));
			if($in->num_rows()>0){
		    $info=$in->row();
	    	$user_id=$info->jos_id;
			$bit=0;
			   $data_a['jos_password']=$password;
			   
			 $this->db->where('jos_id',$user_id);
       $this->db->update('jobseekers',$data_a);
			}else{
				$in=$this->General_model->select_where('com_user_password,com_id','companies',array('com_user_email'=>mysqli_real_escape_string(get_mysqliobj(),$this->input->post('user_email'))));
				if($in->num_rows()>0){
					 $info=$in->row();
	    	        $user_id=$info->com_id;
					$bit=1;
					  $data_a['com_user_password']=$password;
					   $this->db->where('com_id',$user_id);
       $this->db->update('companies',$data_a);
					}
				}
				 
				 
				  
			$this->forget_password_email($user_id,$bit,$user_password);
			$data = array(
                    'log_error' => 'no'
            );
		}
		else
		{
			
		$data = array(
                    'log_error' => validation_errors()
            );
		//header('location:'.base_url().'home');
		}
		 echo json_encode($data);
	}
	
	
	function forget_password_email($user_id,$bit,$password)
	{
		if($bit==0){
			
				$in=$this->General_model->select_where('jos_password,jos_username,jos_id,jos_email','jobseekers',array('jos_id'=>$user_id));
					$info=$in->row();
		$password=$password;
		$em=$info->jos_email;
		$na=$info->jos_username;
			}
			else{
					$in=$this->General_model->select_where('com_user_password,com_user_fullname,com_id,com_user_email','companies',array('com_id'=>$user_id));
						$info=$in->row();
		$password=$password;
			$em=$info->com_user_email;
		$na=$info->com_user_fullname;
				}
	
	
	$template 			= $this->General_model->select_where('email_id,email_subject,email_from_name,from_email,email_content','email_template',array('email_id'=>3));
		$tem=$template->row();
		$subject=$tem->email_subject;
		$message=$tem->email_content;
		
		$find=array("{password}","{email}","{user_name}");
		$replace=array($password,$em,$na);
		$message=str_replace($find,$replace,$message);
		
		
		/*$this->phpmailer->AddAddress($em);
		$this->phpmailer->IsMail();
		$this->phpmailer->From=$tem->from_email;
		$this->phpmailer->FromName=$tem->email_from_name;
		$this->phpmailer->IsHTML(true);
		$this->phpmailer->Subject=$subject;
		$this->phpmailer->Body=$message;
		$this->phpmailer->Send();
		$this->phpmailer->ClearAddresses();
		$this->session->set_flashdata('msg',$this->lang->line('forget_succeess'));*/
		//header('location:'.base_url().'login');
		
		$url = 'https://api.sendgrid.com/';
				
				
				$post_data = array(
				 "api_user" => $this->config->item('api_user'),
				 "api_key" => $this->config->item('api_key'),
				 "to" => $em,
				 "toname" => $tem->email_from_name,
				 "subject" => $subject,
				 "html" =>  $message,
				 "from" => $tem->from_email,
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
	
	}
	
    function check_email()
	{
		$email=mysqli_real_escape_string(get_mysqliobj(),$this->input->post('user_email'));
	    $query  =  $this->General_model->select_where('com_user_email','companies',array('com_user_email'=>$email));
		//echo $query->num_rows();
		if ($query->num_rows() > 0)
		{
		
			return TRUE;
		} 
		else
		{
			   $query2 =  $this->General_model->select_where('jos_email','jobseekers',array('jos_email'=>$email));
			if ($query2->num_rows() > 0){
				
				return TRUE;
				}
				else{
					$this->form_validation->set_message('check_email', $this->lang->line('email_not'));
			return FALSE;
					}
			
			//header('location:'.base_url().'unknown');
		}	
	
	}

	
	
	
	
	}?>
