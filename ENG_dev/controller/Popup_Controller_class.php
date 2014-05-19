<?php 
/**
 *  Popup Contoller 
 *  
 *  Used to setup popup views. This is needed because body top/bottom need to be removed
 *  
 *  $Id: Popup_class.php 5438 2013-07-08 08:21:02Z jamescollier $
 */
class Popup_Controller extends Local_Controller{
	
	/**
	 *  Constructor 
	 * 
	 *  Removes body top and bod ybottom files for popups by default
	 * 
	 */
	public function __construct(){
				
		//No bodytop/bottom on popups
		$this->body_top_file = '';
		$this->body_bottom_file = '';
		
		parent::__construct();
	}
	
	/**
	 *  Override Index 
	 * 	 
	 * @return false Returns false, as there's no index for this controller 
	 */
	public function execute_index(){
		//Return false, we do this because there is no default action for 'page', 
		//but this method is implemented in the parent class.
		return false;
	}
	
	/**
	 *  Execute Send Job How to Fill Form
	 *  
	 *  Sets up vars for send_job_how_to_fill_form
	 */
	public function execute_send_job_how_to_fill_form(){
		//Set view file
		$this->view = 'send_job_how_to_fill_form';
	}
}
?>