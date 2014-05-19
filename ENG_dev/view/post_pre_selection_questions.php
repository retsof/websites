<script>
    $(document).ready(function(){
	
	    showSection = function(section_id){
		    $('#' + section_id).slideDown('slowly');
	    }
	    hideSection = function(section_id){
		    $('#' + section_id).slideUp('slowly');
	    }
	
    });
</script>

<style>	
	.sectionWrapper{ display:none; }
	
	<?php if($submission->is_minimum_work_experience()): ?>
		#minimumExperienceWrapper{ display:block; }
	<?php endif; ?>
	
	<?php if($submission->is_minimum_work_experience_policy()): ?>
		#minimumPolicyExperienceWrapper{ display:block; }
	<?php endif;?>
	
	<?php if($submission->is_language()): ?>
		#languageWrapper{ display:block; }
	<?php endif; ?>
</style>

<div class="ebSection">
	<h1>Post Pre-Selection Questions</h1>
	
	<?php if(!empty($error_arr)): ?>
		<div id="applicationErrorWrapper">
	  		<?php foreach($error_arr as $error): ?>
	  			<p> <?php echo $error ?></p>
			<?php endforeach; ?>
	  	</div>
	<?php endif; ?>
	
	<?php echo Page_Partial::get_html_for_partial(653, "pre_selection_question_intro"); ?>

	<form action="post_pre_selection_questions" method="post">
		<div class ='applicationQuestionContainer'>
			<p>Job Title</p>
			<input type="text" style="width:500px; padding: 5px" name="p_job_title" value="<?php echo $submission->get_job_title() ?>" >
			<p class="formExplainText">So we can identify your job submission</p>
		</div>
		<div class ='applicationQuestionContainer'>
			<p>Do you have a minimum requirement for work experience?</p>
			<p style="font-weight:normal">
				Yes
				<input <?php if($submission->is_minimum_work_experience() === '1') echo "checked" ?> onClick="showSection('minimumExperienceWrapper')" style="margin-left: 3px;" type="radio" name="p_is_minimum_experience" value="1">
				No
				<input <?php if($submission->is_minimum_work_experience() === '0') echo "checked" ?> onClick="hideSection('minimumExperienceWrapper')" style="margin-left: 3px;" type="radio" name="p_is_minimum_experience" value="0"> 	
			</p>
		</div>
		<div id="minimumExperienceWrapper" class="sectionWrapper">
			<div class ='applicationQuestionContainer'>
				<p>If yes, select the minimum number of years of experience required</p>
				<?php echo Visual_Helper::get_instance()->get_drop_down("p_minimum_work_experience_amount", $submission->get_minimum_work_experience_amount(), $pre_selection_submission_experience_arr, ""); ?>
			</div>
		</div>
		<div class ='applicationQuestionContainer'>
			<p>Do you have a minimum requirement for experience in a specific area?</p>
			<p style="font-weight:normal">
				Yes
				<input <?php if($submission->is_minimum_work_experience_policy() === '1') echo "checked" ?> onClick="showSection('minimumPolicyExperienceWrapper')" style="margin-left: 3px;" type="radio" name="p_is_minimum_policy_experience" value="1">
				No
				<input <?php if($submission->is_minimum_work_experience_policy() === '0') echo "checked" ?> onClick="hideSection('minimumPolicyExperienceWrapper')" style="margin-left: 3px;" type="radio" name="p_is_minimum_policy_experience" value="0"> 	
			</p>
		</div>
		
		<div id="minimumPolicyExperienceWrapper" class="sectionWrapper">
			<div class ='applicationQuestionContainer'>
				<p>If yes, enter the area</p>
				<input type="text" style="width:500px; padding: 5px" name="p_minimum_work_experience_policy_area" value="<?php echo $submission->get_minimum_work_experience_policy_area() ?>" >
			</div>
			<div class ='applicationQuestionContainer'>
				<p>and select the minimum years of experience required in this area</p>
				<?php echo Visual_Helper::get_instance()->get_drop_down("p_minimum_work_experience_policy_amount", $submission->get_minimum_work_experience_policy_amount(), $pre_selection_submission_experience_arr, ""); ?>
			</div>
		</div>
		<div class ='applicationQuestionContainer'>
			<p>Do you have a requirement to speak a language fluently? </p>
			<p style="font-weight:normal">
				Yes
				<input <?php if($submission->is_language() === "1") echo "checked" ?> onClick="showSection('languageWrapper')" style="margin-left: 3px;" type="radio" name="p_is_language" value="1">
				No
				<input <?php if($submission->is_language() === "0") echo "checked" ?> onClick="hideSection('languageWrapper')" style="margin-left: 3px;" type="radio" name="p_is_language" value="0"> 	
			</p>
		</div>
		
		<div id="languageWrapper" class="sectionWrapper">
			<div class ='applicationQuestionContainer'>
				<p>If yes, select language</p>
				<?php echo Visual_Helper::get_instance()->get_drop_down("p_language", $submission->get_language(), $pre_selection_submission_language_arr, ""); ?>
			</div>
		</div>
		
		<div class ='applicationQuestionContainer'>
			<p>Do you want to make it compulsory for applicants to include a motivation letter?</p>		
			<p style="font-weight:normal">
				Yes
				<input <?php if($submission->is_motivation_letter() === "1") echo "checked" ?> style="margin-left: 3px;" type="radio" name="p_is_motivation_letter" value="1">
				No
				<input <?php if($submission->is_motivation_letter() === "0") echo "checked" ?> style="margin-left: 3px;" type="radio" name="p_is_motivation_letter" value="0"> 	
				<p class="formExplainText">This will only allow an application if a candidate includes a motivation letter (cover letter)</p>
			</p>
		</div>
		
		<div class ='applicationQuestionContainer'>
			<p>Email address for applications</p>
			<input type="text" style="width:500px; padding: 5px" name="p_application_email_address" value="<?php echo $submission->get_application_email_address()?>" >
			<br>
			<p class="formExplainText">This is the e-mail address that you want the applications and replies to the questions to be sent to</p>
		</div>
					
		<div class ='applicationQuestionContainer'>
			<input name="submit" type="submit" value="Submit"></input>	
		</div>
	</form>
</div>

<?php if($outro_text): ?>
	<div class="ebSection">
		<?php echo $outro_text ?>
	</div>
<?php endif; ?>

