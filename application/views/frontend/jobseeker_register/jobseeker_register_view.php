<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<?php
$met_des     = $met_des; 
	$met_key     = $met_des; 
	$title       = $title; 

if(!isset($page_data))
{



$met_des     = $met_des; 
	$met_key     = $met_des; 
	$title       = $title; 
}
else
{
	if($page_data->num_rows()>0)
	{
		$page_row=$page_data->row();
		
		$met_des  = $page_row->page_meta_desc;
		$met_key  = $page_row->page_meta_keywords;
	//	$title    = $page_row->page_meta_title;
	}
}
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?=$met_des?>">
<meta name="keywords" content="<?=$met_key?>">
<title>
<?=$title?>
</title>

<!-- Styles -->
<link href="<?=base_url()?>assets/css/app.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/vendors/summernote/summernote.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
<!-- Fonts -->

<link rel="stylesheet" media="screen" href="<?=base_url()?>bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css" type="text/css"/>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="<?=base_url()?>assets/img/favicon.ico">
    <style>
	.btn-group .btn-group{display:none !important;}
	</style>
   
</head>

<body class="nav-on-header">

<!-- Navigation bar -->
<nav class="navbar">
  <div class="container"> 
    
    <!-- Logo -->
    <?php $this->load->view('frontend/common/top_header');?>
    <!-- END Logo --> 
    
    <!-- User account -->
    <?php  $this->load->view('frontend/common/log_reg_bar');?>
    <!-- END User account --> 
    
    <!-- Navigation menu -->
    <?php $this->load->view('frontend/common/menu_bar');?>
    <!-- END Navigation menu --> 
    
  </div>
</nav>
<!-- END Navigation bar --> 

