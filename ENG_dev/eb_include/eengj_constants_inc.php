<?php

/***
 * Constants for EEngJ
 * $Id: eengj_constants_inc.php 6500 2014-02-05 12:25:59Z maxrobson $
 */

//Include environment-specific info. Can override constants
if( is_file("eb_include/local_config_inc.php") ){ require("local_config_inc.php"); }

// Site specific constants
define("WEBSITE_ID", '5');
define("DB_PREFIX", "eb");
define("WEBSITENAME", "EuroEngineerJobs");
define("SEARCH_PAGE", "job_search.php");
define("DEFAULT_TITLE", "EuroEngineerJobs - Engineer Jobs in Europe");
define("DOMAIN_NAME", "EuroEngineerJobs.com");
define("DOMAIN_URL", "http://www.euroengineerjobs.com");
define("CURRENCY", "&euro;");
define("TITLE_IS_JOB_DESC", true);	//Show job desc as title
define("SALES_EMAIL", "info@euroengineerjobs.com");
define("INFO_EMAIL", "info@euroengineerjobs.com");
define("JOB_LISTING_DISPLAY_COUNTRY", true);
define("JOB_URL_DISPLAY_COUNTRY", true);

$site_meta_tags = '
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  ';

//Meta Constants 
//==============

//Default Keywords
define("META_KEYWORDS_DEFAULT" , "jobs,job,engineer,engineering,Europe,Euro,English,recruitment,recruit,recruiting,vacancy,vacancies,international,France,Germany,Italy,UK,England,Belgium,Netherlands,Switzerland,Austria");
define("META_KEYWORDS_BASE" , "jobs,job,engineer,engineering,Europe,Euro,English speaking,international,multinational");
//Category Search Page
define("META_DESCRIPTION_BASE", "EuroEngineerJobs shows Engineer Jobs in Europe for international and English speaking jobseekers. Engineer jobs in Belgium, France, Germany, Netherlands, Switzerland, United Kingdom (UK) and more. Jobs in Europe for mechanical engineers and electrical engineers. Also engineer jobs in Europe for automotive engineers, aerospace engineers, chemical engineers, civil engineers, electronic engineers, industrial engineers and oil and gas engineers.");
define("META_DESCRIPTION_CONTINUATION_CATEGORY" , " Jobs for Engineers in Europe from EuroEngineerJobs - the job board for Engineer Jobs in Europe.");
//Country Search Page
define("META_DESCRIPTION_COUNTRY_PREFIX" , "Engineer Jobs in ");
define("META_DESCRIPTION_CONTINUATION_COUNTRY" , " from EuroEngineerJobs - the job board for Engineer Jobs in Europe.");

define("DEFAULT_SEARCH_PAGE_TITLE" , DOMAIN_NAME." - Search for Engineer Jobs in Europe");
define("DESCRIPTIVE_PAGE_TITLE_CONTINUATION" , " Jobs for Engineers in Europe");
define("DESCRIPTIVE_COUNTRY_PAGE_TITLE_PREFIX" , DOMAIN_NAME." - Engineer Jobs in ");
define("DESCRIPTIVE_ORGANISATION_PAGE_TITLE_PREFIX", DOMAIN_NAME. " - Jobs at ");
define("JOB_DISPLAY_PAGE_DESC_CONTINUATION" , "Engineer Jobs in Europe from " . DOMAIN_NAME);
define("DESCRIPTIVE_DISPLAY_COUNTRY_PREFIX" , "Engineer Jobs in ");
define("DEFAULT_DESCRIPTIVE_DISPLAY", "Job Search Results");
define("DEFAULT_PARTNER_DISPLAY", "Partners");
define("DESCRIPTIVE_DISPLAY_ORGANISATION_PREFIX" , "Engineer jobs at ");
//Define suffix for category search titles
define("CATEGORY_SEARCH_CONTINUATION", " jobs in Europe");

