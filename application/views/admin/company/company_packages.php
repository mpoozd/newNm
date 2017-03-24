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
          <th> Package Name </th>
          <th> Package Price </th>
          <th> No. of times purchased by company </th>
        </tr>
      </thead>
      <tbody>
      
      <?php 
	  		if($price_plan->num_rows() > 0){
				foreach($price_plan->result_array() as $row){
	   ?>
      
        <tr>
          <td> <?php echo $row['pp_name'];?> </td>
          <td> <?php echo get_settings_currency() . $row['pp_price'];?> </td>  
          <td> <?php echo $obj->get_count($company_id , $row['pp_id'])?> </td>  
         
        </tr>
      
      <?php } } ?>
       
      </tbody>
    </table>
  </div>
</div>
