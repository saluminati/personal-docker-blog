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
 $read_more = esc_html( get_theme_mod( 'deft_blog_read_more_options', 'Read More') );
 $blog_meta = absint( get_theme_mod( 'deft_blog_meta_options', 1) );
 $blog_featured_image = absint( get_theme_mod( 'deft_blog_featured_image_options', 1) );
 $featured_image_full = absint( get_theme_mod( 'deft_blog_featured_image_full_options', 0) );
 $blog_full_image = ($featured_image_full == 0 ) ? '' : 'blog-full-image';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
	<header class="featured-wrapper <?php echo esc_attr($blog_full_image); ?>">
		        <div class="post-thumbnail">
		        	<?php if($blog_featured_image == 1 ) {
						the_post_thumbnail( 'small' );
					} 
					?>
				</div>
		<?php if($blog_meta == 1 ){  ?>
			<ul class="post-meta list-inline">
				<li>
					<span class="author vcard"><i class="fa fa-user"></i> <?php deft_posted_by(); ?></span>
				</li>
				<li>
					<span class="post-comments"><i class="fa fa-comments"></i> <?php comments_number(); ?></span>
				</li>
			</ul>
		<?php } ?>
	</header><!-- .entry-header -->

	<div class="blog-content">
		<div class="entry-header">
			<?php if($blog_meta == 1 ){  ?>
				<ul class="entry-meta list-inline clearfix">
					<li>
						<span class="posted-in">
							<?php
		               			$categories = get_the_category();
		                          if ( ! empty( $categories ) ) {
		                          	echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag">'.esc_html( $categories[0]->name ).'</a>';
		                        }                                 
							?>
						</span>
					</li>
					<li>
						<i class="fa fa-calendar"></i><?php deft_posted_on(); ?>
					</li>
				</ul>
			<?php } ?>
			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
			<?php endif; ?>
		</div>


		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php if( !empty( $read_more)){ ?>
			<a class="more-link" href="<?php the_permalink(); ?>">
				<?php echo esc_html($read_more); ?>  <i class="fa fa-angle-double-right"></i>
			</a>
			<?php } ?>
		</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
