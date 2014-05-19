<?php
/**
 * Email Newsletter HTML Partial 
 * 
 * Required by **_email_template.php to draw the HTML newsletter
 * 
 * $Id: _email_newsletter_html.php 5375 2013-06-19 14:36:00Z jamescollier $ 
 */
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
		<style type="text/css">
			@media only screen and (max-device-width: 480px) {
                    img {max-width:400px}
					table {max-width: 400px;}
					table.job {max-width: 390px;}
			}
          </style>
	</head>
	<body style="background-color:#E1E9F2">	
		<table  border="0" cellspacing="3" cellpadding="0" style="background-color:#E1E9F2; padding: 0 0 0 0; border: 0px; margin: 0 0 20px 0; font-family: Arial; color: #000000; " width="600">
			<tr>
				<td>
		
					<p>
						<a href="<?php print DOMAIN_URL; ?>">
							<img style="border:1px solid silver" src="<?php print CDN_URL . "/" . LOGO_300; ?>" border="0" alt="<?php print WEBSITENAME; ?>">
						</a>
					</p>
					
					<p style="font-size: 13px; font-family: Arial; color: #000000; ">
					  Welcome to the <?php print WEBSITENAME; ?> Newsletter!
					</p>

					<!---- Banner or text advert to go below ---------------------->

					<?php if ($newsletter_ad_manager->get_banner_img_from_request() != ""): ?>
						<p>
							<a href="<?php echo $newsletter_ad_manager->get_banner_target_url_from_request() ?>">
								<img style='border:solid 1px silver' src="<?php echo $newsletter_ad_manager->get_banner_img_from_request() ?>" border="0" alt="<?php echo $newsletter_ad_manager->get_banner_alt_from_request() ?>">
							</a>
						</p>
					<?php endif; ?>

					<?php if ($newsletter_ad_manager->get_promotion_img_from_request() != ""): ?>
						<table style='width: 590px; border: 1px solid gray; padding: 2px;'>
							<tr>
								<td style="width:140px;text-align:center;">
									<a style='display: block;' target='_blank' href='<?php echo $newsletter_ad_manager->get_promotion_target_url_from_request() ?>'>
										<img style='border: 0;' alt='<?php echo $newsletter_ad_manager->get_promotion_alt_from_request() ?>' src='<?php echo $newsletter_ad_manager->get_promotion_img_from_request() ?>'>
									</a>
								</td>
								<td style="font-size: 11px; font-family: Verdana;">
									<a 
										target='_blank' 
										style="font-size: 13px; font-family: Arial; font-weight: bold; color: #000099;"
										href='<?php echo $newsletter_ad_manager->get_promotion_target_url_from_request() ?>'
									>
										<?php echo $newsletter_ad_manager->get_promotion_title_from_request() ?>
									</a>
									<br>
									<?php echo $newsletter_ad_manager->get_promotion_text_from_request() ?>
								</td>
							</tr>
						</table>
					<?php endif; ?>
							
					<p style="font-size: 13px; font-family: Arial; color: #000000; ">
					   <a href="<?php print DOMAIN_URL; ?>/job_search.php" style="color: #000099;">Search for Jobs</a> &nbsp;&nbsp;
					   <a href="<?php print DOMAIN_URL; ?>/education.php" style="color: #000099;">Education and Courses</a>  &nbsp;&nbsp;
					   <a href="https://cv.euroengineerjobs.com" style="color: #000099;">Register Your CV</a>  &nbsp;&nbsp;
					   <a href="<?php print DOMAIN_URL; ?>/send_job.php" style="color: #000099;">Send us a Job</a>
					</p>
					<p style="font-size: 13px; font-family: Arial; color: #000000; ">
					   Click on the links below to go directly to the jobs listed - or go to
					   <a href="<?php print DOMAIN_URL; ?>" style="color: #000099;">EuroEngineerJobs Latest Jobs</a>
					</p>

					<hr>
					
					<?php 
					
					//Logo ads
					$newsletter_job_list_manager->print_premium_job_listing(); 
					
					//Basic ads
					$newsletter_job_list_manager->print_non_premium_job_listing(); 
		
					?>

					<h1 style="<?php print HTML_JOB_LINK_H1_STYLE; ?>" >Jobs You May Have Missed</h1>
					<?php 
						$newsletter_job_list_manager->print_repeated_job_listing(MISSED_JOBS_DISPLAY_PERIOD); 
				
					?>
					
					<p style='font: 13px Arial; color: #000000;'>
						<a href="<?php print DOMAIN_URL; ?>" style="color: #000099;">www.euroengineerjobs.com</a>
					</p>
		
					<p style='font: 13px Arial; color: #000000;'>
						<a href="<?php print DOMAIN_URL; ?>/job_search.php" style="color: #000099;">Search for Jobs</a> &nbsp;&nbsp;
						<a href="<?php print DOMAIN_URL; ?>/education.php" style="color: #000099;">Education and Courses</a>  &nbsp;&nbsp;
						<a href="https://cv.euroengineerjobs.com" style="color: #000099;">Register Your CV</a>  &nbsp;&nbsp;
						<a href="<?php print DOMAIN_URL; ?>/send_job.php" style="color: #000099;">Send us a Job</a>
					</p>
		
					<p style='font: 13px Arial; color: #000000;'>
						You can stop receiving this newsletter at any time by clicking <a style="color: #000099;" href="[[UNSUB_LINK_EN]]">unsubscribe me</a>.
						Did someone forward this to you? You can
						<a style="color: #000099;" href="http://www.euroengineerjobs.com/newsletter.php">subscribe yourself here.</a>
					</p>
		
					<p style="font: 11px Arial;">
						&copy; EuroJobsites Limited. Registered address Unit 3 Kingsmill Business Park Kingston Upon Thames London KT1 3GZ UK
					</p>
			
				</td>
			</tr>
		</table>
	</body>
</html>