<!-- Page header -->
<header class="page-header">
  <div class="container page-name">
    <div id="job_signup" class="job_add_steps job-step-1" style="display:block">
      <h1 class="text-center">
        <?=$this->lang->line('seeker_sign')?>
      </h1>
      <p class="lead text-center">
        <?=$this->lang->line('seeker_sign_below')?>
      </p>
    </div>
    <div id="job_plan" class="job_add_steps job-step-2">
      <h1 class="text-center">
        <?=$this->lang->line('seeker_sign1')?>
      </h1>
      <p class="lead text-center">
        <?=$this->lang->line('seeker_sign_below1')?>
      </p>
    </div>
    <div id="job_company_add" class="job_add_steps job-step-3">
      <h1 class="text-center">
        <?=$this->lang->line('seeker_sign2')?>
      </h1>
      <p class="lead text-center">
        <?=$this->lang->line('seeker_sign_below2')?>
      </p>
    </div>
    <div class="tsf-nav-step"> 
      
      <!-- BEGIN STEP INDICATOR-->
      <ul class="gsi-style-6 gsi-transition">
        <li data-target="step-1" id="li_1" class="current cur" > <a href="#"> <span class="number">1</span> <span class="desc">
          <label>
            <?=$this->lang->line('seeker_sign')?>
          </label>
          <span>
          <?=$this->lang->line('acc_up')?>
          </span> </span> </a> </li>
        <li data-target="step-2" id="li_2" class="cur"  > <a href="#"> <span class="number">2</span> <span class="desc">
          <label>
            <?=$this->lang->line('seeker_sign1')?>
          </label>
          <span>
          <?=$this->lang->line('fill_resume')?>
          </span> </span> </a> </li>
        <li data-target="step-3" id="li_3" class="cur"  > <a href="#"> <span class="number">3</span> <span class="desc">
          <label>
            <?=$this->lang->line('add_exp')?>
          </label>
          <span>
          <?=$this->lang->line('ad_kill_b')?>
          </span> </span> </a> </li>
      </ul>
      <!-- END STEP INDICATOR---> 
    </div>
  </div>
  <div class="container">
    <div class="job_add_steps job-step-1" style="display:block;">
      <div id="class1_error" style="color:#ef4d42;"></div>
      <form action="#" id="step1_form" name="step1_form" enctype="multipart/form-data" method="post">
        <div class="row" style="margin-left: 15px;">
          <div class="col-xs-12 col-sm-8 col-lg-10">
            <div class="form-group open">
              <select class="form-control selectpicker" data-placeholder="Choose one..." id="st_uni" name="univ_id" data-live-search="true">
                <option value="">
                <?=$this->lang->line('select_univ')?>
                </option>
                <?php if($uni_data->num_rows()>0){
					  foreach($uni_data->result() as $roi){?>
                <option value="<?=$roi->univ_id?>">
                <?=$roi->univ_name?>
                </option>
                <?php }
					  } ?>
              </select>
            </div>
            <div class="form-group open">
              <select class="form-control selectpicker" data-placeholder="Choose one..." name="grad_id">
                <option value="">حدد سنة التخرج المتوقعة
                <?=$this->lang->line('select_grad_year')?>
                </option>
                <?php if($graduation_year->num_rows()>0){
					  foreach($graduation_year->result() as $roi){?>
                <option value="<?=$roi->grad_id?>">
                <?=$roi->grad_year?>
                </option>
                <?php }
					  } ?>
              </select>
            </div>
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control" id="st_em" placeholder="البريد الإلكتروني" name="jos_email">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
                <input type="password" class="form-control" placeholder="كلمة السر (يجب ان تتكون من 6 على الأقل)" name="jos_password">
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-lg-2">
            <div class="form-group">
              <input type="file" name="filename" id="filename" onChange="Checkfiles();">
              <span class="help-block">ارفع صورة البطاقة الجامعية أو السجل الاكاديمي أو أي مستند يفيد بأنك طالب جامعي </span>
              <input type="hidden" value="" name="hidden" id="hidden">
            </div>
          </div>
        </div>
        <div class="button-group">
          <div class="action-buttons">
            <div class="next-button">
              <button class="btn btn-block btn-primary" id="check_pro1" onClick="return seeker_register_step1(2);">التالي</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div id="class2_error" style="color:#ef4d42;"></div>
    <form name="step2_form" id="step2_form"  method="post" enctype="multipart/form-data">
      <div class="job_add_steps job-step-2"> 
        <!--<div class="container">-->
        
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-xs-12 col-sm-4 col-lg-2">
                <div class="form-group">
                  <input type="file" class="" name="filename2" id="filename2" onChange="Checkfilesj();">
                  <span class="help-block">الصورة الشخصية - اختياري </span>
                  <input type="hidden" name="hidden2" value="" id="hidden2">
                </div>
              </div>
              <div class="col-xs-12 col-sm-8 col-lg-10">
                <div class="form-group">
                  <input type="text" class="form-control input-lg" id="st_name" name="jos_username" placeholder="الاسم الثلاثي">
                </div>
                <div class="form-group">
                  <select class="form-control selectpicker" data-placeholder="Choose one..." id="spe_id" name="spe_id" data-live-search="true">
                    <option value="">حدد التخصص</option>
                    <?php if($spe_data->num_rows()>0){
					  foreach($spe_data->result() as $spi){?>
                    <option value="<?=$spi->spe_id?>">
                    <?=$spi->spe_name?>
                    </option>
                    <?php }
					  } ?>
                  </select>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="about_uerself" rows="3" placeholder="نبذة مختصرة عنك"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="row">
            <div class="form-group col-xs-12 col-sm-6">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <select class="form-control selectpicker" id="location" name="location" data-live-search="true">
                  <option value="">حدد المدينة</option>
                    <?php if($location->num_rows()>0){
					  foreach($location->result() as $city){?>
                    <option value="<?=$city->city_id?>">
                    <?=$city->city_name?>
                    </option>
                    <?php }}?>
                  </select>
                </div>
              </div>
              <!--<div class="form-group col-xs-12 col-sm-6">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <input type="text" class="form-control" name="location" placeholder="Location, e.g. Melon Park, CA">
                </div>
              </div>-->
              <div class="form-group col-xs-12 col-sm-6">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
                  <select class="form-control selectpicker" id="st_gender" name="gender">
                    <?php if($gender_data->num_rows()>0){
					  foreach($gender_data->result() as $gen){?>
                    <option value="<?=$gen->gender_id?>">
                    <?=$gen->gender_name?>
                    </option>
                    <?php }}?>
                  </select>
                </div>
              </div>
              <div class="form-group col-xs-12 col-sm-6">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                  <select class="form-control selectpicker" name="country_id">
				    <option value="">حدد الجنسية</option>
                    <?php if($country_data->num_rows()>0){
					  foreach($country_data->result() as $con){?>
                    <option value="<?=$con->country_id?>">
                    <?=$con->country_name?>
                    </option>
                    <?php }
					  } ?>
                  </select>
                </div>
              </div>
              <div class="form-group col-xs-12 col-sm-6">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                  <input type="text" class="form-control" name="age" placeholder="العمر أو سنة الميلاد فقط">
                  <span class="input-group-addon">سنة</span> </div>
              </div>
              <div class="form-group col-xs-12 col-sm-6">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" class="form-control" id="st_phone" name="phone" placeholder="رقم الجوال (بصيغة: 05XXXXXXX )">
                </div>
              </div>
              <div class="form-group col-xs-12 col-sm-6">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" name="email" placeholder="البريد الإلكتروني">
                </div>
              </div>
            </div>
            <?php   $names		=	array();
   $name2=array();
   $i=0;
   if($tags_data->num_rows()>0){
     foreach($tags_data->result() as $rts){
		 
		 $s=$rts->tag_name;
			$names[]	=	$s;
			$i++;
	}}
	
	?>
            <hr class="hr-lg">
            
            <!--<h6>Tags list</h6>
              <div class="form-group">
                <input name="tag_id" id="tag_id" type="text" value="" onChange="save_tag()"  placeholder="Tag name">
                <span class="help-block"></span>
              
                <div id="searchByName"></div>
                                    
                                             <input type="hidden" name="hide_tags" id="hide_tags" value="" />
              </div>-->
            <div class="widgets"> </div>
          </div>
        </div>
        <div class="button-group">
          <div class="action-buttons">
            <div class="upload-button">
              <button class="btn btn-block btn-gray" >رفع نسخة من السيرة الذاتية - اختياري</button>
              <input type="file" name="resume_file" id="resume_file" onChange="checkfiles2();">
            </div>
            <div class="upload-button">
              <button class="btn btn-block btn-primary" id="check_pro" onClick="return seeker_register_step2(3);">التالي </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!--</div>-->
    <input type="hidden" name="success_seek" id="success_seek" value="0">
    <form id="step3_edu_exp_skill" name="step3_edu_exp_skill" method="post" action="<?=base_url()?>Sregister/save_jobseeker">
    <div class="job_add_steps job-step-3"> 
      <!--<div class="container">-->
      
      <h2>
        <?=$this->lang->line('edu_name')?>
      </h2>
      <div class="row" id="education_row">
        <div id="classes0_error" style="color:#ef4d42;"></div>
       
          <div class="col-xs-12" id="edu_0">
            <div class="item-block">
              <div class="item-form">
                <button class="btn btn-danger btn-float btn-remove" onClick="return remove_edu(0);"><i class="fa fa-close"></i></button>
               <?php /*?> <button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return save_edu(0);"><i class="fa fa-save"></i></button><?php */?>
                <div class="row">
                  <div class="col-xs-12 col-sm-8">
                    <div class="form-group">
                      <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="school_name[]" placeholder="نوع الشهادة أو التخصص مثال: دبلوم محاسبة - ثانوية عامة">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="degree_title[]" placeholder="اسم المدرسة / الجامعة">
                    </div>
                    <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">من</span>
                        <input type="text" id="datepicker" data-validation-engine="validate[required] text-input" class="form-control datepicker"  name="start_school[]" placeholder="مثال: 2009">
                        <span class="input-group-addon">حتى</span>
                        <input type="text" data-validation-engine="validate[required] text-input" class="form-control datepicker" name="end_school[]" placeholder="مثال: 2016">
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" data-validation-engine="validate[required] text-input" rows="3" name="notes[]" placeholder="نبذة مختصرة"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="edu_id" id="edu_id_0" value="">
       
        <div class="col-xs-12 text-center" id="btn_0"> <br>
          <button class="btn btn-primary"  onClick="add_eduation(0);">
          <?=$this->lang->line('add_edu_name')?>
          </button>
        </div>
      </div>
      
      <!--  Experience -->
      <h2>
        <?=$this->lang->line('work_txt_seek')?>
      </h2>
      <div class="row" id="experience_row">
        <div id="classexp0_error" style="color:#ef4d42;"></div>
      
          <div class="col-xs-12" id="exp_0">
            <div class="item-block">
              <div class="item-form">
                <button class="btn btn-danger btn-float btn-remove" onClick="remove_exp(0)"><i class="fa fa-close"></i></button>
              <?php /*?>  <button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return save_exp(0);"><i class="fa fa-save"></i></button><?php */?>
                <div class="row">
                  <div class="col-xs-12 col-sm-8">
                    <div class="form-group">
                      <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="comp_name[]" placeholder="اسم المنشأة أو الجهة">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="job_title[]" placeholder="المسمى الوظيفي أو النشاط">
                    </div>
                    <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">من</span>
                        <input type="text" name="start[]" data-validation-engine="validate[required] text-input" class="form-control datepicker" placeholder="مثال 2012">
                        <span class="input-group-addon">حتى</span>
                        <input type="text" name="end[]" data-validation-engine="validate[required] text-input" class="form-control datepicker"  placeholder="مثال 2016">
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" data-validation-engine="validate[required] text-input" name="notes2[]" rows="3" placeholder="نبذة مختصرة"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="exp_id" id="exp_id_0" value="">
      
        <div class="col-xs-12 text-center" id="btn_exp_0"> <br>
          <button class="btn btn-primary" onClick="add_experience(0);">اضافة خبرة</button>
        </div>
        
        <!-- End Experience --> 
      </div>
      
      <!-- Skill -->
      <h2>
        <?=$this->lang->line('skill_nm')?>
      </h2>
      <div class="row" id="skill_row">
        <div id="classskill0_error" style="color:#ef4d42;"></div>
        
          <div class="col-xs-12" id="skill_0">
            <div class="item-block">
              <div class="item-form">
                <button class="btn btn-danger btn-float btn-remove" onClick="remove_skill(0)"><i class="fa fa-close"></i></button>
             <?php /*?>   <button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return save_skill(0);"><i class="fa fa-save"></i></button><?php */?>
                <div class="row">
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="skill_name[]" id="skill_id" placeholder="مثال: تصميم المواقع - البرمجة - التصوير">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="skill_pro[]" id="skill_pro" placeholder="نسبة المهارة مثال: 75">
                        <span class="input-group-addon">%</span> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="skill_id" id="skill_id_0" value="">
    
        <div class="col-xs-12 text-center" id="btn_skill_0"> <br>
          <button class="btn btn-primary" onClick="add_skill(0);">
          <?=$this->lang->line('add_skill')?>
          </button>
        </div>
     
        <!-- End skills --> 
      </div>
      <div class="button-group">
        <div class="action-buttons">
          <div class="next-button">
            <button class="btn btn-block btn-primary" id="my_u_buy" >
            <?=$this->lang->line('submit')?>
            </button>
          </div>
        </div>
      </div>
      <!--</div>--> 
    </div>
    </form>
       <input type="hidden" name="error1" id="error1" value="0">
