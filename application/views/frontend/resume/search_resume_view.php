
    <!-- Page header -->
    <header class="page-header bg-img" style="background-image: url(<?=base_url()?>assets/img/bg-banner1.jpg);">
      <div class="container page-name">
        <h1 class="text-center"><?=$this->lang->line('brow_res')?></h1>
        <p class="lead text-center"><?=$this->lang->line('brow_res_b')?></p>
      </div>

      <div class="container">
        <form action="" name="search_form" id="search_form" method="post">

          <div class="row">
            <div class="form-group col-xs-12 col-sm-4">
              <input type="text" class="form-control" value=""  name="jos_username" id="jos_username" placeholder="Keyword: name, skills, or tags">
            </div>

            <div class="form-group col-xs-12 col-sm-4">
              <input type="text" class="form-control" value=""  name="location" id="location" placeholder="Location: city, state or zip">
            </div>

            
 <div class="form-group col-xs-12 col-sm-4">
              <select class="form-control selectpicker" name="spe_id" id="spe_id" >
              <option value="0">All Specilist</option>
                <?php 
			  if($spe_data->num_rows()>0){
				  foreach($spe_data->result() as $sp){?>
               
                <option value="<?=$sp->spe_id?>" ><?=$sp->spe_name?></option><?php }
				  }
			  ?>
              </select>
            </div>

            <div class="form-group col-xs-12 col-sm-4" style="float:right;">
              <h6>University</h6>
              <div class="checkall-group">
                <div class="checkbox">
                  <input type="checkbox" value="0" class="univ" id="univ_id" name="univ_id" checked>
                  <label for="rate1">All universities</label>
                </div>
 <?php 
			  if($univ_data->num_rows()>0){
				  foreach($univ_data->result() as $ct){?>
                <div class="checkbox">
                  <input type="checkbox" value="<?=$ct->univ_id?>"  class="univ"  id="univ_id" name="univ_id">
                  <label for="rate2"><?=$ct->univ_name?></label>
                </div>
<?php }}?>
                

                
              </div>
            </div>

