<?php
/**
 * Page Not Found
 * Template Name: 404
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section>
    <div class="container">
        <div class="columns">
            <div class="column-33 centered">
                <h1>404</h1>
                <p class="large centered"><strong>Oops!</strong> Our apologies, but this page seems to be missing.</p>
                <p class="centered">This might be because you typed the address wrong, or the page you’re looking for may have been moved or deleted.</p>
                <a class="orange-button large centered" href="/" title="Back to the homepage">Take me to the homepage</a>
                <div class="spacer-30"></div>
                <a href="/settlements/" title="Read our case results" class="practice-area-button">View our results</a>
                <a href="/testimonials/" title="Read our client testimonials" class="practice-area-button">Read our client testimonials</a>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'footer-contact');?>
	
<?php get_footer(); ?>