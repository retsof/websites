<?php
/* Job Apply Questions 
 * 
 * View to display job application form to the user.  
 * 
 * $Id: job_apply_questions.php 5689 2013-09-02 08:57:22Z jamescollier $
 */
?>
<style>
    /* Style captcha element here, rather than golbally */
    #recaptcha_widget_div{
        margin-left: 25px;
    }
</style>

<script>
	
	var RecaptchaOptions = {
		lang : 'en',
	};
	
	$(document).ready(function(){
					
		//Perform form checks on submit
		$('#job_application_form').submit(function() {
	
			var error = false;
	
			//Get all mandatory fields.
		  	$('[class*="JobApplicationFormManadatoryField"]').each(function(index){
	
				var val = $(this).val();	                        	//Get value.
			  	if(val == ""){										//Check if value is empty.
			 		error = true;										//Set error flag, so we know to give the user a popup.
			  		$(this).addClass('ApplicationErrorHighlight');		//Set 'error' class.
			  	}else{
					$(this).removeClass('ApplicationErrorHighlight');	//Remove error class (e.g. if they'd submitted the form again, but with fewer mistakes). 
			  	}
		  	});
		
			//Check the captcha specifically, as it's out of our control.	
			if($('#recaptcha_response_field').val() == ""){
				error = true;
				$('#recaptcha_area').css('border', '1px solid red');	//Set the border to red
			}else{
				$('#recaptcha_area').css('border', '');					//Remove the border if they sort it
			}
	
		  	//If there has been a form error.
		  	if(error){
				alert('Please fill in all mandatory fields, including the captcha field, before you can submit your application.'); //Alert the user.
		  		return false;																										//Stop the form being submitted.
		  	}
	
		});
	});
	
</script>

<?php 
/**
 * Print Dynamic Questions From Application
 * Prints HTML to create dynamic questions from database
 * @param object $application Application object
 */
function print_dynamic_questions_from_application_manager($application){

	$application_questions = $application->get_job_application_questions();

	foreach($application_questions as $question){
		$mand = false;
		$mand_string = "";
		
		if($question['is_mandatory'] == 1) $mand = true;
		if($mand) $mand_string = "class='JobApplicationFormManadatoryField'";
		
		echo "<div class ='applicationQuestionContainer'>";
		echo "<p>" . $question['question_displayed'];
		if($mand) echo " *";
		echo "</p>";

		if($question['question_type_id'] == TEXT_ANSWER_ID){
			echo "<textarea $mand_string name='" . $question['question_id'] . "'>" . $application->get_answer_by_question_id($question['question_id']) . "</textarea>";
		}

		if($question['question_type_id'] == SELECT_ANSWER_ID){
			echo "<select $mand_string name='" . $question['question_id'] . "'>";
			$multi_select_options = explode("|", $question['multi_select_option_list']);
			echo "<option value=''></option>";
			foreach($multi_select_options as $option){
				$checked = "";
				if($application->get_answer_by_question_id($question['question_id']) == $option) $checked = "selected='selected'";
				echo "<option $checked value='$option'>$option</option>";
			}
			echo "</select>";
		}

		echo "</div>";
	}
}

?>

<div class='ebSection'>
	<h1>Job Application</h1>
	<p>
		<strong>Organisation:</strong> <?php echo $application->get_job_obj()->get_org_name(); ?>
	</p>
	<p>
		<strong>Job Description:</strong> <?php echo $application->get_job_obj()->get_job_desc(); ?>
	</p>
	<p>
		<strong>Location:</strong> <?php echo $application->get_job_obj()->get_location(); ?>
	</p>
	<p>
		<?php echo nl2br($application->get_candidate_intro_text()) ?>
	</p>
	<p>
		Please use the form below to apply, fields marked * are mandatory.
	</p>
</div>

<div class='ebSection'>

<?php
//If submit failed: report errors below
if($application->is_error()): ?>
	<ul style='color:red; margin-bottom: 20px;'>
		<?php foreach($application->get_form_error_arr() as $error): ?>
			<li> <?php echo $error ?> </li>
	 	<?php endforeach; ?>
		<li>If you continue to experience problems using this form, please email us at: <?php echo INFO_EMAIL ?></li>
 	</ul>
<?php endif; ?>

<form action='job_apply_questions?job_id=<?php echo $job_id ?>' method='post' name='job_application_form' id='job_application_form' enctype='multipart/form-data'>

<!-- Display Standard Questions -->

<div class="applicationQuestionRow">
	<div class="applicationQuestionRowDesc">
		Name: *
	</div>
	<div class="applicationQuestionRowInput">
	    	<input type="input" value="<?php echo Request::get_instance()->get_safe_param('p_submitter_name')?>" class="JobApplicationFormManadatoryField" name="p_submitter_name">
	</div>
</div>
<div class="applicationQuestionRow">
	<div class="applicationQuestionRowDesc">
		Email: *
	</div>
	<div class="applicationQuestionRowInput">
	    	<input type="text" value="<?php echo Request::get_instance()->get_safe_param('p_submitter_email')?>" class="JobApplicationFormManadatoryField" name="p_submitter_email">
	</div>
</div>
<div class="applicationQuestionRow">
	<div class="applicationQuestionRowDesc">
		Telephone: *
	</div>
	<div class="applicationQuestionRowInput">
	    	<input type="text" value="<?php echo Request::get_instance()->get_safe_param('p_submitter_telephone')?>" class="JobApplicationFormManadatoryField" name="p_submitter_telephone">
	</div>
</div>

<!-- Display Dynamic Questions -->

<br>

<?php print_dynamic_questions_from_application_manager($application) ?>

<?php if($application->get_include_motivation() == "1"): ?>
	<!--  Include motivation letter upload, if required. -->
	<div class ='applicationQuestionContainer'>
		<p>
			Please attach a motivation letter: * 		
			<br>
			<span style="color: grey;font-weight: normal;">(Files must be less than 2MB and doc, docx or pdf)</span>
		</p>
		<input class="JobApplicationFormManadatoryField" type='file' name='user_motivation_file'>
	</div>
<?php endif; ?>

<!-- Include CV upload always -->
<div class ='applicationQuestionContainer'>
	<p>
		Please attach your CV: * 
		<br>
		<span style="color: grey;font-weight: normal;">(Files must be less than 2MB and doc, docx or pdf)</span>
	</p>
	<input class="JobApplicationFormManadatoryField" type='file' name='user_cv_file'>
</div>

<!-- Include captcha. -->
<div class ='applicationQuestionContainer'>
	<p>Enter the words you see below to help us avoid spam: *
	<br>
	<span style="color: grey;font-weight: normal;">
		(If you can't read the words below, click the 'Get a new challenge' button for new words)
	</span>
	</p>
	<?php echo recaptcha_get_html(RECAPTCHA_PUBLIC_KEY); ?>
</div>

<p style="margin-bottom:10px;">Check your answers, then click the button below to send your application to <?php echo $application->get_job_obj()->get_org_name(); ?></p>

<div class ='applicationQuestionContainer'>
	<input value='Send Application' type='submit'>
</div>

</form>

</div>

<div class="ebSection">
	<?php echo Page_Partial::get_html_for_partial(360, "job_apply_terms"); ?>
</div>
