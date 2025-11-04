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

	  $('.tab-content-container-mobile').slick({
		dots: false,
		infinite: false,
		fade: false,
		autoplay: false,
  		speed: 300,
        accessibility:true,
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: '<button aria-label="Previous" class="slider-arrow prev"></button>',
    	nextArrow: '<button aria-label="Next" class="slider-arrow next"></button>',
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
	});
	  
	
});