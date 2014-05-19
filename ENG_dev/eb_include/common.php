<?php
/**
 * Common 
 * 
 * This file must be included by all pages in the site. It includes all files needed to operate the website, 
 * it creates global classes, and defines the __autoload function, which loads classes automatically. 
 * 
 * Dependency: This needs classes found in the EJS_MODULES_DIR directory.
 *
 * If not on the live server, you may need to override the modules directory in local_config.php, with a line like this:
 * define("EJS_MODULES_DIR", "C:/dev/apache_docs/EclipseWorkspace/ejs_modules/");
 *
*/

/**
 * EJS Auto Load 
 * 
 * Attempts to load any undefined classes when they're called.
 * Class files must be called CLASS_NAME_class.php, and must be in EJS_MODULES_DIR.
 * 
 * @param string The name of the class to be called $class_name
 */
function ejs_autoload($class_name){
	
	if(substr(EJS_MODULES_DIR, -1) != "/") die('Modules directory path must include trailing slash. Currently ' . EJS_MODULES_DIR);

	if(!is_dir(EJS_MODULES_DIR)) die('Modules directory missing. Expected at ' . EJS_MODULES_DIR);
	
	$file_name = EJS_MODULES_DIR . $class_name . '_class.php';
    
	if(is_file($file_name)) require_once $file_name;
}

//Register autoload fuction
spl_autoload_register('ejs_autoload');

//Include local files
require_once "eengj_constants_inc.php";  
require_once "../eb_inc/admin_config.php";
require_once "eengj_initialisation_inc.php"; 

//Start session for mobile verion
session_start();

//set required inactivity time in seconds. 3600 = 1 hour
$inactive = 3600;
//check if timeout is set 
if(isset($_SESSION['timeout']) ) {
  //use last recorded session time to get length of inactivity
  $session_life = time() - $_SESSION['timeout'];
  //if inactivity time is greater than chosen $inactive time destroy current session
  if($session_life > $inactive) { 
    session_destroy(); 
  }
}
//set timeout to current time
$_SESSION['timeout'] = time();


//Objects always available
$banner_manager	  = new Banner_Manager(ANALYTICS_TRACKING_CODE);	//Use localised version
$job_list_manager = new Job_List_Manager();

if(DEBUG){
	error_reporting(E_ALL);		//Check all variables are declared and report all warnings
}

?>