<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_Model extends CI_Model 
{
	
	/**
	 * Constructor
	 */
	public function __construct()
	{

		// Load the parent constructor
		parent::__construct();

	}	// End: __construct()


	/**
	 * Method to get the list of clients in the database
	 */
	public function listing()
	{

		// Method to get a list of all the clients in the database
		$this->db->order_by('name', 'asc');
		$result = $this->db->get_where('users', array('is_admin' => 'NO', 'user_type' => 'COMPANY'));

		// Return the array
		return $result;

	}	// End: listing()

	public function type($type)
	{
		return $this->db->get_where('clients', array('type' => $type));
	}
	
	public function add($data)
	{
		$this->db->get_where('clients',array('name'=>$data['name'],'type'=>$data['type']));
		$this->db->insert('clients',$data);	
	}


}	// END: Client_model