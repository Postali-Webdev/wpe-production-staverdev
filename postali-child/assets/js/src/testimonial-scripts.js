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
		$('.break').each(function (i) {
			if (isScrolledIntoView(this) === true) {
				$(this).addClass('active');
				$('.sidebarContainer__content').removeClass('active');
                $('.sidebarContainer__content').eq(i).addClass('active');
                $('.background-image').removeClass('active');
                $('.background-image').eq(i).addClass('active');
			} else {
				$(this).removeClass('active');
			}
		});
	});
	
	function isScrolledIntoView(elem) {
		var docViewTop = $(window).scrollTop();
		// var docViewBottom = docViewTop + $(window).height();
	
		var elemTop = $(elem).offset().top;
		var elemBottom = elemTop + $(elem).height();
	
		return ((elemBottom >= docViewTop + 200) && (elemTop <= docViewTop + 200));
	}
    
});
