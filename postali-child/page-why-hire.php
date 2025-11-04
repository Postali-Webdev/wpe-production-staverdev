<?php
/**
 * Law Category Interior Page
 * Template Name: Why Hire Us
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<?php if( get_field('section_1_anchor_label')) { 
    $str1 = get_field('section_1_anchor_label');
} ?>
<?php if( get_field('section_2_anchor_label')) { 
    $str2 = get_field('section_2_anchor_label');
} ?>
<?php if( get_field('section_3_anchor_label')) { 
    $str3 = get_field('section_3_anchor_label');
} ?>
<?php if( get_field('section_4_anchor_label')) { 
    $str4 = get_field('section_4_anchor_label');
} ?>

<section class="banner">
	<div class="container">
        <div class="columns">
            <div class="column-50">
                <span>
                    <p class="small-orange">Staver accident injury lawyers, p.c.</p>
                    <div class="spacer-break"></div>
                    <h1><?php the_title(); ?></h1>
                </span>
            </div>
        </div>
    </div>
</section>

<section id="why-hire-main">
    <div class="container">
        <div class="columns">
            <div class="column-50 sticky-nav">
                <div class="on-page-nav">
                    <p class="nav-intro"><?php the_field('on_page_nav_header_text'); ?></p>
                    <ul class="on-page-nav-list">
                        <li id="on-page-1" class="filled"><span class="nav-dot"></span> <?php echo $str1; ?></li>
                        <li id="on-page-2"><span class="nav-dot"></span> <?php echo $str2; ?></li>
                        <li id="on-page-3"><span class="nav-dot"></span> <?php echo $str3; ?></li>
                        <li id="on-page-4"><span class="nav-dot"></span><?php echo $str4; ?></li>
                    </ul>
                </div>
            </div>
            <div class="column-50 main-content">
                <div class="top-image" style="background-image:url('<?php the_field('right_column_top_image'); ?>');">
                    &nbsp;
                </div>
                <div id="top_detector_1"></div>
                <div id="spacer_1"></div>
                <div class="on-page-current" id="current_1"><span class="nav-dot"></span> <?php echo $str1; ?></div>
                <div id="section_1" class="why-section thin">
                    <span class="small-orange">01 <span class="horizontal-line"></span> <?php the_field('section_1_title'); ?></span>
                    <h2><?php the_field('section_1_headline'); ?></h2>
                    <?php if( have_rows('section_1_callouts') ): ?>
                    <?php while( have_rows('section_1_callouts') ): the_row(); ?>
                    <div class="callout">
                        <div class="spacer-30"></div>
                        <?php 
                        $image = get_sub_field('callout_image');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                        <p class="large"><?php the_sub_field('callout_headline'); ?></p>
                        <p><?php the_sub_field('callout_copy'); ?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="spacer-90"></div>
                <div id="top_detector_2"></div>
                <div id="spacer_2"></div>
                <div class="on-page-current" id="current_2"><span class="nav-dot"></span> <?php echo $str2; ?></div>
                <div id="section_2" class="why-section thin white">
                    <div class="section_2_image">
                        <?php 
                        $heaadshot = get_field('section_2_photo');
                        if( !empty( $heaadshot ) ): ?>
                            <img src="<?php echo esc_url($heaadshot['url']); ?>" alt="<?php echo esc_attr($heaadshot['alt']); ?>" />
                        <?php endif; ?> 
                    </div>
                    <div class="section_2_text">
                        <span class="small-orange">02 <span class="horizontal-line"></span> <?php the_field('section_2_title'); ?></span>
                        <?php the_field('section_2_copy'); ?>
                    </div>
                </div>
                <div class="spacer-90"></div>
                <div id="top_detector_3"></div>
                <div id="spacer_3"></div>
                <div class="on-page-current" id="current_3"><span class="nav-dot"></span> <?php echo $str3; ?></div>
                <div id="section_3" class="why-section">
                    <div class="section_3_upper">
                        <span class="small-orange">03 <span class="horizontal-line"></span> <?php the_field('section_3_title'); ?></span>
                        <h2><?php the_field('section_3_headline'); ?></h2>
                        <p><?php the_field('section_3_intro_copy'); ?></p>
                    </div>
                    <div class="section_3_lower">
                        <div class="box quote">
                            <div class="box-content">
                                <?php the_field('section_3_box_quote'); ?>
                            </div>
                            <div class="box-link">
                                <a href="<?php the_field('section_3_box_quote_link'); ?>" title="Read all reviews"><span class="small-orange">Read All Reviews <span class="icon-arrow-right2"></span></span></a>
                            </div>
                        </div>
                        <div class="box result">
                            <div class="box-content">
                                <?php the_field('section_3_box_result'); ?>
                            </div>
                            <div class="box-link">
                                <a href="<?php the_field('section_3_box_result_link'); ?>" title="See all case results"><span class="small-orange">See all case results <span class="icon-arrow-right2"></span></span></a>
                            </div>
                        </div>
                        <div class="box video" style="opacity: 0;">
                            <div class="box-content">
                            </div>
                            <div class="box-link">
                            </div>
                        </div>
                        <div class="clients-helped">
                            <div class="helped-counter">
                                <span class="helped-number">3500+</span><br>
                                <span class="helped-text">Clients Helped</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spacer-90"></div>
                <div id="top_detector_4"></div>
                <div id="spacer_4"></div>
                <div class="on-page-current" id="current_4"><span class="nav-dot"></span> <?php echo $str4; ?></div>
                <div id="section_4" class="why-section thin">
                    <span class="small-orange">04 <span class="horizontal-line"></span> <?php the_field('section_4_title'); ?></span>
                    <h2><?php the_field('section_4_headline'); ?></h2>
                    <p><?php the_field('section_4_intro_copy'); ?></p>

                    <div class="what-is">
                        <?php the_field('section_4_define'); ?>
                    </div>
                </div>
            </div>
            <div class="spacer-90"></div>
        </div>
    </div>
    <div class="container bottom">
            <div class="column-50 bottom-copy">
                <?php the_field('bottom_copy_block'); ?>
            </div>
            <div class="column-50 bottom-image">
                <div class="btm-image" style="background-image:url('<?php the_field('right_column_top_image'); ?>');">
                    &nbsp;
                </div>
            </div>
        </div>
</section>

<?php get_template_part('block', 'mobile-contact');?>
<?php get_template_part('block', 'footer-contact');?>
	
<?php get_footer(); ?>