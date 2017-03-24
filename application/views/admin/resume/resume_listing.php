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
          <th> Username </th>
          <th> Email </th>
          <th> Gender </th>
          <th> Phone </th>
          <th> Detail </th>
        </tr>
      </thead>
      <tbody>
      
      <?php 
	  		if($resume->num_rows() > 0){
				foreach($resume->result_array() as $row){
	   ?>
      
        <tr>
          <td> <?php echo $row['jos_username'];?> </td>
          <td> <?php echo $row['jos_email'];?> </td>
          <td> <?php $gender = $row['gender']; if($gender == 0){ echo "Female"; } else { echo "Male"; }?> </td>
          <td> <?php echo $row['phone'];?> </td>
          
          <td><a href="<?=base_url()?>admin/resume/detail/<?=$row['jos_id']?>" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Edit </a></td>
        </tr>
      
      <?php } } ?>
       
      </tbody>
    </table>
  </div>
</div>
