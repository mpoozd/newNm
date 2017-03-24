  <form name="step4_form" id="step4_form" method="post" >
  
  <header class="page-header">
      <div class="container page-name">
         <h1 class="text-center"><?=$this->lang->line('upgrade')?></h1>
        <p class="lead text-center"><?=$this->lang->line('below_up')?></p>
     <div class="container">
      
        <div class="row">
        
	<p  class="lead text-center" style="color:#17C5D4"> New Pacakge Details are.</p>
    
    <?php if($pack_info->num_rows()>0){
		$r=$pack_info->row();
		}?>
       <div align="center">
        <h6 style="color:#000000"><b>Name</b> &nbsp; <?=$r->pp_name?></h6>
   <h6 style="color:#000000"><b>Featured</b>&nbsp; <?=$r->pp_featured_job_post_number?></h6>
   <h6 style="color:#000000"><b>Job Posting </b>&nbsp;<?=$r->pp_job_post_number?></h6>
    <h6 style="color:#000000"><b>Days listing </b>&nbsp;<?=$r->pp_days_listing_duration?></h6>
    
    
      <?php if($r->pp_show_contact==1){
				  $str='Yes';
				  }else{
					    $str='No';
					  }?>
               
                 <h6 style="color:#000000"><b>Resume Search </b>&nbsp;<?=$str?></h6>
               <?php if($r->pp_show_contact==1)
			   {
			   ?>
                
                 <h6 style="color:#000000"><b>Can Contact </b>&nbsp;<?=$r->pp_num_of_resume?> </h6>
                <?php }?>
      


 


</div>
      </div>
 <input type="hidden" name="pp_id" value="<?=$r->pp_id?>">
        <input type="hidden" name="pp_name" value="<?=$r->pp_name?>">
        
           <input type="hidden" name="pp_job_post_number" value="<?=$r->pp_job_post_number?>">

        <input type="hidden" name="pp_featured_job_post_number" value="<?=$r->pp_featured_job_post_number?>">

        <input type="hidden" name="pp_days_listing_duration" value="<?=$r->pp_days_listing_duration?>">
        
         <input type="hidden" name="pp_show_contact" value="<?=$r->pp_show_contact?>">
          <input type="hidden" name="pp_num_of_resume" value="<?=$r->pp_num_of_resume?>">

<p class="text-center"><button class="btn btn-success btn-xl btn-round" onClick="return confirm_pacakge();">Confirm</button></p>
      </div>   </header>
			 
             </form>
             <script>
          function confirm_pacakge(){
			
				

	var formData = new FormData($("#step4_form")[0]);
 $.ajax({
	   type: "POST",
        url:"<?=base_url()?>Package/confirm",
        data: formData,
        contentType: false,
        processData: false,
        encode: true,
        async: false,
        cache: false,
 		success: function(html){
	
	var r=JSON.parse(html);
	var bo=r['log_error'];
	
	if( bo=='no'){
			document.location.href='<?=base_url()?>Package';
	
	}
	
	}
});
return false;
			}
			</script>