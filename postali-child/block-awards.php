<div class="tabs-container">
	<span class="orange-button active" id="awards-button">Awards</span>
	<span class="orange-button" id="membership-button">Memberships</span>	
</div>
<div class="awards-container active">
	<?php if( have_rows('award_boxes','options') ): ?>
	<?php while( have_rows('award_boxes','options') ): the_row();
			$award_title = get_sub_field('award_title');
			$award_image = get_sub_field('award_image');
		?>
		<div class="white-box">
			<img src="<?php echo$award_image; ?>" alt="<?php echo$award_title; ?>" height="400" width="189">
		</div>
	<?php endwhile; ?>
	<?php endif; ?>
</div>
<div class="membership-container">
	<?php if( have_rows('membership_boxes','options') ): ?>
	<?php while( have_rows('membership_boxes','options') ): the_row();
			$membership_title = get_sub_field('membership_title');
			$membership_image = get_sub_field('membership_image');
		?>
		<div class="white-box">
			<img src="<?php echo$membership_image; ?>" alt="<?php echo $membership_title; ?>">
		</div>
	<?php endwhile; ?>
	<?php endif; ?>
</div>
<div class="spacer-30"></div>
<p><a href="/about-us/our-awards/" title="Visit our Awards Page">Our Awards & Recognitions</a> &nbsp; <span class="icon-arrow-right2"></span></p>