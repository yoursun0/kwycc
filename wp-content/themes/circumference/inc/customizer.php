<?php
/**
 * Circumference Theme Customizer
 * @package Circumference 
 */


/**
 * Lets create a customizable theme and begin with some pre-setup
 */ 
 
	add_action('customize_register', 'circumference_theme_customize');
	function circumference_theme_customize($wp_customize) {
	$wp_customize->remove_section( 'colors');
	
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function circumference_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'circumference_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function circumference_customize_preview_js() {
	wp_enqueue_script( 'circumference_customizer', get_template_directory_uri() . '/js/circumference-customizer.js', array( 'customize-preview' ), '20131012', true );
}
add_action( 'customize_preview_init', 'circumference_customize_preview_js' );



/**
 * Lets add a logo to our Title and Tagline group
 */
	// Setting group for selecting logo title
	$wp_customize->add_setting( 'logo_style', array(
		'default' => 'default',
		'sanitize_callback' => 'circumference_sanitize_logo_style',
	) );
			
	$wp_customize->add_control( 'logo_style', array(
    'label'   => __( 'Logo Style', 'circumference' ),
    'section' => 'title_tagline',
	'priority' => 10,
    'type'    => 'radio',
        'choices' => array(
            'default' => __( 'Default Logo', 'circumference' ),
            'custom' => __( 'Your Logo', 'circumference' ),
            'logotext' => __( 'Logo with Title and Tagline', 'circumference' ),
			'text' => __( 'Text Title', 'circumference' ),
        ),
    ));
	
// Setting group for uploading logo
    $wp_customize->add_setting('my_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
		'sanitize_callback' => 'circumference_sanitize_upload',
    ));
	
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'my_logo', array(
        'label'    => __('Your Logo', 'circumference'),
        'section'  => 'title_tagline',
        'settings' => 'my_logo',
		'priority' => 11,
    ))); 
// site title colour
	$wp_customize->add_setting( 'sitetitle', array(
		'default'        => '#565656',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sitetitle', array(
		'label'   => __( 'Site Title Colour', 'circumference' ),
		'section' => 'title_tagline',
		'settings'   => 'sitetitle',
		'priority' => 12,			
	) ) );
// tagline colour
	$wp_customize->add_setting( 'tagline', array(
		'default'        => '#378B92',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tagline', array(
		'label'   => __( 'Tagline Colour', 'circumference' ),
		'section' => 'title_tagline',
		'settings'   => 'tagline',
		'priority' => 13,			
	) ) );
// logo title margin
	$wp_customize->add_setting( 'titlemargin', array(
		'default'        => '0 0 0 0',
		'sanitize_callback' => 'circumference_sanitize_text',
	) );
	$wp_customize->add_control( 'titlemargin', array(
		'settings' => 'titlemargin',
		'label'    => __( 'Site Title Margins', 'circumference' ),
		'section'  => 'title_tagline',
		'type'     => 'text',
		'priority'       => 14,
	) );

/**
 * This is a section called Basic Settings
 * For miscellaneous options
 */

	$wp_customize->add_section( 'basic_settings', array(
		'title'          => __( 'Basic Settings', 'circumference' ),
		'priority'       => 25,
	) );

// Setting for page width
	$wp_customize->add_setting( 'page_width', array(
		'default' => 'default',
		'sanitize_callback' => 'circumference_sanitize_pagewidth',
	) );
// Control for page width	
	$wp_customize->add_control( 'page_width', array(
    'label'   => __( 'Page Width', 'circumference' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'default' => __( 'Full Width', 'circumference' ),
            'boxedmedium' => __( 'Boxed Medium', 'circumference' ),
			'boxedsmall' => __( 'Boxed Small', 'circumference' ),
        ),
	'priority'       => 1,	
    ));
		
// Setting for blog layout
	$wp_customize->add_setting( 'blog_style', array(
		'default' => 'blogright',
		'sanitize_callback' => 'circumference_sanitize_blogstyle',
	) );
// Control for blog layout	
	$wp_customize->add_control( 'blog_style', array(
    'label'   => __( 'Blog Style', 'circumference' ),
    'section' => 'basic_settings',
	'priority' => 2,
    'type'    => 'radio',
        'choices' => array(
            'blogright' => __( 'Blog with Right Sidebar', 'circumference' ),
			'blogleft' => __( 'Blog with Left Sidebar', 'circumference' ),
			'blogleftright' => __( 'Blog with Left &amp; Right Sidebar', 'circumference' ),
			'blogwide' => __( 'Blog with Full Width &amp; no Sidebars', 'circumference' ),
        ),
    ));	

