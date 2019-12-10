<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog_Mantra
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-list'); ?>>
    <div class="entry-content blog-text">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 blog-right">

                <div class="text-blog">
                    <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
                    
                    <p> <?php the_excerpt(); ?> </p>

                    <a href="<?php the_permalink(); ?>" class="readmore"> <?php echo esc_html( 'Read More', 'blog-mantra' ); ?> <span><i class="fas fa-long-arrow-alt-right"></i></span></a>
                </div><!--text-blog-->
            </div>
        </div><!--row-->
    </div><!--entry-content-->
</article>
