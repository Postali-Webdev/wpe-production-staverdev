<?php
/**
 * Template Name: Sitemap
 *
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<section class="banner">
	<div class="container">
        <div class="columns">
            <span>
                <p class="small-orange">Staver accident injury lawyers, p.c.</p>
                <div class="spacer-break"></div>
                <h1><?php the_title(); ?><h1>
            </span>
        </div>
    </div>
</section>

<section class="sitemap">
	<div class="container">
		<div class="columns">
			<div class="column-50">
            <span class="small-orange">Pages</span> 
            <div class="spacer-15"></div>
				<ul>
					<?php 
                    $templates = array(
                        'page-ppc-landing.php'
                    );

                    $ppc_ids = array();
                    foreach ( $templates as $template ) {
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
                    $ppc_list = implode(', ', $ppc_ids);
                    $page_args = array(
                        'exclude' => $ppc_list,
                        'title_li' => null
                    );
                    wp_list_pages($page_args); 
                    ?>
				</ul> 
			</div>
			<div class="column-50">
            <span class="small-orange">Blog Posts</span> 
            <div class="spacer-15"></div>
                <ul>
                    <?php wp_get_archives('type=postbypost'); ?>
                </ul>
            </div>
		</div>
	</div>
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'footer-contact');?>

<?php get_footer();
