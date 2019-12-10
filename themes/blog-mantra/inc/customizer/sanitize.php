<?php 
/**
 * Sanitization
 *
 * @package Blog_Mantra
 */

/**=========== Select/radio santitization ===========**/

if ( ! function_exists( 'blog_mantra_sanitize_select' ) ) :

    function blog_mantra_sanitize_select( $input, $setting ) {
      
        $input = esc_attr( $input );
      
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }

endif;


/**=========== Checkbox santitization ===========**/

if ( ! function_exists( 'blog_mantra_sanitize_checkbox' ) ) :

    function blog_mantra_sanitize_checkbox( $input ) {

        if ( $input == 1 ) {

            return 1;

        } else {

            return '';

        }
    }

endif;


/**=========== Integer number sanitization ===========**/

if ( ! function_exists( 'blog_mantra_sanitize_number' ) ) :

    function blog_mantra_sanitize_number( $input, $setting ) {

        $input = absint( $input );

        return ( $input ? $input : $setting->default );

    }

endif;


/**=========== Active callback for slideshow ===========**/

if ( ! function_exists( 'blog_mantra_slideshow' ) ) :

    function blog_mantra_slideshow( $control ) { 

        if( 1 == $control->manager->get_setting( 'blog_mantra[slider_enable]' )->value() ){

            return true;

        } else {

            return false;

        }
    }
 
endif;



/**=========== Active callback for single post slideshow ===========**/

if ( ! function_exists( 'blog_mantra_slideshow_multi' ) ) :

    function blog_mantra_slideshow_multi( $control ) { 

        if( 1 == $control->manager->get_setting( 'blog_mantra[slider_enable]' )->value() && 'single' == $control->manager->get_setting( 'blog_mantra[main_slider_type]' )->value() ){

            return true;

        } else {

            return false;

        }
    }
 
endif;


/**=========== Sanitize number range ===========**/

if ( ! function_exists( 'blog_mantra_sanitize_number_range' ) ) :
    
    function blog_mantra_sanitize_number_range( $input, $setting ) {

        // Ensure input is an absolute integer.
        $input = absint( $input );

        // Get the input attributes associated with the setting.
        $atts = $setting->manager->get_control( $setting->id )->input_attrs;

        // Get min.
        $min = ( isset( $atts['min'] ) ? $atts['min'] : $input );

        // Get max.
        $max = ( isset( $atts['max'] ) ? $atts['max'] : $input );

        // Get Step.
        $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

        // If the input is within the valid range, return it; otherwise, return the default.
        return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );

    }

endif;
