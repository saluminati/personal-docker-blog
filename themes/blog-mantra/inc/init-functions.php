<?php
/**
 * Load files
 *
 * @package Blog_Mantra
 */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Include default theme options
 */
require_once get_template_directory() . '/inc/customizer/default.php';

/**
 * Hook for Slider / Banner
 */
require get_template_directory() . '/inc/hooks/slideshow.php';

/**
 * Hook for page header
 */
require get_template_directory() . '/inc/hooks/page-header.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Hook for footer social media
 */
require get_template_directory() . '/inc/hooks/social-media.php';

/**
 * bootstrap navigation
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Breadcrumbs
 */
require get_template_directory() . '/inc/breadcrumbs/breadcrumbs.php';

/**
 * Author Bio
 */
require get_template_directory() . '/inc/widgets/author-bio.php';

/**
 * Recent Posts Giant
 */
require get_template_directory() . '/inc/widgets/recent-posts-giant.php';

/**
 * Recent Posts Mini
 */
require get_template_directory() . '/inc/widgets/recent-posts-mini.php';

/**
 * Connect Socially Widget
 */
require get_template_directory() . '/inc/widgets/connect-socially.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

if ( is_admin() ) {

    // Load About Blog Mantra Info.
    require_once get_template_directory() . '/inc/about-blog-mantra/about-blog-mantra.php';

}

/**
 * welcome message
 */

function bm_theme_activation_notice() {
    echo '<div class="notice notice-success is-dismissible">';
        echo '<p>'. esc_html__( 'Thank you for choosing Blog Mantra ! Now you can visit our welcome page.', 'blog-mantra' ) .'</p>';
        echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=about-blog-mantra' ) ) .'" class="button button-primary">'. esc_html__( 'Get Started with Blog Mantra', 'blog-mantra' ) .'</a></p>';
    echo '</div>';
}


/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function blog_mantra_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'blog_mantra_excerpt_more' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function blog_mantra_custom_excerpt_length( $length ) {
    return 36;
}

if ( ! is_admin() ) {
    add_filter( 'excerpt_length', 'blog_mantra_custom_excerpt_length', 999 );
}


/**
 * Function to check widget status
 */
 if ( ! function_exists( 'blog_mantra_widget_count' ) ) :

 function blog_mantra_widget_count( $sidebar_names ){

    $status = 0;

    foreach ($sidebar_names as $sidebar) {
      
        if( is_active_sidebar( $sidebar )){
            $status = $status+1;
        }
    }

    return $status;        
 }

endif;


/**
 * Function to convert hex code into rgba color code
 */

if ( ! function_exists( 'blog_mantra_hexToRgb' ) ) :

function blog_mantra_hexToRgb($color, $opacity = false) {
    $default = 'rgb(0,0,0)';    
    
    if (empty($color))
        return $default;    
 
    if ($color[0] == '#')
        $color = substr($color, 1);
    
    if (strlen($color) == 6)
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    
    elseif (strlen($color) == 3)
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    
    else
        return $default;
       
    $rgb = array_map('hexdec', $hex);    
 
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
 
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }    
    return $output;
}

endif;


/**
 * Function for owlcarousel dynamic slideSpeed and autoplayTimeout
 */
function blog_mantra_load_owl_scripts() {

    $theme_options  = blog_mantra_theme_options();

    wp_localize_script( 'blog-mantra-custom', 'blog_mantra_script_vars', array(
        'autoPlaySpeed'     => absint($theme_options['slider_transition_duration']*1000),
        'autoplayTimeout'   => absint($theme_options['slider_transition_delay']*1000),
        )
    );
 
}
add_action('wp_enqueue_scripts', 'blog_mantra_load_owl_scripts');
