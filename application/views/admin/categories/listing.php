    <?php if($this->session->flashdata('success_msg') != ""){?>
    <div class="alert alert-block alert-success fade in">
    	<button data-dismiss="alert" class="close" type="button"></button>
    		<h4 class="alert-heading">Success!</h4>
    		<p> <?php echo $this->session->flashdata('success_msg'); $this->session->set_flashdata('success_msg', "");?> </p>
    </div>
	<?php } ?>


<div class="table-toolbar">
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group">
                <a href="<?=base_url()?>admin/categories/add_category"><button id="sample_editable_1_new" class="btn sbold green"> Add Category
                    <i class="fa fa-plus"></i>
                </button></a>
            </div>
        </div>
        
    </div>
</div>


<div class="portlet light bordered">
  <div class="portlet-title">
    <div class="caption font-dark">  <span class="caption-subject bold uppercase"><?=$table_title?></span> </div>
    <div class="tools"> </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="sample_1">
      <thead>
        <tr>
          <th> Name </th>
          <th> Detail </th>
          <th> Featured </th>
          <th> Action </th>
        </tr>
      </thead>
      <tbody>
      
      <?php 
	  		if($categories->num_rows() > 0){
				foreach($categories->result_array() as $row){
	   ?>
      
        <tr>
          <td> <?php echo $row['cat_name'];?> </td>
          <td> <?php echo $row['cat_desc'];?> </td>
          
          <td align="center"> 
          
                <label class="mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" <?php if($row['status_id'] == 1){?> checked <?php } ?> onClick="change_category_status(<?=$row['cat_id']?>)" id="chk_<?=$row['cat_id']?>">
                    <span></span>
                </label>
          
           </td>
          <td><a href="<?=base_url()?>admin/categories/update_category/<?=$row['cat_id']?>" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Edit </a>   <a href="<?=base_url()?>admin/categories/delete_category/<?=$row['cat_id']?>" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Delete </a> </td>
        </tr>
      
      <?php } } ?>
       
      </tbody>
    </table>
  </div>
</div>

 <script type="text/javascript">
	 	
		function change_category_status(id){
			
			console.log(id);
			
			if ($('#chk_'+id).is(":checked")){
				 window.location = '<?=base_url()?>admin/categories/change_category_status/1/'  + id;
			} else {
				window.location = '<?=base_url()?>admin/categories/change_category_status/0/'  + id;
			}
			
			}
	 
	 </script> 
