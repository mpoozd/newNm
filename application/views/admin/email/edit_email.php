<?php $selected = "selected"; ?>

<div class="row">
<div class="col-md-12">


<div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    
                    <span class="caption-subject font-dark bold uppercase"><?php echo $table_title ?></span>
                </div>
                
            </div>
            <div class="portlet-body">
               
                
                <form role="form" class="form-horizontal" method="post" action="">
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Subject</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="email_subject" value="<?php if($this->input->post('email_subject') != ""){ echo $this->input->post('email_subject'); } else { echo $email_info['email_subject']; } ?>" class="form-control <?php if(form_error('email_subject')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Email From Name</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" placeholder="" name="email_from_name" value="<?php if($this->input->post('email_from_name') != ""){ echo $this->input->post('email_from_name'); } else { echo $email_info['email_from_name']; } ?>" class="form-control <?php if(form_error('email_from_name')){?> error_border <?php } ?>">  </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">From Email</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
<input type="text" placeholder="" name="from_email" value="<?php if($this->input->post('from_email') != ""){ echo $this->input->post('from_email'); } else { echo $email_info['from_email']; } ?>" class="form-control <?php if(form_error('from_email')){?> error_border <?php } ?>">  </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Email Content</label>
                        <div class="col-md-10">
                            <div class="input-icon right">
                                
                                <textarea rows="3" id="page_content" class="form-control <?php if(form_error('email_content')){?> error_border <?php } ?>" name="email_content"><?php if($this->input->post('email_content') != ""){ echo $this->input->post('email_content'); } else { echo $email_info['email_content']; } ?></textarea> </div>
                           
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