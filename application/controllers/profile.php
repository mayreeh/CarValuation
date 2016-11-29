<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This class contains methods for managing the user profile
 */
class Profile extends CI_Controller 
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


	// Default method for the Profile controller
	public function index() 
	{

		// Create array of data to pass to the main template
		$data = array(
				'view' => 'profile/index',
				'menu' => $this->autostar_model->menu(),
				'msg' => array('text' => '', 'class' => ''),
				'profile_details' => $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->row(),
				'msg' => array('text' => '', 'class' => '')
			);

		// Load the main template
		$this->load->view('templates/main_template', $data);
		
	}	// End: index()


	// Method to update the profile
	public function update()
	{
		
		// Do the validation
		$user_id = trim($this->input->post('user_id'));
		$name = trim($this->input->post('name'));
		$username = trim($this->input->post('username'));
		$contact_person = trim($this->input->post('contact_person'));
		$username_is_unique = $this->unique_username($username, $user_id);

		// Run the validation
		$errors = FALSE;
		$msg = 'The following error(s) were found: <ul>';
		if ($name == '') { $errors = TRUE; $msg .= '<li>The name of the person / organization is required.</li>'; }
		if ($username == '') { $errors = TRUE; $msg .= '<li>The username is required.</li>'; }
		if ($contact_person == '') { $errors = TRUE; $msg .= '<li>The contact person is required.</li>'; }
		if ($username != '' && !$username_is_unique) { $errors = TRUE; $msg .= '<li>The username "'.$username.'" is already in use for another account.</li>'; }
		$msg .= '</ul>';
		if ($errors) 
		{

			// Errors found ... reload the page
			$data = array(
					'view' => 'profile/index',
					'menu' => $this->autostar_model->menu(),
					'msg' => array('text' => '', 'class' => ''),
					'profile_details' => $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->row(),
					'msg' => array('text' => $msg, 'class' => 'error')
				);

			// Load the main template
			$this->load->view('templates/main_template', $data);

		}
		else
		{

			// So far so good ... continue ...
			// Update the basic details of the account
			$db_data = array(
					'name' => $name,
					'username' => $username,
					'contact_person' => $contact_person
				);

			// update the db
			$this->db->where('id', $user_id);
			$this->db->update('users', $db_data);

			// Now process the passwords if they were supplied
			$new_password = trim($this->input->post('new_password'));
			$confirm_new_password = trim($this->input->post('confirm_new_password'));
			if ($new_password != '' && $confirm_new_password != '' && $new_password === $confirm_new_password) 
			{
				// Passwords are fine; update them
				$encrypted_new_password = sha1($new_password);
				$this->db->where('id', $user_id);
				$db_data = array('password' => $encrypted_new_password);
				$this->db->update('users', $db_data);
				$data = array(
						'notification' => array('title' => 'Profile Updating', 'text' => 'The profile details were successfully updated.', 'class' => 'success'),
						'view' => 'templates/notification',
						'menu' => $this->autostar_model->menu(),
						'msg' => array('text' => '', 'class' => '')
					);
				// Load the view
				$this->load->view('templates/main_template', $data);
			}
			else
			{
				// Only basic profile details were updated
				$data = array(
						'notification' => array('title' => 'Profile Updating', 'text' => 'The profile details were successfully updated BUT the password was not updated.', 'class' => 'success'),
						'view' => 'templates/notification',
						'menu' => $this->autostar_model->menu(),
						'msg' => array('text' => '', 'class' => '')
					);
				// Load the view
				$this->load->view('templates/main_template', $data);
			}

		}	// Running validation of the form

	}	// End: update()


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


}	// End: Profile()


/* End of file profile.php */
/* Location: ./application/controllers/profile.php */