<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This class contains methods for managing the user profile
 */
class User extends CI_Controller 
{



	//	Constructor for the Logout class / controller
	public function __construct() 
	{

		//	This constructor does nothing right now
		parent::__construct();

		// Load the required models
		$ci =& get_instance();
		$ci->load->model(array('auth_model','autostar_model'));

		// Check if user is logged in
		$this->auth_model->is_logged_in();

	}	// End: __construct()


	// Method to preload form fields
	public function initialize_form_fields()
	{
		// Initialize the form fields
		$form_fields = array(
			    array(
				    	'field' => 'Person / Organization Name', 
				    	'field_name' => 'name', 
				    	'required' => 'YES', 
				    	'value' => isset($_POST['name']) ? trim($_POST['name']) : ''
			    	),
			    array(
				    	'field' => 'Username', 
				    	'field_name' => 'username', 
				    	'required' => 'YES', 
				    	'value' => isset($_POST['username']) ? trim($_POST['username']) : ''
			    	),
			    array(
				    	'field' => 'Contact Person', 
				    	'field_name' => 'contact_person', 
				    	'required' => 'YES', 
				    	'value' => isset($_POST['contact_person']) ? trim($_POST['contact_person']) : ''
			    	),
			    array(
				    	'field' => 'Password', 
				    	'field_name' => 'password', 
				    	'required' => 'YES', 
				    	'value' => isset($_POST['password']) ? trim($_POST['password']) : ''
			    	),
			    array(
				    	'field' => 'Password Confirmation', 
				    	'field_name' => 'confirm_password', 
				    	'required' => 'YES', 
				    	'value' => isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : ''
			    	),
			);

		// Return the form fields
		return $form_fields;

	}	// End: initialize_form_fields()


	// Default method for the User controller
	public function index() 
	{

		// Create array of data to pass to the main template
		$data = array(
				'view' => 'user/index',
				'menu' => $this->autostar_model->menu(),
				'msg' => array('text' => '', 'class' => ''),
				'users' => $this->db->get_where('users', array('id <> ' => $this->session->userdata('user_id'))),
				'form_variables' => array('name' => '', 'username' => '', 'contact_person' => '', 'active' => '', 'is_admin' => '', 'user_type' => '')
			);

		// Load the main template
		$this->load->view('templates/main_template', $data);
		
	}	// End: index()


	// method to add a new user
	public function create()
	{
		
		// load the form for adding a new user
		$data = array(
				'view' => 'user/create',
				'menu' => $this->autostar_model->menu(),
				'form_variables' => array('name' => '', 'username' => '', 'contact_person' => '', 'active' => '', 'is_admin' => '', 'user_type' => ''),
				'msg' => array('text' => '', 'class' => '')
			);

		// Load the main template
		$this->load->view('templates/main_template', $data);

	}	// end: create()


	// method to save user account
	public function save()
	{
		
		// start processing the form
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
					'view' => 'user/create',
					'menu' => $this->autostar_model->menu(),
					'form_variables' => $_POST,
					'msg' => array('text' => $error_message, 'class' => 'error')
				);

