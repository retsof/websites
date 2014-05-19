<?php
/**
 * New Overlay Inc
 *
 * Contains necessary components to display newsletter subscription overlay.
 *
 * Called by bodyTopInc.php, and both hosted and none hosted job page.
 * Will only display on hosted pages, but will count page views on both
 * hosted and non-hosted job pages.
 *
 * $Id: _newsletter_overlay_inc.php 6310 2014-01-03 11:23:36Z jamescollier $
 */
?>
<script type="text/javascript" src="newsletter_overlay.js"></script>

<div id="newsletterOverlay" title="<?php echo WEBSITENAME?> Newsletter" style="display:none">
        <p>
        	Have you signed up for the <?php echo WEBSITENAME?> newsletter yet?
        </p>
        <p>
        	To receive weekly job listings from <?php echo WEBSITENAME?>, enter your email address and press subscribe.
        </p>
        <form name="newsletter_overlay_form" method="post" action="newsletter/subscribe">
                          <input type="email" name="email">
          <input type="hidden" name="newsletter_id" value="1">
        </form>
</div>
