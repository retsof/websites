<?php 
/**
 *  Job Controller 
 *  
 *  Sets up vars needed to display views of one job including {site}/job_display and {site}/job_apply. 
 *  
 *  $Id: Job_Controller_class.php 6422 2014-01-22 17:02:37Z maxrobson $
 */

class Job_Controller extends Local_Controller{
	
	/**
	 * Execute Index
	 * 
	 * There is no action associate with /job/index 
	 * Returning false renders 404 
	 * 
	 */
    public function execute_index(){
        return false;
    }
    
    /**
     * Execute Apply
     *
     * Used to render job apply view from /job/apply?job_id={number}
     *
     */
	public function execute_apply(){	
        
        global $category_priority_arr;
        
        //retrieve job id from url
        $job_id = Request::get_instance()->get_safe_param("job_id");

        //new job display object
        $this->job = new Job();
        $job_display = new Job_Display_Helper();
        
        
        if($job_id=="" 									//No Job ID Supplied
        || !$this->job->populate_from_database($job_id)			//Error from job class
        || $this->job->is_expired() === true )					//Job has expired
        {
            $this->execute_expired($this->job, $job_display);
            return;
        }

        //Record impression
        Impression_Manager::get_instance()->record_impression(JOB_APPLY_IMPRESSION_ID, $job_id);

        $this->job_id = $job_id;
        
        //Constructs job_title to be used in headers.
        $this->meta_title = WEBSITENAME." - ". $this->job->get_job_desc()." - ". $this->job->get_org_name(). ", " . $this->job->get_location();
        //Use job title for the desc.
        $this->meta_keywords_content = $this->job->get_job_desc()." Job, " . $this->job->get_org_name() . ", " . $this->job->get_location() .  ", " . Country::get_country_description_from_id($this->job->get_country()) . ". " . JOB_DISPLAY_PAGE_DESC_CONTINUATION;
        //Create keywords string. Note: Removing spaces around commas.
        $this->meta_keywords_display = str_replace(array(", ", " ,"), "," , $this->job->get_job_desc() .",". $this->job->get_org_name() . "," . $this->job->get_location() . ", " . Country::get_country_description_from_id($this->job->get_country()));
        $this->related_categories_arr = $this->job->get_related_category_arr();
        $this->job_url = $this->job->get_job_url();              
        $this->header_page_url = "job/header?job_id=" . $job_id . "&job_url=" . urlencode($this->job_url);
        
        //Check if the job has a URL associated with it.
        if($this->job_url != ""){
            
            //Setup view
            $this->view = 'job_display_view_non_hosted';
            $this->body_top_file = '';
            $this->body_bottom_file = '';

        }else{
            Logger::getLogger()->error("Job id=".$job_id." being requested in 'job apply' is a hosted only job, with no associated job URL.");
            header('Location:' . DOMAIN_URL);
        }
               
    }
    
