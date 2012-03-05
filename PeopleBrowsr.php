<?php
/*
Date: 18 February 2012
Description:provides an easy to use interface for communicating with the peoplebrowsr API system.

peoplebrowsr API method parameters in addtion to app_id and app_key
	source*
	term*
	first**
	last**
	count**
	period (Day, Hour)
	limit
	number
	reverse
	
*denotes required parameters
**denotes requires precisely two of these parameters passed in
*/

	class PeopleBrowsr{
		
		private $data = Array();
		
		public function __construct($app_id, $app_key){
			//instanciation of this class will require the 
			$this->data['app_id'] = $app_id;
			$this->data['app_key'] = $app_key;
			$this->data['url'] = 'http://api.peoplebrowsr.com';
		}
		public function execute($method,$parameters){
			//this function will accept an array of paramters making it consistent with other functions of this class.
			//required paramters are term and source.  these terms should be the indexes of the array passed in.
			
			$URL = $this->data['url'].'/'.$method.'?';
			
			$QueryString = "app_id=" . $this->data['app_id'];
			$QueryString .= "&app_key=" . $this->data['app_key'];
			
			foreach($parameters as $k => $v){
				$QueryString .= '&'.$k.'='.urlencode($v);
			}
			
			$URL .= $QueryString;
			  
			$curl_handle = curl_init();
			curl_setopt($curl_handle, CURLOPT_URL, $URL);
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			 
			$response = curl_exec($curl_handle);
			curl_close($curl_handle);
			  
			return $response; 	
		}
}
?>