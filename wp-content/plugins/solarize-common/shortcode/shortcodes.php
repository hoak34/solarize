<?php
/**
 * @package CoronaThemes_Shortcodes
 * @version 1.0
 */
if(!class_exists('solarize_shortcodes')):
	class solarize_shortcodes {
		//******************************************************************************************************/
		// Globals Function
		//******************************************************************************************************/
		public function getExtraClass( $el_class ) {
			$output = '';
			if ( '' !== $el_class ) {
				$output = ' ' . str_replace( '.', '', $el_class );
			}

			return $output;
		}

		public function getCSSAnimation( $css_animation,$data_wow_delay,$data_wow_duration) {
			$output = '';
			if ( $css_animation != '' ) {
				wp_enqueue_script( 'waypoints' );
				$output .= 'wow  ' . $css_animation.'"';
				$output .= 'data-wow-duration="'.$data_wow_duration.'"';
				$output .= 'data-wow-delay="'.$data_wow_delay.'"';
			}
			return $output;
		}
		public function shortcode_custom_css_class( $param_value, $prefix = '' ) {
			$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';
			return $css_class;
		}

	}
endif;

class solarize_shortcodes_fe extends solarize_shortcodes {

	//******************************************************************************************************/
	// Section/ block title
	//******************************************************************************************************/
	static function solarize_title( $atts , $content = null) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_title', $atts ) : $atts;

		$el_class = $html = $css = '';
		extract( shortcode_atts(
			array(
				'el_class'=>'',
				'css'=>'',
				//custom
				'title'=>'',
				'sub_title'=>'',
				'excerpt'=>'',
				//'fontsize_title'=>'',
				//'title_color'=>'',
				//'des_color'=>'',
				'align_title'=>'text-center',
			), $atts ));

		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class).$extra_class->shortcode_custom_css_class($css, ' ');
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_title', $atts );
		$html .='<div class="solarize-section-title '.$css_class.' '.$align_title.'">
				<h2>'.esc_attr($title).'</h2>
				<h5>'.esc_attr($sub_title).'</h5>
				<div class="subtitle">
							<div class="left-line"></div>
							<div class="middle-line"></div>
							<div class="right-line"></div>
							<div class="clearfix"></div>
						</div>';
		$html .= apply_filters('the_content', $content);
		$html .='</div>';
		return $html;
	}

//******************************************************************************************************/
// Small Section/ block title
//******************************************************************************************************/
	static function solarize_small_title( $atts , $content = null) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_small_title', $atts ) : $atts;

		$el_class = $html = $css = '';
		extract( shortcode_atts(
			array(
				'el_class'=>'',
				'css'=>'',
				//custom
				'title'=>'',
			), $atts ));
		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class).$extra_class->shortcode_custom_css_class($css, ' ');
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_small_title', $atts );
		$html .='<div class="solarize-small-section-title '.$css_class.'">
				<h3>'.esc_attr($title).'</h3>
				<div class="subtitle">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="clearfix"></div>
						</div>';
		$html .='</div>';
		return $html;
	}

//******************************************************************************************************/
// Box
//******************************************************************************************************/
	static function solarize_box( $atts , $content = null) {
		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_box', $atts ) : $atts;

		$el_class = $html = $css ='';
		extract( shortcode_atts(
			array(
				'el_class'=>'',
				//custom
				'title'=>'',
				'link_text'=>'Read more',
				'link'=>'#',
			), $atts ));
		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_box', $atts );
		$html = '<div class="solarize-box '.$css_class.'">';
		$html .= '<div class="solarize-box-inner">';
		$html .= '<div class="box-content">';
		$html .= '<h3>'.esc_attr($title).'</h3>';
		$html .=  apply_filters('the_content',$content);
		$html .=  '<a href="'.esc_url($link).'" title="">'.esc_attr($link_text).'</a>';
		$html .='</div>';
		$html .='</div>';
		$html .='</div>';
		return $html;
	}

//******************************************************************************************************/
// Call to action
//******************************************************************************************************/
	static function solarize_call_to_action( $atts , $content = null) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_call_to_action', $atts ) : $atts;

		$el_class = $html = $css ='';

		extract( shortcode_atts(
			array(
				'el_class'=>'',
				//custom
				'solarize_cta_title'=>'',
				'solarize_cta_title'=>'',
				'color_title'=>'',
				'solarize_cta_text_link'=>'',
				'solarize_cta_url'=>'',
				'color_hover_button'=>'',
				'color_button'=>'',
				'color_border_button'=>'',
				'style_border_button'=>'',
				'width_border_button'=>'',
				'color_text_button'=>'',
				'color_text_description'=>'',
				'color_text_button_hover'=>'',

			), $atts ));
		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class).' solarize-CTA';
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_call_to_action', $atts );

		$border_button_style ='border:'.$width_border_button.'px '.$style_border_button.' '.$color_border_button.'';


		$dem_button =rand(0,1000);
		$html .='<div class="'.$css_class.'">
						<div class="row">
							<div class="col-lg-7 col-md-7 col-sm-9 col-xs-12">
								<div class="solarize-left-CTA" style="color:'.esc_attr($color_text_description).';">
									<h3 style="color:'.esc_attr( $color_title).';">'.apply_filters('the_title',$solarize_cta_title).'</h3>';
		$html  .= apply_filters('the_content',$content);
		$html	.='</div>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-3 col-xs-12">
								<div class="solarize-right-CTA solarize-right-CTA-'.$dem_button.'">
									<a class="solarize-style-button-cta" style="background:'.$color_button.';color:'.$color_text_button.';'.$border_button_style.'" href="'.esc_url($solarize_cta_url).'">'.$solarize_cta_text_link.'</a>
								</div>
							</div>
						</div>
					</div>
					<script>
						jQuery(document).ready(function(){
						  jQuery(".solarize-right-CTA-'.$dem_button.' a.solarize-style-button-cta").hover(function(){
						    jQuery(".solarize-right-CTA-'.$dem_button.' a.solarize-style-button-cta").css("background","'.esc_attr($color_hover_button).'");
						    jQuery(".solarize-right-CTA-'.$dem_button.' a.solarize-style-button-cta").css("color","'.esc_attr($color_text_button_hover).'");
						    },function(){
						    jQuery(".solarize-right-CTA-'.$dem_button.' a.solarize-style-button-cta").css("background","'.esc_attr($color_button).'");
						    jQuery(".solarize-right-CTA-'.$dem_button.' a.solarize-style-button-cta").css("color","'.esc_attr($color_text_button).'");
						  });
						});
					</script>';
		return $html;
	}
//******************************************************************************************************/
// Service icon
//******************************************************************************************************/
	static function solarize_service_icon( $atts , $content = null) {
		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_service_icon', $atts ) : $atts;
		$el_class = $html = $css = '';

		extract( shortcode_atts(
			array(
				'el_class'=>'',
				//custom

				'style' => '',
				//counter for style 2
				'count'=>'0',
				'count_position'=>'left',
				//icon
				'i_type'=>'fontawesome',
				'i_icon_fontawesome'=>'',
				'i_icon_openiconic'=>'',
				'i_icon_typicons'=>'',
				'i_icon_entypo'=>'',
				'i_icon_linecons'=>'',

				'content_align'=>'',
				'service_title'=>'',
				'service_url'=>'#',
				'show_readmore'=>'0',
				'readmore_text'=>'',
			), $atts ));
		$iconClass = isset( ${"i_icon_" . $i_type} ) ? esc_attr( ${"i_icon_" . $i_type} ) : 'fa fa-adjust';
		vc_icon_element_fonts_enqueue( $i_type );

		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$el_class .= ' service-content-'.$content_align;
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_service_icon', $atts );

		if($style == 'style-1'){
			$html .='<div class="solarize-service service-style-1 clearfix '.$css_class.'">';
			$html .='<div class="service-icon"><i class="'.$iconClass.'"></i></div>';
			if($show_readmore == 1){
				$html .='<h3 class="service-title">'.esc_attr($service_title).'</h3>';
			}
			else{
				$html .='<h3 class="service-title"><a href="'.esc_url($service_url).'">'.esc_attr($service_title).'</a></h3>';
			}
			$html .='<div class="service-content">'.apply_filters('the_content',$content).'</div>';
			if($show_readmore == 1){
				$html .='<a class="read-more button" href="'.esc_url($service_url).'">'.esc_attr($readmore_text).'</a>';
			}
			$html .='</div>';
		}
		elseif($style == 'style-2'){
			$html .='<div class="solarize-service service-style-2 clearfix '.esc_attr($css_class).'">';
				$html .='<div class="row">';
					if($count_position == 'left'){
						$html .='<div class="col-md-4">';
						$html .='<div class="counting">'.$count.'</div>';
						$html .='</div>';
					}
					$html .='<div class="col-md-8">';
						$html .='<div class="service-wrap">';
							$html .='<div class="service-icon"><i class="'.$iconClass.'"></i></div>';
							if($show_readmore == 1){
								$html .='<h3 class="service-title">'.esc_attr($service_title).'</h3>';
							}
							else{
								$html .='<h3 class="service-title"><a href="'.esc_url($service_url).'">'.esc_attr($service_title).'</a></h3>';
							}
							$html .='<div class="service-content">'.apply_filters('the_content',$content).'</div>';
							if($show_readmore == 1){
								$html .='<a class="read-more button" href="'.esc_url($service_url).'">'.esc_attr($readmore_text).'</a>';
							}
						$html .='</div>';
					$html .='</div>';
					if($count_position == 'right'){
						$html .='<div class="col-md-4">';
						$html .='<div class="counting">'.$count.'</div>';
						$html .='</div>';
					}
				$html .='</div>';
			$html .='</div>';
		}

		return $html;
	}

