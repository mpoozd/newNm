<!-- Main container -->
<?php if($this->session->flashdata('msg')!=''){?>
  <div id="success_sub_msg" role="alert" class="alert alert-success"><strong><?=$this->lang->line('well_down')?></strong> <?=$this->session->flashdata('msg');?></div>
  <?php }?>
    <main>
      <section class="no-padding-top bg-alt">
        <div class="container">
          <div class="row">

            <div class="col-xs-12 text-right">
              <br>
              <a class="btn btn-primary btn-sm" href="<?=base_url()?>Job"><?=$this->lang->line('add_new_job')?></a>
            </div>

<?php if($jobs_data->num_rows()>0){
	foreach($jobs_data->result() as $jrow){
		?>
		

            <!-- Job detail -->
            <div class="col-xs-12" id="job_row_<?=$jrow->job_id?>">
              <div class="item-block">
                <header>
                <?php 
				if($jrow->com_logo!=''){
					
					?>
	 <a href="<?=base_url()?>Job/company_detail/<?=$jrow->com_sef?>"><img src="<?=base_url()?>uploads/company_logo/<?=$jrow->com_logo?>" alt=""></a><?php }else{ ?>
				<a href="<?=base_url()?>Job/company_detail/<?=$jrow->com_sef?>"><img src="<?=base_url()?>assets/img/logo-google.jpg" alt=""></a><?php }
				?>
                  <div class="hgroup">
                    <h4><a href="<?=base_url()?>Job/job_detail/<?=$jrow->job_sef?>"><?=$jrow->job_title?></a></h4>
                    <h5><a href="<?=base_url()?>Job/company_detail/<?=$jrow->com_sef?>"><?=$jrow->com_name?></a></h5>
                    
                  </div>
                  <div class="header-meta">
                    <span class="location"><?=get_city_name($jrow->job_location);?></span>
                    <time datetime="">   <?php 
			

posted_date_ago($jrow->dateadded);
?></time>
                 
                  </div>
                </header>

                <footer>
                <?php 
				
				
				?>
                
                  <p class="status"><strong><?=$this->lang->line('status')?>:</strong> <?php $status=job_status($jrow->job_id,'manage');
				  echo $status;
				  ?></p>

                  <div class="action-btn">
                  <?php 
				  //if($jrow->job_status==1){
				  ?>
<!--                     <a class="btn btn-xs btn-gray" id="my_edit_<?=$jrow->job_id?>" href="<?=base_url()?>Job/edit/<?=$jrow->job_sef?>"><?=$this->lang->line('edit')?></a> -->
 <a class="btn btn-xs btn-gray" id="my_list_<?=$jrow->job_id?>" href="<?=base_url()?>Job_applications/applicants/<?=$jrow->job_sef?>"><?=$this->lang->line('list')?></a>
                  
<!--                     <a class="btn btn-xs btn-danger" href="javascript:;" id="my_del_<?=$jrow->job_id?>" onClick="delete_job(<?=$jrow->job_id?>)"><?=$this->lang->line('del')?></a> -->
 <?php //}else if($jrow->job_status==2){?>
					                    <!-- <a class="btn btn-xs btn-gray" href="<?=base_url()?>Job_applications/applicants/<?=$jrow->job_sef?>"><?=$this->lang->line('list')?></a>-->

					  <?php ///}?>
                  </div>
                </footer>
              </div>
            </div>
            <?php }
	}?>
            <!-- END Job detail -->


          
          </div>
        </div>
      </section>
    </main>
    <!-- END Main container -->
<script type="text/javascript">
function delete_job(job_id){
	
	$.ajax({
	    url:'<?php echo base_url()?>Job/delete_job/',
	    type:'POST',
	    data:{"job_id":job_id},
	    success:function(result){
	        
			
			//	$("#job_row_"+job_id).remove();
				
			$("#my_edit_"+job_id).remove();
			$("#my_list_"+job_id).remove();
			$("#my_del_"+job_id).removeAttr('onclick');
$("#my_del_"+job_id).html('Deleted');
			toastr.success('<?=$this->lang->line('success')?>', '<?=$this->lang->line('removed')?>', {timeOut: 5000});
	    }

	});	
	}
</script>