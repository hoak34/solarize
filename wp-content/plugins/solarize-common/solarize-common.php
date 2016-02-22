<?php
/**
 
* Plugin Name: Solarize common
 
* Plugin URI: http://themeforest.com/solarize
 
* Description: A plugin to create custom post type, metabox, shortcode... for Bolder theme
 
* Version:  1.0
 
* Author: CoronaThemes
 
* Author URI: http://themeforest.com/solarize
 
* License:  GPL2
 
*/

/**
 * Initialise the internationalisation domain
 */

load_plugin_textdomain('solarize', 'wp-content/plugins/solarize-common/languages','solarize-common/languages');

/**
 * Include files
 */

define('BOLDER_COMMON_VERSION', 1.0);
define('BOLDER_COMMON', plugin_dir_path( __FILE__ ));

if ( !class_exists( 'ReduxFramework' )) {
    require_once BOLDER_COMMON . '/reduxframework/ReduxCore/framework.php';
}
include BOLDER_COMMON . '/custom-post-type/post-type.php';
include BOLDER_COMMON . '/custom-metabox/meta-box-use.php';
include BOLDER_COMMON . '/shortcode/shortcodes.php';
include BOLDER_COMMON . '/shortcode/vc-functions.php';

return true;