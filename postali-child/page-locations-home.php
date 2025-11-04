<?php
/**
 * Template Name: Location Homepage
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<section class="banner">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <div class="left-container">
                    <?php the_field('banner_left_container'); ?>
                    <span class="spacer-30"></span>
                    <span class="spacer-15"></span>
                    <a href="/about-us/why-you-should-hire-us/" class="orange-button">Why Hire Us?</a>
                    <div class="spacer-15 mobile"></div>
                    <a href="/do-i-have-a-case/" class="outline-button" title="Do I Have a Case?">Do I Have a Case?</a>
                    <div class="spacer-15 mobile"></div>
                </div>
            </div>
            <div class="column">
                <div class="banner-container">
                    <div class="left-column">
                        <ul class="banner-menu">
                        <li class="snapshot active">SNAPSHOT</li>
                        <li class="reviews">REVIEWS</li>
                        <li class="results">RESULTS</li>
                        <li class="awards">AWARDS</li>
                    </div>
                    <div class="right-column">
                        <div class="mobile-banner-menu">
                            <input type="text" value="SNAPSHOT" readonly />
                            <ul>
                                <li class="snapshot-mobile">SNAPSHOT</li>
                                <li class="reviews-mobile">REVIEWS</li>
                                <li class="results-mobile">RESULTS</li>
                                <li class="awards-mobile">AWARDS</li>
                            </ul>
                        </div>
                        <div class="columns active scrolling-snapshot" id="snapshot">
                        <?php if( have_rows('snapshot_container') ): ?>
                        <?php while( have_rows('snapshot_container') ): the_row(); ?>
                            <a class="inner-column" href="<?php the_sub_field('snapshot_box_link'); ?>" target="blank">
                                <div class="inner-column-container">
                                    <?php the_sub_field('snapshot_box_content'); ?>
                                </div>
                            </a>
                        <?php endwhile; ?>
                        <?php endif; ?>    
                        </div>

                        <div class="columns" id="reviews">
                        <?php if( have_rows('reviews_container') ): ?>
                        <?php while( have_rows('reviews_container') ): the_row(); ?>
                            <a class="inner-column" href="<?php the_sub_field('reviews_box_link'); ?>">
                                <div class="inner-column-container">
                                    <?php the_sub_field('reviews_box_content'); ?>
                                </div>
                            </a>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        </div>

                        <div class="columns" id="results">
                        <?php if( have_rows('results_container') ): ?>
                        <?php while( have_rows('results_container') ): the_row(); ?>
                            <a class="inner-column" href="<?php the_sub_field('results_box_link'); ?>">
                                <div class="inner-column-container">
                                    <?php the_sub_field('results_box_content'); ?>
                                </div>
                            </a>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        </div>

                        <div class="columns" id="awards">
                        <?php if( have_rows('awards_container') ): ?>
                        <?php while( have_rows('awards_container') ): the_row(); ?>
                            <a class="inner-column" href="<?php the_sub_field('awards_box_link'); ?>">
                                <div class="inner-column-container">
                                    <img src="<?php the_sub_field('awards_box_content'); ?>">
                                </div>
                            </a>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
            <span class="small-orange" id="section-1">How We Help</span>
            <div class="spacer-15"></div>
            <div class="column-50">
                <?php the_field('panel_1_left_copy_block'); ?>
            </div>
            <div class="column-50">
                <div class="white-box">
                    
                    <?php
                    global $post;

                    $current_page_id = $post->ID;
                    $current_page_parent_id = $post->post_parent;

                    ?>

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
                        }
                    } ?>
                    
                    <div>
                        <div class="main-contact">
                        <?php while( have_rows('locations', 'options') ) : the_row();
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
                        $add_location = false; ?>

                        <!-- English  -->

                        <?php if( !$is_primary && in_array($current_page_id, $secondary_locations) && $current_page_id == $page_id ) : ?>
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
                        <?php endif; ?>
                        
                        <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                
                <div class="spacer-30"></div>

                <div class="white-box">
                    <?php the_field('panel_1_right_copy_block'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="attorney-block">
    <div class="container">
        <h2>Meet Our Team of Attorneys</h2>
        <div class="spacer-break"></div>
        <div class="columns">
            <?php get_template_part('block', 'attorneys');?>
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
                <?php get_template_part('block', 'awards');?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'location-results');?>

<section class="hp-panel-5">
    <div class="container">
        <div class="columns">
            <h3>We’ve Earned the Support from Our Clients</h3>
            <span class="spacer-30"></span>
            <div class="column-66">
                <div class="testimonial-container">
                    <p class="large">Every time I’ve called, I’ve been asked how I’m feeling and how my medical treatment is going first. I’ve had every question answered as thoroughly and completely as possible, never been put on hold for more than about a minute, and all calls and emails are returned within less than a day. . . . I’d recommend them 100%.”</p>
                    <p class="small caps">Stephanie N.</p>
                    <div class="stars">★★★★★</div>
                </div>
                <div class="spacer-30"></div>
                <p class="read-more"><a href="/testimonials/" title="Read more reviews">Read more reviews</a> <span class="icon-arrow-right2"></span></p>
            </div>
            <div class="column-33">
                <div class="client-testimonial">
                    <div class="text-block">
                        <div class="text-top">4.9</div>
                        <div class="stars">★★★★★</div>
                        <div class="text-bottom">google rating</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer-90"></div>
        <div class="columns">
            <div class="column-50 striped center">
                <?php the_field('testimonials_left_column_copy'); ?>
                <?php the_field('testimonials_right_column_copy'); ?>
            </div>
        </div>
    </div>
</section>

<section class="hp-panel-6">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <span class="small-orange" id="section-2">Compensation</span>
                <div class="spacer-15"></div>
                <?php the_field('panel_6_left_column'); ?>
            </div>
            <div class="column-50">
                <?php the_field('panel_6_right_column'); ?>
            </div>
        </div>
    </div>
</section>

<section class="how-we-help">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <span class="small-orange" id="section-3">Why you need a lawyer</span>
                <div class="spacer-15"></div>
                <?php the_field('help_left_copy_block'); ?>
            </div>
            <div class="column-66 row">
                <div class="spacer-30"></div>
                <div class="spacer-15"></div>
                <h3>Your attorney will…</h3>
                <div class="spacer-15"></div>
                <div class="white-box" id="step-1">
                    <?php the_field('help_right_box_1'); ?>
                </div>
                <div class="white-box" id="step-2">
                    <?php the_field('help_right_box_2'); ?>
                </div>
                <div class="white-box" id="step-3">
                    <?php the_field('help_right_box_3'); ?>
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

<section class="career">
    <div class="container centered">
        <h2>“…I’d recommend them 100%.”</h2>
        <div class="spacer-15"></div>
        <?php if ( is_tree(19006) ) { ?> <!-- aurora info -->
            <a class="orange-button large" title="Get a free consultation - call today!" href="tel:630-892-0779">request a free consultation - (630) 892-0779</a>
        <?php } elseif ( is_tree(19008) ) { ?> <!-- elgin info -->
            <a class="orange-button large" title="Get a free consultation - call today!" href="tel:847-488-1866">request a free consultation - (847) 488-1866</a>
        <?php } elseif ( is_tree(19010) ) { ?> <!-- hinsdale info -->
            <a class="orange-button large" title="Get a free consultation - call today!" href="tel:630-323-7322">request a free consultation - (630) 323-7322</a>
        <?php } elseif ( is_tree(19012) ) { ?> <!-- joliet info -->
            <a class="orange-button large" title="Get a free consultation - call today!" href="tel:815-726-4405">request a free consultation - (815) 726-4405</a>
        <?php } elseif ( is_tree(19014) ) { ?> <!-- naperville info -->
            <a class="orange-button large" title="Get a free consultation - call today!" href="tel:630-778-3770">request a free consultation - (630) 778-3770</a>
        <?php } elseif ( is_tree(19016) ) { ?> <!-- waukegan info -->
            <a class="orange-button large" title="Get a free consultation - call today!" href="tel:847-249-4148">request a free consultation - (847) 249-4148</a>
        <?php } else { ?> <!-- main chicago info -->
            <a class="orange-button large" title="Get a free consultation - call today!" href="tel:312-236-2900">request a free consultation - (312) 236-2900</a>
        <?php } ?>
        <div class="spacer-60"></div>
    </div>
</section>

<section class="types-of-accidents">
    <div class="container">
        <div class="columns">
            <span class="small-orange" id="section-4">Types of Accidents</span>
            <div class="spacer-15"></div>
            <h2>Motor Vehicle Accidents</h2>
            <div class="spacer-break"></div>
            <div class="column-50">
                <?php the_field('types_left_copy_block'); ?>
            </div>
            <div class="column-50">
                <?php the_field('types_right_copy_block'); ?>
            </div>
        </div>
    </div>
</section>

<section class="hp-practice-area-boxes" id="car-accident-box">
    <div class="container">
        <div class="columns">
            <div class="column-25">
                &nbsp;
            </div>
            <div class="column-75">
                <div class="info-container active" id="car-info">
                    <?php the_field('car_accident_info_box'); ?>
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
                &nbsp;
            </div>
            <div class="column-75">
                <div class="info-container active" id="truck-info">
                    <?php the_field('truck_accident_info_box'); ?>
                </div>
            </div>
        </div>
    </div>
</section>



<?php if (have_rows('other_practice_areas_boxes')): ?>
<section class="hp-cases-header">
    <div class="container centered">
        <h2 class="striped"><?php the_field('other_practice_areas_section_title'); ?></h2>
    </div>
</section>
<section class="other-practice-areas">
    <div class="container">
        <div class="columns">
                
            <?php while (have_rows('other_practice_areas_boxes')): the_row();
                $practice_area_name = get_sub_field('practice_area_name');
                $practice_area_copy = get_sub_field('practice_area_copy');
                $practice_area_link = get_sub_field('practice_area_link');
                $background_image = get_sub_field('background_image');
                //$practice_area_ID = get_sub_field('practice_area_name');
                //$new_ID = str_replace(' ', '', $practice_area_ID);
                ?>
                <!-- <div class="practice-area-container" id="<?php echo $new_ID; ?>"> -->
                <div class="practice-area-container<?php echo !$background_image ? ' no-bg' : ''; echo $practice_area_link ? ' linked-pa' : ''; ?>" <?php echo $background_image ? 'style="background-image: url(' . $background_image['url'] . ');"' : '';  ?>>
                    <?php if($practice_area_link) : ?>
                        <a href="<?php echo $practice_area_link; ?>" title="<?php echo $practice_area_name; ?>"> 
                    <?php else: ?>
                        <div class="pa-wrapper">
                    <?php endif; ?>
                        <span class="spacer-60"></span>
                        <span class="column-33">
                            <h3><?php echo $practice_area_name; ?></h3>
                        </span>
                        <span class="column-66">
                            <p><?php echo $practice_area_copy; ?></p>
                            <?php if($practice_area_link) : ?><span class="orange-button"><?php echo $practice_area_name; ?></span><?php endif; ?>
                        </span>
                        <span class="spacer-60"></span>
                        <hr>
                        <span class="hover"></span>
                    <?php if($practice_area_link) : ?>
                        </a>
                    <?php else: ?>    
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
            
        </div>
    </div>
</section>
<?php endif; ?>












<div class="spacer-60"></div>

<section class="accident-details">
    <div class="container">
    <?php if( have_rows('details') ): ?>
        <div class="columns case-repeater">
            <div class="case-section-title">
                <span class="small-orange">Car Accident Details</span>
            </div>
            <div class="spacer-90"></div>
            <div class="repeater-boxes">
                <?php while( have_rows('details') ): the_row(); ?>
                    <?php if ( get_sub_field('details_link_text') ) : ?>
                        <a class="column-33" href="<?php the_sub_field('details_page_link'); ?>">
                            <?php the_sub_field('details_copy'); ?>
                            <span class="spacer-15"></span>
                            <span class="cta-text"><?php the_sub_field('details_link_text'); ?></span>
                        </a>
                    <?php else : ?>
                        <span class="column-33">
                            <?php the_sub_field('details_copy'); ?>
                        </span>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<section class="claims-process">
    <div class="container">
        <div class="columns">
            <span class="small-orange" id="section-5">Our Process</span>
            <div class="spacer-15"></div>
            <div class="column-50">
                <h2>Our Unique Approach to the Claims Process</h2>
            </div>
            <div class="column-50">
                &nbsp;
            </div>
            <div class="spacer-break"></div>
            <div class="column-50">
                <?php the_field('claims_left_copy_block'); ?>
            </div>
            <div class="column-50">
                <?php the_field('claims_right_copy_block'); ?>
            </div>
        </div>
        <div class="spacer-90"></div>

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
                            <span class="back"><span class="icon-drw-chevron-left"></span></span>
                            <span class="separator"> | </span>
                            <span class="next"><span class="underlined">Next Step: <?php the_sub_field('next_step'); ?></span></span>
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

<section id="after">
    <div class="container">
        <div class="columns middle"> 
            <div class="column-50">
                <span class="small-orange" id="section-6">After the Accident</span>
                <div class="spacer-15"></div>
                <?php the_field('after_panel_1_copy'); ?>
            </div>
            <div class="column-50">
                <img src="<?php the_field('after_panel_1_img'); ?>" alt="Get Medical Treatment" class="half-column">
            </div>
        </div>
        <div class="spacer-90"></div>
        <div class="columns middle"> 
            <div class="column-50">
                <img src="<?php the_field('after_panel_2_img'); ?>" alt="Finish the police report" class="half-column">
            </div>
            <div class="column-50">
                <?php the_field('after_panel_2_copy'); ?>
            </div>
        </div>
        <div class="spacer-90"></div>
        <div class="columns"> 
            <div class="column-50">
                <?php the_field('after_panel_3_copy'); ?>
            </div>
            <div class="column-50">
                <img src="<?php the_field('after_panel_3_img'); ?>" alt="Call Staver Accident Injury Lawyers Today" class="half-column">
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_footer();?>