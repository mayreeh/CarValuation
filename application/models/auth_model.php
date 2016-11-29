<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// Check if user is logged in
	public function is_logged_in()
	{
		// Check the session
		if($this->session->userdata('user_id')){
			// Session set ... return true
			return TRUE;
		} else {
			// Session not set ... redirect to the login page
			redirect(base_url() . 'logout', 'refresh');
		}
	}	// is_logged_in()



	// Method to authenticate the user login
	public function authenticate_user() {

		//	Create the login details validation rules
		$login_details_validation_config = array(
				array(
						'field' => 'username',
						'label' => 'Username',
						'rules' => 'trim|required|xss_clean'
					),
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'trim|required|min_length[3]|xss_clean'
					)
			);

		//	Load the form validation library
		$this->load->library('form_validation');

		//	Load the validation rules
		$this->form_validation->set_rules($login_details_validation_config);

		//	Run the validation of the login credentials
		if ($this->form_validation->run() == FALSE) {

			// load the error message(s) in the $data array
			$return_array = array(
					'success' => FALSE,
					'msg' => 'The following errors were noted when attempting to log you in:'.validation_errors());

			// return the status message
			return $return_array;

		} else {
			
			//	All is okay ... authenticate the user
			//	Create array for querying the database
			$user_data = array(
					'username' => $this->input->post('username', true),
					'password' => sha1($this->input->post('password', true))
				);

			// Run these details against the database
			$query = $this->db->get_where('users', $user_data);

			// Check for the number of rows returned
			if ($query->num_rows == 1) {
				
				// Successful login ... the details are valid
				// Create the session variables
				// Grab the returned query results
				$user_details = $query->row_array();
				
				// check the account_status
				if ($user_details['active'] == 'NO') 
				{

					// ACCOUNT NOT ACTIVATED
					$return_array = array(
							'success' => FALSE,
							'msg' => 'You could not log in because your account is not activated. Please visit your mailbox and click on the activation link sent to you .'
						);

					// return the results
					return $return_array;

				}
				else
				{

					// Account activated
					// Create an array of all the session variables
					// The 'client_id' value is used to track the current client that the user is working on
					$session_data = array(
							'user_id' => $user_details['id'],
							'name' => $user_details['name'],
							'username' => $user_details['username'],
							'admin' => $user_details['is_admin'],
							'user_type'=>$user_details['user_type'],
							'name' => $user_details['name'],
							'msg' => array()
						);
					
					// Create the session
					$this->session->set_userdata($session_data);

					// Redirect to the home
					redirect(base_url() . 'home', 'refresh');

				}	// checking if the account is activated

			} else {

				// The login credentials are invalid
				// Set the error message & return it
				$return_array = array(
						'success' => FALSE,
						'msg' => 'The login details that you provided are invalid OR your account is not activated.'
					);

				// return the results
				return $return_array;

			}	//	Checking if the query returned any results

		}	// running validation on form submitted

	}	// END: authenticate_user()



}