//******************************************************************************************************/
// Service
//******************************************************************************************************/
	static function solarize_service( $atts , $content) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_service', $atts ) : $atts;
		$html = $el_class = $css_animation = '';
		extract( shortcode_atts(
			array(
				'el_class' => '',
				'service'  => '',
				'thumb_size' => 'full'
			), $atts ));

		// General args
		$post = get_post($service);

		if($post){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $thumb_size );
			$alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
			$html .='<div class="solarize-service">
					<div class="gri">
						<figure class="effect-layla">
								<img src="'.esc_url($image[0]).'" alt="'.esc_attr($alt).'"/>
								<figcaption>
								</figcaption>
						</figure>
					</div>
					<div class="clearfix"></div>
					<h4>'.get_the_title($post->ID).'</h4>';
			if($post->post_excerpt){
				$html .= apply_filters('the_excerpt',$post->post_excerpt);
			}
			else
			{
				$html .= apply_filters('the_content',wp_trim_words($post->post_content, 20, ''));
			}
			$html .= '<div class="button-group">
				<a href="'.get_permalink($post->ID).'" title="'.__('More', 'solarize').'" class="readmore button outline">'.__('More', 'solarize').'</a>
				<a href="'.get_post_meta($post->ID, 'solarize_service_estimation_url', true).'" title="'.__('Get Estimation', 'solarize').'" class="estimation button outline">'.__('Get Estimation', 'solarize').'</a>
			</div>';
			$html .='</div>';
		}

		return $html;
	}

//******************************************************************************************************/
// Pricing Table
//******************************************************************************************************/
	static function solarize_pricing_table( $atts , $content = null) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_pricing_table', $atts ) : $atts;

		$html = '';
		extract( shortcode_atts(
			array(
				'css' => '',
				//custom
				'pricing_table_style'=>'',
				'pricing_title'=>'',
				'pricing_currency'=>'',
				'pricing_price'=>'',
				'pricing_unit'=>'',
				'pricing_link_button'=>'',
				'pricing_text_button'=>'',
				'class_active'=>'',
				'pricing_subtitle'=>'',
				'pricing_image'=>'',
				'pricingi_type' => 'fontawesome',
				'pricingi_icon_fontawesome'=>'',
				'pricingi_icon_openiconic'=>'',
				'pricingi_icon_typicons'=>'',
				'pricingi_icon_entypo'=>'',
				'pricingi_icon_linecons'=>'',

			), $atts ));

		// Content
		if($pricing_table_style =='style1')	{
			$html .='<div class="solarize-pricing-table-style1 '.$class_active.'">
								<div class="currency-price-unit">
									<span class="currency">'.$pricing_currency.'</span>
									<span class="price">'.$pricing_price.'</span>
									<span class="unit">'.$pricing_unit.'</span>
								</div>
								<h3>'.esc_attr($pricing_title).'</h3>';
			$html .= apply_filters('the_content',$content);
			$html .='<a class="cta_pricing" href="'.esc_url($pricing_link_button).'">'.$pricing_text_button.'</a>
							</div>';
		}elseif($pricing_table_style=='style2'){
			$html .='<div class="solarize-pricing-table-style2 '.$class_active.'">
							<h3>'.$pricing_title.'</h3>
							<div class="currency-price-unit">
								<span class="currency">'.$pricing_currency.'</span>
								<span class="price">'.$pricing_price.'</span>
								<span class="unit">'.$pricing_unit.'</span>
								</div>';
			$html .= apply_filters('the_content',$content);
			$html .='<a class="cta_pricing" href="'.esc_url($pricing_link_button).'">'.$pricing_text_button.'</a>
							</div>';
		}elseif($pricing_table_style =='style3'){
			vc_icon_element_fonts_enqueue( $pricingi_type );
			$iconClass = isset( ${"pricingi_icon_" . $pricingi_type} ) ? esc_attr( ${"pricingi_icon_" . $pricingi_type} ) : 'fa fa-adjust';

			$html .='<div class="solarize-pricing-table-style3 clearfix '.$class_active.'">';
			$html .='	<div class="pricing-table-inner"><div class="pricing-title">
							<h3>'.esc_attr($pricing_title).'</h3>';
							if($pricing_subtitle){
								$html .='<p>'.esc_attr( $pricing_subtitle).'</p>';
							}
			$html .='	</div>';
			$html .='	<div class="currency-price-unit-icon">
							<span class="pricing-icon"><i class="'.esc_attr($iconClass).'"></i></span>
							<h3 class="currency-price-unit">
								<span class="currency">'.$pricing_currency.'</span>
								<span class="price">'.$pricing_price.'</span>
								<span class="unit">'.$pricing_unit.'</span>
							</h3>
						</div>';
			$html .= apply_filters('the_content',$content);
			$html .='<div class="pricing-button">';
			if($pricing_image){
				$pricing_image = wp_get_attachment_image_src( $pricing_image, 'pricing' );
				$html .=' <img src="'.esc_url($pricing_image[0]).'" alt="" />';
			}
			$html .=' <a class="cta_pricing" href="'.esc_url($pricing_link_button).'">'.$pricing_text_button.'</a>
					</div>
							</div></div>';
		}
		return $html;
	}
//******************************************************************************************************/
// FunFact
//******************************************************************************************************/
	static function solarize_funfact( $atts , $content = null) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_funfact', $atts ) : $atts;

		$html = '';

		extract( shortcode_atts(
			array(
				// alway
				'css' => '',
				//custom
				'i_type' => 'fontawesome',
				'i_icon_fontawesome'=>'',
				'i_icon_openiconic'=>'',
				'i_icon_typicons'=>'',
				'i_icon_entypo'=>'',
				'i_icon_linecons'=>'',

				'number_funfact' =>'',
				'unit_funfact' =>'',
				'speed_funfact' =>'1000',
				'add_comma' => '',
				'name_funfact' =>'',

				'custom'=>'',
				'color_icon' =>'',
				'color_text' =>'',
			), $atts ));

		vc_icon_element_fonts_enqueue( $i_type );

		$iconClass = isset( ${"i_icon_" . $i_type} ) ? esc_attr( ${"i_icon_" . $i_type} ) : 'fa fa-adjust';

		$funfact_settings = array();
		$funfact_settings['to'] = $number_funfact;
		$funfact_settings['speed'] = (int)$speed_funfact;
		$funfact_settings['add_comma'] = $add_comma ? true : false;

		$text_style = $icon_style = '';
		if($custom == 'true'){
			$text_style = 'style="color:'.esc_attr($color_text).'"';
			$icon_style = 'style="color:'.esc_attr($color_icon).'"';
		}
		$html .='<div class="solarize-funfact" '.$text_style.' data-settings="'.esc_attr(json_encode((object)$funfact_settings)).'">
							<span class="funfact-icon" '.$icon_style.'><i class="'.esc_attr($iconClass).'"></i></span>
							<div class="funfact-number-unit">
								<span data-number="'.esc_attr($number_funfact).'" class="funfact-number">'.$number_funfact.'</span>';
		if($unit_funfact !=''){
			$html .='			<span class="funfact-unit">'.$unit_funfact.'</span>';
		}
		$html .='		</div>
							<p '.$text_style.'>'.$name_funfact.'</p>
					</div>';
		return $html;
	}
//******************************************************************************************************/
// FunFact
//******************************************************************************************************/
	static function solarize_funfact_style2( $atts , $content = null) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_funfact_style2', $atts ) : $atts;

		$html = '';

		extract( shortcode_atts(
			array(
				// alway
				'css' => '',
				//custom
				'custom' => '',
				'color_number' =>'',
				'color_title' =>'',
				'color_text' =>'',
				'number_funfact' =>'',
				'unit_funfact' =>'',
				'speed_funfact' =>'1000',
				'add_comma' => '',
				'name_funfact' =>'',
			), $atts ));

		$funfact_settings = array();
		$funfact_settings['to'] = $number_funfact;
		$funfact_settings['speed'] = (int)$speed_funfact;
		$funfact_settings['add_comma'] = $add_comma ? true : false;

		$text_style = $title_style = $number_style = '';
		if($custom == 'true'){
			$text_style = 'style="color:'.esc_attr($color_text).'"';
			$title_style = 'style="color:'.esc_attr($color_title).'"';
			$number_style = 'style="color:'.esc_attr($color_number).'"';
		}

		$html .='<div class="solarize-funfact solarize-funfact-style2" data-settings="'.esc_attr(json_encode((object)$funfact_settings)).'">
							<div class="funfact-number-unit" '.$number_style.'>
								<span data-number="'.esc_attr($number_funfact).'" class="funfact-number">'.$number_funfact.'</span>';
		if($unit_funfact !=''){
			$html .='			<span class="funfact-unit">'.$unit_funfact.'</span>';
		}
		$html .='		</div>
							<div class="solarize-funfact-info" '.$text_style.'>
								<h5 '.$title_style.'>'.$name_funfact.'</h5>
								'.apply_filters('the-content',$content).'
							</div>
					</div>';
		return $html;
	}
//******************************************************************************************************/
// Testimonials
//******************************************************************************************************/
	static function solarize_testimonials( $atts , $content) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_testimonials', $atts ) : $atts;

		$html = $el_class = $css_animation = '';
		extract( shortcode_atts(
			array(
				'el_class' 				 => '',
				'testimonial_show_categories' => '',
				'number_post_testimonial' => '3',
				'auto_play' => 'true',
				'slide_speed' => '200',
				'stop_on_hover' => 'false',
				'navigation'=> 'true',
				'pagination'  =>'false',
			), $atts ));

		global $post;
		// General args

		$args = array(
			'posts_per_page'=>$number_post_testimonial,
			'post_type' => 'testimonial',
			'tax_query' => array(
				array(
					'taxonomy' => 'testimonials_cats',
					'field' => 'slug',
					'terms' => $testimonial_show_categories,
				)
			)

		);
		//$solarize_testimonials =  query_posts( $args );
		$solarize_testimonials = new WP_Query( $args );

		$carousel_config = array();
		$carousel_config['autoPlay'] = $auto_play == 'true' ? true : false;
		$carousel_config['slideSpeed'] = (int)$slide_speed;
		$carousel_config['stopOnHover'] = $stop_on_hover == 'true' ? true : false;
		$carousel_config['navigation'] = $navigation == 'true' ? true : false;
		$carousel_config['pagination'] = $pagination == 'true' ? true : false;

		$html .= '';
		$html .='<div class="solarize-testimonial" data-settings="'.esc_attr(json_encode((object)$carousel_config)).'">';
		if ( $solarize_testimonials->have_posts() ) :
			while ( $solarize_testimonials->have_posts() ) : $solarize_testimonials->the_post();
				$testimonials_name = get_post_meta( $post->ID, 'solarize_testimonials_name', true );
				$testimonial_author_pos = get_post_meta( $post->ID, 'solarize_testimonials_position', true );
				$testimonials_website = get_post_meta( $post->ID, 'solarize_testimonials_website', true );
				$testimonials_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'testimonial' );
				$html .= '<div class="solarize-item-testimonial text-center">
							<div class="client-quote">';
				if($post->post_excerpt){
					$html .= apply_filters('the_excerpt',$post->post_excerpt);
				} else {
					$html .= apply_filters('the_content',$post->post_content);
				}
				$html .='	</div>
							<div class="info-testimonial">
								<div class="client-info">
									<span class="client-name">'.$testimonials_name.'</span>
									<span class="client-position">'.$testimonial_author_pos.'</span>
								</div>
								<div class="client-avatar">
									<figure><a href="'.esc_url($testimonials_website).'"><img src="'.esc_url($testimonials_image[0]).'" alt=""></a></figure>
								</div>
							</div>
						</div>';
			endwhile;
		endif;
		wp_reset_postdata();
		$html .='</div>';

		return $html;

	}

