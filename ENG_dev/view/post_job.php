<script language="Javascript" type="text/javascript" src="eb_recruiter_scripts.js"></script>

<script type="text/javascript">
	$(function() {

		$("#basicPreview").dialog({
				autoOpen: false,
				width:750,
				modal: true
		});
		$("#basicDetails").dialog({
			autoOpen: false,
			width:750,
			modal: true
		});

		$("#highVisPreview").dialog({
				autoOpen: false,
				width:750,
				modal: true
		});
		$("#highVisDetails").dialog({
			autoOpen: false,
			width:750,
			modal: true
		});
		
		$("#standardPreview").dialog({
				autoOpen: false,
				width:750,
				modal: true
		});
		$("#standardDetails").dialog({
			autoOpen: false,
			width:750,
			modal: true
	});
	});
</script>

<div id="basicPreview" title="Basic Job Preview" style="display:none;align:center;">
	<img src="images/basic_job_preview.jpg"></img>
	<div style="margin:10px 0 5px 0;">
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="website_colour_button" href="post_job/basic">Post Basic Job</a>
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="blue_button_outline"onClick="$('#basicPreview').dialog('close');" href="javascript:void(0)">Close Window</a>
	</div>
</div>
<div id="basicDetails" title="Basic Job Details" style="display:none;align:center;">
	<div class="detailsPopup">
	  	<?php echo Page_Partial::get_html_for_partial(537, "basic_details_popup"); ?>	
	</div>
		
	<div style="margin:10px 0 5px 0;">
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="website_colour_button" href="post_job/basic">Post Basic Job</a>
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="blue_button_outline"onClick="$('#basicDetails').dialog('close');" href="javascript:void(0)">Close Window</a>
	</div>
</div>

<div id="standardPreview" title="Standard Job Preview" style="display:none;">
	<img src="images/standard_job_preview.jpg"></img>
	<div style="margin:10px 0 5px 0;">
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="website_colour_button" href="post_job/standard">Post Standard Job</a>
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="blue_button_outline"onClick="$('#standardPreview').dialog('close');" href="javascript:void(0)">Close Window</a>
	</div>
</div>

<div id="standardDetails" title="Standard Job Details" style="display:none;">
	
	<div class="detailsPopup">
	  <?php echo Page_Partial::get_html_for_partial(536, "standard_details_popup"); ?>	
	</div>

	<div style="margin:10px 0 5px 0;">
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="website_colour_button" href="post_job/standard">Post Standard Job</a>
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="blue_button_outline"onClick="$('#standardDetails').dialog('close');" href="javascript:void(0)">Close Window</a>
	</div>
</div>


<div id="highVisPreview" title="High Visibility Job Preview" style="display:none;">
	<img src="images/highlighted_job_preview.jpg"></img>
	<div style="margin:10px 0 5px 0;">
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="website_colour_button" href="post_job/high_visibility">Post High Visibility Job</a>
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="blue_button_outline"onClick="$('#highVisPreview').dialog('close');" href="javascript:void(0)">Close Window</a>
	</div>
</div>

<div id="highVisDetails" title="High Visibility Job Details" style="display:none;">
	<div class="detailsPopup">
	  	<?php echo Page_Partial::get_html_for_partial(535, "high_details_popup"); ?>
	 </div>

	
	<div style="margin:10px 0 5px 0;">
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="website_colour_button" href="post_job/high_visibility">Post High Visibility Job</a>
		<a style="float:none; display:inline; padding: 3px 10px 3px 10px" class="blue_button_outline"onClick="$('#highVisDetails').dialog('close');" href="javascript:void(0)">Close Window</a>
	</div>
</div>

<div class="ebSection">
	<h1>Select the Job Advertisement Type</h1>
</div>

<div id="postJobSection">
	<div class="sendJobBox sendJobHighVis">
		<div class="sendJobInnerBox">
			<?php echo Page_Partial::get_html_for_partial(531, "high_vis_quad"); ?>
		</div>
		<p class="postJobButtons">
			<a style="padding-right:7px; padding-left:7px" class="website_colour_button" href="post_job/high_visibility">Post Highvis Job</a>
			<a style="padding-right:7px; padding-left:7px" class="blue_button_outline noMobile" onClick="$('#highVisDetails').dialog('open');" href="javascript:void(0)">Details</a>
		</p>
	</div>
	
	<div class="sendJobBox sendJobStandard">
		<div class="sendJobInnerBox">
			<?php echo Page_Partial::get_html_for_partial(532, "standard_quad"); ?>
		</div>
		<p class="postJobButtons">
			<a style="padding-right:7px; padding-left:7px" class="website_colour_button" href="post_job/standard">Post Standard Job</a>
			<a style="padding-right:7px; padding-left:7px" class="blue_button_outline  noMobile" onClick="$('#standardDetails').dialog('open');" href="javascript:void(0)">Details</a>
		</p>
	</div>
	
	<div class="sendJobBox sendJobBasic">
		<div class="sendJobInnerBox">
			<?php echo Page_Partial::get_html_for_partial(533, "basic_quad"); ?>
		</div>
		<p class="postJobButtons">
			<a style="padding-right:7px; padding-left:7px" class="website_colour_button" href="post_job/basic">Post Basic Job</a>
			<a style="padding-right:7px; padding-left:7px" class="blue_button_outline noMobile" onClick="$('#basicDetails').dialog('open');" href="javascript:void(0)">Details</a>
		</p>
	</div>
	<div class="sendJobBox sendJobPackages">
		<div class="sendJobInnerBox">
			<?php echo Page_Partial::get_html_for_partial(534, "packages_quad"); ?>
		</div>
	</div>
</div>