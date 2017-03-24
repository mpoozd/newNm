  <form name="step4_form" id="step4_form" method="post" >
  
  <?php 
  
  if($job->num_rows()>0){
	 $row= $job->row();
	  }
  ?>
  <header class="page-header">
      <div class="container page-name">
        <h1 class="text-center">Edit a new job</h1>
        <p class="lead text-center">Edit Your vacancy for your company and put it online.</p>
        <?php 
  if($pack_info->num_rows()>0){
	  $pckrow=$pack_info->row();
	    }
	    if(time()>$pckrow->package_expirydate){
			?><div class="container">
      
        <div class="row">
        
	<p  class="lead text-center" style="color:#17C5D4"><?=$this->lang->line('pkg_expire')?>.</p>

      </div>

        

      </div>   </header>
			 
             
             
			<?php  }
			else if($pckrow->job_posting_count==0){
				?> <div class="container">
      
        <div class="row">
        
	<p  class="lead text-center" style="color:#17C5D4"><?=$this->lang->line('limit')?>.</p>

      </div>

        

      </div>
    </header>
        <!-- END Job detail -->


        <!-- Submit -->
        
        <!-- END Submit -->


    </main>
			
            
				<?php  }else{
?>	
      </div>


      <div class="container">
    
      <a href="#" id="to_4"></a>
<div id="class4_error" style="color:#ef4d42;"></div>
        <div class="row">
        <div class="form-group col-xs-12 col-sm-6">
          <input type="text" name="job_title" class="form-control input-lg" value="<?=@$row->job_title?>" placeholder="Job title, e.g. Front-end developer">
        </div>

        <div class="form-group col-xs-12 col-sm-6">
          <select class="form-control selectpicker" name="category_id">
            <option value="0">Select Category</option>
            <?php if($cats_data->num_rows()>0){
				foreach($cats_data->result() as $rop){?>
					
			<option <?php if($row->category_id==$rop->cat_id){?> selected="selected" <?php } ?> value="<?=$rop->cat_id?>"><?=$rop->cat_name?></option>		
					<?php }
				} ?>
            
            </select>
        </div>

        <div class="form-group col-xs-12">
          <textarea class="form-control" rows="3" name="short_dec" placeholder="Short description"><?=@$row->short_desc?></textarea>
        </div>

        <div class="form-group col-xs-12">
          <input type="text" class="form-control" name="application_email" value="<?=@$row->application_email?>" placeholder="Application Email to recive notification">
        </div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input type="text" class="form-control" name="job_location" value="<?=@$row->job_location?>" placeholder="Location, e.g. Melon Park, CA">
            
            <select class="form-control selectpicker" name="job_location" data-live-search="true">
                  <option value="">المدينة</option>
                    <?php if($location->num_rows()>0){
					  foreach($location->result() as $city){?>
                    <option <?php if($row->job_location==$city->city_id){?> selected<?php }?> value="<?=$city->city_id?>">
                    <?=$city->city_name?>
                    </option>
                    <?php }}?>
                  </select>
          </div>
        </div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
            <select class="form-control selectpicker" name="job_type_id">
             <?php if($type_data->num_rows()>0){
				foreach($type_data->result() as $tjob){?>
					
			<option <?php if($row->job_type_id==$tjob->jtype_id){?> selected="selected" <?php } ?> value="<?=$tjob->jtype_id?>"><?=$tjob->jtype_name?></option>		
					<?php }
				} ?>
            </select>
          </div>
        </div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input type="text" class="form-control" value="<?=@$row->salary?>" name="salary" placeholder="Salary">
          </div>
        </div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
            <input type="text" class="form-control" value="<?=@$row->working_hours?>" name="working_hours" placeholder="Working hours, e.g. 40">
            <span class="input-group-addon">hours</span>
          </div>
        </div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-flask"></i></span>
            <input type="text" class="form-control" value="<?=@$row->experience_id?>" name="experience_id" placeholder="Experience, e.g. 5">
            <span class="input-group-addon">Years</span>
          </div>
        </div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
            <select class="form-control selectpicker" name="gender">
             <?php if($gender_data->num_rows()>0){
					  foreach($gender_data->result() as $gen){?>
						  
                
              <option <?php if($row->gender==$gen->gender_id){?> selected="selected" <?php } ?> value="<?=$gen->gender_id?>"><?=$gen->gender_name?></option>
                <?php }}?>
            </select>
          </div>
        </div>


      </div>

        <input type="hidden" name="job_id" value="<?=$row->job_id?>">

      </div>
    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>


        <!-- Job detail -->
        <section>
      <div class="container">

        <header class="section-header">
           <span><?=$this->lang->line('decs')?></span>
          <h2><?=$this->lang->line('resp')?></h2>
          <p><?=$this->lang->line('resp_detail')?></p>
        </header>

          <textarea class="form-control" rows="4" name="responsibilties" placeholder="Short description"><?=@$row->responsibilties?></textarea>
          
           <header class="section-header">
          <span>Skills</span>
          <h2>Job Skills - Required</h2>
          <p>Write about Skills required.</p>
        </header>

          <textarea class="form-control" rows="4" name="skills" placeholder="Skills"><?=@$row->skills_required?></textarea>

      </div>
	  
    </section>
        <!-- END Job detail -->


        <!-- Submit -->
        <section class="bg-alt">
          <div class="container">
            <header class="section-header">
                 <span><?=$this->lang->line('are_u_done')?></span>
          <h2><?=$this->lang->line('are_u_done_submit')?></h2>
          <p><?=$this->lang->line('are_u_done_submit_below')?></p>
            </header>

            <p class="text-center"><button class="btn btn-success btn-xl btn-round" onClick="return update_job();"><?=$this->lang->line('update')?></button></p>

          </div>
        </section>
        <!-- END Submit -->


    </main>
    </form>
    <?php  }?>
    <!-- END Main container --><script>
    
    function update_job(){
			
				$('#class4_error').html('');

	var formData = new FormData($("#step4_form")[0]);
 $.ajax({
	   type: "POST",
        url:"<?=base_url()?>Job/edit_job",
        data: formData,
        contentType: false,
        processData: false,
        encode: true,
        async: false,
        cache: false,
 		success: function(html){
	
	var r=JSON.parse(html);
	var bo=r['log_error'];
	
	if( bo=='no'){
			document.location.href='<?=base_url()?>Job/manage_jobs';
	
	}
	else{
		
		$('#class4_error').html(bo);
		//$('#loadingmessage').hide();
		var tag = $("#to_4");
       $('html,body').animate({scrollTop: tag.offset().top},'slow');
		$('#class4_error').html(bo);
	}
	}
});
return false;
			}
    </script>