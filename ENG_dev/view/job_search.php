<?php
/**
 * Job Search 
 * 
 * View to display search page. Always displays 'quick links', and results if available. 
 * Also displays search texts/promotions. 
 * 
 * $Id: job_search.php 5723 2013-09-18 09:17:30Z jamescollier $
 */
?>

<?php if($job_search_controller_helper->is_advanced_search()): ?>
	<?php  require '_job_search_multi_form_inc.php'; //Include form partial/display ?>
<?php else: ?>
	 <?php require '_job_search_form_inc.php'; //Include form partial/display ?>
<?php endif; ?>

<?php if(empty($search_term_arr) && !$err_msg): //Check if job search is being loaded for the first time. ?>
	
	
	<div class='ebSection'>
	
	  	<?php if($job_search_controller_helper->is_text_search()): ?>
			<p>Type a keyword or job title in the keyword box above (and a country if you wish) then click the Search button, <br> or you can click a category link below.</p>
		<?php else: ?>
			<p>Select the category or country and then click the Search button,<br>or you can click a category link below.</p>			
		<?php endif; ?>
	  	<?php require '_job_search_links_list_inc.php'; ?>
	</div>

	<?php require("bodyBottomInc.php"); ?>
	
	<?php exit; ?>
	
<?php endif; ?>
       	
<div style='clear:both' class='jobListingSection'>

	<h1><?php echo $job_search_view_helper->get_descriptive_display() ?></h1>
	
	<?php if($pre_search_results_msg): //If there's a pre search result msg, then display it. ?>
		<p class='searchMessage'><?php echo $pre_search_results_msg ?></p>
		<div class='jobLinkPremiumDivider'>&nbsp;</div>
	<?php endif; ?>
	
	<?php if($err_msg != ""): //If there's an error msg, then display it. ?>
		<p class='warning'> <?php echo $err_msg ?></p>
	<?php endif; ?>
	
	<?php $job_list_manager->display_job_list($job_arr); ?>

	    <?php if((isset($category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_LOCATION]) && isset($category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_CATEGORY])) && empty($job_arr)): //If no jobs, but partial category matches have been found  ?>
            <p> 
                See <a href="/jobs/<?php echo Search_Descriptive_Manager::get_instance()->get_search_descriptive_by_id(SEARCH_DESCRIPTIVE_TYPE_CATEGORY, $category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_CATEGORY])->get_url_ending() ?>">more jobs in <?php echo Search_Descriptive_Manager::get_instance()->get_search_descriptive_by_id(SEARCH_DESCRIPTIVE_TYPE_CATEGORY, $category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_CATEGORY])->get_description() ?> (<?php echo $job_count->get_live_job_count_array_by_category($category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_CATEGORY]) ?>)</a> 
                and <a href="/jobs/<?php echo Search_Descriptive_Manager::get_instance()->get_search_descriptive_by_id(SEARCH_DESCRIPTIVE_TYPE_LOCATION, $category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_LOCATION])->get_url_ending() ?>">more jobs in <?php echo Search_Descriptive_Manager::get_instance()->get_search_descriptive_by_id(SEARCH_DESCRIPTIVE_TYPE_LOCATION, $category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_LOCATION])->get_description() ?> (<?php echo $job_count->get_live_job_count_array_by_country($category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_LOCATION]) ?>)</a>.
            </p>	
        <?php endif; ?>	

        
		
		<?php if(empty($job_arr)): ?>
			<p class='jobSearchMessage'>No jobs found for this search.</p>
		<?php endif; ?>

		<?php if(!empty($partial_category_match) && empty($job_arr)): //If no jobs, but partial category matches have been found  ?>
			<p>
				Do you want search our 
				<?php
				$divider = " ";
				foreach($partial_category_match as $cat_id){
					if(end($partial_category_match) == $cat_id) $divider =  " or ";
					echo $divider . Category::get_category_link_html($cat_id);
					$divider = ", ";
				}
				?>
				category?
			</p>		
		<?php endif; ?>
		
        <?php if((!isset($category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_LOCATION]) || !isset($category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_CATEGORY])) && (count($job_arr) <= 5 && !$err_msg)): //Only display if not a multi-descriptive search ?>
		    <p class='jobSearchMessage' style="margin-bottom: 15px">
				Try a different search for more jobs by clicking a category below or <a href="job_search">click here</a> to clear search and start again.
		   	</p>
	    <?php endif ?>

	    <?php if((isset($category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_LOCATION]) && isset($category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_CATEGORY])) && empty($job_arr)): //If no jobs, but partial category matches have been found  ?>
            <p> 
                See <a href="/jobs/<?php echo Search_Descriptive_Manager::get_instance()->get_search_descriptive_by_id(SEARCH_DESCRIPTIVE_TYPE_CATEGORY, $category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_CATEGORY])->get_url_ending() ?>">more jobs in <?php echo Search_Descriptive_Manager::get_instance()->get_search_descriptive_by_id(SEARCH_DESCRIPTIVE_TYPE_CATEGORY, $category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_CATEGORY])->get_description() ?> (<?php echo $job_count->get_live_job_count_array_by_category($category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_CATEGORY]) ?>)</a> 
                and <a href="/jobs/<?php echo Search_Descriptive_Manager::get_instance()->get_search_descriptive_by_id(SEARCH_DESCRIPTIVE_TYPE_LOCATION, $category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_LOCATION])->get_url_ending() ?>">more jobs in <?php echo Search_Descriptive_Manager::get_instance()->get_search_descriptive_by_id(SEARCH_DESCRIPTIVE_TYPE_LOCATION, $category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_LOCATION])->get_description() ?> (<?php echo $job_count->get_live_job_count_array_by_country($category_country_search_arr[SEARCH_DESCRIPTIVE_TYPE_LOCATION]) ?>)</a>.
            </p>	
        <?php endif; ?>	

</div>

<div class='ebSection'>

	<?php if(!$search_term_promo_arr && !$post_search_results_msg): //If no promotions or post message, display list of links. ?>
		<?php require('_job_search_links_list_inc.php'); ?>
	<?php endif; ?>

	<?php if($search_term_promo_arr): //Check if promotion has been returned, and if so, display them. ?>
	
		<a name='profiles'></a>
		<h1>
			<?php echo $job_search_view_helper->get_partners_display() ?>
		</h1>
		<br>
	
		<?php foreach($search_term_promo_arr as $search_term_promo): ?>
			
			<a name='<?php echo $search_term_promo->get_page_element_position_url() ?>'></a>
		
			<div class='promotionsWrap'>
				<a rel='nofollow' target='_blank'
					href='<?php echo $search_term_promo->get_page_element_target_url() ?>'>
					<img
					alt='<?php echo $search_term_promo->get_page_element_title_text()?> Promotion Image'
					src='<?php echo $search_term_promo->get_page_element_image_url() ?>'>
				</a>
				<h2>
					<a rel='nofollow' target='_blank'
						href='<?php echo $search_term_promo->get_page_element_target_url() ?>'>
						<?php echo $search_term_promo->get_page_element_title_text() ?>
					</a>
				</h2>
		
				<p>
					<?php echo $search_term_promo->get_page_element_description() ?>
				</p>
				<div style='clear: both;'></div>
			</div>
			
			<div style='clear: both;'></div>
	
		<?php endforeach;?>
	
		<p class="small">
			<a style="color: grey;" href="advertise.php">Your organisation here?</a>
		</p>

	<?php endif; ?>
	
	<?php if($post_search_results_msg): //Check if post message has been returned, and if so, display them. ?>
		<p>
			<?php echo $post_search_results_msg ?>
		</p>
	<?php endif; ?>

</div>
