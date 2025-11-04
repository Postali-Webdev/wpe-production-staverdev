<?php
/**
 * Category template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<?php 
global $wp_query;

remove_all_filters('posts_orderby');

$id = $wp_query->get_queried_object_id();

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

if( isset($_GET['sortby']) ){
	$sortby = $_GET['sortby'];
} else {
	$sortby = 'amount-low';
}

if ( $sortby == "date-high" || $sortby == "amount-high" ){
	$order_b = 'ASC';	
} elseif ( $sortby == "date-low" || $sortby == "amount-low" ) {
	$order_b = 'DESC';
}

if ( $sortby == "date-high" || $sortby == "date-low" ) {
	
	$args = array(
        'post_type' => 'results',          // name of post type.
	    'orderby' => "date",
		'order' => $order_b,
	    'paged' => $paged
		);
	$wp_query = new WP_Query($args); 

} elseif ( $sortby == "amount-high" || $sortby == "amount-low" ) {

	$args = array(
        'post_type' => 'results',          // name of post type.
		'orderby' => "meta_value_num",
		'meta_key' => "settlement_amount",
		'order' => $order_b,
		'paged' => $paged,
		'meta_query' => array(
            array('key' => "settlement_amount"))
		);
	$wp_query = new WP_Query($args); 

}

?>

<section class="scroll-banner" id="results">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <div class="left-content-container">
                    <div class="left-content">
                        <h1>Our Results</h1>
                        <div class="spacer-30"></div>
                        <p class="large">Fighting for your maximum compensation. <strong>Be someone who gets it.</strong></p> 
                    </div>
                </div>
            </div>
            <div class="column-66">
                <div class="column-container">
                    <div id="sort-by-settlements">
                        <div class="main-bar">Sort By <span class="icon-drw-chevron-down"></span></div>
                        <ul class="drop-down">
                            <li><a href="?sortby=date-low">Date (Newest to Oldest)</a></li>
                            <li><a href="?sortby=date-high">Date (Oldest to Newest)</a></li>
                            <li><a href="?sortby=amount-high">Amount (Low to High)</a></li>
                            <li><a href="?sortby=amount-low">Amount (High to Low)</a></li>
                        </ul>
                    </div>
                    <span class="spacer-60"></span>
                        <p class="large">Staver’s team of experienced negotiators and litigators dial into each individual case, uncovering evidence and creating compelling legal arguments on your behalf. We know the drill well, and our results speak volumes.</p>
                    <div class="spacer-60"></div>
                    <?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
						<article>
                            <span>
                                <?php $num = get_field('settlement_amount'); ?>
                                <h3>$<?php echo number_format($num); ?></h3>
                                </span>
							<span class="small-orange"><?php the_title(); ?></span>
							<?php the_content(); ?>		
                        </article>
                        <div class="spacer-15"></div>
                        <hr>
                        <div class="spacer-60"></div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if ($wp_query->max_num_pages > 1) : // custom pagination  ?>
                        <section class="pagination">
                            <div class="container">            

                                <?php
                                    $orig_query = $wp_query2; // fix for pagination to work
                                    $wp_query2 = $query;
                                ?>
                                    <div class="container posts">
                                    <?php the_posts_pagination( array(
                                        'mid_size' => 2,
                                        'prev_text' => __( '<span class="icon-drw-chevron-left"></span>', 'textdomain' ),
                                        'next_text' => __( '<span class="icon-drw-chevron-right"></span>', 'textdomain' ),
                                    ) ); ?>
                                    </div>
                                <?php
                                    $wp_query2 = $orig_query; // fix for pagination to work
                                ?>
                                
                            </div>
                        </section>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'footer-contact');?>

<?php get_footer(); ?>