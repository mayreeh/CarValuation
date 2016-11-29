<h5>Add New User</h5>

<p>In the form below, provide the new user account details:</p>

<div class="required" style="margin-bottom: 10px;"><i class="icon-star required smaller"></i> - Required Field</div>
<form action="<?php echo base_url() . 'user/save'; ?>" method="post" class="vertical">
	
	<!-- name -->
	<label for="name">Name of person / organization: <i class="icon-star required smaller"></i></label>
	<input type="text" name="name" id="name" value="<?php echo $form_variables['name']; ?>" class="w600px" placeholder="Organization / Person Name" />

	<!-- username -->
	<label for="username">Login username: <i class="icon-star required smaller"></i></label>
	<input type="text" name="username" id="username" value="<?php echo $form_variables['username']; ?>" class="w600px" placeholder="Login Username" />

	<!-- contact person -->
	<label for="contact_person">Contact Person: <i class="icon-star required smaller"></i></label>
	<input type="text" name="contact_person" id="contact_person" value="<?php echo $form_variables['contact_person']; ?>" class="w600px" placeholder="Contact Person" />

	<!-- if account is active -->
	<label for="active">Is the account active? <i class="icon-star required smaller"></i></label>
	<select name="active" id="active" class="w100px">
		<option value="YES"<?php if ($form_variables['active'] == "YES") { echo ' selected="selected"'; } ?>>YES</option>
		<option value="NO"<?php if ($form_variables['active'] == "NO") { echo ' selected="selected"'; } ?>>NO</option>
	</select>

	<!-- type of account -->
	<label for="user_type">Type of account <i class="icon-star required smaller"></i></label>
	<select name="user_type" id="user_type" class="w100px">
		<option value="bank"<?php if ($form_variables['user_type'] == "BANK") { echo ' selected="selected"'; } ?>>BANK</option>
		<option value="insurance"<?php if ($form_variables['user_type'] == "INSURANCE") { echo ' selected="selected"'; } ?>>INSURANCE</option>
		<option value="private"<?php if ($form_variables['user_type'] == "PRIVATE") { echo ' selected="selected"'; } ?>>PRIVATE VALUER</option>
	
	</select>

	<!-- if account has admin privileges -->
	<label for="is_admin">Does this account has administrative privileges? <i class="icon-star required smaller"></i></label>
	<select name="is_admin" id="is_admin" class="w100px">
		<option value="NO"<?php if ($form_variables['is_admin'] == "NO") { echo ' selected="selected"'; } ?>>NO</option>
		<option value="YES"<?php if ($form_variables['is_admin'] == "YES") { echo ' selected="selected"'; } ?>>YES</option>
	</select>

	<!-- new password -->
	<label for="password">Password: <i class="icon-star required smaller"></i></label>
	<input type="password" name="password" id="password" class="w600px" placeholder="Password" autocomplete="off" />

	<!-- confirm new password -->
	<label for="confirm_password">Confirm Password: <i class="icon-star required smaller"></i></label>
	<input type="password" name="confirm_password" id="confirm_password" class="w600px" placeholder="Confirm Password" autocomplete="off" />

	<!-- save changes -->
	<input type="submit" value="Create New Account" class="blue" />

</form>