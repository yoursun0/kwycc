<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Circumference
 * @since 1.0.3
 */
?>



</div><!-- #cir-content-wrapper-->

<div id="kwycc-tips">
	<div id="kwycc-tips-left">
		<img class="img-responsive" src="<?php echo get_option( 'my_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>"/>
	</div>
	<div id="kwycc-tips-right">
		<?php get_sidebar( 'bottom' ); ?>
	</div>
	<div id="kwycc-tips-fb">
		<a href="http://www.facebook.com/addfriend.php?id=kwycc" target="_blank">
			<div id="kwycc-tips-fblike"  ></div>
		</a>
	</div>
</div>



<footer id="cir-footer-wrapper">
    <?php get_sidebar( 'footer' ); ?>
    
    <div id="cir-footer-menu">
    	<?php wp_nav_menu( array( 'theme_location' => 'footer', 'fallback_cb' => false, 'container' => false, 'menu_id' => 'footer-menu' ) ); ?>
    </div>
                
    <div class="copyright">
    <?php esc_attr_e('Copyright &copy;', 'KWYCC'); ?> <?php _e(date('Y')); ?> <?php esc_attr_e('KWYCC', 'KWYCC'); ?>. <?php esc_attr_e('All rights reserved.', 'circumference'); ?>
    </div>
</footer>

</div><!-- #cir-wrapper -->

	<?php wp_footer(); ?>
</body>
</html>