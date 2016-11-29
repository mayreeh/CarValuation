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
	
	<!-- Javascript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/kickstart.js"></script>
</head>
<body class="not-logged-in">
<div class="grid">
		
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
