<?php
/**
 * Template Name: Location Homepage
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<section class="banner home ignore-lazy">
    <div class="container">
        <?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
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

<section class="hp-damages">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <span class="small-orange"><?php the_field('damages_small_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('damages_headline'); ?></h2>
                <p><?php the_field('damages_main_copy'); ?></p>
                <div class="spacer-30"></div>
                <a href="<?php the_field('damages_button_link'); ?>" class="orange-button"><?php the_field('damages_button_text'); ?></a>
            </div>
            <div class="column-50">
                <div class="spacer-60"></div>
                <?php if (have_rows('damages_list')): ?>
                <ul>
                <?php while (have_rows('damages_list')): the_row(); ?>
                    <li>
                    <?php if(get_sub_field('list_item_link')) { ?>
                        <a href="<?php the_sub_field('list_item_link'); ?>"><?php the_sub_field('list_item_text'); ?> <span class="icon-arrow-right2"></span> </a>
                    <?php } else { ?>
                        <?php the_sub_field('list_item_text'); ?>
                    <?php } ?>
                    </li>
                <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php $p_11_bg_image = get_field('panel_11_bg_image'); ?>

<section class="hp-insights blue" style="background-image:url(<?php echo $p_11_bg_image; ?>);">
    <div class="bg-mobile">
        <img src="<?php echo $p_11_bg_image; ?>" alt="">
    </div>
    <div class="spacer-break"></div>
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <h2><?php the_field('panel_11_headline'); ?></h2>
                <?php the_field('panel_11_main_copy'); ?>
                <a href="<?php the_field('panel_11_button_link'); ?>" class="orange-button"><?php the_field('panel_11_button_text'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="hp-matters touts">
    <div class="container">
        <div class="columns">
            <div class="column-full centered center">
                <h2><?php the_field('panel_11_bottom_headline'); ?></h2>
            </div>
        <?php if (have_rows('panel_11_touts')): ?>
        <?php while (have_rows('panel_11_touts')): the_row(); ?>
            <div class="banner-tout column-33">
                <div class="tout-title"><?php the_sub_field('headline'); ?></div>
                <p><?php the_sub_field('content'); ?></p>
            </div>
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

<section class="hp-practice lightgray">
    <div class="container">
        <div class="columns">
            <div class="column-66 centered center">
                <span class="small-orange"><?php the_field('panel_7_small_title'); ?></span>
                <h2><?php the_field('panel_7_headline'); ?></h2>
                <p class="med"><?php the_field('panel_7_intro_copy'); ?></p>
            </div>

            <div class="spacer-30"></div>

            <?php if (have_rows('panel_7_practice_areas')): ?>
            <?php while (have_rows('panel_7_practice_areas')): the_row(); ?>
                <div class="pa-list">
                    <div class="column-25">
                        <h3><?php the_sub_field('pa_title'); ?></h3>
                    </div>
                    <div class="column-75">
                        <p><?php the_sub_field('pa_content'); ?></p>
                        <?php 
                        $link = get_sub_field('page_link');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="orange-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>

<section class="hp-our-process claims-process">
    <div class="container">
        <div class="columns">
            <div class="column-75 centered center">
                <span class="small-orange"><?php the_field('panel_10_small_title_top'); ?></span>
                <h2><?php the_field('panel_10_headline'); ?></h2>
                <p class="med"><?php the_field('panel_10_main_copy'); ?></p>
            </div>
            <div class="spacer-60"></div>
            <?php if (have_rows('panel_10_touts')): ?>
            <?php while (have_rows('panel_10_touts')): the_row(); ?>
                <div class="banner-tout column-50">
                    <div class="tout-title"><?php the_sub_field('headline'); ?></div>
                    <p><?php the_sub_field('content'); ?></p>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <?php if(get_field('panel_10_small_title_bottom')) { ?>

        <div class="spacer-90"></div>
        <div class="columns">
            <div class="column-75 centered center">
                <span class="small-orange"><?php the_field('panel_10_small_title_bottom'); ?></span>
                <h2><?php the_field('panel_10_headline_bottom'); ?></h2>
                <p class="med"><?php the_field('panel_10_main_copy_bottom'); ?></p>
            </div>
        </div>
        <div class="spacer-60"></div>

        <?php } ?>

        <div class="columns">
            <?php $i = 1; ?>
            <?php if( have_rows('process_tabbed_content') ): ?>
                <div class="process-tabs">
                    <?php while( have_rows('process_tabbed_content') ): the_row(); 
                        $tab_title = get_sub_field('tab_title');
                    ?>
                    <span class="tab-link <?php if ($i == 1) { ?>current<?php } else { ?><?php } ?>" data-tab="tab-<?php echo $i; ?>" id="tab-<?php echo $i; ?>-nav">
                        <?php echo $tab_title; ?>
                        <div class="spacer-15"></div>
                    </span>
                    <?php $i++; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <div class="spacer-90"></div>

            <?php $n = 1; ?>
            <?php if( have_rows('process_tabbed_content') ): ?>
            <div class="column-66 center">
                <div class="process-blocks">
                    <?php while( have_rows('process_tabbed_content') ): the_row(); 
                        $tab_content = get_sub_field('tab_content');
                    ?>
                    <div id="tab-<?php echo $n; ?>" class="process-content <?php if ($n == 1) { ?>current<?php } else { ?><?php } ?> <?php if ($n == 5) { ?>five<?php } else { ?><?php } ?>"><?php echo $tab_content; ?>
                        <div class="spacer-30"></div>
                        <span class="previous-next">
                            <span class="back"><span class="icon-slick-prev"></span> Previous Step</span>
                            <span class="next">Next Step <?php the_sub_field('next_step'); ?> <span class="icon-slick-next"></span></span>
                        </span>
                    </div>
                    <?php $n++; ?>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="spacer-60"></div>
        </div>
    </div>
</section>

<section class="hp-process">
    <div class="container">
        <div class="columns">
            <div class="column-50 sticky">
                <span class="small-orange"><?php the_field('steps_small_title'); ?></span>
                <div class="spacer-15"></div>
                <h2><?php the_field('steps_headline'); ?></h2>
                <p><?php the_field('steps_main_copy'); ?></p>
                <div class="spacer-15"></div>
                <a href="<?php the_field('steps_button_link'); ?>" class="orange-button"><?php the_field('steps_button_text'); ?></a>
            </div>
            <div class="column-50">
                <?php if (have_rows('steps_repeater')): ?>
                <?php $n = 1; ?>
                <?php while (have_rows('steps_repeater')): the_row(); ?>
                    <div class="process-steps">
                        <div class="step-number">
                            <?php echo $n; ?>.
                        </div>
                        <div class="step-content">
                            <h3><?php the_sub_field('step_headline'); ?></h3>
                            <p><?php the_sub_field('step_copy'); ?></p>
                        </div>
                    </div>
                    <?php $n++; ?>
                <?php endwhile; ?>
                <?php endif; ?>
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

<?php if(get_field('faq_small_title')) { ?>

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
        
            <?php if (have_rows('faqs')): ?>

            <?php
            $repeater = get_field('faqs'); // Get repeater field
            $total_rows = count($repeater); // Count total rows
            $halfway_point = floor($total_rows / 2); // Calculate halfway point
            $current_index = 0; // Initialize counter

            ?>
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

<?php } ?>

<?php if(get_field('panel_8_small_title')) { ?>

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

        <?php 
            $count = count(get_field("panel_8_boxed_content"));
        ?>

            <?php if (have_rows('panel_8_boxed_content')): ?>
            <?php while (have_rows('panel_8_boxed_content')): the_row(); ?>

            <?php if ($count == 3) { 
                $columns = 'column-33';    
            } elseif ($count == 4) {
                $columns = 'column-25';
            } ?>

                <div class="<?php echo $columns; ?> tout-box">
                    <h4 class="tout-title"><?php the_sub_field('headline'); ?></h4>
                    <?php the_sub_field('content'); ?>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
            
            <?php $count = 0; ?>

        </div>
    </div>
</section>

<?php } ?>

<?php get_template_part('block', 'footer-contact',
    array( 
        'class' => 'white-bg grid-bg',
        ) 
    ); 
?>

<?php get_template_part('block', 'mobile-contact'); ?>

<?php get_footer(); ?>