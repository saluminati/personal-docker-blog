<?php
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Deft
 */

get_header();
?>
	<section class="text-left">
	    <div class="container">
	    	<div class="search-title-box">
				<?php if ( have_posts() ) : ?>
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'deft' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</div>
		</div>
	</section>

	<div id="primary" class="col-md-12 col-sm-12">
		<div class="content-area">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
