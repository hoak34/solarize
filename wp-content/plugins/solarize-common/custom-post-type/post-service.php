<?php 

	if ( !function_exists('solarize_service_post_type') ) {

		/*======== Register post type ========*/
		function solarize_service_post_type()
		{
		    $labels = array(
		        'name' => __('Service', 'post type general name', 'solarize'),
		        'singular_name' => __('Service', 'post type singular name', 'solarize'),
		        'add_new' => __('Add New', 'service', 'solarize'),
		        'all_items' => __('All Services', 'solarize'),
		        'add_new_item' => __('Add New Service', 'solarize'),
		        'edit_item' => __('Edit Service', 'solarize'),
		        'new_item' => __('New Service', 'solarize'),
		        'view_item' => __('View Service', 'solarize'),
		        'search_items' => __('Search Service', 'solarize'),
		        'not_found' =>  __('No Service Found', 'solarize'),
		        'not_found_in_trash' => __('No Service Found in Trash', 'solarize'),
		        'parent_item_colon' => ''
		    );

		    $args = array(
		        'labels' => $labels,
		        'public' => true,
		        'show_ui' => true,
		        'capability_type' => 'post',
		        'hierarchical' => false,
		        'rewrite' => array('slug' => 'service-view', 'with_front' => true),
		        'query_var' => true,
		        'show_in_nav_menus'=> false,
		        'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
            	'menu_icon' 		=> 'dashicons-star-filled',
		    );
		    add_theme_support( 'post-thumbnails' );
		    register_post_type( 'service' , $args );
		}
		add_action('init', 'solarize_service_post_type');

	}

?>