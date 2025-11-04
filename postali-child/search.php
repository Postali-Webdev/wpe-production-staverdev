<?php
/**
 * Search Results
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section class="search-results">
    <div class="container">
        <div class="columns">
            <div class="column-66 center">
                <div class="top-search">
                    <p class="large">Not seeing what you’re looking for?</p>
                    <span class="search-box-page">
                        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search" role="search">
                            <label for="<?php echo esc_attr( $search_input_id ); ?>" class="screen-reader-text">
                                <?php esc_html_e( 'Search for:', 'postali' ); ?>
                            </label>
                            <input type="text" name="s" placeholder="Search again" id="<?php echo esc_attr( $search_input_id ); ?>" value="" />
                            <button type="submit" value="<?php echo esc_attr__( 'Search', 'postali' ); ?>">
                                <span class="icon-search"></span>
                            </button>
                        </form>    
                    </span>
                </div>
                <div class="spacer-90"></div>
                <h1>Search Results</h1>
                <div class="spacer-60"></div>
                <?php if ( have_posts() ) : ?>
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

                    <?php global $wp_query;
                    $max_per_page = 10; //Max results per page
                    $total_results = $wp_query->found_posts;
                    $pages = ceil($total_results / $max_per_page);
                    ?>

                <div class="pagination-top"><p class="small-orange">Page <?php echo $paged; ?> out of <?php echo $pages; ?> // 10 results per page</p></div>
                <hr class="first">
                <div class="spacer-15"></div>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div class="search-result-container">
                        <p class="large"><strong><?php the_title(); ?></strong></p>
                        <?php the_excerpt(); ?>
                        <p><a href="<?php the_permalink(); ?>">Visit Page</a> <span class="icon-arrow-right2"></span></p>
                        <hr>
                        <div class="spacer-30"></div>
                    </div>
                    <?php endwhile; ?>
                    <span class="pagination">
                    <div class="container posts">
                        <?php the_posts_pagination( array(
                            'mid_size' => 9,
                            'prev_text' => __( '<span class="icon-drw-chevron-left"></span>', 'textdomain' ),
                            'next_text' => __( '<span class="icon-drw-chevron-right"></span>', 'textdomain' ),
                        ) ); ?>
                        </div>
                    </span>
                    <?php else : ?>
                        <p><?php printf( esc_html__( 'Our apologies but there\'s nothing that matches your search for "%s"', 'postali' ), get_search_query() ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'footer-contact');?>
	
<?php get_footer(); ?>