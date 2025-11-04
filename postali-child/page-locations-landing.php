<?php
/**
 * Template Name: Locations Landing
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<section class="scroll-banner" id="locations">
    <div class="container">
        <?php the_content(); ?>
    </div>
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'footer-contact');?>

<?php get_footer(); ?>