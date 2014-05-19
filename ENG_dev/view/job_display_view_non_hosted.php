<?php
/**
 * Job Display View Non Hosted 
 * 
 * View to display non hosted jobs to the user. 
 * Page consists of two frames, the top being our internal /job/header page the bottom being the external page.  
 * 
 * $Id: job_display_view_non_hosted.php 5689 2013-09-02 08:57:22Z jamescollier $
 */
?>
<script type="text/javascript">
//Redirect from a mobile sized device to avoid frames rendering poorly
if ($(window).width() <= <?php echo MOBILE_CSS_MAX_SIZE ?>) {
    window.location = "<?php echo $job_url ?>";
}
</script>
<FRAMESET rows="210,*" border="0" frameborder="0">';
	<FRAME src='<?php echo $header_page_url ?>'	scrolling='NO' border=0 style='border-bottom: 1px solid gray'>
	<FRAME src='<?php echo $job_url ?>' scrolling='YES' border=0>
	<NOFRAMES>
		<BODY>
		<P><I>This document requires a browser that can view frames.</I></P>
		</BODY>
		
	</NOFRAMES>
</FRAMESET>

</HTML>
