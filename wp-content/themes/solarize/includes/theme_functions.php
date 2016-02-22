<?php
//**
// TITLE TAG
//**
function solarize_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'solarize' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'solarize_wp_title', 10, 2 );

  if( !function_exists( 'solarize_header_metas' ) )
  {

    /*
     * header metas
    */
    function solarize_header_metas()
    {
      echo '<link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">'."\n";
      echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-57x57.png" />'."\n";
      echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />'."\n";
      echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />'."\n";
    }
    add_action('wp_head', 'solarize_header_metas',1);

  }


  if( !function_exists( 'solarize_get_tracking_code' ) )
  {

    /*
     * Get tracking code
    */
    function solarize_get_tracking_code()
    {
      global $solarize_config;

      $return ='';
      if( $solarize_config['tracking-code'] )
      {
        $return .= stripslashes($solarize_config['tracking-code']);
      }

      echo  '<script>
                jQuery(function () {
                '.$return.'
                });
            </script>';
    }
    add_action('wp_head','solarize_get_tracking_code');

  }


  if( !function_exists( 'solarize_ie_js' ) ) {

    /*
     * ie script
    */
    function solarize_ie_js()
    {
      preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
      if (count($matches)>1){
        //Then we're using IE
        $version = $matches[1];

        switch(true){
          case ($version<=8):

             echo '<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em>Upgrade to a different browser or install Google Chrome Frame to experience this site.</p><![endif]-->';
            break;

          case ($version<=9):
          // Jquery html5.js
            wp_register_script( 'html5.js.min.js', CORONATHEMES_JS. '/html5shiv.js', false, CORONATHEMES_THEME_VERSION ,true);
            wp_enqueue_script('html5.js.min.js');
            break;
          case ($version=7):
            wp_register_script( 'icons-lte-ie7', CORONATHEMES_JS. '/fonts/Simple-Line-Icons/icons-lte-ie7.js', false, CORONATHEMES_THEME_VERSION ,true);
            wp_enqueue_script('icons-lte-ie7');
            break;
          case ($version=8):
          ?>
            <!--[if lt IE 8]>
            <style>
            /* For IE < 8 (trigger haslayout) */
            .clearfix {
                zoom:1;
            }
             8="" (trigger="" haslayout)="" */="" .clearfix="" {="" zoom:1;="" }=""></ 8 (trigger haslayout) */
            .clearfix {
                zoom:1;
            }
            ></style>
            <![endif]-->

          <?php
          break;
          default:
            //You get the idea
        }
      }
    }
    add_action('wp_head', 'solarize_ie_js');

  }

  if( !function_exists( 'solarize_search_form' ) ) {

    /*
     * Filter Search form
    */
    function solarize_search_form( $form ) {

        $form = '<div class="blog-search">
                    <form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
                        <input placeholder="Search.." type="search" name="s"  />
                        <span><button type="submit" id="submit_btn" class="search-submit"><i class="fa fa-search"></i></button></span>
                    </form>
                </div>';

        return $form;
    }
    add_filter( 'get_search_form', 'solarize_search_form' );

  }


  if( !function_exists( 'solarize_get_archives_link_custom' ) ) {

    /*
     * get archives link custom
    */
    function solarize_get_archives_link_custom($url) {
      $link = str_replace('<li>', '<li class="cat-item">', $url);
      return $link;
    }
    add_filter('get_archives_link','solarize_get_archives_link_custom');

  }

  if(!( function_exists('solarize_pagination') )){

    /*
     * function pahgination
    */

  function solarize_pagination($pages = '', $range = 2)
  {
    $showitems = ($range * 1)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == ''){
     global $wp_query;
     $pages = $wp_query->max_num_pages;
      if(!$pages) {
       $pages = 1;
      }
    }
    $output = '';
    if(1 != $pages){
      $output .= "<ul class='pagination'>";

      if($paged > 1 && $showitems < $pages) {
        $output .= "<li><a href='".get_pagenum_link($paged-1)."' class='navlinks'><i class='fa fa-angle-left'></i></a></li>";
      }
      for ($i=1; $i <= $pages; $i++){
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
        $output .= ($paged == $i)? "<li class='active'><a href='".get_pagenum_link($i)."' class='navlinks'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='navlinks'>".$i."</a></li>";
        }
      }
      if ($paged < $pages && $showitems < $pages) {
        $output .= "<li><a href='".get_pagenum_link($paged+1)."' class='navlinks'><i class='fa fa-angle-right'></i></a></li>";
      }
      $output.= "</ul>";
    }
    return $output;
  }

  }

