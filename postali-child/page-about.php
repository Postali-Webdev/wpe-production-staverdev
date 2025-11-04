<?php
/**
 * Template Name: About Us
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<section class="scroll-banner" id="about-us">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <div class="left-content-container">
                    <div class="left-content">
                        <?php the_field('right_content'); ?>
                    </div>
                </div>
            </div>
            <div class="column-66">
                <div class="column-container">
                    <?php the_field('top_content'); ?>
                    <div class="spacer-60"></div>
                    <?php get_template_part('block', 'awards');?>
                    <div class="spacer-90"></div>
                    <?php the_field('middle_content'); ?>
                    <div class="spacer-60"></div>
                    <div class="testimonial-container">
                        <?php the_field('testimonial_quote'); ?>
                    </div>
                    <div class="spacer-30"></div>
                    <p><a href="/testimonials/" title="Visit our Reviews Page">Read more reviews </a> &nbsp; <span class="icon-arrow-right2"></span></p>
                    <div class="spacer-90"></div>
                    <div class="spacer-30"></div>
                    <?php the_field('meet_our_attorneys'); ?>
                    <div class="spacer-60"></div>
                    <div class="attorneys">
                        <?php get_template_part('block', 'attorneys');?>
                    </div>
                    <div class="spacer-30"></div>
                    <div class="spacer-90"></div>
                    <?php the_field('bottom_content'); ?>
                    <div class="spacer-60"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'footer-contact');?>

<?php get_footer(); ?>