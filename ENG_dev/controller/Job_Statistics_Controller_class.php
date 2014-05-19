<?php 
/**
 *  Job Statistics Contoller 
 *  
 *  Sets up vars needed to display the 'job_statistics' view. 
 *  
 *  $Id: Job_Statistics_class.php 5487 2013-07-18 09:15:49Z jamescollier $
 */
class Job_Statistics_Controller extends Local_Controller{
	
	/**
	 *  Execute Index 
	 * 
	 *  Sets up vars for  index action
	 */
	public function execute_index(){		
		
		//Default error to false
		$error = false;
		
		//Get access code, error if not set
		$external_access_code = Request::get_instance()->get_safe_param('external_access_code');
		
		if(!$external_access_code) $error = true;
		
		if(!$error){
			
			//Get job obj from access code, die if unrecognised code
			$this->job = new Job();
			if(!$this->job->populate_from_database_using_external_access_code($external_access_code)) $error = true;
		}
		
		if(!$error){
			//The creation date of the job
			$this->from_date = date('Y-m-d', strtotime($this->job->get_creation_date()));
			//Get the to date as the expiry or today (whichever is earliest) 
			$this->to_date = date(
				'Y-m-d', 
				min(strtotime($this->job->get_expiry_date()), time()) //Get minimum: today 0 expiry
			);
			
			$this->impression_totals_arr = Impression_Manager::get_instance()->get_total_impressions_by_element_id(1, $this->job->get_job_id(), $this->from_date, $this->to_date);
		}
		
		if($error){
		    $this->view = 'error';	
		    $this->error_msg = "Your external access code hasn't been recognised.";
		}else{
		    $this->view = 'job_statistics';	
		    $this->job_statistics_partial_id = 303;
		    $this->body_bottom_file = 'bodyBottomJobStatisticsInc.php';
	    }
	}
}
?>
