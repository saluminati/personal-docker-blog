<?php
/**
 * About Blog Mantra
 *
 * @package Blog_Mantra
 */

function about_blog_mantra() {
	add_theme_page( esc_html__( 'About Blog Mantra', 'blog-mantra' ), esc_html__( 'About Blog Mantra', 'blog-mantra' ), 'edit_theme_options', 'about-blog-mantra', 'about_blog_mantra_page' );
}
add_action( 'admin_menu', 'about_blog_mantra' );



/**
 * Enqueue css
 */

function bm_enqueue_about_info_scripts($hook) {

	if ( 'appearance_page_about-blog-mantra' != $hook ) {
		return;
	}

	// enqueue CSS
	wp_enqueue_style( 'about-blog-mantra-page-css', get_theme_file_uri( '/inc/about-blog-mantra/css/about-blog-mantra.css' ) );

}
add_action( 'admin_enqueue_scripts', 'bm_enqueue_about_info_scripts' );

/**
 * Check if plugin is installed
 */

function bm_check_if_plugin_installed( $slug, $filename ) {
	return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}


/**
 * Generate Recommended Plugin HTML
 */

function bm_recommended_plugin( $slug, $filename, $name, $description) {

	$img_size = '128x128';

?>

	<div class="plugin-card">
		<div class="name column-name">
			<h3>
				<?php echo esc_html( $name ); ?>
				<img src="<?php echo esc_url('https://ps.w.org/'. $slug .'/assets/icon-'. $img_size .'.png') ?>" class="plugin-icon" alt="">
			</h3>
		</div>
		<div class="action-links">
			<?php if ( bm_check_if_plugin_installed( $slug, $filename ) ) : ?>
			<button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'blog-mantra' ); ?></button>
			<?php else : ?>
			<a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
				<?php esc_html_e( 'Install Now', 'blog-mantra' ); ?>
			</a>							
			<?php endif; ?>
		</div>
		<div class="desc column-description">
			<p><?php echo esc_html( $description ); ?></p>
		</div>
	</div>

<?php
}

/**
 * Changelog tab
 */
function parse_changelog() {
    WP_Filesystem();
    global $wp_filesystem;
    $changelog = $wp_filesystem->get_contents( get_template_directory() . '/inc/about-blog-mantra/changelog.txt' );
    if ( is_wp_error( $changelog ) ) {
        $changelog = '';
    }
    return $changelog;
}


/**
 * Render About Blog Mantra HTML
 */

