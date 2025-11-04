<?php
/**
 * Template Name: Practice Area Landing
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

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

<section class="practice-areas">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <?php if( have_rows('practice_areas') ): ?>
                <?php while( have_rows('practice_areas') ): the_row();
                        $practice_name = get_sub_field('practice_area');
                        $practice_link = get_sub_field('practice_area_link');
                        $practice_copy = get_sub_field('practice_area_description');
                        $add_children = get_sub_field('add_child_pages');

                        // Resolve $practice_link to a post ID (handles ID, array/object with ID, or URL)
                        $practice_link_id = 0;
                        if ( is_numeric( $practice_link ) ) {
                            $practice_link_id = (int) $practice_link;
                        } elseif ( is_array( $practice_link ) && ! empty( $practice_link['ID'] ) ) {
                            $practice_link_id = (int) $practice_link['ID'];
                        } elseif ( is_object( $practice_link ) && ! empty( $practice_link->ID ) ) {
                            $practice_link_id = (int) $practice_link->ID;
                        } elseif ( is_string( $practice_link ) && filter_var( $practice_link, FILTER_VALIDATE_URL ) ) {
                            $practice_link_id = url_to_postid( $practice_link );
                        }
                        // optional: debug HTML comment
                        // echo '<!-- practice_link_id: ' . esc_attr( $practice_link_id ) . ' -->';
                    ?>
                    <h2><?php echo$practice_name; ?></h2>

                    <?php if( $practice_copy ): ?>
                        <p><?php echo $practice_copy; ?></p>
                    <?php endif; ?>

                    <?php if( $add_children == 'automatic' ) { ?>
                    
                    <?php 
                        $args = array(
                            'post_type'      => 'page', // Query for pages
                            'post_parent'    => $practice_link_id, // Get children of this specific ID
                            'posts_per_page' => -1, // Get all child pages, not just the default number
                            'post_status'  => 'publish',
                            'order'        => 'ASC'
                        );

                        $child_pages = new WP_Query($args);

                        if ($child_pages->have_posts()) {

                            $total_posts = $child_pages->found_posts;

                                echo '<ul class="child-pages">';
                                $i = 1;

                                echo '<li><a href="' . $practice_link . '">' . $practice_name . '</a> <span class="icon-arrow-right2"></span></li>';

                                while ($child_pages->have_posts()) : $child_pages->the_post();
                                
                                    if ($i == 7) {
                                        echo '<li class="more-pages-btn">More Pages <span>+</span></li><div class="accordion-children"><ul class="child-pages">';
                                    }
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a> <span class="icon-arrow-right2"></span></li>';

                                    if ($i == $total_posts) {
                                        echo '</ul>';
                                    }
                                $i++;
                                endwhile;
                                
                                echo '</ul>';

                            wp_reset_postdata(); // Restore original Post Data
                        
                            } else {
                                echo '<ul class="child-pages"><li><a href="' . $practice_link . '">' . $practice_name . '</a> <span class="icon-arrow-right2"></span></li></ul>';
                            }
                                                
                    ?>

                    <?php } elseif ( $add_children == 'manually' ) {  ?>
                        <?php if( have_rows('child_pages_manual') ): ?>
                        <ul class="child-pages">
                        <?php while( have_rows('child_pages_manual') ): the_row(); ?>
                            <li><a href="<?php the_sub_field('child_page_link'); ?>"><?php the_sub_field('child_page_title'); ?></a> <span class="icon-arrow-right2"></span></li>
                        <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    <?php } ?>

                    <?php if( have_rows('related_resources') ): ?>
                    <div class="spacer-60"></div>
                    <p class="small-orange">Related Resources</p>
                    <div class="spacer-30"></div>
                    <div class="related-resources">
                    <?php while( have_rows('related_resources') ): the_row(); ?>
                    
                        <?php $post_object = get_sub_field('resource'); ?>
                        <?php if( $post_object ): ?>
                            <?php // override $post
                            $post = $post_object;
                            setup_postdata( $post );
                            ?>
                            <div class="post-container">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                                <?php get_template_part('block', 'blog-thumb');?>   

                                <span class="related-content">
                                    <p><strong><?php the_date(); ?></strong><br>
                                    <?php the_title(); ?></p>
                                </span>
                            </a>
                            </div>
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php endif; ?>
                    
                    <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                    <span class="spacer-30"></span>
                    <hr>
                    <span class="spacer-30"></span>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'footer-contact');?>

<script>
jQuery('.more-pages-btn').click(function() {
    jQuery(this).next('.accordion-children').slideToggle(400);
    jQuery(this).find('span').toggleClass('open');
});
</script>

<?php get_footer(); ?>