<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
  
  <?php
$met_des='';
$met_key='';
$title=''; 

if(!isset($page_data))
{



	$met_des     =strip_tags(settings('settings_meta_desc')); 
	$met_key     = settings('settings_meta_keywords'); 
	$title       = settings('settings_site_meta_title'); 
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


    <!-- Site header -->
    <header class="page-header bg-img size-lg" style="background-image: url(<?=base_url()?>assets/img/bg-banner1.jpg)">
      <div class="container no-shadow">
        <h1 class="text-center"><?php if(isset($page_title)){echo $page_title;}?></h1>
        <p class="lead text-center"><?php if(isset($page_below_title)){echo $page_below_title;}?></p>
      </div>
    </header>
    <!-- END Site header -->


    <!-- Main container -->
    <main>



      <!-- About -->
      <section>
        <div class="container">

         
<?php 
if($page_data->num_rows()){
	$page_row=$page_data->row();
	}
echo $page_row->page_content;
?>
        </div>
      </section>
      <!-- END About -->



      <!-- Team -->
      <!--<section class="bg-alt">
        <div class="container">
          <header class="section-header">
            <span>Who we are</span>
            <h2>Our team</h2>
            <p>Currently, we're three geek and will grow up soon</p>
          </header>

        <div class="row equal-team-members">

          <!-- Team member -->
        <!--  <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="team-member">
              <h5>Jose Shams <small>Co-founder & CEO</small></h5>
              <img src="assets/img/avatar-1.jpg" alt="avatar">
              <ul class="social-icons">
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
              </ul>
              <p>Curabitur eros tellus, eleifend eu ligula sed, vestibulum venenatis justo. Nunc semper augue non enim lacinia, fermum condimenm nulla finibus curabitur quis.</p>
            </div>
          </div>-->
          <!-- END Team member -->

          <!-- Team member -->
          <!--<div class="col-xs-12 col-sm-6 col-md-4">
            <div class="team-member">
              <h5>Mary Amiri <small>Co-founder & CTO</small></h5>
              <img src="assets/img/avatar-3.jpg" alt="avatar">
              <ul class="social-icons">
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
              </ul>
              <p>Curabitur eros tellus, eleifend eu ligula sed, vestibulum venenatis justo. Nunc semper augue non enim lacinia, fermum condimenm nulla finibus curabitur quis.</p>
            </div>
          </div>-->
          <!-- END Team member -->

          <!-- Team member -->
         <!-- <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="team-member">
              <h5>John Doe <small>Marketing manager</small></h5>
              <img src="assets/img/avatar-2.jpg" alt="avatar">
              <ul class="social-icons">
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
              </ul>
              <p>Curabitur eros tellus, eleifend eu ligula sed, vestibulum venenatis justo. Nunc semper augue non enim lacinia, fermum condimenm nulla finibus curabitur quis.</p>
            </div>
          </div>-->
          <!-- END Team member -->

     <!--   </div>

        </div>
      </section>-->-->
      <!-- END Team -->



    </main>
    <!-- END Main container -->


    <!-- Site footer -->
     <?php $this->load->view('frontend/common/footer_view')?>
    <!-- END Site footer -->


    <!-- Back to top button -->
    <a id="scroll-up" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- END Back to top button -->

    <!-- Scripts -->
    <script src="<?=base_url()?>assets/js/app.min.js"></script>
    <script src="<?=base_url()?>assets/js/custom.js"></script>

  </body>
</html>
