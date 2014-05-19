<?php 
require '_job_search_form_inc.php';

	$animated_logo_class = new Animated_Premium_Job_Logo();
	$animated_logo_class->premium_jobs_scroller_display();
?>

<div class="jobListingSection">

  	<h1>Latest Engineer Jobs in Europe</h1>

	<?php
	
		$job_list_manager->display_premium_job_list($job_arr_premium);
		

		if(!empty($job_arr_non_premium)){
			$job_list_manager->display_non_premium_job_list($job_arr_non_premium);
		}
  	?>

  	<p style="padding-left:15px">
  		See many more jobs using our <a href="job_search.php">search</a>.
  	</p>

</div>

<div id="google_remarketing" style="display:none">
    <!-- Google Code for EuroEngineerJobs -->
    <!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 1071128745;
        var google_conversion_label = "vj7SCInomgUQqcHg_gM";
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1071128745/?value=0&amp;label=vj7SCInomgUQqcHg_gM&amp;guid=ON&amp;script=0"/>
    </div>
    </noscript>
</div>