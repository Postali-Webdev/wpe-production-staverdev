<?php
/**
 * Template Name: Practice Area Parent - New
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

$banner_img = get_field('banner_bg_img');

function image_url_exists($url) {
    $headers = @get_headers($url);
    return strpos($headers[0], '200 OK') !== false;
}


if( image_url_exists($banner_img) . '.webp' ) {
    $banner_img = get_field('banner_bg_img') . '.webp';
} else {
    $banner_img = get_field('banner_bg_img');
}


?>

<div id="top"></div>

<a class="back-to-top" href="#top">
    <span class="icon-arrow-right2"></span>
    Back to Top 
</a>

<section class="banner" id="practice-parent-new">
    <div class="container">
        <div class="columns">
            <div class="column-66">
                <span class="small-orange">Practice Areas</span>
                <h1><?php the_field('main_headline'); ?></h1>

                <div class="spacer-30"></div>
                
                <div class="banner-cta-container">
                    <p class="large cta"><strong>Call Staver Today</strong></p>
                    <a href="tel:312-236-2900" class="orange-button" title="call us at (312) 236-2900">(312) 236-2900</a>
                    <div class="spacer-15 mobile"></div>
                    <a href="/do-i-have-a-case/process/" class="outline-button" title="Do I Have a Case?">Do I Have a Case?</a>
                </div>

                <div class="spacer-30"></div>
                <?php the_field('intro_copy'); ?>
                                
                <div class="assurance">
                    <p><?php the_field('lower_intro_copy'); ?></p>
                    <div class="banner-review">
                        <div class="number">
                            5.0
                        </div>
                        <div class="review">
                            <div class="stars">★★★★★</div>
                            <div class="review-text">200+ GOOGLE REVIEWS</div>
                            <div class="review-link"><a href="/testimonials/">Read our reviews</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column-33 img-bg">
                <img src="<?php echo $banner_img; ?>" alt="" fetchpriority="high" class="ignore-lazy">
            </div>
        </div>
    </div>
</section>

<section id="panel1">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <h2 class="striped"><?php the_field('panel1_section_headline'); ?></h2>
            </div>
            <div class="column-66">
                <?php the_field('panel1_section_copy'); ?>
                <div class="spacer-30"></div>
                <div class="on-page-nav">
                    <span class="small-orange">ON THIS PAGE</span>
                    <?php $n = 2; ?>
                    <?php if( have_rows('on_page_navigation') ): ?>
                    <ul>
                    <?php while( have_rows('on_page_navigation') ): the_row(); ?>
                        <li><a href="#panel<?php echo $n; ?>"><?php the_sub_field('section_title'); ?></a></li>
                        <?php $n++; ?>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column-66 center">
                <div class="spacer-60"></div>
                <?php the_field('results_intro_copy'); ?>
                <?php if( have_rows('pa_new_results') ): ?>
                <div class="result-box-container">  
                    <?php while( have_rows('pa_new_results') ): the_row(); 
                        $result_link = get_sub_field('single_result_link');
                        $result_amount = get_sub_field('single_result_title');
                        $result_copy = get_sub_field('single_result_copy');
                    ?>
                        <a class="result-box" href="<?php echo $result_link; ?>">
                            <h3><?php echo $result_amount; ?></h3>
                            <p><?php echo $result_copy; ?></p>
                        </a>
                    <?php endwhile; ?>
                </div>
                <div class="spacer-30"></div>
                <p class="read-more"><a href="/settlements/" title="Read more reviews">Read more results</a> <span class="icon-arrow-right2"></span></p>
                <?php endif; ?>
            </div>
        </div>

        <?php if(get_field('add_video')) { ?> 

        <div class="columns video">
            <div class="spacer-line"></div>
            <div class="column-50">
                <p class="headline"><?php the_field('panel1_video_title'); ?></p>
            </div>
            <div class="spacer-break"></div>
            <div class="column-50">
                <div class="video-container">
                    <iframe class="video-container" width="560" height="315" src="https://www.youtube.com/embed/<?php the_field('panel1_video'); ?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="column-50 highlights">
            <?php if( have_rows('video_highlights') ): ?>
                <span class="small-orange">VIDEO HIGHLIGHTS:</span>
                <ul>
                <?php while( have_rows('video_highlights') ): the_row(); 
                        $highlight = get_sub_field('highlight');
                    ?>
                    <li><?php echo $highlight; ?></li>
                <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            </div>
        </div>

        <?php } ?>
    </div>
</section>

<section id="panel2">
    <div class="container">
        <div class="columns center">
            <div class="column-50">
                <span class="small-orange" id="section-1"><?php the_field('panel2_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('panel2_headline'); ?></h2>
                <?php the_field('panel2_intro_copy'); ?>
            </div>
            <div class="column-50 top-image">
            <?php 
            $panel2_image = get_field('panel2_top_image');
            if( !empty( $panel2_image ) ): ?>
                <img src="<?php echo esc_url($panel2_image['url']); ?>" alt="<?php echo esc_attr($panel2_image['alt']); ?>" />
            <?php endif; ?>
            </div>
        </div>
        <div class="spacer-line"></div>
        <div class="columns">
        <?php if( have_rows('panel2_left_right_columns') ): ?>
        <?php while( have_rows('panel2_left_right_columns') ): the_row(); ?>
            <div class="left-right-content">
                <div class="column-33">
                    <h3 class="striped"><?php the_sub_field('left_column_h2'); ?></h3>
                </div>
                <div class="column-66">
                    <?php the_sub_field('right_column_content'); ?>

                    <?php if(get_sub_field('add_map_block')) { ?>
                        <h4><?php the_sub_field('map_block_headline'); ?></h4>
                        <p><?php the_sub_field('map_block_copy'); ?></p>
                        <div class="map-block">
                        <?php while ( have_rows('locations','options') ) : the_row(); ?>
                            <?php if(get_sub_field('is_primary','options')) { ?>
                            <div class="column-33">
                                <iframe src="<?php the_sub_field('map_embed','options'); ?>"></iframe>
                            </div>
                            <div class="column-33">
                                <p><?php the_sub_field('address','options'); ?></p>
                                <a href="<?php the_sub_field('directions_link','options'); ?>" class="directions-link">Get Directions</a>
                            </div>
                            <div class="column-33">
                                <a href="tel:<?php the_sub_field('phone','options'); ?>" class="orange-button"><?php the_sub_field('phone','options'); ?></a><br>
                                <a href="/contact-us/" class="link">Online Form</a>
                            </div>
                            <?php } ?>
                        <?php endwhile; ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
</section>

<section id="panel3">
    <span id="why"></span>
    <div class="container">
        <div class="columns">
            <div class="column-66 center">
                <span class="small-orange" id="section-2"><?php the_field('panel3_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('panel3_headline'); ?></h2>
                <?php if( have_rows('panel3_section_copy') ): ?>
                <?php while( have_rows('panel3_section_copy') ): the_row(); ?>
                    <p class="headline"><?php the_sub_field('headline'); ?></p>
                    <?php the_sub_field('copy'); ?>
                <?php endwhile; ?>
                <?php endif; ?>
                <div class="spacer-30"></div>
                <a href="/contact-us/" class="orange-button">CONTACT US TODAY</a>
            </div>
        </div>

        <?php if(get_field('panel3_add_video')) { ?> 

        <div class="columns video">
            <div class="spacer-line"></div>
            <div class="column-50">
                <p class="headline"><?php the_field('panel3_video_title'); ?></p>
            </div>
            <div class="spacer-break"></div>
            <div class="column-50">
                <div class="video-container">
                    <iframe class="video-container" width="560" height="315" src="https://www.youtube.com/embed/<?php the_field('panel3_video'); ?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="column-50 highlights">
            <?php if( have_rows('panel3_video_highlights') ): ?>
                <span class="small-orange">VIDEO HIGHLIGHTS:</span>
                <ul>
                <?php while( have_rows('panel3_video_highlights') ): the_row(); 
                        $highlight = get_sub_field('highlight');
                    ?>
                    <li><?php echo $highlight; ?></li>
                <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            </div>
        </div>

        <?php } ?>
    </div>
</section>      

<section id="rra">
    <div class="container">
        <div class="spacer-line"></div>
        <div class="spacer-15"></div>
        <div class="columns">
            <div class="column-66 center">
                <div class="testimonial-container">
                    <?php the_field('rra_review'); ?>
                    <div class="stars">★★★★★</div>
                </div>
                <div class="spacer-30"></div>
                <p class="read-more"><a href="/testimonials/" title="Read more reviews">Read more reviews</a> <span class="icon-arrow-right2"></span></p>
            </div>
        </div>

        <div class="spacer-90"></div>

        <div class="columns">
            <div class="column-33">
                <?php the_field('rra_awards_copy'); ?>
            </div>
            <div class="column-66">
            <h4><?php the_field('rra_awards_block_headline'); ?></h4>
            <div class="spacer-break"></div>

            <?php if( have_rows('award_boxes','options') ): ?>
            <div class="awards-container">
            <?php while( have_rows('award_boxes','options') ): the_row();
                    $award_title = get_sub_field('award_title');
                    $award_image = get_sub_field('award_image');
                ?>
                <div class="white-box">
                    <img src="<?php echo$award_image; ?>" alt="<?php echo$award_title; ?>" height="400" width="189">
                </div>
            <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <div class="spacer-30"></div>
            <p class="read-more"><a href="/about-us/our-awards/" title="Read more reviews">Visit our Awards Page</a> <span class="icon-arrow-right2"></span></p>
            </div>
        </div>
    </div>
</section>

<section id="panel4">
    <div class="container">
        <div class="columns center">
            <div class="column-50">
                <span class="small-orange" id="section-3"><?php the_field('panel4_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('panel4_headline'); ?></h2>
                <?php the_field('panel4_intro_copy'); ?>
                <div class="spacer-30"></div>
                <a href="/contact-us/" class="orange-button">CONTACT US TODAY</a>
            </div>
            <div class="column-50 top-image">
            <?php 
            $panel4_image = get_field('panel4_top_image');
            if( !empty( $panel4_image ) ): ?>
                <img src="<?php echo esc_url($panel4_image['url']); ?>" alt="<?php echo esc_attr($panel4_image['alt']); ?>" />
            <?php endif; ?>
            </div>
        </div>
        <div class="spacer-line"></div>
        <div class="columns center">
            <?php if( have_rows('panel4_content_blocks') ): ?>
            <?php while( have_rows('panel4_content_blocks') ): the_row(); ?>
            <div class="column-66 center">
                <h3><?php the_sub_field('headline'); ?></h3>
                <?php the_sub_field('copy'); ?>
            </div>
            <div class="spacer-line"></div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="orange" id="cta-free-consult">
    <div class="container">
        <div class="columns">
            <div class="column-66">
                <span class="headline">Ready to get started?</span>
                <span class="spacer-15"></span>
                <p class="large"><strong>It all starts with a free consultation.</strong></p>
            </div>
            <div class="column-33">
                <a class="orange-button large" title="Get a free consultation - call today!" href="tel:(312) 736-0773">PH: (312) 736-0773</a>
                <span class="spacer-15"></span>
                <div class="cta-link-container"><a href="/contact-us/" title="Contact Staver Accident Injury Lawyers today" class="cta-link">Contact us online</a></div>
            </div>
        </div>
    </div>
</section>

<section id="panel5">
    <div class="container">
        <div class="columns">
            <div class="column-66 center">
                <span class="small-orange" id="section-4"><?php the_field('panel5_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('panel5_headline'); ?></h2>
            </div>
            <div class="column-full white">
                <?php if( have_rows('panel5_content_blocks') ): ?>
                <?php while( have_rows('panel5_content_blocks') ): the_row(); ?>
                <div class="column-66 center">
                    <h3><?php the_sub_field('headline'); ?></h3>
                    <?php the_sub_field('copy'); ?>
                </div>
                <div class="spacer-line"></div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="panel6">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <span class="small-orange" id="section-5"><?php the_field('panel6_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('panel6_headline'); ?></h2>
                <?php the_field('panel6_intro_copy'); ?>
                <a href="/contact-us/" class="orange-button">CONTACT US TODAY</a>
            </div>
            <div class="column-50">
                <iframe src="<?php the_field('panel6_map_embed'); ?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</section>

<section id="related-articles" class="dkblue">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <h2><?php the_field('resources_headline_copy'); ?></h2>
                <p class="large"><?php the_field('resources_intro_copy'); ?></p>
            </div>
            <div class="column-66">
            <?php if( have_rows('resources_posts') ): ?>
            <?php while( have_rows('resources_posts') ): the_row(); ?>
                <?php $post_object = get_sub_field('post'); ?>
                <?php if( $post_object ): ?>
                    <?php // override $post
                    $post = $post_object;
                    setup_postdata( $post );
                    ?>
                    
                    <div class="post-container">
                        <a class="white-box" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                            <div class="blog-thumbnail" style="background-image:url(<?php the_field('blog_post_image'); ?>)" alt="Staver Law Firm blog image"></div>

                            <span class="related-content">
                                <span class="small-orange"><span data-nosnippet=""><?php the_date(); ?></span></span>
                                <h4><?php the_title(); ?></h4>
                                <div class="spacer-15"></div>
                            </span>
                        </a>
                        <div class="author-box">
                            <img src="/wp-content/uploads/2021/10/blog-cutout-jared.png" alt="Jared Staver"> <p class="small">Written by <a href="/about-us/jared-staver/" title="" class="author-link"><?php the_author(); ?></a></p>
                        </div>
                    </div>

                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>

                <div class="column-full">
                    <p><a href="/blog/" title="Visit our Legal Blog">Visit our Legal Blog page</a> <span class="icon-arrow-right2"></span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="panel7">
    <div class="container">
        <div class="columns center">
            <div class="column-50">
                <span class="small-orange" id="section-6"><?php the_field('panel7_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('panel7_headline'); ?></h2>
                <?php the_field('panel7_intro_copy'); ?>
            </div>
            <div class="column-50 top-image">
            <div class="text-block">
                <div class="text-top">Jared Staver</div>
                <div class="text-bottom">Ally. Advocate. Advisor.</div>
            </div>
            <?php 
            $panel7_image = get_field('panel7_top_image');
            if( !empty( $panel7_image ) ): ?>
                <img src="<?php echo esc_url($panel7_image['url']); ?>" alt="<?php echo esc_attr($panel7_image['alt']); ?>" />
            <?php endif; ?>
            </div>
        </div>

        <div class="spacer-90"></div>

        <h3><?php the_field('panel7_headline_circles'); ?></h3>
        <div class="spacer-30"></div>

        <div class="columns middle circles" >
            <?php 
                $eval = 'Free case evaluation';
                $zero = '$0.00 out of pocket expenses';
                $fee = 'No fee unless you win';
            ?>
                <div class="column-33">
                    <span class="orange-circle">
                        <?php echo $eval; ?>
                    </span>
                </div>
                <div class="column-33">
                    <span class="orange-circle">
                        <?php echo $zero; ?>
                    </span>
                </div>
                <div class="column-33">
                    <span class="orange-circle last">
                        <?php echo $fee; ?>
                    </span>
                </div>
        </div>

    </div>
</section>

<?php get_template_part('block', 'consultation');?>

<div class="bottom-block">
    <?php get_template_part('block', 'mobile-contact');?>
</div>

<?php get_template_part('block', 'footer-contact');?>


<script src="/wp-content/themes/postali-child/assets/js/jquery.fitvids.js"></script>
<script>
jQuery(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    jQuery(".video-container").fitVids();
  });
</script>


<?php get_footer(); ?>