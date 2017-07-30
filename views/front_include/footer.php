<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="footer-widget">
                        <img src="<?php echo base_url();?>assets/site/img/logo_dark.png">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="footer-widget footer-links">
                        <h3 class="links">Quick Links</h3>
						<div class="footer-link-border"></div>
                        <ul>
                            <li><a href="#">Quick Links</a></li>
                            <li><a href="#">Quick Links</a></li>
                            <li><a href="#">Quick Links</a></li>
                            <li><a href="#">Quick Links</a></li>
                        </ul>
                    </div>
                    <div class="footer-widget footer-links">
                        <h3 class="links">Quick Links</h3>
						<div class="footer-link-border"></div>
                        <ul>
                            <li><a href="#">Quick Links</a></li>
                            <li><a href="#">Quick Links</a></li>
                            <li><a href="#">Quick Links</a></li>
                            <li><a href="#">Quick Links</a></li>
                        </ul>
                    </div>
                    <div class="footer-widget footer-links">
                        <h3 class="links">Quick Links</h3>
						<div class="footer-link-border"></div>
                        <ul>
                            <li><a href="#">Quick Links</a></li>
                            <li><a href="#">Quick Links</a></li>
                            <li><a href="#">Quick Links</a></li>
                            <li><a href="#">Quick Links</a></li>
                        </ul>
                    </div>
                    <div class="footer-widget footer-links">
                        <h3 class="links">Social Media</h3>
						<div class="footer-link-border"></div>
                        <ul class="social-media resize">
                            <li>
                                <span><a href="#"><i class="fa fa-facebook"></i></a></span>
                                <span><a href="#">Facebook</a></span>
                            </li>
                            <li>
                                <span><a href="#"><i class="fa fa-twitter"></i></a></span>
                                <span><a href="#">Twitter</a></span>
                            </li>
                            <li>
                                <span><a href="#"><i class="fa fa-google-plus"></i></a></span>
                                <span><a href="#">Google+</a></span>
                            </li>
                            <li>
                                <span><a href="#"><i class="fa fa-youtube"></i></a></span>
                                <span><a href="#">Youtube</a></span>
                            </li>
                            <li>
                                <span><a href="#"><i class="fa fa-linkedin"></i></a></span>
                                <span><a href="#">LinkedIn</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="copyright">
                        <p>&copy;Ccopyrights 2016 reserved IndiaHinduBaby.com</p>
                    </div>
                </div>
				<div class="col-xs-6">
                    <div class="copyright text-right">
                        <p>&copy;For any quries write to enquiry@indianhindubaby.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Bact to top Section-->
<div class="back-top">
    <a href="#"><i class="fa fa-angle-up"></i></a>
</div>
<?php
if(empty($this->session->userdata('user_auth')))
{?>
<!-- Modal Login-->
<div class="modal fade modal-vcenter" id="login" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2>Sign In</h2>
            </div>
            <div class="modal-body">
                <form class="user-signin" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Your Password">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="checkbox" name="date" placeholder="Your Password" id="remember">
                                <label for="remember">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <div class="submit-block text-right">
                        <a href="#" data-toggle="modal" data-target="#forget" class="btn btn-default" data-dismiss="modal">Forget Password</a>
                        <button type="submit" id="signin" class="btn btn-primary">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal forget password -->
<div class="modal fade modal-vcenter" id="forget" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2>Forget Password</h2>
            </div>
            <div class="modal-body">
                <form class="user-forget" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Your Email">
                    </div>
                    <div class="submit-block text-right">
                        <a href="#" data-toggle="modal" data-target="#login" class="btn btn-default" data-dismiss="modal">Sign In</a>
                        <button type="submit" id="forget" class="btn btn-primary">Get New Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Registration-->
<div class="modal fade modal-vcenter" id="register" role="dialog">
    <div class="modal-dialog signup-dialog-width" role="document">
        <div class="modal-content">
            <div class="modal-header signup-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</h2>
            </div>
            <div class="modal-body">
                <form class="subscribe-form-popup" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Enter Birth/Due Date</label>
                        <input type="text" class="form-control date-pic" name="date" placeholder="Enter Birth/Due Date">
                    </div>
                    <div class="submit-block text-right">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="button" class="btn btn-primary subscribe-btn" data-url='popup'>Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Thankyou-->
<div class="modal fade modal-vcenter" id="thankyou" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2>Registration</h2>
            </div> -->
            <div class="modal-body">
                <h1 class="text-center">Thank You</h1>
                <p class="text-center message"></p>
            </div>
        </div>
    </div>
</div>
<?php
}?>
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/site/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/alertify/script/alertify.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/site/js/custom-script.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/site/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/site/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/site/js/wow.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/site/js/jquery.mixitup.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/site/js/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/site/js/waypoints.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/site/js/jquery.counterup.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/site/js/newsticker.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?js?sensor=false&amp;key=AIzaSyCYI9QbpcEgmUSfnoBplXycjesknwlFW-w"></script>
<script src="<?php echo base_url();?>assets/site/js/gmap3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/site/js/jquery.stellar.min.js"></script>
<script src="<?php echo base_url();?>assets/site/js/chosen.jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/site/js/masonry.pkgd.js" type="text/javascript"></script>
<!-- <script src="<?php echo base_url();?>assets/site/js/bootstrap-timepicker.min.js" type="text/javascript"></script> -->
<script src="<?php echo base_url();?>assets/site/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/site/js/script.js" type="text/javascript"></script>
</body>
</html>
