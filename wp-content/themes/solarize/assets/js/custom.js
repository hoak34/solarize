jQuery(document).ready(function($) {
    "use strict";

	 //FUNFACT
    $('.solarize-funfact').waypoint(function() {
        var default_settings =  {
            from: 0,
            to: 0,
            speed: 2500,
            refreshInterval: 50,
            formatter: function(value, settings){
                if(settings.add_comma){
                    return value.toFixed(settings.decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
                else{
                    return value.toFixed(settings.decimals);
                }
            },
        };

        var settings = $(this).data('settings');
        settings = $.extend({}, default_settings, settings);
        $(".funfact-number", this).countTo(settings);
    },{
        triggerOnce: true,
        offset: '90%'
    });

	//TWITTER SLIDER
	if ($("#owl-twitter").length > 0) {
        $(".twitter-slide").owlCarousel({
	        autoPlay: 4000,
	        slideSpeed: 1000,
	        navigation: false,
	        pagination: true,
	        singleItem: true
	    });
	}

      // Skill bar
    if ( $('.skillbar').length > 0) {
        $('.skillbar').each(function () {
            $(this).find('.skillbar-bar').animate({
                width: $(this).attr('data-percent')
            }, 6000);
        });
    }

    //circle skill
    if ($('.circlestat').length > 0) {
        $('.circlestat').circliful();
    }

   // Portfolio slider
        /*if ($(".solarize-portfolio-slider").length > 0) {
            $(".solarize-portfolio-slider").owlCarousel({
                autoPlay: 4000,
                slideSpeed: 1000,
                navigation: true,
                pagination: false,
                singleItem: true,
                navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
            });
        }*/

    //Gallery blog
     if ($(".blog-grallery").length > 0) {
    
        $(".blog-grallery").owlCarousel({
            autoPlay: 4000,
            slideSpeed: 3000,
            navigation: true,
            pagination: false,
            singleItem: true,
            navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        });
    }
    //SELECT SHOP
     if(jQuery().chosen) {
        $(".woocommerce-ordering .orderby").chosen();
    }
    //SIDER BAR
    if($(window).width()>991){
        $('.solarize-menu-sidebar li a').hover(function(){
            var _parent  = $(this).parent();
            if ((!_parent.hasClass('current_page_item')) && (!_parent.hasClass('current-menu-parent'))) {
                _parent.addClass('solarize-active-menusiderbar');
                _parent.find('.dropdown-menu').slideDown();
                _parent.mouseleave(function(){
                    $(this).removeClass('solarize-active-menusiderbar');
                    $(this).find('.dropdown-menu').slideUp();
                })
            }
        })
    }

    //Menu header 2
    /*var height1 = $('.solarize-header-1').outerHeight();
    var height2 = $('.top-header').outerHeight();
    var resultH = height1 + height2;
    $(window).scroll(function(){
        var scrollTop = $(document).scrollTop();
        if(scrollTop > resultH){
            $('.main-menu-2').addClass('fixed');
        }else{
            $('.main-menu-2').removeClass('fixed');
        }
    })*/

});

jQuery( function( $ ) {
    
    // Quantity buttons
    $( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );

    // Target quantity inputs on product pages
    $( 'input.qty:not(.product-quantity input.qty)' ).each( function() {
        var min = parseFloat( $( this ).attr( 'min' ) );

        if ( min && min > 0 && parseFloat( $( this ).val() ) < min ) {
            $( this ).val( min );
        }
    });

    $( document ).on( 'click', '.plus, .minus', function() {

        // Get values
        var $qty        = $( this ).closest( '.quantity' ).find( '.qty' ),
            currentVal  = parseFloat( $qty.val() ),
            max         = parseFloat( $qty.attr( 'max' ) ),
            min         = parseFloat( $qty.attr( 'min' ) ),
            step        = $qty.attr( 'step' );

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
        if ( max === '' || max === 'NaN' ) max = '';
        if ( min === '' || min === 'NaN' ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

        // Change the value
        if ( $( this ).is( '.plus' ) ) {

            if ( max && ( max == currentVal || currentVal > max ) ) {
                $qty.val( max );
            } else {
                $qty.val( currentVal + parseFloat( step ) );
            }

        } else {

            if ( min && ( min == currentVal || currentVal < min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( currentVal - parseFloat( step ) );
            }

        }

        // Trigger change event
        $qty.trigger( 'change' );
    });
    
    $('.navbar-collapse .nav .dropdown').hover(function(e){
        $(this).find('.dropdown-menu').stop( true, false ).slideDown(300);
    }, function(e){
        $(this).find('.dropdown-menu').stop( true, false ).slideUp(300);
    });

    //solarize tabs carousel
    if ($(".solarize-tabs").length > 0) {
        $(".solarize-tabs .solarize-tabs-content").owlCarousel({
            autoPlay: false,
            slideSpeed: 1000,
            navigation: false,
            pagination: true,
            singleItem: true
        });
    }

    //Portfolio
    $('.solarize-portfolio').each( function() {
        var self = $(this);

        var $initial_filter = self.data('initial-word');
        var $filters = self.find('.filters');
        var $container = self.find(".portfolio");
        var colWidth = function () {
            var w = $container.width(),
                columnNum = 1,
                columnWidth = 0,
                gwidth = 0;

            // apply custom settings
            if(typeof solarize_portfolio_setting !== 'undefined') {
                if (w > 1440) {
                    columnNum  = solarize_portfolio_setting.grid_very_wide;
                } else if (w > 1365) {
                    columnNum  = solarize_portfolio_setting.grid_wide;
                } else if (w > 1279) {
                    columnNum  = solarize_portfolio_setting.grid_normal;
                } else if (w > 1023) {
                    columnNum  = solarize_portfolio_setting.grid_small;
                } else if (w > 767) {
                    columnNum  = solarize_portfolio_setting.grid_tablet;
                } else if (w > 479) {
                    columnNum  = solarize_portfolio_setting.grid_phone;
                }

                gwidth = solarize_portfolio_setting.grid_gutter_width;
            }
            // apply default settings
            else{
                if (w > 1440) {
                    columnNum  = 7;
                } else if (w > 1365) {
                    columnNum  = 5;
                } else if (w > 1279) {
                    columnNum  = 5;
                } else if (w > 1023) {
                    columnNum  = 5;
                } else if (w > 767) {
                    columnNum  = 3;
                } else if (w > 479) {
                    columnNum  = 2;
                }
                gwidth = 4;
            }

            columnWidth = Math.floor(w/columnNum);

            $container.find('.grid-item').each(function() {
                var $item = $(this);

                $item.css({'padding': gwidth/2});

                if ($item.hasClass('item-wide')) {
                    if (w < 480) {
                        $('.item-wide').css({
                            'width'		 : columnWidth + 'px',
                            'height' : Math.round(columnWidth * 0.690288) + 'px'
                        });
                    }
                    else {
                        $('.item-wide').css({
                            'width'		 : (columnWidth*2) + 'px',
                            'height' : Math.round(2* columnWidth * 0.690288) + 'px'
                        });
                    }
                }

                if ($item.hasClass('item-small')) {
                    $('.item-small').css({
                        'width'		 : (columnWidth) + 'px',
                        'height' : Math.round(columnWidth * 0.690288) + 'px'
                    });
                }

                if ($item.hasClass('item-long')) {
                    if (w < 480) {
                        $('.item-long').css({
                            'width'		 : columnWidth + 'px',
                            'height' : Math.round((columnWidth * 0.690288) / 2) + 'px'
                        });
                    }
                    else {
                        $('.item-long').css({
                            'width'		 : (columnWidth*2) + 'px',
                            'height' : Math.round(columnWidth * 0.690288) + 'px'
                        });
                    }
                }

                if ($item.hasClass('item-high')) {
                    $('.item-high').css({
                        'width'		 : (columnWidth) + 'px',
                        'height' : Math.round(2* columnWidth * 0.690288) + 'px'
                    });
                }

            });
            return columnWidth;
        };

        // Isotope Call
        var gridIsotope = function () {
            $container.isotope({
                layoutMode : 'masonry',
                itemSelector: '.grid-item',
                animationEngine: 'jquery',
                filter: $initial_filter,
                masonry: { columnWidth: colWidth(), gutterWidth: 0 }
            });
        };

        var resizedIsotope = function () {
            $container.isotope({
                layoutMode : 'masonry',
                itemSelector: '.grid-item',
                animationEngine: 'jquery',
                masonry: { columnWidth: colWidth(), gutterWidth: 0 }
            });
        };

        gridIsotope();
        $(window).smartresize(resizedIsotope);
        $(window).load(gridIsotope);

        // Portfolio Filtering

        $filterLinks = $filters.find('a');

        if($initial_filter != '') {
            $filterLinks.each(function(){
                var $this = $(this);
                if ( $this.hasClass('selected') ) {
                    $this.removeClass('selected');
                }
                if($this.attr('data-option-value') == $initial_filter) {
                    $this.addClass('selected');
                }
            });
        }

        $filterLinks.click(function(){
            var $this = $(this);
            // don't proceed if already selected
            if ( $this.hasClass('selected') ) {
                return false;
            }
            var $filters = $this.parents('.filters');
            $filters.find('.selected').removeClass('selected');
            $this.addClass('selected');

            // make option object dynamically, i.e. { filter: '.my-filter-class' }
            var options = {},
                key = $filters.attr('data-option-key'),
                value = $this.attr('data-option-value');
            // parse 'false' as false boolean
            value = value === 'false' ? false : value;
            options[ key ] = value;
            if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
                // changes in layout modes need extra logic
                changeLayoutMode( $this, options )
            } else {
                // otherwise, apply new options
                $container.isotope( options );
            }

            return false;
        });
    });

    // PrettyPhoto
    $("a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed:'normal',
        theme:'light_square',
        slideshow:3000,
        autoplay_slideshow: false,
        deeplinking: false
    });

    //Animation
    $('.animation:not(.animated)').waypoint(function() {
        var animation = $(this).data('animation');
        $(this).addClass('animated').addClass(animation);
    }, {
        triggerOnce: true,
        offset: '95%'
    });

    //Testimonial
    if ($(".solarize-testimonial").length > 0) {
        var default_settings = {
            autoPlay: true,
            slideSpeed: 1000,
            stopOnHover: false,
            navigation: true,
            pagination: true,
            singleItem: true
        };

        $(".solarize-testimonial").each(function(){
            var settings = $(this).data('settings');
            settings = $.extend({}, default_settings, settings);
            $(this).owlCarousel(settings);
        });
    }
    //client list
    if ($(".solarize-client-list").length > 0) {

        var default_settings = {
            autoPlay: true,
            slideSpeed: 1000,
            stopOnHover: false,
            navigation: true,
            pagination: false,
            itemsCustom : [[0, 1], [360, 2], [640, 3], [768, 4], [1024, 5], [1200, 6]]
        };

        $(".solarize-client-list").each(function(){
            var settings = $(this).data('settings');
            settings = $.extend({}, default_settings, settings);
            $(this).owlCarousel(settings);
        });
    }

    //Portfolio slider
    if ($(".portfolio-slider").length > 0) {
        var default_settings = {
            autoPlay: true,
            slideSpeed: 1000,
            stopOnHover: false,
            navigation: false,
            pagination: true,
            singleItem: true
        };

        $(".portfolio-slider").each(function(){
            var settings = $(this).data('settings');
            settings = $.extend({}, default_settings, settings);
            $(this).owlCarousel(settings);
        });
    }

    //Text rotate
    $(".rotate").textrotator();

    //MENU MOBILE style i
    $('.style-i .hamburger').click(function(e){
        e.preventDefault();
        $(this).toggleClass('is-toggled');
        if($('header').hasClass('mobile')){
            $('.main-menu').slideToggle(500, function(){
                $('header').toggleClass('mobile');
            });
        }
        else{
            $('header').toggleClass('mobile');
            $('.main-menu').slideToggle(500);
        }
    });

    //menu style ii
    $('.style-ii .hamburger').click(function(){
        $(this).toggleClass('is-toggled');
        $('.fixed-menu').toggleClass('sticky');
    });

    $('.fixed-menu').each(function(){
        var h = $(this).height();
        var n = h/2;
        $(this).css({
            "margin-top": -n,
        });
    });
    // Header Effect on Scroll

    var alter_logo_url, original_logo_url;
    if(typeof solarize_scroll_logo !== 'undefined'){
        alter_logo_url = solarize_scroll_logo.url;
        var logo_img_element = $('.logo img');
        if(logo_img_element){
            original_logo_url = logo_img_element.attr('src');
        }
    }
    function headerscroll(){
        var scrollTop = $(window).scrollTop();

        if ( scrollTop > 50 )	{
            $("header.sticky").addClass("scrolled-header");
            if(alter_logo_url && original_logo_url){
                logo_img_element.attr('src', alter_logo_url);
            }
        }
        else {
            $("header.sticky").removeClass("scrolled-header");
            if(alter_logo_url && original_logo_url){
               logo_img_element.attr('src', original_logo_url);
            }
        }
    }

    $(window).scroll( function() {
        headerscroll();
    });
    headerscroll();

    // initial hello state
    if($('body').hasClass('home')) {
        $('#menu-main-menu li.initial').addClass('current')
    }

    //Scroll Nav
    var booly = false;
    if (solarize_nav_setting.hashTag == 1) {
        booly = true;
    }
    if ((typeof $.fn.onePageNav == 'function') && (typeof solarize_nav_setting !== 'undefined')) {
        $('#menu-main-menu').onePageNav({
            currentClass: 'current',
            //filter: ':not(.external)',
            changeHash: booly,
            scrollOffset: solarize_nav_setting.scrollOffset
        });
    };


    //header-holder height
    function solarize_header_holder(){
        if($('header').hasClass('scrolled-header')){
            return false;
        }
        $('.header-placeholder').height($('.header-inner').outerHeight() + 'px');
    }
    $(window).resize( function() {
        solarize_header_holder();
    });

    setTimeout(function(){
        solarize_header_holder();
    }, 100);

    // Parallax Fix for Mobile Devices  AND background blog
    setTimeout(function(){
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $('.vc_parallax.vc_parallax-fixed .vc_parallax-inner').css({'background-attachment': 'scroll'});
            $('.solarize-lastest-blog .post-thumbnail').css({'background-attachment': 'scroll', 'background-size' : 'cover'});
        }
    }, 0);

    //contact form
    $('.open-contact-form').click(function(e){
        e.preventDefault();
        $(this).closest('.solarize-contact-from').find('.form-wrapper').slideDown();
        $(this).fadeOut();
    });
    $('.close-contact-form').click(function(e){
        e.preventDefault();
        $(this).closest('.solarize-contact-from').find('.form-wrapper').slideToggle().end().find('.open-contact-form').fadeIn();
    });
});

