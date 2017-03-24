<h3 class="page-title"> Edit Email <small> </small> </h3>

<?php $selected = "selected"; ?>

<div class="row">
<div class="col-md-12">

<form role="form" action="" enctype="multipart/form-data" method="post">
	<div class="form-body col-md-12">
		
    <div class="form-group col-md-12">
        <label>Subject</label>
        <input type="text" placeholder="" name="email_subject" value="<?php if($this->input->post('email_subject') != ""){ echo $this->input->post('email_subject'); } else { echo $email_info['email_subject']; } ?>" class="form-control <?php if(form_error('email_subject')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-12">
        <label>Email From Name</label>
        <input type="text" placeholder="" name="email_from_name" value="<?php if($this->input->post('email_from_name') != ""){ echo $this->input->post('email_from_name'); } else { echo $email_info['email_from_name']; } ?>" class="form-control <?php if(form_error('email_from_name')){?> error_border <?php } ?>"> 
    </div>
    
     <div class="form-group col-md-12">
        <label>From Email</label>
        <input type="text" placeholder="" name="from_email" value="<?php if($this->input->post('from_email') != ""){ echo $this->input->post('from_email'); } else { echo $email_info['from_email']; } ?>" class="form-control <?php if(form_error('from_email')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-12">
        <label>Email Content</label>
        <textarea rows="3" id="page_content" class="form-control <?php if(form_error('email_content')){?> error_border <?php } ?>" name="email_content"><?php if($this->input->post('email_content') != ""){ echo $this->input->post('email_content'); } else { echo $email_info['email_content']; } ?></textarea>
    </div>
    
   

	

    <div class="form-actions" style="text-align:center;">
        <button class="btn green" type="submit">Update</button>
    </div>	

	</div>


</form>







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