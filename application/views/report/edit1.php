<?php
	$this->load->helper('url');
	
?>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
  	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"></script>
  	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
	

<h5>Edit Valuation Report</h5>
<p>In the form below, edit the valuation report details:-</p>
<form action="<?php echo base_url(); ?>report/save_changes" method="post" enctype="multipart/form-data" class="vertical">

	<!-- Set a unique code for each valuation report -->
	<?php echo form_error('report_unique_code'); ?>
	<input type="hidden" name="report_unique_code" value="<?php echo $report_details->report_unique_code; ?>" />
	<input type="hidden" name="report_id" value="<?php echo $report_details->id; ?>" />

	<!-- ADMINISTRATION DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">Administration Details</p>

		<div class="col_6">

			<!-- Receipt Number -->
			<label for="receipt_number">Receipt Number</label>
			<input type="text" name="receipt_number" id="receipt_number" class="w200px" value="<?php echo $report_details->receipt_number; ?>" placeholder="E.g. 00123" />

			<!-- Valuation Sheet Serial Number -->
			<label for="serial_number">Valuation Sheet Serial Number</label>
			<input type="text" name="serial_number" id="serial_number" class="w200px" value="<?php echo $report_details->serial_number; ?>" placeholder="E.g. A000144" />

			<!-- Date of Inspection -->
			<label for="inspection_date">Date of Inspection <i class="icon-star required smaller"></i></label>
			<input type="text" name="inspection_date" id="inspection_date" class="date-picker w300px" value="<?php echo $this->date_model->to_textual_date($report_details->inspection_date); ?>" placeholder="E.g. <?php echo date('j F, Y', time()); ?>" />

			<!-- Client Name -->	
			<label for="client_name">Name of Client <i class="icon-star required smaller"></i></label>
			<input type="text" name="client_name" id="client_name" value="<?php echo $report_details->client_name; ?>" placeholder="E.g. John Ndoo" />

			<!-- Client Contact Details (Mobile Number) -->
			<label for="client_contacts">Client Contact Details</label>
			<input type="text" name="client_contacts" id="client_contacts" value="<?php echo $report_details->client_contacts; ?>" placeholder="E.g. 0700 000000" />

		</div>

		<div class="col_6">
			
			<!-- Insurance Company -->
			<label for="insurance_company_id">Insurance Company / Company Requesting Valuation <i class="icon-star required smaller"></i></label>
			<select name="insurance_company_id" id="insurance_company_id">
				<?php 
				foreach ($clients->result() as $insurance_company): 
				// Check if the insurance company is selected
				$selected = ($insurance_company->id == $report_details->insurance_company_id) ? ' selected="selected"' : '';
				?>
				<option value="<?php echo $insurance_company->id; ?>"<?php echo $selected; ?>><?php echo $insurance_company->name; ?></option>
				<?php endforeach ?>
			</select>
			
			<!-- Policy Number -->
			<label for="policy_number">Policy Number</label>
			<input type="text" name="policy_number" id="policy_number" value="<?php echo $report_details->policy_number; ?>" placeholder="E.g. 018/010/17765/<?php echo date('Y/m',time()); ?>" />

			<!-- Policy Expiry Date -->
			<label for="policy_expiry_date">Policy Expiry Date</label>
			<input type="text" name="policy_expiry_date" id="policy_expiry_date" class="date-picker w300px" value="<?php echo $this->date_model->to_textual_date($report_details->policy_expiry_date);; ?>" placeholder="E.g. 31 December, <?php echo date('Y',time()); ?>" />

		</div>

	<!-- VEHICLE DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">Vehicle Details</p>

		<div class="col_6">

			<!-- Registration Number -->
			<label for="reg_number">Registration Number <i class="icon-star required smaller"></i></label>
			<input type="text" name="reg_number" id="reg_number" value="<?php echo $report_details->reg_number; ?>" placeholder="E.g. KZZ 999Z" />

			<!-- Vehicle Make -->	
			<label for="make">Make <i class="icon-star required smaller"></i></label>
			<input type="text" name="make" id="make" value="<?php echo $report_details->make; ?>" placeholder="E.g. Toyota Corolla 110" />

			<!-- Vehicle Make -->	
			<label for="make">Model <i class="icon-star required smaller"></i></label>
			<input type="text" name="model" id="model" value="<?php echo $report_details->model; ?>" placeholder="E.g. Toyota Corolla 110" />

			<!-- Vehicle Body Type -->
			<label for="body_type">Body Type</label>
			<input type="text" name="body_type" id="body_type" value="<?php echo $report_details->body_type; ?>" placeholder="E.g. Station Wagon Auto 4WD" />

			<!-- Vehicle Colour -->
			<label for="colour">Colour <i class="icon-star required smaller"></i></label>
			<input type="text" name="colour" id="colour" value="<?php echo $report_details->colour; ?>" placeholder="E.g. Silver" />

			<!-- Vehicle Mileage -->
			<label for="mileage">Mileage (KM)</label>
			<input type="text" name="mileage" id="mileage" value="<?php echo $report_details->mileage; ?>" placeholder="E.g. 34,675" />
			
			<!-- Country of Origin -->
			<label for="country_of_origin">Country of Origin</label>
			<input type="text" name="country_of_origin" id="country_of_origin" value="<?php echo $report_details->country_of_origin; ?>" placeholder="E.g. Japan" />

		</div>

		<div class="col_6">
			
			<!-- Chassis Number -->
			<label for="chassis_number">Chassis Number <i class="icon-star required smaller"></i></label>
			<input type="text" name="chassis_number" id="chassis_number" value="<?php echo $report_details->chassis_number; ?>" placeholder="E.g. TC54W-190087" />

			<!-- Engine Number -->
			<label for="engine_number">Engine Number <i class="icon-star required smaller"></i></label>
			<input type="text" name="engine_number" id="engine_number" value="<?php echo $report_details->engine_number; ?>" placeholder="E.g. JW201-883933" />

			<!-- Year of Manufacture -->
			<label for="manufacture_year">Year of Manufacture <i class="icon-star required smaller"></i></label>
			<input type="text" name="manufacture_year" id="manufacture_year" class="w200px" value="<?php echo $report_details->manufacture_year; ?>" placeholder="E.g. <?php echo date('Y',time())-4; ?>" />

			<!-- Engine Rating -->
			<label for="engine_rating">Engine Rating (cc) <i class="icon-star required smaller"></i></label>
			<input type="text" name="engine_rating" id="engine_rating" value="<?php echo $report_details->engine_rating; ?>" placeholder="E.g. 1990cc" />

			<!-- First Registration Date -->
			<label for="first_registration_date">First Registration Date</label>
			<input type="text" name="first_registration_date" id="first_registration_date" value="<?php echo $report_details->first_registration_date; ?>" class="date-picker w300px" placeholder="E.g. 1 January, <?php echo date('Y',time())-4; ?>" />

			<!-- Type of Fuel -->
			<label for="fuel_type">Type of Fuel</label>
			<input type="text" name="fuel_type" id="fuel_type" value="<?php echo $report_details->fuel_type; ?>" placeholder="E.g. Diesel" />

		</div>

	<!-- VEHICLE INSPECTION/VALUATION DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">Vehicle Inspection Details</p>

		<div class="col_6">
			
			<!-- Body Work -->
			<label for="body_work">Body Work</label>
			<input type="text" name="body_work" id="body_work" value="<?php echo $report_details->body_work; ?>" placeholder="E.g. Good" />

			<!-- Mechanical Condition -->
			<label for="mechanical_condition">Mechanical Condition</label>
			<input type="text" name="mechanical_condition" id="mechanical_condition" value="<?php echo $report_details->mechanical_condition; ?>" placeholder="E.g. Good" />

			<!-- Electrical -->
			<label for="electricals">Electrical Condition</label>
			<input type="text" name="electricals" id="electricals" value="<?php echo $report_details->electricals; ?>" placeholder="E.g. Okay" />

			<!-- Tyres (% Remaining) -->
			<label for="tyre_condition">Tyres (% Remaining)</label>
			<input type="text" name="tyre_condition" id="tyre_condition" value="<?php echo $report_details->tyre_condition; ?>" placeholder="E.g. Four 80%, One 90% Good" />

			<!-- Anti-Theft Device -->
			<label for="anti_theft_device">Anti-Theft Device</label>
			<input type="text" name="anti_theft_device" id="anti_theft_device" value="<?php echo $report_details->anti_theft_device; ?>" placeholder="E.g. Installed / None" />

		</div>

		<div class="col_6">
			
			<!-- Accessories/Extras -->
			<label for="accessories_extras">Accessories / Extras</label>
			<?php echo form_error('accessories_extras'); ?>
			<!-- <textarea name="accessories_extras" id="accessories_extras" cols="30" rows="10"><?php echo set_value('accessories_extras'); ?></textarea>
			-->

			<table border="0" class="tableDemo bordered">
				<tr class="ajaxTitle">
					<th width="2%">Sr</th>
					<th width="20%">Accessory Name</th>
					<th width="20%">Value</th>
					<th width="20%">Action</th>
				</tr>
				<?php
				if(count($records)){
				 $i = 1;	
				 $eachRecord= 0;
				 foreach($records as $key=>$eachRecord){
				?>
				<tr id="<?=$eachRecord['id'];?>">
					<td><?=$i++;?></td>
					<td class="name"><?=$eachRecord['name'];?></td>
					<td class="value"><?=$eachRecord['value'];?></td>
					<td>
						<a href="javascript:;" id="<?=$eachRecord['id'];?>" class="ajaxEdit"><img src="" class="eimage"></a>
						<a href="javascript:;" id="<?=$eachRecord['id'];?>" class="ajaxDelete"><img src="" class="dimage"></a>
					</td>
				</tr>
				<?php }
				}
				?>
			</table>

			<!-- General Condition -->
			<label for="general_condition">General Condition</label>
			<input type="text" name="general_condition" id="general_condition" value="<?php echo $report_details->general_condition; ?>" placeholder="E.g. Good" />

		</div>

	<!-- ASSESSED VALUE DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">Assessed Value Details</p>

		<div class="col_6">
			
			<!-- Assessed Value Number -->
			<label for="assessed_value_number">Assessed Value (KES) <i class="icon-star required smaller"></i></label>
			<input type="text" name="assessed_value_number" id="assessed_value_number" value="<?php echo $report_details->assessed_value_number; ?>" placeholder="E.g. 1,800,000" />
			
			<!-- Assessed Value Words -->
			<label for="assessed_value_words">Assessed Value (In Words) <i class="icon-star required smaller"></i></label>
			<input type="text" name="assessed_value_words" id="assessed_value_words" value="<?php echo $report_details->assessed_value_words; ?>" placeholder="E.g. One Million Eight Hundred Thousand Shillings Only" />
			
			<!-- Forced Value Number -->
			<label for="forced_value_number">Forced Value (KES) <i class="icon-star required smaller"></i></label>
			<input type="text" name="forced_value_number" id="forced_value_number" value="<?php echo $report_details->forced_value_number; ?>" placeholder="E.g. 1,400,000" />
			
			<!-- Forced Value Words -->
			<label for="forced_value_words">Forced Value (In Words) <i class="icon-star required smaller"></i></label>
			<input type="text" name="forced_value_words" id="forced_value_words" value="<?php echo $report_details->forced_value_words; ?>" placeholder="E.g. One Million Four Hundred Thousand Shillings Only" />
			
			<!-- Note Value -->
			<label for="note_value">Note Value</label>
			<input type="text" name="note_value" id="note_value" value="<?php echo $report_details->note_value; ?>" placeholder="E.g. Windscreen 20,000/=" />
			
			<!-- Valuation Officer -->
			<label for="valuation_officer">Valuation Officer</label>
			<input type="text" name="valuation_officer" id="valuation_officer" value="<?php echo $report_details->valuation_officer; ?>" placeholder="E.g. Jane Doe" />

		</div>

		<div class="col_6">
			
			<!-- General Remarks -->
			<label for="remarks">General Remarks</label>
			<input type="text" name="remarks" id="remarks" value="<?php echo $report_details->remarks; ?>" placeholder="E.g. Vehicle in good condition" />
			
			<!-- NB -->
			<label for="nb">NB</label>
			<input type="text" name="nb" id="nb" value="<?php echo $report_details->nb; ?>" placeholder="E.g. None" />
			
			<!-- Remedy -->
			<label for="remedy">Remedy</label>
			<input type="text" name="remedy" id="remedy" value="<?php echo $report_details->remedy; ?>" placeholder="E.g. N/A" />

		</div>

	<!-- FOR BANKS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">FOR BANK VALUATIONS</p>

		<div class="col_6">
			
			<!-- Assessed Value Number -->
			<label for="bank_market_value">Market Value</label>
			<input type="text" name="bank_market_value" id="bank_market_value" value="<?php echo $report_details->bank_market_value; ?>" placeholder="E.g. 1,600,000" />

		</div>

		<div class="col_6">
			
			<!-- General Remarks -->
			<label for="bank_forced_value">Forced Value</label>
			<input type="text" name="bank_forced_value" id="bank_forced_value" value="<?php echo $report_details->bank_forced_value; ?>" placeholder="E.g. 1,400,000" />

		</div>


	<!-- PHOTOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">Photos of the Assessed Vehicle</p>
		
		<div class="col_12">
			<table>
				<thead>
					<tr>
						<th>Photo 1</th>
						<th>Photo 2</th>
						<th>Photo 3</th>
						<th>Photo 4</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						// Check for the # of records returned
						$number_of_photos = $photos->num_rows();
						$number_of_new_photos = 4 - $number_of_photos;
						foreach ($photos->result() as $photo) 
						{
							echo '<td><img src="'.base_url().'assets/uploads/'.$photo->photo_name.'" width="250" /></td>';
						}
						if ($number_of_new_photos > 0) 
						{
							// Create spaces for the new photos
							for ($i=($number_of_photos+1); $i<=4; $i++) 
							{
								// Create the name of the file field
								$field_name = 'userfile' . $i;
								echo '<td><input type="file" name="'.$field_name.'" placeholder="Photo '.$i.'" /></td>';
							}
						}
						?>
					</tr>
				</tbody>
			</table>
		</div>


	<!-- SUBMIT BUTTON -->
	<div class="clear"></div>
	<div class="col_12">
		
		<!-- submit button -->
		<input type="submit" value="Save Report Changes" class="blue" />

	</div>

</form>


<!-- JQUERY SCRIPT -->
<script>

	$(document).ready(function() {

		// Inspection Date
		$("#inspection_date").datepicker({
	    	changeMonth: true,
	    	changeYear: true,
	    	dateFormat: "d MM, yy",
	    	minDate: "-1M",
	    	maxDate: "+1M"
		});

		// Policy expiry date
		$("#policy_expiry_date").datepicker({
	    	changeMonth: true,
	    	changeYear: true,
	    	dateFormat: "d MM, yy",
	    	minDate: 0,
	    	maxDate: "+2Y"
		});

		// First Registration Date
		$("#first_registration_date").datepicker({
	    	// changeMonth: true,
	    	// changeYear: true,
	    	dateFormat: "d MM, yy"
	    	// minDate: "-30Y",
	    	// maxDate: "+1M"
		});

	});

</script>