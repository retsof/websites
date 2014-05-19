<?php
/**
 * Newsletter Message  
 * 
 * View to display response texts to the user after they've signed up for an NL  
 * 
 * $Id: newsletter_message.php 5745 2013-09-20 14:30:39Z jamescollier $
 */
?>
<div class="ebSection">
	
    <?php echo $display_msg ?>
	
	<?php if(isset($display_conversion_tracker)): ?>

		<!-- Google Code for ESJ - Display and Research Conversion Page -->
		<script type="text/javascript">
			/* <![CDATA[ */
			var google_conversion_id = 1071128745;
			var google_conversion_language = "en";
			var google_conversion_format = "3";
			var google_conversion_color = "ffffff";
			var google_conversion_label = "o4PqCLHu_AUQqcHg_gM";
			
			var google_conversion_value = 0;
			/* ]]> */
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
		<noscript>
			<div style="display: inline;">
				<img height="1" width="1" style="border-style: none;" alt="" src="//www.googleadservices.com/pagead/conversion/1071128745/?value=0&amp;label=o4PqCLHu_AUQqcHg_gM&amp;guid=ON&amp;script=0" />
			</div>
		</noscript>

	<?php endif; ?>
	
</div>
