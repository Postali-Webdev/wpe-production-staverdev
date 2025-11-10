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
	$('#menu-icon').addClass('open');

	/* awards and memberships content swap */
	$('#awards-button').click(function(){
		$('.awards-container').addClass('active');
		$('.membership-container').removeClass('active');
		$('#membership-button').removeClass('active');
		$(this).addClass('active');
	});

	$('#membership-button').click(function(){
		$('.membership-container').addClass('active');
		$('.awards-container').removeClass('active');
		$('#awards-button').removeClass('active');
		$(this).addClass('active');
	});

	$('.main-bar').on('click',function(){
	   $('.drop-down').slideToggle(280);
	});

	// global vars
	var navHeight = $('#menu-main-menu > .menu').outerHeight();

	// SCRIPTS FOR NEW MOBILE NAVIGATION

	//Hamburger animation
	$('#menu-icon').click(function() {
		$(this).toggleClass('active');
		return false;
	});

	//Toggle mobile menu & search
	$('.toggle-nav').click(function() {
		$('#header-top_right').slideToggle(400);
		$('#header-top_right').addClass('active');
	});
	 
	//Close navigation on anchor tap
	$('.toggle-nav.active').click(function() {	
		$('#header-top_right').slideUp(400);
		$('#header-top_right').removeClass('active');
	});	

    //Mobile menu accordion toggle for sub pages
	$('#header-top_menu > ul.menu > li.menu-item-has-children').append('<div class="accordion-toggle"><span class="icon-drw-chevron-down"></span></span></div>');

    $('.menu .accordion-toggle').click(function() {
      $(this).parent().find('> ul').slideToggle(400);
      $(this).toggleClass('toggle-background');
      $(this).find('.icon-drw-chevron-down').toggleClass('toggle-rotate');
    });

	  //only show floating number after header

	  //Tabbing functions for process widget (on location homepages)
	  $(document).ready(function() {
		if($('.process-tabs').length) {
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
		}
	  });
	  
	  // home in-page navigation
	  $(document).ready(function() {
		if( $('.in-page-nav-container').length ) {
			var defaultText = '<span class="divide-line"></span> Choose A Section';
			var dropdown = $('.in-page-nav-dropdown');
			var dropdownArrow = $('.dropdown-arrow');
			var navTitle = $('.nav-title');
			var navTitleInner = $('.nav-title .swap-text');
			var navLink = $('.nav-link');

			navTitle.on('click', function(e) {
				dropdown.toggleClass('active');
				dropdownArrow.toggleClass('active');
				if(navTitleInner.html() !== defaultText) {
					navTitleInner.html(defaultText);
				}
			});

			navLink.on('click', function(e) {
				var replacementText = $(this).find('.replacement-text').html();
				dropdown.toggleClass('active');
				dropdownArrow.toggleClass('active');
				navTitleInner.html(replacementText);
				if( navLink.hasClass('active') ) {
					navLink.removeClass('active');
				}
				$(this).addClass('active');
			});

		}
	  });

	//keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
	$(document).ready(function() {
		function tabableMenu() {
			var screenSize = $(document).outerWidth();
			if( screenSize > 1024 ) {
				var focusActive = false;
				var navMenu = '#nav-1, #nav-2, #nav-3, #nav-4, #nav-5';
				//do functions below while user is focused on sub menu
				$(navMenu).on('focusin keydown', function(e) {
					var subMenu = $(this).find('.sub-menu');
					//adding active menu state while user is focused on sub menu
					subMenu.addClass('focus-active');
					focusActive = true;
					//remove menu when user tabs away from menus last child item
					$(this).find('.sub-menu ul li:last-child').on('focusout', function(e) {
						subMenu.removeClass('focus-active');
						focusActive = false;
					});
				});
				//remove active sub menu when user reverse tabs away 
				$(navMenu).on('focusout keydown', function(e) { 
					//focusActive = false;
					var subMenu = $(this).find('.sub-menu');

					


					// console.log( navMenu.includes(e.currentTarget.id) );
					if (e.type === "focusout") {
						var parentElId = $(e.relatedTarget).parent()[0].id;
						console.log($(e.relatedTarget).parent()[0].id);
						console.log( navMenu.includes(parentElId) );
						var parentInFocus = navMenu.includes(parentElId);
						
					}

					// && navMenu.includes(e.currentTarget.id)
					
					if(e.shiftKey && e.keyCode == 9 && focusActive && parentInFocus ) { 
						subMenu.removeClass('focus-active');
						focusActive = false;
					}
				});
				//remove active sub menu when user clicks anywhere on page outside of the menu
				$('html').on('click', function(e) {
					var target = e.target;
					if( $(target).closest('.sub-menu').length ) {
						return;
					} else {
						if ( focusActive ) {
							$('.sub-menu').removeClass('focus-active');
							focusActive = false;
						}
					}
				});
			} 
		}
		tabableMenu();
		$(window).resize(function() {
			tabableMenu();
		});
	});


	$('.transcript .read-more').on('click', function () {
		$(this).next('.hidden-transcript').slideToggle(400);
		$(this).html( $(this).html() === 'Hide Transcript' ? 'View Transcript' : 'Hide Transcript' );
	})

});
