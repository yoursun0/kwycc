<?php
/**
 * The Inset Top Sidebar
 * @package Circumference
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'insettop' ) ) {
	return;
}
?>

<aside id="cir-inset-top" role="complementary" style="background-color: #ffffff; color:<?php echo get_theme_mod( 'insettoptext', '#565656' ); ?>;">
    <div class="container">
        <div class="row">
           	<div class="col-md-12">
           		<?php dynamic_sidebar( 'insettop' ); ?>
        	</div>
        </div>
    </div>
</aside>