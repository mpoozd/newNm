<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cron_job extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('General_model');
		//varify_session();
	}
	//pacakge expiry
	function index(){	
	
		$com = $this->general_model->select_where('*','companies',array('status_id'=>1));
		if($com->num_rows()>0){
			foreach($com->result() as $row){
				 if($row->status_id == 1){
				if($row->price_package_id!=0){
					$d=$row->package_expirydate;
				
					if(time()>$d){
				
								
								$array23['price_package_id']=0;
								$array23['package_expirydate']=0;
                             	$$this->general_model->update_where(array('com_id'=>$row->com_id),'companies',$array23);
							
						
					
			
		}
				}
			}
	}
		}
	}
	
	////job expired
	function job_expiry(){
		
	$jobs = $this->general_model->select_where('*','jobs');
		if($jobs->num_rows()>0){
			foreach($jobs->result() as $row){
				
				if($row->price_package_id!=0){
					$d=$row->package_expirydate;
				
					if(time()>$d){
				
								
								$array23['price_package_id']=0;
								$array23['package_expirydate']=0;
                             	$$this->general_model->update_where(array('job_id'=>$row->job_id),'jobs',$array23);
							
						
					
			
		}
				}
			
	}
		}
		}
	
		
}