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
                        <label class="col-md-2 control-label" for="">Name</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="admin_name" value="<?php if($this->input->post("admin_name") != ""){ echo $this->input->post("admin_name"); } ?>" placeholder="Name" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Email</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="admin_email" value="<?php if($this->input->post("admin_email") != ""){ echo $this->input->post("admin_email"); } ?>" placeholder="Email" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Password</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="password" name="admin_password" value="<?php if($this->input->post("admin_password") != ""){ echo $this->input->post("admin_password"); } ?>" placeholder="Password" class="form-control"> </div>
                           
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