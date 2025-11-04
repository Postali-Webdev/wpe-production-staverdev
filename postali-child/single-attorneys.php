<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header();?>

<section class="attorney-banner">
    <div class="container">
        <div class="columns">
            <div class="attorney-content">
                <h1><?php the_title(); ?></h1>
                <p class="small-orange"><?php the_field('title'); ?></p>
                <div class="spacer-15"></div>
                <p class="caps"><span class="small-orange">E</span> <a href="#"><?php the_field('email'); ?></a></p>
                <div class="spacer-break"></div>
                <p class="caps"><span class="small-orange">P</span> <a href="#"><?php the_field('phone'); ?></a></p>
                <div class="spacer-30"></div>
            </div>
            <div class="column-33">
                <div class="attorney-content-container">
                    <div class="attorney-image">
                        <img src="<?php the_field('headshot'); ?>" alt="<?php the_field('title'); ?> <?php the_title(); ?>">
                    </div>
                </div>
            </div>
            <div class="column-66">
                <div class="column-container">
                    <?php the_field('top_content'); ?>
                    <div class="spacer-60"></div>
                    <div class="testimonial-container">
                        <?php the_field('testimonial_quote'); ?>
                    </div>
                    <div class="spacer-90"></div>
                    <?php the_field('bottom_content'); ?>
                    <div class="spacer-90"></div>
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
                    <div class="tab-content-container">
                        <?php $i = 1; ?>
                        <?php if( have_rows('tab_content') ): ?>
                            <div class="tabs-container">
                                <?php while( have_rows('tab_content') ): the_row(); 
                                    $section_title = get_sub_field('section_title');
                                ?>
                                <span class="orange-button <?php if ($i == 1) { ?>active<?php } else { ?><?php } ?>" id="<?php echo$section_title; ?>-button"><?php echo$section_title; ?></span>
                                <?php $i++; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                            
                        
                        <?php if( have_rows('tab_content') ): ?>
                            <?php $n = 1; ?>
                        <?php while( have_rows('tab_content') ): the_row(); ?>
                            <div class="content-container <?php if ($n == 1) { ?>active<?php } else { ?><?php } ?>" id="<?php the_sub_field('section_title'); ?>-container">
                                <?php if( have_rows('section_items') ): ?>
                                <?php while( have_rows('section_items') ): the_row(); 
                                $item_name = get_sub_field('item_name');
                                ?>
                                    <div class="white-box">
                                        <p><?php echo$item_name; ?></p>
                                    </div>
                                <?php endwhile; ?>
                                <?php endif; ?>
                            </div>    
                            <?php $n++; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>    
                    </div>
                    <div class="spacer-60"></div>
                </div>
            </div>
        </div>
    </div>
</section>

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