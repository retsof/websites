<?php 
/**
 *  Post Pre Selection Questions Contoller 
 *  
 *  Sets up vars needed to display the 'post_pre_selection_questions' view
 *  
 *  $Id: Education_class.php 5438 2013-07-08 08:21:02Z jamescollier $
 */
class Post_Pre_Selection_Questions_Controller extends Local_Controller{
	
	/**
	 *  Execute Index 
	 * 
	 *  Sets up vars for  index action
	 */
	public function execute_index(){		
		
        global $pre_selection_submission_language_arr, $pre_selection_submission_experience_arr;
        
        $this->pre_selection_submission_language_arr = $pre_selection_submission_language_arr;
        $this->pre_selection_submission_experience_arr = $pre_selection_submission_experience_arr;
        
        $this->submission = new eb_Pre_Selection_Questions_Submission();

        //Set vars
        $this->submission->set_language_arr($pre_selection_submission_language_arr);
        $this->submission->set_experience_arr($pre_selection_submission_experience_arr);

        //Pull partial text into a var, as it's optional and we test for it in the view
        $this->outro_text = Page_Partial::get_html_for_partial(654, "pre_selection_question_outro");

        //If form has been submitted
        if(Request::get_instance()->get_safe_param('submit')){

            //Populate object with vars passed from form
            $this->submission->load_from_request();

            //Check input, and if correct, send internal email
            if($this->submission->check_submission()){
                if($this->submission->send_internal_email()){
                    $this->view = 'post_pre_selection_questions_sent';
                    return;
                }
            }
        }

        //Get errors
        $this->error_arr = $this->submission->get_submission_error_arr();

        $this->view = 'post_pre_selection_questions';
	}
}
?>
