<?php 
/**
 *  Not Found Controller 
 *  
 *  Called whenever a page is requested that doesn't exist. 
 *  Header is set to 404, and no impressions are recoreded
 * 
 *  $Id: Not_Found_class.php 5438 2013-07-08 08:21:02Z jamescollier $
 */
class Not_Found_Controller extends Local_Controller{
	
	/**
	 *  Execute Index 
	 * 
	 *  Sets up vars for  index action
	 */
	public function execute_index(){
			
		//Do not record impressions on this page
		Impression_Manager::get_instance()->disable_impression_recording(); 	
			
		//Set view file
		$this->view = 'not_found';
		
		//Set header so it's seen as 404 by search engines
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); 
	}
}
?>