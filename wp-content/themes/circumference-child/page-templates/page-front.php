<?php
/**
 *
   Template Name: Front Page
 *
 * Description: A page template for the Front news page
 * @package Circumference-Child
 * @since 1.0.0
 */

get_header(); ?>

<?php get_sidebar( 'top' ); ?>
<?php get_sidebar( 'inset-top' ); ?>

<section id="cir-content-area" role="main">
    <div class="container">
        <div class="row">    
            <div align="center" style="margin: auto; float: inherit" class="col-md-8">
                <?php while ( have_posts() ) : the_post(); ?>
        
                    <?php get_template_part( 'content', 'page' ); ?>
        
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
        
                <?php endwhile; // end of the loop. ?>
            </div>
            
        </div><!-- #main -->
    </div><!-- #primary -->
</section>

<?php get_sidebar( 'inset-bottom' ); ?>

<?php if (the_curlang()=='zh_hk'){ 
                get_sidebar( 'content-bottom' );
              }else{
                get_sidebar( 'bottom' );
              } ?>

<?php
get_footer();
