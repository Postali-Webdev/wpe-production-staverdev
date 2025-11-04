<?php
/**
 * Template Name: Injury Types Landing
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<section class="scroll-banner" id="practice-areas">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <div class="left-content-container">
                    <div class="left-content">
                        <?php the_field('left_column'); ?>
                        <?php if( have_rows('frequently_visited_pages') ): ?>
                        <ul>
                        <?php while( have_rows('frequently_visited_pages') ): the_row(); ?>
                            <li><a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('injury_type_title'); ?>"><?php the_sub_field('injury_type_title'); ?></a></li>
                        <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="column-66">
                <div class="column-container">
                    <?php if( have_rows('injury_types') ): ?>
                    <?php while( have_rows('injury_types') ): the_row(); 
                            $injury_type_title = get_sub_field('injury_type_title');
                            $injury_type_link = get_sub_field('injury_type_link');
                            $injury_type_background_image = get_sub_field('injury_type_background_image');
                        ?>
                        <a class="white-box" href="<?php echo $injury_type_link; ?>" title="<?php echo $injury_type_title; ?>" style="background:url(<?php echo $injury_type_background_image; ?>)">
                            <p><strong><?php echo $injury_type_title; ?></strong></p>
                            <span class="hover"></span>
                        </a>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'consultation');?>

<?php if( have_rows('additional_practice_areas_') ): ?>
<section id="more-info" class="blue">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <h2>Not Seeing What You’re Looking for?</h2>
                <p class="large">Here are some additional resources that may be of help.</p>
            </div>
            <div class="column-66">
                <ul>
                <?php while( have_rows('additional_practice_areas_') ): the_row(); 
                        $link_title = get_sub_field('practice_area_title');
                        $page_link = get_sub_field('practice_area_link');
                    ?>
                    <li><a title="<?php echo $link_title; ?>" href="<?php echo $page_link; ?>"><?php echo $link_title; ?></a></li>
                <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_template_part('block', 'footer-contact');?>

<?php get_footer(); ?>