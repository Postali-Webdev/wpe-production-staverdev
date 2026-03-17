<?php if( have_rows('attorney_details','options') ): $count = 0; $total = count(get_field('attorney_details','options'));?>
    <?php 
        $current_page_id = get_queried_object_id();
        $hide_attorney_name = '';
        // Example: Hide "John Doe" on page ID 12345
        if ($current_page_id == 19167) {
            $hide_attorney_name = 'Jared Staver';
        }
        if ($current_page_id == 19169) {
            $hide_attorney_name = 'Tyler Kobylski';
        }
        if ($current_page_id == 19171) {
            $hide_attorney_name = 'Patrick Gill';
        }
        if ($current_page_id == 23207) {
            $hide_attorney_name = 'Melanie Buckmaster';
        }
    ?>
    <?php while( have_rows('attorney_details','options') ): the_row(); 
            $headshot = get_sub_field('headshot');
            $attorney_name = get_sub_field('attorney_name');
            $title = get_sub_field('title');
            $email = get_sub_field('email');
            $phone = get_sub_field('phone');
            $page_link = get_sub_field('page_link');
            
            // Skip this row if it matches the hide condition
            if ($attorney_name === $hide_attorney_name) {
                continue;
            }
            
            $count++;
        ?>

        <div class="column-25">
            <div class="attorney-image">
                <img loading="lazy" <?php if( is_front_page() ) : ?> width="216" height="249" <?php else : ?> width="100%" height="auto" <?php endif; ?>src="<?php echo $headshot; ?>" alt="<?php echo $title; ?> <?php echo $attorney_name; ?>">
            </div>
            <div class="content-box">
                <p class="attorney-name"><?php echo $attorney_name; ?></p>
                <div class="spacer-break"></div>
                <p class="small caps"><?php echo $title; ?></p>
                <div class="spacer-30"></div>
                <a href="<?php echo $page_link; ?>" title="More about <?php echo $attorney_name; ?>" class="orange-button">Read Bio</a>
            </div>
        </div>
    <?php endwhile; ?>

    <?php if( is_front_page() || is_page_template('page-locations-home.php') ) : ?>
        </div> <!-- /bottom-row -->
    <?php endif; ?>
    

<?php endif; ?>

                        