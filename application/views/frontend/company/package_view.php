   <!-- Three types -->
   <header class="page-header bg-img" style="background-image: url(<?=base_url()?>assets/img/bg-banner1.jpg);">
      <div class="container page-name">
        <h1 class="text-center"><?=$this->lang->line('pkg')?></h1>
        <p class="lead text-center"><?=$this->lang->line('below_pkg')?></p>
      </div>

      

    </header>
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
   <main>
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
</main>