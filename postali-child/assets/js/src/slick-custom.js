/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	$('#hp-slides').slick({
		dots: false,
		infinite: true,
		fade: true,
		autoplay: false,
        accessibility:true,
  		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: '<button aria-label="Previous" class="slider-arrow prev"></button>',
    	nextArrow: '<button aria-label="Next" class="slider-arrow next"></button>',
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
		asNavFor: '#hp-slider-nav',
	});

	$('#hp-slider-nav').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '#hp-slides',
		dots: false,
		centerMode: false,
		focusOnSelect: true,
		vertical: true,
		infinite:false,
	});

    $('.result-container').slick({
        centerMode:false,
        vertical:false,
        arrows:false,
		dots: false,
		infinite: true,
		fade: false,
		autoplay: false,
  		speed: 1000,
        accessibility:true,
		slidesToShow: 3,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
            breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
            breakpoint: 601,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
	});

    // Now, initialize your slick slider as usual
    $('.hp-attorney-slider').slick({
        slidesToShow: 4.99,
        centerMode:false,
        vertical:false,
        arrows:false,
		dots: false,
		infinite: true,
		fade: false,
		autoplay: false,
  		speed: 1000,
        accessibility:true,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
            breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
            breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
            breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    $('.prev-button-slick').click(function(){
        $('.result-container').slick("slickNext");
    });

    $('.next-button-slick').click(function(){
        $('.result-container').slick("slickPrev");
    });

    $('.prev-button-slick2').click(function(){
        $('.hp-attorney-slider').slick("slickNext");
    });

    $('.next-button-slick2').click(function(){
        $('.hp-attorney-slider').slick("slickPrev");
    });
	  
    $('.hp-awards').slick({
		dots: false,
        arrows: false,
		infinite: true,
		fade: false,
		autoplay: true,
        accessibility:true,
        vertical:true,
        speed: 7000, 
  		autoplaySpeed: 0,
		slidesToShow: 5,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'linear',
        pauseOnHover:false,

        responsive: [
            {
            breakpoint: 821,
                settings: {
                    vertical: false,
                    slidesToShow: 3,
                }
            },
            {
            breakpoint: 601,
                settings: {
                    vertical: false,
                    slidesToShow: 2,
                }
            }
        ]
	});

    $('.testimonial-scroller').slick({
        centerMode:false,
        vertical:false,
        arrows:false,
		dots: false,
		infinite: true,
		fade: false,
		autoplay: false,
  		speed: 1000,
        accessibility:true,
		slidesToShow: 4,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
            breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
            breakpoint: 821,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
            breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
	});

    $('.prev-button-slick3').click(function(){
        $('.testimonial-scroller').slick("slickNext");
    });

    $('.next-button-slick3').click(function(){
        $('.testimonial-scroller').slick("slickPrev");
    });

	
});