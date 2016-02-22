<?php
/**
 * This file is used to load javascript and stylesheet function
 */

/**
 * Load javascript
 */
if( !function_exists( 'solarize_load_js' ) ) {

	function solarize_load_js()
	{
		global $solarize_config, $post;
		if(!is_admin())
		{

			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui');

			//register script
			wp_register_script( 'html5lightbox', CORONATHEMES_JS . '/html5lightbox/html5lightbox.js', false, '4.8', true );

			$scripts = array(			
			'bootstrap.min',
			//'jquery.appear.min',
			'waypoints',
			'jquery.countTo',
			'jquery.countdown',
			'jquery.fitvids',
			'readmore',
			'subscribre',
			'jquery.validate.min',
			'jquery.owl.carousel',
			//'easyResponsiveTabs',
			//'jquery.circliful.min',
			//'jquery.sticky',
			'jquery.prettyPhoto',
			'jquery.isotope.min',
			'jquery.simple-text-rotator',
			'jquery.nav',
			'scrolltopcontrol',
			'custom',
			);

			foreach($scripts as $script){
				wp_enqueue_script( $script, CORONATHEMES_JS . '/'.$script.'.js', false, CORONATHEMES_THEME_VERSION, true );
			}
			$changeHash = $solarize_config['nav-hashtags'] ? 1 : 0;
			$scrollOffset = $solarize_config['scroll_offset'] ? $solarize_config['scroll_offset'] : 0;
			wp_localize_script( 'custom', 'solarize_nav_setting', array( 'scrollOffset' => $scrollOffset, 'hashTag' => $changeHash) );

			$logo_scroll = $solarize_config['scroll-logo'] ? $solarize_config['scroll-logo']['url'] : '';
			if(is_page_template('templates/home-template.php') && get_post_meta($post->ID, 'solarize_page_scroll_logo_image', true)){
				$logo_scroll = get_post_meta($post->ID, 'solarize_page_scroll_logo_image', true);
			}
			if($logo_scroll){
				wp_localize_script( 'custom', 'solarize_scroll_logo', array( 'url' => $logo_scroll) );
			}


			wp_localize_script( 'custom', 'solarize_portfolio_setting',
				array(
					'grid_column_very_wide' => (int)$solarize_config['grid_column_very_wide'],
					'grid_wide' => (int)$solarize_config['grid_column_wide'],
					'grid_normal' => (int)$solarize_config['grid_column_normal'],
					'grid_small' => (int)$solarize_config['grid_column_small'],
					'grid_tablet' => (int)$solarize_config['grid_column_tablet'],
					'grid_phone' => (int)$solarize_config['grid_column_phone'],
					'grid_gutter_width' => (int)$solarize_config['grid_gutter_width'],
				)
			);
		}

	}
	add_action('wp_enqueue_scripts','solarize_load_js');

}

/**
 * Load stylesheet
 */
if( !function_exists( 'solarize_load_css' ) ) {

	/*
	 * Load css
	*/
	function solarize_load_css()
	{

		global $solarize_config;

		$styles = array(
			'font-awesome.min',
			'themify-icons',
			'jquery.flipcountdown',
			'jquery-ui',
		    'bootstrap.min',
		    'owl.carousel',
		    //'easy-responsive-tabs',
		    //'jquery.circliful',
		    'prettyPhoto',
			'animate'
		);

        if ( is_child_theme() ){
            if ( file_exists( get_stylesheet_directory() . '/assets/css/styles.css' ) ) {
                wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/css/styles.css', $styles );
            }
		}

		foreach($styles as $style){
			wp_enqueue_style( $style, CORONATHEMES_CSS.'/'.$style.'.css');
		}

		wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Droid+Serif:700,400italic,400,700italic', false );

		wp_enqueue_style( 'solarize', get_stylesheet_uri() );

	}
	add_action("wp_enqueue_scripts",'solarize_load_css');

}
/**
 * Load theme custom css ajax
 */
