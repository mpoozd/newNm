
<?php 
if($seeker_data->num_rows()>0){
	$seek=$seeker_data->row();
	}
?><form  name="step1_form" id="step1_form" method="post"  enctype="multipart/form-data">

      <!-- Page header -->
      <header class="page-header">
        <div class="container page-name">
          <h1 class="text-center"><?=$this->lang->line('edit_res')?></h1>
          <p class="lead text-center"><?=$this->lang->line('edit_res_below')?></p>
        </div>

        <div class="container">
<?php if($this->session->flashdata('msg')!=''){?>
<div id="success_sub_msg" role="alert" class="alert alert-success"><strong><?=$this->lang->line('well_done')?></strong> <?=$this->session->flashdata('msg');?></div>
<?php }?>
          <div class="row">
           <div id="class_1_error" style="color:#ef4d42;"></div>
            <div class="col-xs-12 col-sm-4">
              <div class="form-group">
                 <input type="file" name="filename2" id="filename2" onChange="Checkfiles();">
                <span class="help-block">صورة الملف الشخصي</span>
                <?php 
				if($seek->image!=''){?>
					 <img height="150" width="150" src="<?=base_url()?>uploads/jobseekers/<?=$seek->image?>">

					<?php }
					else{?>
							 <img height="150" width="150" src="<?=base_url()?>assets/img/avatar.jpg">
						<?php }
				?>
        
              </div>
            </div>

            <div class="col-xs-12 col-sm-8">
              <div class="form-group">
                <input type="text" class="form-control input-lg" name="name" placeholder="الاسم الثلاثي" value="<?=$seek->name?>">
              </div>
              
              <div class="form-group">
             <?php /*?>   <input type="text" class="form-control" name="jos_headline" value="<?=$seek->jos_headline?>" placeholder="Headline (e.g. Front-end developer)"><?php */?>
                
                <select class="form-control selectpicker" data-placeholder="Choose one..." name="jos_headline" data-live-search="true">
                    <option value="">حدد التخصص</option>
                    <?php if($spe_data->num_rows()>0){
					  foreach($spe_data->result() as $spi){?>
                    <option <?php if($seek->jos_headline==$spi->spe_id){?> selected<?php }?> value="<?=$spi->spe_id?>">
                    <?=$spi->spe_name?>
                    </option>
                    <?php }
					  } ?>
                  </select>
              </div>

              <div class="form-group">
                <textarea class="form-control" rows="3" name="about_uerself" placeholder="نبذة مختصرة عنك"  maxlength="200"><?=$seek->about_uerself?></textarea>
              </div>

              <hr class="hr-lg">

              <h6><?=$this->lang->line('basic_info')?></h6>
              <div class="row">

                <div class="form-group col-xs-12 col-sm-6">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <?php /*?>  <input type="text" class="form-control" name="location" value="<?=$seek->location?>" placeholder="Location, e.g. Melon Park, CA"><?php */?>
                    
                      <select class="form-control selectpicker" name="location" data-live-search="true">
                  <option value="">حدد المدينة</option>
                    <?php if($location->num_rows()>0){
					  foreach($location->result() as $city){?>
                    <option <?php if($seek->location==$city->city_id){?> selected<?php }?> value="<?=$city->city_id?>">
                    <?=$city->city_name?>
                    </option>
                    <?php }}?>
                  </select>
                  </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
                    <?php /*?><input type="text" class="form-control" name="address" value="<?=get_gender($seek->gender)?>" placeholder="Website address"><?php */?>
                    <select class="form-control selectpicker" name="gender">
                    <?php if($gender_data->num_rows()>0){
					  foreach($gender_data->result() as $gen){?>
                    <option <?php if($seek->gender==$gen->gender_id){?> selected <?php } ?> value="<?=$gen->gender_id?>">
                    <?=$gen->gender_name?>
                    </option>
                    <?php }}?>
                  </select>
                  </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                    <select class="form-control selectpicker" name="country_id">
				    <option value="">الجنسية</option>
                    <?php if($country_data->num_rows()>0){
					  foreach($country_data->result() as $con){?>
                    <option <?php if($seek->country_id==$con->country_id){?> selected<?php }?> value="<?=$con->country_id?>">
                    <?=$con->country_name?>
                    </option>
                    <?php }
					  } ?>
                  </select>
                  </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                    <input type="text" name="age" value="<?=$seek->age?>" class="form-control" placeholder="Age">
                    <span class="input-group-addon">سنة</span>
                  </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" name="phone" value="<?=$seek->phone?>" placeholder="رقم الجوال">
                  </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6">
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" name="email" value="<?=$seek->email?>" placeholder="البريد الالكتروني">
                  </div>
                </div>

              </div>

             

            </div>
          </div>

          <div class="button-group">
            <div class="action-buttons">

              <div class="upload-button">
                <button class="btn btn-block btn-gray">ملف السيرة الذاتية - اختياري</button>
                <input type="file" name="resume_file" id="resume_file" onChange="checkfiles2">
                الملف الحالي:  <?=$seek->resume_file?>
              </div>

              <!--<div class="upload-button">
                <button class="btn btn-block btn-primary">Choose a cover image</button>
                <input id="cover_img_file" type="file">
              </div>-->

            </div>
          </div>
        </div>
      </header>
      <!-- END Page header -->


      <!-- Main container -->
     


        <!-- Social media -->
        <!-- <section>
          <div class="container">

            <header class="section-header">
              <span>Get connected</span>
              <h2>Social media</h2>
            </header>

            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                    <input type="text" class="form-control" name="social_media_url1" value="<?=$seek->social_media_url1?>" placeholder="Profile URL">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                    <input type="text" class="form-control" name="url2" value="<?=$seek->url2?>" placeholder="Profile URL">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                    <input type="text" class="form-control"  name="url3" value="<?=$seek->url3?>" placeholder="Profile URL">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pinterest"></i></span>
                    <input type="text" class="form-control" name="url4" value="<?=$seek->url4?>" placeholder="Profile URL">
                  </div>
                </div>
              </div>

              
            </div>

          </div>
        </section>   
        --> 
        <p class="text-center"><button class="btn btn-success btn-xl btn-round" onClick="return update_resume();"><?=$this->lang->line('up_basic')?></button></p>
      
        <!-- Social media -->
