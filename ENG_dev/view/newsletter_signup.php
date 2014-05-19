<div class="ebSection">
  
  <?php echo Page_Partial::get_html_for_partial(254, "eengj_newsletter_top_partial"); ?>
  
  <br>
  
  <form class="newsletterSubscriptionForm" method="post" action="newsletter/subscribe"
  style="margin-right:25px; margin-left:25px">
		Email Address:
        <input type="email" name="email" placeholder="Email Address">
        <input type="hidden" name="newsletter_id" value="1">
		<input class="newsletterSubscribe" type="submit" value="Subscribe" name="modify">
  </form>
  
  <br>
  
  <?php echo Page_Partial::get_html_for_partial(253, "eengj_newsletter_bottom_partial"); ?>

</div>

<div id="google_remarketing" style="display:none">
    <!-- Google Code for EuroEngineerJobs -->
    <!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
    <script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 1071128745;
    var google_conversion_label = "vj7SCInomgUQqcHg_gM";
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1071128745/?value=0&amp;label=vj7SCInomgUQqcHg_gM&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>
</div>
