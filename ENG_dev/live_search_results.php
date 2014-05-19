<?php

/**
* Used to deliver results to the live search select box via livesearch.js
*/
//$Id:live_search_results.php 711 2009-06-10 14:31:55Z jamescollier $

require("eb_include/common.php");
$live_search_input=Request::get_instance()->get_safe_param("p_live_search_input");

$location = false;

if(Request::get_instance()->get_safe_param("location")){
	$location=true;
}

//Check $live_search_input is not empty before calling Live_Search::get_live_search_results
if(!empty($live_search_input)) echo Live_Search::get_live_search_results($live_search_input, $location);
?>
