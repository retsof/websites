<!DOCTYPE HTML>
	<html lang="en">
	<head>
	  <title><?php print $meta_title; ?></title>
	  <base href="http://<?php print $_SERVER['HTTP_HOST'] ?>" >
	  <script type="text/javascript" src="<?php print Utility::get_instance()->get_file_with_version('jquery.js') ?>"></script>
	  <script type="text/javascript" src="<?php print Utility::get_instance()->get_file_with_version('jquery_ui.js') ?>"></script>
	  <link href="<?php print Utility::get_instance()->get_file_with_version(CSS_BASE); ?>" rel="stylesheet" type="text/css">
	  <link href="<?php print Utility::get_instance()->get_file_with_version(CSS_JOB_FILE); ?>" rel="stylesheet" type="text/css">
	  <link href="<?php print Utility::get_instance()->get_file_with_version(CSS_FILE); ?>" rel="stylesheet" type="text/css">
	  <link href="<?php echo Utility::get_instance()->get_file_with_version('overlay.css') ?>" rel="stylesheet" type="text/css">
	  <script type="text/javascript" src="<?php print Utility::get_instance()->get_file_with_version('cookie.js') ?>"></script>
	  <meta name="viewport" content="width=device-width, minimum-scale=0.5, maximum-scale=1.5" />
	  <link rel="stylesheet" type="text/css" media="screen and (max-width: <?php echo MOBILE_CSS_MAX_SIZE ?>px)" href="<?php print Utility::get_instance()->get_file_with_version(CSS_MOBILE_FILE); ?>" />
	  <script type="text/javascript" src="<?php print Utility::get_instance()->get_file_with_version('livesearch.js') ?>"></script>
      <script type="text/javascript" src="<?php print Utility::get_instance()->get_file_with_version('highlighted_job_infobox.js') ?>"></script>
	  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
	  <meta http-equiv="content-type" content="text/html;charset=utf-8" >
	  <meta name="description" content="<?php echo $meta_keywords_content ?>">
  	  <meta name="keywords" content="<?php echo $meta_keywords_display ?>>">
	</head>