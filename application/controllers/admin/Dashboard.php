<?php
class Dashboard extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		varify_admin_user();
		
	}
	
	
	function index(){	
		
	$data['class']	= 'dashboard';
	$data['title']  =  'Dashboard';	
		
	
	   /* Today Starts*/	
		
	$current_day_start = strtotime(date('Y-m-d 00:00:00'));
	$current_day_end   = strtotime(date('Y-m-d 23:59:59'));
		
$select_today_sales = $this->db->query("SELECT SUM(order_amount) as total FROM `orders` WHERE `dateadded` BETWEEN $current_day_start AND $current_day_end");
$select_today_sales_resu = $select_today_sales->row();
$today_sales = $select_today_sales_resu->total;

if($today_sales == ""){
	$result['today_sales'] = 0;
} else {
	$result['today_sales'] = $today_sales;
}

	
	$select_today_student_reg = $this->db->query("SELECT * FROM `jobseekers` WHERE `dateadded` BETWEEN $current_day_start AND $current_day_end");
	$result['today_std_reg'] = $select_today_student_reg->num_rows();
	
	$select_today_com_reg = $this->db->query("SELECT * FROM `companies` WHERE `dateadded` BETWEEN $current_day_start AND $current_day_end");
	$result['today_com_reg'] = $select_today_com_reg->num_rows();
	
	$select_today_jobs = $this->db->query("SELECT * FROM `jobs` WHERE `dateadded` BETWEEN $current_day_start AND $current_day_end");
	$result['today_jobs'] = $select_today_jobs->num_rows();
	
	
	/* Today Ends*/
	
	/* This Week Starts*/

	$week_first = strtotime(date("Y-m-d 00:00:00",strtotime('monday this week')));
   	$week_today = time();
	
	$select_week_sales = $this->db->query("SELECT SUM(order_amount) as total FROM `orders` WHERE `dateadded` BETWEEN $week_first AND $week_today");
	$select_week_sales_resu = $select_week_sales->row();
	$week_sales = $select_week_sales_resu->total;
	
	if($week_sales == ""){
		$result['week_sales'] = 0;
	} else {
		$result['week_sales'] = $week_sales;
	}
	
	
	$select_week_std_reg = $this->db->query("SELECT * FROM `jobseekers` WHERE `dateadded` BETWEEN $week_first AND $week_today");
	$result['week_std_reg'] = $select_week_std_reg->num_rows();
	
	$select_week_com_reg = $this->db->query("SELECT * FROM `companies` WHERE `dateadded` BETWEEN $week_first AND $week_today");
	$result['week_com_reg'] = $select_week_com_reg->num_rows();
	
	$select_week_jobs = $this->db->query("SELECT * FROM `jobs` WHERE `dateadded` BETWEEN $week_first AND $week_today");
	$result['week_jobs'] = $select_week_jobs->num_rows();
	
	
	/* This week Ends*/
	
	/*This Month Starts*/
	
	$first_day_this_month = strtotime(date('Y-m-d 00:00:00', strtotime('first day of this month')));     // hard-coded '01' for first day
	$last_day_this_month  = time();
	
	$select_month_sales = $this->db->query("SELECT SUM(order_amount) as total FROM `orders` WHERE `dateadded` BETWEEN $first_day_this_month AND $last_day_this_month");
	
	$select_month_sales_resu = $select_month_sales->row();
	$month_sales = $select_month_sales_resu->total;
	
	if($month_sales == ""){
		$result['month_sales'] = 0;
	} else {
		$result['month_sales'] = $month_sales;
	}
	
	$select_month_std_reg = $this->db->query("SELECT * FROM `jobseekers` WHERE `dateadded` BETWEEN $first_day_this_month AND $last_day_this_month");
	$result['month_std_reg'] = $select_month_std_reg->num_rows();
	
	$select_month_com_reg = $this->db->query("SELECT * FROM `companies` WHERE `dateadded` BETWEEN $first_day_this_month AND $last_day_this_month");
	$result['month_com_reg'] = $select_month_com_reg->num_rows();
	
	$select_month_jobs = $this->db->query("SELECT * FROM `jobs` WHERE `dateadded` BETWEEN $first_day_this_month AND $last_day_this_month");
	$result['month_jobs'] = $select_month_jobs->num_rows();
	

	/* This Month Ends*/
		
	$data['content'] = $this->load->view('admin/dashboard/dashboard',$result,true);
	$this->load->view('admin/template',$data);
				
	}
	


}
?>
