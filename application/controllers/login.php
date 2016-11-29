<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// Constructor
	public function __construct()
	{
		parent::__construct();

		// Load the required models
		$ci =& get_instance();
		$ci->load->model(array('auth_model'));
	}

	// Index page
	public function index()
	{

		if ($this->session->userdata('user_id')) 
		{
			switch ($this->session->userdata('user_id')) 
				{
					case 'bank':
					case 'COMPANY':
					case 'insurance':
						redirect(base_url(). 'client', 'refresh');
						break;

					case 'PERSON':
						// session is set ... redirect to the client portal homepage
						redirect(base_url(). 'home', 'refresh');
						break;	
				}		
		}
		else
		{

			// Load the login page
			$data = array('view' => 'login/index');

			// Load the login page
			$this->load->view('templates/prelogin_template', $data);

		}	// Checking if session is set

	}	// index();


	// Process a login attempt
	public function process()
	{

		//	Check for POST values
		if ($_POST) 
		{

			//	Call the user login authentication method
			$login_status = $this->auth_model->authenticate_user();
			
			// Check for the login status
			if ($login_status['success'] == TRUE) 
			{
				
				// Login successful ... redirect to the home
				redirect(base_url() . 'home', 'refresh');

			} 
			else 
			{

				// Load login page
				$data = array('view' => 'login/index', 'msg' => $login_status['msg']);
				$this->load->view('templates/prelogin_template', $data);

			}	//	Checking if the login process was successful

		}
		else
		{

			// Set the flash message
			$msg = 'You need to provide your username and password for you to log into the system.';

			//	Load the login page
			$data = array('view' => 'login/index', 'msg' => $msg);
			$this->load->view('templates/prelogin_template', $data);

		}	// checking for $_POST values

	}	// process()

}