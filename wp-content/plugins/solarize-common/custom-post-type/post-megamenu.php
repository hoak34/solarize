<?php
/*-----------------------------------------------------------------------------------*/
/* MEGA MENU
/*-----------------------------------------------------------------------------------*/
function solarize_post_type_megamenu() {

    $labels = array(
        'name' => __( 'Mega Menu', 'solarize' ),
        'singular_name' => __( 'Mega Menu Item', 'solarize' ),
        'add_new' => __( 'Add New', 'solarize' ),
        'add_new_item' => __( 'Add New Menu Item', 'solarize' ),
        'edit_item' => __( 'Edit Menu Item', 'solarize' ),
        'new_item' => __( 'New Menu Item', 'solarize' ),
        'view_item' => __( 'View Menu Item', 'solarize' ),
        'search_items' => __( 'Search Menu Items', 'solarize' ),
        'not_found' => __( 'No Menu Items found', 'solarize' ),
        'not_found_in_trash' => __( 'No Menu Items found in Trash', 'solarize' ),
        'parent_item_colon' => __( 'Parent Menu Item:', 'solarize' ),
        'menu_name' => __( 'Mega Menu', 'solarize' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => __('Mega Menus.', 'solarize'),
        'supports' => array( 'title', 'editor' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 40,
        'show_in_nav_menus' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => false,
        'capability_type' => 'post'
    );

    register_post_type( 'megamenu', $args );
}
add_action( 'init', 'solarize_post_type_megamenu' );

?>