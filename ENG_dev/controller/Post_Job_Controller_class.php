<?php 
/**
 *  Post Job Controller 
 *  
 *  Sets up vars needed to display the 'post job' views. 
 *  Executes the forms
 *  
 *  Depends on: 
 *  JOB_AD_TYPE_STANDARD_NGO
 *  
 *  $Id: Post_Job_Controller_class.php 5820 2013-10-02 13:43:51Z jamescollier $
 */

class Post_Job_Controller extends Local_Controller{
	
    /**
     * Execute Index 
     * 
     * Default post job page, display job type selection.
     */
    public function execute_index(){
        
        //Custom body bottom file, and set page partial ID to be used
        $this->job_send_partial_id = 279; 
		$this->body_bottom_file = '_bodyBottomPostJobInc.php';    
        $this->view = 'post_job';

    }
    
    /**
     * Execute Basic 
     * 
     * Enables display of basic job submit form, and writes to DB using job submitted class.
     * On successful submission of form redirect to post_job_sent view with a success message.
     * If job_submitted->submit() fails then redisplay the form with error message
     */
    public function execute_basic(){
        
        global $search_experience_arr;
        
        $this->job_submitted = new eengj_Job_Submitted();
        $this->search_experience_arr = $search_experience_arr;
        
        if($_SERVER['REQUEST_METHOD']=='POST') {
        	
        	//On success display 'sent' view
            if($this->job_submitted->submit()){
                 $this->sent_message = Page_Partial::get_html_for_partial(522, "post_post_job_after_submission");
                 $this->view = 'post_job_sent';
                 return;
            }; //Else: Redisplay form with error from obj
        }
        
        $this->job_send_partial_id = 538;
        $this->body_bottom_file = '_bodyBottomPostJobInc.php';    
        $this->view = 'post_basic_job'; 
    }
    
    /**
     * Execute Standard 
     * 
     * Enables display of standard job submit form, and writes to DB using job submitted class.
     * 
     * @return boolean Returns true on successful submission of form. 
     */
    public function execute_standard(){
                
        $this->job_submitted = new Job_Submitted();

        if($_SERVER['REQUEST_METHOD']=='POST') {
        	
        	//On success display 'sent' view
            if($this->job_submitted->submit()){
                 $this->error_arr = $this->job_submitted->get_post_submission_warning_msg(); 
                 $this->sent_message = Page_Partial::get_html_for_partial(523, "post_standard_ngo_job_after_submission");
                 $this->view = 'post_job_sent';
                 return;
            }; 
        }
        
        //Check box and set price for NGO rate, if selected
        $this->ngo_rate_checked = "";
        $this->job_ad_price = Reference::get_reference_value_by_name('STANDARD_JOB_PRICE');
        if( $this->job_submitted->get_ad_type() == JOB_AD_TYPE_STANDARD_NGO ){
            $this->ngo_rate_checked = " checked ";
            $$this->job_ad_price = Reference::get_reference_value_by_name('STANDARD_NGO_JOB_PRICE');
        }
        
        $this->job_send_partial_id = 539;
        $this->body_bottom_file = '_bodyBottomPostJobInc.php';    
        $this->view = 'post_standard_job'; 
    }
    
    /**
     * Execute High Visibility
     *
     * Enables display of high visibility job submit form, and writes to DB using job submitted class.
     *
     * @return boolean Returns true on successful submission of form.
     */
    public function execute_high_visibility(){
                
        $this->job_submitted = new Job_Submitted();
	
        //On success display 'sent' view
        if($_SERVER['REQUEST_METHOD']=='POST') {
            if($this->job_submitted->submit()){
                 $this->error_arr = $this->job_submitted->get_post_submission_warning_msg(); 
                 $this->sent_message = Page_Partial::get_html_for_partial(524, "post_highvis_job_after_submission"); 
                 $this->view = 'post_job_sent';
                 return;
            } //Else: Redisplay form with error from obj
        }
        
        $this->job_send_partial_id = 540;
        $this->body_bottom_file = '_bodyBottomPostJobInc.php';    
        $this->view = 'post_high_visibility_job'; 
    }
}
?>
