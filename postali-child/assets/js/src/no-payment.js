jQuery( function ( $ ) {
	"use strict";

    // scripts for waypoints

    var onpage1 = new Waypoint({
        element: document.getElementById('section_1'),
        handler: function(direction) {
            if (direction == "down") {
                $('#section_1_img').addClass('active');
            } else {
                $('#section_1_img').removeClass('active');
            }
        },
    offset: 200
    });
    
    var onpage2 = new Waypoint({
        element: document.getElementById('section_2'),
        handler: function(direction) {
            if (direction == "down") {
                $('#section_2_img').addClass('active');
                $('#section_1_img').removeClass('active');
                $(this).find('.left-content').addClass('active');
                $('#section_2').addClass('active');
            } else {
                $('#section_2_img').removeClass('active');
                $('#section_1_img').addClass('active');
                $(this).find('.left-content').removeClass('active');
                $('#section_2').removeClass('active');
            }
        },
    offset: 200
    });
    
    var onpage3 = new Waypoint({
        element: document.getElementById('section_3'),
        handler: function(direction) {
            if (direction == "down") {
                $('#section_3_img').addClass('active');
                $('#section_2_img').removeClass('active');
            } else {
                $('#section_3_img').removeClass('active');
                $('#section_2_img').addClass('active');
            }
        },
    offset: 200
    });
    
    var onpage4 = new Waypoint({
        element: document.getElementById('section_4'),
        handler: function(direction) {
            if (direction == "down") {
                $('#section_4_img').addClass('active');
                $('#section_3_img').removeClass('active');
            } else {
                $('#section_4_img').removeClass('active');
                $('#section_3_img').addClass('active');
            }
        },
    offset: 200
    });
	
});