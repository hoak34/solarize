<?php
    /*
     * Register post type testimonial
    */
    function solarize_testimonials_post_type()
    {
        $labels = array(
            'name' 					=> __('Testimonial', 'post type general name', 'solarize'),
            'singular_name' 		=> __('Testimonial', 'post type singular name', 'solarize'),
            'add_new' 				=> __('Add New', 'testmonial', 'solarize'),
            'all_items' 			=> __('All Testimonials', 'solarize'),
            'add_new_item' 			=> __('Add New Testimonial', 'solarize'),
            'edit_item' 			=> __('Edit Testimonial', 'solarize'),
            'new_item' 				=> __('New Testimonial', 'solarize'),
            'view_item' 			=> __('View Testimonial', 'solarize'),
            'search_items' 			=> __('Search Testimonial', 'solarize'),
            'not_found' 			=> __('No Testimonial Found', 'solarize'),
            'not_found_in_trash' 	=> __('No Testimonial Found in Trash', 'solarize'),
            'parent_item_colon' 	=> '',
        );
        
        $args = array(
            'labels' 			=> $labels,
            'public' 			=> true,
            'show_ui' 			=> true,
            'taxonomies'          => array( 'testimonials_cats', ),
            'capability_type' 	=> 'post',
            'hierarchical' 		=> false,
            'rewrite' 			=> array('slug' => 'testimonial-view', 'with_front' => true),
            'query_var' 		=> true,
            'show_in_nav_menus' => false,
            'menu_icon' 		=> 'dashicons-format-quote',
            'supports' 			=> array('title', 'thumbnail', 'excerpt', 'editor', 'author',),
        );
        
        register_post_type( 'testimonial' , $args );  
         $rewrite = array(
            'slug'                       => 'testimonial-category',
            'with_front'                 => true,
            'hierarchical'               => false,
        );         
          register_taxonomy('testimonials_cats',
            array('testimonial'), 
            array(
                'hierarchical' 		=> true,
                'public'            => true,
                'label' 			=> 'Testimonial Categories',
                'show_admin_column'	=>'true',
                'singular_label' 	=> 'Category', 
                'query_var' 		=> true,
                'rewrite'           =>  $rewrite,
            )
        );
    }
    add_action('init', 'solarize_testimonials_post_type');
?>