</form>

    <form id="step3_edu_exp_skill" name="step3_edu_exp_skill" method="post" action="<?=base_url()?>Sprofile/update_resume_details">

        <!-- Education -->
        <section class=" bg-alt">
          <div class="container">

            <header class="section-header">
              <span><?=$this->lang->line('latest_degree')?></span>
              <h2><?=$this->lang->line('edu')?></h2>
            </header>
          
            <div class="row" id="education_row"> 
           <?php 
			$counter=0; 
            if($edu_data->num_rows()>0){
				foreach($edu_data->result() as $edu){?>
                <div id="classes<?=$counter?>_error" style="color:#ef4d42;"></div>
              
               <input type="hidden" name="edu_<?=$counter?>" id="edu_id_<?=$counter?>" value="<?=$edu->jedu_id?>"/>
              <div class="col-xs-12">
                <div class="item-block">
                  <div class="item-form">
  
                    <button class="btn btn-danger btn-float btn-remove" onClick="remove_edu(<?=$counter?>);"><i class="fa fa-close"></i></button>
                   <?php /*?> <button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return update_edu(<?=$counter?>);"><i class="fa fa-edit"></i></button><?php */?>

                    <div class="row">
                      

                      <div class="col-xs-12 col-sm-8" id="edu_<?=$counter?>">
                        <div class="form-group">
                          <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="degree_title[]" value="<?=$edu->degree_title?>" placeholder="نوع الشهادة أو التخصص مثال: دبلوم محاسبة - ثانوية عامة">
                        </div>

                        
                        <div class="form-group">
                          <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="school_name[]" value="<?=$edu->school_name?>" placeholder="اسم المدرسة / الجامعة">
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon">من</span>
                            <input type="text" id="datepicker" data-validation-engine="validate[required] text-input" class="form-control datepicker" name="start_date[]" value="<?=$edu->start_school?>" placeholder="مثال 2012">
                            <span class="input-group-addon">حتى</span>
                            <input type="text" id="datepicker" data-validation-engine="validate[required] text-input" class="form-control datepicker" name="end_date[]" value="<?=$edu->end_school?>" placeholder="مثال 2016">
                          </div>
                        </div>

                        <div class="form-group">
                          <textarea class="form-control" data-validation-engine="validate[required] text-input" rows="3" name="notes[]" placeholder="Short description"><?=$edu->notes?></textarea>
                        </div>
                      </div>
                    </div>

                  </div>
                </div> 
              </div>
              
           

              <?php 
			  $counter++;
			  }
				}
