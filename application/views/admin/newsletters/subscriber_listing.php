<div class="row ">
    <div class="col-md-12">
    
    <?php if(validation_errors() != false) {?>  
        <div class="alert alert-danger alert-dismissable">
       		<button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
           		<?php echo validation_errors(); ?>
        </div>
     <?php 
	 } ?>
     
     <?php if($this->session->flashdata('success_msg') != "") {?>  
   	 	<div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('success_msg'); ?>
    	</div>
	<?php 
    	$this->session->set_flashdata('success_msg', "");
     } ?>
    
    
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    
                    <span class="caption-subject font-dark bold uppercase"><?php echo $table_title ?></span>
                </div>
                
            </div>
            <div class="portlet-body">
               
               
              
            <div>
                <input type="checkbox" checked  id="checkAll">
                <label>Check all</label>
            </div>
       
                <form role="form" class="form-horizontal" method="post" action="<?=base_url()?>admin/newsletters/send_newsletter">
                    
                   	<?php foreach ($subscribers as $subscriber) { ?>
                    <div class="portlet light col-md-4" style="background:#F1F1F1;" >
                                   
                                    <div>
                                        
                                        <div class="margin-top-20 profile-desc-link">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" checked name="sub_id[]" value="<?=$subscriber['sub_email']?>">
                                        <span></span>
                                        </label>
                                        <?php echo $subscriber['sub_email']; ?>
                                        </div>
                                        
                                    </div>
                                    <input type="hidden" value="<?=$newsletter_id?>" name="nl_id" />
                                </div>
                    <?php } ?>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn green" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>

 <script>
        
		$("#checkAll").change(function () {
		if($(this).prop("checked")){	
    		$("input:checkbox").prop('checked', true);
		}else{
			$("input:checkbox").prop('checked', false);
		}
		});
        </script>