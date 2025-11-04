jQuery( function ( $ ) {
	"use strict";

    // scripts for waypoints

    var onpage1 = new Waypoint({
        element: document.getElementById('section_1'),
        handler: function() {
            $('#on-page-1').addClass('filled');
        },
    offset: 200
    });
    
    var onpage2 = new Waypoint({
        element: document.getElementById('section_2'),
        handler: function() {
            $('#on-page-2').addClass('filled');
        },
    offset: 200
    });
    
    var onpage3 = new Waypoint({
        element: document.getElementById('section_3'),
        handler: function() {
            $('#on-page-3').addClass('filled');
        },
    offset: 200
    });
    
    var onpage4 = new Waypoint({
        element: document.getElementById('section_4'),
        handler: function() {
            $('#on-page-4').addClass('filled');
        },
    offset: 200
    });
	
});