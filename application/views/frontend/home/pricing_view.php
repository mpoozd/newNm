<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
   <!-- Three types -->
      <section>
        <div class="container">
          <header class="section-header">
            <span><?=$this->lang->line('plan_txt')?></span>
            <h2><?php echo $pp_data->num_rows(); ?> <?=$this->lang->line('plan_txt_type')?></h2>
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
              <a class="btn btn-primary btn-block" href="#"><?=$this->lang->line('select_plan')?></a>
            </li>
<?php }} ?>
           
          </ul>

        </div>
      </section>
      <!-- END Three types -->
