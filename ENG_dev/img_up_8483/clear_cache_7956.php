<?php

/**
 * Clear Cache 7956
 *
 * Used to clear cache files.
 * Dependency: Database_Cache_Manager_class.php
 *
 * $Id: clear_cache_7956.php 2937 2011-07-14 08:56:07Z jamescollier $
 */

chdir("..");
require ("eb_include/common.php");
?>

<html>
<head>
	<title>EuroJobsites Cache Manager</title>
	<link rel='stylesheet' href='<?php print CSS_FILE; ?>' />

</head>
<body style="text-align:center;background:none;">
<?php
	$method = $_SERVER['REQUEST_METHOD'];
	//Check form has been resubmitted.
	if($method == "POST"){
		$clear_cache = new Database_Cache_Manager;
		if($clear_cache->clear_cache_directory()){
			echo "<p>You have successfully cleared the " . WEBSITENAME . " cache.</p>";
		}else{
			echo "<p style='color:red'>There has been an error whilst trying to clear the " . WEBSITENAME . " cache, please contact an administrator.</p>";
		}
	echo "<script type='text/javascript'> setTimeout('self.close();', 10000); </script>";
	return;
	}
?>
<p>
	Click the link below to clear the <?PHP echo WEBSITENAME ?> cache.
</p>
<p>
	This can slow the site down and should only be used sparingly and when completely necessary.
</p>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="clear_cache_form">
</form>
<p>
	<br><a href="javascript:void(0);" onClick="document.forms['clear_cache_form'].submit();">Clear <?PHP echo WEBSITENAME?> Cache Now!</a>
</p>
</body>
</html>