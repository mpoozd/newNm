<script type="text/javascript">
function subscribe(){
 $.ajax({
 	type: "POST",url: "<?=base_url()?>Subscriber/index/",
	data : $('#sub_form').serialize(), 
	cache: false,success: function(html){
	//alert(html);
	var r=JSON.parse(html);
	var bo=r['log_error'];
	
	if( bo=='no'){
		
		var tag = $(".success_sub");
		$('#sub_error').html(jQuery('').text());
		$("#success_sub_msg").show();
       $('html,body').animate({scrollTop: tag.offset().top},'slow');
	   
		//document.location.href='<?=base_url()?>home';
	
	}
	else{
	
		$('#sub_error').html(jQuery(bo).text());
		
	}
	}
});
return false;
}

</script>
<section class="bg-img text-center" style="background-image: url(<?=base_url()?>assets/img/bg-facts.jpg)">
        <div class="container">
          <h2><strong><?=$this->lang->line('sub_title')?></strong></h2>
          <h6 class="font-alt"><?=$this->lang->line('sub_title_below')?></h6>
          <br><br>
          
          <form class="form-subscribe" action="" method="post" id="sub_form" name="sub_form" >
            <div class="input-group">
              <input type="text" class="form-control input-lg" name="sub_email" placeholder="Your eamil address">
              <span class="input-group-btn">
                <button class="btn btn-success btn-lg" type="submit" onClick="return subscribe();"><?=$this->lang->line('sub_title')?></button>
              </span>
            </div>
          </form><div id="sub_error" style="color:#ef4d42;"></div>
        </div>
      </section>