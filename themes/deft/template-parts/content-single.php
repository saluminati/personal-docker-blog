<?php
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Deft
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
	<header class="featured-wrapper">
        <div class="post-thumbnail">
			<?php the_post_thumbnail( 'small' ); ?>
		</div>
	</header><!-- .entry-header -->

	<div class="blog-content">
		<div class="entry-header">
			<div class="post-author">
				<div class="avatar">
					<?php
						$user = wp_get_current_user();
						$author_img = esc_url( get_avatar_url( $user->ID ) );
					?>
    				<img alt="" src="<?php echo $author_img; ?>" class="avatar avatar-40 photo" height="40" width="40">                    
    			</div>
				<?php esc_html_e('Written By','deft'); ?><a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' )) ); ?>"><?php echo esc_html(get_the_author_meta('display_name')); ?></a>                
			</div>			
			<?php
				if ( is_singular() ) :
					the_title( '<h2 class="entry-title">', '</h2>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
			<?php endif; ?>

			<ul class="entry-meta list-inline clearfix">
				<li>
					<span class="posted-in">
						<?php
	               			$categories = get_the_category();
	                          if ( ! empty( $categories ) ) {
	                          	echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'" title="Lifestyle">'.esc_html( $categories[0]->name ).'</a>';
	                        }                                 
						?>	 
					</span>
				</li>
				<li>
					<i class="fa fa-calendar"></i><?php deft_posted_on(); ?>
				</li>
				<li>
					<span class="post-comments"><i class="fa fa-comments"></i> <?php comments_number(); ?></span>
				</li>
			</ul>
		</div>


		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<ul class="entry-meta list-inline clearfix">
				<li>
					<?php the_tags(); ?>
				</li>
			</ul>

		</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