define("JOB_DISPLAY_PAGE", "job_display.php");
define("EDUCATION_PAGE", "education.php");

//CSS
define ("CSS_BASE", 						"/base.css");
define ("CSS_JOB_FILE", 					"/base_jobs.css");
define("CSS_FILE", 							"/euroengineerjobs.css");
define ("CSS_MOBILE_FILE", 					"/euroengineerjobs_mobile.css");
define ("CSS_JOB_MOBILE_FILE", 				"/euroengineerjobs_jobs_mobile.css");
define ("MOBILE_CSS_MAX_SIZE",				"603");
define("JOB_LINK_CSS_CLASS",				"basicJobContainer");
define("JOB_LINK_HIGHLIGHT_CSS_CLASS",		"highlightedJobContainer");
define("JOB_LINK_PREMIUM_CSS_CLASS",		"premiumJobContainer");
define("HOSTED_JOB_DIV_CLASS", 				"ebOurJobs");
define("LOGO_300", 							"images/site_logo.jpg");

//Send to friend
define("SEND_TO_FRIEND_ENABLED",		true);
define("SEND_TO_FRIEND_IMAGE",			"images/sendtofriend.png");
define("SEND_TO_FRIEND_EMAIL_SUBJECT",	"I%20found%20an%20interesting%20Job%20on%20EuroEngineerJobs.com%20for%20you");
define("SEND_TO_FRIEND_EMAIL_BODY",		"I%20thought%20this%20job%20would%20interest%20you.%20You%20can%20find%20the%20job%20listed%20here:%20");
define("SEND_TO_FRIEND_EMAIL_ALT_TEXT",	"Email this job");
define("SEND_TO_FRIEND_EMAIL_TITLE_TEXT","Tell a friend about this job");

define("SHOW_QUICK_CLICKS_NEXT_TIME","Y");
define("DONT_SHOW_QUICK_CLICKS_NEXT_TIME","N");


//General constants
define( "FILE_SEPARATOR","|" );
define( "_FIELD_SEPARATOR", "|");
define( "_EXPLODE_SEPARATOR", "|" );
define( "DATA_FILE_PATH", "data/" );
define( "ERROR_LOG_FILE", "../eengj_error_log.txt" );
define( "DEBUG_LOG_FILE", "../eengj_debug_log.txt" );
define( "KEYWORD_LOG_FILE", "../eengj_keyword_log.txt" );
define( "_NULL","null" );	//OLD
define( "NULL_STR", "NULL" );
if(!defined("DEBUG")) define("DEBUG", false);
define("WRITE_TO_KEYWORD_LOG", true);

//Attribute Ids
define( "ATTR_JOB_DESC", 	"JOB_DESC" );
define( "ATTR_ORG_NAME", 	"ORG_NAME" );
define( "ATTR_JOB_URL", 	"JOB_URL" );
define( "ATTR_LINKORGIMG", 	"LINKORGIMG" );
//TODO: Old attribute ids: replace later
define ("_ATTR_JOB_DESC", 	"JOB_DESC");
define ("_ATTR_ORG_NAME", 	"ORG_NAME");
define ("_ATTR_JOB_URL", 	"JOB_URL");
define ("_ATTR_COMMENT",	"COMMENT");
define ("_ATTR_LINKORGIMG",	"LINKORGIMG");

define("_FLAG_HIGHLIGHT", 	"HIGHLIGHT");	//In text file, shows highlight
define("_FLAG_REFER", 		"REFER");			//In text file, shows referrer

//Search
define( "NEAR_DEADLINE_NUM_DAYS", 5 );
define( "LOCATION_BRUSSELS", "Brussels" );	//Used in search
define( "LINK_IMAGE_PATH", "ourjobs/" );	//Used when displaying job links with images
define( "MAX_NUM_JOBS_RETURNED", 200 );		//Max rows returned in search

