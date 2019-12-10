<?php
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * 
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Deft
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function deft_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'deft_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

}
add_action( 'after_setup_theme', 'deft_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function deft_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
			get_template_part( 'template-parts/content', get_post_format() );
	}
}