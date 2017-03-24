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
               
                
            <form role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        
                         <!--  ....................-->
                <div class="row">
                    <div class="col-md-12">
                    
                        <div class="profile-sidebar">
                           
                            <div class="portlet light profile-sidebar-portlet ">
                               
                                <label class="col-md-6 control-label" for=""></label>
                                <div class="col-md-5">
                                <? if(is_file(PATH_DIR.'uploads/admin_avatar/'.get_admin_avatar($admin->admin_id))){ ?>
                                
                                    <img width="150" height="150" id="uploadPreviewAdmin" alt="" class="" src="<?php echo base_url() ?>uploads/admin_avatar/<?php echo $admin->admin_avatar; ?>"> 
                                    
               
                <? } else { ?>
                
                 <img width="150" height="150" id="uploadPreviewAdmin" alt="" class="" />  
                
                <?php } ?>
                
                <input type="hidden" value="<?php echo $admin->admin_avatar; ?>" name="image_old" />
                
                
                            </div>  
                            </div>
                          
                        </div>
                        
                    </div>
                </div>
                <br>
            
           <!-- ........................-->
                    
                    <div class="form-group">
                       <label class="col-md-2 control-label" for="">Avatar</label>
                       <div class="col-md-6">
                            <div class="input-icon right">
                        <input type="file" id="uploadImageAdmin" name="image" onchange="PreviewImageAdmin();">
                        <p class="help-block" style="color:#FB0004;" id="upload_logo_error_admin"> </p>
                        
                        </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Name</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="admin_name" value="<?php if($this->input->post("admin_name") != ""){ echo $this->input->post("admin_name"); } else {echo $admin->admin_name;} ?>" placeholder="Name" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Email</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="admin_email" value="<?php if($this->input->post("admin_email") != ""){ echo $this->input->post("admin_email"); } else {echo $admin->admin_email;} ?>" placeholder="Email" class="form-control"> </div>
                           
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $admin->admin_email; ?>" name="db_email" />
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn green" type="submit">Update Profile</button>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>


<script>

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

</script>
