<?php
/**
 * Theme Options.
 *
 * @package Blog_Mantra
 */

$default = blog_mantra_default_theme_options();

/**=========== Option Panel ===========**/
$wp_customize->add_panel(
    'blog_mantra_basic_panel', 
    array(
        'title'             => __( 'Theme Options', 'blog-mantra' ),
        'priority'          => 200, 
    )
);

/**=========== Header Setting - start ===========**/
$wp_customize->add_section(
    'blog_mantra_header', 
    array(    
        'title'             => __( 'Header', 'blog-mantra' ),
        'panel'             => 'blog_mantra_basic_panel', 
    )
);  

/*----------- Sticky header -----------*/
$wp_customize->add_setting(
    'blog_mantra[sticky_header]',
    array(
        'default'           => $default['sticky_header'],       
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[sticky_header]', 
    array(
        'label'             => __( 'Enable Sticky Header', 'blog-mantra' ),
        'section'           => 'blog_mantra_header',   
        'settings'          => 'blog_mantra[sticky_header]',     
        'type'              => 'checkbox',
    )
);

/*----------- Social media  -----------*/
$wp_customize->add_setting(
    'blog_mantra[enable_social_media]',
    array(
        'default'           => $default['enable_social_media'],       
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[enable_social_media]', 
    array(
        'label'             => __( 'Enable Social Media', 'blog-mantra' ),
        'section'           => 'blog_mantra_header',   
        'settings'          => 'blog_mantra[enable_social_media]',     
        'type'              => 'checkbox',
    )
);

/*----------- Search icon  -----------*/
$wp_customize->add_setting(
    'blog_mantra[enable_search]',
    array(
        'default'           => $default['enable_search'],       
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[enable_search]', 
    array(
        'label'             => __( 'Enable Search', 'blog-mantra' ),
        'section'           => 'blog_mantra_header',   
        'settings'          => 'blog_mantra[enable_search]',     
        'type'              => 'checkbox',
    )
);
/**=========== Header Setting - end ===========**/

/**=========== Slideshow Settings - start ===========**/
$wp_customize->add_section(
    'blog_mantra_slider', 
    array(    
        'title'             => __( 'Slideshow', 'blog-mantra' ),
        'panel'             => 'blog_mantra_basic_panel'    
    )
);    

/*----------- Enable/Disable header image at homepage -----------*/
$wp_customize->add_setting(
    'blog_mantra[header_img_disable]', 
    array(
        'default'           => $default['header_img_disable'],       
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[header_img_disable]', 
    array(
        'label'             => __( 'Disable Header Image in Home Page', 'blog-mantra' ),
        'description'   => __( 'This option works only when header image is inserted', 'blog-mantra'  ),
        'section'           => 'blog_mantra_slider',   
        'settings'          => 'blog_mantra[header_img_disable]',     
        'type'              => 'checkbox'
    )
);

/*----------- Enable/Disable Slideshow -----------*/
$wp_customize->add_setting(
    'blog_mantra[slider_enable]', 
    array(
        'default'           => $default['slider_enable'],       
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[slider_enable]', 
    array(
        'label'             => __( 'Enable Slideshow', 'blog-mantra' ),
        'description'   => __( 'If you enable slideshow, header image will be automatically hidden in homepage', 'blog-mantra'  ),
        'section'           => 'blog_mantra_slider',   
        'settings'          => 'blog_mantra[slider_enable]',     
        'type'              => 'checkbox'
    )
);  

/*----------- Show/Hide slider excerpt -----------*/
$wp_customize->add_setting(
    'blog_mantra[slider_excerpt_enable]', 
    array(
        'default'           => $default['slider_excerpt_enable'],       
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[slider_excerpt_enable]', 
    array(
        'label'             => __( 'Display Excerpt', 'blog-mantra' ),
        'section'           => 'blog_mantra_slider',   
        'settings'          => 'blog_mantra[slider_excerpt_enable]',     
        'type'              => 'checkbox',
        'active_callback'   => 'blog_mantra_slideshow_multi',
    )
);

/*----------- Show/Hide slider button -----------*/
$wp_customize->add_setting(
    'blog_mantra[slider_btn_enable]', 
    array(
        'default'           => $default['slider_btn_enable'],       
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[slider_btn_enable]', 
    array(
        'label'             => __( 'Display Read Button', 'blog-mantra' ),
        'section'           => 'blog_mantra_slider',   
        'settings'          => 'blog_mantra[slider_btn_enable]',     
        'type'              => 'checkbox',
        'active_callback'   => 'blog_mantra_slideshow_multi',
    )
);

/*----------- Slider type -----------*/
$wp_customize->add_setting(
    'blog_mantra[main_slider_type]', 
    array(
        'default'           => $default['main_slider_type'],        
        'sanitize_callback' => 'blog_mantra_sanitize_select'
    )
);

$wp_customize->add_control(
    'blog_mantra[main_slider_type]', 
    array(      
        'label'             => __( 'Select slider type', 'blog-mantra' ),
        'section'           => 'blog_mantra_slider',
        'settings'          => 'blog_mantra[main_slider_type]',
        'type'              => 'radio',
        'choices'           => array(
            'single'        => __( 'Single Post at a Time', 'blog-mantra' ),
            'multiple'  => __( 'Multiple Posts at a Time', 'blog-mantra' ),              
        ),
        'active_callback'   => 'blog_mantra_slideshow',
    )
);  

/*----------- Slider category -----------*/
$wp_customize->add_setting(
    'blog_mantra[slider_cat]', 
    array(
        'default'           => $default['slider_cat'],        
        'sanitize_callback' => 'blog_mantra_sanitize_number'
    )
);

$wp_customize->add_control(
    new Blog_Mantra_Customize_Category_Control(
        $wp_customize,
        'blog_mantra[slider_cat]',
        array(
            'label'         => __( 'Category for Slideshow', 'blog-mantra'  ),
            'description'   => __( 'Posts of selected category will be used as sliders', 'blog-mantra'  ),
            'settings'      => 'blog_mantra[slider_cat]',
            'section'       => 'blog_mantra_slider',
            'active_callback'   => 'blog_mantra_slideshow',        
        )
    )
);

// Slider Transition Delay.
$wp_customize->add_setting( 'blog_mantra[slider_transition_delay]',
    array(
    'default'           => $default['slider_transition_delay'],
    'sanitize_callback' => 'blog_mantra_sanitize_number_range',
    )
);

$wp_customize->add_control( 'blog_mantra[slider_transition_delay]',
    array(
        'label'             => __( 'Transition Delay', 'blog-mantra' ),
        'description'       => __( 'In second(s)', 'blog-mantra' ),
        'settings'          => 'blog_mantra[slider_transition_delay]',
        'section'           => 'blog_mantra_slider',
        'type'              => 'number',
        'input_attrs'       => array( 'min' => 1, 'max' => 10, 'step' => 1, 'style' => 'width: 66px;' ),
        'active_callback'   => 'blog_mantra_slideshow',
    )
);

// Slider Transition Duration.
$wp_customize->add_setting( 'blog_mantra[slider_transition_duration]',
    array(
    'default'           => $default['slider_transition_duration'],
    'sanitize_callback' => 'blog_mantra_sanitize_number_range',
    )
);

$wp_customize->add_control( 'blog_mantra[slider_transition_duration]',
    array(
    'label'             => __( 'Transition Duration', 'blog-mantra' ),
    'description'       => __( 'In second(s)', 'blog-mantra' ),
    'settings'          => 'blog_mantra[slider_transition_duration]',
    'section'           => 'blog_mantra_slider',
    'type'              => 'number',
    'input_attrs'       => array( 'min' => 1, 'max' => 10, 'step' => 1, 'style' => 'width: 66px;' ),
    'active_callback'   => 'blog_mantra_slideshow',
    )
);

/**=========== Slider Settings - end ===========**/


/**=========== General setting - start ===========**/
$wp_customize->add_section(
    'blog_mantra_general', 
    array(    
        'title'       => __('General Settings', 'blog-mantra' ),
        'panel'       => 'blog_mantra_basic_panel'    
    )
);

/**=========== Page layout ===========**/
$wp_customize->add_setting( 
    'blog_mantra[sidebar]',
    array(
        'default'           => $default['sidebar'],
        'sanitize_callback' => 'blog_mantra_sanitize_select',
    )
);
$wp_customize->add_control( 'blog_mantra[sidebar]',
    array(
        'label'       => esc_html__( 'Page Layout', 'blog-mantra'  ),
        'section'     => 'blog_mantra_general',   
        'settings'    => 'blog_mantra[sidebar]',
        'type'        => 'radio',
        'choices'     => array(
            'right'     => esc_html__( 'Right Sidebar', 'blog-mantra'  ),
            'left'      => esc_html__( 'Left Sidebar', 'blog-mantra'  ),
            'no_side'   => esc_html__( 'No Sidebar', 'blog-mantra'  ),
            )
    )
);

/**=========== Pagination style ===========**/
$wp_customize->add_setting( 
    'blog_mantra[pagination_style]',
    array(
        'default'           => $default['pagination_style'],
        'sanitize_callback' => 'blog_mantra_sanitize_select',
    )
);
$wp_customize->add_control( 'blog_mantra[pagination_style]',
    array(
        'label'       => esc_html__( 'Pagination Style', 'blog-mantra'  ),
        'section'     => 'blog_mantra_general',   
        'settings'    => 'blog_mantra[pagination_style]',
        'type'        => 'radio',
        'choices'     => array(
            'default'     => esc_html__( 'Default', 'blog-mantra'  ),
            'numeric'      => esc_html__( 'Numeric', 'blog-mantra'  ),
            )
    )
);

/**=========== Enable/Disable - breadcrumb ===========**/
$wp_customize->add_setting(
    'blog_mantra[enable_breadcrumb]', 
    array(
        'default'           => $default['enable_breadcrumb'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[enable_breadcrumb]', 
    array(
        'label'       => __('Enable Breadcrumb', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[enable_breadcrumb]',
        'section'     => 'blog_mantra_general',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post date ===========**/
$wp_customize->add_setting(
    'blog_mantra[enable_post_date]', 
    array(
        'default'           => $default['enable_post_date'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[enable_post_date]', 
    array(
        'label'       => __('Enable Post Date', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[enable_post_date]',
        'section'     => 'blog_mantra_general',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post author ===========**/
$wp_customize->add_setting(
    'blog_mantra[enable_post_author]', 
    array(
        'default'           => $default['enable_post_author'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[enable_post_author]', 
    array(
        'label'       => __('Enable Post Author', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[enable_post_author]',
        'section'     => 'blog_mantra_general',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post category ===========**/
$wp_customize->add_setting(
    'blog_mantra[enable_post_category]', 
    array(
        'default'           => $default['enable_post_category'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[enable_post_category]', 
    array(
        'label'       => __('Enable Post Category', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[enable_post_category]',
        'section'     => 'blog_mantra_general',
        'type'        => 'checkbox',
    )
);

/**=========== General settings - end ===========**/

/**=========== Single post settings - start ===========**/

$wp_customize->add_section(
    'blog_mantra_single_post', 
    array(    
        'title'       => __('Single Post Settings', 'blog-mantra' ),
        'panel'       => 'blog_mantra_basic_panel'    
    )
);

/**=========== Enable/Disable - post date in single post ===========**/

$wp_customize->add_setting(
    'blog_mantra[single_post_date]', 
    array(
        'default'           => $default['single_post_date'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[single_post_date]', 
    array(
        'label'       => __('Enable Post Date', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[single_post_date]',
        'section'     => 'blog_mantra_single_post',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post author in single post ===========**/

$wp_customize->add_setting(
    'blog_mantra[single_post_author]', 
    array(
        'default'           => $default['single_post_author'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[single_post_author]', 
    array(
        'label'       => __('Enable Post Author', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[single_post_author]',
        'section'     => 'blog_mantra_single_post',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post category in single post ===========**/

$wp_customize->add_setting(
    'blog_mantra[single_post_category]', 
    array(
        'default'           => $default['single_post_category'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[single_post_category]', 
    array(
        'label'       => __('Enable Post Category', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[single_post_category]',
        'section'     => 'blog_mantra_single_post',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post tags in single post ===========**/

$wp_customize->add_setting(
    'blog_mantra[single_post_tags]', 
    array(
        'default'           => $default['single_post_tags'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[single_post_tags]', 
    array(
        'label'       => __('Enable Post Tags', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[single_post_tags]',
        'section'     => 'blog_mantra_single_post',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post author description ===========**/

$wp_customize->add_setting(
    'blog_mantra[post_author_description]', 
    array(
        'default'           => $default['post_author_description'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[post_author_description]', 
    array(
        'label'       => __('Enable Author Description', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[post_author_description]',
        'section'     => 'blog_mantra_single_post',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - related post ===========**/

$wp_customize->add_setting(
    'blog_mantra[enable_related_posts]', 
    array(
        'default'           => $default['enable_related_posts'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[enable_related_posts]', 
    array(
        'label'       => __('Enable Related Posts', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[enable_related_posts]',
        'section'     => 'blog_mantra_single_post',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post navigation ===========**/

$wp_customize->add_setting(
    'blog_mantra[post_navigation]', 
    array(
        'default'           => $default['post_navigation'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[post_navigation]', 
    array(
        'label'       => __('Enable Previous/Next Post Navigation', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[post_navigation]',
        'section'     => 'blog_mantra_single_post',
        'type'        => 'checkbox',
    )
);

/**=========== Single post settings - end ===========**/

/**=========== Social Media Options - start ===========**/
$wp_customize->add_section(
    'blog_mantra_social', 
    array(    
        'title'       => __( 'Social Media', 'blog-mantra' ),
        'panel'       => 'blog_mantra_basic_panel'    
        ));

/*----------- Social link text field -----------*/
$social_options = array('facebook', 'twitter', 'google_plus', 'instagram', 'linkedin', 'pinterest', 'youtube', 'vimeo', 'flickr', 'behance', 'dribbble', 'tumblr', 'github' );

foreach($social_options as $social) {

    $social_name = ucwords(str_replace('_', ' ', $social));

    $label = '';

    switch ($social) {

        case 'facebook':
        $label = __('Facebook', 'blog-mantra' );
        break;

        case 'twitter':
        $label = __( 'Twitter', 'blog-mantra'  );
        break;

        case 'google_plus':
        $label = __( 'Google Plus', 'blog-mantra'  );
        break;

        case 'instagram':
        $label = __( 'Instagram', 'blog-mantra'  );
        break;

        case 'linkedin':
        $label = __( 'LinkedIn', 'blog-mantra'  );
        break;

        case 'pinterest':
        $label = __( 'Pinterest', 'blog-mantra'  );
        break;

        case 'youtube':
        $label = __( 'Youtube', 'blog-mantra'  );
        break;

        case 'vimeo':
        $label = __( 'vimeo', 'blog-mantra'  );
        break;

        case 'flickr':
        $label = __( 'Flickr', 'blog-mantra'  );
        break;

        case 'behance':
        $label = __( 'Behance', 'blog-mantra'  );
        break;

        case 'dribbble':
        $label = __( 'Dribbble', 'blog-mantra'  );
        break;

        case 'tumblr':
        $label = __( 'Tumblr', 'blog-mantra'  );
        break;

        case 'github':
        $label = __( 'Github', 'blog-mantra'  );
        break;

    }
    
    $wp_customize->add_setting( 'blog_mantra['.$social.']', array(
        'sanitize_callback'     => 'esc_url_raw',
        'sanitize_js_callback'  =>  'esc_url_raw'
        ));

    $wp_customize->add_control( 'blog_mantra['.$social.']', array(
        'label'     => $label,
        'type'      => 'text',
        'section'   => 'blog_mantra_social',
        'settings'  => 'blog_mantra['.$social.']'
        ));
}
/**=========== Social Media Options - end ===========**/

/**=========== Footer Options - start ===========**/
$wp_customize->add_section(
    'blog_mantra_footer', 
    array(    
        'title'       => __( 'Footer', 'blog-mantra' ),
        'panel'       => 'blog_mantra_basic_panel'    
    )
); 

/**=========== Enable/Disable - social media ===========**/ 
$wp_customize->add_setting(
    'blog_mantra[enable_footer_nav]', 
    array(
        'default'           => $default['enable_footer_nav'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[enable_footer_nav]', 
    array(
        'label'       => __( 'Enable Footer Navigation', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[enable_footer_nav]',
        'section'     => 'blog_mantra_footer',
        'type'        => 'checkbox',
    )
);     

/**=========== Copyright text ===========**/
$wp_customize->add_setting(
    'blog_mantra[copyright_text]', 
    array(
      'default'           => $default['copyright_text'],  
      'sanitize_callback' => 'sanitize_textarea_field',
    )
);

$wp_customize->add_control(
    'blog_mantra[copyright_text]', 
        array(
        'label'       => __( 'Copyright Text', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[copyright_text]',
        'section'     => 'blog_mantra_footer',
        'type'        => 'textarea'
    )
);

/**=========== Enable/Disable - scroll to top ===========**/
$wp_customize->add_setting(
    'blog_mantra[enable_scroll_top]', 
    array(
        'default'           => $default['enable_scroll_top'],     
        'sanitize_callback' => 'blog_mantra_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blog_mantra[enable_scroll_top]', 
    array(
        'label'       => __( 'Enable Scroll to Top', 'blog-mantra' ),    
        'settings'    => 'blog_mantra[enable_scroll_top]',
        'section'     => 'blog_mantra_footer',
        'type'        => 'checkbox'
    )
);
/**=========== Footer Options - end ===========**/
