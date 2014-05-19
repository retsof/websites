<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	var image = new Image();
	image.onload = function() {
		$("body").css("background", "url('images/site_background.jpg') repeat-x fixed center bottom #FFFFFF");
	};
	image.src = 'images/site_background.jpg';
});
</script>

<body>
	<div id="wrapper">
		<div id="main" style="text-align:center;">
			<div id="content" style="float:none;margin: 20px auto 20px auto;">
				<div class="ebSection">
					<div class="logo" style="margin-bottom:20px;text-align:center">
						<a href="/"><img border="0" src="images/site_logo.jpg" alt="<?php echo WEBSITENAME ?> Logo" title="<?php echo DEFAULT_TITLE ?>" ></a>
					</div>
					<?php echo Page_Partial::get_html_for_partial($page_partial_id, "eb_landing_page_cache_" . $page_partial_id); ?>
				</div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>

	<?php
	//Call google analytics, cim etc
	$banner_manager->print_page_trackers();
	?>

</body>
</html>
