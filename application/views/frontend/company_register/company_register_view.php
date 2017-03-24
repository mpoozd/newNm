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
      <?=$this->lang->line('reg_page_txt')?>
    </h1>
    <p class="lead text-center">
      <?=$this->lang->line('reg_page_txt_below')?>
    </p>
  </div>
  <div id="job_plan" class="job_add_steps job-step-2">
    <h1 class="text-center">
      <?=$this->lang->line('reg_page_txt1')?>
    </h1>
    <p class="lead text-center">
      <?=$this->lang->line('reg_page_txt_below1')?>
    </p>
  </div>
  <div id="job_company_add" class="job_add_steps job-step-3">
    <h1 class="text-center">
      <?=$this->lang->line('reg_page_txt2')?>
    </h1>
    <p class="lead text-center">
      <?=$this->lang->line('reg_page_txt_below2')?>
    </p>
  </div>
  <div id="job_add" class="job_add_steps job-step-4">
    <h1 class="text-center">
      <?=$this->lang->line('reg_page_txt3')?>
    </h1>
    <p class="lead text-center">
      <?=$this->lang->line('reg_page_txt_below3')?>
    </p>
  </div>
  <div class="tsf-nav-step"> 
    <!-- BEGIN STEP INDICATOR-->
    <ul class="gsi-style-6 gsi-transition">
      <li data-target="step-1" id="li_1" class="cur current"> <a href="javascript:;" > <span class="number">1</span> <span class="desc">
        <label>
          <?=$this->lang->line('reg_page_txt1_b')?>
        </label>
        <span>
        <?=$this->lang->line('reg_page_txt_below')?>
        </span> </span> </a> </li>
      <li data-target="step-2" id="li_2" class="cur"> <a href="javascript:;"  > <span class="number">2</span> <span class="desc">
        <label>
          <?=$this->lang->line('reg_page_txt2_b')?>
        </label>
        <span>
        <?=$this->lang->line('reg_page_txt_below1')?>
        </span> </span> </a> </li>
      <li data-target="step-3" id="li_3" class="cur" > <a href="javascript:;"  > <span class="number">3</span> <span class="desc">
        <label>
          <?=$this->lang->line('reg_page_txt3_b')?>
        </label>
        <span>
        <?=$this->lang->line('reg_page_txt_below2')?>
        </span> </span> </a> </li>
      <li data-target="step-4" id="li_4" class="cur" > <a href="javascript:;"  > <span class="number">4</span> <span class="desc">
        <label>
          <?=$this->lang->line('reg_page_txt4_b')?>
        </label>
        <span>
        <?=$this->lang->line('reg_page_txt_below3')?>
        </span> </span> </a> </li>
    </ul>
    <!-- END STEP INDICATOR---> 
    
  </div>
