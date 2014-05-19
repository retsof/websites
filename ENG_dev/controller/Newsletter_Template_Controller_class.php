<?php 
/**
 *  Newsletter Template Contoller 
 *  
 *  Sets up vars needed to display the 'newsletter template' view. 
 *  Used html/text view depending on request vars
 *  
 *  $Id: Newsletter_Template_Controller_class.php 6129 2013-11-29 10:12:43Z jamescollier $
 */
class Newsletter_Template_Controller extends Local_Controller{
    
    public function __construct(){
    
        //As we're overriding local constructor, call parent first 
        parent::__construct();
    
        //Don't display newsletter overlay on template page
        $this->newsletter_popup_shown = false;

    }
    
    public function execute_index(){	
    
        global $domain_cdn_arr;
        
        define('NEWSLETTER_ID', 1);

        //The default period is from 7 days until the end of yesterday
        $this->default_min_date = date("Y-m-d", time() - (7 * 24 * 60 * 60)) . " 00:00";
        $this->default_max_date = date("Y-m-d", time() - (1 * 24 * 60 * 60)) . " 23:59";

        //Instantiate classes
        $this->newsletter_job_list_manager = new Newsletter_Job_List_Manager();

        $this->newsletter_ad_manager = new Newsletter_Ad_Manager();
        $this->newsletter_ad_manager->set_cdn($domain_cdn_arr);
        $this->newsletter_ad_manager->construct_from_request();

        //Get newsletter ad for given newsletter ID
        $this->newsletter_banner = $this->newsletter_ad_manager->get_newsletter_banner_ad_by_newsletter_id(NEWSLETTER_ID);
        $this->newsletter_text_ad = $this->newsletter_ad_manager->get_newsletter_text_ad_by_newsletter_id(NEWSLETTER_ID); 
        //Get calendar comment from eiher banner ad, or text ad. 
        //In both instances the comment is coming from the calendar table, so it doesn't matter which. 
        $this->comment = ($this->newsletter_banner ? $this->newsletter_banner['calendar_comment'] : $this->newsletter_text_ad['calendar_comment'] );

        //Establish email type
        $is_text_email = $is_html_email = false;
        if(Request::get_instance()->get_safe_param('p_submit') == "Display Text Email") $is_text_email = true;
        if(Request::get_instance()->get_safe_param('p_submit') == "Display HTML Email") $is_html_email = true;
    
        //If no ads have been scheduled, then error.
        if (!$this->newsletter_banner && !$this->newsletter_text_ad) {
            $this->error_msg = "You must schedule an ad to create a newsletter.";
            $this->view = 'error';
            return true;
        }
        
        //Choose view based on $is_text_email/$is_html_email
        if (!$is_text_email && !$is_html_email){

            $this->view = 'newsletter_template_form';

        }elseif ($is_text_email){ 
            
            header('Content-Type: text/html; charset=UTF-8'); 
            
            $this->view = 'newsletter_template_text';
            $this->body_top_file = '';
            $this->body_bottom_file = '';
            $this->header_file = '';
            
        }elseif ($is_html_email){

            $this->view = 'newsletter_template_html';
            $this->body_top_file = '';
            $this->body_bottom_file = '';
            $this->header_file = '';
       } 
    }
}
    
?>
