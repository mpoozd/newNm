<?php if($this->session->flashdata('admin_success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('admin_success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('admin_success_msg', "");
 } ?>
 
 <?php if($this->session->flashdata('update_success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('update_success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('update_success_msg', "");
 } ?>
 
 <?php if($this->session->flashdata('delete_account_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('delete_account_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('delete_account_msg', "");
 } ?>
 
 
 <?php if($this->session->userdata('super_admin') == 1){?>
 
<div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url() ?>admin/accounts/add_account"><button class="btn sbold green" id="sample_editable_1_new"> Add Account
                                                        <i class="fa fa-plus"></i>
                                                    </button></a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
<?php } ?>                                    

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            
            <span class="caption-subject bold uppercase"><?php echo $table_title ?></span>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                    <th> Name </th>
                    <th> Email </th>
                     <?php if($this->session->userdata('super_admin') == 1){?>
                    <th> Action </th>
                    <? } ?>
                    
                </tr>
            </thead>
            <tbody>
            <?php if ($accounts) { foreach ($accounts as $account) { ?>
                <tr>
                    <td> <?php echo $account['admin_name']; ?> </td>
                    <td> <?php echo $account['admin_email']; ?> </td>
                     <?php if($this->session->userdata('super_admin') == 1){?>
                    <td> <a class="btn btn-outline btn-circle btn-sm purple" href="<?php echo base_url() ?>admin/accounts/update_account/<?php echo $account['admin_id'] ?>">
                         <i class="fa fa-edit"></i> Edit </a>
                         
                         <a class="btn btn-outline btn-circle dark btn-sm black" href="<?php echo base_url() ?>admin/accounts/delete_account/<?php echo $account['admin_id'] ?>">
                         <i class="fa fa-trash-o"></i> Delete </a>
                    </td>
                    <? } ?>
                </tr>
                
            <?php }
            }?>    
            </tbody>
        </table>
    </div>
</div>