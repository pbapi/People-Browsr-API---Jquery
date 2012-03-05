<?php
//Date: 18 February 2012
//Description:provides an easy to use interface for communicating with the peoplebrowsr API system.

	class Kred{
		
		private $data = Array();
		
		public function __construct($app_id, $app_key){
			//instanciation of this class will require the application id and the application key to be passed in
			$this->data['app_id'] = $app_id;
			$this->data['app_key'] = $app_key;
			$this->data['url'] = 'http://api.kred.ly';
		}
		
		public function execute($method,$parameters){
			//the method parameter of this function relates to the API method to be invoked. 
			//A complete list of available methods and associated parameters can be found at: https://developer.peoplebrowsr.com/kred.
			//this function will accept an array of paramters making it consistent with other functions of this class.
			//required paramters are term and source.  these terms should be the indexes of the array passed in.
			
			/*
			as of the date of publication of this library, the kred API includes methods of kredscore and kred
			kred method parameters in addtion to app_id and app_key
				source*
				term*
				
			kredscore method parameters in addtion to app_id and app_key				
				source*
				term*
				
			*denotes required parameters
			*/
			
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