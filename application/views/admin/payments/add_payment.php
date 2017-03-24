<h3 class="page-title">  Add Payment Plan <small>  </small> </h3>

<?php $selected = "selected"; ?>

<div class="row">
<div class="col-md-12">

<form role="form" action="" enctype="multipart/form-data" method="post">
	<div class="form-body">
    
     
		
    <div class="form-group col-md-6">
        <label>Name</label>
        <input type="text" placeholder="" name="pp_name" value="<?php if($this->input->post('pp_name') != ""){ echo $this->input->post('pp_name'); } ?>" class="form-control <?php if(form_error('pp_name')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Price</label>
        <input type="text" placeholder=""  name="pp_price" value="<?php if($this->input->post('pp_price') != ""){ echo $this->input->post('pp_price'); }  ?>" class="form-control <?php if(form_error('pp_price')){?> error_border <?php } ?>"> 
    </div>


	<div class="form-group col-md-6">
        <label>No of Jobs Post</label>
        <input type="text" name="pp_no_post" placeholder="" value="<?php if($this->input->post('pp_no_post') != ""){ echo $this->input->post('pp_no_post'); } ?>" class="form-control <?php if(form_error('pp_no_post')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>No of Featured Jobs</label>
        <input type="text" name="pp_no_featured" value="<?php if($this->input->post('pp_no_featured') != ""){ echo $this->input->post('pp_no_featured'); } ?>" placeholder="" class="form-control <?php if(form_error('pp_no_featured')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>No of Days Jobs list</label>
        <input type="text" name="pp_no_day" placeholder="" value="<?php if($this->input->post('pp_no_day') != ""){ echo $this->input->post('pp_no_day'); }  ?>" class="form-control <?php if(form_error('pp_no_day')){?> error_border <?php } ?>"> 
    </div>
    
    

    <div class="form-actions col-md-12" style="text-align:center;">
        <button class="btn green" type="submit">Add Payment Plan</button>
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
