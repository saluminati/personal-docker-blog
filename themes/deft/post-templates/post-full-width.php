<?php
/**
 * Template Name: Full Width
 * Template Post Type: post
 *
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Deft
 */
get_header();
?>	
	<div class="col-sm-12">
		<div class="breadcrumb">
			<?php do_action('deft_breadcrumb_hook'); ?>
		</div>
	</div>
	<div id="primary" class="col-md-12 col-sm-12">
		
		<div class="content-area">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'single' );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
