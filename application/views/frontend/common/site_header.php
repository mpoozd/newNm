<header class="site-header size-lg text-center" style="background-image: url(<?=base_url()?>assets/img/bg-banner1.jpg)">
      <div class="container">
        <div class="col-xs-12">
          <br><br>
          <h2>هل تبحث عن <mark>فرصة عمل، </mark>تدريب، <mark>تطوع، </mark>وظيفة صيفية ؟</h2> 
          <h5 class="font-alt"><?=$this->lang->line('s_h_desire')?></h5>
		  <a class="btn btn-outline btn-success" href="http://www.smartlancers.com/Sregister">سجل الآن</a>
          <br><br><br>
          <form class="header-job-search" method="post">
            <div class="input-keyword fa fa-search">
              <input type="text" class="form-control" value=""  name="job_title" id="job_title" placeholder="مسمى الوظيفة">
            </div>

            <div class="input-location fa fa-map-marker">
              <input type="text" class="form-control" value=""  id="job_location" name="job_location" placeholder="المدينة">
            </div>

            <div class="btn-search">
              <button class="btn btn-primary" type="submit"  onClick="return get_jobs_list();"><?=$this->lang->line('s_h_find')?></button>
              <a href="<?=base_url()?>Search_job"><?=$this->lang->line('s_h_advance')?></a>
            </div>
          </form>
        </div>

      </div>
    </header>
    
     <script>
    function get_jobs_list(){
   var job_title   = $('#job_title').val();
    var job_location   = $('#job_location').val();
	
	

   $.ajax({
	   url : "<?=base_url()?>Search_job/filter_job_list_home",
	   dataType:"html",
	   type:"POST",
	   data:{job_title:job_title,job_location:job_location}
   }).done(function(msg)
   {
	  
			
	$('#serch_span').text('<?=$this->lang->line('s_h_s_res')?>');
	$('#serch_head').html('<?=$this->lang->line('s_h_s_result')?>');		
$('#browse_btn').hide();
$('.test').hide();

	   $('#list_job').html(msg);
   });
   
   return false;
		}
    </script>