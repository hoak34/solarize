<?php
    global $post, $solarize_config;
    $format = get_post_format();
    if( false === $format ){
        $format = 'standard';
    }
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
    <?php get_template_part( 'includes/templates/post', $format ); ?>
    <article>
        <div class="post-header">
            <h3><a title="<?php the_title();?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php echo solarize_get_post_format_icon(get_post()); ?>
            <?php get_template_part('includes/templates/blog', 'metas'); ?>
        </div>

        <?php if ($solarize_config['blog-content']=='content'): ?>
        <div class="except-post"><?php the_content('<span class="continue-reading">'.esc_attr( $solarize_config['blog-reading-text'] ). '</span>'); ?></div>
        <?php else: ?>
            <?php if(empty( $post->post_excerpt )) : ?>
              <div class="except-post"> <?php the_content('<span class="continue-reading">'.esc_attr( $solarize_config['blog-reading-text'] ). '</span>'); ?></div>
            <?php else: ?>
            <div class="except-post"><?php the_excerpt(); ?></div>
            <a title="<?php _e('READ MORE', 'solarize'); ?>" class="blog-read solarize-button" href="<?php the_permalink(); ?>"><?php echo esc_attr( $solarize_config['blog-reading-text']); ?></a>
            <?php endif ?>
      <?php endif ?>
            <?php
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'solarize' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>

        <?php get_template_part('includes/templates/blog', 'social'); ?>
    </article>
    <div class="clearfix"></div>
</div>