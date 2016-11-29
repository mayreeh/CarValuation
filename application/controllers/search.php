<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller
{


	// constructor
	public function __construct()
	{

		// Run parent controller
		parent::__construct();

		// Load the required models
		$ci =& get_instance();
		$ci->load->model(array('auth_model','autostar_model','search_model'));

		// Check if user is logged in
		$this->auth_model->is_logged_in();

	}	// End: __construct()


	// Default method for the Search controller
	public function index()
	{
		if (isset($_POST['search_from']) &&  isset($_POST['search_from'])) {
				$data = array(
						'search_term' => isset($_POST['search_from']), isset($_POST['search_to']),
						'search_results' => $this->search_model->find_date($this->input->post('search_from', TRUE),$this->input->post('search_to', TRUE)),
						'view' => 'search/index',
						'menu' => $this->autostar_model->menu(),
						'msg' => array('text' => '', 'class' => '')
					);
			} else {
				// Create array of data to pass to the main template
				$data = array(
						'search_term' => ((isset($_GET['q'])) ? trim($_GET['q']) : ''),
						'search_results' => $this->search_model->find($this->input->get('q', TRUE)),
						'view' => 'search/index',
						'menu' => $this->autostar_model->menu(),
						'msg' => array('text' => '', 'class' => '')
					);
			}

		// Load the main template
		$this->load->view('templates/main_template', $data);

	}	// End: index()



}	// End: Search()


/* End of file search.php */
/* Location: ./application/controllers/search.php */
