<?php $this->load->helper('url'); ?>
  	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"></script>
  	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-ui.js"></script>


<h5><?php  echo $this->session->userdata('name').' Valuation Reports'; ?></h5>

<p><a href="#" class="search-again"><i class="icon-search"></i> Search Reports</a></p>
<div class="row" id="search-again-form">
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
<?php if (!$search_results || $search_results->num_rows() <= 0) { ?>
<div class="notice warning"><i class="icon-warning-sign icon-large"></i> Your search term did not return any results. Search again above.<a href="#close" class="icon-remove"></a></div>
<?php } else { $i=1; ?>
<p>Below are your valuation reports:</p>
<table class="table">
	<thead>
		<thead>
			<tr>
				<th>No.</th>
				<th>Vehicle Reg. #</th>
				<th>Y.O.M</th>
				<th>Make</th>
				<th>Body Type</th>
				<th>Value</th>
        <th>Note Value</th>
				<th>Status</th>
				<th>Remarks</th>
				<th style="text-align: center;">Download Report</th>
			</tr>
		</thead>
	</thead>
	<tbody>
		<?php foreach ($search_results->result() as $search_result): ?>
		<tr>
			<td><?php echo $i; ?>.</td>
			<td><?php echo $search_result->reg_number; ?></td>
			<td><?php echo $search_result->manufacture_year; ?></td>
			<td><?php echo $search_result->make; ?></td>
			<td><?php echo $search_result->body_type; ?></td>
			<td><?php echo $search_result->assessed_value_number; ?></td>
      <td><?php echo $search_result->note_value; ?></td>
			<td><?php echo $search_result->status == 1 ? 'complete' : 'pending'; ?></td>
			<td><?php echo $search_result->status_comments; ?></td>

			<td style="text-align: center;">
			<?php if($search_result->status == 1){
				echo '<a href="'.base_url() . 'report/pdf/' . $search_result->id.'" title="Download Report"><i class="icon-download-alt icon-large"></i><!--  Download --></a>';
			} ?>
			&nbsp;
      <!--<a href="<?php echo base_url() . 'report/photos/' . $search_result->id; ?>" title="View Photos"><i class="icon-camera"></i></a>-->
			<?php if ($this->session->userdata('admin') == 'YES') {  ?>
			&nbsp;<a href="<?php echo base_url() . 'report/edit/' . $search_result->id; ?>" title="Edit Report"><i class="icon-edit icon-large"></i></a>
      &nbsp;<a href="#" onclick="confirm_delete('<?php echo base_url() . 'report/delete/' . $search_result->id; ?>')" title="Delete Report"><i class="icon-trash icon-large"></i></a>
			<?php } ?>

			</td>
		</tr>
		<?php $i++; endforeach ?>
	</tbody>
</table>
<?php } ?>


<!-- JQUERY SCRIPT -->
<script>

	$(document).ready(function() {

		// Hide the search again form on load
		$("#search-again-form").hide();

		// Listen for the click even
		$(".search-again").click(function() {
			$("#search-again-form").toggle("slow", function() {
				// Animation complete.
			});
		});

	});

</script>

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
<script>
function confirm_delete(urls)
{
    var chk = confirm("Are You Sure To Delete ?");
    if(chk)
    {
        $.ajax({
           url: urls,
           method: 'GET',
           dataType: 'html',
         }) .success(function(response) {
            window.location.href = urls;
        });
    }
    else{
        return false;
    }
}
</script>
