<!-- Contact -->
<section>
	<div class="container">
		<?php $this->load->view('front_include/intro');?>
		<div class="row tb-margin-20">

			<form class="h-w-form" method="post">
				<div class="col-md-12 tb-margin-20">
					<div class="recipe-table">
						<div class="head">Update Height Weight</div>
						<div class="table-content personlise padding-t-20 padding-b-90">
							<div class="col-md-5">
								<div class="form-group">
									<label>Your Height</label>
									<select class="form-control" name="height">
										<option value="">Select Your Height</option>
										<option value="4ft 0inch" <?php if($user_h_w['height'] == '4ft 0inch'){echo 'selected';}?>>4ft 0inch</option>
										<option value="4ft 1inch" <?php if($user_h_w['height'] == '4ft 1inch'){echo 'selected';}?>>4ft 1inch</option>
										<option value="4ft 2inch" <?php if($user_h_w['height'] == '4ft 2inch'){echo 'selected';}?>>4ft 2inch</option>
										<option value="4ft 3inch" <?php if($user_h_w['height'] == '4ft 3inch'){echo 'selected';}?>>4ft 3inch</option>
										<option value="4ft 4inch" <?php if($user_h_w['height'] == '4ft 4inch'){echo 'selected';}?>>4ft 4inch</option>
										<option value="4ft 5inch" <?php if($user_h_w['height'] == '4ft 5inch'){echo 'selected';}?>>4ft 5inch</option>
										<option value="4ft 6inch" <?php if($user_h_w['height'] == '4ft 6inch'){echo 'selected';}?>>4ft 6inch</option>
										<option value="4ft 7inch" <?php if($user_h_w['height'] == '4ft 7inch'){echo 'selected';}?>>4ft 4inch</option>
										<option value="4ft 8inch" <?php if($user_h_w['height'] == '4ft 8inch'){echo 'selected';}?>>4ft 8inch</option>
										<option value="4ft 9inch" <?php if($user_h_w['height'] == '4ft 9inch'){echo 'selected';}?>>4ft 9inch</option>
										<option value="4ft 10inch" <?php if($user_h_w['height'] == '4ft 10inch'){echo 'selected';}?>>4ft 10inch</option>
										<option value="4ft 11inch" <?php if($user_h_w['height'] == '4ft 11inch'){echo 'selected';}?>>4ft 11inch</option>
										<option value="5ft 0inch" <?php if($user_h_w['height'] == '5ft 0inch'){echo 'selected';}?>>5ft 0inch</option>
										<option value="5ft 1inch" <?php if($user_h_w['height'] == '5ft 1inch'){echo 'selected';}?>>5ft 1inch</option>
										<option value="5ft 2inch" <?php if($user_h_w['height'] == '5ft 2inch'){echo 'selected';}?>>5ft 2inch</option>
										<option value="5ft 3inch" <?php if($user_h_w['height'] == '5ft 3inch'){echo 'selected';}?>>5ft 3inch</option>
										<option value="5ft 4inch" <?php if($user_h_w['height'] == '5ft 4inch'){echo 'selected';}?>>5ft 4inch</option>
										<option value="5ft 5inch" <?php if($user_h_w['height'] == '5ft 5inch'){echo 'selected';}?>>5ft 5inch</option>
										<option value="5ft 6inch" <?php if($user_h_w['height'] == '5ft 6inch'){echo 'selected';}?>>5ft 6inch</option>
										<option value="5ft 7inch" <?php if($user_h_w['height'] == '5ft 7inch'){echo 'selected';}?>>5ft 4inch</option>
										<option value="5ft 8inch" <?php if($user_h_w['height'] == '5ft 8inch'){echo 'selected';}?>>5ft 8inch</option>
										<option value="5ft 9inch" <?php if($user_h_w['height'] == '5ft 9inch'){echo 'selected';}?>>5ft 9inch</option>
										<option value="5ft 10inch" <?php if($user_h_w['height'] == '5ft 10inch'){echo 'selected';}?>>5ft 10inch</option>
										<option value="5ft 11inch" <?php if($user_h_w['height'] == '5ft 11inch'){echo 'selected';}?>>5ft 11inch</option>
										<option value="6ft 0inch" <?php if($user_h_w['height'] == '6ft 0inch'){echo 'selected';}?>>6ft 0inch</option>
										<option value="6ft 1inch" <?php if($user_h_w['height'] == '6ft 1inch'){echo 'selected';}?>>6ft 1inch</option>
										<option value="6ft 2inch" <?php if($user_h_w['height'] == '6ft 2inch'){echo 'selected';}?>>6ft 2inch</option>
										<option value="6ft 3inch" <?php if($user_h_w['height'] == '6ft 3inch'){echo 'selected';}?>>6ft 3inch</option>
										<option value="6ft 4inch" <?php if($user_h_w['height'] == '6ft 4inch'){echo 'selected';}?>>6ft 4inch</option>
										<option value="6ft 5inch" <?php if($user_h_w['height'] == '6ft 5inch'){echo 'selected';}?>>6ft 5inch</option>
										<option value="6ft 6inch" <?php if($user_h_w['height'] == '6ft 6inch'){echo 'selected';}?>>6ft 6inch</option>
										<option value="6ft 7inch" <?php if($user_h_w['height'] == '6ft 7inch'){echo 'selected';}?>>6ft 7inch</option>
										<option value="6ft 8inch" <?php if($user_h_w['height'] == '6ft 8inch'){echo 'selected';}?>>6ft 8inch</option>
										<option value="6ft 9inch" <?php if($user_h_w['height'] == '6ft 9inch'){echo 'selected';}?>>6ft 9inch</option>
										<option value="6ft 10inch" <?php if($user_h_w['height'] == '6ft 10inch'){echo 'selected';}?>>6ft 10inch</option>
										<option value="6ft 11inch" <?php if($user_h_w['height'] == '6ft 11inch'){echo 'selected';}?>>6ft 11inch</option>
										<option value="7ft 0inch" <?php if($user_h_w['height'] == '7ft 0inch'){echo 'selected';}?>>7ft 0inch</option>
										<option value="7ft 1inch" <?php if($user_h_w['height'] == '7ft 1inch'){echo 'selected';}?>>7ft 2inch</option>
										<option value="7ft 2inch" <?php if($user_h_w['height'] == '7ft 2inch'){echo 'selected';}?>>7ft 3inch</option>
										<option value="7ft 3inch" <?php if($user_h_w['height'] == '7ft 3inch'){echo 'selected';}?>>7ft 4inch</option>
										<option value="7ft 4inch" <?php if($user_h_w['height'] == '7ft 4inch'){echo 'selected';}?>>7ft 5inch</option>
									</select>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>Your Weight</label>
									<input type="text" class="form-control" name="weight" value="<?php echo $user_h_w['weight'];?>" placeholder="Enter Your Weight in Kg">
								</div>
							</div>
							<div class="col-md-2">
								<label>&nbsp;</label>
								<div class="form-group">
									<button type="button" class="animated flipInY btn btn-primary" id="h-w-btn">Update</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>

			<form class="preferences-form" method="post">
			<?php
			foreach($preferences_cat as $category)
			{
			?>
			<div class="col-xs-12 col-sm-12 col-md-6 tb-margin-20">
				<div class="recipe-table">
					<div class="head"><?php echo $category['pref_category'];?></div>
					<div class="table-content personlise padding-t-20">
						<ul>
							<?php
							foreach($preferences_list as $list)
							{
								if($list['pref_category'] == $category['pref_category'])
								{

									if(isset($user_preferences) && in_array($list['pref_id'], $user_preferences))
									{?>
										<li><?php echo $list['pref_name'];?>
											<label class="switch pull-right">
												<input type="checkbox" name="user_preference[]" value="<?php echo $list['pref_id'];?>" checked>
												<div class="slider round"></div>
											</label>
										</li>
									<?php
									}
									else
									{?>
										<li><?php echo $list['pref_name'];?>
											<label class="switch pull-right">
												<input type="checkbox" name="user_preference[]" value="<?php echo $list['pref_id'];?>">
												<div class="slider round"></div>
											</label>
										</li>
									<?php
									}
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>
			<?php
			}
			?>
			<div class="text-center"><button type="button" class="animated flipInY btn btn-primary" id="user-prefer-btn">Update</button></div>
			</form>
		</div>
	</div>
</section>
