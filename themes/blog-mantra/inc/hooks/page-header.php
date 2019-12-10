<?php
/**
 * Page header for our theme.
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Mantra
 */

if ( ! function_exists( 'blog_mantra_page_header_section' ) ) :

  function blog_mantra_page_header_section(){

    $theme_options  = blog_mantra_theme_options();

    if( 'left' == $theme_options['sidebar'] ) {
      $page_header_cls = 'col-sm-12 com-md-12 title-name full-width-title';
    } elseif( 'no_side' == $theme_options['sidebar'] ) { 
      $page_header_cls = 'col-sm-12 com-md-12 title-name full-width-title';
    } else {
      $page_header_cls = 'col-sm-12 com-md-12 title-name full-width-title';
    }

    $bg_image_url = get_header_image();

    ?>

      <?php if ( has_header_image() ) { ?>

      <div class="bm-page-header" style="background-image: url(<?php echo esc_url( $bg_image_url ); ?>">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 <?php echo esc_attr( $page_header_cls ); ?>">
              
              <h1> <?php
                global $wp_query;
                if ( is_front_page() ) { 
                  echo esc_html( 'Posts', 'blog-mantra' ); 
                } elseif ( is_archive() ) {
                    the_archive_title();
                } elseif (is_search()) {
                  esc_html_e( 'Search Results for', 'blog-mantra' ); ?>: <?php the_search_query();
                } elseif (is_404()) {
                  esc_html_e( '404', 'blog-mantra' );
                } else {
                    echo single_post_title();
                }

                ?>
              </h1>

            </div>
            <?php if( 'no_side' != $theme_options['sidebar'] ) { ?>
            
              <div class="col-xs-3 col-sm-3 com-md-3 title-name">
              </div>
            
            <?php } ?>

          </div><!--row-->
          <div class="overlay"></div>
        </div><!--container-->
      </div>

    <?php
    }
    }

  endif;

add_action( 'blog_mantra_page_header', 'blog_mantra_page_header_section', 10 );
