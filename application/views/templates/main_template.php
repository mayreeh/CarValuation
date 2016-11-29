<?php

// Processing the messages to be shown on the page
$msg_class = 'success';
$msg_text = $this->session->flashdata('msg');
if (!$msg_text) {
	// Now check for other message
	if ($msg['text'] != '')
	{
		$msg_text = $msg['text'];
		$msg_class = $msg['class'];
	}
}	// Checking for notification message

?>
<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<title>Auto Star Asessors and Valuers</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="" />

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/kickstart.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui-lightness/jquery-ui-1.10.3.custom.min.css" media="all" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<!-- Javascript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/kickstart.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<style>
	.ui-datepicker-month , .ui-datepicker-year
	{
	  color:black;
	}
	</style>
</head>
<body class="logged-in">


<div class="grid">

	<!-- LOGO & CONTACT DETAILS FOR COMPANY -->

	<div class="col_4">
		<img src="<?php echo base_url(); ?>assets/img/logo.png" class="logo-container" />
	</div>

	<div class="col_8 right contact-details">
		Head Office: Upper Hill (Opp Kenya Library)<br/>
		P.O. Box 2311-00200 NAIROBI<br/>
		Cell: 0720 239 719, 0735 239 719, 0724 491 113<br/>
		Email: info@autostarvaluers.com
	</div>

	<!-- LOGO & CONTACT DETAILS FOR COMPANY -->

	<!-- MENU -->
	<div class="clear"></div>
	<?php echo $menu; ?>
	<!-- MENU -->

	<!-- Error / Notice Message -->
	<?php  if ($msg_text) { ?>
	<div class="col_12">
		<div class="notice <?php echo $msg_class; ?>"><i class="icon-remove-sign icon-large"></i><?php echo $msg_text; ?><a href="#close" class="icon-remove"></a></div>
	</div>
	<?php } ?>

	<!-- INSERT VIEW HERE -->
	<?php $this->load->view($view); ?>
	<!-- END INSERTING VIEW HERE -->

</div><!-- END GRID -->

<!-- ===================================== START FOOTER ===================================== -->
<div class="clear"></div>
<div id="footer">
&copy; Copyright <?php echo date('Y', time()); ?> All Rights Reserved. Auto Star Asessors and Valuers</a>
</div>
</body>
</html>
