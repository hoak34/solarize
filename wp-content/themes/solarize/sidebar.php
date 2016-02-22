<?php
	/**
	* sidebar.php
	* The main post loop in BOLDER
	* @author Corona
	* @package BOLDER
	* @since 1.0.0
	*/
	global $post;
	$page_sidebar = get_post_meta( $post->ID, 'solarize_page_sidebar', true );
	if ($page_sidebar == '') {
		$page_sidebar ='primary';
	}
?>
<?php if ( is_active_sidebar( $page_sidebar ) ) : ?>
   	<?php dynamic_sidebar( $page_sidebar ); ?>
<?php endif;