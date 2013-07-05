<?php

     /*
     ###############################################
     ####                                       ####
     ####    Author : Harish Chauhan            ####
     ####    Date   : 05 Oct,2004               ####
     ####    Updated:                           ####
     ####                                       ####
     ###############################################

     */
	
	class COUNTER
	{
		var $page_name;
		
		function COUNTER($page="")
		{
			$this->set_page_name();
		}
		function set_page_name($page_name="")
		{
			if(trim($page_name)=="")
				$this->page_name=basename($_SERVER['PHP_SELF']);
			else
				$this->page_name=$page_name;
		}
		function get_counter()
		{
			if(!file_exists("counter.har"))
				fopen("counter.har","w");
			$counter_arr=array();
			$counter_arr= unserialize(file_get_contents("counter.har")); 
			$counter=$counter_arr[$this->page_name];
			$counter++;
			$counter_arr[$this->page_name]=$counter;
			$fp=fopen("counter.har","w");
			fwrite($fp,serialize($counter_arr));
			fclose($fp);
			return $counter;
		}
		function reset_counter()
		{
			if(!file_exists("counter.har"))
				fopen("counter.har","w");
			$counter_arr=array();
			$counter_arr= unserialize(file_get_contents("counter.har")); 
			$counter=$counter_arr[$this->page_name];
			$counter=0;
			$counter_arr[$this->page_name]=$counter;
			$fp=fopen("counter.har","w");
			fwrite($fp,serialize($counter_arr));
			fclose($fp);
			return $counter;
		}
	}
	
	/*/////////////
	* Example 
	* 
	  $page_counter=new COUNTER();  ///Initialize the counter
	  //$page_counter->reset_counter();///reset the counter 
	  echo $page_counter->get_counter(); //display the counter
	* 
	* /////////////
	*/
?>