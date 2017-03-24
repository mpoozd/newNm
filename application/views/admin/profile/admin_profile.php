


<h3 class="page-title">  <?php echo $table_title ?> <small>  </small> </h3>


<div class="row">
<div class="col-md-12">

<?php if(validation_errors() != false) {?>  
        <div class="alert alert-danger alert-dismissable">
       		<button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
           		<?php echo validation_errors(); ?>
        </div>
     <?php 
	 } ?>

<form role="form" action="" enctype="multipart/form-data" method="post">
	<div class="form-body">
    
    <div class="form-group col-md-12">
    
    <img id="" style="max-height:200px; max-width:200px;" />
                                
       

      <!--  ....................-->
        <div class="row">
                        <div class="col-md-12">
                        
                            <div class="profile-sidebar">
                               
                                <div class="portlet light profile-sidebar-portlet ">
                                   
                                    <div class="">
                                    <? if(is_file(PATH_DIR.'uploads/admin_avatar/'.get_admin_avatar($admin->admin_id))){ ?>
                                        <img width="150" height="150" id="uploadPreviewAdmin" alt="" class="" src="<?php echo base_url() ?>uploads/admin_avatar/<?php echo $admin->admin_avatar ?>"> </div>
                                         <? }else{ ?>
                   
                    <img width="150" height="150" alt="" class="img-responsive" src="<?php echo base_url() ?>uploads/admin_avatar/defaultimage.jpg"> </div>
                <? } ?>
                                  
                                </div>
                              
                            </div>
                            
                        </div>
                    </div>
        
       <!-- ........................-->
        <div class="form-group">
            <label for="exampleInputFile">Avatar</label>
            <input type="file" id="uploadImageAdmin" name="image" onchange="PreviewImageAdmin();">
            <p class="help-block" style="color:#FB0004;" id="upload_logo_error_admin"> </p>
        </div>
   </div> 
		
    <div class="form-group col-md-6">
        <label>Admin Name</label>
        <input type="text" placeholder="" name="admin_name" value="<?php if($this->input->post('admin_name') != ""){ echo $this->input->post('admin_name'); } else {echo $admin->admin_name;} ?>" class="form-control"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Admin Email</label>
        <input type="text" placeholder="" name="admin_email" value="<?php if($this->input->post('admin_email') != ""){ echo $this->input->post('admin_email'); } else {echo $admin->admin_email;} ?>" class="form-control"> 
    </div>

    
     
 <input type="hidden" value="<?php echo $admin->admin_email; ?>" name="db_email" />
	

    <div class="form-actions col-md-1" style="text-align:center;">
        <button class="btn green" type="submit">Update Profile</button>
    </div>	

	</div>


</form>

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
