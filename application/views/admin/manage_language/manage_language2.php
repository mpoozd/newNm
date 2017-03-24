<div class="row">
            <div class="col-lg-12">
            
     <?php if(validation_errors() != false) {?>  
        <div class="alert alert-block alert-danger fade in">
            <button type="button" class="close close-sm" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
           		<?php echo validation_errors(); ?>
        </div>
     <?php 
	 } ?>
     
          
   <?php if($this->session->flashdata('success_msg') != "") {?>    
    <div class="alert alert-success alert-block fade in">
    	<button type="button" class="close close-sm" data-dismiss="alert">
    		<i class="fa fa-times"></i>
    	</button>
    	<h4> <i class="icon-ok-sign"></i> Success!</h4>
    	<p><?php echo $this->session->flashdata('success_msg'); ?></p>
    </div>
     <?php 
	 	$this->session->set_flashdata('success_msg', "");
	 } ?>
            
            
                    <section class="panel">
                        <header class="panel-heading">
                            Language Settings
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post" enctype="multipart/form-data" action="<?=base_url()?>admin/manage_language/update_language_file">
                                 
                                <?php
                                	for($i = 1; $i <= count($file_data) - 3; $i++){
										$str = $file_data[$i];
										$str_data =	explode('=',$str);
										$label =	explode("'",$str_data[0]);
									//	echo @$label['1'].'---------'.@$str_data[1]."<br>";
								?>             
                                
                          
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=$label['1']?></label>
                                    <input type="text" name="lang[]" value="<?=@str_replace("'",'',$str_data[1])?>" placeholder="Percentage" id="" class="form-control">
                                    <input type="hidden" name="string_first[]" value="<?=$str_data[0]?>">
                                </div>
                                
                                 <?php } ?>
                                 
                                
                                  
                                
                              
                                <input type="submit" class="btn btn-info" value="Update Language" />
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>
        

        