<?php if ( ! defined('BASEPATH')) exit ('No direct script  allow'); 

class Common_model extends  CI_Model {
	
	/* 2015 */
	// comments on 18feb 9999
	/*
	function minigraph($ccol, $table, $dcol, $dayNo){
		
		$firstdate	=		strtotime(" -$dayNo day");
		$array	=	array();
		for($lp=1; $lp <= $dayNo; $lp++){
			if($lp == 1){
				$start_date	=	 date("Y-m-d H:i:s",$firstdate);
			}else{
				$start_date = date('Y-m-d H:i:s', strtotime($stop_date . ' + 1 day'));
			}
	
			$stop_date = date('Y-m-d H:i:s', strtotime($start_date . ' + 1 day'));
				
			$sdate	=	 strtotime( $start_date ); 		$edate	=	strtotime( $stop_date );
			
			$mysql	=	$this->db->query( "SELECT COUNT($ccol) as tcount FROM $table WHERE $dcol BETWEEN $sdate and $edate" );
			$row	=	$mysql->row_array();
			$tcount	=	$row["tcount"];
			$array[]	=	$tcount;
			
			$temp = $start_date;
			$start_date = $stop_date;
			$stop_date	=	$temp;
			
			
		}
		
		return $array;
	
		
	}
	*/
	/* 2015 */
	
	
	// 18 february 2015
	/*
	function transaction_information($company_id, $store, $payment, $status, $fil_issue_date, $fil_expiry_date, $card){
		$conditionStr	=	"";
		if($status !=""){
			$conditionStr	.=	" AND `ord_status` = '".$status."'";
		}
		
		if($store !=""){
			$conditionStr	.=	" AND `business_id` IN (".$store.")";
		}
		
		if($payment !=""){
			if($card != ""){
			$conditionStr	.=	" AND (`payment_by` IN (".$payment.") OR `card_name` IN (".$card."))";
			}else {
			$conditionStr	.=	" AND `payment_by` IN (".$payment.")";	
			}
		}
	
		if($fil_issue_date != "" && $fil_expiry_date !=""){
			$conditionStr	.=	" AND `ord_date` BETWEEN  ".$fil_issue_date." AND ".$fil_expiry_date."";
		}
	
	
		$mysql	=	$this->db->query("	
			SELECT 
				COUNT(`ord_id`) AS `total`, 
				COUNT(IF(`ord_status` = 'reverse', 1, NULL)) AS `reverse`, 
				COUNT(IF(`ord_status` = 'fraud', 1, NULL)) AS `fraud`, 
				COUNT(IF(`ord_status` = 'paid', 1, NULL)) AS `paid` 
			FROM   `tbl_order` 
			WHERE `company_id` = ".$company_id." ".$conditionStr.""
		);
	
		return	$mysql;
		
	}
	*/
	
	/*
	function transaction_matrix($company_id, $store, $payment, $status, $fil_issue_date, $fil_expiry_date, $card){
		$conditionStr	=	"";
		if($status !=""){
			$conditionStr	.=	" AND `ord_status` = '".$status."'";
		}
		
		if($store !=""){
			$conditionStr	.=	" AND `business_id` IN (".$store.")";
		}
		
		if($payment !=""){			
		
			if($card != ""){
			$conditionStr	.=	" AND (`payment_by` IN (".$payment.") OR `card_name` IN (".$card."))";
			}else {
			$conditionStr	.=	" AND `payment_by` IN (".$payment.")";	
			}
		}
	
		if($fil_issue_date != "" && $fil_expiry_date !=""){
			$conditionStr	.=	" AND `ord_date` BETWEEN  ".$fil_issue_date." AND ".$fil_expiry_date."";
		}
	
	
		$mysql	=	$this->db->query("	
			SELECT 
			`ord_id`, `ord_amount`, `tip_amount`, `invoice_no`, `transaction_id`, `ord_status`, `ord_date`, `payment_by`, `business_id`, `employee_id`, `ord_userid` 
			FROM  `tbl_order` 
			WHERE `company_id` = ".$company_id." ".$conditionStr.""
		);
		
		//echo $this->db->last_query();
		return	$mysql;
		
	}
	*/
	
