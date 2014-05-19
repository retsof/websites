//Animated_premium_job_logo.js

//Purpose: To animate premium job logos, in the form of them scrolling across the page.
//Operates On: welcome.php
//Usage: These functions are called automatically when any page it's included in is loaded.
//Dependency: jQuery


$(document).ready(function(){
	var scrollerWidth = 4200; //This is set to fit 40 job logos. This must be changed if altering the number of logos returned.

	//create new container for images
	$("<div>").attr("id", "animatedPremiumJobLogoContainer").css({ position:"absolute"}).width(scrollerWidth).height(40).appendTo("div#animatedPremiumJobLogoViewer");

	//Add images to animatedPremiumJobLogoContainer. All items with class "animatedPremiumJobLogoWrapper" add to div#animatedPremiumJobLogoContainer
	$(".animatedPremiumJobLogoWrapper").each(function() {
		$(this).appendTo("div#animatedPremiumJobLogoContainer");
	});

	//work out duration of anim based on number of images (1 second for each image)
	var duration = $(".animatedPremiumJobLogoWrapper").length * 3000;

	//store speed for later (distance / time)
	var speed = (parseInt($("div#animatedPremiumJobLogoContainer").width()) + parseInt($("div#animatedPremiumJobLogoViewer").width())) / duration;

	//Check we're not dealing with IE6.
	if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
		 var ieVersion=new Number(RegExp.$1)
		 if (ieVersion<=6){
		 	var ie6 = true;
		 }
	}

	//If not IE6, apply edge fading, by unhiding the fading image at each end.
	if(!ie6){
		$("div#animatedPremiumJobLogoOuterContainerRight").css({"display":"block"});
		$("div#animatedPremiumJobLogoOuterContainerLeft").css({"display":"block"});
	}

	//Animator function
	//This function moves the el div left until it has moved out of sight
	var animator = function(el, time) {
		//animate the el
		el.animate({ left:"-" + el.width() + "px" }, time, "linear", function() {
			//reset container position to off right hand edge, so it scrolls into view
			$(this).css({ left:$("div#animatedPremiumJobLogoImageScroller").width(), right:"" });
			//restart animation
			animator($(this), duration);
		});
	}

	//Stop animation on mouseover.
	$("a.animatedPremiumJobLogoWrapper").live("mouseover", function() {
		$("div#animatedPremiumJobLogoContainer").stop(true);
	});

	//Restart animation on mouseout
	$("a.animatedPremiumJobLogoWrapper").live("mouseout", function(e) {

	  //work out total travel distance
	  var totalDistance = parseInt($("div#animatedPremiumJobLogoContainer").width()) + parseInt($("div#animatedPremiumJobLogoViewer").width());

	  //work out distance left to travel
	  var distanceLeft = totalDistance - (parseInt($("div#animatedPremiumJobLogoViewer").width()) - (parseInt($("div#animatedPremiumJobLogoContainer").css("left")))) ;

	  //new duration is distance left / speed)
	  var newDuration = distanceLeft / speed;

	  //restart anim
	  animator($("div#animatedPremiumJobLogoContainer"), newDuration);

	});

	//Start animation on the div
	animator($("div#animatedPremiumJobLogoContainer"), duration);
});