    /**
     * Execute Display 
     * 
     * Used to render job display view from /job/display?job_id={number}
     * 
     */
    public function execute_display(){
        
        global $category_priority_arr, $job_display_social_media_excluded_categories_arr; 
        
        //retrieve job id from url
        $job_id = Request::get_instance()->get_safe_param("job_id"); 

        //new job display object
        $this->job = new Job();
        $this->job_display = new Job_Display_Helper();
        
        if( $job_id=="" 									//No Job ID Supplied
        || !$this->job->populate_from_database($job_id)		//Error from job class
        || $this->job->is_expired() === true )				//Job has expired
        {
            $this->execute_expired($this->job, $this->job_display);
            return;
        }
        
        //Record impression
        Impression_Manager::get_instance()->record_impression(JOB_DISPLAY_IMPRESSION_ID, $job_id);
          
        $this->hosted_details = $this->job->get_hosted_details(); //Get hosted details, if they exist.
        //Constructs job_title to be used in headers.
        $this->meta_title = WEBSITENAME." - ". $this->job->get_job_desc()." - ". $this->job->get_org_name(). ", " . $this->job->get_location();
        //Use job title for the desc.
        $this->meta_keywords_content = $this->job->get_job_desc()." Job, " . $this->job->get_org_name() . ", " . $this->job->get_location() .  ", " . Country::get_country_description_from_id($this->job->get_country()) . ". " . JOB_DISPLAY_PAGE_DESC_CONTINUATION;
        //Create keywords string. Note: Removing spaces around commas.
        $this->meta_keywords_display = str_replace(array(", ", " ,"), "," , $this->job->get_job_desc() .",". $this->job->get_org_name() . "," . $this->job->get_location() . ", " . Country::get_country_description_from_id($this->job->get_country()));
        $this->related_categories_arr = $this->job_display->get_related_search_link_array($category_priority_arr, $this->job);
                
        if($this->hosted_details != ""){
            
        		$this->display_social_media = true;
		        $related_categories = $this->job->get_related_category_arr(); 
	
		        foreach($related_categories as $category_arr){
			        $category_id = $category_arr['category_id'];
			        if(in_array($category_id, $job_display_social_media_excluded_categories_arr)) 	$this->display_social_media = false;
		        }
           
            
            //Create apply URL, link directy to job if is_displayed_no_frame is set
            if(!$this->job->is_displayed_in_frame() == false){
	            $this->hosted_details = str_replace("%%APPLY_URL%%" , $this->job_display->get_apply_hyperlink($this->job) , $this->hosted_details);
            }else{
	            $this->hosted_details = str_replace("%%APPLY_URL%%" , "<a target='_blank' href='" . $this->job->get_job_url() . "'>For more details and to apply for this job click here</a>" , $this->hosted_details);
            }
            
            //Remove any escaping slashes
            $this->hosted_details = stripslashes($this->hosted_details);
            
            //Set up view
            $this->job_display_social_media_excluded_categories_arr = $job_display_social_media_excluded_categories_arr;
            $this->view = 'job_display_view_hosted';

        }elseif( $this->job->is_displayed_in_frame() == false){

            //If 'no frame' is selected, then redirect to the job url.
            header('"Location:' . $job_url);
       
        }else{
            
            //Create url to display in frame
            $this->encoded_job_url = urlencode($this->job_url); 
            $this->job_url = $this->job->get_job_url();
            $this->header_page_url = "job/header?job_id=" . $job_id . "&job_url=" . urlencode($this->job_url);
            
            //Set up view
            $this->body_top_file = '';
            $this->body_bottom_file = '';            
            $this->view = 'job_display_view_non_hosted';
        }
        
    }
    
    /**
     * Execute Header 
     * 
     * Used to render the frame page on apply/non hosted job pages
     * 
     * @return boolean
     */
    public function execute_header(){

        global $category_priority_arr;

        $job_url = Request::get_instance()->get_safe_param("job_url");
        $job_id = Request::get_instance()->get_safe_param("job_id");

        //Check required variables have been set.
        //Don't continue if not, most likely bots crawling.
        if(empty($job_url) || empty($job_id)){
            return false;
        }

        $this->job = new Job();
        $this->job->populate_from_database($job_id);

        $this->job_display = new Job_Display_Helper();

        //Constructs job_title to be used in headers.
        $this->meta_title = WEBSITENAME." - ". $this->job->get_job_desc()." - ". $this->job->get_org_name(). ", " . $this->job->get_location();
        //Use job title for the desc.
        $this->meta_keywords_content = $this->job->get_job_desc()." Job, " . $this->job->get_org_name() . ", " . $this->job->get_location() .  ", " . Country::get_country_description_from_id($this->job->get_country()) . ". " . JOB_DISPLAY_PAGE_DESC_CONTINUATION;
        //Create keywords string. Note: Removing spaces around commas.
        $this->meta_keywords_display = str_replace(array(", ", " ,"), "," , $this->job->get_job_desc() .",". $this->job->get_org_name() . "," . $this->job->get_location() . ", " . Country::get_country_description_from_id($this->job->get_country()));

        $this->related_categories_arr = $this->job_display->get_related_search_link_array($category_priority_arr, $this->job);

        $this->view = 'job_display_frame_header';
        $this->body_top_file = '';
        $this->body_bottom_file = '';        
    }
    
    /**
     * Execute Expired 
     * 
     * Called when an expired jobs is requested. Shows user a list of categories and suggests similar jobs if any are in the system. 
     * 
     * @param object $job
     * @param object $job_display
     */
    protected function execute_expired($job, $job_display){
        
        global $category_priority_arr;

        //Get associated search links
        $this->related_search_links = $job_display->get_related_search_link_array($category_priority_arr, $job);
        //Get job search
        $this->job_search = new Job_Search();
        //Set up category vars to print 'jobs in' link
        $this->category_priority_arr = $category_priority_arr;
        $this->related_categories_arr = $this->job->get_related_category_arr();
        //Used to print jobs
        $this->job_list_manager = new Job_List_Manager();

        $this->view = 'job_display_view_expired';
    }
}
?>
