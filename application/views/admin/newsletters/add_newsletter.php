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
               
                
                <form role="form" class="form-horizontal" method="post" action="">
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Title</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="nl_title" value="<?php if($this->input->post("nl_title") != ""){ echo $this->input->post("nl_title"); } ?>" placeholder="Title" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    
                    
                    
                    
                   <div class="form-group">
                                                <label class="col-md-2 control-label">Body</label>
                                                <div class="col-md-6">
                                                    <textarea name="nl_body" rows="3" class="form-control" id="page_content"><?php if($this->input->post("nl_body") != ""){ echo $this->input->post("nl_body"); } ?></textarea>
                                                </div>
                                            </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Month</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="nl_month" value="<?php if($this->input->post("nl_month") != ""){ echo $this->input->post("nl_month"); } ?>" placeholder="Month" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                                        
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Email</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="nl_email" value="<?php if($this->input->post("nl_email") != ""){ echo $this->input->post("nl_email"); } ?>" placeholder="Email" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    
                    
                    
                    
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

 <script type="text/javascript">
	   
	   				CKEDITOR.replace( 'page_content', 
				{				
filebrowserBrowseUrl :      '<?=base_url()?>ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?Type=Images',
filebrowserFlashBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?Type=Flash',
filebrowserUploadUrl :      '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});

	   
	   </script> 