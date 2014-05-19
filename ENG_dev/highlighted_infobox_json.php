<?php

/**
 * Highlighted Infobox JSON
 *
 * Used to print a json string representing our highlighted jobs. To be
 * used with our highlighted jobs infobox.
 */

//$Id: highlighted_infobox_json.php 4156 2012-07-04 09:45:57Z jamescollier $
require("eb_include/common.php");

//Check that a POST request has been made (not loaded via a browser directly), and check if is being loaded via the local host for testing.
if($_SERVER['REQUEST_METHOD'] != 'POST' && !in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))){

	//Check request protocol, just in case.
	if($_SERVER['SERVER_PROTOCOL'] = 1.1){
		header($_SERVER["SERVER_PROTOCOL"]." 410 Gone");
	}else{
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	}

	echo "We're sorry, there has been a problem with accessing the selected resource. Back to <a href='". DOMAIN_URL . "'>" . DOMAIN_NAME . "</a>.";
	return;
}

//Print the json text to the screen.
if(Job_Search_Json_Wrapper::get_highlighted_json()){
	print Job_Search_Json_Wrapper::get_highlighted_json();
}

?>
