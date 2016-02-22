<?php
    /**
    * single.php
    * The main post loop in BOLDER
    * @author Corona
    * @package BOLDER
    * @since 1.0.0
    */
    get_header();
    the_post();

    global $solarize_config;
    $format = get_post_format();
    if( false === $format ){
    	$format = 'standard';
    }
?>
    <!-- Main content -->
    <div <?php post_class("main-content"); ?>>
        <div class="container">
            <?php dimox_breadcrumbs(); ?>
            <div class="row">
                <?php
                    if ($solarize_config['blog-sidebar-position']==3) {
                        $col_md = 12;
                        $col_sm = 12;
                        $col_lg = 12;
                    } else {
                        $col_md = 9;
                        $col_sm = 12;
                        $col_lg = 9;
                    }
                ?>
                <?php if ($solarize_config['blog-sidebar-position']==1): ?>
                   <aside id="sidebar-right" class="sidebar-right col-md-3 col-sm-12 col-xs-12">
                        <?php get_sidebar(); ?>
                    </aside>
                <?php endif ?>

                <div class="page-ct col-md-<?php echo esc_attr($col_md); ?> col-lg-<?php echo esc_attr($col_lg); ?> col-sm-<?php echo esc_attr($col_sm); ?>">
                    <div class="blog-single">
                         <div class="blog-item">
                            <?php get_template_part( 'includes/templates/post', $format ); ?>
                            <!--<div class="date-post">
                                <span class="date"><?php /*the_time( 'd' ); */?></span>
                                <span class="month"><?php /*the_time( 'M' ); */?></span>
                            </div>-->
                            <article>
                                <div class="post-header">
                                <h3><?php the_title( ); ?></h3>
                                <?php echo solarize_get_post_format_icon(get_post()); ?>
                                <?php get_template_part('includes/templates/blog', 'metas'); ?>
                                </div>
                                <div class="blog-content">
                                    <?php the_content( ); ?>
                                    <?php
                                    wp_link_pages( array(
                                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'solarize' ) . '</span>',
                                        'after'       => '</div>',
                                        'link_before' => '<span>',
                                        'link_after'  => '</span>',
                                    ) );
                                ?>
                                    <div class="clearfix"></div>
                                </div>
                                <!--End Blog Content-->
                                <!--Blog Share-->
                                <div class="share-tag">
                                <?php get_template_part('includes/templates/blog', 'social'); ?>
                                <?php get_template_part('includes/templates/blog', 'tags'); ?>
                                    <div class="clearfix"></div>
                                </div>
                                <!--Blog Share-->
                            </article>
                        <?php
                            if( comments_open() ){
                                comments_template();
                            }
                        ?>
                        </div>
                    </div>
                </div>

                 <!-- Start right sidebar -->
                <?php if ($solarize_config['blog-sidebar-position']==2): ?>
                    <aside id="sidebar-right" class="sidebar-right col-md-3 col-sm-12 col-xs-12">
                        <?php get_sidebar(); ?>
                    </aside>
                <?php endif ?>
                <!-- End right sidebar -->

            </div>
        </div>
    </div>
    <!-- End / Main content -->

<?php get_footer();