<?php global $solarize_config; ?>
<div class="meta">
	<?php if( in_array('author',$solarize_config['blog-metas']) ) : ?>
		<span><?php echo __('By', 'solarize'); ?> <a href="<?php echo get_author_posts_url($post->post_author)   ?>"><?php echo get_the_author_meta('display_name' ); ?></a> </span>
	<?php endif; ?>
	<?php if( in_array('date',$solarize_config['blog-metas']) ) : ?>
	<span><?php the_time( 'M' ); ?> <?php the_time( 'd' ); ?></span>
	<?php endif; ?>
	<?php if( in_array('tags',$solarize_config['blog-metas']) ) :  ?>
		<?php
            $posttags = get_the_tags();
            if ($posttags) {
                $tag_val = array();
              	foreach($posttags as $tag) {
              		$tag_link = get_tag_link( $tag->term_id );
                	$tag_val[] = '<a href="'.$tag_link.'">'.$tag->name.'</a>'; 
              	}
        ?>
            <span><?php echo implode(', ', $tag_val); ?></span>
        <?php } ?>
	<?php endif; ?>
	<?php if( in_array('category',$solarize_config['blog-metas'])  && has_category() ) :  ?>
		<span><?php the_category(', '); ?></span> 
	<?php endif; ?>
	<?php if( in_array('comment',$solarize_config['blog-metas']) && commenct_open() ) : ?>
		<span><a href="<?php comments_link(); ?>"><?php comments_number( __('0 Comments','solarize'), __('1 Comment','solarize'), __('% Comments','solarize') ); ?></a></span>
	<?php endif; ?>
</div>