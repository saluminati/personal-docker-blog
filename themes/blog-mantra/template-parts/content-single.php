<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog_Mantra
 */

$theme_options = blog_mantra_theme_options();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-list'); ?>>
    <?php if ( has_post_thumbnail() ) { ?> 
    	<div class="wrap-meta">
   	<?php } else { ?>
   		<div class="wrap-meta no-img">
   	<?php } ?>
        <figure>
        <?php if ( has_post_thumbnail() ) { 
            the_post_thumbnail(); ?>
        <?php } ?>
        </figure>
        <h3> <?php the_title(); ?> </h3>
        <div class="entry-meta">
            <?php
            if( 1 === $theme_options['single_post_date']) {
                blog_mantra_posted_on();
            }

            if( 1 === $theme_options['single_post_author']) {
                blog_mantra_posted_by(); 
            }
        ?>

        <span class="comments-link">
            <i class="far fa-comment"></i>
        <?php
            comments_popup_link( esc_html__( 'No Comments', 'blog-mantra' ), esc_html__( '1 Comment', 'blog-mantra' ), '% '. esc_html__( 'Comments', 'blog-mantra' ), 'post-comments');
        ?>
        </span>
        </div><!--entry-meta-->
    </div><!--wrap-meta-->


    <?php the_content(); ?>

                <footer class="entry-footer">
                    <?php
                        if( 1 === $theme_options['single_post_category']) {
                        $category_list = get_the_category_list( ',&nbsp;' );
                        echo '<span class="cat-links"><i class="fas fa-th-list"></i> ' . $category_list . ' </span>';
                        }
                    ?>

                    <?php
                        if( 1 === $theme_options['single_post_tags']) {
                        $tag_list = get_the_tag_list( '<span class="post-link"><i class="fas fa-tags"></i> ', ',&nbsp;', '</span>' );
                        if ( $tag_list ) {
                            echo ''. $tag_list;
                        }
                        }
                    ?>

                </footer>


        <?php if( 1 === $theme_options['post_author_description']) { ?>

          <div class="author-info">
              <div class="test-img">
                  <figure>
                    <a class="author-avatar" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
                    </a>
                  </figure>
              </div><!--test-img-->

              <div class="test-text">
                  <h3> <?php the_author_posts_link(); ?> </h3>

                  <?php

                    $authordesc = get_the_author_meta( 'description' );

                    if ( ! empty( $authordesc ) ) : ?>


                <p> <?php the_author_meta( 'description' ); ?> </p>

                   <?php endif; ?>
                    
              </div><!--test-text-->
            </div><!--author-info-->

        <?php } ?>

    <?php

    if( 1 === $theme_options['enable_related_posts']) {

    if( 'no_side' == $theme_options['sidebar'] ) {
        $rimgsize = 'blog-mantra-related-full-img';
    } else {
        $rimgsize = 'blog-mantra-related-img';
    }

    $BMCurrentPID = get_the_ID();

    $bm_post_cats = wp_get_object_terms($BMCurrentPID, 'category', array('fields' => 'ids'));


        $bm_post_args = array('post_type' => 'post',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'id',
                        'terms' => $bm_post_cats,
                    ),
                ),
                'posts_per_page'  => 3,
                'post__not_in' => array( $BMCurrentPID ),
             );

        $bm_post_query = new WP_Query( $bm_post_args );
  

    if ( $bm_post_query->have_posts() ) :

    ?>


    <div class="related-posts">
        <div class="post-title">
            <h3> <?php echo esc_html( 'You Might Also Like', 'blog-mantra' ); ?> </h3>
        </div><!--post-title-->

        <div class="row">

            <?php 
          while ( $bm_post_query->have_posts() ) : $bm_post_query->the_post();
         ?>



            <div class="col-xs-12 col-sm-4 col-md-4 list-rel-posts">

                <?php if ( has_post_thumbnail() ) { ?>

                <a href="<?php the_permalink(); ?>">
                    <figure>
                        <?php the_post_thumbnail( $rimgsize ); ?>
                    </figure>
                </a>

                <?php } ?>

                <h5> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h5>
                <?php blog_mantra_posted_on(); ?>
            </div><!--list-rel-posts-->

            <?php 

                endwhile;
                wp_reset_postdata();
            ?>

        </div><!--row-->
    </div>

    <?php
        endif;

    }
    ?>

    <div class="clearfix"></div>
</article>
