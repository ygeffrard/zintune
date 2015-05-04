/***JS & JQUERY***/
 
//General functions are executed on ready or window resize
$( document ).ready( readyFn );
// OR
$( window ).resize( readyFn );
/***
   =============== FUNCTIONS =================
***/
//Function that will add dark Header and White text
function addDarkHeader(){
    $(".navbar-default").css({"background-color":"rgba(0, 0, 0, 0.6)","padding-bottom": "0px"});
        $(".navbar-default .navbar-nav > li > a, .menu-btn button").css({"color":"#fff"});
        $(".navbar-default .navbar-nav > li > a").hover( function(){$(this).css({"color":"#FFA878"})}, function(){$(this).css({"color":"#fff"})} );
}

//Checks to ensure the alt-menu is not shown, manual set this using the ID of the pages that don't use the alt-menu-header template
function ifNotAltMenu(){
    //body attribute
    var body_div = $('body');
    if( (body_div.hasClass('page-template-home-template')) || (body_div.hasClass('page-template-contact-template')) ){
        return false;
    }
    else {
        return true;
    }
}
/***
   =============== END FUNCTIONS ==============
***/

function readyFn( jQuery ) {
    
    //IF the toggle button is hidden, meaning its Desktop View > 768
    if  ( ($(".navbar-toggle")).is(":hidden") ) {
        //Should be fixed and not static
        $(".navbar-wrapper .navbar").addClass("navbar-fixed-top").removeClass("navbar-static-top");
        //We need to always reset the - and + margins that get rid of the annoying body white, since those classes are not needed there
        $(".navbar-wrapper").removeClass("pullupcontainer").removeClass("pullupback");
        //Should always reset the container to its original margin-top setting if the toggle is hidden
        //$("#landing .container").css("margin-top", "160px");
    } else { 
        //$("#landing .container").css("padding-top", "40px");
        $(".navbar-wrapper .navbar").addClass("navbar-static-top").removeClass("navbar-fixed-top");      
        $(".navbar-wrapper").addClass("pullupcontainer").removeClass("pullupback");
        /*if ( ($(".menu")).is(":visible") ){
            $(".navbar-wrapper").removeClass("pullupcontainer").addClass("pullupback");
        }
        else{
            $(".navbar-wrapper").addClass("pullupcontainer").removeClass("pullupback");
        }*/
    }



    //Display background overlay if scrolled and it's not at the top
    $( window ).scroll(function() {
        if( ($(window).width() > 768) && ($(window).scrollTop() != 0) ) /*|| $(window).scrollTop() == $(document).height()- $(window).height()*/{
            //Add dark background after user scrolls
           addDarkHeader();
        
        }
        //When scrolled all the way uptop
        
        //removes dark background if not scrolling
        else {
            $(".navbar-default").css({"background-color":"transparent","top": "0px"});
            if(ifNotAltMenu()){
            $(".navbar-default .navbar-nav > li > a, .menu-btn button").css({"color":"#24A88F"});
            $(".navbar-default .navbar-nav > li > a").hover( function(){$(this).css({"color":"#FFA878"})}, function(){$(this).css({"color":"#24A88F"})} );
            }
        }
    });


    //Reset landing container to its initial settings
    $("#landing .container").css("margin-top", "170px");
    $("#alternate .container").css("margin-top", "120px");
    //Resets
    if($(window).width() < 768){
        $(".menu").removeAttr("style");  
    }
    else{ 
        $(".menu").css("display","none");
    }
    
    
    /*
====================CONTACT FORM===================
*/    
    var wpc_textarea = $('.wpcf7-form textarea.form-control');
    var default_wpc_textarea_placeholder = 'We\'d Love to hear any questions or feedback? Interested in submitting a project? Interested in helping develop ZinTune more? Or Anything You have in mind?';
    
    if($(window).width() < 520){
        
        wpc_textarea.attr('placeholder','Questions? Want to submit a project? Send Anything You\'d like');
    }
    if($(window).width() > 520){
        wpc_textarea.attr('placeholder', default_wpc_textarea_placeholder);
    }
}

