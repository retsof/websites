//=========================//
//                         //
// Live Search Javascript  //
//                         //
//=========================//

//$Id:livesearch.js 711 2009-06-10 14:31:55Z jamescollier $

$(document).ready(function(){
	
    //Don't submit the search box if any of the links are being hovered, this allows
    //the user to select with enter, and submit. 
    $("#liveSearchTextFieldLocation,#liveSearchTextField").keypress(function (e) {
        if(e.which == 13){
            if($('.liveSearchLinkHover').is(":visible")){
                return false;
            }
        }
    });
    
	//Set when the live search results divs are positions beneath the input boxes 
    //so that it only happens once
	var positioned = false;
    
	positionLiveSearch = function(){

		//Attempt locate live search result divs when page loads, so the div doesn't jump about
		//'If' ensures that this doesn't error on pages without #liveSearchDiv
		if($("#liveSearchDivKeyword").length > 0 && $("#liveSearchTextField").length > 0){
			$("#liveSearchDivKeyword").attr("style", "");
			$("#liveSearchDivKeyword").position({
			    my:        "left top",
			    at:        "left bottom",
			    of:        $("#liveSearchTextField"),
			    collision: "fit",
			    offset: "0 0"
			});
		}
	
		if($("#liveSearchDivLocation").length > 0 && $("#liveSearchTextFieldLocation").length > 0){
			$("#liveSearchDivLocation").attr("style", "");
			$("#liveSearchDivLocation").position({
			    my:        "left top",
			    at:        "left bottom",
			    of:        $("#liveSearchTextFieldLocation"),
			    collision: "fit",
			    offset: "0 0"
			});
		}
		
		positioned = true;
	}
		
	//Global variables.
	var link_number; //Hyperlink number that is appearing as being 'hovered' over.
	var arrows_active; //True if updown arrows have been used to navigate live search items, false if not.
	var results_div;
	var input_field;
	
	//Function: showLiveSearchResult()
	//Called 'onKeyUp' when an entry is made in the live search box.
	//Takes a variable and submits it to live_search_results.php as a get parameter.
	showLiveSearchResult = function(str,event, input_field_in, results_div_in, location)
	{	
		//Only position if it's not been done before
		if(!positioned){
			positionLiveSearch();
		}

		if(results_div != results_div_in && results_div != null){
			$("#" + results_div).hide();
			$("#" + results_div).html('');

		}
		
		results_div = results_div_in;
		input_field = input_field_in;
        is_location = location;
                
		//Variables
		var live_search_results_page_url="live_search_results.php"; //Url of results page.
		live_search_results_page_url=live_search_results_page_url+"?p_live_search_input="+str;	//Add string to be found; the user's entry.
		live_search_results_page_url=live_search_results_page_url+"&sid="+Math.random(); //Add random number to stop caching. Shouldn't be a problem for our update frequency, though.
		
		//Add location text to query string
		if(location){
			live_search_results_page_url=live_search_results_page_url+"&location=true";
		}
		
		//Handle event variable, and place code of key struck into key_code.
		if (!event) event = window.event;
		var key_code=event.keyCode? event.keyCode : event.charCode
	
		if (key_code == 40 || key_code == 38 || key_code == 13){
		 	 processMenuNavigation(key_code) //If 40 (Down Arrow), 38 (Up Arrow) or 13 (Return Key) are struck pass to processMenuNavigation().
		 }else{
		 	//If any other key if struck, handle it.
	
			link_number = 0; //Set link number to 0, so that up/down arrows start from the top.
			arrows_active = false; //Set to false so that return key will submit the form, as no entries are highlightem.
	
			//If string is 2 characters or under ignore so as to return too many results.
			if (str.length<=2)
			{
				document.getElementById(results_div).style.display="none";
			  	return;
			}
			
			//Load ajax URL
			doRequest(live_search_results_page_url);
		}
	}
	
	//Function: doRequest()
	//Called by showLiveSearchResult() to load request URL
	doRequest = function(url){
		
		//Do ajax request (use JQuery method, for cross browser platform)
		$.ajax({
		  url: url,
		  success: function(html){
		    loadResults(html);
		  }
		});
	}
	
	//Function: stateChanged()
	//Called by doRequest() when ready state changes, ie results page is returned.
	//The response text (the results) are placed into the live search div.
	//Returns html.
	loadResults = function(result_string)
	{
		var response = result_string.split('\n').join(''); //Remove newline.
		if(response !== null) //Check if there's been a response (Any results found).
		{
			document.getElementById(results_div).innerHTML=result_string; //Insert response text.
			document.getElementById(results_div).style.display="block"; //Make div viewable.
		}
	}
	
	//Function processMenuNavigation()
	//Called by showLiveSearchResult() when up, down or enter is struck.
	//Recieves a keycode (a code that represents a keyboard press) and uses it to navigate the live search results appropriately.
	processMenuNavigation = function(key_code)
	{
		switch(key_code)
		{
			case 38: //Arrow Up
			    
				link_number -= 1; //When down arrow is pressed select previous url.
	
			    //If we are are the first url...
			    if(link_number == 0)
			    {
				   	var link_number_previous = link_number + 1; //Set previous to be last in the list.
			      	document.getElementById(input_field).value = "" ; //Empty the search text field.
			      	arrows_active = true; //Set to true to that search box cannot be submitted.
			 	}else{
			 		//Set to true to that search box cannot be submitted
					arrows_active = true;
					//Previous is higher url, further up the url list.
			 	  	var link_number_previous = link_number + 1;
		 			//Set search text field to contain highlighted value (like google suggest).
			 	  	//document.getElementById(input_field).value = document.getElementById("livesearch_hyperlink_id_"+link_number).innerHTML.replace("&nbsp;&nbsp;","").replace("&nbsp;&nbsp;","");
			 	 	populateSearchBox("livesearch_hyperlink_id_"+link_number, false);
         
                    //Set url to appear as though being hovered over.
			 	 	document.getElementById("livesearch_hyperlink_id_"+link_number).className="liveSearchLinkHover";
			 	 	document.getElementById("livesearch_hyperlink_id_"+link_number).style.color="#fff";
			 	}
	
				//Set url to appear as though not being hovered over.
			    document.getElementById("livesearch_hyperlink_id_"+link_number_previous).className="liveSearchLink";
			    document.getElementById("livesearch_hyperlink_id_"+link_number_previous).style.color='';
			    break;
	
		    case 40: //Arrow down
	
			    link_number ++; //When down arrow is pressed, increment url to be highlighted.
			    var link_number_previous = link_number - 1; //Url to be un-highlighted, previous highlighted url.
	
				//If there are no more urls in list, keep last url highlighted.
			    if(document.getElementById("livesearch_hyperlink_id_"+link_number) == null){
			      	link_number = link_number - 1;
			      	link_number_previous = link_number_previous + 1;
			    }
	
			    //Set arrows active to true, to precent return key submitting form.
				arrows_active = true;
			    //Set search text field to contain highlighted value (like google suggest).
			    //document.getElementById(input_field).value = document.getElementById("livesearch_hyperlink_id_"+link_number).innerHTML.replace("&nbsp;&nbsp;","").replace("&nbsp;&nbsp;","");
                populateSearchBox("livesearch_hyperlink_id_"+link_number, false);
			    //Set next url to appear as if hovered.
			    document.getElementById("livesearch_hyperlink_id_"+link_number).className="liveSearchLinkHover";
			    document.getElementById("livesearch_hyperlink_id_"+link_number).style.color="#fff";
			    //Set previous url to appear as if not hovered.
			    document.getElementById("livesearch_hyperlink_id_"+link_number_previous).className="liveSearchLink";
				document.getElementById("livesearch_hyperlink_id_"+link_number_previous).style.color='';
				break;
	
		    case 13: //Return key
                populateSearchBox("livesearch_hyperlink_id_"+link_number, true);
		    	break;
	
		   }
	}
	
	//Function checkLiveSearchSubmission()
	//Called to return true or false when 'find' (submit) is pressed on the live search form.
	//Checks if enter should submit the form, or should follow highlighted link.
	checkLiveSearchSubmission = function(){
	
		if(arrows_active == true){
			//If any items have been highlighted via arrow keys, form cannot be submitted via return key.
			return false;
	
		}else{
			//Else, no highlited and search box can be submitted like a normal form.
			return true;
		}
	
	}
	
	//Function: resetHighlightedLinks()
	//Called when a user hovers a live search link.
	//Resets live search dropdown box items highlighted by the use of the arrow keys.
	resetHighlightedLinks = function()
	{
	
		document.getElementById("livesearch_hyperlink_id_"+link_number).style.color='';
		link_number = 0; //Set global variable to '0', so that next time the user wants to use arrow keys it starts from the top.
		var reset_link_number = 1;
	
		//Cycles through links and set CSS class, untill 'null', meaning there are no more.
		while(document.getElementById("livesearch_hyperlink_id_"+reset_link_number) != null){
			document.getElementById("livesearch_hyperlink_id_"+reset_link_number).className="liveSearchLink";
			reset_link_number ++;
		}
	}
    
    //Function: resetHighlightedLinks()
	//Called when a user hovers a live search link.
	//Resets live search dropdown box items highlighted by the use of the arrow keys.
	resetHighlightedLinks = function()
	{
	
		document.getElementById("livesearch_hyperlink_id_"+link_number).style.color='';
		link_number = 0; //Set global variable to '0', so that next time the user wants to use arrow keys it starts from the top.
		var reset_link_number = 1;
	
		//Cycles through links and set CSS class, untill 'null', meaning there are no more.
		while(document.getElementById("livesearch_hyperlink_id_"+reset_link_number) != null){
			document.getElementById("livesearch_hyperlink_id_"+reset_link_number).className="liveSearchLink";
			reset_link_number ++;
		}
	}
    
    //Function: populateSearchBox()
    //Populates the live search box with the 'inner html' of a given live search link
    //Hides the live search box if 'clicked' (but doesn't if selected using arrows)
    populateSearchBox = function(element_id, hide_results){
        
        //Get inner html without spaces
        live_search_result_str = document.getElementById(element_id).innerHTML.replace("&nbsp;&nbsp;","").replace("&nbsp;&nbsp;","");
                
        //Remove post comma content if location 'Paris, France' becomes 'Paris'
        if(is_location){
            n = live_search_result_str.indexOf(',');
            live_search_result_str = live_search_result_str.substring(0, n != -1 ? n : live_search_result_str.length);
        }
        
        //Set search box cotent 
        document.getElementById(input_field).value = live_search_result_str;
        
        //If 'hide results' has been set to true
        if(hide_results){
            $('#liveSearchDivKeyword').hide();
            $('#liveSearchDivLocation').hide();
        }
    }
});