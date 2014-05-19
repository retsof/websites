<?php 
/**
 *  Education Contoller 
 *  
 *  Sets up vars needed to display the 'education' view
 *  
 *  $Id: Education_class.php 5438 2013-07-08 08:21:02Z jamescollier $
 */
class Education_Controller extends Local_Controller{
	
	/**
	 *  Execute Index 
	 * 
	 *  Sets up vars for  index action
	 */
	public function execute_index(){		
				
		$education_promotion_manager = new Promotional_Ad_Manager();
		$promotions_arr = $education_promotion_manager->get_promotions_elements_by_group(array(EDU_COURSES_GROUP_ID));
		
		//Set display vars 
		$this->view = 'education';
		$this->meta_title = WEBSITENAME  . " - Education and Courses";
		
		//Set standard  vars
		$this->promotions_arr = $promotions_arr;		
	}
}
?>