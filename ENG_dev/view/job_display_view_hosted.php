<?php
/**
 * Job Display View Hosted 
 * 
 * View to display jobs that are hosted on our system to the user.
 * 
 * $Id: job_display_view_hosted.php 5689 2013-09-02 08:57:22Z jamescollier $
 */
?>
<div id="hostedMoreJobsIn">
	<ul class="noMobile">
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

<div class="ebHostedSection">
	<?php echo $hosted_details ?>
</div>

<div id="hostedJobFooter">
	
	<?php if($display_social_media): ?>
		<p id="jobDisplaySocialMedia">
			<span>
				For the latest jobs follow <?php echo WEBSITENAME ?> on
			</span>
				<a title="Follow  <?php echo WEBSITENAME ?> on Facebook" target="_blank" href="<?php echo FACEBOOK_URL ?>"><img alt="Facebook Logo" src="images/facebook_32.png"></a>
				<a title="Follow  <?php echo WEBSITENAME ?> on Linked In" target="_blank" href="<?php echo LINKED_IN_URL ?>"><img alt="Linked In Logo" src="images/linkedin_32.png"></a>
				<a title="Follow  <?php echo WEBSITENAME ?> on Twitter" target="_blank" href="<?php echo TWITTER_URL ?>"><img alt="Twitter Logo" src="images/twitter_32.png"></a>
				<a title="Follow <?php echo WEBSITENAME ?> on Google Plus" target="_blank" href="<?php echo GOOGLE_PLUS_URL ?>"><img alt="Google Plus Logo" src="images/googleplus_32.png"></a>
		</p>
	<?php endif; ?>
	
</div>
<div class="floatclear"></div>
