<?php
/**
 * Template Name: Practice Area Child
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
<?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<section class="scroll-banner" id="practice-area-child" style="background:url('<?php echo $featImg[0]; ?>') no-repeat; background-size:contain; background-attachment:fixed;">
<?php } else { ?>
<section class="scroll-banner" id="practice-area-child">
<?php } ?>

    <div class="container">
        <div class="columns">
            <div class="column-33">
                <div class="left-content-container">
                    <div class="left-content">
                        <?php the_field('left_column'); ?>
                        <div class="banner-cta-container">
                            <a href="tel:312-236-2900" class="orange-button" title="call us at (312) 236-2900">(312) 236-2900</a>
                            <a href="/do-i-have-a-case/process/" class="outline-button" title="Do I Have a Case?">Do I Have a Case?</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column-66">
                <div class="column-container">
                    <?php if( have_rows('categories') ): ?>
                        <a class="more-info" href="#more-info" title="Click here for additional information on this topic">Looking for more info? </a>
                    <?php endif; ?>
                    <?php the_content(); ?>
                    <div class="spacer-90"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'categories');?>

<?php get_template_part('block', 'related-articles');?>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'footer-contact');?>

<?php get_footer(); ?>