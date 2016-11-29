<?php

$config = array (

		// Valuation/Save config file - for saving a valuation report
		'report/save_new' => array (
				array(
						'field' => 'report_unique_code',
						'label' => 'Unique Report Code',
						'rules' => 'required|trim|xss_clean|is_unique[reports.report_unique_code]'
					),
				array(
						'field' => 'serial_number',
						'label' => 'Valuation Form Serial Number',
						'rules' => 'required|trim|xss_clean'
					),
				array(
						'field' => 'inspection_date',
						'label' => 'Date of Inspection',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'client_name',
						'label' => 'Client Name',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'client_contacts',
						'label' => 'Client Contact Details',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'insurance_company_id',
						'label' => 'Company Requesting Valuation',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'reg_number',
						'label' => 'Vehicle Registration Number',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'make',
						'label' => 'Vehicle Make/Model',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'body_type',
						'label' => 'Vehicle Body Type',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'colour',
						'label' => 'Vehicle Colour',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'mileage',
						'label' => 'Vehicle Mileage',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'country_of_origin',
						'label' => 'Country of Origin',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'chassis_number',
						'label' => 'Vehicle Chassis Number',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'engine_number',
						'label' => 'Vehicle Engine Number',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'manufacture_year',
						'label' => 'Vehicle Year of Manufacture',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'engine_rating',
						'label' => 'Vehicle Engine Rating',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'first_registration_date',
						'label' => 'Vehicle First Registration Date',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'fuel_type',
						'label' => 'Vehicle Fuel Type',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'body_work',
						'label' => 'Vehicle Body Type',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'mechanical_condition',
						'label' => 'Vehicle Mechanical Condition',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'electricals',
						'label' => 'Vehicle Electricals',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'tyre_condition',
						'label' => 'Vehicle Tyre Condition',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'anti_theft_device',
						'label' => 'Vehicle Anti-Theft Device Status',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'accessories_extras',
						'label' => 'Vehicle Accessories / Extras',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'general_condition',
						'label' => 'Vehicle General Condition',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'assessed_value_number',
						'label' => 'Vehicle Assessed Value (in Numbers)',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'assessed_value_words',
						'label' => 'Vehicle Assessed Value (in Words)',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'note_value',
						'label' => 'Vehicle Note Value',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'valuation_officer',
						'label' => 'Valuation Officer',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'remarks',
						'label' => 'Remarks',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'nb',
						'label' => 'NB',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'remedy',
						'label' => 'Remedy',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'bank_market_value',
						'label' => 'Bank Valuation Market Value',
						'rules' => 'trim|xss_clean'
					),
				array(	
						'field' => 'bank_forced_value',
						'label' => 'Bank Valuation Forced Value',
						'rules' => 'trim|xss_clean'
					)
			),

			// Validation config for Updating the valuation report details
			'report/save_changes' => array (
				array(
						'field' => 'report_id',
						'label' => 'Report ID',
						'rules' => 'required|numeric|trim|xss_clean'
					),
				array(
						'field' => 'serial_number',
						'label' => 'Valuation Form Serial Number',
						'rules' => 'required|trim|xss_clean'
					),
				array(
						'field' => 'inspection_date',
						'label' => 'Date of Inspection',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'client_name',
						'label' => 'Client Name',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'client_contacts',
						'label' => 'Client Contact Details',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'insurance_company_id',
						'label' => 'Company Requesting Valuation',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'reg_number',
						'label' => 'Vehicle Registration Number',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'make',
						'label' => 'Vehicle Make/Model',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'body_type',
						'label' => 'Vehicle Body Type',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'colour',
						'label' => 'Vehicle Colour',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'mileage',
						'label' => 'Vehicle Mileage',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'country_of_origin',
						'label' => 'Country of Origin',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'chassis_number',
						'label' => 'Vehicle Chassis Number',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'engine_number',
						'label' => 'Vehicle Engine Number',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'manufacture_year',
						'label' => 'Vehicle Year of Manufacture',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'engine_rating',
						'label' => 'Vehicle Engine Rating',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'first_registration_date',
						'label' => 'Vehicle First Registration Date',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'fuel_type',
						'label' => 'Vehicle Fuel Type',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'body_work',
						'label' => 'Vehicle Body Type',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'mechanical_condition',
						'label' => 'Vehicle Mechanical Condition',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'electricals',
						'label' => 'Vehicle Electricals',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'tyre_condition',
						'label' => 'Vehicle Tyre Condition',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'anti_theft_device',
						'label' => 'Vehicle Anti-Theft Device Status',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'accessories_extras',
						'label' => 'Vehicle Accessories / Extras',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'general_condition',
						'label' => 'Vehicle General Condition',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'assessed_value_number',
						'label' => 'Vehicle Assessed Value (in Numbers)',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'assessed_value_words',
						'label' => 'Vehicle Assessed Value (in Words)',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'note_value',
						'label' => 'Vehicle Note Value',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'valuation_officer',
						'label' => 'Valuation Officer',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'remarks',
						'label' => 'Remarks',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'nb',
						'label' => 'NB',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'remedy',
						'label' => 'Remedy',
						'rules' => 'required|trim|xss_clean'
					),
				array(	
						'field' => 'bank_market_value',
						'label' => 'Bank Valuation Market Value',
						'rules' => 'trim|xss_clean'
					),
				array(	
						'field' => 'bank_forced_value',
						'label' => 'Bank Valuation Forced Value',
						'rules' => 'trim|xss_clean'
					)
			)

	);