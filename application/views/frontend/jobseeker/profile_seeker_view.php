

<form action="#" name="s_form" id="s_form" method="post">
 <div id="class1_error" style="color:#ef4d42;"></div>
      <!-- Page header -->
      <header class="page-header">
        <div class="container page-name">
          <h1 class="text-center"><?=$this->lang->line('profile_name')?></h1>
          <p class="lead text-center"><?=$this->lang->line('profile_name_up')?></p>
        </div>
<?php 
if($seeker_data->num_rows()>0){
	$seek=$seeker_data->row();
	
	}
?>
        <div class="container">

        <div class="row" style="margin-left: 15px;">



            <div class="col-xs-12 col-sm-8 col-lg-10">
              <div class="form-group open">
               <select class="form-control selectpicker" data-placeholder="Choose one..." name="univ_id" data-live-search="true">
                  <option value="">select your university</option>
                  <?php if($uni_data->num_rows()>0){
					  foreach($uni_data->result() as $roi){?>
						  
						
                  <option <?php if($seek->univ_id==$roi->univ_id){?> selected="selected" <?php } ?> value="<?=$roi->univ_id?>"><?=$roi->univ_name?></option>  <?php }
					  } ?>
                 
                </select>
              </div>
            
              <div class="form-group open">
               <select class="form-control selectpicker" data-placeholder="Choose one..." name="grad_id">
                  <option value="">select Graduation Year</option>
                  <?php if($graduation_year->num_rows()>0){
					  foreach($graduation_year->result() as $roi){?>
						  
						
                  <option <?php if($seek->graduation_year==$roi->grad_id){?> selected="selected" <?php } ?> value="<?=$roi->grad_id?>"><?=get_grad_year($roi->grad_id)?></option>  <?php }
					  } ?>
                 
                </select>
              </div>
             
             
             <?php /*?> <div class="form-group">
                <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
            <input type="text" class="form-control" placeholder="graduation year" value="<?=@$seek->graduation_year?>" name="graduation_year">
          </div>
              </div><?php */?>

              
<div class="form-group">
                <div class="input-group">
            <span class="input-group-addon"><i class="ti-email"></i></span>
            <input type="text" class="form-control" readonly value="<?=@$seek->jos_email?>" placeholder="Your email" name="jos_email">
          </div>
              </div><div class="form-group">
                <div class="input-group">
            <span class="input-group-addon"><i class="ti-unlock"></i></span>
            <input type="password" class="form-control" placeholder="password" name="jos_password">
          </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
              <div class="form-group">
               <input type="file" name="filename" id="filename" onChange="Checkfiles();">
                <span class="help-block">Please upload a photo of your student ID card or graduation certificate </span>
                <input type="hidden" value="" name="hidden" id="hidden">
                 <?php 
				if($seek->photo_document_file!=''){
				?>
                <img height="103" width="200" src="<?=base_url()?>uploads/jobseekers/<?=$seek->photo_document_file?>">
                <?php }?>
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

	var formData2 = new FormData($("#s_form")[0]);
 $.ajax({
	   type: "POST",
        url:"<?=base_url()?>Sprofile/update_profile",
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