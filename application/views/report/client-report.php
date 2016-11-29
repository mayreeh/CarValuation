<?php $this->load->helper('url'); ?>
  	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"></script>
  	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-ui.js"></script>


<h5>Search Results</h5>

<p><a href="#" class="search-again"><i class="icon-search"></i> Search Again</a></p>
<form action="<?php base_url(); ?>search" method="get" id="search-again-form">
	<input type="text" name="q" id="q" placeholder="KZZ 999Z" value="<?php echo $search_term; ?>" class="search-term-large w300px" />
	<div class="clear"></div>
	<input type="submit" value="Search" class="blue" />
</form>
<?php if (!$search_results || $search_results->num_rows() <= 0) { ?>
<div class="notice warning"><i class="icon-warning-sign icon-large"></i> Your search term did not return any results. Search again above.<a href="#close" class="icon-remove"></a></div>
<?php } else { $i=1; ?>
<p>Below are the valuation reports based on your search:</p>
<table class="table">
	<thead>
		<thead>
			<tr>
				<th>No.</th>
				<th>Vehicle Reg. #</th>
				<th>Y.O.M</th>
				<th>Make</th>
				<th>Body Type</th>
				<th>Valuation</th>
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
			<td><?php echo $search_result->assessed_value_number . ' (' . $search_result->assessed_value_words . ')'; ?></td>
			<td style="text-align: center;">
			<a href="<?php echo base_url() . 'report/pdf/' . $search_result->id /*. '/' . $search_term */; ?>" title="Download Report"><i class="icon-download-alt icon-large"></i><!--  Download --></a>
			&nbsp;<a href="<?php echo base_url() . 'report/photos/' . $search_result->id; ?>" title="View Photos"><i class="icon-camera"></i></a>
			<?php if ($this->session->userdata('admin') == 'YES') { ?>
			&nbsp;<a href="<?php echo base_url() . 'report/edit/' . $search_result->id; ?>" title="Edit Report"><i class="icon-edit icon-large"></i></a>
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