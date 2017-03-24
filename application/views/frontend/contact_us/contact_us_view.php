<script type="text/javascript">
 function contact_us(){

 $.ajax({
 	type: "POST",url: "<?=base_url()?>Contact_us/contact",
	data : $('#cont_form').serialize(), 
	cache: false,success: function(html){
	
	var r=JSON.parse(html);
	var bo=r['log_error'];
	
	if( bo=='no'){
		var tag = $(".success_sub");
		$("#success_sub_msg").show();
		$('#cont_name').val('');
		$('#cont_email').val('');
		$('#cont_text').val('');
       $('html,body').animate({scrollTop: tag.offset().top},'slow');
		
	}
	else{
		$('#con_error').html(bo);
		
	}
	}
});
return false;
}
</script><section>
        <div class="container">

          <div class="row">
            <div class="col-sm-12 col-md-8">
             <a href="#" class="success_sub"></a>  
<div style="display:none;" id="success_sub_msg" role="alert" class="alert alert-success"><?=$this->lang->line('success_contact')?></div>
              <h4><?=$this->lang->line('contact_form')?></h4>
              <form name="cont_form" id="cont_form"><div id="con_error" style="color:#ef4d42;"></div>
                <div class="form-group">
                  <input type="text" class="form-control input-lg" id="cont_name" name="cont_name" placeholder="الاسم">
                </div>

                <div class="form-group">
                  <input type="email" class="form-control input-lg" id="cont_email" name="cont_email" placeholder="البريد الإلكتروني">
                </div>

                <div class="form-group">
                  <textarea class="form-control" name="cont_text" id="cont_text" rows="5" placeholder="نص الرسالة"></textarea>
                </div>
                
                <button type="submit" onClick="return contact_us();" class="btn btn-primary"><?=$this->lang->line('send')?></button>
              </form>
               </div>

            <?php 
			
			$cont_details              = $this->General_model->get_field_value2(array('page_id'=>6),'page_content','pages');
			echo $cont_details;
			?>
          </div>

        </div>
      </section>