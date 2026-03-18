<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
 * */
?><!DOCTYPE html>
<html class="no-js webp" <?php language_attributes(); ?>>
    <head>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TMPWN6');</script>
        <!-- End Google Tag Manager -->

        <!-- Add JSON Schema here -->
        <?php 
            // Global Schema
            $default_schema = get_field('global_schema', 'options');
            $aurora_schema = get_field('aurora_global_schema', 'options');
            $elgin_schema = get_field('elgin_global_schema', 'options');
            $hinsdale_schema = get_field('hinsdale_global_schema', 'options');
            $joilet_schema = get_field('joliet_global_schema', 'options');
            $naperville_schema = get_field('naperville_global_schema', 'options');
            $waukegan_schema = get_field('waukegan_global_schema', 'options');


            if (is_tree(19006)) {
                echo "<script type=\"application/ld+json\"> ${aurora_schema} </script>";
            } else if (is_tree(19008)) {
                echo "<script type=\"application/ld+json\"> ${elgin_schema} </script>";
            } else if (is_tree(19010)) {
                echo "<script type=\"application/ld+json\"> ${hinsdale_schema} </script>";
            } else if (is_tree(19012)) {
                echo "<script type=\"application/ld+json\"> ${joilet_schema} </script>";
            } else if (is_tree(19014)) {
                echo "<script type=\"application/ld+json\"> ${naperville_schema} </script>";
            } else if (is_tree(19016)) {
                echo "<script type=\"application/ld+json\"> ${waukegan_schema} </script>";
            } else {
                echo "<script type=\"application/ld+json\"> ${default_schema} </script>";
            }

            // Single Page Schema
            $single_schema = get_field('single_schema');
            if ( !empty($single_schema) ) :
                echo '<script type="application/ld+json">' . $single_schema . '</script>';
            endif; ?>

        <!-- <link rel="dns-prefetch" href="https://www.googletagmanager.com/" > -->

        <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="preload" as="image" href="/wp-content/uploads/2020/04/header-logo.svg" fetchpriority="high">

        <?php if( is_front_page() ) : ?>
            <!-- <link rel="preload" as="image" href="/wp-content/uploads/2026/02/banner-bg-home.jpg" fetchpriority="high">
            <link rel="preload" as="image" href="/wp-content/uploads/2026/02/banner-bg-home.jpg.webp" fetchpriority="high"> -->
            <!-- <link rel="preload" as="image" href="/wp-content/uploads/2026/02/banner-bg-home-mobile.png" fetchpriority="high">
            <link rel="preload" as="image" href="/wp-content/uploads/2026/02/banner-bg-home-mobile.png.webp" fetchpriority="high"> -->
            <link rel="preload" as="image" href="/wp-content/uploads/2026/03/banner-bg-home-mobile-xsm.jpg" fetchpriority="high">
            <link rel="preload" as="image" href="/wp-content/uploads/2026/03/banner-bg-home-mobile-xsm.jpg.webp" fetchpriority="high">
            <!-- <link rel="preload" as="image" href="/wp-content/uploads/2020/04/20-year-badge-white.svg" fetchpriority="high"> -->
        <?php endif; ?>

        <?php if (is_single()) { ?>
            <link rel="preload" as="image" href="/wp-content/uploads/2020/04/header-blog.jpg" fetchpriority="high">
            <link rel="preload" as="image" href="/wp-content/uploads/2020/04/header-blog.jpg.webp" fetchpriority="high">
        <?php } ?>

        <?php if( is_page_template('page-practice-area-parent-new.php') ) : 
            $banner_img = get_field('banner_bg_img') . '.webp'; ?>
            <link rel="preload" as="image" href="<?php echo $banner_img; ?>" fetchpriority="high">
        <?php endif; ?>

        <link href="https://fonts.googleapis.com">
        <link href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <?php wp_head(); ?>

        <script>
            function init() {
                var imgDefer = document.getElementsByTagName('img');
                for (var i = 0; i < imgDefer.length; i++) {
                    if (imgDefer[i].getAttribute('data-src')) {
                        imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
                    }
                }
            }

            window.onload = init;
        </script>
    </head>

    <body <?php body_class(); ?>>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TMPWN6"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <?php // Swap English / Spanish pages
            $url =  "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
            $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
            $current_url = rtrim($escaped_url, '?');
            $english_url = get_field('english_page');
            $spanish_url = get_field('spanish_page');
        ?>

        <?php $GLOBALS['home_url'] = '/'; ?>
        <header>
            <div id="header-top">
                <div id="header-top_left">
                    <?php if ( is_page_template('page-ppc-landing.php') ) { // remove link on PPC landing template?>
						<img src="/wp-content/uploads/2026/02/logo-footer.svg" class="custom-logo" alt="Staver Accident Injury Logo" width="271" height="66">
                    <?php } else { ?>
                        <a href="<?php echo $GLOBALS['home_url']; ?>" class="custom-logo-link" rel="home" itemprop="url">
                            <img src="/wp-content/uploads/2026/02/logo-footer.svg" class="custom-logo" alt="Staver Accident Injury Logo" width="271" height="66">
                        </a>
                    <?php } ?>
                </div>

                <div id="header-top_right">
                    <div id="header-top_menu">	
                        <nav role="navigation">
                        <?php 
                        $args = array(
                                'container' => false,
                                'theme_location' => 'header-nav'
                            );
                            wp_nav_menu( $args );
                        ?>
                        </nav>
                    </div>

                    <div class="contact-language">

                        <div class="top">
                            <div class="search-holder">
                                <form class="navbar-form-search" role="search" method="get" action="/">
                                    <div class="search-form-container hdn" id="search-input-container">
                                        <div class="search-input-group">
                                            <div class="form-group">
                                                <input type="text" name="s" placeholder="Search for..." id="search-input-5cab7fd94d469" value="" class="form-control">
                                                <label for="s">search for... </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-search" id="search-button"><span class="icon-search-icon" aria-hidden="true"></span></button>
                                </form>	
                            </div>

                            <?php echo do_shortcode('[weglot_switcher]'); ?>
                        </div>

                        <div class="bottom">

                        <?php if (is_tree(19006)) { ?> <!-- aurora info -->
                            <a class="contact" href="/locations/aurora/contact-us/" title="Contact Staver Law Firm">Contact</a>
                        <?php } elseif (is_tree(19008)) { ?> <!-- elgin info -->
                            <a class="contact" href="/locations/elgin/contact-us/" title="Contact Staver Law Firm">Contact</a>
                        <?php } elseif (is_tree(19010)) { ?> <!-- hinsdale info -->
                            <a class="contact" href="/locations/hinsdale/contact-us/" title="Contact Staver Law Firm">Contact</a>
                        <?php } elseif (is_tree(19012)) { ?> <!-- joliet info -->
                            <a class="contact" href="/locations/joliet/contact-us/" title="Contact Staver Law Firm">Contact</a>  
                        <?php } elseif (is_tree(19014)) { ?> <!-- naperville info -->
                            <a class="contact" href="/locations/naperville/contact-us/" title="Contact Staver Law Firm">Contact</a>
                        <?php } elseif (is_tree(19016)) { ?> <!-- waukegan info -->
                            <a class="contact" href="/locations/waukegan/contact-us/" title="Contact Staver Law Firm">Contact</a>      
                        <?php } else { ?> <!-- main chicago info -->
                            <a class="contact" href="/contact-us/" title="Contact Staver Law Firm">Contact</a>
                        <?php } ?>

                        </div>
                    </div>

                </div>
                <div id="header-top_mobile">
                    <div id="menu-icon" class="toggle-nav">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                        <span class="line line-3"></span>
                    </div>
                </div>
            </div>
        </header>
