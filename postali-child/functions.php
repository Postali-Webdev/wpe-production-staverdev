<?php
/**
 * Theme functions.
 *
 * @package Postali Child
 * @author Postali LLC
 */
	require_once dirname( __FILE__ ) . '/includes/admin.php';
	require_once dirname( __FILE__ ) . '/includes/utility.php';
	require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials
	require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Case Results
	// require_once dirname( __FILE__ ) . '/includes/attorneys-cpt.php'; // Custom Post Type Attorneys
	//require_once dirname( __FILE__ ) . '/includes/social-share.php'; // Social Media Sharing


	add_action('wp_enqueue_scripts', 'postali_parent');
	function postali_parent() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/styles.css' ); // Enqueue parent theme styles
	
	}  

	add_action('wp_enqueue_scripts', 'postali_child');
	function postali_child() {

		wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css', [], 'all' ); // Enqueue child theme styles.css
		wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css
		
		wp_register_style( 'icomoon-fonts', 'https://cdn.icomoon.io/152819/Staver/style-cf.css?gju9ib', array() );
		wp_enqueue_style('icomoon-fonts');
		
		wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap', array() );
		wp_enqueue_style('google-fonts');

		// Compiled .js using Grunt.js
		wp_register_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), true); 
		wp_enqueue_script('custom-scripts');
		
		wp_register_script('priority-scripts', get_stylesheet_directory_uri() . '/assets/js/priority-scripts.min.js',array('jquery'), null, true); 
		wp_enqueue_script('priority-scripts');
		wp_register_script('slick-min', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-min');
		wp_register_script('slick-custom-min', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-custom-min');
		wp_register_script('homepage-scripts', get_stylesheet_directory_uri() . '/assets/js/home.min.js',array('jquery'), null, true); 
		// load homepage scripts 
		if ( is_page(13) || is_page(27483) ) {
			wp_enqueue_script('homepage-scripts');
            
            wp_register_style( 'google-fonts-roboto', 'https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap', array() );
            wp_enqueue_style('google-fonts-roboto');
		}
		// again for location homepages 
		if ( is_page_template ( 'page-locations-home.php' ) ) {
			wp_enqueue_script('homepage-scripts');

		}
		// wp_register_script('attorney-scripts', get_stylesheet_directory_uri() . '/assets/js/attorneys.min.js',array('jquery'), null, true); 
		// load attorney bio scripts 
		// if ( is_page_template( 'page-attorneys.php' ) ) {
		//	wp_enqueue_script('attorney-scripts');
		// }
		wp_register_script('smooth-scroll-scripts', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll-custom.min.js',array('jquery'), null, true); 
		// load smooth scroll scripts 
		if ( is_page_template( array ( 'page-practice-area-child.php','page-practice-area-parent.php', 'page-practice-area-parent-new.php', 'front-page.php', 'page-faqs.php' ) ) ) {
			wp_enqueue_script('smooth-scroll-scripts');
		}
		wp_register_script('practice-parent-scripts', get_stylesheet_directory_uri() . '/assets/js/practice-parent.min.js',array('jquery'), null, true); 
		// load homepage scripts 
		if ( is_page_template( array ( 'page-practice-area-parent.php') ) ) {
			wp_enqueue_script('practice-parent-scripts');
		}

		wp_register_script('practice-parent-new-scripts', get_stylesheet_directory_uri() . '/assets/js/practice-parent-new-scripts.min.js',array('jquery'), null, true); 
        if ( is_page_template( array ('page-practice-area-parent-new.php', ) ) ) {
			wp_enqueue_script('practice-parent-new-scripts');
		}

        if ( is_page_template( 'page-why-hire.php' ) || is_page_template( 'page-lawsuit-process.php' ) ) {
    
            // Smooth Scroll
            wp_register_script('smooth-scroll', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll-custom.min.js', array('jquery'));
            wp_enqueue_script('smooth-scroll');

        }

        if ( is_page_template( 'page-why-hire.php' ) || is_page_template( 'page-what-to-do.php' ) ) {
    
            //waypoints
            wp_register_script('why-hire', get_stylesheet_directory_uri() . '/assets/js/why-hire.min.js', array('jquery'));
            wp_enqueue_script('why-hire');
            wp_register_script('waypoints-js', get_stylesheet_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'));
            wp_enqueue_script('waypoints-js');

            //mobile scripts
            wp_register_script('why-hire-mobile', get_stylesheet_directory_uri() . '/assets/js/src/why_hire_mobile.js', array('jquery'));
            wp_enqueue_script('why-hire-mobile');
    
            }

            if ( is_page_template( 'page-no-payment.php' ) ) {
    
                //waypoints
                wp_register_script('no-payment', get_stylesheet_directory_uri() . '/assets/js/no-payment.min.js', array('jquery'));
                wp_enqueue_script('no-payment');
                wp_register_script('waypoints-js', get_stylesheet_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'));
                wp_enqueue_script('waypoints-js');
        
			}

			if( is_admin() ) {
				wp_register_script('tinymce-scripts', get_stylesheet_directory_uri() . '/assets/js/src/mce-buttons.js',array('jquery'), true); 
				wp_enqueue_script('tinymce-scripts');
			}
	}

	
	// store locator functions 
	add_filter( 'wpsl_frontend_meta_fields', 'custom_frontend_meta_fields' );
	function custom_frontend_meta_fields( $store_fields ) {
		$store_fields['wpsl_office_availability'] = array( 
			'name' => 'office_availability',
			'type' => 'text'
		);
		$store_fields['wpsl_page_link'] = array( 
			'name' => 'page_link',
			'type' => 'text'
		);
		$store_fields['wpsl_driving_directions'] = array( 
			'name' => 'driving_directions',
			'type' => 'text'
		);
		return $store_fields;
	}

	add_filter( 'wpsl_thumb_size', 'custom_thumb_size' );
	function custom_thumb_size() {
		$size = array( 100, 400 );
		return $size;
	}

	// Register Site Navigations
	function postali_child_register_nav_menus() {
		register_nav_menus(
			array(
				'header-nav' => __( 'Header Navigation', 'postali' ),
                'header-nav-spanish' => __( 'Header Navigation - Spanish', 'postali' ),
				'footer-services' => __( 'Footer Services Navigation', 'postali' ),
				'footer-locations' => __( 'Footer Locations Navigation', 'postali' ),
				'footer-browse' => __( 'Footer Browse Navigation', 'postali' ),
				'footer-utility' => __( 'Footer Utility Navigation', 'postali' ),
				'spanish-footer-services' => __( 'Spanish – Footer Services Navigation', 'postali' ),
				'spanish-footer-locations' => __( 'Spanish – Footer Locations Navigation', 'postali' ),
				'spanish-footer-browse' => __( 'Spanish – Footer Browse Navigation', 'postali' ),
				'spanish-footer-utility' => __( 'Spanish – Footer Utility Navigation', 'postali' ),
			)
		);
	}
	add_action( 'init', 'postali_child_register_nav_menus' );

	// Add Custom Logo Support
	add_theme_support( 'custom-logo' );

	function postali_custom_logo_setup() {
		$defaults = array(
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'postali_custom_logo_setup' );

	// ACF Options Pages
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title'    => 'Instructions',
			'menu_title'    => 'Instructions',
			'menu_slug'     => 'theme-instructions',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-smiley', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Customizations',
			'menu_title'    => 'Customizations',
			'menu_slug'     => 'customizations',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-customizer', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Locations',
			'menu_title'    => 'Locations',
			'menu_slug'     => 'locations',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-site', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Awards',
			'menu_title'    => 'Awards',
			'menu_slug'     => 'awards',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-awards', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => true
		));

		acf_add_options_page(array(
			'page_title'    => 'Main Navigation',
			'menu_title'    => 'Main Navigation',
			'menu_slug'     => 'navigation',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-editor-table', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Attorneys',
			'menu_title'    => 'Attorneys',
			'menu_slug'     => 'attorneys',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-users', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Global Schema',
			'menu_title'    => 'Global Schema',
			'menu_slug'     => 'global_schema',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-media-code',
			'redirect'      => false
		));
	}

	// Save newly created fields to child theme
	add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
	function my_acf_json_save_point( $path ) {
		
		// update path
		$path = get_stylesheet_directory() . '/acf-json';
		
		// return
		return $path;
	
	}
	
	// Add ability to add SVG to Wordpress Media Library
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

	//** *Enable upload for webp image files.*/
	function webp_upload_mimes($existing_mimes) {
		$existing_mimes['webp'] = 'image/webp';
		return $existing_mimes;
	}
	add_filter('mime_types', 'webp_upload_mimes');

	//** * Enable preview / thumbnail for webp image files.*/
	function webp_is_displayable($result, $path) {
		if ($result === false) {
			$displayable_image_types = array( IMAGETYPE_WEBP );
			$info = @getimagesize( $path );

			if (empty($info)) {
				$result = false;
			} elseif (!in_array($info[2], $displayable_image_types)) {
				$result = false;
			} else {
				$result = true;
			}
		}

		return $result;
	}
	add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);
	
	//add SVG to allowed file uploads
	function add_file_types_to_uploads($file_types){

		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );

		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');


	// Widget Logic Conditionals
	function is_child($parent) {
		global $post;
			return $post->post_parent == $parent;
		}
		
		// Widget Logic Conditionals (ancestor) 
		function is_tree( $pid ) {
		global $post;
		
		if ( is_page($pid) )
		return true;
		
		$anc = get_post_ancestors( $post->ID );
		foreach ( $anc as $ancestor ) {
			if( is_page() && $ancestor == $pid ) {
				return true;
				}
		}
		return false;
	}

	// adjust number of testimonials that get pulled onto the archive page 
	add_action( 'pre_get_posts', 'testimonials' );
	function testimonials( $query ) {
		if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'testimonials' ) ) {
				$query->set( 'posts_per_page', '30' );
		}
	}
	
	// WP Backend Menu area taller
	add_action('admin_head', 'taller_menus');

	function taller_menus() {
	echo '<style>
		.posttypediv div.tabs-panel {
			max-height:500px !important;
		}
	</style>';
	}

    // color picker for PPC landing pages 
    function klf_acf_input_admin_footer() { ?>
        <script type="text/javascript">
        (function($) {
        
        acf.add_filter('color_picker_args', function( args, $field ){
        
        // add the hexadecimal codes here for the colors you want to appear as swatches
        args.palettes = ['#ffffff', '#000000', '#012346', '#FF5601', '#efefef']
        
        // return colors
        return args;
        
        });
        
        })(jQuery);
        </script>
        
        <?php }
        
    add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');


	// Customize the logo on the wp-login.php page
	function my_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
			height:45px;
			width:204px;
			background-size: 204px 45px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

