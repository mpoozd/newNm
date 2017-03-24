<div class="row">
            <div class="col-lg-12">
            
       <?php if($this->session->flashdata('success_msg') != ""){?>
    <div class="alert alert-block alert-success fade in">
    	<button data-dismiss="alert" class="close" type="button"></button>
    		<h4 class="alert-heading">Success!</h4>
    		<p> <?php echo $this->session->flashdata('success_msg'); $this->session->set_flashdata('success_msg', "");?> </p>
    </div>
	<?php } ?>
            
                    <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    
                    <span class="caption-subject font-dark bold uppercase"><?php echo $table_title ?></span>
                </div>
                
            </div>
            <div class="portlet-body">
               
                
                <form role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    
                     
                    
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> </label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                              <img id="uploadPreview" src="<?=base_url()?>uploads/logo/<?=$setting['settings_logo']?>" style="max-height:200px; max-width:200px;" /> </div>
                           
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Site Logo</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                              <input type="file" id="uploadImage" name="image" onchange="PreviewImage();">
                                    <p class="help-block" style="color:#FB0004;" id="upload_logo_error"> </p> </div>
                           
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Site Name</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="site_name" value="<?php if($this->input->post('site_name') != ""){ echo $this->input->post('site_name'); } else { echo $setting['settings_site_name']; } ?>" class="form-control <?php if(form_error('site_name')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Meta Title</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="meta_title" value="<?php if($this->input->post('meta_title') != ""){ echo $this->input->post('meta_title'); } else { echo $setting['settings_site_meta_title']; } ?>" class="form-control <?php if(form_error('meta_title')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Meta Keyword</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="meta_keyword" value="<?php if($this->input->post('meta_keyword') != ""){ echo $this->input->post('meta_keyword'); } else { echo $setting['settings_meta_keywords']; } ?>" class="form-control <?php if(form_error('meta_keyword')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Meta Description</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="meta_desc" value="<?php if($this->input->post('meta_desc') != ""){ echo $this->input->post('meta_desc'); } else { echo $setting['settings_meta_desc']; } ?>" class="form-control <?php if(form_error('meta_desc')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Site Email</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="site_email" value="<?php if($this->input->post('site_email') != ""){ echo $this->input->post('site_email'); } else { echo $setting['settings_site_email']; } ?>" class="form-control <?php if(form_error('site_email')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Site Currency</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="site_currency" value="<?php if($this->input->post('site_currency') != ""){ echo $this->input->post('site_currency'); } else { echo $setting['settings_currency']; } ?>" class="form-control <?php if(form_error('site_currency')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Copy Rights</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="copy_rights" value="<?php if($this->input->post('copy_rights') != ""){ echo $this->input->post('copy_rights'); } else { echo $setting['settings_copy_rights_text']; } ?>" class="form-control <?php if(form_error('copy_rights')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Instagram Dribble</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="insta_dribble" value="<?php if($this->input->post('insta_dribble') != ""){ echo $this->input->post('insta_dribble'); } else { echo $setting['settings_insta_dribble']; } ?>" class="form-control <?php if(form_error('insta_dribble')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Facebook Link</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="fb_link" value="<?php if($this->input->post('fb_link') != ""){ echo $this->input->post('fb_link'); } else { echo $setting['settings_fb_link']; } ?>" class="form-control <?php if(form_error('fb_link')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Twitter Link</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="twitter_link" value="<?php if($this->input->post('twitter_link') != ""){ echo $this->input->post('twitter_link'); } else { echo $setting['settings_twitter_link']; } ?>" class="form-control <?php if(form_error('twitter_link')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Instagram Link</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="instagram_link" value="<?php if($this->input->post('instagram_link') != ""){ echo $this->input->post('instagram_link'); } else { echo $setting['settings_insta_link']; } ?>" class="form-control <?php if(form_error('instagram_link')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> Gmail Link</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="gmail_link" value="<?php if($this->input->post('gmail_link') != ""){ echo $this->input->post('gmail_link'); } else { echo $setting['settings_gmail_link']; } ?>" class="form-control <?php if(form_error('gmail_link')){?> error_border <?php } ?>"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for=""> LinkedIn Link</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                               <input type="text" placeholder="" name="linkedin_link" value="<?php if($this->input->post('linkedin_link') != ""){ echo $this->input->post('linkedin_link'); } else { echo $setting['settings_linkedin_link']; } ?>" class="form-control <?php if(form_error('linkedin_link')){?> error_border <?php } ?>"> </div>
                           
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

  function PreviewImage() {
		
		var ext = $('#uploadImage').val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
				$('#uploadImage').val('');
				$('#upload_logo_error').html('gif , png , jpg , jpeg are allowed.');
			} else {
				
				$('#upload_logo_error').html('');
				 
				var oFReader = new FileReader();
        		oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        		oFReader.onload = function (oFREvent) {
            	document.getElementById("uploadPreview").src = oFREvent.target.result;
        		};
			}
    };
	
	
	  function PreviewImageAdmin() {
		
		var ext = $('#uploadImageAdmin').val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
				$('#uploadImageAdmin').val('');
				$('#upload_logo_error_admin').html('gif , png , jpg , jpeg are allowed.');
			} else {
				
				$('#upload_logo_error_admin').html('');
				 
				var oFReader = new FileReader();
        		oFReader.readAsDataURL(document.getElementById("uploadImageAdmin").files[0]);

        		oFReader.onload = function (oFREvent) {
            	document.getElementById("uploadPreviewAdmin").src = oFREvent.target.result;
        		};
			}
    };
	
	  function PreviewImageAd() {
		
		var ext = $('#uploadImageAd').val().split('.').pop().toLowerCase();
			if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
				$('#uploadImageAd').val('');
				$('#upload_logo_error_admin').html('gif , png , jpg , jpeg are allowed.');
			} else {
				
				$('#upload_logo_error_ad').html('');
				 
				var oFReader = new FileReader();
        		oFReader.readAsDataURL(document.getElementById("uploadImageAd").files[0]);

        		oFReader.onload = function (oFREvent) {
            	document.getElementById("uploadPreviewAd").src = oFREvent.target.result;
        		};
			}
    };

	   
	   </script> 

