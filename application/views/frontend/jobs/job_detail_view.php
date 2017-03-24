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
		$title    = $page_row->page_meta_title;
	}
}
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$met_des?>">
    <meta name="keywords" content="<?=$met_key?>">

    <title><?=$title?></title>

    <!-- Styles -->
    <link href="<?=base_url()?>assets/css/app.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
    
    

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="<?=base_url()?>assets/img/favicon.ico">
    <style>
    .white-popup-block {background: #fff none repeat scroll 0 0; margin: 40px auto;max-width: 650px;padding: 20px 30px;position: relative;text-align: left;}
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
    <!-- END Navigation bar -->


    <!-- Page header -->
    
    <?php 
	

	if($jobs->num_rows()>0){
		$jrow=$jobs->row();
		}
	?>
    <header class="page-header bg-img size-lg" style="background-image: url(<?=base_url()?>assets/img/bg-banner2.jpg)">
      <div class="container">
        <div class="header-detail">
        <?php 
				if($jrow->com_logo!=''){
					
					?>
	
	 <img class="logo" src="<?=base_url()?>uploads/company_logo/<?=$jrow->com_logo?>" alt="">
	 <?php }else{ ?>
       <img class="logo" src="<?=base_url()?>assets/img/logo-google.jpg" alt="">
				<?php } ?>
        
        
          <div class="hgroup">
            <h1><?=$jrow->job_title?></h1>
            <input type="hidden" name="job_title" id="job_title" value="<?=$jrow->job_title?>">
            <input type="hidden" name="com_id" id="com_id" value="<?=$jrow->com_id?>">
            <h3><a href="<?=base_url()?>Job/company_detail/<?=$jrow->com_sef?>"><?=$jrow->com_name?></a></h3>
          </div>
          <time datetime="2016-03-03 20:00"><?php 
posted_date_ago($jrow->dateadded);?></time>
          <hr>
          <p class="lead"><?=substr($jrow->short_desc,0,400)?></p>

          <ul class="details cols-3">
            <li>
              <i class="fa fa-map-marker"></i>
              <span><?=get_city_name($jrow->job_location);?></span>
            </li>

            <li>
              <i class="fa fa-briefcase"></i>
              <span><?=$jrow->jtype_name?></span>
            </li>

            <li>
              <i class="fa fa-money"></i>
			  <?php 
				if($jrow->salary == 0.0){
					?>
              <span>غير محدد </span>
					
					
				 <?php }else{ ?>
		
              <span><?=$jrow->salary?><?=settings('settings_currency')?></span>
			  				<?php } ?>

            </li>

            <li>
              <i class="fa fa-clock-o"></i>
              <span><?=$jrow->working_hours?> ساعة</span>
            </li>

            <li>
              <i class="fa fa-flask"></i>
              <span><?=$jrow->experience_id?></span>
            </li>

            <li>
              <i class="fa fa-certificate"></i>
             
              <a href="javascript:;"><?=$jrow->gender_name?></a>
            </li>
          </ul>

          <div class="button-group">
            <ul class="social-icons">
              <li class="title">مشاركة</li>
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            </ul>

            <div class="action-buttons">
              <!-- <a class="btn btn-primary" href="#">Apply with linkedin</a> -->
              
              <?php 
			    $jos_id = get_info('user_info','jos_id');
			    $com_id = get_info('company_info','com_id');
				
				  if(time()>$jrow->package_expirydate){?>
					  <a class="btn btn-success" href="javascript:;"><?=$this->lang->line('app_close')?> </a> 
					  <?php }else{
						  if($jrow->job_status==0){?>
							  <a class="btn btn-success" href="javascript:;"><?=$this->lang->line('app_close')?></a> 
							  <?php }else{  
						  
			  if($com_id!=''){
				  
				  }else if($jos_id!='' ){
			  //check if already applied or not
	$jap=$this->General_model->select_where('*','job_applications',array('job_id'=>$jrow->job_id,'jap_status'=>1,'jos_id'=>intval($jos_id)));
	if($jap->num_rows()>0){
		?>
        <a class="btn btn-success" href="javascript:;"><?=$this->lang->line('all_asss')?></a>
			  
		<?php }else{
			  ?>
              <a class="btn btn-success"  id="my_<?=$jrow->job_id?>" href="javascript:;" onClick="apply_application(<?=$jrow->job_id?>);"><?=$this->lang->line('apply_now')?></a>
			  
              <?php }?>
              <?php }else{?>
				  <a class="btn btn-success" href="<?=base_url()?>Login"><?=$this->lang->line('apply_now')?></a>
				  <?php }}} ?>
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

          <p><?=substr($jrow->short_desc,400)?></p>

          <br>
          <h4><?=$this->lang->line('respo')?></h4>
        <?=$jrow->responsibilties?>
          <br>
         
          <h4><?=$this->lang->line('pref')?></h4>
            <?=$jrow->skills_required?>	

        </div>
      </section>
      <!-- END Job detail -->

    </main>
    <!-- END Main container -->


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

<script>
function apply_application(job_id){
		var retVal = confirm("Are you sure you want to Apply For it?");
	          if( retVal == true ){
           //  alert("User wants to continue!");
			$.ajax({
	    url:'<?php echo base_url()?>Sjob/apply_job',
	    type:'POST',
	    data:{"job_id":job_id,'com_id':$('#com_id').val(),'job_title':$('#job_title').val()},
	    success:function(result){
			if(result==0){
				$("#my_"+job_id).removeAttr('onclick');
						$("#my_"+job_id).html('<?=$this->lang->line('all_app')?>');
			toastr.info('<?=$this->lang->line('info_msg')?>', '<?=$this->lang->line('all_app')?>', {timeOut: 5000});
				}else{
	        
			
			//	$("#job_row_"+job_id).remove();
				$("#my_"+job_id).removeAttr('onclick');
						$("#my_"+job_id).html('<?=$this->lang->line('applu')?>');
			toastr.success('<?=$this->lang->line('success')?>', '<?=$this->lang->line('applu')?>', {timeOut: 5000});
			
			}
	    }

	});	
	            return true;
            }else{
            // alert("User does not want to continue!");
	          
				  location.reload();
			   return false;
               }

	
	}
	
	
   

</script>
  </body>
</html>