/**
 * practice area parent page scripts
 *
 * @package Postali Child
 * @author Postali LLC
 */

 jQuery( function ( $ ) {
    "use strict";

        /* script for animating the counter on scroll */

        var a = 0;
        $(window).scroll(function() {

        $('.circles').each(function (i) {
            if (isScrolledIntoView(this) === true) {
                $(this).addClass('active');
            } else {
                
            }
        });

    });

    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        // var docViewBottom = docViewTop + $(window).height();
    
        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();
    
        return ((elemBottom >= docViewTop + 600) && (elemTop <= docViewTop + 600));
    }

    (function() {
        var width = $(window).outerWidth();
        if (width > 667 && $('.free-consultation-box').length) {
            $(document).on('scroll', function() {
                var docPosition = $(this).scrollTop();
                var afterBanner = $('#why').offset().top;
                var target = afterBanner - (docPosition + 200);

                if ( target <= 0) {
                    $('.free-consultation-box').css('display', 'flex');
                } else if ( target > 0) {
                    $('.free-consultation-box').css('display', 'none');
                }
            });
        }
    })();


});