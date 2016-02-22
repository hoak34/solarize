<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category ARIVA
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'solarize_';
	global $solarize_config;
	$solarize_config['sidebars'];
	$sidebars =  array( 'primary'=>'Primary Sidebar');

	if (is_array($solarize_config['sidebars'])) {
		foreach($solarize_config['sidebars'] as $sidebar){
			$sidebar_id = strtolower (str_replace(" ","_",trim($sidebar)));
			$sidebars[$sidebar_id] = $sidebar;
		}
	}
	/**
	 * Meta boxes
	 */
	$meta_boxes['portfolio_metabox'] = array(
		'id'         => 'solarize_portfolio_metabox',
		'title'      => __( 'Portfolio Metas', 'solarize' ),
		'pages'      => array( 'portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Portfolio Type', 'solarize' ),
				'id'      => $prefix . 'portfolio_type',
				'type'    => 'select',
				'options' => array(
					'image' => __( 'Image', 'solarize' ),
					'slider'   => __( 'Slider', 'solarize' ),
					'video'     => __( 'Video', 'solarize' ),
					'soundcloud'=> __('Soundcloud', 'solarize')
				),
			),
			array(
				'name' => __( 'Portfolio Image', 'solarize' ),
				'desc' => __( 'Upload an image or enter a URL.', 'solarize' ),
				'id'   => $prefix . 'portfolio_image',
				'type' => 'file',
			),
			array(
				'name'         => __( 'Portfolio slider', 'solarize' ),
				'desc'         => __( 'Upload or add multiple images/attachments.', 'solarize' ),
				'id'           => $prefix . 'portfolio_slider',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
			array(
				'name' => __( 'Portfolio Video', 'solarize' ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'solarize' ),
				'id'   => $prefix . 'portfolio_video',
				'type' => 'oembed',
			),
			array(
				'name' => __( 'Portfolio Soundcloud', 'solarize' ),
				'desc' => __( 'Enter a soundcloud URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'solarize' ),
				'id'   => $prefix . 'portfolio_soundcloud',
				'type' => 'oembed',
			),
			array(
				'name' => 'Client Name',
				'std' => '',
				'id' => $prefix . 'title_meta',
				'type' => 'text',
			),
			array(
				'name' => __( 'Client\'s website URL', 'solarize' ),
				'id'   => $prefix . 'portfolio_url',
				'type' => 'text_url',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
				// 'repeatable' => true,
			),
		),
	);

	$meta_boxes['portfolio_thumb_metabox'] = array(
		'id'         => 'solarize_portfolio_thumb_metabox',
		'title'      => __( 'Thumbnail option', 'solarize' ),
		'pages'      => array( 'portfolio' ), // Post type
		'context'    => 'side',
		'priority'   => 'low',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __('Thumbnail Size', 'solarize'),
				'desc'    => __('Working with the Portfolio Grid layout option', 'solarize'),
				'id'      => $prefix . 'portfolio_thumbnail_size',
				'type'    => 'select',
				'options' => array(
					'portfolio-small'=>  __( 'Small Thumbnail', 'solarize'),
					'portfolio-big'=> __( 'Big Thumbnail', 'solarize'),
					'half-horizontal'=> __( 'Half Horizontal', 'solarize'),
					'half-vertical' =>  __( 'Half Vertical', 'solarize')
				),
				'default' => 'portfolio-small',
			),
		)
	);

	/**
	 * Service meta boxes
	 */
	$meta_boxes['service_metabox'] = array(

		'title' => 'Services metas',
		'pages' => array('service'),
		'context'    => 'normal',
		'id'         => 'solarize_service_metabox',
		'priority'   => 'low',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Estimation URL',
				'desc'    => __( 'Enter Estimation URL', 'solarize' ),
				'id' => $prefix . 'service_estimation_url',
				'type' => 'text',
			),
			array(
				'name' => 'Brochure File',
				'desc'    => __( 'Select Brochure File', 'solarize' ),
				'id' => $prefix . 'service_brochure_file',
				'type' => 'file',
			),
			array(
				'name' => 'Packages File',
				'desc'    => __( 'Select Packages File', 'solarize' ),
				'id' => $prefix . 'service_packages_file',
				'type' => 'file',
			),
		)
	);
	/**
	 * Feature meta boxes
	 */
	$meta_boxes['feature_metabox'] = array(

		'title' => 'Feature metas',
		'pages' => array('feature'),
		'context'    => 'normal',
		'id'         => 'solarize_feature_metabox',
		'priority'   => 'low',
		'show_names' => true, // Show field names on the left
		'fields' => array(

			array(
				'name'    => __( 'Feature Type', 'solarize' ),
				'id'      => $prefix . 'feature_type',
				'type'    => 'select',
				'options' => array(
					'image' => __( 'Image', 'solarize' ),
					'slider'   => __( 'Slider', 'solarize' ),
					'video'     => __( 'Video', 'solarize' ),
					'soundcloud'=> __('Soundcloud', 'solarize')
				),
			),
			array(
				'name' => __( 'Feature Image', 'solarize' ),
				'desc' => __( 'Upload an image or enter a URL.', 'solarize' ),
				'id'   => $prefix . 'feature_image',
				'type' => 'file',
			),
			array(
				'name'         => __( 'Feature slider', 'solarize' ),
				'desc'         => __( 'Upload or add multiple images/attachments.', 'solarize' ),
				'id'           => $prefix . 'feature_slider',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
			array(
				'name' => __( 'Feature Video', 'solarize' ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'solarize' ),
				'id'   => $prefix . 'feature_video',
				'type' => 'oembed',
			),
			array(
				'name' => __( 'Feature Soundcloud', 'solarize' ),
				'desc' => __( 'Enter a soundcloud URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'solarize' ),
				'id'   => $prefix . 'feature_soundcloud',
				'type' => 'oembed',
			),
		)
	);

	/**
	 * Meta boxes
	 */
	$meta_boxes['solarize_testimonials_metabox'] = array(
		'id'         => 'solarize_testimonials_metabox',
		'title'      => __( 'Testimonial Options', 'solarize' ),
		'pages'      => array( 'testimonial' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Client name',
				'std' => '',
				'id' => $prefix . 'testimonials_name',
				'type' => 'text',
			),
			array(
				'name' => 'Client position',
				'std' => '',
				'id' => $prefix . 'testimonials_position',
				'type' => 'text',
			),
			array(
				'name' => 'Client website',
				'std' => '',
				'id' => $prefix . 'testimonials_website',
				'type' => 'text',
			),

		),
	);

	/**
	 * Meta boxes
	 */
	$meta_boxes['post_metabox'] = array(

		'title' => 'Post metas',
		'pages' => array('post'),
		'context'    => 'normal',
		'id'         => 'solarize_post_metas',
		'priority'   => 'low',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Image gallery',
				'desc' => '',
				'id' => $prefix .'image_gallery',
				'type' => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
			array(
				'name' => 'Post image',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'post_image',
				'type' => 'file',
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __( 'Video oEmbed', 'solarize' ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'solarize' ),
				'id'   => $prefix . 'post_video_embed',
				'type' => 'oembed',
			),
			array(
				'name' => __( 'Audio oEmbed', 'solarize' ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'solarize' ),
				'id'   => $prefix . 'post_audio_embed',
				'type' => 'oembed',
			),
			array(
				'name' => 'Quote content',
				'default' => '',
				'id' => $prefix . 'quote_content',
				'desc' => __( '(Please insert max 140 character.)', 'solarize' ),
				'type' => 'text',
			),
			array(
				'name' => 'Quote author',
				'default' => '',
				'id' => $prefix . 'quote_author',
				'desc' => __( '(Please insert max 140 character.)', 'solarize' ),
				'type' => 'text',
			),
			array(
				'name' => 'Link description',
				'default' => '',
				'id' => $prefix . 'link_description',
				'desc' => __( '(Please insert max 140 character.)', 'solarize' ),
				'type' => 'text',
			),
			array(
				'name' => 'Link url',
				'desc' => __( 'Enter an URL.', 'solarize' ),
				'id' => $prefix . 'link_url',
				'type' => 'text_url',
			),
			array(
				'name' => __( 'Header background image', 'solarize' ),
				'desc' => __( 'Upload an image or enter a URL.', 'solarize' ),
				'id'   => $prefix . 'header_background_image',
				'type' => 'file',
			)
		)

	);

	/**
	 * Metabox to be displayed on a single page ID
	 */

	$meta_boxes['page_metas'] = array(
		'id'         => 'page_metas',
		'title'      => __( 'Page Metabox', 'solarize' ),
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			/*array(
				'name' => 'Show breadcrumbs',
				'desc' => 'Show breadcrumbs for this page',
				'id' => $prefix . 'show_breadcrumbs',
				'type'    => 'select',
				'options' => array(
					'on' => __( 'Show breadcrumbs', 'solarize' ),
					'off'   => __( 'Hide breadcrumbs', 'solarize' ),
				),
				'default' => 'on',
			),*/
			array(
				'name'    => 'Select Page Sidebar',
				'desc'    => 'Select a sidebar',
				'id'      => $prefix . 'page_sidebar',
				'type'    => 'select',
				'options' => $sidebars,
				'default' => '',
			),
			array(
				'name'    => 'Header text color scheme',
				'desc'    => 'Select text color scheme for header',
				'id'      => $prefix . 'page_header_color_scheme',
				'type'    => 'select',
				'options' => array(
					'darkest-overlay'=>  __( 'Lightest Text', 'solarize'),
					'darker-overlay'=>  __( 'Light Text', 'solarize'),
					'lighter-overlay'=> __( 'Darker Text', 'solarize'),
				),
				'default' => 'lighter-overlay',
			),
			array(
				'name'    => 'Footer text color scheme',
				'desc'    => 'Select text color scheme for footer',
				'id'      => $prefix . 'page_footer_color_scheme',
				'type'    => 'select',
				'options' => array(
					'darker-overlay'=>  __( 'Light Text', 'solarize'),
					'lighter-overlay'=> __( 'Darker Text', 'solarize'),
				),
				'default' => 'lighter-overlay',
			),
			array(
				'name' => __( 'Logo Image', 'solarize' ),
				'desc' => __( 'Upload an image or enter a URL.', 'solarize' ),
				'id'   => $prefix . 'page_logo_image',
				'type' => 'file',
			),
			array(
				'name' => __( 'Logo Image on scroll', 'solarize' ),
				'desc' => __( 'Upload an image or enter a URL.', 'solarize' ),
				'id'   => $prefix . 'page_scroll_logo_image',
				'type' => 'file',
			),
			array(
				'name' => __( 'Header background image', 'solarize' ),
				'desc' => __( 'Upload an image or enter a URL.', 'solarize' ),
				'id'   => $prefix . 'header_background_image',
				'type' => 'file',
			)
		)
	);


	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb_metabox_form` helper function. See wiki for more info.
	 */
	$meta_boxes['options_page'] = array(
		'id'      => 'options_page',
		'title'   => __( 'Theme Options Metabox', 'cmb' ),
		'show_on' => array( 'key' => 'options-page', 'value' => array( $prefix . 'theme_options', ), ),
		'fields'  => array(
			array(
				'name'    => __( 'Site Background Color', 'cmb' ),
				'id'      => $prefix . 'bg_color',
				'type'    => 'colorpicker',
				'default' => '#ffffff'
			),
		)
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once dirname(__FILE__) . '/init.php';

}

if( !function_exists( 'solarize_metabox_js' ) ) {
	/*
     * Load metabox js,css
    */
	function solarize_metabox_js()
	{
		if(is_admin())
		{
			wp_register_script('custommetabox', plugins_url( '/js/solarize-metas.js',__FILE__  ) , false, BOLDER_COMMON_VERSION, true);
			wp_enqueue_script('custommetabox');
		}
	}
	add_action('admin_enqueue_scripts','solarize_metabox_js');
}