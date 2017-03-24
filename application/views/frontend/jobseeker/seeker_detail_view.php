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

  <?php 
	

	if($seeker_data->num_rows()>0){
		$jrow=$seeker_data->row();
		}
		
		 $jos_id = get_info('user_info','jos_id');
			    $com_id = get_info('company_info','com_id');
	$yes_no             = $this->General_model->get_field_value2(array('com_id'=>$com_id),'resume_yes_no','companies');
	$resume_search_count             = $this->General_model->get_field_value2(array('com_id'=>$com_id),'resume_search_count','companies');
	
	 $already_cn= $this->General_model->select_where('jos_id,com_id','comapny_contact',array('jos_id'=>$jrow->jos_id,'com_id'=>$com_id));
	?>
    <!-- Page header -->
    <header class="page-header bg-img" style="background-image: url(<?=base_url()?>assets/img/bg-banner1.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-4">
           <?php 
				if($jrow->image!=''){
					
					?>
	
	 <img  src="<?=base_url()?>uploads/jobseekers/<?=$jrow->image?>" alt="">
	 <?php }else{ ?>
       <img src="<?=base_url()?>assets/img/avatar.jpg" alt="">
				<?php } ?>
        
          
          </div>

          <div class="col-xs-12 col-sm-8 header-detail">
            <div class="hgroup">
              <h1><?=$jrow->jos_username?></h1>
              <h3><?=get_sep_name($jrow->jos_headline)?></h3>
            </div>
            <hr>
            <p class="lead"><?=get_uni_name($jrow->univ_id);?> - <?=get_sep_name($jrow->spe_id);?></p>

            <ul class="details cols-2">
              <li>
                <i class="fa fa-map-marker"></i>
                <span><?=get_city_name($jrow->location);?></span>
              </li>
<?php if($jos_id==''){
		 if($already_cn->num_rows()>0){?>
              <li>
                <i class="fa fa-certificate"></i>
                    <?php 
			  
				
	 $gender             = $this->General_model->get_field_value2(array('gender_id'=>$jrow->gender),'gender_name','gender');
	  
			  ?>
                <a href="#"><?=$gender?></a>
              </li>
<?php }}?>
              <li><?php
              			$country_name             = $this->General_model->get_field_value2(array('country_id'=>$jrow->country_id),'country_name','countries');?>

                <i class="fa fa-globe"></i>
                <span><?=$country_name?></span>
              </li>
 <?php if($jos_id==''){
		 if($already_cn->num_rows()>0){?>
              <li>
                <i class="fa fa-birthday-cake"></i>
                <span><?=$jrow->age?> سنة</span>
              </li>
              <?php }}?>
<?php if($jos_id==''){
		 if($already_cn->num_rows()>0){?>
              <li>
                <i class="fa fa-phone"></i>
                <span><?=$jrow->phone?></span>
              </li>
              <?php }}?>
<?php if($jos_id==''){
		 if($already_cn->num_rows()>0){?>
              <li>
                <i class="fa fa-envelope"></i>
                <a href="#"><?=$jrow->email?></a>
              </li>
             <?php }}?>
            </ul>

          
          </div>
        </div>

        <div class="button-group">
		<?php if($jos_id==''){
		 if($already_cn->num_rows()>0){?>
          <!-- <ul class="social-icons">
            <li><a class="facebook" href="<?=$jrow->social_media_url1?>"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="<?=$jrow->url2?>"><i class="fa fa-twitter"></i></a></li>
            <li><a class="dribbble" href="<?=$jrow->url3?>"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="<?=$jrow->url4?>"><i class="fa fa-linkedin"></i></a></li>
          </ul>
 -->
		 <?php }}?>
          <div class="action-buttons">
          <?php 
		
	
