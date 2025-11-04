<?php
/**
 * Law Category Interior Page
 * Template Name: FAQs
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
            <div class="column-33 navigation">
                <?php if( have_rows('faqs') ): ?>
                <div class="sidebar-nav">
                    <p>Learn More About:</p>
                    <ul>
                    <?php while( have_rows('faqs') ): the_row(); ?>
                        <li><a href="#<?php the_sub_field('section_id'); ?>"><?php the_sub_field('nav_title'); ?></a></li>
                    <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <div class="column-66">
            <?php the_field('page_intro'); ?>
            <?php if( have_rows('faqs') ): ?>
            <?php while( have_rows('faqs') ): the_row(); ?>
                <div class="spacer-60" id="<?php the_sub_field('section_id'); ?>"></div>
                <h2><?php the_sub_field('faq_category_heading'); ?></h2>
                <?php if( have_rows('category_questions') ): ?>
                <?php while( have_rows('category_questions') ): the_row(); ?>
                    <h3><?php the_sub_field('question'); ?></h3>
                    <?php the_sub_field('answer'); ?> 
                <?php endwhile; ?>
                <?php endif; ?>
                <div class="spacer-30"></div>
                <hr>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php the_field('page_intro_copy'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'categories');?>

<?php get_template_part('block', 'related-articles');?>

<?php get_template_part('block', 'mobile-contact');?>
	
<script>
jQuery('.sidebar-nav > p').click(function() {
    jQuery(this).next('ul').slideToggle(400);
    jQuery(this).next('ul').addClass('open');
});

// delegated handler — binds once and runs even if UL gains .open later
jQuery('.sidebar-nav').on('click', 'ul > li > a', function(e) {
    var $ul = jQuery(this).closest('ul');
    if ( $ul.hasClass('open') ) {
        // prevent instant jump if you want the collapse animation first
        e.preventDefault();
        $ul.slideToggle(400, function() {
            $ul.removeClass('open');
        });
    }
});
</script>

<?php get_footer(); ?>