?>

              <div class="col-xs-12 text-center" id="btn_<?=$counter?>">
                <br>
                <button class="btn btn-primary" onClick="return add_eduation(<?=$counter?>)" ><?=$this->lang->line('add_edu_name')?></button>
              </div>


            </div>
          </div>
        </section>
        <!-- END Education -->


        <!-- Work Experience -->
        <section>
          <div class="container">
            <header class="section-header">
              <span><?=$this->lang->line('past_pos')?></span>
              <h2><?=$this->lang->line('work_exp')?></h2>
            </header>
            
            <div class="row" id="experience_row">
<?php 
			$counter2=0; 
            if($exp_data->num_rows()>0){
				foreach($exp_data->result() as $exp){?>
                <div id="classexp<?=$counter2?>_error" style="color:#ef4d42;"></div>
                  
              <div class="col-xs-12" id="exp_<?=$counter2?>">
                <div class="item-block">
                  <div class="item-form">
  
                    <button class="btn btn-danger btn-float btn-remove" onClick="remove_exp(<?=$counter2?>);"><i class="fa fa-close"></i></button>
                   <?php /*?> <button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return update_exp(<?=$counter2?>);"><i class="fa fa-edit"></i></button>
<?php */?>
                    <div class="row">
                      

                      <div class="col-xs-12 col-sm-8">
                        <div class="form-group">
                          <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="comp_name[]" value="<?=$exp->comp_name?>" placeholder="اسم المنشأة / الجهة">
                        </div>

                        <div class="form-group">
                          <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="job_title[]" value="<?=$exp->job_title?>" placeholder="المسمى الوظيفي">
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon">من</span>
                            <input type="text" name="start[]" data-validation-engine="validate[required] text-input" value="<?=$exp->start_date?>" class="form-control datepicker" placeholder="مثال 2012">
                            <span class="input-group-addon">حتى</span>
                            <input type="text" name="end[]" data-validation-engine="validate[required] text-input" value="<?=$exp->end_date?>" class="form-control datepicker" placeholder="مثال 2016">
                          </div>
                        </div>

                      </div>

                      <div class="col-xs-12">
                        <div class="form-group">
                           <textarea class="form-control" data-validation-engine="validate[required] text-input" rows="3" name="notes2[]" placeholder="نبذة مختصرة"><?=$exp->notes?></textarea>
                        </div>
                      </div>
                    </div>
 <input type="hidden" name="exp_<?=$counter2?>" id="exp_id_<?=$counter2?>" value="<?=$exp->jexp_id?>"/>
                  </div>
                </div>
              </div>

         <?php
		 $counter2++;
		  }}?>     

              <div class="col-xs-12 text-center" id="btn_exp_<?=$counter2?>">
                <br>
                <button class="btn btn-primary "  onClick="return add_experience(<?=$counter2?>)"><?=$this->lang->line('add_expbut')?></button>
              </div>


            </div>

          </div>
        </section>
        <!-- END Work Experience -->
  

        <!-- Skills -->
        <section>
          <div class="container">
        <header class="section-header">
            <span><?=$this->lang->line('skill_nm')?></span>
              <h2><?=$this->lang->line('work_exp')?></h2>
            </header>
			<div class="row" id="skill_row">
 <?php 
			$counter3=0; 
            if($skill_data->num_rows()>0){
				foreach($skill_data->result() as $skill){?>
                <div id="classskill<?=$counter3?>_error" style="color:#ef4d42;"></div>
                
              <div class="col-xs-12" id="skill_<?=$counter3?>">
                <div class="item-block">
                  <div class="item-form">
  
                      <button class="btn btn-danger btn-float btn-remove" onClick="remove_skill(<?=$counter3?>)"><i class="fa fa-close"></i></button>                  <?php /*?>  <button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return save_skill(<?=$counter3?>);"><i class="fa fa-save"></i></button><?php */?>

                    <div class="row">
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="skill_name[]" value="<?=$skill->skill_name?>" id="skill_id" placeholder="مثال: تصميم المواقع - البرمجة - التصوير">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                          <div class="input-group">
                            <input type="text" class="form-control" data-validation-engine="validate[required] text-input" value="<?=$skill->skill_pro?>" name="skill_pro[]" id="skill_pro" placeholder="نسبة المهارة مثال: 75">
                        <span class="input-group-addon">%</span> </div>
                            <span class="input-group-addon">%</span>
                          </div>
                        </div>

                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <input type="hidden" name="skill_id" id="skill_id_<?=$counter3?>" value="<?=$skill->skill_id?>">

<?php  $counter3++; }}?>

              <div class="col-xs-12 text-center" id="btn_skill_<?=$counter3?>">
                <br>
                <button class="btn btn-primary" onClick="add_skill(<?=$counter3?>);"><?=$this->lang->line('add_skill')?></button>
              </div>
			  
			  <!-- End skills -->
            </div>
            </div>
            </section>
        <!-- END Skills -->


