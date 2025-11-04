<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
 * */
get_header();
?>
<section class="banner ignore-lazy">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <div class="left-container">
                    <h1>Chicago Personal Injury Lawyers</h1>
                    <span class="spacer-30"></span>
                    <span class="h1-sub">Allies. Advocates. Advisors.</span>
                    <span class="cta-text">Call <a href="tel:312-236-2900" title="Call Staver Accident Injury Lawyers - Today">(312) 236-2900</a> to get a free consultation.</span>
                    <a href="/about-us/why-you-should-hire-us/" class="outline-button">Why Hire Us?</a>
                    <div class="spacer-15 mobile"></div>
                    <a href="/do-i-have-a-case/process/" class="orange-button" title="Do I Have a Case?">Do I Have a Case?</a>
                    <div class="spacer-15 mobile"></div>
                </div>
            </div>

            <!--  Column  -->
            <div class="column">
                <div class="banner-container">
                    <div class="left-column">
                        <ul class="banner-menu">
                            <li class="snapshot active">SNAPSHOT</li>
                            <li class="reviews">REVIEWS</li>
                            <li class="results">RESULTS</li>
                            <li class="awards">AWARDS</li>
                        </ul>
                    </div>
                    <div class="right-column">
                        <div class="mobile-banner-menu">
                            <input type="text" value="SNAPSHOT" readonly /><ul><li class="snapshot-mobile">SNAPSHOT</li><li class="reviews-mobile">REVIEWS</li><li class="results-mobile">RESULTS</li><li class="awards-mobile">AWARDS</li></ul>
                        </div>
                            
                        <div class="columns active id="snapshot">
                            <?php if (have_rows('snapshot_container')): ?>
                                <?php while (have_rows('snapshot_container')): the_row(); ?>
                                    <a class="inner-column" href="<?php the_sub_field('snapshot_box_link'); ?>" target="<?php the_sub_field('snapshot_box_target'); ?>" title="Learn more about the firm">
                                        <div class="inner-column-container"><?php the_sub_field('snapshot_box_content'); ?></div></a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>

                        <div class="columns" id="reviews">
                            <?php if (have_rows('reviews_container')): ?>
                                <?php while (have_rows('reviews_container')): the_row(); ?>
                                    <div class="inner-column">
                                        <div class="inner-column-container">
                                            <?php the_sub_field('reviews_box_content'); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>

                        <div class="columns" id="results">
                            <?php if (have_rows('results_container')): ?>
                                <?php while (have_rows('results_container')): the_row(); ?>
                                    <div class="inner-column" >
                                        <div class="inner-column-container">
                                            <?php the_sub_field('results_box_content'); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?> 
                            <?php endif; ?>
                        </div>

                        <div class="columns" id="awards">
                            <?php if (have_rows('awards_container')): ?>
                                <?php while (have_rows('awards_container')): the_row(); ?>
                                    <div class="inner-column" >
                                        <div class="inner-column-container">
                                            <img src="<?php the_sub_field('awards_box_content'); ?>" alt="View our awards & Memberships" height="400" width="189">
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Column  -->
        </div>
    </div>
</section>
<!--/  Non Mobile Banner  -->

<!--/  Mobile Banner  -->
<?php if( have_rows('hp_mobile_scroller') ): ?>
<div class="scrolling-snapshot">
    <?php while( have_rows('hp_mobile_scroller') ): the_row();
        $snapshot_icon = get_sub_field('block_icon');
        $snapshot_title = get_sub_field('block_title');
        $snapshot_headline = get_sub_field('block_headline');
        $snapshot_link_text = get_sub_field('block_link_text');
        $snapshot_link = get_sub_field('block_link');
    ?>
    <div class="slide">
        <div class="snapshot-slide-left">
            <img src="<?php echo esc_url($snapshot_icon['url']); ?>" alt="<?php echo esc_attr($snapshot_icon['alt']); ?>" />
        </div>
        <div class="snapshot-slide-right">
            <p class="title"><?php echo $snapshot_title; ?></p>
            <p class="headline"><?php echo $snapshot_headline; ?></p>
            <p><a href="<?php echo $snapshot_link; ?>" title="View our <?php echo $snapshot_title; ?>"><?php echo $snapshot_link_text; ?></a></p>
        </div>
    </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>

<section class="hp-panel-1 tall">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <span class="small-orange" id="section-1"><?php the_field('panel_1_small_title'); ?></span>
                <div class="spacer-15"></div>
                <?php the_field('panel_1_left_copy_block'); ?>
            </div>
            <div class="column-66 row">
                <div class="white-box" id="step-1">
                    <?php the_field('panel_1_right_box_1'); ?>
                </div>
                <div class="white-box" id="step-2">
                    <?php the_field('panel_1_right_box_2'); ?>
                </div>
                <div class="white-box" id="step-3">
                    <?php the_field('panel_1_right_box_3'); ?>
                </div>
                <div class="clients-helped">
                    <div class="helped-counter">
                        <span class="helped-number">3500+</span><br>
                        <span class="helped-text">Clients Helped</span>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</section>

