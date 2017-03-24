<?php if($this->session->flashdata('update_page') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('update_page'); ?>
    </div>
<?php 
$this->session->set_flashdata('update_page', "");
 } ?>
 
<?php if($this->session->flashdata('delete_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('delete_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('delete_msg', "");
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
                    <th> Name </th>
                    <th> Meta Title </th>
                    <th> Meta Keyword </th>
                    <th> Meta Description </th>
                    <th> Action </th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
				if($page->num_rows() > 0){
					$i = 1;	
					foreach($page->result_array() as $page_row){
		  	?>
                <tr>
                    <td><?=$page_row['page_name']?></td>
                    <td><?=$page_row['page_meta_title']?></td>
                    <td><?=$page_row['page_meta_keywords']?></td>
                    <td><?=$page_row['page_meta_desc']?></td>
                    
                    
                    <td> <a class="btn btn-outline btn-circle btn-sm purple" href="<?=base_url()?>admin/pages/update_page/<?=$page_row['page_id']?>">
                         <i class="fa fa-edit"></i> Edit </a>
                         
                         <a class="btn btn-outline btn-circle dark btn-sm black" href="<?php echo base_url() ?>admin/pages/delete_page/<?php echo $page_row['page_id'] ?>">
                         <i class="fa fa-trash-o"></i> Delete </a>
                    </td>
                    
                </tr>
                
            <?php $i++; } }?>  
            
            </tbody>
        </table>
    </div>
</div>