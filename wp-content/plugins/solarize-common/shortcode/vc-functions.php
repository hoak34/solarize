<?php
add_action( 'init', 'solarize_register_vc_shortcodes' , 10000);
function solarize_register_vc_shortcodes() {

	if (class_exists('Vc_Manager')) {
		//****************************************************** Variable ******************************************************//
		/*$add_css_animation = array(
			"type" => "dropdown",
			"heading" => __("CSS Animation", 'solarize'),
			"param_name" => "css_animation",
			"admin_label" => false,
			"value" => array(__("No", 'solarize') => '', __("Top to bottom", 'solarize') => "top-to-bottom", __("Bottom to top", 'solarize') => "bottom-to-top", __("Left to right", 'solarize') => "left-to-right", __("Right to left", 'solarize') => "right-to-left", __("Appear from center", 'solarize') => "appear"),
			"description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", 'solarize')
		);*/

		/*$add_css_awesome = array(
			'type' => 'textfield',
			'heading' => __( 'font awesome icon class', 'solarize' ),
			'param_name' => 'css_awesome',
			'admin_label' => true,
			'value' => '',
			'description' => __( 'Enter font icon awesome .eg: fa-facebook... . <a target="__blank" href="http://fortawesome.github.io/Font-Awesome/icons/">click here.</a>', 'solarize' ),
		);*/

		/*$add_yes_no = array(
			'type' => 'checkbox',
			'heading' => __( 'Choose Animation', 'solarize' ),
			'param_name' => 'onclick',
			'description' => __( 'Define action for choose event if needed.', 'solarize' )
		);

		$add_css_animation = array(
			'type' => 'dropdown',
			'heading' => __( 'CSS Animation', 'solarize' ),
			'param_name' => 'css_animation',
			'admin_label' => true,
			'value' => array(
				__( 'bounce', 'solarize' ) => 'bounce',
				__( 'rubberBand', 'solarize' ) => 'rubberBand',
				__( 'flash', 'solarize' ) => 'flash',
				__( 'pulse', 'solarize' ) => 'pulse',
				__( 'shake', 'solarize' ) => 'shake',
				__( 'swing', 'solarize' ) => 'swing',
				__( 'tada', 'solarize' ) => 'tada',
				__( 'wobble', 'solarize' ) => 'wobble',

				__( 'bounceIn', 'solarize' ) => 'bounceIn',
				__( 'bounceInDown', 'solarize' ) => 'bounceInDown',
				__( 'bounceInLeft', 'solarize' ) => 'bounceInLeft',
				__( 'bounceInRight', 'solarize' ) => 'bounceInRight',
				__( 'bounceInUp', 'solarize' ) => 'bounceInUp',
				__( 'bounceOut', 'solarize' ) => 'bounceOut',
				__( 'bounceOutDown', 'solarize' ) => 'bounceOutDown',
				__( 'bounceOutLeft', 'solarize' ) => 'bounceOutLeft',
				__( 'bounceOutRight', 'solarize' ) => 'bounceOutRight',
				__( 'bounceOutUp', 'solarize' ) => 'bounceOutUp',
				__( 'fadeIn', 'solarize' ) => 'fadeIn',
				__( 'fadeInDown', 'solarize' ) => 'fadeInDown',
				__( 'fadeInDownBig', 'solarize' ) => 'fadeInDownBig',
				__( 'fadeInLeft', 'solarize' ) => 'fadeInLeft',
				__( 'fadeInLeftBig', 'solarize' ) => 'fadeInLeftBig',
				__( 'fadeInRight', 'solarize' ) => 'fadeInRight',
				__( 'fadeInRightBig', 'solarize' ) => 'fadeInRightBig',
				__( 'fadeInUp', 'solarize' ) => 'fadeInUp',
				__( 'fadeInUpBig', 'solarize' ) => 'fadeInUpBig',
				__( 'fadeOut', 'solarize' ) => 'fadeOut',
				__( 'fadeOutDown', 'solarize' ) => 'fadeOutDown',
				__( 'fadeOutDownBig', 'solarize' ) => 'fadeOutDownBig',
				__( 'fadeOutLeft', 'solarize' ) => 'fadeOutLeft',
				__( 'fadeOutLeftBig', 'solarize' ) => 'fadeOutLeftBig',
				__( 'fadeOutRight', 'solarize' ) => 'fadeOutRight',
				__( 'fadeOutRightBig', 'solarize' ) => 'fadeOutRightBig',
				__( 'fadeOutUp', 'solarize' ) => 'fadeOutUp',
				__( 'fadeOutUpBig', 'solarize' ) => 'fadeOutUpBig',
				__( 'flip', 'solarize' ) => 'flip',
				__( 'flipInX', 'solarize' ) => 'flipInX',
				__( 'flipInY', 'solarize' ) => 'flipInY',
				__( 'flipOutX', 'solarize' ) => 'flipOutX',
				__( 'flipOutY', 'solarize' ) => 'flipOutY',
				__( 'lightSpeedIn', 'solarize' ) => 'lightSpeedIn',
				__( 'lightSpeedOut', 'solarize' ) => 'lightSpeedOut',
				__( 'rotateIn', 'solarize' ) => 'rotateIn',
				__( 'rotateInDownLeft', 'solarize' ) => 'rotateInDownLeft',
				__( 'rotateInDownRight', 'solarize' ) => 'rotateInDownRight',
				__( 'rotateInUpLeft', 'solarize' ) => 'rotateInUpLeft',
				__( 'rotateInUpRight', 'solarize' ) => 'rotateInUpRight',
				__( 'rotateOut', 'solarize' ) => 'rotateOut',
				__( 'rotateOutDownLeft', 'solarize' ) => 'rotateOutDownLeft',
				__( 'rotateOutDownRight', 'solarize' ) => 'rotateOutDownRight',
				__( 'rotateOutUpLeft', 'solarize' ) => 'rotateOutUpLeft',
				__( 'rotateOutUpRight', 'solarize' ) => 'rotateOutUpRight',
				__( 'hinge', 'solarize' ) => 'hinge',
				__( 'rollIn', 'solarize' ) => 'rollIn',
				__( 'rollOut', 'solarize' ) => 'rollOut',

				__( 'zoomIn', 'solarize' ) => 'zoomIn',
				__( 'zoomInDown', 'solarize' ) => 'zoomInDown',
				__( 'zoomInLeft', 'solarize' ) => 'zoomInLeft',
				__( 'zoomInRight', 'solarize' ) => 'zoomInRight',
				__( 'zoomInUp', 'solarize' ) => 'zoomInUp',
				__( 'zoomOut', 'solarize' ) => 'zoomOut',
				__( 'zoomOutDown', 'solarize' ) => 'zoomOutDown',
				__( 'zoomOutLeft', 'solarize' ) => 'zoomOutLeft',
				__( 'zoomOutRight', 'solarize' ) => 'zoomOutRight',
				__( 'zoomOutUp', 'solarize' ) => 'zoomOutUp',
				__( 'Appear from center', 'solarize' ) => "appear"
			),
			'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'solarize' ),
			'dependency' => array(
				'element' => 'onclick',
				'value' => "true"
			)
		);

		$data_wow_delay = array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Data Wow Delay",'solarize'),
			"param_name" => "data_wow_delay",
			"value" => "",
			"description" => __("Data Wow Delay eg:0.2s,0.3s ...",'solarize'),
			'dependency' => array(
				'element' => 'onclick',
				'value' => "true"
			)
		);
		$data_wow_duration = array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Data Wow Duration",'solarize'),
			"param_name" => "data_wow_duration",
			"value" => "",
			"description" => __("Data Wow Duration eg:0.2s,0.3s ...",'solarize'),
			'dependency' => array(
				'element' => 'onclick',
				'value' => "true"
			)
		);

		vc_add_param('vc_column', $add_yes_no);
		vc_add_param('vc_column', $add_css_animation);
		vc_add_param('vc_column', $data_wow_delay);
		vc_add_param('vc_column', $data_wow_duration);
		vc_add_param('vc_column_inner', $add_yes_no);
		vc_add_param('vc_column_inner', $add_css_animation);
		vc_add_param('vc_column_inner', $data_wow_delay);
		vc_add_param('vc_column_inner', $data_wow_duration);
		*/

		$add_css_style = array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'solarize' ),
			'param_name' => 'css',
			'group' => __( 'Design options', 'solarize' )
		);
