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


    <!-- Site header -->
    <header class="site-header size-lg text-center" style="background-image: url(<?=base_url()?>assets/img/bg-banner1.jpg)">
      <div class="container">
        <div class="col-xs-12">
          <h1><?=$this->lang->line('faqhead')?></h1>
          <h5 class="font-alt"><?=$this->lang->line('faqhead_below')?></h5>
          <br>
          <!--<div id="faq-search" class="form-group">
            <i class="ti-search fa-flip-horizontal1"></i>
            <input type="text" class="form-control" name="search" placeholder="Type to search...">
          </div>-->
        </div>

      </div>
    </header>
    <!-- END Site header -->



    <!-- Main container -->
    <main id="faq-result">
       <?php
	   $i=1;
	    if($types->num_rows()>0){
		  foreach($types->result() as $ty){?> 
          
           <section <?php if($i%2==0){?> class="bg-alt" <?php } ?>>
   
			  <div class="container">
          <header class="section-header text-left">
            <span><?=$ty->ftype_name?></span>
            <h2><?=$ty->ftype_name?></h2>
          </header>

          <ul class="faq-items"> 
		  <?php
		 
		  $faq_data=$this->General_model->select_where('faq_id,question,answer','faq',array('faq_type_id'=>$ty->ftype_id));
		   if($faq_data->num_rows()>0){
								foreach($faq_data->result() as $ro_g){?>
								
            <li>
              <h5><?=$ro_g->question?>?</h5>
              <p><?=$ro_g->answer?></p>
            </li>
<?php }} ?>
         
          </ul>
        </div>
			 
      </section> <?php $i++; }
		  }?>
        




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