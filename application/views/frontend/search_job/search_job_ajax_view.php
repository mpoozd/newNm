
<div class="col-xs-12">
              <br>
              <h5>   <strong><?=$jobs->num_rows()?></strong> نتائج</h5>
            </div>
  <?php 
			if($jobs->num_rows()>0){
				foreach($jobs->result() as $jrow){?>
				
			
            <div class="col-xs-12">
              <a class="item-block" href="<?=base_url()?>Job/job_detail/<?=$jrow->job_sef?>">
                <header>
                 <?php 
				if($jrow->com_logo!=''){
					
					?>
	<img src="<?=base_url()?>uploads/company_logo/<?=$jrow->com_logo?>" alt=""><?php }else{ ?>
				<img src="<?=base_url()?>assets/img/logo-google.jpg" alt=""><?php }?>
                  <div class="hgroup">
                  <h4><?=$jrow->job_title?></h4>
                    <h5><?=$jrow->com_name?></h5>
                  </div>
                  <div class="header-meta">
                      <span class="location"><?=get_city_name($jrow->job_location);?></span>
                    <span class="label <?=$jrow->jtype_label?>"><?=$jrow->jtype_name?></span>
                  </div>
                </header>
              </a>
            </div>
            <!-- END Job item -->

	<?php }
				}else
				
				{
					echo $this->lang->line('nothing_found');
					}
			
			?>