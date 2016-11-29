<h5>Edit Profile</h5>
<p>In the form below, edit your profile:</p>
<div class="required" style="margin-bottom: 10px;"><i class="icon-star required smaller"></i> - Required Field</div>
<form action="<?php echo base_url() . 'profile/update'; ?>" method="post" class="vertical">

	<!-- set the current user's user id -->
	<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
	
	<!-- name -->
	<label for="name">Name of person / organization: <i class="icon-star required smaller"></i></label>
	<input type="text" name="name" id="name" class="w600px" value="<?php echo $profile_details->name; ?>" placeholder="Organization / Person Name" />

	<!-- username -->
	<label for="username">Login username: <i class="icon-star required smaller"></i></label>
	<input type="text" name="username" id="username" class="w600px" value="<?php echo $profile_details->username; ?>" placeholder="Login Username" />

	<!-- contact person -->
	<label for="contact_person">Contact Person: <i class="icon-star required smaller"></i></label>
	<input type="text" name="contact_person" id="contact_person" class="w600px" value="<?php echo $profile_details->contact_person; ?>" placeholder="Contact Person" />

	<!-- new password -->
	<label for="new_password">New Password:</label>
	<input type="password" name="new_password" id="new_password" class="w600px" placeholder="New Password" autocomplete="off" />

	<!-- confirm new password -->
	<label for="confirm_new_password">Confirm New Password:</label>
	<input type="password" name="confirm_new_password" id="confirm_new_password" class="w600px" placeholder="Confirm New Password" autocomplete="off" />

	<!-- save changes -->
	<input type="submit" value="Save Profile Changes" class="blue" />

</form>