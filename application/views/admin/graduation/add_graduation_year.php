

<h3 class="page-title">  Add Gender <small>  </small> </h3>

<div class="row">
<div class="col-md-12">

<form role="form" action="" method="post">
	<div class="form-body">
    
     
		
    <div class="form-group col-md-6">
        <label>Graduation Year</label>
        <input type="text" placeholder="" name="grad_year" value="<?php if($this->input->post('grad_year') != ""){ echo $this->input->post('grad_year'); } ?>" class="form-control <?php if(form_error('grad_year')){?> error_border <?php } ?>"> 
    </div>

    <div class="form-actions col-md-12" style="text-align:center;">
        <button class="btn green" type="submit">Add Graduation Year</button>
    </div>	

	</div>


</form>

</div>
</div>


