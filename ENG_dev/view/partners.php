<div class="ebSection">
  	
  	<h1><?php echo WEBSITENAME ?> Partners</h1>
  	
  	<?php if(!$all_search_promotions): ?>
  		<p style='color:gray;'>There are currently no partner promotions to display.</p>
	<?php else: ?>
  	
  		<?php foreach($all_search_promotions as $search_term_promo): ?>
		
			<a name='<?php echo $search_term_promo->get_page_element_position_url() ?>'></a>
			<div class = 'promotionsWrap'>
				<a rel='nofollow' target='_blank' href='<?php echo $search_term_promo->get_page_element_target_url() ?>'>
					<img alt='<?php echo $search_term_promo->get_page_element_title_text()?> Promotion Image' src='<?php echo $search_term_promo->get_page_element_image_url() ?>'>
				</a>
				<h2>
					<a rel='nofollow' target='_blank' href='<?php echo $search_term_promo->get_page_element_target_url() ?>'>
						<?php echo $search_term_promo->get_page_element_title_text() ?>
					</a> 
				</h2>
				<p>
					<?php echo $search_term_promo->get_page_element_description() ?>
				</p>
				<div style='clear: both;'></div>
			</div>
			<div style='clear: both;'></div>
		
		<?php endforeach; ?>
		
	<?php endif; ?>
	
</div>