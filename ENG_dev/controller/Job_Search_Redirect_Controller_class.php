<?php 
/**
 * Job Search Redirect Contoller 
 *  
 * Receives job search form data and maps each request name and value pair into a friendly URL.
 * E.g job_search/category/academic_and_think_tank/experience/internship
 *  
 * $Id: Job_Search_Redirect_Controller_class.php 6214 2013-12-09 12:09:44Z jamescollier $
 */
class Job_Search_Redirect_Controller extends Controller{
    
	/**
	 *  Execute Index 
	 * 
	 *  Sets up vars for index action
	 */
	public function execute_index(){		

        global $job_search_request_map_arr;
        
        //Get just the request names from the map array
        $job_search_request_names = array_keys($job_search_request_map_arr);
        //Get array of request names mapped to their values
        $request_val_arr = Request::get_instance()->get_safe_param($job_search_request_names);
        //URL to redirect to 
        $url_str = "";
        
        //Iterate through each incoming search value from the request
        foreach($request_val_arr as $request_name => $request_value){         

        	if(empty($request_value)) continue; //Disregard empty values
            
            //Get search type from $job_search_request_map_arr
            $search_type = $job_search_request_map_arr[$request_name]['search_type'];
            
            //Get display url value
            //Either from SDM, or by encoding free text value
            switch($search_type){
                case SEARCH_DESCRIPTIVE_TYPE_CATEGORY:
                     $desc = Search_Descriptive_Manager::get_instance()->get_search_descriptive_by_id(SEARCH_DESCRIPTIVE_TYPE_CATEGORY, $request_value)->get_url_ending();
                    break;
                case SEARCH_DESCRIPTIVE_TYPE_LOCATION:
                    $desc = Search_Descriptive_Manager::get_instance()->get_search_descriptive_by_id(SEARCH_DESCRIPTIVE_TYPE_LOCATION, $request_value)->get_url_ending();
                    break;
                case SEARCH_DESCRIPTIVE_TYPE_KEYWORD || SEARCH_DESCRIPTIVE_TYPE_KEYWORD_LOCATION:
                	$desc = urlencode(str_replace('/', '^', $request_value)); //Replace forward slashes with a caret, to work with our routers parsing of URLs
                    break;
                default:
                    break; 
            }
            
            //Add request name and value to the URL string: 'location/africa'
            if(!empty($url_str)) $url_str .= "/";
            $url_str .= "$request_name/$desc";
            
        }
        
        //Redirect to job search page with url that's been created
        header('location:job_search/' . strtolower($url_str));
        
		//Set display vars 
		$this->view = 'job_search';
	}
}
?>
