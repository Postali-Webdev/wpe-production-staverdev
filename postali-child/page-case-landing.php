<?php
/**
 * Template Name: Case - landing
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<section class="banner">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <div class="left-container">
                    <?php the_field('case_left_column'); ?>
                </div>
            </div>
            <div class="column-50">
                <span class="right-container striped">
                    <?php the_field('case_right_column'); ?>
                </span>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>