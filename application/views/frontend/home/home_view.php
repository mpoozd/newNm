<div class="container">
<a href="#" class="success_sub"></a>
<div style="display:none;" id="success_sub_msg" role="alert" class="alert alert-success"><?=$this->lang->line('sub_success_msg')?></div>
          <header class="section-header">
            <span id="serch_span"><?=$this->lang->line('latest')?></span>
            <h2 id="serch_head"><?=$this->lang->line('feature')?></h2>
          </header>

          <div class="row item-blocks-connected" id="list_job">
<?php if($recent_jobs->num_rows()>0){
	foreach($recent_jobs->result() as $jrow){
		?>
            <!-- Job item -->
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

<?php }}?>
          
          </div>

          <br><br>
         <?php if($recent_jobs->num_rows()>0){?>
          <p id="browse_btn" class="text-center"><a class="btn btn-info test" href="<?=base_url()?>Search_job"><?=$this->lang->line('browse_all')?></a></p>
        <?php } ?>
		</div>