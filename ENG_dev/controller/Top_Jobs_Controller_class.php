<?php 
/**
 *  Top Jobs Contoller 
 *  
 *  Sets up vars needed to display the 'top jobs' view. 
 *  
 *  $Id: Top_Jobs_Controller_class.php 5768 2013-09-24 09:57:36Z jamescollier $
 */

class Top_Jobs_Controller extends Local_Controller{
	
	public function execute_index(){	
                
        $job_search = new Job_Search();
        $this->job_list_manager = new Job_List_Manager();
        
        $job_search->refine_only_high_visibility();
        
        $this->job_arr = $job_search->get_jobs();
        $this->job_list_manager->set_job_link_premium_divider("");       
        
        $this->view = "top_jobs";
    }
}
?>