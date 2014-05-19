<?php

/**
 * EEngJ Category Constants
 *
 * Contains website constants that relate to specifically to categories.
 *
 * Called by: common.php
 *
 * $Id: eengj_initialisation_inc.php 6310 2014-01-03 11:23:36Z jamescollier $
 */

//Category ids
//Category ids
//define ("CATEGORY_HIGHLIGHT", 		16);
//define ("CATEGORY_PREMIUM", 		25 );
//define ("CATEGORY_NO_FRAME",		21);
//define ("CATEGORY_HIDDEN", 			15);

define ("CATEGORY_CHEM_ENG", 		119); //Meta Chemical ENGINEER
define ("CATEGORY_MATERIAL_ENG",	133); 

define ("CATEGORY_CIVIL_ENG", 		120); //Meta Civil ENGINEER
define ("CATEGORY_ENVIRO_ENG", 		124);
define ("CATEGORY_GEOTECH_ENG", 	129);
//NGO / Not for profit
define ("CATEGORY_ELEC_ENG", 		123); //Meta Electrical ENGINEER
define ("CATEGORY_ELECTRONIC_ENG", 	122);
define ("CATEGORY_COMP_ENG", 		121);
define ("CATEGORY_TELECOM_ENG", 	137);
define ("CATEGORY_POWER_ENG", 		135);

define ("CATEGORY_MECHANICAL_ENG", 	131); //Meta Mechanical ENGINEER
define ("CATEGORY_AUTOMOTIVE", 		139);
define ("CATEGORY_MARINE_ENG", 		141);

define ("CATEGORY_INDUSTRIAL_ENG", 	130);
define ("CATEGORY_BIOMED_ENG", 		118);
define ("CATEGORY_MINING_OIL_GAS", 	132);

define ("CATEGORY_AEROSPACE", 		140);

define ("CATEGORY_NUCLEAR", 		209); 

define ("CATEGORY_SALES_AND_MARKETING", 210);

define ("CATEGORY_EXPERIENCE_STARTER", 	128);
define ("CATEGORY_EXPERIENCE_MIDDLE", 	126);
define ("CATEGORY_EXPERIENCE_SENIOR", 	127);
define ("CATEGORY_MANAGER_EXECUTIVE", 	125);

//Build category array for search drop down
$search_category_arr = array(
		""						=> 	"- any job -",
		CATEGORY_AEROSPACE		=> "Aerospace Engineer",
		CATEGORY_AUTOMOTIVE		=> "Automotive Engineer",
		CATEGORY_BIOMED_ENG 	=> "Biomedical Engineer",
		CATEGORY_CHEM_ENG 		=> "Chemical Engineer",
		CATEGORY_CIVIL_ENG 		=> "Civil Engineer",
		CATEGORY_COMP_ENG 		=> "Computer Engineer",
		CATEGORY_ENVIRO_ENG 	=> "Environmental Engineer",
		CATEGORY_ELEC_ENG 		=> "Electrical Engineer",
		CATEGORY_ELECTRONIC_ENG => "Electronic Engineer",		
		CATEGORY_GEOTECH_ENG 	=> "Geotechnical Engineer",
		CATEGORY_INDUSTRIAL_ENG => "Industrial Engineer",
		CATEGORY_MARINE_ENG 	=> "Marine and Naval Engineer",
		CATEGORY_MATERIAL_ENG 	=> "Materials Engineer",
		CATEGORY_MECHANICAL_ENG => "Mechanical Engineer",
		CATEGORY_MINING_OIL_GAS => "Mining, Oil and Gas",
		CATEGORY_NUCLEAR        => "Nuclear",
		CATEGORY_POWER_ENG 		=> "Power Engineer",
		CATEGORY_SALES_AND_MARKETING => "Sales and Marketing",
		CATEGORY_TELECOM_ENG	=> "Telecom Engineer",
	);

