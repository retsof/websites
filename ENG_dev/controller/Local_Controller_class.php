<?php 
/**
 *  Local Controller Class 
 * 
 *  Website specific controller (extends global controller). Called by all views (index method - in global controller class) if there is no specific controller available.
 *  
 *  Used to set website wide variables when constructed that are required by all views to function. 
 *  
 *  All controllers should be descendents of this (they inherit from this and 'global' controller class. See Controller class in ejs_modules dir).
 *  Descendent controllers can override global controller methods:  execute_index() or create other methods such as execute_new() etc.
 *  Descendent controllers should set this data as instance variables which will then be available in the view.
 *  
 *  Called from:  Router class
 *  Dependencies: classes Banner_Manager, Job_Count, Controller
 *  Dependencies: global variables $static_tag_cloud_var_arr, $tag_cloud_replacement_display_text_arr, $career_guide_infobox_arr
 * 
 *  $Id: Local_Controller_class.php 5760 2013-09-23 10:28:29Z jamescollier $
 */
class Local_Controller extends Controller{
	
	
	/**
	 *  Constructor 
	 * 
	 *  Instantiates variables required by all local views for this website.
	 */
    public function __construct(){
        
		global $static_tag_cloud_var_arr, $tag_cloud_replacement_display_text_arr, $career_guide_infobox_arr;

		//Available to all views
		$this->banner_manager = new Banner_Manager(ANALYTICS_TRACKING_CODE);
		$this->job_count = new Job_Count();
		$this->static_tag_cloud_var_arr = $static_tag_cloud_var_arr;
		$this->tag_cloud_replacement_display_text_arr = $tag_cloud_replacement_display_text_arr;
		$this->career_guide_infobox_arr = $career_guide_infobox_arr;
		$this->newsletter_popup_shown = true;
    }
}
?>
