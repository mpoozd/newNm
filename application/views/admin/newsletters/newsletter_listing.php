<?php if($this->session->flashdata('success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('success_msg', "");
 } ?>
 
 <?php if($this->session->flashdata('delete_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('delete_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('delete_msg', "");
 } ?>
 
<?php if($this->session->flashdata('update_success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('update_success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('update_success_msg', "");
 } ?>
 
 <?php if($this->session->flashdata('email_success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('email_success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('email_success_msg', "");
 } ?>
 
  
<div class="table-toolbar">
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group">
                <a href="<?php echo base_url() ?>admin/newsletters/add_newsletter"><button class="btn sbold green" id="sample_editable_1_new"> Add Newsletters
                    <i class="fa fa-plus"></i>
                </button></a>
            </div>
        </div>
        
    </div>
</div>
                                    

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
                    <th> Title </th>
                    <!--<th> Month </th>-->
                    <th> Status </th>
                    <th> Email </th>
                    <th> Action </th>
                    
                </tr>
            </thead>
            <tbody>
            <?php if ($newsletters) { foreach ($newsletters as $newsletter) { ?>
                <tr>
                    <td> <?php echo $newsletter['nl_title']; ?> </td>
                    <?php /*?><td> <?php echo $newsletter['nl_month']; ?> </td><?php */?>
                    <td> <?php if ($newsletter['nl_is_sent'] == 0) {echo "Pending";} else {echo "Sent";}; ?> </td>
                    <td> <?php echo $newsletter['nl_email']; ?> </td>
                    
                    
                    <td> <a class="btn btn-outline btn-circle btn-sm purple" href="<?php echo base_url() ?>admin/newsletters/update_newsletter/<?php echo $newsletter['nl_id'] ?>">
                         <i class="fa fa-edit"></i> Edit </a>
                         
                         <a class="btn btn-outline btn-circle dark btn-sm black" href="<?php echo base_url() ?>admin/newsletters/delete_newsletter/<?php echo $newsletter['nl_id'] ?>">
                         <i class="fa fa-trash-o"></i> Delete </a>
                         
                         <a class="btn btn-outline btn-circle red btn-sm blue" href="<?php echo base_url() ?>admin/newsletters/select_subscribers/<?php echo $newsletter['nl_id'] ?>">
                                                            <i class="fa fa-share"></i> Send </a>
                    </td>
                    
                </tr>
                
            <?php }
            }?>    
            </tbody>
        </table>
    </div>
</div>                                   

