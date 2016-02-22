<?php
    /**
    * index.php
    * The main post loop in BOLDER
    * @author Corona
    * @package BOLDER
    * @since 1.0.0
    */

    get_header();
    global $solarize_config;
?>
    <!-- Main content -->
    <div id="main-content">
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
                    <!-- Start left sidebar -->
                    <?php if ($solarize_config['blog-sidebar-position']==1): ?>
                         <aside id="sidebar-right" class="sidebar-right  col-sm-12 col-md-3 col-xs-12">
                            <?php get_sidebar()?>
                        </aside>
                    <?php endif ?>
                    <!-- End left sidebar -->

                    <!-- Start Loop Posts -->
                        <div class="col-md-<?php echo esc_attr($col_md); ?> col-lg-<?php echo esc_attr($col_lg); ?> col-sm-<?php echo esc_attr($col_sm); ?>">
                            <?php get_template_part('includes/templates/blog','list'); ?>
                            <?php echo function_exists('solarize_pagination') ? solarize_pagination() : posts_nav_link(); ?>
                        </div>
                    <!-- End Loop Posts -->

                    <!-- Start right sidebar -->
                    <?php if ($solarize_config['blog-sidebar-position']==2): ?>
                        <aside id="sidebar-right" class="sidebar-right  col-sm-12 col-md-3 col-xs-12">
                            <?php get_sidebar()?>
                        </aside>
                    <?php endif ?>
                    <!-- End right sidebar -->

                </div>
        </div>
    </div>
    <!-- End / Main content -->

<?php get_footer();