/*
 * Defer Parsing Javascript files
 */

function defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() || is_page_template( ['page-locations-landing.php'] ) ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
   // if ( strpos( $url, 'jquery.js' ) || strpos($url, 'jquery.validate.min.js')) return $url;
    return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

// Press Page
function media_mentions()
{
	$labels = array(
		'name'               => __('Media Mentions', 'post type general name'),
		'singular_name'      => __('Media Mention', 'post type singular name'),
		'add_new'            => __('Add New', 'book'),
		'add_new_item'       => __('Add New Media Mention'),
		'edit_item'          => __('Edit Media Mention'),
		'new_item'           => __('New Media Mention'),
		'all_items'          => __('All Media Mentions'),
		'view_item'          => __('View Media Mentions'),
		'search_items'       => __('Search Media Mentions'),
		'not_found'          => __('No Media Mentions found'),
		'not_found_in_trash' => __('No Media Mentions found in the Trash'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Media Mentions'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'All of my Media Mentions',
		'public'        => true,
		'menu_position' => 7,
		'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
		'has_archive'   => true,
		'menu_icon'		=> 'dashicons-share',
	);
	register_post_type('media_mentions', $args);
}
add_action('init', 'media_mentions');

//Add Template Column to Pages
add_filter( 'manage_pages_columns', 'page_column_views' );
add_action( 'manage_pages_custom_column', 'page_custom_column_views', 5, 2 );
function page_column_views( $defaults ) {
	$defaults['page-layout'] = __('Template');
	return $defaults;
}
function page_custom_column_views( $column_name, $id ) {
	if ( $column_name === 'page-layout' ) {
		$set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
		if ( $set_template == 'default' ) {
			echo 'Default';
		}
		$templates = get_page_templates();
		ksort( $templates );
		foreach ( array_keys( $templates ) as $template ) :
			if ( $set_template == $templates[$template] ) echo $template;
		endforeach;
	}
}

// Exclude pages on PPC templates from Yoast XML sitemap
function exclude_posts_from_xml_sitemaps() {
	$templates = array(
		'page-ppc-landing.php'
	);

	$ppc_ids = array();
	foreach ( $templates as $template ) {
		//get_page_id_by_template($template);
		$args = [
			'post_type'  => 'page',
			'fields'     => 'ids',
			'nopaging'   => true,
			'meta_key'   => '_wp_page_template',
			'meta_value' => $template
		];

		$ppc_pages = get_posts( $args );
		$ppc_ids = array_merge($ppc_ids, $ppc_pages);
	}
	return ($ppc_ids);
}

add_filter( 'wpseo_exclude_from_sitemap_by_post_ids', 'exclude_posts_from_xml_sitemaps' );



function custom_mce_buttons($buttons) {
	// Add your custom button to the array
	$buttons[] = 'phone_number_button';
	return $buttons;
}
add_filter('mce_buttons', 'custom_mce_buttons');

function custom_mce_external_plugins($plugins) {
	// Add a JavaScript file that will handle the custom button functionality
	$plugins['phone_number_button'] = get_stylesheet_directory_uri() . '/assets/js/src/mce-buttons.js';
	return $plugins;
}
add_filter('mce_external_plugins', 'custom_mce_external_plugins');

add_filter('wpseo_canonical', 'fix_blog_page_canonical');
function fix_blog_page_canonical($canonical) {
    if (is_page('blog') && get_query_var('paged') > 1) {
        global $wp;
        return home_url(add_query_arg([], $wp->request));
    }

    return $canonical;
}

/** Disable feed */
function fb_disable_feed() {
    wp_die( __("No feed available, please visit our <a href='".get_bloginfo('url')."'>homepage</a>!") );
}
add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);