//******************************************************************************************************/
// Client Worker
//******************************************************************************************************/
	static function solarize_client_work( $atts , $content) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_client_work', $atts ) : $atts;

		$html = '';
		extract( shortcode_atts(
				array(
					'onclick' => 'link_image',
					'custom_links' => '',
					'img_size' => 'client-work',
					'images' => '',
					'auto_play' => 'true',
					'slide_speed' => '200',
					'stop_on_hover' => 'false',
					'navigation'=> 'true',
					'pagination'  =>'false',
					'items_display'  =>'',
					'el_class' => '',
				), $atts )
		);

		$carousel_config = array();
		$carousel_config['autoPlay'] = $auto_play == 'true' ? true : false;
		$carousel_config['slideSpeed'] = (int)$slide_speed;
		$carousel_config['stopOnHover'] = $stop_on_hover == 'true' ? true : false;
		$carousel_config['navigation'] = $navigation == 'true' ? true : false;
		$carousel_config['pagination'] = $pagination == 'true' ? true : false;
		if($items_display){
			$carousel_config['itemsCustom'] = json_decode($items_display);
		}

		if ( $images == '' ) $images = '-1,-2,-3';
		if ( $onclick == 'custom_link' ) {
			$custom_links = explode( ',', $custom_links );
		}
		$images = explode( ',', $images );
		$i = - 1;
		$html .= '<ul class="solarize-client-list" data-settings="'.esc_attr(json_encode((object)$carousel_config)).'">';
		foreach ( $images as $attach_id ):
			$i++;
			if ( $attach_id > 0 ) {
				$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ) );
			} else {
				$post_thumbnail = array();
				$post_thumbnail['thumbnail'] = '<figure><img src="' . vc_asset_url( 'vc/no_image.png' ) . '" /></figure>';
				$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
			}
			$thumbnail = $post_thumbnail['thumbnail'];

			$html.= '<li class="client-item">';
			if ( $onclick == 'link_image' ){
				$p_img_large = $post_thumbnail['p_img_large'];
				$html.= '<a href="'.$p_img_large[0].'" >'.$thumbnail.'</a>';
			}
			elseif ( $onclick == 'custom_link' && isset( $custom_links[$i] ) && $custom_links[$i] != '' ){
				$html.= '<a href="'.$custom_links[$i].'" target="_blank">'.$thumbnail.'</a>';
			}
			else{
				$html.= $thumbnail ;
			}
			$html.= '</li>';
		endforeach;
		$html .= '</ul>';
		return $html;
	}
//******************************************************************************************************/
// lastest Blog
//******************************************************************************************************/
	static function solarize_lastest_blog( $atts , $content = null) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_lastest_blog', $atts ) : $atts;

		$el_class = $html = '';
		extract( shortcode_atts(
				array(
					'css_class'=>'',
					/*'number_post'=>'',*/
				), $atts )
		);

		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_lastest_blog', $atts );

		$args = array(
			'posts_per_page' => 3,
			'post_type'=>'post',
			'suppress_filters' => false
		);
		$lasted_blog = get_posts( $args);

		$html .='<div class="solarize-lastest-blog '.$css_class.'">';
		$html .='<div class="row">';
		foreach ($lasted_blog as $post ) {
			$html .='<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="blog-post">
					<div class="gri">
						<figure class="effect-layla">
							'.get_the_post_thumbnail( $post->ID, 'medium' ).'
							<figcaption>
								<div class="blog-date">
									<h5>'.get_the_time('d', $post->ID).'</h5>
									<h5>'.get_the_time('M', $post->ID).'</h5>
								</div>
							</figcaption>
						</figure>
					</div>
					<div class="clearfix"></div>
					<h4>'.get_the_title($post->ID).'</h4>';
					if($post->post_excerpt){
						$html .= apply_filters('the_excerpt',$post->post_excerpt);
					}
					else
					{
						$html .= apply_filters('the_content',wp_trim_words($post->post_content, 20, ''));
					}
					$html .= '<div class="button-group">
						<a href="'.get_permalink($post->ID).'" title="'.__('Read More', 'solarize').'" class="readmore button outline">'.__('Read More', 'solarize').'</a>
					</div>';
			$html .='</div>';
			$html .='</div>';
		}
		$html .='</div>';
		$html .='</div>';

		return $html;
	}

//******************************************************************************************************/
// Twitter slide
//******************************************************************************************************/
	static function solarize_twitter( $atts , $content = null) {
		$html = $css ='';

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_twitter', $atts ) : $atts;

		extract( shortcode_atts(
			array(
				'number_tweet'=>'',
				'css'=>'',
				//custom
				'number_twitter'=>'',
				'max_length' => ''
			), $atts ));
		$tweets = array();
		if (class_exists('TwitterOAuth')) {
			$number = intval($number_tweet);
			$tweets = getTweets($number);
		}
		$html .= '<div class="solarize-twitter-slide text-center">
				<i class="icon-twitter ti-twitter"></i>
				<div id="owl-twitter" class="twitter-slide">';
		if( $tweets){
			foreach($tweets as $tweet){
				$html .='<div class="twitter-item">';
				$text = str_replace($tweet['entities']['urls']['0']['url'] , '', $tweet['text']);
				if($max_length){
					$text = wp_trim_words($text , $max_length, '...' );
				}
				$html .='<p>'.$text.'</p>
        		<a href="'.esc_url($tweet['entities']['urls']['0']['url']).'" target="_blank">'.$tweet['entities']['urls'][0]['url'].'</a>
        		<span>'.solarize_timeAgo($tweet['created_at']).'</span>
                </div>';
			}} else {
			$html .='<div class="twitter-item">
                <p>Please install and config "oAuth Twitter Feed for Developers" plugin first! <a href="'.admin_url('plugins.php').'">Go to plugin</a></p>
                </div> ';
		}
		$html .='</div>
			</div>';


		return $html;
	}
//******************************************************************************************************/
// Dropcap
//******************************************************************************************************/
	static function solarize_text_dropcap( $atts , $content = null) {
		// Attributes

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_text_dropcap', $atts ) : $atts;

		extract( shortcode_atts(
				array(
					'choose_style_dropcap'=>'',
					'first_text' => '',
					'background_color_fisttext' => '',
					'color_fisttext' => '',
				), $atts )
		);
		if($choose_style_dropcap=='style1'){
			$html = '<span class="solarize-dropcap-'.$choose_style_dropcap.'" style="background-color:'.$background_color_fisttext.';color:'.$color_fisttext.';">'.$first_text.'</span>'.apply_filters('the_content', $content).'';
		}else{
			$html = '<span class="solarize-dropcap-'.$choose_style_dropcap.'" style="color:'.$color_fisttext.'">'.$first_text.'</span>'.apply_filters('the_content', $content).'';
		}
		return $html;
	}
//******************************************************************************************************/
// Team Member
//******************************************************************************************************/
	static function solarize_team_member( $atts , $content = null) {
		$html = $el_class = $css_animation = '';

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_team_member', $atts ) : $atts;

		extract( shortcode_atts(
			array(
				// alway
				'el_class' => '',
				//custom
				'image'=>'',
				'img_size'=>'',
				'name_member' =>'',
				'member_postion' =>'',
				'socials' => '',
			), $atts ));

		$alt = get_post_meta($image, '_wp_attachment_image_alt', true);
		$image = wp_get_attachment_image_src($image, $img_size);

		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_team_member' ,$atts );
		$html .='<div class="team-item '.$css_class.'">
				 <img alt="'.esc_attr($alt).'" src="'.esc_url($image[0]).'">';
		$html .='<div class="content-team">';
		$html .='<h4>'.$name_member.'</h4>';
		$html .='<p>'.$member_postion.'</p>';
		$html .='<ul class="social-agents">';
			if($socials){
				$social_list = explode("\n", $socials);
				foreach($social_list as $social){
					$social = explode('|', strip_tags($social));
					$html .='<li><a target="_blank" title="" href="'.esc_url(isset($social[1]) ? $social[1] : '#').'"><i class="fa '.$social[0].'"></i></a></li>';
				}
			}
		$html .='</ul>';
		$html .='</div>';
		$html .='</div>';

		return $html;
	}
