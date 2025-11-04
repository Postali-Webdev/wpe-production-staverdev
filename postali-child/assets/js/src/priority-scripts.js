/**
 * Priority scripts that should not be defrerred
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

    $(document).ready(function() {
        var hasSearched = window.location.href.indexOf("wpsl-search-input") > -1;
        if ( !hasSearched ) {
            $.get("/wp-content/themes/postali-child/static-locations.php", function(data) {
                $('#wpsl-stores ul').replaceWith(data);
            });
        } 

        $('#wpsl-search-btn').on('click', function () {
            if ($('#wpsl-search-input').val().trim() !== '') {
            $('#wpsl-stores ul').removeClass('non-generated-list');
            }
        });
    });

});