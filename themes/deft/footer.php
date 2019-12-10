<?php
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Deft
 */

?>
		</div><!-- #row -->
	</div><!-- #container -->
</div><!-- #content -->


<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="social-icons-footer">
			<?php
				do_action('deft_social_icons_hook'); 
			?>
		</div>
		<div class="copyright">
			<?php echo esc_html(get_theme_mod('deft_footer_copyright_text','&copy; All Right Reserved.')); ?>
		</div>
		<div class="site-info text-center">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'deft' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'deft' ), 'WordPress' );
				?>
			</a>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'deft' ), 'Deft', '<a href="https://www.paragonthemes.com">Paragon Themes</a>' );
				?>
		</div><!-- .site-info -->
			<?php 
				/*
				 * Go to Top Option
				*/
				do_action('deft_go_to_top_hook');
			?>
	</div>
</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
