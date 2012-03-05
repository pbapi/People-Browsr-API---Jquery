<?php
	
	//include the library for this particular peoplebrowsr API
	include_once('Kred.php');
	
	//create an instance of the API library using the user level application id, and application key.
	//this is necessary in order to prevent public exposure of authentication information
	$PBObject = new Kred('[APP ID]','[APP KEY]');
	
	//cycle through the submitted parameter, and as long as the parameter is not named 'method' load them into the request object
	$params = array();
	foreach($_POST as $k => $v){
		if($k != 'method'){
			$params[$k] = $v;
		}
	}		
	
	//echo back the response from the request.  the method named parameter designates which API method to invoke
	echo $PBObject->execute($_POST['method'], $params);
?>