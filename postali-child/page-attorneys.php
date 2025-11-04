<?php
/**
 * Attorney Bio Page
 * Template Name: Atorney Bio   
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
                        <img class="ignore-lazy" src="<?php the_field('headshot'); ?>" alt="<?php the_field('title'); ?> <?php the_title(); ?>">
                       

                        
                        <?php if( get_field('attorney_award_img') ) : $bio_award_img = get_field('attorney_award_img'); ?>
                            <div class="award-wrapper">
                                <img src="<?php echo $bio_award_img['url']; ?>" alt="<?php echo $bio_award_img['alt']; ?>">
                                <?php if( get_field('attorney_award_text')) : ?>
                                    <p><?php echo get_field('attorney_award_text'); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="column-66">
                <div class="column-container">
                    <?php the_field('top_content'); ?>
                    <div class="spacer-60"></div>

                    <?php if(get_field('testimonial_quote')) { ?>
                    <div class="testimonial-container">
                        <?php the_field('testimonial_quote'); ?>
                    </div>
                    <div class="spacer-90"></div>
                    <?php } ?>

                    <?php the_field('bottom_content'); ?>
                    <div class="spacer-90"></div>

                    <?php if(get_field('attorney_quote')) { ?>
                    <div class="attorney-quote-container">
                        <div class="headshot-thumbnail" style="background-image:url(<?php the_field('headshot'); ?>)" id="<?php
                            $title = get_the_title();
                            $title_array = explode(' ', $title);
                            $first_word = $title_array[0];

                            echo $first_word;
                            ?>">
                        </div>
                        <div class="attorney-quote">
                        <?php the_field('attorney_quote'); ?>
                        </div>
                    </div>
                    <div class="spacer-90"></div>
                    <?php } ?>

                    <div class="extras">
                    <?php if( have_rows('tab_content') ): ?>
                    <?php while( have_rows('tab_content') ): the_row(); ?>
                        <p class="small-orange underlined"><?php the_sub_field('section_title'); ?></p>                                
                            <?php if( have_rows('section_items') ): ?>  
                            <ul>
                            <?php while( have_rows('section_items') ): the_row(); 
                            $item_name = get_sub_field('item_name');
                            ?>
                                <li><?php echo$item_name; ?></li>
                            <?php endwhile; ?>
                            </ul>
                            <?php endif; ?>
                        <div class="spacer-30"></div>
                    <?php endwhile; ?>
                    <?php endif; ?>    
                    </div>
                    <div class="spacer-60"></div>
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