<?php

		$insurance_companies_list='<select name="insurance_name">';
		foreach ($insurance as $insurance_company)
			{
				$insurance_companies_list=$insurance_companies_list.'<option value="'.$insurance_company['id'].'">'.$insurance_company['name'].'</option>';
			}
		$insurance_companies_list=$insurance_companies_list.'</select>';

		$bank_companies_list='<select name="bank_name">';
		foreach ($banks as $bank)
			{
				$bank_companies_list=$bank_companies_list.'<option value="'.$bank['id'].'">'.$bank['name'].'</option>';
			}
		$bank_companies_list=$bank_companies_list.'</select>';

		$private_valuers_list='<select name="private_valuers_name">';
		foreach ($private as $priv)
			{
				$private_valuers_list=$private_valuers_list.'<option value="'.$priv['id'].'">'.$priv['name'].'</option>';
			}
		$private_valuers_list=$private_valuers_list.'</select>';

?>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
  	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"></script>
  	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-ui.js"></script>


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
				$("#other_bd").append('<textarea name="body_work" value="Shit" id="cond">');


			}else{
			$("#cond").remove();
		}
		});
		$("#mechanical_condition").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#mechanical_cond").append('<textarea name="mechanical_condition" value="" id="mech">');


			}else{
			$("#mech").remove();
		}
		});
		$("#electricals").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#electrical_cond").append('<textarea name="electricals" value="" id="elec">');


			}else{
			$("#elec").remove();
		}
		});
		$("#anti_theft_device").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#anti_theft_cond").append('<textarea name="anti_theft_device" value="" id="anti">');


			}else{
			$("#anti").remove();
		}
		});
		$("#remarks").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#remarks_cond").append('<textarea name="remarks" value="" id="remarkspes">');


			}else{
			$("#remarkspes").remove();
		}
		});
		$("#remedy").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#remedy_cond").append('<textarea name="remedy" value="" id="rem">');


			}else{
			$("#rem").remove();
		}
		});
		$("#body_type").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#bd_type").append('<textarea name="body_type" value="" id="bd">');


			}else{
			$("#bd").remove();
		}
		});
		$("#engine_rating").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other"){
				//console.log('I have been activated');
				//$('<input>').appendTo('#body_work');
				$("#eng_rt").append('<textarea name="engine_rating" value="" id="eng">');


			}else{
			$("#eng").remove();
		}
		});
		$("#add_another").click(function(){
			console.log('clicked');
			$("#add_another").toggle();
			$("#new_accessory").append('<span id="new_accessory_added"><table><tr><td><label for="new_accessory_added" >Enter Accesory Names separated by comma (,) <i class="icon-star  smaller"></i></label><input type="text" name="accessories_extras_added" /></td></tr></table>');
		});
		$("#add_accesory_save").click(function(){
			console.log('clicked');
			$("#add_another").toggle();
			$("#new_accessory_added").remove();
			//$("#new_accessory").append('<span id="new_accessory_added"><table><tr><td><label for="new_accessory_added" >Accesory Name <i class="icon-star required smaller"></i></label><input type="text" name="new_accessory_added" /></td><td><img id="add_accesory_save" src ="<?php echo base_url();?>images/save.png" alt="add accesory"></td></tr></table>');
		});

		$("#destination").change(function(){
			//console.log($(this).val());
			if ($(this).val()=="other")
				{
					console.log('private choosen');
					$("#insurance_name").remove();
					$("#bank_name").remove();
					$("#destination_details").append('<span id="private_valuers_name"><label for="private_valuers_name" >Select Person <i class="icon-star required smaller"></i></label><?php echo str_replace(array("\r","\n"), "", $private_valuers_list); ?><label for="private_valuers_name" >Private Valuers <i class="icon-star required smaller"></i></label><input type="text" name="private_valuers_name" value="<?php echo $report_details->private_valuers_name; ?>" placeholder="E.g. JOE DOE" /></span>');

				}
			else if($(this).val()=="insurance")
				{
					console.log('insurance choosen');
					$("#private_valuers_name").remove();
					$("#bank_name").remove();
					$("#destination_details").append('<span id="insurance_name"><label for="insurance_name" >Select insurance <i class="icon-star required smaller"></i></label><?php echo str_replace(array("\r","\n"), "", $insurance_companies_list); ?><label for="insurance_agency" >Insurance Agency <i class="icon-star required smaller"></i></label><input type="text" name="insurance_agency" value="<?php echo $report_details->insurance_agency; ?>" placeholder="E.g. MOI AVENUE" /></span>');
					$("#4ced_value1").remove();
				}
			else if($(this).val()=="bank")
				{
					console.log('Bank choosen');
					$("#private_valuers_name").remove();
					$("#insurance_name").remove();
					$("#4ced_value1").remove();
					$("#destination_details").append('<span id="bank_name"><label for="bank_name" >Select Bank <i class="icon-star required smaller"></i></label><?php echo str_replace(array("\r","\n"), "", $bank_companies_list); ?><label for="bank_branch" >Bank Branch <i class="icon-star required smaller"></i></label><input type="text" name="bank_branch" value="<?php echo $report_details->bank_branch; ?>" placeholder="E.g. MOI AVENUE" /></span>');

					// forced value
					$("#4ced_value").append('<span id="4ced_value1"><label for="forced_value_number">Forced Value (KES) <i class="icon-star required smaller"></i></label><?php echo form_error("forced_value_number"); ?><input type="text" name="forced_value_number" id="forced_value_number" value="<?php echo set_value("forced_value_number"); ?>" placeholder="E.g. 1,400,000" /></span>');
				}
			else
				{
					$("#private_valuers_name").remove();
					$("#insurance_name").remove();
					$("#bank_name").remove();
					$("#4ced_value1").remove();
				}
		});
		$(".chk").click(function() {
  				//console.log('clicked choosen'+$(this).val());
  				getValueUsingClass();
		});

	});

	function getValueUsingClass()
		{
			/* declare an checkbox array */
			var chkArray = [];

			/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
			$(".chk:checked").each(function() {
				chkArray.push($(this).val());
			});

			/* we join the array separated by the comma */
			var selected;
			selected = chkArray.join(',') + ",";

			/* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
			if(selected.length > 1)
				{
					console.log('You have selected ' + selected);
					$("#accessories_extras").val(selected);
				}
			else
				{
					$("#accessories_extras").val('');
				}
		}
</script>
<h5>Edit Valuation Report</h5>
<div class="required"><i class="icon-star required smaller"></i> - Required Field</div>
<p>In the form below, provide the valuation report details:-</p>
<form action="<?php echo base_url(); ?>report/save_changes" method="post" enctype="multipart/form-data" class="vertical">

	<!-- Set a unique code for each valuation report -->
	<?php echo form_error('report_unique_code'); ?>
	<input type="hidden" name="report_unique_code" value="<?php echo $report_details->report_unique_code; ?>" />
	<input type="hidden" name="report_id" value="<?php echo $report_details->id; ?>" />
	<ul class="nav nav-tabs">
		 <li class="active"><a data-toggle="tab" href="#home">Basic Details</a></li>
		 <li class="dropdown">
			 <a class="dropdown-toggle" data-toggle="dropdown" href="#">Computation
			<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a data-toggle="tab" href="#secondhand">Second Hand Vehicles</a></li>
						<li><a data-toggle="tab" href="#showroom">Show Room Vehicles</a></li>
					</ul>
			</li>
	</ul>
	<div class="tab-content">
		 <div id="home" class="tab-pane fade in active">
	<!-- ADMINISTRATION DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">Administration Details</p>

		<div class="col_4">
			<!-- Certificate Number -->
			<label for="certificate_number">Certificate Number</label>
			<?php echo form_error('serial_number'); ?>
			<input type="text" name="certificate_number" id="certificate_number" value="<?php echo $report_details->certificate_number; ?>" placeholder="" />


			<!-- Receipt Number -->
			<label for="receipt_number">Receipt Number <i class="icon-star required smaller"></i></label>

			<input type="text" name="receipt_number" id="receipt_number" class="w200px-movd" value="<?php echo $report_details->receipt_number; ?>" placeholder="E.g. 00123" />

			<!-- Valuation Sheet Serial Number -->
			<label for="serial_number">Serial Number</label>
			<?php echo form_error('serial_number'); ?>
			<input type="text" name="serial_number" id="serial_number" class="w200px-movd" value="<?php echo $report_details->serial_number; ?>" placeholder="E.g. A000144" />

			<!-- Date of Inspection -->
			<label for="inspection_date">Date of Inspection <i class="icon-star required smaller"></i></label>
			<?php echo form_error('inspection_date'); ?>
			<input type="text" name="inspection_date" id="inspection_date" class="date-picker w300px-movd" value="<?php echo date('d F, Y',$report_details->inspection_date); ?>" placeholder="E.g. <?php echo date('d F, Y', time()); ?>" />

			<!-- Client Name -->
			<label for="client_name">Name of Client: <i class="icon-star required smaller"></i></label>
			<?php echo form_error('client_name'); ?>
			<input type="text" name="client_name" id="client_name" value="<?php echo $report_details->client_name; ?>" placeholder="E.g. John Ndoo" />

			<!-- Client Contact Details (Mobile Number) -->
			<label for="client_contacts">Client Contact Details</label>
			<?php echo form_error('client_contacts'); ?>
			<input type="text" name="client_contacts" id="client_contacts" value="<?php echo $report_details->client_contacts; ?>" placeholder="E.g. 0700 000000" />

		</div>

		<div class="col_4">

 			<label for="insurance_company_id">Insurance Company <i class="icon-star required smaller"></i></label>
			<input type="text" name="insurance_company_id" id="insurance_company_id" value="<?php echo $report_details->insurance_company_id; ?>" placeholder="E.G KENYA ORIENT" />


			<!-- Policy Number -->
			<label for="policy_number">Policy Number</label>
			<input type="text" name="policy_number" id="policy_number" value="<?php echo $report_details->policy_number; ?>" placeholder="E.g. 018/010/17765/<?php echo date('Y/m',time()); ?>" />

			<!-- general comments -->
			<label for="policy_expiry_date">Policy Expiry Date</label>
			<input type="text" name="policy_expiry_date" id="policy_expiry_date" class="date-picker w300px-movd" value="<?php echo date('d F, Y',$report_details->policy_expiry_date); ?>" placeholder="E.g. 31 December, <?php echo date('Y',time()); ?>" />


			<!-- status flag -->
			<label for="destination">Valuation Status<i class="icon-star required smaller"></i></label>
			<span>
				<select name="status" id="status" value="<?php echo $report_details->status; ?>">
				<?php
					if($report_details->status== 1)
					{
						echo '<option value="1" selected="selected">Completed</option><option value="0">Pending</option>';
					}
					else
					{
						echo '<option value="1">Completed</option><option value="0" selected="selected">Pending</option>';
					}
				 ?>


				</select>
			</span>

			<!-- status_comments -->
			<label for="policy_expiry_date">Comments</label>
			<textarea type="text" name="status_comments" id="status_comments" value="<?php echo $report_details->status_comments; ?>"><?php echo $report_details->status_comments; ?></textarea>

		</div>


		<div class="col_4">

			<!-- Insurance Company -->
			<label for="destination">Destination <i class="icon-star required smaller"></i></label>
			<span>
				<select name="destination" id="destination" value="<?php echo $report_details->destination;?>" >
					<option  value="bank">Bank</option>
					<option  value="insurance">Insurance Company</option>
					<option   value="other">Other</option>
				</select>
			</span>
			<span id="destination_details">
				<?php
					switch ($report_details->destination)
						{
							case 'other':
								echo '<span id="private_valuers_name"><label for="private_valuers_name" >Select Destination <i class="icon-star required smaller"></i></label>'.str_replace(array("\r","\n"), "", $private_valuers_name).'<label for="private_valuers_name" >';

								break;
							case 'bank':
								echo '<span id="bank_name"><label for="bank_name" >Select Bank <i class="icon-star required smaller"></i></label>'.str_replace(array("\r","\n"), "", $bank_companies_list).'<label for="bank_branch" >Bank Branch <i class="icon-star required smaller"></i></label><input type="text" name="bank_branch" value="'.$report_details->bank_branch.'" placeholder="E.g. MOI AVENUE" disabled/></span>';
								break;
							case 'insurance':
								echo '<span id="insurance_name"><label for="insurance_name" >Select insurance <i class="icon-star required smaller"></i></label>'.str_replace(array("\r","\n"), "", $insurance_companies_list).'<label for="insurance_agency" >Broker/Agency <i class="icon-star required smaller"></i></label><input type="text" name="insurance_agency" value="'.$report_details->insurance_agency.'" placeholder="E.g. MOI AVENUE" disabled/></span>';
								break;
						}
				?>
			</span>

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

			<input type="text" name="model" id="model" value="<?php echo $report_details->model; ?>" placeholder="E.g. Probox" />

			<!-- Vehicle Body Type -->
			<label for="body_type">Body Type</label>

			<!--<input type="text" name="body_type" id="body_type" value="<?php echo set_value('body_type'); ?>" placeholder="E.g. Station Wagon Auto 4WD" />-->
			<span>
			<select name="body_type" id="body_type">
				<option value="<?php echo $report_details->body_type; ?>"><?php echo $report_details->body_type; ?></option>
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

			<input type="text" name="colour" id="colour" value="<?php echo $report_details->colour; ?>" placeholder="E.g. Silver" />

			<!-- Vehicle Mileage -->
			<label for="mileage">Mileage (KM)</label>

			<input type="text" name="mileage" id="mileage" value="<?php echo $report_details->mileage; ?>" placeholder="E.g. 34,675" />

			<!-- Country of Origin -->
			<label for="country_of_origin">Country of Origin</label>

			<?php include("countries.php");?>
			<select name="country_of_origin" id="country_of_origin">
				<option value="<?php echo $report_details->country_of_origin ?>"><?php echo $report_details->country_of_origin ?></option>
                 <?php foreach($countries as $country){?>
                   <option value="<?php echo $country ?>"<?php echo set_select('country_of_origin',$country)?>><?php echo ucfirst($country)?></option>

               <?php } ?>
                     </select>

			<!--<input type="text" name="country_of_origin" id="country_of_origin" value="<?php echo set_value('country_of_origin'); ?>" placeholder="E.g. Japan" />-->
 <label for="light_type">AirBags</label>
 	<!--<input type="text" name="air_bags" id="engine_rating" value="<?php echo set_value('air_bags'); ?>" placeholder="6 SRS Air bags" />-->

			<?php echo form_error('air_bags'); ?>
			<select  name="air_bags" id="air_bags">
				<option value="<?php echo $report_details->air_bags; ?>"><?php echo $report_details->air_bags; ?></option>

				<option value="Dual SRS Airbags">Dual SRS Airbags</option>
				<option value="Steering SRS Airbags">Steering SRS Airbags</option>
				<option value="6 SRS Airbags">6 SRS Airbags</option>
				<option value="8 SRS Airbags">8 SRS Airbags</option>
				<option value="10 SRS Airbags">10 SRS Airbags</option>
				<option value="12 SRS Airbags">12 SRS Airbags</option>


                     </select>
		</div>

		<div class="col_6">

			<!-- Chassis Number -->
			<label for="chassis_number">Chassis Number <i class="icon-star required smaller"></i></label>

			<input type="text" name="chassis_number" id="chassis_number" value="<?php echo $report_details->chassis_number; ?>" placeholder="E.g. TC54W-190087" />

			<!-- Engine Number -->
			<label for="engine_number">Engine Number <i class="icon-star required smaller"></i></label>
			<?php echo form_error('engine_number'); ?>
			<input type="text" name="engine_number" id="engine_number" value="<?php echo $report_details->engine_number; ?>" placeholder="E.g. JW201-883933" />

			<!-- Year of Manufacture -->
			<label for="manufacture_year">Y.O.M <i class="icon-star required smaller"></i></label>
			<?php echo form_error('manufacture_year'); ?>
			<select name="manufacture_year" id="manufacture_year" value="<?php echo $report_details->manufacture_year; ?>">

                 <?php $year=date('Y');
                 for($i=$year;$i>=1970;$i--){?>
                   <option value="<?php echo $i ?>"<?php echo set_select('manufacture_year',$i)?>><?php echo $i?></option>
                    <?php } ?>
                     </select>

			<!-- Engine Rating -->
			<label for="engine_rating">Engine Rating (cc) <i class="icon-star required smaller"></i></label>

			<!--<input type="text" name="engine_rating" id="engine_rating" value="<?php echo set_value('engine_rating'); ?>" placeholder="E.g. 1990cc" />-->
			<span><select name="engine_rating" id="engine_rating">
				<option value="<?php echo $report_details->engine_rating; ?>"><?php echo $report_details->engine_rating; ?></option>
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
			<input type="text" name="first_registration_date" id="first_registration_date" value="<?php echo date('d F, Y',$report_details->first_registration_date); ?>" class="date-picker w300px-movd" placeholder="E.g. 1 January, <?php echo date('Y',time())-4; ?>" />

			<!-- Type of Fuel -->
			<label for="fuel_type">Type of Fuel</label>
			<?php echo form_error('fuel_type'); ?>
			<select name="fuel_type" id="fuel_type" value="<?php echo $report_details->fuel_type; ?>">
				<option value="Diesel">Diesel</option>
				<option value="Electric(Hybrid)">Electric(Hybrid)</option>
				<option value="Petrol">Petrol</option>
			</select>
			 <!-- Type of Lights -->
					 <label for="light_type">Type of Lights</label>
					 <!--<input type="text" name="light_type" id="light_type" value="<?php echo set_value('light_type'); ?>" placeholder="E.g. oRDINARY lIGHTS" />-->

			<?php echo form_error('light_type'); ?>
			<select name="light_type"  id="light_type">
				<option value="<?php echo $report_details->light_type; ?>"><?php echo $report_details->light_type; ?></option>
				<option value="Ordinary Lights">Ordinary Lights</option>
				<option value="Xenon Lights">Xenon Lights</option>
				<option value="Xenon/Day Running Lights">Xenon/Day Running Lights</option>
				<option value="Day Running Lights">Day Running Lights</option>


                     </select>

		</div>

	<!-- VEHICLE INSPECTION/VALUATION DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		<div class="clear"></div>
		<p class="valuation-form-section-header">Vehicle Inspection Details</p>

		<div class="col_6">

			<!-- Body Work -->
			<label for="body_work">Body Work</label>
			<span><select name="body_work" id="body_work">
				<option value="<?php echo $report_details->body_work; ?>"><?php echo $report_details->body_work; ?></option>
				<option value="In Good Condition">In Good Condition</option>
				<option value="other">Other</option>
			</select>
			<span id="other_bd"></span>
			<!-- Mechanical Condition -->
			<label for="mechanical_condition">Mechanical Condition</label>
			<span><select name="mechanical_condition" id="mechanical_condition">
				<option value="<?php echo $report_details->mechanical_condition; ?>"><?php echo $report_details->mechanical_condition; ?></option>
				<option value="In Sound Condition">In Sound Condition</option>
				<option value="other">Other</option>
			</select>
			</span>
			<span id="mechanical_cond"></span>
			<!-- Electrical -->
			<label for="electricals">Electrical Condition</label>
			<span><select name="electricals" id="electricals">
				<option value="<?php echo $report_details->electricals; ?>"><?php echo $report_details->electricals; ?></option>
				<option value="Okay">Okay</option>
				<option value="Servicable">Servicable</option>
				<option value="other">Other</option>
			</select>
			<span id="electrical_cond"></span>
			<!-- Tyres (% Remaining) -->
			<label for="tyre_condition">Tyres (% Remaining)</label>
			<input type="text" name="tyre_condition" id="tyre_condition" value="<?php echo $report_details->tyre_condition; ?>" placeholder="E.g. Four 80%, One 90% Good" />

			<!-- Anti-Theft Device -->
			<label for="anti_theft_device">Anti-Theft Device</label>

			<span><select name="anti_theft_device" id="anti_theft_device">
				<option value="<?php echo $report_details->anti_theft_device; ?>"><?php echo $report_details->anti_theft_device; ?></option>
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
			<input name="accessories_extras" id="accessories_extras" type="hidden" value="<?php echo $report_details->accessories_extras; ?>">
			<?php
			    echo "<table><tr>";
			    $selected=array();
			    if(strpos($report_details->accessories_extras,',')>0){
			    	$selected=explode(',',$report_details->accessories_extras);
			    }
			    else{
			    	$selected[]=$report_details->accessories_extras;
			    }
				$n=0;
				foreach ($accessories_list as $item)
					{
						if($n==4)
							{
								echo "</tr><tr>";
								$n=0;
							}
						$txt="";
						if(in_array($item,$selected)){
							$txt="checked";
						}
						echo '<td><span><input type="checkbox" value="'.$item.'" class="chk" '.$txt.'>'.$item.'</input><span></td>';
						$n++;

					}
				echo "</tr>";
				echo "<tr><td colspan='4'><span id='new_accessory'></span></td></tr>";
				echo "</table>";
				echo "<input type='checkbox' value='others' id='add_another'>others</input>";
			?>
			<!-- General Condition -->
			<label for="general_condition">General Condition</label>
			<?php echo form_error('general_condition'); ?>
			<!--<input type="text" name="general_condition" id="general_condition" value="<?php echo set_value('general_condition'); ?>" placeholder="E.g. Good" />-->
			<select name="general_condition" id="general_condition" value="<?php echo $report_details->general_condition; ?>">
				<option value="Good">Good</option>
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
			<input type="text" name="assessed_value_number" id="assessed_value_number" value="<?php echo $report_details->assessed_value_number; ?>" placeholder="E.g. 1,800,000" />

			<!-- Assessed Value Words -->
			<label for="assessed_value_words">Assessed Value (In Words) <i class="icon-star required smaller"></i></label>
			<input type="text" name="assessed_value_words" id="assessed_value_words" value="<?php echo $report_details->assessed_value_words; ?>" placeholder="E.g. One Million Eight Hundred Thousand Shillings Only" />

			<!-- FOR BANKS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
				<?php if (!empty($report_details->bank_market_value)) { ?><div class="clear"></div>
				<span class='banks_functions'>

				<div  id="market_value">

					<!-- Assessed Value Number -->
					<label for="bank_market_value">Market Value</label>
					<input type="text" name="bank_market_value" id="bank_market_value" value="<?php echo $report_details->bank_market_value; ?>" placeholder="E.g. 1,600,000" />

				</div>
				<?php } ?>

				<div class="col_6">

					<!-- General Remarks -->
					<span id="4ced_value">
						<?php
							switch ($report_details->destination)
								{
									case 'other':
										break;
									case 'bank':
										echo '<span id="4ced_value1"><label for="forced_value_number">Forced Value (KES) <i class="icon-star required smaller"></i></label><input type="text" name="forced_value_number" id="forced_value_number" value="'.$report_details->forced_value_number.'" placeholder="E.g. 1,400,000" /></span>';
										break;
									case 'insurance':
										break;
								}
						?>
					</span>

				</div>
			</span>

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
			<select name="remarks" id="remarks">
				<option value="<?php echo $report_details->remarks ?>"><?php echo $report_details->remarks ?></option>
				<option value="Vehicle Well Maintained">Vehicle Well Maintained</option>
				<option value="none">None</option>
				<option value="other">Other</option>
			</select>
			<span id="remarks_cond"></span>
			<!-- NB -->
			<label for="nb">NB</label>
			<input type="text" name="nb" id="nb" value="<?php echo $report_details->nb; ?>" placeholder="E.g. None" />

			<!-- Remedy -->
			<label for="remedy">Remedy</label>
			<select name="remedy" id="remedy" >
				<option value="<?php echo $report_details->remedy; ?>"><?php echo $report_details->remedy; ?></option>
				<option value="None">None</option>
				<option value="other">Other</option>

			</select>
			<span id="remedy_cond"></span>
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
						<th>Photo 5</th>
						<th>Photo 6</th>
						<th>Photo 7</th>
						<th>Photo 8</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						// Check for the # of records returned
						$number_of_photos = $photos->num_rows();
						$number_of_new_photos = 8 - $number_of_photos;
						foreach ($photos->result() as $photo)
						{
							echo '<td><img src="'.base_url().'assets/uploads/'.$photo->photo_name.'" width="250" /></td>';

						}
						if ($number_of_new_photos > 0)
						{
							// Create spaces for the new photos
							for ($i=($number_of_photos+1); $i<=8; $i++)
							{
								// Create the name of the file field
								$field_name = 'userfile' . $i;
								echo '<td><input type="file" name="'.$field_name.'" placeholder="Photo '.$i.'" /></td>';
							}
						}
						?>
					</tr>
					<tr>

					</tr>
				</tbody>
			</table>
		</div>
		<!--/Basic Details -->
	<!-- LOGBOOK xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<div class="clear"></div>
<p class="valuation-form-section-header">LogBook</p>
<?php foreach ($logbook->result() as $lg)
{
	$parts = explode(':', "$lg->photo_name");
	 $img = $parts[1];
 }
?>
<div class="col_12">
		<table>
			<thead>
				<tr>
					<th>Log Book</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php if (!empty($img)) {
					 echo '<td><img src="'.base_url().'assets/uploads/'.$img.'" width="250" /></td>';
				 } else {?>
					<td><input type="file" name="logbook" placeholder="LogBook" /></td>
					<?php } ?>
					</tr>
			</tbody>
		</table>
	</div>
	<!--/Log Details -->
	</div>
<div id="secondhand" class="tab-pane fade">
	<!-- SECOND HAND VEHICLES DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	<div class="clear"></div>
	<p class="valuation-form-section-header">Second Hand Vehicles Details - (Upload)</p>
	<?php foreach ($sh_file->result() as $sh)
	{
		$parts = explode(':', "$sh->photo_name");
		$img = $parts[1];
	 }
	?>
	<div class="col-md-6">
		<table>
			<thead>
				<tr>
					<th>Computation File - (Second Hand Vehicles)</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php if (!empty($img)) {
					 echo '<td><img src="'.base_url().'assets/uploads/'.$img.'" width="450" /></td>';
					 echo '<td><input type="file" name="sh_file" placeholder="Computation-Second Hand Vehicles"/></td>';
							} else {?>
						<td><input type="file" name="sh_file" placeholder="Computation-Second Hand Vehicles"/></td>
					<?php } ?>

				</tr>
			</tbody>
		</table>
	</div>
	<div class="clear"></div>
		<p class="valuation-form-section-header">Second Hand Vehicles Details</p>

		<div class="col_4">

			<!-- Base Price (Import) -->
			<label for="sh_base_price">Base Price (Import) </label>
			<?php echo form_error('sh_base_price'); ?>
			<input type="text" name="sh_base_price" id="sh_base_price" class="w200px-movd" value="<?php echo $report_details->sh_base_price; ?>" placeholder="E.g. 00123" />

			<!-- Freight & Insurance -->
			<label for="sh_freight_insurance">Freight & Insurance</label>
			<?php echo form_error('sh_freight_insurance'); ?>
			<input type="text" name="sh_freight_insurance" id="sh_freight_insurance" class="w200px-movd" value="<?php echo $report_details->sh_freight_insurance; ?>"placeholder="E.g. " />

			<!-- Import Duty -->
			<label for="sh_import_duty">Import Duty</label>
			<?php echo form_error('sh_import_duty'); ?>
			<input type="text" name="sh_import_duty" id="sh_import_duty" class="w200px-movd"value="<?php echo $report_details->sh_import_duty; ?>"placeholder="E.g. " />

			<!-- Excise Duty -->
			<label for="sh_excise_duty">Excise Duty</label>
			<?php echo form_error('sh_excise_duty'); ?>
			<input type="text" name="sh_excise_duty" id="sh_excise_duty" class="w200px-movd" value="<?php echo $report_details->sh_excise_duty; ?>" placeholder="E.g. " />

			<!-- VAT -->
			<label for="sh_vat">VAT</label>
			<?php echo form_error('sh_vat'); ?>
			<input type="text" name="sh_vat" id="sh_vat" class="w200px-movd" value="<?php echo $report_details->sh_vat; ?>"placeholder="E.g. " />

			<!-- Dealers Profit -->
			<label for="sh_dealers_profit">Dealers Profit</label>
			<?php echo form_error('sh_dealers_profit'); ?>
			<input type="text" name"sh_dealers_profit" id="sh_dealers_profit" class="w200px-movd"value="<?php echo $report_details->sh_dealers_profit; ?>" placeholder="E.g. " />
		</div>
		<div class="col-md-4">
			<!-- Less % Body Coach Defects-->
			<label for="sh_body_defects">Less % For Body Coach Defects</label>
			<?php echo form_error('sh_body_defects'); ?>
			<input type="text" name="sh_body_defects" id="sh_body_defects" class="w200px-movd" value="<?php echo $report_details->sh_body_defects; ?>"placeholder="E.g. " />

			<!-- Less % Mechanical Defects-->
			<label for="sh_mechanical_defects">Less % For Mechanical Defects</label>
			<?php echo form_error('sh_mechanical_defects'); ?>
			<input type="text" name="sh_mechanical_defects" id="sh_mechanical_defects" class="w200px-movd"value="<?php echo $report_details->sh_mechanical_defects; ?>"placeholder="E.g. " />

			<!-- Less % High Mileage-->
			<label for="sh_mileage">Less % For High Mileage</label>
			<?php echo form_error('sh_mileage'); ?>
			<input type="text" name="sh_mileage" id="sh_mileage" class="w200px-movd" value="<?php echo $report_details->sh_mileage; ?>"placeholder="E.g. " />

			<!-- Less % Markert Demand(relasability)-->
			<label for="sh_relasability">Less /Add % For Markert Demand(Relasability)</label>
			<?php echo form_error('sh_relasability'); ?>
			<input type="text" name="sh_relasability" id="sh_relasability" class="w200px-movd" value="<?php echo $report_details->sh_relasability; ?>" placeholder="E.g. " />
		</div>
		<div class="col-md-4">
			<!-- Assessed Value-->
			<label for="sh_assessed_value">Assessed Value</label>
			<?php echo form_error('sh_assessed_value'); ?>
			<input type="text" name="sh_assessed_value" id="sh_assessed_value" class="w200px-movd" value="<?php echo $report_details->sh_assessed_value; ?>"placeholder="E.g. " />

		</div>
<!--/secondhand-->
</div>
<div id="showroom" class="tab-pane fade">
	<!-- SHOW ROOM VEHICLES DETAILS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
	<?php foreach ($sr_file->result() as $sr)
	{
		$parts = explode(':', "$sr->photo_name");
		$img = $parts[1];
	 }
	?>
	<div class="clear"></div>
	<p class="valuation-form-section-header">Show Room Vehicles Details - (Upload)</p>
	<div class="col-md-6">
		<table>
			<thead>
				<tr>
					<th>Computation File - (Show Room Vehicles)</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php if (!empty($img)) {
					 echo '<td><img src="'.base_url().'assets/uploads/'.$img.'" width="450" /></td>';
					 echo '<td><input type="file" name="sr_file" placeholder="Computation-Show Room Vehicles"/></td>';
				 			} else {?>
						<td><input type="file" name="sr_file" placeholder="Computation-Show Room Vehicles"/></td>
					<?php } ?>
				</tr>
			</tbody>
		</table>
	</div>
<!--/upload-->

<div class="clear"></div>
<p class="valuation-form-section-header">Show Room Vehicles Details</p>
<div class="col-md-6">
		<!-- Economic Life-->
		<label for="sr_body_defects">Less % For Remaining Economic Life </label>
		<?php echo form_error('sr_economic_life'); ?>
		<input type="text" name="sr_economic_life" id="sr_economic_life" class="w200px-movd" value="<?php echo $report_details->sr_economic_life; ?>" placeholder="E.g. " />


		<!-- Less % Body Coach Defects-->
		<label for="sr_body_defects">Less % For Body Coach Defects</label>
		<?php echo form_error('sr_body_defects'); ?>
		<input type="text" name="sr_body_defects" id="sr_body_defects" class="w200px-movd" value="<?php echo $report_details->sr_body_defects; ?>" placeholder="E.g. " />

		<!-- Less % High Mileage-->
		<label for="sr_mileage">Less % For High Mileage</label>
		<?php echo form_error('sr_mileage'); ?>
		<input type="text" name="sr_mileage" id="sr_mileage" class="w200px-movd" value="<?php echo $report_details->sr_mileage; ?>" placeholder="E.g. " />

		<!-- Less % Markert Demand(relasability)-->
		<label for="sr_relasability">Less /Add % For Markert Demand(Relasability)</label>
		<?php echo form_error('sr_relasability'); ?>
		<input type="text" name="sr_relasability" id="sr_relasability" class="w200px-movd" value="<?php echo $report_details->sr_relasability; ?>"placeholder="E.g. " />
	</div>
	<div class="col-md-6">
		<!-- Purchase Price (Includes All Duties & Taxes) -->
		<label for="sr_purchase_price">Purchase Price (Includes All Duties & Taxes)</label>
		<?php echo form_error('sr_purchase_price'); ?>
		<input type="text" name="sr_purchase_price" id="sr_purchase_price" class="w200px-movd" value="<?php echo $report_details->sr_purchase_price; ?>" placeholder="E.g. " />

		<!--Assessed Value -->
		<label for="sr_assessed_value">Assessed Value</label>
		<?php echo form_error('sr_assessed_value'); ?>
		<input type="text" name="sr_assessed_value" id="sr_assessed_value" class="w200px-movd" value="<?php echo $report_details->sr_assessed_value; ?>" placeholder="E.g. " />
	</div>
	<!--/showroom -->
</div>
</div>






	<!-- SUBMIT BUTTON -->
	<div class="clear"></div>
	<div class="col_12">

		<!-- submit button -->
		<input type="submit" value="Save Report" class="blue" />

	</div>

</form>
