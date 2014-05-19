//Highlighted_job_infobox.js

//Purpose: To fade through highlighted jobs in the top jobs infobox.
//Operates On: bodyBottomInc.php
//Usage: These functions are called automatically when any page it's included in is loaded.
//Dependency: jQuery

//Constants
var highlight_refresh_time = 10000; //The duration, in milliseconds, each job is on the users screen.
var highlight_fade_duration = 500; //The duration of fade (both in, and out), in miliseconds.
var highlught_json_url = "/highlighted_infobox_json.php";
var job_img_folder = "/ourjobs/";

//Variable
var highlight_infbx_obj;
var highlight_infbx_obj_count;
var highlight_infbx_obj_id = 0;
var highlight_infbx_obj_error_count = 0;

//Load Highlighted Content
//Fades out infoxbox containing div, inserts organisation logo + text and fades back in containing div.
//Once completed the function is called recursivly, and it then calls the next job entry in the JSON object.
function load_highlighted_content(){

	//Get the ID to be used.
 	var id_to_be_used = highlight_infbx_obj_id;

 	//Increase ID by 1, so next call of the function uses the next entry.
 	highlight_infbx_obj_id  ++;

 	//If the id to be used is bigger than the largest id we have, start from beginning with 0.
	if((highlight_infbx_obj_count - 1) < highlight_infbx_obj_id){ //We subtract 1, as the JSON starts from 0.
		highlight_infbx_obj_id = 0;
		highlight_infbx_obj_error_count = 0;
	}

	var highlight_logo_img_obj = new Image();

	//On error with image (probably caused by missing image) reload the function; which moves to next job.
	//If all objects in error, then stop.
	highlight_logo_img_obj.onerror=function(){
		highlight_infbx_obj_error_count++;
		if( highlight_infbx_obj_error_count >= highlight_infbx_obj_count ){
			//if all objects are blank just stop to avoid infinite loop
		} else {
			load_highlighted_content();
		}
	};

	//Once loaded, do this (fade out old image...).
	highlight_logo_img_obj.onload=function(){

		//Construct image and job title string.
		var job_title_string = "<a title='" + highlight_infbx_obj.highlighted_jobs[id_to_be_used].long_job_title + "' href = '" + highlight_infbx_obj.highlighted_jobs[id_to_be_used].display_url + "'>" + highlight_infbx_obj.highlighted_jobs[id_to_be_used].job_title	 + "</a>";
		var job_img_string = "<a title='" + highlight_infbx_obj.highlighted_jobs[id_to_be_used].org_name+ "' href = '" + highlight_infbx_obj.highlighted_jobs[id_to_be_used].display_url + "'>" + "<img src = '" + highlight_logo_img_obj.src + "'>" + "</a>";

		//Set Jquery callbacks. Call fadeOut then set image and text, then call fadeIn and start setTimeout to call load_highlighted_content() again.
		$(highlight_logo_img_obj).ready(function(){
			$("#highlightedJobsInfoboxWrapper").fadeOut(highlight_fade_duration, function () {
	       		$("#highlightedJobsInfoboxImg").html(job_img_string);
	       		$("#highlightedJobsInfoboxTxt").html(job_title_string);
	        	$("#highlightedJobsInfoboxWrapper").fadeIn(highlight_fade_duration, function (){
	        		setTimeout("load_highlighted_content()",highlight_refresh_time);
	        	});
		 	});
		});
	};

	//Set the image to be the selected image.
	highlight_logo_img_obj.src = job_img_folder + highlight_infbx_obj.highlighted_jobs[id_to_be_used].img_url;
}

//The jquery document ready handler. Any code within will only load after the entire page has loaded.
$(document).ready(function(){

	//Do request to highlighted infobox json page once page has loaded. This json page retrieves the highlighted ad data from the database,
	//and returns the json data here.
	$.ajax({
  		type: "POST",
  		url: highlught_json_url,
  		dataType: "json",
  		success: function(returned_json_data){

   	 		//Load returned JSON object into a variable.
			highlight_infbx_obj = returned_json_data;
		  	//Ascertain how many highlighted job have been returned.
		  	highlight_infbx_obj_count = highlight_infbx_obj.highlighted_jobs.length;
		  	//Load the highlighted content for the first time. It was load recursively here after.
		  	load_highlighted_content();
  		},
  		error: function(XMLHttpRequest, textStatus, errorThrown){
			//For the moment, do nothing with errors.
  		}
	});
 });