//Click functions don't need to be initiated if window is resized, or else flickering will occur
$( document ).ready(function() {
    /***
        ==========INITIALIZE SOME STUFF=======
    ***/
    //Initialize boostrap tooltip
    $('[data-toggle="tooltip"]').tooltip();
    
    //First checks if it's not an alt-menu-header
    if(ifNotAltMenu()){
        //If the window width is not mobile and not scrolled to top  
        if( ($(window).width() > 768) && ($(window).scrollTop() != 0) ){
        
        addDarkHeader();
        }
    }
    
    
    /***
        ==========DONE INITIALIZE ===========
    ***/
    
    //Fix for navbar toggling pulling contents all the way down and body bg showing
    $( ".navbar-toggle" ).click(function() {
        $("#landing .container").css("margin-top", "530px");
        $("#alternate .container").css("margin-top", "480px");
        if ( ($(".navbar-collapse")).is(":hidden")){
            $(".navbar-wrapper").addClass("pullupback").removeClass("pullupcontainer");
        } else{
            //Fix to not show body background
            $(".navbar-wrapper .pullupcontainer").show();//.removeClass("pullup340");
            $(".navbar-wrapper").removeClass("pullupcontainer");
        }
    });

    //Scroll To Top Funtion
    $("#scrollToTop").click(function(e) {
        e.preventDefault();
        $('html,body').animate({scrollTop:0},'slow');
        return false;
    });

    //Toggle Inline menu on/off
    $(".navbar .menu-btn").click(function(e){
        e.preventDefault();
        if( ($(".menu")).is(":hidden") ){
            //$(".menu").css("display","block");
            $(".menu").fadeIn("fast");
        } else{
            //$(".menu").css("display","none");
            $(".menu").fadeOut("fast");
        }
    });
    
/*
===================YOUTUBE====================
*/
    //Credit http://www.skipser.com/p/2/p/auto-resize-youtube-videos-in-responsive-layout.html
    
    //Responsive fix for youtube videos from a fixed width and height responsive on screen size
    /*if(typeof YOUTUBE_VIDEO_MARGIN == 'undefined') {
    YOUTUBE_VIDEO_MARGIN=5;
  }
  $('iframe').each(function(index,item) {
    if($(item).attr('src').match(/(https?:)?\/\/www\.youtube\.com/)) {
      var w=$(item).attr('width');
      var h=$(item).attr('height');
      var ar = h/w*100;
      ar=ar.toFixed(2);
      //Style iframe    
      $(item).css('position','absolute');
      $(item).css('top','0');
      $(item).css('left','0');    
      $(item).css('width','100%');
      $(item).css('height','100%');
      $(item).css('max-width',w+'px');
      $(item).css('max-height', h+'px');        
      $(item).wrap('<div style="max-width:'+w+'px;margin:0 auto; padding:'+YOUTUBE_VIDEO_MARGIN+'px;" />');
      $(item).wrap('<div style="position: relative;padding-bottom: '+ar+'%; height: 0; overflow: hidden;" />');
    }
  });*/
    
/*
=====================ANIMATION=====================
*/    
/*    $("#prjktCarousel a.carousel-control").click( function(e){
        var numdegrees = 90;
        var fxgen = 'all 0.3s cubic-bezier(.48,.47,.54,.54)';
        $("#prjktCarousel a.carousel-control").css({
            '-webkit-transform' : 'rotate('+ numdegrees +'deg)',
                 '-moz-transform' : 'rotate('+ numdegrees +'deg)',
                 '-ms-transform' : 'rotate('+ numdegrees +'deg)',
                 'transform' : 'rotate('+ numdegrees +'deg)',
    "-webkit-transition": fxgen,
   "-moz-transition": fxgen,
     "-o-transition": fxgen,
        "transition": fxgen
        });
        
    });*/
    /*$("#prjktCarousel a.next").mousedown( function(e){
         var numdegrees = 360;
        '-webkit-transform' : 'rotate('+ numdegrees +'deg)',
                 '-moz-transform' : 'rotate('+ numdegrees +'deg)',
                 '-ms-transform' : 'rotate('+ numdegrees +'deg)',
                 'transform' : 'rotate('+ numdegrees +'deg)',
    });
        $("#prjktCarousel a.prev").mouseup( function(e){
         var numdegrees = -360;
        '-webkit-transform' : 'rotate('+ numdegrees +'deg)',
                 '-moz-transform' : 'rotate('+ numdegrees +'deg)',
                 '-ms-transform' : 'rotate('+ numdegrees +'deg)',
                 'transform' : 'rotate('+ numdegrees +'deg)',
    });*/
    
    
    //Bug fix for not triggering slide on click because of css transition effects
    $("#prjktCarousel a.next").mousedown( function (){
        $(this).trigger("click");
    });
    $("#prjktCarousel a.prev").mousedown( function (){
        $(this).trigger("click");
    });
    
    //Fade In On SCroll
    //Code credit http://www.ordinarycoder.com/jquery-fade-content-scroll/
    $(function() {
        if ( $(window).width() > 768 ){
            $(window).scroll( function(){

                $('.fadeInBlock').each( function(i){

                    var bottom_of_object = $(this).position().top + $(this).outerHeight();
                    var bottom_of_window = $(window).scrollTop() + $(window).height();

                    /* Adjust the "200" to either have a delay or that the content starts fading a bit before you reach it  */
                    bottom_of_window = bottom_of_window + 420;  
                    //When scrolling down
                    if( bottom_of_window > bottom_of_object ){
                        if ($(this).css('opacity') < 1) {$(this).animate({'opacity':'1'},300);}
                    
                    }
                    //When scrolling up
                    /*else {
                    if ($(this).css('opacity')==1) {$(this).animate({'opacity':'0.3'},300);}
      }*/
                }); 
            });
        }
    });
    
/*
===================SINGLE PRJKTS AJAX====================
*/
    //loader icon
    $(document).ajaxStart(function(){
        //place overlay above everything on AJAXload
        $('.prjkt-content .overlay').attr({"style":"z-index:1000; opacity:0.8;" });
        //Smooth transition for AJAX loader icon to appear
        $(".ajax-loader").show(200);
    });
    $(document).ajaxComplete(function(){
        //Smooth transition for AJAX loader icon to disappear
        $(".ajax-loader").hide(200);
        //place overlay back to its original z-index on completion
        $('.prjkt-content .overlay').removeAttr("style");
    });
    
    
    function get_artsn_info(type){
        
    }
    //Current artsn content will just set the name, so php gets the right array name
    var curr_selected_artsns_content;
    
    $('body').on('click','a.prjkt-content-display', function(e) {
        e.preventDefault();
        
        //the element that triggered the click is set it to the lowercase version
        var id_of_element = (this.id).toLowerCase();
        
        
        //On Success of gets Individual artist play part and display additional button options
        function onSuccessAJAXPlay(passed_data) {
              
            /*
            The introduction text that's display sould be to the specific artist or if it's on the original project it would revert back to a default text which is the 'single_prjkt_header_text'  
            */
            //String to change the intro to
            var change_intro_to;
            
            //Current artsn content description will just set the name, so php gets the right array name
            var curr_selected_artsns_content_description;
            
            // if it was a vocalist link, link[0]
            if(id_of_element.indexOf("vocalist") >= 0)         {
                change_intro_to = php_vars.vocalist_intro; //from WP localize
                curr_selected_artsns_content = php_vars.vocalist_contents;

            curr_selected_artsns_content_description = php_vars.vocalist_contents_description;
            }
            // if it was a producer link, link[1]
            else if ( id_of_element.indexOf("producer") >= 0){
                change_intro_to = php_vars.producer_intro; //from WP localize
                curr_selected_artsns_content = php_vars.producer_contents;

            curr_selected_artsns_content_description = php_vars.producer_contents_description;
            }
            //else it is a songwriter link, link[2]
            else{
                change_intro_to = php_vars.songwriter_intro; //from WP localize
                curr_selected_artsns_content = php_vars.songwriter_contents;

            curr_selected_artsns_content_description = php_vars.songwriter_contents_description;
            }
            
            //alert( change_intro_to + curr_selected_artsns_content.length ); 
            
            
            
        //This presets the php code to add
        //var pre_php_for_current_artsn ='<?php        $current_field_selected_content = '+curr_selected_artsns_content+';    $current_field_selected_content_descriptions = '+curr_selected_artsns_content+'; ?>';

            //Changes the body that has to be changed to
            //alert(pre_php_for_current_artsn + passed_data);
            
            //main div that contains the sliders, and short text
            var selected_div = $('div.artsn-menu'); 
            //Pass in the main data first
selected_div.hide().html(passed_data).fadeIn('slow');
            
            //contains the introduction at the top
            var selected_p = $('p.artsn-menu');
            //Change intro text and swap out the classes
            selected_p.text(change_intro_to);
            selected_div.addClass('prjkt-play').removeClass('artsn-menu');;
            selected_p.addClass('prjkt-play').removeClass('artsn-menu');
            
            //Get iFrame Src URLs for previews
            var iframe_preview_left = $('.l-control .content-preview iframe');
            var iframe_preview_right = $('.r-control .content-preview iframe');
            /***********Dynamically load slides and contents**************/
            //Iterates through all the contents and description in the selected artsn content
            //Sets the content for the first div since it's an actual content passed from php
            $('div.carousel-inner').append( "<div class=\"item active\"><div class=\"slider-img-container center item1\"><div class=\"center-v\"><div class=\"embed-responsive embed-responsive-16by9\">"+curr_selected_artsns_content[0][0]+"      </div></div></div><div class=\"carousel-caption\"><h3 class=\"lead-title\">"+curr_selected_artsns_content_description[0]+"</h3></div></div>");
            iframe_preview_left.attr( "src", curr_selected_artsns_content[curr_selected_artsns_content.length - 1][1]);
            iframe_preview_right.attr( "src", curr_selected_artsns_content[1][1]);
            
            for (var i = 1; i < curr_selected_artsns_content.length; i++) { 
                //First item will already be set active we just have to continually add additionals, 
                
                //Add indicators, #prjktCarousel is the id of the dataTarget attribute
                
                $('ol.carousel-indicators').append('<li data-target="#prjktCarousel" data-slide-to="'+i+'"></li>');         
                $('div.carousel-inner').append( "<div class=\"item\"><div class=\"slider-img-container center item1\"><div class=\"center-v\"><div class=\"embed-responsive embed-responsive-16by9\">"+curr_selected_artsns_content[i][0]+"      </div></div></div><div class=\"carousel-caption\"><h3 class=\"lead-title\">"+curr_selected_artsns_content_description[i]+"</h3></div></div>")
};
          
        
        /*$('.artsn-menu').animate({
            opacity: 0,
            marginLeft: "10px"
        }, "slow", "swing");*/
        
        $('.back-to-artsn')
        .css("visibility","visible")
        .animate({
            opacity: 1,
        }, "slow", "swing");
        
            
            $('.carousel-indicators li').click(function() {
        //e.preventDefault();
        size_of_slider =  $('.carousel-indicators  li').size();

        console.log($( '.carousel-indicators li.active' ).index());
    });
        	/*$.ajax({
                url: "http://yourwebsite.com",
                success: function( data ) {
                alert( 'Your home page has ' + $(data).find('.prjkt-content .swappable-container').length + ' div elements.');
                }
            });*/
        }
        
        
        $.ajax({
            type : "GET",
            url: php_vars.ajaxurl, //from localize script in wordpress
            dataType: "html",
            data: {
                action: 'single_prjkt_play'
            },
            success:function(data){
                //alert(data);
                //On Success of gets Individual artist play part       
                
                onSuccessAJAXPlay(data);
                
            }
        });
        return false;
    });
    
    /*************Dynamically get preview content ****************/
    //Holds size of slider to iterate through
    var size_of_slider;
    //Left preview variable
    var iframe_preview_left;
    //Right preview variable
    var iframe_preview_right;
    //We iterating by indicator instead of by slider item
    var current_slider_frame_position; 
    var next_preview_index;
    var previous_preview_index;

    $('body').on('click','div.l-control', function(e) {
        e.preventDefault();
        $( document ).ready(function() {
            size_of_slider =  $('.carousel-indicators  li').size();

            current_slider_frame_position = $( '.active' ).index('.carousel-indicators li') - 1; 
            //console.log(current_slider_frame_position);
            iframe_preview_left = $('.l-control .content-preview iframe');
            iframe_preview_right = $('.r-control .content-preview iframe');

            previous_preview_index = current_slider_frame_position-1;
            /*if(previous_preview_index <= 1){
                previous_preview_index = size_of_slider;
            }*/
            next_preview_index = (current_slider_frame_position == size_of_slider-1 ) ? 0 : (current_slider_frame_position+1);

            //Previous Slider
            if (current_slider_frame_position < 0){
                previous_preview_index = size_of_slider-2;
            }
            if (current_slider_frame_position == 0){
                previous_preview_index = size_of_slider-1;
            }

            iframe_preview_left.attr( "src", curr_selected_artsns_content[previous_preview_index][1]);

            iframe_preview_right.attr( "src", curr_selected_artsns_content[next_preview_index][1]);
            /*iframe_preview_left.attr( "src", curr_selected_artsns_content[current_slider_frame_position-1][1]);

            iframe_preview_right.attr( "src", curr_selected_artsns_content[current_slider_frame_position+1][1]);*/
        });

    });
    
    $('body').on('click','div.r-control', function(e) {
        e.preventDefault();
        size_of_slider =  $('.carousel-indicators  li').size();
        
        current_slider_frame_position = $( '.active' ).index('.carousel-indicators li') + 1; 
        
        iframe_preview_left = $('.l-control .content-preview iframe');
        iframe_preview_right = $('.r-control .content-preview iframe');
        
        previous_preview_index = current_slider_frame_position-1;
        //if(previous_preview_index <= 1){
          //  previous_preview_index = size_of_slider;
        //}
        next_preview_index = (current_slider_frame_position == size_of_slider-1 ) ? 0 : (current_slider_frame_position+1);
        //Reset
        if (current_slider_frame_position > size_of_slider -1){
            next_preview_index = 1;
        }
        
        iframe_preview_left.attr( "src", curr_selected_artsns_content[previous_preview_index][1]);
        
        iframe_preview_right.attr( "src", curr_selected_artsns_content[next_preview_index][1]);
    });

    
    /*$(document.body).on( 'click', '.carousel-indicators li', function() {
        //e.preventDefault();
        size_of_slider =  $('.carousel-indicators  li').size();

        current_slider_frame_position = $( '.carousel-indicators li.active' ).index(); 
        console.log(current_slider_frame_position);
    });*/
    
    
    //When the top left back to artsn button is clicked
    $('body').on('click','.back-to-artsn', function(e) {
        e.preventDefault();
        function onSuccessAJAXPlay(passed_data) {
            //main div that contains artsn menu
            var selected_div = $('div.prjkt-play');
            //paragraph that contains intro text
            var selected_p = $('p.prjkt-play');
            
            //Pass in the main data first
            selected_div.hide().html(passed_data).fadeIn('slow');
            
            //div that contains vocalist photo
            var vocalist_div = $('#acf_vocalist-section div.prjkt-content-title');
            //div that contains producer photo
            var producer_div = $('#acf_producer-section  div.prjkt-content-title');
            //div that contains songwriter photo
            var songwriter_div = $('#acf_songwriter-section div.prjkt-content-title');
            
            
            vocalist_div.attr({"style": "background-image : url("+php_vars.vocalist_photo+")" });
            producer_div.attr({"style": "background-image : url("+php_vars.producer_photo+")" });
            songwriter_div.attr({"style": "background-image : url("+php_vars.songwriter_photo+")" });
            
            //Change intro text and swap out the classes
                
          selected_p.text(php_vars.artsn_original_intro);
            selected_div.addClass('artsn-menu').removeClass('prjkt-play');
            selected_p.addClass('artsn-menu').removeClass('prjkt-play');
        }
        
        $.ajax({
            type : "GET",
            url: php_vars.ajaxurl, //from localize script in wordpress
            dataType: "html",
            data: {
                action: 'single_prjkt_artsn'
            },
            success:function(data){
                //alert(data);
                //On Success of gets Individual artist play part       
                
                onSuccessAJAXPlay(data);
                
            }
        });
        return false;
        
        $(this).css("visibility","hidden")
        .animate({
            opacity: 0,
        }, "slow", "swing");
    });
    
    
/*
======================MAILCHIMP FORM=====================
*/
/*$(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';});
var $mcj = jQuery.noConflict(true);*/
    $(function() {
      $('form').ajaxChimp({
        callback: function(response) {
            $('form .result').css('visibility', 'visible');
            if(response.msg[0] == 0){
                $('form .result').addClass('fail').removeClass('success').css('opacity','0').html('Whoopppss. Please enter a valid email!<span class="icon-thumbs-down"></span>').animate({'opacity':'1'},300);
                
            }
            else{
                $('form .result').addClass('success').removeClass('fail').css('opacity','0').html('HOOORAY!! Please Check Your Email!<span class="icon-smile"></span>').animate({'opacity':'1'},300);
            }
            
        }
      });
    })
    
/*
=====================LOADMORE FUNCTION===================
*/
    //Only load this function on our gridblog template
    if( $('body').hasClass('page-template-gridblog-template') ){
        var size_artns_or_prjkts_links = $("a.prjkt-artsn-display").size();

        var max_projects_per_load = 1;
        var increment_decrement_by = 1;
        var load_more_btn = $('a.load-more');
        $('a.prjkt-artsn-display:lt('+max_projects_per_load+')').show();
        
        if (load_more_btn.hasClass('load-more')){
            load_more_btn.click(function (e) {
                e.preventDefault();
                max_projects_per_load = (max_projects_per_load+increment_decrement_by <= size_artns_or_prjkts_links) ? max_projects_per_load+increment_decrement_by : size_artns_or_prjkts_links;

                $('a.prjkt-artsn-display:lt('+max_projects_per_load+')').fadeIn("fast");
                if( (max_projects_per_load == size_artns_or_prjkts_links) && $(this).hasClass('load-more')){
                load_more_btn.text('thats all');
                }
                /*if( (max_projects_per_load == size_artns_or_prjkts_links) && $(this).hasClass('load-more')){
                load_more_btn.removeClass('load-more').addClass('load-less').text('load less');
                console.log(load_more_btn);
            }*/
            });
        }
        /*else{
            load_more_btn.click(function (e) {
                e.preventDefault();
                if (max_projects_per_load > 1){
                max_projects_per_load=(max_projects_per_load-increment_decrement_by<0) ? 3 : max_projects_per_load-increment_decrement_by;

                $('a.prjkt-artsn-display').not(':lt('+max_projects_per_load+')').fadeOut("fast");   }
                else{
                load_more_btn.addClass('load-more').removeClass('load-less').text('load less');
                }
            });
        }*/
    }
    
/*
====================CONTACT FORM===================
*/    
    
});





