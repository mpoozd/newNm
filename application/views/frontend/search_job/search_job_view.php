
    <!-- Page header -->
    <header class="page-header bg-img" style="background-image: url(<?=base_url()?>assets/img/bg-banner1.jpg);">
      <div class="container page-name">
        <h1 class="text-center"><?=$this->lang->line('brow_job')?></h1>
        <p class="lead text-center"><?=$this->lang->line('brow_job_b')?></p>
      </div>

      <div class="container">
        <form action="" name="search_form" id="search_form" method="post">

          <div class="row">
            <div class="form-group col-xs-12 col-sm-4">
              <input type="text" class="form-control" value="" name="job_title" id="job_title" placeholder="كلمات البحث: مسمى الوظيفة - المجال">
            </div>

            <div class="form-group col-xs-12 col-sm-4">
           <?php /*?>   <input type="text" class="form-control" value=""  name="job_location" id="job_location" placeholder="Location: city, state or zip"><?php */?>
             <select class="form-control selectpicker" name="job_location" id="job_location" data-live-search="true" onChange="get_val(this.value)">
               <option value="">حدد المدينة</option>
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
              <select class="form-control selectpicker" name="category_id" id="category_id" data-live-search="true"> 
              <option selected value="0"><?=$this->lang->line('all_cat')?></option>
              <?php 
			  if($cat_data->num_rows()>0){
				  foreach($cat_data->result() as $ct){?>
               
                <option value="<?=$ct->cat_id?>" ><?=$ct->cat_name?></option><?php }
				  }
			  ?>
                
              </select>
            </div>


            <div class="form-group col-xs-12 col-sm-4">
              <h6>أنواع الوظائف</h6>
              <div class="checkall-group">
              
                <div class="checkbox">
                  <input type="checkbox" class="messageCheckbox" id="job_type_id" value="0" name="job_type_id" checked >
                  <label for="contract1">جميع الأنواع</label>
                </div>

<?php 
if($type_data->num_rows()>0){
	foreach($type_data->result() as $ty){?>
	<div class="checkbox">
                  <input type="checkbox" id="job_type_id" class="messageCheckbox" name="job_type_id" value="<?=$ty->jtype_id?>">
                  <label for="contract1"><?=$ty->jtype_name?></label>
                </div>
	
	<?php }
	}
?>  
<input type="hidden" value="0" id="type_val" name="type_val">  

<input type="hidden" value="0" id="salary_val" name="salary_val"> 
  
