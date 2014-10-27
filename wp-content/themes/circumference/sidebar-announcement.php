<?php
/**
 * The Announcement Sidebar
 * @package Circumference
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'announcement' ) ) {
	return;
}
?>

<aside id="cir-announcement" role="complementary">    
			<?php dynamic_sidebar( 'announcement' ); ?>
</aside><!-- #content-sidebar -->