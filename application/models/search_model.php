<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_Model extends CI_Controller
{

	// constructor
	public function __construct()
	{

		// Run parent controller
		parent::__construct();

	}	// End: __construct()

	// Method to carry out the actual search
	public function find($search_term)
	{

		// Prepare the query
		if (trim($search_term) == '' || trim($search_term) == '%')
		{

			// Nothing posted ... return FALSE
			$search_term ='all';

		}


			// A search term was posted
			//$sanitized_search_term = preg_replace("/[^a-zA-Z0-9]+/", "", $search_term);



			if ($this->session->userdata('admin') != 'YES')
				{

					switch ($this->session->userdata('user_type'))
						{
							case 'private':

								if($search_term!='all')
									{
										$this->db->where('private_valuers_name ',$this->session->userdata('user_id'))->like('reg_number', $search_term);
									}
								else
									{
										$this->db->where('private_valuers_name ',$this->session->userdata('user_id'));
									}
								break;

							case 'bank':

								if($search_term!='all')
									{
										$this->db->where('bank_name ',$this->session->userdata('user_id'))->like('reg_number', $search_term);
									}
								else
									{
										$this->db->where('bank_name', $this->session->userdata('user_id'));
									}
								break;

							case 'insurance':

								if($search_term!='all')
									{
										$this->db->where('insurance_name ',$this->session->userdata('user_id'))->like('reg_number', $search_term);
									}
								else
									{
										$this->db->where('insurance_name ',$this->session->userdata('user_id'));
									}
								break;
						}
				}
			else
				{
					if($search_term!='all')
						{
							$this->db->like('reg_number', $search_term);
							$this->db->or_like('policy_number', $search_term);
							$this->db->or_like('insurance_agency', $search_term);
							$this->db->or_like('insurance_name', $search_term);
							$this->db->or_like('bank_name', $search_term);
						}
				}

			$result = $this->db->get('reports');
			return $result;

	}	// End: find()

	public function find_date($date_from,$date_to)
	{
		$date_from = date("d-m-Y", strtotime($date_from));
		$date_to = date("d-m-Y", strtotime($date_to));
		$date_from = strtotime($date_from);
		$date_to = strtotime($date_to);

		// Prepare the query
		if (trim($date_from) == '' || trim($date_to) == '')
		{
			// Nothing posted ... return FALSE
			$search_term ='all';
		} else {
			$search_term = '';
		}

					if ($this->session->userdata('admin') != 'YES')
						{

							switch ($this->session->userdata('user_type'))
								{
									case 'private':

										if($search_term!='all')
											{
												$this->db->where('private_valuers_name ',$this->session->userdata('user_id'));
												$this->db->where('date_submitted  >=', $date_from);
												$this->db->where('date_submitted  <=', $date_to);
											}
										else
											{
												$this->db->where('private_valuers_name ',$this->session->userdata('user_id'));
											}
										break;

									case 'bank':

										if($search_term!='all')
											{
												$this->db->where('bank_name ',$this->session->userdata('user_id'));
												$this->db->where('date_submitted  >=', $date_from);
												$this->db->where('date_submitted  <=', $date_to);
											}
										else
											{
												$this->db->where('bank_name', $this->session->userdata('user_id'));
											}
										break;

									case 'insurance':

										if($search_term!='all')
											{
												$this->db->where('insurance_name ',$this->session->userdata('user_id'));
												$this->db->where('date_submitted  >=', $date_from);
												$this->db->where('date_submitted  <=', $date_to);
											}
										else
											{
												$this->db->where('insurance_name ',$this->session->userdata('user_id'));
											}
										break;
								}
						}
					else
						{
							if($search_term!='all')
								{
									$this->db->where('date_submitted  >=', $date_from);
									$this->db->where('date_submitted  <=', $date_to);
									}
						}

					$result = $this->db->get('reports');
					return $result;

	}

	// Method to carry out the actual search
	public function clientReport()
	{

		// A search term was posted
			//$sanitized_search_term = preg_replace("/[^a-zA-Z0-9]+/", "", $search_term);
			$this->db->like('reg_number', $search_term);
			if ($this->session->userdata('admin') != 'YES')
				{
					$this->db->where('bank_name', $this->session->userdata('user_id'));
					$this->db->or_where('insurance_name ',$this->session->userdata('user_id'));
					$this->db->or_where('private_valuers_name ',$this->session->userdata('user_id'));
				}
			$result = $this->db->get('reports');
			return $result;

			// Checking if anything was searched for

	}	// End: find()


}	// End: Search_Model
