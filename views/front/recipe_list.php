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
					<div class="col-md-3 right-top-content">
						<a href="#" class="btn btn-primary">Time</a>
						<a href="#" class="btn btn-primary">Category</a>
					</div>
				</div>
			</div>
			<br><br><br>
			<div class="user-post">
				<div class="row border-green">
					<div class="point bg-green"></div>
					<div class="vertical-text">Diet</div>
					<div class="col-xs-12">
						<div class="masonry bordered">
							<?php
							foreach($recipes as $recipe)
							{
							?>
			                <div class="brick">
								<div class="media">
				                    <img src="<?php echo base_url();?>assets/upload/<?php echo $recipe['recipe_img'];?>" class="media__image">
									<div class="media__body">
										<h2><?php echo $recipe['recipe_title'];?></h2>
										<div class="like-dislike">
											<div class="col-md-6 padding-0">
												<a href="javascript:void(0)" class="save user-like-dislike" data-feed="1" data-recipe="<?php echo $recipe['recipe_id'];?>">
													<?php if(isset($recipe['like_dislike']))
													{?>
														<i class="fa <?php echo $status = ($recipe['like_dislike']['like_dislike'] == 1) ? 'fa-thumbs-up' : 'fa-check';?> like-thumb"></i>
													<?php
													}else{?>
														<i class="fa fa-check like-thumb"></i>
													<?php
													}?>
												</a>
											</div>
											<div class="col-md-6 text-right padding-0">
												<a href="javascript:void(0)" class="reject user-like-dislike" data-feed="0" data-recipe="<?php echo $recipe['recipe_id'];?>">
													<?php if(isset($recipe['like_dislike']))
													{?>
														<i class="fa <?php echo $status = ($recipe['like_dislike']['like_dislike'] == 0) ? 'fa-thumbs-down' : 'fa-times';?> dislike-thumb"></i>
													<?php
													}else{?>
														<i class="fa fa-times dislike-thumb"></i>
													<?php
													}?>
												</a>
											</div>
										</div>
									</div>
								</div>
								<p class="content-head"><a href="<?php echo base_url();?>dashboard/recipe/<?php echo $recipe['recipe_id'];?>"><?php echo $recipe['recipe_title'];?></a></p>
								<p><?php echo $result = substr($recipe['recipe_intro'], 0, 70);?>...</p>
								<a href="<?php echo base_url();?>dashboard/recipe/<?php echo $recipe['recipe_id'];?>">Know More</a>
			                </div>
							<?php
							}?>
			            </div>
					</div>
				</div>
			</div>
		</div>
	</section>
