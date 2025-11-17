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
            <link rel="preload" as="image" href="/wp-content/uploads/2021/10/homepage-hero-mobile-2021.webp" fetchpriority="high">
            <link rel="preload" as="image" href="/wp-content/uploads/2020/04/20-year-badge-white.svg" fetchpriority="high">
        <?php endif; ?>

        <?php if (is_single()) { ?>
            <link rel="preload" as="image" href="/wp-content/uploads/2020/04/header-blog.jpg" fetchpriority="high">
            <link rel="preload" as="image" href="/wp-content/uploads/2020/04/header-blog.jpg.webp" fetchpriority="high">
        <?php } ?>

        <?php if( is_page_template('page-practice-area-parent-new.php') ) : 
            $banner_img = get_field('banner_bg_img') . '.webp'; ?>
            <link rel="preload" as="image" href="<?php echo $banner_img; ?>" fetchpriority="high">
        <?php endif; ?>




        <?php wp_head(); ?>
        <style>
            header #header-top {
                width: 100%;
                padding: 0;
                justify-content: space-between;
                max-width: 100%;
                flex-wrap: nowrap;
                display: flex;
            }
            header #header-top #header-top_left {
                display: flex;
                padding: 21px 4% 21px 0;
                border-right: 1px solid #E6E6E6;
            }
            .header-sub {
                flex-wrap: wrap;
                display: flex;
                border-bottom: 1px solid #E6E6E6;
                padding: 8px 0;
                width: 100%;
                background: #fff;
                -webkit-box-shadow: 0 3px 5px 0 rgba(0,0,0,.1);
                -moz-box-shadow: 0 3px 5px 0 rgba(0,0,0,.1);
                box-shadow: 0 3px 5px 0 rgba(0,0,0,.1);
                position: fixed;
                top: 97px;
                z-index: 2;
                margin: 0;
            }
            .banner.non-mobile {
                display:;
            }
            .banner.mobile-banner {
                display:none;
            }
            .banner.mobile-alt {
                display: none;
            }
            .banner .container .columns .desktop {
                display:;
            }
            .banner .container .columns .column-50:first-of-type .left-container h1:before {
                content: "";
                background: url(/wp-content/uploads/2020/04/20-year-badge-white.svg);
                background-size: cover;
                width: 150px;
                height: 150px;
                position: absolute;
                top: -180px;
                left: -50px;
            }

            .banner .container .columns .column-50:first-of-type .left-container {
                font-size: 32px;
                color: #fff;
                font-family: "Open Sans",sans-serif;
                display: block;
                margin-bottom: 10px;
            }
            .banner .container .columns .column-50:first-of-type .left-container .h1-sub {
                font-size: 32px;
                color: #fff;
                font-family: "Open Sans",sans-serif;
                display: block;
                margin-bottom: 10px;
            }
            .banner .container .columns .column-50:first-of-type .left-container .cta-text {
                font-size: 22px;
                color: #fff;
                font-family: "Open Sans",sans-serif;
                display: block;
                margin-bottom: 45px;
            }
            .frm_fields_container label, .frm_screen_reader, .frm_verify {
                display: none;
            }

            @media screen and (max-width: 1024px) {
                header #header-top #header-top_right {
                    display: none;
                    position: absolute;
                    top: 100px;
                    background: #fff;
                    left: 0!important;
                    z-index: -1;
                    opacity: 0;
                    width: 100%;
                    height: calc(100vh - 100px);
                    overflow: scroll;
                }
                header #header-top #header-top_mobile {
                    display: block;
                    position: absolute;
                    top: 36px;
                    right: 25px;
                }
                header #header-top #header-top_left {
                    border-right: none;
                    flex-basis: 65%;
                    padding-left: 20px;
                }

                header #header-top #header-top_left .custom-logo {
                    max-width: 220px;
                    padding: 6px 0 0;
                }
                header #header-top #header-top_mobile #menu-icon {
                    width: 40px;
                    height: 25px;
                    position: relative;
                    display: block;
                    margin-top: 0;
                    margin-right: 0;
                }
                header #header-top #header-top_mobile #menu-icon .line.line-2 {
                    top: 50%;
                }
                header #header-top #header-top_mobile #menu-icon .line {
                    display: block;
                    background: #FF5601;
                    width: 40px;
                    height: 4px;
                    position: absolute;
                    left: 0;
                    transition: all 0.4s;
                    -webkit-transition: all 0.4s;
                    -moz-transition: all 0.4s;
                }
            }

            @media screen and (max-width:768px ) {
                .banner.non-mobile {
                    display: none;
                }
                .banner.mobile-banner {
                    display:block;
                }
                .banner.mobile-alt{
                    display: block;
                    margin-top: 0!important;
                }

            }
            @media screen and (max-width: 667px) {
                .header-sub {
                    display: none;
                }

                .banner .container .columns .desktop {
                    display: none;
                }
                .banner .container .columns .column-50:first-of-type {
                    padding: 170px 30px 0;
                    min-height: 500px;
                }
                .banner .container .columns .column-50:first-of-type .left-container h1:before {
                    width: 130px;
                    height: 130px;
                    position: absolute;
                    top: -140px;
                    left: -15px;
                }

                .banner .container .columns .column-50:first-of-type .left-container .cta-text {
                    line-height: 140%;
                    margin-top: 10px;
                }
                .banner .container .columns .column-50:first-of-type .left-container .cta-text a {
                    font-weight: 700;
                    color: #fff;
                }
                .banner .container .columns .column-50:first-of-type .left-container .orange-button, .banner .container .columns .column-50:first-of-type .left-container .outline-button {
                    display: flex;
                    padding: 15px 0;
                    width: 210px;
                    justify-content: center;
                }
                .banner .container .columns .column-50:first-of-type .left-container .outline-button {
                    display: flex;
                    padding: 15px 0;
                    width: 210px;
                    justify-content: center;
                }

            }
            @media screen and (max-width: 480px) {
                .banner {
                    background-size: 210%;
                    background-position: top -50px left 35%;
                    margin-top: 80px!important;
                }
                .banner .spacer-30 {
                    height: 15px;
                }
            }
        </style>
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
            <?php echo do_shortcode('[weglot_switcher]'); ?>
            <div id="header-top" style="width: 100%;padding: 0;justify-content: space-between;max-width: 100%;flex-wrap: nowrap;display: flex;">
                <div id="header-top_left">
                    <?php if ( is_page_template('page-ppc-landing.php') ) { // remove link on PPC landing template?>
						<img src="/wp-content/uploads/2020/04/header-logo.svg" class="custom-logo" alt="Staver Accident Injury Logo" width="271" height="66">
                    <?php } else { ?>
                        <a href="<?php echo $GLOBALS['home_url']; ?>" class="custom-logo-link" rel="home" itemprop="url">
                            <img src="/wp-content/uploads/2020/04/header-logo.svg" class="custom-logo" alt="Staver Accident Injury Logo" width="271" height="66">
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

                    <div class="search-box">
                        <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search" role="search">
                            <label for="header-search-form" class="screen-reader-text">
                                <?php esc_html_e('Search for:', 'postali'); ?>
                            </label>
                            <input type="text" name="s" placeholder="Search" id="header-search-form" value="" />
                            <button type="submit" value="<?php echo esc_attr__('Search', 'postali'); ?>" aria-label="Search this site">
                                <span class="icon-search"></span>
                            </button>
                        </form>
                    </div>

                    <p class="no-risk">FREE, NO-RISK CONSULT</p>
                    <div class="contact-language">
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
                <div id="header-top_mobile">
                    <div id="menu-icon" class="toggle-nav">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                        <span class="line line-3"></span>
                    </div>
                </div>
            </div>
        </header>
        <div class="header-sub">
            <div class="container">
                <span class="breadcrumb">
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                    }
                    ?> 
                </span>
                <?php if( is_front_page() && have_rows('navigation') ) : $count = 0; ?>
                <div class="in-page-nav-container">
                    <p class="nav-title"><span class="small-orange"><span class="swap-text"><span class="divide-line"></span> Choose A Section</span> <span class="dropdown-arrow">&#9660;</span></p>
                    <div class="in-page-nav-dropdown">
                        <?php while( have_rows('navigation') ): the_row(); $count++; ?>
                            <a href="#section-<?php echo $count; ?>" class="nav-link"><span class="small-orange"><span class="replacement-text"><?php echo sprintf('%02d', $count); ?> <span class="divide-line"></span> <?php the_sub_field('anchor_title'); ?></span></span></a>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
