<?php get_header(); ?>

<section class="video-archive-header">
    <div class="columns">
        <div class="column-66 block">
            <div class="container">
                <h1><?php the_title(); ?></h1>
                <div class="spacer-30"></div>
                <div class="spacer-30"></div>
                <div class="banner-cta-container">
                    <p class="large-cta"><strong>Call Staver Today</strong></p>
                    <a href="tel:312-236-2900" class="orange-button" title="call us at (312) 236-2900">(312) 236-2900</a>
                    <a href="/do-i-have-a-case/process/" class="outline-button" title="Do I Have a Case?">Do I Have a Case?</a>
                </div>
            </div>
        </div>
        <div class="column-33">
            <?php echo wp_get_attachment_image('19272', 'full', '', array('class' => 'video-archive-image')); ?>
        </div>
    </div>
</section>

<div class="container">
    <div class="columns">
        <div class="column-full block">
            <?php if( have_posts() ) : ?>
                <div class="spacer-30"></div>
                <div class="videos-grid">
                    <?php while( have_posts() ) : the_post(); 
                        $title = get_field('title');
                        $video_url = get_field('iframe_embed_url');
                        $excerpt = get_field('excerpt');
                        $transcript = get_field('transcript');
                        $thumbnail = get_field('thumbnail');
                        $thumbnail_url = $thumbnail['url'];
                        $duration = get_field('duration');
                        $duration_minutes = $duration['minutes'];
                        $duration_seconds = $duration['seconds'];
                        $upload_date = get_field('upload_date');
                        $page_url = get_permalink();
                    ?>

                        <div class="video">
                            <div class="iframe-wrapper">
                                <iframe width="100%" height="100%" src="<?php echo esc_url($video_url); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                            <div class="copy-wrapper">
                                <p class="title"><?php echo $title; ?></p>
                                <p><?php echo $excerpt; ?></p>
                                <div class="transcript">
                                    <div class="read-more orange-button">View Transcript</div>
                                    <div class="hidden-transcript">
                                        <?php echo $transcript; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                            echo "<script type=\"application/ld+json\"> 
                                {
                                    '@context': 'https://schema.org,
                                    '@type': 'VideoObject',
                                    'name': ${title},
                                    'description': ${excerpt},
                                    'thumbnailUrl': ${thumbnail_url},
                                    'uploadDate': '${upload_date}',
                                    'duration': 'PT${duration_minutes}M${duration_seconds}S',
                                }
                            </script>";
                        ?>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>