<section class="hp-panel-2">
    <div class="container striped">
        <div class="columns">
            <div class="column-50">
                <?php the_field('panel_2_column_left'); ?>
            </div>
            <div class="column-50">

                <div class="white-box">

                    <?php if( have_rows('locations', 'options') ) : 
                    $secondary_locations = [];
                    $secondary_locations_esp = [];
                    while( have_rows('locations', 'options') ) {
                        the_row();
                        $is_primary = get_sub_field('is_primary');
                        $page_link = get_sub_field('page_link');
                        $page_id = url_to_postid($page_link); 
                        $page_link_esp = get_sub_field('page_link_spanish');
                        $page_id_esp = url_to_postid($page_link_esp);
                        if( !$is_primary) {
                            $secondary_locations[] .= $page_id;
                            $secondary_locations_esp[] .= $page_id_esp;
                        } elseif( $is_primary) {

                            $name = get_sub_field('name');
                            $address = get_sub_field('address');
                            $phone = get_sub_field('phone');
                            $directions_link = get_sub_field('directions_link');
                            $map_embed = get_sub_field('map_embed');
                            $page_link = get_sub_field('page_link');
                            $page_id = url_to_postid($page_link); 
                            $page_link_esp = get_sub_field('page_link_spanish');
                            $page_id_esp = url_to_postid($page_link_esp); 
                            $is_primary = get_sub_field('is_primary');
                            $add_location = false; 
                        
                            }
                    } ?>
                    
                    <div>
                        <div class="main-contact">

                        <!-- English  -->

                            <p><strong>Visit our <?php _e($name); ?> Office</strong> <br>
                                Staver Accident Injury Lawyers, P.C.<br>
                                <?php _e($address); ?><br>
                                <a target="_blank" class="directions-link" href="<?php _e($directions_link); ?>">Get Directions</a>
                            </p>
                            <p>
                                <strong><span class="orange">P</span></strong> <a href="tel:<?php _e($phone); ?>" title="Call Staver Accident Injury Lawyers Toiday"><?php _e($phone); ?></a>
                                <br>
                                <strong><span class="orange">E</span></strong> <a href="mailto:staver@chicagolawyer.com" title="Email Staver Accident Injury Lawyers Toiday">staver@chicagolawyer.com</a><br>
                            </p>
                            <iframe src="<?php echo esc_url($map_embed); ?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        
                        <?php ?>
                        </div>
                    </div>
                <?php endif; ?>
                </div>


                <?php the_field('panel_2_column_right'); ?>
            </div>
        </div>
    </div>
