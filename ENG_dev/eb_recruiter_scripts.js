//
// File: eurobrussels_recruiter_scripts.js
//
// Holds all scripts used on recruiter pages
// Include this on all recruiter pages
//
// Change Log
//============
//26Jun07 Created
//24Nov08 JC Changed to check job location on send_basic.
//$Id: eb_recruiter_scripts.js 2937 2011-07-14 08:56:07Z jamescollier $


//Popup window function
//Used on send_job.php and send_standard/highvis job pages
//TODO: Move to general EB js file
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height){
	if(popUpWin)  {    if(!popUpWin.closed) popUpWin.close();  }
	popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=yes,scrollbars=yes,resizable=no,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

//Display hidden web page inputs and hide submit link inputs (or vice versa)
//Used in eb_job_submit_form_inc.php
function show_web_page_inputs( show ) {
	if( show == true ){
		document.getElementById('web_page_inputs').style.display = "";
		document.getElementById('submit_link_inputs').style.display = "none";
	}
	else{
		document.getElementById('web_page_inputs').style.display = "none";
		document.getElementById('submit_link_inputs').style.display = "";
	}
}

//On highvis submit pages, check fields are correctly filled out
//Used on send_highvis_job.php
function sendHighVisJobcheckForm(thisForm) {
	if(!thisForm.p_web_page_required[0].checked && !thisForm.p_web_page_required[1].checked){
		alert("Please select whether to link to job details on your website, or to show details on EuroBrussels");
		return false;
	}
	if(thisForm.p_submitter_name.value == ""
	|| thisForm.p_submitter_email.value == ""
	|| thisForm.p_submitter_telephone.value == ""
	|| thisForm.p_organisation.value == ""
	|| thisForm.p_billing_address.value == ""){
		alert("Please fill in all fields");
		return false;
	}
	return true;
}

//Display info about sending logo for listings if required
//Used on send_highvis_job.php
function sendHighVisJobDisplayLogoInfo( adType, adTypeHighlight, adTypeHighlightLogo ){
	if( adType == adTypeHighlightLogo ){ document.getElementById('highVisWithLogoInfo').style.display = ""; }
	else { document.getElementById('highVisWithLogoInfo').style.display = "none"; }
}

//On standard form, check fields are correctly filled out
//Used on send_standard_job.php
function sendStandardJobcheckForm(thisForm) {
	if(!thisForm.p_web_page_required[0].checked && !thisForm.p_web_page_required[1].checked){
		alert("Please select whether to link to job details on your website, or to show details on EuroBrussels");
		return false;
	}
	if(thisForm.p_submitter_name.value == ""
	|| thisForm.p_submitter_email.value == ""
	|| thisForm.p_submitter_telephone.value == ""
	|| thisForm.p_organisation.value == ""
	|| thisForm.p_billing_address.value == ""){
		alert("Please fill in all fields");
		return false;
	}
	return true;
}

//Function to set the hidden job_ad_type input and the displayed order price
//Used on send_standard_job.php
function sendStandardJobSetNGORate( thisForm, NGOChecked, jobAdTypeStandard, jobAdPriceStandard, jobAdTypeStandardNGO, jobAdPriceStandardNGO ){
	if( NGOChecked ){
		thisForm.p_ad_type.value = jobAdTypeStandardNGO;
		document.getElementById('job_ad_cost').innerHTML = jobAdPriceStandardNGO;
	} else {
		thisForm.p_ad_type.value = jobAdTypeStandard;
		document.getElementById('job_ad_cost').innerHTML = jobAdPriceStandard;
	}
}

//Check fields are correctly filled out
//Used in send_job_basic
function sendBasicJobCheckForm(thisForm) {

	//Check if an experience level has been selected.
	var experience_select_box = document.getElementById('p_experience_select');
	var i;
  	var exp_selected = false;
  	for (i=0; i<experience_select_box.options.length; i++) {
   		if (experience_select_box.options[i].selected) {
      		exp_selected = true; //This will tested for later.
    	}
  	}

	if(thisForm.p_submitter_name.value == ""
	|| thisForm.p_submitter_email.value == ""
	|| thisForm.p_organisation.value == ""
	|| thisForm.p_location.value == ""
	|| thisForm.p_job_title.value == ""
	|| exp_selected == false //Experience tested for here.
	|| thisForm.p_url.value == ""){
		alert("Please fill in all fields");
		return false;
	}
	return true;
}

