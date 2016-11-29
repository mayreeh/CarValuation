<style type="text/css">
	.red {
		color: #f00;
	}

	.green {
		color: #3CB371;
	}

	.blue {
		color: #00f;
	}

	.bigtext {
		font-size: 12pt;
	}

	h3 {
		border-bottom: 1px dotted #ccc;
		font-size: 14pt;
	}

	.photo {
		width: 300px;
	}

	.divider {
		border-left: 1px solid #ccc;
	}

	td {
		vertical-align: top;
	}

	a {
		text-decoration: none;
	}

	a:hover {
		color: #f00;
	}

</style>


<table>

	<tr>
		<td colspan="2"><a href="<?php echo base_url() . 'report/pdf/' . $report->id /*. '/' . $search_term */; ?>" title="Download Report"><i class="icon-download-alt icon-large"></i> Download Report (PDF)</a></td>
	</tr>

	<tr>

		<!-- REPORT DETAILS -->
		<td width="*">
			
			<!-- Report Title -->
			<h3>VEHICLE VALUATION REPORT</h3>

			<!-- Serial Number -->
			<p><span class="green"><strong>SERIAL NO:</strong></span> <?php echo $report->serial_number; ?></p>

			<!-- Date of Inspection -->
			<p><span class="green">DATE OF INSPECTION:</span> <strong><?php if ($report->inspection_date > 0) { echo date('F j, Y', $report->inspection_date); } ?></strong></p>

			<!-- Client Name -->
			<p><span class="green">CLIENT NAME:</span> <strong><?php echo $report->client_name; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="green">CONTACTS:</span> <strong><?php echo $report->client_contacts; ?></strong></p>

			<!-- Insurance Details -->
			<p><span class="green">INSURANCE COMPANY:</span> <strong><?php echo $report->insurance_company_id; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="green">POLICY NO:</span> <strong><?php echo $report->policy_number; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="green">EXPIRY DATE:</span> <strong><?php if ($report->policy_expiry_date > 0) { echo date('F j, Y',$report->policy_expiry_date); } ?></strong></p>

			<!-- Destination -->
			<p><span class="green">DESTINATION:</span> <strong><?php echo $report->destination; ?></p>

			<!-- Descriptive text -->
			<p class="red"><em>After a brief inspection and road test was carried out on the subject vehicle, the following are the findings:-</em></p>

			<table cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td width="50%"><span class="green">REG NO:</span> <?php echo $report->reg_number; ?></td>
					<td width="50%"><span class="green">CHASSIS NO:</span> <strong><?php echo $report->chassis_number; ?></strong></td>
				</tr>
				<tr>
					<td><span class="green">MAKE:</span> <strong><?php echo $report->make; ?></strong></td>
					<td><span class="green">ENGINE NO:</span> <strong><?php echo $report->engine_number; ?></strong></td>
				</tr>
				<tr>
					<td><span class="green">BODY TYPE:</span> <strong><?php echo $report->body_type; ?></strong></td>
					<td><span class="green">Y.O.M:</span> <strong><?php echo $report->manufacture_year; ?></strong></td>
				</tr>
				<tr>
					<td><span class="green">COLOUR:</span> <strong><?php echo $report->colour; ?></strong></td>
					<td><span class="green">ENGINE RATING:</span> <strong><?php echo $report->engine_rating; ?></strong></td>
				</tr>
				<tr>
					<td><span class="green">MILEAGE:</span> <strong><?php echo $report->mileage; ?></strong></td>
					<td><span class="green">FIRST REG DATE:</span> <strong><?php if ($report->first_registration_date > 0) { echo date('F j, Y', $report->first_registration_date); } ?></strong></td>
				</tr>
				<tr>
					<td><span class="green">COUNTRY OF ORIGIN:</span> <strong><?php echo $report->country_of_origin; ?></td>
					<td><span class="green">TYPE OF FUEL:</span> <strong><?php echo $report->fuel_type; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">BODY WORK:</span> <strong><?php echo $report->body_work; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">MECHANICAL:</span> <strong><?php echo $report->mechanical_condition; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">TYRES (% REM):</span> <strong><?php echo $report->tyre_condition; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">ACCESSORIES/EXTRAS:</span> <strong><?php echo $report->accessories_extras; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">ANTI-THEFT DEVICE:</span> <strong><?php echo $report->anti_theft_device; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">GENERAL CONDITION:</span> <strong><?php echo $report->general_condition; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">ASSESSED VALUE:</span> <strong class="red bigtext"><?php echo strtoupper($report->assessed_value_number) . ' (' . strtoupper($report->assessed_value_words) . ')'; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">NOTE VALUE:</span> <strong><?php echo $report->note_value; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">GENERAL REMARKS:</span> <strong><?php echo $report->remarks; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">NB:</span> <strong><?php echo $report->nb; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">REMEDY:</span> <strong><?php echo $report->remedy; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><u><strong>FOR BANK VALUATIONS ONLY</strong></u></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">MARKET VALUE:</span> <strong><?php echo $report->bank_market_value; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">FORCED VALUE:</span> <strong><?php echo $report->bank_forced_value; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><u><strong>FOR OFFICIAL USE ONLY</strong></u></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">VALUATION OFFICER:</span> <strong><?php echo $report->valuation_officer; ?></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="100%"><span class="green">FOR AND ON BEHALF OF AUTO STAR ASSESSORS AND VALUERS LTD.<br/><span class="green">PIN NO: P0513807771</td>
				</tr>
			</table>

		</td>

		<!-- PHOTO DETAILS -->
		<td width="350px" class="divider">
			
			<h3>PHOTOS</h3>
			<?php if ($photos->num_rows() <= 0) { ?>
			<p>There are no photos uploaded for this report.</p>
			<?php } else { ?>
			<p>Below are the photos uploaded for this report:</p>
			<?php foreach ($photos->result() as $photo) { ?>
			<p><img src="<?php echo base_url() . 'assets/uploads/' . $photo->photo_name; ?>" class="photo" alt="Photo" /></p>
			<?php } } ?>

		</td>
	</tr>
</table>

