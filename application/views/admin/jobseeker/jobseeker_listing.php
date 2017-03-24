    <?php if($this->session->flashdata('success_msg') != ""){?>
    <div class="alert alert-block alert-success fade in">
    	<button data-dismiss="alert" class="close" type="button"></button>
    		<h4 class="alert-heading">Success!</h4>
    		<p> <?php echo $this->session->flashdata('success_msg'); $this->session->set_flashdata('success_msg', "");?> </p>
    </div>
	<?php } ?>
    
     <?php if($this->session->flashdata('email_msg') != ""){?>
    <div class="alert alert-block alert-success fade in">
    	<button data-dismiss="alert" class="close" type="button"></button>
    		<h4 class="alert-heading">Success!</h4>
    		<p> <?php echo $this->session->flashdata('email_msg'); $this->session->set_flashdata('email_msg', "");?> </p>
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
          <th> Username </th>
          <th> Email </th>
          <th> Gender </th>
          <th> Photo Doc.</th>
          <th> Graduation Year </th>
          <th> Resume</th>
          <th> Status </th>
          <th> Detail </th>
        </tr>
      </thead>
      <tbody>
      
      <?php 
	  		if($jobseeker->num_rows() > 0){
				foreach($jobseeker->result_array() as $row){
	   ?>
      
        <tr>
        	<td> <?php echo $row['serial_no'];?> </td>
          <td> <?php echo $row['jos_username'];?> </td>
          <td> <?php echo $row['jos_email'];?> </td>
          <td> <?php $gender = $row['gender']; if($gender == 0){ echo "Female"; } else { echo "Male"; }?> </td>
          <td align="center"> 
          		  <? if(is_file(PATH_DIR.'uploads/jobseekers/'.$row['photo_document_file'])){ 
				  $var=explode(".",$row['photo_document_file']);
								  $image_ext  = end( $var);
								
								  $exts=array("doc","DOC","docx","DOCX","xls","XLS","xlsx" ,"XLSX","PDF","pdf");
								  if(in_array($image_ext,$exts)){?>
									 <a href="<?=base_url();?>admin/Resume/download/<?=$row['photo_document_file']?>"><?=$row['photo_document_file']?></a>  
									  <?php }
									  else{
				  ?>
                      <a href="<?=base_url()?>uploads/jobseekers/<?=$row['photo_document_file']?>">
                       <img height="50" width="50" src="<?=base_url()?>uploads/jobseekers/<?=$row['photo_document_file']?>"  alt=""> </a>
                  <? }}else{ ?>
                      <img src="<?=base_url()?>assets/defaultavatar.jpg" alt="" height="43" width="43">
                  <? } ?>
          </td>
          <td> <?php echo get_grad_year($row['graduation_year'])?> </td>
          <td> <a href="<?=base_url()?>admin/resume/detail/<?=$row['jos_id']?>">View Resume</a></td>
          <?php /*?><td> <?php $status = $row['status_id']; if($status == 0){?> Inactive &nbsp;&nbsp;&nbsp; <a href="<?=base_url()?>admin/jobseeker/change_user_status/<?=$row['jos_id']?>/1">Make Active</a> <?php } else {?> Active &nbsp;&nbsp;&nbsp;<a href="<?=base_url()?>admin/jobseeker/change_user_status/<?=$row['jos_id']?>/0">Make Inactive</a><?php } ?> </td><?php */?>
          
          
             <td align="center"> 
          
                <label class="mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" <?php if($row['status_id'] == 1){?> checked <?php } ?> onClick="change_user_status(<?=$row['jos_id']?>)" id="chk_<?=$row['jos_id']?>">
                    <span></span>
                </label>
          
           </td>
          
          
          <td><a href="<?=base_url()?>admin/jobseeker/detail/<?=$row['jos_id']?>" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Edit </a>
          <a href="<?=base_url()?>admin/jobseeker/send_email/<?=$row['jos_id']?>" class="btn btn-outline btn-circle red btn-sm blue"><i class="fa fa-share"></i> Send </a></td>
        </tr>
      
      <?php } } ?>
       
      </tbody>
    </table>
  </div>
</div>



   <script type="text/javascript">
	 	
		function change_user_status(id){
			
			console.log(id);
			
			if ($('#chk_'+id).is(":checked")){
				 window.location = '<?=base_url()?>admin/jobseeker/change_user_status/1/'  + id;
			} else {
				window.location = '<?=base_url()?>admin/jobseeker/change_user_status/0/'  + id;
			}
			
			}
	 
	 </script> 