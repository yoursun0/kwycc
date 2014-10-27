<?php 

/**
 * Theme Widget positions
 * @package Circumference
 * @since 1.0.0
 */

 
/**
 * Registers our main widget area and the front page widget areas.
 */
 
function circumference_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Blog Right Sidebar', 'circumference' ),
		'id' => 'blogright',
		'description' => __( 'This is the right sidebar column that appears on the blog but not the pages.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );
	register_sidebar( array(
		'name' => __( 'Blog Left Sidebar', 'circumference' ),
		'id' => 'blogleft',
		'description' => __( 'This is the left sidebar column that appears on the blog but not the pages.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Page Right Sidebar', 'circumference' ),
		'id' => 'pageright',
		'description' => __( 'This is the right sidebar column that appears on pages, but not part of the blog', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );
	register_sidebar( array(
		'name' => __( 'Page Left Sidebar', 'circumference' ),
		'id' => 'pageleft',
		'description' => __( 'This is the left sidebar column that appears on pages, but not part of the blog', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Banner Wide', 'circumference' ),
		'id' => 'banner-wide',
		'description' => __( 'This is a full width showcase banner for images or media sliders that can display on your pages.', 'circumference' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Banner Short', 'circumference' ),
		'id' => 'banner-short',
		'description' => __( 'This is a short banner for images or media sliders that can display on your pages and is only as wide as your page content.', 'circumference' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );		
	register_sidebar( array(
		'name' => __( 'Top 1', 'circumference' ),
		'id' => 'top1',
		'description' => __( 'This is the 1st top widget position located just below the banner area.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 2', 'circumference' ),
		'id' => 'top2',
		'description' => __( 'This is the 2nd top widget position located just below the banner area.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 3', 'circumference' ),
		'id' => 'top3',
		'description' => __( 'This is the 3rd top widget position located just below the banner area.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 4', 'circumference' ),
		'id' => 'top4',
		'description' => __( 'This is the 4th top widget position located just below the banner area.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );

	register_sidebar( array(
		'name' => __( 'Inset Top', 'circumference' ),
		'id' => 'insettop',
		'description' => __( 'This is a single full width widget position just above the main content.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Inset Bottom', 'circumference' ),
		'id' => 'insetbottom',
		'description' => __( 'This is a single full width widget position just below the main content.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Content Bottom 1', 'circumference' ),
		'id' => 'contentbottom1',
		'description' => __( 'This is the first content bottom widget position located just below the main content.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Content Bottom 2', 'circumference' ),
		'id' => 'contentbottom2',
		'description' => __( 'This is the second content bottom widget position located just below the main content.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Content Bottom 3', 'circumference' ),
		'id' => 'contentbottom3',
		'description' => __( 'This is the third content bottom widget position located just below the main content.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Content Bottom 4', 'circumference' ),
		'id' => 'contentbottom4',
		'description' => __( 'This is the fourth content bottom widget position located just below the main content.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	
	register_sidebar( array(
		'name' => __( 'Bottom 1', 'circumference' ),
		'id' => 'bottom1',
		'description' => __( 'This is the first bottom widget position located in a coloured background area just above the footer.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 2', 'circumference' ),
		'id' => 'bottom2',
		'description' => __( 'This is the second bottom widget position located in a coloured background area just above the footer.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 3', 'circumference' ),
		'id' => 'bottom3',
		'description' => __( 'This is the third bottom widget position located in a coloured background area just above the footer.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 4', 'circumference' ),
		'id' => 'bottom4',
		'description' => __( 'This is the fourth bottom widget position located in a coloured background area just above the footer.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3><span class="dotbox"></span>',
		'after_title' => '</h3><div class="dotlinebox"><span class="dot"></span></div>',
	) );
	register_sidebar( array(
		'name' => __( 'Call to Action', 'circumference' ),
		'id' => 'cta',
		'description' => __( 'This is a call to action which is normally used to make a message stand out just above the main content.', 'circumference' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Announcement', 'circumference' ),
		'id' => 'announcement',
		'description' => __( 'This is a small widget position for making announcements and it located at the very top of your page.', 'circumference' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1>',
		'after_title' => '</h1>',		
	) );	
	register_sidebar( array(
		'name' => __( 'Footer', 'circumference' ),
		'id' => 'footer',
		'description' => __( 'This is a footer widget position at the very bottom of the page and outside the content container.', 'circumference' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="footer-heading">',
		'after_title' => '</h4>',
	) );	

}
add_action( 'widgets_init', 'circumference_widgets_init' );

/**
 * Count the number of widgets to enable resizable widgets
 */

// lets setup the inset top group 
function circumference_topgroup() {
	$count = 0;
	if ( is_active_sidebar( 'top1' ) )
		$count++;
	if ( is_active_sidebar( 'top2' ) )
		$count++;
	if ( is_active_sidebar( 'top3' ) )
		$count++;		
	if ( is_active_sidebar( 'top4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

// lets setup the content bottom group 
function circumference_contentbottomgroup() {
	$count = 0;
	if ( is_active_sidebar( 'contentbottom1' ) )
		$count++;
	if ( is_active_sidebar( 'contentbottom2' ) )
		$count++;
	if ( is_active_sidebar( 'contentbottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'contentbottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

// lets setup the bottom group 
function circumference_bottomgroup() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}