//******************************************************************************************************/
	/*	Skillbar Shortcode
    //******************************************************************************************************/

	static function solarize_skillbar_shortcode( $atts, $content = null ) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_skillbar_shortcode', $atts ) : $atts;

		$output = $el_class ='';

		extract( shortcode_atts( array(
			'values' => '',
			'units' => '%',
			'custom_skillbar'=>'',
			'skillbar_background_color' => '',
			'percentbar_background_color' => '',
			'skill_bar_text_color' => '',
			'skill_bar_style' => '',
			'skill_bar_title' => '',
			'skill_bar_subtitle' => '',
			'skill_bar_text_button' => '',
			'skill_bar_link_button' => '',
		), $atts ) );

		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column ' . $el_class, 'solarize_skillbar_shortcode', $atts );

		$array_values = explode(",", $values);

		$_skillbar_style = $_skill_bar_bg_style = $_skillbar_bar_style = '';
		if($custom_skillbar){
			$_skillbar_style = 'style="color: '.$skill_bar_text_color.';"';
			$_skill_bar_bg_style = 'style="color: '.$skillbar_background_color.';"';
			$_skillbar_bar_style = 'style="color: '.$percentbar_background_color.';"';
		}
		if($skill_bar_style=='skillbarstyle1'){
			$output .= '<div class="'.$css_class.'">';
			$output .= '<div class="'.$skill_bar_style.'" '.$_skillbar_style.'>';
			foreach($array_values as $skill_value) {
				$data = explode("|", $skill_value);
				$output .= '<div class="skillbar clearfix " data-percent="'.$data['0'] . $units.'">
									<div class="skillbar-title"><span>'.$data['1'].'</span></div>
										<div class="skill-bar-bg" '.$_skill_bar_bg_style.'>
										<div class="skillbar-bar" '.$_skillbar_bar_style.'>
											<div class="skill-bar-percent">'.$data['0'].$units .'</div>
										</div>
									</div>
								</div>';
			}

			$output .='</div>';
			$output .='</div>';

		}elseif($skill_bar_style=='skillbarstyle2') {
			$output .= '<div class="'.$css_class.'">';
			$output .= '<div class="'.$skill_bar_style.'" '.$_skillbar_style.'>';
			foreach($array_values as $skill_value) {
				$data = explode("|", $skill_value);
				$output .= '<div class="skillbar clearfix " data-percent="'.$data['0'] . $units.'">
								<div class="skill-bar-bg" '.$_skill_bar_bg_style.'>
								<div class="skillbar-bar" '.$_skillbar_bar_style.'>
									<div class="skill-bar-percent"><span>'.$data['1'].'</span>('.$data['0'].$units .')</div>
								</div>
							</div>
						</div>';
			}
			$output .='</div>';
			$output .='</div>';
		}
		else{
			$output .= '<div class="'.$css_class.'">';
			$output .= '<div class="'.$skill_bar_style.'" '.$_skillbar_style.'>';
			foreach($array_values as $skill_value) {
				$data = explode("|", $skill_value);
				$output .= '<div class="skillbar clearfix " data-percent="'.$data['0'] . $units.'">
									<div class="skillbar-title"><span>'.$data['1'].'</span></div>
										<div class="skill-bar-bg" '.$_skill_bar_bg_style.'>
										<div class="skillbar-bar" '.$_skillbar_bar_style.'></div>
										<span class="skill-bar-percent">'.$data['0'].$units .'</span>
									</div>
								</div>';
			}
			$output .='</div>';
			$output .='</div>';
		}
		return $output;
	}

//******************************************************************************************************/
// Process bar
//******************************************************************************************************/
	static function solarize_process_bar( $atts , $content = null) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_process_bar', $atts ) : $atts;

		// Attributes
		$html = '';
		extract( shortcode_atts(
			array(
				'el_class' => '',
				'title_skill'=>'',
				'number_skill'=>'',
				'unit_skill'=>'',
				'fontsize_skill' =>'',
				'dimension_skill'=>'',
				'width_skill'=>'',
				'color_skill'=>'',
				'bgcolor_skill'=>'',
				'custom_skill'=>'',
				'color_title_skill'=>'',
				'color_text_skill'=>'',
			), $atts ));
		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_process_bar',$atts );
		$skill_title_style = $skill_description_style = '';
		if($custom_skill == 'true'){
			$skill_title_style = 'style="color:'.$color_title_skill.'"';
			$skill_description_style = 'style="color:'.$color_text_skill.'"';
		}
		$html .='<div class="item-circles '.$css_class.'" style="color:'.$color_title_skill.';">
                <div class="circlestat" data-dimension="'.$dimension_skill.'" data-text="'.$number_skill.$unit_skill.'" data-width="'.$width_skill.'" data-fontsize="'.$fontsize_skill.'" data-percent="'.$number_skill.'" data-fgcolor="'.$color_skill.'" data-bgcolor="'.$bgcolor_skill.'" data-fill="transparent"></div>
                <div class="process_info text-center">
                	<h5 class="skill-title" '.$skill_title_style.'>'.$title_skill.'</h5>
                	<div class="skill-description" '.$skill_description_style.'>'.apply_filters('the_content',$content).'</div>
            	</div>
            </div>';

		return $html;
	}

