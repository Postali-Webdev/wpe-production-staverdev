<?php
/**
 * Form Success
 * Template Name: Interior - No Header
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section>
    <div class="container">
        <div class="columns">
            <div class="column-33 centered">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'categories');?>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'footer-contact');?>
	
<?php get_footer(); ?>