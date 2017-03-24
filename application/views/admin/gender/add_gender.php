<h3 class="page-title">  Add Gender <small>  </small> </h3>

<div class="row">
<div class="col-md-12">

<form role="form" action="" method="post">
	<div class="form-body">
    
     
		
    <div class="form-group col-md-6">
        <label>Gender Type</label>
        <input type="text" placeholder="" name="gender_name" value="<?php if($this->input->post('gender_name') != ""){ echo $this->input->post('gender_name'); } ?>" class="form-control <?php if(form_error('gender_name')){?> error_border <?php } ?>"> 
    </div>

    <div class="form-actions col-md-12" style="text-align:center;">
        <button class="btn green" type="submit">Add Gender</button>
    </div>	

	</div>


</form>

</div>
</div>


