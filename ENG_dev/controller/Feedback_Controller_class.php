<?php
/**
 *  Feedback Contoller
 *
 *  Enables the feedback form to be converted to an email and sent to FEEDBACK_EMAIL_TARGET
 *
 *  $Id: Counter_class.php 5438 2013-07-08 08:21:02Z jamescollier $
 */
class Feedback_Controller extends Local_Controller{

        /**
         *  Execute Index
         *
         *  Sets up vars for  index action
         */
	public function execute_index(){
        
        //Check feedback is enabled so that emails can't be sent by loading page directly
        if(FEEDBACK_ENABLED){
            //Sanitize input, and strip HTML
            $email = strip_tags(filter_var(Request::get_instance()->get_safe_param('email'), FILTER_SANITIZE_EMAIL));
            $feedback = nl2br(strip_tags(Request::get_instance()->get_safe_param('feedback')));
            $feedback = substr($feedback, 0, 1000);
            
            if(!empty($feedback)){
                $email_body =
                "The feedback form has been submitted at " . date("d-m-Y H:i") . " with the following information:" .
                "<br><br><b>Email:</b> $email" .
                "<br><b>Feedback:</b><br>$feedback";
            }
            $external_mail_handler = new Email_Handler();
            $external_mail_handler->send_external_html_email(FEEDBACK_EMAIL_TARGET, "FEEDBACK FORM SUBMISSION", $email_body);
        }
        
        $this->view = 'error';
    }
}
?>