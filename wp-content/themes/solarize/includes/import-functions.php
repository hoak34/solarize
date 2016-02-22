<?php
/*
 * @package     WBC_Importer - Extension for Importing demo content
 * @author      Webcreations907
 * @version     1.0
 */


/************************************************************************
* Importer will auto load, there is no settings required to put in your
* Reduxframework config file.
*
* BUT- If you want to put the demo importer in a different position on 
* the panel, use the below within your config for Redux.
*************************************************************************/
// $this->sections[] = array(
            //     'id' => 'wbc_importer_section',
            //     'title'  => esc_html__( 'Demo Content', 'solarize' ),
            //     'desc'   => esc_html__( 'Description Goes Here', 'solarize' ),
            //     'icon'   => 'el-icon-website',
            //     'fields' => array(
            //                     array(
            //                         'id'   => 'wbc_demo_importer',
            //                         'type' => 'wbc_importer'
            //                         )
            //                 )
            //     );

/************************************************************************
* Example functions/filters
*************************************************************************/
if ( !function_exists( 'wbc_after_content_import' ) ) {

	/**
	 * Function/action ran after import of content.xml file
	 *
	 * @param (array) $demo_active_import       Example below
	 * [wbc-import-1] => Array
	 *      (
	 *            [directory] => current demo data folder name
	 *            [content_file] => content.xml
	 *            [image] => screen-image.png
	 *            [theme_options] => theme-options.txt
	 *            [widgets] => widgets.json
	 *            [imported] => imported
	 *        )
	 * @param (string) $demo_data_directory_path path to current demo folder being imported.
	 *
	 */

	function wbc_after_content_import( $demo_active_import , $demo_data_directory_path ) {
		//Do something
	}

	// Uncomment the below
	// add_action( 'wbc_importer_after_content_import', 'wbc_after_content_import', 10, 2 );
}

if ( !function_exists( 'wbc_filter_title' ) ) {

	/**
	 * Filter for changing demo title in options panel so it's not folder name.
	 *
	 * @param [string] $title name of demo data folder
	 *
	 * @return [string] return title for demo name.
	 */

	function wbc_filter_title( $title ) {
		return trim( ucfirst( str_replace( "-", " ", $title ) ) );
	}

	// Uncomment the below
	// add_filter( 'wbc_importer_directory_title', 'wbc_filter_title', 10 );
}

if ( !function_exists( 'wbc_importer_description_text' ) ) {

	/**
	 * Filter for changing importer description info in options panel
	 * when not setting in Redux config file.
	 *
	 * @param [string] $title description above demos
	 *
	 * @return [string] return.
	 */

	function wbc_importer_description_text( $description ) {

		$message = '<p>'. esc_html__( 'Best if used on new WordPress install.', 'solarize' ) .'</p>';
		$message .= '<p>'. esc_html__( 'Images are for demo purpose only.', 'solarize' ) .'</p>';

		return $message;
	}

	// Uncomment the below
	// add_filter( 'wbc_importer_description', 'wbc_importer_description_text', 10 );
}

if ( !function_exists( 'wbc_importer_label_text' ) ) {

	/**
	 * Filter for changing importer label/tab for redux section in options panel
	 * when not setting in Redux config file.
	 *
	 * @param [string] $title label above demos
	 *
	 * @return [string] return no html
	 */

	function wbc_importer_label_text( $label_text ) {

		$label_text = 'Bolder Importer';

		return $label_text;
	}

	// Uncomment the below
	add_filter( 'wbc_importer_label', 'wbc_importer_label_text', 10 );
}

if ( !function_exists( 'wbc_change_demo_directory_path' ) ) {

	/**
	 * Change the path to the directory that contains demo data folders.
	 *
	 * @param [string] $demo_directory_path
	 *
	 * @return [string]
	 */

	function wbc_change_demo_directory_path( $demo_directory_path ) {

		$demo_directory_path = trailingslashit( str_replace( '\\', '/', get_template_directory().'/includes/demo-data/'));

		return $demo_directory_path;

	}

	// Uncomment the below
	add_filter('wbc_importer_dir_path', 'wbc_change_demo_directory_path' );
}

