<?php
/**
 * Description: A page template with the right column for WooCommerce
 * @package Circumference
 * @since 1.0.0
 */

get_header(); ?>

<section id="cir-content-area" role="main">
    <div class="container">
        <div class="row">    
			<div class="col-md-8 cir-woocommerce">
				<?php woocommerce_content(); ?>		
			</div>
			
            <div class="col-md-4">
                <aside id="cir-right" role="complementary">
                    <?php get_sidebar( 'right' ); ?>
                </aside>
            </div>
		</div>	
	</div>
</section>

<?php get_footer(); ?>