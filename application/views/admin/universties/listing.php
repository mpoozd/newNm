    <?php if($this->session->flashdata('success_msg') != ""){?>
    <div class="alert alert-block alert-success fade in">
    	<button data-dismiss="alert" class="close" type="button"></button>
    		<h4 class="alert-heading">Success!</h4>
    		<p> <?php echo $this->session->flashdata('success_msg'); $this->session->set_flashdata('success_msg', "");?> </p>
    </div>
	<?php } ?>


<div class="table-toolbar">
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group">
                <a href="<?=base_url()?>admin/universities/add_university"><button id="sample_editable_1_new" class="btn sbold green"> Add University
                    <i class="fa fa-plus"></i>
                </button></a>
            </div>
        </div>
        
    </div>
</div>


<div class="portlet light bordered">
  <div class="portlet-title">
    <div class="caption font-dark">  <span class="caption-subject bold uppercase"><?=$table_title?></span> </div>
    <div class="tools"> </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="sample_1">
      <thead>
        <tr>
          <th> Name </th>
          <th> Action </th>
        </tr>
      </thead>
      <tbody>
      
      <?php 
	  		if($universties->num_rows() > 0){
				foreach($universties->result_array() as $row){
	   ?>
      
        <tr>
          <td> <?php echo $row['univ_name'];?> </td>
          <td><a href="<?=base_url()?>admin/universities/update_university/<?=$row['univ_id']?>" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Edit </a>   <a href="<?=base_url()?>admin/universities/delete_university/<?=$row['univ_id']?>" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Delete </a> </td>
        </tr>
      
      <?php } } ?>
       
      </tbody>
    </table>
  </div>
</div>