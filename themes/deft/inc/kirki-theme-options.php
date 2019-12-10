<?php
/**
 * File deft.
 * @package   Deft
 * @author    Paragon Themes <info@paragonthemes.com>
 * @copyright Copyright (c) 2018, Paragon Themes
 * @link      http://www.paragonthemes.com/themes/deft
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
*/
/**
 * Configuration for Kirki Framework
 */
function deft_kirki_configuration() {
	return array(
		'url_path' => get_template_directory_uri() . '/inc/kirki/',
	);
}
add_filter( 'kirki/config', 'deft_kirki_configuration' );

/**
 * Kirki Config for theme options and theme mode 
*/
Kirki::add_config( 'deft_config', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

/**
 *  About Section
*/
Kirki::add_panel( 'deft_theme_options', array(
	'priority' => 10,
	'title'    => esc_html__( 'About Theme', 'deft' ),
) );

/**
 *  Kirki Theme Options Panel in Customizer
*/
Kirki::add_panel( 'deft_theme_options', array(
	'priority' => 10,
	'title'    => esc_html__( 'Theme Options', 'deft' ),
) );

/**
 * Deft Slider Section
 */
Kirki::add_section( 'deft_slider_section', array(
	'title'    => esc_html__( 'Slider Selection', 'deft' ),
	'panel'    => 'deft_theme_options',
	'priority' => 5,
) );

/**
 * Enable Slider Section
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'toggle',
		'settings'    => 'deft_enable_slider_section',
		'label'       => esc_html__( 'Enable Slider Section', 'deft' ),
		'description' => esc_html__( 'On/Off to Show or Hide the Slider Section', 'deft' ),
		'section'     => 'deft_slider_section',
		'default'     => '0',
	)
);

/**
 * Category Selection for Slider 
*/
Kirki::add_field( 'deft_config', array(
    'type'        => 'select',
    'settings'    => 'deft_slider_category',
    'label'       => esc_html__( 'Select Category', 'deft' ),
    'description' => esc_html__( 'Post Category to display in slider', 'deft' ),
    'section'     => 'deft_slider_section',
    'priority'    => 10,
    'default'     => 1,
    'choices'     => Kirki_Helper::get_terms( 'category' ),
    'active_callback' => array(
			array(
				'setting'  => 'deft_enable_slider_section',
				'operator' => '==',
				'value'    => 1,
			),
		),
) );

/**
 * Number of Slider to display  
*/
Kirki::add_field(
	'deft_config', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'deft_slider_number',
		'label'           => esc_html__( 'Number of Slider', 'deft' ),
		'description' 	  => esc_html__( 'Select number of slider', 'deft' ),
		'section'         => 'deft_slider_section',
		'default'         => 2,
		'choices'         => array(
			'2' => esc_html__( '2', 'deft' ),
			'3' => esc_html__( '3', 'deft' ),
			'4' => esc_html__( '4', 'deft' ),
			'5' => esc_html__( '5', 'deft' ),
			'6' => esc_html__( '6', 'deft' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'deft_enable_slider_section',
				'operator' => '==',
				'value'    => 1,
			),
		),
	)
);

/**
 * Show Hide Tags and Category In Slider 
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'toggle',
		'settings'    => 'deft_slider_hide_tag_category',
		'label'       => esc_html__( 'Hide Tag and Category', 'deft' ),
		'description' => esc_html__( 'On/Off to Show or Hide Tag and Category', 'deft' ),
		'section'     => 'deft_slider_section',
		'default'     => 1,
		'active_callback' => array(
			array(
				'setting'  => 'deft_enable_slider_section',
				'operator' => '==',
				'value'    => 1,
			),
		),
	)
);
/**
 * Read More Text In Slider
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'text',
		'settings'    => 'deft_slider_read_more_text',
		'label'       => esc_html__( 'Read More Text Field', 'deft' ),
		'section'     => 'deft_slider_section',
		'default'     => esc_html__('Read More', 'deft'),
		'active_callback' => array(
			array(
				'setting'  => 'deft_enable_slider_section',
				'operator' => '==',
				'value'    => 1,
			),
		),
	)
);

/*
* Deft Sidebar Section
 */
Kirki::add_section( 'deft_sidebar_section', array(
	'title'    => esc_html__( 'Sidebar Options', 'deft' ),
	'panel'    => 'deft_theme_options',
	'priority' => 5,
) );

/**
 * Sidebar Options 
*/
Kirki::add_field(
	'deft_config', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'deft_sidebar_options',
		'label'           => esc_html__( 'Select the Preferred Slider', 'deft' ),
		'description' 	  => esc_html__( 'Right, Left, Middle and No Sidebar', 'deft' ),
		'section'         => 'deft_sidebar_section',
		'default'         => 'right-sidebar',
		'choices'         => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'deft' ),
			'left-sidebar' => esc_html__( 'Left Sidebar', 'deft' ),
			'no-sidebar'   => esc_html__( 'No Sidebar', 'deft' ),
			'middle-column'   => esc_html__( 'Middle Column', 'deft' ),
		),
	)
);
/**
 * Siticky Sidebar
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'toggle',
		'settings'    => 'deft_sticky_sidebar_option',
		'label'       => esc_html__( 'Sticky Sidebar', 'deft' ),
		'description' => esc_html__( 'Make your sidebar stikcy or not.', 'deft' ),
		'section'     => 'deft_sidebar_section',
		'default'     => 1,
	)
);

/**
 * Deft Social Icons
 */
