	<section class="section-padding">
		<div class="container left-pad-100">
			<?php $this->load->view('front_include/intro');?>
			<br>
			<div class="row">
				<div class="col-xs-12">
					<p id="date" style="font-size: 17px;">Date : <?php echo $today = date("F j, Y");?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 custom">
					<div class="col-md-9 left-top-content">
						<p id="day-link">
							<span><a href="#" class="active">Sunday</a></span>
							<span><a href="#">Monday</a></span>
							<span><a href="#">Tuesday</a></span>
							<span><a href="#">Wednesday</a></span>
							<span><a href="#">Thursday</a></span>
							<span><a href="#">Friday</a></span>
							<span><a href="#">Saturday</a></span>
						</p>
					</div>
					<div class="col-md-3 text-right right-top-content">
						<a href="#" class="btn btn-primary">Time</a>
						<a href="#" class="btn btn-primary">Category</a>
					</div>

				</div>
			</div>
			<br><br><br>
			<div class="user-post">
				<?php
				foreach($all_data as $category)
				{?>
					<div class="row border-green">
						<div class="point bg-green"></div>
						<div class="vertical-text"><?php echo $category['name']?></div>
						<div class="col-xs-12">
							<div class="masonry bordered">
								<?php
								foreach($category['category_post'] as $post)
								{
								?>
				                <div class="brick">
									<div class="media">
					                    <img src="<?php echo base_url();?>assets/site/img/recipe/1.jpg" class="media__image">
										<div class="media__body">
											<h2><?php echo $post['post_title'];?></h2>
											<div class="like-dislike">
												<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
												<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
											</div>
										</div>
									</div>
									<p class="content-head"><?php echo $post['post_title'];?></p>
									<p><?php echo $post['post_content'];?></p>
									<a href="<?php echo $post['guid'];?>" target="_blank">Know More</a>
				                </div>
								<?php
								}?>
				            </div>
						</div>
					</div>
					<br>
				<?php
				}
				?>
				<!-- <div class="row border-green">
					<div class="point bg-green"></div>
					<div class="vertical-text">Diet</div>
					<div class="col-xs-12">
						<div class="masonry bordered">
			                <div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/1.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<a href="#">Read Article</a>
			                </div>
							<div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/2.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<a href="#">Read Article</a>
			                </div>
							<div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/3.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<a href="#">Read Article</a>
			                </div>
							<div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/4.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<a href="#">Read Article</a>
			                </div>
							<div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/5.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<a href="#">Read Article</a>
			                </div>
							<div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/6.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<a href="#">Read Article</a>
			                </div>
			            </div>
					</div>
				</div>
				<br><br>
				<div class="row border-blue">
					<div class="point bg-blue"></div>
					<div class="vertical-text">Yoga</div>
					<div class="col-xs-12">
						<div class="masonry bordered">
							<div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/1.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								<a href="#">Read Article</a>
			                </div>
							<div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/2.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<a href="#">Read Article</a>
			                </div>
							<div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/3.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<a href="#">Read Article</a>
			                </div>
							<div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/4.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<a href="#">Read Article</a>
			                </div>
							<div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/5.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<a href="#">Read Article</a>
			                </div>
							<div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/site/img/recipe/6.jpg" class="media__image">
									<div class="media__body">
										<h2>It is a long eastiblished fact that a reader</h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0"><a href="#" class="save"><i class="fa fa-check" aria-hidden="true"></i></a></div>
											<div class="col-md-6 text-right padding-0"><a href="#" class="reject"><i class="fa fa-times" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<p class="content-head">It is a long eastiblished fact that a reader</p>
								<a href="#">Read Article</a>
			                </div>
			            </div>
					</div>
				</div> -->
			</div>
		</div>
	</section>
