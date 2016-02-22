<?php
    /*
     * Register post type portfolio
    */
    function solarize_post_type_portfolio()
    {

        $labels = array(
            'name' 					=> __('Portfolio', 'post type general name', 'solarize'),
            'singular_name' 		=> __('Portfolio', 'post type singular name', 'solarize'),
            'add_new' 				=> __('Add New', 'portfolio', 'solarize'),
            'all_items' 			=> __('All Portfolios', 'solarize'),
            'add_new_item' 			=> __('Add New Portfolio', 'solarize'),
            'edit_item' 			=> __('Edit Portfolio', 'solarize'),
            'new_item' 				=> __('New Portfolio', 'solarize'),
            'view_item' 			=> __('View Portfolio', 'solarize'),
            'search_items' 			=> __('Search Portfolio', 'solarize'),
            'not_found' 			=> __('No Portfolio Found', 'solarize'),
            'not_found_in_trash' 	=> __('No Portfolio Found in Trash', 'solarize'),
            'parent_item_colon' 	=> '',
        );

        $args = array(
            'labels' 			=> $labels,
            'public' 			=> true,
            'show_ui' 			=> true,
            'capability_type' 	=> 'post',
            'taxonomies'        => array( 'portfolio_cats', ),
            'hierarchical' 		=> false,
            'rewrite' 			=> array('slug' => 'portfolio-view', 'with_front' => true),
            'query_var' 		=> true,
            'show_in_nav_menus' => true,
            'menu_icon' 		=> 'dashicons-list-view',
            'supports' 			=> array('title', 'thumbnail', 'excerpt', 'editor', 'author',),
        );

        register_post_type( 'portfolio' , $args );  
        register_taxonomy('portfolio_cats',
            array('portfolio'), 
            array(
                'hierarchical' 		=> true,
                'public'            => true,
                'label' 			=> 'Portfolio Categories',
                'show_admin_column'	=>'true',
                'singular_label' 	=> 'Category', 
                'query_var' 		=> true,
                'rewrite'           => array(
                    'slug'                       => 'portfolio-category',
                    'with_front'                 => true,
                    'hierarchical'               => false,
                ),
            )
        );
    }
    add_action('init', 'solarize_post_type_portfolio');
?>