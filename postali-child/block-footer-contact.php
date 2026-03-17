<?php
    $class = isset($args['class']) && $args['class'] ? $args['class'] : 'white-bg';
?>
<section class="footer-pre-contact <?php echo esc_attr($class); ?>">

    <div class="container">
        <div class="columns">
            <div class="column-50">
                <h2>Let's Get Started.</h2>
                <p class="large">We're ready to fight for you. We're ready to be your ally. And we're ready to start right now.</p>
                <div class="spacer-30"></div>
                <p>Our team is available around the clock to provide the support you need. We are ready to be the wind in your SAILs, helping you recover what you deserve after an accident.</p>
                <div class="spacer-30"></div>

                <p class="contact-cta">Free Consultation  |  PAY NOTHING UNTIL WE WIN</p>

                <div class="spacer-15"></div>
                <?php if ( is_tree(19006) ) { ?> <!-- aurora info -->
                    <a class="orange-button" title="Get a free consultation - call today!" href="tel:630-892-0779">CALL (630) 892-0779 </a>
                <?php } elseif ( is_tree(19008) ) { ?> <!-- elgin info -->
                    <a class="orange-button" title="Get a free consultation - call today!" href="tel:847-488-1866">CALL (847) 488-1866 </a>
                <?php } elseif ( is_tree(19010) ) { ?> <!-- hinsdale info -->
                    <a class="orange-button" title="Get a free consultation - call today!" href="tel:630-323-7322">CALL (630) 323-7322 </a>
                <?php } elseif ( is_tree(19012) ) { ?> <!-- joliet info -->
                    <a class="orange-button" title="Get a free consultation - call today!" href="tel:815-726-4405">CALL (815) 726-4405 </a>
                <?php } elseif ( is_tree(19014) ) { ?> <!-- naperville info -->
                    <a class="orange-button" title="Get a free consultation - call today!" href="tel:630-778-3770">CALL (630) 778-3770 </a>
                <?php } elseif ( is_tree(19016) ) { ?> <!-- waukegan info -->
                    <a class="orange-button" title="Get a free consultation - call today!" href="tel:847-249-4148">CALL (847) 249-4148 </a>
                <?php } else { ?> <!-- main chicago info -->
                    <a class="orange-button" title="Get a free consultation - call today!" href="tel:312-236-2900">CALL (312) 236-2900 </a>
                <?php } ?>

            </div>
            <div class="column-50">
                <div class="contact-form-container">

                <?php if ( $class === 'blue-bg' ) { ?>
                    <?php echo do_shortcode("[gravityform id='1' title='false']"); ?>
                <?php } else { ?>
                    <?php echo do_shortcode("[gravityform id='3' title='false']"); ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
