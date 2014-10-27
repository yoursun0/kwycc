<?php
/**
 * The Inset Bottom Sidebar
 * @package Circumference
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'insetbottom' ) ) {
	return;
}
?>

<aside id="cir-inset-bottom" role="complementary" style="background-color: #ffffff; color:<?php echo get_theme_mod( 'insetbottomtext', '#565656' ); ?>;">
    <div class="container">
        <div class="row">
           	<div class="col-md-12">
           		<?php dynamic_sidebar( 'insetbottom' ); ?>
        	</div>
        </div>
    </div>
</aside>