<input type="hidden" name="error2" id="error2" value="0">
<input type="hidden" name="error3" id="error3" value="0">
    <!-- END Page header --> 
  </div>
</header>

<!-- Main container --> 

<!-- END Main container --> 

<!-- Site footer --> 
<!-- Site footer -->
<?php $this->load->view('frontend/common/footer_view')?>
<!-- END Site footer --> 

<!-- Back to top button --> 
<a id="scroll-up" href="#"><i class="fa fa-angle-up"></i></a> 
<!-- END Back to top button --> 

<!-- Scripts --> 
<script src="<?=base_url()?>assets/js/app.min.js"></script> 
<script src="<?=base_url()?>assets/js/custom.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="<?=base_url()?>bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js"></script>

<link rel="stylesheet" href="<?=base_url()?>validation_engine/css/validationEngine.jquery.css" type="text/css"/>
<script src="<?=base_url()?>validation_engine/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=base_url()?>validation_engine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=base_url()?>assets/js/register.js" type="text/javascript" charset="utf-8"></script>

<!-- END Site footer --> 

<script>
 var total_skill = 0;
function add_skill(id){
	
	
	$('#btn_skill_'+id).hide();
	//var total_edu = $("#edu_"+id).find('form').length;
	//alert(total_exp);
	total_skill = total_skill +1;
	var html='<div class="col-xs-12" id="skill_'+total_skill+'"><div class="item-block"><div class="item-form"><button class="btn btn-danger btn-float btn-remove" onClick="remove_skill('+total_skill+')"><i class="fa fa-close"></i></button><div class="row"><div class="col-xs-12 col-sm-6"><div class="form-group"><input type="text" class="form-control" name="skill_name[]" data-validation-engine="validate[required] text-input" id="skill_id" placeholder="Skill name, e.g. HTML"></div></div><div class="col-xs-12 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" name="skill_pro[]" id="skill_pro" data-validation-engine="validate[required] text-input" placeholder="Skill proficiency, e.g. 90"><span class="input-group-addon">%</span></div></div></div></div></div></div></div><input type="hidden" name="skill_id" id="skill_id_'+total_skill+'" value=""><div class="col-xs-12 text-center" id="btn_skill_'+total_skill+'"><br><button class="btn btn-primary" onClick="add_skill('+total_skill+');"><?=$this->lang->line('add_skill')?></button></div>';

$("#skill_row").append(html);
	
	
	//$("#section_unit_"+id).append(html);
//	show_popup();
	//quiz_count = quiz_count + 1;
	

	}
	
