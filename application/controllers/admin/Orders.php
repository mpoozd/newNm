<?php
class Orders extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	
	function index(){	
			
		$data['class']	= 'orders';
		$data['title']	= 'Manage Orders';
		
		$result['orders']  = $this->common_model->select_all_order_by("*" , "orders" , 'order_id' , 'DESC');
				
		$result['table_title'] = "Orders";		
				
		$data['content'] = $this->load->view('admin/orders/orders_listing',$result,true);
		$this->load->view('admin/template',$data);	
				
	}
	
		
	function change_order_status($order_id = "" , $status = ""){
		
		$update['order_status'] = $status;
		
		$res = $this->common_model->update_array(array("order_id" => $order_id) , "orders" , $update);
		
		
					$res_ord = $this->common_model->select_where('*' , 'orders' , array('order_id' => $order_id));
					if($res_ord->num_rows() > 0){
						$resu_ord = $res_ord->row();	
					}
					
					$company_id = $resu_ord->com_id;
		
					$email_res = $this->common_model->select_where('*', 'email_template', array('email_id' => 8));
					$email_temp = $email_res->row();
					
					$content = $email_temp->email_content;
					
					$email_from = $email_temp->from_email;
					$email_subject = $email_temp->email_subject;
					$email_name = $email_temp->email_from_name;
					
					$link = base_url().'admin/login';
					
					$res_com = $this->common_model->select_where('com_user_fullname , com_name , com_user_email' , 'companies' , array('com_id' => $company_id));
					$resu_com = $res_com->row();
					
					
					$username =  $resu_com->com_user_fullname;
					$company_name = $resu_com->com_name;
					$email = $resu_com->com_user_email;
					
					if($status == 0){
						$email_status = "Pending";
					} else {
						$email_status = "Completed";
					}
					
					
					
					
					
					$updated 		= 	str_replace('user_name',$username,$content);
					$updated1 		= 	str_replace('{company_name}',$company_name,$updated);
					$final_content	= 	str_replace('{status}',$email_status,$updated1);
	
	
					/*$this->phpmailer->AddAddress($email);
					$this->phpmailer->IsMail();
					$this->phpmailer->From = $email_from;
					$this->phpmailer->FromName = $email_name;
					$this->phpmailer->IsHTML(true);
					$this->phpmailer->Subject = $email_subject;
					$this->phpmailer->Body = $final_content;
					$this->phpmailer->Send();
					$this->phpmailer->ClearAddresses();*/
		
					  /*$json = '{
      "content": {
      "from": "'.$email_from.'",
      "subject": "'.$email_subject.'",
      "html": "'.$final_content.'"
      },
      "recipients": [{ "address": "'.$email.'" }]
     }';
     
     send_email($json);*/
	 				$url = 'https://api.sendgrid.com/';
				
				
					$post_data = array(
					 "api_user" => $this->config->item('api_user'),
					 "api_key" => $this->config->item('api_key'),
					 "to" => $email,
					 "toname" => $email_name,
					 "subject" => $email_subject,
					 "html" => $final_content,
					 "from" => $email_from,
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
		
		
		
		
		
		
		$this->session->set_flashdata('success_msg', "Order status has been updated successfully.");
		redirect(base_url().'admin/orders');
	}
	
			
}
?>
