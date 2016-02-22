<?php
/**ReduxFramework Sample Config File
  For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
 * */

if (!class_exists("Redux_Framework_sample_config")) {

    class Redux_Framework_sample_config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }

            $this->initSettings();
        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

            // Function to test the compiler hook and demo CSS output.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2);
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            // Dynamically add a section. Can be also used to modify sections/fields
            add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**
          *This is a test function that will let you see when the compiler hook occurs.
          *It only runs if a field   set with compiler=>true is changed.
         * */
        function compiler_action($options, $css) {
            //echo "<h1>The compiler hook has run!";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
              require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
              $wp_filesystem->put_contents(
              $filename,
              $css,
              FS_CHMOD_FILE // predefined mode settings for WP files
              );
              }
             */
        }

        /**
         * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
         * Simply include this function in the child themes functions.php file.
         * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
         * so you must use get_template_directory_uri() if you want to use any of the built in icons
         * */
        function dynamic_section($sections) {
            //$sections = array();
            // $sections[] = array(
            //     'title' => __('Section via hook', 'solarize'),
            //     'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'solarize'),
            //     'icon' => 'el-icon-paper-clip',
            //     // Leave this as a blank section, no options just some intro text set above.
            //     'fields' => array()
            // );

            return $sections;
        }

        /**
         * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**
         * Filter hook for filtering the default value of any given field. Very useful in development mode.
         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = "Testing filter hook!";

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));

            }
        }

        public function setSections() {

            /**
             * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode(".", $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'solarize'), $this->theme->display('Name'));
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'solarize'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'solarize'); ?>" />
            <?php endif; ?>

                <h4>
            <?php echo $this->theme->display('Name'); ?>
                </h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'solarize'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'solarize'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'solarize') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
                <?php
                if ($this->theme->parent()) {
                    printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'solarize'), $this->theme->parent()->display('Name'));
                }
                ?>

                </div>

            </div>

            <?php            

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }

             

            /*--General Settings--*/
            $this->sections[] = array(
                'icon' => 'el-icon-cogs',
                'title' => __('General Settings', 'solarize'),
                'fields' => array(
                    array(
                        'id'    => 'general-introduction',
                        'type'  => 'info',
                        'style' => 'success',
                        'title' => __('Welcome to BOLDER Theme Option Panel', 'solarize'),
                        'icon'  => 'el-icon-info-sign',
                        'desc'  => __( 'From here you can config BOLDER theme in the way you need.', 'solarize')
                    ),
                    array(
                        'id'         => 'layout-type',
                        'type'       => 'button_set',
                        'title'      => __('layout type', 'solarize'),
                        'subtitle'   => __('Select layout type', 'solarize'),
                        'options'    => array(
                            'full'   => __('Full', 'solarize'),
                            'box'   => __('Box', 'solarize'),
                        ),
                        'default'       => 'full',
                    ),
                    /*array(
                        'id' => 'background-color',
                        'type' => 'color',
                        'title' => __('Background color', 'solarize'),
                        'desc' => __('Choose bacground color.', 'solarize'),
                        'subtitle' => __('Choose bacground color.', 'solarize'),
                        'default' => '',
                        'validate' => 'color',
                        'output'=> array('background-color' => 'body'),
                    ),
                    array(
                        'id' => 'background-image',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Background image', 'solarize'),
                        'compiler' => 'true',
                        'desc' => __('Upload background image', 'solarize'),
                        'subtitle' => __('Upload your custom background image', 'solarize'),
                        'default' => '',
                    ),*/
                    array(
                        'id'       => 'background-image',
                        'type'     => 'background',
                        'title'    => __('Background image', 'solarize'),
                        'subtitle' => __('Default background with image, color, etc.', 'solarize'),
                        'desc'     => "",
                        'default'  => array(
                            'background-image' => get_template_directory_uri().'/assets/images/bg.jpg',
                            'background-position' => 'center top',
                            'background-repeat' =>'no-repeat',
                            'background-size' => 'cover',
                            'background-attachment' =>'fixed'
                        ),
                        'output'   => 'body',
                    ),
                    array(
                        'id' => 'accent-color',
                        'type' => 'color',
                        'title' => __('Accent Color', 'solarize'),
                        'desc' => __('Change this color to alter the accent color globally for your website. ', 'solarize'),
                        'subtitle' => __('Accent color (default: ).', 'solarize'),
                        'default' => '#fd4326',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'css-code',
                        'type' => 'ace_editor',
                        'title' => __('Custom CSS', 'solarize'),
                        'subtitle' => __('Paste your custom CSS code here.', 'solarize'),
                        'mode' => 'css',
                        'theme' => 'monokai',
                        'desc' => 'Custom css code.',
                        'default' => ""
                    ),                   
                    array(
                        'id' => 'tracking-code',
                        'type' => 'ace_editor',
                        'title' => __('Custom JS', 'solarize'),
                        'subtitle' => __('Paste your custom JS code here.', 'solarize'),
                        'mode' => 'javascript',
                        'theme' => 'chrome',
                        'desc' => 'Custom javascript code',
                        'default' => "jQuery(document).ready(function(){\n\n});"
                    ),
                )
            );

            /*--Typograply Options--*/
            $this->sections[] = array(
                'icon' => 'el-icon-font',
                'title' => __('Typography Options', 'solarize'),
                'fields' => array(
                    array(
                        'id' => 'typo-body-font',
                        'type' => 'typography',
                        'title' => __('Body Font Setting', 'solarize'),
                        'subtitle' => __('Specify the body font properties.', 'solarize'),
                        'google' => true,
                        'output' => 'body',
                        'default' => array(
                            'font-family' => 'Roboto',
                            'font-weight' => '400'
                        ),
                    ),
                    array(
                        'id' => 'menu-font',
                        'type' => 'typography',
                        'title' => __('Menu Item Font Setting', 'solarize'),
                        'subtitle' => __('Specify the menu font properties.', 'solarize'),
                        'output' => array('nav'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Roboto',
                        ),
                    ),
                    array(
                        'id' => 'typo-h1-font',
                        'type' => 'typography',
                        'title' => __('Heading 1(H1) Font Setting', 'solarize'),
                        'subtitle' => __('Specify the H1 tag font properties.', 'solarize'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Droid Serif',
                        ),
                        'output' => 'h1',
                    ),
                    array(
                        'id' => 'typo-h2-font',
                        'type' => 'typography',
                        'title' => __('Heading 2(H2) Font Setting', 'solarize'),
                        'subtitle' => __('Specify the H2 tag font properties.', 'solarize'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Droid Serif',
                        ),
                        'output' => 'h2',
                    ),
                    array(
                        'id' => 'typo-h3-font',
                        'type' => 'typography',
                        'title' => __('Heading 3(H3) Font Setting', 'solarize'),
                        'subtitle' => __('Specify the H3 tag font properties.', 'solarize'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Droid Serif',
                        ),
                        'output' => 'h3',
                    ),
                    array(
                        'id' => 'typo-h4-font',
                        'type' => 'typography',
                        'title' => __('Heading 4(H4) Font Setting', 'solarize'),
                        'subtitle' => __('Specify the H4 tag font properties.', 'solarize'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Droid Serif',
                        ),
                        'output' => 'h4',
                    ),
                    array(
                        'id' => 'typo-h5-font',
                        'type' => 'typography',
                        'title' => __('Heading 5(H5) Font Setting', 'solarize'),
                        'subtitle' => __('Specify the H5 tag font properties.', 'solarize'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Droid Serif',
                        ),
                        'output' => 'h5',
                    ),

                    array(
                        'id' => 'typo-h6-font',
                        'type' => 'typography',
                        'title' => __('Heading 6(H6) Font Setting', 'solarize'),
                        'subtitle' => __('Specify the H6 tag font properties.', 'solarize'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Droid Serif',
                        ),
                        'output' => 'h6',
                    ),
                    /*array(
                        'id' => 'typo-roboto500',
                        'type' => 'typography',
                        'title' => __('Font roboto500 Setting', 'solarize'),
                        'subtitle' => __('Specify the roboto 500 font properties.', 'solarize'),
                        'google' => true,                        
                        'default' => array(
                            'font-family' => 'Roboto',
                            'font-weight' => '500'
                        ),
                    ),
                    array(
                        'id' => 'typo-roboto400',
                        'type' => 'typography',
                        'title' => __('Font roboto400 Setting', 'solarize'),
                        'subtitle' => __('Specify the roboto 400 font properties.', 'solarize'),
                        'google' => true,                        
                        'default' => array(
                            'font-family' => 'Roboto',
                            'font-weight' => '400'
                        ),
                    ),
                    array(
                        'id' => 'typo-roboto100',
                        'type' => 'typography',
                        'title' => __('Font roboto100 Setting', 'solarize'),
                        'subtitle' => __('Specify the roboto 100 font properties.', 'solarize'),
                        'google' => true,                        
                        'default' => array(
                            'font-family' => 'Roboto',
                            'font-weight' => '100'
                        ),
                    ),*/
                )
            );

            /*
             * Sidebar settings
            */
            $this->sections[] = array(
                'title' => __('Sidebar Settings', 'solarize'),
                'desc' => __('Sidebar Settings Settings', 'solarize'),
                'icon' => 'el-icon-list',
                'fields' => array(
                    array(
                        'id'=>'sidebars',
                        'type' => 'multi_text',
                        'title' => __('Custom Sidebars', 'solarize'),
                        'default' => array('Custom Sidebar'),
                    ),
                ),
            );
            // Header Settings
            $this->sections[] = array(
                'title' => __('Header Settings', 'solarize'),
                'desc' => __('Header Settings', 'solarize'),
                'icon' => 'el-icon-flag',
                'fields' => array(
                    array(
                        'id' => 'header-style',
                        'type' => 'button_set',
                        'title' => __('Select your header style', 'solarize'),
                        'subtitle' => __('Select header style', 'solarize'),
                        'options' => array( 'style-i' => __('Style 1', 'solarize'), 'style-ii' => __('Style 2', 'solarize')),
                        'default' => 'style-i',
                    ),
                    array(
                        'id' => 'header-color-scheme',
                        'type' => 'button_set',
                        'title' => __('Select header color scheme text', 'solarize'),
                        'subtitle' => __('header color scheme text', 'solarize'),
                        'options' => array( 'darkest-overlay' => __('Lightest Text', 'solarize'), 'darker-overlay' => __('Light Text', 'solarize'), 'lighter-overlay' => __('Dark text', 'solarize')),
                        'default' => 'lighter-overlay',
                    ),
                    array(
                        'id' => 'logo',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo upload', 'solarize'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload your custom logo image', 'solarize'),
                        'default' => array('url' => get_template_directory_uri().'/assets/images/logo-dark.png'),

                    ),
                    /*array(
                        'id' => 'header-background-image',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Header Background image', 'solarize'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload your header background image', 'solarize'),
                        'default' => array('url' => get_template_directory_uri().'/assets/images/header-bacground.png'),

                    ),*/
                    array(
                        'id'       => 'header-background-image',
                        'type'     => 'background',
                        'title'    => __('Default Header Background image', 'solarize'),
                        'subtitle' => __('Default header background with image, color, etc.', 'solarize'),
                        'desc'     => "",
                        'default'  => array(
                            'background-image' => get_template_directory_uri().'/assets/images/header-background.png',
                            'background-position' => 'center top',
                            'background-repeat' =>'no-repeat',
                            'background-size' => 'cover',
                            'background-attachment' =>'fixed'
                        ),
                        'output'   => '.header-placeholder',
                    ),
                    array(
                        'id'             => 'header-padding',
                        'type'           => 'spacing',
                        'mode'           => 'padding',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'left'           => 'false',
                        'right'          => 'false',
                        'title'          => __('Header padding', 'solarize'),
                        'subtitle'       => __('Padding for header.', 'solarize'),
                        'default'            => array(
                            'padding-top'     => '65',
                            'padding-bottom'  => '65',
                        ),
                        'output'        => array('.header-inner')
                    ),
                    array(
                        'id'             => 'menu-stylei-margin',
                        'type'           => 'spacing',
                        'mode'           => 'margin',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'left'           => 'false',
                        'right'          => 'false',
                        'bottom'         => 'false',
                        'title'          => __('Menu margin', 'solarize'),
                        'subtitle'       => __('Margin for menu style 1.', 'solarize'),
                        'default'            => array(
                            'margin-top'     => '150',
                        ),
                        'output'        => array('.main-menu'),
                        'required' => array(
                            array('header-style', 'equals', 'style-i')
                        )
                    ),
                    array(
                        'id'        => 'fixed-header',
                        'type'      => 'switch',
                        'title'     => __('Fixed header on scroll', 'solarize'),
                        'subtitle'  => __('Fixed header on scroll.', 'solarize'),
                        'default'   => false,
                        'on'        => __('Enabled', 'solarize'),
                        'off'       => __('Disabled', 'solarize')
                    ),
                    array(
                        'id' => 'scroll-logo',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo upload on scroll', 'solarize'),
                        'compiler' => 'true',
                        'subtitle' => __('Upload your custom logo image', 'solarize'),
                        'default' => array('url' => get_template_directory_uri().'/assets/images/logo.png'),
                        'required' => array(
                            array('fixed-header', 'equals', true)
                        )
                    ),
                    array(
                        'id'             => 'scroll-header-padding',
                        'type'           => 'spacing',
                        'mode'           => 'padding',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'left'           => 'false',
                        'right'          => 'false',
                        'title'          => __('Header padding on scroll', 'solarize'),
                        'subtitle'       => __('Header padding on scroll.', 'solarize'),
                        'default'            => array(
                            'padding-top'     => '20',
                            'padding-bottom'  => '20',
                        ),
                        'output'        => array('header.scrolled-header .header-inner'),
                        'required' => array(
                            array('fixed-header', 'equals', true)
                        )
                    ),
                    array(
                        'id' => 'scroll-header-background-color',
                        'type' => 'color',
                        'title' => __('Header background color on scroll', 'solarize'),
                        'subtitle' => __('Header background color on scroll.', 'solarize'),
                        'default' => '#111',
                        'validate' => 'color',
                        'output'        => array('background-color' => 'header.scrolled-header .header-inner'),
                        'required' => array(
                            array('fixed-header', 'equals', true)
                        )
                    ),
                    array(
                        'id'             => 'scroll-menu-stylei-margin',
                        'type'           => 'spacing',
                        'mode'           => 'margin',
                        'units'          => 'px',
                        'units_extended' => 'false',
                        'left'           => 'false',
                        'right'          => 'false',
                        'bottom'         => 'false',
                        'title'          => __('Menu margin on scroll', 'solarize'),
                        'subtitle'       => __('Margin for menu style 1 on scroll.', 'solarize'),
                        'default'            => array(
                            'margin-top'     => '70',
                        ),
                        'output'        => array('.scrolled-header .main-menu'),
                        'required' => array(
                            array('header-style', 'equals', 'style-i'),
                            array('fixed-header', 'equals', true),
                        )
                    ),
                    array(
                        'id'        => 'nav-hashtags',
                        'type'      => 'switch',
                        'title'     => __('Enable/Disable Hashtags in URL', 'solarize'),
                        'subtitle'  => __('You can enable hashtags in the URL of your webiste when clicking on menu items to navigate on page.', 'solarize'),
                        'default'   => false,
                        'on'        => __('Enabled', 'solarize'),
                        'off'       => __('Disabled', 'solarize')
                    ),
                    array(
                        'id'        => 'scroll_offset',
                        'type'      => 'text',
                        'title'     => __('Navigation ScrollOffset Value', 'solarize'),
                        'subtitle'  => __('You can adjust the position at which the scrolling effect stops when a menu item is clicked. You can use it to set an offset value to the top of each section stop. For example, the 100 value will stop the navigation 100px above the section.', 'solarize'),
                        'desc'      => __('Use numbers only', 'solarize'),
                        'validate'  => 'numeric',
                        'default'   => '0'
                    ),
                    array(
                        'id'          => 'header-social-list',
                        'type'        => 'slides',
                        'title'       => __('Social list', 'solarize'),
                        'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'solarize'),
                        'desc'        => __('You can use font Awesome/Theme icon class', 'solarize'),
                        'placeholder' => array(
                            'title'           => __('This is a class icon font awesome.', 'solarize'),
                            'description'     => __('Description Here', 'solarize'),
                            'url'             => __('Give us a link!', 'solarize'),
                        ),
                        'default'     => array(
                            array(
                                'title'           => __('facebook', 'solarize'),
                                'description'     => __('Facebook', 'solarize'),
                                'url'             => __('http://facebook.com', 'solarize'),
                            ),
                            array(
                                'title'           => __('twitter', 'solarize'),
                                'description'     => __('Twitter', 'solarize'),
                                'url'             => __('http://twitter.com', 'solarize'),
                            ),
                            array(
                                'title'           => __('google-plus', 'solarize'),
                                'description'     => __('Goole plus', 'solarize'),
                                'url'             => __('http://plus.google.com', 'solarize'),
                            ),
                            array(
                                'title'           => __('skype', 'solarize'),
                                'description'     => __('Skype', 'solarize'),
                                'url'             => __('#', 'solarize'),
                            ),
                        ),
                    ),
                )
            );
            /*--Blog--*/
            $this->sections[] = array(
                'title' => __('Blog Settings', 'solarize'),
                'desc' => __('Blog Settings', 'solarize'),
                'icon' => 'el-icon-th-list',
                'fields' => array(
                    array(
                        'id'            => 'blog-reading-text',
                        'type'          => 'text',
                        'title'         => __('Continue reading', 'solarize'),
                        'subtitle'      => __('Continue reading text', 'solarize'),
                        'default'       => 'read more',
                    ),
                    array(
                        'id'            => 'blog-content',
                        'type'          => 'select',
                        'title'         => __('Blog metas', 'solarize'),
                        'options'       => array(
                            'content'   => 'Show Content',
                            'excerpt'   => 'Show Excerpt',
                        ),
                        'default'       => 'excerpt',
                    ),
                    array(
                        'id'        => 'blog-sidebar-position',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => __('Sidebar position', 'solarize'),
                        'subtitle'  => __('Select sidebar position.', 'solarize'),
                        'desc' => __('Select sidebar on left or right', 'solarize'),
                        'options'   => array(
                            '1' => array('alt' => '1 Column Left',      'img' => get_template_directory_uri() . '/assets/images/themeOptions/2cl.png'),
                            '2' => array('alt' => '2 Column Right',     'img' => get_template_directory_uri() . '/assets/images/themeOptions/2cr.png'),
                            '3' => array('alt' => 'Full Width',         'img' => get_template_directory_uri() . '/assets/images/themeOptions/1c.png'),
                        ),
                        'default'   => '2',
                    ),
                    array(
                        'id'       => 'blog-metas',
                        'type'     => 'select',
                        'multi'    => true,
                        'title'    => __('Blog metas', 'solarize'),
                        'options'  => array(
                            'author'    => 'Author',
                            'date'      => 'Date time',
                            'category'  => 'Category',
                            'comment'   => 'Comment',
                            'tags'      => 'Tags',
                        ),
                        'default'  => array('date','author','category','comment')
                    ),
                    array(
                        'id'       => 'blog-banner',
                        'type'     => 'background',
                        'title'    => __('Default Archive Header Background', 'solarize'),
                        'subtitle' => __('Default Archive background with image, color, etc.', 'solarize'),
                        'desc'     => "",
                        'default'  => array(
                            'background-image' => get_template_directory_uri().'/assets/images/header-background.png',
                            'background-position' => 'center top',
                            'background-repeat' =>'no-repeat',
                            'background-size' => 'cover',
                            'background-attachment' =>'fixed'
                        ),
                        'output'   => 'div.blog-header-placeholder',
                    ),
                ),
            );        
            /*--Portfolio Setting--*/
            $this->sections[] = array(
                'title' => __('Portfolio Settings', 'solarize'),
                'desc' => __('Portfolio Settings', 'solarize'),
                'icon' => 'el-icon-folder',
                'fields' => array(
                    /*     array(
                        'id' => 'show_hide_filter',
                        'type' => 'button_set',
                        'title' => __('Show hide filter portfolio', 'solarize'),
                        'subtitle' => __('Show/hide portfolio onload', 'solarize'),
                        'desc' => __('Select show hide style.', 'solarize'),
                        'options' => array( 'show_filter_portfolio' => 'Show', 'hide_filter_portfolio' => 'Hide'),
                        'default' => 'show_filter_portfolio',
                    ),
                    array(
                        'id' => 'portfolio_switch_pagination',
                        'type' => 'button_set',
                        'title' => __('Show hide portfolio pagination', 'solarize'),
                        'subtitle' => __('Show/hide portfolio pagination', 'solarize'),
                        'desc' => __('Select show hide style.', 'solarize'),
                        'options' => array( 'show_portfolio_pagination' => 'Show', 'hide_portfolio_pagination' => 'Hide'),
                        'default' => 'hide_portfolio_pagination',
                    ),
                    array(
                        'id'       => 'portfolio_banner_bg',
                        'type'     => 'background',
                        'title'    => __('Default portfolio header background', 'solarize'),
                        'subtitle' => __('Default Portfolio background with image, color, etc.', 'solarize'),
                        'desc'     => "",
                        'default'  => array(
                            'background-image' => get_template_directory_uri().'/assets/images/bg-banner.jpg',
                            'background-position' => 'center top',
                            'background-repeat' =>'no-repeat',
                            'background-size' => 'cover',
                            'background-attachment' =>'fixed'
                        ),
                        'output'   => '.portfolio-banner',
                    ),*/
                    array(
                        'id'       => 'main_portfolio_page',
                        'type'     => 'text',
                        'title'    => __('Main portfolio page set for single portfolio page', 'solarize'),
                        'subtitle' => __('You can custom portfolio main page for single portfolio page here', 'solarize'),
                        'desc'     => "",
                        // 'validate' => 'url',
                        // 'msg'      => 'custom error message',
                        'default'  => '#'
                    ),
                    array(
                        'id'        => 'grid_column_very_wide',
                        'type'      => 'slider',
                        'title'     => __('Grid Columns for Screens > 1440px', 'solarize'),
                        'subtitle'  => __('Set a number of columns for the grid, for screens wider than 1440px.', 'solarize'),
                        'default'       => 7,
                        'min'           => 1,
                        'step'          => 1,
                        'max'           => 10,
                        'display_value' => 'text'
                    ),
                    array(
                        'id'        => 'grid_column_wide',
                        'type'      => 'slider',
                        'title'     => __('Grid Columns for Screens > 1366px', 'solarize'),
                        'subtitle'  => __('Set a number of columns for the grid, for screens between 1366px and 1440px in width.', 'solarize'),
                        'default'       => 6,
                        'min'           => 1,
                        'step'          => 1,
                        'max'           => 10,
                        'display_value' => 'text'
                    ),
                    array(
                        'id'        => 'grid_column_normal',
                        'type'      => 'slider',
                        'title'     => __('Grid Columns for Screens > 1280px', 'solarize'),
                        'subtitle'  => __('Set a number of columns for the grid, for screens between 1280px and 1366px in width.', 'solarize'),
                        'default'       => 6,
                        'min'           => 1,
                        'step'          => 1,
                        'max'           => 10,
                        'display_value' => 'text'
                    ),
                    array(
                        'id'        => 'grid_column_small',
                        'type'      => 'slider',
                        'title'     => __('Grid Columns for Screens > 1024px', 'solarize'),
                        'subtitle'  => __('Set a number of columns for the grid, for screens between 1024px and 1280px in width.', 'solarize'),
                        'default'       => 4,
                        'min'           => 1,
                        'step'          => 1,
                        'max'           => 10,
                        'display_value' => 'text'
                    ),
                    array(
                        'id'        => 'grid_column_tablet',
                        'type'      => 'slider',
                        'title'     => __('Grid Columns for Screens > 768px', 'solarize'),
                        'subtitle'  => __('Set a number of columns for the grid, for screens between 768px and 1024px in width.', 'solarize'),
                        'default'       => 3,
                        'min'           => 1,
                        'step'          => 1,
                        'max'           => 10,
                        'display_value' => 'text'
                    ),
                    array(
                        'id'        => 'grid_column_phone',
                        'type'      => 'slider',
                        'title'     => __('Grid Columns for Screens > 480px', 'solarize'),
                        'subtitle'  => __('Set a number of columns for the grid, for screens between 480px and 768px in width.', 'solarize'),
                        'default'       => 2,
                        'min'           => 1,
                        'step'          => 1,
                        'max'           => 10,
                        'display_value' => 'text'
                    ),

                    array(
                        'id'        => 'grid_gutter_width',
                        'type'      => 'slider',
                        'title'     => __('Grid Gutter Width', 'solarize'),
                        'subtitle'  => __('Set the space between the projects, in the grid', 'solarize'),
                        'default'       => 4,
                        'min'           => 0,
                        'step'          => 2,
                        'max'           => 50,
                        'display_value' => 'text'
                    ),
                ),
            );

