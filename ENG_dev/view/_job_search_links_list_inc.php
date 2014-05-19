<?php
/**
 * Job Search Links List Inc
 *
 * Quick click links included on job search page.
 *
 * Called by: job_search.php
 *
 * $Id: _job_search_links_list_inc.php 6422 2014-01-22 17:02:37Z maxrobson $
 * 
 */
?>
<center>
	<table class="jobSearchLinkListTable noMobile">
	<tr>
		<td>
				<h3>Jobs by Location</h3>
                <?php foreach($job_count->get_sorted_country_link_html_with_job_count_array(17) as $count_link_html): echo $count_link_html . "<br>"; endforeach;  ?>
		</td>
		<td>
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
				<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_TELECOM_ENG); //Telecom Eng ?><br>
		</td>
		<td>
				<h3>Jobs by Experience</h3>
				<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_EXPERIENCE_STARTER); //Starter ?><br>
				<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_EXPERIENCE_MIDDLE); //Medium ?><br>
				<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_EXPERIENCE_SENIOR); //Expert ?><br>
				<?php echo $job_count->get_category_link_html_with_job_count(CATEGORY_MANAGER_EXECUTIVE); //Mngr Exec ?><br>
		</td>
	</tr>
</table>
</center>