function remove_skill(id){
	
	
	var skill_id 		= $("#skill_id_"+id).val();
	//alert(exp_id);
	if(skill_id == ""){
		$("#skill_"+id).remove();
		toastr.success('Success', 'Removed', {timeOut: 5000});
		return
	}else{

	$.ajax({
	    url:'<?php echo base_url()?>Sregister/delete_skill/',
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
                    url: "<?php echo base_url();?>Sregister/save_skill",
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
		var last_id=r['last_id'];toastr.success('Saved', 'success', {timeOut: 5000});
						$("#skill_id_"+id).val(last_id);
		}else{
			$('#classskill'+id+'_error').html(bo);
			}
						
				
					}
				});
	return false;
}
 
/*$(function() {
     var names	=	[];
	names = <?json_encode($names)?>;
	//console.log(names);
   $("#tag_id").autocomplete({
	   source: names,
	    open: function() {
        $(this).autocomplete("widget")
               .appendTo("#searchByName"),
              $("#searchByName").css("display","block");
    }
      
	  
    });
	
  });*/
function save_tag() {
   var tag =  $('#tag_id').val();
   var tag_id;
  $.ajax({
                  url:  "<?=base_url()?>Sregister/get_tag_id",
                  data: {'tag_name':tag},
              
                  type: "POST",
                  success: function(data){
                    tag_id=data;
					 if($('#hide_tags').val()=='')
   {
	   $('#hide_tags').val(tag_id);
   }
   else{
	   var already_professions = $('#hide_tags').val();
	     $('#hide_tags').val(already_professions+','+tag_id);
	   }
	   var html = $('.widgets').html();
   html+= '<span id="tg_'+tag_id+'">'+tag+'<a href="javascript:void(0)"  onclick="delete_tag('+tag_id+')"> Del </a></span>';
   $('.widgets').html(html);
                  }
                });

  
  
}
function delete_tag(tag_id)
{
	var tag_id = tag_id;
	$('#tg_'+tag_id).remove();
	$('#tag_id').val('');
//	$('#span_professions').text('All Positions');
	
	var already_professions = $('#hide_tags').val();
	if(already_professions.contains(","+tag_id)){
		already_professions = already_professions.replace(","+tag_id,'');
	    $('#hide_tags').val(already_professions);
	}
	else if(already_professions.contains(tag_id+",")){
		already_professions = already_professions.replace(tag_id+",",'');
	    $('#hide_tags').val(already_professions);
	}
	else if(already_professions.contains(tag_id))
	{
		already_professions = already_professions.replace(tag_id,'');
	    $('#hide_tags').val(already_professions);

	}
}
 var total_edu = 0;
  var total_exp = 0;
 
 function add_experience(id){
	
	
	$('#btn_exp_'+id).hide();
	//var total_edu = $("#edu_"+id).find('form').length;
	//alert(total_exp);
	total_exp = total_exp +1;
	var html='<div class="col-xs-12" id="exp_'+total_exp+'"><div class="item-block"><div class="item-form"><button class="btn btn-danger btn-float btn-remove" onClick="remove_exp('+total_exp+')"><i class="fa fa-close"></i></button><div class="row"> <div class="col-xs-12 col-sm-8"><div class="form-group"> <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="comp_name[]" placeholder="Company name"></div> <div class="form-group"> <input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="job_title[]" placeholder="Position, e.g. UI/UX Researcher"> </div><div class="form-group"> <div class="input-group"><span class="input-group-addon">Date from</span> <input type="text" data-validation-engine="validate[required] text-input" name="start[]" class="form-control datepicker" placeholder="e.g. 2012"> <span class="input-group-addon">Date to</span> <input type="text" data-validation-engine="validate[required] text-input" name="end[]" class="form-control datepicker" placeholder="e.g. 2016"> </div></div><div class="form-group"><textarea class="form-control" name="notes2[]" rows="3" placeholder="Short description"></textarea></div> </div>  </div> </div> </div> </div><input type="hidden" name="exp_id" id="exp_id_'+total_exp+'" value=""><div class="col-xs-12 text-center" id="btn_exp_'+total_exp+'"> <br><button class="btn btn-primary" onClick="add_experience('+total_exp+');"><?=$this->lang->line('add_exp')?></button> </div></div>';

$("#experience_row").append(html);
$( ".datepicker" ).datepicker({ dateFormat: 'yy',});	
	
	//$("#section_unit_"+id).append(html);
//	show_popup();
	//quiz_count = quiz_count + 1;
	

	}
	
