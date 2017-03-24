<h3 class="page-title">  <?=$com_info['com_name']?> <small>  </small> </h3>

<?php $selected = "selected"; ?>

<div class="row">
<div class="col-md-12">

<form role="form" action="" enctype="multipart/form-data" method="post">
	<div class="form-body">
    
    <div class="form-group col-md-12">
    
    <img id="uploadPreviewAdmin" src="<?=base_url()?>uploads/company_logo/<?=$com_info['com_logo']?>" style="max-height:200px; max-width:200px;" />
                                
        <div class="form-group">
            <label for="exampleInputFile">Company Logo</label>
            <input type="file" id="uploadImageAdmin" name="image" onchange="PreviewImageAdmin();">
            <p class="help-block" style="color:#FB0004;" id="upload_logo_error_admin"> </p>
        </div>
   </div> 
		
    <div class="form-group col-md-6">
        <label>Company Username</label>
        <input type="text" placeholder="" name="com_user_name" value="<?php if($this->input->post('com_user_name') != ""){ echo $this->input->post('com_user_name'); } else { echo $com_info['com_user_fullname']; } ?>" class="form-control <?php if(form_error('com_user_name')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Company User Email</label>
        <input type="text" placeholder=""  name="com_user_email" value="<?php if($this->input->post('com_user_email') != ""){ echo $this->input->post('com_user_email'); }  else { echo $com_info['com_user_email']; } ?>" class="form-control <?php if(form_error('com_user_email')){?> error_border <?php } ?>"> 
    </div>


	<div class="form-group col-md-6">
        <label>Company User Password</label>
        <input type="text" name="com_user_pwd" placeholder="" value="<?php if($this->input->post('com_user_pwd') != ""){ echo $this->input->post('com_user_pwd'); } ?>" class="form-control <?php if(form_error('com_user_pwd')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Company Name</label>
        <input type="text" name="com_name" value="<?php if($this->input->post('com_name') != ""){ echo $this->input->post('com_name'); } else { echo $com_info['com_name']; } ?>" placeholder="" class="form-control <?php if(form_error('com_name')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Company Phone</label>
        <input type="text" name="com_phone" placeholder="" value="<?php if($this->input->post('com_phone') != ""){ echo $this->input->post('com_phone'); } else { echo $com_info['com_phone_number']; }  ?>" class="form-control <?php if(form_error('com_phone')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Company Email</label>
        <input type="text" name="com_email" placeholder="" value="<?php if($this->input->post('com_email') != ""){ echo $this->input->post('com_email'); } else { echo $com_info['com_email']; } ?>" class="form-control <?php if(form_error('com_email')){?> error_border <?php } ?>"> 
    </div>
    
    <input type="hidden" name="com_email_old" value="<?=$com_info['com_email']?>" />
    
    
     <div class="form-group col-md-6">
        <label>Company Website</label>
        <input type="text" name="com_website" placeholder="" value="<?php if($this->input->post('com_website') != ""){ echo $this->input->post('com_website'); }  else { echo $com_info['com_website']; }?>" class="form-control <?php if(form_error('com_website')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Package</label>
        <select class="form-control" name="package">
        	<?php
            	if($pricing_plan->num_rows() > 0){
					foreach($pricing_plan->result_array() as $pp_row){
			?>
            <option value="<?=$pp_row['pp_id']?>" <?php if($this->input->post('package') == $pp_row['pp_id']){ echo $selected; }  else if($com_info['price_package_id'] == $pp_row['pp_id']) { echo $selected; }   ?>>  <?=$pp_row['pp_name']?> </option>
            <?php } } ?>
        </select>
    </div>
    

    
     <div class="form-group col-md-12">
        <label>Short Description</label>
        <textarea rows="3" class="form-control <?php if(form_error('description')){?> error_border <?php } ?>" name="description"><?php if($this->input->post('description') != ""){ echo $this->input->post('description'); } else { echo $com_info['short_description']; } ?></textarea>
    </div>

	

    <div class="form-actions" style="text-align:center;">
        <button class="btn green" type="submit">Update Company</button>
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
