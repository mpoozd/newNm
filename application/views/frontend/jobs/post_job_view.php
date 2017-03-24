  <form name="step4_form" id="step4_form" method="post" >
  
  <header class="page-header">
      <div class="container page-name">
        <h1 class="text-center"><?=$this->lang->line('add_new')?></h1>
        <p class="lead text-center"><?=$this->lang->line('add_new_below')?></p>
        <?php 
  if($pack_info->num_rows()>0){
	  $pckrow=$pack_info->row();
	    }
	    if(time()>$pckrow->package_expirydate){
			?><div class="container">
      
        <div class="row">
        
	<p  class="lead text-center" style="color:#17C5D4"> <?=$this->lang->line('pkg_expire')?>.</p>

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
          <input type="text" name="job_title" class="form-control input-lg" placeholder="المسمى الوظيفي مثال: مندوب مبيعات">
        </div>

        <div class="form-group col-xs-12 col-sm-6">
          <select class="form-control selectpicker" name="category_id">
            <option value="0">مجال الوظيفة</option>
            <?php if($cats_data->num_rows()>0){
				foreach($cats_data->result() as $rop){?>
					
			<option value="<?=$rop->cat_id?>"><?=$rop->cat_name?></option>		
					<?php }
				} ?>
            
            </select>
        </div>

        <div class="form-group col-xs-12">
          <textarea class="form-control" rows="3" name="short_dec" placeholder="وصف مختصر"></textarea>
        </div>

        <div class="form-group col-xs-12">
          <input type="text" class="form-control" name="application_email" placeholder=" البريد الإلكتروني للإعلان (سوف يصلك تنبيه عند وجود متقدمين على الوظيفة)">
        </div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            
            <select class="form-control selectpicker" name="job_location" data-live-search="true">
                  <option value="">المدينة</option>
                    <?php if($location->num_rows()>0){
					  foreach($location->result() as $city){?>
                    <option value="<?=$city->city_id?>">
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
					
			<option value="<?=$tjob->jtype_id?>"><?=$tjob->jtype_name?></option>		
					<?php }
				} ?>
            </select>
          </div>
        </div>

		<div class="form-group col-xs-12 col-sm-6 col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
            <select class="form-control selectpicker" name="gender">
            <?php if($gender_data->num_rows()>0){
					  foreach($gender_data->result() as $gen){?>
						  
						
                    <option value="<?=$gen->gender_id?>"><?=$gen->gender_name?></option>
                    <?php }}?>
            </select>
          </div>
        </div>
		

        <div class="form-group col-xs-12 col-sm-6 col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
            <input type="text" class="form-control" name="working_hours" placeholder="ساعات العمل اليومية">
            <span class="input-group-addon">ساعة</span>
          </div>
        </div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4">
        <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-flask"></i></span>
<!--          <input type="text" class="form-control" name="experience_id" placeholder="Experience, e.g. 5">
-->            <select class="form-control selectpicker" name="experience_id">
                  <option value="">الفئة المطلوبة</option>
                   
                    <option value="طالب جامعي">طالب جامعي</option>
                     <option value="حديث تخرج">حديث تخرج</option>
                      <option value="طالب جامعي أو حديث تخرج">طالب جامعي أو حديث تخرج</option>

                 
                  </select>
<!--           <span class="input-group-addon">Years</span> </div> -->
      </div>

         <div class="form-group col-xs-12 col-sm-6 col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input type="text" class="form-control" name="salary" placeholder="حدد الراتب أو ضع غير محدد">
          </div>
        </div>


      </div>

        

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

          <textarea class="form-control" rows="4" name="responsibilties" placeholder="المهام والمسؤوليات"></textarea>
          
           <header class="section-header">
          <span>----</span>
          <h2>المهارات المطلوبة</h2>
          <p></p>
        </header>

          <textarea class="form-control" rows="4" name="skills" placeholder="----"></textarea>

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

            <p class="text-center"><button class="btn btn-success btn-xl btn-round" onClick="return confirm_job();"><?=$this->lang->line('submit_job')?></button></p>

          </div>
        </section>
        <!-- END Submit -->


    </main>
    </form>
    <?php  }?>
    <!-- END Main container --><script>
    
    function confirm_job(){
			
				$('#class4_error').html('');

	var formData = new FormData($("#step4_form")[0]);
 $.ajax({
	   type: "POST",
        url:"<?=base_url()?>Job/add_job",
        data: formData,
        contentType: false,
        processData: false,
        encode: true,
        async: false,
        cache: false,
 		success: function(html){
	
var	r=JSON.parse(html);
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