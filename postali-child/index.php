<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */

$args = array (
	'post_type'     => 'post',
	'post_per_page' => '10',
    'orderby'       => 'date',
    'order'         => 'DESC',
	'post_status'   => 'publish',
	'category__not_in' => 6,
	'paged' => $paged,
	
);
$query = new WP_Query($args);

$featured_post_limit = 1;
$current_page = get_query_var('paged');
get_header(); ?>

<section class="scroll-banner" id="legal-blog">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <div class="left-content-container">
                    <div class="left-content">
                        <h1>Legal Blog</h1>
                        <div class="spacer-30"></div>
                        <p class="large">Get insight and commentary on the legal issues that <strong>impact injury victims.</strong></p> 
						<p class="large">Not seeing what you're looking for?</p>
						<a href="https://www.chicagolawyer.com/contact-us/" title="Learn more about Personal Injury" class="orange-button large">Talk to an Attorney Today</a>

                    </div>
                </div>
            </div>
            <div class="column-66">
                <div class="column-container">
                    <div id="sort-by-settlements">
                        <div class="main-bar">Sort By <span class="icon-drw-chevron-down"></span></div>
                        <ul class="drop-down">
                            <li><a href="/blog/">View All Categories</a></li>
                            <li><a href="/blog/category/truck-accidents/">Truck Accidents</a></li>
                            <li><a href="/blog/category/motorcycle-accidents/">Motorcycle Accidents</a></li>
                            <li><a href="/blog/category/bike-accidents/">Bicycle Accidents</a></li>
                            <li><a href="/blog/category/pedestrian-accidents/">Pedestrian Accidents</a></li>
                            <li><a href="/blog/category/auto-accidents">Motor Vehicle </a></li>
                            <li><a href="/blog/category/premises-liability/">Premises Liability</a></li>
                            <li><a href="/blog/category/product-liability/">Product Liability</a></li>
                            <li><a href="/blog/category/medical-malpractice/">Medical Malpractice</a></li>
                            <li><a href="/blog/category/wrongful-death/">Wrongful Death</a></li>
                        </ul>
                    </div>
					<div class="spacer-90"></div>
					<?php while( $query->have_posts() ) : $query->the_post(); 
                    $has_additional_author =  get_field('add_additional_author'); ?>
						<?php if( get_field('featured_post') == 'Yes' && $featured_post_limit < 2 && $current_page == 0 ): $featured_post_limit++; ?>
							<div class="post-container featured">
							<p class="small-orange">Featured Post</p>
							<div class="spacer-15"></div>
						<?php else: ?>
							<div class="post-container">
						<?php endif; ?>
							<a class="white-box" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                
                                <?php get_template_part('block', 'blog-thumb');?>  

                                <span class="related-content">
                                    <span class="small-orange"><span data-nosnippet><?php the_date(); ?></span></span>

									<h4><?php the_title(); ?></h4>
                                    <div class="spacer-15"></div>
								</span>
							</a>
                            
							<div class="author-box<?php echo ($has_additional_author ? ' extra-author' : ''); ?>">
                            <?php if( $has_additional_author ) : ?>
                                <div class="extra-headshot">
                            <?php endif; ?>
                            	<img src="/wp-content/uploads/2021/10/jared-staver-author-block.png" alt="Jared Staver">
                                    <?php if( $has_additional_author ) : $author_img = get_field('additional_author_picture');?>
                                    <?php if( $author_img ) : ?>
                                        <img src="<?php echo $author_img['url']; ?>" alt="<?php echo $author_img['alt']; ?>">
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php if( $has_additional_author ) : ?>
                                </div>
                            <?php endif; ?>
                            <p class="small">Written by <a href="/about-us/jared-staver/" title="" class="author-link"><?php the_author(); ?></a><?php if( $has_additional_author ) { echo ' & ' . get_field('additional_author_name');  }?></p>
                        	</div>
                    	</div>
                        
					<?php endwhile; wp_reset_postdata(); ?>

					<div class="spacer-60"></div>

                    <?php if ($query->max_num_pages > 1) : // custom pagination  ?>
                        <section class="pagination">
                            <div class="container">            

                                <?php
                                    $orig_query = $wp_query; // fix for pagination to work
                                    $wp_query = $query;
                                ?>
                                    <div class="container posts">
                                    <?php the_posts_pagination( array(
                                        'mid_size' => 2,
                                        'prev_text' => __( '<span class="icon-drw-chevron-left"></span>', 'textdomain' ),
                                        'next_text' => __( '<span class="icon-drw-chevron-right"></span>', 'textdomain' ),
                                    ) ); ?>
                                    </div>
                                <?php
                                    $wp_query = $orig_query; // fix for pagination to work
                                ?>
                                
                            </div>
                        </section>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'footer-contact');?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 


<?php get_footer(); ?>
