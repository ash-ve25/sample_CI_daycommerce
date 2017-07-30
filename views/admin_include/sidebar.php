<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search  " action="#" method="POST">
                    <a href="javascript:;" class="remove">
                    <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i>
                        </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item start active open">
                <a href="<?php echo base_url();?>admin/dashboard" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Home</span>
                <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-fire"></i>
                    <span class="title">Recipe</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="<?php echo base_url();?>admin/ingredients" class="nav-link ">
                            <span class="title">Add Ingredients</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="<?php echo base_url();?>admin/recipe_cat" class="nav-link ">
                            <span class="title">Add Recipe Category</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="<?php echo base_url();?>admin/recipe" class="nav-link ">
                            <span class="title">Add Recipe</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url();?>admin/users" class="nav-link nav-toggle">
                <i class="icon-user"></i>
                <span class="title">Front Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url();?>admin/profile" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title">Setting</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url();?>admin/logout" class="nav-link nav-toggle">
                <i class="icon-key"></i>
                <span class="title">Logout</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->

<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" id="content_load">
