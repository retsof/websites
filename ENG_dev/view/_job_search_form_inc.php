<?php

/**
 * Job Search Form Inc
 *
 * An included to be 'required' on any page where searching functionality is needed,
 * it draws the job search form and quick links.
 * 
 * $Id: _job_search_form_inc.php 6422 2014-01-22 17:02:37Z maxrobson $
 * 
 */
?>

<script type="text/javascript" src="search_scripts.js"></script>

<div class="jobsearch">
    <h2>Search Engineer Jobs in Europe</h2>
    <form action="job_search_redirect" method="post">
  	<?php if($job_search_controller_helper->is_text_search()): ?>
		<div id="textSearchWrapper">
		  	<?php print $job_search_view_helper->get_job_text_search_html('keyword', SEARCH_DESCRIPTIVE_TYPE_KEYWORD, array(SEARCH_DESCRIPTIVE_TYPE_CATEGORY, SEARCH_DESCRIPTIVE_TYPE_ORGANISATION), $search_term_arr, 'placeholder="'.SEARCH_KEYWORD_INITIAL_TEXT.'" id="liveSearchTextField" onkeyup="showLiveSearchResult(this.value,event, \'liveSearchTextField\' , \'liveSearchDivKeyword\', false)" autofocus'); ?>
		        <p id="textSearchDivider">in</p>
		        <?php print $job_search_view_helper->get_job_text_search_html('keyword_location', SEARCH_DESCRIPTIVE_TYPE_KEYWORD_LOCATION, array(SEARCH_DESCRIPTIVE_TYPE_LOCATION), $search_term_arr, 'placeholder="' . SEARCH_KEYWORD_LOCATION_INITIAL_TEXT . '" id="liveSearchTextFieldLocation" onkeyup="showLiveSearchResult(this.value,event, \'liveSearchTextFieldLocation\' , \'liveSearchDivLocation\', true)"'); ?>        
		        <button class="submit"  name="submit" type="submit">Search</button>
		    	<input id="text_search" name="text_search" type="hidden" value="">
		    	<div style="clear:both"></div>
		    	<h3 class="changeSearch">
		    		<a href="/job_search.php?drop_down_search=1">
		    			Category Search
		    		</a>
		    	</h3>
		    	<h3 class="searchHelp noMobile">
			    	<a href="/job_search_help.php">
			    		Search Help
			    	</a>
		    	</h3>
		    	<div style="clear:both"></div>
	    	</div>
    	<?php else: ?>
	    	<div id="dropDownSearchWrapper">
	    		<?php print $job_search_view_helper->get_job_search_select_html("category", $search_category_arr, SEARCH_DESCRIPTIVE_TYPE_CATEGORY, $search_term_arr, "autofocus"); ?>        
	      		<?php print $job_search_view_helper->get_job_search_select_html("experience", $search_experience_arr, SEARCH_DESCRIPTIVE_TYPE_CATEGORY, $search_term_arr); ?>        
	      		<?php print $job_search_view_helper->get_job_search_select_html("location", $search_country_arr, SEARCH_DESCRIPTIVE_TYPE_LOCATION, $search_term_arr); ?>        
	    		<button class="submit" name="submit" type="submit">Search</button>
	    		<div style="clear:both"></div>
	    		<h3 class="changeSearch">
		    		<a href="/job_search.php?text_search=1">
		    			Keyword Search
		    		</a>
	    		</h3>
		    	<h3 class="searchHelp noMobile">
			    	<a href="/job_search_help.php">
			    		Search Help
			    	</a>
		    	</h3>
	    		<div style="clear:both"></div>
	    	</div>
	   	<?php endif; ?>
	    <div style="clear:both"></div>
    </form>
    <div id="liveSearchDivKeyword" class="liveSearchDiv"></div>
    <div id="liveSearchDivLocation" class="liveSearchDiv"></div> 
</div>