// Setting for featured image
	$wp_customize->add_setting( 'featured_image', array(
		'default' => 'big',
		'sanitize_callback' => 'circumference_sanitize_featured_image',
	) );
// Control for featured image
	$wp_customize->add_control( 'featured_image', array(
    'label'   => __( 'Featured Image', 'circumference' ),
    'section' => 'basic_settings',
	'priority' => 4,
    'type'    => 'radio',
        'choices' => array(
            'big' => __( 'Wide Featured Image', 'circumference' ),
			'small' => __( 'Small Featured Image', 'circumference' ),
        ),
    ));
// hide featured image on single
	$wp_customize->add_setting( 'hide_featured', array(
	'sanitize_callback' => 'circumference_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_featured', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Full Post Featured Image', 'circumference' ),
        'section' => 'basic_settings',
		'priority' => 5,
    ) );





// Setting for content or excerpt
	$wp_customize->add_setting( 'excerpt_content', array(
		'default' => 'content',
		'sanitize_callback' => 'circumference_sanitize_excerpt',
	) );
// Control for Content or excerpt
	$wp_customize->add_control( 'excerpt_content', array(
    'label'   => __( 'Content or Excerpt', 'circumference' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'content' => __( 'Content', 'circumference' ),
            'excerpt' => __( 'Excerpt', 'circumference' ),	
        ),
	'priority'       => 6,
    ));

// Setting group for a excerpt
	$wp_customize->add_setting( 'excerpt_limit', array(
		'default'        => '50',
		'sanitize_callback' => 'circumference_sanitize_text',
	) );
	$wp_customize->add_control( 'excerpt_limit', array(
		'settings' => 'excerpt_limit',
		'label'    => __( 'Excerpt Length', 'circumference' ),
		'section'  => 'basic_settings',
		'type'     => 'text',
		'priority'       => 7,
	) );
	
// hide single footer meta
	$wp_customize->add_setting( 'hide_postinfo', array(
	'sanitize_callback' => 'circumference_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_postinfo', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Post Footer Info', 'circumference' ),
        'section' => 'basic_settings',
		'priority' => 8,
    ) );	
// hide single post nav
	$wp_customize->add_setting( 'hide_postnav', array(
	'sanitize_callback' => 'circumference_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_postnav', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Post Navigation', 'circumference' ),
        'section' => 'basic_settings',
		'priority' => 9,
    ) );	
// hide page titles
	$wp_customize->add_setting( 'hide_title', array(
	'sanitize_callback' => 'circumference_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_title', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Page Titles', 'circumference' ),
        'section' => 'basic_settings',
		'priority' => 10,
    ) );
// hide page title dotline
	$wp_customize->add_setting( 'hide_title_dotline', array(
	'sanitize_callback' => 'circumference_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_title_dotline', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Page Title Dotline', 'circumference' ),
        'section' => 'basic_settings',
		'priority' => 11,
    ) );
// hide page title dotline
	$wp_customize->add_setting( 'hide_edit', array(
	'sanitize_callback' => 'circumference_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_edit', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Edit Button', 'circumference' ),
        'section' => 'basic_settings',
		'priority' => 12,
    ) );	
			
// Setting group for a Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'        => 'Your Name',
		'sanitize_callback' => 'circumference_sanitize_text',
	) );

	$wp_customize->add_control( 'copyright', array(
		'settings' => 'copyright',
		'label'    => __( 'Your Copyright Notice', 'circumference' ),
		'section'  => 'basic_settings',		
		'type'     => 'text',
		'priority' => 13,
	) );	
	

/**
 * This is a custom section called Typography
 * which contains settings for typography
 */
	$wp_customize->add_section( 'typography', array(
		'title'          => __( 'Typography', 'circumference' ),
		'priority'       => 30,
	) );

