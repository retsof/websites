<?php
/**
 * Job Display View Expired 
 * 
 * View displayed when an expired job is requested. Suggests categories/jobs to the user.
 * 
 * $Id: job_display_view_expired.php 5689 2013-09-02 08:57:22Z jamescollier $
 */
?>
<div class="jobListingSection">
	<h1>This job is no longer available</h1>

	<p>
		We're sorry, the job you are looking for on <?php echo WEBSITENAME ?> has expired.
	</p>
	<p>
		We still have many live engineer jobs. Click below for similar jobs in:
	</p>
	<ul class="relatedSearchLinksJobNotFound">
        <?php foreach($related_search_links as $key => $val): 	echo $val;	endforeach; ?>
	</ul>

	<?php
	//Refine on each of the available categories
	foreach($related_categories_arr as $related_categories_arr_item){
	  	$category_id = $related_categories_arr_item['category_id'];

	  	if(!array_key_exists($category_id, $category_priority_arr)) continue; //Check that category is in the $category_priority_arr, so we don't refine on things like 'premium' or 'highlighted'.

	  	$category_id_arr = array($category_id);
	  	$job_search->refine_search_category ($category_id_arr);
	}

	//Get jobs
	$job_arr = $job_search->get_jobs();
    
    //Ensure any jobs have returned, if not don't display anything
    if(!empty($job_arr)): ?>
        <h1>Similar jobs selected for you</h1>
  		<?php $job_list_manager->display_job_list($job_arr); ?>
  	<?php endif; ?>
	
    <p>
		or go to our <a href="/job_search">job search</a> page.
	</p>

</div>
