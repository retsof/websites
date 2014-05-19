<?php
/**
 * Job Display Frame Header 
 * 
 * View to non hosted job local frame (top frame)
 * 
 * $Id: job_display_frame_header.php 5689 2013-09-02 08:57:22Z jamescollier $
 */
?>

<?php require_once('_newsletter_overlay_inc.php'); ?>

<BODY style="background: url(images/non_hosted_header_background.jpg) repeat-x fixed center bottom;">

    
<div id="wrapper">
  <!-- BEGIN header -->
  <div id="header">
    <!-- begin logo -->
    <div class="logo"><a target="_top" href="/">
	    <img border="0" src="<?php echo LOGO_300 ?>" alt="<?php echo WEBSITENAME ?> Logo" title="<?php echo DEFAULT_TITLE ?>" /></a>
	   	<div style="padding-left:4px;">
	    	<a class ="removeFrame" style="color:silver" target="_top" href="<?php echo $job->get_job_url() ?>">Remove Frame</a>
	    </div>
   </div>
    <!-- end logo -->
    <div class="noMobile ad468x60">
		<?php print $banner_manager->get_random_banner_display(LEADERBOARD_BANNER_GROUP_ID, CACHE_NAME_LEADERBOARD_BANNER_DISPLAY, CACHE_TIME_LEADERBOARD_BANNER_DISPLAY); ?>
    </div>
  	<div class="break"></div>
  </div>
  <!-- END header -->
  <!-- BEGIN body -->
  <div id="main" style="padding-bottom:0px">
    <!-- begin navigation -->
    <div class="navigation">
      <ul>
        <li><a target="_top" href="/job_search.php">Job Search</a></li>
        <li><a target="_top" href="https://cv.euroengineerjobs.com">Upload CV</a></li>
        <li><a target="_top" href="/education">Education</a></li>
        <li class="recruiterTab"><a target="_top" href="/recruit">Recruiters</a></li>
      </ul>
    </div>
    <!-- end navigation -->
    <div class="noMobile navigation2">
      <ul>
        <li><a target="_top" href="/">Home</a></li>
        <li><a target="_top" href="post_job">Post Job</a></li>
		<li><a target="_top" href="advertise">Advertise</a></li>
		<li><a target="_top" href="about_us">About Us</a></li>
        <li class="nav2last"><a target="_top" href="contact_us">Contact Us</a></li>
      </ul>
    </div>
    <div class="break"></div>
    </div>
	<div id="moreJobsInFrame">
		<div id= "MoreJobsIn">	
			<ul>
				<li>More jobs in:</li>
					<?php
					foreach($related_categories_arr as $key => $val){	echo $val;	}
					?>
			</ul>
			<ul>
				<li>Share this job:</li>
				<li class="jobShareIcon"><?php echo $job_display->get_twitter_share_html($job); ?></li>
				<li class="jobShareIcon"><?php echo $job_display->get_facebook_share_html($job); ?></li>
				<li class="jobShareIcon"><?php echo $job_display->get_linked_in_share_html($job); ?></li>
				<li class="jobShareIcon"><?php echo $job_display->get_google_plus_share_html($job); ?></li>
				<li><?php echo $job_display->get_send_to_friend_link($job); ?>:</li>
				<li class="jobShareIcon"><?php echo $job_display->get_send_to_friend_html($job); ?></li>
			</ul>
		</div>
	</div>
<?php
//Call google analytics, cim etc
$banner_manager->print_page_trackers();
?>

</BODY>
</HTML>