//******************************************************************************************************/
// Custom VC Row  
//******************************************************************************************************/	
		$setting = array(
			'type' => 'colorpicker',
			'holder' => 'div',
			'class' => '',
			'heading' => __( 'Background overlay', 'solarize' ),
			'param_name' => 'color_overlay',
			'value' =>'',
			'description' => ""
		);
		vc_add_param( 'vc_row', $setting );
		$setting = array(
			"type" => "dropdown",
			"heading" => __('Text Color Scheme', 'solarize'),
			"param_name" => "text_scheme",
			"description" => __("Pick a color scheme for the content text. 'Light Text' looks good on dark bg images while 'Dark Text' looks good on light images.", 'solarize'),
			"value" => array(
				__("Dark Text", 'solarize') => 'lighter-overlay',
				__("Light Text", 'solarize') => 'darker-overlay'
			)
		);
		vc_add_param( 'vc_row', $setting );

		//vc_remove_param( "vc_row", "parallax" );
		$setting = array(
			'type' => 'dropdown',
			'heading' => __( 'Parallax', 'js_composer' ),
			'param_name' => 'parallax',
			'value' => array(
				__( 'None', 'js_composer' ) => '',
				__( 'Simple', 'js_composer' ) => 'content-moving',
				__( 'With fade', 'js_composer' ) => 'content-moving-fade',
				__( 'Fixed', 'js_composer' ) => 'fixed',
			),
			'description' => __( 'Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'js_composer' ),
			'dependency' => array(
				'element' => 'video_bg',
				'is_empty' => true,
			),
		);

		vc_add_param( 'vc_row', $setting );
		$setting = array(
			'type' => 'column_offset',
			'heading' => __('Responsiveness', 'js_composer'),
			'param_name' => 'offset',
			'group' => __( 'Width & Responsiveness', 'js_composer' ),
			'description' => __('Adjust column for different screen sizes. Control width, offset and visibility settings.', 'js_composer')
		);
		vc_add_param( 'vc_column_inner', $setting );


//******************************************************************************************************/
// Blockquote
//******************************************************************************************************/
		vc_map( array(
			"name" => __("Block Quote", 'solarize'),
			"description" => "Display style blockquote",
			"base" => "solarize_blockquote",
			"class" => "",
			"category" => __("For solarize theme", 'solarize'),
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Choose style quote', 'solarize' ),
					'param_name' => 'style',
					'value' => array(
						__( 'Style 1', 'solarize' ) => 'style1',
						__( 'Style 2', 'solarize' ) => 'style2',
					),
					'description' => __( 'Choose style for Blockquote.', 'solarize' )
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Author name",'solarize'),
					"param_name" => "name_author",
					"value" => "Robert Smith",
					"description" => __("Add author name for quote.",'solarize')
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"heading" => __("Content",'solarize'),
					"param_name" => "content",
					"value" =>'Synergistically supply global testing procedures through ethical scenarios develop empowered sticky leadership.',
					"description" => __("content",'solarize')
				),
			)
		) );
//******************************************************************************************************/
// Button
//******************************************************************************************************/
	vc_map( array(
		"name" => __("Simple Button",'solarize'),
		"base" => "solarize_simple_button",
		"category" => __('For solarize theme','solarize'),
		"params" => array(
			array(
				"type" => "textfield",
				"admin_label" => true,
				"heading" => __("Text",'solarize'),
				"param_name" => "content",
				"value" => __("Bolder theme",'solarize'),
				"description" => __("Enter button text",'solarize')
			),
			array(
				"type" => "textfield",
				"admin_label" => true,
				"heading" => __("Link",'solarize'),
				"param_name" => "link",
				"value" => '#',
				"description" => __("Enter button link",'solarize')
			),
			array(
				"type" => "dropdown",
				"admin_label" => true,
				"heading" => __("Color",'solarize'),
				"param_name" => "color",
				"value" => array(
					__('Accent color', 'solarize') => 'accent',
					__('Red', 'solarize') => 'red',
					__('Dark', 'solarize') => 'dark',
					__('Gray', 'solarize') => 'gray',
				),
				"description" => __("Select button color",'solarize')
			),
			array(
				"type" => "dropdown",
				"admin_label" => true,
				"heading" => __("Size",'solarize'),
				"param_name" => "size",
				"value" => array(
					__('Normal', 'solarize') => 'normal',
					__('Large', 'solarize') => 'large',
				),
				"description" => __("Select button size",'solarize')
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",'solarize'),
				"param_name" => "el_class",
				"value" => "",
				"description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.",'solarize')
			),
			$add_css_style,
		)
	));

//******************************************************************************************************/
// Style button
//******************************************************************************************************/
		$add_style_border = array(
			'type' => 'dropdown',
			'heading' => __( 'Choose style border', 'solarize' ),
			'param_name' => 'style_border_button',
			'value' =>array(
				__( 'solid','solarize')=>'solid',
				__( 'dotted','solarize')=>'dotted',
				__( 'dashed','solarize')=>'dashed',
				__( 'none','solarize')=>'none',
				__( 'hidden','solarize')=>'hidden',
				__( 'double','solarize')=>'double',
				__( 'groove','solarize')=>'groove',
				__( 'ridge','solarize')=>'ridge',
				__( 'inset','solarize')=>'inset',
				__( 'outset','solarize')=>'outset',
				__( 'initial','solarize')=>'initial',
				__( 'inherit','solarize')=>'inherit'
			),
			'dependency' => array(
				'element' => 'border_button',
				'value' => array( 'yes' )
			),
			'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'solarize' ),
		);
		vc_map( array(
			"name" => __("Advanced button", 'solarize'),
			"base" => "solarize_advanced_button",
			"class" => "",
			"category" => __("For solarize theme", 'solarize'),
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Layout display', 'solarize' ),
					'param_name' => 'size_button',
					'value' => array(
						__( 'Large', 'solarize' ) => 'large',
						__( 'Normal', 'solarize' ) => 'normal',
						__( 'Small', 'solarize' ) => 'small',
					),
					'description' => __( 'Choose Layout display.', 'solarize' )
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Text button",'solarize'),
					"param_name" => "content",
					"value" => __("Button","solarize"),
					"description" => __("Add button name for element",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Link button",'solarize'),
					"param_name" => "link_button",
					"value" => "#",
					"description" => __("Add button link for element",'solarize')
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Postion button', 'solarize' ),
					'param_name' => 'postion_button',
					'value' => array(
						__( 'Left', 'solarize' ) => 'pull-left',
						__( 'Right', 'solarize' ) => 'pull-right',
					),
					'description' => __( 'Choose Postion display for button.', 'solarize' )
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => __("Color text","solarize"),
					"param_name" => "color_text_button",
					"value" => '#ffffff', //Default color
					"description" => __("Choose color for text ","solarize")
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => __("Color text hover","solarize"),
					"param_name" => "color_text_hover_button",
					"value" => '#fd5047', //Default color
					"description" => __("Choose color for text button when hover","solarize")
				),

				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => __("background button","solarize"),
					"param_name" => "color_button",
					"value" => '#fd5047', //Default color
					"description" => __("Choose color for button","solarize")
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => __("background button hover","solarize"),
					"param_name" => "color_hover_button",
					"value" => '#252525', //Default color
					"description" => __("Choose color when hover button.","solarize")
				),

				array(
					'type' => 'dropdown',
					'heading' => __( 'Choose border', 'solarize' ),
					'param_name' => 'border_button',
					'value' => array(
						__( 'No border', 'solarize' ) => 'no',
						__( 'Border', 'solarize' ) => 'yes',
					),
					'description' => __( 'Choose Layout display.', 'solarize' )
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Width border button",'solarize'),
					"param_name" => "width_border_button",
					"value" => "1",
					'dependency' => array(
						'element' => 'border_button',
						'value' => array( 'yes' )
					),
					"description" => __("Add border width for button",'solarize')
				),
				$add_style_border,
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => __(" Choose color border","solarize"),
					"param_name" => "color_border_button",
					"value" => '#42454a', //Default color
					'dependency' => array(
						'element' => 'border_button',
						'value' => array( 'yes' )
					),
					"description" => __("Choose color for border button","solarize"),
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Width radius",'solarize'),
					"param_name" => "border_radius_width",
					"value" => "0",
					"description" => __("Enter number radius width for button",'solarize')
				),
				array(
					"type" => "textarea",
					"heading" => __("Custom css",'solarize'),
					"param_name" => "border_custom_css",
					"value" => "",
					"description" => __("Enter custom stylesheet for button. Ex color: #fff; font-size: 10px",'solarize'),
					'group' => __('Advance', 'solarize')
				),
				array(
					"type" => "textarea",
					"heading" => __("Custom css on hover",'solarize'),
					"param_name" => "border_custom_css_hover",
					"value" => "",
					"description" => __("Enter custom stylesheet for button on hover. Ex color: #fff; font-size: 10px",'solarize'),
					'group' => __('Advance', 'solarize')
				),
			)));