function remove_exp(id){
	
	
	var exp_id 		= $("#exp_id_"+id).val();
	//alert(exp_id);
	if(exp_id == ""){
		$("#exp_"+id).remove();
		toastr.success('Success', 'Removed', {timeOut: 5000});
		return
	}else{

	$.ajax({
	    url:'<?php echo base_url()?>Sregister/delete_exp/',
	    type:'POST',
	    data:{"exp_id":exp_id},
	    success:function(result){
	        
			
			
			toastr.success('Success', 'Removed', {timeOut: 5000});
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
                    url: "<?php echo base_url();?>Sregister/save_exp",
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
		var last_id=r['last_id'];toastr.success('Saved', 'success', {timeOut: 5000});
						$("#exp_id_"+id).val(last_id);
		}else{
			$('#classexp'+id+'_error').html(bo);
			}
						
				
					}
				});
	return false;
}
 
function add_eduation(id){
	
	
	$('#btn_'+id).hide();
	//var total_edu = $("#edu_"+id).find('form').length;
	//alert(total_edu);
	total_edu = total_edu +1;
	var html='<div class="col-xs-12" id="edu_'+total_edu+'"><div class="item-block"><div class="item-form"><button class="btn btn-danger btn-float btn-remove" onClick=" return remove_edu('+total_edu+');"><i class="fa fa-close"></i></button><div class="row"><div class="col-xs-12 col-sm-8"><div class="form-group"><input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="school_name[]" placeholder="School name, e.g. Massachusetts Institute of Technology"></div><div class="form-group"><input type="text" class="form-control" data-validation-engine="validate[required] text-input" name="degree_title[]" placeholder="Master, Bacholrs"></div><div class="form-group"><div class="input-group"> <span class="input-group-addon">Date from</span><input type="text" class="form-control datepicker" data-validation-engine="validate[required] text-input" name="start_school[]" placeholder="e.g. 2012"> <span class="input-group-addon">Date to</span><input type="text" data-validation-engine="validate[required] text-input" name="end_school[]" class="form-control datepicker" placeholder="e.g. 2016"></div>  </div> <div class="form-group"> <textarea class="form-control" name="notes[]" rows="3" data-validation-engine="validate[required] text-input" placeholder="Short description"></textarea></div></div></div></div> </div> </div><input type="hidden" name="edu_id" id="edu_id_'+total_edu+'" value=""><div class="col-xs-12 text-center" id="btn_'+total_edu+'"> <br><button class="btn btn-primary" onClick="add_eduation('+total_edu+');"><?=$this->lang->line('add_edu_name')?></button> </div>';

$("#education_row").append(html);
	$( ".datepicker" ).datepicker({ dateFormat: 'yy',});
	
	//$("#section_unit_"+id).append(html);
//	show_popup();
	//quiz_count = quiz_count + 1;
	

	}
	