	/*
	function pie_chatinformation($company_id, $store, $payment, $status, $fil_issue_date, $fil_expiry_date,$card){
		$conditionStr	=	"";
		if($status !=""){
			$conditionStr	.=	" AND `ord_status` = '".$status."'";
		}
		
		if($store !=""){
			$conditionStr	.=	" AND `business_id` IN (".$store.")";
		}
		
		if($payment !=""){
				if($card != ""){
					$conditionStr	.=	" AND (`payment_by` IN (".$payment.") OR `card_name` IN (".$card."))";
				}else {
					$conditionStr	.=	" AND `payment_by` IN (".$payment.")";	
			}
		}
	
		if($fil_issue_date != "" && $fil_expiry_date !=""){
			$conditionStr	.=	" AND `ord_date` BETWEEN  ".$fil_issue_date." AND ".$fil_expiry_date."";
		}
	
	//COUNT(IF(`payment_by` = 'cash', 1, NULL)) AS `cash`, 
		$mysql	=	$this->db->query("	
			SELECT 
			COUNT(`ord_id`) AS `total`, 
				
				COUNT(IF(`payment_by` = 'wallet', 1, NULL)) AS `wallet`, 
				COUNT(IF(`payment_by` = 'card' AND `card_name` = 'visa', 1, NULL)) AS `visa`,
				COUNT(IF(`payment_by` = 'card' AND `card_name` = 'mastercard', 1, NULL)) AS `master`
			FROM  `tbl_order` 
			WHERE `company_id` = ".$company_id." ".$conditionStr.""
		);
		
		//echo $this->db->last_query();
		return	$mysql;
		
	}
	*/
	
	
	function delete_two_join_table($table1,$table2,$condition,$where){

		$this->db->query("DELETE a.*, b.* FROM $table1 a 

						  LEFT JOIN $table2 b 

						  ON $condition 

						  WHERE $where");

		return TRUE;				  

		}
	
	
	function pie_account($employee_id, $fil_issue_date, $fil_expiry_date){
		$conditionStr	=	"";
	
		if($fil_issue_date != "" && $fil_expiry_date !=""){
			$conditionStr	.=	" AND `ord_date` BETWEEN  ".$fil_issue_date." AND ".$fil_expiry_date."";
		}
	
	//COUNT(IF(`payment_by` = 'cash', 1, NULL)) AS `cash`, 
		$mysql	=	$this->db->query("	
			SELECT 
			COUNT(`ord_id`) AS `total`, 
				
				COUNT(IF(`payment_by` = 'cash', 1, NULL)) AS `cash`,
				COUNT(IF(`payment_by` = 'wallet', 1, NULL)) AS `wallet`, 
				COUNT(IF(`payment_by` = 'card' AND `card_name` = 'visa', 1, NULL)) AS `visa`,
				COUNT(IF(`payment_by` = 'card' AND `card_name` = 'mastercard', 1, NULL)) AS `master` 
			FROM  `tbl_order` 
			WHERE `employee_id` = ".$employee_id." ".$conditionStr.""
		);
		
		return	$mysql;
		
	}
	
	
	
	
	function join_two_tab_wheree( $select, $from, $jointable, $condition, $where, $orderBy_columName, $ASC_DESC ){

		$this->db->select($select);

		$this->db->from( $from );

		$this->db->join( $jointable , $condition );

		$this->db->where( $where );

		$this->db->order_by( $orderBy_columName , $ASC_DESC );	

		return $this->db->get();



	}

	
	
	function filter_query($select, $table, $where_str){
		return $this->db->query("SELECT ".$select." FROM ".$table." WHERE ".$where_str);	
	}
	
	function where_like($select,$table,$where_con,$where)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where_con );
		$this->db->like($where); 
		return $this->db->get();
	}
	
	function select_all($select,$table)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		return $this->db->get();
	}
	
	
	function select_max($select,$table)
	{
		$this->db->select_max( $select );
		$this->db->from( $table );
		return $this->db->get();
	}
	function select_where_or($select,$table,$where, $or_where)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$this->db->or_where( $or_where ); 
		return $this->db->get();		
	}
	
	function select_all_order_by($select,$table,$field,$ASC_DESC)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->order_by($field, $ASC_DESC); 
		return $this->db->get();
	}
	
	
	function join_tables_009( $select, $from, $jointable, $condition, $where, $orderBy_columName , $ASC_DESC ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable , $condition );
		$this->db->where( $where );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );
		return $this->db->get();

	}
	
	
	function select_all_with_limit($select,$from,$where,$order_by,$ASC_DESC,$num_of_rows,$start_from){
		
		$this->db->select($select)
				 ->from($from)
				 ->where($where)
				 ->order_by($order_by, $ASC_DESC)
				 ->limit($num_of_rows,$start_from);
				 
	
		return $this->db->get();       
			
			
		
	}
	
	
	function select_where($select,$table,$where)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		return $this->db->get();
	}
	
	function max_value_common($field_name,$table,$where)
	{
		$sql="select max($field_name) as val from $table $where";
		$result=$this->db->query($sql);
		if($result->num_rows()>0)
		{
			$row=$result->row();
			return $row->val;
		}
		else
		{
			return 0;
		}
	}

	
	
	function select_groupby($select,$table,$where,$groupby)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$this->db->group_by( $groupby ); 
		return $this->db->get();
	}
	
	

	function select_distinct($select,$table,$where)
	{	
		$this->db->distinct($select);
		$this->db->from( $table );
		$this->db->where( $where );
		return $this->db->get();
	}
	
	
	function export($company_id,$store1,$payment1,$status1,$start_date,$end_date){
		$str	=	"";
		if($store1 != ""){
			$str	.=	" AND `business_id` IN ".$store1."";
		}
		
		if($payment1 != ""){
			$str	.=	" AND `payment_by` IN ".$payment1."";
		}
		
		if($status1 != ""){
			$str	.=	" AND `ord_status` IN ".$status1."";
		}
		
		if($start_date != ""){
			$str	.=	" AND `ord_date` > ".$start_date."";
		}
		
		if($end_date != ""){
			$str	.=	" AND `ord_date` < ".$end_date."";
		}
		
		return $this->db->query("SELECT transaction_id,ord_date,ord_amount,ord_status,payment_by FROM (`tbl_order`) WHERE `company_id` = ".$company_id."".$str."");
		
		}
	
	
	
	function where_in_trans($company_id,$start_date,$end_date,$store1,$status2){
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
		
		
		return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` > ".$start_date." AND `ord_date` < ".$end_date." ".$store1." AND `ord_status` IN ('".$status2."')");
		}
		
	function where_in_trans_two($company_id,$start_date,$end_date,$store1,$status2,$status){
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
		
		
		return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` > ".$start_date." AND `ord_date` < ".$end_date." ".$store1." AND `ord_status` IN ('".$status2."') AND `ord_status` = '".$status."'");
		}
		
	function where_in_trans_bar($company_id,$start_date,$end_date,$store1,$status2,$payment){
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
		
		return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` > ".$start_date." AND `ord_date` < ".$end_date."  ".$store1." AND `ord_status` IN ('".$status2."') AND `payment_by` = '".$payment."'");
		}
	
	function where_in_trans_bar2($company_id,$start_date,$end_date,$store1,$status2,$payment,$name){
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
	return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` > ".$start_date." AND `ord_date` < ".$end_date." ".$store1." AND `ord_status` IN ('".$status2."') AND `payment_by` = '".$payment."' AND `card_name` = '".$name."'");
		}			
	
	
	function where_in_trans_startEmpty($company_id,$end_date,$store1,$status2){
		
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
		
		return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` < ".$end_date." ".$store1." AND `ord_status` IN ('".$status2."')");
		}
		
	function where_in_trans_startEmpty_two($company_id,$end_date,$store1,$status2,$status){
		
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
		
		return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` < ".$end_date." ".$store1." AND `ord_status` IN ('".$status2."') AND `ord_status` = '".$status."'");
		}
		
	function where_in_trans_startEmpty_bar($company_id,$end_date,$store1,$status2,$payment){
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
		
		
		return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` < ".$end_date."  ".$store1." AND `ord_status` IN ('".$status2."') AND `payment_by` = '".$payment."'");
		}
	
	function where_in_trans_startEmpty_bar2($company_id,$end_date,$store1,$status2,$payment,$name){
		
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
		
		return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` < ".$end_date." ".$store1." AND `ord_status` IN ('".$status2."') AND `payment_by` = '".$payment."'  AND `card_name` = '".$name."'");
		}				
	
	function where_in_trans_endEmpty($company_id,$start_date,$store1,$status2){
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
		return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` > ".$start_date." ".$store1." AND `ord_status` IN ('".$status2."')");
		}
	
	function where_in_trans_endEmpty_two($company_id,$start_date,$store1,$status2,$status){
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
		
		return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` > ".$start_date." ".$store1." AND `ord_status` IN ('".$status2."') AND `ord_status` = '".$status."'");
		}
		
	function where_in_trans_endEmpty_bar($company_id,$start_date,$store1,$status2,$payment){
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
		
		return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` > ".$start_date." ".$store1." AND `ord_status` IN ('".$status2."') AND `payment_by` = '".$payment."'");
		}
	
	function where_in_trans_endEmpty_bar2($company_id,$start_date,$store1,$status2,$payment,$name){
		if($store1 !=""){
			$store1	=	" AND `business_id` IN ".$store1."";
		}
		
		return $this->db->query("SELECT * FROM (`tbl_order`) WHERE `company_id` = ".$company_id." AND `ord_date` > ".$start_date." ".$store1." AND `ord_status` IN ('".$status2."') AND `payment_by` = '".$payment."' AND `card_name` = '".$name."'");
		}			
	
	
	function where_in_db_query($str){
		return $this->db->query("SELECT * FROM (`tbt_employee`) WHERE `emp_id` IN (".$str.")");			
	}
	
	function where_in_db_query_export($str){
		return $this->db->query("SELECT 'emp_id,business_id ,emp_f_name,emp_l_name,emp_email_addr,emp_phone,access_pin,emp_bckofc_email,emp_status,emp_about,emp_address,emp_city,emp_country' FROM (`tbt_employee`) WHERE `emp_id` IN (".$str.")");			
	}
	
	
	
	
	
	function where_in_db_query2($store,$employee,$start_date,$end_date,$company_id){
		return $this->db->query("SELECT * FROM `tbl_time_clock` WHERE `emp_time_in` >".$start_date." AND `emp_time_in` < ".$end_date." AND `company_id` =  ".$company_id." AND `business_id` IN ".$store." AND `emp_id` IN ".$employee);			
	}
	
	
	
	function select_where_in($select,$table,$where_in,$in_fld,$groupby)
	{	
		$this->db->select($select);
		$this->db->from( $table );
		$this->db->where_in($in_fld, $where_in);
		$this->db->group_by($groupby);
		return $this->db->get();
	}
	
	function select_where_group($select,$table,$where,$groupby)
	{	
		$this->db->select($select);
		$this->db->from( $table );
		$this->db->where($where);
		$this->db->group_by($groupby);
		return $this->db->get();
	}
	
	function select_where_group_join($select,$table,$jointable,$condition,$where,$groupby)
	{	
		$this->db->select($select);
		$this->db->from( $table );
		$this->db->join( $jointable , $condition );
		$this->db->where($where);
		$this->db->group_by($groupby);
		return $this->db->get();
	}
	
	
	
	
	
	
	
	
	function select_where_group_two($select,$table,$where,$groupby,$where_in,$in_fld)
	{	
		$this->db->select($select);
		$this->db->from( $table );
		$this->db->where($where);
		$this->db->where_in($in_fld, $where_in);
		$this->db->group_by($groupby);
		return $this->db->get();
	}
	
	function select_where_group_two2($store,$start_date,$end_date,$company_id)
	{
		
	return $this->db->query("SELECT sum(ord_amount) as revenue , business_id FROM `tbl_order` WHERE `ord_date` >".$start_date." AND `ord_date` < ".$end_date." AND `company_id` =  ".$company_id." AND `ord_status` = 'paid' AND `business_id` IN ".$store." GROUP BY business_id");		
			
	}
	
	
	function select_where_group_two_endEmpty($store,$start_date,$end_date,$company_id)
	{
		
	return $this->db->query("SELECT sum(ord_amount) as revenue , business_id FROM `tbl_order` WHERE `ord_date` >".$start_date." AND `company_id` =  ".$company_id." AND `ord_status` = 'paid' AND `business_id` IN ".$store." GROUP BY business_id");		
			
	}
	
	function select_where_group_two_startEmpty($store,$start_date,$end_date,$company_id)
	{
		
	return $this->db->query("SELECT sum(ord_amount) as revenue , business_id FROM `tbl_order` WHERE `ord_date` < ".$end_date." AND `company_id` =  ".$company_id." AND `ord_status` = 'paid' AND `business_id` IN ".$store." GROUP BY business_id");		
			
	}
	
	
	function select_where_group_two_bothEmpty($store,$start_date,$end_date,$company_id)
	{
		
	return $this->db->query("SELECT sum(ord_amount) as revenue , business_id FROM `tbl_order` WHERE `company_id` =  ".$company_id." AND `ord_status` = 'paid' AND `business_id` IN ".$store." GROUP BY business_id");		
			
	}
	
	
	
	
	
	
	
	
	
	
	
	
	function select_where_in_one($select,$table,$where_in,$in_fld)
	{	
		$this->db->select($select);
		$this->db->from( $table );
		$this->db->where_in($in_fld, $where_in);
		return $this->db->get();
	}
	
	
	
	function select_single_field($select,$table,$where)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$qry = $this->db->get();
		if($qry->num_rows()>0)
		{
			$rr	=	$qry->row_array();
			return	$rr[$select];
		}
		else
		{
			return '';
		}
	}
	
	function select_limit_order($select,$table,$page,$recordperpage,$orderBy_columName,$ASC_DESC)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->limit( $recordperpage , $page );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );
		$result=$this->db->get();
		return $result;	
		
	}
	
	function select_where_ASC_DESC($select,$table,$where,$orderBy_columName,$ASC_DESC)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );
		$result=$this->db->get();
		return $result;	
		
	}
	
	function select_where_ASC_DESC_Group_by( $select,$table,$where,$orderBy_columName,$ASC_DESC,$group_by )
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$this->db->group_by($group_by);
		$this->db->order_by( $orderBy_columName , $ASC_DESC );
		$result=$this->db->get();
		return $result;	
		
	}

	
	function select_where_order($select,$table,$orderBy_columName,$ASC_DESC)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );
		$result=$this->db->get();
		return $result;	
		
	}
	
	function select_wher_order($select,$table,$where,$orderBy_columName,$ASC_DESC)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );
		$result=$this->db->get();
		return $result;	
		
	}
	
	function select_where_limit_order($select,$table,$where,$page,$recordperpage,$orderBy_columName,$ASC_DESC)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$this->db->limit( $recordperpage , $page );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );
		$result=$this->db->get();
		return $result;	
		
	}
	
	function select_where_table_rows($select,$table,$where)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$query=$this->db->get();
		return $query->num_rows();
	}
	
	
	function select_limit($select,$table,$page,$recordperpage)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->limit( $recordperpage , $page );
		$result=$this->db->get();
		return $result;	
		
	}

	
	function select_table_rows($select,$table)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$query=$this->db->get();
		return $query->num_rows();
	}
	
	
	
	function update_array($where,$table,$data)
	{
		$this->db->where( $where );
		$this->db->update( $table , $data);	
	}
	
	function insert_array($table,$data)
	{
		$this->db->insert( $table,$data );
		return $this->db->insert_id();	
	}
	
	function delete_where($where,$tbl_name)
	{
		$this->db->where($where);
		$this->db->delete($tbl_name);
	}
	
	function join_two_tab( $select , $from , $jointab , $condition, $orderBy_columName , $ASC_DESC ){
			$this->db->select( $select );
			$this->db->from( $from );
			$this->db->join( $jointab, $condition );
			$this->db->order_by( $orderBy_columName , $ASC_DESC );			
			return $this->db->get();
		
	}
	
	
		function join_two_tab_without_condition( $select , $from , $jointab ){
			$this->db->select( $select );
			$this->db->from( $from );
			$this->db->join( $jointab);
			//$this->db->order_by( $orderBy_columName , $ASC_DESC );			
			return $this->db->get();
		
	}
	
	function join_two_tab_where( $select, $from, $jointable, $condition, $where, $recordperpage, $page, $orderBy_columName, $ASC_DESC ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable , $condition );
		$this->db->where( $where );
		$this->db->limit( $recordperpage , $page );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );	
		return $this->db->get();

	}
	function join_two_tab_where_nolimit( $select, $from, $jointable, $condition, $where,$orderBy_columName, $ASC_DESC ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable , $condition );
		$this->db->where( $where );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );	
		return $this->db->get();

	}
	
	function join_two_tab_where_numrow( $select, $from, $jointable, $condition, $where ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable , $condition );
		$this->db->where( $where );
		$query=$this->db->get();
		return $query->num_rows();

	}
	
	
	function select_or_like( $select,$table,$where,$orcondition,$recordperpage,$page,$orderBy_columName,$ASC_DESC ){
		$this->db->select( $select );
		$this->db->from( $table );
		//$this->db->like( $like );
		$this->db->or_like($orcondition); 
		$this->db->where( $where );
		$this->db->limit( $recordperpage , $page );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );			
		return $this->db->get();
	
	}
	
	function like_search( $select,$table,$where,$like,$orderBy_columName,$ASC_DESC ){
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->or_like($like); 
		$this->db->order_by( $orderBy_columName , $ASC_DESC );			
		$this->db->where( $where );
		return $this->db->get();
	
	}
	
	
	function select_or_like_rows( $select,$table,$where,$orcondition ){
		$this->db->select( $select );
		$this->db->from( $table );
		//$this->db->like( $like );
		$this->db->or_like($orcondition); 		
		$this->db->where( $where );
		$query=$this->db->get();
		return $query->num_rows();
	
	}
	
	
	function join_tab_where( $select , $from , $jointab , $condition, $where, $orderBy_columName , $ASC_DESC ){
	
			$this->db->select( $select );
			$this->db->from( $from );
			$this->db->join( $jointab, $condition );
			$this->db->where( $where );
			$this->db->order_by( $orderBy_columName , $ASC_DESC );			
			return $this->db->get();
	}
	
	
	function select_where_like($select,$table,$where_con,$where,$limit)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where_con );
		$this->db->like($where); 
		$this->db->limit($limit);
		return $this->db->get();
	}
	
	
	function join_three_tab_where( $select, $from, $jointable1, $condition1, $jointable2, $condition2,  $where, $recordperpage, $page, $orderBy_columName, $ASC_DESC ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable1 , $condition1 );
		$this->db->join( $jointable2 , $condition2 );
		$this->db->where( $where );
		$this->db->limit( $recordperpage , $page );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );	
		return $this->db->get();

	}
	
	function join_three_tab_where_rows( $select, $from, $jointable1, $condition1, $jointable2, $condition2,  $where ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable1 , $condition1 );
		$this->db->join( $jointable2 , $condition2 );
		$this->db->where( $where );
		$query	=	$this->db->get();
		return 		$query->num_rows();
	}
	
	function join_three_tab_where_simple( $select, $from, $jointable1, $condition1, $jointable2, $condition2,  $where ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable1 , $condition1 );
		$this->db->join( $jointable2 , $condition2 );
		$this->db->where( $where );
		return $this->db->get();
		
	}
	
/////////////////////////added by nadeem///////////////////
	
		function join_three_tab_where_simple_nad( $select, $from,$jointable1 ,$condition1, $jointable2, $condition2,$jointable3,$condition3,$jointable4 ,$condition4,$jointable5,$condition5,$jointable6,$condition6,$where ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable1 , $condition1 );
		$this->db->join( $jointable2 , $condition2 );
		$this->db->join( $jointable3 , $condition3 );
		$this->db->join( $jointable4 , $condition4 );
		$this->db->join( $jointable5 , $condition5 ,'left');
		$this->db->join( $jointable6 , $condition6 );
		$this->db->where( $where );
		return $this->db->get();
		
	}
	
			function join_three_tab_where_simple_nad2( $select, $from,$jointable1 ,$condition1, $jointable2, $condition2,$jointable3,$condition3){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable1 , $condition1 );
		$this->db->join( $jointable2 , $condition2 );
		$this->db->join( $jointable3 , $condition3 );
	
		//$this->db->where( $where );
		return $this->db->get();
		
	}
	
		function join_three_tab_where_simple_nad21( $select, $from,$jointable1 ,$condition1, $jointable2, $condition2,$where){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable1 , $condition1 );
		$this->db->join( $jointable2 , $condition2 );
		//$this->db->join( $jointable3 , $condition3 );
	
		$this->db->where( $where );
		return $this->db->get();
		
	}
	
	
	
	
	function select_limit_by($select,$table,$where,$page,$recordperpage,$orderBy_columName,$ASC_DESC)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$this->db->limit( $recordperpage , $page );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );
		$result=$this->db->get();
		return $result;	
		
	}
	
	
	function join_two_tab_where_numrows( $select, $from, $jointable, $condition, $where ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable , $condition );
		$this->db->where( $where );
		return $this->db->get();

	}
	
	
	function select_limit_where($select,$table,$where,$page,$recordperpage)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$this->db->limit( $recordperpage , $page );
		$result=$this->db->get();
		return $result;	
		
	}
	
	
	function select_table_rows_where($select,$table,$where)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$query=$this->db->get();
		return $query->num_rows();
	}
	
	
	
	
	function join_two_tab_where_limit( $select, $from, $jointable, $condition,$where,$page,$recordperpage ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable , $condition );
		$this->db->where( $where );
		$this->db->limit( $recordperpage , $page );
		$query=$this->db->get();
		return $query;
	}
	
	
	function join_two_tab_where_numrw( $select, $from, $jointable, $condition,$where){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable , $condition );
		$this->db->where( $where );
		 $query=$this->db->get();
		 return $query->num_rows();
	}
	
	function join_two_tab_where_simple( $select, $from, $jointable, $condition, $where ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable , $condition );
		$this->db->where( $where );
		$query=$this->db->get();
		return $query;
	}
	
	
	function join_two_tab_where_groupby( $select, $from, $jointable, $condition, $where ,$group_by ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable , $condition );
		$this->db->where( $where );
		$this->db->group_by( $group_by );
		$query=$this->db->get();
		return $query;
	}
	
	
	function select_limit_order_where($select,$table,$where,$page,$recordperpage,$orderBy_columName,$ASC_DESC)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$this->db->limit( $recordperpage , $page );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );
		$result=$this->db->get();
		return $result;	
		
	}
	
	/********************** Change Status ***********************/
	
	function status($id,$val,$field)
	{
  		 $data[$field] = $val;
   		$this->db->where('bnr_id',$id);
   		$this->db->update('banner',$data);	
	}
	
	/*************** Already Exist Record   ***************/
	function check_already_edit($name_txt,$old_name)
	{
		return $this->db->query('select job_title from career where job_title != "'.$old_name.'" and job_title = "'.$name_txt.'"');
	}				
	
	/***************************** Get CV *********************/
	
	function get_cv($resume_id){
		$candidate_cv = $this->common_model->select_single_field('cnd_cv','job_replies',array('resume_id'=>$resume_id));
		$path = PATH_DIR.'uploads/cvs/'.$candidate_cv;
		$data = file_get_contents($path); // Read the file's contents
		return $data;
	}

	/************************* Change user password **********************/
	
	function change_pass($table,$data,$data1)
	{
		$this->db->where('mbr_autopwd',$data1['mbr_autopwd']);
		$this->db->where('mbr_id',$this->session->userdata('user_login'));
		$this->db->update($table,$data);
		return $this->db->affected_rows();
    }
	
	/******************* Shahid Model Changes ************/
	
	function order_query( $select, $from, $jointable1, $condition1, $jointable2, $condition2,$where,$orderBy_columName, $ASC_DESC ){
		
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable1 , $condition1 );
		$this->db->join( $jointable2 , $condition2 );
		$this->db->where( $where );
		$this->db->order_by( $orderBy_columName , $ASC_DESC );
		$this->db->group_by('orders.order_id');
		return $this->db->get();

	}

	
		function order_query_detail( $select, $from,$where ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->where( $where );
		return $this->db->get();

	}

	
		function order_query_detail_invoice( $select, $from, $jointable, $condition, $where ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable , $condition );
		$this->db->where( $where );
		return $this->db->get();

	}
	
	
	
	
	function join_two_tab_where_offer( $select, $from, $jointable1, $condition1,$jointable2, $condition2, $where ){
		
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable1 , $condition1 );
		$this->db->join( $jointable2 , $condition2 );
		$this->db->where( $where );
		$this->db->group_by('products.product_id');
		return $this->db->get();

	}
	function get_time($day,$day1,$res_id)
	{

		$lang_id	=	$this->session->userdata('lang_id');
		//$time=strtotime(date("H:i"));
		$time=strtotime(date("H:i"));
		$sql="select * from resturants where (($day= 0 and $day1= 0) or ($day>='".$time."' and $day1<='".$time."')) and resturant_id=".$res_id." and lang_id=".$lang_id."";
		$reuslt=$this->db->query($sql);
		return $reuslt->num_rows();
	}
	
function get_time1($day,$day1,$res_id)

                { 

                                $lang_id               =             $this->session->userdata('lang_id');

                                //$time=date("H:i");

                                //(($day= 0 and $day1= 0) or ($day<='".$time."' and $day1>='".$time."')) and

                                $sql="select * from resturants where  resturant_id=".$res_id." and lang_id=".$lang_id."";

                                //print $sql; exit;

                                

                                $reuslt=$this->db->query($sql);

                                $row = $reuslt->row_array();

                                $day_val = $row[$day];

                                $day_array = explode(':',$day_val);

                                

                                $day1_val = $row[$day1];

                                $day1_array = explode(':',$day1_val);

                                

                                $start_timespan = mktime($day_array[0],$day_array[1],00,date('m'),date('d'),date('Y'));

                                $end_timespan = mktime($day1_array[0],$day1_array[1],00,date('m'),date('d'),date('Y'));

                                

                                if($start_timespan > $end_timespan)

                                {

                                                $stop_date = date('Y-m-d H:i:s',$end_timespan);

                                                $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' + 1 day'));

                                                

                                                 $end_timespan = strtotime($stop_date);

                                }

                                $current_time = time();

                                if($current_time>=$start_timespan && $current_time<=$end_timespan)

                                {

                                                return 1;

                                }

                                else

                                {

                                                return 0;

                                }

                                //return $reuslt->num_rows();

                }
				
				
	//// code by ali zaman.. comment 18feb 9999
	/*
	function dashboard_linechart($business_id, $type){
		$month	=	date("m");
		$nextmonth	=	date("m")+1;
		$sdate	=	strtotime(date("01-".$month."-Y"));
		
		$edate = strtotime(date("Y-m-d", $sdate) . " +1 month");
		
		$qry =$this->db->query("SELECT ord_amount
			FROM tbl_order
			WHERE business_id = ".$business_id." AND ord_date >= ".$sdate." AND ord_date < ".$edate." AND payment_by = '".$type."'");
		$str	=	"";
		
		foreach($qry->result_array() as $pay){
			$str	.=		$pay["ord_amount"].",";
		}	
		$str	=	substr($str, 0, -1);
	
		return $str;
	}
	*/
	
										/********KNOX functions*******/
	
function select_where_group_two21($country1,$start_date,$end_date,$company_id)
{
  
 return $this->db->query("SELECT sum(ord_amount) as revenue , business_id FROM `tbl_order` WHERE `ord_date` >".$start_date." AND `ord_date` < ".$end_date." AND `ord_status` = 'paid' AND  `country_id` IN ".$country1." GROUP BY country_id");  
   
 }
 function select_where_group_two_endEmpty1($country1,$start_date,$end_date,$company_id)
 {
  
 return $this->db->query("SELECT sum(ord_amount) as revenue , business_id FROM `tbl_order` WHERE `ord_date` >".$start_date." AND `ord_status` = 'paid'  AND  `country_id` IN ".$country1." GROUP BY country_id");  
   
 }
  function select_where_group_two_startEmpty1($country1,$start_date,$end_date,$company_id)
 {
  
 return $this->db->query("SELECT sum(ord_amount) as revenue , business_id FROM `tbl_order` WHERE `ord_date` < ".$end_date." AND `ord_status` = 'paid' AND `country_id` IN ".$country1." GROUP BY country_id");  
   
 }
function select_where_group_two_bothEmpty1($country,$start_date,$end_date,$company_id)
{
  
 return $this->db->query("SELECT sum(ord_amount) as revenue , business_id FROM `tbl_order` WHERE `ord_status` = 'paid' AND `country_id` IN ".$country." GROUP BY country_id");  
   
}

function select_11($select,$table,$jointable,$condition ,$where,$groupby ,$country_id, $where_in)
 {
  $this->db->select($select);
  $this->db->from( $table );
  $this->db->join( $jointable , $condition );
  $this->db->where($where);
  $this->db->where_in($country_id,$where_in);
  $this->db->group_by($groupby);
  return $this->db->get();
}


 function join_two_tab_where_simple_nad2( $select, $from,$jointable1 ,$condition1, $jointable2, $condition2){
  $this->db->select($select);
  $this->db->from( $from );
  $this->db->join( $jointable1 , $condition1 );
  $this->db->join( $jointable2 , $condition2 );
  
  //$this->db->where( $where );
  return $this->db->get();
  
 }


function select_where_search($select,$table,$where1,$where2,$where3,$val1,$val2,$val3,$jointab,$condition,$where4)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		
		if($val1 != ""){
			$this->db->like($where1); 
		}
		
		if($val2 != ""){
			$this->db->where( $where2 );
		}
		
		if($val3 != ""){
			$this->db->where( $where3);
		}
		
		
		$this->db->where($where4);
		
		$this->db->join($jointab, $condition );
		
		return $this->db->get();
	}
	
	
	function join_two_tab_like( $select, $from, $jointable, $condition, $where ){
		$this->db->select($select);
		$this->db->from( $from );
		$this->db->join( $jointable , $condition );
		$this->db->like($where); 
		return $this->db->get();

	}	
	
	
	function course_search($select,$table,$where1,$where2,$where3,$val1,$val2,$val3,$jointab,$condition,$where4)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		
		if($val1 != ""){
			$this->db->where($where1); 
		}
		
		if($val2 != ""){
			$this->db->where( $where2 );
		}
		
		if($val3 != ""){
			$this->db->where( $where3);
		}
		
		$this->db->where($where4);
		
		$this->db->join($jointab, $condition );
		
		return $this->db->get();
	}
	
	


	
}
?>