</div>
<div class="container">
<div class="job_add_steps job-step-1" style="display:block;">
  <?php
	//print_r($this->session->userdata('c_reg_step3'));
	 ?>
  <div id="class1_error" style="color:#ef4d42;"></div>
  <form action="" method="post" id="c_reg_form" name="c_reg_form">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-lg-10">
        <div class="form-group">
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="الاسم الثلاثي">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" class="form-control" id="user_email" name="user_email" placeholder="البريد الالكتروني - الشخصي">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
            <input type="password" class="form-control" name="user_password" placeholder="كلمة المرور - يجب ان تتكون من 6 خانات على الاقل">
          </div>
        </div>
      </div>
    </div>
    <div class="button-group">
      <div class="action-buttons">
        <div class="next-button">
          <button class="btn btn-block btn-primary" id="my_u_btn_1" onClick="return company_register_step1(2);">التالي</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="job_add_steps job-step-2">
  <header class="section-header"> <span>
    <?=$this->lang->line('plan_txt')?>
    </span>
    <h2>
      <?=$pp_data->num_rows()?>
      <?=$this->lang->line('plan_txt_type')?>
    </h2>
  </header>
  <ul class="pricing">
    <?php
		  if($pp_data->num_rows()>0){
			  foreach($pp_data->result() as $pp_r){
		
		   ?>
    <li>
      <h6>
        <?=$pp_r->pp_name?>
      </h6>
      <!-- <div class="price"> <sup>
        <?=settings('settings_currency')?>
        </sup>
        <?=$pp_r->pp_price?>
        <span>&nbsp;</span> </div> -->
      <hr>
      <p><strong>
        <?=$pp_r->pp_job_post_number?>
        </strong> اعلان وظيفي </p>
      <!-- <p><strong>
        <?=$pp_r->pp_featured_job_post_number?>
        </strong> featured job</p> -->
      <p><strong>
        <?=$pp_r->pp_days_listing_duration?>
        يوم </strong> مدة الإعلان أو البحث </p>
      <?php if($pp_r->pp_show_contact==1){
				  $str='√';
				  }else{
					    $str='x';
					  }?>
      <p><strong>
        <?=$str?>
        </strong> البحث عن سير ذاتية </p>
      <?php if($pp_r->pp_show_contact==1)
			   {
			   ?>
      <p><strong>
        <?=$pp_r->pp_num_of_resume?>
        </strong> عدد السير الذاتية </p>
      <?php }?>
      <br>
      <a class="btn btn-primary btn-block" id="my_u2_btn_<?=$pp_r->pp_id?>" href="javascript:;" onClick="select_job_plan(<?=$pp_r->pp_id?>,3)">اختيار</a> </li>
    <?php }} ?>
  </ul>
</div>
<form action="" name="step3_form" id="step3_form" method="post" enctype="multipart/form-data">
  <div id="class3_error" style="color:#ef4d42;"></div>
  <div class="job_add_steps job-step-3" style="display:none;"> 
    <!--<div class="container">-->
    
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-lg-2">
            <div class="form-group">
              <input type="file" name="filename" id="filename" onChange="Checkfiles();">
              <span class="help-block">شعار المنشأة " </span> </div>
          </div>
          <div class="col-xs-12 col-sm-8 col-lg-10">
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="com_name" placeholder="اسم المنشأة">
            </div>
            <div class="form-group">
              <select class="form-control selectpicker" name="com_headline" data-live-search="true">
			  			    <option value="">مجال المنشأة</option>
                <?php if($industry_data->num_rows()>0){
				foreach($industry_data->result() as $industry){?>
                <option value="<?=$industry->ind_id?>">
                <?=$industry->ind_name?>
                </option>
                <?php }
				} ?>
              </select>
              <!-- <input type="text" class="form-control input-lg" name="com_headline" placeholder="Comapny Headline (internet,Software)">--> 
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" name="com_description" placeholder="نبذة مختصرة عن المنشأة"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12">
        <div class="row">
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <select class="form-control selectpicker" name="com_location" data-live-search="true">
                  <option value="">مقر المنشأة</option>
                    <?php if($location->num_rows()>0){
					  foreach($location->result() as $city){?>
                    <option value="<?=$city->city_id?>">
                    <?=$city->city_name?>
                    </option>
                    <?php }}?>
                  </select>
                </div>
              </div>
          <!--<div class="form-group col-xs-12 col-sm-6 col-md-4">
            <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control" name="com_location" placeholder="Location, e.g. Melon Park, CA">
            </div>
          </div>-->
          <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control selectpicker" name="cemp_id">
			    <option value="">حجم المنشأة</option>
                <?php if($emp_data->num_rows()>0){
				foreach($emp_data->result() as $rmp){?>
                <option value="<?=$rmp->cemp_id?>">
                <?=$rmp->cemp_name?>
                </option>
                <?php }
				} ?>
              </select>
              <span class="input-group-addon">موظف</span> </div>
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-globe"></i></span>
              <input type="text" class="form-control" name="com_website" placeholder="الموقع الالكتروني للمنشأة">
            </div>
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-industry"></i></span>
              <select class="form-control selectpicker" name="ctype_id">
			                    <option value="">نوع المنشأة</option>
                <?php if($ctype->num_rows()>0){
				foreach($ctype->result() as $crop){?>
                <option value="<?=$crop->ctype_id?>">
                <?=$crop->ctype_name?>
                </option>
                <?php }
				} ?>
              </select>
            </div>
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control" name="com_phone" placeholder="هاتف المنشأة">
            </div>
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control"  name="com_email" placeholder="البريد الالكتروني للمنشأة">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="button-group">
      <div class="action-buttons">
        <div class="next-button">
          <button class="btn btn-block btn-primary" id="my_u_btn_3"  onClick="return company_register_step3(4);">التالي</button>
        </div>
      </div>
    </div>
    
    <!--</div>--> 
  </div>
