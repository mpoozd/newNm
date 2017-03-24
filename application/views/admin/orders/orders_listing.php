    <?php if($this->session->flashdata('success_msg') != ""){?>
    <div class="alert alert-block alert-success fade in">
    	<button data-dismiss="alert" class="close" type="button"></button>
    		<h4 class="alert-heading">Success!</h4>
    		<p> <?php echo $this->session->flashdata('success_msg'); $this->session->set_flashdata('success_msg', "");?> </p>
    </div>
	<?php } ?>


<div class="portlet light bordered">
  <div class="portlet-title">
    <div class="caption font-dark">  <span class="caption-subject bold uppercase"><?=$table_title?></span> </div>
    <div class="tools"> </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="sample_1">
      <thead>
        <tr>
          <th> Company Name </th>
          <th> Payment Type </th>
          <th> Price Package </th>
          <th> Order Amount </th>
          <th> Status </th>
          <th> Date Added </th>
        </tr>
      </thead>
      <tbody>
      
      <?php 
	  		if($orders->num_rows() > 0){
				foreach($orders->result_array() as $row){
	   ?>
      
        <tr>
          <td> <?php echo get_company_name($row['com_id']);?> </td>
          <td> <?php $pay_type = $row['payment_type'];  if($pay_type == 1){ ?> PayTab <? } else { ?> Bank <?php } ?> </td>
          <td> <?php echo  get_payment_type_name($row['price_package_id']);?> </td>
          <td> <?php echo get_settings_currency() . $row['order_amount'];?> </td>
          <td> <?php $status = $row['order_status']; if($status == 0){?> Pending &nbsp;&nbsp;&nbsp; <a href="<?=base_url()?>admin/orders/change_order_status/<?=$row['order_id']?>/1">Complete</a> <?php } else {?> Complete &nbsp;&nbsp;&nbsp;<a href="<?=base_url()?>admin/orders/change_order_status/<?=$row['order_id']?>/0">Pending</a><?php } ?> </td>
          <td> <?php echo date('d-m-Y' , $row['dateadded'])?></td>
        </tr>
      
      <?php } } ?>
       
      </tbody>
    </table>
  </div>
</div>
