<?php 
/**
 *  Counter Contoller 
 *  
 *  Sets up vars needed to display the 'counter' view. 
 *  This redirects people to the page associated with the given counter.
 *  
 *  $Id: Counter_class.php 5438 2013-07-08 08:21:02Z jamescollier $
 */
class Counter_Controller extends Local_Controller{
	
	/**
	 *  Execute Index 
	 * 
	 *  Sets up vars for  index action
	 */
	public function execute_index(){		
		
		//Instantiate class.
		$counter = new Counter_Redirection;
		//Get counter ID.
		$counter_id = Request::get_instance()->get_safe_param('counter_id');
		//Check passed ID is numeric and not empty.
		if(!is_numeric($counter_id) || empty($counter_id) ) Visual_Helper::get_instance()->die_html("Non numeric value passed to counter.php");
		//Get URL
		$this->redirection_url = $counter->get_redirection_url($counter_id);
		//Check ID is valid, if not, redirect to parent site.
		//Only record impression if vaid ID
		if(!$this->redirection_url){
			$this->redirection_url = DOMAIN_URL;
		}else{	
			//Write counter impression to the impression DB
			Impression_Manager::get_instance()->record_impression(URL_REDIRECT_COUNTER_IMPRESSION_ID, $counter_id);
		}
		
		//Set display vars 
		$this->view = 'counter';
		$this->body_top_file = '';
		$this->body_bottom_file = '';
	}
}
?>