<?php if($this->session->flashdata('delete_success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('delete_success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('delete_success_msg', "");
 } ?>
 
<?php if($this->session->flashdata('success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('success_msg', "");
 } ?>
 
 <?php if($this->session->flashdata('update_success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('update_success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('update_success_msg', "");
 } ?>


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
                    <th> Email </th>
                    <th> Action </th>
                    
                </tr>
            </thead>
            <tbody>
            <?php if ($subscribers) { foreach ($subscribers as $subscriber) { ?>
                <tr>
                   
                    <td> <?php echo $subscriber['sub_email']; ?> </td>
                    
                    
                    <td> <a class="btn btn-outline btn-circle btn-sm purple" href="<?php echo base_url() ?>admin/subscribers/update_subscriber/<?php echo $subscriber['sub_id'] ?>">
                         <i class="fa fa-edit"></i> Edit </a>
                         
                         <a class="btn btn-outline btn-circle dark btn-sm black" href="<?php echo base_url() ?>admin/subscribers/delete_subscriber/<?php echo $subscriber['sub_id'] ?>">
                         <i class="fa fa-trash-o"></i> Delete </a>
                         
                         
                    </td>
                    
                </tr>
                
            <?php }
            }?>    
            </tbody>
        </table>
    </div>
</div>                                   

