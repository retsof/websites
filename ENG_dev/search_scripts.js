//
// File: search_scripts.js
//
// Holds all scripts used for search
// Include this on all search pages
//
// Change Log
//============
//20Aug2007 Created
//18Dec2008 RF Reset fields, so previous searches aren't held over when pressing "back" after searching.
//$Id: search_scripts.js 2937 2011-07-14 08:56:07Z jamescollier $

//Call search page for country
function country_search(country){
	reset_search_fields();
	var advForm =  document.getElementById("advForm");
	advForm.p_country.value = country;
	advForm.submit();
	return false;
}
//Call search page for keyword (job description)
function keyword_search(desc){
	reset_search_fields();
	var advForm =  document.getElementById("advForm");
	advForm.p_keyword.value = desc;
	advForm.submit();
	return false;
}
//Call search page for category
function category_search(category){
	reset_search_fields();
	var advForm =  document.getElementById("advForm");
	advForm.p_category.value = category;
	advForm.submit();
	return false;
}
//Call search page for policy
function policy_search(category){
	reset_search_fields();
	var advForm =  document.getElementById("advForm");
	advForm.p_policy.value = category;
	advForm.submit();
	return false;
}
//Function to check fields are correctly filled out
function checkSearchForm(thisForm) {
	if(!thisForm.p_category.value && !thisForm.p_policy.value && !thisForm.p_country.value){
		alert("Please choose a job type, policy area or location before searching");
		return false;
	}
	return true;
}
//Function to check fields are correctly filled out
function checkAdvancedSearchForm(thisForm) {
	if(!thisForm.p_category.value && !thisForm.p_policy.value && !thisForm.p_country.value && !thisForm.p_keyword.value){
		alert("Please choose a job type, policy area, location or description before searching");
		return false;
	}
	return true;
}
//Call search page for country
function reset_search_fields(){
	var advForm =  document.getElementById("advForm");
	advForm.p_country.value = "";
	advForm.p_category.value = "";
	advForm.p_policy.value = "";
	advForm.p_keyword.value = ""
	return true;
}

