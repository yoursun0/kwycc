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

<?php get_sidebar( 'bottom' ); ?>

<footer id="cir-footer-wrapper" style="background-color: <?php echo get_theme_mod( 'footer_bg', '#000000' ); ?>; color: <?php echo get_theme_mod( 'footertext', '#818181' ); ?>;">
    <?php get_sidebar( 'footer' ); ?>
    
    <div id="cir-footer-menu">
    	<?php wp_nav_menu( array( 'theme_location' => 'footer', 'fallback_cb' => false, 'container' => false, 'menu_id' => 'footer-menu' ) ); ?>
    </div>
                
    <div class="copyright">
    <?php esc_attr_e('Copyright &copy;', 'circumference'); ?> <?php _e(date('Y')); ?> <?php echo get_theme_mod( 'copyright', 'Your Name' ); ?>. <?php esc_attr_e('All rights reserved.', 'circumference'); ?>
    </div>
</footer>

</div><!-- #cir-wrapper -->

	<?php wp_footer(); ?>
</body>
</html>