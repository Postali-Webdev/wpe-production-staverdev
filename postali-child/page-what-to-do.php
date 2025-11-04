<?php
/**
 * Law Category Interior Page
 * Template Name: What To Do
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
                    <h2> <?php the_field('section_1_title'); ?></h2>
                    <?php the_field('section_1_copy'); ?>
                </div>
                <div class="spacer-90"></div>
                <div id="top_detector_2"></div>
                <div id="spacer_2"></div>
                <div class="on-page-current" id="current_2"><span class="nav-dot"></span> <?php echo $str2; ?></div>
                <div id="section_2" class="why-section thin">
                    <div class="section_2_text">
                        <h2> <?php the_field('section_2_title'); ?></h2>
                        <?php the_field('section_2_copy'); ?>
                    </div>
                    <?php $p=1; ?>
                    <?php if( have_rows('section_2_callouts') ): ?>
                    <?php while( have_rows('section_2_callouts') ): the_row(); ?>
                    <div class="callout">
                        <div class="spacer-30"></div>
                        <?php 
                        $image = get_sub_field('callout_image');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                        <span class="small-orange">0<?php echo $p; ?> <span class="horizontal-line"></span> <?php the_sub_field('callout_headline'); ?></span>
                        <p><?php the_sub_field('callout_copy'); ?></p>
                    </div>

                    <?php $p++; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="spacer-90"></div>
                <div id="top_detector_3"></div>
                <div id="spacer_3"></div>
                <div class="on-page-current" id="current_3"><span class="nav-dot"></span> <?php echo $str3; ?></div>
                <div id="section_3" class="why-section white">
                    <h2> <?php the_field('section_3_title'); ?></h2>
                    <?php the_field('section_3_copy'); ?>
                </div>
                
                <div class="section_4_img" style="background-image:url('<?php the_field('section_4_image'); ?>');">

                </div>
                <div id="section_4" class="why-section thin">
                    <h2><?php the_field('section_4_headline'); ?></h2>
                    <?php the_field('section_4_copy'); ?>
                </div>
            </div>
            <div class="spacer-90"></div>
        </div>
    </div>

</section>

<?php get_template_part('block', 'mobile-contact');?>
<?php get_template_part('block', 'footer-contact');?>
	
<?php get_footer(); ?>