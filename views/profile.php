<!-- BEGIN PAGE TITLE-->
<div class="page-bar">
    <h1 class="page-title"> User Profile<small></small></h1>
    <ul class="page-breadcrumb">
        <li><a href="">Dashboard</a><i class="fa fa-circle"></i></li>
        <li><span>User</span></li>
    </ul>
</div>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row middle-content">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet ">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img  src="<?php echo base_url();?>/assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> <?php echo $rows['name'];?> </div>
                    <div class="profile-usertitle-job"> Admin </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <!-- <ul class="nav">
                        <li>
                            <a href="">
                                <i class="icon-home"></i> Overview </a>
                        </li>
                        <li class="active">
                            <a href="page_user_profile_1_account.html">
                                <i class="icon-settings"></i> Account Settings </a>
                        </li>
                    </ul> -->
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- Account -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                </li>
                                <li>
                                    <a href="#tab_1_2" data-toggle="tab">Change Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <form role="form" action="<?php echo site_url('admin/profile_update');?>" method="post" class="profileForm">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <input type="text" value="<?php echo $rows['name'];?>" name="name" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="email" value="<?php echo $rows['email'];?>" name="email" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Phone Number</label>
                                            <input type="text" value="<?php echo $rows['phone'];?>" name="phone" class="form-control"/>
                                        </div>
                                        <div class="margiv-top-10">
                                            <button type="button" id="profile" class="btn green"> Update</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    <form action="<?php echo site_url('admin/change_password');?>" class="resetForm" method="post">
                                        <div class="form-group">
                                            <label class="control-label">Current Password</label>
                                            <input type="password" name="oldpassword" class="form-control"  />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">New Password</label>
                                            <input type="password" name="password" class="form-control"  required="required"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Re-type New Password</label>
                                            <input type="password" name="cpassword" class="form-control"  required="required"/>
                                        </div>
                                        <div class="margin-top-10">
                                            <button type="button" id="resetpwd" class="btn green"> Change Password</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CHANGE PASSWORD TAB -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Account -->
    </div>
</div>
<script src="<?php echo base_url();?>assets/global/plugins/alertify/script/alertify.min.js" type="text/javascript"></script>
<script>
$(document).ready(function()
{
    $("#resetpwd").click(function()
    {
        var form_data = $('.resetForm').serialize();
        var form_Action = $('.resetForm').attr('action');

        jQuery.ajax({
            type: "POST",
            url:  form_Action,
            dataType: 'json',
            data: form_data,
            success: function(res) {
                if (res.error) {
                    alertify.error(res.message);
                } else {
                    $('.resetForm')[0].reset();
                    alertify.success(res.message);
                    return false;
                }
            }
        });
    });

    $("#profile").click(function()
    {
        var form_data = $('.profileForm').serialize();
        var form_Action = $('.profileForm').attr('action');

        jQuery.ajax({
            type: "POST",
            url:  form_Action,
            dataType: 'json',
            data: form_data,
            success: function(res) {
                if (res.error) {
                    alertify.error(res.message);
                } else {
                    $('.profileForm')[0].reset();
                    alertify.success(res.message);
                    window.setTimeout(function () {
                    location.reload();
                    },2000);
                    return false;
                }
            }
        });
    });
});
</script>
