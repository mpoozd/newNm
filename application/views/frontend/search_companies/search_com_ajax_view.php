<div class="col-xs-12">
              <br>
              <h5>   <strong><?=$com->num_rows()?></strong> نتائج</h5>
            </div>    <!-- Company detail -->
             <?php 
			if($com->num_rows()>0){
				foreach($com->result() as $jrow){?>
				
            <div class="col-xs-12">
              <a class="item-block" href="<?=base_url()?>Job/company_detail/<?=$jrow->com_sef?>">
                <header>
                    <?php 
				if($jrow->com_logo!=''){
					
					?>
	<img src="<?=base_url()?>uploads/company_logo/<?=$jrow->com_logo?>" alt=""><?php }else{ ?>
				<img src="<?=base_url()?>assets/img/logo-google.jpg" alt=""><?php }?>
                  <div class="hgroup">
                    <h4><?=$jrow->com_name?></h4>
                    <h5><?=get_sep_name($jrow->com_headline)?></h5>
                  </div>
              <?php    $opn=$this->General_model->get_company_detail($jrow->com_sef);?>
                  <span class="open-position"><?=$opn->num_rows()?> الوظائف الشاغرة</span>
                </header>

                <div class="item-body">
                  <p><?=substr($jrow->short_description,0,200)?>.</p>
                </div>
              </a>
            </div>
            <!-- END Company detail -->

<?php }}else{
	echo $this->lang->line('nothing_found');
	}?>
            <!-- END Page navigation -->