//******************************************************************************************************/
// Call To Action
//******************************************************************************************************/

		vc_map( array(
			"name" => __("Call To action",'solarize'),
			"base" => "solarize_call_to_action",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Title",'solarize'),
					"param_name" => "solarize_cta_title",
					"value" => "Managed Dedicated Servers",
					"description" => __("Enter Call to action title ",'solarize')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"heading" => __("Color title","solarize"),
					"param_name" => "color_title",
					"value" => '#ffffff', //Default color
					"description" => __("Choose color for Title","solarize")
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Text Action",'solarize'),
					"param_name" => "solarize_cta_text_link",
					"value" => "Get started",
					"description" => __("Enter Call to action text ",'solarize')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"heading" => __("Text button color","solarize"),
					"param_name" => "color_text_button",
					"value" => '#ffffff', //Default color
					"description" => __("Choose color for Text button","solarize")
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"heading" => __("Text button color hover","solarize"),
					"param_name" => "color_text_button_hover",
					"value" => '#ffffff', //Default color
					"description" => __("Choose color for Text button when hover","solarize")
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"heading" => __("Background button","solarize"),
					"param_name" => "color_button",
					"value" => '#fd5047', //Default color
					"description" => __("Choose color for background button","solarize")
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"heading" => __("Background button hover","solarize"),
					"param_name" => "color_hover_button",
					"value" => '#2a2a2a', //Default color
					"description" => __("Choose color for background button when hover.","solarize")
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Choose style border', 'solarize' ),
					'param_name' => 'style_border_button',
					'value' => array(
						__( 'solid','solarize')=>'solid',
						__( 'dotted','solarize')=>'dotted',
						__( 'dashed','solarize')=>'dashed',
						__( 'none','solarize')=>'none',
						__( 'hidden','solarize')=>'hidden',
						__( 'double','solarize')=>'double',
						__( 'groove','solarize')=>'groove',
						__( 'ridge','solarize')=>'ridge',
						__( 'inset','solarize')=>'inset',
						__( 'outset','solarize')=>'outset',
						__( 'initial','solarize')=>'initial',
						__( 'inherit','solarize')=>'inherit'
					),
					'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'solarize' ),
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"heading" => __("Border button color","solarize"),
					"param_name" => "color_border_button",
					"value" => '#fd5047', //Default color
					"description" => __("Choose color for border button","solarize")
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Width border button",'solarize'),
					"param_name" => "width_border_button",
					"value" => "1",
					"description" => __("Enter width border button. default :1 ",'solarize')
				),

				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Link Action",'solarize'),
					"param_name" => "solarize_cta_url",
					"value" => "#",
					"description" => __("Enter Call to action link ",'solarize')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"heading" => __("Color Text call to action","solarize"),
					"param_name" => "color_text_description",
					"value" => '#2a2a2a', //Default color
					"description" => __("Choose color for text call to action ","solarize")
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"heading" => __("Content",'solarize'),
					"param_name" => "content",
					"value" => __("Blazing performance, supreme flexibility & superior UK based support.",'solarize'),
					"description" => __("Call to action  content",'solarize')
				),



			)));
//******************************************************************************************************/
// Client List
//******************************************************************************************************/
		vc_map( array(
			'name' => __( 'Client List', 'solarize' ),
			'base' => 'solarize_client_work',
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			'params' => array(
				array(
					'type' => 'attach_images',
					'heading' => __( 'Images', 'solarize' ),
					'param_name' => 'images',
					'value' => '',
					'description' => __( 'Select images from media library.', 'solarize' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Image size', 'solarize' ),
					'param_name' => 'img_size',
					'value' =>'client-work',
					'description' => __( 'Enter image size. Example: thumbnail, medium, large, full ,client-work . Leave empty to use "thumbnail" size.', 'solarize' )
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'On click', 'solarize' ),
					'param_name' => 'onclick',
					'value' => array(
						__( 'Open prettyPhoto', 'solarize' ) => 'link_image',
						__( 'Do nothing', 'solarize' ) => 'link_no',
						__( 'Open custom link', 'solarize' ) => 'custom_link'
					),
					'description' => __( 'What to do when slide is clicked?', 'solarize' )
				),
				array(
					'type' => 'exploded_textarea',
					'heading' => __( 'Custom links', 'solarize' ),
					'param_name' => 'custom_links',
					'description' => __( 'Enter links for each slide here. Divide links with linebreaks (Enter) . ', 'solarize' ),
					'dependency' => array(
						'element' => 'onclick',
						'value' => array( 'custom_link' )
					)
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => __("Autoplay",'solarize'),
					"param_name" => "auto_play",
					"value" => array(
						__('Yes') => 'true',
						__('No') => 'false',
					),
					"description" => __("Enter value autoplay for slide. ",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Slide speed",'solarize'),
					"param_name" => "slide_speed",
					"value" => 200,
					"description" => __("Enter slide speed value in milliseconds. ",'solarize'),
					"dependency" => array(
						'element' => 'auto_play',
						'value' => 'true'
					)
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => __("stop on hover",'solarize'),
					"param_name" => "stop_on_hover",
					"value" => array(
						__('No') => 'false',
						__('Yes') => 'true',
					),
					"description" => __("Stop autoplay on mouse hover. ",'solarize')
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => __("Display navigation",'solarize'),
					"param_name" => "navigation",
					"value" => array(
						__('Yes') => 'true',
						__('No') => 'false',
					),
					"description" => __("Display next and prev buttons.. ",'solarize')
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => __("Display pagination",'solarize'),
					"param_name" => "pagination",
					"value" => array(
						__('No') => 'false',
						__('Yes') => 'true',
					),
					"description" => __("Display pagination",'solarize')
				),
				array(
					"type" => "textarea",
					"admin_label" => true,
					"heading" => __("Items Display",'solarize'),
					"description" => __("This allow you to add custom variations of items.",'solarize'),
					"param_name" => "items_display",
					"value" => "[[0, 1], [360, 2], [640, 3], [768, 4], [1024, 5], [1200, 6]]"
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'solarize' ),
					'param_name' => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'solarize' )
				)
			)
		) );

	//******************************************************************************************************/
	// Countdown Shortcode
	//******************************************************************************************************/
	vc_map( array(
		"name" => __("Countdown Shortcode", 'solarize'),
		"base" => "solarize_countdown",
		"class" => "",
		"category" => __("For solarize theme", 'solarize'),
		"params" => array(

			array(
				'type' => 'dropdown',
				'heading' => __( 'Layout display', 'solarize' ),
				'param_name' => 'countdown_style',
				'value' => array(
					__( 'Countdown style 1', 'solarize' ) => 'countdownstyle1',
					__( 'Countdown style 2', 'solarize' ) => 'countdownstyle2',
				),
				'description' => __( 'Choose Layout display.', 'solarize' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => __("Datetime",'solarize'),
				"param_name" => "date_countdown",
				"value" => "2016/01/01|00/00/00",
				"description" => __("Add date for element.Eg:YYYY/MM/DD|h/i/s",'solarize')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => __("Extra class name",'solarize'),
				"param_name" => "el_class",
				"value" => "",
				"description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.",'solarize')
			),
		)
	) );

//******************************************************************************************************/
// FunFact
//******************************************************************************************************/
		$icon_params = (array)vc_map_integrate_shortcode( 'vc_icon', 'i_', '',
			array(
				// we need only type, icon_fontawesome, icon_.., NOT color and etc
				'include_only_regex' => '/^(type|icon_\w*)/'
			),false
		);

		$params = array_merge(
			$icon_params,
			array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Number Funfact",'solarize'),
					"param_name" => "number_funfact",
					"value" => __("7854",'solarize'),
					"description" => __("Add number funfact on for element",'solarize')
				),
				array(
					"type" => "textfield",
					"heading" => __("Speed funfact",'solarize'),
					"param_name" => "speed_funfact",
					"value" => '1000',
					"description" => __("Set speed funfact for element",'solarize')
				),
				array(
					'type' => 'checkbox',
					'heading' => __( 'Add comma?', 'js_composer' ),
					'param_name' => 'add_comma',
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Unit funfact",'solarize'),
					"param_name" => "unit_funfact",
					"value" => '',
					"description" => __("Add Unit funfact for element",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Name Funfact",'solarize'),
					"param_name" => "name_funfact",
					"value" => __("Data Transferred",'solarize'),
					"description" => __("Add Name Funfacr for element",'solarize')
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'custom',
					'heading' => __( 'More custom?', 'js_composer' ),
					'description' => __( 'You can customize title, text and border color of funfact.', 'js_composer' )
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Choose color icon","solarize"),
					"param_name" => "color_icon",
					"value" => '#fd5047',
					"description" => __("Choose color for icon","solarize"),
					"dependency" => array(
						"element" => "custom",
						"value" => "true"
					)
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Choose color Text","solarize"),
					"param_name" => "color_text",
					"value" => '#fd5047',
					"description" => __("Choose color for Text","solarize"),
					"dependency" => array(
						"element" => "custom",
						"value" => "true"
					)
				),
			)
		);
		vc_map( array(
			"name" => __("Funfact Shortcode",'solarize'),
			"base" => "solarize_funfact",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => $params)
		);
