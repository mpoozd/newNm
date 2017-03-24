<h3 class="page-title"> <?=$job_info['job_title']?> <small> <?php if($job_info['feature_bit'] == 1){?> Featured <?php } else {?> Not Featured <?php } ?> </small> </h3>

<?php $selected = "selected"; ?>

<div class="row">
<div class="col-md-12">

<form role="form" action="" enctype="multipart/form-data" method="post">
	<div class="form-body">
		
    <div class="form-group col-md-6">
        <label>Job Title</label>
        <input type="text" placeholder="" name="job_title" value="<?php if($this->input->post('job_title') != ""){ echo $this->input->post('job_title'); } else { echo $job_info['job_title']; } ?>" class="form-control <?php if(form_error('job_title')){?> error_border <?php } ?>"> 
    </div>
    
    
     <div class="form-group col-md-6">
        <label>Salary</label>
        <input type="text" placeholder="" name="salary" value="<?php if($this->input->post('salary') != ""){ echo $this->input->post('salary'); } else { echo $job_info['salary']; } ?>" class="form-control <?php if(form_error('salary')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Working Hours</label>
        <input type="text" placeholder="" name="working_hours" value="<?php if($this->input->post('working_hours') != ""){ echo $this->input->post('working_hours'); } else { echo $job_info['working_hours']; } ?>" class="form-control <?php if(form_error('working_hours')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Application Email</label>
        <input type="text" placeholder="" name="application_email" value="<?php if($this->input->post('application_email') != ""){ echo $this->input->post('application_email'); } else { echo $job_info['application_email']; } ?>" class="form-control <?php if(form_error('application_email')){?> error_border <?php } ?>"> 
    </div>
    
     <div class="form-group col-md-6">
        <label>Job Type</label>
        <select class="form-control" name="job_type">
        	<?php
            	if($job_type->num_rows() > 0){
					foreach($job_type->result_array() as $jt_row){
			?>
            <option value="<?=$jt_row['jtype_id']?>" <?php if($this->input->post('job_type') == $jt_row['jtype_id']){ echo $selected; } else if($job_info['job_type_id'] == $jt_row['jtype_id']) { echo $selected; } ?>>  <?=$jt_row['jtype_name']?> </option>
            <?php } } ?>
        </select>
    </div>
    
    
    <div class="form-group col-md-6">
        <label>Responsibilties</label>
        <textarea rows="3" class="form-control <?php if(form_error('responsibilties')){?> error_border <?php } ?>" name="responsibilties"><?php if($this->input->post('responsibilties') != ""){ echo $this->input->post('responsibilties'); } else { echo $job_info['responsibilties']; } ?></textarea>
    </div>
    
     <div class="form-group col-md-6">
        <label>Skills Required</label>
        <textarea rows="3" class="form-control <?php if(form_error('skills_required')){?> error_border <?php } ?>" name="skills_required"><?php if($this->input->post('skills_required') != ""){ echo $this->input->post('skills_required'); } else { echo $job_info['skills_required']; } ?></textarea>
    </div>
    
    
     <div class="form-group col-md-6">
        <label>Short Description</label>
        <textarea rows="3" class="form-control <?php if(form_error('short_desc')){?> error_border <?php } ?>" name="short_desc"><?php if($this->input->post('short_desc') != ""){ echo $this->input->post('short_desc'); } else { echo $job_info['short_desc']; } ?></textarea>
    </div>
    
  

	

    <div class="form-actions" style="text-align:center;">
        <button class="btn green" type="submit">Update</button>
    </div>	

	</div>


</form>

</div>
</div>