// Body base text size
	$wp_customize->add_setting( 'body_fontsize', array(
		'default'        => '100',
		'sanitize_callback' => 'circumference_sanitize_text',
	) );
	
	$wp_customize->add_control( 'body_fontsize', array(
		'label'   => __( 'Body Base Text Size', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'body_fontsize',
		'type'     => 'text',
		'priority' => 1,			
	) );

// Main content area text size
	$wp_customize->add_setting( 'content_fontsize', array(
		'default'        => '0.813em',
		'sanitize_callback' => 'circumference_sanitize_text',
	) );
	
	$wp_customize->add_control( 'content_fontsize', array(
		'label'   => __( 'Main Content Area Text Size', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'content_fontsize',
		'type'     => 'text',
		'priority' => 2,			
	) );

	
// Headings
	$wp_customize->add_setting( 'headings', array(
		'default'        => '#40494e',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headings', array(
		'label'   => __( 'Headings Colour', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'headings',
		'priority' => 3,			
	) ) );		
	
// Banner area text colour
	$wp_customize->add_setting( 'page_banner_text', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_banner_text', array(
		'label'   => __( 'Page Banner Text Colour', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'page_banner_text',
		'priority' => 4,			
	) ) );	
	
// Main content text colour
	$wp_customize->add_setting( 'content_text', array(
		'default'        => '#656565',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_text', array(
		'label'   => __( 'Main Content Text Colour', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'content_text',
		'priority' => 5,			
	) ) );	
// Bottom area Headings
	$wp_customize->add_setting( 'bottom_headings', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_headings', array(
		'label'   => __( 'Bottom Headings', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'bottom_headings',
		'priority' => 6,			
	) ) );
// Bottom content text colour
	$wp_customize->add_setting( 'bottomtext', array(
		'default'        => '#abb3b4',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomtext', array(
		'label'   => __( 'Bottom Content Text Colour', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'bottomtext',
		'priority' => 7,			
	) ) );
// Bottom content text links
	$wp_customize->add_setting( 'bottomlinks', array(
		'default'        => '#efefef',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomlinks', array(
		'label'   => __( 'Bottom Links Colour', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'bottomlinks',
		'priority' => 8,			
	) ) );
// Bottom content text link hover
	$wp_customize->add_setting( 'bottomlinkshover', array(
		'default'        => '#abb3b4',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomlinkshover', array(
		'label'   => __( 'Bottom Links on Hover', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'bottomlinkshover',
		'priority' => 9,			
	) ) );			
// Main content link colour
	$wp_customize->add_setting( 'link_colour', array(
		'default'        => '#2bafbb',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour', array(
		'label'   => __( 'Text Link Colour', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'link_colour',
		'priority' => 10,			
	) ) );	
	
// Main content link colour on hover
	$wp_customize->add_setting( 'link_hover', array(
		'default'        => '#c6b274',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover', array(
		'label'   => __( 'Text Links on Hover', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'link_hover',
		'priority' => 11,			
	) ) );	
	
// Footer text colour
	$wp_customize->add_setting( 'footertext', array(
		'default'        => '#818181',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footertext', array(
		'label'   => __( 'Footer Text Colour', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'footertext',
		'priority' => 12,			
	) ) );	
// Footer link colour
	$wp_customize->add_setting( 'footer_links', array(
		'default'        => '#c6b274',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_links', array(
		'label'   => __( 'Footer Link Colour', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'footer_links',
		'priority' => 13,			
	) ) );
// Footer link colour on hover
	$wp_customize->add_setting( 'footer_linkshover', array(
		'default'        => '#818181',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_linkshover', array(
		'label'   => __( 'Footer Link Colour', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'footer_linkshover',
		'priority' => 14,			
	) ) );		
	
// Call to Action Heading
	$wp_customize->add_setting( 'cta_heading', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_heading', array(
		'label'   => __( 'Call to Action Heading', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'cta_heading',
		'priority' => 15,			
	) ) );	
// Call to Action text
	$wp_customize->add_setting( 'cta_text', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_text', array(
		'label'   => __( 'Call to Action Text', 'circumference' ),
		'section' => 'typography',
		'settings'   => 'cta_text',
		'priority' => 16,			
	) ) );	
		
	
/**
 * This is a section called Colours
 * This is for the primary colours
 */

	$wp_customize->add_section( 'colours', array(
		'title'          => __( 'Colours', 'circumference' ),
		'priority'       => 30,
	) );
	 
