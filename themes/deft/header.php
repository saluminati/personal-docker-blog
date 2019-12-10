<?php
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Deft
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
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'deft' ); ?></a>
	<header id="masthead" class="site-header">
		    <!-- Main Menu -->
            <nav class="main-menu navbar navbar-default bootsnav">
            	<!-- Start Top Search -->
		        <div class="top-search">
		            <div class="container">
		                <div class="input-group">
		                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
		                    <?php get_search_form(); ?>
		                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
		                </div>
		            </div>
		        </div>
		        <!-- End Top Search --> 
            	<div class="container">
	                <div class="attr-nav">
		                <ul>
		                	<?php if ( class_exists( 'WooCommerce' ) ) { ?>
			                    <li class="dropdown">
			                        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="dropdown-toggle" data-toggle="dropdown" >
			                            <i class="fa fa-shopping-bag"></i>
			                            <span class="badge"><?php 
			                             	echo WC()->cart->get_cart_contents_count(); ?>
			    		                </span>
			                        </a>
				                        <ul class="dropdown-menu cart-list">                         
					                        <?php if( !is_cart () ) { ?>
						                            <li>
						                                <?php the_widget( 'WC_Widget_Cart', '' ); ?>
						                            </li>
						                            <?php } ?>		                        
				                        </ul>
			                    </li>
					        <?php } ?>		                        
		                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
		                    <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
		                </ul>
		            </div>
		            <!-- Start Header Navigation -->
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
		                    <i class="fa fa-bars"></i>
		                </button>
		                	<div class="navbar-brand"><?php the_custom_logo(); ?></div>
							<?php
							if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
							$deft_description = get_bloginfo( 'description', 'display' );
							if ( $deft_description || is_customize_preview() ) :
								?>
								<p class="site-description"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo $deft_description; /* WPCS: xss ok. */ ?></a></p>
							<?php endif; ?>
		            </div>
		            <!-- End Header Navigation -->
	                <div id="navbar-menu" class="collapse navbar-collapse">
						<?php
						if ( has_nav_menu('menu-1'))
							{
							 wp_nav_menu( array( 
							 	'theme_location' => 'menu-1', 
							 	'menu_class' => 'nav navbar-nav navbar-right',
						 	));
						}else { ?>
						  	<ul class="navbar-menu empty-menu">
			                    <li class="nav navbar-nav navbar-right">
			                        <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> "> <?php esc_html_e('Add a menu','deft'); ?></a>
			                    </li>
			                </ul>
						<?php }	
						?>

					</div><!-- /.navbar-collapse -->
				</div>
				<!-- Start Side Menu -->
		        <div class="side">
		            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
		            <div class="widget">
			            <?php 
			            	dynamic_sidebar('sidebar-2');
			            ?>
			        </div>
		        </div>
		        <!-- End Side Menu -->
			</nav>
	</header><!-- #masthead -->

	
		<div class="container">
			<div class="row">
				<!-- Slider Section -->
				<?php 
					if(is_home() || is_front_page () && !is_paged() ) {
						do_action('deft_slider_hook'); 
					 }?> 
                       </div>
               </div>
       
<div id="content" class="blog-wrapper">
		<div class="container">
			<div class="row">

                    