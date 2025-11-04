<?php
/**
 * Law Category Custom Template
 * Template Name: No win no fee
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
<?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<section class="banner" id="practice-area-parent" style="background-image:url('<?php echo $featImg[0]; ?>');">
<?php } else { ?>
<section class="banner" id="practice-area-parent">
<?php } ?>
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

<section>
    <div class="container white" id="section_1">
        <div class="columns">
            <div class="column-25 left-content">
                <?php 
                $image1 = get_field('section_1_left_image');
                if( !empty( $image1 ) ): ?>
                    <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" id="section_1_img" />
                <?php endif; ?>
            </div>
            <div class="column-75 main-content">
                <span class="small-orange">01 <span class="separator"></span> <?php the_field('section_1_section_title'); ?></span>
                <?php the_field('section_1_section_copy'); ?>
            </div>
        </div>
    </div>

    <div class="spacer-break"></div>

    <div class="container" id="section_2">
        <div class="columns">
            <div class="column-25 left-content">
                <?php 
                $image2 = get_field('section_2_left_image');
                if( !empty( $image2 ) ): ?>
                    <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" id="section_2_img" />
                <?php endif; ?>
            </div>
            <div class="column-75 main-content">
                <span class="small-orange">02 <span class="separator"></span> <?php the_field('section_2_section_title'); ?></span>
                <?php the_field('section_2_section_copy'); ?>
            </div>
        </div>
    </div>

    <div class="spacer-break"></div>

    <div class="container blue" id="section_3">
        <div class="columns">
            <div class="column-25 left-content">
                <?php 
                $image3 = get_field('section_3_left_image');
                if( !empty( $image3 ) ): ?>
                    <img src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>" id="section_3_img" />
                <?php endif; ?>
            </div>
            <div class="column-75 main-content">
                <span class="small-orange">03 <span class="separator"></span> <?php the_field('section_3_section_title'); ?></span>
                <?php the_field('section_3_section_copy'); ?>
                <div class="receipt-block">
                    <div class="receipt-title">
                        <div class="number"><?php the_field('receipt_number'); ?></div>
                        <div class="title"><?php the_field('receipt_title'); ?></div>
                    </div>
                    <div class="receipt-line-items">
                        <?php if( have_rows('receipt_line_items') ): ?>
                        <?php while( have_rows('receipt_line_items') ): the_row(); ?>
                            <div class="left"><p><?php the_sub_field('line_item_text'); ?></p></div>
                            <div class="right"><p><?php the_sub_field('line_item_amount'); ?></p></div>
                            <div class="spacer-break"></div>
                        <?php endwhile; ?>
    					<?php endif; ?>
                        <div class="receipt-separator"></div>
                        <div class="left"><p><?php the_field('receipt_total_text'); ?></p></div>
                        <div class="right total"><p><?php the_field('receipt_total_amount'); ?></p></div>
                    </div>
                    <div class="receipt-copy">
                        <p><?php the_field('receipt_bottom_copy'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="spacer-break"></div>

    <div class="container white" id="section_4">
        <div class="columns">
            <div class="column-25 left-content">
                <?php 
                $image4 = get_field('section_4_left_image');
                if( !empty( $image4 ) ): ?>
                    <img src="<?php echo esc_url($image4['url']); ?>" alt="<?php echo esc_attr($image4['alt']); ?>" id="section_4_img" />
                <?php endif; ?>
            </div>
            <div class="column-75 main-content">
                <span class="small-orange">04 <span class="separator"></span> <?php the_field('section_4_section_title'); ?></span>
                <?php the_field('section_4_section_copy'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'categories');?>

<?php get_template_part('block', 'mobile-contact');?>

<section class="footer-pre-contact orange">
    <div class="container">
        <div class="columns">
            <div class="column-50">

                <h3><?php the_field('footer_headline'); ?></h3>
                <p><?php the_field('footer_copy'); ?></p>
                <div class="spacer-30"></div>
                    <a class="orange-button large" title="Get a free consultation - call today!" href="tel:312-236-2900">FREE CASE EVALUATION <span class="mobile-break">–</span> (312) 236-2900 </a>
                <div class="spacer-30"></div>
                    
            </div>
            <div class="column-50">
                <div class="contact-form-container">
                    <?php echo do_shortcode("[formidable id=1]"); ?>
                </div>
            </div>
        </div>
    </div>
</section>
	
<?php get_footer(); ?>