Kirki::add_section( 'deft_social_icons', array(
	'title'    => esc_html__( 'Social Icons', 'deft' ),
	'panel'    => 'deft_theme_options',
	'priority' => 5,
) );

Kirki::add_field( 'deft_config', array(
	'type'        => 'repeater',
	'label'       => esc_html__( 'Add Social Profile', 'deft' ),
	'description' => esc_html__( 'Put Font Awesome name for icons, Eg: fa fa-facebook, fa fa-twitter, fa fa-instagram', 'deft' ),
	'section'     => 'deft_social_icons',
	'settings'    => 'deft_social_icons_type',
	'row_label'   => array(
		'type'  => 'field',
		'value' => esc_html__( 'Social Profile', 'deft' ),
		'field' => 'social_icon',
	),
	'default'     => array(
		array(
			'social_icon' => 'fa fa-facebook',
			'social_url'  => '',
		),
	),
	'fields'      => array(
		'social_icon' => array(
			'label'   => esc_html__( 'Social Icon', 'deft' ),
			'type'    => 'text',
			'default' => '',			
		),
		'social_url'  => array(
			'type'    => 'url',
			'label'   => esc_html__( 'Social Link URL', 'deft' ),
			'default' => '',
		),
	),
) );

/*
* Deft Extra Options
 */
Kirki::add_section( 'deft_extra_options', array(
	'title'    => esc_html__( 'Extra Options', 'deft' ),
	'panel'    => 'deft_theme_options',
	'priority' => 5,
) );

/**
 * breadcrumb Options 
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'toggle',
		'settings'    => 'deft_breadcrumb_options',
		'label'       => esc_html__( 'Breadcrumb', 'deft' ),
		'description' => esc_html__( 'On/Off to Show or Hide Breadcrumb', 'deft' ),
		'section'     => 'deft_extra_options',
		'default'     => 1,
	)
);

/*
* Deft Footer Options
 */
Kirki::add_section( 'deft_footer_options', array(
	'title'    => esc_html__( 'Footer Options', 'deft' ),
	'panel'    => 'deft_theme_options',
	'priority' => 5,
) );

/**
 * breadcrumb Options 
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'text',
		'settings'    => 'deft_footer_copyright_text',
		'label'       => esc_html__( 'Copyright Text', 'deft' ),
		'description' => esc_html__( 'Enter the Text For Copyright', 'deft' ),
		'section'     => 'deft_footer_options',
		'default'     => esc_html__( '&copy; All Right Reserved.', 'deft' ),
	)
);
/**
 * Go To Top 
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'toggle',
		'settings'    => 'deft_footer_go_to_top',
		'label'       => esc_html__( 'Go To Top', 'deft' ),
		'description' => esc_html__( 'Enable and Disable Go To Top Icon', 'deft' ),
		'section'     => 'deft_footer_options',
		'default'     => 1,
	)
);


/*
* Deft Blog Page Options
 */
Kirki::add_section( 'deft_blog_page_options', array(
	'title'    => esc_html__( 'Blog Page Options', 'deft' ),
	'panel'    => 'deft_theme_options',
	'priority' => 5,
) );

/**
 * Read More Options 
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'text',
		'settings'    => 'deft_blog_read_more_options',
		'label'       => esc_html__( 'Read More Text', 'deft' ),
		'description' => esc_html__( 'Enter Text For Read More. Leave Empty to Hide it', 'deft' ),
		'section'     => 'deft_blog_page_options',
		'default'     => esc_html__( 'Read More', 'deft' ),
	)
);

/**
 * Hide Meta Fields Options 
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'toggle',
		'settings'    => 'deft_blog_meta_options',
		'label'       => esc_html__( 'Meta Fields', 'deft' ),
		'description' => esc_html__( 'Remove Category, Date, Comments and Author From Blog Page', 'deft' ),
		'section'     => 'deft_blog_page_options',
		'default'     => 1,
	)
);


/**
 * Hide Featured Image From Blog Listing Page
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'toggle',
		'settings'    => 'deft_blog_featured_image_options',
		'label'       => esc_html__( 'Featured Image', 'deft' ),
		'description' => esc_html__( 'Hide Featured Image From Blog Page', 'deft' ),
		'section'     => 'deft_blog_page_options',
		'default'     => 1,
	)
);

/**
 * Full Featured Image
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'toggle',
		'settings'    => 'deft_blog_featured_image_full_options',
		'label'       => esc_html__( 'Full Image Size', 'deft' ),
		'description' => esc_html__( 'Make Featured Image Larger', 'deft' ),
		'section'     => 'deft_blog_page_options',
		'default'     => 0,
	)
);

/**
 * Excerpt Length
*/
Kirki::add_field(
	'deft_config', array(
		'type'        => 'number',
		'settings'    => 'deft_blog_excerpt_length_options',
		'label'       => esc_html__( 'Enter Paragraph Length', 'deft' ),
		'description' => esc_html__( 'Number Of Words to Display in Blog Page', 'deft' ),
		'section'     => 'deft_blog_page_options',
		'default'     => 20,
	)
);