<div class="auto_content">
                       <div class="faqoutermain clearfix">
                 <h1>Frequently <strong>Asked Question</strong></h1>
                       <div class="faqsOuter askleft">
                       		
                            <div class="headingOuter clearfix">
                            	<h6 style="color:#e4333b">General </h6>
                                 
                            </div>
                            <ul>
                            <?php if($gen_data->num_rows()){
								foreach($gen_data->result() as $ro_g){?>
								
                            	<li>
                                	<div class="faqInner">
                                    	<h5><?=$ro_g->faq_q?></h5>
                                            <p><?=$ro_g->faq_text?></p>
                                    </div>
                                </li>
                               	<? }
								}
							?>
                               
                            </ul>
                       </div>
                       <div class="faqsOuter">
                       		 
                            <div class="headingOuter clearfix">
                            	 
                                <h6 style="color:#e4333b">Selling a Lease</h6>
                                
                            </div>
                            <ul>
                            	
                                
                                  <?php if($sel_data->num_rows()){
								foreach($sel_data->result() as $ro_s){?>
								
                            	<li>
                                	<div class="faqInner">
                                    	<h5><?=$ro_s->faq_q?></h5>
                                            <p><?=$ro_s->faq_text?></p>
                                    </div>
                                </li>
                               	<? }
								}
							?>
                               
                            </ul>
                       </div>
                       <div class="faqsOuter">
                       		 
                            <div class="headingOuter clearfix">
                             
                                <h6 style="color:#e4333b">Taking on a lease</h6>
                            </div>
                            <ul>
                              <?php if($tk_data->num_rows()){
								foreach($tk_data->result() as $ro_t){?>
								
                            	<li>
                                	<div class="faqInner">
                                    	<h5><?=$ro_t->faq_q?></h5>
                                            <p><?=$ro_t->faq_text?></p>
                                    </div>
                                </li>
                               	<? }
								}
							?>
                            	
                               
                            </ul>
                       </div>
                       </div>
                 </div>