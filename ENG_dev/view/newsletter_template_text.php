<?php 
/**
 * Email Newsletter Text Partial 
 * 
 * Required by **_email_template.php to draw the text newsletter
 * 
 * $Id: _email_newsletter_text.php 5375 2013-06-19 14:36:00Z jamescollier $ 
 * 
 */
header('Content-Type: text/html; charset=UTF-8'); 
?>
Welcome to the EuroEngineerJobs Newsletter!<br><br>www.euroengineerjobs.com<br><br>

<!-- Print Text Banners -->
<?php if ($newsletter_ad_manager->get_banner_img_from_request() != "") print $newsletter_ad_manager->get_banner_alt_from_request() . "<br>" . $newsletter_ad_manager->get_banner_target_url_from_request(); //Detect if the field for the banner image was filled, and displays the banner  ?>

<?php if ($newsletter_ad_manager->get_promotion_img_from_request() != "" && $newsletter_ad_manager->get_banner_img_from_request() != "") echo "<br><br>" //Add spacing if both are set. ?>

<?php if ($newsletter_ad_manager->get_promotion_img_from_request() != "") echo $newsletter_ad_manager->get_promotion_alt_from_request() . "<br>" . $newsletter_ad_manager->get_promotion_target_url_from_request() . "<br>" . $newsletter_ad_manager->get_promotion_text_from_request(); //Detect if the field for the promotion image was filled, and displays the banner  ?>

<br><br>

<?php $newsletter_job_list_manager->print_premium_text_job_listing(); ?>

<br><br>

<?php $newsletter_job_list_manager->print_non_premium_text_job_listing(); ?>

<br><br>Jobs You May Have Missed<br><br>

<?php $count = $newsletter_job_list_manager->print_repeated_text_job_listing(MISSED_JOBS_DISPLAY_PERIOD); ?>

<br><br>

www.euroengineerjobs.com <br><br>
&copy; EuroJobsites Limited. Registered address Unit 3 Kingsmill Business Park Kingston Upon Thames London KT1 3GZ UK<br><br>
If you no longer wish to receive these emails, or you wish to update your profile, please go here: [[UNSUB_LINK_EN]].
