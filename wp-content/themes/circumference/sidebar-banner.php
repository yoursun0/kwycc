<?php
/**
 * The Banner Sidebar
 * @package Circumference
 * @since 1.0.0
 */
?>



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