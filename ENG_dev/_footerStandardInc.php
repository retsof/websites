<?php
/**
 * 
 * Standard (not mobile) footer HTML. 
 * 
 * Require by:
 * _bodyBottomStandardInc.php
 * bodyBottomSendJobInc.php
 * 
 * $Id: _footerStandardInc.php 6422 2014-01-22 17:02:37Z maxrobson $ 
 */
?>
<div id="sitemapFooter">
	<div class="footerbox noMobile">
		<h3>Jobseekers</h3>
		<a href="/" 						title = "Latest Live Research or Post-Doctoral Science Jobs">Home</a><br>
		<a href="job_search"                title = "Search for Jobs">Job Search</a><br>
		<a href="newsletter"                title = "Subscribe to our European Science Jobs Newsletter">Newsletter - Subscribe</a><br>
		<a href="education" 			    title = "Education & Courses">Education & Courses</a><br>
		<a href="career_guide" 			    title = "Career Guides">Career Guides</a><br>
		<a href="privacy_policy" 		    title = "Privacy Policy">Privacy Policy</a><br>
		<a href="http://www.eurojobsites.com"		target="_blank" title = "Eurojobsites - specialist recruitment in the EU and Europe">EuroJobsites</a><br>
		<a href="http://www.brusselsjobs.com" 		target="_blank" title = "Business, Secretarial, IT, Office Jobs in Brussels">Brussels Jobs</a><br>
		<a href="http://www.brusselslegal.com" 		target="_blank" title = "Information about Legal Affairs in Brussels">Brussels Legal</a><br>
		<a href="http://www.eurobrussels.com" 		target="_blank" title = "EU and International Policy and Political Jobs">European Political Jobs</a><br>
		<a href="http://www.eurosciencejobs.com"	target="_blank" title = "Research Science Jobs or Postdocs in Europe">Science Jobs in Europe</a><br>						

		<div class="shareContainer">
		Follow <?php echo WEBSITENAME ?> on<br>
			<a title="Follow <?php echo WEBSITENAME ?> on Facebook" target="_blank" href="<?php echo FACEBOOK_URL ?>"><img alt="Facebook Logo" src="images/facebook_32.png"></a>
			<a title="Follow <?php echo WEBSITENAME ?> on Linked In" target="_blank" href="<?php echo LINKED_IN_URL ?>"><img alt="Linked In Logo" src="images/linkedin_32.png"></a>
			<a title="Follow <?php echo WEBSITENAME ?> on Twitter" target="_blank" href="<?php echo TWITTER_URL ?>"><img alt="Twitter Logo" src="images/twitter_32.png"></a>
			<a title="Follow <?php echo WEBSITENAME ?> on Google Plus" target="_blank" href="<?php echo GOOGLE_PLUS_URL ?>"><img alt="Google Plus Logo" src="images/googleplus_32.png"></a>
		</div>
		<br>
		<?php if (DEBUG) {
			print "<p class='warning'>Debug Mode</p>";
		} ?>
			</div>
			<div class="footerbox noMobile">
				<h3>Recruit/Advertise</h3>

				<a href="post_job"      title="Post a Job" >Post a Job</a><br>
				<a href="recruit"       title="Recruitment">Recruitment</a><br>
				<a href="advertise"     title="Advertise">Advertise</a><br>
				<a href="testimonials"  title="Testimonials">Testimonials</a><br>
				<a href="about_us"      title="About Us">About Us</a><br>
			</div>
			<div class="footerbox noMobile">
				<h3>Jobs by Location</h3>
                <?php foreach($job_count->get_sorted_country_link_html_with_job_count_array(17) as $count_link_html): echo $count_link_html . "<br>"; endforeach;  ?>
	</div>
	<div class="footerbox">
		<h3>Jobs by Type</h3>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_AEROSPACE); //Aerospace ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_AUTOMOTIVE); //Automotive ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_BIOMED_ENG); //Biomed ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_CHEM_ENG); //Chem Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_CIVIL_ENG); //Civil Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_COMP_ENG); //Comp Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_ENVIRO_ENG); //Env Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_ELEC_ENG); //Env Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_ELECTRONIC_ENG); //Elec Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_GEOTECH_ENG); //Geo Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_INDUSTRIAL_ENG); //Indus Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_MARINE_ENG); //Marine Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_MATERIAL_ENG); //Mat Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_MECHANICAL_ENG); //Mech Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_MINING_OIL_GAS); //Mining Oil and Gas Eng ?><br>	
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_NUCLEAR); //Nuclear ?><br>																					
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_POWER_ENG); //Pwr Eng ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_SALES_AND_MARKETING); //Sales and Marketing ?><br>																					
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_TELECOM_ENG); //Telecom Eng  ?><br>
	</div>
		<div class="footerbox noMobile">
		<h3>Jobs by Experience</h3>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_EXPERIENCE_STARTER); //Starter ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_EXPERIENCE_MIDDLE); //Medium ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_EXPERIENCE_SENIOR); //Expert  ?><br>
		<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_MANAGER_EXECUTIVE); //Mngr Exec  ?><br>
	</div>
	<p id="mobileFooterLinks" class="mobileOnly">
		<a href="newsletter">Newsletter</a> | 
		<a href="recruit">Recruit</a> | 
		<a href="advertise">Advertise</a> | 
		<a href="contact_us">Contact Us</a>
		<br />
	</p>
	<p class="footerCopyright">&copy; <?php echo date('Y'); ?> <a href="http://www.eurojobsites.com" target="_blank">EuroJobsites Ltd</a></p>
</div>