// Announcement area background
	$wp_customize->add_setting( 'announce_bg', array(
		'default'        => '#25B7C3',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'announce_bg', array(
		'label'   => __( 'Announcement Background', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'announce_bg',
		'priority' => 1,			
	) ) );
// Announcement bottom border
	$wp_customize->add_setting( 'announce_border', array(
		'default'        => '#f3f3f3',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'announce_border', array(
		'label'   => __( 'Announcement Bottom border', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'announce_border',
		'priority' => 2,			
	) ) );
// Announcement text
	$wp_customize->add_setting( 'announce_text', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'announce_text', array(
		'label'   => __( 'Announcement Text', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'announce_text',
		'priority' => 3,			
	) ) );
// Header background
	$wp_customize->add_setting( 'header_bg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg', array(
		'label'   => __( 'Header Background', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'header_bg',
		'priority' => 4,			
	) ) );
// Widget list border colour
	$wp_customize->add_setting( 'widgetlistborder', array(
		'default'        => '#e2e5e7',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'widgetlistborder', array(
		'label'   => __( 'Widget List Border Colour', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'widgetlistborder',
		'priority' => 5,			
	) ) );	
// Bottom group list border colour
	$wp_customize->add_setting( 'bottomlistborder', array(
		'default'        => '#5c646b',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomlistborder', array(
		'label'   => __( 'Bottom List Border Colour', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'bottomlistborder',
		'priority' => 6,			
	) ) );
// Content area background colour
	$wp_customize->add_setting( 'content_bg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_bg', array(
		'label'   => __( 'Content Background', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'content_bg',
		'priority' => 7,			
	) ) );
// Call to Action background
	$wp_customize->add_setting( 'cta_bg', array(
		'default'        => '#e08b8b',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_bg', array(
		'label'   => __( 'Call to Action Background', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'cta_bg',
		'priority' => 8,			
	) ) );			

// Page Headings Dot Line colours
	$wp_customize->add_setting( 'hdg_line', array(
		'default'        => '#e2e5e7',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hdg_line', array(
		'label'   => __( 'Heading Line Border', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'hdg_line',
		'priority' => 9,			
	) ) );
// Page Headings Dot Line colours
	$wp_customize->add_setting( 'hdg_dot', array(
		'default'        => '#e2e5e7',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hdg_dot', array(
		'label'   => __( 'Heading Dot', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'hdg_dot',
		'priority' => 10,			
	) ) );
	
// Bottom widget background colour
	$wp_customize->add_setting( 'bottom_bg', array(
		'default'        => '#384149',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_bg', array(
		'label'   => __( 'Content Background', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'bottom_bg',
		'priority' => 11,			
	) ) );	
	
// Bottom widget background colour
	$wp_customize->add_setting( 'footer_bg', array(
		'default'        => '#000000',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg', array(
		'label'   => __( 'Footer Background', 'circumference' ),
		'section' => 'colours',
		'settings'   => 'footer_bg',
		'priority' => 12,			
	) ) );
	
	
	
	
	
	
	
	
	
/**
 * This is a custom section called Social Networking
 * which contains settings for social networking icons and links
 */
	$wp_customize->add_section( 'social_networking', array(
		'title'          => __( 'Social Networking', 'circumference' ),
		'priority'       => 50,
	) );


	
// Setting for hiding the social bar	
	$wp_customize->add_setting( 'hide_social' );
	
// Control for hiding the social bar	
	$wp_customize->add_control( 'hide_social', array(
        'label' => __( 'Hide Social Bar', 'circumference' ),
		'type' => 'checkbox',
		'section' => 'social_networking',
		'priority' => 1,
    ) );

	
// Setting group for Twitter
	$wp_customize->add_setting( 'twitter_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'twitter_uid', array(
		'settings' => 'twitter_uid',
		'label'    => __( 'Twitter', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 2,
	) );	
	
// Setting group for Facebook
	$wp_customize->add_setting( 'facebook_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'facebook_uid', array(
		'settings' => 'facebook_uid',
		'label'    => __( 'Facebook', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 3,
	) );	
	
// Setting group for Google+
	$wp_customize->add_setting( 'google_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'google_uid', array(
		'settings' => 'google_uid',
		'label'    => __( 'Google+', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 4,
	) );	
	
// Setting group for Linkedin
	$wp_customize->add_setting( 'linkedin_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'linkedin_uid', array(
		'settings' => 'linkedin_uid',
		'label'    => __( 'Linkedin', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 5,
	) );	
	
// Setting group for Pinterest
	$wp_customize->add_setting( 'pinterest_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'pinterest_uid', array(
		'settings' => 'pinterest_uid',
		'label'    => __( 'Pinterest', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 6,
	) );

// Setting group for Flickr
	$wp_customize->add_setting( 'flickr_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'flickr_uid', array(
		'settings' => 'flickr_uid',
		'label'    => __( 'Flickr', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 7,
	) );
// Setting group for Youtube
	$wp_customize->add_setting( 'youtube_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'youtube_uid', array(
		'settings' => 'youtube_uid',
		'label'    => __( 'Youtube', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 8,
	) );	
// Setting group for Vimeo
	$wp_customize->add_setting( 'vimeo_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'vimeo_uid', array(
		'settings' => 'vimeo_uid',
		'label'    => __( 'Vimeo', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 9,
	) );
// Setting group for Instagram
	$wp_customize->add_setting( 'instagram_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'instagram_uid', array(
		'settings' => 'instagram_uid',
		'label'    => __( 'Instagram', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 10,
	) );	
	
	
// Setting group for Reddit
	$wp_customize->add_setting( 'reddit_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'reddit_uid', array(
		'settings' => 'reddit_uid',
		'label'    => __( 'Reddit', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 11,
	) );	
// Setting group for Picassa
	$wp_customize->add_setting( 'picassa_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'picassa_uid', array(
		'settings' => 'picassa_uid',
		'label'    => __( 'Picassa', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 12,
	) );	
// Setting group for Stumbleupon
	$wp_customize->add_setting( 'stumbleupon_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'stumbleupon_uid', array(
		'settings' => 'stumbleupon_uid',
		'label'    => __( 'Stubmleupon', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 13,
	) );	
// Setting group for WordPress
	$wp_customize->add_setting( 'wp_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'wp_uid', array(
		'settings' => 'wp_uid',
		'label'    => __( 'WordPress', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 14,
	) );
// Setting group forgithub
	$wp_customize->add_setting( 'github_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'github_uid', array(
		'settings' => 'github_uid',
		'label'    => __( 'Github', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 15,
	) );	
// Setting group dribbble
	$wp_customize->add_setting( 'dribbble_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'dribbble_uid', array(
		'settings' => 'dribbble_uid',
		'label'    => __( 'Dribbble', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 16,
	) );	
				
// Setting group for rss
	$wp_customize->add_setting( 'rss_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'rss_uid', array(
		'settings' => 'rss_uid',
		'label'    => __( 'RSS', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 17,
	) );
// Setting group for email
	$wp_customize->add_setting( 'email_uid', array(
		'default'        => '',
		'sanitize_callback' => 'circumference_sanitize_url',
	) );

	$wp_customize->add_control( 'email_uid', array(
		'settings' => 'email_uid',
		'label'    => __( 'Email', 'circumference' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 18,
	) );	
	
	// Social icon colour
	$wp_customize->add_setting( 'social_colour', array(
		'default'        => '#a4abb3',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_colour', array(
		'label'   => __( 'Social Icon Colour', 'circumference' ),
		'section' => 'social_networking',
		'settings'   => 'social_colour',
		'priority' => 19,			
	) ) );

	// Social icon colour on hover
	$wp_customize->add_setting( 'social_hover', array(
		'default'        => '#000000',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_hover', array(
		'label'   => __( 'Social Icon Hover', 'circumference' ),
		'section' => 'social_networking',
		'settings'   => 'social_hover',
		'priority' => 20,			
	) ) );
	
	// Social icon background
	$wp_customize->add_setting( 'social_bg', array(
		'default'        => '#e2e5e7',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_bg', array(
		'label'   => __( 'Social Icon Background', 'circumference' ),
		'section' => 'social_networking',
		'settings'   => 'social_bg',
		'priority' => 21,			
	) ) );		


