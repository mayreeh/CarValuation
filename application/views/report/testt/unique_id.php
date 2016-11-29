<?php

Class Unique_id {
	private function getRandomString($length = 12) 
		{
    		$validCharacters = "0123456789abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ+-*#&@!?";
    		$validCharNumber = strlen($validCharacters);
    		$result = "";
    		for ($i = 0; $i < $length; $i++) 
    			{
        			$index = mt_rand(0, $validCharNumber - 1);
        			$result .= $validCharacters[$index];
    			}
 
    		return $result;
		}
	function getID()
		{
			if(isset($_COOKIE['valuation_id'])||$_COOKIE['valuation_id']!=NULL)
				{
					
				}
			else
				{
					$length=15;
					$validCharacters = "0123456789abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ+-*#&@!?";
		    		$validCharNumber = strlen($validCharacters);
		    		$result = "";
		    		for ($i = 0; $i < $length; $i++) 
		    			{
		        			$index = mt_rand(0, $validCharNumber - 1);
		        			$result .= $validCharacters[$index];
		    			}
		    		setcookie('valuation_id',$result);	
					//$_SESSION['valuation_id']= $result;//getRandomString(12);
				}
			return $_COOKIE['valuation_id'];
		}	
}
?>
