<?php
/**
 * Category template
 * @package Postali Child
 * @author Postali LLC
**/


get_header(); ?>

<section class="scroll-banner" id="legal-blog">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <div class="left-content-container">
                    <div class="left-content">
                        <h1>Legal Blog</h1>
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
                            <li><a href="/blog/">View All Categories</a></li>
                            <li><a href="/blog/category/truck-accidents/">Truck Accidents</a></li>
                            <li><a href="/blog/category/motorcycle-accidents/">Motorcycle Accidents</a></li>
                            <li><a href="/blog/category/bike-accidents/">Bicycle Accidents</a></li>
                            <li><a href="/blog/category/pedestrian-accidents/">Pedestrian Accidents</a></li>
                            <li><a href="/blog/category/auto-accidents/">Motor Vehicle </a></li>
                            <li><a href="/blog/category/premises-liability/">Premises Liability</a></li>
                            <li><a href="/blog/category/product-liability/">Product Liability</a></li>
                            <li><a href="/blog/category/medical-malpractice/">Medical Malpractice</a></li>
                            <li><a href="/blog/category/wrongful-death/">Wrongful Death</a></li>
                        </ul>
                    </div>
                    <div class="spacer-60"></div>
                    <p class="small-orange"><strong>Filter By: <span class="blue"><?php $term = get_queried_object(); echo single_term_title(); ?></span></strong></p>
                    <div class="spacer-30"></div>
					<?php while( have_posts() ) : the_post(); ?>
							<div class="post-container">
							<a class="white-box" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                                <?php get_template_part('block', 'blog-thumb');?>  
    
                                <span class="related-content">
									<span class="small-orange"><span data-nosnippet><?php the_date(); ?></span></span>
									<h4><?php the_title(); ?></h4>
									<div class="spacer-15"></div>
								</span>
							</a>
							<div class="author-box">
                            	<img src="/wp-content/uploads/2020/03/161026_Postali_ChicagoLawyer_0276.png" alt="Jared Staver"> <p class="small">Written by <a href="#" title="" class="author-link"><?php the_author(); ?></a></p>
                        	</div>
                    	</div>
                        
					<?php endwhile; wp_reset_postdata(); ?>

					<div class="spacer-60"></div>

                        <section class="pagination">
                            <div class="container">            

                            <?php the_posts_pagination( array(
                                        'mid_size' => 5,
                                        'prev_text' => __( '<span class="icon-drw-chevron-left"></span>', 'textdomain' ),
                                        'next_text' => __( '<span class="icon-drw-chevron-right"></span>', 'textdomain' ),
                                    ) ); ?>
                                
                            </div>
                        </section>

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'footer-contact');?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

<?php get_footer(); ?>