/**
 * This is a section for the navigation
 * Everything for your site menu
 */
 
	// menu container margin
	$wp_customize->add_setting( 'nav_margin', array(
		'default'        => '12px 0 0 0',
		'sanitize_callback' => 'circumference_sanitize_text',
	) );
	
	$wp_customize->add_control( 'nav_margin', array(
		'label'   => __( 'Main Menu Position', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'nav_margin',
		'type'     => 'text',
		'priority' => 10,			
	) );

	// Menu 1st level link colour
	$wp_customize->add_setting( 'menu_link', array(
		'default'        => '#565656',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_link', array(
		'label'   => __( 'Menu Link Colour', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'menu_link',
		'priority' => 11,			
	) ) );
		
	// Menu 1st level link colour on hover and acive
	$wp_customize->add_setting( 'menu_hover_active', array(
		'default'        => '#c6b274',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_active', array(
		'label'   => __( 'Menu Hover and Active', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'menu_hover_active',
		'priority' => 12,			
	) ) );
	
	// Submenu link colour
	$wp_customize->add_setting( 'submenu_link', array(
		'default'        => '#919191',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_link', array(
		'label'   => __( 'Submenu Link Colour', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'submenu_link',
		'priority' => 13,			
	) ) );
	// Submenu background hover
	$wp_customize->add_setting( 'submenu_bg_hover', array(
		'default'        => '#f3f3f3',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg_hover', array(
		'label'   => __( 'Submenu Background Link Hover', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'submenu_bg_hover',
		'priority' => 14,			
	) ) );	
	// Submenu bottom border
	$wp_customize->add_setting( 'submenu_border', array(
		'default'        => '#c6b274',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_border', array(
		'label'   => __( 'Submenu Bottom Border', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'submenu_border',
		'priority' => 15,			
	) ) );















	// Secondary menu background
	$wp_customize->add_setting( 'secondary_navbg', array(
		'default'        => '#c6b274',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_navbg', array(
		'label'   => __( 'Full Width Menu Background', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'secondary_navbg',
		'priority' => 16,			
	) ) );
	// Secondary Menu 1st level link colour
	$wp_customize->add_setting( 'secmenu_link', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secmenu_link', array(
		'label'   => __( 'Full Width Menu Link Colour', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'secmenu_link',
		'priority' => 17,			
	) ) );
		
	// Secondary Menu 1st level link colour on hover and acive
	$wp_customize->add_setting( 'secmenu_hover_active', array(
		'default'        => '#6c603c',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secmenu_hover_active', array(
		'label'   => __( 'Full Width Menu Hover and Active', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'secmenu_hover_active',
		'priority' => 18,			
	) ) );
	
	// Secondary Menu Submenu link colour
	$wp_customize->add_setting( 'secsubmenu_link', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secsubmenu_link', array(
		'label'   => __( 'Full Width Submenu Link Colour', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'secsubmenu_link',
		'priority' => 19,			
	) ) );
	// Secondary Submenu background hover
	$wp_customize->add_setting( 'secsubmenu_bg_hover', array(
		'default'        => '#d7c58c',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secsubmenu_bg_hover', array(
		'label'   => __( 'Full Width Submenu Background Link Hover', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'secsubmenu_bg_hover',
		'priority' => 20,			
	) ) );	
	// Secondary Submenu bottom border
	$wp_customize->add_setting( 'secsubmenu_border', array(
		'default'        => '#707070',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secsubmenu_border', array(
		'label'   => __( 'Full Width Submenu Bottom Border', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'secsubmenu_border',
		'priority' => 21,			
	) ) );



