<body>

<script type="text/javascript">
$(document).ready(function(){
	var image = new Image();
	image.onload = function() {
		$("body").css("background", "url('images/site_background.jpg') repeat-x fixed center bottom #FFFFFF");
	};
	image.src = 'images/site_background.jpg';
});
</script>

<?php if(FEEDBACK_ENABLED) require_once('view/_feedback_overlay_inc.php'); //Only include if FEEDBACK_ENABLED is true ?>

<!-- BEGIN wrapper -->
<div id="wrapper">
  <!-- BEGIN header -->
  <div id="header">
    <!-- begin logo -->
    <div class="logo"><p><a href="/"><img src="images/site_logo.jpg" alt="<?php echo WEBSITENAME ?> Logo" title="<?php echo DEFAULT_TITLE ?>"></a></p></div>
    <!-- end logo -->
    <div class="bannerAdFrame"><?php print $banner_manager->get_random_banner_display(LEADERBOARD_BANNER_GROUP_ID, CACHE_NAME_LEADERBOARD_BANNER_DISPLAY, CACHE_TIME_LEADERBOARD_BANNER_DISPLAY); ?></div>
    <div class="break"></div>
   	<?php if(Reference::get_reference_value_by_name('DISPLAY_CV_HIGHLIGHT_IMG') == 1): ?>
    <div id="cv_upload" class="noMobile">
    	<img class="cv_highlight_img" alt="Upload your CV" src="images/cv_highlight_img.png" />
    </div>
    <?php endif; ?>
  </div>
  <!-- END header -->
  <!-- BEGIN body -->
  <div id="main">
    <!-- begin navigation -->
    <div class="navigation">
      <ul>
        <li><a target="_top" href="/job_search">Job Search</a></li>
        <li><a target="_top" href="https://cv.euroengineerjobs.com">Upload CV</a></li>
        <li><a target="_top" href="/education">Education</a></li>
        <li class="recruiterTab"><a target="_top" href="/recruit">Recruiters</a></li>
      </ul>
    </div>
    <!-- end navigation -->
    <div class="navigation2 noMobile">
      <ul>
        <li><a target="_top" href="/">Home</a></li>
        <li><a target="_top" href="post_job">Post Job</a></li>
		<li><a target="_top" href="advertise">Advertise</a></li>
		<li><a target="_top" href="about_us">About Us</a></li>
        <li class="nav2last"><a target="_top" href="contact_us">Contact Us</a></li>
      </ul>
    </div>
    <div class="break"></div>
    <!-- BEGIN content -->
    <div id="content">
