<?php 
/**
 *  Job Apply Contoller 
 *  
 *  Sets up vars needed to display the 'job apply' view. 
 *  
 *  $Id: Job_Apply_Questions_Controller_class.php 6384 2014-01-15 16:29:19Z jamescollier $
 */

class Job_Apply_Questions_Controller extends Local_Controller{
	
	public function execute_index(){	
    
        require('recaptchalib.php'); //Needed in Job_Application_Question_Manager
        
        define("TEXT_ANSWER_ID",	 			1);
        define("SELECT_ANSWER_ID", 				2);
        define("RECAPTCHA_PUBLIC_KEY" , 		"6LdfncUSAAAAAM8RfY1abpcJhHyqT_Mlsqrj-HQR");
        define("RECAPTCHA_PRIVATE_KEY" , 		"6LdfncUSAAAAAPLMOxBhP-YP3U1V-6B-s3ZcNMT6");
        define("CANDIDATE_EMAIL_DISCLAIMER",	"This e-mail and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom it is addressed. If this message is received in error, you must not copy, distribute or take any action upon it. The sender should be notified by e-mail or telephone in this instance.<br><br>Any attachments are supplied by the candidates and automatically passed on. It is the responsibility of the recipient to check for viruses and ensure that the onward transmission, opening or use of this message (including any attachments) will not adversely affect its systems or data. No responsibility is accepted by " . WEBSITENAME . " in this regard and recipients should carry out such anti-virus and other checks as considered appropriate. Furthermore, candidate submissions are not checked and <website> is not responsible for any incorrect, defamatory, offensive material supplied by a candidate. All candidate information in this email will be subject to your privacy policy.");
        define("LOG_SUBMIT_ERROR", 				true);
        define("APPLICATION_ERROR_LOG_FILE", 	"../eb_ad_submit_error_log.txt");

        //Retrieve job id from url
        $this->job_id = Request::get_instance()->get_safe_param("job_id");
        $this->application = new Job_Application_Question_Manager($this->job_id);

        //Check is this is a valid application. That an application is associated with the given job id.
        if(!$this->application->get_valid_application()){
            $this->error_msg = "There is no application form associated with this job.";
            $this->view = 'error';
            return;
        }

        //Check that the job hasn't expired. Show default expired page.
        if($this->application->get_job_obj()->is_expired()){
                $this->job = $this->application->get_job_obj(); //Assign job obj to $job variable as it is needed in the expired page.
                $this->view = 'job_display_view_expired';
                return;
        }

        //Check is form's been submitted.
        if($_SERVER['REQUEST_METHOD']=='POST') {
            if($this->application->submit()){
                $this->view = 'job_application_questions_sent';
                return;
            }
        }

        $this->view = 'job_apply_questions';
    }
}
?>
