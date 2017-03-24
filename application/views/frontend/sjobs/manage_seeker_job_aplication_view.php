<!-- Main container -->
    <main>
      <section class="no-padding-top bg-alt">
        <div class="container">
          <div class="row">

            <div class="col-xs-12 text-right">
              <br>
            </div>

<?php if($job_app->num_rows()>0){
	foreach($job_app->result() as $jrow){
		?>
		

            <!-- Job detail -->
            <div class="col-xs-12" id="job_row_<?=$jrow->jap_id?>">
              <div class="item-block">
                <header>
                
                  <div class="hgroup">
                    <h4><a href="<?=base_url()?>Job/job_detail/<?=$jrow->job_sef?>"><?=$jrow->job_title?></a></h4>
                    <h5><a  </a></h5>
                    <input type="hidden" id="job_title" value="<?=$jrow->job_title?>">
                    <input type="hidden" id="jos_id" value="<?=$jrow->jos_id?>">
                    
<input type="hidden" id=="jos_username" value="<?=$jrow->jos_username?>">                    
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
			     if($jrow->jap_status==0){
				
				?>
                
                  <p class="status"><strong>الحالة:</strong> <?php $status=job_status($jrow->job_id,'',$jrow->jap_accepted_date);
				  echo $status;
				  ?>  </p>
				  
						  <?php }else if($jrow->jap_status==-1) {?>
				      <p class="status" style="color:#99A5B4" ><strong> الحالة:  </strong><a class="btn btn-xs btn-danger" href="javascript:;"><?=$this->lang->line('rejted')?></a>
</p>
					  <?php }else{?>
					  <p class="status"><strong> الحالة:  </strong> </p>
						   <a class="btn btn-xs btn-gray" href="javascript:;"><?=$this->lang->line('assinged')?></a>
						  <?php }?>

                  <!-- <div class="action-btn">
                  <?php 
				  if($jrow->jap_status==0){
				  ?>
                  <div id="job_id_assign_<?=$jrow->jap_id?>">
                  
                  
                    <a class="btn btn-xs btn-danger" href="javascript:;" onClick="cancel_application(<?=$jrow->jap_id?>)"><?=$this->lang->line('cancel')?></a></div>
                  <?php }else if($jrow->jap_status==-1) {?>
					  <a class="btn btn-xs btn-gray" href="javascript:;"><?=$this->lang->line('rejted')?></a>
					  <?php }else{?>
						   <a class="btn btn-xs btn-gray" href="javascript:;"><?=$this->lang->line('assinged')?></a>
						  <?php }?>
                  </div>
 -->                </footer>
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
function cancel_application(jap_id){
	
	$.ajax({
	    url:'<?php echo base_url()?>Sjob/cancel_application/',
	    type:'POST',
	    data:{"jap_id":jap_id,"job_title":$('#job_title').val(),"jos_username":$('#jos_username').val(),'jos_id':$('#jos_id').val()},
	    success:function(result){
	        
			$("#job_row_"+jap_id).remove();
		
			toastr.success('<?=$this->lang->line('success')?>', '<?=$this->lang->line('removed')?>', {timeOut: 5000});
	    }

	});	
	}
	
	
</script>