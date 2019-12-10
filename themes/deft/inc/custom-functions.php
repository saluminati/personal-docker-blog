<?php 
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * 
 * DeftSlider Function
 * @since Deft 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('deft_slider') ) :
  function deft_slider() { 
	if ( true === get_theme_mod( 'deft_enable_slider_section', true ) ) : 
?> 			
<div class="slider-section">
		<!-- Container -->
		<div class="col-sm-12">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
						<?php
							$slider_cat_id = absint(get_theme_mod( 'deft_slider_category', 1 ));
							$slider_read_more = esc_html(get_theme_mod( 'deft_slider_read_more_text', 'Read More' ));
							$slider_number = absint(get_theme_mod( 'deft_slider_number', 2 ));
							$slider_meta = absint(get_theme_mod( 'deft_slider_hide_tag_category', 1 ));					
							
							$i = 1;
							$query = new WP_Query( array( 'cat' => $slider_cat_id, 'posts_per_page'=> $slider_number ) );
							if($query -> have_posts () ) : while($query -> have_posts () ): $query->the_post();
								$image_id = get_post_thumbnail_id();
	                   			$image_url = wp_get_attachment_image_src( $image_id,'full',true ); 
	                   		?>
	                   	<?php if(has_post_thumbnail()) { ?> 
						<div class="item <?php if( $i==1) { echo "active"; } ?>" >	
						<img src="<?php echo esc_url($image_url[0]); ?>" alt="Slide">
						
						<div class="carousel-caption <?php if( $i % 2 != 0 ){ echo "left-side"; } ?>">
							<div class="slide-content">
								<?php if( $slider_meta == 1 ): ?>
								<div class="post-meta">
									<?php
			                   			$categories = get_the_category();
		                                  if ( ! empty( $categories ) ) {
		                                  	echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'" title="Lifestyle">'.esc_html( $categories[0]->name ).'</a>';
		                                }                                 
									?>													
									<?php
									$slider_tags = wp_get_post_tags( get_the_ID() );

					                if( !empty( $slider_tags )){
										$count = 0;
										if ( $slider_tags ) 
										{
										  foreach( $slider_tags as $tag )
										   {
										   		$tag_link = get_tag_link( $tag->term_id );
												$count++;
												if ( 1 == $count )
												  {												   
												   echo '<a href="'.esc_url($tag_link).'" title="Travel">"'.esc_html( $tag->name ).'"</a>'; 
											      }
										    }
					                    }             			
									}
									?>									
								</div>
								<?php endif; ?>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php if(!empty($slider_read_more)): ?>
								<a href="<?php the_permalink(); ?>" title="<?php esc_attr_e('Read More', 'deft');?>"><?php echo $slider_read_more; ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php } $i++; endwhile; wp_reset_postdata(); endif; ?>

				</div>
				<?php
					$category = get_category($slider_cat_id);
					$count = $category->category_count;

					if( $count > 1 ) { ?>
						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="fa fa-angle-double-left" aria-hidden="true"></span>
							<span class="sr-only"><?php esc_html_e('Previous','deft'); ?></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="fa fa-angle-double-right" aria-hidden="true"></span>
							<span class="sr-only"><?php esc_html_e('Next','deft'); ?></span>
						</a>					    
				<?php } 
				?>
			</div>
	</div><!-- Container /- -->
</div><!-- Slider Section /- -->
<?php endif;
 } 
endif;
add_action( 'deft_slider_hook', 'deft_slider', 10 );

/**
 * DeftSlider Social Icons
 * @since Deft 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('deft_social_icons') ) :
  function deft_social_icons() { 

?>

<nav class="footer-social-menu-navigation">
	<?php
	// Get social icons.
	$deft_social_icons = get_theme_mod( 'deft_social_icons_type', array(
		array(
			'social_icon' => '',
			'social_url'  => '',
		),

	) );

	if ( ! empty( $deft_social_icons ) && is_array( $deft_social_icons ) ) :
		?>

		<ul class="social-menu">
			<?php
			// Loop through each of the social links.
			foreach ( $deft_social_icons as $social_icon ) {
				if ( ! empty( $social_icon['social_url'] ) ) :
					?>

					<li class="social-link">
						<a href="<?php echo esc_url( $social_icon['social_url'] ); ?>">
							<i class="<?php echo esc_attr( $social_icon['social_icon'] ); ?>"></i>
						</a>
					</li>

				<?php
				endif;
			}
			?>
		</ul>

	<?php endif; ?>
</nav>
<?php } endif;
add_action( 'deft_social_icons_hook', 'deft_social_icons', 10 ); 
/**
 * Deft Breadcrumb
 * @since Deft 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('deft_breadcrumb') ) :
  function deft_breadcrumb() { 
$breadcrumb = absint(get_theme_mod( 'deft_breadcrumb_options', 1 ));	
	if( $breadcrumb == 1){
		deft_breadcrumb_trail();
	}
} endif;
add_action( 'deft_breadcrumb_hook', 'deft_breadcrumb', 10 );

/**
 * Deft Excerpt Length
 * @since Deft 1.0.0
 *
 * @param null
 * @return void
 *
 */
function deft_excerpt_length( $length ) {
	if(!is_admin () ){
		$excerpt_length = absint(get_theme_mod( 'deft_blog_excerpt_length_options', 20 ));
		return $excerpt_length;
	}
}
add_filter( 'excerpt_length', 'deft_excerpt_length', 999 );

/**
 * Deft Excerpt More
 * @since Deft 1.0.0
 *
 * @param null
 * @return void
 */
if ( !function_exists('deft_excerpt_more') ) :
function deft_excerpt_more( $more ) {
    if(!is_admin() ){
        return '';
    }
}
endif;
add_filter('excerpt_more', 'deft_excerpt_more');

/**
 * Deft Add Body Class
 * @since Deft 1.0.0
 *
 * @param null
 * @return void
*/

add_filter('body_class', 'deft_custom_class');
function deft_custom_class($classes)
{
    $classes[] = 'pt-sticky-sidebar';
    $sidebar = get_theme_mod( 'deft_sidebar_options', 'right-sidebar');
    if ($sidebar == 'no-sidebar') {
        $classes[] = 'no-sidebar';
    } elseif ($sidebar == 'left-sidebar') {
        $classes[] = 'left-sidebar';
    } elseif ($sidebar == 'middle-column') {
        $classes[] = 'middle-column';
    } else {
        $classes[] = 'right-sidebar';
    }
    return $classes;
}


/**
 * Go to Top
 * @since Deft 1.0.0
 *
 * @param null
 * @return void
*/

if (!function_exists('deft_go_to_top' )) :
    function deft_go_to_top()
    {
         $deft_to_top = absint(get_theme_mod( 'deft_footer_go_to_top', 1));                 
         if( $deft_to_top == 1 )
         {
            ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'deft'); ?>">
                    <span><i class="fa fa-arrow-up"></i></span>
            </a>
        <?php
        }
    }

add_action('deft_go_to_top_hook', 'deft_go_to_top', 20 );
endif;

/**
 * Jetpack Top Posts widget Image size
 * @since Deft 1.0.0
 *
 * @param null
 * @return void
*/
function deft_custom_thumb_size( $get_image_options ) {
        $get_image_options['avatar_size'] = 600;
 
        return $get_image_options;
}
add_filter( 'jetpack_top_posts_widget_image_options', 'deft_custom_thumb_size' );