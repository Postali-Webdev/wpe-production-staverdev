/**
 * Home Page Scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";
	
	/* homepage banner content swap script */
	$('.snapshot').click(function(){
		$('#snapshot').addClass('active');
		$('#reviews,#results,#awards').removeClass('active');
		$(this).addClass('active');
		$('.reviews,.results,.awards').removeClass('active');
	  });

	/* mobile version */
	$('.snapshot').click(function(){
		$('#snapshot-mobile').addClass('active');
		$('#reviews-mobile,#results-mobile,#awards-mobile').removeClass('active');
		$(this).addClass('active');
		$('.reviews,.results,.awards').removeClass('active');
	  });
	  
	  $('.reviews').click(function(){
		$('#reviews').addClass('active');
		$('#snapshot,#results,#awards').removeClass('active');
		$(this).addClass('active');
		$('.snapshot,.results,.awards').removeClass('active');
	  });

	/* mobile version */
	$('.reviews').click(function(){
		$('#reviews-mobile').addClass('active');
		$('#snapshot-mobile,#results-mobile,#awards-mobile').removeClass('active');
		$(this).addClass('active');
		$('.snapshot,.results,.awards').removeClass('active');
	  });
	  
	  $('.results').click(function(){
		$('#results').addClass('active');
		$('#snapshot,#reviews,#awards').removeClass('active');
		$(this).addClass('active');
		$('.snapshot,.reviews,.awards').removeClass('active');
	  });

	/* mobile version */
	$('.results').click(function(){
		$('#results-mobile').addClass('active');
		$('#snapshot-mobile,#reviews-mobile,#awards-mobile').removeClass('active');
		$(this).addClass('active');
		$('.snapshot,.reviews,.awards').removeClass('active');
	  });
	  
	  $('.awards').click(function(){
		$('#awards').addClass('active');
		$('#snapshot,#results,#reviews').removeClass('active');
		$(this).addClass('active');
		$('.snapshot,.results,.reviews').removeClass('active');
	  });

	/* mobile version */
	$('.awards').click(function(){
		$('#awards-mobile').addClass('active');
		$('#snapshot-mobile,#results-mobile,#reviews-mobile').removeClass('active');
		$(this).addClass('active');
		$('.snapshot,.results,.reviews').removeClass('active');
	  });


	  /* car accident overview filter content swap */
	  $('#car-filter-info').click(function(){
		$('#car-info').addClass('active');
		$('#car-result,#car-link').removeClass('active');
		$('#car-filter-result,#car-filter-link').removeClass('active');
		$(this).addClass('active');
	  });

	  $('#car-filter-result').click(function(){
		$('#car-result').addClass('active');
		$('#car-info,#car-link').removeClass('active');
		$('#car-filter-info,#car-filter-link').removeClass('active');
		$(this).addClass('active');
	  });
	  
	  $('#car-filter-result').click(function(){
		$('#car-result').addClass('active');
		$('#car-info,#car-link').removeClass('active');
		$('#car-filter-info,#car-filter-link').removeClass('active');
		$(this).addClass('active');
	  });

	  /* truck accident overview filter content swap */
	  $('#truck-filter-info').click(function(){
		$('#truck-info').addClass('active');
		$('#truck-result,#truck-link').removeClass('active');
		$('#truck-filter-result,#truck-filter-link').removeClass('active');
		$(this).addClass('active');
	  });

	  $('#truck-filter-result').click(function(){
		$('#truck-result').addClass('active');
		$('#truck-info,#truck-link').removeClass('active');
		$('#truck-filter-info,#truck-filter-link').removeClass('active');
		$(this).addClass('active');
	  });
	  
	  $('#truck-filter-result').click(function(){
		$('#truck-result').addClass('active');
		$('#truck-info,#truck-link').removeClass('active');
		$('#truck-filter-info,#truck-filter-link').removeClass('active');
		$(this).addClass('active');
	  });

	  // selector for select-dropdown list
	  $(".mobile-banner-menu > ul > li").click(function() {
		$(this)
			.parents(".mobile-banner-menu")
			.find('input[type="text"]')
			.val($(this).text());
	  });

	  // remove all active classes on the other select-dropdowns

	  var screen = $(window).outerWidth();
	  if ( screen > 667 ) {
		$(".mobile-banner-menu").click(function() {
			$(".mobile-banner-menu").not($(this)).removeClass("active");
			$(this).toggleClass("active");
		});
	}

	  $('.snapshot-mobile').click(function(){
		$('#snapshot').addClass('active');
		$('#reviews,#results,#awards').removeClass('active');
	  });
	  
	  $('.reviews-mobile').click(function(){
		$('#reviews').addClass('active');
		$('#snapshot,#results,#awards').removeClass('active');
	  });
	  
	  $('.results-mobile').click(function(){
		$('#results').addClass('active');
		$('#snapshot,#reviews,#awards').removeClass('active');
	  });
	  
	  $('.awards-mobile').click(function(){
		$('#awards').addClass('active');
		$('#snapshot,#results,#reviews').removeClass('active');
	  });


    if (screen < 667 && $('.scrolling-snapshot').length ) {
        $('.scrolling-snapshot').slick({
            infinite: true,
            prevArrow: '<button class="slide-arrow prev-arrow"></button>',
            nextArrow: '<button class="slide-arrow next-arrow"></button>',
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade:true,
        });
    }
});