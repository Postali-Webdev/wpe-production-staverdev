<?php
/**
 * Template Name: Lawsuit Process
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<?php
    $i = 1;
    $on = 'On the Page';
?>

<?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
<?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<section class="banner" id="practice-area-parent" style="background-image:url('<?php echo $featImg[0]; ?>');">
<?php } else { ?>
<section class="banner" id="practice-area-parent">
<?php } ?>

    <div class="container">
        <div class="columns">
            <div class="column-50">
                <div class="left-container">
                    <span class="small-orange">Staver Accident Injury Lawyers</span>
                    <h1><?php the_title(); ?></h1>
                    <div class="spacer-30"></div>
                    <p><?php the_field('baner_sub_headline'); ?></p>
                </div>
            </div>
            <div class="column-50"></div>
        </div>
    </div>
</section>

<section id="jump-section">
    <div class="container">
        <div class="columns">
            <div class="jump-navigation">
                <div class="title">
                    <span><?php echo $on; ?></span>
                </div>
                
                <?php if( have_rows('section') ): ?>
                <?php while( have_rows('section') ): the_row(); ?>
                    <?php if ($i == 1) {
                        $section = 'first';
                    } elseif ($i == 2) {
                        $section = 'second';
                    } elseif ($i == 3) {
                        $section = 'third';
                    } elseif ($i == 4) {
                        $section = 'fourth';
                    } ?>

                    <a class="jump-button" href="#<?php echo $section; ?>">
                        <span class="small-orange">0<?php echo $i; ?></span>
                        <span class="spacer-break"></span>
                        <span class="link-title"><?php the_sub_field('section_title'); ?></span>
                    </a>
                    <?php $i++; ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="column-66 center">
                <p><?php the_field('intro_text'); ?></p>
            </div>
        </div>
    </div>
</section>

<?php $n = 1; ?>

<?php if( have_rows('section') ): ?>
<?php while( have_rows('section') ): the_row(); ?>

<?php if ($n == 1) {
    $section = 'first';
} elseif ($n == 2) {
    $section = 'second';
} elseif ($n == 3) {
    $section = 'third';
} elseif ($n == 4) {
    $section = 'fourth';
} ?>

    <section class="section-header" id="<?php echo $section; ?>">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <span class="small-orange"><span class="section-number">0<?php echo $n; ?> </span><?php the_sub_field('section_title'); ?></span>
                    <h2><?php the_sub_field('section_headline'); ?></h2>
                    <p><?php the_sub_field('section_intro_copy'); ?></p>
                </div>
                <div class="column-50">
                <?php 
                $image = get_sub_field('section_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="columns">
                <div class="column-66 center">
                    <?php the_sub_field('section_main_content_block'); ?>
                </div>
            </div>
        </div>
    </section>
    <?php $n++; ?>
<?php endwhile; ?>
<?php endif; ?>

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