</form>
<form name="step4_form" id="step4_form" method="post" >
  <div id="class4_error" style="color:#ef4d42;"></div>
  <a href="#." name="to_4" id="to_4"></a>
  <div class="job_add_steps job-step-4" style="display:none;">
    <div class="row">
      <div class="form-group col-xs-12 col-sm-6">
        <input type="text" name="job_title" class="form-control input-lg" placeholder="المسمى الوظيفي">
      </div>
      <div class="form-group col-xs-12 col-sm-6">
        <select class="form-control selectpicker" name="category_id" data-live-search="true">
          <option value="0">مجال الوظيفة</option>
          <?php if($cats_data->num_rows()>0){
				foreach($cats_data->result() as $rop){?>
          <option value="<?=$rop->cat_id?>">
          <?=$rop->cat_name?>
          </option>
          <?php }
				} ?>
        </select>
      </div>
      <div class="form-group col-xs-12">
        <textarea class="form-control" rows="3" name="short_dec" placeholder="نبذة مختصرة عن الوظيفة"></textarea>
      </div>
      <div class="form-group col-xs-12">
        <input type="text" class="form-control" name="application_email" placeholder="البريد الالكتروني الخاص بطلبات التقديم على الوظيفة">
      </div>
      <div class="form-group col-xs-12 col-sm-6 col-md-4">
        <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
        <?php /*?>  <input type="text" class="form-control" name="job_location" placeholder="Location, e.g. Melon Park, CA"><?php */?>
          <select class="form-control selectpicker" name="job_location" data-live-search="true">
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
      <div class="form-group col-xs-12 col-sm-6 col-md-4">
        <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
          <select class="form-control selectpicker" name="job_type_id">
            <?php if($type_data->num_rows()>0){
				foreach($type_data->result() as $tjob){?>
            <option value="<?=$tjob->jtype_id?>">
            <?=$tjob->jtype_name?>
            </option>
            <?php }
				} ?>
          </select>
        </div>
      </div>
	  
	  <div class="form-group col-xs-12 col-sm-6 col-md-4">
        <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
          <select class="form-control selectpicker" name="gender">
            <?php if($gender_data->num_rows()>0){
					  foreach($gender_data->result() as $gen){?>
            <option value="<?=$gen->gender_id?>">
            <?=$gen->gender_name?>
            </option>
            <?php }}?>
          </select>
        </div>
      </div>
	  
      <div class="form-group col-xs-12 col-sm-6 col-md-4">
        <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
          <input type="text" class="form-control" name="working_hours" placeholder="ساعات العمل اليومية">
          <span class="input-group-addon">ساعة</span> </div>
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
      </div>
      <div class="form-group col-xs-12 col-sm-6 col-md-4">
        <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-money"></i></span>
          <input type="text" class="form-control" name="salary" placeholder="الراتب المتوقع - أو غير محدد">
        </div>
      </div>
	  
    </div>
  </div>
  </div>
  </header>
  <!-- END Page header --> 
  
  <!-- Main container -->
  <main>
    <div class="job_add_steps job-step-1"> 
      <!-- Submit --> 
      <!-- <section class="bg-alt">
      <div class="container">
        <header class="section-header">
          <span>Are you done?</span>
          <h2>Submit Job</h2>
          <p>Please review your information once more and press the below button to put your job online.</p>
        </header>

        <p class="text-center"><button class="btn btn-success btn-xl btn-round">Submit your job</button></p>

      </div>
    </section> --> 
      <!-- END Submit --> 
    </div>
    <div class="job_add_steps job-step-2"> </div>
    <div class="job_add_steps job-step-3"> </div>
    <div class="job_add_steQ2ps job-step-4" style="display:none;"> 
      <!-- Job detail -->
      <section>
        <div class="container">
          <header class="section-header"> <span>
            <?=$this->lang->line('decs')?>
            </span>
            <h2>
              <?=$this->lang->line('resp')?>
            </h2>
            <p>
              <?=$this->lang->line('resp_detail')?>
            </p>
          </header>
          <textarea class="form-control" rows="4" name="responsibilties" placeholder=" "></textarea>
        </div>
        <header class="section-header">
          <h2>المهارات المطلوبة</h2>
        </header>
        <textarea class="form-control" rows="4" name="skills" placeholder=" "></textarea>
      </section>
      <!-- END Job detail --> 
      
      <!-- Submit -->
      <section class="bg-alt">
        <div class="container">
          <header class="section-header"> <span>
            <?=$this->lang->line('are_u_done')?>
            </span>
            <h2>
              <?=$this->lang->line('are_u_done_submit')?>
            </h2>
            <p>
              <?=$this->lang->line('are_u_done_submit_below')?>
            </p>
          </header>
          <p class="text-center">
            <button class="btn btn-success btn-xl btn-round" id="my_u_btn_4" onClick="return confirm_job();">
            <?=$this->lang->line('submit_job')?>
            </button>
          </p>
        </div>
      </section>
      <!-- END Submit --> 
    </div>
  </main>
