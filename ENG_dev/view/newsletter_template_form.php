<?php
/**
 * Newsletter Template Form  
 * 
 * View to display internal newsletter creation form  
 * 
 * $Id: newsletter_template_form.php 5689 2013-09-02 08:57:22Z jamescollier $
 */
?>
<script>
	//Check that min date is smaller than max date
	//If it is not, no jobs will be returned
	$(document).ready(function(){
		$('#email_template_form').submit(function() {
			if($('#p_min_date').val() > $('#p_max_date').val()){
				alert('Min date must be greater than max date. Please fix this before continuing.');
				return false;
			}
		});
	});
</script>

<form id="email_template_form" target="_blank" method="get" action="<?php $_SERVER['PHP_SELF']; ?>">
	<div class="ebSection">
		<h1>Email Template</h1>
		<fieldset class="emailTemplate">
			<legend><strong>Select Dates</strong></legend>
			<label for="p_min_date">Select jobs between datetime</label>
			<input id="p_min_date" size="15" name="p_min_date" type="text" value="<?php print $default_min_date; ?>">
			<label for="p_max_date">and</label>
			<input id="p_max_date" size="15" name="p_max_date" type="text" value="<?php print $default_max_date; ?>">
		</fieldset>

		<fieldset class="emailTemplate">
			<legend><strong>Image Banner</strong></legend>
			<label>Banner Image Location</label>
			<br>
			<input readonly="readonly" type="text" id="p_banner_img" name="p_banner_img" style="width:600px;" value="<?php if ($newsletter_banner['image_url']) echo $newsletter_banner['image_url'] ?>">
			<br>
			<br>
			<label>Banner Link Target URL</label>
			<br>
			<input readonly="readonly" type="text" id="p_banner_target_url" name="p_banner_target_url" style="width:600px;" value="<?php if ($newsletter_banner['target_url']) echo $newsletter_banner['target_url'] ?>">
			<br>
			<br>
			<label>Banner Alt Text</label>
			<br>
			<input readonly="readonly" type="text" id="p_banner_alt" name="p_banner_alt" style="width:600px;" value="<?php if ($newsletter_banner['alt_text']) echo $newsletter_banner['alt_text'] ?>">
			<br>
		</fieldset>

	</div>
	<div class="ebSection">
		<fieldset class="emailTemplate">
			<legend><strong>Promotion (Logo with Text)</strong></legend>
			<label>Promotion Title</label>
			<input readonly="readonly" type="text" id="p_promotion_title" name="p_promotion_title" style="width:600px;" value="<?php if ($newsletter_text_ad['title']) echo $newsletter_text_ad['title'] ?>">
			<br>
			<br>
			<label>Promotion Image</label>
			<br>
			<input readonly="readonly" type="text" id="p_promotion_img" name="p_promotion_img" style="width:600px;" value="<?php if ($newsletter_text_ad['image_url']) echo $newsletter_text_ad['image_url'] ?>">
			<br>
			<br>
			<label>Promotion Link Target URL</label>
			<br>
			<input readonly="readonly" type="text" id="p_promotion_target_url" name="p_promotion_target_url" style="width:600px;" value="<?php if ($newsletter_text_ad['image_target_url']) echo $newsletter_text_ad['image_target_url'] ?>">
			<br>
			<br>
			<label>Promotion Alt Text</label>
			<br>
			<input readonly="readonly" type="text" id="p_promotion_alt" name="p_promotion_alt" style="width:600px;" value="<?php if ($newsletter_text_ad['image_alt_text']) echo $newsletter_text_ad['image_alt_text'] ?>">
			<br>
			<br>
			<label>Promotion Text</label>
			<br>
			<textarea readonly="readonly" id="p_promotion_text" name="p_promotion_text" rows="7" cols="75";"><?php if ($newsletter_text_ad['content']) echo $newsletter_text_ad['content'] ?></textarea>
			<br>
		</fieldset>

	</div>
	<div class="ebSection">
		<fieldset class="emailTemplate">
			<legend><strong>Comment</strong></legend>
			<textarea readonly="readonly" id="p_comment" name="p_comment" rows="7" cols="75"><?php echo $comment ?></textarea>
		</fieldset>
	</div>
	<div class="ebSection">
		<fieldset class="emailTemplate">
			<legend><strong>Manual HTML Input</strong></legend>
			<label>HTML code for text ads</label>
			<br>
			<textarea name="p_text_ad_code" cols="75" rows="8"></textarea>
			<br>
		</fieldset>
		<br>
		<input type="submit"  name="p_submit" value="Display HTML Email">
		<input type="submit"  name="p_submit" value="Display Text Email">
		&nbsp;
		<a href="index.php">Back to index</a>
	</div>
</form>