//******************************************************************************************************/
// FunFact 2
//******************************************************************************************************/
		vc_map( array(
			"name" => __("Funfact style 2",'solarize'),
			"base" => "solarize_funfact_style2",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Number Funfact",'solarize'),
					"param_name" => "number_funfact",
					"value" => __("7854",'solarize'),
					"description" => __("Add number funfact on for element",'solarize')
				),
				array(
					"type" => "textfield",
					"heading" => __("Speed funfact",'solarize'),
					"param_name" => "speed_funfact",
					"value" => '1000',
					"description" => __("Set speed funfact for element",'solarize')
				),
				array(
					'type' => 'checkbox',
					'heading' => __( 'Add comma?', 'js_composer' ),
					'param_name' => 'add_comma',
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Unit funfact",'solarize'),
					"param_name" => "unit_funfact",
					"value" => '',
					"description" => __("Add Unit funfact for element",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Name Funfact",'solarize'),
					"param_name" => "name_funfact",
					"value" => __("Data Transferred",'solarize'),
					"description" => __("Add Name Funfacr for element",'solarize')
				),
				array(
					"type" => "textarea_html",
					"heading" => __("Content",'solarize'),
					"param_name" => "content",
					"value" => __("Compellingly transform plug-and-play expertise whereas.Authoritatively communicate quality sources vis-a-vis standards compliant.",'solarize'),
					"description" => __("Add content",'solarize')
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'custom',
					'heading' => __( 'More custom?', 'js_composer' ),
					'description' => __( 'You can customize title, text and border color of funfact.', 'js_composer' )
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Choose color Number","solarize"),
					"param_name" => "color_number",
					"value" => '#fd5047',
					"description" => __("Choose color for number","solarize"),
					"dependency" => array(
						"element" => "custom",
						"value" => "true"
					)
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Choose color title","solarize"),
					"param_name" => "color_title",
					"value" => '#252525',
					"description" => __("Choose color for title","solarize"),
					"dependency" => array(
						"element" => "custom",
						"value" => "true"
					)
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Choose color Text","solarize"),
					"param_name" => "color_text",
					"value" => '#737373',
					"description" => __("Choose color for Text","solarize"),
					"dependency" => array(
						"element" => "custom",
						"value" => "true"
					)
				),
			)));
//******************************************************************************************************/
// Google MAP
//******************************************************************************************************/
		vc_map( array(
			'name' => __( 'Google MAP', 'solarize' ),
			'base' => 'solarize_map_shortcode',
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Title map', 'solarize' ),
					'param_name' => 'title_map_title',
					'value' => 'Coronathemes',
					'description' => __( 'Title for map info', 'solarize' )
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"heading" => __("Style","solarize"),
					"param_name" => "style",
					"value" => array(__('Light') => 'light', __('Dark') => 'dark', __('Custom', 'solarize') => 'custom'),
					"description" => __("Choose map style.","solarize"),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Address', 'solarize' ),
					'param_name' => 'address',
					'value' => 'ha noi',
					'description' => __( 'Address for map info', 'solarize' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Latitude', 'solarize' ),
					'param_name' => 'lat',
					'value' => '21.027764',
					'description' => __( 'get lat long coordinates from an address <a href="http://www.latlong.net/convert-address-to-lat-long.html">click here</a>', 'solarize' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Longitude', 'solarize' ),
					'param_name' => 'long',
					'value' => '105.83416',
					'description' => __( 'get lat long coordinates from an address <a href="http://www.latlong.net/convert-address-to-lat-long.html">click here</a>', 'solarize' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Phone', 'solarize' ),
					'param_name' => 'title_map_phone',
					'value' => '+84 (0) 1753 456789',
					'description' => __( 'Phone for map info', 'solarize' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Email', 'solarize' ),
					'param_name' => 'title_map_email',
					'value' => 'solarize@gmail.com',
					'description' => __( 'Phone for map info', 'solarize' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Website', 'solarize' ),
					'param_name' => 'title_map_website',
					'value' => 'solarize.net',
					'description' => __( 'Website for map info', 'solarize' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Map Height', 'solarize' ),
					'param_name' => 'height',
					'value' => '500',
					'description' => __( 'Map height', 'solarize' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'solarize' ),
					'param_name' => 'css_class',
					'value' => '',
					'description' => __( 'Extra class name for Block element', 'solarize' )
				),
			)
		) );
		//******************************************************************************************************/
		// lasted blog
		//******************************************************************************************************/
		vc_map( array(
			'name' => __( 'Latest Posts', 'solarize' ),
			'base' => 'solarize_lastest_blog',
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			'params' => array(
				/*array(
					'type' => 'textfield',
					'heading' => __( 'Number post display', 'solarize' ),
					'param_name' => 'number_post',
					'value' => '',
					'description' => __( 'Choose number posts display.', 'solarize' )
				),*/
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'solarize' ),
					'param_name' => 'css_class',
					'value' => '',
					'description' => __( 'Extra class name for Block element', 'solarize' )
				),
			)));

//******************************************************************************************************/
// Messega box
//******************************************************************************************************/
		vc_map( array(
			'name' => __( 'Notification Box', 'solarize' ),
			'base' => 'solarize_notifications',
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			'params' => array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"heading" => __("Choose style Notification boxes or no boxes",'solarize'),
					"param_name" => "choose_style_message_box",
					'value' => array(
						__( 'No boxes', 'solarize' ) => 'no_boxed',
						__( 'Boxed', 'solarize' ) => 'boxed',
					),
					'description' =>"Choose style Notification boxes or no boxes"
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"heading" => __("Choose color",'solarize'),
					"param_name" => "solarize_color_title_message",
					'value' => array(
						__( 'No Color', 'solarize' ) => 'no',
						__( 'Yes color', 'solarize' ) => 'yes',
					),
					'dependency' => array(
						'element' => 'choose_style_message_box',
						'value' => array( 'boxed')
					),
					'description' =>"Choose color for title Notification boxes."
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Title box",'solarize'),
					"param_name" => "solarize_title_message",
					"value" => "Success..   Everything is good!",
					"description" => __("Add title for box.",'solarize')
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"heading" => __("Choose styles message box",'solarize'),
					"param_name" => "choose_style_message",
					'value' => array(
						__( 'Info', 'solarize' ) => 'info',
						__( 'Warning', 'solarize' ) => 'warning',
						__( 'Success', 'solarize' ) => 'success',
						__( 'Error', 'solarize' ) => 'error',
					),
					'description' =>""
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"heading" => __("Message content",'solarize'),
					"param_name" => "content",
					"value" => 'Credibly promote cross-platform internal or "organic" sources whereas real-time functionalities. Appropriately communicate leading-edge e-commerce and standardized best practices. Phosfluorescently empower error-free web services for fully researched internal or "organic" sources. ',
					'dependency' => array(
						'element' => 'choose_style_message_box',
						'value' => array( 'boxed')
					),
					"description" => __("Add text message for Block element",'solarize')
				),
			)));

//******************************************************************************************************/
// Pricing Table	
//******************************************************************************************************/
		$icon_params = (array)vc_map_integrate_shortcode( 'vc_icon', 'pricingi_', '',
			array(
				// we need only type, icon_fontawesome, icon_.., NOT color and etc
				'include_only_regex' => '/^(type|icon_\w*)/'
			),array(
				'element' => 'pricing_table_style',
				'value' => 'style3'
			)
		);

		$params = array_merge(
			array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Pricing table style ', 'solarize' ),
					'param_name' => 'pricing_table_style',
					'value' => array(
						__( 'Layout style 1', 'solarize' ) => 'style1',
						__( 'Layout style 2', 'solarize' ) => 'style2',
						__( 'Layout style 3', 'solarize' ) => 'style3',
					),
					'description' => __( 'Choose Pricing table layout needed.', 'solarize' )
				),
			),
			$icon_params,
			array(
				array(
					"type" => "attach_image",
					"holder" => "div",
					"heading" => __("Pricing image","solarize"),
					"param_name" => "pricing_image",
					"value" => '',
					'dependency' => array(
						'element' => 'pricing_table_style',
						'value' => array( 'style3' )
					),
					"description" => __("Upload image pricing","solarize")
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Pricing Subtitle",'solarize'),
					"param_name" => "pricing_subtitle",
					"value" => __("",'solarize'),
					'dependency' => array(
						'element' => 'pricing_table_style',
						'value' => array( 'style3' )
					),
					"description" => __("Add Pricing Title for element",'solarize')
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Choose Active', 'solarize' ),
					'param_name' => 'class_active',
					'value' => array(
						__( 'No Active', 'solarize' ) => '',
						__( 'Active', 'solarize' ) => 'active'
					),
					'dependency' => array(
						'element' => 'pricing_table_style',
						'value' => array( 'style1','style2','style3' )
					),
					'description' => __( 'Choose active pricing needed.', 'solarize' )
				),

				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Pricing Title",'solarize'),
					"param_name" => "pricing_title",
					"value" => __("Economy",'solarize'),
					"description" => __("Add Pricing Title for element",'solarize')
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Pricing Currency",'solarize'),
					"param_name" => "pricing_currency",
					"value" => __("$",'solarize'),
					"description" => __("Add Pricing Currency for element",'solarize')
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Pricing Price",'solarize'),
					"param_name" => "pricing_price",
					"value" => __("3.99",'solarize'),
					"description" => __("Add Pricing Price for element",'solarize')
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Pricing Price unit",'solarize'),
					"param_name" => "pricing_unit",
					"value" => __("pm",'solarize'),
					"description" => __("Add Pricing Price unit for element",'solarize')
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"heading" => __("Content",'solarize'),
					"param_name" => "content",
					"value" => __("<ul>
								<li>500 GB Disk Space</li>
								<li>100 Databases List</li>
								<li>Free Domain Registration</li>
								<li>1 Hosting Space</li>
								<li>FREE Ad Coupons</li>
							</ul>",'solarize'),
					"description" => __("Add content",'solarize')
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Pricing Link Button",'solarize'),
					"param_name" => "pricing_link_button",
					"value" => __("#",'solarize'),
					"description" => __("Add Pricing Link Button for element",'solarize')
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Pricing Text Button",'solarize'),
					"param_name" => "pricing_text_button",
					"value" => __("GET STARTED",'solarize'),
					"description" => __("Add Pricing Text Button for element",'solarize')
				),
			)
		);

		vc_map( array(
			"name" => __("Pricing Table",'solarize'),
			"base" => "solarize_pricing_table",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => $params
		));
