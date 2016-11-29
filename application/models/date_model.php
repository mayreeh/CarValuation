<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Date_Model extends CI_Model 
{


	// Constructor
	public function __construct()
	{
		
		// Call parent constructor
		parent::__construct();

	}	// End: constructor


	/**
	 * Method to convert date to timestamp
	 * This method receives a textual date and then uses the strtotime() PHP 
	 * function to generate a date that the system can understand based on its settings
	 * This is then created into a timestamp using the mktime() PHP function after all
	 * the preparations of day, month and year variables has been done
	 */
	public function to_timestamp($textual_date)
	{
		
		// Get the submitted date
		$php_date = strtotime($textual_date);

		// First, extract the day, month and year values
		$day = date('j', $php_date);
		$month = date('n', $php_date);
		$year = date('Y', $php_date);

		// Create the timestamp using mktime()
		$timestamp_date = mktime(0,0,0,$month,$day,$year);

		// Return the timestamp
		return $timestamp_date;

	}	// End: to_timestamp()


	/*
	* Method to return textual date if given a timestamp
	* The format of dates given by jQuery's 'datepicker()' is '18 February, 2014'
	* So this method has to return the date in that format by using
	* the "date('j F, Y', $timestamp_date)" function
	*/
	public function to_textual_date($timestamp_date)
	{
		
		// Check if anything was put in the database
		if ($timestamp_date == 0 || $timestamp_date == '')
		{
			// Nothing selected / saved to the database; return nothing
			$textual_date = '';
		}
		else
		{
			// Immediately change the date
			$textual_date = date('j F, Y', $timestamp_date);
		}

		// Return the textual date
		return $textual_date;

	}	// End: to_textual_date()


	/**
	 * Method to return a date that is being edited in the format that is required
	 * by the jQuery datepicker() 
	 * This method checks for NULL fields and returns nothing
	 * If it finds a date i.e. timestamp, it sends it to the "to_textual_date" function
	 * within this class and then returns it to the calling statement
	 */
	public function editable_date($date_from_db)
	{
		
		// Check if the date from the db is empty
		if (trim($date_from_db) == '' || trim($date_from_db) == 0) {
			// Return nothing
			return '';
		}
		else
		{
			// Something was found
			$friendly_date = $this->to_textual_date($date_from_db);
			return $friendly_date;
		}

	}	// End: editable_date()


}	// End Class: Date_Model