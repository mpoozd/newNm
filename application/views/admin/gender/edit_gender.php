<h3 class="page-title">Update Gender<small>  </small> </h3>

<?php $selected = "selected"; ?>

<div class="row">
<div class="col-md-12">

<form role="form" action="" method="post">
	<div class="form-body">
    
     
		
    <div class="form-group col-md-6">
        <label>Name</label>
        <input type="text" placeholder="Gender Name" name="gender_name" value="<?php if($this->input->post('gender_name') != ""){ echo $this->input->post('gender_name'); } else { echo $gender['gender_name']; } ?>" class="form-control <?php if(form_error('gender_name')){?> error_border <?php } ?>"> 
    </div>
    
    

    <div class="form-actions col-md-12" style="text-align:center;">
        <button class="btn green" type="submit">Update Gender</button>
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