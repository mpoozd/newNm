<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_Controller {
//......................  constructor............................. .....//
	function __construct()
	{
		parent::__construct();
	
			get_lang();
		$this->config->set_item('language', 'ar'); 
		
	}

//........................ index Function ................................. //	
	public function index($page_sef='')
	{
	    $result['page_data'] = $this->General_model->select_where('*','pages',array('page_sef'=>$page_sef));
		$page_id              = $this->General_model->get_field_value2(array('page_sef'=>$page_sef),'page_id','pages');
	
		if($page_id==2){
		$result['howitworks_bit']='active';
		
		$result['page_below_title']=$this->lang->line('page_1_below');
		$result['page_title']=$this->lang->line('page_1');
		
		}
		else if( $page_id==1){
			$result['about_bit']='active';
			
		$result['page_below_title']=$this->lang->line('page_2_below');
		$result['page_title']=$this->lang->line('page_2');
			}
			else if( $page_id==3){
			$result['about_bit']='active';
		$result['page_below_title']=$this->lang->line('page_3_below');
		$result['page_title']=$this->lang->line('page_3');
			}
			else if( $page_id==4){
		$result['terms_bit']='active';
	$result['page_below_title']=$this->lang->line('page_4_below');
		$result['page_title']=$this->lang->line('page_4');
			}
			else if( $page_id==5){
		$result['privcy_bit']='Privacy Policy';
		$result['page_below_title']=$this->lang->line('page_5_below');
		$result['page_title']=$this->lang->line('page_5');
			}
		//$result['page_name']='Services';
	//	$data['contents']    = $this->load->view ('pages/page_view',$result,true);
		$this->load->view('frontend/pages/page_template',$result);
		
	}
	
	
	

	
}