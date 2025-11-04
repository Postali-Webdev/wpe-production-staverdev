<? /**
 * Template Name: Accident Details Page
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); 

$banner_img = get_field('hero_banner_image');
$clients_helped_bg = get_field('p1_clients_helped_image');
?>

<section class="banner" style="background-image:url('<?php echo $banner_img['url']; ?>');">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <div class="left-container">
                    <span class="small-orange"><?php the_field('hero_sub_title'); ?></span>
                    <h1><?php the_field('hero_title'); ?></h1>
                </div>
            </div>
            <div class="column-50"></div>
        </div>
    </div>
</section>

<div class="offset-wrapper">
    <section class="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-25">
                    <div class="clients-helped" style="background-image: url('<?php echo $clients_helped_bg['url']; ?>');">
                        <div class="helped-counter">
                            <span class="helped-number">3500+</span><br>
                            <span class="helped-text">Clients Helped</span>
                        </div>
                    </div>   
                </div>
                <div class="column-75">
                    <div class="white">
                        <span class="small-orange"><?php the_field('p1_section_sub_title'); ?></span>
                        <h2><?php the_field('p1_section_title'); ?></h2>
                        <p><?php the_field('p1_copy'); ?></p>
                        <?php if( get_field('p1_cta_button') ) : $cta_button = get_field('p1_cta_button'); ?>
                                <a class="orange-button large" href="<?php echo $cta_button['url']; ?>"><?php echo $cta_button['title']; ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="blue">
                        <span class="small-orange"><?php the_field('p2_sub_title'); ?></span>
                        <h3><?php the_field('p2_section_title'); ?></h3>
                        <?php if( have_rows('p2_highlighted_points') ) : ?>
                            <div class="grid-wrapper">
                            <?php while( have_rows('p2_highlighted_points') ) : the_row(); ?>
                                <div class="grid-item">
                                    <?php the_sub_field('copy'); ?>
                                </div>
                            <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="panel-3">
        <div class="container">
            <div class="columns">
                <?php if( get_field('p3_left_column') ) : $p3_left_col = get_field('p3_left_column'); ?>
                <div class="column-50">
                    <h2><?php echo $p3_left_col['title']; ?></h2>
                    <p><?php echo $p3_left_col['copy']; ?></p>
                </div>
                <?php endif; ?>
                
                <?php if( get_field('p3_right_column') ) : $p3_right_col = get_field('p3_right_column'); ?>
                <div class="column-50">
                    <h3><?php echo $p3_right_col['title_h3']; ?></h3>
                    <?php echo $p3_right_col['copy']; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

</div>


<?php get_footer(); ?>