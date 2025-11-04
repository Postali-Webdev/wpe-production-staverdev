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
    
        var oTop = $('#counter').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.counter-value').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');
            $({
                countNum: $this.text()
            }).animate({
                countNum: countTo
                },
    
                {
    
                duration: 4000,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                    //alert('finished');
                }
    
                });
            });
            a = 1;
        }

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

    

    $('.tab-link').click(function() {
        var s = $(this).attr("data-tab");
        $(".process-tabs span").removeClass("current"); 
        $(".process-content").removeClass("current");
        $(this).addClass("current");
        $("#" + s).addClass("current");
    });

    $('.previous-next').click(function() {
        $("#tab-1").hasClass("current") ? (
            $(".process-tabs span").removeClass("current"), 
            $(".process-content").removeClass("current"), 
            $("#tab-2").addClass("current"), 
            $("#tab-2-nav").addClass("current")
        ) :
        $("#tab-2").hasClass("current") ? (
            $(".process-tabs span").removeClass("current"), 
            $(".process-content").removeClass("current"), 
            $("#tab-3").addClass("current"), 
            $("#tab-3-nav").addClass("current")
        ) : 
        $("#tab-3").hasClass("current") ? (
            $(".process-tabs span").removeClass("current"), 
            $(".process-content").removeClass("current"), 
            $("#tab-4").addClass("current"), 
            $("#tab-4-nav").addClass("current")
        ) : 
        $("#tab-4").hasClass("current") ? (
            $(".process-tabs span").removeClass("current"), 
            $(".process-content").removeClass("current"), 
            $("#tab-5").addClass("current"), 
            $("#tab-5-nav").addClass("current")
        ) : 
        $("#tab-5").hasClass("five") ? (
            $(".process-tabs span").removeClass("current"), 
            $(".process-content").removeClass("current"), 
            $("#tab-6").addClass("current"), 
            $("#tab-6-nav").addClass("current")
        ) : 
        $("#tab-5").hasClass("current") ? (
            $(".process-tabs span").removeClass("current"), 
            $(".process-content").removeClass("current"), 
            $("#tab-1").addClass("current"), 
            $("#tab-1-nav").addClass("current")
        ) : 
        $("#tab-6").hasClass("current") && (
            $(".process-tabs span").removeClass("current"),
            $(".process-content").removeClass("current"), 
            $("#tab-1").addClass("current"), 
            $("#tab-1-nav").addClass("current")
        ); 
    });

});