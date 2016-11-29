<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_Model extends CI_Controller
{

	// Constructor
	public function __construct()
	{

		// Run parent controller
		parent::__construct();

		// Create a CI instance
		$ci =& get_instance();

	}	// End: __construct()


	// Method to find a report's details
	public function find($report_id)
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


	// Method to generate the PDF file of the report
	public function generate_pdf($report_id)
	{

		// Check for the PDF file
		$result = $this->db->get_where('reports', array('id' => $report_id));
		if ($result->num_rows() <= 0)
		{

			// Nothing found; return false
			return FALSE;

		}
		else
		{

			// Grab the details and pass them to a view which will then be converted into a PDF file
			$rs = $result->row();

			// -----------------------------------------------------------------//
			// HTML2PDF Library Source: https://github.com/aiwmedia/HTML2PDF-CI	//
			// -----------------------------------------------------------------//
			// Load the library
			$this->load->library('html2pdf');

			// Set folder to save PDF to
			$this->html2pdf->folder('./assets/pdfs/');

			// Set the filename to save/download as
			$filename = 'Valuation_Report_' . $report_id . '.pdf';
			$this->html2pdf->filename($filename);

			// Set the paper defaults
			$this->html2pdf->paper('a4', 'portrait');

			// Create the file
			$data = array(
					'report' => $rs,
					'insurance_company_details' => $this->find_insurance_company($rs->insurance_company_id)
				);
			$this->html2pdf->html($this->load->view('report/pdf', $data, true));

			// Force the file to download
			$this->html2pdf->create('download');

		}	// Checking if any results were returned

	}	// End: generate_pdf()


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



	// Save function
	public function save($form_contents)
	{


		// Create the array to save to the database
		$db_data = array();
		foreach ($form_contents as $key => $value)
		{
			$db_data[$key] = $value;
		}

		// Add two more values i.e. who submitted the report and when
		$db_data['submitted_by'] = $this->session->userdata('user_id');
		$db_data['date_submitted'] = time();

		// Reformat the date values
		$db_data['inspection_date'] = (trim($db_data['inspection_date']) != '') ? $this->date_model->to_timestamp($db_data['inspection_date']) : 0;
		$db_data['policy_expiry_date'] = (trim($db_data['policy_expiry_date']) != '') ? $this->date_model->to_timestamp($db_data['policy_expiry_date']) : 0;
		$db_data['first_registration_date'] = (trim($db_data['first_registration_date']) != '') ? $this->date_model->to_timestamp($db_data['first_registration_date']) : 0;

		// Now remove the unwanted array variables
		unset($db_data['userfile']);	// We've removed the 'userfile' variable which has the uploaded photos; this we shall process hereafter

		// We've confirmed that we have only the values we wish to save to the database
		//$db_data['reg_number'] = preg_replace("/[^a-zA-Z0-9]+/", "", $db_data['reg_number']);

		// Now insert the data into the database
		$this->db->insert('reports', $db_data);
		$report_id = $this->db->insert_id();

		// Now process the photos
		$this->load->library('upload');
		$config['upload_path'] = 'assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		/*$config['max_size'] = '1000';
  	$config['max_size'] = '1000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		*/

		// Initialize the upload library
		$image_upload_notifications = '';
		$this->upload->initialize($config);
		// $this->autostar_model->debug_array($_FILES);

		foreach ($_FILES as $field => $file)
		{
			if ($file['error'] == 0)
			{
				// No problem with the photo uploading process
				if ($this->upload->do_upload($field))
				{
					$data = $this->upload->data();
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
					$image_upload_notifications .= ' The photo <em>'.$data['file_name'].'</em> was successfully uploaded.';
				}
				else
				{
					$image_upload_notifications .= ' Error when uploading one of the photos i.e. ' . $this->upload->display_errors() . '.';
				}
			}	// Checking for photo upload error
		}	// Iterating through the uploaded images/files

		// Return success message
		$status = array('success' => TRUE, 'text' => 'The valuation report was successfully saved.' . $image_upload_notifications, 'class' => 'success');
		return $status;

	}	// End: save()



}	// End: Report_Model()
