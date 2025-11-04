<?php
/**
 * Law Category Interior Page
 * Template Name: Category Interior
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section class="banner">
	<div class="container">
        <div class="columns">
            <span>
                <p class="small-orange">Staver accident injury lawyers, p.c.</p>
                <div class="spacer-break"></div>
				<h1><?php the_title(); ?></h1>
            </span>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="columns">
            <div class="column-66 center">
                <?php the_content(); ?>
                <?php if ( is_page(19164) ) { ?>
                put awards repeater in here.
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'categories');?>

<?php get_template_part('block', 'related-articles');?>

<?php get_template_part('block', 'mobile-contact');?>
	
<?php get_footer(); ?>