function remove_edu(id){
	
	
	var edu_id 		= $("#edu_id_"+id).val();
	
	if(edu_id == ""){
		$("#edu_"+id).remove();
		toastr.success('Success', 'Removed', {timeOut: 5000});
		return
	}else{

	$.ajax({
	    url:'<?php echo base_url()?>Sregister/delete_edu/',
	    type:'POST',
	    data:{"edu_id":edu_id},
	    success:function(result){
	        
			
			
			toastr.success('Success', 'Removed', {timeOut: 5000});
	    }

	});	
}
return
}

function save_edu(id){
	//alert(id)
	//

	var formData = new FormData($("#edu_"+id)[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sregister/save_edu",
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
		var last_id=r['last_id'];toastr.success('Saved', 'success', {timeOut: 5000});
						$("#edu_id_"+id).val(last_id);
		}else{
			$('#classes'+id+'_error').html(bo);
			}
						
				
					}
				});
	return false;
}
function seeker_reg_step(obj,step){
	//alert(step);
	
	$('.job_add_steps').hide();
	$('.job-step-'+step).show();
	$('.cur').removeClass('current');
	$('#li_'+step).addClass('current');
	
	
	
	}
	function Checkfilesj(){
		
var fup = document.getElementById('filename2');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext=="png" || ext=="PNG")
{
	$('#hidden2').val(1);
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
	function Checkfiles()
{
var fup = document.getElementById('filename');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext=="png" || ext=="PNG" || ext=="doc" || ext=="DOC" || ext=="docx" || ext=="DOCX" || ext=="xls" || ext=="XLS" || ext=="xlsx" || ext=="XLSX" || ext=="PDF" || ext=="pdf")
{

	$('#hidden').val(1);
return true;
} 
else
{
alert("يجب ان تكون احدى الصيغ التالية JPG, PNG, jpg, png, doc, DOC, docx, DOCX, xls, XLS, XLSX, xlsx, PDF, pdf ");
fup.focus();
 document.getElementById('filename').value='';
return false;
}
}	
function checkfiles2()
{
var fup = document.getElementById('resume_file');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext=="png" || ext=="PNG" || ext=="doc" || ext=="DOC" || ext=="docx" || ext=="DOCX" || ext=="xls" || ext=="XLS" || ext=="xlsx" || ext=="XLSX" || ext=="PDF" || ext=="pdf")
{
	
return true;
} 
else
{
alert("يجب ان تكون احدى الصيغ التالية JPG, PNG, jpg, png, doc, DOC, docx, DOCX, xls, XLS, XLSX, xlsx, PDF, pdf ");
fup.focus();
 document.getElementById('filename').value='';
return false;
}
}	


