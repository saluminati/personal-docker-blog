<?php
/**
 * Connect Socially Widget
 *
 * @package Blog_Mantra
 */

if ( ! class_exists( 'Blog_Mantra_Connect_Socially_Widget' ) ) :

    /**
     * Connect Socially widget class.
     *
     * @since 1.0.0
     */
    class Blog_Mantra_Connect_Socially_Widget extends WP_Widget {

        /**
        * Constructor.
        *
        * @since 1.0.0
        */
        function __construct() {
            $opts = array(
                'classname'   => 'widget_social_share',
                'description' => esc_html__( 'Connect Socially Widget', 'blog-mantra' ),
            );
            parent::__construct( 'blog-mantra-connect-socially', esc_html__( 'Blog Mantra: Connect Socially', 'blog-mantra' ), $opts );
        }

        /**
        * Echo the widget content.
        *
        * @since 1.0.0
        *
        * @param array $args     Display arguments including before_title, after_title,
        *                        before_widget, and after_widget.
        * @param array $instance The settings for the particular instance of the widget.
        */
        function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

            echo $args['before_widget'];

            if ( ! empty( $title ) ) {
                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
            }
            ?>

            <div class="icons-sidebar">

            <?php

            if ( has_nav_menu( 'connect-socially' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'connect-socially',
                    'depth'          => 1,
                    'container'      => 'ul',
                    'container_class'=> 'social-icons',
                    'link_before'    => '<span class="screen-reader-text">',
                    'link_after'     => '</span>',
                ) );
            }
            ?>

            </div>

            <?php

            echo $args['after_widget'];

        }

        /**
        * Update widget instance.
        *
        * @since 1.0.0
        *
        * @param array $new_instance New settings for this instance as input by the user via
        *                            {@see WP_Widget::form()}.
        * @param array $old_instance Old settings for this instance.
        * @return array Settings to save or bool false to cancel saving.
        */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;

            $instance['title'] = sanitize_text_field( $new_instance['title'] );

            return $instance;
        }

        /**
        * Output the settings update form.
        *
        * @since 1.0.0
        *
        * @param array $instance Current settings.
        * @return void
        */
        function form( $instance ) {

            $instance = wp_parse_args( (array) $instance, array(
                'title' => '',
            ) );
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'blog-mantra' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <?php if ( ! has_nav_menu( 'connect-socially' ) ) : ?>
            <p>
                <?php esc_html_e( 'Connect Socially menu is not set. Please create a menu and assign it to Connect Socially Theme Location.', 'blog-mantra' ); ?>
            </p>
            <?php endif; ?>
            <?php
        }
    }

endif;

/**
* Register  widget.
*
* Calls 'widgets_init' action after widget has been registered.
*/
function blog_mantra_connect_socially_init() {

    register_widget('Blog_Mantra_Connect_Socially_Widget');

}   

add_action('widgets_init', 'blog_mantra_connect_socially_init');
