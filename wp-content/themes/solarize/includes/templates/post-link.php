<?php
	global $post;
	$solarize_link_description = get_post_meta( $post->ID, 'solarize_link_description', true );
	$solarize_link_url = get_post_meta( $post->ID, 'solarize_link_url', true );

?>
<?php if ($solarize_link_url !=''): ?>
<div class="post-meta-type blog-link">
	<h3><?php echo apply_filters('the_title', $solarize_link_description) ?></h3>
	<a target="_blank" href="<?php echo esc_url($solarize_link_url)?>"><?php echo esc_url($solarize_link_url)?></a>
</div>
<?php endif;