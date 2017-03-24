<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function get_lang()
{
      $CIH  			= & get_instance();
   $CIH->db->select('id,code');
   $CIH->db->from('language_table');
   $CIH->db->where('default_bit',1);
   $result 			= $CIH->db->get();
   $row 			= $result->row();
   $lang_id   		= $row->id;
   $lang_code   	= $row->code;
   
   if($CIH->session->userdata('lang_id')==''){
        $CIH->session->set_userdata('lang_code',$lang_code);
        $CIH->session->set_userdata('lang_id',$lang_id);
	    $lang_code 	= $CIH->session->userdata('lang_code');
        $lang_id 	= $CIH->session->userdata('lang_id');  
  }else{
     $lang_code 	= $CIH->session->userdata('lang_code');
     $lang_id 		= $CIH->session->userdata('lang_id');
  } 
  set_language($lang_code,$lang_id);
  return $lang_id;
  }
  
function set_lang($lang_id)
{
	   $CIH  		= & get_instance();
	   $CIH->db->select('id,code');
       $CIH->db->from('language_table');
       $CIH->db->where('id',$lang_id);
       $result = $CIH->db->get();
       $row 		= $result->row();
       $lang_id   	= $row->id;
       $lang_code   = $row->code;
	   
	   $lang_code 	= $CIH->session->set_userdata('lang_code',$lang_code);
       $lang_id 	= $CIH->session->set_userdata('lang_id',$lang_id); 
	   get_lang();
	}
  
  
	
	
	 
?>