<?php

/**
 * Job Search Form Advanced Inc
 *
 * An included to be 'required' on the multi search page, draws the multi-select job search form.
 * 
 * $Id: _job_search_form_inc_1.php -1   $
 * 
 */

//Remove 'any' from multi select drop downs
unset($search_category_arr['']); 
unset($search_experience_arr['']); 
unset($search_country_arr['']);

?>

<link href="jquery.multiselect.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery.multiselect.min.js"></script>
<script>
$(document).ready(function(){

	$("select")
	   .multiselect({
	      noneSelectedText: 'Select',
	      selectedList: 1,
	      minWidth: 200
	   })
	   .multiselectfilter();
});
</script>
<style>
#main .jobsearch button.submit{
        font-size: 1.2em;
}
</style>
<div class="jobsearch" style="height: none;">
    <h2>Search Engineer Jobs in Europe</h2>
    <form action="/job_search.php" method="get">
	    <div id="dropDownSearchWrapper">				
			<input type="hidden" name='advanced_search' value="1"></input>	
	    		<?php print Visual_Helper::get_instance()->get_drop_down("category[]", Request::get_instance()->get_safe_param('category'), $search_category_arr, "multiple='true' style='height: 20px'"); ?>        
	      		<?php print Visual_Helper::get_instance()->get_drop_down("experience[]", Request::get_instance()->get_safe_param('experience'), $search_experience_arr, "multiple='true' style='height: 20px'"); ?>        
			<?php print Visual_Helper::get_instance()->get_drop_down("country[]", Request::get_instance()->get_safe_param('country'), $search_country_arr, "multiple='true' style='height: 20px'"); ?>        
	    		<button name="submit" class="submit" type="submit" style="margin-left: 2px">Search</button>
	    		<div style="clear:both"></div>
			<h3 style="margin-bottom: 5px" class="changeSearch">
		    		Switch to: <a href="/job_search.php?text_search=1">keyword search</a> or <a href="/job_search.php?drop_down_search=1">category search</a>
	    		</h3>
		    	<h3 style="margin-bottom: 5px" class="searchHelp">
			    	<a href="/job_search_help.php">
			    		Search Help
			    	</a>
		    	</h3>
	    		<div style="clear:both"></div>
	    	</div>
	    <div style="clear:both"></div>
    </form>
    <div id="liveSearchDivKeyword" class="liveSearchDiv"></div>
    <div id="liveSearchDivLocation" class="liveSearchDiv"></div> 
</div>