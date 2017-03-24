<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<h3 class="page-title"> <?=$user_info['jos_username']?> <small> <?=$user_info['jos_email']?></small> </h3>

<?php $selected = "selected"; ?>

<div class="row">
<div class="form-group col-md-6">
    	<?php if($user_info['resume_file'] != ''){ ?>
        <label>Download:<a href="<?=base_url();?>admin/Resume/download/<?=$user_info['resume_file'];?>">Resume File</a></label>
        <?php }else{ ?>
        <label>No Resume File.</label>
        <?php } ?>
    </div>
<div class="col-md-12">

<form role="form" action="" enctype="multipart/form-data" method="post">
	<div class="form-body">
	
    	
    <div class="form-group col-md-6">
        <label>Username</label>
        <input type="text" placeholder="" name="js_username" value="<?php if($this->input->post('js_username') != ""){ echo $this->input->post('js_username'); } else { echo $user_info['jos_username']; } ?>" class="form-control <?php if(form_error('js_username')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Email</label>
        <input type="text" placeholder="" readonly name="js_email" value="<?php if($this->input->post('js_email') != ""){ echo $this->input->post('js_email'); } else { echo $user_info['jos_email']; } ?>" class="form-control"> 
    </div>


	<div class="form-group col-md-6">
        <label>Name</label>
        <input type="text" name="js_name" placeholder="" value="<?php if($this->input->post('js_name') != ""){ echo $this->input->post('js_name'); } else { echo $user_info['name']; } ?>" class="form-control <?php if(form_error('js_name')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Graduation Year</label>
        <input type="text" name="js_grad_year" value="<?php if($this->input->post('js_grad_year') != ""){ echo $this->input->post('js_grad_year'); } else { echo $user_info['graduation_year']; } ?>" placeholder="" class="form-control <?php if(form_error('js_grad_year')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Address</label>
        <input type="text" name="js_address" placeholder="" value="<?php if($this->input->post('js_address') != ""){ echo $this->input->post('js_address'); } else { echo $user_info['address']; } ?>" class="form-control <?php if(form_error('js_address')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Phone</label>
        <input type="text" name="js_phone" placeholder="" value="<?php if($this->input->post('js_phone') != ""){ echo $this->input->post('js_phone'); } else { echo $user_info['phone']; } ?>" class="form-control <?php if(form_error('js_phone')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Country</label>
        <select class="form-control" name="js_country">
        	<?php
            	if($countries->num_rows() > 0){
					foreach($countries->result_array() as $con_row){
			?>
            <option value="<?=$con_row['country_id']?>" <?php if($this->input->post('js_country') == $con_row['country_id']){ echo $selected; } else if($user_info['country_id'] == $con_row['country_id']) { echo $selected; } ?>>  <?=$con_row['country_name']?> </option>
            <?php } } ?>
        </select>
    </div>
    
    <div class="form-group col-md-6">
        <label>University</label>
        <select class="form-control" name="js_university">
        	<?php
            	if($universities->num_rows() > 0){
					foreach($universities->result_array() as $uni_row){
			?>
            <option value="<?=$uni_row['univ_id']?>" <?php if($this->input->post('js_university') == $uni_row['univ_id']){ echo $selected; } else if($user_info['univ_id'] == $uni_row['univ_id']) { echo $selected; } ?> > <?=$uni_row['univ_name']?></option>
            <?php } } ?>
        </select>
    </div>
    
    
    <div class="form-group col-md-6">
        <label>Overview Objective</label>
        <textarea rows="3" class="form-control <?php if(form_error('js_overview')){?> error_border <?php } ?>" name="js_overview"><?php if($this->input->post('js_overview') != ""){ echo $this->input->post('js_overview'); } else { echo $user_info['overview_objective']; } ?></textarea>
    </div>
    
     <div class="form-group col-md-6">
        <label>Social Media URLs</label>
        <textarea rows="3" class="form-control <?php if(form_error('js_social_urls')){?> error_border <?php } ?>" name="js_social_urls"><?php if($this->input->post('js_social_urls') != ""){ echo $this->input->post('js_social_urls'); } else { echo $user_info['social_media_url1']; } ?></textarea>
    </div>


	<h3 class="page-title"> Education  </h3> 
     
    	
     
    
    <div id="education">
    
    <?php
    	if($education->num_rows() > 0){
			foreach($education->result_array() as $edu_row){
	?>
    
    <div id="edu_inn_<?=$edu_row['jedu_id']?>">
    
    <div class="form-group col-md-12">
         <a href="javascript:void(0)" onClick="delete_education(<?=$edu_row['jedu_id']?>)" class="btn btn-primary" style="margin-bottom:10px; float:right;">Delete</a>   
    </div>
    
    <div class="form-group col-md-6">
        <label>School Name</label>
         <input type="text" name="school_name[]" placeholder="" value="<?=$edu_row['school_name']?>"   class="form-control"> 
    </div>

	<div class="form-group col-md-6">
        <label>School Notes</label>
        <textarea rows="3" class="form-control" name="school_notes[]"><?=$edu_row['notes']?></textarea>
    </div>
    
    <div class="form-group col-md-6">
        <label>School Start</label>
         <input type="text" name="school_start[]" placeholder="" value="<?php echo $edu_row['start_school']; ?>"   class="form-control datepicker"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>School End</label>
         <input type="text" name="school_end[]" placeholder=""  value="<?php echo $edu_row['end_school']; ?>"   class="form-control datepicker"> 
    </div>
    
     <div class="form-group col-md-12">
         <hr>  
    </div>
    
   </div>
    
    <?php } } else {  ?> <p style="color:#F90004;"> No Education Found. </p><? } ?>
    
    </div>
    
    <a href="javascript:void(0)" onClick="add_education()" class="btn btn-primary" style="margin-bottom:10px;">Add More Education</a> 
    
    
    <h3 class="page-title"> Experiance  </h3>
    
     <div id="experiance">
    
    <?php
    	if($experiance->num_rows() > 0){
			foreach($experiance->result_array() as $exp_row){
	?>
    
    <div id="exp_inn_<?=$exp_row['jexp_id']?>">
    
    <div class="form-group col-md-12">
         <a href="javascript:void(0)" onClick="delete_experiance(<?=$exp_row['jexp_id']?>)" class="btn btn-primary" style="margin-bottom:10px; float:right;">Delete</a>   
    </div>
    
    
    
    <div class="form-group col-md-6">
        <label>Company Name</label>
         <input type="text" name="company_name[]" value="<?=$exp_row['comp_name']?>" placeholder=""   class="form-control"> 
    </div>
    
     <div class="form-group col-md-6">
        <label>Job Title</label>
         <input type="text" name="job_title[]" placeholder="" value="<?=$exp_row['job_title']?>"   class="form-control"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Start</label>
         <input type="text" name="job_start[]" placeholder="" value="<?php echo $exp_row['start_date']; ?>"   class="form-control datepicker"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>End</label>
         <input type="text" name="job_end[]" placeholder="" value="<?php echo $exp_row['end_date']; ?>"  class="form-control datepicker"> 
    </div>

	<div class="form-group col-md-12">
        <label>Notes</label>
        <textarea rows="3" class="form-control" name="job_notes[]"><?=$exp_row['notes']?></textarea>
    </div>
    
     <div class="form-group col-md-12">
         <hr>  
    </div>
    
    </div>
  	
    <?php } } else {  ?> <p style="color:#F90004;"> No Experiance Found. </p><? } ?>
    
    </div>
    
    <a href="javascript:void(0)" onClick="add_experiance()" class="btn btn-primary" style="margin-bottom:10px;">Add More Experiance</a> 
    
    
    <h3 class="page-title"> Skills  </h3> 
    
     
    <div id="skills">
    
    <?php
    	if($skills->num_rows() > 0){
			foreach($skills->result_array() as $skill_row){
	?>
    
    <div id="skill_inn_<?=$skill_row['skill_id']?>">
    
    <div class="form-group col-md-12">
         <a href="javascript:void(0)" onClick="delete_skill(<?=$skill_row['skill_id']?>)" class="btn btn-primary" style="margin-bottom:10px; float:right;">Delete</a>   
    </div>
    
    <div class="form-group col-md-6">
        <label>Skill Name</label>
         <input type="text" name="skill_name[]" placeholder="" value="<?=$skill_row['skill_name']?>"   class="form-control"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Skill Pro</label>
         <input type="text" name="skill_pro[]" placeholder="" value="<?=$skill_row['skill_pro']?>"   class="form-control"> 
    </div>

    
     <div class="form-group col-md-12">
         <hr>  
    </div>
    
   </div>
    
    <?php } } else {  ?> <p style="color:#F90004;"> No Skills Found. </p><? } ?>
    
    </div>
    
    <a href="javascript:void(0)" onClick="add_skill()" class="btn btn-primary" style="margin-bottom:10px;">Add More Skills</a> 
    
    
    
    
    
    <div class="form-actions" style="text-align:center;">
        <button class="btn green" type="submit">Update</button>
    </div>	

	</div>


