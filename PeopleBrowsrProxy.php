<?php
	include_once('PeopleBrowsr.php');
	
	//this code simply instanciates the peoplebrowsr API connection with a hard coded application id and application key
	$PBObject = new PeopleBrowsr('[APP ID]','[APP KEY]');
	
	//accept the needed paramaters and format them into a usable string
	$params = array();
	foreach($_POST as $k => $v){
		if($k != 'method'){
			$params[$k] = $v;
		}
	}		
	
	//execute and return the information
	echo $PBObject->execute($_POST['method'], $params);
?>