$search_experience_arr = array (
	"" 							=>	"- any experience -",
	CATEGORY_EXPERIENCE_STARTER =>	"0 - 2 Years Experience",
	CATEGORY_EXPERIENCE_MIDDLE	=>	"3 - 4 Years Experience",
	CATEGORY_EXPERIENCE_SENIOR	=>	"5 Years+ Experience",
	CATEGORY_MANAGER_EXECUTIVE	=>	"Manager and Executive"
);

//Build location array
$search_country_arr = array();
$search_country_arr[""] 			= "- any location -";
foreach( Country::get_all_countries() as $key => $val ){
	$search_country_arr[$key] = $val;
}
reset( $search_country_arr );

/*
 * Descriptive Synonyms Arr
 * 
 * Synonyms are Loaded into Search_Descriptive_Manager class to map to search descriptives held in the DB
 */
$search_descriptive_synonyms_arr = array(

	//Country synonyms
	"Luxemburg" 	=> array(SEARCH_DESCRIPTIVE_TYPE_LOCATION,236),
	"Holland" 		=> array(SEARCH_DESCRIPTIVE_TYPE_LOCATION,242),
	"Switzerland" 	=> array(SEARCH_DESCRIPTIVE_TYPE_LOCATION,254),
	"England" 		=> array(SEARCH_DESCRIPTIVE_TYPE_LOCATION,257),
	"UK"            => array(SEARCH_DESCRIPTIVE_TYPE_LOCATION,257),		
	
	//Category synonyms
	"Junior" 	=> array(SEARCH_DESCRIPTIVE_TYPE_CATEGORY,CATEGORY_EXPERIENCE_STARTER),
	"Manager" 	=> array(SEARCH_DESCRIPTIVE_TYPE_CATEGORY, CATEGORY_MANAGER_EXECUTIVE),
	"Oil" 		=> array(SEARCH_DESCRIPTIVE_TYPE_CATEGORY, CATEGORY_MINING_OIL_GAS),
	"Manager"   => array(SEARCH_DESCRIPTIVE_TYPE_CATEGORY, CATEGORY_MANAGER_EXECUTIVE),
	"Oil"       => array(SEARCH_DESCRIPTIVE_TYPE_CATEGORY, CATEGORY_MINING_OIL_GAS),
);

//Load into class
Search_Descriptive_Manager::get_instance()->set_search_descriptive_synonyms($search_descriptive_synonyms_arr);

$category_search_message_arr = array(

);

//Category Priorities
//This is used to order 'more jobs in'.
//Priority 3 and 5 reserved for organisation and country.
$category_priority_arr = array(
		CATEGORY_AUTOMOTIVE		=> "10",
		CATEGORY_AEROSPACE		=> "20",
		CATEGORY_BIOMED_ENG 	=> "30",
		CATEGORY_CHEM_ENG 		=> "40",
		CATEGORY_CIVIL_ENG 		=> "50",
		CATEGORY_COMP_ENG 		=> "60",
		CATEGORY_ENVIRO_ENG 	=> "70",
		CATEGORY_ELEC_ENG 		=> "80",
		CATEGORY_ELECTRONIC_ENG => "90",		
		CATEGORY_GEOTECH_ENG 	=> "100",
		CATEGORY_INDUSTRIAL_ENG => "110",
		CATEGORY_MARINE_ENG 	=> "120",
		CATEGORY_MATERIAL_ENG 	=> "130",
		CATEGORY_MECHANICAL_ENG => "140",
		CATEGORY_MINING_OIL_GAS => "150",
		CATEGORY_NUCLEAR        => "155",
		CATEGORY_POWER_ENG 		=> "160",
		CATEGORY_SALES_AND_MARKETING => "165",
		CATEGORY_TELECOM_ENG	=> "170",
				
		CATEGORY_EXPERIENCE_STARTER =>	"200",
		CATEGORY_EXPERIENCE_MIDDLE	=>	"210",
		CATEGORY_EXPERIENCE_SENIOR	=>	"220",
		CATEGORY_MANAGER_EXECUTIVE  =>  "230"
);

