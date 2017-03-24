<?php if ( ! defined('BASEPATH')) exit ('No direct script  allow'); 

	class General_model extends  CI_Model {
//Manag Jobs
function get_manage_resume_list($com_id){
		$sql="select j.jos_username,u.univ_name,j.jos_sef,j.jos_headline,j.about_uerself,j.location,j.image  from comapny_contact as c inner join jobseekers as j on j.jos_id = c.jos_id join universties u on u.univ_id=j.univ_id where c.com_id=".$com_id." order by j.dateadded desc";
	$result=$this->db->query($sql);
	return $result;
	
	}
//


function get_manage_resume_search($page,$per_page){
		$sql="select j.jos_username,u.univ_name,j.jos_sef,j.jos_headline,j.about_uerself,j.location,j.image from jobseekers as j join universties u on u.univ_id=j.univ_id where j.status_id=1 order by j.dateadded desc LIMIT ".$page.",".$per_page."";
	$result=$this->db->query($sql);
	return $result;
	
	}
	
	function get_manage_resume_search_count(){
		$sql="select j.jos_username,u.univ_name,j.jos_sef,j.jos_headline,j.about_uerself,j.location,j.image from jobseekers as j join universties u on u.univ_id=j.univ_id where j.status_id=1 order by j.dateadded desc";
	$result = $this->db->query($sql);
	$row_count = $result->num_rows();
	return $row_count;
	
	}
	
	function get_manage_company_search($page,$per_page){
		$sql="select * from companies where status_id = 1  LIMIT ".$page." , ".$per_page."";
	$result=$this->db->query($sql);
	return $result;
	
	}
	
	function get_manage_company_count(){
		$sql="select * from companies where status_id = 1";
		$result=$this->db->query($sql);
		$row_count = $result->num_rows();
		return $row_count;
	
	}
//

function select_limit_where_1($select,$table,$page,$per_page)
{
	$this->db->select( $select );
	$this->db->from( $table);
	$this->db->limit( $per_page , $page );
	$result=$this->db->get();
	return $result; 
  
}




function get_jobseeker_jobs_list($jos_id){
  	$sql="select j.job_location,j.job_status,c. 	jap_accepted_date,c.jap_id,c.jos_id,s.jos_username,s.jos_sef,j.job_sef,j.job_id,c.jap_status,j.dateadded,j.package_expirydate,j.job_title,j.salary,j.working_hours,j.experience_id,j.gender from jobs j inner join job_applications as c on j.job_id = c.job_id join jobseekers s on c.jos_id=s.jos_id where c.jos_id=".$jos_id." order by j.dateadded desc";
	$result=$this->db->query($sql);
	return $result;
}

function get_jobseeker_jobs_list_assign($jos_id){
  	$sql="select j.job_location,j.job_status,c. 	jap_accepted_date,c.jap_id,c.jos_id,s.jos_username,s.jos_sef,j.job_sef,j.job_id,c.jap_status,j.dateadded,j.package_expirydate,j.job_title,j.salary,j.working_hours,j.experience_id,j.gender from jobs j inner join job_applications as c on j.job_id = c.job_id join jobseekers s on c.jos_id=s.jos_id where c.jos_id=".$jos_id." and c.jap_status=1 order by j.dateadded desc";
	$result=$this->db->query($sql);
	return $result;
}



/////////////
function get_company_job_applications($com_id){
  	$sql="select j.job_location,j.job_status,c.jap_accepted_date,c.jap_rejected_date,c.jap_id,c.jos_id,s.jos_username,s.jos_sef,j.job_sef,j.job_id,c.jap_status,j.dateadded,j.package_expirydate,j.job_title,j.salary,j.working_hours,j.experience_id,j.gender from jobs j inner join job_applications as c on j.job_id = c.job_id join jobseekers s on c.jos_id=s.jos_id where j.com_id=".$com_id." and c.jap_status=-1 order by j.dateadded desc";
	$result=$this->db->query($sql);
	return $result;
}

function get_company_job_applications_single($com_id,$job_id){
  	$sql="select j.job_location,j.job_status,c.jap_rejected_date,c. 	jap_accepted_date,c.jap_id,c.jos_id,s.jos_username,s.jos_sef,j.job_sef,c.jap_dateadded,j.job_id,c.jap_status,j.dateadded,j.package_expirydate,j.job_title,j.salary,j.working_hours,j.experience_id,j.gender from jobs j inner join job_applications as c on j.job_id = c.job_id join jobseekers s on c.jos_id=s.jos_id where  c.job_id=".$job_id." and j.com_id=".$com_id." order by c.jap_status desc";
	$result=$this->db->query($sql);
	return $result;
}


///
function get_company_jobs($com_id){
  	$sql="select c.com_id,c.com_logo,c.com_sef,c.com_name,j.job_location,j.job_status,j.job_sef,j.job_id,j.dateadded,j.package_expirydate,j.job_title,j.salary,j.working_hours,j.experience_id,j.gender from jobs j inner join companies as c on j.com_id = c.com_id where c.com_id=".$com_id." order by j.dateadded desc";
	$result=$this->db->query($sql);
	return $result;
}

//Manag Jobs

//vacancies
function get_company_job_detail($sef){
  	$sql="select c.com_id,c.com_logo,c.com_sef,j.responsibilties,j.skills_required,j.short_desc,c.com_name,j.job_location,j.job_sef,j.job_id,j.dateadded,j.package_expirydate,j.job_status,t.jtype_name,t.jtype_label,j.job_title,j.salary,j.working_hours,j.experience_id,g.gender_name from jobs j inner join companies as c on j.com_id = c.com_id join job_type t on j.job_type_id=t.jtype_id join gender g on j.gender=g.gender_id where j.job_sef='".$sef."' order by j.dateadded desc";
	$result=$this->db->query($sql);
	return $result;
}


////////////



/////////////

function get_company_detail($company_sef){
  	$sql="select c.com_id,c.com_logo,c.com_sef,c.com_headline,ct.ctype_name,j.responsibilties,j.skills_required,j.short_desc,c.com_name,j.job_location,j.job_sef,j.job_id,j.dateadded,ce.cemp_name,j.package_expirydate,j.job_status,t.jtype_name,t.jtype_label,j.job_title,j.salary,j.working_hours,j.experience_id,j.gender from jobs j inner join companies as c on j.com_id = c.com_id join job_type t on j.job_type_id=t.jtype_id join company_employer ce on c.cemp_id=ce.cemp_id join company_type ct on c.ctype_id=ct.ctype_id where c.com_sef='".$company_sef."' and j.job_status !=0 order by j.dateadded desc";
	$result=$this->db->query($sql);
	return $result;
}

function get_company_detail2($company_sef){
  	$sql="select c.com_id,c.com_logo,c.com_sef,c.com_phone_number,c.com_email,c.short_description,c.com_website,c.com_location,c.com_headline,ct.ctype_name,c.com_name,ce.cemp_name from companies c join company_employer ce on c.cemp_id=ce.cemp_id join company_type ct on c.ctype_id=ct.ctype_id where c.com_sef='".$company_sef."' order by c.dateadded desc";
	$result=$this->db->query($sql);
	return $result;
}

///		
//home page
////////////////////////////////////////////////////////////////
function get_recent_jobs(){
$sql="select c.com_id,c.com_logo,c.com_sef,c.com_headline,j.responsibilties,j.skills_required,j.short_desc,c.com_name,j.job_location,j.job_sef,j.job_id,j.dateadded,j.package_expirydate,j.job_status,t.jtype_name,t. 	jtype_label,j.job_title,j.salary,j.working_hours,j.experience_id,j.gender from jobs j inner join companies as c on j.com_id = c.com_id join job_type t on j.job_type_id=t.jtype_id where j.job_status !=0 order by j.dateadded desc limit 5";
	$result=$this->db->query($sql);	$result=$this->db->query($sql);
	return $result;
	}
function get_recent_jobs_featured(){
$sql="select c.com_id,c.com_logo,c.com_sef,c.com_headline,j.responsibilties,j.skills_required,j.short_desc,c.com_name,j.job_location,j.job_sef,j.job_id,j.dateadded,j.package_expirydate,j.job_status,t.jtype_name,t. 	jtype_label,j.job_title,j.salary,j.working_hours,j.experience_id,j.gender from jobs j inner join companies as c on j.com_id = c.com_id join job_type t on j.job_type_id=t.jtype_id where j.job_status !=0 and feature_bit=1 order by j.dateadded desc";
	$result=$this->db->query($sql);	$result=$this->db->query($sql);
	return $result;
	}


//////////////////////


//browse secton

function get_browse_recent_search($page,$per_page){
	$sql="select c.com_id,c.com_logo,c.com_sef,c.com_headline,j.responsibilties,j.skills_required,j.short_desc,c.com_name,j.job_location,j.job_sef,j.job_id,j.dateadded,j.package_expirydate,j.job_status,t.jtype_name,t. 	jtype_label,j.job_title,j.salary,j.working_hours,j.experience_id,j.gender from jobs j inner join companies as c on j.com_id = c.com_id join job_type t on j.job_type_id=t.jtype_id where j.job_status !=0 order by j.dateadded desc LIMIT ".$page." , ".$per_page."";
	$result=$this->db->query($sql);
	return $result;
	}
	
	function get_browse_recent_count(){
	$sql="select c.com_id,c.com_logo,c.com_sef,c.com_headline,j.responsibilties,j.skills_required,j.short_desc,c.com_name,j.job_location,j.job_sef,j.job_id,j.dateadded,j.package_expirydate,j.job_status,t.jtype_name,t. 	jtype_label,j.job_title,j.salary,j.working_hours,j.experience_id,j.gender from jobs j inner join companies as c on j.com_id = c.com_id join job_type t on j.job_type_id=t.jtype_id where j.job_status !=0 order by j.dateadded desc";
	$result = $this->db->query($sql);
	$row_count = $result->num_rows();
	return $row_count;
	}
	
	function get_browse_recent($num,$offset){
	$sql="select c.com_id,c.com_logo,c.com_sef,c.com_headline,j.responsibilties,j.skills_required,j.short_desc,c.com_name,j.job_location,j.job_sef,j.job_id,j.dateadded,j.package_expirydate,j.job_status,t.jtype_name,t. 	jtype_label,j.job_title,j.salary,j.working_hours,j.experience_id,j.gender from jobs j inner join companies as c on j.com_id = c.com_id join job_type t on j.job_type_id=t.jtype_id where j.job_status=1 order by j.dateadded desc limit ".$offset.",".$num;
	$result=$this->db->query($sql);	$result=$this->db->query($sql);
	return $result;
	}
///


function set_mail($id)
{
	
   	$this->db->select('email_id,email_subject,email_from_name,from_email,email_content');
  	$this->db->from('email_template');
  	$this->db->where('email_id',$id);
   	$result         		= $this->db->get();
  	$row            		= $result->row();
	$data['from_email']     	= $row->from_email;
   	$data['email_subject']    	= $row->email_subject;
   	$data['email_content']= $row->email_content;
   	$data['email_from_name']  	= $row->email_from_name;

	return $data;
}


	//////////////////////////////////////////////////////////
	  function create_password() //CREATE RANDOM PASSWORD
  {
	  	$acceptedChars = 'azertyuiopqsdfghjklmwxcvbn23456789';
	  	$max = strlen($acceptedChars)-1;
	  	$password = '';
	  	$password2 = '';
	  	$tmp = '';
	 	for($i=0; $i < 2; $i++) {
			$password .= $acceptedChars{mt_rand(0, $max)};
	 	}
	  	for($i=0; $i < 3; $i++) {
			$password2 .= $acceptedChars{mt_rand(0, $max)};
	 	} 
	  	while( @$c++ * 16 < 8 )
	  	{
			$tmp .= md5(mt_rand());
		}
		$tmp = substr( $tmp, 0, 8 );
		return $password.$tmp.$password2;
  
  }
	
	function check_user_email_name($username_email)
	{
		$query='select *from users where (user_email = "'.$username_email.'" or user_username="'.$username_email.'")';
		   return $this->db->query($query);
	}
	

	function get_field_value($field,$val,$find,$table)
	{
		$this->db->select($find);
		$this->db->from($table);
		$this->db->where($field,$val);
		$result = $this->db->get();
		if($result->num_rows()>0){
			$row	=	$result->row();
			return $row->$find;
		}
		else{
			return '';
		}
	}
	function get_field_value2($where,$find,$table)
	{
		$this->db->select($find);
		$this->db->from($table);
		$this->db->where($where);
		$result = $this->db->get();
		if($result->num_rows()>0){
			$row	=	$result->row();
			return $row->$find;
		}
		else{
			return '';
		}
	}
	
function get_id_against_username($select,$table,$where)
{
	$this->db->select( $select );
	$this->db->from( $table );
	$this->db->where( $where );
	$res= $this->db->get();
	if($res->num_rows()>0)
	{
		$data=$res->row();
		return $data->user_id;
	}
}

//*************maria_model************************
 function select_single_field($select,$table,$where)

	{

		$this->db->select( $select );

		$this->db->from( $table );

		$this->db->where( $where );

		$qry = $this->db->get();

		$rr	=	$qry->row_array();

		if($qry->num_rows() >0)

			return	$rr[$select];

		else

			return '';

		

	}





				
				
/* ------- Get total number */	


function record_per_page()
	{	
		$this->db->select('settings_record_front');
		$this->db->from   ( 'settings' );
		$result = $this->db->get();
		$row	= $result->row(); 
		return $row->settings_record_front;
	}	
	


	
function get_max_id($id,$table){


$this->db->select_max($id);
$this->db->from( $table );
$result = $this->db->get();
$row = $result->row();
$maxid = $row->$id; 
$maxid=$maxid+1;

return $maxid;
}
function select_all($table,$select)
{
	$this->db->select( $select );
	$this->db->from( $table );

	return $this->db->get();
}

function select_all_order_limit($select,$table,$field,$type,$limit)
{
	$this->db->select( $select );
	$this->db->from( $table );
	$this->db->order_by($field,$type);
	$this->db->limit($limit);	
	return $this->db->get();
}

function select_all_limit($table,$select,$field,$type)
{
	$this->db->select( $select );
	$this->db->from( $table );
	$this->db->order_by($field,$type);
	$this->db->limit(1);
	return $this->db->get();
}
function select_all_order($table,$select,$field,$type)
{
	$this->db->select( $select );
	$this->db->from( $table );
	$this->db->order_by($field,$type);
	//$this->db->limit(1);
	return $this->db->get();
}

function select_all_where_order($table,$select,$where,$field,$type)
{
	$this->db->select( $select );
	$this->db->from( $table );
	$this->db->where( $where );
	$this->db->order_by($field,$type);
	//$this->db->limit(1);
	return $this->db->get();
}
function select_all_menu_limit($table,$select,$field,$type)
{
	$this->db->select( $select );
	$this->db->from( $table );
	$this->db->order_by($field,$type);
	$this->db->limit(5);
	return $this->db->get();
}
function insert_info($table,$data_a)
{
	
	$this->db->insert($table,$data_a); 
	$last_ca_id = $this->db->insert_id();
	return 	$last_ca_id;	
	
}

function select_field($select,$table,$where,$model_name)
{
	$this->db->select( $select );
	$this->db->from( $table );
	$this->db->where( $where );
	$res= $this->db->get();
	if($res->num_rows()>0)
	{
		$data=$res->row();
		return $data->model_name;
	}
	
}


function checked_rights($id)
{
		$this->db->select ( '*' );
		$this->db->from   ( 'subadmin_rights' );
		$this->db->where  ('admin_id',$id);
		$result = $this->db->get();
		$pro_sizes = array();
		if($result->num_rows()>0)
		{
			foreach($result->result_array() as $pro_size)
			{
				$pro_sizes[] = $pro_size['right_id']; 
			}
			
		}
		
		return $pro_sizes;
	}

function insert_simple($table,$data_a)
{
  $this->db->insert($table,$data_a); 
  
}	
function insert_info_where($table,$data_a,$where)
{
	
	$this->db->insert($table,$data_a);
    $this->db->where( $where );
	$last_ca_id = $this->db->insert_id();
	return 	$last_ca_id;	
	
}
function select_where_limit($select,$table,$where,$field,$type,$limit)
{
	$this->db->select( $select );
	$this->db->from( $table );
	$this->db->where( $where );
	$this->db->limit($limit);
	$this->db->order_by($field,$type);
	return $this->db->get();
}	

function select_where($select,$table,$where)
{
	$this->db->select( $select );
	$this->db->from( $table );
	$this->db->where( $where );
	return $this->db->get();
}

function update_where($where,$table,$data)
{
		$this->db->where( $where );
		$this->db->update( $table , $data);	
}


function update_table($table,$data)
{
	$this->db->update($table,$data);	
}
function delete_where($select,$where,$table)
{
	$this->db->select($select);
	$this->db->where($where);
	$this->db->delete($table); 
}
function delete_where2($where,$table)
{

	$this->db->where($where);
	$this->db->delete($table); 
}





///

	
	//********************Get_wordpress_User_email_ID*********
	 function wordpress_user_id($admin_name)
	 {
		   $this->db->select('ID');
		   $this->db->from('wp_users');
		   $this->db->where('user_login ',$admin_name);
		   $query1 = @$this->db->get(); 
			if($query1->num_rows()>0)
			{
				$row = $query1->row_array();
				return $row['ID'];
			}
		   else
		   {
				return '';
		   }	 
	}	
	
	 function wordpress_user_id2($admin_email)
	 {
		   $this->db->select('ID');
		   $this->db->from('wp_users');
		   $this->db->where('user_email ',$admin_email);
		   $query1 = @$this->db->get(); 
			if($query1->num_rows()>0)
			{
				$row = $query1->row_array();
				return $row['ID'];
			}
		   else
		   {
				return '';
		   }	 
	}	
	


//******************update_wordprsslogin**********************
	function update_wordpress($data,$id)
	{
		$this->db->where('ID',$id);
		$this->db->update('wp_users',$data);
	}	
//front end


function check_sef($table,$select,$where){
					
					$this->db->select($select);
					$this->db->from($table);
					$this->db->where($where);
					return $this->db->get();
				}

			function update_page_sef($table,$where1,$data){
			
			$this->db->where($where1);
    	    $query=$this->db->update($table,$data);
		
				}

function delete_pro($where,$table)
{
	//$this->db->select($select);
	$this->db->where($where);
	$this->db->delete($table); 
}
/////////////

//Serach jobs

function filter_jobs($params){
	 

       $sql = 'Select j.job_title,c.com_logo,c.com_name,j.job_sef,j.salary,j.job_id,t.jtype_label,t.jtype_name,j.job_location from jobs as j  join companies as c on j.com_id=c.com_id join job_type as t on j.job_type_id=t.jtype_id where job_status !=0';
  
  if($params['job_type_id']!=0){
	  $sql.=' and j.job_type_id IN ('.$params['job_type_id'].')';
	  }
	   
  if($params['working_hours']!=0){
	  $sql.=' and j.working_hours IN ('.$params['working_hours'].')';
	  }
	  
	  //////
	if($params['max_salary']!=0){
	  $sql.=' and j.salary between '.$params['min_salary'].' AND '.$params['max_salary'].'';
	}
	
	if($params['salary_max'] != ''){
	  $sql.=' OR j.salary > '.$params['salary_max'].'';
	}
	  
	  ////////
    if($params['category_id']!=0)
    {
           $category_id = $params['category_id'];
     $sql.=' and j.category_id="'.$category_id.'"';
    }
    if($params['job_title']!='')
    {
     $job_title = $params['job_title'];
     $sql.=' and j.job_title Like "%'.$job_title.'%"';
	//  $sql.=' or j.skills_required Like "%'.$job_title.'%"';
	//   $sql.=' or c.com_name Like "%'.$job_title.'%"';
    }
	
	 if($params['job_location']!='')
    {
     $job_location = $params['job_location'];
     $sql.=' and j.job_location "'.$job_location.'"';
	 
    }
	
 
  
     $sql.=' order by j.dateadded desc';
  //echo $sql;exit;

     $query = $this->db->query($sql);
 // echo $sql;
  return $query;
	}
	////////////
	
	 function filter_jobs_home($params){

       $sql = 'Select j.job_title,c.com_logo,c.com_name,j.job_sef,j.job_id,t.jtype_label,t.jtype_name,j.job_location from jobs as j  join companies as c on j.com_id=c.com_id join job_type as t on j.job_type_id=t.jtype_id where job_status != 0';
  
 
    if($params['job_title']!='')
    {
     $job_title = $params['job_title'];
     $sql.=' and j.job_title Like "%'.$job_title.'%"';
	  //$sql.=' or j.skills_required Like "%'.$job_title.'%"';
	  // $sql.=' or c.com_name Like "%'.$job_title.'%"';
    }
	
	 if($params['job_location']!='')
    {
     $job_location = $params['job_location'];
     $sql.=' and j.job_location Like "%'.$job_location.'%"';
	 
    }
	
 
  
     $sql.=' order by j.dateadded desc';
  
     $query = $this->db->query($sql);
  //echo $sql;
  return $query;
	 }
	
	///
	
	
	
	function filter_company($params){
	 

       $sql = 'Select c.com_logo,c.com_name,c.com_headline,c.com_location,c.com_sef,c.short_description from companies as c where c.status_id=1';
  
  /*  if($params['category_id']!=0)
    {
           $category_id = $params['category_id'];
     $sql.=' and j.category_id="'.$category_id.'"';
    }*/
    if($params['com_name']!='')
    {
     $com_name = $params['com_name'];
     $sql.=' and c.com_name Like "%'.$com_name.'%"';
	
    }
	
	 if($params['com_location']!='')
    {
     $com_location = $params['com_location'];
     $sql.=' and c.com_location="'.$com_location.'"';
	 
    }
	
 
  
     $sql.=' order by c.dateadded desc';
  
     $query = $this->db->query($sql);
  //echo $sql;
  return $query;
	}
	
	function filter_resume($params){
		
	 

       $sql = 'Select j.jos_username,j.jos_headline,j.image,j.location,j.jos_sef,j.about_uerself,u.univ_name  from jobseekers as j join universties as u on j.univ_id=u.univ_id where j.status_id=1';
  
  /*  if($params['category_id']!=0)
    {
           $category_id = $params['category_id'];
     $sql.=' and j.category_id="'.$category_id.'"';
    }*/
    if($params['jos_username']!='')
    {
     $jos_name = $params['jos_username'];
      $sql.=' and j.jos_username Like "%'.$jos_name.'%"';
	 //   $sql.=' or j.name Like "%'.$jos_name.'%"';
	  //$sql.=' or j.about_uerself Like "%'.$jos_name.'%"';
	//   $sql.=' or j.jos_headline Like "%'.$jos_name.'%"';
	
    }
	
	 if($params['location']!='')
    {
     $location = $params['location'];
     $sql.=' and j.location Like "%'.$location.'%"';
	 
    }
	
	if($params['univ_id']!=0)
    {
     $univ_id = $params['univ_id'];
       $sql.=' and j.univ_id IN ('.$params['univ_id'].')';
	 
    }
	
	if($params['spe_id']!=0)
    {
     $spe_id = $params['univ_id'];
       $sql.=' and j.spe_id IN ('.$params['spe_id'].')';
	 
    }
	 
	if($params['gender']!=0)
    {
     $gender = $params['gender'];
        $sql.=' and j.gender="'.$gender.'"';
	 
    }
	
 
  
     $sql.=' order by j.dateadded desc';
  
     $query = $this->db->query($sql);
  //echo $sql;
  return $query;
	
		}


/////////////////////////////////

function SEF_URLS($str,$field_name,$table, $replace=array(), $delimiter='_') 
{
	$str=trim($str);
	if( !empty($replace) ) {
	 $str = str_replace((array)$replace, ' ', $str);
	}

	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	$sql	=	"select ".$field_name." from ".$table." where ".$field_name."='".$clean."'";
	$counting	=	$this->db->query($sql);
	if($counting->num_rows()>0)
	{
	$random	=	rand(2555555,10000000);
	$clean	=	$clean.$random.time();
	return $clean;
	}
	else
	{
	 return $clean;
	}
}

/*----------------------------------------------end_____________________---*/
}?>