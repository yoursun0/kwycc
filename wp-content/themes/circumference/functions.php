<?php
/**
 * Circumference functions and definitions.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * @package Circumference
 * @since 1.0.0
 */

/**
 * Sets up the content width value based on the theme's design.
 * @see circumference_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 793;
	
if ( ! function_exists( 'circumference_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 */
function circumference_setup() {

	/*
	 * Makes Circumference available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Circumference, use a find and
	 * replace to change 'circumference' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'circumference', get_template_directory() . '/languages' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();

	/**
	 * This feature enables post and comment RSS feed links to head.
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This feature enables post-thumbnail support for a theme.
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This feature enables woocommerce support for a theme.
	 * @see http://www.woothemes.com/2013/02/last-call-for-testing-woocommerce-2-0-coming-march-4th/
	 */
	add_theme_support( 'woocommerce' );

	/**
	 * This feature enables custom-menus support for a theme.
	 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	register_nav_menus( array(
		'primary'     => __( 'Primary menu', 'circumference' ),
		'secondary'   => __( 'Secondary menu', 'circumference' ),
		'footer'      => __( 'Footer menu', 'circumference' ),
	) );

	/*
	 * Switches default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio',
	) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'circumference_custom_background_args', array(
		'default-color' => '444444',
		'default-image' => get_template_directory_uri() . '/images/page-bg.png',
	) ) );		
	}
endif; // circumference_setup
add_action( 'after_setup_theme', 'circumference_setup' );

/**
 * Adjusts content_width value for full-width and attachment templates.
 *
 * @return void
 */
	function circumference_content_width() {
		if ( is_page_template( 'page-full-width.php' ) || is_attachment() )
			$GLOBALS['content_width'] = 1140;
	}
	add_action( 'template_redirect', 'circumference_content_width' );


/**
 * Adds customizable styles to your <head>
 */
	function circumference_theme_customize_css()
	{
		?>
		<style type="text/css">
			#cir-announcement h1 {color: <?php echo get_theme_mod( 'announce_text', '#ffffff' ); ?>;}
			h1,h2,h3,h4,h5,h6,h1 a, h2 a {color: <?php echo get_theme_mod( 'headings', '#40494e' ); ?>;}
			#cir-bottom-wrapper h3 {color: <?php echo get_theme_mod( 'bottom_headings', '#ffffff' ); ?>;}
			#cir-footer-wrapper h4 {color: <?php echo get_theme_mod( 'footertext', '#818181' ); ?>;}
			#cir-banner, #cir-banner h1, #cir-banner h2 {color: <?php echo get_theme_mod( 'page_banner_text', '#ffffff' ); ?>;}
			#cir-content-wrapper {color: <?php echo get_theme_mod( 'content_text', '#ffffff' ); ?>;}
			#cir-cta h1 {color: <?php echo get_theme_mod( 'cta_heading', '#ffffff' ); ?>;}
			a {color: <?php echo get_theme_mod( 'link_colour', '#2bafbb' ); ?>;}
			a:hover,a:focus,.menu.widget ul li:hover::before,.menu.widget ul li a:hover {color: <?php echo get_theme_mod( 'link_hover', '#c6b274' ); ?>;}
			.menu.widget a {color:<?php echo get_theme_mod( 'content_text', '#656565' ); ?>;}
			#cir-bottom-wrapper .menu.widget a, #cir-bottom-wrapper .menu.widget a {color:<?php echo get_theme_mod( 'bottomtext', '#abb3b4' ); ?>;}
			
			#cir-bottom-wrapper a {color:<?php echo get_theme_mod( 'bottomlinks', '#efefef' ); ?>;}
			#cir-bottom-wrapper a:hover {color:<?php echo get_theme_mod( 'bottomlinkshover', '#abb3b4' ); ?>;}
			
			#cir-content-wrapper,#cir-bottom-wrapper {font-size: <?php echo get_theme_mod( 'content_fontsize', '0.813em' ); ?>;}
			#cir-footer-wrapper a {color: <?php echo get_theme_mod( 'footer_links', '#c6b274' ); ?>;}			
			#cir-footer-wrapper a:hover {color: <?php echo get_theme_mod( 'footer_linkshover', '#818181' ); ?>;}
			.nav-menu li a, .nav-menu li.home a {color:<?php echo get_theme_mod( 'menu_link', '#565656' ); ?>;}
			.nav-menu li a:hover {color:<?php echo get_theme_mod( 'menu_hover_active', '#c6b274' ); ?>;}
			ul.nav-menu ul a,.nav-menu ul ul a {color: <?php echo get_theme_mod( 'submenu_link', '#919191' ); ?>;}
			ul.nav-menu ul a:hover,	.nav-menu ul ul a:hover,.nav-menu .current_page_item > a,.nav-menu .current_page_ancestor > a,.nav-menu .current-menu-item > a,.nav-menu .current-menu-ancestor > a {color:<?php echo get_theme_mod( 'menu_hover_active', '#c6b274' ); ?>;}
			ul.nav-menu li:hover > ul,.nav-menu ul li:hover > ul {background-color: <?php echo get_theme_mod( 'header_bg', '#ffffff' ); ?>;border-color:<?php echo get_theme_mod( 'submenu_border', '#c6b274' ); ?>;}
			ul.sub-menu .current_page_item > a,ul.sub-menu .current_page_ancestor > a, ul.sub-menu .current-menu-item > a, ul.sub-menu .current-menu-ancestor > a {background-color: <?php echo get_theme_mod( 'submenu_bg_hover', '#f3f3f3' ); ?>;}
			ul.nav-menu li:hover > ul li:hover {background-color: <?php echo get_theme_mod( 'submenu_bg_hover', '#f3f3f3' ); ?>;}
			
			#secondary-nav .nav-menu li a, #secondary-nav .nav-menu li.home a {color:<?php echo get_theme_mod( 'secmenu_link', '#ffffff' ); ?>;}
			#secondary-nav .nav-menu li a:hover {color:<?php echo get_theme_mod( 'secmenu_hover_active', '#6c603c' ); ?>;}
			#secondary-nav ul.nav-menu ul a,#secondary-nav .nav-menu ul ul a {color: <?php echo get_theme_mod( 'secsubmenu_link', '#ffffff' ); ?>;}
			#secondary-nav ul.nav-menu ul a:hover,#secondary-nav .nav-menu ul ul a:hover,#secondary-nav .nav-menu .current_page_item > a,#secondary-nav .nav-menu .current_page_ancestor > a,#secondary-nav .nav-menu .current-menu-item > a,#secondary-nav .nav-menu .current-menu-ancestor > a {color:<?php echo get_theme_mod( 'secmenu_hover_active', '#6c603c' ); ?>;}			
			#secondary-nav ul.sub-menu .current_page_item > a,#secondary-nav ul.sub-menu .current_page_ancestor > a,#secondary-nav ul.sub-menu .current-menu-item > a,#secondary-nav ul.sub-menu .current-menu-ancestor > a {background-color: <?php echo get_theme_mod( 'secsubmenu_bg_hover', '#d7c58c' ); ?>;}						
			#secondary-nav ul.nav-menu li:hover > ul,#secondary-nav .nav-menu ul li:hover > ul {background-color: <?php echo get_theme_mod( 'secondary_navbg', '#c6b274' ); ?>;border-color:<?php echo get_theme_mod( 'secsubmenu_border', '#707070' ); ?>;}			
			#secondary-nav ul.nav-menu li:hover > ul li:hover {background-color: <?php echo get_theme_mod( 'secsubmenu_bg_hover', '#d7c58c' ); ?>;}			
			
			#social-icons a {color: <?php echo get_theme_mod( 'social_colour', '#a4abb3' ); ?>;}
			#social-icons a:hover {color: <?php echo get_theme_mod( 'social_hover', '#000000' ); ?>;}
			#socialbar .genericon, #socialbar .icomoon {background-color: <?php echo get_theme_mod( 'social_bg', '#e2e5e7' ); ?>;}
			#cir-breadcrumbs-wrapper a {color:<?php echo get_theme_mod( 'breadcrumbs_link', '#d79832' ); ?>;}
			#cir-breadcrumbs-wrapper a:hover {color:<?php echo get_theme_mod( 'breadcrumbs_link_hov', '#2bafbb' ); ?>;}
			#cir-content-area .list-lines.widget ul li {border-color:<?php echo get_theme_mod( 'widgetlistborder', '#e2e5e7' ); ?>;}
			#cir-bottom-wrapper ul li,
			#cir-bottom-wrapper [id*="recent-posts-plus-"] li {border-color:<?php echo get_theme_mod( 'bottomlistborder', '#5c646b' ); ?>;}
		</style>
		<?php
	}
	add_action( 'wp_head', 'circumference_theme_customize_css');

/**
 * Enqueues scripts and styles for front end.
 *
 * @return void
 */
	function circumference_scripts() {
		
		// Loads the Bootstrap stylesheet
		wp_enqueue_style( 'circumference-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array( ), '3.0.0', 'all' );
				
		// Loads our main stylesheet.
		wp_enqueue_style( 'circumference-style', get_stylesheet_uri() );
		
		// Loads our scripts.	
		wp_enqueue_script('circumference-bootstrap', get_template_directory_uri() . '/js/circumference-bootstrap.min.js', array('jquery'), '3.0.0', true);
		wp_enqueue_script( 'circumference-navigation', get_template_directory_uri() . '/js/circumference-extras.js', array(), '1.0', true );
		
	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
				
	}
	add_action( 'wp_enqueue_scripts', 'circumference_scripts' );



/**
 * Adds IE specific scripts
 * Respond.js has to be loaded after Theme styles
 */
function circumference_print_ie_scripts() {
	?>
	<!--[if lt 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/circumference-respond.min.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/circumference-html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php
}
add_action( 'wp_head', 'circumference_print_ie_scripts', 11 );


/**
 * Move the More Link outside the default content paragraph.
 * Easier to customize
 */
function circumference_new_more_link($link) {
		$link = '<p class="more-link">'.$link.'</p>';
		return $link;
	}
add_filter('the_content_more_link', 'circumference_new_more_link');	

/**
 * Special excerpt length per instance ie showcase column excerpts
 * Thanks to http://bavotasan.com/2009/limiting-the-number-of-words-in-your-excerpt-or-content-in-wordpress/
 */ 
function circumference_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}


/**
 * Remove the annoying default 10px WP adds to caption images.
 * Many thanks to http://diywpblog.com/ for this solution.
 *
 */

add_filter('img_caption_shortcode', 'circumference_img_caption_filter',10,3);

function circumference_img_caption_filter($val, $attr, $content = null)
{
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'aligncenter',
		'width'	=> '',
		'caption' => ''
	), $attr));
	
	if ( 1 > (int) $width || empty($caption) )
		return $val;

	$capid = '';
	if ( $id ) {
		$id = esc_attr($id);
		$capid = 'id="figcaption_'. $id . '" ';
		$id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
	}

	return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: '
	. (int) $width . 'px">' . do_shortcode( $content ) . '<figcaption ' . $capid 
	. 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}


/**
 * Remove the annoying default inline style in the page content for the WP Gallery.
 * Special thanks to: http://wpengineer.com/2352/remove-inline-style-of-wordpress-gallery-shortcode/
 */
add_filter( 'use_default_gallery_style', '__return_false' );


/**
 * Extends the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a featured image.
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
	function circumference_post_classes( $classes ) {
		if ( ! post_password_required() && has_post_thumbnail() )
			$classes[] = 'has-featured-image';
	
		return $classes;
	}
	add_filter( 'post_class', 'circumference_post_classes' );



/**
 * Implement the Custom Header feature.
 */
	require get_template_directory() . '/inc/custom-header.php';

/**
 * Add some extras to the theme.
 */
	require get_template_directory() . '/inc/extras.php';
	
/**
 * Custom template tags for this theme.
 */
	require get_template_directory() . '/inc/template-tags.php';

/**
 * Theme options.
 */
	require get_template_directory() . '/inc/customizer.php';

/**
 * Load theme widgets.
 */
	require get_template_directory() . '/inc/widgets.php';

/**
 * Load Jetpack compatibility file.
 */
	require get_template_directory() . '/inc/jetpack.php';