//Job submission
define( "JOB_AD_SUBMIT_LOG_FILE", 				"../eengjgj_ad_submit_log.txt" );
define( "JOB_AD_SUBMIT_ERROR_LOG", 				"../eengj_ad_submit_error_log.txt" );
if(!defined("INTERNAL_EMAIL_RECIPIENT")) define ("INTERNAL_EMAIL_RECIPIENT", "info@eurojobsites.com");
define ("NO_REPLY_EMAIL", 						"noreply@euroengineerjobs.com");
define ("JOB_AD_SUBMIT_EMAIL_SENDER_DISPLAY", 	"JOB_SENT@EuroEngineerJobs.com");
define ("JOB_AD_TYPE_BASIC", 			1);
define ("JOB_AD_TYPE_STANDARD_NGO", 	2);
define ("JOB_AD_TYPE_STANDARD", 		3);
define ("JOB_AD_TYPE_HIGHLIGHT", 		4);
define ("JOB_AD_TYPE_HIGHLIGHT_LOGO",	5);
define ("JOB_AD_PRICE_CURRENCY_NAME", 	"Euros");
define( "MAX_LENGTH_JOB_DETAIL_STORED", 20000 );
define( "MAX_LENGTH_BILLING_ADDRESS_STORED", 255 );
define( "WRITE_JOB_SUBMISSION_TO_DB",	true);
define('CLIENT_LOGO_UPLOAD_DIR',  "/eb_upload/"); //Directory which logos are uploaded to from the job send form

//Customer confirmation email
define("JOB_ADD_CONFIRMATION_EMAIL_SEND" , true);

//Promotions files
define( "EDUCATION_PROMOTIONS_DATA_FILE", 		"eengj_education_promotions.txt" );
define( "CAREER_GUIDE_PROMOTIONS_DATA_FILE", 	"eengj_guide_promotions.txt" );
define( "EB_ONLY_BANNER_DATA_FILE", 			"eengj_only_banner.txt" );
define( "PROMO_FEATURE_JOBS_DATA_FILE", 		"eengj_promo_feature_jobs.txt" );

define( "SEARCH_DESCRIPTIVE_TYPE_LOCATION", 1 );
define( "SEARCH_DESCRIPTIVE_TYPE_CATEGORY", 2 );
define( "SEARCH_DESCRIPTIVE_TYPE_KEYWORD", 	3 );
define( "SEARCH_DESCRIPTIVE_TYPE_KEYWORD_LOCATION", 4);
define( "SEARCH_DESCRIPTIVE_TYPE_ORGANISATION", 5);
define( "SEARCH_DESCRIPTIVE_TYPE_DESCRIPTIVE", 6);


//Hides or unhides country value on more jobs in. True will hide country.
define("MORE_JOBS_IN_HIDE_COUNTRY", false);

//For email_template
define( "HTML_HEADER_SECTION_STYLE", 	"padding: 1px 0px 10px 5px; border: 0px; margin: 0px 0px 5px 5px; font-size: 10pt; font-family: Arial; color: #000000; " );
define( "HTML_JOB_LINK_SECTION_STYLE", 	"width:600px;padding: 0 0 0 5px; border: 0px; margin: 0 0 20px 5px; font-size: 10pt; font-family: Arial; color: #000000; " );
define( "HTML_JOB_BASIC_STYLE", 		"margin: 0 0 5px 5px; font: 9pt Arial; color: #000000;" );
define( "HTML_JOB_TITLE_A_STYLE", 		"color: #003366; font-weight: bold; text-decoration: none;" );
define( "HTML_JOB_HIGHLIGHT_STYLE", 	" background-color: #C3D8FF;" );
define( "HTML_JOB_PREMIUM_IMAGE_STYLE", " width:80px; height:40px; border: 1px solid silver;" );
define( "HTML_JOB_BASIC_TABLE_ATTR", 	"class='job' border='0' cellspacing='3' cellpadding='0' style='background-color:#E1E9F2;' width='590'" );
define( "HTML_JOB_PREMIUM_TABLE_ATTR", 	"class='job' border='0' cellspacing='3' cellpadding='0' style='background-color:#E1E9F2;margin-bottom:5px;border:1px solid #E8EFF6;' width='590'" );
define( "HTML_JOB_PREMIUM_TABLE_ATTR_HIGHLIGHT", " class='job' border='0' cellspacing='3' cellpadding='0' style='margin-bottom:5px; background-color:#FFFFFF;border:1px solid #E32F2F;' width='590'" );
define( "HTML_JOB_PREMIUM_COL1_ATTR", 	"style='width: 90px'" );
define( "HTML_JOB_DESC_ATTR", 			"style='font-size: 13px;font-family: Arial; color: #000000;'" );
define( "HTML_JOB_LINK_H1_STYLE", 		" margin: 10px 0 10px 0; background: none; border-bottom:2px solid #E32F2F; color: #2F3F53; font-size: 10pt; font-family: Arial; font-weight: bold;" );
define( "HTML_JOB_POSTED_ATTR", 		"style='font-size:11px; color:#666666;'" );
define( "MISSED_JOBS_DISPLAY_PERIOD", 	14);