/**
             * Check if WooCommerce is active
             **/
            if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                // Put your plugin code here

                /*-- Woocommerce Setting--*/
                /*$this->sections[] = array(
                    'title' => __('Woocommerce', 'solarize'),
                    'desc' => __('Woocommerce Settings', 'solarize'),
                    'icon' => 'el-icon-shopping-cart',
                    'fields' => array(
                        array(
                            'id'        => 'woo_layout',
                            'type'      => 'image_select',
                            'compiler'  => true,
                            'title'     => __('Woocommerce sidebar position', 'solarize'),
                            'subtitle'  => __('Select Woocommerce sidebar position.', 'solarize'),
                            'desc' => __('Select sidebar on left or right', 'solarize'),
                            'options'   => array(
                                'left-sidebar' => array('alt' => '1 Column Left',      'img' => get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2cl.png'),
                                'right-sidebar' => array('alt' => '2 Column Right',     'img' => get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2cr.png'),
                                'fullwidth' => array('alt' => 'Full Width',         'img' => get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/1column.png'),
                            ),
                            'default'   => 'left-sidebar',
                        ),
                       array(
                        'id'        => 'woo_product_layout',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => __('Woocommerce product layout', 'solarize'),
                        'subtitle'  => __('Set number column in product archive page.', 'solarize'),
                        'options'   => array(
                                '3' => array('alt' => '3 Column ',      'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/3columns.png'),
                                '4' => array('alt' => '4 Column ',      'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/4columns.png')
                            ),
                            'default'   => '3',
                        ),
                    ),
                );*/
            }

            /*--Footer setting--*/
            $this->sections[] = array(
                'title' => __('Footer Settings', 'solarize'),
                'desc' => __('Footer Settings', 'solarize'),
                'icon' => 'el-icon-credit-card',
                'fields' => array(
                     array(
                        'id'        => 'solarize-footer-number-widget',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => __('Footer widgets', 'solarize'),
                        'subtitle'  => __('Select footer number widget.', 'solarize'),
                        'options'   => array(
                            '0' => array('alt' => '1 Column', 'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/0column.png'),
                            '1' => array('alt' => '1 Column', 'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/1column.png'),
                            '2' => array('alt' => '2 Column ', 'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2columns.png'),
                            '3' => array('alt' => '3 Column ','img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/3columns.png'),
                            '4' => array('alt' => '4 Column ', 'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/4columns.png')
                        ),
                        'default'   => '4',
                    ),
                    array(
                        'id' => 'footer-color-scheme',
                        'type' => 'button_set',
                        'title' => __('Select footer color scheme text', 'solarize'),
                        'subtitle' => __('Footer color scheme text', 'solarize'),
                        'options' => array( 'darker-overlay' => __('Light Text', 'solarize'), 'lighter-overlay' => __('Dark text', 'solarize')),
                        'default' => 'lighter-overlay',
                    ),
                    array(
                        'id' => 'footer_copyright_text',
                        'type' => 'editor',
                        'title' => __('Footer copyright text', 'solarize'),
                        'subtitle' => __('Copyright text', 'solarize'),
                        'default' => __('<p>Copyright - Registered 2016 by <a href="http://themeforest.net/user/coronathemes">CoronaThemes</a>.</p>', 'solarize'),
                    ),
                    array(
                        'id'          => 'footer-social-list',
                        'type'        => 'slides',
                        'title'       => __('Social list', 'solarize'),
                        'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'solarize'),
                        'desc'        => __('Font awesome\Themeify icon class', 'solarize'),
                        'placeholder' => array(
                            'title'           => __('This is a font awesome\themeify icon class.', 'solarize'),
                            'description'     => __('Description Here', 'solarize'),
                            'url'             => __('Give us a link!', 'solarize'),
                        ),
                        'default'     => array(
                            array(
                                'title'           => __('ti-facebook', 'solarize'),
                                'description'     => __('Facebook', 'solarize'),
                                'url'             => __('http://facebook.com', 'solarize'),
                            ),
                            array(
                                'title'           => __('ti-twitter', 'solarize'),
                                'description'     => __('Twitter', 'solarize'),
                                'url'             => __('http://twitter.com', 'solarize'),
                            ),
                            array(
                                'title'           => __('ti-google', 'solarize'),
                                'description'     => __('Goole plus', 'solarize'),
                                'url'             => __('http://plus.google.com', 'solarize'),
                            ),
                            array(
                                'title'           => __('ti-skype', 'solarize'),
                                'description'     => __('Skype', 'solarize'),
                                'url'             => __('#', 'solarize'),
                            ),
                        ),
                    )
                )
            );

            /*--Import/Export Setting--*/
            $this->sections[] = array(
                'title' => __('Import/Export ', 'solarize'),
                'desc' => __('Import/Export Settings', 'solarize'),
                'icon' => 'el-icon-refresh',
                'fields' => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => 'Import Export',
                        'subtitle'      => 'Save and restore your Redux options',
                        'full_width'    => false,
                    ),
                ),
            );
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => __('Theme Information 1', 'solarize'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'solarize')
            );

            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-2',
                'title' => __('Theme Information 2', 'solarize'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'solarize')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'solarize');
        }

        /**
         * All the possible arguments for Redux.
         * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'solarize_config', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'submenu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => false, // Show the sections below the admin menu item or not
                'menu_title' => __('Theme Options', 'solarize'),
                'page_title' => __('Theme Options', 'solarize'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyA8xiYs49m_QkQ4M6gA-jtwYjNuQEVGJqo', // Must be defined to add google fonts to the typography module
                //'async_typography' => true, // Use a asynchronous font on the front end or font string
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'dev_mode' => false, // Show the time the page took to load, etc
                'customizer' => true, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => '', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => 'solarize_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for adbolderced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'              => 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'       => '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // __( '', $this->args['domain'] );
                'hints' => array(
                    'icon'              => 'icon-question-sign',
                    'icon_position'     => 'right',
                    'icon_color'        => 'lightgray',
                    'icon_size'         => 'normal',

                    'tip_style'         => array(
                        'color'     => 'light',
                        'shadow'    => true,
                        'rounded'   => false,
                        'style'     => '',
                    ),
                    'tip_position'      => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect' => array(
                        'show' => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'mouseover',
                        ),
                        'hide' => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );

            $this->args['share_icons'][] = array(
                'url' => 'https://www.facebook.com',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://twitter.com',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );

            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace("-", "_", $this->args['opt_name']);
                }
                // $this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'solarize'), $v);
            } else {
                // $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'solarize');
            }

            // Add content after the form.
            // $this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'solarize');
        }

    }

    new Redux_Framework_sample_config();
}


/**
 *Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')):

    function redux_my_custom_field($field, $value) {
        print_r($field);
        print_r($value);
    }

endif;

/**
 * Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')):

    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }


endif;