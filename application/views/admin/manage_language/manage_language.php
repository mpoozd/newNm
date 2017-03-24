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
                    
                    <span class="caption-subject font-dark bold uppercase">Manage Language</span>
                </div>
                
            </div>
            <div class="portlet-body">
               
                
                 <form role="form" method="post" class="form-horizontal" enctype="multipart/form-data" action="<?=base_url()?>admin/manage_language/update_language_file">
                    
                              
                                
                    
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="">File Data</label>
                        <div class="col-md-11">
                            <div class="input-icon right">
                              
                                <textarea rows="19" type="text" name="lang" class="form-control"><?=$data_file?></textarea>
                                     
                           </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn green" type="submit">Update Language</button>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>