//******************************************************************************************************/
// Process bar
//******************************************************************************************************/
		vc_map( array(
			"name" => __("Process Bar", 'solarize'),
			"base" => "solarize_process_bar",
			"class" => "",
			"category" => __("For solarize theme", 'solarize'),
			"params" => array(

				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Title skill ",'solarize'),
					"param_name" => "title_skill",
					"value" => __("Energistically evolve","solarize"),
					"description" => __("Add title for element",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Number skill ",'solarize'),
					"param_name" => "number_skill",
					"value" => "75",
					"description" => __("Add number for element",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Unit skill ",'solarize'),
					"param_name" => "unit_skill",
					"value" => "%",
					"description" => __("Add unit for element. Eg:%",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Fontsize skill ",'solarize'),
					"param_name" => "fontsize_skill",
					"value" => "30",
					"description" => __("Add fontsize for element. Eg:%",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Dimension skill ",'solarize'),
					"param_name" => "dimension_skill",
					"value" => "127",
					"description" => __("Add Dimension for element. Eg:255",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Width skill ",'solarize'),
					"param_name" => "width_skill",
					"value" => "5",
					"description" => __("Add Dimension for element. Eg:255",'solarize'),
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => __("Skill bar background color","solarize"),
					"param_name" => "bgcolor_skill",
					"value" => '#e7e7e7', //Default color
					"description" => __("Choose color for skill bar background","solarize"),
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => __("Percent bar background color","solarize"),
					"param_name" => "color_skill",
					"value" => '#fd5047', //Default color
					"description" => __("Choose color for percent bar","solarize"),
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'custom_skill',
					'heading' => __( 'More custom skillbar?', 'js_composer' ),
					'description' => __( 'You can customize title and text color of kill.', 'js_composer' )
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Skill title color","solarize"),
					"param_name" => "color_title_skill",
					"value" => '#252525', //Default color
					"description" => __("Choose color for Title bar ","solarize"),
					"dependency"=> array(
						"element" => "custom_skill",
						"value" => "true"
					)
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Skill text color","solarize"),
					"param_name" => "color_text_skill",
					"value" => '#737373', //Default color
					"description" => __("Choose color for percent text","solarize"),
					"dependency"=> array(
						"element" => "custom_skill",
						"value" => "true"
					)
				),
				array(
					"type" => "textarea_html",
					"heading" => __("Content",'solarize'),
					"param_name" => "content",
					"value" =>'Compellingly transform plug-and-play expertise whereas efficient platforms. Authoritatively communicate quality sources vis-a-vis standards compliant partnerships.',
					"description" => __("content",'solarize'),
				),
				array(
					"type" => "textfield",
					"heading" => __("Extra class name",'solarize'),
					"param_name" => "el_class",
					"value" => "",
					"description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.",'solarize')
				),
			)
		) );

//******************************************************************************************************/
// Section/ Block title 
//******************************************************************************************************/

		vc_map( array(
			"name" => __("Section/Block Title",'solarize'),
			"base" => "solarize_title",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Title",'solarize'),
					"param_name" => "title",
					"value" => "",
					"description" => __("Enter section title.",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Sub Title",'solarize'),
					"param_name" => "sub_title",
					"value" => "",
					"description" => __("Enter section sub title.",'solarize')
				),
				array(
					"type" => "textarea",
					"admin_label" => true,
					"heading" => __("Excerpt",'solarize'),
					"param_name" => "content",
					"value" => "",
					"description" => __("Enter section excerpt.",'solarize')
				),
				/*array(
					"type" => "textfield",
					"heading" => __("font-size for title",'solarize'),
					"param_name" => "fontsize_title",
					"value" => "30",
					"description" => __("Enter value font-size for title.",'solarize')
				),
				*/
				/*array(
					'type' => 'dropdown',
					'heading' => __( 'Align title', 'solarize' ),
					'param_name' => 'align_title',
					"admin_label" => true,
					'value' => array(
						__( 'Left', 'solarize' ) => 'text-left',
						__( 'Right', 'solarize' ) => 'text-right',
						__( 'Center', 'solarize' ) => 'text-center',
					),
					'description' => __( 'Choose Postion Title/Section', 'solarize' )
				),*/
				/*
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => __("Title color","solarize"),
					"param_name" => "title_color",
					"value" => '#252525', //Default color
					"description" => __("Choose color for title","solarize")
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Description color","solarize"),
					"param_name" => "des_color",
					"value" => '#737373', //Default color
					"description" => __("Choose color for Description","solarize")
				),
				array(
					"type" => "textarea_html",
					"heading" => __("Content",'solarize'),
					"param_name" => "content",
					"value" =>'',
					"description" => __("Subtitle content",'solarize')
				),*/
				$add_css_style,
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Extra class name",'solarize'),
					"param_name" => "el_class",
					"value" => '',
					"description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.",'solarize')
				),
			)
		));

//******************************************************************************************************/
// Small Section/Block title
//******************************************************************************************************/

		vc_map( array(
			"name" => __("Small Section/Block Title",'solarize'),
			"base" => "solarize_small_title",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Title",'solarize'),
					"param_name" => "title",
					"value" => "",
					"description" => __("Enter section title.",'solarize')
				),
				$add_css_style,
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Extra class name",'solarize'),
					"param_name" => "el_class",
					"value" => '',
					"description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.",'solarize')
				),
			)
		));

//******************************************************************************************************/
// Bolder box
//******************************************************************************************************/

		vc_map( array(
			"name" => __("Bolder box",'solarize'),
			"base" => "solarize_box",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Title",'solarize'),
					"param_name" => "title",
					"value" => "",
					"description" => __("Enter box title.",'solarize')
				),
				array(
					"type" => "textarea_html",
					"heading" => __("Content",'solarize'),
					"param_name" => "content",
					"value" =>'',
					"description" => __("Subtitle content",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Link text",'solarize'),
					"param_name" => "link_text",
					"value" => "Read more",
					"description" => __("Enter link text.",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Link",'solarize'),
					"param_name" => "link",
					"value" => "#",
					"description" => __("Enter url.",'solarize')
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Extra class name",'solarize'),
					"param_name" => "el_class",
					"value" => "",
					"description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.",'solarize')
				),
			)
		));

//******************************************************************************************************/
// Videos
//******************************************************************************************************/
		vc_map( array(
			"name" => __("Video box",'solarize'),
			"base" => "solarize_video_box",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Video URL",'solarize'),
					"param_name" => "url",
					"value" => "",
					"description" => __("Enter video url. Accept from youtube, vimdeo, flv, mp4",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Video Title",'solarize'),
					"param_name" => "title",
					"value" => "",
					"description" => __("Enter video title.",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Video Sub Title",'solarize'),
					"param_name" => "sub_title",
					"value" => "",
					"description" => __("Enter video sub title.",'solarize')
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => __("Align",'solarize'),
					"param_name" => "align",
					'value' => array(
						__( 'Center', 'solarize' ) => 'text-center',
						__( 'Left', 'solarize' ) => 'text-left',
						__( 'Right', 'solarize' ) => 'text-right',
					),
					"description" => __("Select align.",'solarize')
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'solarize' ),
					'param_name' => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'solarize' )
				)
			)
		));

