<!-- Contact -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6">
				<h1 class="font-45"><?php echo $recipe[0]['recipe_title'];?></h1>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 text-right top-icon">
				<a href="#"><i class="fa fa-heart"></i></a>
				<a href="#"><i class="fa fa-commenting"></i></a>
				<a href="#"><i class="fa fa-share-alt"></i></a>
				<a href="#"><i class="fa fa-pencil"></i></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<p><?php echo $recipe[0]['recipe_intro'];?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8">
				<hr class="mt-0">
				<div class="row recipe-head text-center">
					<div class="col-xs-12 col-sm-12 col-md-3 rb-1">
						<i class="fa fa-heartbeat"></i>
						<span>Heart</span>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 rb-1">
						<i class="fa fa-eye"></i>
						<span>Eyes</span>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 rb-1">
						<i class="fa fa-pencil"></i>
						<span>Kidneys</span>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 text-left">
						<span class="author"><i class="fa fa-pencil"></i> author</span>
						<span><?php echo $recipe[0]['author'];?></span>
					</div>
				</div>
				<br>
				<img src="<?php echo base_url();?>assets/upload/<?php echo $recipe[0]['recipe_img'];?>"/>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-4">
				<div class="service-list single contact-left recipe-sidebar">
					<div class="thumb">
						<img src="<?php echo base_url();?>assets/site/img/doctor.jpg"/>
					</div>
					<h2>Dr. Laxmi Pranati</h2>
					<p>Rama Nature Care, Health City, New world on earth, jaya nagar, banglore</p>
					<div class="twitter-post text-left">
						<i class="fa fa-twitter"></i>
						<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
						<p>-kv67i8</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row tb-margin-20">
			<div class="col-xs-12 col-sm-12 col-md-4">
				<div class="recipe-table">
					<div class="head">Ingedients<div class="short-border"></div></div>
					<div class="table-content padding-t-20">
						<?php
						$ingredients = json_decode($recipe[0]['use_ingradients']);
						foreach($ingredients as $ingredient)
						{?>
							<div class="row tb-margin-20">
								<div class="col-md-4 bold-text"><?php echo $ingredient->quantity.$ingredient->unit;?></div>
								<div class="col-md-8 bottom-dash-border"><?php echo $ingredient->ingredient;?></div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<div class="recipe-table">
					<div class="head">Methods<div class="short-border"></div></div>
					<div class="table-content padding-t-0">
						<ul><?php echo $recipe[0]['preparation_steps'];?></ul>
						<br>
						<p>Serve this hot with Cucumber Raitha. Happy cooking with vahrehvah!!!</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<div class="recipe-table">
					<div class="head">Nutrition Facts (Juiced)<div class="short-border"></div></div>
					<div class="table-content padding-0">
						<table class="table table-bordered">
							<?php
							foreach($all_nutritions as $name => $val)
							{
								echo '<tr><td>'.$name.'</td><td>'.$val.'</td></tr>';
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row tb-margin-20">
			<div class="col-md-12">
				<h2>Health Benefits</h2>
				<div class="short-border"></div>
			</div>
		</div>
		<div class="row tb-margin-20">
			<div class="col-xs-12 col-sm-12 col-md-4">
				<div class="recipe-table">
					<div class="head">
						Apple
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at Its layout</p>
					</div>
					<div class="table-content padding-t-20">
						<ol class="benifit-content">
							<li>Apples contain a natural laxative. When juiced, it helps aid bowel movements. It is most effective when mixed with carrots and spinach juices, you can expect bowel movement the next day. Regularly eating apples also will ensure bowel movements due to its gel-forming fiber, pectin. It improves the intestinal muscle’s ability to push waste through the gastrointestinal tract.</li>
							<li>Apples contain vitamins A and C which prevent sagging skin, as well as copper for brightening and toning.</li>
							<li>The pectin in apples lowers LDL (bad’) cholesterol. People who eat two apples per day may lower their cholesterol by as much as 16 percent.</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<div class="recipe-table">
					<div class="head">
						Lemon
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at Its layout.</p>
					</div>
					<div class="table-content padding-t-20">
						<ol class="benifit-content">
							<li>Lemon juice helps to cure problems related to indigestion and consitpation.</li>
							<li>Lemon juice, teing a natural antiseptic medicine, can participate to ure problems related to skin. Drinking of lemon juice mixed with water and honey brings glow to the skin.</li>
							<li>Recent studies shown that limonoids in lemons help in reducing cholesterol.</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<div class="recipe-table">
					<div class="head">
						Oranges
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at Its layout</p>
					</div>
					<div class="table-content padding-t-20">
						<ol class="benifit-content">
							<li>Though oranges taste acidic, it actually has an alkaline effect in the digestive system and helps stimulate the digestive juices, which helps to relieve constipation.</li>
							<li>The anti-oxidant in orange help protect the skin from free radical damage known to cause signs of aging.</li>
							<li>oranges. teing high in vitamin C can help stimulate white cells to fight infection, naturally building a good immune system.</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="row tb-margin-20">
			<div class="col-md-12">
				<h2>Other Recipes you may like</h2>
				<div class="short-border"></div>
			</div>
		</div>
		<div class="row tb-margin-20">
			<?php
			foreach($allrecipes as $allrecipe)
			{
				if($allrecipe['recipe_id'] != $recipe[0]['recipe_id'])
				{?>
					<div class="col-xs-12 col-sm-12 col-md-3">
						<a href="<?php echo base_url();?>dashboard/recipe/<?php echo $allrecipe['recipe_id'];?>"><img src="<?php echo base_url();?>assets/upload/<?php echo $allrecipe['recipe_img'];?>"/></a><br><br>
						<a href="<?php echo base_url();?>dashboard/recipe/<?php echo $allrecipe['recipe_id'];?>"><h2><?php echo $allrecipe['recipe_title'];?></h2></a>
						<p><?php echo $result = substr($allrecipe['recipe_intro'], 0, 50);?>...</p>
					</div>
				<?php
				}
			}
			?>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<form class="post-recipe-comment" metgod="post">
					<input type="hidden" name="recipe_id" value="<?php echo $recipe[0]['recipe_id'];?>">
					<p class="list"><b>Leave a comment</b></p>
					<p><textarea placeholder="Write Something....!" name="comment"></textarea></p>
					<p><button type="submit" id="comment-now-recipe" class="btn btn-primary">Post a comment</button></p>
				</form>
				<p style="font-size: 20px;">2 Comments</p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12">
				<?php
				foreach($comments as $key => $value)
				{?>
					<div class="col-xs-9" id="even">
					<?php if($value['parent_comment_id'] == 0)
					{?>
						<div class="first-comment">
							<div class="image">
								<img src="<?php echo base_url();?>assets/site/img/testimonials/1.png">
							</div>
							<div class="name">
								<p class="user"><?php if($value['name'] == ''){echo $username = implode('@', explode('@', $value['email'], -1));}else{echo $value['name'];}?></p>
								<p>
								<?php
									$timestamp = strtotime($value['created_at']);
									echo $new_date_format = date('F j, Y, g:i a', $timestamp);
								?>
								</p>
								<p><?php echo $value['comment'];?></p>
							</div>
							<div class="reply">
								<a href="javascript:void()" class="recipe-comment-reply" data-recipe="<?php echo $recipe[0]['recipe_id'];?>" data-parent="<?php echo $value['comment_id'];?>">
									<i class="fa fa-reply"></i> <b>Reply</b>
								</a>
							</div>
						</div>
					<?php
					}

					foreach($comments as $k => $v)
					{
						if($v['parent_comment_id'] == $value['comment_id'])
						{
						?>
						<div class="second-comment">
							<div class="image1">
								<img src="<?php echo base_url();?>assets/site/img/testimonials/1.png">
							</div>
							<div class="name1">
								<p class="edit"><?php if($v['name'] == ''){echo $username = implode('@', explode('@', $v['email'], -1));}else{echo $v['name'];}?></p>
								<p class="edit">
									<?php
										$timestamp = strtotime($v['created_at']);
										echo $new_date_format = date('F j, Y, g:i a', $timestamp);
									?>
								</p>
								<p><?php echo $v['comment'];?></p>
							</div>
							<div class="reply">
								<a href="javascript:void()" class="recipe-comment-reply" data-recipe="<?php echo $recipe[0]['recipe_id'];?>" data-parent="<?php echo $v['parent_comment_id'];?>">
									<i class="fa fa-reply"></i> <b>Reply</b>
								</a>
							</div>
						</div>
					<?php
						}
					}?>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</section>
<!-- Modal for recipe comment-->
<div class="modal fade modal-vcenter" id="recipe-comment" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2>Comment</h2>
            </div>
            <div class="modal-body">
                <form class="post-recipe-comment-child" metgod="post">
					<input type="hidden" name="recipe_id">
					<input type="hidden" name="parent_comment_id">
                    <div class="form-group">
                        <textarea rows="5" cols="15" placeholder="Write Something....!" name="comment"></textarea>
                    </div>
                    <div class="submit-block text-right">
                        <button type="submit" id="comment-now-recipe-child" class="btn btn-primary">Post a comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
