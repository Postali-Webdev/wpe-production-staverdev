<section id="related-articles">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <?php if (is_single(13329)) { ?>
                <h2>Recent Blog Articles</h2>
                <?php } else { ?>
                <h2>Related Blog Articles &nbsp;</h2>
                <?php } ?>
                <p class="large">When you’re fighting for maximum compensation, we know what it takes to get it.</p>
            </div>
            <div class="column-66">
                <?php 
                $args = array( 
                    'posts_per_page' => 2, 
                    'category' => get_field('post_category'),
                    'category__not_in' => 6,
                );
                
                $myposts = get_posts( $args );
                foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                    <div class="post-container">
                        <a class="white-box" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                            <?php get_template_part('block', 'blog-thumb');?>   

                            <span class="related-content">
                                <span class="small-orange"><span data-nosnippet=""><?php the_date(); ?></span></span>
                                <h4><?php the_title(); ?></h4>
                                <div class="spacer-15"></div>
                            </span>
                        </a>
                        <div class="author-box">
                            <img src="/wp-content/uploads/2021/10/blog-cutout-jared.png" alt="Jared Staver"> <p class="small">Written by <a href="/about-us/jared-staver/" title="" class="author-link"><?php the_author(); ?></a></p>
                        </div>
                    </div>
                <?php endforeach; 
                wp_reset_postdata();?>
                <div class="column-full">
                    <p><a href="/blog/" title="Visit our Legal Blog">Visit our Legal Blog page</a> <span class="icon-arrow-right2"></span></p>
                </div>
            </div>
        </div>
    </div>
</section>