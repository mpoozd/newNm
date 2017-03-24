<main>
      <section class="no-padding-top bg-alt">
        <div class="container">
          <div class="row item-blocks-condensed">

            <div class="col-xs-12">
              <br>
            <!--  <h5>   <strong>357</strong> matches, you're watching <i>10</i> to <i>20</i></h5>-->
            </div>

          <?php if($brow_data->num_rows()>0){
	foreach($brow_data->result() as $jrow){
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
                    <span class="location"><?=$jrow->job_location?></span>
                    <span class="label <?=$jrow->jtype_label?>"><?=$jrow->jtype_name?></span>
                  </div>
                </header>
              </a>
            </div>
            <!-- END Job item -->

<?php }}?>
            <!-- END Job item -->


           
          <!-- Page navigation -->
          <nav class="text-center">
            <ul class="pagination">
            <?php echo $this->pagination->create_links(); ?>
              <!--<li>
                <a aria-label="Previous" href="#">
                  <i class="ti-angle-right"></i>
                </a>
              </li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li>
                <a aria-label="Next" href="#">
                  <i class="ti-angle-left"></i>
                </a>
              </li>-->
            </ul>
          </nav>
          <!-- END Page navigation -->


        </div>
      </section>
    </main>