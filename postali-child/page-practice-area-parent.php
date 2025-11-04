<?php
/**
 * Template Name: Practice Area Parent
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
<?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<section class="banner" id="practice-area-parent" style="background-image:url('<?php echo $featImg[0]; ?>');">
<?php } else { ?>
<section class="banner" id="practice-area-parent">
<?php } ?>

    <div class="container">
        <div class="columns">
            <div class="column-50">
                <div class="left-container">
                    <span class="small-orange">Practice Areas</span>
                    <h1><?php the_field('main_headline'); ?></h1>
                    <div class="spacer-30"></div>
                    <?php the_field('intro_copy'); ?>
                    <div class="banner-cta-container">
                        <a href="tel:312-236-2900" class="orange-button" title="call us at (312) 236-2900">(312) 236-2900</a>
                        <div class="spacer-15 mobile"></div>
                        <a href="/do-i-have-a-case/" class="outline-button" title="Do I Have a Case?">Do I Have a Case?</a>
                    </div>
                    <?php the_field('lower_intro_copy'); ?>
                </div>
            </div>
            <div class="column-50"></div>
        </div>
        <?php get_template_part('block', 'jump-navigation');?>
    </div>
</section>

<div class="spacer-60"></div>

<section id="help">
    <div class="container">
        <div class="columns middle">
            <div class="column-50">
                <span class="small-orange" id="section-1">How We Can Help</span>
                <div class="spacer-15"></div>
                <?php the_field('how_panel_1_left'); ?>
                <a href="/contact-us/" title="Contact Staver Accident Injury Lawyers today" class="orange-button">Contact us Today</a>
                <div class="spacer-15"></div>
            </div>
            <div class="column-50 image-block">
                <div class="text-block">
                    <div class="text-top">Jared Staver</div>
                    <div class="text-bottom">Ally. Advocate. Advisor.</div>
                </div>
                <img src="<?php the_field('how_panel_1_img'); ?>" alt="How we can help" class="half-column">
            </div>
        </div>
        <div class="spacer-90"></div>
        <div class="columns middle circles" >
            <div class="column-25"><?php the_field('how_panel_2_left'); ?></div>
            <?php
                $eval = 'Free case evaluation';
                $zero = '$0.00 out of pocket expenses';
                $fee = 'No fee unless you win';
            ?>
                <div class="column-25">
                    <span class="orange-circle">
                        <?php echo $eval; ?>
                    </span>
                </div>
                <div class="column-25">
                    <span class="orange-circle">
                        <?php echo $zero; ?>
                    </span>
                </div>
                <div class="column-25">
                    <span class="orange-circle last">
                        <?php echo $fee; ?>
                    </span>
                </div>
        </div>
        <div class="spacer-90"></div>
        <div class="columns middle">
            <div class="column-66">
                <div class="average-payout">
                    <?php 
                        $avg = 'Average Payout Amount';
                        $atty = 'w/attorney';
                        $own = 'on your own';
                        $diff = 'Difference of';
                        $accd = 'According to the 2017 Martindale-Nolo Research.';
                    ?>
                    <span class="payout-left">
                    <p class="large"><?php echo $avg; ?>*</p>
                    <div class="spacer-break"></div>
                        <span class="circle-outer">
                            <span class="circle-text">
                                <span class="smaller"><?php echo $atty; ?></span>
                                <span class="larger">$<span id="counter"><span class="counter-value" data-count="77">1</span></span>,600</span>
                            </span>
                        </span>
                        <span class="circle-inner">
                            <span class="circle-text">
                                <span class="smaller"><?php echo $own; ?></span>
                                <span class="larger">$<span id="counter"><span class="counter-value" data-count="17">1</span></span>,600</span>
                            </span>
                        </span>
                    </span>
                    <span class="payout-right">
                        <span class="difference-box">
                            <span class="text-left"><?php echo $diff; ?></span>
                            <span class="text-right">$<span id="counter"><span class="counter-value" data-count="60">1</span></span>,000.00</span>
                        </span>
                        <p class="small">*<?php echo $accd; ?></p>
                    </span>
                </div>
            </div>
            <div class="column-33 wide">
                <?php the_field('how_panel_3_right'); ?>
            </div>
        </div>
    </div>
</section>




<section id="case">
    <div class="container">
        <div class="columns middle">
            <div class="column-50">
                <span class="small-orange" id="section-2">Building Your Case</span>
                <div class="spacer-15"></div>
                <?php the_field('case_panel_1_left'); ?>
            </div>
            <div class="column-50">
                <img src="<?php the_field('case_panel_1_img'); ?>" alt="Building your case" class="half-column">
            </div>
        </div>

        <span class="spacer-90"></span>

        <?php if( get_field('case_details_copy') ): ?>
        <hr><div class="spacer-90"></div>
        <div class="columns case-repeater">
            <div class="column-33">
                <h2 class="striped"><?php the_field('case_details_h2'); ?></h2>
            </div>
            <div class="column-66">
                <?php the_field('case_details_copy'); ?>
                <?php if( get_field('case_details_video_embed_url') ) : ?>
                    <iframe width="560" height="315" src="<?php echo esc_url( get_field('case_details_video_embed_url') ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php endif; ?>
                <span class="spacer-60"></span>
            </div>
        </div>
        <?php endif; ?>

        <?php if( get_field('insurance_copy') ): ?>
            <hr><div class="spacer-90"></div>
        <div class="columns case-repeater">
            <div class="column-33">
                <h2 class="striped"><?php the_field('insurance_h2'); ?></h2>
            </div>
            <div class="column-66">
                <?php the_field('insurance_copy'); ?>
                <?php if( get_field('insurance_video_embed_url') ) : ?>
                    <iframe width="560" height="315" src="<?php echo esc_url( get_field('insurance_video_embed_url') ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php endif; ?>
                <span class="spacer-60"></span>
            </div>
        </div>
        <?php endif; ?>

        <?php if( get_field('defenses_copy') ): ?>
            <hr><div class="spacer-90"></div>
        <div class="columns case-repeater">
            <div class="column-33">
                <h2 class="striped"><?php the_field('defenses_h2'); ?></h2>
            </div>
            <div class="column-66">
                <?php the_field('defenses_copy'); ?>
                <span class="spacer-60"></span>
            </div>
        </div>
        <?php endif; ?>

        <?php if( get_field('laws_copy') ): ?>
            <hr><div class="spacer-90"></div>
        <div class="columns case-repeater">
            <div class="column-33">
                <h2 class="striped"><?php the_field('laws_h2'); ?></h2>
            </div>
            <div class="column-66">
                <?php the_field('laws_copy'); ?>
                <span class="spacer-60"></span>
            </div>
        </div>
        <?php endif; ?>

        <hr>
        <div class="spacer-60"></div>

        <?php $a = 0; ?>
        <?php if( have_rows('faq_accordions') ): ?>
        <div class="columns">
            <div class="column-33">
                <h2><?php the_field('faq_h2'); ?></h2>
            </div>
            <div class="column-66">
            <?php while( have_rows('faq_accordions') ): the_row(); ?>
                <div class="accordions">
                    <div class="row">
                        <div class="col">
                            <div class="tabs">
                                <div class="tab">
                                    <input type="checkbox" id="chck<?php echo $a; ?>">
                                    <label class="tab-label" for="chck<?php echo $a; ?>"><span class="title"><h3><?php the_sub_field('faq_accordion_title'); ?></h3></span></label>
                                    <div class="tab-content">
                                        <p><?php the_sub_field('faq_accordion_copy'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $a++; ?>
            <?php endwhile; ?>
            </div>
        </div>
        <div class="spacer-90"></div>
        <hr>
        <?php endif; ?> 
        
        <div class="spacer-60"></div>

        <div class="columns middle" id="office-locations">
            <div class="column-50">
                <h2><?php the_field('locations_h2'); ?></h2>
            </div>
            <div class="column-50">
                <p class="large"><strong>We cover the whole of the Chicagoland area:</strong></p>
                <p><a href="/" title="Our Chicago Office">Chicago</a>, <a href="/locations/aurora/" title="Our Aurora Office">Aurora</a>, <a href="/locations/elgin/" title="Our Elgin Office">Elgin</a>, <a href="/locations/hinsdale/" title="Our Hinsdale Office">Hinsdale</a>, <a href="/locations/naperville/" title="Our Naperville Office">Naperville</a>, <a href="/locations/joliet/" title="Our Joliet Office">Joliet</a>, <a href="/locations/waukegan/" title="Our Waukegan Office">Waukegan</a></p>
            </div>
        </div>

    </div>
</section>

<section id="related-articles" class="dkblue">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                
                <?php 
                    if (is_page(18954) ) { $category_name = 'Car Accident'; } 
                    elseif (is_page(19240) ) { $category_name = 'Truck Accident'; } 
                    elseif (is_page(19246) ) { $category_name = 'Medical Malpractice'; } 
                    elseif (is_page(19238) ) { $category_name = 'Motorcycle Accident'; } 
                    elseif (is_page(19242) ) { $category_name = 'Premises Liability'; } 
                    elseif (is_page(18954) ) { $category_name = 'Product Liability'; } 
                    elseif (is_page(19621) ) { $category_name = 'Workers Compensation'; } 
                    elseif (is_page(19250) ) { $category_name = 'Wrongful Death'; } 
                    elseif (is_page(19601) ) { $category_name = 'Dog Bite'; } 
                ?>
                <h2>More <?php echo $category_name; ?> Resources</h2>
                <p class="large">When you're fighting for maximum compensation, we know what it takes to get it.</p>
                    
                <?php 
                unset($category_name); 
                unset($categoryID); 
                ?>
            </div>
            <div class="column-66">
                <?php 
                $args = array( 
                    'posts_per_page' => 2, 
                    'category' => get_field('post_category'),
                    'category__not_in' => 6,
                );
                
                $myposts = get_posts( $args );
                foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                    <div class="post-container">
                        <a class="white-box" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                            <?php get_template_part('block', 'blog-thumb');?>   
    
                            <span class="related-content">
                                <span class="small-orange"><span data-nosnippet=""><?php the_date(); ?></span></span>
                                <h4><?php the_title(); ?></h4>
                                <div class="spacer-15"></div>
                            </span>
                        </a>
                        <div class="author-box">
                            <img src="/wp-content/uploads/2021/10/blog-cutout-jared.png" alt="Jared Staver"> <p class="small">Written by <a href="#" title="" class="author-link"><?php the_author(); ?></a></p>
                        </div>
                    </div>
                <?php endforeach; 
                wp_reset_postdata();?>
                <div class="column-full">
                    <p><a href="/blog/" title="Visit our Legal Blog">Visit our Legal Blog page</a> <span class="icon-arrow-right2"></span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="process">
    <div class="container">
        <div class="columns middle">
            <div class="column-50">
                <span class="small-orange" id="section-3">Our Process</span>
                <div class="spacer-15"></div>
                <?php the_field('process_panel_1_left'); ?>
                <a href="/contact-us/" title="Contact Staver Accident Injury Lawyers today" class="orange-button">Contact us Today</a>
                <div class="spacer-15"></div>
                <p class="large"><strong>Or learn more about our process...</strong></p>
                <div class="spacer-15"></div>
            </div>
            <div class="column-50 image-block">
                <div class="text-block">
                    <div class="text-top">Share Your Story with Us</div>
                    <div class="text-bottom">We'll do the rest</div>
                </div>
                <img src="<?php the_field('process_panel_1_img'); ?>" alt="How we can help" class="half-column">
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
                    <div id="tab-<?php echo $n; ?>" class="process-content <?php echo( $n == 1 ? 'current' : ''); ?>" >

                        <?php echo $tab_content; ?>
                        <div class="spacer-30"></div>
                        <span class="previous-next">
                            <span class="back"><span class="icon-drw-chevron-left"></span></span>
                            <span class="separator"> | </span>
                            <span class="next">
                                <span class="underlined">
                                    <?php
                                    echo 'Next Step:';
                                    the_sub_field('next_step'); 
                                    ?>
                                </span>
                            </span>
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
                <div class="cta-link-container"><a href="/contact-us/" title="Contact Staver Accident Injury Lawyers today" class="cta-link">Contact us online</a> &nbsp; <span class="icon-arrow-right2"></span></div>
            </div>
        </div>
    </div>
</section>

<section id="why">
    <div class="container">
        <div class="columns"> 
            <div class="column-50">
                <span class="small-orange" id="section-4">Why Staver?</span>
                <div class="spacer-15"></div>
                <?php the_field('why_panel_1_left'); ?>
                <a href="/contact-us/" title="Contact Staver Accident Injury Lawyers today" class="orange-button">Contact us Today</a>
                <div class="spacer-15"></div>
                <p class="large"><strong>Or learn how...</strong></p>
                <div class="spacer-15"></div>
            </div>
            <div class="column-50 image-block">
                <div class="text-block">
                    <div class="text-top">3500+</div>
                    <div class="text-bottom">Clients Helped</div>
                </div>
                <img src="<?php the_field('why_panel_1_img'); ?>" alt="Why Staver?" class="half-column">
            </div>
        </div>
        <div class="columns">
            <div class="column-50 center">
                <div class="spacer-90"></div>
                <div class="spacer-30"></div>
                <?php the_field('why_panel_2'); ?>
                <div class="spacer-90"></div>
                <div class="spacer-30"></div>
            </div>            
        </div>  
        <div class="columns middle">
        <div class="column-33">
                <?php the_field('why_panel_3_left'); ?>
            </div>
            <div class="column-66">
                <div class="testimonial-container">
                    <?php the_field('why_panel_3_quote'); ?>
                    <div class="stars">★★★★★</div>
                </div>
                <div class="spacer-30"></div>
                <p class="read-more"><a href="/testimonials/" title="Read more reviews">Read more reviews</a> <span class="icon-arrow-right2"></span></p>
            </div>
        </div>
        <div class="spacer-90"></div>
        <div class="spacer-30"></div>
        <div class="columns middle">
            <div class="column-66">

            <?php if( have_rows('result_container') ): ?>
                <div class="result-box-container">  
                    <?php while( have_rows('result_container') ): the_row(); 
                        $result_link = get_sub_field('result_link');
                        $result_amount = get_sub_field('result_amount');
                        $result_copy = get_sub_field('result_copy');
                    ?>
                        <a class="result-box" href="<?php echo $result_link; ?>">
                            <h3><?php echo $result_amount; ?></h3>
                            <p><?php echo $result_copy; ?></p>
                        </a>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
                
            </div>
            <div class="column-33">
                <?php the_field('why_panel_4_right'); ?>
            </div>
        </div>
        <div class="columns">
            <div class="column-33">
                <div class="spacer-30"></div>
                <p class="results-disclaimer">The outcome of an individual case depends on a variety of factors unique to that case. Case results do not guarantee or predict a similar result in any similar or future case.</p>
                <p class="read-more"><a href="/settlements/" title="Read more results">Read more results</a> <span class="icon-arrow-right2"></span></p>
            </div>
            <div class="column-66"></div>
            <div class="spacer-break"></div>
        </div>
        <div class="spacer-90"></div>
        <div class="spacer-30"></div>
        <div class="columns middle">
            <div class="column-33"><?php the_field('why_panel_5_left'); ?></div>
            <div class="column-66 row">
                <?php get_template_part('block', 'awards');?>
            </div>
    </div>
</section>

<?php get_template_part('block', 'consultation');?>

<div class="bottom-block">

<?php get_template_part('block', 'looking-for');?>

<?php get_template_part('block', 'mobile-contact');?>

</div>

<?php get_template_part('block', 'footer-contact');?>

<?php get_footer(); ?>