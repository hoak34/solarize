<?php
global $solarize_config;
$menu_class =  'menu-nav list-inline solarize-response-simple solarize-response-stack solarize-effect-'.$solarize_config['menu-hover-effect'];
wp_nav_menu(
    array(
        'theme_location'    => 'megamenu',
        'menu_id'         => 'menu-main-menu',
        'menu_class'        => $menu_class,
        'container' => false,
        'fallback_cb'       => 'solarize_navwalker::fallback',
        'walker'            => new solarize_navwalker()
    )
);