<input type="hidden" name="error1" id="error1" value="0">
<input type="hidden" name="error2" id="error2" value="0">
<input type="hidden" name="error3" id="error3" value="0">
        <!-- Submit -->
       <!--  <section class=" bg-img" style="background-image: url(<?=base_url()?>assets/img/bg-facts.jpg);">
          <div class="container">
            <header class="section-header">
              <span>Are you done?</span>
              <h2>Submit resume</h2>
              <p>Please review your information once more and press the below button to put your resume online.</p>
            </header>

            <p class="text-center"><button class="btn btn-success btn-xl btn-round" id="my_u_buy"><?=$this->lang->line('submit')?></button></p>
 </form>
          </div>
        </section> -->
      


      
      <!-- END Main container -->

   
    <script>
	function update_resume(){	
	
		
	$('#class_1_error').html('');

	var formData = new FormData($("#step1_form")[0]);
 $.ajax({
	   type: "POST",
        url:"<?=base_url()?>Sprofile/update_resume",
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
			location.reload();
	}
	else{
		$('#class_1_error').html(bo);
		//$('#loadingmessage').hide();
	}
	}
});
		return false;
		}
	function checkfiles2()
{
var fup = document.getElementById('resume_file');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext=="png" || ext=="PNG"||ext=='doc'||ext=='docx')
{
	
return true;
} 
else
{
alert("Upload Gif or Jpg images only");
fup.focus();
 document.getElementById('filename').value='';
return false;
}
}	
    	 var total_edu = <?=$counter?>;
  var total_exp = <?=$counter2?>;
  var total_skill = <?=$counter3?>;
  
  /////////////////////////////////////////////////
  
  
   function add_skill(id){
	
	
	$('#btn_skill_'+id).hide();
	//var total_edu = $("#edu_"+id).find('form').length;
	//alert(total_exp);
	
	var html='<div class="col-xs-12" id="skill_'+total_skill+'"><div class="item-block"><div class="item-form"><button class="btn btn-danger btn-float btn-remove" onClick="remove_skill('+total_skill+')"><i class="fa fa-close"></i></button><div class="row"><div class="col-xs-12 col-sm-6"><div class="form-group"><input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="skill_name[]" id="skill_id" placeholder="Skill name, e.g. HTML"></div></div><div class="col-xs-12 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="skill_pro[]" id="skill_pro" placeholder="Skill proficiency, e.g. 90"><span class="input-group-addon">%</span></div></div></div></div></div></div></div><input type="hidden" name="skill_id" id="skill_id_'+total_skill+'" value=""><div class="col-xs-12 text-center" id="btn_skill_'+(total_skill+1)+'"><br><button class="btn btn-primary" onClick="add_skill('+(total_skill+1)+');"><?=$this->lang->line('add_skill')?></button></div>';

$("#skill_row").append(html);
	
	total_skill = total_skill +1;
	//$("#section_unit_"+id).append(html);
//	show_popup();
	//quiz_count = quiz_count + 1;
	
return false;
	}
	