</form>
<!-- END Main container --> 

<!-- Site footer -->
<?php $this->load->view('frontend/common/footer_view')?>
<!-- END Site footer --> 

<!-- Back to top button --> 
<a id="scroll-up" href="#"><i class="fa fa-angle-up"></i></a> 
<!-- END Back to top button --> 

<!-- Scripts --> 
<script src="<?=base_url()?>assets/js/app.min.js"></script> 
<script src="<?=base_url()?>assets/vendors/summernote/summernote.min.js"></script> 
<script src="<?=base_url()?>assets/js/custom.js"></script> 
 <script src="//code.jquery.com/jquery-1.10.2.js"></script> 
 <script src="<?=base_url()?>bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js"></script>
<script>
function com_reg_step(obj,step){
	//alert(step);
	
	$('.job_add_steps').hide();
	$('.job-step-'+step).show();
	$('.cur').removeClass('current');
	$('#li_'+step).addClass('current');
	
	
	
	}
	
	function company_register_step1(step){
	$('#class1_error').html('');
	$('#class3_error').html('');
	mixpanel.track("company-step-1");
	mixpanel.identify(document.getElementById("user_email").value);
	heap.identify(document.getElementById("user_email").value);
	FS.identify(document.getElementById("user_email").value);
	mixpanel.people.set({
    "$email": document.getElementById("user_email").value , 
	"type": "company",
    "name": document.getElementById("user_name").value          
});
	//$('#my_u_btn_1').prop('disabled', true);
	//$('#my_u_btn_1').html('جاري المعالجة');
 $.ajax({
 	type: "POST",
	url: "<?=base_url()?>Registerc/register_company",
	data : $('#c_reg_form').serialize(), 
	  
	success: function(html){

	var r=JSON.parse(html);
	
	var bo=r['log_error'];
//	alert (bo);
		

	if( bo=='no'){
			$('#class1_error').html('');
	$('#class3_error').html('');
		$('.job_add_steps').hide();
	$('.job-step-'+step).show();
	$('.cur').removeClass('current');
	$('#li_'+step).addClass('current');
	}
	else{
	//	$('#my_u_btn_1').prop('disabled', false);
	//$('#my_u_btn_1').html('Next');
		$('#class1_error').html(bo);
		//$('#loadingmessage').hide();
	}
	}
});
return false;
		}
		
		function select_job_plan(plan_id,step){
	//$('#my_u2_btn_'+plan_id).prop('disabled', true);
	//$('#my_u2_btn_'+plan_id).html('جاري المعالجة');
		mixpanel.track("company-step-2 plan");
 $.ajax({
 	type: "POST",url: "<?=base_url()?>Registerc/select_plan",
	data : {'plan_id':plan_id}, 
	 
		success: function(html){
	
	var r=JSON.parse(html);
	var bo=r['log_error'];
	
	if( bo=='no'){
		$('.job_add_steps').hide();
	$('.job-step-'+step).show();
	$('.cur').removeClass('current');
	$('#li_'+step).addClass('current');
	
	}
	else{
		
		//$('#my_u2_btn_'+plan_id).prop('disabled', false);
//$('#my_u2_btn_'+plan_id).html('Select Plan');
		$('#class1_error').html(bo);
		//$('#loadingmessage').hide();
	}
	}
});
return false;
		}
		
