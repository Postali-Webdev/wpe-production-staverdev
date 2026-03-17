<?php if( have_rows('panel_3_attorneys','options') ): ?>
<?php while( have_rows('panel_3_attorneys','options') ): the_row(); ?>
    <?php $post_object = get_sub_field('attorney'); ?>
    <?php if( $post_object ): ?>
        <?php // override $post
        $post = $post_object;
        setup_postdata( $post );
        ?>
        
        <div class="column-25">
            <div class="attorney-image">
                <img src="<?php the_field('headshot') ?>" alt="<?php the_field('title'); ?> <?php the_title(); ?>">
            </div>
            <div class="content-box">
                <p class="attorney-name"><?php the_title(); ?></p>
                <div class="spacer-break"></div>
                <p class="small caps"><?php the_field('title'); ?></p>
                <div class="spacer-30"></div>
                <a href="<?php the_permalink(); ?>" title="More about <?php the_title(); ?>" class="orange-button" tabindex="0">Read Bio</a>
            </div>
        </div>

        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>