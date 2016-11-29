
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
<h5>Search for Valuation Report</h5>
<div class="row">
 <div class="col-md-6">
    <p>Provide either Registration Number,Insurance Name,Agency,Policy Number of the motor vehicle whose valuation report you wish to view:</p>
    <form action="<?php base_url(); ?>search" method="get" class="form-inline">
    	<input type="text" name="q" id="q" placeholder="KZZ 999Z" class="search-term-large w300px" />
    	<div class="clear"></div>
    	<input type="submit" value="Search" class="blue" />
    </form>
</div>
<div class="col-md-6">
    <form action="<?php base_url(); ?>search" method="post" >
     <div class="form-group">
       <label for="search_from">Date From</label>
         <input type="text" name="search_from" id="search_from" class="date-picker w300px-movd form-control" value="<?php echo date('d F, Y'); ?>" placeholder="E.g. <?php echo date('d F, Y', time()); ?>" />
     </div>
     <div class="form-group">
       <label for="search_to">Date To:</label>
       <input type="text" name="search_to" id="search_to" class="date-picker w300px-movd form-control" value="<?php echo date('d F, Y'); ?>" placeholder="E.g. <?php echo date('d F, Y', time()); ?>" />
     </div>
     <button type="submit" class="btn blue">Search</button>
    </form>
 </div>
</div>

<!-- JQUERY SCRIPT-->
<script>
$(document).ready(function() {
	// Search From Date
	$("#search_from").datepicker({
    	changeMonth: true,
    	changeYear: true,
    	/*dateFormat: "d-MM-yy",
    	minDate: "-1M",
    	maxDate: "+1M"
      */
	});

  // Search To Date
  $("#search_to").datepicker({
      changeMonth: true,
      changeYear: true,
    /*  dateFormat: "d-MM-yy",
      minDate: "-1M",
      maxDate: "+1M"*/
  });
});
</script>
