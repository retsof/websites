 </div>
    <!-- END content -->
    <!-- BEGIN sidebar -->
    <div id="sidebar" class="noMobile">
      <div class="infoBox sidebarTopJobs">
        <h3><a href="top_jobs">Top Jobs</a></h3>
	         <p id="highlightedJobsInfoboxBtmText">
				<a href="/post_job/high_visibility">Your job here?</a>
			</p>
			<div id = "highlightedJobsInfoBoxContain">
			<div id = "highlightedJobsInfoboxWrapper">
				<table>
					<tbody>
						<tr>
							<td>
								<p id = "highlightedJobsInfoboxImg">
								</p>
							</td>
							<td>
								<p id = "highlightedJobsInfoboxTxt">
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
      </div>

      <div class="box">
        <div class="c1">
          <a href="post_job">
          	<img width="305" height="58" src="images/post_a_job.jpg" alt="Post a job on <?php echo WEBSITENAME ?>" title="Click here to post a job on <?php echo WEBSITENAME ?>!">
          </a>
         </div>
       </div>

      <form novalidate action="newsletter/subscribe" method="post">
        <h3><a href="newsletter">Free Newsletter</a></h3>
        <p>
          <input type="email" name="email" placeholder="Email Address">
          <input type="hidden" name="newsletter_id" value="1">
        </p>
        <button type="submit">Subscribe</button>
      	<p class="newsletterFormPrivacyPolicy">We won't sell your email address - <a href="privacy_policy">privacy policy</a>.</p>
      </form>
      <!-- end search -->

	  <?php
	  	//Get 'search term partners'.
	  	//Requests two promotions, returns false if there are less than two search promotions (and consequently doesn't display).
		$promotions_ad_manager = new Promotional_Ad_Manager();
		$partners_infobox_promotion_arr = $promotions_ad_manager->get_infobox_by_search_term(null, 2); //No search term given, so get all.
	?>

	  <?php $imu_banner = $banner_manager->get_random_banner_display(RECTANGLE_BANNER_GROUP_ID, CACHE_NAME_RECTANGLE_BANNER_DISPLAY, CACHE_TIME_RECTANGLE_BANNER_DISPLAY); ?>

      <?php if($imu_banner): ?>
      	<div class = "imuWrapper">
      		<?php print $imu_banner ?>
        </div>
      <?php endif; ?>

	<div class="tagCloudWrapper">
	      <?php 
	      echo 
	      	$job_count->get_tag_cloud_display_html(
	      		10, 	//Lower Font Limit
	      		20, 	//Upper Font Limit
	      		TAG_CLOUD_COUNTRY_DISPLAY, 	//Number of countries to display
	      		TAG_CLOUD_CATEGORY_DISPLAY, //Number of categories to display
	      		$static_tag_cloud_var_arr, 
	      		$tag_cloud_replacement_display_text_arr
	      	); 
	      ?>
	</div>
	  
	<?php if($partners_infobox_promotion_arr): //Check enough promotions have been returned ?>
		<div class="infoBox">
			<h3><a title="<?php echo WEBSITENAME ?> Partners" href="partners">Partners</a></h3>
			<div class="partnersBox">
		   		<p>
					<a title='<?php echo $partners_infobox_promotion_arr[0]->get_infobox_text() ?>' href='<?php echo $partners_infobox_promotion_arr[0]->get_infobox_target_url() ?>'>
						<img height="60" width="120" src='<?php echo $partners_infobox_promotion_arr[0]->get_infobox_image_url() ?>' alt='<?php echo $partners_infobox_promotion_arr[0]->get_infobox_text() ?>' >
					</a>
					<br>
					<a title='<?php echo $partners_infobox_promotion_arr[0]->get_infobox_text() ?>' href='<?php echo $partners_infobox_promotion_arr[0]->get_infobox_target_url() ?>'>
						<?php echo $partners_infobox_promotion_arr[0]->get_infobox_text() ?>
					</a>
				</p>
				<p>
					<a title='<?php echo $partners_infobox_promotion_arr[1]->get_infobox_text() ?>' href='<?php echo $partners_infobox_promotion_arr[1]->get_infobox_target_url() ?>'>
						<img height="60" width="120" src='<?php echo $partners_infobox_promotion_arr[1]->get_infobox_image_url() ?>' alt='<?php echo $partners_infobox_promotion_arr[1]->get_infobox_text() ?>' >
					</a>
					<br>
					<a title='<?php echo $partners_infobox_promotion_arr[1]->get_infobox_text() ?>' href='<?php echo $partners_infobox_promotion_arr[1]->get_infobox_target_url() ?>'>
						<?php echo $partners_infobox_promotion_arr[1]->get_infobox_text() ?>
					</a>
				</p>
				<div class="break"></div>
			</div>
	  	</div>
	  <?php endif; ?>

	  <?php $career_guide_infobox = $career_guide_infobox_arr[array_rand($career_guide_infobox_arr)]; //Get a random career guide ?>
	
	  <?php if(!empty($career_guide_infobox)): ?>	
		<div class="infoBox careerInfoBox">
			<h3><a href="career_guide">Career Guides</a></h3>
			<div class="careerInfoBoxInner">
				<img src="<?php echo $career_guide_infobox['image'] ?>" alt="Self evaluation guide" />
				<h3><?php echo $career_guide_infobox['title'] ?></h3>
				<p><?php echo $career_guide_infobox['text'] ?></p>
				<p><?php echo $career_guide_infobox['link'] ?></p>
				<div style="clear:both"></div>
			  </div>
		</div>
	  <?php endif; ?>

	  <?php
      $fb_page_url = "http://www.facebook.com/EuroEngineerJobs/189209714527879"; //profile id /189209714527879
      $fb_like_url = urlencode($fb_page_url);
      ?>

	  <div class="infoBox">
	    <h3><a target="_blank" href="<?php echo $fb_page_url ?>">Find Us On Facebook</a></h3>
		<p>
		  <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $fb_like_url ?>&amp;layout=standard&amp;show_faces=false&amp;width=272&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=26" frameborder="0" style="border:none; overflow:hidden; width:272px; height:26px;"></iframe>
		</p>
	  </div>	
	
    </div>
    <!-- END sidebar -->
    <div class="break"></div>
  </div>
  <!-- END body -->
  
  <?php require '_footerStandardInc.php' ?>
  
</div>
<!-- END wrapper -->
<?php require_once('_cookie_notification_inc.php'); ?>
<?php if(isset($newsletter_popup_shown) && $newsletter_popup_shown) require_once('view/_newsletter_overlay_inc.php'); //Display newsletter overlay, $newsletter_popup_shown is defaulted to true in site controller ?>

<?php
//Call google analytics, cim etc
$banner_manager->print_page_trackers();
?>

</body>
</html>