if ( !function_exists( 'wbc_importer_before_widget' ) ) {

	/**
	 * Function/action ran before widgets get imported
	 *
	 * @param (array) $demo_active_import       Example below
	 * [wbc-import-1] => Array
	 *      (
	 *            [directory] => current demo data folder name
	 *            [content_file] => content.xml
	 *            [image] => screen-image.png
	 *            [theme_options] => theme-options.txt
	 *            [widgets] => widgets.json
	 *            [imported] => imported
	 *        )
	 * @param (string) $demo_data_directory_path path to current demo folder being imported.
	 *
	 * @return nothing
	 */

	function wbc_importer_before_widget( $demo_active_import , $demo_data_directory_path ) {

		//Do Something

	}

	// Uncomment the below
	// add_action('wbc_importer_before_widget_import', 'wbc_importer_before_widget', 10, 2 );
}

if ( !function_exists( 'wbc_after_theme_options' ) ) {

	/**
	 * Function/action ran after theme options set
	 *
	 * @param (array) $demo_active_import       Example below
	 * [wbc-import-1] => Array
	 *      (
	 *            [directory] => current demo data folder name
	 *            [content_file] => content.xml
	 *            [image] => screen-image.png
	 *            [theme_options] => theme-options.txt
	 *            [widgets] => widgets.json
	 *            [imported] => imported
	 *        )
	 * @param (string) $demo_data_directory_path path to current demo folder being imported.
	 *
	 * @return nothing
	 */

	function wbc_after_theme_options( $demo_active_import , $demo_data_directory_path ) {

		//Do Something
        update_option( 'tdf_consumer_key', '83FGxUqbnH8mvFu50HuWxA' );
        update_option( 'tdf_consumer_secret', '2HXI9MBanKddMe3Lg8FPEtwsbO3imQakIcZIBpt7hv4' );
        update_option( 'tdf_access_token', '101961223-ZxYVkbSCZhVDktPkJXbEwgn3PsdHLvzCc95IaL7D' );
        update_option( 'tdf_access_token_secret', 'mIWqEBMaCqDABJWsF8gbatcbFi2UMkTQJ555uC6iiRvke' );
        update_option( 'tdf_cache_expire', '3600' );
        update_option( 'tdf_user_timeline', 'Envato' );

	}

	// Uncomment the below
    add_action('wbc_importer_after_theme_options_import', 'wbc_after_theme_options', 10, 2 );
}


/************************************************************************
* Extended Example:
* Way to set menu, import revolution slider, and set home page.
*************************************************************************/

