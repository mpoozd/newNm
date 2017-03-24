
 <header class="page-header bg-img" style="background-image: url(<?=base_url()?>assets/img/bg-banner1.jpg);">
      <div class="container page-name">
        <h1 class="text-center"><?=$this->lang->line('bro_com')?></h1>
        <p class="lead text-center"><?=$this->lang->line('below')?></p>
      </div>

      <div class="container">
        <form action="" name="search_form" id="search_form" method="post">

          <div class="row">
            <div class="form-group col-xs-12 col-sm-4">
              <input type="text" class="form-control" value=""  name="com_name" id="com_name" placeholder="كلمات البحث">
            </div>

            <div class="form-group col-xs-12 col-sm-4">
<?php /*?>              <input type="text" class="form-control" value=""  name="com_location" id="com_location" placeholder="Location">
<?php */?>                <select class="form-control selectpicker" name="com_location" id="com_location" data-live-search="true">
             <?php 
			 if($location->num_rows()>0){
				 foreach($location->result() as $loc){
					 ?>
                      <option value="<?=$loc->city_id?>"><?=$loc->city_name?></option>
					 <?php }
				 }
			 ?>
 
  
</select>
            </div>

         <div class="form-group col-xs-12 col-sm-4">
              <select class="form-control selectpicker" name="category_id"  data-live-search="true">
              <option value="0"><?=$this->lang->line('all_cat')?></option>
              <?php 
			  if($cat_data->num_rows()>0){
				  foreach($cat_data->result() as $ct){?>
               
                <option value="<?=$ct->cat_id?>" ><?=$ct->cat_name?></option><?php }
				  }
			  ?>
                
              </select>
            </div>

          </div>

          <div class="button-group">
            <div class="action-buttons">
              <button class="btn btn-primary" onClick="return get_jobs_list();"><?=$this->lang->line('apply_filter')?></button>
            </div>
          </div>

        </form>

      </div>

    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>
      <section class="no-padding-top bg-alt">
        <div class="container">
          <div class="row" id="job_list">

            
<div class="col-xs-12">
              <br>
              <h5> <strong><?=$com->num_rows()?></strong> نتيجة</h5>
            </div>   
            <!-- Company detail -->
             <?php 
			if($com->num_rows()>0){
				foreach($com->result() as $jrow){?>
				
            <div class="col-xs-12">
              <a class="item-block" href="<?=base_url()?>Job/company_detail/<?=$jrow->com_sef?>">
                <header>
                
                    <?php 
				if($jrow->com_logo!=''){
					
					?>
	<img src="<?=base_url()?>uploads/company_logo/<?=$jrow->com_logo?>" alt=""><?php }else{ ?>
				<img src="<?=base_url()?>assets/img/logo-google.jpg" alt=""><?php }?>
                  <div class="hgroup">
                    <h4><?=$jrow->com_name?></h4>
                    <h5><?=get_sep_name($jrow->com_headline)?></h5>
                  </div>
              <?php    $opn=$this->General_model->get_company_detail($jrow->com_sef);?>
                  <span class="open-position"><?=$opn->num_rows()?> الوظائف المتاحة</span>
                </header>

                <div class="item-body">
                  <p><?=substr($jrow->short_description,0,200)?>.</p>
                </div>
              </a>
            </div>
            <!-- END Company detail -->

<?php }}?>
            <!-- END Page navigation -->

          </div>
          <nav class="text-center"> 
<ul class="pagination" style="margin-right:515px;box-shadow:none;"><?php echo $create_links; ?>   </ul>
          </nav>
        </div>
   
      </section>
    </main>
    <!-- END Main container -->
    <!-- END Main container -->
    
    <script>
    function get_jobs_list(){
		var category_id  =   $('#category_id option:selected').val();
		var com_location  =   $('#com_location option:selected').val();
   var com_name   = $('#com_name').val();
   // var com_location   = $('#com_location').val();
	
	

   $.ajax({
	   url : "<?=base_url()?>Search_company/filter_job_list",
	   dataType:"html",
	   type:"POST",
	   data:{category_id:category_id,com_name:com_name,com_location:com_location}
   }).done(function(msg)
   {

	   $('#job_list').html(msg);
   });
   
   return false;
		}
    </script>