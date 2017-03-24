<div class="row ">
    <div class="col-md-12">
    
    <?php if(validation_errors() != false) {?>  
        <div class="alert alert-danger alert-dismissable">
       		<button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
           		<?php echo validation_errors(); ?>
        </div>
     <?php 
	 } ?>
     
     <?php if($this->session->flashdata('success_msg') != "") {?>  
   	 	<div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('success_msg'); ?>
    	</div>
	<?php 
    	$this->session->set_flashdata('success_msg', "");
     } ?>
    
    
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    
                    <span class="caption-subject font-dark bold uppercase"><?php echo $table_title ?></span>
                </div>
                
            </div>
            <div class="portlet-body">
               
                
                <form role="form" class="form-horizontal" method="post" action="">
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Package Name</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="package_name" value="<?php if($this->input->post("package_name") != ""){ echo $this->input->post("package_name"); } ?>" placeholder="Package Name" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Package Price</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="package_price" value="<?php if($this->input->post("package_price") != ""){ echo $this->input->post("package_price"); } ?>" placeholder="Package Price" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Job Post Numbers</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="job_post_number" value="<?php if($this->input->post("job_post_number") != ""){ echo $this->input->post("job_post_number"); } ?>" placeholder="Job Post Number" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Featured Job Post Numbers</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="featured_job_post_number" value="<?php if($this->input->post("featured_job_post_number") != ""){ echo $this->input->post("featured_job_post_number"); } ?>" placeholder="Featured Job Post Numbers" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Job Listing Duration</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="job_listing_duration" value="<?php if($this->input->post("job_listing_duration") != ""){ echo $this->input->post("job_listing_duration"); } ?>" placeholder="Job Listing Duration" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Show Contact Detail</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                <div class="mt-checkbox-list">
                                <label class="mt-checkbox mt-checkbox-outline">
                    				<input type="checkbox" name="show_contact" <?php if($this->input->post("show_contact") == "1"){?> checked <? } ?> id="chk_2" value="1" onClick="show_number_fld()">
                    				<span></span>
                				</label>
                                </div>
                 </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group" id="num_resume_outer" <?php if($this->input->post("show_contact") != "1"){?> style="display:none;" <? } ?>>
                        <label class="col-md-2 control-label" for="">Number of Resumes</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="num_resume" value="<?php if($this->input->post("num_resume") != ""){ echo $this->input->post("num_resume"); } ?>" placeholder="Number of Resumes" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn green" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>

<script type="text/javascript">
	function show_number_fld(){
		$('#num_resume_outer').toggle();
	}
</script>