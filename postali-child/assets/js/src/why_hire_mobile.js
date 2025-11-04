jQuery( function ( $ ) {
	"use strict";

    $(document).ready(function() {
        $(function() {  
            var $topDetector = $('#top_detector_1');
            $(window).scroll(function () { 
                if ($topDetector.offset().top - $(this).scrollTop() < 146) {
                    $("#current_1").addClass('fixed');
                    $("#spacer_1").addClass('block');
                } else {
                    $("#current_1").removeClass('fixed');
                    $("#spacer_1").removeClass('block');
                }
            });
        });
    }); 

    $(document).ready(function() {
        $(function() {  
            var $topDetector2 = $('#top_detector_2');
            $(window).scroll(function () { 
                if ($topDetector2.offset().top - $(this).scrollTop() < 146) {
                    $("#current_2").addClass('fixed');
                    $("#spacer_2").addClass('block');
                } else {
                    $("#current_2").removeClass('fixed');
                    $("#spacer_2").removeClass('block');
                }
            });
        });
    }); 

    $(document).ready(function() {
        $(function() {  
            var $topDetector3 = $('#top_detector_3');
            $(window).scroll(function () { 
                if ($topDetector3.offset().top - $(this).scrollTop() < 146) {
                    $("#current_3").addClass('fixed');
                    $("#spacer_3").addClass('block');
                } else {
                    $("#current_3").removeClass('fixed');
                    $("#spacer_3").removeClass('block');
                }
            });
        });
    }); 

    $(document).ready(function() {
        $(function() {  
            var $topDetector4 = $('#top_detector_4');
            $(window).scroll(function () { 
                if ($topDetector4.offset().top - $(this).scrollTop() < 146) {
                    $("#current_4").addClass('fixed');
                    $("#spacer_4").addClass('block');
                } else {
                    $("#current_4").removeClass('fixed');
                    $("#spacer_4").removeClass('block');
                }
            });
        });
    }); 

    $(document).ready(function() {
        $(function() {  
            var $topDetector5 = $('.bottom-copy');
            $(window).scroll(function () { 
                if ($topDetector5.offset().top - $(this).scrollTop() < 146) {
                    $("#current_1").removeClass('fixed');
                    $("#current_2").removeClass('fixed');
                    $("#current_3").removeClass('fixed');
                    $("#current_4").removeClass('fixed');
                    $("#spacer_1").removeClass('block');
                    $("#spacer_2").removeClass('block');
                    $("#spacer_3").removeClass('block');
                    $("#spacer_4").removeClass('block');
                }
            });
        });
    }); 

});