<input type="hidden" value="0" id="univ_id_val" name="univ_id_val">   
              

            <div class="form-group col-xs-12 col-sm-4" id="rd">
              <h6>Sort by</h6><div class="radio">
                <input type="radio" name="gender" id="gender" value="0" checked>
                <label for="sortby3">All</label>
              </div>
              <div class="radio">
                <input type="radio" name="gender" value="1"  id="gender"  >
                <label for="sortby1">Males</label>
              </div>

              <div class="radio">
                 <input type="radio" name="gender" value="2"  id="gender" >
                <label for="sortby2">Females</label>
              </div>

              

              
            </div>


          </div>

          <div class="button-group">
            <div class="action-buttons">
              <button class="btn btn-primary" onClick="return get_jobs_list();">Apply filter</button>
            </div>
          </div>

        </form>

      </div>

    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>
      <section class="no-padding-top bg-alt">
        <div class="container" id="job_list">
        <div class="col-xs-12">
              <br>
              <h5>   <strong><?=$res_data->num_rows()?></strong> نتائج</h5>
            </div>
        <?php 
		$count=0;
		$count_in=0;
		if($res_data->num_rows()>0){
			foreach($res_data->result() as $ro){
				
				if($count==0){
				?>
				
        
          <div class="row">

            <!-- Resume detail -->
            <div class="col-xs-12">
           <!--  <a class="btn btn-xs btn-danger" href="javascript:;" onClick="delete_job()">Delete</a>-->
              <a href="<?=base_url()?>Sprofile/detail/<?=$ro->jos_sef?>" class="item-block">
                <header>
                
                <?php 
				if($ro->image!=''){
					
					?>
	
	 <img class="resume-avatar"  src="<?=base_url()?>uploads/jobseekers/<?=$ro->image?>" alt="">
	 <?php }else{ ?>
       <img class="resume-avatar" src="<?=base_url()?>assets/img/avatar.jpg" alt="">
				<?php } ?>
                  
                  <div class="hgroup">
                      <h4><?=$ro->jos_username?></h4>
                    <h5><?=$ro->jos_headline?></h5>
                  </div>
                </header>

                <div class="item-body">
                  <p><?=substr($ro->about_uerself,0,50)?>...</p>

                  <!--<div class="tag-list">
                    <span>HTML5</span>
                    <span>CSS3</span>
                    <span>Bootstrap</span>
                    <span>Wordpress</span>
                  </div>-->
                </div>

                <footer>
                  <ul class="details cols-3">
                    <li>
                      <i class="fa fa-map-marker"></i>
                      <span><?=$ro->location?></span>
                    </li>

                    <li>
                      <i class="fa fa-university"></i>
                      <span><?=$ro->univ_name?></span>
                    </li>

                  </ul>
                </footer>
              </a>
              
                 
                   
             
            </div>
            <!-- END Resume detail -->
          </div>
          <?php $count++;  }else{ ?>

			<?php if($count_in==0){?>

          <div class="row"><?php }?>
            <!-- Resume detail -->
            <div class="col-sm-12 col-md-6">
               <a href="<?=base_url()?>Sprofile/detail/<?=$ro->jos_sef?>" class="item-block">
                <header>
                 <?php 
				if($ro->image!=''){
					
					?>
	
	 <img class="resume-avatar"  src="<?=base_url()?>uploads/jobseekers/<?=$ro->image?>" alt="">
	 <?php }else{ ?>
       <img class="resume-avatar" src="<?=base_url()?>assets/img/avatar.jpg" alt="">
				<?php } ?>
                  
                  <div class="hgroup">
                      <h4><?=$ro->jos_username?></h4>
                    <h5><?=$ro->jos_headline?></h5>
                  </div>
                </header>

                <div class="item-body">
                  <p><?=substr($ro->about_uerself,0,50)?>...</p>

                  <!--<div class="tag-list">
                    <span>J2EE</span>
                    <span>J2SE</span>
                    <span>Android</span>
                  </div>-->
                </div>

                <footer>
                  <ul class="details cols-2">
                    <li>
                      <i class="fa fa-map-marker"></i>
                      <span><?=$ro->location?></span>
                    </li>

                    <li>
                      <i class="fa fa-university"></i>
                      <span><?=$ro->univ_name?></span>
                    </li>
                  </ul>
                </footer>
              </a>
              <!--<div class="action-btn">
                 
                    <a class="btn btn-xs btn-danger" href="javascript:;" onClick="delete_job()">Delete</a>
                 
                  </div>-->
            </div>
            <!-- END Resume detail -->


            <!-- Resume detail -->
            <?php $count_in++;?>
            <!-- END Resume detail -->
          <?php 
		  if($count_in==2){
		  ?>  
          </div>
<?php }?>
          <?php }
			}}
		?>


          <!-- Page navigation -->
          <!--<nav class="text-center">
            <ul class="pagination">
              <li>
                <a aria-label="Previous" href="#">
                  <i class="ti-angle-right"></i>
                </a>
              </li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li>
                <a aria-label="Next" href="#">
                  <i class="ti-angle-left"></i>
                </a>
              </li>
            </ul>
          </nav>-->
          <!-- END Page navigation -->


        </div>
        <div class="pagination"><?php echo $create_links; ?></div>
      </section>
      
    </main>
    <!-- END Main container -->
    
    <script>
    function get_jobs_list(){
	
	var spe_id  =   $('#spe_id option:selected').val();
   var jos_username   = $('#jos_username').val();
    var location   = $('#location').val();
//	 var gender   = $('#gender').val();
 var gender =($('input[name=gender]:checked').val());
	
 var univ_id = [];
	
	  var checkedValue = null; 
var inputElements = document.getElementsByClassName('univ');
for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           checkedValue = inputElements[i].value;
		   univ_id.push(checkedValue);
		//    alert(checkedValue)
         
      }
}

	
	var array  =univ_id.join();
	  $('#univ_id_val').val(array);
   $.ajax({
	   url : "<?=base_url()?>Search_resume/filter_job_list",
	   dataType:"html",
	   type:"POST",
	   data:{univ_id: $('#univ_id_val').val(),jos_username:jos_username,location:location,gender:gender,'spe_id':spe_id}
   }).done(function(msg)
   {
	
	   $('#job_list').html(msg);
   });
   
   return false;
		}
    </script>