function Checkfiles()
{
var fup = document.getElementById('filename');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext=="png" || ext=="PNG")
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
	function company_register_step3(step){
		
	$('#class1_error').html('');
	$('#class3_error').html('');
	
//	$('#my_u_btn_3').prop('disabled', true);
//	$('#my_u_btn_3').html('جاري المعالجة');

	var formData = new FormData($("#step3_form")[0]);
 $.ajax({
	   type: "POST",
        url:"<?=base_url()?>Registerc/add_company",
         data: formData,
        contentType: false,
        processData: false,
        encode: true,
        async: false,
        cache: false,
 		success: function(html){
	var r=JSON.parse(html);
	var bo=r['log_error'];
	mixpanel.track("company-step-3");
	
	
	if( bo=='no'){
			$('#class1_error').html('');
	$('#class3_error').html('');
		$('.job_add_steps').hide();
	$('.job-step-'+step).show();
	$('.cur').removeClass('current');
	$('#li_'+step).addClass('current');
	$('.job_add_steQ2ps').show();
	
	}
	else{
		
		
	//	$('#my_u_btn_3').prop('disabled', false);
			//$("#my_u_btn_3").removeAttr("disabled");
//	$('#my_u_btn_3').html('Next');
		$('#class3_error').html(bo);
		//$('#loadingmessage').hide();
	}
	}
});
return false;
		}
		
		
		function confirm_job(){
		//	$('#my_u_btn_4').prop('disabled', true);
	//$('#my_u_btn_4').html('جاري المعالجة');
				$('#class1_error').html('');
	$('#class3_error').html('');
	$('#class4_error').html('');
	mixpanel.track("company-step-4");
	var formData = new FormData($("#step4_form")[0]);
 $.ajax({
	   type: "POST",
        url:"<?=base_url()?>Registerc/add_job",
        data: formData,
       contentType: false,
        processData: false,
        encode: true,
        async: false,
        cache: false,
 		success: function(html){
			//alert(html)
	var r;
	r=JSON.parse(html);
	var bo=r['log_error'];
	
	if( bo=='no'){
			document.location.href='<?=base_url()?>Registerc/thankyou';
				mixpanel.track("company-Thankyou");

	
	}
	else{
		//$('#my_u_btn_4').prop('disabled', false);
	//$('#my_u_btn_4').html('');
		var tag = $("#to_4");
       $('html,body').animate({scrollTop: tag.offset().top},'slow');
		$('#class4_error').html(bo);
		//$('#loadingmessage').hide();
	}
	}
});
return false;
			}
			
</script>
</body>
</html>
