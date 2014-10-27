<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Circumference 
*/

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function circumference_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'cir-content',
		'footer'    => 'cir-wrapper',
	) );
}
add_action( 'after_setup_theme', 'circumference_jetpack_setup' );
