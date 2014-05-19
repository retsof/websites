<?php

// Included in standard and highvis job submit forms to display most of the form inputs.
//$Id: _job_submit_form_inc.php 5970 2013-10-31 16:52:01Z jamescollier $

//Show whether web page required, and the inputs to go with selection
$web_page_required_yes_checked = "";
$web_page_required_no_checked = "";
$web_page_inputs_display = " display:none; ";
$submit_link_inputs_display = " display:none; ";
if( $job_submitted->get_web_page_required() == "Y" ){
	$web_page_required_yes_checked = "checked";
	$web_page_inputs_display = "";
	$submit_link_inputs_display = " display:none; ";
}
if( $job_submitted->get_web_page_required() == "N" ){
	$web_page_required_no_checked = "checked";
	$web_page_inputs_display = " display:none; ";
	$submit_link_inputs_display = "";
}

?>
<script type="text/javascript"> 
$(document).ready(function(){

	$('input,textarea').focus(function() {
		$(this).parent().find('span.hint').show();
	});

	$('input,textarea').blur(function() {
	    $(this).parent().find('span.hint').hide();
	});
});
</script>
	<fieldset class="JobSendFieldSet">
		<h1>1. Contact Details</h1>
		<div class = "JobSendRow">
			<div class = "JobSendDesc">
				Your Name
			</div>
			<div class = "JobSendInput">
			    <input autofocus class="help" type="text" name="p_submitter_name" value="<?php print $job_submitted->get_submitter_name(); ?>" >
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
			    <input class="help" type="email" name="p_submitter_email"  value="<?php print $job_submitted->get_submitter_email(); ?>" >
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
			    <input class="help" type="text" name="p_submitter_telephone" value="<?php print $job_submitted->get_submitter_telephone(); ?>">
			    <span class="hint">
			    	Enter your preferred contact telephone number. These are your details, not those of the job. They won't appear on our website.
			    </span>
			   	<br>				
			</div>
		</div>
	</fieldset>


	<fieldset class="JobSendFieldSet">
		<h1>2. Organisation Details</h1>
		<div class = "JobSendRow">
			<div class = "JobSendDesc">
		    	Organisation
			</div>
			<div class = "JobSendInput">
				<input class="help" type="text" name="p_organisation"  value="<?php print $job_submitted->get_organisation(); ?>">
				<span class="hint">
			    		Enter the name of your organisation.
			    </span>
			</div>
		</div>
		<div class = "JobSendRow">
			<div class = "JobSendDesc">
				Website
			</div>
			<div class = "JobSendInput">
				<input class="help" type="text" name="p_submitter_website"  value="<?php print $job_submitted->get_submitter_website(); ?>" >
				<span class="hint">
			    		Enter the website address of your organisation.
			    </span>
			</div>
		</div>
	</fieldset>

	<fieldset class="JobSendFieldSet" >
		<h1>3. Job Details</h1>
		<div class = "JobSendRow">
			<div class = "JobSendDesc">
					Job Ad URL
	  		</div>
			<div class = "JobSendInput">
			   	<input class="help" type="text" name="p_url" value="<?php print $job_submitted->get_url(); ?>" >
	  			<span class="hint">
			    		The web address of this job on your website, if possible.  Copy from the browser - it will be something like www.yourco.com/job.
			    </span>
	  		</div>
	  	</div>
	  	
		<div class = "JobSendRow">
			<div class = "JobSendDesc">
  					Job Title
  			</div>
			<div class = "JobSendInput">
			   	<input class="help" type="text" name="p_job_title" value="<?php print $job_submitted->get_job_title(); ?>" maxlength="200">
			  	<span class="hint">
			    		The title of the job. Please only enter one job title. Contact us for information if this job ad contains multiple job profiles.
			    </span>
			  	<br>
			   	<span class="formExplainText">
					<a target="_blank" href="/page/multiple_profile_job_ad" style="color:gray">Contact us about multiple job profiles</a>			   	
				</span>
  			</div>
		</div>

		<div class = "JobSendRow">
			<div class = "JobSendDesc">
  					Job Description
  			</div>
  			<div class = "JobSendInput">
				<textarea class="help" name="p_job_detail" rows="16" cols="60"><?php print $job_submitted->get_job_detail(); ?></textarea>
				<span class="hint">
			    	Paste in your job details, including how to apply for the job.
			    </span>
  			</div>
		</div>
	    <div class = "JobSendRow" style="padding-bottom:10px;">
		    <div class = "JobSendDesc">
			    Upload Logo <br>
			    (if new client)
		    </div>
		    <?php if(Reference::get_reference_value_by_name('ENABLE_JOB_SEND_FORM_LOGO_UPLOAD') == 1): //Check that logo uploads have been enabled in DB. Defaults to off ?>
		        <div class = "JobSendInput">
			        <input type="file" name="p_logo_file" id="file"><br>
		        </div>
		        <span class="formExplainText">
			        Only needed for new clients. Your logo must be <500k image file. <a href="mailto:<?php echo INFO_EMAIL ?>">Contact us</a> if any problems. 
		        </span>
		    <?php else: ?>
		        <div class = "JobSendInput">
		            Before you send, <a href="mailto:<?php print SALES_EMAIL?>">email us a logo</a> (max 30k) if we do not already have it.
		        </div>
            <?php endif; ?>
	    </div>
	</fieldset>

	<fieldset class="JobSendFieldSet">
		<h1>4. Billing Details</h1>

		<div class = "JobSendRow">
			<div style="padding-top:10px" class = "JobSendDesc">
				Billing Entity<br />
				and Address
	  		</div>
			<div class = "JobSendInput">
			   	<textarea name="p_billing_address" rows="3" cols="45"><?php print $job_submitted->get_billing_address(); ?></textarea>
			 	<span class="hint">
			    	Enter the full legal organisation name and the address to put on our invoice. 
			    </span>
			 </div>
		</div>
		<div class = "JobSendRow" style="padding-right:10px;">
			<div class = "JobSendDesc">
				VAT Number
			</div>
			<div class = "JobSendInput">
				<input type="text" name="p_vat_number" value="<?php print $job_submitted->get_vat_number(); ?>" maxlength="50">
				<span class="hint">
			    	Enter your VAT number. VAT will be charged if you do not supply a VAT number.
			    </span>
			</div>
		</div>
	</fieldset>
	<fieldset class="JobSendFieldSet">
		<h1>5. More Information</h1>
		<p>
			Contact me with more information about:
			<input type="checkbox" name="p_further_information[]" value="1" <?php if(in_array('1', $job_submitted->get_further_information_arr())) echo "checked='checked'" ?> /> discounted job packs&nbsp;&nbsp;
			<input type="checkbox" name="p_further_information[]" value="2" <?php if(in_array('2', $job_submitted->get_further_information_arr())) echo "checked='checked'" ?> /> a private mailbox&nbsp;&nbsp;
			<input type="checkbox" name="p_further_information[]" value="3" <?php if(in_array('3', $job_submitted->get_further_information_arr())) echo "checked='checked'" ?> /> CV database push to candidates&nbsp;&nbsp;
			<input type="checkbox" name="p_further_information[]" value="4" <?php if(in_array('4', $job_submitted->get_further_information_arr())) echo "checked='checked'" ?> /> CV database search.
		</p>
	</fieldset>
	<fieldset class="JobSendFieldSet">
		<h1>6. Order Job</h1>
