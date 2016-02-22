<?php
    /**
    * taxonomy.php
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
            <div class="row">
                <?php
                    if ($solarize_config['blog-sidebar-position']==3) {
                        $col_md = 12;
                        $col_sm = 12;
                    } else {
                        $col_md = 9;
                        $col_sm = 8;
                    }
                ?>
                <?php if ($solarize_config['blog-sidebar-position']==1): ?>
                   <?php get_sidebar(); ?>
                <?php endif ?>
                    <div class="col-md-<?php echo esc_attr($col_md); ?> col-sm-<?php echo esc_attr($col_sm); ?>">
                        <ul id="blog-list">
                            <?php get_template_part('includes/templates/blog', 'list'); ?>
                        </ul>
                        <?php echo function_exists('solarize_pagination') ? solarize_pagination() : posts_nav_link(); ?>
                    </div>
                <?php if ($solarize_config['blog-sidebar-position']==2): ?>
                   <?php get_sidebar(); ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    <!-- End / Main content -->

<?php get_footer();