if(!function_exists('solarize_get_custom_css')){

	/*
	 * get css custom
	*/
	function solarize_get_custom_css()
	{
	    global $solarize_config;
		$custom_css = '';
		if ($solarize_config['accent-color'] != ''){
			$custom_css .= '
    				a{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-bt{
    					background: '.$solarize_config['accent-color'].';
    					border-color:'.$solarize_config['accent-color'].';
    				}
    				.solarize-bt:hover, .solarize-bt:focus{
    					color: '.$solarize_config['accent-color'].';
    				}
    				#breadcrumb li, #breadcrumb li a:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-style-button:hover{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.darker-overlay .solarize-social-header li a:hover, .solarize-social-header li a:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.main-menu ul li a:hover, .main-menu ul li a.active, .main-menu ul li.current a{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-service-style-1 .service-icon:after{
    					box-shadow: 0 0 0 4px '.$solarize_config['accent-color'].';
    					-moz-box-shadow: 0 0 0 4px '.$solarize_config['accent-color'].';
    					-webkit-box-shadow: 0 0 0 4px '.$solarize_config['accent-color'].';
    				}
    				.solarize-service-style-1:hover .service-icon{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-service-style-1 .read-more{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-pricing-table-style1 a.cta_pricing:hover,
    				.solarize-pricing-table-style1 a.cta_pricing:focus{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-pricing-table-style1.active{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-pricing-table-style1.active .currency-price-unit{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-pricing-table-style1.active a.cta_pricing:hover,
    				.solarize-pricing-table-style1.active a.cta_pricing:focus{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-testimonial-style1 .client-quote .fa{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-testimonial-style1 .client-website a{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.owl-theme .owl-controls .owl-page.active{
    					border-color: '.$solarize_config['accent-color'].';
    				}
    				.owl-theme .owl-controls .owl-page.active span,
    				.owl-theme .owl-controls.clickable .owl-page:hover span {
    				  background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-service-style-2:hover .icon-service{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-service-style-2:hover h3{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-pricing-table-style2 a.cta_pricing:hover{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-pricing-table-style2.active{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-pricing-table-style2.active a.cta_pricing:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-pricing-table-style3.active, .solarize-pricing-table-style3:hover{
    					border-color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-pricing-table-style3.active .pricing-title h3{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-pricing-table-style3.active .currency-price-unit, .solarize-pricing-table-style3.active .pricing-icon{
    					background-color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-pricing-table-style3:hover .pricing-button a.cta_pricing, .solarize-pricing-table-style3 .pricing-button a.cta_pricing:hover, .solarize-pricing-table-style3.active .pricing-button a.cta_pricing{
    					background-color: '.$solarize_config['accent-color'].';
    					border-color: '.$solarize_config['accent-color'].';
    				}
    				.darker-overlay .solarize-pricing-table-style3:hover{
    					border-color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-testimonial-style2 .client-website a {
    				  color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-testimonial-style2.dark .client-website a:hover{color: '.$solarize_config['accent-color'].';}
    				.solarize-item-post .solarize-main-recent-post a:hover h4{
    					color:'.$solarize_config['accent-color'].';
    				}
    				.solarize-item-post h4 a:hover{
    					color: '.$solarize_config['accent-color'].'
    				}
    				.solarize-item-post .solarize-item-post-footer i{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-item-post .solarize-item-post-footer a:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-control-pane ul li a:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-control-pane ul li i{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-form-subscribe .subcribe-btn{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-social-footer a:hover span{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-menu-footer ul li a:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-service-style3 a:hover h4{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.widget-list-posts i{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.widget-list-posts a:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-list-popular-topics li .red-text{
    					color:'.$solarize_config['accent-color'].';
    				}
    				footer .widget ul li a:before{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-big-caption span, .solarize-big-caption-center span{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-caption-small-center{
    					color: '.$solarize_config['accent-color'].'!important;
    				}
    				.solarize-caption-small .fa{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-caption-small-right .fa{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-button-slide-2{
    					background: '.$solarize_config['accent-color'].'!important;
    					border-color: '.$solarize_config['accent-color'].'!important;
    				}
    				.solarize-button-slide:hover{
    					background: '.$solarize_config['accent-color'].'!important;
    					border-color: '.$solarize_config['accent-color'].'!important;
    				}
    				.solarize-button-slide-2:hover a,
    				.solarize-button-slide-2 a:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-number{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.post-header > i{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.blog-item h3 a:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.blog-meta li a:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.blog-meta li .fa{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-button, input[type="submit"], .more-link, button{
    					background:  '.$solarize_config['accent-color'].';
    				}
    				.blog-item .group-share span {
    					color: '.$solarize_config['accent-color'].';
    				}
    				.blog-item .group-share a:hover, .group-share a:hover {
    					color: '.$solarize_config['accent-color'].';
    				}
    				.post-tag span, .post-tag a:hover {
    					color: '.$solarize_config['accent-color'].';
    				}
    				.pagination > .active > a,
    				.pagination > .active > span,
    				.pagination > .active > a:hover,
    				.pagination > .active > span:hover,
    				.pagination > .active > a:focus,
    				.pagination > .active > span:focus,
    				.pagination > li > a:hover,
    				.pagination > li > a:focus,
    				.page-links a:hover {
    					background-color: '.$solarize_config['accent-color'].';
    				    border-color: '.$solarize_config['accent-color'].';
    				}
    				.page-links > span{
    					background-color: '.$solarize_config['accent-color'].';
    				  	border-color:'.$solarize_config['accent-color'].';
    				}
    				.blog-quote{
    					border-color: '.$solarize_config['accent-color'].';
    				}
    				.blog-link:before{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.owl-theme .owl-controls .owl-buttons div:hover, .owl-theme .owl-controls .owl-buttons div:focus {
    				  background: '.$solarize_config['accent-color'].';
    				 }
    				 blockquote{
    					border-color:'.$solarize_config['accent-color'].';
    				}
    				#searchform button[type="submit"]:hover{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.widget ul li a:before, .widget_recent_comments li.recentcomments:before {
    					color: '.$solarize_config['accent-color'].';
    				}
    				.widget ul li a:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.widget_tag_cloud .tagcloud a:hover{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.comment-item .comment-reply-link:hover{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.team-item-style2 .social-network a:hover{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.team-item .social-network-team  li a:hover{
    					background-color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-list-ul ul li:before{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.countdownstyle1 .solarize-date-countdown.solarize-day-count{
    					background: '.$solarize_config['accent-color'].'
    				}
    				.countdownstyle2 .solarize-date-countdown.solarize-day-count{
    					color: '.$solarize_config['accent-color'].';
    				}
    				#wp-calendar a:hover{
    				    color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-showmore:hover{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.quote-type-style2:before{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.solarize-menu-sidebar > ul > li.menu-item-has-children.current_page_item > a,
    				.solarize-menu-sidebar > ul > li.menu-item-has-children.current_page_item > a:hover,
    				.solarize-menu-sidebar > ul > li.menu-item-has-children.current-menu-parent > a,
    				.solarize-menu-sidebar > ul > li.menu-item-has-children.current-menu-parent > a:hover,
    				.solarize-menu-sidebar > ul > li.current_page_item > a,
    				.solarize-menu-sidebar > ul > li.current_page_item > a:hover{
    					background: '.$solarize_config['accent-color'].';
    				}
    				.solarize-menu-sidebar > ul > li.menu-item-has-children.current_page_item > a:after,
    				.solarize-menu-sidebar > ul > li.menu-item-has-children.current-menu-parent > a:after,
    				.solarize-menu-sidebar > ul > li.current_page_item > a:after{
    					border-left: 6px solid '.$solarize_config['accent-color'].';
    				}
    				.solarize-menu-sidebar li .sub-menu a:hover,
    				.solarize-menu-sidebar li .sub-menu li.current_page_item a{
    					color: '.$solarize_config['accent-color'].';
    				}
    				.widget_mc4wp_widget input[type="submit"]{
    					background: '.$solarize_config['accent-color'].'
    				}
                    span.page-numbers.current {
                      background-color: '.$solarize_config['accent-color'].';
                      border-color: '.$solarize_config['accent-color'].';
                      color: white;
                    }
                    #topcontrol{
                    	background-color: '.$solarize_config['accent-color'].';
                    }
                    .solarize-social-footer li a:hover{
						color: '.$solarize_config['accent-color'].';
                    }
                    .solarize-section-title h3 span, .solarize-section-title.header-title span, .darker-overlay .solarize-section-title.header-title h3 span{
                    	color: '.$solarize_config['accent-color'].';
                    }
                    .solarize-tour .nav > li > a span, .solarize-tour .nav > li.active > a, .solarize-tour .nav > li.active > a{
						color: '.$solarize_config['accent-color'].';
                    }
                    .darker-overlay .solarize-tour .nav > li > a span, .darker-overlay .solarize-tour .nav > li.active > a{
                    	color: '.$solarize_config['accent-color'].';
                    }
                    .solarize-box .box-content a{
                    	color: '.$solarize_config['accent-color'].';
                    }
                    .button.accent{
                    	background-color: '.$solarize_config['accent-color'].';
                    }
                    .button.gray:hover{
                    	background-color: '.$solarize_config['accent-color'].';
                    }
                    .button:hover, .button:focus, .button:active{
                    	background-color: '.$solarize_config['accent-color'].';
                    }
                    .solarize-testimonial .client-name, .solarize-testimonial .client-position{
                    	color: '.$solarize_config['accent-color'].';
                    }
                    .skillbar-bar{
                    	background-color: '.$solarize_config['accent-color'].';
                    }
                    .portfolio ul li a:hover{
                    	background-color: '.$solarize_config['accent-color'].';
                    }
                    .solarize-funfact .funfact-icon{
                    	 color: '.$solarize_config['accent-color'].';
                    }
                    .team-item > span{
                    	 color: '.$solarize_config['accent-color'].';
                    }
                    .darker-overlay .service-icon > i{
                    	color: '.$solarize_config['accent-color'].';
                    }
                    .solarize-lastest-blog article > i{
                    	color: '.$solarize_config['accent-color'].';
                    }
                    .solarize-twitter-slide .icon-twitter{
                    	color: '.$solarize_config['accent-color'].';
                    }
                    .fixed-menu li.current > a > span, .fixed-menu li > a:hover > span{
                    	color: '.$solarize_config['accent-color'].';
                    }
                    .fixed-menu li.current > a > i, .fixed-menu li > a:hover > i{
                    	border-color: '.$solarize_config['accent-color'].';
                    }
    	    	';
		}
		if(isset($solarize_config['css-code'])){
			$custom_css .= $solarize_config['css-code'];
		}

        wp_add_inline_style( 'solarize', $custom_css);
	    
	}
	add_action( 'wp_enqueue_scripts', 'solarize_get_custom_css' );
}

/**
 * Load theme custom css ajax
 */
if(!function_exists('solarize_admin_css')){
	/*
	 * get css custom
	*/
	function solarize_admin_css()
	{
		global $solarize_config;
		$return ='';
		wp_enqueue_style('themify-icons', get_template_directory_uri().'/assets/css/themify-icons.css');
		wp_enqueue_style('nexus-admin', get_template_directory_uri().'/assets/css/admin.css');
	}
	add_action( 'admin_enqueue_scripts', 'solarize_admin_css' );

}