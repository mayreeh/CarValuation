<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_Model extends CI_Model 
{


	// Constructor
	public function __construct() 
	{

		// Run parent controller
		parent::__construct();

	}	// End: __construct()


	// Method to clear the cache so as to kill any hanging sessions
    public function clear_cache()
    {

    	// Run the code to completely clear the cache
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        
    }	// End: clear_cache()


    // Method to load menu
    public function menu($current_menu=NULL)
    {
    	// Generate menu
    	$html = '<ul class="menu">';

    	// Home page
    	$html .= '<li><a href="'.base_url().'home"><i class="icon-search"></i> Search</a></li>';

    	// Valuations Page
    	if ($this->session->userdata('admin') == 'YES')
    	{
    		$html .= '<li><a href="'.base_url().'report"><i class="icon-file"></i> Create Valuation Report</a></li>';
    	}

    	// Profile
    	$html .= '<li><a href="#"><span class="icon" data-icon="R"></span><i class="icon-user"></i> '.strtoupper($this->session->userdata('username')).'</a>
					<ul>
					<li><a href="'.base_url().'profile"><span class="icon" data-icon="G"></span><i class="icon-edit"></i> Edit Profile</a></li>
					<li><a href="'.base_url().'logout"><span class="icon" data-icon="A"></span><i class="icon-off"></i> Logout</a></li>
					</ul>
				</li>';

		// Wrap it up
		$html .= '</ul>';

    	// Return the menu
    	return $html;

    }	// End: menu()


    // Method to nicely print out an array
    public function debug_array($arr, $return_string=NULL)
    {
        if ($return_string == 'YES')
        {
            // Create a string of the array
            $str = '';
            foreach ($arr as $key => $value) {
                $str .= strtoupper($key) . ': ' . $value . '; ';
            }
            // Remove the last two characters
            $length_of_str = strlen($str);
            $str = substr($str, 0, ($length_of_str-2));
            // Return the string
            return $str;
        }
        else
        {
            echo '<pre>';
            print_r($arr);
            echo '</pre>';
        }
    }   // End: print_array()


}	// End: Base_model