//******************************************************************************************************/
// Our Service icon
//******************************************************************************************************/
		//get vc_icon params
		//icon params
		$icon_params = (array) vc_map_integrate_shortcode( 'vc_icon', 'i_', '',
			array(
				// we need only type, icon_fontawesome, icon_.., NOT color and etc
				'include_only_regex' => '/^(type|icon_\w*)/'
			),false);

		$params = array_merge(
			//style
			array(
				array(
					'type' => 'dropdown',
					"admin_label" => true,
					'heading' => __( 'Service style', 'solarize' ),
					'param_name' => 'style',
					'value' => array(
						__( 'Style 1', 'solarize' ) => 'style-1',
						__( 'Style 2', 'solarize' ) => 'style-2',
					),
					'description' => __( 'Choose service style.', 'solarize' )
				),
				array(
					"type" => "textfield",
					"heading" => __("Count number",'solarize'),
					"param_name" => "count",
					"value" => "00",
					"description" => __("Enter count number.",'solarize'),
					"dependency" => array(
						"element" => "style",
						"value" => "style-2"
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Count position', 'solarize' ),
					'param_name' => 'count_position',
					'value' => array(
						__( 'Left', 'solarize' ) => 'left',
						__( 'Right', 'solarize' ) => 'right',
					),
					'description' => __( 'Choose count position.', 'solarize' ),
					"dependency" => array(
						"element" => "style",
						"value" => "style-2"
					)
				),
			),
			//icon fields
			$icon_params,

			//service fields
			array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Title",'solarize'),
					"param_name" => "service_title",
					"value" => "Backups Available",
					"description" => __("Enter service title ",'solarize')
				),
				array(
					"type" => "textarea_html",
					"heading" => __("Content",'solarize'),
					"param_name" => "content",
					"value" => __("Compellingly transform plug-and-play expertise whereas efficient platforms. Authoritatively communicate quality sources vis-a-vis standards compliant partnerships.",'solarize'),
					"description" => __("Service content",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Link service url",'solarize'),
					"param_name" => "service_url",
					"value" => "#",
					"description" => __("Enter readmore link ",'solarize')
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Show readmore', 'solarize' ),
					'param_name' => 'show_readmore',
					'value' => array(
						__( 'Hide', 'solarize' ) => '0',
						__( 'Show', 'solarize' ) => '1',
					),
					'description' => __( 'Choose show/hide readmore.', 'solarize' )
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Text service url",'solarize'),
					"param_name" => "readmore_text",
					"value" => "Read more",
					"description" => __("Enter Service readmore text ",'solarize'),
					'dependency' => array(
						'element' => 'show_readmore',
						'value' => array( '1' )
					),
				),
				array(
					'type' => 'dropdown',
					'param_name' => 'content_align',
					'value' => array(
						__('Left', 'js_composer') => 'left',
						__('Right', 'js_composer') => 'right',
						__('Center', 'js_composer') => 'center'
					),
					'heading' => __( 'Content alignemnt', 'js_composer' ),
					'description' => __( 'Select Content alignemnt.', 'js_composer' )
				),
			)
		);
		vc_map( array(
				"name" => __("Service Icon ",'solarize'),
				"base" => "solarize_service_icon",
				"class" => "",
				"category" => __('For solarize theme','solarize'),
				"params" =>
					$params
			)
		);
//******************************************************************************************************/
// Our Service
//******************************************************************************************************/
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'service',
		);
		$services = get_posts($args);
		$service_arr = array(__('Select service', 'solarize') => '');
		if($services){
			foreach($services as $service){
				$service_arr[get_the_title($service->ID)] = $service->ID;
			}
		}

		vc_map( array(
			"name" => __("Service ",'solarize'),
			"base" => "solarize_service",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => array(
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => __( 'Service', 'solarize' ),
					'param_name' => 'service',
					'value' =>$service_arr,
					'description' => __( 'Select a service.', 'solarize' )
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => __( 'Image size', 'solarize' ),
					'param_name' => 'img_size',
					'value' =>'service',
					'description' => __( 'Enter image size. Example: thumbnail, medium, large, full ,service . Leave empty to use "thumbnail" size.', 'solarize' )
				),
			))
		);
//******************************************************************************************************/
// Skill Bars
//******************************************************************************************************/
		vc_map( array(
			"name" => __("Skill Bar", 'solarize'),
			"base" => "solarize_skillbar_shortcode",
			"description" => "Display your skills with style",
			"icon" => "icon-progress-bar",
			"class" => "skillbar_extended",
			"category" => __("For solarize theme", 'solarize'),
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Layout display', 'solarize' ),
					'param_name' => 'skill_bar_style',
					'value' => array(
						__( 'Skillbar style 1', 'solarize' ) => 'skillbarstyle1',
						__( 'Skillbar style 2', 'solarize' ) => 'skillbarstyle2',
						__( 'Skillbar style 3', 'solarize' ) => 'skillbarstyle3',
					),
					'description' => __( 'Choose Layout display.', 'solarize' )
				),

				array(
					"type" => "exploded_textarea",
					"admin_label" => true,
					"heading" => __("Graphic values", 'solarize'),
					"param_name" => "values",
					"value" => "90|Development",
					"description" => __("Input graph values here. Divide values with linebreaks (Enter). Example: 90|Development.", 'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Units", 'solarize'),
					"param_name" => "units",
					"value" => "%",
					"description" => __("Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.", 'solarize')
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'custom_skillbar',
					'heading' => __( 'Custom skillbar?', 'js_composer' ),
					'description' => __( 'You can customize background, percent and text color of killbar.', 'js_composer' )
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => __("Skill bar background color","solarize"),
					"param_name" => "skillbar_background_color",
					"value" => '#e7e7e7', //Default color
					"description" => __("Choose color for skill bar background","solarize"),
					"dependency"=> array(
						"element" => "custom_skillbar",
						"value" => "true"
					)
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => __("Percent bar background color","solarize"),
					"param_name" => "percentbar_background_color",
					"value" => '#fd5047', //Default color
					"description" => __("Choose color for percent bar","solarize"),
					"dependency"=> array(
						"element" => "custom_skillbar",
						"value" => "true"
					)
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => __("Skill bar text color","solarize"),
					"param_name" => "skill_bar_text_color",
					"value" => '#ffffff', //Default color
					"description" => __("Choose color for percent text","solarize"),
					"dependency"=> array(
						"element" => "custom_skillbar",
						"value" => "true"
					)

				),
				array(
					"type" => "textarea_html",
					"heading" => __("Skill bar description",'solarize'),
					"param_name" => "content",
					"value" => "",
					'dependency' => array(
						'element' => 'skill_bar_style',
						'value' => array( 'skillbarstyle1' )
					),
				),
			)
		) );
//******************************************************************************************************/
// Team Member
//******************************************************************************************************/
		vc_map( array(
			"name" => __("Team Member",'solarize'),
			"base" => "solarize_team_member",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => array(
				array(
					"type" => "attach_image",
					"admin_label" => true,
					"heading" => __("Member's image","solarize"),
					"param_name" => "image",
					"value" => '',
					"description" => __("Upload member's image","solarize")
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Image size', 'solarize' ),
					'param_name' => 'img_size',
					'value' =>'team-member',
					'description' => __( 'Enter image size. Example: thumbnail, medium, large, full ,team-member . Leave empty to use "thumbnail" size.', 'solarize' )
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Member's name",'solarize'),
					"param_name" => "name_member",
					"value" => "",
					"description" => ""
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Member's postion",'solarize'),
					"param_name" => "member_postion",
					"value" => "",
					"description" => ""
				),
				array(
					"type" => "textarea",
					"admin_label" => true,
					"heading" => __("Socials",'solarize'),
					"param_name" => "socials",
					"value" => "",
					"description" => "You can add social icons at here. In each line include icon class and URL. Ex fa-facebook|https://facebook.com"
				),
				$add_css_style,
			)
		));

//******************************************************************************************************/
// Testimonial
//******************************************************************************************************/

		$testimonial_term = array();
		$testimonial_terms  =  get_terms("testimonials_cats");
		foreach( $testimonial_terms as $testimonial_cat ){
			$testimonial_term[$testimonial_cat->name] = $testimonial_cat->slug;

		}
		wp_reset_postdata();


		vc_map( array(
			"name" => __("Testimonial Shortcode",'solarize'),
			"base" => "solarize_testimonials",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => array(
				array(
					'type' => 'dropdown',
					"admin_label" => true,
					'heading' => __( 'Categories display', 'solarize' ),
					'param_name' => 'testimonial_show_categories',
					'value' => $testimonial_term,
					"description" => __("Add categories testimonial display on page.",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Post Number",'solarize'),
					"param_name" => "number_post_testimonial",
					"value" => 3,
					"description" => __("Number post display in testimonial",'solarize')
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => __("Autoplay",'solarize'),
					"param_name" => "auto_play",
					"value" => array(
						__('Yes') => 'true',
						__('No') => 'false',
					),
					"description" => __("Enter value autoplay for slide. ",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Slide speed",'solarize'),
					"param_name" => "slide_speed",
					"value" => 200,
					"description" => __("Enter slide speed value in milliseconds. ",'solarize'),
					"dependency" => array(
						'element' => 'auto_play',
						'value' => 'true'
					)
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => __("stop on hover",'solarize'),
					"param_name" => "stop_on_hover",
					"value" => array(
						__('No') => 'false',
						__('Yes') => 'true',
					),
					"description" => __("Stop autoplay on mouse hover. ",'solarize')
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => __("Display navigation",'solarize'),
					"param_name" => "navigation",
					"value" => array(
						__('Yes') => 'true',
						__('No') => 'false',
					),
					"description" => __("Display next and prev buttons.. ",'solarize')
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => __("Display pagination",'solarize'),
					"param_name" => "pagination",
					"value" => array(
						__('No') => 'false',
						__('Yes') => 'true',
					),
					"description" => __("Display pagination",'solarize')
				),
				array(
					"type" => "textfield",
					"heading" => __("Extra class name",'solarize'),
					"param_name" => "el_class",
					"value" =>'',
					"description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.",'solarize')
				),
			)));
//******************************************************************************************************/
// Text Dropcap
//******************************************************************************************************/
		vc_map( array(
			"name" => __("Text Dropcap",'solarize'),
			"base" => "solarize_text_dropcap",
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Choose style dropcap', 'solarize' ),
					'param_name' => 'choose_style_dropcap',
					'value' => array(
						__( 'Style 1', 'solarize' ) => 'style1',
						__( 'Style 2', 'solarize' ) => 'style2',
					),
					'description' => __( 'Choose style for dropcap.', 'solarize' )
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("First Text",'solarize'),
					"param_name" => "first_text",
					"value" => "",
					"description" => __("First text dropcap",'solarize')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"heading" => __("Background color first text dropcap","solarize"),
					"param_name" => "background_color_fisttext",
					"value" => '#42454a', //Default color
					'dependency' => array(
						'element' => 'choose_style_dropcap',
						'value' => array( 'style1')
					),
					"description" => __("Background color first text dropcap","solarize")
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"heading" => __("Color first text dropcap","solarize"),
					"param_name" => "color_fisttext",
					"value" => '#ffffff', //Default color		             
					"description" => __("Color first text dropcap","solarize")
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"heading" => __("Content Text",'solarize'),
					"param_name" => "content",
					"value" => "",
					"description" => __("Add content text drop cap",'solarize')
				),

			)
		));