if($yes_no==1){
			 $total_contc= $this->General_model->select_where('jos_id,com_id','comapny_contact',array('com_id'=>$com_id));
}
				if($jos_id==''){
		 if($already_cn->num_rows()>0){
		  if($jrow->resume_file!=''){
		  ?>
            <a class="btn btn-gray" href="<?=base_url()?>Profilec/download/<?=$jrow->resume_file?>"><?=$this->lang->line('download_cv')?></a>
            <?php }}} ?>
             <?php 
			 
			   
				 
				 if($jos_id==''){
			
				 if($already_cn->num_rows()>0){?>
					            <a class="btn btn-success" href="javascript:;" onClick=""><?=$this->lang->line('al_ready_contact')?></a>
 
					 <?php }else{
						 if($yes_no==1 || $yes_no==0){
							 if($resume_search_count>0){
								   if($com_id!=''){?>
            <a class="btn btn-success" id="my_<?=$jrow->jos_id?>" href="javascript:;" onClick="contact_seeker(<?=$jrow->jos_id?>)"><?=$this->lang->line('contact_me')?></a>
				  <?php }else{?>
				  
				              <a class="btn btn-success" href="<?=base_url()?>Login"><?=$this->lang->line('contact_me')?></a>

				  <?php }
								 ?>
								 <?php 
								 }
							 }
						 
			
				  
				  
				  }}?>
          </div>
        </div>
      </div>
    </header>
    <!-- END Page header -->

    <!-- Main container -->
    <main>


      <!-- Education -->
      <section>
        <div class="container">

          <header class="section-header">
          <span><?=$this->lang->line('latest_degree')?></span>
            <h2><?=$this->lang->line('edu')?></h2>
          </header>
          
          <div class="row">
          <?php 
		  if($edu_data->num_rows()>0){
			  foreach($edu_data->result() as $row){?>
				  
				
            <div class="col-xs-12">
              <div class="item-block">
                <header>
                  <!--<img src="assets/img/logo-mit.png" alt="">-->
                  <div class="hgroup">
                    <h4><?=$row->degree_title?></h4>
                    <h5><?=$row->school_name?></h5>
                  </div>
                  <h6 class="time"><?=$row->start_school?> - <?=$row->end_school?></h6>
                </header>
                <div class="item-body">
                  <p><?=$row->notes?></p>
                </div>
              </div>
            </div>

              <?php }
			  }
		  ?>
          </div>

        </div>
      </section>
      <!-- END Education -->


      <!-- Work Experience -->
      <section class="bg-alt">
        <div class="container">
          <header class="section-header">
             <span><?=$this->lang->line('past_pos')?></span>
            <h2><?=$this->lang->line('work_exp')?></h2>
          </header>
          
          <div class="row">

<?php 
		  if($exp_data->num_rows()>0){
			  foreach($exp_data->result() as $erow){?>
				  
            <!-- Work item -->
            <div class="col-xs-12">
              <div class="item-block">
                <header>
                 <!-- <img src="assets/img/logo-google.jpg" alt="">-->
                  <div class="hgroup">
                    <h4><?=$erow->comp_name?></h4>
                    <h5><?=$erow->comp_name?></h5>
                  </div>
                  <h6 class="time"><?=$erow->start_date?> - <?=$erow->end_date?></h6>
                </header>
                <div class="item-body">
                  <p><?=$this->lang->line('respo')?>:</p>
                 <?=$erow->notes?>
                </div>
              </div>
            </div>
            <!-- END Work item -->


<?php }
			  }
		  ?>
          </div>

        </div>
      </section>
      <!-- END Work Experience -->


       
      <section>
        <div class="container">
          <header class="section-header">
           <span><?=$this->lang->line('expert_area')?></span>
            <h2><?=$this->lang->line('skill_nm')?></h2>
          </header>
          
          <br>
          <ul class="skills cols-3">
          <?php 
		  if($skill_data->num_rows()>0){
			  foreach($skill_data->result() as $skill_ro){
				  ?>
				
            <li>
              <div>
                <span class="skill-name"><?=$skill_ro->skill_name?></span>
                <span class="skill-value"><?=$skill_ro->skill_pro?>%</span>
              </div>
              <div class="progress">
                <div class="progress-bar" style="width: <?=$skill_ro->skill_pro?>%;"></div>
              </div>
            </li>

              <?php }
			  }
		  ?>

           
          </ul>

        </div>
      </section>
      <!-- END Skills -->


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
    $(document).ready(function(){
         //get it if Status key found
         if(localStorage.getItem("Status"))
         {
            
			  toastr.success('<?=$this->lang->line('success')?>', '<?=$this->lang->line('in_con')?>', {timeOut: 5000});
              localStorage.clear();
         }
    });

    </script>
<script>
function contact_seeker(jos_id){
	$.ajax({
	    url:'<?php echo base_url()?>Profilec/contact_resume',
	    type:'POST',
	    data:{"jos_id":jos_id},
	    success:function(result){
			
                    localStorage.setItem("Status",'Success')
                    window.location.reload();
					
			
			//	$("#job_row_"+job_id).remove();
				$("#my_"+jos_id).removeAttr('onclick');
						$("#my_"+jos_id).html('<?=$this->lang->line('contaced')?>');
						
						
			//toastr.success('Success', 'In Contacts', {timeOut: 5000});
		//	location.reload();
		
	    }

	});	
	
	}
</script>
 </body>
</html>