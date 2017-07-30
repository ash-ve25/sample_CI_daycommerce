<!-- Contact -->
<section id="contact-us">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8">
				<div class="recipe-table">
					<div class="head">Update Profile<div class="short-border"></div></div>
					<div class="table-content">
						<form class="profile-form" method="post">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" placeholder="Enter you name" value="<?php echo $details[0]['name'];?>" class="form-control" required>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" placeholder="Enter your email" value="<?php echo $details[0]['email'];?>" class="form-control" required>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" placeholder="Enter your address" value="<?php echo $details[0]['address'];?>" class="form-control" required>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label>City</label>
								<input type="text" name="city" placeholder="Enter your city" value="<?php echo $details[0]['city'];?>" class="form-control" required>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label>State</label>
								<input type="text" name="state" placeholder="Enter your state" value="<?php echo $details[0]['state'];?>"  class="form-control" required>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label>Date of Birth</label>
								<input type="text" name="dob" placeholder="Enter your date of birth" value="<?php echo $details[0]['dob'];?>" class="form-control date-pic" required>
								<div class="help-block with-errors"></div>
							</div>
							<button id="update-profile-btn" name="submit" class="btn btn-default"> Update Profile</button>
						</form>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-4">
				<div class="recipe-table">
					<div class="head">Change Password<div class="short-border"></div></div>
					<div class="table-content">
						<form class="password-form" method="post">
							<div class="form-group">
								<label>Old Password</label>
								<input placeholder="Enter your old password" class="form-control" name="oldpassword" type="password" required>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label>New Password</label>
								<input placeholder="Enter your new password" class="form-control" name="password" type="password" required>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
								<input placeholder="Type again" class="form-control" name="cpassword" type="password" required>
								<div class="help-block with-errors"></div>
							</div>
							<button id="pwd-chng-btn" name="submit" class="btn btn-default"> Change Password</button>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
