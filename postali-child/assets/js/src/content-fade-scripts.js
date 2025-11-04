/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";
        
    // functions for content swap on testimonial page
	$(window).scroll(function () {
		$('section').each(function (i) {
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
	
		return ((elemBottom >= docViewTop + 400) && (elemTop <= docViewTop + 400));
	}
    
});
