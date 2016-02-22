<?php
    /**
    * page.php
    * The main post loop in BOLDER
    * @author Corona
    * @package BOLDER
    * @since 1.0.0
    */
    get_header();
    global $solarize_config;
?>
    <!-- Start main content -->
    <div class="container">
        <?php
        dimox_breadcrumbs();
        while ( have_posts() ) : the_post();
            the_content();
            wp_link_pages();
        endwhile;
        ?>
    </div>
    <!-- End / main content -->

<?php get_footer();