//******************************************************************************************************/
// Coronathemes Twitter
//******************************************************************************************************/		  
		vc_map( array(
			'name' => __( 'Twitter Shortcode', 'solarize' ),
			'base' => 'solarize_twitter',
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			'params' => array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Number tweets",'solarize'),
					"param_name" => "number_tweet",
					"value" => '4',
					"description" => __("Enter number tweets for element",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Maximun length",'solarize'),
					"param_name" => "max_length",
					"value" => '',
					"description" => __("Enter number of words for each tweet",'solarize')
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Extra class name",'solarize'),
					"param_name" => "el_class",
					"value" => '',
					"description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.",'solarize')
				),
			)));
//******************************************************************************************************/
// Contact form 7
//******************************************************************************************************/
		$args = array( 'post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1, 'post_status' => 'publish', 'post_parent' => null );
		$posts_array = get_posts($args );
		$cf7s = array();
		foreach($posts_array as $post) {
			$cf7s[$post->post_title] = $post->ID;
		}
		vc_map( array(
			'name' => __( 'Contact form', 'solarize' ),
			'base' => 'solarize_contact_form',
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			'params' => array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Title",'solarize'),
					"param_name" => "title",
					"value" => 'Schedule an estimation now!',
					"description" => __("Title for contact form",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Sub Title",'solarize'),
					"param_name" => "sub_title",
					"value" => 'Our Expert Will be on your Door Step',
					"description" => __("Sub Title for contact form",'solarize')
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => __("Button Text",'solarize'),
					"param_name" => "button_text",
					"value" => 'Click Here',
					"description" => __("Enter text for button",'solarize')
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => __("Select contact form",'solarize'),
					"param_name" => "cf7",
					"value" => $cf7s,
					"description" => __("Select contact form 7, Incase empty dorpdown plese create contact form 7 the first",'solarize')
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Extra class name",'solarize'),
					"param_name" => "el_class",
					"value" => '',
					"description" => __("Style particular content element differently - add a class name and refer to it in custom CSS.",'solarize')
				),
			)));
//******************************************************************************************************/
// Divider Shortcode							
//******************************************************************************************************/		  
		vc_map( array(
			'name' => __( 'Divider Shortcode', 'solarize' ),
			'base' => 'solarize_divider_shortcode',
			"class" => "",
			"category" => __('For solarize theme','solarize'),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Choose style divider', 'solarize' ),
					'param_name' => 'choose_style_divider',
					'value' => array(
						__( 'Style 1', 'solarize' ) => 'style1',
						__( 'Style 2', 'solarize' ) => 'style2',
					),
					'description' => __( 'Choose style for divider.', 'solarize' )
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Choose width divider', 'solarize' ),
					'param_name' => 'width_divider',
					'value' => array(
						__( 'Full width', 'solarize' ) => '',
						__( 'Divider medium', 'solarize' ) => 'divider-md',
						__( 'Divider small', 'solarize' ) => 'divider-sm',
					),
					'description' => __( 'Choose width for divider.', 'solarize' )
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Choose Style Text or Icon', 'solarize' ),
					'param_name' => 'choose_icon_text',
					'value' => array(
						__( 'Divider text', 'solarize' ) => 'text',
						__( 'Divider icon', 'solarize' ) => 'icon',
					),
					'dependency' => array(
						'element' => 'choose_style_divider',
						'value' => array( 'style2')
					),
					'description' => __( 'Choose style for divider display .', 'solarize' )
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => __("Text divider",'solarize'),
					"param_name" => "title_divider",
					"value" => 'Your text',
					'dependency' => array(
						'element' => 'choose_icon_text',
						'value' => array( 'text')
					),
					"description" => __("Add text for divider",'solarize')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"heading" => __("Color divider","solarize"),
					"param_name" => "color_divider",
					"value" => '#ccc', //Default color
					'dependency' => array(
						'element' => 'choose_style_divider',
						'value' => array( 'style2')
					),
					"description" => __("Select color for divider","solarize")
				),
				array(
					'type' => 'textfield',
					"heading" => __("Icon divider",'solarize'),
					"param_name" => "icon_divider",
					'value' => '',
					'dependency' => array(
						'element' => 'choose_icon_text',
						'value' => array( 'icon')
					),
					'description' => __( 'Enter font icon awesome .eg: fa-facebook... . <a href="http://fortawesome.github.io/Font-Awesome/icons/">click here.</a>', 'solarize' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Choose divider parallel', 'solarize' ),
					'param_name' => 'divider_style',
					'value' => array(
						__( 'One divider', 'solarize' ) => '',
						__( 'Parallel lines', 'solarize' ) => 'divider-2',
					),
					'dependency' => array(
						'element' => 'choose_style_divider',
						'value' => array( 'style1')
					),
					'description' => __( 'Choose for divider.', 'solarize' )
				),
			)));