// Breadcrumbs background
	$wp_customize->add_setting( 'breadcrumbs_bg', array(
		'default'        => '#e2e5e7',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_bg', array(
		'label'   => __( 'Breadcrumbs Background', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'breadcrumbs_bg',
		'priority' => 22,			
	) ) );
// Breadcrumbs text
	$wp_customize->add_setting( 'breadcrumbs_text', array(
		'default'        => '#9ca4a9',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_text', array(
		'label'   => __( 'Breadcrumbs Text', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'breadcrumbs_text',
		'priority' => 23,			
	) ) );
// Breadcrumbs text link 
	$wp_customize->add_setting( 'breadcrumbs_link', array(
		'default'        => '#c6b274',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_link', array(
		'label'   => __( 'Breadcrumbs Link Colour', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'breadcrumbs_link',
		'priority' => 24,			
	) ) );	
// Breadcrumbs text link on hover
	$wp_customize->add_setting( 'breadcrumbs_link_hov', array(
		'default'        => '#2bafbb',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_link_hov', array(
		'label'   => __( 'Breadcrumbs Link Hover', 'circumference' ),
		'section' => 'nav',
		'settings'   => 'breadcrumbs_link_hov',
		'priority' => 25,			
	) ) );



/**
 * This is a custom section called Showcase Banner
 * which contains settings for styling your showcase and banner area
 */
	$wp_customize->add_section( 'showcase_banner', array(
		'title'          => __( 'Banner Header', 'circumference' ),
		'priority'       => 50,
	) );