<input type="hidden" value="0" id="working_hours_val" name="working_hours_val">   
              
              </div>
            </div>


            <div class="form-group col-xs-12 col-sm-4">
              <h6>الراتب/المكافأة</h6>
              <div class="checkall-group">
                <div class="checkbox">
                  <input type="checkbox" value="0" name="salary" id="salary" class="salary"  checked>
                  <label for="rate1">الكل</label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" value="500-1000" id="salary" name="salary" class="salary" >
                  <label for="rate2">500 - 1000 ريال</label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" value="1000-2000" id="salary" name="salary" class="salary" >
                  <label for="rate3">1000 - 2000 ريال</label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" value="2000-3000" id="salary" name="salary" class="salary" >
                  <label for="rate4">2000 - 3000 ريال</label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" value="3000" id="messageCheckbox" name="salary_max" class="salary_max" >
                  <label for="rate5">3000+ ريال</label>
                </div>
              </div>
            </div>


            <div class="form-group col-xs-12 col-sm-4">
              <h6>ساعات العمل</h6>
              <div class="checkall-group">
                <div class="checkbox">
                  <input type="checkbox" value="0" name="working_hours" class="working_hours"  id="working_hours" checked>
                  <label for="degree1">جميع الساعات</label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" value="4" id="working_hours" class="working_hours" name="working_hours">
                  <label for="degree2">4 ساعات</label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" value="6" id="working_hours" class="working_hours" name="working_hours">
                  <label for="degree3">6 ساعات </label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" value="7" id="working_hours" class="working_hours" name="working_hours">
                  <label for="degree4">7 ساعات</label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" value="8" id="working_hours" class="working_hours" name="working_hours">
                  <label for="degree5">8 ساعات </label>
                </div>
              </div>
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
        
          <div class="row item-blocks-condensed" id="job_list">

            <div class="col-xs-12">
              <br>
              <h5> <strong><?=$jobs->num_rows()?></strong> نتيجة</h5>
            </div>

            <!-- Job item -->
            <?php 
			if($jobs->num_rows()>0){
				foreach($jobs->result() as $jrow){?>
				
			
            <div class="col-xs-12">
              <a class="item-block" href="<?=base_url()?>Job/job_detail/<?=$jrow->job_sef?>">
                <header>
                 <?php 
				if($jrow->com_logo!=''){
					
					?>
	<img src="<?=base_url()?>uploads/company_logo/<?=$jrow->com_logo?>" alt=""><?php }else{ ?>
				<img src="<?=base_url()?>assets/img/logo-google.jpg" alt=""><?php }?>
                  <div class="hgroup">
                  <h4><?=$jrow->job_title?></h4>
                    <h5><?=$jrow->com_name?></h5>
                  </div>
                  <div class="header-meta">
                      <span class="location"><?=get_city_name($jrow->job_location);?></span>
                    <span class="label <?=$jrow->jtype_label?>"><?=$jrow->jtype_name?></span>
                  </div>
                </header>
              </a>
            </div>
            <!-- END Job item -->

	<?php }
				}
			
			?>
          
            <!-- END Job item -->

          </div>



<nav class="text-center"> 
<ul class="pagination" style="margin-right:515px;box-shadow:none;"><?php echo $create_links; ?>   </ul>
          </nav>
        </div>
      
      </section>
    </main>
    <!-- END Main container -->
    
    <script>
	function get_val(val){
	//	alert(val);
		}
    function get_jobs_list(){
		var category_id  =   $('#category_id option:selected').val();
			var job_location  =   $('#job_location option:selected').val();
		
	//	alert(job_location);
   var job_title   = $('#job_title').val();
  // var job_location   = $('#job_location').val();
	
	  var job_type_id = [];
	
	  var checkedValue = null; 
var inputElements = document.getElementsByClassName('messageCheckbox');
for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           checkedValue = inputElements[i].value;
		   job_type_id.push(checkedValue);
		//    alert(checkedValue)
         
      }
}

	
	var array  =job_type_id.join('or');
	  $('#type_val').val(array);
	  
	 

	// break;
	   var salary = [];
      var checkedValue = null; 
var inputElements = document.getElementsByClassName('salary');
for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           checkedValue = inputElements[i].value;
		   salary.push(checkedValue);
		//    alert(checkedValue)
         
      }
}var array  =salary.join();
     $('#salary_val').val(array);
	 
	 
	   var working_hours = [];
        var checkedValue = null; 
var inputElements = document.getElementsByClassName('working_hours');
for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           checkedValue = inputElements[i].value;
		   working_hours.push(checkedValue);
		//    alert(checkedValue)
         
      }
}var array  =working_hours.join();
     $('#working_hours_val').val(array);
	 
	if(document.getElementById('messageCheckbox').checked){
		var max_sal = $('.salary_max').val();
	}

   $.ajax({
	   url : "<?=base_url()?>Search_job/filter_job_list",
	   dataType:"html",
	   type:"POST",
	   data:{category_id:category_id,job_title:job_title,job_location:job_location,job_type_id:$('#type_val').val(),salary: $('#salary_val').val(),working_hours:$('#working_hours_val').val(),max_sal:max_sal}
   }).done(function(msg)
   {

	   $('#job_list').html(msg);
   });
   
   return false;
		}
    </script>