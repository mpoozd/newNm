<section>
        <div class="container">

          <div class="col-sm-12 col-md-12">
            <header class="section-header text-left">
              <span><?=$this->lang->line('footer_how_it_work_flow')?></span>
              <h2><?=$this->lang->line('footer_how_it_work')?></h2>
            </header>
<?php  
$how_it_works_content              = $this->General_model->select_where('page_content,page_sef','pages',array('page_id'=>2));
$r=$how_it_works_content->row();
?>
            <p style="text-align:center;" class="lead"><?php $wor=substr($r->page_content,0,400);
			echo $wor;
			 ?></p>
            
<!--             <a class="btn btn-primary" href="<?=base_url()?>pages/<?=$r->page_sef?>">Learn more</a> -->
 </div>

          <!--<div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
            <br>
            <img class="center-block" src="<?base_url()?>assets/img/how-it-works.png" alt="how it works">
          </div>-->

        </div>
      </section>