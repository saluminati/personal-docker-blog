<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog_Mantra
 */

get_header();

$theme_options = blog_mantra_theme_options();

$extra_class = '';

if( 'left' == $theme_options['sidebar'] ) {
  $primary_cls = 'col-sm-9 col-md-9 primary-wrapper left-sidebar';
  $extra_class = 'page-display';
} elseif( 'no_side' == $theme_options['sidebar'] ) { 
  $primary_cls = 'col-sm-12 col-md-12 primary-wrapper';
} else {
  $primary_cls = 'col-sm-9 col-md-9 primary-wrapper';
}

if( 'no_side' == $theme_options['sidebar'] ) {

?>

<div class="main-content-wrapper full-width">

<?php } else { ?>

<div class="main-content-wrapper">

<?php } ?>

    <div id="content" class="container">
      <div class="row <?php echo esc_attr( $extra_class ); ?>">


	<section id ="primary" class="col-xs-12 <?php echo esc_attr( $primary_cls ); ?>">
        <div id="main" class="site-main" role="main">


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

			if( 'numeric' == $theme_options['pagination_style'] ) {
                the_posts_pagination( 
					array(
						'mid_size' 	=> 2,
						'prev_text' => __( '&laquo; Previous', 'blog-mantra' ),
						'next_text' => __( 'Next &raquo;', 'blog-mantra' ),
					) 
				);
            } else {
              	the_posts_navigation();
            }

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div><!--main-->
	</section>

<?php
get_sidebar();
?>

		</div><!--row-->

		<?php 
			if( 'left' == $theme_options['sidebar'] ) { ?>
				<div class="clearfix"></div>
		<?php } ?>

    </div><!--container-->
</div><!--main-content-wrapper-->

<?php
get_footer();