function delete_red_data(){
	
	$.ajax({
	    url:'<?php echo base_url()?>Sregister/delete_data/',
	    type:'POST',
	    data:{"id":0},
	    success:function(result){
	        
			
			
			//toastr.success('Success', 'Removed', {timeOut: 5000});
	    }

	});	
	}
function seeker_register_step1(step){
			$('#class1_error').html('');
	$('#class2_error').html('');
	$('#check_pro1').prop('disabled', true);
	$('#check_pro1').html('جاري المعالجة..');
	
	heap.identify(document.getElementById("st_em").value);
	FS.identify(document.getElementById("st_em").value);
	mixpanel.track("Signup-step-1");
	mixpanel.identify();
	mixpanel.people.set({
    "$email": document.getElementById("st_em").value , 
	"type": "student",
    "university": document.getElementById('st_uni').options[document.getElementById('st_uni').selectedIndex].text          
});


	var formData = new FormData($("#step1_form")[0]);
 $.ajax({
	   type: "POST",
        url:"<?=base_url()?>Sregister/add_user",
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
			$('#class1_error').html('');
	$('#class2_error').html('');
		$('.job_add_steps').hide();
	$('.job-step-'+step).show();
	$('.cur').removeClass('current');
	$('#li_'+step).addClass('current');
	
	}
	else{
		$('#check_pro1').prop('disabled', false);
	$('#check_pro1').html('التالي');
		$('#class1_error').html(bo);
		//$('#loadingmessage').hide();
	}
	}
});
return false;
		}
		////////////////////////////
		function seeker_register_step2(step){
			$('#class1_error').html('');
	$('#class2_error').html('');
	
	$('#check_pro').prop('disabled', true);

	$('#check_pro').html('جاري المعالجة..');

	var formData2 = new FormData($("#step2_form")[0]);
 $.ajax({
	   type: "POST",
        url:"<?=base_url()?>Sregister/add_resume",
        data: formData2,
        contentType: false,
        processData: false,
        encode: true,
        async: false,
        cache: false,
 		success: function(html){
	
	var r=JSON.parse(html);
	var bo=r['log_error'];
	//alert(bo)
	if( bo=='no'){
			$('#class1_error').html('');
	$('#class2_error').html('');
		$('.job_add_steps').hide();
	$('.job-step-'+step).show();
	$('.cur').removeClass('current');
	$('#li_'+step).addClass('current');
		mixpanel.track("Signup-step-2");
			mixpanel.people.set({
    "$name": document.getElementById("st_name").value , 
	"phone": document.getElementById("st_phone").value ,
	"location": document.getElementById('location').options[document.getElementById('location').selectedIndex].text,
	"specialist": document.getElementById('spe_id').options[document.getElementById('spe_id').selectedIndex].text,
    "gender": document.getElementById('st_gender').options[document.getElementById('st_gender').selectedIndex].text          
});

	
	}
	else{
			$('#check_pro').prop('disabled', false);
	$('#check_pro').html('التالي');
		$('#class2_error').html(bo);
		//$('#loadingmessage').hide();
	}
	}
});
return false;
		}
		
		function save_each_edu(){
				var error=0;
			for (id = 0; id <=total_edu; id++) { 
    var formData = new FormData($("#edu_"+id)[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sregister/save_edu",
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
		//toastr.success('Saved', 'success', {timeOut: 5000});
						$("#edu_id_"+(id-1)).val(last_id);
		}else{
				error=1;
				$("#error1").val(1);
		delete_red_data();
		$('#my_u_buy').prop('disabled', false);
	$('#my_u_buy').html('<?=$this->lang->line('submit')?>');
			$('#classes'+(id-1)+'_error').html(bo);
			var tag = $('#classes'+(id-1)+'_error');
       $('html,body').animate({scrollTop: tag.offset().top},'slow');
			}
						
				
					}
				});
            }
			return error;
			}
			
			function save_each_exp(){
				var error=0;
			for (id = 0; id <=total_exp; id++) { 
   	var formData = new FormData($("#exp_"+id)[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sregister/save_exp",
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
		//toastr.success('Saved', 'success', {timeOut: 5000});
						$("#exp_id_"+(id-1)).val(last_id);
		}else{
			
			error=1;
			$("#error2").val(1);
				delete_red_data();
				$('#my_u_buy').prop('disabled', false);
	$('#my_u_buy').html('<?=$this->lang->line('submit')?>');
			$('#classexp'+(id-1)+'_error').html(bo);
				var tag = $('#classexp'+(id-1)+'_error');
       $('html,body').animate({scrollTop: tag.offset().top},'slow');
			}
						
				
					}
				});
            }
			return error;
			}
		function save_each_skill(){
			var error=0;
			for (id = 0; id <=total_skill; id++) { 
			//alert('inside'+id);
			//alert('total_skill'+total_skill);
			
   	var formData = new FormData($("#skill_"+id)[0]);
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Sregister/save_skill",
                    data: formData,
                    contentType: false,
                    processData: false,
                    encode: true,
                    async: true,
                    cache: false,
                    success: function (data) {
					var	r=JSON.parse(data);
	var bo=r['log_error'];
//	alert(bo)
	if(bo=='no'){
		$('#classskill'+(id-1)+'_error').html('');
		var last_id=r['last_id'];
		//toastr.success('Saved', 'success', {timeOut: 5000});
						$("#skill_id_"+(id-1)).val(last_id);
		}else{
			//alert($("#error3").val()+'val b');
				error=1;
				$("#error3").val(1);
				//alert(id+'odddd');
				//alert($("#error3").val()+'val aftr');
				delete_red_data();
				$('#my_u_buy').prop('disabled', false);
	           $('#my_u_buy').html('<?=$this->lang->line('submit')?>');
			$('#classskill'+(id-1)+'_error').html(bo);
			var tag = $('#classskill'+(id-1)+'_error');
       $('html,body').animate({scrollTop: tag.offset().top},'slow');
	   
			}
						
				
					}
				});
            }
			return error;
			}
			
$(document).ready(function(){
    $("button").click(function(event){
if(event.target.id == 'my_u_buy'){
 mixpanel.track("Signup-step-3");


}
    });
});			
			
			
		function save_jobseeker(){
			mixpanel.track("Signup-step-3");

	//$('#my_u_buy').prop('disabled', true);
	//$('#my_u_buy').html('جاري المعالجة..');

			}
		
	</script>
    <script type="text/javascript">
    $( function() {
    	$( ".datepicker" ).datepicker({ dateFormat: 'yy',});
    } );
    </script>
     <input type="hidden" name="error1" id="error1" value="0">
<input type="hidden" name="error2" id="error2" value="0">
<input type="hidden" name="error3" id="error3" value="0">
</body>
</html>
