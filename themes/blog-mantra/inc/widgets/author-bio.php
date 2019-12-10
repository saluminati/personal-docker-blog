<?php
/**
 * Author Bio Widget
 *
 * @package Blog_Mantra
 */

if ( ! class_exists( 'Blog_Mantra_Author_Bio_Widget' ) ) :

    /**
    * Author widget class.
    *
    * @since 1.0.0
    */
    class Blog_Mantra_Author_Bio_Widget extends WP_Widget {

        /**
        * Constructor.
        *
        * @since 1.0.0
        */
        function __construct() {
            $opts = array(
                    'classname'   => 'blogger text-center',
                    'description' => esc_html__( 'Display Author Bio.', 'blog-mantra' ),
            );
            parent::__construct( 'blog-mantra-author-bio', esc_html__( 'Blog Mantra: Author Bio', 'blog-mantra' ), $opts );
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

            $title              = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

            $author_bio_page        = !empty( $instance['author_bio_page'] ) ? $instance['author_bio_page'] : ''; 

            $content_type       = !empty( $instance['content_type'] ) ? $instance['content_type'] : '';

            $author_facebook    = !empty( $instance['author_facebook'] ) ? $instance['author_facebook'] : '';

            $author_twitter     = !empty( $instance['author_twitter'] ) ? $instance['author_twitter'] : ''; 

            $author_linkedin    = !empty( $instance['author_linkedin'] ) ? $instance['author_linkedin'] : '';

            $author_instagram   = !empty( $instance['author_instagram'] ) ? $instance['author_instagram'] : '';

            echo $args['before_widget']; ?>

                    <?php 

                    if ( $title ) {
                        echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
                    } ?>
                    
                    <div class="autor-bio-wrapper">

                        <div class="textwidget">

                        <?php if ( $author_bio_page ) { 

                            $author_bio_args = array(
                                            'posts_per_page' => 1,
                                            'page_id'        => absint( $author_bio_page ),
                                            'post_type'      => 'page',
                                            'post_status'    => 'publish',
                                        );

                            $author_bio_query = new WP_Query( $author_bio_args ); 

                            if( $author_bio_query->have_posts()){

                                while( $author_bio_query->have_posts()){

                                    $author_bio_query->the_post(); ?>

                                    <?php 
                                    if ( has_post_thumbnail() ) { ?>
                                        <figure>
                                            <?php the_post_thumbnail('full'); ?>
                                        </figure>
                                        <?php
                                    } else { ?>

                                    <figure>
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/default-img.png" alt="<?php the_title(); ?>">
                                    </figure>

                                    <?php } ?>

                                        <h3> <?php the_title(); ?> </h3>

                                        <?php if( 'excerpt' == $content_type ){ ?>

                                        <p> <?php the_excerpt(); ?> </p>

                                        <p><a href="<?php the_permalink(); ?>" class="btn-continue"> View Details <span class="arrow-continue">&rarr;</span></a></p>


                                        <?php } else { 
                                            the_content();
                                        } ?>

                                    <?php

                                }

                                wp_reset_postdata();

                            } ?>
                            
                        <?php } ?>

                    </div>

                        <?php if( $author_facebook || $author_twitter || $author_linkedin || $author_instagram ){ ?>
                                <ul class="social-icons">
                                    <?php if( $author_facebook ){ ?>

                                    <li>
                                        <a href="<?php echo esc_url( $author_facebook ); ?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>

                                    <?php } ?>

                                    <?php if( $author_twitter ){ ?>

                                    <li>
                                        <a href="<?php echo esc_url( $author_twitter ); ?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>

                                    <?php } ?>

                                    <?php if( $author_linkedin ){ ?>

                                    <li>
                                        <a href="<?php echo esc_url( $author_linkedin ); ?>" target="_blank">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </li>

                                    <?php } ?>

                                    <?php if( $author_instagram ){ ?>

                                    <li>
                                        <a href="<?php echo esc_url( $author_instagram ); ?>" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>

                                    <?php } ?>

                                </ul>

                        <?php } ?>

                    </div><!-- .profile-wrapper -->


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

            $instance['title']              = sanitize_text_field( $new_instance['title'] );

            $instance['author_bio_page']        = absint( $new_instance['author_bio_page'] );

            $instance['content_type']       = sanitize_text_field( $new_instance['content_type'] );

            $instance['author_facebook']    = esc_url_raw( $new_instance['author_facebook'] );

            $instance['author_twitter']     = esc_url_raw( $new_instance['author_twitter'] );

            $instance['author_linkedin']    = esc_url_raw( $new_instance['author_linkedin'] );

            $instance['author_instagram']   = esc_url_raw( $new_instance['author_instagram'] );

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

            // Defaults.
            $defaults = array(
                'title'             => '',
                'author_bio_page'       => '',
                'content_type'      => 'full',
                'author_facebook'   => '',
                'author_twitter'    => '',
                'author_linkedin'   => '',
                'author_instagram'  => '',
            );

            $instance = wp_parse_args( (array) $instance, $defaults );
            ?>
            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'blog-mantra' ); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'author_bio_page' ) ); ?>">
                    <strong><?php esc_html_e( 'Author Page:', 'blog-mantra' ); ?></strong>
                </label>
                <?php
                wp_dropdown_pages( array(
                    'id'               => esc_attr( $this->get_field_id( 'author_bio_page' ) ),
                    'class'            => 'widefat',
                    'name'             => esc_attr( $this->get_field_name( 'author_bio_page' ) ),
                    'selected'         => $instance[ 'author_bio_page' ],
                    'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'blog-mantra' ),
                    )
                );
                ?>
            </p>

            <p>
              <label for="<?php echo esc_attr( $this->get_field_id( 'content_type' ) ); ?>"><strong><?php esc_html_e( 'Content Type:', 'blog-mantra' ); ?></strong></label>
                <?php
                $this->dropdown_content_type( array(
                    'id'       => $this->get_field_id( 'content_type' ),
                    'name'     => $this->get_field_name( 'content_type' ),
                    'selected' => esc_attr( $instance['content_type'] ),
                    )
                );
                ?>
            </p>

            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_facebook') ); ?>">
                    <?php esc_html_e('Facebook:', 'blog-mantra'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_facebook') ); ?>" type="text" value="<?php echo esc_url( $instance['author_facebook'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_twitter') ); ?>">
                    <?php esc_html_e('Twitter:', 'blog-mantra'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_twitter') ); ?>" type="text" value="<?php echo esc_url( $instance['author_twitter'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_linkedin') ); ?>">
                    <?php esc_html_e('LinkedIn:', 'blog-mantra'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_linkedin') ); ?>" type="text" value="<?php echo esc_url( $instance['author_linkedin'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_instagram') ); ?>">
                    <?php esc_html_e('Instagram:', 'blog-mantra'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_instagram') ); ?>" type="text" value="<?php echo esc_url( $instance['author_instagram'] ); ?>" />   
            </p>

        <?php
                
        }

        function dropdown_content_type( $args ) {
            $defaults = array(
                'id'       => '',
                'class'    => 'widefat',
                'name'     => '',
                'selected' => 'full',
            );

            $r = wp_parse_args( $args, $defaults );
            $output = '';

            $choices = array(
                'full'    => esc_html__( 'Full', 'blog-mantra' ),
                'excerpt' => esc_html__( 'Excerpt', 'blog-mantra' ),
            );

            if ( ! empty( $choices ) ) {

                $output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "' class='" . esc_attr( $r['class'] ) . "'>\n";
                foreach ( $choices as $key => $choice ) {
                    $output .= '<option value="' . esc_attr( $key ) . '" ';
                    $output .= selected( $r['selected'], $key, false );
                    $output .= '>' . esc_html( $choice ) . '</option>\n';
                }
                $output .= "</select>\n";
            }

            echo $output;
        }
    }

endif;


/**
* Register  widget.
*
* Calls 'widgets_init' action after widget has been registered.
*/
function blog_mantra_author_bio_init() {

    register_widget('Blog_Mantra_Author_Bio_Widget');

}   

add_action('widgets_init', 'blog_mantra_author_bio_init');
