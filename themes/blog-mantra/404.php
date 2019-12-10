<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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


			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'blog-mantra' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below.', 'blog-mantra' ); ?></p>

					<?php

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'blog-mantra' ); ?></h2>
						<ul>
							<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$blog_mantra_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'blog-mantra' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$blog_mantra_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

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
