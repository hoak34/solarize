<?php
	/**
	 * taxonomy-portfolio_cats.php
	 * The project archive used in BOLDER
	 * @author CoronaThemes
	 * @package BOLDER
	 * @since 1.0.0
	 */
	get_header();
	global $solarize_config, $style, $post;
	$output = '';
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>

<div class="main-content">
<div class="container">
	<?php dimox_breadcrumbs(); ?>
	<?php
	$output .= '<div class="solarize-portfolio" data-initial-word="">';
	$output .= '<div id="portfolio-wrapper">';
	$output .= '<ul class="portfolio grid isotope">';

	if( have_posts()) {
		while ( have_posts()) : the_post();

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
				$test_link = '<a href="'. esc_url($portf_video) .'" rel="prettyPhoto[portf_gal]" title="'. __('Quick view', 'solarize') .'"><i class="ti-search"></i></a>';
			}
			else if($portf_type == 'soundcloud') {
				$test_link = '<a href="'. esc_url($portf_soundclound) .'" rel="prettyPhoto[portf_gal]" title="'.  __('Quick view', 'solarize') .'"><i class="ti-search"></i></a>';
			}
			else if ($portf_type == 'slider') {
				$slider_output = '';
				if(!empty($portf_slider)) {
					foreach($portf_slider as $slider_item=>$slider_item_url) {
						$slider_output .= '<a class="hidden_image" href="'.esc_url($slider_item_url).'" rel="prettyPhoto[gallery_'.$post->ID.']" title="'. __('Quick view', 'solarize').'"><i class="ti-search"></i></a>';
					}
				}

				$test_link = '<a href="'. wp_get_attachment_url($thumb_id) .'" rel="prettyPhoto[gallery_'.$post->ID.']" title="'.  __('Quick view', 'solarize') .'" ><i class="ti-search"></i></a>' . $slider_output;
			}
			else{
				$portf_image_url = $portf_image ? $portf_image : wp_get_attachment_url($thumb_id);
				$test_link = '<a href="'. esc_url($portf_image_url) .'" rel="prettyPhoto[portf_gal]" title="'. get_the_title() .'"><i class="ti-search"></i></a>';
			}

			$output .= '<li class="grid-item '.implode(" ", $filter_class).' '.$item_class.'">';
			$output .= '<div class="item-wrap">';
			$output .= '<img src="'. esc_url($grid_thumbnail).'" alt="'.esc_attr($alt).'" />';
			$output .= '<h3 class="portfolio-title">'.get_the_title().'</h3>';
			//$output .= '<span class="portfolio-categories">'.implode(",", $terms_name).'</span>';
			$output .= '<ul>';
			$output .= '<li><a href="'.get_the_permalink().'" title="'.__('Details', 'solarize').'"><i class="ti-link"></i></a></li>';
			$output .= '<li>'.$test_link.'</li>';
			$output .= '</ul>';

			$output .= $test_link;
			$output .= '</div>';
			$output .= '</li>';
		endwhile;
	}
	$output .= '</ul>';
	$output .= '</div>';
	$output .= '</div>';

	echo $output;

	echo function_exists('solarize_pagination') ? solarize_pagination() : posts_nav_link();

	?>
</div>
</div>
<?php get_footer();