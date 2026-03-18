<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
 * */
get_header();
?>
<section class="banner home">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <div class="left-container">
                    <h1><?php the_field('banner_h1'); ?></h1>
                    <span class="spacer-30"></span>
                    <span class="h1-sub"><?php the_field('banner_headline'); ?></span>
                    <p><?php the_field('banner_copy'); ?></p>
                    <div class="spacer-15"></div>
                    <span class="cta-text"><?php the_field('banner_cta'); ?></span>
                    <div class="spacer-15"></div>
                    <?php 
                    if( have_rows('locations','options') ):
                    while( have_rows('locations','options') ) : the_row();
                        $is_active = get_sub_field('is_primary');
                        if( $is_active ) { ?>
                            <a href="tel:<?php the_sub_field('phone'); ?>" class="orange-button">Call <?php the_sub_field('phone'); ?></a>
                        <?php } else {
                        }
                    endwhile;
                    endif;
                    ?>

                    <div class="spacer-90"></div>

                    <div id="awards">
                        <?php if (have_rows('awards_container')): ?>
                        <?php while (have_rows('awards_container')): the_row(); ?>
                            <div class="award-container">
                                <img src="<?php the_sub_field('awards_box_content'); ?>" alt="View our awards & Memberships" height="400" width="189">
                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="column-33">
                <?php if (have_rows('banner_touts')): ?>
                <?php while (have_rows('banner_touts')): the_row(); ?>
                    <div class="banner-tout">
                        <div class="tout-title"><?php the_sub_field('headline'); ?></div>
                        <p><?php the_sub_field('content'); ?></p>
                        <a class="tout-link" href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('headline'); ?>"><?php the_sub_field('button_text'); ?></a>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="banner-bg">
        <img src="/wp-content/uploads/2026/02/banner-bg-home.jpg" class="ignore-lazy banner-bg-desktop">
        <img src="/wp-content/uploads/2026/02/banner-bg-home-mobile.png" class="ignore-lazy banner-bg-mobile">
        <img src="/wp-content/uploads/2026/03/banner-bg-home-mobile-xsm.jpg" class="ignore-lazy banner-bg-phone">
    </div>
</section>


