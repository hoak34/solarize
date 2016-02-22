<?php 
global $solarize_config;
$default_blog_metas = array( 'date', 'author', 'comment', 'category');
$blog_metas = isset( $solarize_config['blog-metasopt-blog-metas'] ) ? $solarize_config['blog-metas'] : $default_blog_metas;
$time = get_the_time(get_option('date_format'));
?>
<ul class="blog-meta">
	<?php if( in_array('date',$blog_metas) ) : ?>
		<li><i class="fa fa-time"></i> <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php echo $time; ?></a></li>
	<?php endif; ?>
	<?php if( in_array('author',$blog_metas) ) : ?>
		<li><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url($post->post_author)   ?>"><?php echo get_the_author_meta('display_name' ); ?></a> </li>
	<?php endif; ?>
	<?php if( in_array('category',$blog_metas)  && has_category() ) :  ?>
		<li><i class="fa fa-folder"></i> <?php the_category(', '); ?></li>
	<?php endif; ?>
	<?php if( in_array('comment',$blog_metas) && comments_open() ) : ?>
		<li><i class="fa fa-comment-alt"></i> <a href="<?php comments_link(); ?>"><?php comments_number( __('0 Comments','solarize'), __('1 Comment','solarize'), __('% Comments','solarize') ); ?></a></li>
	<?php endif; ?>
</ul>