</form>

</div>
</div>

<script>

$( ".datepicker" ).datepicker({ dateFormat: 'yy',});
	
	
	
	var count = 0;
	
	
	function add_education(){
			$("#education").append('<div id=edu_inn_r'+count+'><div class="form-group col-md-12"><a class="btn btn-primary"href=javascript:void(0) onclick=remove_education('+count+') style=margin-bottom:10px;float:right>Remove</a></div><div class="form-group col-md-6"><label>School Name</label><input class=form-control name=school_name[] placeholder=""></div><div class="form-group col-md-6"><label>School Notes</label><textarea class=form-control name=school_notes[] rows=3></textarea></div><div class="form-group col-md-6"><label>School Start</label><input class="form-control datepicker"name=school_start[] placeholder=""></div><div class="form-group col-md-6"><label>School End</label><input class="form-control datepicker"name=school_end[] placeholder=""></div><div class="form-group col-md-12"><hr></div></div>');
			 $('.datepicker').datepicker({
                    //startView: 1,
					format: 'yyyy'
                });
			
			count++;
			
		}
	
	function remove_education(count){
		$('#edu_inn_r'+count).remove();
	}
	
	function delete_education(edu_id){
		
			$.ajax({
				url:'<?php echo base_url()?>admin/resume/delete_education/',
				type:'POST',
				data:{'edu_id':edu_id},
					success:function(result){
						$('#edu_inn_'+edu_id).remove();
					}
		})
		
	}
	
	function add_experiance(){
			$("#experiance").append('<div id="exp_inn_r'+count+'"> <div class="form-group col-md-12"> <a href="javascript:void(0)" onClick="remove_experiance('+count+')" class="btn btn-primary" style="margin-bottom:10px; float:right;">Remove</a> </div><div class="form-group col-md-6"> <label>Company Name</label> <input type="text" name="company_name[]" value="" placeholder="" class="form-control"> </div><div class="form-group col-md-6"> <label>Job Title</label> <input type="text" name="job_title[]" placeholder="" value="" class="form-control"> </div><div class="form-group col-md-6"> <label>Start</label> <input type="text" name="job_start[]" placeholder="" value="" class="form-control datepicker"> </div><div class="form-group col-md-6"> <label>End</label> <input type="text" name="job_end[]" placeholder="" value="" class="form-control datepicker"> </div><div class="form-group col-md-12"> <label>Notes</label> <textarea rows="3" class="form-control" name="job_notes[]"></textarea> </div><div class="form-group col-md-12"> <hr> </div></div>');
			
			 /*$('.datepicker').datepicker({
                rtl: App.isRTL(),
                orientation: "left",
				viewMode: 'years',
				format: 'yyyy',
                autoclose: true
            });*/
			
			$('.datepicker').datepicker({
                    //startView: 1,
					format: 'yyyy'
                });
			
			count++;
			
		}
			
	function remove_experiance(count){
		$('#exp_inn_r'+count).remove();
	}		
	
	function delete_experiance(exp_id){
		
			$.ajax({
				url:'<?php echo base_url()?>admin/resume/delete_experiance/',
				type:'POST',
				data:{'exp_id':exp_id},
					success:function(result){
						$('#exp_inn_'+exp_id).remove();
					}
		})
		
	}
		
	function delete_skill(skill_id){
		
			$.ajax({
				url:'<?php echo base_url()?>admin/resume/delete_skill/',
				type:'POST',
				data:{'skill_id':skill_id},
					success:function(result){
						$('#skill_inn_'+skill_id).remove();
					}
		})
		
	}
	
	function add_skill(){  
			$("#skills").append('<div id="skill_inn_r'+count+'"> <div class="form-group col-md-12"> <a href="javascript:void(0)" onClick="remove_skill('+count+')" class="btn btn-primary" style="margin-bottom:10px; float:right;">Remove</a> </div><div class="form-group col-md-6"> <label>Skill Name</label> <input type="text" name="skill_name[]" placeholder="" value="" class="form-control"> </div><div class="form-group col-md-6"> <label>Skill Pro</label> <input type="text" name="skill_pro[]" placeholder="" value="" class="form-control"> </div><div class="form-group col-md-12"> <hr> </div></div>');
	
			
			count++;
			
		}
	
	function remove_skill(count){
		$('#skill_inn_r'+count).remove();
	}	
	
	
	
</script>

