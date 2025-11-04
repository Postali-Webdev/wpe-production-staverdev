<?php

/**
 * Law Category Interior Page
 * Template Name: Press Page
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<div class="press-page-content">

<section class="banner">
	<div class="container">
		<div class="columns">
			<span>
				<p class="small-orange">Who We Are</p>
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

				<!--Social Media-->
				<div class="social-media-press">
					<?php if( have_rows('social_links')) : while( have_rows('social_links')) : the_row(); 
					$url = get_sub_field('url');
					$name = get_sub_field('name');
					$icon = get_sub_field('icon') ?>
						<a href="<?php esc_html_e($url); ?>" target="_blank" class="social-media-icon" title="<?php echo $name; ?> link" style="background: url('<?php echo $icon['url']; ?>') no-repeat;"></a>
					<?php endwhile; endif; ?>
				</div>

				<br />

			<span class="assets_left_content">Media Contact: 
	        <a class="assets_left_content_link" href="mailto:<?php the_field('email'); ?>" target="_blank" title="Email Postali"><?php the_field('email'); ?></a>
	    </span>
	</div>
</div>
</section>

<section>
<div class="container">
		<div class="columns">
			<div class="column-66 center">
				<div class="mentions-container">
					<span class="small-orange">Media Coverage</span>
					<span class="spacer-15"></span>
					<hr class="first">

					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$custom_query = new WP_Query(
						array(
							'post_type' => 'media_mentions',
							'offset' => (($paged - 1) * 10),
							'posts_per_page' => 10,
							'orderby'   => array(
								'date' => 'DESC',
								'menu_order' => 'ASC',
							),
						)
					);

					if ($custom_query->have_posts()) :
						while ($custom_query->have_posts()) : $custom_query->the_post();
							$image = get_field('image');
							$image_url = $image['url'];
							$image_alt = $image['alt'];
							$link = get_field('link');
							$cta_text = get_field('cta_text');
							$no_follow = get_field('add_no_follow');
					?>
							<div class="media-mention">
								<?php if (!empty($image)) { ?>
									<div class="media-mention_image">
										<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
									</div>
								<?php } ?>
								<div class="media-mention_info">
									<h3 class="title"><?php the_title(); ?></h3>
									<div class="desc">
										<?php the_content(); ?>
										<a class="mention-link" <?php echo ($no_follow === true) ? "rel='nofollow'" : ''; ?> href="<?php echo $link; ?>" title="<?php the_title(); ?>" target="_blank"><?php echo $cta_text; ?> ></a>
									</div>
								</div>
							</div>
							<hr class="first">
							<?php wp_reset_postdata(); ?>
						<?php endwhile; ?>
				</div>

				<section class="pagination">

						<div class="container posts">
							<nav class="navigation pagination" role="navigation" aria-label="Posts">
								<h2 class="screen-reader-text">Posts navigation</h2>
								<div class="nav-links">
									<?php function add_pagination($custom_query)
									{
										$total_pages = $custom_query->max_num_pages;

										if ($total_pages > 1) {
											$current_page = max(1, get_query_var('paged'));

											echo paginate_links(array(
												'base' => get_pagenum_link(1) . '%_%',
												'format' => 'page/%#%',
												'current' => $current_page,
												'total' => $total_pages,
												'prev_text' => __( '<span class="icon-drw-chevron-left"></span>', 'textdomain' ),
                                        		'next_text' => __( '<span class="icon-drw-chevron-right"></span>', 'textdomain' ),
											));
										}
									}

									add_pagination($custom_query); ?>
								</div>
								<?php wp_reset_postdata(); ?>
								<?php endif; ?>
							</nav>

						</div>
					
				</section>

			</div>

		</div>

		</div>
		</div>
		</div>
	</div>
	</div>
	</div>
</section>
</div>




<?php get_template_part('block', 'mobile-contact'); ?>

<?php get_template_part('block', 'consultation'); ?>

<?php get_template_part('block', 'footer-contact'); ?>

<?php get_footer(); ?>