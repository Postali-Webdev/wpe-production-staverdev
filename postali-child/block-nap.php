<section class="nap-block">
    <div class="container">
        <span class="small-orange"><?php the_field('nap_small_title'); ?></span>
        <div class="spacer-break"></div>
        <h2><?php the_field('nap_headline'); ?></h2>
        <div class="spacer-15"></div>
        <div class="columns">
            <div class="column-50 content">

                <?php 
                $locations = get_field('locations', 'options');
                foreach ( $locations as $location ) {
                    $location_page = $location['page_link'];
                    $location_id = url_to_postid($location_page);
                    if( is_tree( $location_id ) ) {
                        $name = $location['name'];
                        $address = $location['address'];
                        $phone = $location['phone'];
                        $directions = $location['directions_link'];
                        $maps_link = $location['maps_link'];
                        $description = $location['description'];
                        $map = $location['map_embed'];
                        break;
                    } 	
                }
                ?>

                <h3>Staver Accident Injury Lawyers, P.C. - <?php echo $name; ?> Office</h3>
                <p class="address"><span class="icon-footer-pin"></span><a href="<?php echo $maps_link; ?>" target="blank"><?php echo $address; ?></a></p>
                <p class="phone"><span class="icon-footer-phone"></span><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></p>
                <a href="<?php echo $directions; ?>" class="orange-button" target="blank">Get Directions</a>
                <div class="spacer-30"></div>
                <?php if (!empty($description)) { ?>
                <p class="description"><?php echo $description; ?></p>
                <?php } ?>
            </div>
            <div class="column-50 map">
                <iframe src="<?php echo $map; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>