//Override text for the tag cloud. 
//The country or category display text is replaced with the text in the array which looks better in the tag cloud.
$tag_cloud_replacement_display_text_arr = array(

	SEARCH_DESCRIPTIVE_TYPE_CATEGORY => 
	array(	
		CATEGORY_EXPERIENCE_STARTER	=> "Junior",  
		CATEGORY_EXPERIENCE_MIDDLE  => "Experienced",  
		CATEGORY_EXPERIENCE_SENIOR  => "Senior"
	),
	
	SEARCH_DESCRIPTIVE_TYPE_LOCATION => 
	array(
		257 => "UK"
	)
		
);

//Absolute paths and URLs used with image internal image uploader.
$upload_destination_arr = array(
	"0" => array($_SERVER['DOCUMENT_ROOT'] . "/content/promotions/", 	DOMAIN_URL . "/content/promotions/"),
	"1" => array($_SERVER['DOCUMENT_ROOT'] . "/ourjobs/", 				DOMAIN_URL . "/ourjobs/"),
	"2" => array($_SERVER['DOCUMENT_ROOT'] . "/content/banners/", 		DOMAIN_URL . "/content/banners/")
);

//List of possible job ads, and the display price.
$ad_submit_type_arr = array(
		JOB_AD_TYPE_BASIC 			=> "free Basic Job Ad",
        JOB_AD_TYPE_STANDARD 		=> "Standard Job Ad (".Reference::get_reference_value_by_name('STANDARD_JOB_PRICE')." Euro)",
        JOB_AD_TYPE_HIGHLIGHT		=> "High Visibility Job Ad (".Reference::get_reference_value_by_name('HIGH_VIS_JOB_PRICE')." Euro)"
        );
$ad_submit_price_arr = array(
		JOB_AD_TYPE_BASIC 			=> 0,
        JOB_AD_TYPE_STANDARD 		=> Reference::get_reference_value_by_name('STANDARD_JOB_PRICE'),
        JOB_AD_TYPE_HIGHLIGHT		=> Reference::get_reference_value_by_name('HIGH_VIS_JOB_PRICE')
        );

/*
 * Static tag cloud links
 * A list of static links to display in the tag cloud, in the following format:
 * array(
 *		"description" => "Newsletter",
 *		"href" =>	"/newsletter.php",	
 *		"font_size" => 15, 
 *		"title" => "Subscribe to our Newsletter"
 *	),
 *	array(
 *		"description" => "Recruit",
 *		"href" =>	"/recruit.php",	
 *		"font_size" => 23, 
 *		"title" => "Recruit with EuroEngineerJobs"
 *	)
 */
$static_tag_cloud_var_arr = array(
 
		array(
			"description" => "Newsletter",
			"href" =>	"/newsletter.php",	
			"font_size" => 15, 
			"title" => "Subscribe to our Newsletter"
		),
		array(
			"description" => "Recruit",
			"href" =>	"/recruit.php",	
			"font_size" => 23, 
			"title" => "Recruit with EuroEngineerJobs"
		),
		array(
			"description" => "Advertise",
			"href" =>	"/advertise.php",	
			"font_size" => 12, 
			"title" => "Advertise with EuroEngineerJobs"
		),

);

//Jobs from the following categories will not display social media links
$job_display_social_media_excluded_categories_arr = array();

define("TWITTER_URL", "http://twitter.com/EuroEngineer");
define("FACEBOOK_URL", "http://www.facebook.com/EuroEngineerJobs");
define("LINKED_IN_URL", "http://www.linkedin.com/groups/EuroEngineerJobs-4361758");
define("GOOGLE_PLUS_URL", "https://plus.google.com/105572038878381820156/");

/*
 * Guide Infobox Arr
 * A list of guide promotions to be displayed in the right column. 
 * array(
 *		"promotion_img_url" => "xyz",
 *		"promotion_text" =>	"xyz xyz xyz",	
 *	),
 *	array(
 *		...
 *	)
 */
