<?php
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Deft
 */
 $read_more = esc_html( get_theme_mod( 'deft_blog_read_more_options', 'Read More') );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
	<header class="featured-wrapper">
		<ul class="post-meta list-inline">
			<li>
				<span class="author vcard"><i class="fa fa-user"></i> <?php deft_posted_by(); ?></span>
			</li>
			<li>
				<span class="post-comments"><i class="fa fa-comments"></i> <?php comments_number(); ?></span>
			</li>
		</ul>
	</header><!-- .entry-header -->

	<div class="blog-content">
		<div class="entry-header">
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
			</ul>

			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
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

