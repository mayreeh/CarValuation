
<h5>Create Valuation Report</h5>
<div class="required"><i class="icon-star required smaller"></i> - Required Field</div>
<p>In the form below, provide the valuation report details:-</p>
<form action="<?php echo base_url(); ?>report/save_new" method="post" enctype="multipart/form-data" class="vertical">

	<!-- Set a unique code for each valuation report -->
	<?php echo form_error('report_unique_code'); ?>
	<input type="hidden" name="report_unique_code" value="<?php echo md5(time()); ?>" />

	<!-- ADMINISTRATION DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">Administration Details</p>

		<div class="col_6">

			<!-- Receipt Number -->
			<label for="receipt_number">Receipt Number <i class="icon-star required smaller"></i></label>
			<?php echo form_error('receipt_number'); ?>
			<input type="text" name="receipt_number" id="receipt_number" class="w200px" value="<?php echo set_value('receipt_number'); ?>" placeholder="E.g. 00123" />

			<!-- Valuation Sheet Serial Number -->
			<label for="serial_number">Valuation Sheet Serial Number</label>
			<?php echo form_error('serial_number'); ?>
			<input type="text" name="serial_number" id="serial_number" class="w200px" value="<?php echo set_value('serial_number'); ?>" placeholder="E.g. A000144" />

			<!-- Date of Inspection -->
			<label for="inspection_date">Date of Inspection <i class="icon-star required smaller"></i></label>
			<?php echo form_error('inspection_date'); ?>
			<input type="text" name="inspection_date" id="inspection_date" class="date-picker w300px" value="<?php echo set_value('inspection_date'); ?>" placeholder="E.g. <?php echo date('j F, Y', time()); ?>" />

			<!-- Client Name -->	
			<label for="client_name">Name of Client: <i class="icon-star required smaller"></i></label>
			<?php echo form_error('client_name'); ?>
			<input type="text" name="client_name" id="client_name" value="<?php echo set_value('client_name'); ?>" placeholder="E.g. John Ndoo" />

			<!-- Client Contact Details (Mobile Number) -->
			<label for="client_contacts">Client Contact Details</label>
			<?php echo form_error('client_contacts'); ?>
			<input type="text" name="client_contacts" id="client_contacts" value="<?php echo set_value('client_contacts'); ?>" placeholder="E.g. 0700 000000" />

		</div>

		<div class="col_6">
			
			<!-- Insurance Company -->
			<label for="insurance_company_id">Client Type <i class="icon-star required smaller"></i></label>
			<!--<select name="insurance_company_id" id="insurance_company_id">
				<?php foreach ($clients->result() as $insurance_company): ?>
				<option value="<?php echo $insurance_company->id; ?>" <?php echo set_select('insurance_company_id', $insurance_company->id); ?> ><?php echo $insurance_company->name; ?></option>
				<?php endforeach ?>
			</select>-->
			<span><select name="insurance_company_id" id="insurance_company_id">
				<option value=""></option>
				<option value="Bank">Bank</option>
				<option value="Insuarance Company">Insuarance Company</option>
				<option value="other">Other</option>
				
				
			</select>
			<span id="c_type"></span>

			
			<!-- Policy Number -->
			<label for="policy_number">Policy Number</label>
			<input type="text" name="policy_number" id="policy_number" value="<?php echo set_value('policy_number'); ?>" placeholder="E.g. 018/010/17765/<?php echo date('Y/m',time()); ?>" />

			<!-- Policy Expiry Date -->
			<label for="policy_expiry_date">Policy Expiry Date</label>
			<input type="text" name="policy_expiry_date" id="policy_expiry_date" class="date-picker w300px" value="<?php echo set_value('policy_expiry_date'); ?>" placeholder="E.g. 31 December, <?php echo date('Y',time()); ?>" />

		</div>

	<!-- VEHICLE DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">Vehicle Details</p>

		<div class="col_6">

			<!-- Registration Number -->
			<label for="reg_number">Registration Number <i class="icon-star required smaller"></i></label>
			<?php echo form_error('reg_number'); ?>
			<input type="text" name="reg_number" id="reg_number" value="<?php echo set_value('reg_number'); ?>" placeholder="E.g. KZZ 999Z" />

			<!-- Vehicle Make -->	
			<label for="make">Make/Model <i class="icon-star required smaller"></i></label>
			<?php echo form_error('make'); ?>
			<input type="text" name="make" id="make" value="<?php echo set_value('make'); ?>" placeholder="E.g. Toyota Corolla 110" />

			<!-- Vehicle Body Type -->
			<label for="body_type">Body Type</label>
			<?php echo form_error('body_type'); ?>
			<!--<input type="text" name="body_type" id="body_type" value="<?php echo set_value('body_type'); ?>" placeholder="E.g. Station Wagon Auto 4WD" />-->
			<span><select name="body_type" id="body_type">
				<option value=""></option>
				<option value="Saloon">Saloon</option>
				<option value="Station Wagon">Station Wagon</option>
				<option value="Van">Van</option>
				<option value="Double Cab">Double Cab</option>
				<option value="Bus">Bus</option>
				<option value="Truck">Truck</option>
				<option value="Trailer">Trailer</option>
				<option value="other">Other</option>
				
			</select>
			<span id="bd_type"></span>
			<!-- Vehicle Colour -->
			<label for="colour">Colour <i class="icon-star required smaller"></i></label>
			<?php echo form_error('colour'); ?>
			<input type="text" name="colour" id="colour" value="<?php echo set_value('colour'); ?>" placeholder="E.g. Silver" />

			<!-- Vehicle Mileage -->
			<label for="mileage">Mileage (KM)</label>
			<?php echo form_error('mileage'); ?>
			<input type="text" name="mileage" id="mileage" value="<?php echo set_value('mileage'); ?>" placeholder="E.g. 34,675" />
			
			<!-- Country of Origin -->
			<label for="country_of_origin">Country of Origin</label>
			<?php echo form_error('country_of_origin'); ?>
			<?php include("countries.php");?>
			<select name="country_of_origin" id="country_of_origin">
				<option value=""></option>
                 <?php foreach($countries as $country){?>
                   <option value="<?php echo $country ?>"<?php echo set_select('country_of_origin',$country)?>><?php echo ucfirst($country)?></option>
                                       
               <?php } ?>
                     </select>

			<!--<input type="text" name="country_of_origin" id="country_of_origin" value="<?php echo set_value('country_of_origin'); ?>" placeholder="E.g. Japan" />-->

		</div>

		<div class="col_6">
			
			<!-- Chassis Number -->
			<label for="chassis_number">Chassis Number <i class="icon-star required smaller"></i></label>
			<?php echo form_error('chassis_number'); ?>
			<input type="text" name="chassis_number" id="chassis_number" value="<?php echo set_value('chassis_number'); ?>" placeholder="E.g. TC54W-190087" />

			<!-- Engine Number -->
			<label for="engine_number">Engine Number <i class="icon-star required smaller"></i></label>
			<?php echo form_error('engine_number'); ?>
			<input type="text" name="engine_number" id="engine_number" value="<?php echo set_value('engine_number'); ?>" placeholder="E.g. JW201-883933" />

			<!-- Year of Manufacture -->
			<label for="manufacture_year">Year of Manufacture <i class="icon-star required smaller"></i></label>
			<?php echo form_error('manufacture_year'); ?>
			<select name="manufacture_year" id="manufacture_year">
				<option value=""></option>

                 <?php $year=date('Y');
                 for($i=$year;$i>=1970;$i--){?>
                   <option value="<?php echo $i ?>"<?php echo set_select('manufacture_year',$i)?>><?php echo $i?></option>
                    <?php } ?>
                     </select>	

			<!-- Engine Rating -->
			<label for="engine_rating">Engine Rating (cc) <i class="icon-star required smaller"></i></label>
			<?php echo form_error('engine_rating'); ?>
			<!--<input type="text" name="engine_rating" id="engine_rating" value="<?php echo set_value('engine_rating'); ?>" placeholder="E.g. 1990cc" />-->
			<span><select name="engine_rating" id="engine_rating">
				<option value=""></option>
				<option value="990cc">990cc</option>
				<option value="1290cc">1290cc</option>
				<option value="1496cc">1496cc</option>
				<option value="1796cc">1796cc</option>
				<option value="1998cc">1998cc</option>
				<option value="2200cc">2200cc</option>
				<option value="2700cc">2700cc</option>
				<option value="2982cc">2982cc</option>
				<option value="3200cc">3200cc</option>
				<option value="3400cc">3400cc</option>
				<option value="3500cc">3500cc</option>
				<option value="4000cc">4000cc</option>
				<option value="5000cc">5000cc</option>
				<option value="other">Other</option>
				
			</select>
			<span id="eng_rt"></span>
			<!-- First Registration Date -->
			<label for="first_registration_date">First Registration Date</label>
			<?php echo form_error('first_registration_date'); ?>
			<input type="text" name="first_registration_date" id="first_registration_date" value="<?php echo set_value('first_registration_date'); ?>" class="date-picker w300px" placeholder="E.g. 1 January, <?php echo date('Y',time())-4; ?>" />

			<!-- Type of Fuel -->
			<label for="fuel_type">Type of Fuel</label>
			<?php echo form_error('fuel_type'); ?>
			<select name="fuel_type" id="fuel_type">
				<option value=""></option>
				<option value="Diesel">Diesel</option>
				<option value="Electric(Hybrid)">Electric(Hybrid)</option>
				<option value="Petrol">Petrol</option>

                 
                     </select>

		</div>

	<!-- VEHICLE INSPECTION/VALUATION DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">Vehicle Inspection Details</p>

		<div class="col_6">
			
			<!-- Body Work -->
			<label for="body_work">Body Work</label>
			<?php echo form_error('body_work'); ?>
			<!--<input type="text" name="body_work" id="body_work" value="<?php echo set_value('body_work'); ?>" placeholder="E.g. Good" />
			-->
			<span><select name="body_work" id="body_work">
				<option value=""></option>
				<option value="good">Good Condition</option>
				<option value="other">Other</option>
			</select>
			<span id="other_bd"></span>
			<!-- Mechanical Condition -->
			<label for="mechanical_condition">Mechanical Condition</label>
			<?php echo form_error('mechanical_condition'); ?>
			<!--<input type="text" name="mechanical_condition" id="mechanical_condition" value="<?php echo set_value('mechanical_condition'); ?>" placeholder="E.g. Good" />
			-->
			<span><select name="mechanical_condition" id="mechanical_condition">
				<option value=""></option>
				<option value="good">In sound condition</option>
				<option value="other">Other</option>
			</select>
			<span id="mechanical_cond"></span>
			<!-- Electrical -->
			<label for="electricals">Electrical Condition</label>
			<?php echo form_error('electricals'); ?>
			<!--<input type="text" name="electricals" id="electricals" value="<?php echo set_value('electricals'); ?>" placeholder="E.g. Okay" />-->
			<span><select name="electricals" id="electricals">
				<option value=""></option>
				<option value="Okay">Okay</option>
				<option value="Servicable">Servicable</option>
				<option value="other">Other</option>
			</select>
			<span id="electrical_cond"></span>
			<!-- Tyres (% Remaining) -->
			<label for="tyre_condition">Tyres (% Remaining)</label>
			<?php echo form_error('tyre_condition'); ?>
			<input type="text" name="tyre_condition" id="tyre_condition" value="<?php echo set_value('tyre_condition'); ?>" placeholder="E.g. Four 80%, One 90% Good" />

			<!-- Anti-Theft Device -->
			<label for="anti_theft_device">Anti-Theft Device</label>
			<?php echo form_error('anti_theft_device'); ?>
			<!--<input type="text" name="anti_theft_device" id="anti_theft_device" value="<?php echo set_value('anti_theft_device'); ?>" placeholder="E.g. Installed / None" />
			-->
			<span><select name="anti_theft_device" id="anti_theft_device">
				<option value=""></option>
				<option value="Car Track">Car Track</option>
				<option value="Inbuilt Security System">Inbuilt Security System</option>
				<option value="Car Alarm">Car Alarm</option>
				<option value="Cut Off">Cut Off</option>
				<option value="other">Other</option>

			</select>
			<span id="anti_theft_cond"></span>
		</div>

		<div class="col_6">
			
			<!-- Accessories/Extras -->
			<label for="accessories_extras">Accessories / Extras</label>
			<?php echo form_error('accessories_extras'); ?>
			<textarea name="accessories_extras" id="accessories_extras" cols="30" rows="10"><?php echo set_value('accessories_extras'); ?></textarea>

			<!-- General Condition -->
			<label for="general_condition">General Condition</label>
			<?php echo form_error('general_condition'); ?>
			<!--<input type="text" name="general_condition" id="general_condition" value="<?php echo set_value('general_condition'); ?>" placeholder="E.g. Good" />-->
			<select name="general_condition" id="general_condition">
				<option value=""></option>
				<option value=" Good">Good</option>
				<option value="Fair">Fair</option>
				<option value="In accident state">In accident state</option>
				<option value="Grounded">Grounded</option>
			</select>
		</div>

	<!-- ASSESSED VALUE DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">Assessed Value Details</p>

		<div class="col_6">
			
			<!-- Assessed Value Number -->
			<label for="assessed_value_number">Assessed Value (KES) <i class="icon-star required smaller"></i></label>
			<?php echo form_error('assessed_value_number'); ?>
			<input type="text" name="assessed_value_number" id="assessed_value_number" value="<?php echo set_value('assessed_value_number'); ?>" placeholder="E.g. 1,800,000" />
			
			<!-- Assessed Value Words -->
			<label for="assessed_value_words">Assessed Value (In Words) <i class="icon-star required smaller"></i></label>
			<?php echo form_error('assessed_value_words'); ?>
			<input type="text" name="assessed_value_words" id="assessed_value_words" value="<?php echo set_value('assessed_value_words'); ?>" placeholder="E.g. One Million Eight Hundred Thousand Shillings Only" />
			
			<!-- Forced Value Number -->
			<span class="banks_functions">
			<label for="forced_value_number">Forced Value (KES) <i class="icon-star required smaller"></i></label>
			<?php echo form_error('forced_value_number'); ?>
			<input type="text" name="forced_value_number" id="forced_value_number" value="<?php echo set_value('forced_value_number'); ?>" placeholder="E.g. 1,400,000" />
			
			<!-- Forced Value Words -->
			<label for="forced_value_words">Forced Value (In Words) <i class="icon-star required smaller"></i></label>
			<?php echo form_error('forced_value_words'); ?>
			<input type="text" name="forced_value_words" id="forced_value_words" value="<?php echo set_value('forced_value_words'); ?>" placeholder="E.g. One Million Four Hundred Thousand Shillings Only" />
			</span>
			<!-- Note Value -->
			<label for="note_value">Note Value</label>
			<?php echo form_error('note_value'); ?>
			<input type="text" name="note_value" id="note_value" value="<?php echo set_value('note_value'); ?>" placeholder="E.g. Windscreen 20,000/=" />
			
			<!-- Valuation Officer -->
			<label for="valuation_officer">Valuation Officer</label>
			<?php echo form_error('valuation_officer'); ?>
			<input type="text" name="valuation_officer" id="valuation_officer" value="<?php echo set_value('valuation_officer'); ?>" placeholder="E.g. Jane Doe" />

		</div>

		<div class="col_6">
			
			<!-- General Remarks -->
			<label for="remarks">General Remarks</label>
			<?php echo form_error('remarks'); ?>
			<!--<input type="text" name="remarks" id="remarks" value="<?php echo set_value('remarks'); ?>" placeholder="E.g. Vehicle in good condition" />-->
			<span><select name="remarks" id="remarks">
				<option value=""></option>
				<option value="Vehicle Well Maintained">Vehicle Well Maintained</option>
				<option value="No specific remark">No specific remark</option>
				<option value="other">Other</option>

			</select>
			<span id="remarks_cond"></span>
			<!-- NB -->
			<label for="nb">NB</label>
			<?php echo form_error('nb'); ?>
			<input type="text" name="nb" id="nb" value="<?php echo set_value('nb'); ?>" placeholder="E.g. None" />
			
			<!-- Remedy -->
			<label for="remedy">Remedy</label>
			<?php echo form_error('remedy'); ?>
			<!--<input type="text" name="remedy" id="remedy" value="<?php echo set_value('remedy'); ?>" placeholder="E.g. N/A" />-->
			<span><select name="remedy" id="remedy">
				<option value=""></option>
				<option value="None">None</option>
				
				<option value="other">Other</option>

			</select>
			<span id="remedy_cond"></span>
		</div>

	<!-- FOR BANKS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<span class='banks_functions'>
		<p class="valuation-form-section-header">FOR BANK VALUATIONS</p>

		<div class="col_6">
			
			<!-- Assessed Value Number -->
			<label for="bank_market_value">Market Value</label>
			<?php echo form_error('bank_market_value'); ?>
			<input type="text" name="bank_market_value" id="bank_market_value" value="<?php echo set_value('bank_market_value'); ?>" placeholder="E.g. 1,600,000" />

		</div>

		<div class="col_6">
			
			<!-- General Remarks -->
			<label for="bank_forced_value">Forced Value</label>
			<?php echo form_error('bank_forced_value'); ?>
			<input type="text" name="bank_forced_value" id="bank_forced_value" value="<?php echo set_value('bank_forced_value'); ?>" placeholder="E.g. 1,400,000" />

		</div>
	</span>


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
						<td><input type="file" name="userfile1" placeholder="Photo 1" /></td>
						<td><input type="file" name="userfile2" placeholder="Photo 2" /></td>
						<td><input type="file" name="userfile3" placeholder="Photo 3" /></td>
						<td><input type="file" name="userfile4" placeholder="Photo 4" /></td>
					</tr>
				</tbody>
			</table>
		</div>


	<!-- SUBMIT BUTTON -->
	<div class="clear"></div>
	<div class="col_12">
		
		<!-- submit button -->
		<input type="submit" value="Save Report" class="blue" />

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
		$("#body_work").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#other_bd").append('<textarea name="condition_specified" value="Shit" id="cond">');


			}else{
			$("#cond").remove();
		}
		});
		$("#mechanical_condition").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#mechanical_cond").append('<textarea name="mechanical_specified" value="" id="mech">');


			}else{
			$("#mech").remove();
		}
		});
		$("#electricals").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#electrical_cond").append('<textarea name="electricals_specified" value="" id="elec">');


			}else{
			$("#elec").remove();
		}
		});
		$("#anti_theft_device").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#anti_theft_cond").append('<textarea name="anti_theft_specified" value="" id="anti">');


			}else{
			$("#anti").remove();
		}
		});
		$("#remarks").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#remarks_cond").append('<textarea name="remarks_specified" value="" id="remarkspes">');


			}else{
			$("#remarkspes").remove();
		}
		});
		$("#remedy").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#remedy_cond").append('<textarea name="remedy_specified" value="" id="rem">');


			}else{
			$("#rem").remove();
		}
		});
		$("#body_type").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#bd_type").append('<textarea name="bd_type_specified" value="" id="bd">');


			}else{
			$("#bd").remove();
		}
		});
		$("#engine_rating").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#eng_rt").append('<textarea name="engine_ratinge_specified" value="" id="eng">');


			}else{
			$("#eng").remove();
		}
		});
		$("#insurance_company_id").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#c_type").append('<textarea name="insurance_company_id_specified" value="" id="ctype">');


			}else{
			$("#ctype").remove();
		}
		});
		$("#insurance_company_id").change(function(){
			//console.log($(this).val());
			if ($(this).val()!="Bank"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				//$("#c_type").append('<textarea name="insurance_company_id_specified" value="" id="ctype">');
				$(".banks_functions").remove();


			}
		});



	});

</script>