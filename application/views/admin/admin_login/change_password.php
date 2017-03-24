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
                    <i class="icon-lock font-dark"></i>
                    <span class="caption-subject font-dark bold uppercase">Change Password</span>
                </div>
                
            </div>
            <div class="portlet-body">
               
                
                <form role="form" class="form-horizontal" method="post" action="">
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputPassword1">Current Password</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="password" name="current_password" value="<?php if($this->input->post("current_password") != ""){ echo $this->input->post("current_password"); } ?>" placeholder="Current Password" id="inputPassword1" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputPassword1">New Password</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                               
                                <input type="password" name="new_password" value="<?php if($this->input->post("new_password") != ""){ echo $this->input->post("new_password"); } ?>" placeholder="New Password" id="inputPassword1" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputPassword1">Confirm Password</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="password" name="confirm_password" value="<?php if($this->input->post("confirm_password") != ""){ echo $this->input->post("confirm_password"); } ?>" placeholder="Confirm Password" id="inputPassword1" class="form-control"> </div>
                           
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