if(!( function_exists('solarize_solarize_pagination') )){

    /*
     * function pahgination
    */
    function solarize_solarize_pagination(){
        $output = '';
          $output = '<!-- Page navigato -->
            <div class="pagenavigato">';
                if ( !is_null(get_previous_posts_link()) ) {
                  $ppl=explode('"',get_previous_posts_link());
                    $ppl_url=$ppl[1];
                      $output.='<a href="'.$ppl_url.'" class="prev-page float-left" title="Oder posts"><i class="fa fa-caret-left"></i>Oder posts</a>';
                }
                if ( !is_null(get_next_posts_link()) ) {
                  $npl=explode('"',get_next_posts_link());
                    $npl_url=$npl[1];
                      $output.='<a href="'.$npl_url.'" class="next-page float-right" title="New posts">Next posts<i class="fa fa-caret-right"></i></a>';
            }

          $output.='</div>
          <!-- Page navigato -->';
      return $output;
    }

  }



if(!( function_exists('solarize_isotope_terms') )){
    function solarize_isotope_terms() {
    global $post;
      if( get_the_terms($post->ID,'portfolio_cats') ) {
        $terms = get_the_terms($post->ID,'portfolio_cats','','','');
        $terms = array_map('solarize_isotope_cb', $terms);
        return implode(' ', $terms);
      }
    }
  }

if(!( function_exists('solarize_isotope_cb') )){

    function solarize_isotope_cb($t) {
      return $t->slug;
    }
  }

if(!( function_exists('hex2rgb') )){
  function hex2rgb($hex) {
     $hex = str_replace("#", "", $hex);

     if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
     } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
     }
     $rgb = array($r, $g, $b);
     //return implode(",", $rgb); // returns the rgb values separated by commas
     return $rgb; // returns an array with the rgb values
  }
}
remove_action( 'admin_init', 'wp_auth_check_load' ); 


if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
if(!( function_exists('woo_custom_product_searchform') )){

    add_filter( 'get_product_search_form' , 'woo_custom_product_searchform' );

    /**
     * woo_custom_product_searchform
     *
     * @access      public
     * @since       1.0
     * @return      void
    */
    function woo_custom_product_searchform( $form ) {

      $form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">        
          <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search for product', 'solarize' ) . '" />
          <!-- <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'solarize' ) .'" /> -->
          <span><button class="search-submit" id="submit_btn" type="submit"><i class="fa fa-search"></i></button></span>
          <input type="hidden" name="post_type" value="product" />        
      </form>';

      return $form;

    }

}

if(!( function_exists('solarize_dequeue_styles') )){
    // Remove each style one by one
    add_filter( 'woocommerce_enqueue_styles', 'solarize_dequeue_styles' );
    function solarize_dequeue_styles( $enqueue_styles ) {
      unset( $enqueue_styles['woocommerce-general'] );  // Remove the gloss
      unset( $enqueue_styles['woocommerce-layout'] );   // Remove the layout
      unset( $enqueue_styles['woocommerce-smallscreen'] );  // Remove the smallscreen optimisation
      return $enqueue_styles;
    }
}

if(!( function_exists('woo_number_per_page') )){

    function woo_number_per_page(){
      global $solarize_config_product_count;
      $solarize_product_count  = 9;
      return 9;
    }
    add_filter( 'loop_shop_per_page', 'woo_number_per_page', 20 );

}

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */
function woo_related_products_limit() {
  global $product,$solarize_config;
  $args['posts_per_page'] = 6;
  return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'solarize_related_products_args' );
  function solarize_related_products_args( $args ) {
    global $woocommerce_loop,$solarize_config;
    // Store column count for displaying the grid
    if ( empty( $woocommerce_loop['columns'] ) )
      $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $solarize_config['woo_product_layout'] );


     if ($woocommerce_loop['columns'] == '3') {
        $args['columns'] = 3; // arranged in 2 columns
        $args['posts_per_page'] = 3; // 3 related products

      }elseif ($woocommerce_loop['columns'] =='4') {
        $args['columns'] = 4; // arranged in 2 columns
        $args['posts_per_page'] = 4; // 4 related products

      }elseif ($woocommerce_loop['columns'] =='2') {
        $args['columns'] = 2; // arranged in 2 columns
        $args['posts_per_page'] = 2; // 2 related products
      }

      return $args;

    }
  if(!( function_exists('get_cart_sidebar') )){

  add_filter('mini_cart_menu_item', 'get_cart_sidebar');
      function get_cart_sidebar()
      {
        global $woocommerce;
        $sidebar_contents = '';
        $sidebar_contents .= '<li class="mini-shoping-cart-wraper menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  dropdown">';
        $sidebar_contents .= '<a class="dropdown-toggle cart-contents" href="'.$woocommerce->cart->get_cart_url().'" title="'. __('View your shopping cart', 'solarize').'"><i class="fa fa-shopping-cart"></i><span class="cart-number-items">'.sprintf('%d', $woocommerce->cart->cart_contents_count).'</span></a>';
        $sidebar_contents .= '<div  class="dropdown-menu mini-shoping-cart">';
        $sidebar_contents .= '<div  class="widget_shopping_cart_content">';
          if( is_cart() && sizeof($woocommerce->cart->cart_contents) != 0){
                ob_start();
                dynamic_sidebar('solarize_shoping_cart_sidebar');
                $temp = ob_get_clean();
              $sidebar_contents .= $temp;
          }
        $sidebar_contents .= "</div>";
        $sidebar_contents .= "</div>";
        $sidebar_contents .= "</li>";
        return $sidebar_contents;
      }

  }