//******************************************************************************************************/
// Accordion Overwrite Visual composer
//******************************************************************************************************/
		vc_map( array(
			'name' => __( 'Bolder Tour', 'js_composer' ),
			'base' => 'vc_tour',
			'show_settings_on_create' => false,
			'is_container' => true,
			'container_not_allowed' => true,
			'icon' => 'icon-wpb-ui-tab-content-vertical',
			'category' => __( 'For solarize theme', 'js_composer' ),
			'wrapper_class' => 'vc_clearfix',
			'description' => __( 'Vertical tabbed content', 'js_composer' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Widget title', 'js_composer' ),
					'param_name' => 'title',
					'description' => __( 'Enter text used as widget title (Note: located above content element).', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'js_composer' ),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
				)
			),
			'custom_markup' => '
<div class="wpb_tabs_holder wpb_holder vc_clearfix vc_container_for_children">
<ul class="tabs_controls">
</ul>
%content%
</div>'
		,
			'default_content' => '
[vc_tab title="' . __( 'Tab 1', 'js_composer' ) . '"][/vc_tab]
[vc_tab title="' . __( 'Tab 2', 'js_composer' ) . '"][/vc_tab]
',
			'js_view' => 'VcTabsView'
		) );

		vc_map( array(
			"name" => __( 'Bolder Tabs', 'js_composer' ),
			'base' => 'vc_tabs',
			'show_settings_on_create' => false,
			'is_container' => true,
			'icon' => 'icon-wpb-ui-tab-content',
			'category' => __( 'For solarize theme', 'js_composer' ),
			'description' => __( 'Tabbed content', 'js_composer' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Widget title', 'js_composer' ),
					'param_name' => 'title',
					'description' => __( 'Enter text used as widget title (Note: located above content element).', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'js_composer' ),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
				)
			),
			'custom_markup' => '
<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
<ul class="tabs_controls">
</ul>
%content%
</div>'
		,
			'default_content' => '
[vc_tab title="' . __( 'Tab 1', 'js_composer' ) . '" ][/vc_tab]
[vc_tab title="' . __( 'Tab 2', 'js_composer' ) . '" ][/vc_tab]
',
			'js_view' =>'VcTabsView'
		) );

		$icon_params = array(
			array(
				'type' => 'checkbox',
				'param_name' => 'add_icon',
				'heading' => __( 'Add icon?', 'js_composer' ),
				'description' => __( 'Add icon next to section title.', 'js_composer' )
			),
		);
		$icon_params = array_merge( $icon_params, (array) vc_map_integrate_shortcode( 'vc_icon', 'i_', '',
			array(
				// we need only type, icon_fontawesome, icon_.., NOT color and etc
				'include_only_regex' => '/^(type|icon_\w*)/'
			), array(
				'element' => 'add_icon',
				'value' => 'true'
			)
		) );
		$params = array_merge(
			$icon_params,
			array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Title', 'solarize' ),
					'param_name' => 'title',
					'description' => __( 'Section title.', 'solarize' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Sub title', 'solarize' ),
					'param_name' => 'sub_title',
					'description' => __( 'Section sub title.', 'solarize' )
				),
			)
		);

		vc_map( array(
			'name' => __( 'Tab', 'js_composer' ),
			'base' => 'vc_tab',
			'allowed_container_element' => 'vc_row',
			'is_container' => true,
			'content_element' => false,
			'params' => $params,
			'js_view' => 'VcTabView'
		) );

		//portfolio grid
		$portfolio_term = array();
		$portfolio_terms  =  get_terms("portfolio_cats");
		foreach( $portfolio_terms as $portfolio_cat ){
			$portfolio_term[$portfolio_cat->name] = $portfolio_cat->term_id;
		}

		$portfolio_categs = get_terms('portfolio_cats');
		$portfolio_cats = array();
		foreach($portfolio_categs as $portfolio_categ) {
			$portfolio_cats[$portfolio_categ->name] = $portfolio_categ->term_id;
		}
		$portfolio_initial_filter = array('No Thanks!' => '') + $portfolio_cats;

		vc_map( array(
			"name" => __("Portfolio Grid", "js_composer"),
			//"icon" => get_template_directory_uri().'/images/composer/folder_picture.png',
			"base" => "solarize_portfolio_grid",
			"description" => "Masonry grid layout for portfolio items",
			//'front_enqueue_js' => get_template_directory_uri().'/js/custom/custom-isotope-portfolio.js',
			//"class" => "portfolio_grid_extended",
			"category" => __("For solarize theme", "solarize"),
			"params" => array(
				array(
					"type" => "textfield",
					"class" => "",
					"admin_label" => true,
					"heading" => __("Number of Items to Display", "solarize"),
					"param_name" => "number",
					"value" => 10,
					"description" => __("Set how many portfolio items would you like to include in the grid. Use '-1' to include all your items.", "solarize")
				),
				array(
					"type" => "checkbox",
					"class" => "",
					"heading" =>  __("Portfolio Categories", "solarize"),
					"param_name" => "categories",
					"value" => $portfolio_cats,
					"description" => __("Select from which categories to display projects(mandatory).", "solarize")
				),

				array(
					"type" => "dropdown",
					"heading" => __("Order By:", "solarize"),
					"param_name" => "portfolio_orderby",
					"value" => array(__("Menu order", "solarize") => 'menu_order', __("Date", "solarize") => 'date', __("Name", "solarize") => 'name', __("ID", "solarize") => 'id', __("Last Modified Date", "solarize") => 'modified', __("Random", "solarize") => 'random'),
					"description" => __("Order the projects in the grid.", "solarize")
				),

				array(
					"type" => "dropdown",
					"heading" => __("Order:", "solarize"),
					"param_name" => "portfolio_order",
					"value" => array(__("Descending", "solarize") => 'DESC', __("Ascending", "solarize") => 'ASC'),
					"description" => __("Set the direction order.", "solarize")
				),
				array(
					"type" => "dropdown",
					"heading" => __("Show filter", "solarize"),
					"param_name" => "show_filter",
					"value" => array(__("Show", "solarize") => '1', __("Hide", "solarize") => '0'),
					"description" => __("You can show/hide filter.", "solarize")
				),
				array(
					"type" => "textfield",
					"heading" => __("Keyword for All Projects Filter", "solarize"),
					"param_name" => "allword",
					"value" => "All",
					"description" => __("You can replace the default 'All' keyword for the initial filter with another one. If you want to hide it, you can do it with this CSS code: .all-projects {  display: none !important; }", "solarize"),
					"dependency" => array(
						"element" => "show_filter",
						"value" => "1"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => __("'All' filter position.", "solarize"),
					"param_name" => "allbam",
					"value" => array(__("At the beginning", "solarize") => '', __("At the end", "solarize") => 'on-the-end'),
					"description" => __("Set where the 'All' filter should be displayed: at the beginning or at the end of the filter list.", "solarize"),
					"dependency" => array(
						"element" => "show_filter",
						"value" => "1"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => __("Set Another Initial Filter", "solarize"),
					"param_name" => "initial_word",
					"value" => $portfolio_initial_filter,
					"description" => __("You can set the portfolio grid to display projects from a certain category, on the initial state. If you want to reorder the categories, use <a href='http://goo.gl/kCYZ0L'>this plugin</a>", "solarize"),
					"dependency" => array(
						"element" => "show_filter",
						"value" => "1"
					)
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'js_composer' ),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
				)
			)
		) );

		//portfolio slider
		vc_map( array(
			'name' => __( 'Portfolio Slider', 'js_composer' ),
			'base' => 'solarize_portfolio_slider',
			'category' => __( 'For solarize theme', 'js_composer' ),
			'description' => __( 'Display portfolios selected as slider', 'js_composer' ),
			'params' => array(
				array(
					"type" => "textfield",
					"class" => "",
					"admin_label" => true,
					"heading" => __("Number of Items to Display", "solarize"),
					"param_name" => "number",
					"value" => 3,
					"description" => __("Set how many portfolio items would you like to include in the slider. Use '-1' to include all your items.", "solarize")
				),
				array(
					"type" => "checkbox",
					'admin_label' => true,
					"heading" =>  __("Portfolio Categories", "solarize"),
					"param_name" => "categories",
					"value" => $portfolio_cats,
					"description" => __("Select from which categories to display projects(mandatory).", "solarize")
				),
				array(
					"type" => "dropdown",
					"heading" => __("Order By:", "solarize"),
					"param_name" => "portfolio_orderby",
					"value" => array(__("Menu order", "solarize") => 'menu_order', __("Date", "solarize") => 'date', __("Name", "solarize") => 'name', __("ID", "solarize") => 'id', __("Last Modified Date", "solarize") => 'modified', __("Random", "solarize") => 'random'),
					"description" => __("Order the projects in the grid.", "solarize")
				),

				array(
					"type" => "dropdown",
					"heading" => __("Order:", "solarize"),
					"param_name" => "portfolio_order",
					"value" => array(__("Descending", "solarize") => 'DESC', __("Ascending", "solarize") => 'ASC'),
					"description" => __("Set the direction order.", "solarize")
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'js_composer' ),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
				)
			),
		) );

		//portfolio item
		$args = array('posts_per_page' => -1, 'post_type' => 'portfolio');
		$portfolios = get_posts($args);
		$portfolio_arr = array(__('Select', 'solarize') => '');
		foreach($portfolios as $portfolio){
			$portfolio_arr[get_the_title($portfolio->ID)] = $portfolio->ID;
		}
		vc_map( array(
			'name' => __( 'Portfolio item', 'js_composer' ),
			'base' => 'solarize_portfolio_item',
			'category' => __( 'For solarize theme', 'js_composer' ),
			'description' => __( 'Display a single portfolio selected', 'js_composer' ),
			'params' => array(
				array(
					"type" => "dropdown",
					'admin_label' => true,
					"heading" => __("Portfolio", "solarize"),
					"param_name" => "portfolio",
					"value" => $portfolio_arr,
					"description" => __("Select a portfolio", "solarize"),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'js_composer' ),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
				)
			),
		) );

		//socials
		vc_map( array(
			'name' => __( 'Social icons', 'js_composer' ),
			'base' => 'solarize_social_icons',
			'category' => __( 'For solarize theme', 'js_composer' ),
			'description' => __( 'Display lists social selected', 'js_composer' ),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Choose style social', 'solarize' ),
					'param_name' => 'style',
					'value' => array(
						__( 'Style 1', 'solarize' ) => 'style1',
						__( 'Style 2', 'solarize' ) => 'style2',
					),
					'description' => __( 'Choose style for social.', 'solarize' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Twitter URL', 'js_composer' ),
					'param_name' => 'twitter_url',
					'description' => __( 'Enter a address Ex: http://www.twitter.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Facebook URL', 'js_composer' ),
					'param_name' => 'facebook_url',
					'description' => __( 'Enter a address Ex: http://www.facebook.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'LinkedIn URL', 'js_composer' ),
					'param_name' => 'linkedin_url',
					'description' => __( 'Enter a address Ex: http://www.linkedin.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Google+ URL', 'js_composer' ),
					'param_name' => 'googleplus_url',
					'description' => __( 'Enter a address Ex: http://www.plus.google.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Pinterest URL', 'js_composer' ),
					'param_name' => 'pinterest_url',
					'description' => __( 'Enter a address Ex: http://www.pinterest.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Dribbble URL', 'js_composer' ),
					'param_name' => 'dribbble_url',
					'description' => __( 'Enter a address Ex: http://www.dribbble.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Tumblr URL', 'js_composer' ),
					'param_name' => 'tumblr_url',
					'description' => __( 'Enter a address Ex: http://www.tumblr.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'SoundCloud URL', 'js_composer' ),
					'param_name' => 'soundcloud_url',
					'description' => __( 'Enter a address Ex: http://www.soundcloud.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Instagram URL', 'js_composer' ),
					'param_name' => 'instagram_url',
					'description' => __( 'Enter a address Ex: http://www.instagram.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Vimeo URL', 'js_composer' ),
					'param_name' => 'vimeo_url',
					'description' => __( 'Enter a address Ex: http://www.vimeo.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Youtube URL', 'js_composer' ),
					'param_name' => 'youtube_url',
					'description' => __( 'Enter a address Ex: http://www.youtube.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Flickr URL', 'js_composer' ),
					'param_name' => 'flickr_url',
					'description' => __( 'Enter a address Ex: http://www.flicker.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Dropbox URL', 'js_composer' ),
					'param_name' => 'dropbox_url',
					'description' => __( 'Enter a address Ex: http://www.dropbox.com/.', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Github URL', 'js_composer' ),
					'param_name' => 'github_url',
					'description' => __( 'Enter a address Ex: http://www.github.com/.', 'js_composer' )
				),
			),
		));
	}
}
?>