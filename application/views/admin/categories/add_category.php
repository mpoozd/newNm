<h3 class="page-title">  Add New Category <small>  </small> </h3>


<div class="row">
<div class="col-md-12">

<form role="form" action="" enctype="multipart/form-data" method="post">
	<div class="form-body">
    
    <div class="form-group col-md-12">
    
    <img id="uploadPreviewAdmin" style="max-height:200px; max-width:200px;" />
                                
        <div class="form-group">
            <label for="exampleInputFile">Category Image</label>
            <input type="file" id="uploadImageAdmin" name="image" onchange="PreviewImageAdmin();">
            <p class="help-block" style="color:#FB0004;" id="upload_logo_error_admin"> </p>
        </div>
   </div> 
		
    <div class="form-group col-md-6">
        <label>Name</label>
        <input type="text" placeholder="" name="cat_name" value="<?php if($this->input->post('cat_name') != ""){ echo $this->input->post('cat_name'); } ?>" class="form-control <?php if(form_error('cat_name')){?> error_border <?php } ?>"> 
    </div>
    

    
     <div class="form-group col-md-12">
        <label>Short Description</label>
        <textarea rows="3" class="form-control <?php if(form_error('cat_desc')){?> error_border <?php } ?>" name="cat_desc"><?php if($this->input->post('cat_desc') != ""){ echo $this->input->post('cat_desc'); } ?></textarea>
    </div>

	

    <div class="form-actions col-md-12" style="text-align:center;">
        <button class="btn green" type="submit">Add Category</button>
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
