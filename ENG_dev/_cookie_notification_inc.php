<?php 
/**
 * Cookie Notification Inc
 * 
 * A banner to notify the user that this website uses cookies.
 * 
 * 'cookieWrapper' is not displayed by default, it's only made visible when the user is 
 * both accepting cookies, and hasn't looked at the cookie_policy.php page.
 * 
 * $Id: _cookie_notification_inc.php 5787 2013-09-26 09:12:42Z jamescollier $
 */
?>

<script type="text/javascript">
$(document).ready(function(){
	if(cookie.is_possible_to_write_cookies() && !cookie.get_cookie('cookie_policy')){
		$('#cookieWrapper').slideDown();	
	}

	$("#acceptCookie").click(function(){
		cookie.set_cookie('cookie_policy', 1, 365);
		$("#cookieWrapper").slideUp();
	});
});
</script>

<div id="cookieWrapper">
	<p>
		This website uses cookies to make your experience better. Continued use of this website means you accept our <a href="cookie_policy">cookie policy</a>.&nbsp;&nbsp;<a href="javascript:void(0)" id="acceptCookie">Accept Cookies</a>
	</p>
</div>
