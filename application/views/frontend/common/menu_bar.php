<ul class="nav-menu">
          <li>
            <a <?php if(isset($home_bit)){?> class="active"<?php }?> href="<?=base_url()?>Home"><?=$this->lang->line('home_name')?></a>
            <ul>
              <li><a <?php if(isset($home_bit)){?> class="active"<?php }?> href="<?=base_url()?>Home"><?=$this->lang->line('home_name')?></a></li>
          
            </ul>
          </li>
          <li>

              <li><a <?php if(isset($search_job_bit)){ ?> class="active" <?php }?>  href="<?=base_url()?>Search_job"><?=$this->lang->line('search_name')?></a></li>
              
          </li>
           <?php if($this->session->userdata('jobseeker_login')!=''){?>
          <li>
          <!-- <ul> -->
          <li><a <?php  if(isset($reg_bitc)){ ?> class="active" <?php }?> href="<?=base_url()?>Sjob"><?=$this->lang->line('job_name')?></a></li>
             
             	<?php  	
				$jos_id = get_info('user_info','jos_id');
						  $sef_jos             = $this->General_model->get_field_value2(array('jos_id'=>$jos_id),'jos_sef','jobseekers');?>

             
<!--               <li><a <?php  if(isset($reg_bit_ass)){ ?> class="active" <?php }?> href="<?=base_url()?>Sprofile/own_detail/<?=$sef_jos?>"><?=$this->lang->line('own_profile')?></a></li>
 -->            <!-- </ul> -->
          </li>
          <?php }?>
          
          <?php if($this->session->userdata('company_login')!=''){?>
          <li>
              <li><a <?php if(isset($post_bitc)){ ?> class="active" <?php }?> href="<?=base_url()?>Job"><?=$this->lang->line('post_job')?></a></li>
             
			 <?php  	
		  	$com_id = get_info('company_info','com_id');
		  $yes_no             = $this->General_model->get_field_value2(array('com_id'=>$com_id),'resume_yes_no','companies');
if($yes_no==1){?>
              <a  <?php  if(isset($search_resume_bit)){ ?> class="active" <?php }?> href="<?=base_url()?>Search_resume"><?=$this->lang->line('browse_res')?></a>
              <?php }?>
			
			
              <li><a <?php if(isset($mng_bitc)){ ?> class="active" <?php }?> href="<?=base_url()?>Job/manage_jobs"><?=$this->lang->line('manage_job')?></a></li>
              <?php /*?> <li><a <?php if(isset($ja_bitc)){ ?> class="active" <?php }?> href="<?=base_url()?>Job_applications"><?=$this->lang->line('manage_job_app')?></a></li><?php */?>
               
                   <li><a <?php if(isset($res_bitc)){ ?> class="active" <?php }?> href="<?=base_url()?>Job/manage_resume"><?=$this->lang->line('manage_resume')?></a></li>

<!--  <li><a <?php if(isset($pack_bitc)){ ?> class="active" <?php }?> href="<?=base_url()?>Package"><?=$this->lang->line('pkg_pur')?></a></li> -->
            
          </li>
          <?php  }else{?>
			   <li>

              <li><a <?php if(isset($search_com_bit)){?> class="active"<?php }?> href="<?=base_url()?>Search_company"><?=$this->lang->line('bro_com')?></a></li>
              <li><a <?php if(isset($faq_bit)){?> class="active"<?php }?> href="<?=base_url()?>Faq"><?=$this->lang->line('footer_faq')?></a></li>
              <li><a <?php if(isset($contact_bit)){?> class="active"<?php }?> href="<?=base_url()?>Contact_us"><?=$this->lang->line('footer_contact_us')?></a></li>


          </li>
			 <?php  }?>
          <!-- <li>
            <a href="#"><?=$this->lang->line('page_name')?></a>
            <ul>
             
              <?php 
 $how_it_works              = $this->General_model->get_field_value2(array('page_id'=>2),'page_sef','pages');
  $about_us              = $this->General_model->get_field_value2(array('page_id'=>3),'page_sef','pages');
   $terms              = $this->General_model->get_field_value2(array('page_id'=>4),'page_sef','pages');
     $privacy              = $this->General_model->get_field_value2(array('page_id'=>5),'page_sef','pages');
 
 ?>
              <li><a <?php if(isset($about_bit)){?> class="active"<?php }?> href="<?=base_url()?>pages/<?=$about_us?>"><?=$this->lang->line('footer_about')?></a></li>
              <li><a <?php if(isset($howitworks_bit)){?> class="active"<?php }?> href="<?=base_url()?>pages/<?=$how_it_works?>"><?=$this->lang->line('footer_how_it_work')?></a></li>
              <li><a <?php if(isset($terms_bit)){?> class="active"<?php }?> href="<?=base_url()?>pages/<?=$terms?>"><?=$this->lang->line('footer_terms')?></a></li>
              <li><a <?php if(isset($privcy_bit)){?> class="active"<?php }?> href="<?=base_url()?>pages/<?=$privacy?>"><?=$this->lang->line('footer_privacy')?></a></li>
               <li><a <?php if(isset($faq_bit)){?> class="active"<?php }?> href="<?=base_url()?>Faq"><?=$this->lang->line('footer_faq')?></a></li>
              <li><a <?php if(isset($pricing_bit)){?> class="active"<?php }?> href="<?=base_url()?>Pricing"><?=$this->lang->line('pricing_name')?></a></li>
              <li><a <?php if(isset($contact_bit)){?> class="active"<?php }?> href="<?=base_url()?>Contact_us"><?=$this->lang->line('footer_contact_us')?></a></li>
            
            </ul>
          </li>
 -->        </ul>