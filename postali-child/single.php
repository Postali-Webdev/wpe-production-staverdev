<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */
get_header();
$has_additional_author =  get_field('add_additional_author');
?>

<section class="blog-banner">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <span class="small-orange">legal blog</span>
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="column-50">
                <div class="top-section">
                    <div class="blog-author-box">
                        <div class="author-info">
                            <h3>Written by <?php echo $has_additional_author ? get_the_author() . ' & ' . get_field('additional_author_name') : get_the_author() ;?></h3>
                            <p class="small"><a href="/about-us/jared-staver/" title="" class="author-link">Read Jared's Bio</a></p>
                            <p class="small">Jared Staver is a Personal Injury Lawyer based in Chicago, Illinois and has been practicing law for over 25 years.</p>
                        </div>
                        <div class="author-headshot">
                            <img src="/wp-content/uploads/2021/10/blog-cutout-jared.png" alt="Jared Staver" style="border: solid 2px #FF5601; border-radius: 100px;"> 
                            <?php if( $has_additional_author ) : $author_img = get_field('additional_author_picture');?>
                                <?php if( $author_img ) : ?>
                                    <div class="spacer-15"></div>
                                    <img src="<?php echo $author_img['url']; ?>" alt="<?php echo $author_img['alt']; ?>" style="border: solid 2px #FF5601; border-radius: 100px;">
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="spacer-15"></div>
                    <p class="small-orange"><strong>CATEGORY: <?php the_category( ', ' ); ?></strong></p>
                    <div class="spacer-30"></div>
                </div>
                <hr>
                <div class="bottom-section">
                    <div class="spacer-30"></div>
                    <div class="article-single-featured-image">

                    <?php get_template_part('block', 'blog-thumb');?>  

                    <?php if ( get_field('image_caption') ) { ?>
                        <span class="spacer-30"></span>
                        <p class="small"><?php the_field('image_caption'); ?></p>
                    <?php } ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="body-content">
    <div class="container">
        <div class="columns">
            <div class="column-66 center">
                <?php the_content(); ?>                        			
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'consultation');?>

<section id="related-articles">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <?php if(is_single(13329)) { ?>
                <h2>Recent Blog Articles</h2>
                <?php } else { ?>
                <h2>Related Blog Articles</h2>
                <?php } ?>
                <p class="large">When you’re fighting for maximum compensation, we know what it takes to get it.</p>
            </div>
            <div class="column-66">
            <?php 
                $termID = [];
                $terms = get_the_terms($post->ID, 'category');
                foreach ($terms as $term) {
                    $termID[0] = $term->term_id;
                }
                ?>
                <?php 
                $query = new WP_Query( array(
                        'posts_per_page'         => 2,
                        'post_type' => 'post',          
                        'post__not_in' => array( $post->ID ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',  
                                'terms' => $termID,        
                            )
                        )
                    ) ); 

                $total_number = $query->found_posts;        
                if ($total_number < 2) {

                wp_reset_postdata(); // not enough, grab everything

                $query = new WP_Query( array(
                        'posts_per_page'         => 2,
                        'post_type' => 'post',
                        'post__not_in' => array( $post->ID ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',  
                                'terms' => $termID,        
                            )
                        )
                    ) ); 

                } ?>

                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="post-container">
                        <a class="white-box" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                            <?php get_template_part('block', 'blog-thumb');?>

                            <span class="related-content">
                                <span class="small-orange"><?php the_date(); ?></span>
                                <h4><?php the_title(); ?></h4>
                                <div class="spacer-15"></div>
                            </span>
                        </a>
                        <div class="author-box">
                            <img src="/wp-content/uploads/2021/10/jared-staver-author-block.png" alt="Jared Staver"> <p class="small">Written by <a href="/about-us/jared-staver/" title="" class="author-link"><?php the_author(); ?></a></p>
                        </div>
                    </div>
                <?php endwhile; 
                wp_reset_postdata();?>
                <div class="column-full">
                    <p><a href="/blog/" title="Visit our Legal Blog">Visit our Legal Blog page</a> <span class="icon-arrow-right2"></span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'footer-contact');?>

<?php get_footer(); ?>