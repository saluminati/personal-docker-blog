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
    <a href="<?php the_permalink(); ?>">
        <figure>

    	   <?php the_post_thumbnail(); ?>

        </figure>
    </a>

    <div class="entry-meta meta-blog">
        <?php
            if( 1 === $theme_options['enable_post_date']) {
                blog_mantra_posted_on();
            }

            if( 1 === $theme_options['enable_post_author']) {
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

    <?php } ?>

    <div class="entry-content blog-text">
        <div class="row">

            <?php if( 1 === $theme_options['enable_post_category'] )  { ?>

            <div class="col-xs-12 col-sm-3 col-md-3 blog-left blog-left-cat-details">
                        <div class="wrap-blog-left">

                        <?php if( 1 === $theme_options['enable_post_category']) { ?>

                        <div class="category-blog text-center">
                            <?php

                                $category_list = get_the_category_list();

                                echo '<span class="cat-links">' . $category_list . ' </span>';

                            ?>

                        </div>

                        <?php } ?>

                </div><!--wrap-blog-left-->
            </div><!--blog-left-->

            <div class="col-xs-12 col-sm-9 col-md-9 blog-right blog-right-details">

            <?php } else { ?>


            <div class="col-xs-12 col-sm-12 col-md-12 blog-right">

            <?php } ?>

                <div class="text-blog">
                    <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
                    
                    <p> <?php the_excerpt(); ?> </p>

                    <a href="<?php the_permalink(); ?>" class="readmore"> <?php echo esc_html( 'Read More', 'blog-mantra' ); ?> <span><i class="fas fa-long-arrow-alt-right"></i></span></a>
                </div><!--text-blog-->
            </div>
        </div><!--row-->
    </div><!--entry-content-->
</article>