//******************************************************************************************************/
// CountDown
//******************************************************************************************************/
	static function solarize_countdown( $atts , $content = null) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_countdown', $atts ) : $atts;

		// Attributes
		$html = '';
		extract( shortcode_atts(
				array(
					'el_class' => '',
					'countdown_style'=>'',
					'date_countdown'=>'',
				), $atts )
		);
		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_countdown', $atts );

		$dem = rand(1,1000);


		$html .='
	<div class="solarize-countdown-'.$dem.' '.$countdown_style.' '.$css_class.'">
	 	<div class="solarize-date-countdown solarize-day-count">
	        <span class="day-'.$dem.' date"></span>
	        <span class="month">DAY</span>
    	</div>
    	<div class="solarize-date-countdown">
	        <span class="hour-'.$dem.' date"></span>
	        <span class="month">HOURS</span>
    	</div>
    	<div class="solarize-date-countdown">
	        <span class="minute-'.$dem.' date"></span>
	        <span class="month">MINUTE</span>
    	</div>
    	<div class="solarize-date-countdown">
	        <span class="second-'.$dem.' date"></span>
	        <span class="month">SECONDS</span>
    	</div>
	 </div>';


		$countdown_ts = stripcslashes( $date_countdown);
		$items   = preg_split( '/\t\r\n|\r|\n/', $countdown_ts );
		foreach($items as $item){
			$extracts = explode("|", $item);
			$extract_date = explode("/", $extracts[0]);
			$extract_time = explode("/", $extracts[1]);
			$html .='<script type="text/javascript">
				jQuery(function($){
				 $(\'.solarize-countdown-'.$dem.'\').countdown(\''.$extract_date[0].'/'.$extract_date[1].'/'.$extract_date[2].' '.$extract_time[0].':'.$extract_time[1].':'.$extract_time[2].'\', function(event) {
			    	var solarize_day = event.strftime(\'%-D\');
			    	var solarize_hour = event.strftime(\'%-H\');
			    	var solarize_minute = event.strftime(\'%-M\');
			    	var solarize_second = event.strftime(\'%-S\');
			    	$(\'.day-'.$dem.'\').html(solarize_day);
			    	$(\'.hour-'.$dem.'\').html(solarize_hour);
			    	$(\'.minute-'.$dem.'\').html(solarize_minute);
			    	$(\'.second-'.$dem.'\').html(solarize_second);
			  });
			});
			</script>';
		}
		return $html;
	}
//******************************************************************************************************/
// style button
//******************************************************************************************************/
	static function solarize_advanced_button( $atts , $content = null) {
		// Attributes
		$html = '';

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_advanced_button', $atts ) : $atts;

		extract( shortcode_atts(
			array(
				'choose_border'=>'',
				'size_button'=>'',
				'link_button'=>'',
				'postion_button'=>'',
				'color_button'=>'',
				'color_hover_button'=>'',
				'color_text_button'=>'',
				'color_text_hover_button'=>'',
				'border_button'=>'',
				'color_border_button'=>'',
				'style_border_button'=>'solid',
				'width_border_button'=>'2',
				'border_radius'=>'',
				'border_radius_width'=>'3',
				'border_custom_css'=> '',
				'border_custom_css_hover'=> '',
			), $atts ));

		$button_style = $button_style_hover = array();
		if($color_button){
			$button_style['background'] = "background: {$color_button}";
		}
		if($color_button){
			$button_style['color'] = "color: {$color_text_button}";
		}
		if($border_button=='yes'){
			$button_style['border'] = 'border: '.$width_border_button.'px '.$style_border_button.' '.$color_border_button;
		}
		if(isset($border_radius_width)){
			$button_style['border-radius'] = "border-radius: {$border_radius_width}px";
		}
		if(strip_tags($border_custom_css)){
			$button_style['custom'] = strip_tags(preg_replace( "/\r|\n/", "", $border_custom_css ));
		}

		$button_style_hover = $button_style;
		if($color_hover_button){
			$button_style_hover['background'] = "background: {$color_hover_button}";
			if($border_button=='yes'){
				$button_style_hover['border'] = 'border:'.$width_border_button.'px '.$style_border_button.' '.$color_hover_button;
			}
		}
		if($color_text_hover_button){
			$button_style_hover['color'] = "color: {$color_text_hover_button}";
		}
		if(strip_tags($border_custom_css_hover)){
			$button_style_hover['custom_hover'] = strip_tags(preg_replace( "/\r|\n/", "", $border_custom_css_hover));
		}

		$dem_button = rand(0,1000);
		$html .='<div class="solarize-button-text solarize-button-'.$dem_button.' '. $postion_button.'">
				<a href="'.esc_url($link_button).'" class="solarize-style-button '.$size_button.'" style="'.esc_attr(implode('; ', $button_style)).'">'.$content.'</a>
			</div>
			<script>
				jQuery(document).ready(function($){
				  $(".solarize-button-'.$dem_button.' a.solarize-style-button").hover(function(){
				    $(this).attr("style","'.esc_attr(implode('; ', $button_style_hover)).'");
				  },function(){
				    $(this).attr("style","'.esc_attr(implode('; ', $button_style)).'");
				  });
				});
			</script>';
		return $html;
	}

//******************************************************************************************************/
// Blockquoctes
//******************************************************************************************************/
	static function solarize_blockquote($atts, $content = ''){

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_blockquote', $atts ) : $atts;

		$html ='';
		extract( shortcode_atts(
			array(
				'style'=>'style1',
				'color_icon'=>'',
				'name_author' => '',
			), $atts ));
		if($style=='style1'){
			$html .='<div class="blog-quote-'.$style.' blog-quote">';
			$html .= apply_filters('the_content',$content);
			$html .='   <cite>'.esc_attr($name_author).'</cite>
					 </div>';
		}else{
			$html .='<div class="blog-quote-'.$style.' blog-quote">';
			$html .= apply_filters('the_content',$content);
			$html .='   <cite>'.esc_attr($name_author).'</cite>
					 </div>';
		}
		return $html;
	}


//******************************************************************************************************/
// solarize_messagebox
//******************************************************************************************************/
	static function solarize_notifications( $atts , $content) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_notifications', $atts ) : $atts;

		$output = '';
		extract(shortcode_atts(array(
			'choose_style_message_box'=>'',
			'choose_style_message' => '',
			'solarize_icon_message' => '',
			'solarize_title_message' => '',
			'solarize_color_title_message' => '',
			'color_title' => '',
		), $atts));
		if($choose_style_message=='info'){
			$solarize_icon_message = '<span><i class="fa fa-info"></i></span>';
		}
		if($choose_style_message=='warning'){
			$solarize_icon_message = '<span><i class="fa fa-exclamation"></i></span>';
		}
		if($choose_style_message=='success'){
			$solarize_icon_message = '<span><i class="fa fa-check"></i></span>';
		}
		if($choose_style_message=='error'){
			$solarize_icon_message = '<span><i class="fa fa-times"></i></span>';
		}
		if($solarize_color_title_message=='yes'){
			$color_title ='solarize-combined-notifications';
		}else{
			$color_title ='solarize-message-'.$choose_style_message_box;
		}
		if($choose_style_message_box=='no_boxed'){
			$dem = rand(0,1000);
			$output .='<div id="solarize-close-box-'.$dem.'" class="solarize-message '.$choose_style_message.'">'.$solarize_icon_message.'<div class="solarize-message-content"><p>'.apply_filters('the_title',$solarize_title_message).'</p></div><span class="solarize-close" onclick="document.getElementById(\'solarize-close-box-'.$dem.'\').style.display=\'none\'"><i class="fa fa-close"></i></span></div>';
		}else{
			$dem = rand(0,1000);
			$output .='<div id="solarize-close-box-'.$dem.'" class="'.$color_title.' '.$choose_style_message.'" >
							<div class="solarize-title-boxed">'.$solarize_icon_message.'
								<div class="solarize-message-content"><p>'.apply_filters('the_title',$solarize_title_message).'</p></div>
								<span class="solarize-close" onclick="document.getElementById(\'solarize-close-box-'.$dem.'\').style.display=\'none\'"><i class="fa fa-close"></i><span>
							</div>
							<div class="solarize-content-boxed">'.apply_filters('the_content',$content).'</div>
						</div>';
		}
		return $output;
	}
//******************************************************************************************************/
	/*	MAP
    //******************************************************************************************************/
	static function isMobile() {
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
	static function solarize_map_shortcode( $atts, $content = null ) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_map_shortcode', $atts ) : $atts;

		$output	='';
		extract( shortcode_atts( array(
			'css_basic'=>'',
			'height' => '500',
			'address' => '',
			'lat'=>'21.582668',
			'long'=>'105.807298',
			'title_map_title'=>'',
			'title_map_phone'=>'',
			'title_map_email'=>'',
			'title_map_website'=>'',
			'style'=>'light',
		), $atts ) );

		// $prepAddr = str_replace(' ','+',$address);		
		// $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?&address='.$prepAddr.'&sensor=false');
		// $output_ge= json_decode($geocode);
		// $lat = $output_ge->results[0]->geometry->location->lat;
		// $long = $output_ge->results[0]->geometry->location->lng;
		$map_id = 'map-'.rand(10, 1000);
		$output .='';
		$output .=' <div class="map-contact">
				 	<div id="'.$map_id.'" class="map-canvas" style="height:'.(int)$height.'px;width:100%;"></div>
					</div>
				<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript">
					   function initialize() {
						    var map_style_light = [
						      {
						        stylers: [
						          { hue: "#fd5047" }
						        ]
						      },{
						        featureType: "road",
						        elementType: "geometry",
						        stylers: [
						          { lightness: 100 },
						          { visibility: "simplified" }
						        ]
						      },{
						        featureType: "road",
						        elementType: "labels",
						        stylers: [
						          { visibility: "off" }
						        ]
						      }
						    ];

							var map_style_dark = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}];
						    var styledMap = new google.maps.StyledMapType(map_style_'.$style.', {name: "Styled Map"});

						    var mapCanvas = document.getElementById("'.$map_id.'");
						    var mapOptions = {
						        center: new google.maps.LatLng('.$lat.', '.$long.'),
						        zoom: 15,
						        mapTypeControlOptions: {
						          mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]
						        },
						        panControl: false,
							    zoomControl: true,							    
						        scrollwheel: false,
							    navigationControl: false,
							    mapTypeControl: true,
							    scaleControl: false,
							    draggable: '.(self::isMobile() ? 'false' : 'true').',
						      };
						    var map = new google.maps.Map(mapCanvas, mapOptions);
						    map.mapTypes.set("map_style", styledMap);
						    map.setMapTypeId("map_style");


						    	var locations = [
									[\''.$title_map_title.'\', \''.$address.'\', \''.$title_map_phone.'\', \''.$title_map_email.'\', \''.$title_map_website.'\','.$lat.', '.$long.']
									        ];
											var i;
											var description;
											var telephone;
											var email;
											var web;
											var marker;
											var link;
									        for (i = 0; i < locations.length; i++) {
												if (locations[i][1] ==\'undefined\'){ description =\'\';} else { description = locations[i][1];}
												if (locations[i][2] ==\'undefined\'){ telephone =\'\';} else { telephone = locations[i][2];}
												if (locations[i][3] ==\'undefined\'){ email =\'\';} else { email = locations[i][3];}
												if (locations[i][4] ==\'undefined\'){ web =\'\';} else { web = locations[i][4];}
									            marker = new google.maps.Marker({

									                position: new google.maps.LatLng(locations[i][5], locations[i][6]),
									                map: map,
									                title: locations[i][0],
									                desc: description,
									                tel: telephone,
									                email: email,
									                web: web
									            });
									            bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web);
									        }


							  	function bindInfoWindow(marker, map, title, desc, telephone, email, web) {
								    if (web.substring(0, 7) != "http://") {
								    link = "http://" + web;
								    } else {
								    link = web;
								    }
								    // iw.open(map,marker);
								      google.maps.event.addListener(marker, "click", function() {
								             var html= "<div style=\'color:#000;background-color:#fff;padding:5px;width:200px;\'><h4>"+title+"</h4><p>"+desc+"</p><i class=\'fa fa-phone\'></i> "+telephone+"<br/><i class=\'fa fa-envelope\'></i><a href=\'mailto:"+email+"\' >  "+email+"</a><br/><i class=\'fa fa-globe\'></i><a target=\'_blank\' href=\'"+link+"\'\' >  "+web+"</a></div>";
								             var iw = new google.maps.InfoWindow({content:html});
								            iw.open(map,marker);
								      });
								}
						    }
						    google.maps.event.addDomListener(window, "load", initialize);

				</script>';

		return $output;
	}
//******************************************************************************************************/
	/*	Divider
    //******************************************************************************************************/
	static function solarize_divider_shortcode( $atts , $content) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_divider_shortcode', $atts ) : $atts;

		$output = '';
		extract(shortcode_atts(array(
			'choose_style_divider'=>'',
			'choose_icon_text'=>'',
			'title_divider'=>'',
			'color_divider'=>'',
			'icon_divider'=>'',
			'width_divider'	=>'',
			'divider_style'	=>'',
			'style_divider'	=>'',
			'width_d'	=>'',
		), $atts));

		if($width_divider=='divider-md'){
			$width_d = 'divider-md';
		}elseif($width_divider=='divider-sm'){
			$width_d = 'divider-sm';
		}else{
			$width_d = '';
		}
		if($divider_style=='divider-2'){
			$style_divider = 'divider-2';
		}
		if($choose_style_divider=='style1'){
			$output .='<hr class="divider-hr '.$style_divider.' ' .$width_d.'">';
		}else {
			if($choose_icon_text=='text'){
				$output .='<div class="divider solarize-divider-'.esc_attr($choose_icon_text).' ' .$width_d.'">
							 	<div class="divider-content">
							 		<span style="color: '.esc_attr($color_divider).'">'.apply_filters('the_title',$title_divider).'</span>
							 	</div>
							</div>';
			}else{
				$output .='<div class="divider solarize-divider-'.esc_attr($choose_icon_text).' ' .$width_d.'">
							 	<div class="divider-content">
							 		<i style="color:'.esc_attr($color_divider).'" class="fa '.$icon_divider.' fa-1x"></i>
							 	</div>
							</div>';
			}
		}
		return $output;
	}


//******************************************************************************************************/
// Button
//******************************************************************************************************/
	static function solarize_simple_button($atts , $content = null){
		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_simple_button', $atts ) : $atts;
		extract( shortcode_atts(
			array(
				'css' => '',
				'el_class' => '',
				'link' => '',
				'color'=> 'accent',
				'size'=> 'normal',
			), $atts ));

		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class . $extra_class->shortcode_custom_css_class( $css, ' ' ), $atts );
		$html = '<a href="'.$link.'" class="button '.esc_attr($color.' '.$size).' '.$css_class.'">'.$content.'</a>';

		return $html;
	}

//******************************************************************************************************/
// vc_tour
//******************************************************************************************************/
	static function vc_tour( $atts , $content) {
		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'vc_tour', $atts ) : $atts;
		$el_class=$output = $title = $interval = $el_class = $collapsible = $active_tab = '';
		//
		extract(shortcode_atts(array(
			'title' => '',
			'el_class' => '',
			//'active_tab' => '',
		), $atts));
		$rand = rand(5,1000);
		wpb_js_remove_wpautop($content);
		global $vc_tab_atts;

		$output = '<div class="solarize-tour '.esc_attr($el_class).'">';
		$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'solarize-tour-heading'));
		if($vc_tab_atts){
			$output .= '<ul class="nav nav-tabs">';
			foreach($vc_tab_atts as $key=>$tab_atts){
				$output .= '<li '.($key == 0 ? 'class="active"' : '').'><a data-toggle="tab" href="#solarize-tour-'.($rand+$key).'">';
				if($tab_atts['add_icon'] == 'true'){
					vc_icon_element_fonts_enqueue( $tab_atts['i_type'] );
					$iconClass = isset($tab_atts["i_icon_" . $tab_atts['i_type']] ) ? esc_attr( $tab_atts["i_icon_" . $tab_atts['i_type']] ) : 'fa fa-adjust';
					$output .= '<i class="'.$iconClass.'"></i>';
				}
				if($tab_atts['sub_title']){
					$output .= '<span>'.$tab_atts['sub_title'].'</span>';
				}
				$output .= '<strong>'.($tab_atts['title'] ? $tab_atts['title'] : __("Section", "js_composer")).'</strong>';
				$output .= '</a></li>';
			}
			$output .= '</ul>';

			$output .= '<div class="tab-content">';
			foreach($vc_tab_atts as $key=>$tab_atts){
				$output .= '<div id="solarize-tour-'.($rand+$key).'" class="tab-pane fade'.($key == 0 ? ' active in' : '').'">';
				$output .= ($tab_atts['content']=='' || $tab_atts['content']==' ') ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($tab_atts['content']);
				$output .= '</div>';
			}
			$output .= '</div>';

			$vc_tab_atts = array();
		}
		$output .= '</div>';

		return $output;
	}

//******************************************************************************************************/
// vc_tabs
//******************************************************************************************************/
	static function vc_tabs( $atts , $content)
	{
		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'vc_tabs', $atts ) : $atts;
		$el_class=$output = $title = $interval = $el_class = $collapsible = $active_tab = '';
		//
		extract(shortcode_atts(array(
			'choose_style_accordion' => '',
			'title' => '',
			'el_class' => '',
			//'active_tab' => '',
		), $atts));

		wpb_js_remove_wpautop($content);
		global $vc_tab_atts;

		$output = '<div class="solarize-tabs '.esc_attr($el_class).'">';
		$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'solarize-tabs-heading'));
		if($vc_tab_atts){
			$output .= '<div class="solarize-tabs-content">';
			foreach($vc_tab_atts as $key=>$tab_atts){
				$output .= '<div class="solarize-tab">';
				if($tab_atts['add_icon'] == 'true' || $tab_atts['sub_title'] || $tab_atts['title'] ){
					$output .= '<div class="solarize-tab-heading">';
					if($tab_atts['add_icon'] == 'true'){
						vc_icon_element_fonts_enqueue( $tab_atts['i_type'] );
						$iconClass = isset($tab_atts["i_icon_" . $tab_atts['i_type']] ) ? esc_attr( $tab_atts["i_icon_" . $tab_atts['i_type']]) : 'fa fa-adjust';
						$output .= '<div class="solarize-tab-icon"><i class="'.$iconClass.'"></i></div>';
					}
					if($tab_atts['sub_title']){
						$output .= '<div class="solarize-tab-sub-title">'.$tab_atts['sub_title'].'</div>';
					}
					if($tab_atts['title']){
						$output .= '<div class="solarize-tab-title">'.$tab_atts['title'].'</div>';
					}
					$output .= '</div>';
				}
				$output .= '<div class="solarize-tab-content">';
				$output .= ($tab_atts['content']=='' || $tab_atts['content']==' ') ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($tab_atts['content']);
				$output .= '</div>';
				$output .= '</div>';
			}
			$output .= '</div>';

			$vc_tab_atts = array();

		}
		$output .= '</div>';

		return $output;
	}

