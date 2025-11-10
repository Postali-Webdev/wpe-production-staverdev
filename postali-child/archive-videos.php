<?php get_header(); 

$banner = get_field('banner', 'options');
$title = $banner['title'];
$copy = $banner['copy'];
$image = $banner['image'];
$cta_text = $banner['cta_text'];
$cta_button_one = $banner['cta_button_one'];
$cta_button_two = $banner['cta_button_two'];
?>

<section class="video-archive-header">
    <div class="columns">
        <div class="column-66 block">
            <div class="container">
                <h1><?php echo esc_html( $title ); ?></h1>
                <div class="spacer-30"></div>
                <p><?php echo $copy; ?></p>
                <div class="spacer-30"></div>
                <div class="banner-cta-container">
                    <p class="large-cta"><strong><?php echo esc_html( $cta_text ); ?></strong></p>
                    <div class="inner-wrap">
                        <a href="<?php echo esc_url( $cta_button_one['url'] ); ?>" class="orange-button" title="call us at <?php echo esc_html( $cta_button_one['title'] ); ?>"><?php echo esc_html( $cta_button_one['title'] ); ?></a>
                        <a href="<?php echo esc_url( $cta_button_two['url'] ); ?>" class="outline-button" title="Do I Have a Case?"><?php echo esc_html( $cta_button_two['title'] ); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column-33">
            <?php echo wp_get_attachment_image($image['ID'], 'full', '', array('class' => 'video-archive-image')); ?>
        </div>
    </div>
</section>

<div class="container">
    <div class="columns">
        <div class="column-full block">
            <?php
            // Get all video_topic terms that have posts
            $terms = get_terms([
                'taxonomy'   => 'video_topic',
                'hide_empty' => true,
                'orderby'    => 'name',
                'order'      => 'ASC',
            ]);

            if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) :
                foreach ( $terms as $term ) :
                    // Query videos for this term
                    $videos_q = new WP_Query([
                        'post_type'      => 'videos',
                        'posts_per_page' => -1,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'tax_query'      => [
                            [
                                'taxonomy' => 'video_topic',
                                'field'    => 'term_id',
                                'terms'    => $term->term_id,
                            ],
                        ],
                    ]);

                    if ( $videos_q->have_posts() ) : ?>
                        <section class="video-topic-section">
                            <h2 class="video-topic-title"><?php echo esc_html( $term->name ); ?></h2>
                            <div class="videos-grid">
                                <?php while ( $videos_q->have_posts() ) : $videos_q->the_post();
                                    $title      = get_field('title');
                                    if ( ! $title ) { $title = get_the_title(); }
                                    $thumbnail  = get_field('thumbnail');
                                    $page_url   = get_permalink();
                                ?>
                                    <div class="video">
                                        <a href="<?php echo esc_url( $page_url ); ?>" class="video-link" title="<?php echo esc_attr( 'watch video about ' . $title ); ?>"></a>
                                        <?php
                                        if ( ! empty( $thumbnail['ID'] ) ) {
                                            echo wp_get_attachment_image( $thumbnail['ID'], 'full', '', ['class' => 'thumbnail-image'] );
                                        }
                                        ?>
                                        <div class="copy-wrapper">
                                            <p class="title"><?php echo esc_html( $title ); ?></p>
                                            <div class="play-btn"></div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </section>
                    <?php
                    endif;
                    wp_reset_postdata();
                endforeach;

            else :
                // Fallback: no terms found, render default grid from main query
                if ( have_posts() ) : ?>
                    <div class="videos-grid">
                        <?php while ( have_posts() ) : the_post();
                            $title      = get_field('title');
                            if ( ! $title ) { $title = get_the_title(); }
                            $thumbnail  = get_field('thumbnail');
                            $page_url   = get_permalink();
                        ?>
                            <div class="video">
                                <a href="<?php echo esc_url( $page_url ); ?>" class="video-link" title="<?php echo esc_attr( 'watch video about ' . $title ); ?>"></a>
                                <?php
                                if ( ! empty( $thumbnail['ID'] ) ) {
                                    echo wp_get_attachment_image( $thumbnail['ID'], 'full', '', ['class' => 'thumbnail-image'] );
                                }
                                ?>
                                <div class="copy-wrapper">
                                    <p class="title"><?php echo esc_html( $title ); ?></p>
                                    <div class="play-btn"></div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif;
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>