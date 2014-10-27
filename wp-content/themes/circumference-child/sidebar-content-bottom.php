<?php
/**
 * The Content Bottom Sidebar
 * @package Circumference
 * @since 1.0.0
 */

if (   ! is_active_sidebar( 'contentbottom1'  )
	&& ! is_active_sidebar( 'contentbottom2' )
	&& ! is_active_sidebar( 'contentbottom3'  )
	&& ! is_active_sidebar( 'contentbottom4'  )		
		
	)

		return;
	// If we get this far, we have widgets. Let do this.
	
?>

<aside id="cir-content-bottom" role="complementary">
    <div class="container">
        <div id="cir-content-bottom-group" class="row">        
            <div id="contentbottom1" <?php circumference_contentbottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'contentbottom1' ); ?>
            </div><!-- #top1 -->

            <div id="contentbottom2" <?php circumference_contentbottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'contentbottom2' ); ?>
            </div><!-- #top2 -->

            <div id="contentbottom3" <?php circumference_contentbottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'contentbottom3' ); ?>
            </div><!-- #top3 -->

            <div id="contentbottom4" <?php circumference_contentbottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'contentbottom4' ); ?>
            </div><!-- #top4 -->
        </div>
    </div>
</aside>