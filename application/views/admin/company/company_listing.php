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
                <a href="<?=base_url()?>admin/companies/add_company"><button id="sample_editable_1_new" class="btn sbold green"> Add New Company
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
        <th>ID</th>
          <th> Company Name </th>
          <th> Company Email </th>
          <!--<th> Company Phone </th>-->
          <!--<th> Company Website </th>-->
          <th>Company Jobs</th>
          <th>Packages</th>
          <th> Status </th>
          <th> Detail </th>
        </tr>
      </thead>
      <tbody>
      
      <?php 
	  		if($orders->num_rows() > 0){
				foreach($orders->result_array() as $row){
	   ?>
      
        <tr>
          <td> <?php echo $row['serial_no'];?> </td>
          <td> <?php echo $row['com_name'];?> </td>
          <td> <?php echo $row['com_email'];?> </td>  
          <?php /*?><td> <?php echo $row['com_phone_number'];?> </td>
          <td> <?php echo $row['com_website'];?> </td><?php */?>
		  <td align="center"><a href="<?=base_url()?>admin/jobs/company_jobs/<?=$row['com_id']?>">Jobs</a> </td>
          <td align="center"><a href="<?=base_url()?>admin/companies/packages/<?=$row['com_id']?>">Packages</a></td>
          <td align="center"> <?php $status = $row['status_id']; if($status == 0){?> Inactive <br> <a href="<?=base_url()?>admin/companies/change_company_status/<?=$row['com_id']?>/1">Make Active</a> <?php } else {?> Active <br> <a href="<?=base_url()?>admin/companies/change_company_status/<?=$row['com_id']?>/0">Make Inactive</a><?php } ?> </td>
          <td><a href="<?=base_url()?>admin/companies/update_company/<?=$row['com_id']?>" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Edit </a></td>
        </tr>
      
      <?php } } ?>
       
      </tbody>
    </table>
  </div>
</div>