<section class="hp-panel-1">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <span class="small-orange" id="section-1"><?php the_field('panel_1_small_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('panel_1_headline'); ?></h2>
                <p class="large"><?php the_field('panel_1_intro_copy'); ?></p>
                <p><?php the_field('panel_1_main_copy'); ?></p>
            </div>
            <div class="column-50">
                <?php 
                $image = get_field('panel_1_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="hp-panel-2">
    <div class="container wide">
        <div class="columns">
            <div class="column-33">
                <span class="small-orange"><?php the_field('panel_2_small_title'); ?></span>
                <div class="spacer-15"></div>
                <h3><?php the_field('panel_2_headline'); ?></h3>
                <p class="med"><?php the_field('panel_2_main_copy'); ?></p>
                <div class="spacer-30"></div>
                <div class="btn-block">
                    <a href="/contact-us/" class="orange-button">Contact us today</a>
                    <div class="slider-nav">
                        <div class="prev-button-slick"><span class="icon-slick-prev"></span></div>
                        <div class="next-button-slick"><span class="icon-slick-next"></span></div>
                    </div>
                </div>
            </div>
            <div class="column-66">
                <?php if( have_rows('panel_2_featured_results') ): ?>
                <div class="result-container">
                <?php while( have_rows('panel_2_featured_results') ): the_row(); ?>
                    <?php $post_object = get_sub_field('result'); ?>
                    <?php if( $post_object ): ?>
                        <?php // override $post
                        $post = $post_object;
                        setup_postdata( $post );
                        ?>
                        <div class="result-box">
                            <div class="result-category"><?php the_sub_field('result_category'); ?></div>
                            <div class="result-amount">
                                <?php $result_amount = get_field('settlement_amount'); ?>    
                                $<?php echo number_format($result_amount); ?>
                            </div>
                            <div class="spacer-15"></div>
                            <?php 
                            $content = get_the_content(); ?>
                            <p><?php echo wp_trim_words( $content , '35' ); ?></p>
                        </div>
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="spacer-30"></div>
    <div class="container">
        <div class="columns">
            <div class="column-full centered">
                <p><?php the_field('panel_2_disclaimer'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="attorney-block blue">
    <div class="container">
        <span class="small-orange"><?php the_field('panel_3_small_title'); ?></span>
        <div class="spacer-15"></div>
        <h2><?php the_field('panel_3_headline'); ?></h2>
        <div class="slider-nav">
            <div class="prev-button-slick2"><span class="icon-slick-prev"></span></div>
            <div class="next-button-slick2"><span class="icon-slick-next"></span></div>
        </div>
        <div class="spacer-15"></div>
        <div class="columns">
            <div class="hp-attorney-slider">

                <?php get_template_part('block','attorney-slider'); ?>
                
            </div>
        </div>
    </div>
    <div class="badge"></div>
</section>

<section class="awards-block blue">
    <div class="container">
        <div class="columns">
            <div class="column-left">
                <span class="small-orange"><?php the_field('awards_small_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('awards_headline'); ?></h2>
                <p><?php the_field('awards_main_copy'); ?></p>
                <div class="spacer-15"></div>
                <a href="/about-us/our-awards/" class="orange-button">Our Awards</a>
            </div>
            <div class="column-right">
                <div class="hp-awards">
                    <?php $random_awards = get_field( 'award_boxes','options' );  ?>
                    <?php if ( is_array( $random_awards ) )  { ?>
                    <?php shuffle( $random_awards ); ?> 
                    <?php foreach ($random_awards as $random_award ) { ?>
                        <div class="award-box">
                            <img src="<?php echo $random_award['award_image']; ?>" alt="" />
                        </div>
                    <?php } ?>
                    <?php } ?>
                </div>
                <div class="hp-awards reversed">
                    <?php $random_awards = get_field( 'award_boxes','options' );  ?>
                    <?php if ( is_array( $random_awards ) )  { ?>
                    <?php shuffle( $random_awards ); ?> 
                    <?php foreach ($random_awards as $random_award ) { ?>
                        <div class="award-box">
                            <img src="<?php echo $random_award['award_image']; ?>" alt="" />
                        </div>
                    <?php } ?>
                    <?php } ?>
                </div>
                <div class="hp-awards">
                    <?php $random_awards = get_field( 'award_boxes','options' );  ?>
                    <?php if ( is_array( $random_awards ) )  { ?>
                    <?php shuffle( $random_awards ); ?> 
                    <?php foreach ($random_awards as $random_award ) { ?>
                        <div class="award-box">
                            <img src="<?php echo $random_award['award_image']; ?>" alt="" />
                        </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block','nap'); ?>

<section class="practice-areas">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <span class="small-orange"><?php the_field('pa_small_title'); ?></span>
                <div class="spacer-break"></div>
                <h2><?php the_field('pa_headline'); ?></h2>
                <div class="spacer-15"></div>
            </div>
            <div class="spacer-30"></div>

            <?php if( have_rows('practiceareas') ): ?>
            <?php while( have_rows('practiceareas') ): the_row(); 
                $pa_link = get_sub_field('link');
                $pa_category = get_sub_field('category');
                $pa_name = get_sub_field('name');
                $pa_image = get_sub_field('thumbnail');
            ?>
                <a class="practice-area-box column-25" href="<?php echo $pa_link; ?>">
                    <?php 
                    if( !empty( $pa_image ) ): ?>
                        <img src="<?php echo esc_url($pa_image['url']); ?>" alt="<?php echo esc_attr($pa_image['alt']); ?>" />
                    <?php endif; ?>
                    <span class="small-orange"><?php echo $pa_category; ?></span>
                    <h3><?php echo $pa_name; ?></h3>
                </a>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php get_template_part('block', 'footer-contact',
    array( 
        'class' => 'blue-bg',
        ) 
    ); 
?>

<section class="hp-process">
    <div class="container">
        <div class="columns">
            <div class="column-50 sticky">
                <span class="small-orange"><?php the_field('panel_7_small_title'); ?></span>
                <div class="spacer-15"></div>
                <?php the_field('panel_7_left_copy_block'); ?>
            </div>
            <div class="column-50">
                <?php if (have_rows('process_steps')): ?>
                <?php $n = 1; ?>
                <?php while (have_rows('process_steps')): the_row(); ?>
                    <div class="process-steps">
                        <div class="step-number">
                            <?php echo $n; ?>.
                        </div>
                        <div class="step-content">
                            <h3><?php the_sub_field('process_step_title'); ?></h3>
                            <p><?php the_sub_field('process_step_content'); ?></p>
                        </div>
                    </div>
                    <?php $n++; ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="hp-rights">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <span class="small-orange"><?php the_field('panel_8_small_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('panel_8_headline'); ?></h2>
                <p><?php the_field('panel_8_main_copy'); ?></p>
            </div>
            <div class="column-50 img">
                <?php 
                $image = get_field('panel_8_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="spacer-60"></div>
            <div class="column-50 centered center">
                <?php the_field('panel_8_center_column'); ?>
            </div>
            <div class="spacer-30"></div>
        </div>
        <div class="columns normal">
            <?php if (have_rows('panel_8_boxed_content')): ?>
            <?php while (have_rows('panel_8_boxed_content')): the_row(); ?>
                <div class="column-33 tout-box">
                    <h4 class="tout-title"><?php the_sub_field('headline'); ?></h4>
                    <p><?php the_sub_field('content'); ?></p>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>

            <div class="spacer-60"></div>
            <div class="column-50 centered center">
                <a href="<?php the_field('panel_8_button_link'); ?>" class="outline-button"><?php the_field('panel_8_button_text'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="hp-damages">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <span class="small-orange"><?php the_field('panel_9_small_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('panel_9_headline'); ?></h2>
                <p><?php the_field('panel_9_main_copy'); ?></p>
            </div>
            <div class="column-50 img">
                <?php 
                $image = get_field('panel_9_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="hp-injury-process">
    <div class="container">
        <div class="columns">
            <div class="column-33-left"></div>
            <div class="column-33">
                <?php 
                $image = get_field('panel_10_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="column-66">
                <div class="spacer-15"></div>
                <h2><?php the_field('panel_10_headline'); ?></h2>
                <p><?php the_field('panel_10_main_copy'); ?></p>
                <a href="<?php the_field('panel_10_button_link'); ?>" class="outline-button"><?php the_field('panel_10_button_text'); ?></a>
            </div>
        </div>
    </div>
</section>

<?php $p_11_bg_image = get_field('panel_11_bg_image'); ?>

<section class="hp-insights blue" style="background-image:url(<?php echo $p_11_bg_image; ?>);">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <h2><?php the_field('panel_11_headline'); ?></h2>
                <p><?php the_field('panel_11_main_copy'); ?></p>
                <a href="<?php the_field('panel_11_button_link'); ?>" class="orange-button"><?php the_field('panel_11_button_text'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="hp-testimonials blue">
    <div class="container">
        <div class="columns">
            <div class="column-66 centered center">
                <div class="stars">
                    <div class="star">☆</div>
                    <div class="star">☆</div>
                    <div class="star">☆</div>
                    <div class="star">☆</div>
                    <div class="star">☆</div>
                </div>
                <h3><?php the_field('panel_12_headline'); ?></h3>
                <p class="med"><?php the_field('panel_12_main_copy'); ?></p>
            </div>
        </div>
        <div class="spacer-60"></div>
        <div class="columns testimonial-callout">
            <div class="column-33">
                <?php 
                $headshot = get_field('panel_12_testimonial_headshot');
                if( !empty( $headshot ) ): ?>
                    <img src="<?php echo esc_url($headshot['url']); ?>" alt="<?php echo esc_attr($headshot['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="column-66">
                <img src="/wp-content/uploads/2026/02/quote-Icon.png" alt="">
                <div class="spacer-30"></div>
                <?php the_field('panel_12_testimonial_copy'); ?>
                <p class="author"><?php the_field('panel_12_testimonial_author'); ?></p>
            </div>
        </div>
        <div class="spacer-60"></div>
        <div class="columns testimonial-scroller">
            <?php if (have_rows('testimonial_scroller')): ?>
            <?php while (have_rows('testimonial_scroller')): the_row(); ?>
                <div class="column-25 testimonial">
                    <div class="author-block">
                        <?php 
                        $author_img = get_sub_field('author_headshot');
                        if( !empty( $author_img ) ): ?>
                            <img src="<?php echo esc_url($author_img['url']); ?>" alt="<?php echo esc_attr($author_img['alt']); ?>" />
                        <?php endif; ?>
                        <p class="med"><?php the_sub_field('author'); ?></p>
                    </div>
                    <div class="stars">★★★★★</div>
                    <p><?php the_sub_field('testimonial'); ?></p>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="slider-nav">
            <div class="prev-button-slick3"><span class="icon-slick-prev"></span></div>
            <div class="next-button-slick3"><span class="icon-slick-next"></span></div>
        </div>
    </div>
</section>

<section class="hp-faqs">
    <div class="container">
        <div class="columns">
            <div class="column-full centered center">
                <span class="small-orange"><?php the_field('faq_small_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('faq_headline'); ?></h2>
                <a href="<?php the_field('faq_button_link'); ?>" class="orange-button"><?php the_field('faq_button_text'); ?></a>
            </div>
        </div>
        <div class="spacer-60"></div>
        <div class="columns faqs">
            
            <?php
            $repeater = get_field('faqs'); // Get repeater field
            $total_rows = count($repeater); // Count total rows
            $halfway_point = floor($total_rows / 2); // Calculate halfway point
            $current_index = 0; // Initialize counter

            if( have_rows('faqs') ): ?>
            <div class="column-50">
            <?php while( have_rows('faqs') ) : the_row(); ?>
                
                <div class="faq-box">
                    <div class="accordion">
                        <div class="accordion_title">
                            <h3><?php the_sub_field('question'); ?> </h3><span></span>
                        </div>
                        <div class="accordion_content">
                            <?php the_sub_field('answer'); ?>
                            <?php if (get_sub_field('page_link')) { ?>
                            <div class="spacer-15"></div>
                            <a href="<?php the_sub_field('page_link'); ?>" class="accordion-button">Learn More</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <?php if ( $current_index == $halfway_point - 1 ) { ?>
                </div><div class="column-50">
                <?php } ?>

                <?php $current_index++;
            endwhile; ?>
            </div>
            <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<?php $areas_bg_image = get_field('areas_bg_image'); ?>

<section class="hp-areas blue" style="background-image:url(<?php echo $areas_bg_image; ?>);">
    <div class="container">
        <div class="columns">
            <div class="column-66 centered center">
                <span class="small-orange"><?php the_field('areas_small_title'); ?></span>
                <h2><?php the_field('areas_headline'); ?></h2>
                <a href="<?php the_field('areas_button_link'); ?>" class="orange-button"><?php the_field('areas_button_text'); ?></a>
            </div>
        </div>
    </div>
</section>

<?php $locations_bg_image = get_field('areas_bg_image_bottom'); ?>

<section class="hp-locations blue" style="background-image:url(<?php echo $locations_bg_image; ?>);">
    <div class="mobile-bg" style="background-image:url(<?php echo $locations_bg_image; ?>);"></div>
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <?php the_field('areas_bottom_left'); ?>
            </div>
            <div class="column-33">
                <?php the_field('areas_bottom_right'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'footer-contact',
    array( 
        'class' => 'white-bg grid-bg',
        ) 
    ); 
?>

<?php get_template_part('block', 'mobile-contact'); ?>

<?php get_footer(); ?>