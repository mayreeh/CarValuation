<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Model 
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
	public function all()
	{
		return $this->db->get('clients');
	}
	public function type($type)
	{
		return $this->db->get_where('clients', array('type' => $type));
	}
	
	public function add($data)
	{
		$this->db->get_where('clients',array('name'=>$data['name'],'type'=>$data['type']));
		$this->db->insert('clients',$data);	
	}
	// public function add($name,$type)
	// {
	// 	$data=array('name'=>$name,'type'=>$type);
	// 	$this->db->insert('clients',$data);	
	// }


	 	


}	// END: Client_model