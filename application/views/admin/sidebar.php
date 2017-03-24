<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 0px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            
            
           <li class="nav-item <?php if($class == "dashboard"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/dashboard" class="nav-link ">
                    <span class="title">Dashboard</span>
                </a>
            </li>
            
              
            
            <li class="nav-item <?php if($class == "account"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/accounts" class="nav-link ">
                    <span class="title">Manage Admin Accounts</span>
                </a>
            </li>
            
            <li class="nav-item <?php if($class == "users"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/jobseeker" class="nav-link ">
                    <span class="title">Manage Users/Candidates</span>
                </a>
            </li>
            
             <li class="nav-item <?php if($class == "rsume"){?> active <?php } ?>">
                <a href="<?=base_url()?>admin/resume" class="nav-link ">
                    <span class="title">Manage Resume</span>
                </a>
            </li>

			<li class="nav-item <?php if($class == "jobs"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/jobs" class="nav-link ">
                    <span class="title">Manage Jobs</span>
                </a>
            </li>
            
            <li class="nav-item <?php if($class == "orders"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/orders" class="nav-link ">
                    <span class="title">Manage Orders</span>
                </a>
            </li>
            
            <li class="nav-item <?php if($class == "companies"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/companies" class="nav-link ">
                    <span class="title">Manage Companies</span>
                </a>
            </li>
            
             <li class="nav-item <?php if($class == "pricing"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/pricing" class="nav-link ">
                    <span class="title">Manage Pricing Plans</span>
                </a>
            </li>
            
                
           
            
           <?php /*?> <li class="nav-item <?php if($class == "pricing"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/payments" class="nav-link ">
                    <span class="title">Manage Payments</span>
                </a>
            </li><?php */?>
            
            <li class="nav-item <?php if($class == "categories"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/categories" class="nav-link ">
                    <span class="title">Manage Categories</span>
                </a>
            </li>
            
             <li class="nav-item <?php if($class == "page_listing"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/pages" class="nav-link ">
                    <span class="title">Manage Content Pages</span>
                </a>
            </li>

			<li class="nav-item <?php if($class == "email"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/emails" class="nav-link ">
                    <span class="title">Manage Email Template</span>
                </a>
            </li>

			<li class="nav-item <?php if($class == "settings"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/settings" class="nav-link ">
                    <span class="title">Manage Site Settings</span>
                </a>
            </li>
            
             <li class="nav-item <?php if($class == "newsletter"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/newsletters" class="nav-link ">
                    <span class="title">Manage Newsletters</span>
                </a>
            </li>
            
             <li class="nav-item <?php if($class == "subscribers"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/subscribers" class="nav-link ">
                    <span class="title">Manage Subscribers</span>
                </a>
            </li>
            
            
            
            <li class="nav-item <?php if($class == "faq"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/faq" class="nav-link ">
                    <span class="title">Manage FAQs</span>
                </a>
            </li>
           
           <li class="nav-item <?php if($class == "notification"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/notification" class="nav-link ">
                    <span class="title">Send Notification Messages</span>
                </a>
            </li>
            
            
             <li class="nav-item <?php if($class == "language"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/manage_language" class="nav-link ">
                    <span class="title">Manage Language</span>
                </a>
            </li>
            
            
           
            
            
            <li class="nav-item  <?php if($class == "universities" || $class == "specialists" || $class == "cities" || $class == "industry" || $class == "job_type" || $class == "faq_type" || $class == "company_type" || $class == "portal_tags" || $class == "company_employer" || $class == "gender" || $class == "graduation_year"){?> active <?php } ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    
                    <span class="title">Manage Content Fields</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    
                     <li class="nav-item <?php if($class == "universities"){?> active <?php } ?>">
                <a href="<?=base_url()?>admin/universities" class="nav-link ">
                    <span class="title">Manage Universities</span>
                </a>
            </li>
            
            <li class="nav-item <?php if($class == "specialists"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/specialists" class="nav-link ">
                    <span class="title">Manage Specialists</span>
                </a>
            </li>
            
            <li class="nav-item <?php if($class == "cities"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/cities" class="nav-link ">
                    <span class="title">Manage Cities</span>
                </a>
            </li>
            
            <li class="nav-item <?php if($class == "industry"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/industry" class="nav-link ">
                    <span class="title">Manage Industry</span>
                </a>
            </li>
            
            <li class="nav-item <?php if($class == "job_type"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/job_type" class="nav-link ">
                    <span class="title">Manage Job Types</span>
                </a>
                
            </li>
            
            <li class="nav-item <?php if($class == "faq_type"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/faq_type" class="nav-link ">
                    <span class="title">Manage Faq Type</span>
                </a>
            </li>
            
             <li class="nav-item <?php if($class == "company_type"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/company_type" class="nav-link ">
                    <span class="title">Manage Company Type</span>
                </a>
            </li>
            
            <li class="nav-item <?php if($class == "portal_tags"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/portal_tags" class="nav-link ">
                    <span class="title">Manage Portal Tags</span>
                </a>
            </li>
            
            <li class="nav-item <?php if($class == "company_employer"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/company_employer" class="nav-link ">
                    <span class="title">Manage Company Employer</span>
                </a>
            </li>
            
            <li class="nav-item <?php if($class == "gender"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/gender" class="nav-link ">
                    <span class="title">Manage Gender</span>
                </a>
            </li>
            
            <li class="nav-item <?php if($class == "graduation_year"){?> active <?php } ?> ">
                <a href="<?=base_url()?>admin/graduation_year" class="nav-link ">
                    <span class="title">Manage Graduation Year </span>
                </a>
            </li>
                    
                   
                </ul>
            </li>
            
          
            
            
            
            
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>