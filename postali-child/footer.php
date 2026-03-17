<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
global $post;

$current_page_id = $post->ID;
$current_page_parent_id = $post->post_parent;

?>
<footer>
    <div class="container">
        <div class="columns">
            <div class="column-33 map-column">
                <a href="/" title="Home"><img src="/wp-content/uploads/2026/02/logo-footer.svg" alt="Staver Accident Injury Lawyers"></a>
                <div class="spacer-60"></div>
                
                <?php if( have_rows('locations', 'options') ) : 
                    $secondary_locations = [];
                    $secondary_locations_esp = [];
                    while( have_rows('locations', 'options') ) {
                        the_row();
                        $is_primary = get_sub_field('is_primary');
                        $page_link = get_sub_field('page_link');
                        $page_id = url_to_postid($page_link); 
                        $page_link_esp = get_sub_field('page_link_spanish');
                        $page_id_esp = url_to_postid($page_link_esp);
                        if( !$is_primary) {
                            $secondary_locations[] .= $page_id;
                            $secondary_locations_esp[] .= $page_id_esp;
                        }
                    } ?>
                    
                    <div>
                        <div class="main-contact">
                        <?php while( have_rows('locations', 'options') ) : the_row();
                        $address = get_sub_field('address');
                        $phone = get_sub_field('phone');
                        $directions_link = get_sub_field('directions_link');
                        $maps_link = get_sub_field('maps_link');
                        $map_embed = get_sub_field('map_embed');
                        $page_link = get_sub_field('page_link');
                        $page_id = url_to_postid($page_link); 
                        $page_link_esp = get_sub_field('page_link_spanish');
                        $page_id_esp = url_to_postid($page_link_esp); 
                        $is_primary = get_sub_field('is_primary');
                        $add_location = false; ?>
                    
                        <!-- General English -->
                        <?php if( !is_tree(27483) && !in_array($current_page_id, $secondary_locations) && !in_array($current_page_parent_id, $secondary_locations) && $is_primary ) : ?>
                            <p>
                                <span class="icon-footer-phone"></span> <a href="tel:<?php _e($phone); ?>" title="Call Staver Accident Injury Lawyers Toiday"><?php _e($phone); ?></a>
                                <span class="spacer-15"></span>
                                <span class="icon-footer-email"></span> <a href="mailto:staver@chicagolawyer.com" title="Email Staver Accident Injury Lawyers Toiday">staver@chicagolawyer.com</a>
                                <span class="spacer-15"></span>
                                <span class="icon-footer-pin"></span><a target="_blank" class="maps-link" href="<?php _e($maps_link); ?>"><?php _e($address); ?></a>
                                <span class="spacer-15"></span>
                                <a target="_blank" class="directions-link" href="<?php _e($directions_link); ?>">Get Directions</a>
                            </p> 
                            <iframe src="<?php echo esc_url($map_embed); ?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                        <!-- English Location -->
                        <?php elseif( !is_tree(27483) && !$is_primary && in_array($current_page_id, $secondary_locations) && $current_page_id == $page_id ) : ?>
                            <p>
                                <span class="icon-footer-phone"></span> <a href="tel:<?php _e($phone); ?>" title="Call Staver Accident Injury Lawyers Toiday"><?php _e($phone); ?></a>
                                <span class="spacer-15"></span>
                                <span class="icon-footer-email"></span> <a href="mailto:staver@chicagolawyer.com" title="Email Staver Accident Injury Lawyers Toiday">staver@chicagolawyer.com</a>
                                <span class="spacer-15"></span>
                                <span class="icon-footer-pin"></span><a target="_blank" class="maps-link" href="<?php _e($maps_link); ?>"><?php _e($address); ?></a>
                                <span class="spacer-15"></span>
                                <a target="_blank" class="directions-link" href="<?php _e($directions_link); ?>">Get Directions</a>
                            </p> 
                            <iframe src="<?php echo esc_url($map_embed); ?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                        <!-- English Location Child Pages -->
                        <?php elseif( !is_tree(27483) && !$is_primary && in_array($current_page_parent_id, $secondary_locations) && $current_page_parent_id == $page_id) : ?>
                            <p>
                                <span class="icon-footer-phone"></span> <a href="tel:<?php _e($phone); ?>" title="Call Staver Accident Injury Lawyers Toiday"><?php _e($phone); ?></a>
                                <span class="spacer-15"></span>
                                <span class="icon-footer-email"></span> <a href="mailto:staver@chicagolawyer.com" title="Email Staver Accident Injury Lawyers Toiday">staver@chicagolawyer.com</a>
                                <span class="spacer-15"></span>
                                <span class="icon-footer-pin"></span><a target="_blank" class="maps-link" href="<?php _e($maps_link); ?>"><?php _e($address); ?></a>
                                <span class="spacer-15"></span>
                                <a target="_blank" class="directions-link" href="<?php _e($directions_link); ?>">Get Directions</a>
                            </p> 
                            <iframe src="<?php echo esc_url($map_embed); ?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                        <?php endif; ?>
                        
                        <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
            <div class="column-66">
                <div class="column-33">
                    
                    <p class="column-header">Services</p>
                        <?php $args = array(
							'container'      => false,
							'theme_location' => 'footer-services',
						);
						wp_nav_menu( $args );
                    
                    ?>
                </div>
                <div class="column-33">
                    <p class="column-header">Locations</p>
                        <?php $args = array(
                            'container'      => false,
                            'theme_location' => 'footer-locations',
                        );
                        wp_nav_menu( $args );
                        ?>
                </div>
                <div class="column-33">
                    <p class="column-header">Browse</p>
                    <?php $args = array(
                        'container'      => false,
                        'theme_location' => 'footer-browse',
                    );
                    wp_nav_menu( $args );
                    ?>
                </div>
            </div>
            <div class="spacer-30"></div>
            <div class="column-full" id="utility">
                <div class="social-media">
                    <a href="https://www.facebook.com/staverinjury/" class="social-media-icon" id="facebook" title="Facebook" target="_blank"></a>
                    <a href="https://www.linkedin.com/company/staver-law-group-p.c./" class="social-media-icon" id="linkedin" title="LinkedIn" target="_blank"></a>
                    <a href="https://twitter.com/StaverLawGroup" class="social-media-icon" id="twitter" title="LinkedIn" target="_blank"></a>
                </div>
                <div class="utility-links">
                    <?php 
                    $args = array(
                        'container'      => false,
                        'theme_location' => 'footer-utility',
                    );
                    wp_nav_menu( $args );
                    wp_reset_postdata();?>
                </div>
            </div>
            <div class="spacer-30"></div>
            <?php get_template_part('block', 'footer-locations');?>
            <div class="column-full">
                <p class="disclaimer">
                    Staver Accident Injury Lawyers, P.C. provides personal injury representation to injury and accident victims in Chicago and throughout Chicagoland, including Aurora, Naperville, Elgin, Waukegan, Hinsdale, and Joliet. We proudly serve clients across Cook County, DuPage County, Kane County, Lake County, and Will County. Prior case results and client testimonials do not guarantee or predict a similar outcome in any future case. The review or use of information on this site does not create an attorney-client relationship. If you choose to submit information via chat, email, contact form, text message, or phone call, you agree that an attorney from Staver Accident Injury Lawyers, P.C. may contact you for a consultation as a potential client. Any information you provide will be kept confidential. If at any point you have questions, please feel free to contact us at support@chicagolawyer.com.
                </p>
                <?php if(is_page_template('front-page.php')) { ?>
                <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:30px 0 0;"></a>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>	
<script type="text/javascript" src="//cdn.callrail.com/companies/185197703/68d46f7603cb4957aaf5/12/swap.js"></script> 

<?php if( !is_page(['staver-accident-injury-lawyers-p-c-personal-injury-scholarship', 'college-scholarship-essay-online-application'])) : ?>
<!-- Start Of NGage -->
<div id="nGageLH" style="visibility:hidden; display: block; padding: 0; position: fixed; right: 0px; bottom: 50%; z-index: 5000;"></div>
<script type="text/javascript" src="https://messenger.ngageics.com/ilnksrvr.aspx?websiteid=165-206-222-106-126-136-233-172"></script>
<!-- End Of NGage -->
 <?php endif; ?>

 <!-- Start of Clarity -->
  <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "4u580mg9bd");
    </script>
 <!-- End of Clarity -->

</body>
</html>


