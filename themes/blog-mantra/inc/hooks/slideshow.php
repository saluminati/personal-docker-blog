<?php
/**
 * The slideshow hook for our theme.
 *
 * This is the template that displays slider of the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Mantra
 */

if ( ! function_exists( 'blog_mantra_home_slideshow' ) ) :

  function blog_mantra_home_slideshow(){

  $theme_options  = blog_mantra_theme_options();


  if( 'multiple' === $theme_options['main_slider_type'] ) {

    if(!empty( $theme_options['slider_cat'] )){

        $slider_args = array( 
            'cat'             => absint( $theme_options['slider_cat'] ), 
            'post_status'     => 'publish', 
            'posts_per_page'  => 6,
            'ignore_sticky_posts' => 1,
          );

      } else{

        $slider_args = array( 'post_status' => 'publish', 'posts_per_page' => 6, 'ignore_sticky_posts' => 1, );

      } 

      $slider_query = new WP_Query( $slider_args ); 

      if ( $slider_query->have_posts() ) {

        ?>

        <div class="banner multi-img">
             <div id="owl-banner-carousel-one" class="owl-carousel owl-theme">

              <?php

              while ( $slider_query->have_posts() ) : $slider_query->the_post(); 

              $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

            ?>

                  <div class="item"> 
                     <div class="wrapper">
                    <figure class="figure">

                      <a href="<?php the_permalink(); ?>">

                      <?php if ( !empty( $image_url ) ) { ?>

                        <img src="<?php echo esc_url($image_url[0]); ?>" class="figure-img img-fluid" alt="<?php the_title(); ?>">

                        <?php } else { ?>

                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/imgb1.jpg" class="figure-img img-fluid" alt="<?php the_title(); ?>">

                      <?php } ?>
                    </a>
                    </figure>

                        <div class="hero-content">

                            <?php
                              $category_list = get_the_category_list( ',&nbsp;&nbsp;' );
                              echo '<span>' . $category_list . ' </span>';
                            ?>

                              <h5> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h5>
                        </div><!--hero-content-->
                </div><!--wrapper-->
                   </div><!--item-->

                   <?php 
                  endwhile;
                  wp_reset_postdata(); 
                ?>                  

            </div><!--owl-carousel-->
        </div><!--banner-->


        <?php
        }
      ?>

<?php

  } else {

  $enable_btn       = $theme_options['slider_btn_enable'];

  $enable_excerpt          = $theme_options['slider_excerpt_enable'];

    if(!empty( $theme_options['slider_cat'] )){

        $slider_args = array( 
            'cat'             => absint( $theme_options['slider_cat'] ),
            'post_status'     => 'publish', 
            'posts_per_page'  => 3,
            'ignore_sticky_posts' => 1,
          );

      } else{

        $slider_args = array( 'post_status' => 'publish', 'posts_per_page' => 3, 'ignore_sticky_posts' => 1, );

      }
       

      $slider_query = new WP_Query( $slider_args ); 

      if ( $slider_query->have_posts() ) {

?>
          
        <div class="banner">
          <div id="owl-banner-carousel" class="owl-carousel owl-theme">

            <?php

              while ( $slider_query->have_posts() ) : $slider_query->the_post(); 

              $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

            ?>
                  <div class="item"> 
                     <div class="wrapper">
                    <figure class="figure">

                      <?php if ( !empty( $image_url ) ) { ?>

                        <img src="<?php echo esc_url($image_url[0]); ?>" class="figure-img img-fluid" alt="<?php the_title(); ?>">

                        <?php } else { ?>

                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/imgb1.jpg" class="figure-img img-fluid" alt="<?php the_title(); ?>">

                      <?php } ?>

                    </figure>

                    <div class="banner-wrap">
                        <div class="container">
                        <div class="hero-content text-center">
                             <h1> <?php the_title(); ?> </h1>

                            <?php if( 1 == $enable_excerpt ){ ?>

                             <p> <?php the_excerpt(); ?> </p>

                            <?php } ?>

                            <?php if( 1 == $enable_btn ){ ?>

                            <a href="<?php the_permalink(); ?>" class="read-more"> <?php echo esc_html( 'Read More', 'blog-mantra' ) ?> </a>

                            <?php } ?>

                        </div><!--hero-content-->
                    </div><!--container-->
                    </div><!--banner-wrap-->
                    <div class="overlay"></div>
                </div><!--wrapper-->
                   </div><!--item-->

                <?php 
                  endwhile;
                  wp_reset_postdata(); 
                ?>

            </div><!--owl-carousel-->
        </div><!--banner-->

 <?php
      }
    }
  }

endif;

add_action( 'blog_mantra_slideshow', 'blog_mantra_home_slideshow', 10 );