//Promotion pages constants
define( "EDUCATION_PAGE_PROMOTIONS_DATA_FILE", 	"eengj_education_page_promotions.txt");
define( "HOUSE_BANNER_DATA_FILE", 				"eengj_house_banners.txt");
define( "HOUSE_SKYSCRAPER_DATA_FILE", 			"eengj_house_skyscrapers.txt");

//Cache Constants
if(!defined("DATABASE_CACHE_ENABLED")) define( "DATABASE_CACHE_ENABLED" , true);
define( "CACHE_DIRECTORY", "../eb_cache/");
define(	"CACHE_PREFIX", "eengj_");

//Cache Names and Times.
//======================
//Welcome.php job count.
define( "CACHE_NAME_COUNT_LIVE_JOBS" , "count_live_jobs");
define( "CACHE_TIME_COUNT_LIVE_JOBS" , 120);
//Welcmome.php jobs premium.
define( "CACHE_NAME_WELCOME_LATEST_PREMIUM_JOBS" , "welcome_latest_premium_jobs");
define( "CACHE_TIME_WELCOME_LATEST_PREMIUM_JOBS" , 122);
//Welcmome.php jobs basic.
define( "CACHE_NAME_WELCOME_LATEST_BASIC_JOBS" , "welcome_latest_basic_jobs");
define( "CACHE_TIME_WELCOME_LATEST_BASIC_JOBS" , 124);
//Right column highlighted jobs infobox.
define( "CACHE_NAME_HIGHLIGHTED_INFOBOX" , "highlighted_jobs_infoxbox");
define( "CACHE_TIME_HIGHLIGHTED_INFOBOX" , 126);
//Premium scrolling logos cache.
define( "CACHE_NAME_PREMIUM_LOGOS_SCROLLING", "premium_logos_scrolling");
define( "CACHE_TIME_PREMIUM_LOGOS_SCROLLING", 200);
//Leaderboard banner cache.
define( "CACHE_NAME_LEADERBOARD_BANNER_DISPLAY", "leaderboard_banner_display");
define( "CACHE_TIME_LEADERBOARD_BANNER_DISPLAY", 205);
//Rectangle banner cache.
define( "CACHE_NAME_RECTANGLE_BANNER_DISPLAY", "rectangle_banner_display");
define( "CACHE_TIME_RECTANGLE_BANNER_DISPLAY", 220);
//Counter results cache.
define( "CACHE_NAME_COUNTER_RESULTS", "counter_results");
define( "CACHE_TIME_COUNTER_RESULTS", 260);
//Search Promotions cache.
define( "CACHE_NAME_SEARCH_PROMOS", "search_promotions");
define( "CACHE_TIME_SEARCH_PROMOS", 300);
//Promotions cache.
define( "CACHE_NAME_PROMOS", "promotions");
define( "CACHE_TIME_PROMOS", 295);
//Partial Cache Time
define("CACHE_TIME_PARTIAL", 60);