// banner header background colour when no image
	$wp_customize->add_setting( 'banner_bg_colour', array(
		'default'        => '#c6b274',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_bg_colour', array(
		'label'   => __( 'Banner Background Colour', 'circumference' ),
		'section' => 'showcase_banner',
		'settings'   => 'banner_bg_colour',
		'priority' => 1,			
	) ) );

// banner header default text colour
	$wp_customize->add_setting( 'banner_text_colour', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'circumference_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_text_colour', array(
		'label'   => __( 'Header Text Colour', 'circumference' ),
		'section' => 'showcase_banner',
		'settings'   => 'banner_text_colour',
		'priority' => 2,			
	) ) );











}


/**
 * adds sanitization callback function : colors
 * @package Circumference 
*/
	function circumference_sanitize_hex_color( $color ) {
	if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
		return '#' . $unhashed;

	return $color;
}

/**
 * adds sanitization callback function : text
 * @package Circumference 
*/
function circumference_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * adds sanitization callback function : url
 * @package Circumference 
*/
	function circumference_sanitize_url( $value) {
		$value = esc_url( $value);
		return $value;
	}

/**
 * adds sanitization callback function : checkbox
 * @package Circumference 
*/
function circumference_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}	



/**
 * adds sanitization callback function for the page width : radio
 * @package Circumference 
*/
function circumference_sanitize_pagewidth( $input ) {
    $valid = array(
            'default' => __( 'Full Width', 'circumference' ),
            'boxedmedium' => __( 'Boxed Medium', 'circumference' ),
			'boxedsmall' => __( 'Boxed Small', 'circumference' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
/**
 * adds sanitization callback function for the featured image : radio
 * @package Circumference 
*/
function circumference_sanitize_featured_image( $input ) {
    $valid = array(
		'big' => __( 'Wide Featured Image', 'circumference' ),
		'small' => __( 'Small Featured Image', 'circumference' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the excerpt : radio
 * @package Circumference 
*/
function circumference_sanitize_excerpt( $input ) {
    $valid = array(
		'content' => __( 'Content', 'circumference' ),
        'excerpt' => __( 'Excerpt', 'circumference' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the layout : radio
 * @package Circumference 
*/
function circumference_sanitize_blogstyle( $input ) {
    $valid = array(
		'blogright' => __( 'Blog with Right Sidebar', 'circumference' ),
		'blogleft' => __( 'Blog with Left Sidebar', 'circumference' ),
		'blogleftright' => __( 'Blog with Left &amp; Right Sidebar', 'circumference' ),
		'blogwide' => __( 'Blog with Full Width &amp; no Sidebars', 'circumference' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the logo style : radio
 * @package Circumference 
*/
function circumference_sanitize_logo_style( $input ) {
    $valid = array(
            'default' => __( 'Default Logo', 'circumference' ),
            'custom' => __( 'Your Logo', 'circumference' ),
            'logotext' => __( 'Logo with Title and Tagline', 'circumference' ),
			'text' => __( 'Text Title', 'circumference' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for numeric data : number
 * @package Circumference 
*/

function circumference_sanitize_number( $value ) {
    $value = (int) $value; // Force the value into integer type.
    return ( 0 < $value ) ? $value : null;
}


/**
 * adds sanitization callback function for uploading : uploader
 * @package Circumference * Special thanks to: https://github.com/chrisakelley
 */
add_filter( 'circumference_sanitize_image', 'circumference_sanitize_upload' );
add_filter( 'circumference_sanitize_file', 'circumference_sanitize_upload' );
function circumference_sanitize_upload( $input ) {
        
        $output = '';
        
        $filetype = wp_check_filetype($input);
        
        if ( $filetype["ext"] ) {
        
                $output = $input;
        
        }
        
        return $output;

}