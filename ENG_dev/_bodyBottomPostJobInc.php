<?php

/**
 * Body Bottom - Send Job
 * 
 * Show a custom job right column on the send job page
 * 
 * Called by: send_job.php, send_basic_job.php, send_standard_job.php, send_highvis_job.php
 * 
 * Requires: 
 * 
 * $Id: _bodyBottomPostJobInc.php 6422 2014-01-22 17:02:37Z maxrobson $
 */ 

	//If $job_send_partial_id is not set, display the standard body bottom page
	//
	if(!isset($job_send_partial_id)) require '_bodyBottomStandardInc.php'; 
	?>

		</div> 	<!--END content div -->

		<div id="sidebar" class="noMobile">
			<div class ="jobSendInfoBox">
				<?php echo Page_Partial::get_html_for_partial($job_send_partial_id, "send_job_infobox_" . $job_send_partial_id); ?>
			</div>
		</div>

		<div class="break"></div>
	
	</div> <!-- END body div -->

	<?php require '_footerStandardInc.php' ?>

</div> <!-- END wrapper div -->
	

	<?php $banner_manager->print_page_trackers(); //Call google analytics, cim etc ?>

	</body>
	</html>