function remove_skill(id){
	
	
	var skill_id 		= $("#skill_id_"+id).val();
	//alert(exp_id);
	if(skill_id == ""){
		$("#skill_"+id).remove();
		toastr.success(' ', 'تمت الازالة', {timeOut: 5000});
		return
	}else{

	$.ajax({
	    url:'<?php echo base_url()?>Sprofile/delete_skill/',
	    type:'POST',
	    data:{"skill_id":skill_id},
	    success:function(result){
	        
			
			
			toastr.success('<?=$this->lang->line('success')?>', '<?=$this->lang->line('removed')?>', {timeOut: 5000});
	    }

	});	
}
return
}

function save_skill(id){
//	alert(id)
	

	var formData = new FormData($("#skill_"+id)[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sprofile/save_skill",
                    data: formData,
                    contentType: false,
                    processData: false,
                    encode: true,
                    async: true,
                    cache: false,
                    success: function (data) {
						var r=JSON.parse(data);
	var bo=r['log_error'];
	//alert(bo)
	if(bo=='no'){
		$('#classskill'+id+'_error').html('');
		var last_id=r['last_id'];toastr.success('تم الحفظ', ' ', {timeOut: 5000});
						$("#skill_id_"+id).val(last_id);
		}else{
			$('#classskill'+id+'_error').html(bo);
			}
						
				
					}
				});
	return false;
}
 function update_skill(id){
	
	
	var formData = new FormData($("#skill_"+id)[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sprofile/update_skill/"+id,
                    data: formData,
                    contentType: false,
                    processData: false,
                    encode: true,
                    async: true,
                    cache: false,
                    success: function (data) {
					var	r=JSON.parse(data);
	var bo=r['log_error'];
	//alert(bo)
	if(bo=='no'){
		$('#classskill'+id+'_error').html('');
		var last_id=r['last_id'];toastr.success('تم التحديث بنجاح', '<?=$this->lang->line('success')?>', {timeOut: 5000});
						$("#skill_id_"+id).val(last_id);
		}else{
			$('#classskill'+id+'_error').html(bo);
			}
						
				
					}
				});
	return false;
	}
  
  
  
///////////////////////////////////////////////////
 
 function add_experience(id){
	
	
	$('#btn_exp_'+id).hide();
	//var total_edu = $("#edu_"+id).find('form').length;
	//alert(total_exp);
	
	var html='<div class="col-xs-12"  id="exp_'+total_exp+'"> <div class="item-block"><div class="item-form"><button class="btn btn-danger btn-float btn-remove" onClick="remove_exp('+total_exp+')"><i class="fa fa-close"></i></button><div class="row"> <div class="col-xs-12 col-sm-8"><div class="form-group"> <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="comp_name[]" placeholder="Company name"></div> <div class="form-group"> <input type="text" class="form-control" name="job_title[]" data-validation-engine="validate[required] text-input" placeholder="Position, e.g. UI/UX Researcher"> </div><div class="form-group"> <div class="input-group"><span class="input-group-addon">Date from</span> <input type="text" name="start[]" data-validation-engine="validate[required] text-input" class="form-control datepicker" placeholder="e.g. 2012"> <span class="input-group-addon">Date to</span> <input type="text" data-validation-engine="validate[required] text-input" name="end[]" class="form-control datepicker" placeholder="e.g. 2016"> </div></div><div class="form-group"><textarea class="form-control" name="notes2[]" rows="3" placeholder="Short description"></textarea></div> </div>  </div> </div> </div> </div><input type="hidden" name="exp_id" id="exp_id_'+total_exp+'" value=""><div class="col-xs-12 text-center" id="btn_exp_'+(total_exp+1)+'"> <br><button class="btn btn-primary" onClick="return add_experience('+(total_exp+1)+');"><?=$this->lang->line('add_exp')?></button> </div></div>';

$("#experience_row").append(html);
$( ".datepicker" ).datepicker({ dateFormat: 'yy',});	
	total_exp = total_exp +1;
	//$("#section_unit_"+id).append(html);
//	show_popup();
	//quiz_count = quiz_count + 1;
	
return false;
	}
	
