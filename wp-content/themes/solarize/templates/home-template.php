<?php
	/**
	* Template Name: Home Page Template
	*
	* @author CoronaThemes
	* @package Bolder
	* @since 1.0.0
	*/
get_header();
global $solarize_config, $post;
?>
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
<?php get_footer(); ?>