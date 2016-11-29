<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller
{

	// Constructor
	public function __construct()
	{

		// Run parent controller
		parent::__construct();

		// Load the required models
		$ci =& get_instance();
		$ci->load->model(array('auth_model','autostar_model','report_model','client_model','date_model'));
		//$this->load->model('stored_client_model', 'stored_clients');
		// Check if user is logged in
		$this->auth_model->is_logged_in();

	}	// End: __construct()


	// Method to preload form fields
	public function initialize_form_fields()
	{
		// Initialize the form fields


		$form_fields = array(
			    array('field' => 'Report Unique Code', 'field_name' => 'report_unique_code', 'required' => 'NO', 'value' => isset($_POST['report_unique_code']) ? trim($_POST['report_unique_code']) : ''),
			     /* FOR FIRST TIME REPORTS */
			    array('field' => 'Report ID', 'field_name' => 'report_id', 'required' => 'NO', 'value' => isset($_POST['report_id']) ? trim($_POST['report_id']) : ''),
			     /* FOR EDITED REPORTS */
			    array('field' => 'Valuation Form Serial Number', 'field_name' => 'serial_number', 'required' => 'NO', 'value' => isset($_POST['serial_number']) ? trim($_POST['serial_number']) : ''),
			    array('field' => 'Receipt Number', 'field_name' => 'receipt_number', 'required' => 'YES', 'value' => isset($_POST['receipt_number']) ? trim($_POST['receipt_number']) : ''),
			    array('field' => 'Inspection Date', 'field_name' => 'inspection_date', 'required' => 'YES', 'value' => isset($_POST['inspection_date']) ? trim($_POST['inspection_date']) : time()),
			    array('field' => 'Client Name', 'field_name' => 'client_name', 'required' => 'YES', 'value' => isset($_POST['client_name']) ? trim($_POST['client_name']) : ''),
			    array('field' => 'Client Contact Details', 'field_name' => 'client_contacts', 'required' => 'NO', 'value' => isset($_POST['client_contacts']) ? trim($_POST['client_contacts']) : ''),
			    array('field' => 'Insurance Company', 'field_name' => 'insurance_company_id', 'required' => 'NO', 'value' => isset($_POST['insurance_company_id']) ? trim($_POST['insurance_company_id']) : ''),
			    array('field' => 'Policy Number', 'field_name' => 'policy_number', 'required' => 'NO', 'value' => isset($_POST['policy_number']) ? trim($_POST['policy_number']) : ''),
			    array('field' => 'Policy Expiry Date', 'field_name' => 'policy_expiry_date', 'required' => 'NO', 'value' => isset($_POST['policy_expiry_date']) ? trim($_POST['policy_expiry_date']) :time()),
			    array('field' => 'Vehicle Registration Number', 'field_name' => 'reg_number', 'required' => 'YES', 'value' => isset($_POST['reg_number']) ? trim($_POST['reg_number']) : ''),
			    array('field' => 'Vehicle Make', 'field_name' => 'make', 'required' => 'YES', 'value' => isset($_POST['make']) ? trim($_POST['make']) : ''),
				  array('field' => 'Vehicle Model', 'field_name' => 'model', 'required' => 'YES', 'value' => isset($_POST['model']) ? trim($_POST['model']) : ''),

			    array('field' => 'Vehicle Body Type', 'field_name' => 'body_type', 'required' => 'NO', 'value' => isset($_POST['body_type']) ? trim($_POST['body_type']) : ''),
			    array('field' => 'Vehicle Colour', 'field_name' => 'colour', 'required' => 'YES', 'value' => isset($_POST['colour']) ? trim($_POST['colour']) : ''),
			    array('field' => 'Vehicle Mileage', 'field_name' => 'mileage', 'required' => 'NO', 'value' => isset($_POST['mileage']) ? trim($_POST['mileage']) : ''),
			    array('field' => 'Vehicle Country of Origin', 'field_name' => 'country_of_origin', 'required' => 'NO', 'value' => isset($_POST['country_of_origin']) ? trim($_POST['country_of_origin']) : ''),
			    array('field' => 'Chassis Number', 'field_name' => 'chassis_number', 'required' => 'YES', 'value' => isset($_POST['chassis_number']) ? trim($_POST['chassis_number']) : ''),
			    array('field' => 'Engine Number', 'field_name' => 'engine_number', 'required' => 'YES', 'value' => isset($_POST['engine_number']) ? trim($_POST['engine_number']) : ''),
			    array('field' => 'Year of Manufacture', 'field_name' => 'manufacture_year', 'required' => 'YES', 'value' => isset($_POST['manufacture_year']) ? trim($_POST['manufacture_year']) : ''),
			    array('field' => 'Engine Rating (in CC)', 'field_name' => 'engine_rating', 'required' => 'YES', 'value' => isset($_POST['engine_rating']) ? trim($_POST['engine_rating']) : ''),
			    array('field' => 'Vehicle First Registration Date', 'field_name' => 'first_registration_date', 'required' => 'NO', 'value' => isset($_POST['first_registration_date']) ? trim($_POST['first_registration_date']) :time()),
			    array('field' => 'Fuel Type', 'field_name' => 'fuel_type', 'required' => 'NO', 'value' => isset($_POST['fuel_type']) ? trim($_POST['fuel_type']) : ''),

			    array('field' => 'Body Work', 'field_name' => 'body_work', 'required' => 'NO', 'value' => isset($_POST['body_work']) ? trim($_POST['body_work']) : ''),
			    array('field' => 'Mechanical Condition', 'field_name' => 'mechanical_condition', 'required' => 'NO', 'value' => isset($_POST['mechanical_condition']) ? trim($_POST['mechanical_condition']) : ''),
			    array('field' => 'Electricals', 'field_name' => 'electricals', 'required' => 'NO', 'value' => isset($_POST['electricals']) ? trim($_POST['electricals']) : ''),
			    array('field' => 'Tyre Condition', 'field_name' => 'tyre_condition', 'required' => 'NO', 'value' => isset($_POST['tyre_condition']) ? trim($_POST['tyre_condition']) : ''),
			    array('field' => 'Anti-theft Device', 'field_name' => 'anti_theft_device', 'required' => 'NO', 'value' => isset($_POST['anti_theft_device']) ? trim($_POST['anti_theft_device']) : ''),
			    array('field' => 'Accessories/Extras', 'field_name' => 'accessories_extras', 'required' => 'NO', 'value' => isset($_POST['accessories_extras']) ? trim($_POST['accessories_extras']) : ''),
			    array('field' => 'Vehicle General Condition', 'field_name' => 'general_condition', 'required' => 'NO', 'value' => isset($_POST['general_condition']) ? trim($_POST['general_condition']) : ''),
			    array('field' => 'Assessed Value (In Numbers)', 'field_name' => 'assessed_value_number', 'required' => 'YES', 'value' => isset($_POST['assessed_value_number']) ? trim($_POST['assessed_value_number']) : ''),
					array('field' => 'Assessed Value (In Words)', 'field_name' => 'assessed_value_words', 'required' => 'YES', 'value' => isset($_POST['assessed_value_words']) ? trim($_POST['assessed_value_words']) : ''),
			    array('field' => 'Forced Value (In Numbers)', 'field_name' => 'forced_value_number', 'required' => 'NO', 'value' => isset($_POST['forced_value_number']) ? trim($_POST['forced_value_number']) : ''),
			    //array('field' => 'Forced Value (In Words)', 'field_name' => 'forced_value_words', 'required' => 'NO', 'value' => isset($_POST['forced_value_words']) ? trim($_POST['forced_value_words']) : ''),
			    array('field' => 'Note Value', 'field_name' => 'note_value', 'required' => 'NO', 'value' => isset($_POST['note_value']) ? trim($_POST['note_value']) : ''),
			    array('field' => 'Valuation Officer', 'field_name' => 'valuation_officer', 'required' => 'NO', 'value' => isset($_POST['valuation_officer']) ? trim($_POST['valuation_officer']) : ''),
			    array('field' => 'Remarks', 'field_name' => 'remarks', 'required' => 'NO', 'value' => isset($_POST['remarks']) ? trim($_POST['remarks']) : ''),
			    array('field' => 'NB', 'field_name' => 'nb', 'required' => 'NO', 'value' => isset($_POST['nb']) ? trim($_POST['nb']) : ''),
			    array('field' => 'Remedy', 'field_name' => 'remedy', 'required' => 'NO', 'value' => isset($_POST['remedy']) ? trim($_POST['remedy']) : ''),
			    array('field' => 'Bank Market Value', 'field_name' => 'bank_market_value', 'required' => 'NO', 'value' => isset($_POST['bank_market_value']) ? trim($_POST['bank_market_value']) : ''),
			    array('field' => 'Bank Forced Value', 'field_name' => 'bank_forced_value', 'required' => 'NO', 'value' => isset($_POST['bank_forced_value']) ? trim($_POST['bank_forced_value']) : ''),
				array('field' => 'Destination', 'field_name' => 'destination', 'required' => 'YES', 'value' => isset($_POST['destination']) ? trim($_POST['destination']) : ''),
				array('field' => 'Private valuers Name', 'field_name' => 'private_valuers_name', 'required' => 'NO', 'value' => isset($_POST['private_valuers_name']) ? trim($_POST['private_valuers_name']) : ''),
			    array('field' => 'Bank Name', 'field_name' => 'bank_name', 'required' => 'NO', 'value' => isset($_POST['bank_name']) ? trim($_POST['bank_name']) : ''),
			    array('field' => 'Bank Branch', 'field_name' => 'bank_branch', 'required' => 'NO', 'value' => isset($_POST['bank_branch']) ? trim($_POST['bank_branch']) : ''),
			    array('field' => 'Insurance Name', 'field_name' => 'insurance_name', 'required' => 'NO', 'value' => isset($_POST['insurance_name']) ? trim($_POST['insurance_name']) : ''),
			    array('field' => 'Insurance Agency', 'field_name' => 'insurance_agency', 'required' => 'NO', 'value' => isset($_POST['insurance_agency']) ? trim($_POST['insurance_agency']) : ''),
			    array('field' => 'Status Comment', 'field_name' => 'status_comments', 'required' => 'NO', 'value' => isset($_POST['status_comments']) ? trim($_POST['status_comments']) : ''),
					array('field' => 'Air Bags', 'field_name' => 'air_bags', 'required' => 'NO', 'value' => isset($_POST['air_bags']) ? trim($_POST['air_bags']) : ''),
					array('field' => 'Light Type', 'field_name' => 'light_type', 'required' => 'NO', 'value' => isset($_POST['light_type']) ? trim($_POST['light_type']) : ''),
		 //Second hand vehicles
					array('field' => 'Base Price', 'field_name' => 'sh_base_price', 'required' => 'NO', 'value' => isset($_POST['sh_base_price']) ? trim($_POST['sh_base_price']) : ''),
					array('field' => 'Freight Insurance', 'field_name' => 'sh_freight_insurance', 'required' => 'NO', 'value' => isset($_POST['sh_freight_insurance']) ? trim($_POST['sh_freight_insurance']) : ''),
					array('field' => 'Import Duty', 'field_name' => 'sh_import_duty', 'required' => 'NO', 'value' => isset($_POST['sh_import_duty']) ? trim($_POST['sh_import_duty']) : ''),
					array('field' => 'Excise Duty', 'field_name' => 'sh_excise_duty', 'required' => 'NO', 'value' => isset($_POST['sh_excise_duty']) ? trim($_POST['sh_excise_duty']) : ''),
					array('field' => 'VAT', 'field_name' => 'sh_vat', 'required' => 'NO', 'value' => isset($_POST['sh_vat']) ? trim($_POST['sh_vat']) : ''),
					array('field' => 'Dealers Profit', 'field_name' => 'sh_dealers_profit', 'required' => 'NO', 'value' => isset($_POST['sh_dealers_profit']) ? trim($_POST['sh_dealers_profit']) : ''),
					array('field' => 'Body Defects', 'field_name' => 'sh_body_defects', 'required' => 'NO', 'value' => isset($_POST['sh_body_defects']) ? trim($_POST['sh_body_defects']) : ''),
					array('field' => 'Mechanical Defects', 'field_name' => 'sh_mechanical_defects', 'required' => 'NO', 'value' => isset($_POST['sh_mechanical_defects']) ? trim($_POST['sh_mechanical_defects']) : ''),
					array('field' => 'Mileage', 'field_name' => 'sh_mileage', 'required' => 'NO', 'value' => isset($_POST['sh_mileage']) ? trim($_POST['sh_mileage']) : ''),
					array('field' => 'Relasability', 'field_name' => 'sh_relasability', 'required' => 'NO', 'value' => isset($_POST['sh_relasability']) ? trim($_POST['sh_relasability']) : ''),
					array('field' => 'Assessed Value', 'field_name' => 'sh_assessed_value', 'required' => 'NO', 'value' => isset($_POST['sh_assessed_value']) ? trim($_POST['sh_assessed_value']) : ''),
          array('field' => 'Certifcate Number', 'field_name' => 'certificate_number', 'required' => 'NO', 'value' => isset($_POST['certificate_number']) ? trim($_POST['certificate_number']) : ''),
          array('field' => 'Gear Box', 'field_name' => 'gear_box', 'required' => 'NO', 'value' => isset($_POST['gear_box']) ? trim($_POST['gear_box']) : ''),
          array('field' => 'Inspection Place', 'field_name' => 'inspection_place', 'required' => 'NO', 'value' => isset($_POST['inspection_place']) ? trim($_POST['inspection_place']) : ''),
				//Show room vehicles
			  	array('field' => 'Purchase Price', 'field_name' => 'sr_purchase_price', 'required' => 'NO', 'value' => isset($_POST['sr_purchase_price']) ? trim($_POST['sr_purchase_price']) : ''),
					array('field' => 'Economic Life', 'field_name' => 'sr_economic_life', 'required' => 'NO', 'value' => isset($_POST['sr_economic_life']) ? trim($_POST['sr_economic_life']) : ''),
					array('field' => 'Body Defects', 'field_name' => 'sr_body_defects', 'required' => 'NO', 'value' => isset($_POST['sr_body_defects']) ? trim($_POST['sr_body_defects']) : ''),
					array('field' => 'Mileage', 'field_name' => 'sr_mileage', 'required' => 'NO', 'value' => isset($_POST['sr_mileage']) ? trim($_POST['sr_mileage']) : ''),
					array('field' => 'Relasability', 'field_name' => 'sr_relasability', 'required' => 'NO', 'value' => isset($_POST['sr_relasability']) ? trim($_POST['sr_relasability']) : ''),
					array('field' => 'Assessed Value', 'field_name' => 'sr_assessed_value', 'required' => 'NO', 'value' => isset($_POST['sr_assessed_value']) ? trim($_POST['sr_assessed_value']) : ''),

			     array('field' => 'Status', 'field_name' => 'status', 'required' => 'NO', 'value' => isset($_POST['status']) ? trim($_POST['status']) : '0')

			);


		// Return the form fields
		return $form_fields;

	}	// End: initialize_form_fields()


	// Method to get list of all clients
	private function client_listing()
	{
		$this->db->order_by('name', 'asc');
		$result = $this->db->get_where('users', array('is_admin' => 'NO', 'user_type' => 'COMPANY'));
		return $result;
	}


	// Method to find a report's details
	public function find_report($report_id)
	{

		// Run the query to get the report
		$result = $this->db->get_where('reports', array('id' => $report_id));
		if ($result->num_rows() <= 0)
		{
			// Nothing found ... return false
			return FALSE;
		}
		else
		{
			// Something found ...
			return $result;
		}

	}	// End: find()


	// Default page
	public function index()
	{

		// Create array of data to pass to the main template
		$this->load->model('client_model');
		$data = array(
				'clients' => $this->client_listing(),
				'view' => 'report/index',
				'menu' => $this->autostar_model->menu(),
				'form_fields' => $this->initialize_form_fields(),
				'msg' => array('text' => '', 'class' => ''),
				'banks'=>$this->getClientType('bank'),
				'insurance'=>$this->getClientType('insurance'),
				'private'=>$this->getClientType('private'),
				'accessories_list'=>$this->getAccessories()
			);

		// Load the main template
		$this->load->view('templates/main_template', $data);

	}	// index();


	// Method to generate the PDF file
	public function pdf($report_id=NULL, $search_term=NULL)
	{

		// Call the model/method for generating the PDF file
		// $success = $this->report_model->generate_pdf($report_id);


		// *******************

		// Check for the PDF file
		$success = TRUE;
		$result = $this->db->get_where('reports', array('id' => $report_id));
		if ($result->num_rows() <= 0)
		{

			// Nothing found; return false
			$success = FALSE;

		}
		else
		{

			// Grab the details and pass them to a view which will then be converted into a PDF file
			$rs = $result->row();
			$report = $rs;

			// -----------------------------------------------------------------//
			// HTML2PDF Library Source: https://github.com/aiwmedia/HTML2PDF-CI	//
			// -----------------------------------------------------------------//
			// Load the library
			$ci =& get_instance();
			$ci->load->model('report_model');
			// $ci->load->library('html2pdf');
			//$ci->load->library('dompdf');

			// // Set folder to save PDF to
			// $ci->html2pdf->folder('./assets/pdfs/');

			// // Set the filename to save/download as
			$filename = 'Valuation_Report_' . $report_id . '.pdf';
			// $ci->html2pdf->filename($filename);

			// // Set the paper defaults
			// $ci->html2pdf->paper('a4', 'portrait');

			// // Create the file
			$data = array(
					'report' => $rs,
					'insurance_company_details' => $this->find_insurance_company($rs->insurance_company_id)
				);
			// $ci->html2pdf->html($this->load->view('report/pdf', $data, true));

			// Force the file to download
			// $ci->html2pdf->create('download');
			// $path = $ci->html2pdf->create('download');
			// echo 'pdf saved to ' . $path;
			// $ci->load->helper(array('dompdf', 'file'));
			// page info here, db calls, etc.
			$html = $this->load->view('report/pdf', $data, true);
			// pdf_create($html, 'filename');
			// $data = pdf_create($html, '', false);
			// write_file('name', $data);

			$ci->load->library('dompdf_gen');

			// Create the HTML code for the PDF
			$inspection_date = ($report->inspection_date > 0) ? date('F j, Y', $report->inspection_date) : '';
			$policy_expiry_date = ($report->policy_expiry_date > 0) ? date('F j, Y',$report->policy_expiry_date) : '';
			$first_registration_date = ($report->first_registration_date > 0) ? date('F j, Y', $report->first_registration_date) : '';
			$insurance_company_details = $this->find_insurance_company($rs->insurance_company_id);

			$html = '

				<html>
				<head>
				<title>Report</title>
				<style>
					body {
						font-family: arial, helvetica, sans-serif;
						font-size: 8pt;
					}
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
						font-size: 9pt;
					}

					.bottom-border {
						border-bottom: 1px solid #ccc;
					}

					.masthead {
						width: 720px;
					}

					.pull-right {
						text-align: right;
					}
					table tr td {
					    padding-top: 3px;
					    padding-bottom: 3px;


					}
					table {
						font-size: 9pt;
					}
					strong {
						color: black;
						margin-left: 2px;
					}
					.bborder_table tr td{
						border-bottom:1px solid gray;
						border-left:1px solid gray;
						border-right:1px solid gray;
					}
				</style>
				</head>

				<body>
				<table width="100%"  >
				<tr >
					<td colspan="3" class="bottom-border">
						<img src="assets/img/logo-strip.jpg" class="masthead"/>
					</td>
				</tr>
				<tr>
					<!-- Report Title -->
					<td></td>
					<td>
						<span style="text-align: center; font-size: 11pt;"><u>VEHICLE VALUATION REPORT</u></span>
					</td>
					<td></td>
				</tr>
				<tr>
				<td colspan="3">
						<!-- Descriptive text -->
						<p class="red"><em>A brief Examination and road test has been carried out on the vehicle described below, The findings are as follows : -</em></p>
					</td>
				</tr>
				</table>
				<table width="100%" class="border_table" >
				<tr>
					<td colspan="2">
						<span class="green">INSURED :</span> <strong>' . $report->client_name . '</strong>
					</td >
					<td colspan="2">
						<span class="green">SERIAL NUMBER :  <strong> ' .  $report->serial_number. '</strong></span>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<span class="green">POLICY NUMBER :  <strong> ' .  $report->policy_number . '</strong></span>
					</td>
					<td colspan="2">
						<span class="green">MAKE :</span> <strong>' . $report->make  . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="2">
						<span class="green">INSPECTION DATE :  <strong> ' .  $report->inspection_date . '</strong></span>
					</td>
					<td colspan="2">
						<span class="green">CONTACT :</span> <strong>' . $report->client_contacts  . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="2">
						<span class="green">ENGINE DATE :  <strong> ' .  $report->engine_number . '</strong></span>
					</td>
					<td colspan="2">
						<span class="green">REG NO :</span> <strong>' . strtoupper($report->reg_number) . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="2">
						<span class="green">CHASSIS NUMBER:  <strong> ' .  $report->chassis_number . '</strong></span>
					</td>
					<td colspan="2">
						<span class="green">COLOUR :</span> <strong>' . $report->colour  . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="2">
						<span class="green">MODEL:  <strong> ' .  $report->model . '</strong></span>
					</td>
					<td colspan="2">
						<span class="green">Y.O.M :</span> <strong>' . $report->manufacture_year  . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="2">
						<span class="green">COUNTRY OF ORIGIN:  <strong> ' .  $report->country_of_origin . '</strong></span>
					</td>
					<td colspan="2">
						<span class="green">FIRST REG DATE:</span> <strong>' . $first_registration_date  . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="2">
						<!-- Insurance Details -->
						<span class="green">INSURANCE COMPANY : <strong>'. $report->insurance_company_id .'</strong></span>
					</td>
					<td colspan="2">
						<span class="green">MILEAGE: <strong> ' .  $report->mileage . '</strong></span>
					</td>
				</tr>';
				switch ($report->destination )
				{
					case 'other':
						$append="
						<td>
							<span class='green'>DESTINATION : <strong>PRIVATE VALUER</strong></span>
						</td>
						<td >
							<span class='green'>NAME : <strong> ".$this->getNameFromID($report->private_valuers_name) ."</strong></span>
						</td>
						<td></td>";
						break;
					case 'bank':
						$append="
						<td>
							<span class='green'>DESTINATION : <strong>BANK</strong></span>
						</td>
						<td >
							<span class='green'>NAME : <strong> ".$this->getNameFromID($report->bank_name) ."</strong></span>
						</td>
						<td>
							<span class='green'>BRANCH : <strong> ".$report->bank_branch."</strong></span>
						</td>";
						break;
					case 'insurance':
						$append="
						<td>
							<span class='green'>DESTINATION : <strong>INSURANCE</strong></span>
						</td>
						<td >
							<span class='green'>NAME : <strong> ".$this->getNameFromID($report->insurance_name)."</strong></span>
						</td>
						<td>
							<span class='green'>INTERMEDIARY : <strong> ".$report->insurance_agency."</strong></span>
						</td>";
						break;
				}
				$html=$html.'<tr>'.$append.'</tr>
				<tr>
					<td colspan="2">
						<span class="green">TYPE OF LIGHTS:  <strong> ' .  $report->light_type  . '</strong></span>
					</td>
					<td colspan="2">

					</td >
				</tr>
				<tr>
					<td colspan="2">
						<span class="green">AIRBAGS:  <strong> ' .  $report->air_bags  . '</strong></span>
					</td>
					<td colspan="2">
						<span class="green">ENGINE RATING:</span> <strong>' . $report->engine_rating   . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="2">
						<span class="green">ENGINE TYPE:  <strong> ' .  $report->engine_number  . '</strong></span>
					</td>
					<td colspan="2">
						<span class="green">CERTIFICATE NUMBER:</span> <strong>' . $report->certificate_number   . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="2">
						<span class="green">GEAR BOX:  <strong> ' .  $report->gear_box  . '</strong></span>
					</td>
					<td colspan="2">
						<span class="green">INSURER:</span> <strong>' .$this->getNameFromID($report->insurance_name)  . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="2">
						<span class="green">FUEL:  <strong> ' .  $report->fuel_type  . '</strong></span>
					</td>
					<td colspan="2">
						<span class="green">POLICY EXPIRY DATE NUMBER:</span> <strong>' .  $policy_expiry_date   . '</strong>
					</td >
				</tr>
			</table>
			<br><br>
			<table width="100%" >
				<tr>
					<td colspan="4">
						<span class="red"><strong>GENERAL CONDITION</strong></span>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<span class="green">GENERAL CONDITION:  <strong> ' . $report->general_condition   . '</strong></span>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<span class="green">MECHANICAL:</span> <strong>' .  $report->mechanical_condition   . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="4">
						<span class="green">ELECTRICAL:</span> <strong>' .  $report->electricals   . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="4">
						<span class="green">BODY:</span> <strong>' .  $report->body_work   . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="4">
						<span class="green">TYRES:</span> <strong>' .  $report->tyre_condition   . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="4">
						<span class="green">EXTRAS:</span> <strong>' . $report->accessories_extras  . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="4">
						<span class="green">REMARKS:</span> <strong>' .  $report->remarks   . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="4">
						<span class="red">AMAOUNT IN WORDS:</span> <strong>' .  $report->assessed_value_words   . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="4">
						<span class="green">RADIO:</span> <strong> - </strong>
					</td >
				</tr>
				<tr>
					<td colspan="4">
						<span class="green">WIND SCREEN:</span> <strong> - </strong>
					</td >
				</tr>
				<tr>
					<td colspan="4">
						<span class="green">ANTI-THEFT:</span> <strong>' .  $report->anti_theft_device   . '</strong>
					</td >
				</tr>
				<tr>
					<td colspan="4">
						<span class="green">PLACE OF INSPECTION:</span> <strong>' .  $report->inspection_place   . '</strong>
					</td >
				</tr>
			</table>

				<table width="100%" >
					<tr>
						<td colspan="3" class="bottom-border">
							<img src="assets/img/logo-strip.jpg" class="masthead"/>
						</td>
					</tr>
					<tr>
						<!-- Serial Number -->
						<td>
							<span class="green table-row col-1">SERIAL NUMBER : <strong class="red">'. $report->serial_number .'</strong></span>
						</td>
						<!-- Report Title -->
						<td align="">
							<span style="text-align: left; font-size: 11pt;"><u>VEHICLE VALUATION REPORT</u></span>
						</td>
						<!-- Receipt Number -->
						<td>
							<span class="green table-row col-2" >RECEIPT NUMBER : <strong>' . $report->receipt_number . '</strong></span>
						</td>
					</tr>
					<tr align="left">
					<!-- Certificate Number -->
					<!-- Date of Inspection -->
						<td  colspan="2" >
							<span class="green">DATE OF INSPECTION :   <strong> '. $inspection_date .'</strong></span>
						</td>
					<td>
						<span class="green table-row col-2" >CERTIFICATE NUMBER : <strong>' . $report->certificate_number . '</strong></span>
					</td>


					</tr>
					<tr>
						<td>
							<!-- Client Name -->
							<span class="green">CLIENT NAME :</span> <strong>' . $report->client_name . '</strong>
						</td >
						<td ></td>
						<td >
							<!-- Client Contacts -->
							<span class="green">CONTACTS :  <strong> ' .  $report->client_contacts . '</strong></span>
						</td>
					</tr>
					<tr>
						<td>
							<!-- Insurance Details -->
							<span class="green">INSURANCE COMPANY : <strong>'. $report->insurance_company_id .'</strong></span>
						</td>
						<td>
							<span class="green">POLICY NO :  <strong> ' .  $report->policy_number . '</strong></span>
						</td>
						<td>
							<span class="green">EXPIRY DATE : <strong> ' . $policy_expiry_date . '</strong></span>
						</td>
					</tr>';
					switch ($report->destination )
					{
						case 'other':
							$append="
							<td>
								<span class='green'>DESTINATION : <strong>PRIVATE VALUER</strong></span>
							</td>
							<td >
								<span class='green'>NAME : <strong> ".$this->getNameFromID($report->private_valuers_name) ."</strong></span>
							</td>
							<td></td>";
							break;
						case 'bank':
							$append="
							<td>
								<span class='green'>DESTINATION : <strong>BANK</strong></span>
							</td>
							<td >
								<span class='green'>NAME : <strong> ".$this->getNameFromID($report->bank_name) ."</strong></span>
							</td>
							<td>
								<span class='green'>BRANCH : <strong> ".$report->bank_branch."</strong></span>
							</td>";
							break;
						case 'insurance':
							$append="
							<td>
								<span class='green'>DESTINATION : <strong>INSURANCE</strong></span>
							</td>
							<td >
								<span class='green'>NAME : <strong> ".$this->getNameFromID($report->insurance_name)."</strong></span>
							</td>
							<td>
								<span class='green'>INTERMEDIARY : <strong> ".$report->insurance_agency."</strong></span>
							</td>";
							break;
					}

					$html=$html.'<tr>'.$append.'</tr>

					<tr >
						<td colspan="3">
							<!-- Descriptive text -->
							<p class="red"><em>After a brief inspection and road test was carried out on the subject vehicle, the following are the findings:-</em></p>
						</td>
					</tr>
					<tr>
						<td ><span class="green">REG NO : <strong> ' .  strtoupper($report->reg_number). '</span></td>
						<td ></td>
						<td ><span class="green">CHASSIS NO : <strong> ' .  $report->chassis_number . '</strong></span></td>
					</tr>
					<tr>
						<td><span class="green">MAKE/MODEL : <strong> ' .  $report->make . ' '. $report->model . '</strong></span></td>
						<td ></td>
						<td><span class="green">ENGINE NO : <strong> ' .  $report->engine_number . '</strong></span></td>
					</tr>
					<tr>
						<td><span class="green">BODY TYPE : <strong> ' .  $report->body_type . '</strong></span></td>
						<td ></td>
						<td><span class="green">Y.O.M : <strong> ' .  $report->manufacture_year . '</strong></span></td>
					</tr>
					<tr>
						<td><span class="green">COLOUR : <strong> ' .  $report->colour . '</strong></span></td>
						<td ></td>
						<td><span class="green">ENGINE RATING : <strong> ' .  $report->engine_rating . '</strong></span></td>
					</tr>
					<tr>
						<td><span class="green">COUNTRY OF ORIGIN : <strong> ' .  $report->country_of_origin . '</strong></span></td>
						<td ></td>
						<td><span class="green">FIRST REG DATE : <strong> ' . $first_registration_date . '</strong></span></td>
					</tr>
					<tr>
						<td><span class="green">MILEAGE : <strong> ' .  $report->mileage . '</strong></span></td>
						<td ></td>
						<td><span class="green">TYPE OF LIGHTS : <strong> ' .  $report->light_type . '</strong></span></td>
					</tr>
					<tr>
						<td><span class="green">GEAR BOX : <strong> ' .  $report->gear_box . '</strong></span></td>
						<td ></td>
						<td><span class="green">TYPE OF FUEL : <strong> ' .  $report->fuel_type . '</strong></span></td>
					</tr>


					<tr>
						<td><span class="green">BODY WORK : <strong> ' .  $report->body_work . '</strong></span></td>
						<td ></td>
						<td ></td>
					</tr>
					<tr>
				   	<td colspan="3"><span class="green">MECHANICAL : <strong> ' .  $report->mechanical_condition . '</strong></span></td>
					</tr>
					<tr>
						<td colspan="3"><span class="green">ELECTRICALS : <strong> ' .  $report->electricals . '</strong></span></td>
					</tr>
					<tr>
					<td colspan="3"><span class="green">TYRES (% REM) : <strong> ' .  $report->tyre_condition . '</strong></span></td>
					</tr>
					<tr>
					<td colspan="3" >
							<span class="green">ANTI-THEFT DEVICE : <strong> ' .  $report->anti_theft_device . '</strong></span>
						</td>
					</tr>

					<tr>
						<td colspan="3" ><span class="green">ACCESSORIES/EXTRAS : <strong>' .  $report->accessories_extras . '</strong></span></td>
					</tr>
					<tr>
						<td><span class="green">AIRBAGS : <strong> ' .  $report->air_bags . '</strong></span></td>
						<td ></td>
						<td></td>
					</tr>

					<tr>
						<td colspan="3" ><span class="green">GENERAL CONDITION : <strong>' .  $report->general_condition . '</strong></span></td>
					</tr>
					<tr>
						<td colspan="3" >
							<span class="green">

								 ASSESSED VALUE : <strong class="bigtext red" style="font-size:18px;">'.strtoupper($report->assessed_value_number).'</strong>
							</span>
						</td>
					</tr>
					<tr>
						<td colspan="3" >
							<span class="green">

								 VALUE IN WORDS <strong class="bigtext red" style="font-size:20px;">'.strtoupper($report->assessed_value_words).'</strong>
							</span>
						</td>
					</tr>
					<!--
					<tr>
						<td colspan="3" ><span class="green">FORCED VALUE : <strong class="red bigtext">'.strtoupper($report->forced_value_number).'</strong></span></td>
					</tr>
					-->
					<tr>
						<td colspan="3" ><span class="green">NOTE VALUE : <strong>' .  $report->note_value . '</strong></span></td>
					</tr>
					<tr>
						<td colspan="3" ><span class="green">GENERAL REMARKS : <strong>' .  $report->remarks . '</strong></span></td>
					</tr>
					<tr>
						<td colspan="3" ><span class="green">NB : <strong>' .  $report->nb . '</strong></span></td>
					</tr>';
					/*
					if ($report->bank_market_value != '' && $report->bank_forced_value != '') {
						$html .= '
								<tr>
									<td colspan="3"><u><strong>FOR BANK VALUATIONS ONLY</strong></u></strong></td>
								</tr>
								<tr>
									<td><span class="green">MARKET VALUE : <strong class="bigtext red"><i>'.$report->bank_market_value . '</u></strong></span></td>
									<td ></td>
									<td><span class="green">FORCED VALUE : <strong>' .  $report->bank_forced_value . '</strong></span></td>
								</tr>';
					}
					*/
					$html .= '
					<tr>
						<td colspan="3" ><u><strong>FOR OFFICIAL USE ONLY</strong></u></strong></td>
					</tr>
					<tr>
						<td colspan="3" ><span class="green">VALUATION OFFICER : <strong>' .  $report->valuation_officer . '</strong></span></td>
					</tr>
					<tr>
						<td colspan="3" ><span class="green">PLACE OF INSPECTION : <strong> ' .  $report->inspection_place .'</strong></span></td>
					</tr>
					<tr>
						<td>
							<span class="green">AUTHORIZED SIGN : <img src="assets/img/signature.png" height="20px" /></span>
						</td>
						<td ></td>
						<td>
							<span class="green">DATE : <strong>' .  date('F j, Y', time()) . '</strong></span>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<u><span class="green">FOR AND ON BEHALF OF AUTO STAR ASSESSORS AND VALUERS LTD.</u></span>
						</td>
						<td ></td>

					</tr>
                <tr>
				<td>
							<span class="green">PIN NO : P0513807771</span>
						</td>
                 </tr>
				</table>
				';
				$html .='<div style="page-break-after:always;"></div>';
				$result = $this->db->where('report_id', $report_id);
				$result = $this->db->not_like('photo_name', ":");
				$result = $this->db->get('photos');
				if ($result->num_rows() > 0)
				{
					foreach ($result->result_array() as $row) {


							$image_thumb = "assets/uploads/".$row['photo_name'];
						  $html .= '<img class = "img-responsive" src="'.$image_thumb . '" style="height:450px;height:450px;" />';

						}
				}
				$html .='<div style="page-break-after:always;"></div>';
				$html .='<p class="red"><em>Log Book-</em></p>';
				$log = $this->photo_listing_category($report_id , "logbook");
				$r = $log->result_array();
				if (!empty($r)) {
				$parts = explode(':', $r[0]['photo_name']);
				$img = $parts[1];
					$html .='<img src="assets/uploads/'.$img.'" width="450" />';
				} else {
					$html .='<p class="gray"><em>No Log Book Uploaded</em></p>';
				}

	$category = '';
	//Second hand vehicles image if any
	$sh = $this->photo_listing_category($report_id , "sh_file");
	$h = $sh->result_array();
	if (!empty($h)){
		$parts = explode(':', $h[0]['photo_name']);
		$img = $parts[1];
		$html .='<div style="page-break-after:always;"></div>';
		$html .='<p class="red"><em>For Second Hand Vehicles Report:-</em></p>';
		$html .='<img src="assets/uploads/'.$img.'" width="450" />';
	} else {
		$category = "sh";
	}

	//show room vehicles image if any
	$sr = $this->photo_listing_category($report_id , "sr_file");
	$r = $sr->result_array();
	if (!empty($r)){
		$parts = explode(':', $r[0]['photo_name']);
		$img = $parts[1];
		$html .='<div style="page-break-after:always;"></div>';
		$html .='<p class="red"><em>For Show Room Vehicles Report:-</em></p>';
		$html .='<img src="assets/uploads/'.$img.'" width="450" />';
	} else {
		$category = "sr";
	}

	if ($category == "sh") {
			$html .='<div style="page-break-after:always;"></div>';
				$html .='
				<table width="100%">
				<tr >
					<td colspan="3">
						<!-- Descriptive text -->
						<p class="red"><em>For Second Hand Vehicles Report:-</em></p>
					</td>
				</tr>
				<tr>
					<td ><span class="green">BASE PRICE : <strong> ' .  strtoupper($report->sh_base_price). '</span></td>
					<td ></td>
					<td ><span class="green">FREIGHT & INSURANCE : <strong> ' .  $report->sh_freight_insurance . '</strong></span></td>
				</tr>
				<tr>
					<td ><span class="green">IMPORT DUTY : <strong> ' .  strtoupper($report->sh_import_duty). '</span></td>
					<td ></td>
					<td ><span class="green">EXCISE DUTY : <strong> ' .  $report->sh_excise_duty . '</strong></span></td>
				</tr>
				<tr>
					<td ><span class="green">VAT : <strong> ' .  strtoupper($report->sh_vat). '</span></td>
					<td ></td>
					<td ><span class="green">DEALERS PROFIT : <strong> ' .  $report->sh_dealers_profit . '</strong></span></td>
				</tr>
				<tr>
					<td ><span class="green">BODY DEFECTS : <strong> ' .  strtoupper($report->sh_body_defects). '</span></td>
					<td ></td>
					<td ><span class="green">MECHANICAL DEFECTS : <strong> ' .  $report->sh_mechanical_defects . '</strong></span></td>
				</tr>

				<tr>
					<td ><span class="green">RELASABILITY: <strong> ' .  strtoupper($report->sh_relasability). '</span></td>
					<td ></td>
					<td ><span class="green">ASSESSED VALUE : <strong> ' .  $report->sh_assessed_value . '</strong></span></td>
				</tr>
				<tr>
					<td ><span class="green">HIGH MILEAGE : <strong> ' .  strtoupper($report->sh_mileage). '</span></td>
				</tr>
				</table>';
} else if ($category == "sr") {
			$html .='<div style="page-break-after:always;"></div>';
			 $html .= '
				<table width="100%">
				<tr >
					<td colspan="3">
						<!-- Descriptive text -->
						<p class="red"><em>For Show Room Vehicles Report:-</em></p>
					</td>
				</tr>
				<tr>
					<td ><span class="green">DEALER PURCHASE : <strong> ' .  strtoupper($report->sr_purchase_price). '</span></td>
					<td ></td>
					<td ><span class="green">ECONOMIC LIFE : <strong> ' .  $report->sr_economic_life . '</strong></span></td>
				</tr>
				<tr>
					<td ><span class="green">BODY DEFECTS : <strong> ' .  strtoupper($report->sr_body_defects). '</span></td>
					<td ></td>
					<td ><span class="green">MILEAGE: <strong> ' .  $report->sr_mileage . '</strong></span></td>
				</tr>
				<tr>
					<td ><span class="green">RELASABILITY: <strong> ' .  strtoupper($report->sr_relasability). '</span></td>
					<td ></td>
					<td ><span class="green">ASSESSED VALUE : <strong> ' .  $report->sr_assessed_value . '</strong></span></td>
				</tr>
				</table>';
			}

				$html .='</body></html>';

			 //echo $html;

			// Convert to PDF
			 //$this->load->helper(array('dompdf', 'file'));
			 //pdf_create($html,'filename');
			require_once(dirname(__FILE__).'/../third_party/dompdf/dompdf_config.inc.php');

			// $ci->dompdf->load_html($html);
			// $ci->dompdf->render();
			// $ci->dompdf->stream($filename);

			$pdf_name = strtoupper($report->reg_number). ' ' .  ' ' .  $report->make . ' '. $report->model;
			$dompdf = new DOMPDF();
			$dompdf->load_html($html);
			$dompdf->render();
			$dompdf->stream("$pdf_name.pdf");

		}	// Checking if any results were returned

		// *******************


		if (!$success)
		{

			// Report details not found
			$this->session->set_userdata('msg', array('text' => 'The associated report details were not found; as such, the PDF file could not be created.', 'class' => 'error'));

			// Redirect
			redirect(base_url() . 'search?q=' . $search_term);

		}

	}	// End: pdf()


	// Method to find insurance company name
	public function find_insurance_company($id)
	{

		// Default company name
		$company_details = array('name' => 'NOT FOUND', 'contact_person' => 'NOT FOUND');

		// Run the query & check for the # of records returned
		$result = $this->db->get_where('users', array('id' => $id));
		if ($result->num_rows() > 0)
		{
			$row = $result->row();
			$company_details = array('name' => $row->name, 'contact_person' => $row->contact_person);
		}

		// Return the company name
		return $company_details;

	}	// End: find()



	// Method to save the new report
	public function save_new()
	{

	 // Check for the required form fields
		$valid_form = TRUE;
		$error_message = '<p>The submitted form had the following error(s):</p><ul>';
		foreach ($this->initialize_form_fields() as $form_field)
		{
			// Check if the $value has a value
			if ($form_field['required'] == 'YES' && trim($form_field['value']) == ''){
				// Error in submission
				$valid_form = FALSE;
				// Create the error message
				$error_message .= '<li>The '.$form_field['field'].' is required</li>';
			}
		}	// Iterating through the original list of form fields

		// Finish off the error message (irrespective of whether there were errors noted or not)
		$error_message .= '</ul>';

		// Now check if there were any errors ...
		if (!$valid_form)
		{
			// Missing information ... reload the form
			$this->session->set_userdata('msg', array('text' => $error_message, 'class' => 'error'));
			// Reload the form
			$data = array(
					'clients' => $this->client_listing(),
					'view' => 'report/index',
					'menu' => $this->autostar_model->menu(),
					'form_variables' => $this->initialize_form_fields(),
					'msg' => array('text' => $error_message, 'class' => 'error')
				);

			// Load the main template
		$this->load->view('templates/main_template', $data);
		}
		else
		{
			// Form okay ... now process and save
			// process accessories
			if(isset($_POST['accessories_extras_added']))
				{
					$str=$_POST['accessories_extras_added'];
					if(strpos($str, ',')>0){
						$values=explode(",",$str);
						$str='';
						foreach ($values as $k) {
							$str=$str.','.$k;
							$this->addAccessories($k);
						}
					}
					else{
						$this->addAccessories($str);
						$str=','.$str;
					}
					$_POST['accessories_extras']=$_POST['accessories_extras']."".$str;
					unset($_POST['accessories_extras_added']);
				}
			if(isset($_POST['reg_number'])){
				$_POST['reg_number']=strtoupper($_POST['reg_number']);
			}

			$status = $this->report_model->save($_POST);
			$this->session->set_userdata('msg', array('text' => $status['text'], 'class' => $status['class']));
			// Redirect to the create report page
			// $this->session->set_flashdata('msg', 'The valuation report was successfully saved.');
			$this->session->set_flashdata('msg', $status['text']);
			redirect(base_url() . 'report', 'refresh');

		}

	}	// save_new()



	// Method to get a list of photos
	public function photo_listing($report_id)
	{
		$this->db->where('report_id', $report_id);
		$this->db->not_like('photo_name', ':');
		$result = $this->db->get('photos');
		return $result;
	}

	// Method to get a list of photos
	public function photo_listing_category($report_id , $category)
	{
		$this->db->where('report_id', $report_id);
		$this->db->like('photo_name', $category);
		$result = $this->db->get('photos');
		return $result;
	}

	// Method to edit a report
	public function edit($report_id)
	{

		// Check for valid ID
		if (!is_numeric($report_id))
		{

			// Invalid ID
			redirect(base_url() . 'home', 'refresh');

		}
		else
		{

			$data = array(
				'clients' => $this->client_listing(),
				'report_details' => $this->report_model->find($report_id)->row(),
				'view' => 'report/edit',
				'menu' => $this->autostar_model->menu(),
				'msg' => array('text' => '', 'class' => ''),
				'banks'=>$this->getClientType('bank'),
				'insurance'=>$this->getClientType('insurance'),
				'private'=>$this->getClientType('private'),
				'accessories_list'=>$this->getAccessories(),
				'photos' => $this->photo_listing($report_id),
				'logbook' => $this->photo_listing_category($report_id , "logbook"),
				 'sr_file' => $this->photo_listing_category($report_id , "sr_file"),
				 'sh_file' => $this->photo_listing_category($report_id , "sh_file")

			);

			// Load the main template with the data to edit
			$this->load->view('templates/main_template', $data);

		}	// Checking for valid report ID

	}	// End: edit()

