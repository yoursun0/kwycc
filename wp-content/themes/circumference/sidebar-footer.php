<?php
/**
 * The Footer Sidebar
 * @package Circumference
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'footer' ) ) {
	return;
}
?>


<?php dynamic_sidebar( 'footer' ); ?>
