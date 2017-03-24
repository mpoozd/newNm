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
?><meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$met_des?>">
    <meta name="keywords" content="<?=$met_key?>">

    <title><?=$title?></title>


    <!-- Styles -->
    <link href="<?=base_url()?>assets/css/app.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendors/summernote/summernote.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

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

   <?php echo $content;?>

    <!-- Site footer -->
     <?php $this->load->view('frontend/common/footer_view')?>

    <!-- END Site footer -->


    <!-- Back to top button -->
    <a id="scroll-up" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- END Back to top button -->

    <!-- Scripts -->
    <script src="<?=base_url()?>assets/js/app.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/summernote/summernote.min.js"></script>
    <script src="<?=base_url()?>assets/js/custom.js"></script><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>


<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="<?=base_url()?>bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js"></script>

<link rel="stylesheet" href="<?=base_url()?>validation_engine/css/validationEngine.jquery.css" type="text/css"/>
<script src="<?=base_url()?>validation_engine/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=base_url()?>validation_engine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=base_url()?>assets/js/register.js" type="text/javascript" charset="utf-8"></script>

  <script type="text/javascript">
    $( function() {
    	$( ".datepicker" ).datepicker({ dateFormat: 'yy',});
    } );
    </script>
  </body>
</html>
