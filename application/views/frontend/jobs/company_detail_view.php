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
	if($com_info->num_rows()>0){
		$crow=$com_info->row();
		}
	
	 ?>
    <header class="page-header bg-img size-lg" style="background-image: url(<?=base_url()?>assets/img/bg-banner2.jpg)">
      <div class="container">
        <div class="header-detail">
        <?php 
				if($crow->com_logo!=''){
					
					?>
	
	 <img class="logo" src="<?=base_url()?>uploads/company_logo/<?=$crow->com_logo?>" alt="">
	 <?php }else{ ?>
       <img class="logo" src="<?=base_url()?>assets/img/logo-google.jpg" alt="">
				<?php } ?>
        
          
          <div class="hgroup">
            <h1><?=$crow->com_name?></h1>
            <h3><?=get_sep_name($crow->com_headline)?></h3>
          </div>
          <hr>
          <p class="lead"><?=$crow->short_description?>.</p>

          <ul class="details cols-3">
            <li>
              <i class="fa fa-map-marker"></i>
              <span><?=get_city_name($crow->com_location)?></span>
            </li>

            <li>
              <i class="fa fa-globe"></i>
              <link target="_blank" href="<?=$crow->com_website?>"><?=$crow->com_website?></link>
            </li>

            
<li>
              <i class="fa fa-users"></i>
              <span><?=$crow->cemp_name?> موظف</span>
            </li>
            
            <li>
              <i class="fa fa-industry"></i>
              <span><?=$crow->ctype_name?></span>
            </li>
            

            <li>
              <i class="fa fa-phone"></i>
              <span><?=$crow->com_phone_number?></span>
            </li>

            <li>
              <i class="fa fa-envelope"></i>
              <a href="mailto:<?=$crow->com_email?>" ><?=$crow->com_email?></a>
            </li>
          </ul>

          <div class="button-group">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>

            
          </div>

        </div>
      </div>
    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>


      <!-- Company detail -->
      <section>
        <div class="container">

          <header class="section-header">
            <span><?=$this->lang->line('footer_about')?></span>
            <h2><?=$this->lang->line('com_detail')?></h2>
          </header>
          
          <p>
          <?=$crow->short_description?>.</p>

        </div>
      </section>
      <!-- END Company detail -->


      <!-- Open positions -->
      <section id="open-positions" class="bg-alt">
        <div class="container">
          <header class="section-header">
         
             <span><?=$this->lang->line('vacn')?></span>
            <h2><?=$this->lang->line('open')?></h2>
          </header>
          
          <div class="row">
<?php if($vacancies->num_rows()>0){
	foreach($vacancies->result() as $vrow){
	?>
		
            <!-- Job item -->
            <div class="col-xs-12">
              <a class="item-block" href="<?=base_url()?>Job/job_detail/<?=$vrow->job_sef?>">
                <header>
                   <?php 
				if($crow->com_logo!=''){
					
					?>
	
	 <img class="logo" src="<?=base_url()?>uploads/company_logo/<?=$vrow->com_logo?>" alt="">
	 <?php }else{ ?>
       <img class="logo" src="<?=base_url()?>assets/img/logo-google.jpg" alt="">
				<?php } ?>
                  <div class="hgroup">
                    <h4><?=$vrow->job_title?></h4>
                    <h5><?=$vrow->com_name?> <span class="label label-success"><?=$vrow->jtype_name?></span></h5>
                  </div>
                  <time datetime="2016-03-10 20:00"><?php 
posted_date_ago($vrow->dateadded);?></time>
                </header>

                <div class="item-body">
                  <p><?=substr($vrow->short_desc,0,400)?></p>
                </div>

                <footer>
                  <ul class="details cols-3">
                    <!-- <li>
                      <i class="fa fa-map-marker"></i>
                      <span><?=$vrow->job_location?></span>
                    </li>
 -->
                    <!-- <li>
                      <i class="fa fa-money"></i>
                      <span><?=$vrow->salary?><?=settings('settings_currency')?></span>
                    </li>
 -->
                   <!--  <li>
                      <i class="fa fa-certificate"></i>
                      <span><?=$vrow->working_hours?></span>
                    </li> -->
                  </ul>
                </footer>
              </a>
            </div>
            
            <?php }
	} ?>
            <!-- END Job item -->



          </div>

        </div>
      </section>
      <!-- END Open positions -->


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

  </body>
</html>