<?php
/**
 * Paralegal Bio Page
 * Template Name: Paralegal Bio   
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section class="attorney-banner">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <div class="attorney-content-container">
                    <div class="attorney-content">
                        <h1><?php the_title(); ?></h1>
                        <div class="spacer-break"></div>
                        <p class="small-orange"><?php the_field('title'); ?></p>
                        <div class="spacer-15"></div>
                        <p class="caps"><span class="small-orange">E</span> <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
                        <div class="spacer-break"></div>
                        <p class="caps"><span class="small-orange">P</span> <a href="tel:<?php the_field('phone'); ?>"><?php the_field('phone'); ?></a></p>
                        <div class="spacer-30"></div>
                    </div>
                    <div class="attorney-image">
                        <img src="<?php the_field('headshot'); ?>" alt="<?php the_field('title'); ?> <?php the_title(); ?>">
                    </div>
                </div>
            </div>
            <div class="column-66">
                <div class="column-container">
                    <?php the_field('top_content'); ?>
                    <div class="spacer-90"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'consultation');?>

<section class="attorney-block">
    <div class="container">
        <h2>Meet Our Team of Attorneys</h2>
        <div class="spacer-break"></div>
        <div class="columns">
            <?php get_template_part('block', 'attorneys');?>
        </div>
    <div>
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'apply');?>

<?php get_template_part('block', 'footer-contact');?>

<?php get_footer(); ?>