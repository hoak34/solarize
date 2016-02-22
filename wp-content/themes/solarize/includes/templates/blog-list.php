<?php
global $solarize_config;
if ( have_posts() ) : while ( have_posts() ) : the_post();
    
        if ( is_search() ) {
            /**
        	 * Get blog posts by blog layout.
        	 */
        	get_template_part( 'includes/templates/search', 'list-item' );
        }
        else{
            /**
        	 * Get blog posts by blog layout.
        	 */
        	get_template_part( 'includes/templates/blog', 'list-item' );
        }

    endwhile;
else :

/**
 * Display no posts message if none are found.
 */
get_template_part('loop/content','none');

endif;
?>