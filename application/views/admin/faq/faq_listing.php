<?php if($this->session->flashdata('success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('success_msg', "");
 } ?>
 
 <?php if($this->session->flashdata('delete_faq_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('delete_faq_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('delete_faq_msg', "");
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
                                                    <a href="<?php echo base_url() ?>admin/faq/add_faq"><button class="btn sbold green" id="sample_editable_1_new"> Add FAQ
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
                    <th> FAQ Type </th>
                    <th> Question </th>
                    <th> Answer </th>
                    <th> Action </th>
                    
                </tr>
            </thead>
            <tbody>
           <?php
				if($faq->num_rows() > 0){
					$i = 1;	
					foreach($faq->result_array() as $faq_row){
		  	?>
                <tr>
                    <td><?=get_faq_type($faq_row['faq_type_id'])?></td>
                    <td><?=$faq_row['question']?></td>
                    <td><?=$faq_row['answer']?></td>
                    
                    <td> <a class="btn btn-outline btn-circle btn-sm purple" href="<?=base_url()?>admin/faq/update_faq/<?=$faq_row['faq_id']?>">
                         <i class="fa fa-edit"></i> Edit </a>
                         
                         <a class="btn btn-outline btn-circle dark btn-sm black" href="<?php echo base_url() ?>admin/faq/delete_faq/<?php echo $faq_row['faq_id'] ?>">
                         <i class="fa fa-trash-o"></i> Delete </a>
                    </td>
                    
                </tr>
                
            <?php $i++; } }?>  
            
            </tbody>
        </table>
    </div>
</div>