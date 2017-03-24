<!DOCTYPE html>
<html lang="en" dir="rtl" >
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
    <header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner2.jpg)">
      <div class="container no-shadow">
      <h1 class="text-center"><?=$this->lang->line('pkg')?></h1>
        <p class="lead text-center"><?=$this->lang->line('below_pkg')?></p>
      </div>
    </header>
    <!-- END Site header -->


    <!-- Main container -->
    <main>
<h4 align="center">Package Information</h4>
   <?php if($pack_info->num_rows()>0){
	   $pcrow=$pack_info->row();
	   $pkg_id=$pcrow->price_package_id;
	 $pack_name= $this->General_model->get_field_value('pp_id',$pcrow->price_package_id,'pp_name','pricing_plan');
	   }?>
        <div align="center">
   <h6><b>You Currntly Purchased</b> <?=$pack_name?></h6>
   <h6><b>Featured Left </b> <?=$pcrow->job_posting_count?></h6>
   <h6><b>Job Posting Left </b><?=$pcrow->job_posting_count?></h6>
    
                <?php if($pcrow->resume_yes_no==1){
				  $str='Yes';
				  }else{
					    $str='No';
					  }?>
               <p><strong><?=$str?></strong> Resume Search </p>
               <?php if($pcrow->resume_yes_no==1)
			   {
			   ?>
                <p><strong><?=$pcrow->resume_search_count?></strong> Can Contact</p>
                <?php }?>
   <?php if(time()>$pcrow->package_expirydate){?>
	      <h6>Expired</h6>
	   <?php }else {?>
   <h6><b>Expires On</b> <?=date('d-m-Y',$pcrow->package_expirydate)?></h6>
   <?php }?>
   </div>
      <!-- Three types -->
      <section>
        <div class="container">
          <header class="section-header">
            <span>Plans</span>
            <h2><?php echo $pp_data->num_rows(); ?> types</h2>
          </header>


          <ul class="pricing">
          <?php
		  if($pp_data->num_rows()>0){
			  foreach($pp_data->result() as $pp_r){
		
		   ?>
            <li>
              <h6><?=$pp_r->pp_name?></h6>
              <div class="price">
                <sup><?=settings('settings_currency')?></sup><?=$pp_r->pp_price?>
                <span>&nbsp;</span>
              </div>
              <hr>
              <p><strong><?=$pp_r->pp_job_post_number?></strong> job posting</p>
              <p><strong><?=$pp_r->pp_featured_job_post_number?></strong> featured job</p>
              <p><strong><?=$pp_r->pp_days_listing_duration?> days</strong> listing duration</p>
              
                <?php if($pp_r->pp_show_contact==1){
				  $str='Yes';
				  }else{
					    $str='No';
					  }?>
               <p><strong><?=$str?></strong> Resume Search </p>
               <?php if($pp_r->pp_show_contact==1)
			   {
			   ?>
                <p><strong><?=$pp_r->pp_num_of_resume?></strong> Can Contact</p>
                <?php }?>
              <br>
              <?php if($pkg_id==$pp_r->pp_id){
				  ?><a class="btn btn-primary btn-block" href="javascript:;">Already Purchased</a>
                  
				  <?php  }else{?>
              <a class="btn btn-primary btn-block" href="<?=base_url()?>Package/upgrade_degrade/<?=$pp_r->pp_id?>">Select plan</a>
           <?php }?>
            </li>
<?php }} ?>
           
          </ul>

        </div>
      </section>
      <!-- END Three types -->


      <!-- Four types -->
      <!--<section class="bg-alt">
        <div class="container">
          <header class="section-header">
            <span>Plans</span>
            <h2>Four types</h2>
          </header>


          <ul class="pricing cols-4">
            <li>
              <h6>Basic Package</h6>
              <div class="price">
                <sup>$</sup>0
                <span>&nbsp;</span>
              </div>
              <hr>
              <p><strong>1</strong> job posting</p>
              <p><strong>No</strong> featured job</p>
              <p><strong>5 days</strong> listing duration</p>
              <br>
              <a class="btn btn-primary btn-block" href="#">Select plan</a>
            </li>

            <li>
              <h6>Medium Package</h6>
              <div class="price">
                <sup>$</sup>5<sup>.99</sup>
                <span>per month</span>
              </div>
              <hr>
              <p><strong>5</strong> job posting</p>
              <p><strong>1</strong> featured job</p>
              <p><strong>30 days</strong> listing duration</p>
              <br>
              <a class="btn btn-primary btn-block" href="#">Select plan</a>
            </li>

            <li>
              <h6>Big Package</h6>
              <div class="price">
                <sup>$</sup>15<sup>.99</sup>
                <span>per month</span>
              </div>
              <hr>
              <p><strong>20</strong> job posting</p>
              <p><strong>5</strong> featured job</p>
              <p><strong>75 days</strong> listing duration</p>
              <br>
              <a class="btn btn-primary btn-block" href="#">Select plan</a>
            </li>

            <li>
              <h6>Mega Package</h6>
              <div class="price">
                <sup>$</sup>24<sup>.99</sup>
                <span>per month</span>
              </div>
              <hr>
              <p><strong>80</strong> job posting</p>
              <p><strong>10</strong> featured job</p>
              <p><strong>120 days</strong> listing duration</p>
              <br>
              <a class="btn btn-primary btn-block" href="#">Select plan</a>
            </li>
          </ul>

        </div>
      </section>-->
      <!-- END Four types -->


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
