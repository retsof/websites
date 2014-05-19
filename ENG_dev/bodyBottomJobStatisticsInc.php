<?php

/**
 * Body Bottom Job Statistics
 * 
 * Show a custom job right column on the send job pages
 * 
 * Called by: job_statistics.php
 * 
 * Requires: $job_statistics_partial_id (will display standard footer if this isn't set)
 * 
 * $Id: bodyBottomJobStatisticsInc.php 4814 2013-01-09 16:12:47Z jamescollier $
 */ 

	//If $job_send_partial_id is not set, display the standard body bottom page and write to error log
	if(!isset($job_statistics_partial_id)){
		
		require '_bodyBottomStandardInc.php';
		Logger::getLogger()->error(basename($_SERVER['PHP_SELF'] . '.php being called with no $job_statistics_partial_id set'));
		exit;
	}
	?>
		</div> 	<!--END content div -->

		<div id="sidebar" class="noMobile">
			<div class="box">
        		<div class="c1">
          			<a href="post_job">
          				<img width="305" height="58" src="images/post_a_job.jpg" alt="Post a job on <?php echo WEBSITENAME ?>" title="Click here to post a job on <?php echo WEBSITENAME ?>!">
         			</a>
          		</div>
       		</div>
			<div class ="jobSendInfoBox">
				<?php echo Page_Partial::get_html_for_partial($job_statistics_partial_id, "job_statistics_infobox_" . $job_statistics_partial_id); ?>
			</div>
		</div>

		<div class="break"></div>
	
	</div> <!-- END body div -->

	<?php require '_footerStandardInc.php' ?>

</div> <!-- END wrapper div -->
	

	<?php $banner_manager->print_page_trackers(); //Call google analytics, cim etc ?>

	</body>
	</html>