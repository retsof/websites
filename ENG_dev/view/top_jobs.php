<?php
/**
 * Top Jobs  
 * 
 * View to display ony high visibility jobs. Linked to from the rotating top jobs box on homepage.  
 * 
 * $Id: top_jobs.php 5723 2013-09-18 09:17:30Z jamescollier $
 */
?>
<div class="jobListingSection">
  	<h1>Top Jobs</h1>

	<?php $job_list_manager->display_job_list( $job_arr ); ?>

	<p class = "small">
		<a style="color:grey" href="/post_job/high_visibility">
			Want your job here?
		</a>
	</p>
	<p>
		See many more jobs using our <a href="job_search">job search.</a>
	</p>

</div>
