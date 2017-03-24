<style>
.col-sm-6.right_boder {
    border-right: 2px solid #b1bdcb;
}
.col-lg-12.col_bg {
    background: #ccc none repeat scroll 0 0;
    min-height: 80px;
    padding: 10px 10px 0;
}
.checkbox > label {
    margin-left: 10px;
}
.checkbox > input{
	margin-left: -12px !important;;
}
</style>
<div class="row">
 <div class="col-sm-12">

	<?php if($this->session->flashdata('success_msg') != "") {?>    
    <div class="alert alert-success alert-block fade in">
    	<button type="button" class="close close-sm" data-dismiss="alert">
    		<i class="fa fa-times"></i>
    	</button>
    	<h4> <i class="icon-ok-sign"></i> Success!</h4>
    	<p><?php echo $this->session->flashdata('success_msg'); ?></p>
    </div>
     <?php 
	 	$this->session->set_flashdata('success_msg', "");
	 } ?>
     
     <?php if($this->session->flashdata('error_msg') != "") {?>    
    <div class="alert alert-danger alert-block fade in">
    	<button type="button" class="close close-sm" data-dismiss="alert">
    		<i class="fa fa-times"></i>
    	</button>
    	<h4> <i class="icon-ok-sign"></i> Error!</h4>
    	<p><?php echo $this->session->flashdata('error_msg'); ?></p>
    </div>
     <?php 
	 	$this->session->set_flashdata('error_msg', "");
	 } ?>
     
     
     
		
        
        
        
        <h4> <?=$table_title;?> </h4>
        
        <form role="form" class="form-horizontal" method="post" action="<?=base_url()?>admin/notification/send_notification">
         <div class="row">
         <div class="form-group col-sm-12" style="padding: 0px 0px 0px 30px;">
         	<label>Notification</label>
        <textarea rows="3" class="form-control <?php if(form_error('notification')){?> error_border <?php } ?>" id="page_content" name="notification"><?php if($this->input->post('notification') != ""){ echo $this->input->post('notification'); } ?></textarea>
         </div>
         </div>
         <div class="form-group row">
         <div class="col-sm-6 right_boder">
         <div class="minimal single-row">
            <div>
                <input type="checkbox"  id="checkAllcmp">
                <label>Check all Companies</label>
            </div>
         </div>
		<?php
			if($companies->num_rows() > 0){
				foreach($companies->result_array() as $sub_row){
        ?>
       
            <div class="col-lg-12 col_bg">
                <section class="panel">
                    <div class="panel-body">
                    	<div class="minimal single-row">
                            <div class="checkbox ">
                                <input type="checkbox" class="companies" name="companies_id[]" value="<?=$sub_row['com_user_email']?>" >
                                <label><?=$sub_row['com_user_email']?></label>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
       
        <?php } } ?>
        </div>
         <div class="col-sm-6">
         <div class="minimal single-row">
            <div>
                <input type="checkbox"  id="checkAlljs">
                <label>Check all Jobseekers</label>
            </div>
         </div>
		<?php
			if($jobseekers->num_rows() > 0){
				foreach($jobseekers->result_array() as $sub_row){
        ?>
       
            <div class="col-lg-12 col_bg">
                <section class="panel">
                    <div class="panel-body">
                    	<div class="minimal single-row">
                            <div class="checkbox ">
                                <input type="checkbox" class="jobseekers" name="jobseekers_id[]" value="<?=$sub_row['jos_email']?>">
                                <label><?=$sub_row['jos_email']?></label>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
       
        <?php } } ?>
        </div>
         </div>
        <button class="btn btn-success" type="submit">Send</button>
        </form>

           
            </div>
        </div>
        
        
        <script>
        
		$("#checkAlljs").change(function () {
    		$(".jobseekers").prop('checked', $(this).prop("checked"));
		});
		
		$("#checkAllcmp").change(function () {
    		$(".companies").prop('checked', $(this).prop("checked"));
		});
        </script>
          
        
       
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