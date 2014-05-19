<?php
/**
 *  Welcome Controller
 * 
 *  Sets up vars needed to display the 'welcome/index' view. 
 *  Called and showed to the user when no other controller/action is requested.
 *  
 */ 
class Welcome_Controller extends Local_Controller{
	
	/**
	 *  Execute Index 
	 * 
	 *  Sets up vars for  index action
	 */
	public function execute_index(){
		
		global $search_category_arr, $search_experience_arr, $search_country_arr;
		
		$this->job_search 			      	= new Job_Search();
		$this->job_search_view_helper 	  	= new Job_Search_View_Helper();
		$this->job_search_controller_helper = new Job_Search_Controller_Helper($this->job_search);
		$this->search_term_arr 			  	= $this->job_search->get_search_term_arr();  
		$this->job_list_manager 			= new Job_List_Manager;
		$this->search_category_arr			= $search_category_arr;
		$this->search_experience_arr		= $search_experience_arr;
		$this->search_country_arr			= $search_country_arr;
		
		$num_premium_days_on_home = Reference::get_reference_value_by_name("NUM_PREMIUM_DAYS_ON_HOME");
		if(!$num_premium_days_on_home) {
			$num_premium_days_on_home = 15;    //Default $num_premium_days_on_home if not found in reference table.
		}

		//Get Premium Jobs
		$job_search = new Job_Search();
		//Select date range for jobs to be displayed from todays date to chosen number of working days ago $num_premium_days_on_home
		$job_search->refine_search_set_min_datetime( $this->job_list_manager->deduct_working_days(time(), $num_premium_days_on_home) );
		$this->job_arr_premium = $job_search->get_jobs_cached(CACHE_NAME_WELCOME_LATEST_PREMIUM_JOBS, CACHE_TIME_WELCOME_LATEST_PREMIUM_JOBS);

		$num_non_premium_days_on_home = Reference::get_reference_value_by_name("NUM_NON_PREMIUM_DAYS_ON_HOME");
		if(!$num_non_premium_days_on_home) {
			$num_non_premium_days_on_home = 0;    //Default $num_non_premium_days_on_home if not found in reference table.
		}
		
		//Get Basic Jobs
		$this->job_arr_non_premium = array();
		if($num_non_premium_days_on_home > 0){
			$job_search = new Job_Search();
			//Select date range for jobs to be displayed from todays date to chosen number of working days ago $num_non_premium_days_on_home
			$job_search->refine_search_set_min_datetime( $this->job_list_manager->deduct_working_days(time(), $num_non_premium_days_on_home) );
			$this->job_arr_non_premium = $job_search->get_jobs_cached(CACHE_NAME_WELCOME_LATEST_BASIC_JOBS, CACHE_TIME_WELCOME_LATEST_BASIC_JOBS);	
		}	
	
		$this->view ='welcome';
		
	}
}
?>