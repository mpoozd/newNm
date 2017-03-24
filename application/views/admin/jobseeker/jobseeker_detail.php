<h3 class="page-title"> <?=$user_info['jos_username']?> <small> <?=$user_info['jos_email']?></small> </h3>

<?php $selected = "selected"; ?>

<div class="row">
<div class="col-md-12">

<form role="form" enctype="multipart/form-data" method="post">
	<div class="form-body">
		
    <div class="form-group col-md-6">
        <label>Username</label>
        <input type="text" placeholder="" name="js_username" value="<?php if($this->input->post('js_username') != ""){ echo $this->input->post('js_username'); } else { echo $user_info['jos_username']; } ?>" class="form-control <?php if(form_error('js_username')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Email</label>
        <input type="text" placeholder="" readonly name="js_email" value="<?php if($this->input->post('js_email') != ""){ echo $this->input->post('js_email'); } else { echo $user_info['jos_email']; } ?>" class="form-control"> 
    </div>


	<div class="form-group col-md-6">
        <label>Name</label>
        <input type="text" name="js_name" placeholder="" value="<?php if($this->input->post('js_name') != ""){ echo $this->input->post('js_name'); } else { echo $user_info['name']; } ?>" class="form-control <?php if(form_error('js_name')){?> error_border <?php } ?>"> 
    </div>
    
 <?php /*?>   <div class="form-group col-md-6">
        <label>Graduation Year</label>
        <input type="text" name="js_grad_year" value="<?php if($this->input->post('js_grad_year') != ""){ echo $this->input->post('js_grad_year'); } else { echo $user_info['graduation_year']; } ?>" placeholder="" class="form-control <?php if(form_error('js_grad_year')){?> error_border <?php } ?>"> 
    </div><?php */?>
    
    
        <div class="form-group col-md-6">
        <label>Graduation Year</label>
        <select class="form-control" name="js_grad_year">
        	<?php for($i=1990; $i<=2016; $i++){?>
            <option value="<?=$i?>" <?php if($this->input->post('js_grad_year') == $i){ echo $selected; } else if($user_info['graduation_year'] == $i) { echo $selected;  } ?>>  <?=$i?> </option>
           <?php } ?>
        </select>
    </div>
    
    
    
    
    
    <div class="form-group col-md-6">
        <label>Address</label>
        <input type="text" name="js_address" placeholder="" value="<?php if($this->input->post('js_address') != ""){ echo $this->input->post('js_address'); } else { echo $user_info['address']; } ?>" class="form-control <?php if(form_error('js_address')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Phone</label>
        <input type="text" name="js_phone" placeholder="" value="<?php if($this->input->post('js_phone') != ""){ echo $this->input->post('js_phone'); } else { echo $user_info['phone']; } ?>" class="form-control <?php if(form_error('js_phone')){?> error_border <?php } ?>"> 
    </div>
    
    <div class="form-group col-md-6">
        <label>Country</label>
        <select class="form-control" name="js_country">
        	<?php
            	if($countries->num_rows() > 0){
					foreach($countries->result_array() as $con_row){
			?>
            <option value="<?=$con_row['country_id']?>" <?php if($this->input->post('js_country') == $con_row['country_id']){ echo $selected; } else if($user_info['country_id'] == $con_row['country_id']) { echo $selected; } ?>>  <?=$con_row['country_name']?> </option>
            <?php } } ?>
        </select>
    </div>
    
    <div class="form-group col-md-6">
        <label>University</label>
        <select class="form-control" name="js_university">
        	<?php
            	if($universities->num_rows() > 0){
					foreach($universities->result_array() as $uni_row){
			?>
            <option value="<?=$uni_row['univ_id']?>" <?php if($this->input->post('js_university') == $uni_row['univ_id']){ echo $selected; } else if($user_info['univ_id'] == $uni_row['univ_id']) { echo $selected; } ?> > <?=$uni_row['univ_name']?></option>
            <?php } } ?>
        </select>
    </div>
    
    
    <div class="form-group col-md-6">
        <label>Overview Objective</label>
        <textarea rows="3" class="form-control <?php if(form_error('js_overview')){?> error_border <?php } ?>" name="js_overview"><?php if($this->input->post('js_overview') != ""){ echo $this->input->post('js_overview'); } else { echo $user_info['overview_objective']; } ?></textarea>
    </div>
    
     <div class="form-group col-md-6">
        <label>Social Media URLs</label>
        <textarea rows="3" class="form-control <?php if(form_error('js_social_urls')){?> error_border <?php } ?>" name="js_social_urls"><?php if($this->input->post('js_social_urls') != ""){ echo $this->input->post('js_social_urls'); } else { echo $user_info['social_media_url1']; } ?></textarea>
    </div>

	

    <div class="form-actions" style="text-align:center;">
        <button class="btn green" type="submit" >Update</button>
    </div>	

	</div>


</form>

</div>
</div>





