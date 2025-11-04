<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */
get_header();?>

<section class="blog-banner">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <span class="small-orange">legal blog</span>
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="column-50">
                <div class="top-section">
                    <div class="blog-author-box">
                        <div class="author-info">
                            <h3>Written by Jared Staver</h3>
                            <p class="small"><a href="/about-us/jared-staver/" title="" class="author-link">Read Jared's Bio</a></p>
                            <p class="small">Jared Staver is a Personal Injury Lawyer based in Chicago, Illinois and has been practicing law for over 25 years.</p>
                        </div>
                        <div class="author-headshot">
                            <img src="/wp-content/uploads/2021/10/blog-cutout-jared.png" alt="Jared Staver" style="border: solid 2px #FF5601; border-radius: 100px;"> 
                        </div>
                    </div>
                    <div class="spacer-30"></div>
                </div>
                <hr>
                <div class="bottom-section">
                    <div class="spacer-30"></div>
                    <div class="article-single-featured-image">

                    <?php get_template_part('block', 'blog-thumb');?>  

                    <?php if ( get_field('image_caption') ) { ?>
                        <span class="spacer-30"></span>
                        <p class="small"><?php the_field('image_caption'); ?></p>
                    <?php } ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="body-content">
    <div class="container">
        <div class="columns">
            <div class="column-66 center">
                <?php the_content(); ?>                        			
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'consultation');?>

<section id="related-articles">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <h2>Related Case Results</h2>
                <p class="large">When you’re fighting for maximum compensation, we know what it takes to get it.</p>
            </div>
            <div class="column-66">
            <?php 
                $query = new WP_Query( array(
                        'posts_per_page'         => 2,
                        'post_type' => 'results',
                        'post__not_in' => array( $post->ID ),
                        'orderby' => 'desc'
                    ) ); 

                ?>

                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="post-container">
                        <a class="white-box" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                            <?php get_template_part('block', 'blog-thumb');?>

                            <span class="related-content">
                                <span class="small-orange"><?php the_date(); ?></span>
                                <h4><?php the_title(); ?></h4>
                                <div class="spacer-15"></div>
                            </span>
                        </a>
                        <div class="author-box">
                            <img src="/wp-content/uploads/2021/10/jared-staver-author-block.png" alt="Jared Staver"> <p class="small">Written by <a href="/about-us/jared-staver/" title="" class="author-link">Jared Staver</a></p>
                        </div>
                    </div>
                <?php endwhile; 
                wp_reset_postdata();?>
                <div class="column-full">
                    <p><a href="/settlements/" title="Visit our Legal Blog">See all results</a> <span class="icon-arrow-right2"></span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'footer-contact');?>

<?php get_footer(); ?>