/* 3rd Party CODE
Mailchimp Ajax Submit
jQuery Plugin
Author: Siddharth Doshi

Use:
===
$('#form_id').ajaxchimp(options);

- Form should have one <input> element with attribute 'type=email'
- Form should have one label element with attribute 'for=email_input_id' (used to display error/success message)
- All options are optional.

Options:
=======
options = {
    language: 'en',
    callback: callbackFunction,
    url: 'http://blahblah.us1.list-manage.com/subscribe/post?u=5afsdhfuhdsiufdba6f8802&id=4djhfdsh99f'
}

Notes:
=====
To get the mailchimp JSONP url (undocumented), change 'post?' to 'post-json?' and add '&c=?' to the end.
For e.g. 'http://blahblah.us1.list-manage.com/subscribe/post-json?u=5afsdhfuhdsiufdba6f8802&id=4djhfdsh99f&c=?',
*/

(function ($) {
    'use strict';
    
    //loader icon
    $(document).ajaxStart(function(){
        $('form .result').css('visibility', 'visible').addClass('success').removeClass('fail');
        $('form .result').css('opacity','0').html('<span class="icon-arrows-ccw"></span> Hold On...').animate({'opacity':'1'},300);;
    });
    
    
    $.ajaxChimp = {
        responses: {
            'We have sent you a confirmation email'                                             : 0,
            'Please enter a value'                                                              : 1,
            'An email address must contain a single @'                                          : 2,
            'The domain portion of the email address is invalid (the portion after the @: )'    : 3,
            'The username portion of the email address is invalid (the portion before the @: )' : 4,
            'This email address looks fake or invalid. Please enter a real email address'       : 5
        },
        translations: {
            'en': null
        },
        init: function (selector, options) {
            $(selector).ajaxChimp(options);
        }
    };

    $.fn.ajaxChimp = function (options) {
        $(this).each(function(i, elem) {
            var form = $(elem);
            var email = form.find('input[type=email]');
            var label = form.find('label[for=' + email.attr('id') + ']');

            var settings = $.extend({
                'url': form.attr('action'),
                'language': 'en'
            }, options);

            var url = settings.url.replace('/post?', '/post-json?').concat('&c=?');

            form.attr('novalidate', 'true');
            email.attr('name', 'EMAIL');

            form.submit(function () {
                var msg;
                function successCallback(resp) {
                    if (resp.result === 'success') {
                        msg = 'We have sent you a confirmation email';
                        label.removeClass('error').addClass('valid');
                        email.removeClass('error').addClass('valid');
                    } else {
                        email.removeClass('valid').addClass('error');
                        label.removeClass('valid').addClass('error');
                        var index = -1;
                        try {
                            var parts = resp.msg.split(' - ', 2);
                            if (parts[1] === undefined) {
                                msg = resp.msg;
                            } else {
                                var i = parseInt(parts[0], 10);
                                if (i.toString() === parts[0]) {
                                    index = parts[0];
                                    msg = parts[1];
                                } else {
                                    index = -1;
                                    msg = resp.msg;
                                }
                            }
                        }
                        catch (e) {
                            index = -1;
                            msg = resp.msg;
                        }
                    }

                    // Translate and display message
                    if (
                        settings.language !== 'en'
                        && $.ajaxChimp.responses[msg] !== undefined
                        && $.ajaxChimp.translations
                        && $.ajaxChimp.translations[settings.language]
                        && $.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]]
                    ) {
                        msg = $.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]];
                    }
                    label.html(msg);

                    label.show(2000);
                    if (settings.callback) {
                        settings.callback(resp);
                    }
                }

                var data = {};
                var dataArray = form.serializeArray();
                $.each(dataArray, function (index, item) {
                    data[item.name] = item.value;
                });

                $.ajax({
                    url: url,
                    data: data,
                    success: successCallback,
                    dataType: 'jsonp',
                    error: function (resp, text) {
                        //console.log('mailchimp ajax submit error: ' + text);
                    }
                });

                // Translate and display submit message
                var submitMsg = 'Submitting...';
                if(
                    settings.language !== 'en'
                    && $.ajaxChimp.translations
                    && $.ajaxChimp.translations[settings.language]
                    && $.ajaxChimp.translations[settings.language]['submit']
                ) {
                    submitMsg = $.ajaxChimp.translations[settings.language]['submit'];
                }
                label.html(submitMsg).show(2000);

                return false;
            });
        });
        return this;
    };
})(jQuery);


