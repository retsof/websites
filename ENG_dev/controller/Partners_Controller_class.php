<?php 
/**
 *  Education Contoller 
 *  
 *  Sets up vars needed to display the 'education' view
 *  
 *  $Id: Education_class.php 5438 2013-07-08 08:21:02Z jamescollier $
 */
class Partners_Controller extends Local_Controller{
	
	/**
	 *  Execute Index 
	 * 
	 *  Sets up vars for  index action
	 */
	public function execute_index(){		
				
		$promotion_manager = new Promotional_Ad_Manager();
		$this->all_search_promotions = $promotion_manager->get_promotion_elements_by_search_term();
		
		//Set display vars 
		$this->view = 'partners';			
	}
}
?>