			// Load the main template
			$this->load->view('templates/main_template', $data);
		}
		else
		{
			// Form okay ... now process and save
			// $status = $this->report_model->save($_POST);
			// $this->session->set_userdata('msg', array('text' => $status['text'], 'class' => $status['class']));
			// Redirect to the create report page
			// $this->session->set_flashdata('msg', 'The valuation report was successfully saved.');
			// $this->session->set_flashdata('msg', $status['text']);
			$check = $this->db->get_where('users', array('username' => $this->input->post('username')));
			if ($check->num_rows() > 0) 
			{
				// username already exists ... notify the user
				$this->session->set_userdata('msg', array('text' => 'The username you provided i.e. <em>'.$this->input->post('username').'</em> already exists in the database for another account.', 'class' => 'error'));
				// Reload the form
				$data = array(
						'view' => 'user/create',
						'menu' => $this->autostar_model->menu(),
						'form_variables' => $_POST,
						'msg' => array('text' => 'The username you provided i.e. <em>'.$this->input->post('username').'</em> already exists in the database for another account.', 'class' => 'error')
					);

				// Load the main template
				$this->load->view('templates/main_template', $data);
			}
			elseif (trim($this->input->post('password')) !== trim($this->input->post('confirm_password'))) 
			{
				// passwords don't match
				// Reload the form
				$data = array(
						'view' => 'user/create',
						'menu' => $this->autostar_model->menu(),
						'form_variables' => $_POST,
						'msg' => array('text' => 'The passwords do not match.', 'class' => 'error')
					);

				// Load the main template
				$this->load->view('templates/main_template', $data);
			}
			else
			{
				// username is unique & passwords match
				$db_data = array(
						'name' => $this->input->post('name'),
						'username' => $this->input->post('username'),
						'contact_person' => $this->input->post('username'),
						'active' => $this->input->post('active'),
						'user_type' => $this->input->post('user_type'),
						'is_admin' => $this->input->post('is_admin'),
						'password' => sha1(trim($this->input->post('password')))
					);
				
				// save the record
				$this->db->insert('users', $db_data);
				// notify the user
				$this->session->set_userdata('msg', array('text' => 'The user account was successfully created.', 'class' => 'success'));
				// redirect to the users page
				redirect(base_url() . 'user', 'refresh');
			}	// checking for unique username and matching passwords

		}	// checking if the form is valid

	}	// end: save()


	// Method to edit a user account
	public function edit($id)
	{

		// check if the record exists
		if (trim($id) == '' || !is_numeric($id)) 
		{

			// invalid user id ... redirect back
			redirect(base_url() . 'user', 'refresh');

		}
		else
		{

			// valid user id ... get the details
			$result = $this->db->get_where('users', array('id' => $id));
			if ($result->num_rows() <= 0) 
			{

				// missing details ... redirect
				redirect(base_url() . 'user', 'refresh');

			}
			else
			{

				// details exist ... load the edit form
				$data = array(
						'view' => 'user/edit',
						'menu' => $this->autostar_model->menu(),
						'form_variables' => $result->row(),
						'msg' => array('text' => '', 'class' => '')
					);

				// Load the main template
				$this->load->view('templates/main_template', $data);

			}	// checking if the user id has associated details

		}	// checking for valid user id

	}	// end: edit()


	// Method to update user account details
	public function update()
	{
		
		// grab all the fields and validate them
		$user_id = trim($this->input->post('user_id'));
		$name = trim($this->input->post('name'));
		$username = trim($this->input->post('username'));
		$contact_person = trim($this->input->post('contact_person'));
		$active = trim($this->input->post('active'));
		$is_admin = trim($this->input->post('is_admin'));
		$password = trim($this->input->post('password'));
		$confirm_password = trim($this->input->post('confirm_password'));

		// first check to ensure that the username is unique
		$check = $this->db->get_where('users', array('username' => $username, 'id <> ' => $user_id));
		if ($check->num_rows > 0) 
		{

			// username is not unique i.e. exists for another account
			$data = array(
					'view' => 'user/edit',
					'menu' => $this->autostar_model->menu(),
					'form_variables' => $this->db->get_where('users', array('id' => $user_id))->row(),
					'msg' => array('text' => 'The username you provided is already in use. Please try again.', 'class' => 'error')
				);

			// Load the main template
			$this->load->view('templates/main_template', $data);

		}
		else
		{

			// unique username ... save the details
			$db_data = array(
					'name' => $name,
					'username' => $username,
					'contact_person' => $contact_person,
					'active' => $active,
					'is_admin' => $is_admin
				);

			// update the details
			$this->db->where('id', $user_id);
			$this->db->update('users', $db_data);

			// now check for the passwords
			if ($password != '' && $confirm_password != '') 
			{

				// passwords need changing ... check if they match
				if ($password !== $confirm_password) 
				{

					// passwords don't match
					$data = array(
							'view' => 'user/edit',
							'menu' => $this->autostar_model->menu(),
							'form_variables' => $this->db->get_where('users', array('id' => $user_id))->row(),
							'msg' => array('text' => 'The passwords you provided do not match BUT the other details were successfully updated.', 'class' => 'error')
						);

					// Load the main template
					$this->load->view('templates/main_template', $data);

				}
				else
				{

					// passwords match ... now update the db with the passwords
					$db_data = array('password' => sha1($password));
					$this->db->where('id', $user_id);
					$this->db->update('users', $db_data);

				}	// checking if passwords match

			}	// checking if passwords need changing

			// reload the listing of users again
			redirect(base_url() . 'user', 'refresh');

		}	// checking if the username is unique and not in use by another account

	}	// end: update()


	// Function to confirm that the username is unique
	public function unique_username($username, $user_id=NULL)
	{
		
		// Create query to check
		// First, check if the user_id is valid
		if (is_numeric($user_id) && $user_id > 0) 
		{
			// Valid user ID ... create filter
			$this->db->where('id <> ', $user_id);
		}
		$this->db->where('username', $username);
		$result = $this->db->get('users');
		if ($result->num_rows() > 0) 
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}

	}	// End: unique_username()


	// Method to delete a user account
	public function delete($id)
	{
		// Check for the ID
		if (trim($id) == '' || !is_numeric($id)) 
		{

			// invalid id ... redirect
			redirect(base_url() . 'user', 'refresh');

		}
		else
		{

			// valid id ... delete the record
			$this->db->where('id', $id);
			$this->db->delete('users');

			// done ... go back to users listing
			redirect(base_url() . 'user', 'refresh');

		}	// checking for valid user account id

	}	// end: delete()


}	// End: User -- CLASS