$guide_infobox_arr = array(
	array(
		"promotion_img_url" => "/images/guide_img_1.jpg",
		"promotion_text" => "Pass the final test with our <a href=\"interview_guide.php\">interview guide</a>"
	),
	array(
		"promotion_img_url" => "/images/guide_img_2.jpg",
		"promotion_text" => "Control your career! <br> <a href=\"self_evaluation_guide.php\">Self evaluation guide</a>"
	),
	array(
		"promotion_img_url" => "/images/guide_img_3.jpg",
		"promotion_text" => "Improve your chances of being interviewed with our <a href=\"cv_guide.php\">CV guide</a>"
	)
);

/*
 * Job Search Form Fields
 * 
 * An array of the form fields in the job_search.php form
 */
$job_search_form_fields = array(
	'p_category' 	=> SEARCH_DESCRIPTIVE_TYPE_CATEGORY,
	'p_experience' 	=> SEARCH_DESCRIPTIVE_TYPE_CATEGORY,
	'p_country'		=> SEARCH_DESCRIPTIVE_TYPE_LOCATION,
	'p_keyword'		=> SEARCH_DESCRIPTIVE_TYPE_KEYWORD,
	'p_keyword_location' => SEARCH_DESCRIPTIVE_TYPE_KEYWORD_LOCATION

);

/*
 * Job Search Request Map Arr
 * 
 * An array of arrays representing the form fields in the job_search.php form in the following format:
 * 
 * $job_search_request_map_arr = array(
 *	'category'		=> array('search_type' => SEARCH_DESCRIPTIVE_TYPE_CATEGORY, 'pre_joining_text' => '', 'post_joining_text' => ' Jobs'),
 * );
 * 
 * The following params can be included:
 * 
 * Search type - Category/Country/Org (Must be included)
 * Pre joining text - The text to go before the search term when displayed to the user, if proceeded by another search term (Must be included, but can be null)
 * Post joining text - The text to go after the search term when displayed to the user, always included (Must be included, but can be null)
 * 
 */
$job_search_request_map_arr = array(
	'category'          => array('search_type' => SEARCH_DESCRIPTIVE_TYPE_CATEGORY, 'pre_joining_text' => '', 'post_joining_text' => ' Jobs'),
	'experience'		=> array('search_type' => SEARCH_DESCRIPTIVE_TYPE_CATEGORY, 'pre_joining_text' => ' with ', 'post_joining_text' => ''),
	'location'          => array('search_type' => SEARCH_DESCRIPTIVE_TYPE_LOCATION, 'pre_joining_text' => ' in ', 'post_joining_text' => ''),
	'keyword'           => array('search_type' => SEARCH_DESCRIPTIVE_TYPE_KEYWORD, 'pre_joining_text' => '', 'post_joining_text' => ''),
	'keyword_location'	=> array('search_type' => SEARCH_DESCRIPTIVE_TYPE_KEYWORD_LOCATION, 'pre_joining_text' => '', 'post_joining_text' => ''),
    'descriptive'		=> array('search_type' => SEARCH_DESCRIPTIVE_TYPE_DESCRIPTIVE, 'pre_joining_text' => '', 'post_joining_text' => ''),
    'organisation'		=> array('search_type' => SEARCH_DESCRIPTIVE_TYPE_ORGANISATION, 'pre_joining_text' => '', 'post_joining_text' => '')

);

/*
* Keyword Search Non Category Map Words Arr
*
* This is an array of keywords not to map to categories in the job search class. 
* For example, array( 'engineer' ) will mean that if the user types "engineer" it will not match the "process engineer" category etc, but will instead go on to search the job title and job text for this word. Similar for scientist.
*/
$keyword_search_non_category_map_words_arr = array(
	"engineer"
);

