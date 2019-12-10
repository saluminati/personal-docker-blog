<?php
/**
 * The social link hook for our theme.
 *
 * This is the template that displays social media of the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Mantra
 */

if ( ! function_exists( 'blog_mantra_social_media_link' ) ) :

    function blog_mantra_social_media_link(){

        $theme_options  = blog_mantra_theme_options(); 

        $facebook       = $theme_options['facebook'];
        $twitter        = $theme_options['twitter'];
        $google_plus    = $theme_options['google_plus'];
        $instagram      = $theme_options['instagram'];
        $linkedin       = $theme_options['linkedin'];
        $pinterest      = $theme_options['pinterest'];
        $youtube        = $theme_options['youtube'];
        $vimeo          = $theme_options['vimeo'];
        $flickr         = $theme_options['flickr'];
        $behance        = $theme_options['behance'];
        $dribbble       = $theme_options['dribbble'];
        $tumblr         = $theme_options['tumblr'];
        $github         = $theme_options['github'];
        ?> 

        <ul class="social-icons">

            <?php if( $facebook ){ ?>
                <li>
                    <a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </li>
            <?php } ?>

            <?php if( $twitter ){ ?>
                <li>
                    <a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                </li>
            <?php } ?>

            <?php if( $google_plus ){ ?>
                <li>
                    <a href="<?php echo esc_url( $google_plus ); ?>" target="_blank"><i class="fab fa-google-plus"></i></a>
                </li>
            <?php } ?>

            <?php if( $instagram ){ ?>
                <li>
                    <a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
            <?php } ?> 

            <?php if( $linkedin ){ ?>
                <li>
                    <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                </li>
            <?php } ?>  
            
            <?php if( $pinterest ){ ?>
                <li>
                    <a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"><i class="fab fa-pinterest"></i></a>
                </li>
            <?php } ?>             

            <?php if( $youtube ){ ?>
                <li>
                    <a href="<?php echo esc_url( $youtube ); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                </li>
            <?php } ?>  

            <?php if( $vimeo ){ ?>
                <li>
                    <a href="<?php echo esc_url( $vimeo ); ?>" target="_blank"><i class="fab fa-vimeo"></i></a>
                </li>
            <?php } ?>  

            <?php if( $flickr ){ ?>
                <li>
                    <a href="<?php echo esc_url( $flickr ); ?>" target="_blank"><i class="fab fa-flickr"></i></a>
                </li>
            <?php } ?>  

            <?php if( $behance ){ ?>
                <li>
                    <a href="<?php echo esc_url( $behance ); ?>" target="_blank"><i class="fab fa-behance"></i></a>
                </li>
            <?php } ?> 

            <?php if( $dribbble ){ ?>
                <li>
                    <a href="<?php echo esc_url( $dribbble ); ?>" target="_blank"><i class="fab fa-dribbble"></i></a>
                </li>
            <?php } ?> 

            <?php if( $tumblr ){ ?>
                <li>
                    <a href="<?php echo esc_url( $tumblr ); ?>" target="_blank"><i class="fab fa-tumblr"></i></a>
                </li>
            <?php } ?> 

            <?php if( $github ){ ?>
                <li>
                    <a href="<?php echo esc_url( $github ); ?>" target="_blank"><i class="fab fa-github"></i></a>
                </li>
            <?php } ?>
          
        </ul>

    <?php }

endif;

add_action( 'blog_mantra_social_media', 'blog_mantra_social_media_link', 10 );
