<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Browse_jobs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
			get_lang();
		$this->config->set_item('language', 'ar'); 
	}
	function index($pageno=0)
	{	
	
         $data['home_bit']='active';
     
	
		
		$per_page  =2;
		
		if($per_page==''){
			$per_page=settings('settings_admin_perpage_record');
		}
		else{
			$per_page=$per_page;
		}
		
		
		
	
		$res['pro']  = $this->General_model->get_browse_recent_count();
	
		$config['base_url'] 	= base_url().'/Browse_jobs/index';
	    $config['total_rows']   = $res['pro']->num_rows();
		$config['per_page']   	= $per_page;
	    $config['uri_segment']	= 4;
		
		//pagination styling
	//pagination styling
	$config['full_tag_open'] 	= '';
	$config['full_tag_close'] 	= '';
	$config['cur_tag_open'] 	= '<li class="active"><a>';
	$config['cur_tag_close'] 	= '</a></li>';
	$config['num_tag_open'] 	= '<li>';
	$config['num_tag_close'] 	= '</li>';
	$config['next_tag_open'] 	= '<li>';
	$config['next_tag_close'] 	= '</li>';
	$config['last_tag_open'] 	= '<li>';
	$config['last_tag_close'] 	= '</li>';
	$config['last_link'] 		= '&gt;&gt;';
	$config['first_tag_open'] 	= '<li>';
	$config['first_tag_close'] 	= '</li>';
	$config['first_link'] 		= '&lt;&lt;';
	
	$config['prev_tag_open'] = '<li>';
	$config['prev_tag_close'] = '</li>';

	$this->pagination->initialize($config);
	
		
		$res['brow_data']				=$this->General_model->get_browse_recent($config['per_page'],$pageno);
		$res['pageno'] 			= $pageno;
	    $res['per_page'] 	    = $per_page;
		
		
		
		$res['page_below_title']='Use following search box to find jobs that fits you better.';
	$res['page_title']='Browse Jobs';

		$data['content']=$this->load->view('frontend/home/browse_job_view',$res,true);
	
		$this->load->view('frontend/home/main_template',$data);
			
			
	
	}
	
}?>