/*
 * Career Guide Infobox Arr
 *
 * An array of pvars needed to draw the careers guide infobox in the right column.
 * It should take the form of an array of arrays structures as the example below:
 * 
 * array(
 *	array(
 *		'image' => '/images/speech_bubble_icon.png',
 *		'title' => '<a href="/interview_guide.php">Job Interview<br>Guide</a>',
 *		'text'	=> 'Pass the final test with our interview guide.',
 *		'link'  => '<a href="/interview_guide.php">Click to read the guide</a>'
 *	),
 *	array(...),
 * )
 * 
*/
$career_guide_infobox_arr = array(
	array(
		'image' => '/images/speech_bubble_icon_thumb.jpg',
		'title' => '<a href="/interview_guide.php">Job Interview Guide</a>',
		'text'	=> 'Pass the final test with our interview guide.',
		'link'  => '<a href="/interview_guide.php">Click to read the guide</a>'
	),
	array(
		'image' => '/images/graph_icon_thumb.jpg',
		'title' => '<a href="/self_evaluation_guide.php">Self Evaluation Guide</a>',
		'text'	=> 'Control your career with our evaluation guide.',
		'link'  => '<a href="/self_evaluation_guide.php">Click to read the guide</a>'
	),
    	array(
		'image' => '/images/cv_icon_thumb.jpg',
		'title' => '<a href="/cv_guide.php">Guide to Updating Your CV</a>',
		'text'	=> 'Improve your chances of being interviewed.',
		'link'  => '<a href="/cv_guide.php">Click to read the guide</a>'
	)
);

/**
 * Domain CDN Arr
 * 
 * Stores a given EJS url as the key, with it's CDN equivalent as the value.
 * 
 * array('www.domain.com' => 'cdn.domain.com', 'www.domain.com' => 'cdn.domain.com');
 *  
 */
$domain_cdn_arr = array(
	'http://www.eurobrussels.com'	   => 'http://www2.eurobrussels.com',
	'http://www.brusselsjobs.com'	   => 'http://www2.brusselsjobs.com',
	'http://www.eurosciencejobs.com'   => 'http://www2.eurosciencejobs.com',
	'http://www.euroeconomistjobs.com' => 'http://www2.euroeconomistjobs.com',
	'http://www.euroengineerjobs.com'  => 'http://www2.euroengineerjobs.com',
);

$pre_selection_submission_language_arr =
array(
		"" => "",
		1 => "Albanian",
		2 => "Arabic",
		3 => "Armenian",
		4 => "Azerbaijani",
		5 => "Basque",
		6 => "Belarusian",
		7 => "Bosnian",
		8 => "Bulgarian",
		9 => "Cantonese",
		10 => "Catalan",
		11 => "Croatian",
		12 => "Czech",
		13 => "Danish",
		14 => "Dutch",
		15 => "English",
		16 => "Estonian",
		17 => "Finnish",
		18 => "French",
		19 => "Gaelic",
		20 => "Georgian",
		21 => "German",
		22 => "Greek",
		23 => "Hebrew",
		24 => "Hindi",
		25 => "Hungarian",
		26 => "Icelandic",
		27 => "Italian",
		28 => "Japanese",
		29 => "Korean",
		30 => "Kurdish",
		31 => "Latvian",
		32 => "Lithuanian",
		33 => "Macedonian",
		35 => "Malay",
		36 => "Maltese",
		37 => "Mandarin",
		38 => "Norwegian",
		39 => "Persian",
		40 => "Polish",
		41 => "Portuguese",
		42 => "Romanian",
		43 => "Russian",
		44 => "Serbian",
		45 => "Slovak",
		46 => "Slovenian",
		47 => "Spanish",
		48 => "Swedish",
		49 => "Thai",
		50 => "Turkish",
		51 => "Ukrainian",
		52 => "Urdu",
		53 => "Vietnamese",
		54 => "Welsh"
);

$pre_selection_submission_experience_arr =
array(
		"" => "",
		1 => "1",
		2 => "2",
		3 => "3",
		4 => "4",
		5 => "5",
		6 => "6",
		7 => "7",
		8 => "8",
		9 => "9",
		10 => "10+"
);

/**
 * Newsletter ID Map Arr
 * 
 * Maps a local ID to a MailJet newsletter ID, used to double opt in people to the NL
 *    
 */
$newsletter_id_map_arr = array(
	1 => 549653
);
?>
