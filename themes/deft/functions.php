<?php
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Deft functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Deft
 */

if ( ! function_exists( 'deft_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function deft_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Deft, use a find and replace
		 * to change 'deft' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'deft' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'deft' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'deft_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		/**
		 * Add theme support for WooCommerce 
		 *
		 * @link https://wordpress.org/plugins/woocommerce/
		 */
		add_theme_support('woocommerce');	
	}
endif;
add_action( 'after_setup_theme', 'deft_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function deft_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'deft_content_width', 640 );
}
add_action( 'after_setup_theme', 'deft_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function deft_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'deft' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'deft' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Off Canvas Sidebar', 'deft' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'deft' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'deft_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function deft_scripts() {
	/*google font  */
    wp_enqueue_style( 'googleapis', '//fonts.googleapis.com/css?family=Bitter:400,400i|Raleway:400,500,600,700,800,900', array(), null );
	
	//*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0' );
	
	/*Bootstrap CSS*/
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.5.0' );
    /*Animited CSS*/
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '4.5.0' );
    
    wp_enqueue_style( 'bootsnav', get_template_directory_uri() . '/css/bootsnav.css', array(), '4.5.0' );
    
	wp_enqueue_style( 'deft-style', get_stylesheet_uri() );

	/*Bootstrap JS*/
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.6.0' );
    wp_enqueue_script( 'deft-bootsnav', get_template_directory_uri() . '/js/bootsnav.js', array('jquery'), '4.5.0' );

	wp_enqueue_script( 'deft-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '4.5.0' );
	
	wp_enqueue_script( 'deft-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true 	);

	$sticky_sidebar = absint(get_theme_mod('deft_sticky_sidebar_option', 1) );
		if($sticky_sidebar == 1 ){
			wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js', array(), '20151215', true );		
			wp_enqueue_script( 'deft-sticky-sidebar', get_template_directory_uri() . '/js/sticky-sidebar.js', array(), '20151215', true );
}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'deft_scripts' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add Kirki customizer library file
 */
require get_template_directory() . '/inc/kirki/kirki.php';

/**
 * Load Kirki theme options file
 */
require get_template_directory() . '/inc/kirki-theme-options.php';

/**
 * Custom Function Templates
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Custom Author Widget
 */
require get_template_directory() . '/inc/custom-author-widget.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';	

/**
 * Loading breadcrumbs File.
 */
if (!function_exists('deft_breadcrumb_trail') ) {
	require get_template_directory() . '/inc/breadcrumb.php';
}							