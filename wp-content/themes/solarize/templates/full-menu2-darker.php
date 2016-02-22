<?php
	/**
	* Template Name: Full - Menu2 - Darker
	*
	* @author CoronaThemes
	* @package Bolder
	* @since 1.0.0
	*/

    global $solarize_config, $post;
	$solarize_config['header-style'] = 'style-ii';
    $class = $solarize_config['header-style'];
    if($solarize_config['fixed-header']){
		$class .= ' sticky';
	}

	$class .= ' darker-overlay';
	$logo_image = get_template_directory_uri().'/assets/images/logo.png';

	//custom css menu 2
	add_action( 'wp_enqueue_scripts', 'demo_solarize_get_custom_css' );
	function demo_solarize_get_custom_css(){
		$style_css = '.header-inner{ padding: 72px 0 230px !important;}';
		$style_css .= 'header.scrolled-header .header-inner{ padding: 20px 0 !important;}';

		wp_add_inline_style( 'solarize', $style_css );
	}

	//custom js
	add_action('wp_enqueue_scripts','demo_solarize_load_js');
	function demo_solarize_load_js(){
		wp_localize_script( 'custom', 'solarize_nav_setting', array( 'scrollOffset' => 65, 'hashTag' => 0) );
	}

	// Add bodyclass
	add_filter( 'body_class', 'solarize_page_custom_body_class' );
	function solarize_page_custom_body_class( $classes ) {
		$classes[] = 'home';
		return $classes;
	}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>
	<div class="body-background-image"></div>
	<!--Wrapper-->
<?php if($solarize_config['header-style'] == 'style-ii'){?>
	<nav class="fixed-menu">
		<?php get_template_part('includes/templates/menu', ''); ?>
	</nav>
<?php } ?>
	<?php get_template_part('includes/templates/demo', 'site'); ?>
<div id="wrapper">
	<header class="<?php echo esc_attr($class); ?>">
		<div class="header-inner">
			<div class="container">
				<div class="logo-bar">
					<div class="logo">
						<a href="<?php echo get_home_url(); ?>" class="ariva_logo">
							<?php if($logo_image){ ?>
								<img src="<?php echo esc_url($logo_image); ?>"  alt="<?php echo get_bloginfo('name') ?>">
							<?php }else{ ?>
								<span><?php echo get_bloginfo('name') ?></span>
							<?php } ?>
						</a>
					</div>
					<div class="open-menu">
						<div class="hamburger">
							<div class="top-bun hamburger-piece">
								<div class="left half"></div>
								<div class="right half"></div>
							</div>
							<div class="meat hamburger-piece">
								<div class="whole"></div>
							</div>
							<div class="bottom-bun hamburger-piece">
								<div class="left half"></div>
								<div class="right half"></div>
							</div>
						</div>
						<span><?php _e('Open Menu', 'solarize'); ?></span>
					</div>
					<?php get_template_part('includes/templates/header','socials' ); ?>
				</div>

				<?php if($solarize_config['header-style'] != 'style-ii'){ ?>
					<nav class="main-menu nav-menu">
						<?php get_template_part('includes/templates/menu', ''); ?>
					</nav>
				<?php } ?>
			</div>
		</div>
	</header>

 <!-- content -->
	<div class="container">
		<?php
			while ( have_posts() ) : the_post();
				the_content();
				wp_link_pages();
			endwhile;
		?>
	 </div>
    <!-- End / content -->

	<?php
	$class = 'class="darker-overlay"';
	?>
	<footer <?php echo $class; ?>>
		<?php //get_template_part('includes/templates/footer','widgets' ); ?>
		<div class="container">
			<?php get_template_part('includes/templates/footer','socials' ); ?>
			<div class="solarize-copy-right">
				<?php echo do_shortcode( $solarize_config['footer_copyright_text'] ); ?>
			</div>
		</div>
	</footer>
	<!-- End / Page wrap -->
	<!-- End / Page wrap -->
	<?php wp_footer(); ?>
</div>
</body>
</html>