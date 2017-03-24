    <?php if($this->session->flashdata('success_msg') != ""){?>
    <div class="alert alert-block alert-success fade in">
    	<button data-dismiss="alert" class="close" type="button"></button>
    		<h4 class="alert-heading">Success!</h4>
    		<p> <?php echo $this->session->flashdata('success_msg'); $this->session->set_flashdata('success_msg', "");?> </p>
    </div>
	<?php } ?>

<?php if($go_back == "yes"){?>
<div class="table-toolbar">
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group">
                <a href="javascript:history.go(-1)"><button id="sample_editable_1_new" class="btn sbold green"> Go Back
                     
                </button></a>
            </div>
        </div>
        
    </div>
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
        <th>ID</th>
          <th> Title </th>
          <th> Salary </th>
          <th> Working Hours </th>
          <!--<th> Experiance </th>-->
          <th>Jobs Resume</th>
          <th> Status </th>
          <th> Features </th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      
      <?php 
	  		if($jobs->num_rows() > 0){
				foreach($jobs->result_array() as $row){
	   ?>
      
        <tr>
          <td> <?php echo $row['job_id'];?> </td>
          <td> <?php echo $row['job_title'];?> </td>
          <td> <?php echo get_settings_currency() . $row['salary'];?> </td>
          <td> <?php echo $row['working_hours'];?> Hours </td>
          <?php /*?><td> <?php echo $row['experience_id'];?> Years </td><?php */?>
          <td><a href="<?=base_url()?>admin/resume/jobs_resume/<?=$row['job_id']?>">Resumes</a></td>
          
          <td> <?php $status = $row['job_status']; if($status == 0){?> Inactive &nbsp;&nbsp;&nbsp; <a href="<?=base_url()?>admin/jobs/change_job_status/<?=$row['job_id']?>/1">Make Active</a> <?php } else {?> Active &nbsp;&nbsp;&nbsp;<a href="<?=base_url()?>admin/jobs/change_job_status/<?=$row['job_id']?>/0">Make Inactive</a><?php } ?> </td>
          
          <td align="center"> 
          
                <label class="mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" <?php if($row['feature_bit'] == 1){?> checked <?php } ?> onClick="change_featured_status(<?=$row['job_id']?>)" id="chk_<?=$row['job_id']?>">
                    <span></span>
                </label>
          
           </td>
          
          
          <td><a href="<?=base_url()?>admin/jobs/detail/<?=$row['job_id']?>" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Edit </a></td>
        </tr>
      
      <?php } } ?>
       
      </tbody>
    </table>
  </div>
</div>


   <script type="text/javascript">
	 	
		function change_featured_status(id){
			
			console.log(id);
			
			if ($('#chk_'+id).is(":checked")){
				 window.location = '<?=base_url()?>admin/jobs/change_job_feature_status/1/'  + id;
			} else {
				window.location = '<?=base_url()?>admin/jobs/change_job_feature_status/0/'  + id;
			}
			
			}
	 
	 </script>  