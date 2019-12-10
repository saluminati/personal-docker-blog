<?php
/**
 * Mini Recent Posts Widget
 *
 * @package Blog_Mantra
 */

if ( ! class_exists( 'Blog_Mantra_Mini_Recent_Posts_Widget' ) ) :

	/**
	 * Mini recent posts widget class.
	 *
	 * @since 1.0.0
	 */
	class Blog_Mantra_Mini_Recent_Posts_Widget extends WP_Widget {

	    function __construct() {
	    	$options = array(
				'classname'   => 'widget_rec_posts',
				'description' => esc_html__( 'Widget to display recent posts with mini image and date.', 'blog-mantra' ),
    		);

			parent::__construct( 'blog-mantra-mini-recent-posts', esc_html__( 'Blog Mantra: Recent Posts Mini', 'blog-mantra' ), $options );
	    }


	    function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
            
            $post_nos    = ! empty( $instance['post_nos'] ) ? $instance['post_nos'] : 4;

	        echo $args['before_widget']; ?>
                
                <?php 
                if ( ! empty( $title ) ) {
                    echo $args['before_title'] . esc_html( $title ). $args['after_title'];
                }?>

                <div class="recent-posts-mini">

                    <?php

                    $mini_recent_args = array(
                        'posts_per_page'        => absint( $post_nos ),
                        'no_found_rows'         => true,
                        'post__not_in'          => get_option( 'sticky_posts' ),
                        'ignore_sticky_posts'   => true,
                        'post_status'           => 'publish', 
                    );

                    $mini_recent_posts = new WP_Query( $mini_recent_args );

                    if ( $mini_recent_posts->have_posts() ) :


                        while ( $mini_recent_posts->have_posts() ) :

                            $mini_recent_posts->the_post(); ?>


                            <div class="wrap-rec-posts">

                            <?php if ( has_post_thumbnail() ) {  ?>

                            <div class="figure-rec-posts">

                                <a href="<?php the_permalink(); ?>">

                                        <?php the_post_thumbnail(); ?>

                                    </a>

                            </div>

                             <?php } ?>


                            <div class="rec-post-grid">
                                <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h5>

                                <?php blog_mantra_posted_on(); ?>

                            </div>
                        </div>

                            <?php

                        endwhile; 

                        wp_reset_postdata(); ?>

                    <?php endif; ?>

                </div>
                 
	        <?php
	        echo $args['after_widget'];

	    }

	    function update( $new_instance, $old_instance ) {
	        $instance = $old_instance;
            $instance['title']           = sanitize_text_field( $new_instance['title'] );
            $instance['post_nos']     = absint( $new_instance['post_nos'] );

	        return $instance;
	    }

	    function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array(
                'title'         => esc_html__( 'Recent Posts', 'blog-mantra' ),
                'post_nos'   => 4,
	        ) );
	        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'blog-mantra' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('post_nos') ); ?>">
                    <?php esc_html_e('Number of Posts to Show:', 'blog-mantra'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_nos') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_nos') ); ?>" type="number" value="<?php echo absint( $instance['post_nos'] ); ?>" />
            </p>
           
	        <?php
	    }

	}

endif;


/**
* Register  widget.
*
* Calls 'widgets_init' action after widget has been registered.
*/
function blog_mantra_recent_posts_mini_init() {

    register_widget('Blog_Mantra_Mini_Recent_Posts_Widget');

}   

add_action('widgets_init', 'blog_mantra_recent_posts_mini_init');
