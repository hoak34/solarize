<?php
/**
 * footer.php
 * Footer
 * @author Corona
 * @package BOLDER
 * @since 1.0.0
 */
global $solarize_config, $post;
$class = '';
$class = 'class="'.$solarize_config['footer-color-scheme'].'"';
if(is_page_template('templates/home-template.php')){
    if($color_scheme = get_post_meta($post->ID, 'solarize_page_header_color_scheme', true)){
        $class = 'class="'.$color_scheme.'"';
    }
}
?>
<div class="top-footer-widget">
    <div class="container">
        <?php if ( is_active_sidebar( 'top-footer' ) ) : ?>
            <?php dynamic_sidebar( 'top-footer' ); ?>
        <?php endif; ?>
    </div>
</div>
<footer <?php echo $class; ?>>
    <div class="container">
        <div id="footer-map">
            <iframe frameborder="0" style="border:0;width: 100%;height:300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317716.364741452!2d-0.10159865000000001!3d51.52864165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon!5e0!3m2!1sen!2s!4v1398352500211" allowfullscreen></iframe>
        </div>
        <?php get_template_part('includes/templates/footer','widgets' ); ?>
        <div class="copy-right">
            <?php echo do_shortcode( $solarize_config['footer_copyright_text'] ); ?>
        </div>
    </div>
</footer>
<!-- End / Page wrap -->
<!-- End / Page wrap -->
<?php wp_footer(); ?>
</div>
</body>
</html>