// Ensure cart contents update when products are added to the cart via AJAX
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

  function woocommerce_header_add_to_cart_fragment( $fragments ) {
      global $woocommerce;

      ob_start();

      ?>
      <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'solarize'); ?>">
      <i class="fa fa-shopping-cart"></i>
      <span class="cart-number-items"><?php echo $woocommerce->cart->cart_contents_count;?>
      </span></a>
      <?php

      $fragments['a.cart-contents'] = ob_get_clean();

      return $fragments;

}

// add_filter('wp_nav_menu_items','add_cart_box_to_menu', 10, 2);
  function add_cart_box_to_menu( $items, $args ) {
      if( $args->theme_location == 'main_menu' )
        {
            return $items.get_cart_sidebar();
        }


  }

}

function solarize_custom_walker( $args ) {
    return array_merge( $args, array(
        'walker' => new solarize_navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'solarize_custom_walker' );

function language_selector_flags(){
    if(( function_exists('icl_get_languages') )){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        foreach($languages as $l){
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
            if(!$l['active']) echo '</a>';
        }
    }
  }
}

/*function imgs_checkbox_footer() {
    echo '<div style="display:none" id="st_img_true_false" data-imgtrue="'.CORONATHEMES_BASE_URL.'/assets/images/true.png" data-imgfalse="'.CORONATHEMES_BASE_URL.'/assets/images/false.png"></div>';
}
add_action('wp_footer', 'imgs_checkbox_footer');*/

// Search post

//function SearchFilter($query) {
//  if ($query->is_search) {
//  $query->set('post_type', 'post');
//  }
//  return $query;
//}
//add_filter('pre_get_posts','SearchFilter');


if(!function_exists('is_login_page')) {
    function is_login_page()
    {
        return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
    }
}


add_filter('deprecated_function_trigger_error', '_no_deprecated_func_alert');
function _no_deprecated_func_alert($x){
    return false;
}

// Add bodyclass
add_filter( 'body_class', 'solarize_body_class' );
function solarize_body_class( $classes ) {
    global $solarize_config;
    if($solarize_config['layout-type'] == 'box'){
        $classes[] = 'box-layout';
    }

    // return the $classes array
    return $classes;
}

if(!function_exists('solarize_get_post_format_icon')){
    function solarize_get_post_format_icon($post){
        $format = get_post_format($post);
        $html = '';
        switch($format){
            case 'aside':
                $html = '<i class="fa-notepad"></i>';
                break;
            case 'chat':
                $html = '<i class="fa-comment-alt"></i>';
                break;
            case 'gallery':
                $html = '<i class="fa-gallery"></i>';
                break;
            case 'link':
                $html = '<i class="fa-link"></i>';
                break;
            case 'image':
                $html = '<i class="fa-image"></i>';
                break;
            case 'status':
                $html = '<i class="fa-pin-alt"></i>';
                break;
            case 'video':
                $html = '<i class="fa-video-camera"></i>';
                break;
            case 'audio':
                $html = '<i class="fa-music-alt"></i>';
                break;
            default:
                $html = '<i class="fa-vector"></i>';
        }

        return $html;
    }
}

//Timeago
function solarize_timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return __("one minute ago", 'solarize');
        }
        else{
            return sprintf(__("%d minutes ago", 'solarize'), $minutes);
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return __("an hour ago", 'solarize');
        }else{
            return sprintf(__("%d hours ago", 'solarize'), $hours);
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return __("yesterday", 'solarize');
        }else{
            return sprintf(__("%d days ago", 'solarize'), $days);
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return __("a week ago", 'solarize');
        }else{
            return sprintf(__("%d weeks ago", 'solarize'), $weeks);
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return __("a month ago", 'solarize');
        }else{
            return sprintf(__("%d months ago", 'solarize'), $months);
        }
    }
    //Years
    else{
        if($years==1){
            return __("one year ago", 'solarize');
        }else{
            return sprintf(__("%d years ago", 'solarize'), $years);
        }
    }
}


function solarize_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'solarize_move_comment_field_to_bottom' );

function get_solarize_setting(){
    global $solarize_config;

    return $solarize_config;
}