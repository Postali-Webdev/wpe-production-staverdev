<?php
/**
 * ContactTemplate
 * Template Name: Contact
 *
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section id="contact-banner">
    <div class="columns">
        <div class="column-66">
            <div class="contact-content">
                <?php the_field('top_copy'); ?>
                <div class="spacer-30"></div>
                <div class="contact-details">
                    <hr>
                    <div class="column-left"><span class="small-orange">Phone</span></div>
                    <div class="column-right"><a href="tel:<?php the_field('phone_number'); ?>" title="Call Staver Accident Injury Lawyers Today"><?php the_field('phone_number'); ?></a></div>
                    <div class="spacer-break"></div>
                    <hr>
                    <div class="column-left"><span class="small-orange">Email</span></div>
                    <div class="column-right"><a href="mailto:<?php the_field('email_address'); ?>" title="Email Staver Accident Injury Lawyers Today"><?php the_field('email_address'); ?></a></div>
                    <div class="spacer-break"></div>
                    <hr>
                    <div class="column-left last"><span class="small-orange">Address</span></div>
                    <div class="column-right"><p><?php the_field('address'); ?><br>
                    <a href="<?php the_field('driving_directions'); ?>" target="_blank" title="Driving Directions">Driving Directions</a></p></div>
                    <div class="spacer-break"></div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="column-33">
            <iframe src="<?php echo esc_url( get_field('map_link') ); ?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'mobile-contact');?>

<?php get_template_part('block', 'consultation');?>

<?php get_template_part('block', 'footer-contact');?>

<?php get_footer(); ?>
