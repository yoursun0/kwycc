<?php
/**
 * The Banner Sidebar
 * @package Circumference
 * @since 1.0.0
 */
?>


<aside id="cir-banner" style="background-color: <?php echo get_theme_mod( 'banner_bg_colour', '#c6b274' ); ?>; <?php if ( get_header_image() ) : ?>background-image: url(<?php header_image(); ?>);<?php endif; ?><?php if( get_post_meta($post->ID, 'header_background', true) ) { ?> background-image: url(<?php echo esc_url (the_field('header_background')); ?>); <?php } ?> color: <?php echo get_theme_mod( 'banner_text_colour', '#ffffff' ); ?>;">
		

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php dynamic_sidebar( 'banner-short' ); ?>
        
        <?php if( get_post_meta($post->ID, 'header_background', true) ) { 
				the_field('header_caption');
			} 
		?>
        
      </div>
    </div>
</div>

<?php dynamic_sidebar( 'banner-wide' ); ?>

</aside>