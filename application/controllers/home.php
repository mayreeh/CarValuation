<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{


	// constructor
	public function __construct() 
	{

		// Run parent controller
		parent::__construct();		

		// Check if user is logged in
		$this->auth_model->is_logged_in();

		// Load the required models
		$ci =& get_instance();
		$ci->load->model(array('autostar_model'));

	}	// End: __construct()


	// Default method for the Home controller
	public function index() 
	{

		// Create array of data to pass to the main template
		$data = array(
				'view' => 'home/index',
				'page_title' => 'Welcome to Auto Star Asessors & Valuers',
				'menu' => $this->autostar_model->menu(),
				'msg' => array('text' => '', 'class' => '')
			);

		// Load the main template
		$this->load->view('templates/main_template', $data);
		
	}	// End: index()


}	// End: Home()


/* End of file home.php */
/* Location: ./application/controllers/home.php */