add_filter( 'weglot_render_dom', 'prefix_weglot_render_dom' );
function prefix_weglot_render_dom( $dom ) {
    $dom = str_replace( 'lang="es"', 'lang="es-US"', $dom );
    return $dom;
}


//extend Yoast sitemap to include translated pages
function weglot_sitemap ($output, $url) {
	$date = null;

	if ( ! empty( $url['mod'] ) ) {
			$date = date( 'c', strtotime(  $url['mod'] ) );
	}

	$languages = weglot_get_destination_languages();
	$language_services = weglot_get_service( 'Language_Service_Weglot' );
	$request_url_services = weglot_get_service( 'Request_Url_Service_Weglot' );

	foreach ($languages as $language) {

		$wg_url = $request_url_services->create_url_object(  $url['loc'] );
		$lang = $language_services->get_language_from_internal($language['language_to']);

		$output .= "\t<url>\n";
		$output .= "\t\t<loc>" . $wg_url->getForLanguage( $lang ) . "</loc>\n";
		$output .= empty( $date ) ? '' : "\t\t<lastmod>" . htmlspecialchars( $date ) . "</lastmod>\n";

		$images = '';
		if( isset($url['images']) && is_array($url['images']) ){
				foreach ($url['images'] as $image) {
						$images .= "<image:image><image:loc>{$image['src']}</image:loc></image:image>\n";
				}
				$output .= $images;
		}

		$output .= "\t</url>\n";

	}

	return $output;
}
add_filter( 'wpseo_sitemap_url', 'weglot_sitemap', 10, 2 );