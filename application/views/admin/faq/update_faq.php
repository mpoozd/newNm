<div class="row ">
    <div class="col-md-12">
    
    <?php if(validation_errors() != false) {?>  
        <div class="alert alert-danger alert-dismissable">
       		<button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
           		<?php echo validation_errors(); ?>
        </div>
     <?php 
	 } ?>
     
    
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    
                    <span class="caption-subject font-dark bold uppercase"><?php echo $table_title ?></span>
                </div>
                
            </div>
            <div class="portlet-body">
               
            
                <form role="form" class="form-horizontal" method="post" action="">
                 
                                     
                   <div class="form-group">
                                                <label class="col-md-2 control-label">Name</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="ftype_name">
                                                        <option value="">Select Question Type</option>
                                                        <?php $selected = "selected"; foreach ($ftype_name as $ftype_name_row) { ?>
<option value="<?php echo $ftype_name_row['ftype_id'] ?>"<?php if ($this->input->post('ftype_name') == $ftype_name_row['ftype_id']) {echo $selected;} else if ($faq['faq_type_id'] == $ftype_name_row['ftype_id']){ echo $selected; } ?> ><?php echo $ftype_name_row['ftype_name'] ?></option>
                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="">Question</label>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                
                                <input type="text" name="question" value="<?php if($this->input->post("question") != ""){ echo $this->input->post("question"); } else { echo $faq['question']; } ?>" placeholder="Question" class="form-control"> </div>
                           
                        </div>
                    </div>
                    
                                        
                    <div class="form-group">
                        <label class="col-md-2 control-label">Answer</label>
                        <div class="col-md-6">
                            <textarea id="page_content" name="answer" placeholder="Answer" rows="3" class="form-control"><?php if($this->input->post("answer") != ""){ echo $this->input->post("answer"); }  else { echo $faq['answer']; }?></textarea>
                        </div>
                    </div>
                 
                    
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn green" type="submit">Update</button>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>


<script type="text/javascript">
	   
	   				CKEDITOR.replace( 'page_content', 
				{				
filebrowserBrowseUrl :      '<?=base_url()?>ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?Type=Images',
filebrowserFlashBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?Type=Flash',
filebrowserUploadUrl :      '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});

	   
	   </script> 