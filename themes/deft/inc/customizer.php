<?php
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * 
 * Deft Theme Customizer
 *
 * @package Deft
 */

/**
* Load Update to Pro section
*/
require get_template_directory() . '/inc/customizer-pro/class-customize.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function deft_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('header_image');
	
	$wp_customize->add_section( 'theme_detail', array(
            'title'    => __( 'About Theme', 'deft' ),
            'priority' => 9
        ) );
    
        
        $wp_customize->add_setting( 'upgrade_text', array(
            'default' => '',
            'sanitize_callback' => '__return_false'
        ) );
        
        $wp_customize->add_control( new Deft_Customize_Static_Text_Control( $wp_customize, 'upgrade_text', array(
            'section'     => 'theme_detail',
            'label'       => __( 'Upgrade to PRO', 'deft' ),
            'description' => array('')
        ) ) );
	

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'deft_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'deft_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'deft_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function deft_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function deft_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function deft_customize_preview_js() {
	wp_enqueue_script( 'deft-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'deft_customize_preview_js' );

