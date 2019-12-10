<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Mantra
 */

$theme_options = blog_mantra_theme_options();

?>
</main>

<footer>

	<?php 
		$sidebar_names = array('footer-1', 'footer-2', 'footer-3' );

	    $widget_count = blog_mantra_widget_count( $sidebar_names );

	    if( 0 < $widget_count ): ?>

	<div class="footer">
		<div class="container">
			<div class="row">

					<?php  
			        	foreach ($sidebar_names as $key => $value) {

			            	if( is_active_sidebar( $value ) ){ ?>

			            	<div class="col-sm">

                                <?php dynamic_sidebar( $value ); ?>

			            	</div><!-- .col -->

			            <?php } } ?>


			</div><!--row-->
		</div><!--container-->
	</div><!--top-footer-->

	<?php endif; ?>

	<div class="bottom-footer">
		<div class="container">

			<?php
				if( 1 === $theme_options['enable_footer_nav']) { 
	                if ( has_nav_menu( 'footer' ) ) {

	                  wp_nav_menu( array(
	                    'theme_location'  => 'footer',
	                    'container'     => 'ul',
	                    'depth'          => 1,
	                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
	                    'walker'            => new WP_Bootstrap_Navwalker(),
	                  ) );

	                } else {

	                  wp_nav_menu( array(
	                    'theme_location'  => 'footer',
	                    'depth'          => 1,
	                    'container'     => 'ul',
	                    'fallback_cb' => 'wp_page_menu',
	                  ) );

	                }
	            }
                ?>

			<div class="copyright-area">


				<?php echo esc_html( $theme_options['copyright_text'] ); 
					if(!empty( $theme_options['copyright_text'] )) {
				?>

				<span class="sep"> | </span>

				<?php } ?>

				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s', 'blog-mantra' ), 'Blog Mantra', '<a href="https://www.lilyturfthemes.com/" target="_blank">LilyTurf Themes</a>' );
				?>
			</div><!--copyright-area-->
		</div><!--container-->
	</div><!--bottom-footer-->

	<?php if( 1 === $theme_options['enable_scroll_top'] ){ ?>

	<a href="#" class ="scrollToTop">
        <i class="fas fa-level-up-alt"></i>
    </a><!--to-top-->

    <?php } ?>

</footer>

<?php wp_footer(); ?>

</body>
</html>
