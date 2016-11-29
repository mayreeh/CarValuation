<div class="col_12" style="margin-top:100px;">

<!-- Error message -->
<?php if (isset($msg) && trim($msg) != '') { echo '<div class="col_12"><div class="notice error"><i class="icon-remove-sign icon-large"></i> '.$msg.' 
<a href="#close" class="icon-remove"></a></div></div>'; } ?>
	
	<!-- LOGO DIV -->
	<div class="col_4 login-logo">
		<p class="right"><img src="<?php echo base_url(); ?>assets/img/logo.png"></p>
	</div>

	<!-- LOGIN FORM DIV -->
	<div class="col_4">
	<form action="<?php echo base_url(); ?>login/process" method="post" class="vertical">
		<h4 class="login-header">User Login</h4>		
		<!-- Username -->
		<label for="username">Username</label>
		<input type="text" name="username" id="username" autocomplete="off" />
		<!-- Password -->
		<label for="password">Password</label>
		<input type="password" name="password" id="password" autocomplete="off" />
		<!-- Login Button -->
		<input type="submit" value="Log In" class="button blue">
	</form>
	</div>

	<!-- LAST PLACEHOLDER FORM ELEMENT -->
	<div class="col_4">&nbsp;</div>

</div>

<script type="text/javascript">
	$(function(){
		$('#username').focus();
	});
</script>