function about_blog_mantra_page() {
?>
	<div class="info-wrap">
		<h1> <?php esc_html_e( 'Welcome to Blog Mantra !', 'blog-mantra' ); ?> </h1>
		<p class="welcome-text">
			<?php esc_html_e( 'Blog Mantra is fully responsive, lightweight and elegant WordPress blog theme. It is thoughtfully designed for lifestyle, travel, fashion, photography and personal blogs.', 'blog-mantra' ); ?>
		</p>

		<!-- Tabs -->
		<?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'getting_started'; ?>  

		<div class="tab-navigation-wrapper">
			<a href="?page=about-blog-mantra&tab=getting_started" class="nav-tab <?php echo $active_tab == 'getting_started' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Getting Started', 'blog-mantra' ); ?>
			</a>
			<a href="?page=about-blog-mantra&tab=recommended_plugins" class="nav-tab <?php echo $active_tab == 'recommended_plugins' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Recommended Plugins', 'blog-mantra' ); ?>
			</a>
			<a href="?page=about-blog-mantra&tab=support" class="nav-tab <?php echo $active_tab == 'support' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Support', 'blog-mantra' ); ?>
			</a>
			<a href="?page=about-blog-mantra&tab=changelog" class="nav-tab <?php echo $active_tab == 'changelog' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Changelog', 'blog-mantra' ); ?>
			</a>
			<a href="?page=about-blog-mantra&tab=free_vs_pro" class="nav-tab <?php echo $active_tab == 'free_vs_pro' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Free vs Pro', 'blog-mantra' ); ?>
			</a>
		</div>

		<!-- Tab Content -->
		<?php if ( $active_tab == 'getting_started' ) : ?>

			<div class="col-3-wrapper">

				<div class="col-3">
					<h3>
						<span class="dashicons dashicons-book"></span>
						<?php esc_html_e( 'Theme Documentation', 'blog-mantra' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Highly recommended to begin with this, read the full theme documentation to understand the basics and even more details about how to use Blog Mantra.', 'blog-mantra' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url('https://www.lilyturfthemes.com/docs/blog-mantra/'); ?>" class="button button-primary"><?php esc_html_e( 'View documentation', 'blog-mantra' ); ?></a>
				</div>

				<div class="col-3">
					<h3>
						<span class="dashicons dashicons-admin-customizer"></span>
						<?php esc_html_e( 'Theme Customizer', 'blog-mantra' ); ?>
					</h3>
					<p>
					<?php esc_html_e( 'After reading the Theme Documentation we recommend you to open the Theme Customizer and play with available options. You will enjoy it.', 'blog-mantra' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'blog-mantra' ); ?></a>
				</div>


				<div class="col-3">
					<h3>
						<span class="dashicons dashicons-star-filled"></span>
						<?php esc_html_e( 'Pro Version', 'blog-mantra' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Upgrade to pro version for much more advanced features and theme options.', 'blog-mantra' ); ?>
					</p>
					<a target="_blank" target="_blank" href="<?php echo esc_url('https://www.lilyturfthemes.com/themes/blog-mantra-pro/'); ?>" class="button button-primary"><?php esc_html_e( 'View Pro Version', 'blog-mantra' ); ?></a>
				</div>

			</div>

		<?php elseif ( $active_tab == 'recommended_plugins' ) : ?>
			
			<div class="col-3-wrapper">
			
				<p><?php esc_html_e( 'Recommended Plugins are fully supported by Blog Mantra theme, they are styled to fit the theme design and performing well. Not mandatory, but may be useful.', 'blog-mantra' ); ?></p>
				<br>

				<?php

				// Contact Form 7
				bm_recommended_plugin( 'contact-form-7', 'wp-contact-form-7', esc_html__( 'Contact Form 7', 'blog-mantra' ), esc_html__( 'Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup. ', 'blog-mantra' ) );

				?>


			</div>

		<?php elseif ( $active_tab == 'support' ) : ?>

			<div class="col-3-wrapper">

				<div class="col-3">
					<h3>
						<span class="dashicons dashicons-sos"></span>
						<?php esc_html_e( 'Contact Support', 'blog-mantra' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'If you have any problem, feel free to contact us through our online chat system or you can email us at any time.', 'blog-mantra' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://www.lilyturfthemes.com/contact-us/'); ?>" class="button button-primary"><?php esc_html_e( 'Contact Support', 'blog-mantra' ); ?></a>
					</p>
				</div>

				<div class="col-3">
					<h3>
						<span class="dashicons dashicons-book"></span>
						<?php esc_html_e( 'Theme Documentation', 'blog-mantra' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Need more details ? Please check out our Blog Mantra Theme Documentation for detailed information.', 'blog-mantra' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://www.lilyturfthemes.com/docs/blog-mantra/'); ?>" class="button button-primary"><?php esc_html_e( 'View Documentation', 'blog-mantra' ); ?></a>
					</p>
				</div>

				<div class="col-3">
					<h3>
						<span class="dashicons dashicons-star-filled"></span>
						<?php esc_html_e( 'Pro Version', 'blog-mantra' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Upgrade to pro version for much more advanced features and theme options.', 'blog-mantra' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://www.lilyturfthemes.com/themes/blog-mantra-pro/'); ?>" class="button button-primary"><?php esc_html_e( 'View Pro Version', 'blog-mantra' ); ?></a>
					</p>
				</div>

			</div>

		<?php elseif ( $active_tab == 'changelog' ) : ?>
		
		<div class="col-3-wrapper">
			
			<p> 
				<?php

					echo '<pre class="changelog">';
					echo esc_html( parse_changelog() );
					echo '</pre>';
				?> 
			</p>


		</div>

		<?php elseif ( $active_tab == 'free_vs_pro' ) : ?>

			<table class="free-vs-pro-table form-table">
				<thead>
					<tr>
						<th>
							<a href="<?php echo esc_url('https://www.lilyturfthemes.com/themes/blog-mantra-pro/'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Blog Mantra Pro', 'blog-mantra' ); ?>
							</a>
						</th>
						<th><?php esc_html_e( 'Blog Mantra', 'blog-mantra' ); ?></th>
						<th><?php esc_html_e( 'Blog Mantra Pro', 'blog-mantra' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<h3><?php esc_html_e( '100% Responsive', 'blog-mantra' ); ?></h3>
							<p><?php esc_html_e( 'Compatible with various desktop, tablet, and mobile devices.', 'blog-mantra' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Translation Ready', 'blog-mantra' ); ?></h3>
							<p><?php esc_html_e( 'Each hard-coded string is ready for translation, means you can translate everything. Language blog-mantra.pot file included.', 'blog-mantra' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'One Click Demo Import', 'blog-mantra' ); ?></h3>
							<p><?php esc_html_e( 'Just a Single Click and you will get the same content as shown on our Demo website.', 'blog-mantra' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>

					<tr>
						<td>
							<h3><?php esc_html_e( 'Custom Widgets', 'blog-mantra' ); ?></h3>
							<p><?php esc_html_e( 'Widgets added by theme to enhance features', 'blog-mantra' ); ?></p>
						</td>
						<td class="compare-icon">3</td>
						<td class="compare-icon">5+</span></td>
					</tr>

					<tr>
						<td>
							<h3><?php esc_html_e( 'Social Media Share', 'blog-mantra' ); ?></h3>
							<p><?php esc_html_e( 'Options to share your posts', 'blog-mantra' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>


					<tr>
						<td>
							<h3><?php esc_html_e( 'Font Options', 'blog-mantra' ); ?></h3>
							<p><?php esc_html_e( 'Google fonts options for changing the overall site fonts', 'blog-mantra' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon">100+</td>
					</tr>

					<tr>
						<td>
							<h3><?php esc_html_e( 'Color Options', 'blog-mantra' ); ?></h3>
							<p><?php esc_html_e( 'Options to change primary color of the site', 'blog-mantra' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>

					<tr>
						<td>
							<h3><?php esc_html_e( 'WooCommerce Ready', 'blog-mantra' ); ?></h3>
							<p><?php esc_html_e( 'Theme supports/works with WooCommerce plugin', 'blog-mantra' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>




					<tr>
						<td>
							<h3><?php esc_html_e( 'Instagram Feeds', 'blog-mantra' ); ?></h3>
							<p><?php esc_html_e( 'Widget to display feeds from instagram account', 'blog-mantra' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>


					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced Footer Options', 'blog-mantra' ); ?></h3>
							<p><?php esc_html_e( 'Option to Override existing Power By credit of footer', 'blog-mantra' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>


					<tr>
						<td>
							<h3><?php esc_html_e( 'Support Forum', 'blog-mantra' ); ?></h3>
							<p><?php esc_html_e( 'Highly experienced and dedicated support team for your help plus online chat.', 'blog-mantra' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"> <?php esc_html_e('High Priority','blog-mantra'); ?> </span></td>
					</tr>

					<tr>
						<td></td>
						<td colspan="2">
							<a href="<?php echo esc_url('https://www.lilyturfthemes.com/themes/blog-mantra-pro/'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Blog Mantra Pro', 'blog-mantra' ); ?>
							</a>
							
						</td>
					</tr>
				</tbody>
			</table>

	    <?php endif; ?>

	</div><!-- /.wrap -->
<?php
} // end about_blog_mantra_page
