<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Mantra
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
    <div class="top-header">
        <div class="container">

          <div class="site-branding logo">
          <?php
            the_custom_logo();
          ?>
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php

        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
        <?php
        endif; ?>
      </div><!-- .site-branding -->

          <?php
            $theme_options = blog_mantra_theme_options();
              if( 1 === $theme_options['enable_social_media'] ){
          ?>

            <div class="social-icon-top">

              <?php
                do_action( 'blog_mantra_social_media' );
              ?>

        </div><!--social-icon-top-->

        <?php } ?>

        </div><!--container-->
    </div><!--top-header-->

    <div class="header">

            <nav class="navbar navbar-expand-lg navbar-light">

                <div class="container">
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#mynav" aria-controls="mynav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                  <?php
                    if ( has_nav_menu( 'primary' ) ) {

                      wp_nav_menu( array(
                        'theme_location'  => 'primary',
                        'depth'       => 2,
                        'container'     => 'div',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id'    => 'mynav',
                        'menu_class'    => 'navbar-nav mr-auto',
                        'fallback_cb'   => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'      => new WP_Bootstrap_Navwalker()
                    ) );

                    } else {

                      wp_nav_menu( array(
                        'theme_location'  => 'primary',
                        'depth'          => 1,
                        'container'     => 'ul',
                        'menu_class'    => 'navbar-nav mr-auto',
                        'fallback_cb' => 'wp_page_menu',
                      ) );

                    }
                    ?>

                <?php if( 1 === $theme_options['enable_search'] ){ ?>

                <div class="search-form-wrapper">
                            <div class="bm-searrch-header">
                                <a class="bm-search-trigger" href="#bm-search"> <span></span></a>
                                <!-- cd-header-buttons -->
                            </div>
                            <div id="bm-search" class="bm-search">
                              <div class="container">

                                <?php if( 'no_side' == $theme_options['sidebar'] ) { ?>
                                <div class="fullwidth-search">
                                  <?php get_search_form(); ?>
                                </div>
                                <?php } else { ?>

                                  <?php get_search_form(); ?>

                                  <?php } ?>

                              </div>
                            </div>
                        </div>

                <?php } ?>

             </div><!--container-->
            </nav>
       
    </div><!--bottom-header-->

    <?php 

    if ( is_front_page() ) { 
      if( 1 != $theme_options['slider_enable']) { 
        do_action( 'blog_mantra_page_header' ); 
      }
    } else {
      do_action( 'blog_mantra_page_header' ); 
    }

    ?>
  
</header>

<main>

<?php 
  if( 1 === $theme_options['slider_enable']) { 
    if ( is_front_page() ) { 
      do_action( 'blog_mantra_slideshow' );
    }
  }
?>

<?php 
  if ( 1 === $theme_options['enable_breadcrumb'] ) {
  if ( !is_front_page() ) {

    if( 'no_side' == $theme_options['sidebar'] ) {

    $breadcrumb_args = array(
        'container'   => 'nav',
        'class'     => 'breadcrumb',
        'show_browse' => false,
        'before'          => '<div class="container"><div class="fullwidth-breadcrums">',
        'after'           => '<div class="clearfix"></div></div></div>',
        'show_on_front'   => true,
        'network'         => false,
        'show_title'      => true,
        'echo'            => true
    );

  } else {

    $breadcrumb_args = array(
        'container'   => 'nav',
        'class'     => 'breadcrumb',
        'show_browse' => false,
        'before'          => '<div class="container">',
        'after'           => '<div class="clearfix"></div></div>',
        'show_on_front'   => true,
        'network'         => false,
        'show_title'      => true,
        'echo'            => true
    );

  }

    blog_mantra_breadcrumb( $breadcrumb_args );

  }
}
