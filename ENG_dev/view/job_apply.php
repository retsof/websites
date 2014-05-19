<?php

/**
 * Displays hosted or non-hosted jobs
 *
 * $Id: job_apply.php 5632 2013-08-22 09:36:32Z jamescollier $
 */

require("eb_include/common.php");

//retrieve job id from url
$job_id= Request::get_instance()->get_safe_param("job_id");

//new job display object
$job = new Job();

if( $job_id=="" 									//No Job ID Supplied
|| !$job->populate_from_database($job_id)			//Error from job class
|| $job->is_expired() === true )					//Job has expired
{
	require('job_display_view_expired_inc.php');
	return;
}

//Record impression
Impression_Manager::get_instance()->record_impression(JOB_APPLY_IMPRESSION_ID, $job_id);

//Constructs job_title to be used in headers.
$job_title = WEBSITENAME." - ". $job->get_job_desc()." - ". $job->get_org_name(). ", " . $job->get_location();
//Use job title for the desc.
$job_meta_desc = $job->get_job_desc()." Job, " . $job->get_org_name() . ", " . $job->get_location() .  ", " . Country::get_country_description_from_id($job->get_country()) . ". " . JOB_DISPLAY_PAGE_DESC_CONTINUATION;
//Create keywords string. Note: Removing spaces around commas.
$job_meta_keywords = str_replace(array(", ", " ,"), "," , $job->get_job_desc() .",". $job->get_org_name() . "," . $job->get_location() . ", " . Country::get_country_description_from_id($job->get_country()));

$job_url = $job->get_job_url();

//Check if the job has a URL associated with it.
if($job_url != ""){

	$encoded_job_url = urlencode($job_url);
	//If none of the above, include job_display_view_non_hosted_inc.php which displays the external job in a frame
	require('job_display_view_non_hosted_inc.php');

}else{
	Logger::getLogger()->error("Job id=".$job_id." being requested in 'job apply' is a hosted only job, with no associated job URL.");
	echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=".DOMAIN_URL."\">";
}

?>