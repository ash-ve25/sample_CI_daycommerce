<head>

	<link href="./css/main.min.css" rel="stylesheet" type="text/css">
    <script src="./js/run_prettify.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
    <script src="./js/jquery.ui.touch-punch.min.js"></script>
    <script src="./js/functions.js"></script>

    <!-- MA5 Slider-->
    <link href="./css/ma5slider.min.css" rel="stylesheet" type="text/css">
    <script src="./js/ma5slider.min.js"></script>
</head>
<script>
        $(window).on('load', function () {
            $('.ma5slider').ma5slider();
            // Methods
            $('#example-34').ma5slider('goToSlide', 3);
            // Calls
            $('#example-34').on('ma5.animationStart', function () {
                console.log('event animationStart');
            });
            $('#example-34').on('ma5.animationEnd', function () {
                console.log('event animationEnd');
            });
            $('#example-34').on('ma5.firstSlide', function () {
                console.log('event firstSlide');
            });
            $('#example-34').on('ma5.lastSlide', function () {
                console.log('event lastSlide');
            });
            $('#example-34').on('ma5.activeSlide', function (event, slide) {
                console.log( 'event activeSlide: ' + slide );
            });
        });
    </script>
<!-- Page Title-->

	<!--end page-title-->

	<!-- Gallery -->
	<section class="section-padding">
		<div class="container">
			<?php $this->load->view('front_include/intro');?>
			<div class="row">
				<div class="col-xs-12">
					<p id="date">Date : 01st May 2017</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 custom">
					<!-- <div class="title-block text-center">
						<h1>Lisa Gallery</h1>
						<div class="line-block">
							<span class="bullet"><i class="fa fa-leaf"></i></span>
						</div>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru exercit</p>
					</div> -->

					<div class="col-md-9 left-top-content">
						<p id="day-link">
							<span style="color: black;"><a href="#">Sunday</a></span>
							<span><a href="#" style="color: black">Monday</a></span>
							<span><a href="#" style="color: black">Tuesday</a></span>
							<span><a href="#" style="color: black">Wednesday</a></span>
							<span><a href="#" style="color: black">Thursday</a></span>
							<span><a href="#" style="color: black">Friday</a></span>
							<span><a href="#" style="color: black">Saturday</a></span>
						</p>
					</div>
					<div class="col-md-3 right-top-content">
						<!-- <p id="time"> -->
							<span>Time</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span>Category</span>
						<!-- </p> -->
					</div>

				</div>
			</div>
			<br><br><br>
			<div class="row" style="border-left: #21DD82 10px solid;">
				<div class="col-xs-12">
				<p id="y-head">It is a long eastiblished fact that a reader will be distracted by the readable.</p>
				<p>5 Minutes</p>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>
					<ul class="gallery-item column-3">
						<div id="example-25" class="ma5slider hover-navs hover-dots anim-horizontal outside-dots center-dots inside-navs loop-mode autoplay" data-tempo="3500">
					        <div class="slides">
					            <a href="#slide-1"><img src="./images/09.jpg" alt=""></a>
					            <a href="#slide-10"><img src="./images/10.jpg" alt=""></a>
					            <a href="#slide-2" data-ma5-anim="anim-vertical"><img src="./images/01.jpg" alt=""></a>
					            <a href="#slide-3" data-ma5-anim="anim-fade"><img src="./images/03.jpg" alt=""></a>
					            <a href="#slide-4"><img src="./images/04.jpg" alt=""></a>
					            <a href="#slide-5" data-ma5-anim="anim-vertical"><img src="./images/02.jpg" alt=""></a>
					            <a href="#slide-6" data-ma5-anim="anim-fade"><img src="./images/05.jpg" alt=""></a>
					            <a href="#slide-7"><img src="./images/06.jpg" alt=""></a>
					            <a href="#slide-8" data-ma5-anim="anim-vertical"><img src="./images/07.jpg" alt=""></a>
					            <a href="#slide-9" data-ma5-anim="anim-fade"><img src="./images/08.jpg" alt=""></a>
					        </div>
    					</div>
					</ul><br>
					<h1>Step 5/9 : Hold your hands up</h1>
				</div>
				<!-- <p>Step 5/9 : Hold your hands up</p> -->
			</div>

			<!-- Gallery 2 -->

			<!-- <div class="row" style="border-left: #A00EA2 10px solid;">
				<div class="col-xs-12">
					<ul class="gallery-item column-3">
						<li>
							<div class="post_thumb">
								<img src="img/gallery/1.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/1.jpg" class="fancybox" title="Gallery Image 1"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
						<li>
							<div class="post_thumb">
								<img src="img/gallery/2.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/2.jpg" class="fancybox" title="Gallery Image 2"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
						<li>
							<div class="post_thumb">
								<img src="img/gallery/3.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/3.jpg" class="fancybox" title="Gallery Image 3"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
						<li>
							<div class="post_thumb">
								<img src="img/gallery/4.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/4.jpg" class="fancybox" title="Gallery Image 4"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
						<li>
							<div class="post_thumb">
								<img src="img/gallery/5.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/5.jpg" class="fancybox" title="Gallery Image 5"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
						<li>
							<div class="post_thumb">
								<img src="img/gallery/6.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/6.jpg" class="fancybox" title="Gallery Image 6"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div> -->

			<!-- Gallery 3 -->


			<!-- <div class="row" style="border-left: #F9820F 10px solid;">
				<div class="col-xs-12">
					<ul class="gallery-item column-3">
						<li>
							<div class="post_thumb">
								<img src="img/gallery/1.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/1.jpg" class="fancybox" title="Gallery Image 1"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
						<li>
							<div class="post_thumb">
								<img src="img/gallery/2.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/2.jpg" class="fancybox" title="Gallery Image 2"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
						<li>
							<div class="post_thumb">
								<img src="img/gallery/3.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/3.jpg" class="fancybox" title="Gallery Image 3"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
						<li>
							<div class="post_thumb">
								<img src="img/gallery/4.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/4.jpg" class="fancybox" title="Gallery Image 4"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
						<li>
							<div class="post_thumb">
								<img src="img/gallery/5.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/5.jpg" class="fancybox" title="Gallery Image 5"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
						<li>
							<div class="post_thumb">
								<img src="img/gallery/6.jpg" alt="">
								<div class="gallery-overlay">
									<a href="img/gallery/6.jpg" class="fancybox" title="Gallery Image 6"><i class="fa fa-camera"></i></a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div> -->

			<!-- Gallery 4 -->
			<br><br><br>

			<!-- <div class="row">
				<div class="col-xs-12">
					<div class="load-more text-center">
						<a href="#" class="btn btn-primary">View All</a>
					</div>
				</div>
			</div> -->
		</div>

	</section>
	<!-- End Gallery -->
