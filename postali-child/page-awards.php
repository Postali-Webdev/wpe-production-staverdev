<?php
/**
 * Law Category Interior Page
 * Template Name: Awards
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section class="banner">
	<div class="container">
		<div class="columns">
			<span>
				<p class="small-orange">Staver accident injury lawyers, p.c.</p>
				<div class="spacer-break"></div>
				<h1><?php the_title(); ?></h1>
			</span>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="columns">
			<div class="column-66 center">
				<?php the_content(); ?>
				<span class="spacer-30"></span>
				<div class="awards-container">
					<span class="small-orange">Awards</span>
					<span class="spacer-15"></span>
					<hr class="first">
					<?php if( have_rows('award_boxes','options') ): ?>
					<?php while( have_rows('award_boxes','options') ): the_row();
							$award_title = get_sub_field('award_title');
							$award_image = get_sub_field('award_image');
							$award_description = get_sub_field('award_description');
						?>
						<div class="award-repeater">
							<div class="left">
								<img src="<?php echo$award_image; ?>" alt="<?php echo$award_title; ?>">
							</div>
							<div class="right">
								<h3><?php echo$award_title; ?></h3>
								<p><?php echo$award_description; ?></p>
							</div>
						</div>
						<hr>
						<span class="spacer-30"></span>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="membership-container">
				<span class="small-orange">Memberships</span>
				<span class="spacer-15"></span>
					<hr class="first">
					<?php if( have_rows('membership_boxes','options') ): ?>
					<?php while( have_rows('membership_boxes','options') ): the_row();
							$membership_title = get_sub_field('membership_title');
							$membership_image = get_sub_field('membership_image');
							$membership_description = get_sub_field('membership_description');
						?>
						<div class="award-repeater 123">
							<div class="left">
								<img src="<?php echo$membership_image; ?>" alt="<?php echo$membership_title; ?>" height="400" width="189">
							</div>
							<div class="right">
								<h3><?php echo$membership_title; ?></h3>
								<p><?php echo$membership_description; ?></p>
							</div>
						</div>
						<hr>
						<span class="spacer-30"></span>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>
</section>

<?php get_template_part('block', 'related-articles');?>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'consultation');?>

<?php get_footer(); ?>
