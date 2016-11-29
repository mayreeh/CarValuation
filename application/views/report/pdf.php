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
</style>
<span style="font-family: arial, helvetica, sans-serif; font-size: 8pt;">
<table cellpadding="5" cellspacing="0" border="0" width="100%">
	<tr>
		<td width="20%"><img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/assets/img/logo.png'; ?>" /></p></td>
		<td width="80%" style="text-align: right;">AUTO STAR ASSESSORS AND VALUERS<br/>HEAD OFFICE: UPPER HILL SPRINGS (OPP. CIC PLAZA) Mara Road<br/>P.O. BOX 2311-00200 NAIROBI Kenya<br/>OFFICE CELL: 0719 816 449 / 0733 816 449 / 0720 239 719 / 0735 449 113 / 0721 309 168<br/>EMAIL: info@autostarvaluers.com / autostarvaluers@gmail.com / www.autostarvaluers.com<br/>&nbsp;<br/><span class="green"><strong>SERIAL NO:</strong></span> <?php echo $report->serial_number; ?></td>
	</tr>
</table>
<hr style="height: 1px;" />

<!-- Report Title -->
<h3 style="text-align: center; font-size: 14pt;">VEHICLE VALUATION REPORT</h3>

<!-- Date of Inspection -->
<p><span class="green">DATE OF INSPECTION:</span> <strong><?php if ($report->inspection_date > 0) { echo date('F j, Y', $report->inspection_date); } ?></strong></p>

<!-- Client Name -->
<p><span class="green">CLIENT NAME:</span> <strong><?php echo $report->client_name; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="green">CONTACTS:</span> <strong><?php echo $report->client_contacts; ?></strong></p>

<!-- Insurance Details -->
<p><span class="green">INSURANCE COMPANY:</span> <strong><?php echo $insurance_company_details['name']; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="green">POLICY NO:</span> <strong><?php echo $report->policy_number; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="green">EXPIRY DATE:</span> <strong><?php if ($report->policy_expiry_date > 0) { echo date('F j, Y',$report->policy_expiry_date); } ?></strong></p>

<!-- Destination -->
<p><span class="green">DESTINATION:</span> <strong><?php echo $insurance_company_details['contact_person']; ?></p>
<p></p>
<p></p>
<!-- Descriptive text -->
<p class="red"><em>After a brief inspection and road test was carried out on the subject vehicle, the following are the findings:-</em></p>

<table cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<td width="50%"><span class="green">REG NO:</span> <?php echo $report->reg_number; ?></td>
		<td width="50%"><span class="green">CHASSIS NO:</span> <strong><?php echo $report->chassis_number; ?></strong></td>
	</tr>
	<tr>
		<td><span class="green">MAKE/MODEL:</span> <strong><?php echo $report->make; ?></strong></td>
		<td><span class="green">ENGINE NO:</span> <strong><?php echo $report->engine_number; ?></strong></td>
	</tr>
	<tr>
		<td><span class="green">BODY TYPE:</span> <strong><?php echo $report->body_type; ?></strong></td>
		<td><span class="green">YEAR OF MANUFACTURE:</span> <strong><?php echo $report->manufacture_year; ?></strong></td>
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
	<?php $p1=$report->accessories_extras;
	$records=array();
	$output;
	if(strpos($p1,'&')>0)
	{
		if($p1!="0"){
			$output="<table><tr><td>Name</td><td>Value</td></tr>";
			$rows=explode("&",$p1);
			foreach ($rows as $r) {

				list($id,$name,$value)=explode(" ",$r);
				$append="<tr><td>".$name."</td><td>".$value."</td></tr>";
				$output=$output."".$append;
			}
			$output=$output."</table>";
		}
	}

	?>
		<td colspan="2" width="100%"><span class="green">ACCESSORIES/EXTRAS:</span> <strong><?php echo $output; ?></strong></td>
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
		<td colspan="2" width="100%"><span class="green">VALUATION OFFICER:</span></span> <strong><?php echo $report->valuation_officer; ?></strong></td>
	</tr>
	<tr>
		<td colspan="2" width="100%"><span class="green">SIGNATURE:</span></span> <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/assets/img/signature.png'; ?>" height="20px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="green">DATE:</span> <strong><?php echo date('F j, Y', time()); ?></strong></td>
	</tr>
	<tr>
		<td colspan="2" width="100%"><u><span class="green">FOR AND ON BEHALF OF AUTO STAR ASSESSORS AND VALUERS LTD.</u><br/><span class="green">PIN NO: P0513807771</td>
	</tr>
</table>

</span>
