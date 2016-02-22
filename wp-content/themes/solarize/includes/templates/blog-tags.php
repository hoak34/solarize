<?php if(has_tag()) { ?>
	<div class="post-tag">
		<span><?php echo __('Post Tags :', 'solarize'); ?></span>
		<?php
		$posttags = get_the_tags();
		if ($posttags) {
			$tag_val = array();
			foreach($posttags as $tag) {
				$tag_link = get_tag_link( $tag->term_id );
				$tag_val[] = '<a href="'.$tag_link.'">'.$tag->name.'</a>';
			}
			?>
			<?php echo implode(', ', $tag_val); ?>
		<?php } ?>
	</div>
<?php } ?>