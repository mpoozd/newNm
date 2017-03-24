<?php
				 $newphrase='' ;
				 $name='';
				 if($page_data->num_rows()>0){
										$row       = $page_data->row();
										$str       = $row->page_content;
										$url       = base_url();
										$find      = '__base_url__';
										
										$newphrase = str_replace($find, $url, $str);?>
                                        
                                       
                          
                                <p><?=$row->page_content?></p>
                           
                    
			
			<?  }else{?>
			
					<div class="auto_content">
                     <div class="howdoesWork clearfix">
                            <h1><strong></strong></h1>
                                <p></p>
                           
                     </div>
                 </div>
		
			
			<? }
									?>