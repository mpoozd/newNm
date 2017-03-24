<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<?php
$met_des='';
$met_key='';
//$title=''; 

if(!isset($page_data))
{



	$met_des     =strip_tags(settings('settings_meta_desc')); 
	$met_key     = settings('settings_meta_keywords'); 
	//$title       = settings('settings_site_meta_title'); 
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
<link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- Favicons -->
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="icon" href="<?=base_url()?>assets/img/favicon.ico">


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
            <?=$this->lang->line('resume_name')?>
          </label>
          <span>
          <?=$this->lang->line('fill_resume')?>
          </span> </span> </a> </li>
        <li data-target="step-3" id="li_3" class="cur" > <a href="#"> <span class="number">3</span> <span class="desc">
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
              <select class="form-control selectpicker" data-placeholder="Choose one..." name="univ_id">
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
                <option value="">
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
                <input type="text" class="form-control" placeholder="Your email" name="jos_email">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
                <input type="password" class="form-control" placeholder="password" name="jos_password">
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-lg-2">
            <div class="form-group">
              <input type="file" name="filename" id="filename" onChange="Checkfiles();">
              <span class="help-block">Please upload a photo of your student ID card or graduation certificate </span>
              <input type="hidden" value="" name="hidden" id="hidden">
            </div>
          </div>
        </div>
        <div class="button-group">
          <div class="action-buttons">
            <div class="next-button">
              <button class="btn btn-block btn-primary" onClick="return seeker_register_step1(2);">Next</button>
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
                  <span class="help-block">upload your photo - optional </span>
                  <input type="hidden" name="hidden2" value="" id="hidden2">
                </div>
              </div>
              <div class="col-xs-12 col-sm-8 col-lg-10">
                <div class="form-group">
                  <input type="text" class="form-control input-lg" name="jos_username" placeholder="your full name">
                </div>
                <div class="form-group">
                  <select class="form-control selectpicker" data-placeholder="Choose one..." name="spe_id">
                    <option value="">select your specialist</option>
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
                  <textarea class="form-control" name="about_uerself" rows="3" placeholder="Short description about yourself"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="row">
             <!-- <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>-->
             <div class="form-group col-xs-12 col-sm-6">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <select class="form-control selectpicker" name="location">
                  <option value="">Select Your Location</option>
                    <?php if($location->num_rows()>0){
					  foreach($location->result() as $city){?>
                    <option value="<?=$city->city_id?>">
                    <?=$city->city_name?>
                    </option>
                    <?php }}?>
                  </select>
                </div>
              </div>
             
              <div class="form-group col-xs-12 col-sm-6">
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
              <div class="form-group col-xs-12 col-sm-6">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                  <select class="form-control selectpicker" name="country_id">
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
                  <input type="text" class="form-control" name="age" placeholder="Age">
                  <span class="input-group-addon">Years old</span> </div>
              </div>
              <div class="form-group col-xs-12 col-sm-6">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" class="form-control" name="phone" placeholder="Phone number">
                </div>
              </div>
              <div class="form-group col-xs-12 col-sm-6">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" name="email" placeholder="Email address">
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
              <button class="btn btn-block btn-gray" >upload your resume file - optional</button>
              <input type="file" name="resume_file" id="resume_file" onChange="checkfiles2();">
            </div>
            <div class="upload-button">
              <button class="btn btn-block btn-primary" onClick="return seeker_register_step2(3);">Next </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!--</div>-->
    
    <div class="job_add_steps job-step-3"> 
      <!--<div class="container">-->
      
      <h2>
        <?=$this->lang->line('edu_name')?>
      </h2>
      <div class="row" id="education_row">
        <div id="classes0_error" style="color:#ef4d42;"></div>
        <form id="edu_0" name="edu_0" method="post" action="">
          <div class="col-xs-12">
            <div class="item-block">
              <div class="item-form">
                <button class="btn btn-danger btn-float btn-remove" onClick="remove_edu(0)"><i class="fa fa-close"></i></button>
                <button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return save_edu(0);"><i class="fa fa-save"></i></button>
                <div class="row">
                  <div class="col-xs-12 col-sm-8">
                    <div class="form-group">
                      <input type="text" class="form-control" name="school_name" placeholder="School name, e.g. Massachusetts Institute of Technology">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="degree_title" placeholder="Master, Bacholrs">
                    </div>
                    <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">Date from</span>
                        <input type="text"  class="form-control datepicker"  name="start_school" placeholder="e.g. 2012">
                        <span class="input-group-addon">Date to</span>
                        <input type="text" class="form-control datepicker" name="end_school" placeholder="e.g. 2016">
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" rows="3" name="notes" placeholder="Short description"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="edu_id" id="edu_id_0" value="">
        </form>
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
        <form id="exp_0" name="exp_0" method="post" action="">
          <div class="col-xs-12">
            <div class="item-block">
              <div class="item-form">
                <button class="btn btn-danger btn-float btn-remove" onClick="remove_exp(0)"><i class="fa fa-close"></i></button>
                <button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return save_exp(0);"><i class="fa fa-save"></i></button>
                <div class="row">
                  <div class="col-xs-12 col-sm-8">
                    <div class="form-group">
                      <input type="text" class="form-control" name="comp_name" placeholder="Company name">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="job_title" placeholder="Position, e.g. UI/UX Researcher">
                    </div>
                    <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">Date from</span>
                        <input type="text" name="start" class="form-control datepicker" placeholder="e.g. 2012">
                        <span class="input-group-addon">Date to</span>
                        <input type="text" name="end" class="form-control datepicker" placeholder="e.g. 2016">
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="notes" rows="3" placeholder="Short description"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="exp_id" id="exp_id_0" value="">
        </form>
        <div class="col-xs-12 text-center" id="btn_exp_0"> <br>
          <button class="btn btn-primary" onClick="add_experience(0);">
          <?=$this->lang->line('add_exp')?>
          </button>
        </div>
        
        <!-- End Experience --> 
      </div>
      
      <!-- Skill -->
      <h2>
        <?=$this->lang->line('skill_nm')?>
      </h2>
      <div class="row" id="skill_row">
        <div id="classskill0_error" style="color:#ef4d42;"></div>
        <form id="skill_0" name="skill_0" method="post" action="">
          <div class="col-xs-12">
            <div class="item-block">
              <div class="item-form">
                <button class="btn btn-danger btn-float btn-remove" onClick="remove_skill(0)"><i class="fa fa-close"></i></button>
                <button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return save_skill(0);"><i class="fa fa-save"></i></button>
                <div class="row">
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="skill_name" id="skill_id" placeholder="Skill name, e.g. HTML">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control" name="skill_pro" id="skill_pro" placeholder="Skill proficiency, e.g. 90">
                        <span class="input-group-addon">%</span> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="skill_id" id="skill_id_0" value="">
        </form>
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
            <button class="btn btn-block btn-primary" onClick="save_jobseeker();">
            <?=$this->lang->line('submit')?>
            </button>
          </div>
        </div>
      </div>
      <!--</div>--> 
    </div>
    
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
<a id="scroll-up" href="#"><i class="ti-angle-up"></i></a> 
<!-- END Back to top button --> 

<!-- Scripts --> 
<script src="<?=base_url()?>assets/js/app.min.js"></script> 
<script src="<?=base_url()?>assets/js/custom.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script> 
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
<!-- END Site footer --> 

 
 
 <script src="<?=base_url()?>assets/js/angular.js"></script>
    <script src="<?=base_url()?>assets/js/angular-animate.js"></script>
    <script src="<?=base_url()?>assets/js/ui-bootstrap-tpls-2.0.0.js"></script>
    <script src="<?=base_url()?>assets/js/example.js"></script>
 



<script>


 var total_skill = 0;
function add_skill(id){
	
	
	$('#btn_skill_'+id).hide();
	//var total_edu = $("#edu_"+id).find('form').length;
	//alert(total_exp);
	total_skill = total_skill +1;
	var html='<div id="classskill'+total_skill+'_error" style="color:#ef4d42;"></div><form id="skill_'+total_skill+'" name="skill_'+total_skill+'" method="post" action=""><div class="col-xs-12"><div class="item-block"><div class="item-form"><button class="btn btn-danger btn-float btn-remove" onClick="remove_skill('+total_skill+')"><i class="fa fa-close"></i></button><button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return save_skill('+total_skill+');"><i class="fa fa-save"></i></button><div class="row"><div class="col-xs-12 col-sm-6"><div class="form-group"><input type="text" class="form-control" name="skill_name" id="skill_id" placeholder="Skill name, e.g. HTML"></div></div><div class="col-xs-12 col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" name="skill_pro" id="skill_pro" placeholder="Skill proficiency, e.g. 90"><span class="input-group-addon">%</span></div></div></div></div></div></div></div><input type="hidden" name="skill_id" id="skill_id_'+total_skill+'" value=""></form><div class="col-xs-12 text-center" id="btn_skill_'+total_skill+'"><br><button class="btn btn-primary" onClick="add_skill('+total_skill+');"><?=$this->lang->line('add_skill')?></button></div>';

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
 
$(function() {
     var names	=	[];
	names = <?=json_encode($names)?>;
	//console.log(names);
   $("#tag_id").autocomplete({
	   source: names,
	    open: function() {
        $(this).autocomplete("widget")
               .appendTo("#searchByName"),
              $("#searchByName").css("display","block");
    }
      
	  
    });
	
  });
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
	var html='<div id="classexp'+total_exp+'_error" style="color:#ef4d42;"></div><form id="exp_'+total_exp+'" name="exp_0" method="post" action=""><div class="col-xs-12"> <div class="item-block"><div class="item-form"><button class="btn btn-danger btn-float btn-remove" onClick="remove_exp('+total_exp+')"><i class="fa fa-close"></i></button><button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return save_exp('+total_exp+');"><i class="fa fa-save"></i></button><div class="row"> <div class="col-xs-12 col-sm-8"><div class="form-group"> <input type="text" class="form-control" name="comp_name" placeholder="Company name"></div> <div class="form-group"> <input type="text" class="form-control" name="job_title" placeholder="Position, e.g. UI/UX Researcher"> </div><div class="form-group"> <div class="input-group"><span class="input-group-addon">Date from</span> <input type="text" name="start" class="form-control datepicker" placeholder="e.g. 2012"> <span class="input-group-addon">Date to</span> <input type="text" name="end" class="form-control datepicker" placeholder="e.g. 2016"> </div></div><div class="form-group"><textarea class="form-control" name="notes" rows="3" placeholder="Short description"></textarea></div> </div>  </div> </div> </div> </div><input type="hidden" name="exp_id" id="exp_id_'+total_exp+'" value=""></form><div class="col-xs-12 text-center" id="btn_exp_'+total_exp+'"> <br><button class="btn btn-primary" onClick="add_experience('+total_exp+');"><?=$this->lang->line('add_exp')?></button> </div></div>';

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
	var html='<div id="classes'+total_edu+'_error" style="color:#ef4d42;"></div><form id="edu_'+total_edu+'" method="post"><div class="col-xs-12"><div class="item-block"><div class="item-form"><button class="btn btn-danger btn-float btn-remove" onClick=" return remove_edu('+total_edu+');"><i class="fa fa-close"></i></button> <button class="btn btn-success btn-float" style="margin: -53px 0 0 8px; float:left;" onClick="return save_edu('+total_edu+');"><i class="fa fa-save"></i></button><div class="row"><div class="col-xs-12 col-sm-8"><div class="form-group"><input type="text" class="form-control" name="school_name" placeholder="School name, e.g. Massachusetts Institute of Technology"></div><div class="form-group"><input type="text" class="form-control" name="degree_title" placeholder="Master, Bacholrs"></div><div class="form-group"><div class="input-group"> <span class="input-group-addon">Date from</span><input type="text" class="form-control datepicker" name="start_school" placeholder="e.g. 2012"> <span class="input-group-addon">Date to</span><input type="text" name="end_school" class="form-control datepicker" placeholder="e.g. 2016"></div>  </div> <div class="form-group"> <textarea class="form-control" name="notes" rows="3" placeholder="Short description"></textarea></div></div></div></div> </div> </div><input type="hidden" name="edu_id" id="edu_id_'+total_edu+'" value=""></form><div class="col-xs-12 text-center" id="btn_'+total_edu+'"> <br><button class="btn btn-primary" onClick="add_eduation('+total_edu+');"><?=$this->lang->line('add_edu_name')?></button> </div>';
 
$("#education_row").append(html);
$( ".datepicker" ).datepicker({ dateFormat: 'yy',});
	
	
	//$("#section_unit_"+id).append(html);
//	show_popup();
	//quiz_count = quiz_count + 1;
	

	}
	
function remove_edu(id){
	
	
	var edu_id 		= $("#edu_id_"+id).val();
	//alert(edu_id);
	if(edu_id == ""){
		$("#edu_"+id).remove();
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
alert("Upload JPG, PNG, jpg, png, doc, DOC, docx, DOCX, xls, XLS, XLSX, xlsx, PDF, pdf files only");
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



function seeker_register_step1(step){
			$('#class1_error').html('');
	$('#class2_error').html('');
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
		$('#class1_error').html(bo);
		//$('#loadingmessage').hide();
	}
	}
});
return false;
		}
		function seeker_register_step2(step){
			$('#class1_error').html('');
	$('#class2_error').html('');
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
	
	}
	else{
		$('#class2_error').html(bo);
		//$('#loadingmessage').hide();
	}
	}
});
return false;
		}
		
		function save_jobseeker(){
		
 $.ajax({
	   type: "POST",
        url:"<?=base_url()?>Sregister/save_jobseeker",
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
			document.location.href='<?=base_url()?>Sregister/thankyou';
	
	}
	else{
		$('#class2_error').html(bo);
		//$('#loadingmessage').hide();
	}
	}
});
return false;
		}
	</script>
    
	<script type="text/javascript">
    $( function() {
    	$( ".datepicker" ).datepicker({ dateFormat: 'yy',});
    } );
    </script>
</body>
</html>
