<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
<footer class="site-footer">
 <?php $about_footer             = $this->General_model->get_field_value2(array('page_id'=>1),'page_content','pages');
 $how_it_works              = $this->General_model->get_field_value2(array('page_id'=>2),'page_sef','pages');
  $about_us              = $this->General_model->get_field_value2(array('page_id'=>3),'page_sef','pages');
   $terms              = $this->General_model->get_field_value2(array('page_id'=>4),'page_sef','pages');
     $privacy              = $this->General_model->get_field_value2(array('page_id'=>5),'page_sef','pages');
 
 ?>
      <!-- Top section -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6><?=$this->lang->line('footer_about')?></h6>
            <p class="text-justify"><?=strip_tags($about_footer)?>.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6><?=$this->lang->line('footer_company')?></h6>
            
            
            <ul class="footer-links">
              <li><a href="<?=base_url()?>pages/<?=$about_us?>"><?=$this->lang->line('footer_about_us')?></a></li>
              <li><a href="<?=base_url()?>pages/<?=$how_it_works?>"><?=$this->lang->line('footer_how_it_work')?></a></li>
              <li><a href="<?=base_url()?>pages/<?=$terms?>"><?=$this->lang->line('footer_terms')?></a></li>
<!--               <li><a href="<?=base_url()?>pages/<?=$privacy?>"><?=$this->lang->line('footer_privacy')?></a></li> -->
               <li><a href="<?=base_url()?>Faq"><?=$this->lang->line('footer_faq')?></a></li>
              <li><a href="<?=base_url()?>Contact_us"><?=$this->lang->line('footer_contact_us')?></a></li>
            </ul>
          </div>
 <?php $cats  =  $this->General_model->select_where('cat_name,cat_sef,cat_desc','categories',array('status_id'=>1));
   $catsres = $cats->result_array();
 ?>
          <div class="col-xs-6 col-md-3">
            <h6><?=$this->lang->line('footer_trending_jobs')?></h6>
            <ul class="footer-links">
            <?php foreach($catsres as $catsres): ?>
              <li><a href="javascript:;"><?=$catsres['cat_name']?></a></li>
             <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <hr>
      </div>
      <!-- END Top section -->

      <!-- Bottom section -->
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text"><?=settings('settings_copy_rights_text')?>.</p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="<?=settings('settings_fb_link')?>"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="<?=settings('settings_twitter_link')?>"><i class="fa fa-twitter"></i></a></li>
<!-- 
              <li><a class="dribbble" href="<?=settings('settings_fb_link')?>"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="<?=settings('settings_linkedin_link')?>"><i class="fa fa-linkedin"></i></a></li> -->
			  
              <li><a class="instagram" href="<?=settings('settings_insta_link')?>"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- END Bottom section -->

    </footer>