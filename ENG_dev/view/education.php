<div class="ebSection">

  <h1>Education and Courses</h1>

  <p>
  Selected courses aimed at international engineers looking to enhance their career:
  </p>

  <?php
	if($promotions_arr):
	  	foreach($promotions_arr as $promotion){ ?>
	
			<a name="<?php echo $promotion->get_page_element_position_url() ?>"></a>
	
			<div class = "promotionsWrap">
				<a rel="nofollow" target="_blank" href="<?php echo $promotion->get_page_element_target_url() ?>">
					<img alt="<?php echo $promotion->get_page_element_title_text() ?> Promotion Image" src="<?php echo $promotion->get_page_element_image_url() ?>" />
				</a>
				<h2>
					<a rel="nofollow" target="_blank" href="<?php echo $promotion->get_page_element_target_url() ?>"><?php echo $promotion->get_page_element_title_text() ?></a> 
				</h2>
				<p>
					<?php echo $promotion->get_page_element_description() ?>
				</p>
				<div style="clear:both;"></div>
			</div>
			<div style="clear:both;"></div>
		<?php } ?>
	<?php else: ?>
		<p>We currently do not have any courses advertised.</p>
	<?php endif; ?>

  <p>
	Want to <a href="advertise">advertise</a> here?
  </p>

</div>