function remove_exp(id){
	
	
	var exp_id 		= $("#exp_id_"+id).val();
	//alert(exp_id);
	if(exp_id == ""){
		$("#exp_"+id).remove();
		toastr.success(' ', 'تمت الازالة', {timeOut: 5000});
		return
	}else{

	$.ajax({
	    url:'<?php echo base_url()?>Sprofile/delete_exp/',
	    type:'POST',
	    data:{"exp_id":exp_id},
	    success:function(result){
	        
			
			
			toastr.success('<?=$this->lang->line('success')?>', '<?=$this->lang->line('removed')?>', {timeOut: 5000});
	    }

	});	
}
return
}

function save_exp(id){
//	alert(id)
	

	var formData = new FormData($("#exp_"+id)[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sprofile/save_exp",
                    data: formData,
                    contentType: false,
                    processData: false,
                    encode: true,
                    async: true,
                    cache: false,
                    success: function (data) {
						var r=JSON.parse(data);
	var bo=r['log_error'];
	//alert(bo)
	if(bo=='no'){
		$('#classexp'+id+'_error').html('');
		var last_id=r['last_id'];toastr.success('تم الحفظ', '<?=$this->lang->line('success')?>', {timeOut: 5000});
						$("#exp_id_"+id).val(last_id);
		}else{
			$('#classexp'+id+'_error').html(bo);
			}
						
				
					}
				});
	return false;
}
 function update_exp(id){
	
	
	var formData = new FormData($("#exp_"+id)[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sprofile/update_exp/"+id,
                    data: formData,
                    contentType: false,
                    processData: false,
                    encode: true,
                    async: true,
                    cache: false,
                    success: function (data) {
					var	r=JSON.parse(data);
	var bo=r['log_error'];
	//alert(bo)
	if(bo=='no'){
		$('#classexp'+id+'_error').html('');
		var last_id=r['last_id'];toastr.success('تم التحديث بنجاح', '<?=$this->lang->line('success')?>', {timeOut: 5000});
						$("#exp_id_"+id).val(last_id);
		}else{
			$('#classexp'+id+'_error').html(bo);
			}
						
				
					}
				});
	return false;
	}
	
	////////////////////////////////////////////////////////////////////////////
		function add_eduation(id){
	
	
	$('#btn_'+id).hide();
	//var total_edu = $("#edu_"+id).find('form').length;
	
	
	
	var html='<div class="col-xs-12" id="edu_'+total_edu+'"><div class="item-block"><div class="item-form"><button class="btn btn-danger btn-float btn-remove" onClick=" return remove_edu('+total_edu+');"><i class="fa fa-close"></i></button><div class="row"><div class="col-xs-12 col-sm-8"><div class="form-group"><input type="text" class="form-control"  name="school_name[]" data-validation-engine="validate[required] text-input" placeholder="School name, e.g. Massachusetts Institute of Technology"></div><div class="form-group"><input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="degree_title[]" placeholder="Master, Bacholrs"></div><div class="form-group"><div class="input-group"> <span class="input-group-addon">Date from</span><input type="text" class="form-control data-validation-engine="validate[required] text-input" datepicker" name="start_date[]" placeholder="e.g. 2012"> <span class="input-group-addon">Date to</span><input type="text" name="end_date[]" data-validation-engine="validate[required] text-input" class="form-control datepicker" placeholder="e.g. 2016"></div>  </div> <div class="form-group"> <textarea class="form-control" data-validation-engine="validate[required] text-input" name="notes[]" rows="3" placeholder="Short description"></textarea></div></div></div></div> </div> </div><input type="hidden" name="edu_id" id="edu_id_'+total_edu+'" value=""><div class="col-xs-12 text-center" id="btn_'+(total_edu+1)+'"> <br><button class="btn btn-primary" onClick="return add_eduation('+(total_edu+1)+');"><?=$this->lang->line('add_edu_name')?></button> </div>';


$("#education_row").append(html);
$( ".datepicker" ).datepicker({ dateFormat: 'yy',});
total_edu = total_edu +1;
return false;
	//$("#section_unit_"+id).append(html);
//	show_popup();
	//quiz_count = quiz_count + 1;
	

	}
	function remove_edu(id){
	
	
	var edu_id 		= $("#edu_id_"+id).val();
	
	if(edu_id == ""){
		
		$("#edu_"+id).remove();
		toastr.success(' ', 'تمت الازالة', {timeOut: 5000});
		return
	}else{
	
	$.ajax({
	    url:'<?=base_url()?>Sprofile/delete_edu/'+edu_id,
	    type:'POST',
	    data:{"edu_id":edu_id},
	    success:function(result){
	    	$("#edu_"+id).remove(); 
			alert(result);
		
			toastr.success('<?=$this->lang->line('success')?>', '<?=$this->lang->line('removed')?>', {timeOut: 5000});
	    }

	});	
}
return false;
}

