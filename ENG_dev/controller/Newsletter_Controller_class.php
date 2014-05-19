<?php 
/**
 *  Newsletter Controller 
 *  
 *  Sets up vars needed to display the 'newsletter' view, and enables user's email address to be added to a contact list in MailJet.
 *  
 *  $Id: Newsletter_Controller_class.php 6320 2014-01-06 11:22:06Z jamescollier $
 */
class Newsletter_Controller extends Local_Controller{

    /**
	 *  Execute Index 
	 * 
	 *  Sets up vars for  index action
	 */
	public function execute_index(){	
        
		$this->execute_signup();
	}
    
	/**
	 *  Execute Index 
	 * 
	 *  Sets up vars for  index action
	 */
	public function execute_signup(){	
        
		//Set display vars 
		$this->view = 'newsletter_signup';
	}
    
    /**
    * Send the email to ask for confirmation. 
    * Note that the reader is not subscribed (or even stored in Mailjet) until they have clicked the confirm email
    */
    public function execute_subscribe(){	
    
        //Get newsletter referal type.
        $newsletter_name = Request::get_instance()->get_safe_param('newsletter_name');
        $newsletter_id = Request::get_instance()->get_safe_param('newsletter_id');
        $email = Request::get_instance()->get_safe_param('email');

        if(!$newsletter_id || !$email){ //Show user error page 
            
		    $this->view = 'error';	
		    $this->error_msg = "We've been unable to add you to our newsletter.  Please try again. If you continue to have problems <a href='contact_us'>contact us</a>";
            
        }else{
        
            //Create activation email
            //======================

            //Create activation url 
            $activation_url = DOMAIN_URL . "/newsletter/activate?email=" . $email . "&newsletter_id=" . $newsletter_id . "&newsletter_name=" . $newsletter_name;

            //Set subject
            $subject = "Please confirm your subscription to the " . WEBSITENAME . " newsletter";

            //Create email body
            $email_body = "<p style='font-size:10pt; font-family:Arial, sans-serif'><img src='http://www.euroengineerjobs.com/images/site_logo.jpg'></p>";
            $email_body .= "<p style='font-size:10pt; font-family:Arial, sans-serif'>Hello,<br><br></p>";
            $email_body .= "<p style='font-size:10pt; font-family:Arial, sans-serif'>Thank you for subscribing to our mailing list.</p>";
            $email_body .= "<p style='font-size:10pt; font-family:Arial, sans-serif'>In order to confirm that you want to receive our emails, please click on the link below:</p>";
            $email_body .= "<p style='font-size:10pt; font-family:Arial, sans-serif'><a href='$activation_url'>$activation_url</a></p>";
            $email_body .= "<p style='font-size:10pt; font-family:Arial, sans-serif'>Regards,<br>The EuroJobSites Team</p>";

            $external_mail_handler = new Email_Handler();
            $external_mail_handler->send_external_html_email($email, $subject, $email_body);

            //Create display 
            //======================

            //Check if there is an alternate newsletter name in request eg. ?newletter_name=eb green
            if($newsletter_name == ""){
                $newsletter_name = WEBSITENAME;
            }

            $this->display_msg = str_replace('[%NEWSLETTER_NAME%]', $newsletter_name, Page_Partial::get_html_for_partial(638, "newsletter_subscribe")); 

        $this->view = 'newsletter_message';
        }

    }
    
    /**
    * Called when the user clicks activation link in the confirmation email
    * It is only at this point that the user's details are stored in MailJet
    */
    public function execute_activate(){	
    
        global $newsletter_id_map_arr;
        
        //Check API key has been set and that API can be loaded
        if(!is_file(MAILJET_API_INCLUDE_PATH)) Visual_Helper::get_instance()->die_html("Failed to load MailJet libraries from '".MAILJET_API_INCLUDE_PATH."' in Newsletter_Controller::execute_activate()");
        
        //Include mailjet API
        require MAILJET_API_INCLUDE_PATH;
        
        //Get newsletter credentials
        $newsletter_name = Request::get_instance()->get_safe_param('newsletter_name');
        $newsletter_id = Request::get_instance()->get_safe_param('newsletter_id');
        $email = Request::get_instance()->get_safe_param('email');

        if(!$newsletter_id || !$email){ //Show user error page 

		    $this->view = 'error';	
		    $this->error_msg = "We've been unable to activate your subscription to our newsletter. Please try again.";
            
        }else{
           
            //Add user to the MJ system
            //======================

            //Create mailjet object
            $mj = new Mailjet(MAILJET_API_KEY, MAILJET_API_SECRET_KEY);
            //Turn off debug (stops output the the screen)
            $mj->debug = 0;
            //Build params to send to MJ
            $params = array(
                'method' => 'POST',
                'contact' => $email,
                'id' => $newsletter_id_map_arr[$newsletter_id],
                'force' => true //If a user has previous unsubscribed, switch them to subscribed
            );

            //Call MJ method to do subscription
            $response = $mj->listsAddContact($params);
                       
            //Check user was added successfully, show error to user if not
            if($response == false){
                
                $this->view = 'error';	
                $this->error_msg = "We've been unable to activate your subscription to our newsletter. Please try again, check the activation url is the same as the one in your email and ensure you're not already receiving our newsletter.";

            }else{
            
                //Create display 
                //======================

                //Check if there is an alternate newsletter name in request eg. ?newletter_name=eb green
                if($newsletter_name == ""){
                    $newsletter_name = WEBSITENAME;
                }

                $this->display_msg = str_replace('[%NEWSLETTER_NAME%]', $newsletter_name, Page_Partial::get_html_for_partial(639, "newsletter_activate")); 

                $this->view = 'newsletter_message';
            }
        }
    }
}
?>
