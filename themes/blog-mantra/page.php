<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
        	

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
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
