<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>

<?php 
    global $solarize_config, $post;
    if(isset($_GET['header-style']) && !empty($_GET['header-style'])){
            $solarize_config['header-style'] = $_GET['header-style'];
    }
    $class = $solarize_config['header-style'];
    if($solarize_config['fixed-header']){
        $class .= ' sticky';
    }

    $color_scheme = $solarize_config['header-color-scheme'];
    if(is_page_template('templates/home-template.php')){
        if(get_post_meta($post->ID, 'solarize_page_header_color_scheme', true)){
            $color_scheme = get_post_meta($post->ID, 'solarize_page_header_color_scheme', true);
        }
    }
    $class .= ' '.$color_scheme;

    $logo_image = '';
    if(isset($solarize_config['logo']['url']) && $solarize_config['logo']['url'])
    {
        $logo_image = $solarize_config['logo']['url'];
    }
    if(is_page() && get_post_meta($post->ID, 'solarize_page_logo_image', true)){
        $logo_image = get_post_meta($post->ID, 'solarize_page_logo_image', true);
    }
?>

<body <?php body_class(); ?>>
    <div class="body-background-image"></div>
    <!--Wrapper-->
    <div id="wrapper">
        <header class="<?php echo esc_attr($class); ?>">
            <div class="container">
                <div class="logo-bar">
                    <div class="logo">
                        <a href="<?php echo get_home_url(); ?>" class="ariva_logo">
                            <?php if($logo_image){ ?>
                                <img src="<?php echo esc_url($logo_image); ?>"  alt="<?php echo get_bloginfo('name') ?>">
                            <?php }else{ ?>
                                <span><?php echo get_bloginfo('name') ?></span>
                            <?php } ?>
                        </a>
                    </div>
                </div>
                <nav class="main-menu nav-menu">
                    <?php get_template_part('includes/templates/menu', ''); ?>
                </nav>
            </div>
        </header>
        <?php
        if(!is_page_template('templates/home-template.php')){
           // $background_url = $solarize_config['header-background-image'] ? $solarize_config['header-background-image']['url'] : '';
            if(is_home() && $solarize_config['header-style']){
                $background_url = get_post_meta($post->ID, 'solarize_header_background_image', true);
                ?>
                <div class="header-placeholder blog-header-placeholder"></div>
                <?php
            }
            elseif($post && get_post_meta($post->ID, 'solarize_header_background_image', true)){
                $background_url = get_post_meta($post->ID, 'solarize_header_background_image', true);
                ?>
                <div class="header-placeholder" style="background-image: url(<?php echo esc_url($background_url); ?>)"></div>
                <?php
            }else{
            ?>
                <div class="header-placeholder"></div>
            <?php
            }
        }