</section>

    <section class="attorney-block">
        <div class="container">
            <h2>Meet Our Team of Attorneys</h2>
            <div class="spacer-break"></div>
            <div class="columns">
                <?php get_template_part('block', 'attorneys'); ?>
            </div>
        <div>
    </section>

    <section class="hp-panel-4 tall">
        <div class="container">
            <div class="columns">
                <div class="column-33">
                    <div class="spacer-30"></div>
                    <?php the_field('panel_4_left_copy_block'); ?>
                </div>
                <div class="column-66 row">
                    <?php get_template_part('block', 'awards'); ?>
                </div>
            </div>
        </div>
    </section>

            <section class="hp-panel-5">
                <div class="container">
                    <div class="columns">
                        <div class="column-66">
                            <div class="testimonial-container">
                                <p class="large">Every time I’ve called, I’ve been asked how I’m feeling and how my medical treatment is going first. I’ve had every question answered as thoroughly and completely as possible, never been put on hold for more than about a minute, and all calls and emails are returned within less than a day. . . . I’d recommend them 100%.”</p>
                                <p class="small caps">Stephanie N.</p>
                            </div>
                            <div class="spacer-30"></div>
                            <p class="read-more"><a href="/testimonials/" title="Read more reviews">Read more reviews</a> <span class="icon-arrow-right2"></span></p>
                        </div>
                        <div class="column-33">
                            <div class="client-testimonial">
                                <div class="text-block">
                                    <div class="text-top">5.0</div>
                                    <div class="stars">★★★★★</div>
                                    <div class="text-bottom">Avg. google rating</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="career">
                <div class="container centered">
                    <h2>“…I'd recommend them 100%.”</h2>
                    <div class="spacer-15"></div>
                    <a class="orange-button large desktop" title="Get a free consultation - call today!" href="/contact-us/">request a free consultation</a>
                    <a class="orange-button large mobile" title="Get a free consultation - call today!" href="tel:312-236-2900">free consultation - <span class="nowrap">(312) 236-2900</span></a>
                    <div class="spacer-60"></div>
                </div>
            </section>

            <section class="hp-panel-6">
                <div class="container">
                    <div class="columns">
                        <div class="column-50">
                            <span class="small-orange" id="section-2"><?php the_field('panel_6_small_title'); ?></span>
                            <div class="spacer-15"></div>
                            <?php the_field('panel_6_left_column'); ?>
                        </div>
                        <div class="column-50">
                            <div class="text-block">
                                <div class="text-top">Hurt?</div>
                                <div class="text-bottom">Call your doctor*</div>
                            </div>
                            <?php the_field('panel_6_right_column'); ?>
                        </div>
                        <div class="spacer-break"></div>
                        <div class="spacer-90"></div>
                        <div class="spacer-30"></div>
                    </div>
                    <div class="columns">
                        <div class="column-50">
                            <div class="what-is">
                                <?php the_field('panel_6_bottom_left'); ?>
                            </div>
                        </div>
                        <div class="column-50 striped">
                            <?php the_field('panel_6_bottom_right'); ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="hp-slider">
                <div class="container">
                    <div class="columns">
                        <div class="column-25">
                            &nbsp;
                        </div>
                        <div class="column-50">
                            <div class="slide-container">
                                <div id="hp-slides">
                                    <?php if (have_rows('slide_content')): ?>
                                        <?php
                                        while (have_rows('slide_content')): the_row();
                                            $slide_number = get_sub_field('slide_number');
                                            $slide_title = get_sub_field('slide_title');
                                            $slide_copy = get_sub_field('slide_copy');
                                            ?>
                                            <div class="slide">
                                                <div class="slide-number">No. <?php echo $slide_number; ?></div>
                                                <div class="slide-title"><?php echo $slide_title; ?></div>
                                                <div class="slide-copy"><?php echo $slide_copy; ?></div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="column-25">
                            <ul class="nav-container">
                                <div id="hp-slider-nav">
                                    <?php if (have_rows('slide_content')): ?>
                                        <?php
                                        while (have_rows('slide_content')): the_row();
                                            $right_nav_title = get_sub_field('right_nav_title');
                                            ?> 
                                            <li class="slide"><?php echo $right_nav_title; ?></li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="hp-panel-7 tall">
                <div class="container">
                    <div class="columns">
                        <div class="column-33">
                            <span class="small-orange" id="section-3"><?php the_field('panel_7_small_title'); ?></span>
                            <div class="spacer-15"></div>
                            <?php the_field('panel_7_left_copy_block'); ?>
                        </div>
                        <div class="column-66 row">
                            <div class="consultation-box">
                                <div class="consult-image">
                                    <img src="/wp-content/uploads/2025/10/homepage-process-circle.png" alt="Attorney Jared Staver">
                                </div>    
                                <div class="consult-content">
                                    <?php the_field('panel_7_right_consult_block'); ?>
                                </div>
                            </div>
                            <a class="orange-button large" href="tel:312-236-2900">request a free consultation - <span class="nowrap"> (312) 236-2900</span></a>
                        </div>
                    </div>
                    <div class="spacer-90"></div>
                    <p class="large centered"><strong>Personal Injury Claims in Chicago, IL: Step by Step</strong></p>
                    <div class="spacer-60"></div>
                    <div class="columns">
                        <?php if (have_rows('process_steps')): ?>
                            <?php $n = 1; ?>
                            <?php
                            while (have_rows('process_steps')): the_row();
                                $process_step_title = get_sub_field('process_step_title');
                                $process_step_content = get_sub_field('process_step_content');
                                ?> 
                                <div class="column-33">
                                    <span class="number-container"><?php echo $n; ?></span>
                                    <h4><?php echo $process_step_title; ?></h4>
                                    <p><?php echo $process_step_content; ?></p>
                                </div>
                                <?php $n++; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <div class="spacer-90"></div>
                        <a class="orange-button large centered" title="Learn more about the Personal Injury Claims process" href="/laws/legal-process/">Personal Injury Claims process</a>
                    </div>
            </section>

            <section class="hp-panel-8">
                <div class="container">
                    <div class="columns">
                        <div class="column-50">
                            <span class="small-orange" id="section-4"><?php the_field('panel_8_small_title'); ?></span>
                            <div class="spacer-15"></div>
                            <?php the_field('panel_8_left_column'); ?>
                        </div>
                        <div class="column-50">
                            <div class="text-block">
                                <div class="text-top">What Has an Accident Cost You?</div>
                            </div>
                            <?php the_field('panel_8_right_column'); ?>
                        </div>
                        <div class="spacer-break"></div>
                        <div class="spacer-90"></div>
                        <div class="spacer-30"></div>
                    </div>
                    <div class="columns">
                        <div class="column-50">
                            <div class="result-container">
                                <?php the_field('panel_8_bottom_left'); ?>
                            </div>
                            <div class="spacer-30"></div>
                            <p class="read-more"><a href="/settlements/" title="Read more results">Read more results</a> <span class="icon-arrow-right2"></span></p>
                        </div>
                        <div class="column-50 striped">
                            <?php the_field('panel_8_bottom_right'); ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="hp-panel-9">
                <div class="container">
                    <div class="columns">
                        <span class="small-orange" id="section-5"><?php the_field('panel_9_small_title'); ?></span>
                        <div class="spacer-15"></div>
                        <div class="column-50">
                            <?php the_field('panel_9_left_column'); ?>
                        </div>
                        <div class="column-50">
                            <?php the_field('panel_9_right_column'); ?>
                        </div>
                    </div>
                </div>
            </section>

            <div class="spacer-90 mobile"></div>

            <section class="hp-practice-area-boxes" id="car-accident-box">
                <div class="container">
                    <div class="columns">
                        <div class="column-25">
                            <div class="filter-box">
                                <p class="caps">Car Accident Overview</p>
                                <div class="spacer-break"></div>
                                <span id="car-filter-info" class="active">i</span>
                                <span id="car-filter-result">$</span>
                                <span id="car-filter-link"><a href="<?php the_field('car_accident_page_link'); ?>" title="Chicago Car Accident Lawyers"><span class="icon-lugar-chevron"></span></a></span>
                            </div>
                        </div>
                        <div class="column-75">
                            <div class="info-container active" id="car-info">
                                <?php the_field('car_accident_info_box'); ?>
                            </div>
                            <div class="info-container" id="car-result">
                                <?php the_field('car_accident_result_box'); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <div class="spacer-break"></div>
            <section class="hp-practice-area-boxes" id="truck-accident-box">
                <div class="container">
                    <div class="columns">
                        <div class="column-25">
                            <div class="filter-box">
                                <p class="caps">Truck Accident Overview</p>
                                <div class="spacer-break"></div>
                                <span id="truck-filter-info" class="active">i</span>
                                <span id="truck-filter-result">$</span>
                                <span id="truck-filter-link"><a href="<?php the_field('truck_accident_page_link'); ?>" title="Chicago Truck Accident Lawyers"><span class="icon-lugar-chevron"></span></a></span>
                            </div>
                        </div>
                        <div class="column-75">
                            <div class="info-container active" id="truck-info">
                                <?php the_field('truck_accident_info_box'); ?>
                            </div>
                            <div class="info-container" id="truck-result">
                                <?php the_field('truck_accident_result_box'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="hp-panel-10">
                <div class="container">
                    <div class="columns">
                        <div class="column-50">
                            <?php the_field('panel_10_left_column'); ?>
                        </div>
                        <div class="column-50">
                            <?php the_field('panel_10_right_column'); ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="hp-cases-header">
                <div class="container centered">
                    <h2 class="striped">More Personal Injury Practice Areas</h2>
                </div>
            </section>

            <section class="hp-panel-11">
                <div class="container">
                    <div class="columns">
                        <?php if (have_rows('practice_areas')): ?>
                            <?php
                            while (have_rows('practice_areas')): the_row();
                                $practice_area_name = get_sub_field('practice_area_name');
                                $practice_area_copy = get_sub_field('practice_area_copy');
                                $practice_area_link = get_sub_field('practice_area_link');
                                $background_image = get_sub_field('background_image');
                                $practice_area_ID = get_sub_field('practice_area_name');
                                $new_ID = str_replace(' ', '', $practice_area_ID);
                                ?>
                                <div class="practice-area-container" id="<?php echo $new_ID; ?>">
                                    <a href="<?php echo $practice_area_link; ?>" title="<?php echo $practice_area_name; ?>">
                                        <span class="spacer-60"></span>
                                        <span class="column-33">
                                            <h3><?php echo $practice_area_name; ?></h3>
                                        </span>
                                        <span class="column-66">
                                            <p><?php echo $practice_area_copy; ?></p>
                                            <span class="orange-button"><?php echo $practice_area_name; ?></span>
                                        </span>
                                        <span class="spacer-60"></span>
                                        <hr>
                                        <span class="hover"></span>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <section class="hp-panel-12">
                <div class="container">
                    <div class="columns">
                        <div class="column-50 center striped">
                            <?php the_field('panel_12_main_content_block'); ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="footer-pre-justice blue">
                <div class="container">
                    <div class="columns">
                        <div class="column-50">
                            <?php the_field('justice_left_column'); ?>
                        </div>
                        <div class="column-50">
                            <?php the_field('justice_right_column'); ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php get_template_part('block', 'mobile-contact'); ?>
            <?php get_template_part('block', 'footer-contact'); ?>
            <?php get_footer(); ?>