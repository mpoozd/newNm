<main>
      <section class="no-padding-top bg-alt">
        <div class="container">
        <?php 
		$count=0;
		$count_in=0;
		if($res_data->num_rows()>0){
			foreach($res_data->result() as $ro){
				
				if($count==0){
				?>
				
        
          <div class="row">

            <!-- Resume detail -->
            <div class="col-xs-12">
           <!--  <a class="btn btn-xs btn-danger" href="javascript:;" onClick="delete_job()">Delete</a>-->
              <a href="<?=base_url()?>Sprofile/detail/<?=$ro->jos_sef?>" class="item-block">
                <header>
                
                <?php 
				if($ro->image!=''){
					
					?>
	
	 <img class="resume-avatar"  src="<?=base_url()?>uploads/jobseekers/<?=$ro->image?>" alt="">
	 <?php }else{ ?>
       <img class="resume-avatar" src="<?=base_url()?>assets/img/avatar.jpg" alt="">
				<?php } ?>
                  
                  <div class="hgroup">
                      <h4><?=$ro->jos_username?></h4>
                      <h5><?=get_sep_name($ro->jos_headline)?></h5>
                  </div>
                </header>

                <div class="item-body">
                <p><?=substr($ro->about_uerself,0,50)?>...</p>

                  <!--<div class="tag-list">
                    <span>HTML5</span>
                    <span>CSS3</span>
                    <span>Bootstrap</span>
                    <span>Wordpress</span>
                  </div>-->
                </div>

                <footer>
                  <ul class="details cols-3">
                    <li>
                      <i class="fa fa-map-marker"></i>
                      <span><?=get_city_name($ro->location)?></span>
                    </li>

                    <li>
                      <i class="fa fa-university"></i>
                      <span><?=$ro->univ_name?></span>
                    </li>

                  </ul>
                </footer>
              </a>
              
                 
                   
             
            </div>
            <!-- END Resume detail -->
          </div>
          <?php $count++;  }else{ ?>

			<?php if($count_in==0){?>

          <div class="row"><?php }?>
            <!-- Resume detail -->
            <div class="col-sm-12 col-md-6">
               <a href="<?=base_url()?>Sprofile/detail/<?=$ro->jos_sef?>" class="item-block">
                <header>
                 <?php 
				if($ro->image!=''){
					
					?>
	
	 <img class="resume-avatar"  src="<?=base_url()?>uploads/jobseekers/<?=$ro->image?>" alt="">
	 <?php }else{ ?>
       <img class="resume-avatar" src="<?=base_url()?>assets/img/avatar.jpg" alt="">
				<?php } ?>
                  
                  <div class="hgroup">
                      <h4><?=$ro->jos_username?></h4>
                    <h5><?=$ro->jos_headline?></h5>
                  </div>
                </header>

                <div class="item-body">
                  <p><?=substr($ro->about_uerself,0,50)?>...</p>

                  <!--<div class="tag-list">
                    <span>J2EE</span>
                    <span>J2SE</span>
                    <span>Android</span>
                  </div>-->
                </div>

                <footer>
                  <ul class="details cols-2">
                    <li>
                      <i class="fa fa-map-marker"></i>
                      <span><?=$ro->location?></span>
                    </li>

                    <li>
                      <i class="fa fa-university"></i>
                      <span><?=$ro->univ_name?></span>
                    </li>
                  </ul>
                </footer>
              </a>
              <!--<div class="action-btn">
                 
                    <a class="btn btn-xs btn-danger" href="javascript:;" onClick="delete_job()">Delete</a>
                 
                  </div>-->
            </div>
            <!-- END Resume detail -->


            <!-- Resume detail -->
            <?php $count_in++;?>
            <!-- END Resume detail -->
          <?php 
		  if($count_in==2){
		  ?>  
          </div>
<?php }?>
          <?php }
			}}
		?>


          <!-- Page navigation -->
          <!--<nav class="text-center">
            <ul class="pagination">
              <li>
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
              </li>
            </ul>
          </nav>-->
          <!-- END Page navigation -->


        </div>
      </section>
    </main>