//Delete report
  public function delete($report_id)
	{
    $this->db->where('id', $report_id);
    $this->db->delete('reports');
    $this->session->set_flashdata('msg', "Report Deleted");
    redirect(base_url() . 'search', 'refresh');
  }

	// Method to save the report changes
	public function save_changes($value='')
	{

		$this->load->helper('url');

		// Check for the required form fields
		$valid_form = TRUE;
		$df = $this->initialize_form_fields();
		// Form okay ... now process and update
		$form_contents_array = $this->initialize_form_fields();

		// Create new array to save to the database
		$db_data = array();

		foreach ($form_contents_array as $form_contents)
			{
				if($form_contents['value'] == null || !isset($form_contents['value']))
					{

					}
				else
					{
						$db_data[$form_contents['field_name']] = $form_contents['value'];
					}
			}

		// // Capture the unique codes and report ID before removing them from the array
		$report_unique_code = $db_data['report_unique_code'];
		$report_id = $db_data['report_id'];

		// Remove unique code and report ID from the array
		unset($db_data['report_unique_code']);
		unset($db_data['report_id']);

		// Format the dates
		$ci =& get_instance();

		if(isset($db_data['inspection_date']) && $db_data['policy_expiry_date']!=null)
			{
				$db_data['inspection_date'] = (trim($db_data['inspection_date']) != '') ? $ci->date_model->to_timestamp($db_data['inspection_date']) : 0;
			}

		if(isset($db_data['policy_expiry_date']) && $db_data['policy_expiry_date']!=null)
			{
				$db_data['policy_expiry_date'] = (trim($db_data['policy_expiry_date']) != '') ? $ci->date_model->to_timestamp($db_data['policy_expiry_date']) : 0;
			}

		if(isset($db_data['first_registration_date']) && $db_data['first_registration_date']!= null)
			{
				$db_data['first_registration_date'] = (trim($db_data['first_registration_date']) != '') ? $ci->date_model->to_timestamp($db_data['first_registration_date']) : 0;
			}


		// The data is okay ... but before saving, let's get the current string
		$current_data_stream_for_audit_trail = json_encode($db_data);// $ci->autostar_model->debug_array($db_data, 'YES');

		// Update the changes
		$this->db->where('report_unique_code', $report_unique_code);
		$this->db->update('reports', $db_data);

		// Now update the audit trail table

		$audit_db_data = array(
				'report_id' => $report_id,
				'updated_by' => $this->session->userdata('user_id'),
				'date_updated' => time(),
				'updated_report_contents' => $current_data_stream_for_audit_trail
			);

		// Save the audit contents
		$this->db->insert('report_updates', $audit_db_data);

		// Now for the photos
		$ci =& get_instance();
		$ci->load->library('upload');
		$config['upload_path'] = 'assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '1000';

		/*
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		*/

		// Initialize the upload library
		$image_upload_notifications = '';
		$ci->upload->initialize($config);
		// $this->autostar_model->debug_array($_FILES);
		foreach ($_FILES as $field => $file)
			{
				if ($file['error'] == 0)
				{
					// No problem with the photo uploading process
					if ($ci->upload->do_upload($field))
					{

						$data = $ci->upload->data();
						if($field == 'sh_file')
						{
							$uploaded_file_name = "sh_file:".$data['file_name'];
						} else if ($field == 'sr_file')
						{
								$uploaded_file_name = "sr_file:".$data['file_name'];
						} else if($field == 'logbook')
						{
								$uploaded_file_name = "logbook:".$data['file_name'];
						} else {
								$uploaded_file_name = $data['file_name'];
						}
						$image_db_data = array(
								'report_id' => $report_id,
								'photo_name' => $uploaded_file_name
							);
						$this->db->insert('photos', $image_db_data);
						$image_upload_notifications .= ' The photo <em>' . $data['file_name'].'</em> was successfully uploaded.';
					}
					else
					{
						$image_upload_notifications .= ' Error when uploading one of the photos i.e. ' . $this->upload->display_errors() . '.';
					}
				}	// Checking for photo upload error
			}	// Iterating through the uploaded images/files


		$data = array(
				'view' => 'templates/notification',
				'notification' => array('title' => 'Report Successfully Updated', 'text' => 'The report was successfully updated', 'class' => 'success'),
				'menu' => $this->autostar_model->menu(),
				'msg' => array('text' => '', 'class' => '')
			);

		// Load the main template with the data to edit
		$this->load->view('templates/main_template', $data);


	}	// Checking if form had error(s)


	/**
	 * SAVE_CHANGES()
	 * This method is for updating the valuation report details
	 * It works very simply ... if the user submits the wrong details i.e. validation fails,
	 * the system simply redirects him/her back to the edit form and s/he has to restart the process
	 */
	public function save_changes_old()
	{

		// Check for the $_POST variable ... this ensures that the page was not simply requested
		// Load the necessary libraries and models
		$this->load->library('form_validation');
		// Check for the $_POST variable
		if ($_POST)
		{

			// A form was posted ... process it
			// But first validate the form
			$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
			if ($this->form_validation->run('update_report') == FALSE)
			{

				// Validation failed
				// Set the error message
				$this->session->set_userdata('msg', array('text' => 'There were errors in the form that you submitted; please ensure that the form is correctly filled out before submitting.', 'class' => 'error'));

				// Redirect to the edit page again
				$report_id = $this->input->post('report_id');
				$data = array(
						'clients' => $this->client_listing(),
						'report_details' => $this->report_model->find($this->input->post('report_id'))->row(),
						'view' => 'report/edit',
						'msg' => array('text' => 'There were errors in the form that you submitted; please ensure that the form is correctly filled out before submitting.', 'class' => 'error'),
						'menu' => $this->autostar_model->menu()
					);

				// Load the main template with the data to edit
				$this->load->view('templates/main_template', $data);
				// redirect(base_url() . 'report/edit/' . $report_id, 'refresh');

			}
			else
			{

				// Validation successful
				// Save the valuation form
				$status = $this->report_model->save_changes($_POST);

				// Check for the reply
				if (!$status['success'])
				{

					// Saving failed ... return errors back to the form again
					// Prepare view data
					$report_id = $this->input->post('report_id');
					$data = array(
							'clients' => $this->client_model->all(),
							'report_details' => $this->report_model->find($report_id),
							'view' => 'valuation/edit'
						);

					// Load the main template with the data to edit
					$this->load->view('templates/main_template', $data);

				}
				else
				{

					// Successfully saved ...
					// Create the flashdata variable
					$this->session->set_userdata('msg', array('text' => $status['text'], 'class' => $status['class']));

					// Redirect to the form for creating a valuation report
					redirect(base_url() . 'home', 'refresh');

				}	// Checking if the form contents were successfully saved

			}	// Running validation check

		}
		else
		{

			// Nothing posted
			// Load the form again OR redirect to the form
			$this->index();

		}	// Checking if a form was posted

	}	// End: save_changes()


	// Method go pick photos for a report
	public function photos($report_id = NULL)
	{
		// Run the query
		$report_details = $this->report_model->find($report_id)->row();
		$data = array(
			'view' => 'report/photos',
			'menu' => $this->autostar_model->menu(),
			'photos' => $this->photo_listing($report_id),
			'report' => $report_details,
			'msg' => array('text' => '', 'class' => ''),
			'insurance_company_details' => $this->report_model->find_insurance_company($report_details->insurance_company_id)
		);

		// Load the main template
		$this->load->view('templates/main_template', $data);

	}

	public function getClientType($type)
	{
		$query=$this->db->get_where('users', array('user_type' => $type));
		$data=array();
		foreach ($query->result() as $rows) {
			$dd['name']=$rows->name;
			$dd['id']=$rows->id;
			$data[]=$dd;
		}
		return $data;
	}
	public function getAccessories()
	{
		$query=$this->db->get('temp_accessories');
		$data=array();
		foreach ($query->result() as $rows) {
			$data[]=$rows->name;
		}
		return $data;
	}
	public function addAccessories($data)
	{
		$query=$this->db->get_where('temp_accessories',array('name'=>$data));
		$d=array('name'=>$data);
		if($query->num_rows() > 0){

		}
		else{
			$this->db->insert('temp_accessories',$d);
		}
	}
	public function addClient($data)
	{
		$query=$this->db->get_where('clients',array('name'=>$data['name'],'type'=>$data['type']));
		if($query->num_rows() > 0){

		}
		else
			{
				$d=array('name'=>$data['name'],'type'=>$data['type']);
				$this->db->insert('clients',$d);
			}

	}
	public function getNameFromID($id)
	{
		$query=$this->db->get_where('users', array('id' => $id));
		$name="";
		foreach ($query->result() as $rows)
			{
				$name=$rows->name;
			}
		return $name;
	}

}	// End: Report()
