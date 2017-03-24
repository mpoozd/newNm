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
                <a href="<?=base_url()?>admin/graduation_year/add_graduation_year"><button id="sample_editable_1_new" class="btn sbold green"> Add Graduation Year
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
          <th> Graduation Year </th>
          <th> Action </th>
        </tr>
      </thead>
      <tbody>
      
      <?php 
	  		if($graduation_year->num_rows() > 0){
				foreach($graduation_year->result_array() as $row){
	   ?>
      
        <tr>
          <td> <?php echo $row['grad_year'];?> </td>
          <td><a href="<?=base_url()?>admin/graduation_year/update_graduation_year/<?=$row['grad_id']?>" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Edit </a>   <a href="<?=base_url()?>admin/graduation_year/delete_graduation_year/<?=$row['grad_id']?>" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Delete </a> </td>
        </tr>
      
      <?php } } ?>
       
      </tbody>
    </table>
  </div>
</div>
