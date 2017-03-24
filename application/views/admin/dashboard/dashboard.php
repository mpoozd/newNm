<?php if($this->session->flashdata('admin_success_msg') != "") {?>  
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
        <?php echo $this->session->flashdata('admin_success_msg'); ?>
    </div>
<?php 
$this->session->set_flashdata('admin_success_msg', "");
 } ?>  

			<h3 class="page-title"> Total Sales  </h3>

			<div class="row">
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 blue">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?php echo get_settings_currency().$today_sales?>" data-counter="counterup"><?php echo get_settings_currency().$today_sales?></span>
                            </div>
                            <div class="desc"> Today </div>
                        </div>
                    </a>
                </div>
                       
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 red">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?php echo get_settings_currency().$week_sales?>" data-counter="counterup"><?php echo get_settings_currency().$week_sales?></span> </div>
                            <div class="desc"> Weekly </div>
                        </div>
                    </a>
                </div>
                        
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 green">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?php echo get_settings_currency().$month_sales?>" data-counter="counterup"><?php echo get_settings_currency().$month_sales?></span>
                            </div>
                            <div class="desc"> Monthly </div>
                        </div>
                    </a>
                </div>
            </div>
            
            
            <h3 class="page-title"> Job Seeker Registers  </h3>

			<div class="row">
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 blue">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?=$today_std_reg?>" data-counter="counterup"><?=$today_std_reg?></span>
                            </div>
                            <div class="desc"> Today </div>
                        </div>
                    </a>
                </div>
                       
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 red">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?=$week_std_reg?>" data-counter="counterup"><?=$week_std_reg?></span> </div>
                            <div class="desc"> Weekly </div>
                        </div>
                    </a>
                </div>
                        
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 green">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?=$month_std_reg?>" data-counter="counterup"><?=$month_std_reg?></span>
                            </div>
                            <div class="desc"> Monthly </div>
                        </div>
                    </a>
                </div>
            </div>
            
            
            <h3 class="page-title"> Companies Registers  </h3>

			<div class="row">
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 blue">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?=$today_com_reg?>" data-counter="counterup"><?=$today_com_reg?></span>
                            </div>
                            <div class="desc"> Today </div>
                        </div>
                    </a>
                </div>
                       
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 red">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?=$week_com_reg?>" data-counter="counterup"><?=$week_com_reg?></span> </div>
                            <div class="desc"> Weekly </div>
                        </div>
                    </a>
                </div>
                        
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 green">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?=$month_com_reg?>" data-counter="counterup"><?=$month_com_reg?></span>
                            </div>
                            <div class="desc"> Monthly </div>
                        </div>
                    </a>
                </div>
            </div>
            
            
            <h3 class="page-title"> Jobs Posted  </h3>

			<div class="row">
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 blue">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?=$today_jobs?>" data-counter="counterup"><?=$today_jobs?></span>
                            </div>
                            <div class="desc"> Today </div>
                        </div>
                    </a>
                </div>
                       
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 red">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?=$week_jobs?>" data-counter="counterup"><?=$week_jobs?></span> </div>
                            <div class="desc"> Weekly </div>
                        </div>
                    </a>
                </div>
                        
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="#" class="dashboard-stat dashboard-stat-v2 green">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-value="<?=$month_jobs?>" data-counter="counterup"><?=$month_jobs?></span>
                            </div>
                            <div class="desc"> Monthly </div>
                        </div>
                    </a>
                </div>
            </div>