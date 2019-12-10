<?php
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
	<div id="primary" class="col-md-8 col-sm-8">
		<div class="content-area">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
