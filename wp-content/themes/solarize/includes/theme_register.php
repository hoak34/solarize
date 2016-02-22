<?php
	global $solarize_config, $post;
	if ( function_exists('register_sidebar')){

		/*
		 * Register sidebar
		*/
		register_sidebar( array(
			'name' => __( 'Top Toolbar - Left', 'commercegurus' ),
			'id' => 'top-bar-left',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3><div class="subtitle">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="clearfix"></div>
						</div>',
		) );

		register_sidebar( array(
			'name' => __( 'Top Toolbar - Right', 'commercegurus' ),
			'id' => 'top-bar-right',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3><div class="subtitle">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="clearfix"></div>
						</div>',
		) );

		register_sidebar( array(
			'name' => __( 'Top Footer Widget', 'commercegurus' ),
			'id' => 'top-footer',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3><div class="subtitle">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="clearfix"></div>
						</div>',
		) );

		register_sidebar(
			array(
				'name' => __( 'Primary Sidebar', 'commercegurus' ),
				'id'            => 'primary',
			    'description' => esc_html__( 'This is land of page sidebar','solarize' ),
				'before_title' =>'<h3 class="widget-title">',
				'after_title' =>'</h3><div class="subtitle">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="clearfix"></div>
						</div>',
				'before_widget' => '<div  id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
			)
		);


	if(isset($solarize_config["solarize-footer-number-widget"])){

		$footer_widget_style=$solarize_config["solarize-footer-number-widget"];
		$register_sidebar_arr = array();
		switch($footer_widget_style)
		{
		   	case '4':
				$register_sidebar_arr[] = array(
					'name' => esc_html__( 'Footer widget 4', 'solarize' ),
					'id'            => 'footer-widget-4',
					'description' => esc_html__( 'This is footer widget location','solarize' ),
					'before_title' =>'<h3 class="widget-title">',
					'after_title' =>'</h3><div class="subtitle">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="clearfix"></div>
						</div>',
					'before_widget' => '<div class="%1$s widget %2$s">',
					'after_widget' => '</div>',
				);
		   	case '3':
				$register_sidebar_arr[] = array(
					'name' => esc_html__( 'Footer widget 3', 'solarize' ),
					'id'            => 'footer-widget-3',
					'description' => esc_html__( 'This is footer widget location','solarize' ),
					'before_title' =>'<h3 class="widget-title">',
					'after_title' =>'</h3><div class="subtitle">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="clearfix"></div>
						</div>',
					'before_widget' => '<div class="%1$s widget %2$s">',
					'after_widget' => '</div>',
				);
		   	case '2':
				$register_sidebar_arr[] = array(
					'name' => esc_html__( 'Footer widget 2', 'solarize' ),
					'id'            => 'footer-widget-2',
					'description' => esc_html__( 'This is footer widget location','solarize' ),
					'before_title' =>'<h3 class="widget-title">',
					'after_title' =>'</h3><div class="subtitle">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="clearfix"></div>
						</div>',
					'before_widget' => '<div class="%1$s widget %2$s">',
					'after_widget' => '</div>',
				);
			case '1':
				$register_sidebar_arr[] = array(
					'name' => esc_html__( 'Footer widget 1', 'solarize' ),
					'id'            => 'footer-widget-1',
					'description' => esc_html__( 'This is footer widget location','solarize' ),
					'before_title' =>'<h3 class="widget-title">',
					'after_title' =>'</h3><div class="subtitle">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="clearfix"></div>
						</div>',
					'before_widget' => '<div class="%1$s widget %2$s">',
					'after_widget' => '</div>',
				);
		}

		$register_sidebar_arr = array_reverse($register_sidebar_arr);
		foreach($register_sidebar_arr as $register_sidebar){
			register_sidebar($register_sidebar);
		}
	}

	if(isset($solarize_config['sidebars'])){
		/*======== Register widgets ========*/
		$dynamic_sidebar = $solarize_config['sidebars'];

		if(!empty($dynamic_sidebar))
		{
			foreach($dynamic_sidebar as $sidebar)
			{
				if ( function_exists('register_sidebar') && ($sidebar <> ''))
				register_sidebar(
				array(
					'name' => $sidebar,
					'id'            => strtolower (str_replace(" ","_",trim($sidebar))),
					'description' => esc_html__( 'This is land of page sidebar','solarize' ),
					'before_title' =>'<h3 class="widget-title">',
					'after_title' =>'</h3>',
					'before_widget' => '<div   id="%1$s" class="sidebar_widget %2$s">',
					'after_widget' => '</div>',
				));
			}
		}
	}

	/**
	   * Check if WooCommerce is active
	   **/
	  if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	  	/*
		 * Register minicart sidebar
		*/
		/*register_sidebar(
			array(
				'name' => esc_html__( 'Mini Cart Sidebar', 'solarize' ),
				'id'            => 'solarize_shoping_cart_sidebar',
			    'description' => esc_html__( 'This is shoping cart sidebar','solarize' ),
				'before_title' =>'',
				'after_title' =>'',
				'before_widget' => '<div  id="%1$s" class="shoping-cart-widget %2$s">',
				'after_widget' => '</div>',
			)
		);

		// Register shop page sidebar
		register_sidebar(
			array(
				'name' => esc_html__( 'Shop Sidebar', 'solarize' ),
				'id'            => 'solarize_shop_sidebar',
			    'description' => esc_html__( 'This is shoping cart sidebar','solarize' ),
				'before_title' =>'',
				'after_title' =>'',
				'before_widget' => '<div  id="%1$s" class="shoping-cart-widget %2$s">',
				'after_widget' => '</div>',
			)
		);*/
	}
	
}


	
	/*
	 * register navigation menus
	*/
	register_nav_menus(
	    array(
			'top_menu' => __('Main Menu', 'solarize')
	    )
	);