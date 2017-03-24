<div class="row ">
    <div class="col-md-12">
    
    <?php if(validation_errors() != false) {?>  
        <div class="alert alert-danger alert-dismissable">
       		<button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
           		<?php echo validation_errors(); ?>
        </div>
     <?php 
	 } ?>
     
    
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    
                    <span class="caption-subject font-dark bold uppercase"><?php echo $table_title; ?></span>
                </div>
                
            </div>
            <div class="portlet-body">
               
                
                <form role="form" class="form-horizontal" method="post" action="">
                
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Name</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="page_name" value="<?php if($this->input->post("page_name") != ""){ echo $this->input->post("page_name"); } else { echo $page->page_name; } ?>" placeholder="" class="form-control">
                                <input type="hidden" name="page_id" value="<?php echo $page->page_id ?>"></input> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Meta Title</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="page_meta_title" value="<?php if($this->input->post("page_meta_title") != ""){ echo $this->input->post("page_meta_title"); } else { echo $page->page_meta_title; } ?>" placeholder="" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Meta Keyword</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="page_meta_keywords" value="<?php if($this->input->post("page_meta_keywords") != ""){ echo $this->input->post("page_meta_keywords"); } else { echo $page->page_meta_keywords; } ?>" placeholder="" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Meta Description</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="page_meta_desc" value="<?php if($this->input->post("page_meta_desc") != ""){ echo $this->input->post("page_meta_desc"); } else { echo $page->page_meta_desc; } ?>" placeholder="" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Page Content</label>
                        <div class="col-md-6">
                            <textarea id="page_content" name="page_content" placeholder="" rows="3" class="form-control"><?php if($this->input->post("page_content") != ""){ echo $this->input->post("page_content"); } else { echo $page->page_content; } ?></textarea>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn green" type="submit">Update</button>
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