<style>
	.ui-resizable-se {
		bottom: 7px;
		right: 7px;
	}
	.ui-wrapper{
		padding-bottom:0px !important;
	}
</style>

<script language="Javascript" type="text/javascript" src="eb_recruiter_scripts.js"></script>

<script>
	$(function() {

		$('input[type=submit]').attr('disabled', 'disabled');

		$('#p_terms_and_conditions').change(function() {
			if($('#p_terms_and_conditions:checked').val() == 1){
				$('input[type=submit]').removeAttr('disabled');
			}else{
				$('input[type=submit]').attr('disabled', 'disabled');
			}
		});

		$( "textarea.resizeable" ).resizable({
			handles: "se"
		});
	});
</script>

<div class="ebSection" >
	<?php echo Page_Partial::get_html_for_partial(539, "send_standard_job_intro"); ?>
  	<form novalidate action="post_job/standard" method="post" enctype="multipart/form-data">

  		<input type="hidden" name="p_ad_type" value="<?php print JOB_AD_TYPE_STANDARD; ?>">

 		<?php
  			if( $job_submitted->is_error() ){
  				print "<p class='jobSubmissionWarning'>".$job_submitted->get_msg()."</p>";
	  		}
	  	?>

		<?php
			require("_job_submit_form_inc.php");
		?>
		<p>
			<input type="checkbox" id="p_terms_and_conditions" name="p_terms_and_conditions" value="1" />
			Tick to confirm you have agree to our Advertising Terms and Conditions below, <br>
			then press the button below to order a standard job ad costing <?php echo Reference::get_reference_value_by_name('STANDARD_JOB_PRICE')." ".JOB_AD_PRICE_CURRENCY_NAME; ?>.
			<br>
			<br>
		  	<input type="submit" value="Order Standard Job" style="font-size:10pt;width:180px" onClick="return sendHighVisJobcheckForm(this.form);">
  		</p>

  		</fieldset>
  	</form>
</div>

<div class="ebSection">
	<h1>Help and More Options</h1>
	<ul>
		<li>
			How do I fill in this form? <a href="javascript:void(popUpWindow('popup/send_job_how_to_fill_form', 200, 200, 600, 600))">Click here for help</a>.
		</li>
  		<li>
  			Recruiting often? <a href="mailto:<?php print INFO_EMAIL; ?>?subject=More about Job Packs">Contact us</a> for discounted job packs.
  		</li>
  		<li>
  			Any Questions? <a href="mailto:<?php print INFO_EMAIL; ?>?subject=Help with posting a high visibility job ad">Email us</a> or phone us on +32 2 790 3200.
  		</li>
	</ul>
</div>

<div class="ebSection">
	<a name="AdvertisingTerms"></a>
	<?php echo Page_Partial::get_html_for_partial(252, "eengj_job_send_terms"); ?>
</div>