if ( !function_exists( 'wbc_extended_example' ) ) {
	function wbc_extended_example( $demo_active_import , $demo_directory_path ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );		
        
        /************************************************************************
		* Import slider(s) for the current demo being imported
		*************************************************************************/
		if ( class_exists( 'RevSlider' ) ) {
			//If it's demo3 or demo5
			//$wbc_sliders_array = array(
//				'demo1' => 'slide3.zip', //Set slider zip name
//                'demo1' => 'slide-business.zip', //Set slider zip name
//                'demo1' => 'slider-home-bolder.zip', //Set slider zip name
//				'demo2' => 'home-business-slide1.zip', //Set slider zip name
//                'demo2' => 'home-business-slide2.zip', //Set slider zip name
//                'demo2' => 'home-business-slide3.zip', //Set slider zip name
//			);
            
            $wbc_sliders_array = array(
				'Demo-Slider-Boxed' => array(
                    'slider-boxed.zip',
                ), //Set slider zip name
                'Demo-Slider-Full' => array(
                    'slider-full-width.zip'
                )
			);
            
			if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
			     //$wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];
                $wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];
                if ( is_array( $wbc_slider_import ) ) {
                    if ( !empty( $wbc_slider_import ) ) {
                        foreach ( $wbc_slider_import as $wbc_slider_import_name ) {
                            if ( file_exists( $demo_directory_path.$wbc_slider_import_name ) ) {
            					$slider = new RevSlider();
            					$slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import_name );
            				}
                        }
                    }
                }
                else{
                    if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
    					$slider = new RevSlider();
    					$slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
    				}    
                }
                
			}
		}
        
        
		/************************************************************************
		* Setting Menus
		*************************************************************************/
		// Set true If always create new menu after each imports

		$wbc_menu_array = array(
			'Demo-1-Full-Dark' => false,
			'Demo-1-Full-Dark-Boxed'=> false,
			'Demo-1-Full-Light'=> false,
			'Demo-1-Full-Light-Boxed'=>false,
			'Demo-2-Full-Dark'=>false,
			'Demo-2-Full-Dark-Boxed'=>false,
			'Demo-2-Full-Light'=>false,
			'Demo-2-Full-Light-Boxed'=>false,
			'Demo-Slider-Boxed'=>false,
			'Demo-Slider-Full'=>false,
		);
		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
			$top_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

			if ( isset( $top_menu->term_id ) ) {
				//remove menuitem is duplicated after import more times.
				if(!$wbc_menu_array[$demo_active_import[$current_key]['directory']]){
					//remove duplicate menu
					$demo_menuItems = get_posts(array(
						'post_type' => 'nav_menu_item',
						'numberposts' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'nav_menu',
								'field' => 'slug',
								'terms' => 'Main Menu', // Where term_id of Term 1 is "1".
								//'include_children' => false
							)
						)
					));

					global $wpdb;
					$demo_menuIds = array();
					foreach ($demo_menuItems as $demo_menuItem) {
						$demo_menuIds[] = $demo_menuItem->ID;
					}
					foreach ($demo_menuItems as $demo_menuItem) {
						$count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_title = '" . esc_sql($demo_menuItem->post_title) . "' AND ID IN(" . implode(',', $demo_menuIds) . ")");
						if ($count > 1) {
							wp_delete_post($demo_menuItem->ID);
						}
					}

					//replace main menu url
					/*$urls = $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_value like '#%' AND meta_key = '_menu_item_url'");
					if($urls){
						foreach($urls as $url){
							$wpdb->update(
								$wpdb->postmeta,
								array(
									'meta_value' => get_home_url().$url->meta_value,	// string
								),
								array( 'meta_id' => $url->meta_id ),
								array(
									'%s'	// value2
								),
								array( '%d' )
							);
						}
					}*/
				}

				//active menu in current page.
				set_theme_mod( 'nav_menu_locations', array(
						'top_menu' => $top_menu->term_id,
					)
				);
			}
		}

		/************************************************************************
		* Set HomePage
		*************************************************************************/

		// array of demos/homepages to check/select from
		$wbc_home_pages = array(
			'Demo-1-Full-Dark' => 'Home Dark',
            'Demo-1-Full-Dark-Boxed' => 'Home Dark Boxed',
            'Demo-1-Full-Light' => 'Home',
            'Demo-1-Full-Light-Boxed' => 'Home Boxed',
            'Demo-2-Full-Dark' => 'Home II Dark',
            'Demo-2-Full-Dark-Boxed' => 'Home II Dark Boxed',
            'Demo-2-Full-Light' => 'Home II',
            'Demo-2-Full-Light-Boxed' => 'Home II Boxed',
            'Demo-Slider-Boxed' => 'Home With Slider',
            'Demo-Slider-Full' => 'Home With Slider Boxed',
		);
		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
			$page 		= get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );			
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );				
				update_option( 'show_on_front', 'page' );
			}
		}
		 /************************************************************************
		* Set BlogPage
		*************************************************************************/

		// array of demos/homepages to check/select from
		$wbc_blog_pages = array(
			'Demo-1-Full-Dark' => 'Blog',
			'Demo-1-Full-Dark-Boxed' => 'Blog',
			'Demo-1-Full-Light' => 'Blog',
			'Demo-1-Full-Light-Boxed' => 'Blog',
			'Demo-2-Full-Dark' => 'Blog',
			'Demo-2-Full-Dark-Boxed' => 'Blog',
			'Demo-2-Full-Light' => 'Blog',
			'Demo-2-Full-Light-Boxed' => 'Blog',
			'Demo-Slider-Boxed' => 'Blog',
			'Demo-Slider-Full' => 'Blog',
		);		
		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_blog_pages ) ) {
			$page 		= get_page_by_title( $wbc_blog_pages[$demo_active_import[$current_key]['directory']] );			
			if ( isset( $page->ID ) ) {
				update_option( 'page_for_posts', $page->ID );				
				update_option( 'show_on_front', 'page' );
			}
		}

	}


	// Uncomment the below
	add_action( 'wbc_importer_after_content_import', 'wbc_extended_example', 10, 2 );
}

?>