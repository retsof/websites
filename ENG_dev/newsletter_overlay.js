//===============================//
//						   	     //
// Newsletter Overlay Javascript //
//						   		 //
//===============================//

//Purpose: Show overlay when user has visited the site a given number of times.
//Usage: These functions are called automatically when any page it's included in is loaded.
//Dependency: jQuery/jQuery-ui and coookie.js

//$Id: newsletter_overlay.js 6422 2014-01-22 17:02:37Z maxrobson $

//Global Variables
var newsletter_subscribe_cookie_name_views 			= "eb_news_over_page_views";
var newsletter_subscribe_seen_before_cookie_name 	= "eb_has_seen_news_over";
var newsletter_subscribe_display_delay 				= 4000;							//Delay in milliseconds before overlay appears.
var newsletter_subscribe_page_views 				= 4;							//Number of pageviews before overlay happens.
var newsletter_subscribe_cookie_timeout 			= 90;							//Number of days before a user will see the overlay again if they've subscribed.
var newsletter_not_subscribe_cookie_timeout 		= 30;							//Number of days before a user will see the overlay again if they've not subscribed.
var max_window_width_for_mobile						= 603;

//check_above_ie6()
//Check we're not using IE6 or below, returns true if above IE6
//and false if IE6 or below.
function check_above_ie6(){

	if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
		 var ieVersion=new Number(RegExp.$1)
		 if (ieVersion<=6){
		 	return false;
		 }
	}
	return true;
}

//check_page_views()
//Advances page view counter if counter cookie exists, or creates it if not.
//If stored page views is greater than or equal to 'newsletter_subscribe_page_views'
//cookie then run open_newsletter_overlay(). Will advance counter on framed pages,
//but will not run open_newsletter_overlay().
function check_page_views(){
	var page_views = cookie.get_cookie(newsletter_subscribe_cookie_name_views);
	if(page_views == false){
		cookie.set_cookie(newsletter_subscribe_cookie_name_views,1,null);
	}else{
		if(page_views  >= newsletter_subscribe_page_views){
			if(top.location.href != window.location.href || $(window).width() <= max_window_width_for_mobile) {
				//If in a frame or mobile size device, probably a hosted job. So do nothing, don't show overlay.
			}else{
				setTimeout("open_newsletter_overlay()", newsletter_subscribe_display_delay);
			}
		}else{
			page_views++
			cookie.set_cookie(newsletter_subscribe_cookie_name_views,page_views,null);
		}
	}
}

//open_newsletter_overlay()
//Runs dialog('open') which shows overlay to user.
function open_newsletter_overlay(){
	if(cookie.get_cookie(newsletter_subscribe_seen_before_cookie_name) == false){
		cookie.set_cookie(newsletter_subscribe_seen_before_cookie_name,1,newsletter_not_subscribe_cookie_timeout);
		$("#newsletterOverlay").dialog('open');
	}
}

//Execute after page has loaded. Instantiates '#newsletterOverlay' as
//jQuery dialog box.
$(function() {

	//Attach 'dialog' property to div.
	$("#newsletterOverlay").dialog({
			autoOpen: false,
			width:350,
			height:255,
			modal: true,
			buttons: {
				'Not Now': function() {
					$(this).dialog('close');
					$('select').css("visibility", "visible");
				},
				Subscribe: function() {
					cookie.set_cookie(newsletter_subscribe_seen_before_cookie_name,1,newsletter_subscribe_cookie_timeout);
					document.forms['newsletter_overlay_form'].submit();
					$('select').css("visibility", "visible");
				}
			}
		});
	$('.ui-dialog-titlebar-close').css("display","none");
});

//Check test cookies is set, and than above IE6 before starting to count page views.
if(cookie.is_possible_to_write_cookies() && check_above_ie6()){
	check_page_views();
}