function update_edu(id){
	
	var formData = new FormData($("#edu_"+id)[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sprofile/update_edu/"+id,
                    data: formData,
                    contentType: false,
                    processData: false,
                    encode: true,
                    async: true,
                    cache: false,
                    success: function (data) {
					var	r=JSON.parse(data);
	var bo=r['log_error'];
	//alert(bo)
	if(bo=='no'){
		$('#classes'+id+'_error').html('');
		var last_id=r['last_id'];toastr.success('تم الحفظ', '<?=$this->lang->line('success')?>', {timeOut: 5000});
						$("#edu_id_"+id).val(last_id);
		}else{
			$('#classes'+id+'_error').html(bo);
			}
						
				
					}
				});
	return false;
	}
	function save_edu(id){
	
	var formData = new FormData($("#edu_"+id)[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sprofile/save_edu",
                    data: formData,
                    contentType: false,
                    processData: false,
                    encode: true,
                    async: true,
                    cache: false,
                    success: function (data) {
						var r=JSON.parse(data);
	var bo=r['log_error'];
	//alert(bo)
	if(bo=='no'){
		$('#classes'+id+'_error').html('');
		var last_id=r['last_id'];toastr.success('تم الحفظ', '<?=$this->lang->line('success')?>', {timeOut: 5000});
						$("#edu_id_"+id).val(last_id);
		}else{
			$('#classes'+id+'_error').html(bo);
			}
						
				
					}
				});
	return false;
}

