<h3 class="page-title">Update Faq Type<small>  </small> </h3>

<div class="row">
<div class="col-md-12">

<form role="form" action="" enctype="multipart/form-data" method="post">
	<div class="form-body">
		
    <div class="form-group col-md-6">
        <label>Name</label>
        <input type="text" placeholder="" name="ftype_name" value="<?php if($this->input->post('ftype_name') != ""){ echo $this->input->post('ftype_name'); } else { echo $faq_type_info['ftype_name']; } ?>" class="form-control <?php if(form_error('ftype_name')){?> error_border <?php } ?>"> 
    </div>

    <div class="form-actions col-md-12" style="text-align:center;">
        <button class="btn green" type="submit">Update Faq Type</button>
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
