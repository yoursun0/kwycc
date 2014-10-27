<?php 
/*
 * enqueue for the child theme for ie8 users
 * Thanks to http://www.boxoft.net/ for this workaround ie8
 */
 function circumference_child_enqueue_scripts_styles() {
  wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
  wp_enqueue_script( 'kwycc-common', get_stylesheet_directory_uri() . '/js/kwycc.common.js', array(), '1.0.0', true );
} 
add_action( 'wp_enqueue_scripts', 'circumference_child_enqueue_scripts_styles' );

function comment_reform ($arg) {
$arg['title_reply'] = __('留言:');
$arg['reply_text'] = __('留言');
$arg['login_text'] = __('登入及留言');
$arg['comment_notes_after'] = __('');
return $arg;
}
add_filter('comment_form_defaults','comment_reform');

?>