///////////




		function delete_red_data(){
	
	$.ajax({
	    url:'<?php echo base_url()?>Sprofile/delete_data/',
	    type:'POST',
	    data:{},
	    success:function(result){
	        
			
			
			//toastr.success(' ', 'تمت الازالة', {timeOut: 5000});
	    }

	});	
	}
		
		
		
		
		
		
		function save_each_edu(){
				var error=0;
				 var n = $( ".test_form" ).length;
				 
				if(n!=0){
			for (id = 0; id<n; id++) { 
				
    var formData = new FormData($("#edu_"+(id))[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sprofile/save_edu",
                    data: formData,
                    contentType: false,
                    processData: false,
                    encode: true,
                    async: true,
                    cache: false,
                    success: function (data) {
					var	r=JSON.parse(data);
	var bo=r['log_error'];

	if(bo=='no'){
		$('#classes'+(id-1)+'_error').html('');
		var last_id=r['last_id'];
		//toastr.success('تم الحفظ', ' ', {timeOut: 5000});
						$("#edu_id_"+(id-1)).val(last_id);
		}else{
				error=1;
	$("#error1").val(1);
		$('#my_u_buy').prop('disabled', false);
	$('#my_u_buy').html('<?=$this->lang->line('submit')?>');
			$('#classes'+(id-1)+'_error').html(bo);
			var tag = $('#classes'+(id-1)+'_error');
       $('html,body').animate({scrollTop: tag.offset().top},'slow');
			}
						
				
					}
				});
            }
				}
				
			return error;
			}
			
			function save_each_exp(){
				var error=0;
				//alert(total_exp+'expu');
					 var n = $( ".test_form2" ).length;
				 
				if(n!=0){
			for (id = 0; id<n; id++) { 
   	var formData = new FormData($("#exp_"+(id))[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sprofile/save_exp",
                    data: formData,
                    contentType: false,
                    processData: false,
                    encode: true,
                    async: true,
                    cache: false,
                    success: function (data) {
					var	r=JSON.parse(data);
	var bo=r['log_error'];
	//alert(bo)
	if(bo=='no'){
		$('#classexp'+(id-1)+'_error').html('');
		var last_id=r['last_id'];
		//toastr.success('تم الحفظ', ' ', {timeOut: 5000});
						$("#exp_id_"+(id-1)).val(last_id);
		}else{
			
			error=1;
				$("#error2").val(1);
				$('#my_u_buy').prop('disabled', false);
	$('#my_u_buy').html('<?=$this->lang->line('submit')?>');
			$('#classexp'+(id-1)+'_error').html(bo);
				var tag = $('#classexp'+(id-1)+'_error');
       $('html,body').animate({scrollTop: tag.offset().top},'slow');
			}
						
				
					}
				});
            }}
			return error;
			}
		function save_each_skill(){
			var error=0;
			
				 var n = $( ".test_form3" ).length;
				
				 
				if(n!=0){
			for (id = 0; id<n; id++) { 
			
   	var formData = new FormData($("#skill_"+(id))[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sprofile/save_skill",
                    data: formData,
                    contentType: false,
                    processData: false,
                    encode: true,
                    async: true,
                    cache: false,
                    success: function (data) {
					var	r=JSON.parse(data);
	var bo=r['log_error'];
	//alert(bo)
	if(bo=='no'){
		alert(id+'id');
		$('#classskill'+(id-1)+'_error').html('');
		var last_id=r['last_id'];
		//toastr.success('تم الحفظ', ' ', {timeOut: 5000});
						$("#skill_id_"+(id-1)).val(last_id);
		}else{
				error=1;
					$("#error3").val(1);
				$('#my_u_buy').prop('disabled', false);
	$('#my_u_buy').html('<?=$this->lang->line('submit')?>');
			$('#classskill'+(id-1)+'_error').html(bo);
			var tag = $('#classskill'+(id-1)+'_error');
       $('html,body').animate({scrollTop: tag.offset().top},'slow');
			}
						
				
					}
				});
            }
			}
			return error;
			}

function update_resume_details(){
			
			//delet already datat
			delete_red_data();
			
			
	$('#my_u_buy').prop('disabled', true);
	$('#my_u_buy').html('Processing..');
save_each_edu();
 exp_err=save_each_exp();
save_each_skill();

	var edu_err=$("#error1").val();
	var exp_err=$("#error2").val();
	var skill_err=$("#error3").val();
//alert(edu_err);
//alert(exp_err);
//alert(skill_err);
	if(edu_err==0 && exp_err==0 && skill_err==0 ){	
        location.reload(); 
	}else{
		$('#my_u_buy').prop('disabled', false);
	$('#my_u_buy').html('<?=$this->lang->line('submit')?>');
		}
return false;
		}







////////////








function Checkfiles()
{
  var fup = document.getElementById('filename2');
  var fileName = fup.value;
  var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
  if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext=="png" || ext=="PNG")
  {
	  $('#hidden').val(1);
  return true;
  } 
  else
  {
  alert("Upload Gif or Jpg images only");
  fup.focus();
   document.getElementById('filename2').value='';
  return false;
  }
}	


    </script> <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
