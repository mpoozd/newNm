<?php if($this->session->flashdata('price_success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('price_success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('price_success_msg', "");
 } ?>
 
 <?php if($this->session->flashdata('delete_plan_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('delete_plan_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('delete_plan_msg', "");
 } ?>
 
 <?php if($this->session->flashdata('update_success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('update_success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('update_success_msg', "");
 } ?>
 
 
 
 
<div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url() ?>admin/pricing/add_pricing_plan"><button class="btn sbold green" id="sample_editable_1_new"> Add Pricing Plan
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
                    <th> Package Name </th>
                    <th> Package Price </th>
                    <th> Job Post Numbers </th>
                    <th> Featured Job Numbers </th>
                    <th> Job Listing Duration </th>
                    <th> Action </th>
                    
                </tr>
            </thead>
            <tbody>
            <?php if ($price_plan) {
				foreach ($price_plan as $price_row) { ?>
                <tr>
                    <td> <?php echo $price_row['pp_name']; ?> </td>
                    <td> <?php echo get_settings_currency().' '.$price_row['pp_price']; ?> </td>
                    <td> <?php echo $price_row['pp_job_post_number']; ?> </td>
                    <td> <?php echo $price_row['pp_featured_job_post_number']; ?> </td>
                    <td> <?php echo $price_row['pp_days_listing_duration']; ?> </td>
                    
                    
                    <td> <a class="btn btn-outline btn-circle btn-sm purple" href="<?php echo base_url() ?>admin/pricing/update_plan/<?php echo $price_row['pp_id'] ?>">
                         <i class="fa fa-edit"></i> Edit </a>
                         
                         <a class="btn btn-outline btn-circle dark btn-sm black" href="<?php echo base_url() ?>admin/pricing/delete_plan/<?php echo $price_row['pp_id'] ?>">
                         <i class="fa fa-trash-o"></i> Delete </a>
                    </td>
                    
                </tr>
                
            <?php }
			}?>  
            
            </tbody>
        </table>
    </div>
</div>