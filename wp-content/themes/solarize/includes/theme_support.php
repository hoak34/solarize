<?php
	/**
	 * CoronaThemes Framework functions and definitions.
	 *
	 * @package WordPress
	 * @subpackage CoronaThemes
	 * @since CoronaThemes Framework 1.0
	*/

	if ( ! isset( $content_width ) ) {
		$content_width = 960;
	}

	/**
	 * Sets up theme defaults and registers the various WordPress features that
	 * CoronaThemes Framework supports.
	 *
	 * @uses load_theme_textdomain() For translation/localization support.
	 * @uses add_editor_style() To add a Visual Editor stylesheet.
	 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
	 * 	custom background, and post formats.
	 * @uses register_nav_menu() To add support for navigation menus.
	 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
	 *
	 * @since CoronaThemes Framework 1.0
	*/

	if( !function_exists( 'solarize_setup' ) ) {

		/*
		 * setup text domain and style
		*/
		function solarize_setup() {
			load_theme_textdomain( 'solarize', get_template_directory() . '/languages' );
			add_editor_style();
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'post-formats', array(  'image', 'gallery','video','audio','quote','aside','link' ) );
			add_theme_support( "title-tag" );
			//add_theme_support( 'woocommerce' );

			if ( isset($solarize_config) ) {
				global $solarize_config;
				$args = array(
					'default-image' => $solarize_config['menu_background_color']['background-image'],
				);

				add_theme_support( 'custom-header', $args );
				add_theme_support( 'custom-background', $args );

			}

			//add image sizes
			if(function_exists('add_image_size')) {
				add_image_size('full-size',  9999, 9999, false);
				add_image_size('small-thumb',  90, 90, true);
			}

			//overide js_composer languages
			$js_composer_mofile = get_template_directory() . "/languages/js_composer.mo";
			load_textdomain( 'js_composer', $js_composer_mofile );
		}
		add_action( 'after_setup_theme', 'solarize_setup' );

	}

	/*
	 * Add theme support thumbnails
	*/
	add_theme_support('post-thumbnails', array('post', 'portfolio', 'service', 'member'));

	if( !function_exists( 'solarize_add_thumbnail_size' ) ) {

		/*
		 * Add thumb size image when upload
		*/
		function solarize_add_thumbnail_size($thumb_size){
			foreach ($thumb_size['imgSize'] as $sizeName => $size)
			{
				if($sizeName == 'base')
				{
					set_post_thumbnail_size($thumb_size['imgSize'][$sizeName]['width'], $thumb_size[$sizeName]['height'], true);
				} else {
					add_image_size(
						$sizeName,
						$thumb_size['imgSize'][$sizeName]['width'],
						$thumb_size['imgSize'][$sizeName]['height'],
						true
					);
				}
			}
		}

		$thumb_size['imgSize']['feature-thumb'] = array('width'=>380,  'height'=>488);
		$thumb_size['imgSize']['feature-thumb-small'] = array('width'=>408,  'height'=>411);
		//$thumb_size['imgSize']['portfolio-grid-4-full'] = array('width'=>473,  'height'=>350);
		//$thumb_size['imgSize']['team-member-portrait'] = array('width'=>318,  'height'=>535);
		//$thumb_size['imgSize']['blog-list-sidebar'] = array('width'=>780,  'height'=>450);
  		//$thumb_size['imgSize']['portfolio-list-full'] = array('width'=>1140,  'height'=>606);
		$thumb_size['imgSize']['client-work'] = array('width'=>170,  'height'=>170);
		$thumb_size['imgSize']['team-member'] = array('width'=>233,  'height'=>418);
		$thumb_size['imgSize']['testimonial'] = array('width'=>73,  'height'=>73);
		$thumb_size['imgSize']['service'] = array('270'=>73, 'height'=>260);
		//$thumb_size['imgSize']['pricing'] = array('width'=>350,  'height'=>147);
		//$thumb_size['imgSize']['img175x174'] = array('width'=>175,  'height'=>174);
		//$thumb_size['imgSize']['img216x460'] = array('width'=>216,  'height'=>460);

		solarize_add_thumbnail_size($thumb_size);

	}


	if( !function_exists( 'solarize_scripts_styles' ) ) {

		/**
		 * Enqueues scripts and styles for front-end.
		 *
		 * @since CoronaThemes Framework 1.0
		 */
		function solarize_scripts_styles() {
			global $wp_styles;

			/*
			 * Adds JavaScript to pages with the comment form to support
			 * sites with threaded comments (when in use).
			 */
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );

			// IE style

			wp_enqueue_style( 'solarize-ie', get_template_directory_uri() . '/css/ie.css', array( 'solarize-style' ), '1.0' );
			$wp_styles->add_data( 'solarize-ie', 'conditional', 'lt IE 9' );
		}
		add_action( 'wp_enqueue_scripts', 'solarize_scripts_styles' );

	}


	if(!( function_exists('solarize_comment') )){

	  	/*
	  	 * Function comment
	  	*/
	  	function solarize_comment($comment, $args, $depth) {
	  	$GLOBALS['comment'] = $comment;
	?>

		<!--Comment Item-->
        <div class="media comment-item" id="comment-<?php comment_ID() ?>">
            <!--Avatar-->
            <a class="pull-left" href="#">
                <!-- <img class="media-object" src="images/blog/img-9.jpg" alt=""> -->
                <?php echo get_avatar( $comment->comment_author_email, 100 ); ?>
            </a>
            <!--End Avatar-->
            <!--Content-->
            <div class="media-body">
                <h5 class="media-heading"><?php echo get_comment_author_link() ?></h5>
                <div class="meta-comment">
                	<span class="media-date"><?php echo get_comment_date(); ?></span>
                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-mail-reply"></i> Reply', 'solarize' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
                <div class="comment-text">
                    <?php echo wpautop( get_comment_text() ); ?>
                </div>
                <?php if ($comment->comment_approved == '0') : ?>
	              <p><em><?php _e('Your comment is awaiting moderation.', 'solarize') ?></em></p>
	            <?php endif; ?>
            </div>
            <!--Content-->
        </div>
        <!--End Comment Item-->

	<?php
		}

	}

	if ( ! function_exists( 'solarize_entry_meta' ) ) {

		/**
		 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
		 *
		 * Create your own solarize_entry_meta() to override in a child theme.
		 *
		 * @since CoronaThemes Framework 1.0
		 */
		function solarize_entry_meta() {
			// Translators: used between list items, there is a space after the comma.
			$categories_list = get_the_category_list( __( ', ', 'solarize' ) );

			// Translators: used between list items, there is a space after the comma.
			$tag_list = get_the_tag_list( '', __( ', ', 'solarize' ) );

			$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);

			$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'solarize' ), get_the_author() ) ),
				get_the_author()
			);

			// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
			if ( $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'solarize' );
			} elseif ( $categories_list ) {
				$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'solarize' );
			} else {
				$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'solarize' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				$date,
				$author
			);
		}

	}

	// Define constant
	$get_theme = wp_get_theme();

	define('CORONATHEMES_THEME_NAME', $get_theme);
	define('CORONATHEMES_THEME_VERSION', '1.0.0.0');
	define('CORONATHEMES_BASE_URL', get_template_directory_uri());
	define('CORONATHEMES_BASE', get_template_directory());
	define('CORONATHEMES_INCS', CORONATHEMES_BASE . '/includes');
	define('CORONATHEMES_JS', CORONATHEMES_BASE_URL . '/assets/js');
	define('CORONATHEMES_CSS', CORONATHEMES_BASE_URL . '/assets/css');
	define('CORONATHEMES_IMAGES', CORONATHEMES_BASE_URL . '/assets/images');
	define('CORONATHEMES_IMG', CORONATHEMES_BASE_URL . '/assets/img');