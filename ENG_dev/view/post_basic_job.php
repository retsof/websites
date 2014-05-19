<style>
	.ui-resizable-se {
		bottom: 7px;
		right: 7px;
	}
	.ui-wrapper{
		padding-bottom:0px !important;
	}
</style>

<script language="Javascript" type="text/javascript" src="recruiter_scripts.js"></script>
<script type="text/javascript"> 
$(document).ready(function(){

	$('input,textarea,select').focus(function() {
	    $(this).parent().find('span.hint').css('display', 'inline');
	});

	$('input,textarea,select').blur(function() {
	    $(this).parent().find('span.hint').css('display', 'none');
	});
});
</script>
<script>
	$(function() {
		$( "textarea.resizeable" ).resizable({
			handles: "se"
		});
	});
</script>

<div class="ebSection">
	<div class="floatright" style="margin: 30px 30px 0 0">
  		<img src="images/eb_27620.jpg" height="140px"">
 	</div>
	  	<?php echo Page_Partial::get_html_for_partial(538, "send_basic_job_intro"); ?>
  	
  	<form action="post_job/basic" method="post" novalidate>

	<input type="hidden" name="p_ad_type" value="<?php print JOB_AD_TYPE_BASIC; ?>">
	<input type="hidden" name="p_web_page_required" value="N">

  	<?php
  		if( $job_submitted->is_error() ){
  			print "<p class='jobSubmissionWarning''>".$job_submitted->get_msg()."</p>";
  		}
  	?>


	<fieldset class="JobSendFieldSet">
		<h1>1. Contact Details</h1>
		<div class = "JobSendRow">
			<div class = "JobSendDesc">
				Your Name
			</div>
			<div class = "JobSendInput">
			    <input autofocus type="text" name="p_submitter_name" value="<?php print $job_submitted->get_submitter_name(); ?>" >
				<span class="hint">
			    	Enter your full name.  These are your details, not those of the job. They won't appear on our website.
			    </span>
			</div>
		</div>
	  	<div class = "JobSendRow">
			<div class = "JobSendDesc">
					Email Address
			 </div>
			 <div class = "JobSendInput">
			    <input type="email" name="p_submitter_email"  value="<?php print $job_submitted->get_submitter_email(); ?>" > &nbsp;
				<span class="hint">
			    	Enter a valid email address.  These are your details, not those of the job. They won't appear on our website.
			    </span>
			</div>
		</div>
		<div class = "JobSendRow">
			<div class = "JobSendDesc">
				Telephone
			</div>
			<div class = "JobSendInput">
			    <input type="text" name="p_submitter_telephone" value="<?php print $job_submitted->get_submitter_telephone(); ?>">
		  		<span class="hint">
			    	Enter your preferred contact telephone number. These are your details, not those of the job. They won't appear on our website.
			    </span>
		  	</div>
		</div>
		<div class = "JobSendRow">
        	<div class = "JobSendDesc">
				Office Address
			</div>
			<div class = "JobSendInput">
				<input type="text" name="p_office_address" value="<?php print $job_submitted->get_office_address(); ?>">
				<span class="hint">
					Enter your office address. These are your details, not those of the job.
				</span>
			</div>
		</div>
	</fieldset>

	<fieldset class="JobSendFieldSet">

	<h1>2. Job Details</h1>
	<div class = "JobSendRow">
	 	<div class = "JobSendDesc">
				Organisation
	 	</div>
	 	<div class = "JobSendInput">
	 		<input type="text" name="p_organisation" value="<?php print $job_submitted->get_organisation(); ?>"  maxlength="100">
	 		<span class="hint">
			    Enter the name of your organisation.
			</span>
	 	</div>
	</div>

	<div class = "JobSendRow">
	 	<div class = "JobSendDesc">
				Job location
	 	</div>
	 	<div class = "JobSendInput">
	 		<input type="text" name="p_location" value="<?php print $job_submitted->get_location(); ?>"  maxlength="200">
			<span class="hint">
			    Enter the location of the job you are posting.
			</span>
		</div>
	</div>

	<div class = "JobSendRow">
		<div class = "JobSendDesc">
			Job ad URL
		</div>

		<div class = "JobSendInput">
			<input type="text" name="p_url" value="<?php print $job_submitted->get_url(); ?>"  maxlength="200">
			<span class="hint">
			    Enter the web address of this job on your website. The job must shown on your website for free listing.
			</span>
		</div>
	</div>

	<div class = "JobSendRow">
		<div class = "JobSendDesc">
			Job title
		</div>
		<div class = "JobSendInput">
			<input type="text" name="p_job_title" value="<?php print $job_submitted->get_job_title(); ?>"  maxlength="200">
			<span class="hint">
			    Enter the title of the job. Please only enter one job title - for multiple jobs please submit each job separately.
			</span>
		</div>
	</div>

	<div class = "JobSendRow">
			<div class = "JobSendDesc">
  					Job Description
  			</div>
  			<div class = "JobSendInput">
				<textarea name="p_job_detail" rows="10" cols="60"><?php print $job_submitted->get_job_detail(); ?></textarea>
  				<span class="hint">
			    	Paste in your job details.  Only enter text here. We reserve the right to layout the text according to <?php echo WEBSITENAME; ?> style.
				</span>
				<br>
  			</div>
		</div>

	<div class = "JobSendRow">
		<div class = "JobSendDesc">
			Deadline <span class="formExplainText">(if any)</span>
		</div>
		<div class = "JobSendInput">
 			<input type="text" name="p_deadline" value="<?php print $job_submitted->get_deadline(); ?>"  maxlength="20">
			<span class="hint">
			    The date you would like your job to stop being advertised (if any).
			</span>
		</div>
	</div>

	<div class = "JobSendRow">
		<div class = "JobSendDesc">
			Experience
		</div>
		<div class = "JobSendInput">

			<select id="p_experience_select" multiple="multiple" size="3" style="width: 200px;" name="p_experience[]">
				<?php
				print_r($job_submitted->get_experience_arr());
				foreach($search_experience_arr as $exp_id => $exp_name){
					$selected = "";
					if(in_array($exp_id , $job_submitted->get_experience_arr())){
						$selected = "selected\"yes\"";
					}
					echo "<option value=\"$exp_id\" $selected >$exp_name</option>";
				}
				?>
			</select>
			<span class="hint">
			    Select the experience level related to this job. Hold Ctrl + Select for multiple selections.
			</span>
		</div>
	</div>

	</fieldset>

	<p style="clear:both;padding-right:15px">
			<input style = "font-size:10pt;width:140px" type="submit" id = "JobSendSubmit" value="Send Free Job" onClick="return sendBasicJobCheckForm(this.form);">
	</p>

  	</form>

</div>
<div class="ebSection">
  	<p>
  		<span class="bold">
  		Want to make your job stand out with your logo? Urgently recruiting? Need a longer period?</span><br>
  		Then choose our
  		<a href="send_standard_job.php">Standard Job Ad</a> or
  		<a href="send_highvis_job.php">High Visibility Job Listing</a> service.
	</p>
	<div style = "clear:both"></div>
</div>
