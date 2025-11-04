<?php // List locations based on page tree

global $post;

$current_page_id = $post->ID;
$front_page_id = get_option('page_on_front');
$current_page_parent_id = $post->post_parent;

if ( is_tree(27483) ) {
    $link_title = 'Llame a Staver Accident Injury Lawyers hoy';
    $dir_title =   'Indicaciones de viaje';       
} else {
    $link_title = 'Call Staver Accident Injury Lawyers Today';
    $dir_title = 'Driving Directions';
}

if( have_rows('locations', 'options') ) {
    $secondary_locations = [];
    $secondary_locations_esp = [];

    while( have_rows('locations', 'options') ) {
        the_row();
        $page_link = get_sub_field('page_link');
        $page_id = url_to_postid($page_link); 

        $page_link_esp = get_sub_field('page_link_spanish');
        $page_id_esp = url_to_postid($page_link_esp);

        $is_primary = get_sub_field('is_primary');
        if( !$is_primary) {
            $secondary_locations[] .= $page_id;
            $secondary_locations_esp[] .= $page_id_esp;
        }
    }
}


if( have_rows('locations', 'options') || have_rows('locations', 'options') && is_tree(27483) ) : ?>
    <div class="column-full" id="locations">
    <?php while( have_rows('locations', 'options') ) :
        the_row();
        $name = get_sub_field('name');
        $address = get_sub_field('address');
        $phone = get_sub_field('phone');
        $directions_link = get_sub_field('directions_link');
        $page_link = get_sub_field('page_link');
        $page_id = url_to_postid($page_link); 
        $page_link_esp = get_sub_field('page_link_spanish');
        $page_id_esp = url_to_postid($page_link_esp); 
        $map_embed = get_sub_field('map_embed');
        $is_primary = get_sub_field('is_primary');
        
        if( is_tree( 27483 ) ) : ?>
        <div class="location-grid">
            <span class="big"><a href="<?php echo $page_link_esp; ?>">Oficina de <?php echo $name; ?></a></span>
            <span class="orange">P</span><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
            <span class="orange">A</span><p><?php echo $address; ?></p>
            <a href="<?php echo $directions_link; ?>" title="<?php echo $link_title; ?>" target="_blank"><?php echo $dir_title ?></a>
        </div>
        
        <?php else : ?>
        <div class="location-grid">
            <span class="big"><a href="<?php echo $page_link; ?>"><?php echo $name; ?> Office</a></span>
            <span class="orange">P</span><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
            <span class="orange">A</span><p><?php echo $address; ?></p>
            <a href="<?php echo $directions_link; ?>" title="<?php echo $link_title; ?>" target="_blank"><?php echo $dir_title ?></a>
        </div>

        <?php endif; ?>

    <?php endwhile ?>
    </div>
    <div class="spacer-90"></div>
<?php endif; ?>