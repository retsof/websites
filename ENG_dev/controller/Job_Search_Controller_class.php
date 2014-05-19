<?php 
/**
 *  Job Search Contoller 
 *  
 *  Sets up vars needed to display the 'job search' view. 
 *  
 *  $Id: Job_Search_Controller_class.php 6178 2013-12-05 11:18:35Z jamescollier $
 */

class Job_Search_Controller extends Local_Controller{
	
    
	/**
	 *  Execute Search 
	 * 
	 *  Sets up vars for search page. 
	 *  If a search has been executed then retrieve job search request vars and use to run job search. 
	 *  /job_search displays the search form. 
	 *  /jobs/{descriptive} (rewritten to /job_search?descriptive[]=xxx) runs a search for that descriptive
	 *  /jobs/category/xxx/country/yyy (rewritten to /job_search.php?descriptive[]=xxx&descriptive[]=yyy) - runs a search on 2 descriptives
	 *  /jobs_at/xxx/nnn then redirect (rewritten to /job_search?organisation=xxx) - runs a search on organisation 
	 *  
	 *  Requires: 
	 *  Job_Search, Job_Search_View_Helper, Job_Search_Controller_Helper, Keyword_Logger,Job_List_Manager, Promotional_Ad_Manager, Job_Search_Term_Message_Manager
	 */
	public function execute_index(){		

        global $job_search_request_map_arr, $search_category_arr, $search_experience_arr, $search_country_arr;
        
        //Instantiate objects
        $this->job_search                   = new Job_Search();
        $this->job_search_view_helper       = new Job_Search_View_Helper();
        $this->job_search_controller_helper	= new Job_Search_Controller_Helper();
        $this->keyword_logger               = new Keyword_Logger();
        $this->job_list_manager             = new Job_List_Manager();
        $this->job_search_page              = true;

        //Set up the dropdown search arrays for this website
		$this->search_category_arr			= $search_category_arr;
		$this->search_experience_arr		= $search_experience_arr;
		$this->search_country_arr			= $search_country_arr;
        
        //Refine job search from request parameters
        //======================================
        //Request reads request and sets $job_search from the parameters.
        
        //Get just the request names from the map array (e.g. "country, category, experience"). This makes sure we only get expected parameters
        $job_search_request_names = array_keys($job_search_request_map_arr);
        //Get array of request names mapped to their values
        $request_val_arr = Request::get_instance()->get_safe_param($job_search_request_names);
        //Refine search from the key-value pairs from request
        $this->job_search->refine_from_arr($request_val_arr, $job_search_request_map_arr);

        //Examine request to set search cookies (is advanced, is text search)
        $this->job_search_controller_helper->set_cookie_from_request();

        //Get search terms 
        $this->search_term_arr = $this->job_search->get_search_term_arr();  

        //Get multiple descriptive inputs: /jobs/category/xxx/country/yyy
        $this->category_country_search_arr = $this->job_search->get_category_location_search_arr();

        // Get jobs from job_search
        //=========================
        //Only run get jobs if: 
        //$search_term_arr isn't empty (a descriptive /jobs/xyz search) 
        //OR the form has been submitted
        //AND there are no errors
        $this->job_arr = array();
        if((count($this->search_term_arr) > 0 || isset($_REQUEST['submit'])) && !$this->job_search->get_error_message()){
            $this->job_arr = $this->job_search->get_jobs();
        }

        //Check for errors here in the JM
        $this->err_msg = $this->job_search->get_error_message();

        //Get extra display data (meta-tags, descriptive display, search messages etc)
        //==============================

        //Get keyword texts from Request for logging and to re-display
        $keyword_request_value = Request::get_instance()->get_safe_param('keyword');
        $keyword_location_request_value = Request::get_instance()->get_safe_param('keyword_location');

        //Write keyword searches to the keyword log
        $this->keyword_logger->log($keyword_request_value, $keyword_location_request_value);      
        
        //Set up job_search_view_helper
        //Set incoming keyword texts as display defaults
        //This is so that any post submission parsing is ignored for the display
        $this->job_search_view_helper->set_text_search_term_display(SEARCH_DESCRIPTIVE_TYPE_KEYWORD, $keyword_request_value); //Use first value from request arr, as we only ever get one with keywords
        $this->job_search_view_helper->set_text_search_term_display(SEARCH_DESCRIPTIVE_TYPE_KEYWORD_LOCATION, $keyword_location_request_value);
        if(!$this->err_msg) $this->job_search_view_helper->set_search_page_texts($this->search_term_arr, $job_search_request_map_arr, $this->job_search_controller_helper);

        //Get partial keyword/category matches (categories that match individual words in a searched string)
        $this->partial_category_match = $this->job_search->get_partial_keyword_category_match_arr();

        //Get page specific meta info to override defaults
        $this->meta_title           = $this->job_search_view_helper->get_page_title();
        $this->meta_keywords_display = $this->job_search_view_helper->get_meta_keywords();
        $this->meta_keywords_content = $this->job_search_view_helper->get_meta_description();
        
        //Get search messages and promotions after $job_search->get_jobs() has been run. 
        //Some of these are used in several places so have been put into variables
        $this->promotion_manager        = new Promotional_Ad_Manager();
        $this->job_search_term_msg_mngr = new Job_Search_Term_Message_Manager($this->search_term_arr);
        $this->pre_search_results_msg   = $this->job_search_term_msg_mngr->get_pre_search_results_msg();
        $this->search_term_promo_arr 	= $this->promotion_manager->get_promotion_elements_by_search_term($this->search_term_arr);
        $this->post_search_results_msg  = $this->job_search_term_msg_mngr->get_post_search_results_msg();
        $this->num_jobs                 = $this->job_list_manager->get_count_live_jobs();
	
		//Set display vars 
		$this->view = 'job_search';
	}
}
?>
