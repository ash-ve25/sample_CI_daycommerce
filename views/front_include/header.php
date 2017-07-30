<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Baby Indian</title>
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url();?>assets/site/css/bootstrap.min.css" rel="stylesheet">
        <!-- Animate CSS -->
        <link href="<?php echo base_url();?>assets/site/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/site/css/fixes.css" rel="stylesheet">
        <!--Fancybox-->
        <link href="<?php echo base_url();?>assets/site/css/jquery.fancybox.css" rel="stylesheet">
        <!-- font-awesome-->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/site/fonts/font-awesome/css/font-awesome.min.css">
        <!--Owl Carousel-->
        <link href="<?php echo base_url();?>assets/site/css/owl.carousel.css" rel="stylesheet">
        <!--Chosen-->
        <link href="<?php echo base_url();?>assets/site/css/chosen.css" rel="stylesheet">
        <!--Time picker-->
        <link href="<?php echo base_url();?>assets/site/css/bootstrap-timepicker.min.css" rel="stylesheet">
        <!--Date picker-->
        <link href="<?php echo base_url();?>assets/site/css/datepicker.css" rel="stylesheet">
        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet">
        <!-- Main CSS -->
        <link href="<?php echo base_url();?>assets/global/plugins/alertify/css/alertify.core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/alertify/css/alertify.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/site/style.css" rel="stylesheet">
        <script>
            var site_url = "<?php echo base_url();?>";
        </script>
    </head>
    <body>
        <!--Preload-->
        <div class="preloader">
            <div class="preloader_image"></div>
        </div>
        <!-- Top bar -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="top-left">
                            <?php
                            if(empty($this->session->userdata('user_auth')))
                            {?>
                            <a href="<?php echo base_url();?>">
                                <img src="<?php echo base_url();?>assets/site/img/logo.png" class="logo-login" alt="Logo">
                            </a>
                            <?php
                            }?>
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <div class="top-right">
                            <ul>
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><a href="<?php echo base_url();?>baby">Baby</a></li>
                                <li><a href="<?php echo base_url();?>pregnant">Pregnant</a></li>
                                <li><a href="<?php echo base_url();?>mother">Mother</a></li>
                                <li><a href="<?php echo base_url();?>gallery">Gallery</a></li>
                                <li><a href="<?php echo base_url();?>e_book">E Book</a></li>
                                <?php
                                if(empty($this->session->userdata('user_auth')))
                                {?>
                                <li><a href="#" data-toggle="modal" data-target="#register">Registration</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#login" class="btn btn-primary">Signin</a></li>
                                <?php
                                }else{?>
                                <li class="dropdown"><a href="#" class="btn btn-primary">Account <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu dropdown-top">
    									<li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
    									<li><a href="<?php echo base_url();?>dashboard/setting">Setting</a></li>
    									<li><a href="<?php echo base_url();?>dashboard/logout">Logout</a></li>
    								</ul>
                                </li>
                                <?php
                                }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top bar -->
        <!-- Navigation -->
        <?php
        if(!empty($this->session->userdata('user_auth')))
        {?>
        <nav class="navbar navbar-default navbar-static-top" data-spy="affix">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <a href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>assets/site/img/logo.png" class="logo" alt="Logo">
                        </a>
                    </div>
                    <div class="col-md-10 border-shadow">
                        <div class="navbar-header page-scroll">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                            </button>
                            <a class="navbar-brand" href="index-2.html"></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="<?php if(isset($active) && $active == 'dashboard'){echo 'active';}?>"><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
                                <!-- <li class="<?php if(isset($active) && $active == 'recipe'){echo 'active';}?>"><a href="<?php echo base_url();?>dashboard/recipe">Recipe</a></li> -->
                                <li class="<?php if(isset($active) && $active == 'recipe'){echo 'active';}?>"><a href="<?php echo base_url();?>dashboard/recipe_list">Diet</a></li>
                                <li class="<?php if(isset($active) && $active == 'personalise'){echo 'active';}?>"><a href="<?php echo base_url();?>dashboard/personalise">Personalise</a></li>
                                <li class="<?php if(isset($active) && $active == 'yoga'){echo 'active';}?>"><a href="<?php echo base_url();?>dashboard/yoga">Yoga</a></li>
                                <li class="<?php if(isset($active) && $active == 'history'){echo 'active';}?>"><a href="<?php echo base_url();?>dashboard/history">History</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <?php
        }
        ?>