//Promotions constants
//=====================
//Education and Courses
define("EDU_COURSES_GROUP_ID" , 8);
define("TOP_JOBS_BOX_DISPLAY_COUNTRY", true);

//Banner constants
//=====================
define("SKYSCRAPER_BANNER_GROUP_ID" , 		1);
define("LEADERBOARD_BANNER_GROUP_ID" , 		2);
define("RECTANGLE_BANNER_GROUP_ID" , 		3);
define("ANALYTICS_TRACKING_CODE" , 			"UA-75170-13");

//Premium Logo Scroller
//=====================
define("DISPLAY_PREMIUM_LOGO_SCROLLER", true);
define("MINIMUM_PREMIUM_LOGO_FOR_SCROLLER", 3); //Below this amount of premium logos, the scroller will not display.
define("PREMIUM_LOGO_FOR_SCROLLER_AMOUNT", 40); //The total number logos will display in the premium scroller. NOTE: Do not increase this without increasing the size of the containing div.

//Displayed in keyword box before search.
define("SEARCH_KEYWORD_INITIAL_TEXT", "- Keyword or job title -");
define("SEARCH_KEYWORD_LOCATION_INITIAL_TEXT", "- Location (e.g. France or Switzerland) -");

define('JOB_COUNT_COUNTRY_LINK_PRE_TEXT', 'Engineer Jobs in ');

define('REFERENCE_TEXT_REPLACE_ID', 'TEXT_REPLACE');

//Tag cloud display variables
define('TAG_CLOUD_COUNTRY_DISPLAY', 11);
define('TAG_CLOUD_CATEGORY_DISPLAY', 11);

//Pathing may be overwritten for 'special cases', such as sitemap generator 
if(!defined('SWIFT_INCLUDE_PATH')) define('SWIFT_INCLUDE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/../lib/swift/lib/swift_required.php');

//Pathing will be overwirrten when run from the scripts dir
if(!defined('IMPRESSION_FILE_DIR')) define('IMPRESSION_FILE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/../eb_impression/');
if(!defined('IMPRESSION_FILE')) define('IMPRESSION_FILE', 'impression_record.txt');

define('JOB_DISPLAY_IMPRESSION_ID', 1);
define('JOB_APPLY_IMPRESSION_ID', 2);
define('URL_REDIRECT_COUNTER_IMPRESSION_ID', 3);
define('BANNER_IMPRESSION_ID', 4);

if(!defined('EJS_MODULES_DIR')) define('EJS_MODULES_DIR', $_SERVER['DOCUMENT_ROOT'] . '/ejs_modules/');

//Email reponse template constants
define('CACHE_TIME_EMAIL_RESPONSE_TEMPLATE', 1200);
define('BASIC_EMAIL_REPONSE_TEMPLATE_ID', 237);
define('STANDARD_EMAIL_REPONSE_TEMPLATE_ID', 238);
define('HIGH_VISIBILITY_EMAIL_REPONSE_TEMPLATE_ID', 239);

define("CDN_URL", "http://www2.euroengineerjobs.com");

define("MAILJET_API_KEY", 'fc24d529484687ac7cd8ee725c9b41b7');
define("MAILJET_API_SECRET_KEY", 'xyz'); //Check in as xyz, update on live
if(!defined('MAILJET_API_INCLUDE_PATH')) define('MAILJET_API_INCLUDE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/../lib/mailjet/php-mailjet.class-mailjet-0.1.php');

if(!defined('FEEDBACK_EMAIL_TARGET')) define('FEEDBACK_EMAIL_TARGET', 'feedback@eurojobsites.com');
if(!defined('FEEDBACK_ENABLED')) define('FEEDBACK_ENABLED', true);

?>