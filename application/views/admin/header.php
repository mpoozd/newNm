<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo base_url() ?>admin/dashboard">
                <img src="<?php echo base_url() ?>/assets/admin/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        
					<? if(is_file(PATH_DIR.'uploads/admin_avatar/'.$this->session->userdata('admin_avatar'))){ ?>
                    	<img src="<?=base_url()?>uploads/admin_avatar/<?=$this->session->userdata('admin_avatar')?>" class="img-circle" alt="">
           			<? }else{ ?>
                        <img src="<?=base_url()?>assets/defaultavatar.jpg" class="img-circle" alt="">
                    <? } ?> 
                        <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('admin_name');?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?php echo base_url() ?>admin/profile">
                                <i class="icon-user"></i> My Profile </a>
                        </li>  
                        <li>
                            <a href="<?php echo base_url() ?>admin/settings">
                                <i class="icon-settings"></i> Settings    
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="<?php echo base_url() ?>admin/login/change_password">
                                <i class="icon-lock"></i> Change Password </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>admin/login/logout">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="">
                    <a href="<?php echo base_url() ?>admin/login/logout">
                        <i class="icon-logout"></i>
                    </a>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>