//******************************************************************************************************/
// vc_tab
//******************************************************************************************************/
	static function vc_tab( $atts , $content) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'vc_tab', $atts ) : $atts;
		$atts = shortcode_atts(array(
			'el_class'=>'',
			'content'=>$content,
			'title' => '',
			'sub_title' => '',
			'add_icon'=>'',
			'i_type'=>'fontawesome',
			'i_icon_fontawesome'=>'',
			'i_icon_openiconic'=>'',
			'i_icon_typicons'=>'',
			'i_icon_entypo'=>'',
			'i_icon_linecons'=>'',
		), $atts);
		global $vc_tab_atts;
		$vc_tab_atts[] = $atts;

		/*global $solarize_config_accordion_content;
		$el_class=$output = $title = '';
		extract(shortcode_atts(array(
			'el_class'=>'',
			'title' => __("Section", "js_composer")
		), $atts));
		$css_class = $el_class;
		//$section_html = ''
		$solarize_accordion_section .= '<li>';
		$output .='<h3></i>'.esc_attr($title).'</h3>
							 <div class="acordion-content">';
		$output .= ($content=='' || $content==' ') ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
		$output .= 	'</div>';
		//$solarize_accordion_html .= $output;*/

		return '';

	}


	/*-----------------------------------------------------------------------------------*/
	/*	Portfolio Grid
    /*-----------------------------------------------------------------------------------*/

	static function solarize_portfolio_grid($atts, $content = null) {

		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_portfolio_grid', $atts ) : $atts;

		extract(shortcode_atts(array(
			"el_class" => "",
			"number" => "-1",
			"categories" => "",
			"portfolio_orderby"	=> "date",
			"portfolio_order"	=> "DESC",
			"show_filter" => "1",
			"allword" => "All",
			"initial_word" => "",
			"allbam" => ""
		), $atts));

		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_portfolio_grid', $atts );

		global $post;

		//wp_enqueue_script('dt-isotope');
		//wp_enqueue_script('dt-custom-isotope-portfolio');

		//$layout = get_post_meta($post->ID,'solarize_portfolio_columns',true);
		//$navig = get_post_meta($post->ID,'solarize_portfolio_navigation',true);
		//$nav_number = get_post_meta($post->ID,'solarize_nav_number',true);


		$cats = explode(",", $categories);

		if ( post_type_exists( 'portfolio' ) ) {
			$term_list = '';

			if(!$show_filter){
				$initial_word = '';
			}else{
				$initial_word = $initial_word ?  ($initial_word_term = get_term($initial_word) ? $initial_word_term->slug : '') : '';
			}

			$output = '';
			$output .= '<div class="solarize-portfolio '.$css_class.'" data-initial-word="'.$initial_word.'">';
			if($show_filter){
				$output .= '<ul class="filters clearfix" data-option-key="filter">';
				foreach ($cats as $cat) {
					$cat_data = get_term($cat, "portfolio_cats");
					if($cat_data){
						if (function_exists('icl_t')) {
							$term_list .= '<li><a href="#filter" data-option-value=".'. $cat_data->slug .'">' . icl_t('Portfolio Category', 'Term '.$cat_data->term_id.'', $cat_data->name) . '</a></li>';
						}
						else{
							$term_list .= '<li><a href="#filter" data-option-value=".'. $cat_data->slug .'">' . $cat_data->name . '</a></li>';
						}
					}
				}

				if($allbam == "") {
					$output .= '<li class="all-projects"><a href="#filter" data-option-value="*" class="selected active">'.$allword.'</a></li>';
					$output .= $term_list;
				}
				else {
					$output .= $term_list;
					$output .= '<li class="all-projects"><a href="#filter" data-option-value="*" class="selected active">'.$allword.'</a></li>';
				}
				$output .= '</ul>';
			}

			$output .= '<div id="portfolio-wrapper">';
			$output .= '<ul class="portfolio grid isotope">';

			$args = array(
				'post_type'=>'portfolio',
				'posts_per_page' => $number,
				'term' => 'portfolio_cats',
				'orderby' => $portfolio_orderby,
				'order'   => $portfolio_order,
				'tax_query'      => array(
					array(
						'taxonomy' => 'portfolio_cats',
						'field' => 'ids',
						'terms' => $cats,
					)
				)
			);

			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();

					$terms = get_the_terms( get_the_ID(), 'portfolio_cats' );
					$filter_class = array();
					$terms_name = array();
					if($terms) {
						foreach ($terms as $term) {
							$filter_class[] = $term->slug;
							$terms_name[] = $term->name;
						}
					}

					$portf_type = get_post_meta($post->ID,'solarize_portfolio_type',true);
					$portf_thumbnail_size = get_post_meta($post->ID,'solarize_portfolio_thumbnail_size',true);
					$portf_image = get_post_meta($post->ID,'solarize_portfolio_image',true);
					$portf_slider = get_post_meta($post->ID,'solarize_portfolio_slider', true);
					$portf_video = get_post_meta($post->ID,'solarize_portfolio_video',true);
					$portf_soundclound = get_post_meta($post->ID,'solarize_portfolio_soundcloud',true);

					$thumb_id = get_post_thumbnail_id($post->ID);
					$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

					$image_url = wp_get_attachment_url($thumb_id);

					//$grid_thumbnail = $image_url;
					//$item_class = 'item-small';

					switch ($portf_thumbnail_size) {
						case 'portfolio-big':
							$grid_thumbnail = aq_resize($image_url, 762, 526, true);
							$item_class = 'item-wide';
							break;
						case 'half-horizontal':
							$grid_thumbnail = aq_resize($image_url, 762, 263, true);
							$item_class = 'item-long';
							break;
						case 'half-vertical':
							$grid_thumbnail = aq_resize($image_url, 379, 526, true);
							$item_class = 'item-high';
							break;
						//case 'portfolio-small':
						default:
							$grid_thumbnail = aq_resize($image_url, 379, 263, true);
							$item_class = 'item-small';
							break;
					}

					if($portf_type == 'video') {
						$test_link = '<a href="'. esc_url($portf_video) .'" rel="prettyPhoto[portf_gal]" title="'. __('Quick view', 'solarize') .'"><i class="fa fa-search"></i></a>';
					}
					else if($portf_type == 'soundcloud') {
						$portf_image_url = $portf_image ? $portf_image : wp_get_attachment_url($thumb_id);
						$test_link = '<a href="'. esc_url($portf_image_url) .'" rel="prettyPhoto[portf_gal]" title="'. get_the_title() .'"><i class="fa fa-search"></i></a>';
						//$test_link = '<a href="'. esc_url($portf_soundclound) .'" rel="prettyPhoto[portf_gal]" title="'.  __('Quick view', 'solarize') .'"><i class="ti-search"></i></a>';
					}
					else if ($portf_type == 'slider') {
						$slider_output = '';
						if(!empty($portf_slider)) {
							foreach($portf_slider as $slider_item=>$slider_item_url) {
								$slider_output .= '<a class="hidden_image" href="'.esc_url($slider_item_url).'" rel="prettyPhoto[gallery_'.$post->ID.']" title="'. __('Quick view', 'solarize').'"><i class="fa fa-search"></i></a>';
							}
						}

						$test_link = '<a href="'. wp_get_attachment_url($thumb_id) .'" rel="prettyPhoto[gallery_'.$post->ID.']" title="'.  __('Quick view', 'solarize') .'" ><i class="fa fa-search"></i></a>' . $slider_output;
					}
					else{
						$portf_image_url = $portf_image ? $portf_image : wp_get_attachment_url($thumb_id);
						$test_link = '<a href="'. esc_url($portf_image_url) .'" rel="prettyPhoto[portf_gal]" title="'. get_the_title() .'"><i class="fa fa-search"></i></a>';
					}

					$output .= '<li class="grid-item '.implode(" ", $filter_class).' '.$item_class.'">';
					$output .= '<div class="item-wrap">';
					$output .= '<img src="'. esc_url($grid_thumbnail).'" alt="'.esc_attr($alt).'" />';
					$output .= '<h3 class="portfolio-title">'.get_the_title().'</h3>';
					//$output .= '<span class="portfolio-categories">'.implode(",", $terms_name).'</span>';
					$output .= '<ul>';
					$output .= '<li><a href="'.get_the_permalink().'" title="'.__('Details', 'solarize').'"><i class="fa fa-link"></i></a></li>';
					$output .= '<li>'.$test_link.'</li>';
					$output .= '</ul>';

					$output .= $test_link;
					$output .= '</div>';
					$output .= '</li>';
				endwhile;
			}
			wp_reset_postdata();
			$output .= '</ul>';
			$output .= '</div>';
			$output .= '</div>';

			return $output;
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Portfolio item
    /*-----------------------------------------------------------------------------------*/

	static function solarize_portfolio_item($atts, $content = null)
	{
		$atts = function_exists('vc_map_get_attributes') ? vc_map_get_attributes('solarize_portfolio_item', $atts) : $atts;
		$el_class = $html = '';
		extract(shortcode_atts(array(
			"el_class" => "",
			"portfolio" => "",
		), $atts));

		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_portfolio_item', $atts);

		$portfolio = get_post($portfolio);
		if($portfolio){
			$thumb_id = get_post_thumbnail_id($portfolio->ID);
			$thumbnail_url = wp_get_attachment_url($thumb_id);
			$thumbnail_url = aq_resize($thumbnail_url, 469, 673, true);
			$thumbnail_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

			$portf_slider = get_post_meta($portfolio->ID,'solarize_portfolio_slider', true);
			$image_size = array(
				array('w' => 320, 'h' => 179),
				array('w' => 320, 'h' => 179),
				array('w' => 670, 'h' => 320),
			);

			$portf_slider_key = $portf_slider ? array_keys($portf_slider) : array();
			for($i=1; $i<=3; $i++){
				$has_image = false;
				if($portf_slider){
					$portfolio_image_id = array_shift($portf_slider_key);
					$portfolio_image_url = array_shift($portf_slider);
					if($portfolio_image_id && $portfolio_image_url){
						${'image'.$i.'_url'} = aq_resize($portfolio_image_url, $image_size[($i - 1)]['w'], $image_size[($i - 1)]['h'], true);
						${'image'.$i.'_alt'} = get_post_meta($portfolio_image_id, '_wp_attachment_image_alt', true);
						$has_image = true;
					}
				}

				if(!$has_image){
					${'image'.$i.'_url'} = aq_resize($thumbnail_url, $image_size[($i - 1)]['w'], $image_size[($i - 1)]['h'], true);
					${'image'.$i.'_alt'} = $thumbnail_alt;
				}
			}

			$html .= '<div class="portfolio-item '.$css_class.'">
					<div class="row">
						<div class="col-md-5 col-sm-5 col-xs-12">
						 	<img src="'.esc_url($thumbnail_url).'" alt="'.esc_attr($thumbnail_alt).'">
						</div>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<img src="'.esc_url($image1_url).'" alt="'.esc_attr($image1_alt).'">
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<img src="'.esc_url($image2_url).'" alt="'.esc_attr($image2_alt).'">
								</div>
							</div>
							<div class="content-fortfolio">
								<h3>'.get_the_title($portfolio->ID).'</h3>';
								if($portfolio->post_excerpt){
									$html .= apply_filters('the_excerpt',$portfolio->post_excerpt);
								}
								else
								{
									$html .= apply_filters('the_content',wp_trim_words($portfolio->post_content, 20, ''));
								}
							$html .= '
								<a href="'.get_permalink($portfolio->ID).'" title="'.__('Read More', 'bolder').'" class="button outline">'.__('Read More', 'bolder').'</a>
								<div class="clearfix"></div>
							</div>
							<div class="">
								<img src="'.esc_url($image3_url).'" alt="'.esc_attr($image3_alt).'">
							</div>
						</div>
					</div>
			</div>';
		}

		return $html;
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Portfolio slider
    /*-----------------------------------------------------------------------------------*/

	static function solarize_portfolio_slider($atts, $content = null)
	{
		$atts = function_exists('vc_map_get_attributes') ? vc_map_get_attributes('solarize_portfolio_slider', $atts) : $atts;
		$el_class = $html = '';
		extract(shortcode_atts(array(
			"el_class" => "",
			"number" => "",
			"categories" => "",
			"portfolio_orderby"	=> "date",
			"portfolio_order"	=> "DESC",
		), $atts));

		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_portfolio_slider', $atts);

		$cats = explode(",", $categories);
		$args = array(
			'post_type'=>'portfolio',
			'posts_per_page' => $number,
			'term' => 'portfolio_cats',
			'orderby' => $portfolio_orderby,
			'order'   => $portfolio_order,
			'tax_query'      => array(
				array(
					'taxonomy' => 'portfolio_cats',
					'field' => 'ids',
					'terms' => $cats,
				)
			)
		);

		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
			$html .= '<div class="portfolio-slider '.$css_class.'">';
			while ($my_query->have_posts()) : $my_query->the_post();
				$html .= do_shortcode('[solarize_portfolio_item portfolio="'.get_the_ID().'"]');
			endwhile;
			$html .= '</div>';
		}
		wp_reset_postdata();

		return $html;
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Social icons
    /*-----------------------------------------------------------------------------------*/

	static function solarize_social_icons($atts, $content = null)
	{
		$atts = function_exists('vc_map_get_attributes') ? vc_map_get_attributes('solarize_social_icons', $atts) : $atts;

		extract(shortcode_atts(array(
			"style"=>'style1',
			"twitter_url" => "",
			"facebook_url" => "",
			"linkedin_url" => "",
			"googleplus_url" => "",
			"pinterest_url" => "",
			"dribbble_url" => "",
			"tumblr_url" => "",
			"soundcloud_url" => "",
			"instagram_url" => "",
			"vimeo_url" => "",
			"youtube_url" => "",
			"flickr_url" => "",
			"dropbox_url" => "",
			"github_url" => "",
		), $atts));

		$html = '';
		if($twitter_url || $facebook_url || $linkedin_url || $googleplus_url || $pinterest_url || $dribbble_url || $tumblr_url ||$soundcloud_url ||
			$instagram_url || $vimeo_url || $youtube_url || $flickr_url || $dropbox_url || $github_url){
			if($style == 'style1'){
				$html .= '<ul class="social-icons-style-1">';
				if($instagram_url){
					$html .= '<li class="instagram"><a href="'.esc_attr($instagram_url).'" title=""><i class="fa fa-instagram"></i></a></li>';
				}
				if($dribbble_url){
					$html .= '<li class="dribbble"><a href="'.esc_attr($dribbble_url).'" title=""><i class="fa fa-dribbble"></i></a></li>';
				}
				if($tumblr_url){
					$html .= '<li class="tumblr"><a href="'.esc_attr($tumblr_url).'" title=""><i class="fa fa-tumblr"></i></a></li>';
				}
				if($youtube_url){
					$html .= '<li class="youtube"><a href="'.esc_attr($youtube_url).'" title=""><i class="fa fa-youtube"></i></a></li>';
				}
				if($soundcloud_url){
					$html .= '<li class="soundcloud"><a href="'.esc_attr($soundcloud_url).'" title=""><i class="fa fa-soundcloud"></i></a></li>';
				}
				if($twitter_url){
					$html .= '<li class="twitter"><a href="'.esc_attr($twitter_url).'" title=""><i class="fa fa-twitter"></i></a></li>';
				}
				if($facebook_url){
					$html .= '<li class="facebook"><a href="'.esc_attr($facebook_url).'" title=""><i class="fa fa-facebook"></i></a></li>';
				}
				if($linkedin_url){
					$html .= '<li class="linkedin"><a href="'.esc_attr($linkedin_url).'" title=""><i class="fa fa-linkedin"></i></a></li>';
				}
				if($googleplus_url){
					$html .= '<li class="googleplus"><a href="'.esc_attr($googleplus_url).'" title=""><i class="fa fa-google"></i></a></li>';
				}
				if($pinterest_url){
					$html .= '<li class="pinterest"><a href="'.esc_attr($pinterest_url).'" title=""><i class="fa fa-pinterest"></i></a></li>';
				}
				if($github_url){
					$html .= '<li class="github"><a href="'.esc_attr($github_url).'" title=""><i class="fa fa-github"></i></a></li>';
				}
				if($vimeo_url){
					$html .= '<li class="vimeo"><a href="'.esc_attr($vimeo_url).'" title=""><i class="fa fa-vimeo"></i></a></li>';
				}
				if($flickr_url){
					$html .= '<li class="flickr"><a href="'.esc_attr($flickr_url).'" title=""><i class="fa fa-flickr"></i></a></li>';
				}
				if($dropbox_url){
					$html .= '<li class="dropbox"><a href="'.esc_attr($dropbox_url).'" title=""><i class="fa fa-dropbox"></i></a></li>';
				}

				$html .= '</ul>';
			}
			elseif($style == 'style2'){
				$html .= '<ul class="social-icons-style-2 clearfix">';
				if($instagram_url){
					$html .= '<li class="instagram"><a href="'.esc_attr($instagram_url).'" title=""><i class="fa fa-instagram"></i>'.__('Instagram', 'solarize').'</a></li>';
				}
				if($dribbble_url){
					$html .= '<li class="dribbble"><a href="'.esc_attr($dribbble_url).'" title=""><i class="fa fa-dribbble"></i>'.__('Dribbble', 'solarize').'</a></li>';
				}
				if($tumblr_url){
					$html .= '<li class="tumblr"><a href="'.esc_attr($tumblr_url).'" title=""><i class="fa fa-tumblr"></i>'.__('Tumblr', 'solarize').'</a></li>';
				}
				if($youtube_url){
					$html .= '<li class="youtube"><a href="'.esc_attr($youtube_url).'" title=""><i class="fa fa-youtube"></i>'.__('Youtube', 'solarize').'</a></li>';
				}
				if($soundcloud_url){
					$html .= '<li class="soundcloud"><a href="'.esc_attr($soundcloud_url).'" title=""><i class="fa fa-soundcloud"></i>'.__('Soundcoud', 'solarize').'</a></li>';
				}
				if($twitter_url){
					$html .= '<li class="twitter"><a href="'.esc_attr($twitter_url).'" title=""><i class="fa fa-twitter"></i>'.__('Twitter', 'solarize').'</a></li>';
				}
				if($facebook_url){
					$html .= '<li class="facebook"><a href="'.esc_attr($facebook_url).'" title=""><i class="fa fa-facebook"></i>'.__('Facebook', 'solarize').'</a></li>';
				}
				if($linkedin_url){
					$html .= '<li class="linkedin"><a href="'.esc_attr($linkedin_url).'" title=""><i class="fa fa-linkedin"></i>'.__('Linkedin', 'solarize').'</a></li>';
				}
				if($googleplus_url){
					$html .= '<li class="googleplus"><a href="'.esc_attr($googleplus_url).'" title=""><i class="fa fa-google"></i>'.__('GooglePlus', 'solarize').'</a></li>';
				}
				if($pinterest_url){
					$html .= '<li class="pinterest"><a href="'.esc_attr($pinterest_url).'" title=""><i class="fa fa-pinterest"></i>'.__('Pinterest', 'solarize').'</a></li>';
				}
				if($github_url){
					$html .= '<li class="github"><a href="'.esc_attr($github_url).'" title=""><i class="fa fa-github"></i>'.__('Github', 'solarize').'</a></li>';
				}
				if($vimeo_url){
					$html .= '<li class="vimeo"><a href="'.esc_attr($vimeo_url).'" title=""><i class="fa fa-vimeo"></i>'.__('Vimeo', 'solarize').'</a></li>';
				}
				if($flickr_url){
					$html .= '<li class="flickr"><a href="'.esc_attr($flickr_url).'" title=""><i class="fa fa-flickr"></i>'.__('Flickr', 'solarize').'</a></li>';
				}
				if($dropbox_url){
					$html .= '<li class="dropbox"><a href="'.esc_attr($dropbox_url).'" title=""><i class="fa fa-dropbox"></i>'.__('Dropbox', 'solarize').'</a></li>';
				}

				$html .= '</ul>';
			}
		}

		return $html;
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Contact form
    /*-----------------------------------------------------------------------------------*/

	static function solarize_contact_form($atts, $content = null)
	{
		$atts = function_exists('vc_map_get_attributes') ? vc_map_get_attributes('solarize_contact_form', $atts) : $atts;

		extract(shortcode_atts(array(
			"el_class" => "",
			"title" => "",
			"sub_title" => "",
			"button_text" => "",
			"cf7" => "",
		), $atts));

		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, 'solarize_contact_form', $atts);

		$html = '<div class="solarize-contact-from clearfix '.$css_class.'">
					<div class="form-title">
						<h3>'.esc_attr($title).'</h3>
						<p>'.esc_attr($sub_title).'</p>
						<a href="#" class="open-contact-form button outline">'.esc_attr($button_text).'</a>
					</div>
					<div class="form-wrapper">
						'.do_shortcode('[contact-form-7 id="'.$cf7.'"]').'
						<div class="close-contact-form">
							<span class="clickablee"><i class="fa fa-angle-double-up"></i></span>
						</div>
					</div>
				</div>';

		return $html;
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Video
    /*-----------------------------------------------------------------------------------*/

	static function getVideoURl($url){
		$video_url = '';

		//Youtube
		$ytRegex = "#(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'<>\/\s]+)(?:$|\/|\?|\&)?#i";
		preg_match($ytRegex, $url, $ytMatches);
		if (isset($ytMatches[1]))
		{
			$videoId = $ytMatches[1];
			if ($videoId)
			{
				//$video_url = "http://www.youtube.com/embed/" . $videoId . "?hd=1&wmode=opaque&controls=1&showinfo=0;rel=0";
				$video_url = "http://www.youtube.com/embed/" . $videoId;
			}
			return $video_url;
		}

		//Vimeo
		$vmRegex = "#(?:http(?:s)?:\/\/)?(?:www\.)?(?:player\.)?vimeo.com(?:\/video)?\/(\d+)(?:$|\/|\?)?#";
		preg_match($vmRegex, $url, $vmMatches);
		if (isset($vmMatches[1]))
		{
			$videoId = $vmMatches[1];
			if ($videoId)
			{
				$video_url = "http://player.vimeo.com/video/" . $videoId . "?title=0&byline=0&portrait=0;api=1";
			}

			return $video_url;
		}

		return $url;
	}

	static function solarize_video_box($atts, $content = null)
	{
		$atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'solarize_video_box', $atts ) : $atts;
		extract(shortcode_atts(array(
			"el_class" => "",
			"url" => "",
			"title" => "",
			"sub_title" => "",
			"align" => "",
		), $atts));

		$extra_class = new solarize_shortcodes();
		$el_class = $extra_class->getExtraClass($el_class);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class . $extra_class->shortcode_custom_css_class( $css, ' ' ), $atts );

		wp_enqueue_script( 'html5lightbox');
		$getVideoURl = self::getVideoURl($url);
		$html = '<div class="solarize-video-box '.$align.' clearfix '.$css_class.'">
			<span class="video-play-btnn">
				<a href="'.$getVideoURl.'" class="html5lightbox" data-width="900" data-height="420" title=""><i class="fa fa-play-circle"></i></a>
			</span>';
		if($title){
			$html .= '<h3>'.$title.'</h3>';
		}
		if($sub_title){
			$html .= '<p>'.$sub_title.'</p>';
		}
		$html .= '</div>';

		return $html;
	}
//*********************************************End Shortcode ****************************************************************************//
}
/*My shortcodes */
add_shortcode( 'solarize_title', array('solarize_shortcodes_fe','solarize_title') );
add_shortcode( 'solarize_small_title', array('solarize_shortcodes_fe','solarize_small_title') );
add_shortcode( 'solarize_box', array('solarize_shortcodes_fe','solarize_box') );
add_shortcode( 'title_primary', array('solarize_shortcodes_fe','title_primary') );
add_shortcode( 'solarize_call_to_action', array('solarize_shortcodes_fe','solarize_call_to_action') );
add_shortcode( 'solarize_pricing_table', array('solarize_shortcodes_fe','solarize_pricing_table') );
add_shortcode( 'solarize_funfact', array('solarize_shortcodes_fe','solarize_funfact') );
add_shortcode( 'solarize_funfact_style2', array('solarize_shortcodes_fe','solarize_funfact_style2') );
add_shortcode( 'solarize_testimonials', array('solarize_shortcodes_fe','solarize_testimonials') );
add_shortcode( 'solarize_client_work', array('solarize_shortcodes_fe','solarize_client_work') );
add_shortcode( 'solarize_lastest_blog', array('solarize_shortcodes_fe','solarize_lastest_blog') );
add_shortcode( 'solarize_service_icon', array('solarize_shortcodes_fe','solarize_service_icon') );
add_shortcode( 'solarize_service', array('solarize_shortcodes_fe','solarize_service') );
add_shortcode( 'solarize_twitter', array('solarize_shortcodes_fe','solarize_twitter') );
add_shortcode( 'solarize_text_dropcap', array('solarize_shortcodes_fe','solarize_text_dropcap') );
add_shortcode( 'solarize_team_member', array('solarize_shortcodes_fe','solarize_team_member') );
add_shortcode( 'solarize_skillbar_shortcode', array('solarize_shortcodes_fe','solarize_skillbar_shortcode') );
add_shortcode( 'solarize_process_bar', array('solarize_shortcodes_fe','solarize_process_bar') );
add_shortcode( 'solarize_countdown', array('solarize_shortcodes_fe','solarize_countdown') );
add_shortcode( 'solarize_simple_button', array('solarize_shortcodes_fe','solarize_simple_button'));
add_shortcode( 'solarize_advanced_button', array('solarize_shortcodes_fe','solarize_advanced_button') );
add_shortcode( 'solarize_blockquote', array('solarize_shortcodes_fe','solarize_blockquote') );
add_shortcode( 'solarize_notifications', array('solarize_shortcodes_fe','solarize_notifications') );
add_shortcode( 'solarize_map_shortcode', array('solarize_shortcodes_fe','solarize_map_shortcode'));
add_shortcode( 'solarize_divider_shortcode', array('solarize_shortcodes_fe','solarize_divider_shortcode'));
add_shortcode( 'vc_tour', array('solarize_shortcodes_fe','vc_tour') );
add_shortcode( 'vc_tabs', array('solarize_shortcodes_fe','vc_tabs') );
add_shortcode( 'vc_tab', array('solarize_shortcodes_fe','vc_tab') );
add_shortcode( 'solarize_portfolio_grid', array('solarize_shortcodes_fe','solarize_portfolio_grid') );
add_shortcode( 'solarize_portfolio_item', array('solarize_shortcodes_fe','solarize_portfolio_item') );
add_shortcode( 'solarize_portfolio_slider', array('solarize_shortcodes_fe','solarize_portfolio_slider') );
add_shortcode( 'solarize_social_icons', array('solarize_shortcodes_fe','solarize_social_icons') );
add_shortcode( 'solarize_contact_form', array('solarize_shortcodes_fe','solarize_contact_form') );
add_shortcode( 'solarize_video_box', array('solarize_shortcodes_fe','solarize_video_box') );