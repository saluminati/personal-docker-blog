<?php
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Deft_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once get_template_directory() . '/inc/customizer-pro/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Deft_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Deft_Customize_Section_Pro(
				$manager,
				'deft',
				array(
					'title'    => esc_html__( 'Premium Verison', 'deft' ),
					'pro_text' => esc_html__( 'Upgrade To Pro',  'deft' ),
					'pro_url'  => 'https://www.templatesell.com/item/deft-plus/',
					'priority' => 0
				)
			)
		);
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		require_once get_template_directory() . '/inc/customizer-pro/section-pro.php';


		wp_enqueue_script( 'deft-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/customizer-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'deft-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/customizer-pro/customize-controls.css' );
	}
}

// Doing this customizer thang!
Deft_Customize::get_instance();


if ( ! class_exists( 'Deft_Customize_Static_Text_Control' ) ){
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
class Deft_Customize_Static_Text_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'static-text';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	protected function render_content() {
			?>
		<div class="description customize-control-description">
			
			<h2><?php esc_html_e('About Deft', 'deft')?></h2>
			<p><?php esc_html_e('Deft is simple, clean and elegant WordPress Theme for your blog site.', 'deft')?> </p>
			<p>
				<a href="<?php echo esc_url('http://demo.paragonthemes.com/deft/'); ?>" target="_blank"><?php esc_html_e( 'Deft Demo', 'deft' ); ?></a>
			</p>
			<h3><?php esc_html_e('Documentation', 'deft')?></h3>
			<p><?php esc_html_e('Read documentation to learn more about theme.', 'deft')?> </p>
			<p>
				<a href="<?php echo esc_url('http://doc.paragonthemes.com/deft/'); ?>" target="_blank"><?php esc_html_e( 'Deft Documentation', 'deft' ); ?></a>
			</p>
			
			<h3><?php esc_html_e('Support', 'deft')?></h3>
			<p><?php esc_html_e('For support, Kindly contact us and we would be happy to assist!', 'deft')?> </p>
			
			<p>
				<a href="<?php echo esc_url('https://paragonthemes.com/supports/'); ?>" target="_blank"><?php esc_html_e( 'Deft Support', 'deft' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Rate This Theme', 'deft' ); ?></h3>
			<p><?php esc_html_e('If you like Deft Kindly Rate this Theme', 'deft')?> </p>
			<p>
				<a href="<?php echo esc_url('https://wordpress.org/support/theme/deft/reviews/#new-post'); ?>" target="_blank"><?php esc_html_e( 'Add Your Review', 'deft' ); ?></a>
			</p>
			</div>
			
		<?php
	}

}
}
