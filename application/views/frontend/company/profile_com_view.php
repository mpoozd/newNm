<form action="#" name="com_form" id="com_form" method="post">
 <div id="class1_error" style="color:#ef4d42;"></div>
      <!-- Page header -->
      <header class="page-header">
        <div class="container page-name">
          <h1 class="text-center"><?=$this->lang->line('profile_name')?></h1>
          <p class="lead text-center"><?=$this->lang->line('below_hed_com')?></p>
        </div>
<?php 

$selected = 'selected';
if($company_data->num_rows()>0){
	$com=$company_data->row();
	}
?>
        <div class="container">

          <div class="row">
            <div class="col-xs-12">
              <div class="row">
                
                

                <div class="col-xs-12 col-sm-8 col-lg-10">
                  <div class="form-group">
                    <input type="text" class="form-control" name="com_user_fullname" value="<?=$com->com_user_fullname?>" placeholder="your full name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" readonly name="com_user_email" value="<?=$com->com_user_email?>" placeholder="Your email">
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control" name="user_password" placeholder="password">
                  </div>
                </div>

              </div>
              <div class="row">
        <div class="col-xs-12">
          <div class="row">

            <div class="col-xs-12 col-sm-4 col-lg-2">
              <div class="form-group">
                <input type="file" name="filename" id="filename" onChange="Checkfiles();">
                <span class="help-block">upload company logo "square" </span>
                <?php 
				if($com->com_logo!=''){
				?>
                <img height="103" width="200" src="<?=base_url()?>uploads/company_logo/<?=$com->com_logo?>">
                <?php }?>
              </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-lg-10">
              <div class="form-group">
                <input type="text" class="form-control input-lg" name="com_name" value="<?=$com->com_name?>" placeholder="Comapny name">
              </div>
              

              <div class="form-group">
                <textarea class="form-control" rows="3" name="short_description"  placeholder="Short description"><?=$com->short_description?></textarea>
              </div>
            </div>

          </div>
        </div>

        <div class="col-xs-12">
          <div class="row">
<div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <select class="form-control selectpicker" name="com_location" data-live-search="true">
                  <option value="">Select Your Location</option>
                    <?php if($location->num_rows()>0){
       foreach($location->result() as $city){?>
                    <option value="<?=$city->city_id?>" <?php if ($this->input->post('com_location') == $city->city_id) {echo $selected;} else if ($com->com_location == $city->city_id) {echo $selected;} ?>>
                    <?=$city->city_name?>
                    </option>
                    <?php }}?>
                  </select>
                </div>
              </div>
            <!--<div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control" value="" name="com_location" placeholder="Location, e.g. Melon Park, CA">
              </div>
            </div>-->
<div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control selectpicker" name="cemp_id">
                  
            <?php if($emp_data->num_rows()>0){
				foreach($emp_data->result() as $rmp){?>
					
			<option <?php if($com->cemp_id==$rmp->cemp_id){?> selected<?php } ?> value="<?=$rmp->cemp_id?>"><?=$rmp->cemp_name?></option>		
					<?php }
				} ?>
            
            </select>
             
                <span class="input-group-addon">Employer</span>
              </div>
            </div>
            

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                <input type="text" class="form-control" value="<?=$com->com_website?>" name="com_website" placeholder="Website address">
              </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-industry"></i></span>
<select class="form-control selectpicker" name="ctype_id">
                  
            <?php if($ctype->num_rows()>0){
				foreach($ctype->result() as $crop){?>
					
			<option <?php if($com->ctype_id==$crop->ctype_id){?> selected<?php } ?> value="<?=$crop->ctype_id?>"><?=$crop->ctype_name?></option>		
					<?php }
				} ?>
            
            </select>
				</div>

            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="text" class="form-control" value="<?=$com->com_phone_number?>" name="com_phone_number" placeholder="Phone number">
              </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control" value="<?=$com->com_email?>"  name="com_email" placeholder="Email address">
              </div>
            </div>

          </div>
        </div>


      </div>
            </div>

            


          </div>

          
<div class="button-group">
        <div class="action-buttons">
          <div class="next-button">
            <button class="btn btn-block btn-primary" onClick="return update_profile();"><?=$this->lang->line('update')?></button>
          </div>
        </div>
      </div>
        </div>
      </header>
      <!-- END Page header -->


      <!-- Main container -->
      
      <!-- END Main container -->

    </form>
    <script>
	
	function update_profile(){
			$('#class1_error').html('');

	var formData2 = new FormData($("#com_form")[0]);
 $.ajax({
	   type: "POST",
        url:"<?=base_url()?>Profilec/update_profile",
        data: formData2,
        contentType: false,
        processData: false,
        encode: true,
        async: false,
        cache: false,
 		success: function(html){
	
	var r=JSON.parse(html);
	var bo=r['log_error'];
//alert(bo)
	if( bo=='no'){
			$('#class1_error').html('');
		document.location.href='<?=base_url()?>home';
	
	}
	else{
		$('#class1_error').html(bo);
		//$('#loadingmessage').hide();
	}
	}
});
return false;
		}
		
		
		function Checkfiles()
{
var fup = document.getElementById('filename');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext=="png" || ext=="PNG")
{
	$('#hidden').val(1);
return true;
} 
else
{
alert("Upload Gif or Jpg images only");
fup.focus();
 document.getElementById('filename').value='';
return false;
}
}	
	</script>