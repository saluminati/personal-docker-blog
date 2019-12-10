<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Mantra
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$theme_options  = blog_mantra_theme_options();

if( 'no_side' == $theme_options['sidebar'] ) {
	return;
}

?>

<section id="secondary" class="col-xs-12 col-sm-3 col-md-3 secondary-wrapper">
	<div class="sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</section><!-- #secondary -->
