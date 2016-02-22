<?php
/*
 * Load theme options and import functions
*/
if ( class_exists( 'ReduxFramework' )){
	require_once get_template_directory(). '/includes/import-functions.php';
	require_once get_template_directory() . '/includes/theme_options.php';
}

/*
 * Load Required/Recommended Plugins
*/
require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';
if (!is_child_theme()) {
	require_once get_template_directory() . '/includes/plugins_load.php';
}

/*
 * Load theme support
*/
require_once get_template_directory() . '/includes/theme_support.php';


/*
 * Load theme register
*/
require_once get_template_directory() . '/includes/theme_register.php';


/*
 * Load Bootstrap Menu Walker
*/
require_once get_template_directory() . '/includes/navwalker.php';
require_once get_template_directory() . '/includes/navwalker_backend.php';

/*
 * Load custom css and js
*/
require_once get_template_directory() . '/includes/theme_styles_scripts.php';

/*
 * Load theme functions
*/
require_once get_template_directory() . '/includes/theme_functions.php';

/*
 * dimox breadcrumbs
*/
if(!function_exists('dimox_breadcrumbs')){
	require_once get_template_directory() . '/includes/dimox-breadcrumbs.php';
}

/*
 * Load custom widgets
*/
require_once get_template_directory() . '/includes/widgets/footer_contact.php';
require_once get_template_directory() . '/includes/widgets/follow_us.php';
require_once get_template_directory() . '/includes/widgets/menu_sidebar.php';

/*
 * Load aq_resize class
*/
if(!class_exists('aq_resize')){
	require_once get_template_directory() . '/includes/image-resizer.php';
}