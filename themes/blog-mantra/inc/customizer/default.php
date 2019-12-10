<?php
/**
 * Default theme options.
 *
 * @package Blog_Mantra
 */

if ( ! function_exists( 'blog_mantra_default_theme_options' ) ) :

    /**
     * Default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function blog_mantra_default_theme_options() {

        $defaults = array();

        // Header.
        $defaults['sticky_header']                  = '';
        $defaults['enable_social_media']            = 1;
        $defaults['enable_search']                  = 1;
        
        $defaults['header_img_disable']             = '';
        $defaults['slider_enable']                  = '';
        $defaults['slider_excerpt_enable']          = 1;
        $defaults['slider_btn_enable']              = 1;

        $defaults['main_slider_type']               = 'single';
        $defaults['slider_cat']                     = '';
        $defaults['slider_transition_delay']        = 5;
        $defaults['slider_transition_duration']     = 5;

        $defaults['sidebar']                        = 'right';
        $defaults['pagination_style']               = 'numeric';
        $defaults['enable_breadcrumb']              = '';
        $defaults['enable_post_date']               = 1;
        $defaults['enable_post_author']             = 1;
        $defaults['enable_post_category']           = 1;

        $defaults['single_post_date']               = 1;
        $defaults['single_post_author']             = 1;
        $defaults['single_post_category']           = 1;
        $defaults['single_post_tags']               = 1;
        $defaults['post_author_description']        = 1;
        $defaults['enable_related_posts']           = 1;
        $defaults['post_navigation']                = 1;
        
        $defaults['enable_scroll_top']              = 1;
        $defaults['enable_footer_nav']              = 1;

        $defaults['enable_social_links']            = '';
        $defaults['facebook']                       = '';
        $defaults['twitter']                        = '';
        $defaults['google_plus']                    = '';
        $defaults['instagram']                      = '';
        $defaults['linkedin']                       = '';
        $defaults['pinterest']                      = '';
        $defaults['youtube']                        = '';
        $defaults['vimeo']                          = '';
        $defaults['flickr']                         = '';
        $defaults['behance']                        = '';
        $defaults['dribbble']                       = '';
        $defaults['tumblr']                         = '';
        $defaults['github']                         = '';

        $defaults['copyright_text']                 = __( 'Copyright 2018. All rights reserved', 'blog-mantra' );

        // Pass through filter.
        return apply_filters( 'blog_mantra_defaults', $defaults );

    }

endif;

/**
*  Get theme options
*/
if ( !function_exists('blog_mantra_theme_options') ) :

    function blog_mantra_theme_options() {

        $blog_mantra_defaults = blog_mantra_default_theme_options();

        $blog_mantra_option_values = get_theme_mod( 'blog_mantra' );

        if( is_array($blog_mantra_option_values )){

            return array_merge( $blog_mantra_defaults ,$blog_mantra_option_values );

        }
        else{

            return $blog_mantra_defaults;

        }

    }
endif;
