<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller 
{
	// Constructor
	public function __construct() 
	{
		// Run parent controller
		parent::__construct();
		
	}	// End: __construct()


	// Method to preload form fields
	public function initialize_form_fields()
	{
		// Initialize the form fields

		
		if(isset($_POST['name'])){
			unset($_POST['name']);
		}
		if(isset($_POST['value'])){
			unset($_POST['value']);
		}

		$form_fields = array(
			    array('field' => 'Report Unique Code', 'field_name' => 'report_unique_code', 'required' => 'NO', 'value' => isset($_POST['report_unique_code']) ? trim($_POST['report_unique_code']) : ''),
			     /* FOR FIRST TIME REPORTS */
			    array('field' => 'Report ID', 'field_name' => 'report_id', 'required' => 'NO', 'value' => isset($_POST['report_id']) ? trim($_POST['report_id']) : ''),
			     /* FOR EDITED REPORTS */
			    array('field' => 'Valuation Form Serial Number', 'field_name' => 'serial_number', 'required' => 'NO', 'value' => isset($_POST['serial_number']) ? trim($_POST['serial_number']) : ''),
			    array('field' => 'Receipt Number', 'field_name' => 'receipt_number', 'required' => 'YES', 'value' => isset($_POST['receipt_number']) ? trim($_POST['receipt_number']) : ''),
			    array('field' => 'Inspection Date', 'field_name' => 'inspection_date', 'required' => 'YES', 'value' => isset($_POST['inspection_date']) ? trim($_POST['inspection_date']) : ''),
			    array('field' => 'Client Name', 'field_name' => 'client_name', 'required' => 'YES', 'value' => isset($_POST['client_name']) ? trim($_POST['client_name']) : ''),
			    array('field' => 'Client Contact Details', 'field_name' => 'client_contacts', 'required' => 'NO', 'value' => isset($_POST['client_contacts']) ? trim($_POST['client_contacts']) : ''),
			    array('field' => 'Insurance Company', 'field_name' => 'insurance_company_id', 'required' => 'NO', 'value' => isset($_POST['insurance_company_id']) ? trim($_POST['insurance_company_id']) : ''),
			    array('field' => 'Policy Number', 'field_name' => 'policy_number', 'required' => 'NO', 'value' => isset($_POST['policy_number']) ? trim($_POST['policy_number']) : ''),
			    array('field' => 'Policy Expiry Date', 'field_name' => 'policy_expiry_date', 'required' => 'NO', 'value' => isset($_POST['policy_expiry_date']) ? trim($_POST['policy_expiry_date']) : ''),
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
			    array('field' => 'Vehicle First Registration Date', 'field_name' => 'first_registration_date', 'required' => 'NO', 'value' => isset($_POST['first_registration_date']) ? trim($_POST['first_registration_date']) : ''),
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
			    array('field' => 'Forced Value (In Words)', 'field_name' => 'forced_value_words', 'required' => 'NO', 'value' => isset($_POST['forced_value_words']) ? trim($_POST['forced_value_words']) : ''),
			    array('field' => 'Note Value', 'field_name' => 'note_value', 'required' => 'NO', 'value' => isset($_POST['note_value']) ? trim($_POST['note_value']) : ''),
			    array('field' => 'Valuation Officer', 'field_name' => 'valuation_officer', 'required' => 'NO', 'value' => isset($_POST['valuation_officer']) ? trim($_POST['valuation_officer']) : ''),
			    array('field' => 'Remarks', 'field_name' => 'remarks', 'required' => 'NO', 'value' => isset($_POST['remarks']) ? trim($_POST['remarks']) : ''),
			    array('field' => 'NB', 'field_name' => 'nb', 'required' => 'NO', 'value' => isset($_POST['nb']) ? trim($_POST['nb']) : ''),
			    array('field' => 'Remedy', 'field_name' => 'remedy', 'required' => 'NO', 'value' => isset($_POST['remedy']) ? trim($_POST['remedy']) : ''),
			    array('field' => 'Bank Market Value', 'field_name' => 'bank_market_value', 'required' => 'NO', 'value' => isset($_POST['bank_market_value']) ? trim($_POST['bank_market_value']) : ''),
			    array('field' => 'Bank Forced Value', 'field_name' => 'bank_forced_value', 'required' => 'NO', 'value' => isset($_POST['bank_forced_value']) ? trim($_POST['bank_forced_value']) : '')
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
		$data = array(
				'clients' => $this->client_listing(),
				'view' => 'report/index',
				'menu' => $this->autostar_model->menu(),
				'form_fields' => $this->initialize_form_fields(),
				'msg' => array('text' => '', 'class' => '')
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
			// $ci->load->library('dompdf');

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
			// generate accessories table
		
			$p1=$report->accessories_extras; 
			$records=array();
			$accessories_table="none";
			if(strpos($p1,'&')>0)
				{
					if($p1!="0"){
						$accessories_table="<ol>";
						$rows=explode("&",$p1);
						foreach ($rows as $r) {
							
							list($id,$name,$value)=explode(" ",$r);
							$append="<li>".$name." value   ".$value."</li>";
							$accessories_table=$accessories_table."".$append;
						}
						$accessories_table=$accessories_table."</ol>";
					}
				}
			else
				{
					if($p1!="0")
						{
							list($id,$name,$value)=explode(" ",$p1);
							$append="<li>".$name." value   ".$value."</li>";
							$accessories_table=$accessories_table."".$append;
							$accessories_table=$accessories_table."</ol>";
						}	
				}
			//setcookie("table",$accessories_table);
			/*$report->accessories_extras*/ 
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
				</style>
				</head>

				<body>

				<table cellpadding="5" cellspacing="0" border="0" width="100%">
					<tr>
						<td width="100%" class="bottom-border"><img src="'. $_SERVER['DOCUMENT_ROOT'] . '/assets/img/logo-strip.jpg' .'" class="masthead" /></p></td>
					</tr>
				</table>

				<!-- Serial Number -->
				<p style="text-align: right;"><span class="green">SERIAL NUMBER:</span> <strong class="red">'. $report->serial_number .'</strong></p>

				<!-- Report Title -->
				<h3 style="text-align: center; font-size: 14pt;">VEHICLE VALUATION REPORT</h3>

				<!-- Receipt Number -->
				<p><span class="green">RECEIPT NUMBER:</span> <strong>' . $report->receipt_number . '</strong></p>

				<!-- Date of Inspection -->
				<p><span class="green">DATE OF INSPECTION:</span> <strong>'. $inspection_date .'</strong></p>

				<!-- Client Name -->
				<p><span class="green">CLIENT NAME:</span> <strong>' . $report->client_name . '</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="green">CONTACTS:</span> <strong>' .  $report->client_contacts . '</strong></p>

				<!-- Insurance Details -->
				<p><span class="green">INSURANCE COMPANY:</span> <strong>'. $insurance_company_details['name'] .'</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="green">POLICY NO:</span> <strong>' .  $report->policy_number . '</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="green">EXPIRY DATE:</span> <strong>' . $policy_expiry_date . '</strong></p>

				<!-- Destination -->
				<p><span class="green">DESTINATION:</span> <strong>' .  $insurance_company_details['contact_person'] . '</p>

				<!-- Descriptive text -->
				<p></p>
				<p></p>
				<p><br><br></p>
				<p class="red"><em>After a brief inspection and road test was carried out on the subject vehicle, the following are the findings:-</em></p>

				<table cellpadding="5" cellspacing="0" width="100%">
					<tr>
						<td width="50%"><span class="green">REG NO:</span> ' .  $report->reg_number . '</td>
						<td width="50%"><span class="green">CHASSIS NO:</span> <strong>' .  $report->chassis_number . '</strong></td>
					</tr>
					<tr>
						<td><span class="green">MAKE:</span> <strong>' .  $report->make . '</strong></td>
						<td><span class="green">ENGINE NO:</span> <strong>' .  $report->engine_number . '</strong></td>
					</tr>
					<tr>
						<td><span class="green">BODY TYPE:</span> <strong>' .  $report->body_type . '</strong></td>
						<td><span class="green">YEAR OF MANUFACTURE:</span> <strong>' .  $report->manufacture_year . '</strong></td>
					</tr>
					<tr>
						<td><span class="green">COLOUR:</span> <strong>' .  $report->colour . '</strong></td>
						<td><span class="green">ENGINE RATING:</span> <strong>' .  $report->engine_rating . '</strong></td>
					</tr>
					<tr>
						<td><span class="green">MILEAGE:</span> <strong>' .  $report->mileage . '</strong></td>
						<td><span class="green">FIRST REG DATE:</span> <strong>' . $first_registration_date . '</strong></td>
					</tr>
					<tr>
						<td><span class="green">COUNTRY OF ORIGIN:</span> <strong>' .  $report->country_of_origin . '</td>
						<td><span class="green">TYPE OF FUEL:</span> <strong>' .  $report->fuel_type . '</strong></td>
					</tr>
					<tr>
						<td><span class="green">BODY WORK:</span> <strong>' .  $report->body_work . '</strong></td>
						<td><span class="green">MECHANICAL:</span> <strong>' .  $report->mechanical_condition . '</strong></td>
					</tr>
					<tr>
						<td><span class="green">ELECTRICALS:</span> <strong>' .  $report->electricals . '</strong></td>
						<td><span class="green">TYRES (% REM):</span> <strong>' .  $report->tyre_condition . '</strong></td>
					</tr>
					<tr>
						<td><span class="green">ACCESSORIES/EXTRAS:</span> <strong></strong></td>
						<td><span class="green">ANTI-THEFT DEVICE:</span> <strong>' .  $report->anti_theft_device . '</strong></td>
					</tr>

					<tr>
						<td colspan="2" width="100%"><span class="green">ACCESSORIES/EXTRAS:</span> <strong>' .  $accessories_table . '</strong></td>
					</tr>
					
					<tr>
						<td colspan="2" width="100%"><span class="green">GENERAL CONDITION:</span> <strong>' .  $report->general_condition . '</strong></td>
					</tr>
					<tr>
						<td colspan="2" width="100%"><span class="green">MARKET / ASSESSED VALUE:</span> <strong class="red bigtext">' .  strtoupper($report->assessed_value_number) . ' (' . strtoupper($report->assessed_value_words) . ')' . '</strong></td>
					</tr>
					<tr>
						<td colspan="2" width="100%"><span class="green">FORCED VALUE:</span> <strong class="red bigtext">' .  strtoupper($report->forced_value_number) . ' (' . strtoupper($report->forced_value_words) . ')' . '</strong></td>
					</tr>
					<tr>
						<td colspan="2" width="100%"><span class="green">NOTE VALUE:</span> <strong>' .  $report->note_value . '</strong></td>
					</tr>
					<tr>
						<td colspan="2" width="100%"><span class="green">GENERAL REMARKS:</span> <strong>' .  $report->remarks . '</strong></td>
					</tr>
					<tr>
						<td colspan="2" width="100%"><span class="green">NB:</span> <strong>' .  $report->nb . '</strong></td>
					</tr>
					<tr>
						<td colspan="2" width="100%"><span class="green">REMEDY:</span> <strong>' .  $report->remedy . '</strong></td>
					</tr>';

					if ($report->bank_market_value != '' && $report->bank_forced_value != '') {
						$html .= '
								<tr>
									<td colspan="2" width="100%"><u><strong>FOR BANK VALUATIONS ONLY</strong></u></strong></td>
								</tr>
								<tr>
									<td><span class="green">MARKET VALUE:</span> <strong>' .  $report->bank_market_value . '</strong></td>
									<td><span class="green">FORCED VALUE:</span> <strong>' .  $report->bank_forced_value . '</strong></td>
								</tr>';
					}

					$html .= '
					<tr>
						<td colspan="2" width="100%"><u><strong>FOR OFFICIAL USE ONLY</strong></u></strong></td>
					</tr>
					<tr>
						<td colspan="2" width="100%"><span class="green">VALUATION OFFICER:</span></span> <strong>' .  $report->valuation_officer . '</strong></td>
					</tr>
					<tr>
						<td colspan="2" width="100%"><span class="green">SIGNATURE:</span></span> <img src="' .  $_SERVER['DOCUMENT_ROOT'] . '/assets/img/signature.png' . '" height="20px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="green">DATE:</span> <strong>' .  date('F j, Y', time()) . '</strong></td>
					</tr>
					<tr>
						<td colspan="2" width="100%"><u><span class="green">FOR AND ON BEHALF OF AUTO STAR ASSESSORS AND VALUERS LTD.</u><br/><span class="green">PIN NO: P0513807771</td>
					</tr>
				</table>

				</body>

				</html>
				';

			 //echo $html;
		
			// Convert to PDF
			$ci->dompdf->load_html($html);
			$ci->dompdf->render();
			$ci->dompdf->stream($filename);

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
			$_POST['accessories_extras']=file_get_contents(base_url()."index.php/AjaxTable/index");
			file_get_contents(base_url()."index.php/AjaxTable/reset");
		
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

			// Valid report ID
			// Create the data array
			$data = array(
					'clients' => $this->client_listing(),
					'report_details' => $this->report_model->find($report_id)->row(),
					'view' => 'report/edit',
					'msg' => array('text' => '', 'class' => ''), 
					'menu' => $this->autostar_model->menu(),
					'photos' => $this->photo_listing($report_id)
				);
			
			// Load the main template with the data to edit
			$this->load->view('templates/main_template', $data);
			
		}	// Checking for valid report ID

	}	// End: edit()



	// Method to save the report changes
	public function save_changes($value='')
	{

		$this->load->helper('url'); 
  		
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
			// $this->session->set_userdata('msg', array('text' => $error_message, 'class' => 'error'));
			// Reload the form
			$data = array(
					'clients' => $this->client_listing(),
					'view' => 'report/edit',
					'menu' => $this->autostar_model->menu(),
					'report_details' => $this->report_model->find($this->input->post('report_id'))->row(),
					'msg' => array('text' => $error_message, 'class' => 'error')
				);

			// Load the main template
			$this->load->view('templates/main_template', $data);
		}
		else
		{
			// Form okay ... now process and update
			$form_contents_array = $this->initialize_form_fields();
			// $this->autostar_model->debug_array($form_contents_array);

			// Create new array to save to the database
			$db_data = array();
			foreach ($form_contents_array as $form_contents) {
				$db_data[$form_contents['field_name']] = $form_contents['value'];
			}
			$db_data['accessories_extras']=file_get_contents(base_url()."index.php/AjaxTable/index");
			file_get_contents(base_url()."index.php/AjaxTable/reset");
			// Capture the unique codes and report ID before removing them from the array
			$report_unique_code = $db_data['report_unique_code'];
			$report_id = $db_data['report_id'];

			// Remove unique code and report ID from the array
			unset($db_data['report_unique_code']);
			unset($db_data['report_id']);

			// Format the dates
			$ci =& get_instance();
			$db_data['inspection_date'] = (trim($db_data['inspection_date']) != '') ? $ci->date_model->to_timestamp($db_data['inspection_date']) : 0;
			$db_data['policy_expiry_date'] = (trim($db_data['policy_expiry_date']) != '') ? $ci->date_model->to_timestamp($db_data['policy_expiry_date']) : 0;
			$db_data['first_registration_date'] = (trim($db_data['first_registration_date']) != '') ? $ci->date_model->to_timestamp($db_data['first_registration_date']) : 0;

			// Format the registration number
			$db_data['reg_number'] = preg_replace("/[^a-zA-Z0-9]+/", "", $db_data['reg_number']);

			// The data is okay ... but before saving, let's get the current string
			$current_data_stream_for_audit_trail = $ci->autostar_model->debug_array($db_data, 'YES');

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
						$uploaded_file_name = $data['file_name'];
						$image_db_data = array(
								'report_id' => $report_id,
								'photo_name' => $uploaded_file_name
							);
						$this->db->insert('photos', $image_db_data);
						$image_upload_notifications .= ' The photo <em>'.$data['file_name'].'</em> was successfully uploaded.';
					}
					else
					{
						$image_upload_notifications .= ' Error when uploading one of the photos i.e. ' . $this->upload->display_errors() . '.';
					}
				}	// Checking for photo upload error
			}	// Iterating through the uploaded images/files
			
			// Now show the details
			// echo $current_data_stream_for_audit_trail;
			// $ci->autostar_model->debug_array($db_data);

			$data = array(
					'view' => 'templates/notification',
					'notification' => array('title' => 'Report Successfully Updated', 'text' => 'The report was successfully updated', 'class' => 'success'), 
					'menu' => $this->autostar_model->menu(),
					'msg' => array('text' => '', 'class' => '')
				);
			
			// Load the main template with the data to edit
			$this->load->view('templates/main_template', $data);

		}	// Checking if form had error(s)


	}	// End: save_changes()



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


}	// End: Report()