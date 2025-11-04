<?php
/**
 * Archive template
 * @package Postali Child
 * @author Postali LLC
**/
$query = new WP_Query( array(
	'posts_per_page'         => 30,
	'paged' => $paged,
	'post_type' => 'testimonials',          // name of post type.
) );
get_header();?>

<section class="short">
    <div class="background-image-holder">
        <div class="background-image active" data-scroll="1" style="background-image:url(/wp-content/uploads/2020/03/testimonial_background_1.jpg);">&nbsp;</div>    </div>
        <div class="container">
                <div class="left-content">
                    <div class="sidebarContainer__content active" data-scroll="1">
                        <div class="left-content-container">
                            <h1>Client Reviews</h1>
                            <p class="large">Bringing order to chaos. See how Staver has resolved complicated cases just like yours.</p>
                        </div>
                    </div>
                </div>
                <div class="column-container">
                    <div class="spacer-60"></div>
                    <?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
                        <div class="testimonial-container">
                            <?php the_content(); ?>		
                            <p class="small caps"><?php the_field('testimonial_author'); ?><p>
                        </div>
                        <div class="spacer-30"></div>
                    <?php endwhile; ?>
                    <?php endif; ?>

                    <?php if ($query->max_num_pages > 1) : // custom pagination  ?>
                        <section class="pagination">
                            <div class="container">            

                                <?php
                                    $orig_query = $wp_query; // fix for pagination to work
                                    $wp_query = $query;
                                ?>
                                    <div class="container posts">
                                    <?php the_posts_pagination( array(
                                        'mid_size' => 5,
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
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'footer-contact');?>


<?php get_footer(); ?>