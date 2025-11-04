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

    /* attorney details content swap */
    $('#Education-button').click(function(){
        $('#Education-container').addClass('active');
        $('#Associations-container,#Licenses-container').removeClass('active');
        $('#Associations-button,#Licenses-button').removeClass('active');
        $(this).addClass('active');
    });

    $('#Licenses-button').click(function(){
        $('#Licenses-container').addClass('active');
        $('#Associations-container,#Education-container').removeClass('active');
        $('#Associations-button,#Education-button').removeClass('active');
        $(this).addClass('active');
    });

    $('#Associations-button').click(function(){
        $('#Associations-container').addClass('active');
        $('#Licenses-container,#Education-container').removeClass('active');
        $('#Licenses-button,#Education-button').removeClass('active');
        $(this).addClass('active');
    });

});

