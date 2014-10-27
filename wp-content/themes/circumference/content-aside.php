<?php
/**
 * Post Format Aside
 * @package Circumference
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



<div class="row">

	<?php if ( has_post_thumbnail()) : ?>
        <div class="col-md-3">  
           <div class="post-thumbnail">
               <?php the_post_thumbnail(); ?>
           </div>      
        </div>
        <div class="col-md-9">
    <?php else : ?>
        <div class="col-md-12">
    <?php endif; ?>
    
	<?php if ( is_single() ) : 
		the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header>' ); 
		endif;	?>
    <div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'circumference' ) ); ?>
	</div>
        
    <footer class="entry-meta">
        <span class="post-format">
        <span class="icon-forward post-format-icon"></span><a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'aside' ) ); ?>"><?php echo get_post_format_string( 'aside' ); ?></a>
        </span>
    	<?php circumference_posted_on(); ?>
       
    	<?php edit_post_link( __( 'Edit', 'circumference' ), '<span class="edit-link">', '</span>' ); ?>
    </footer>       
    
  </div>
</div>
			
	
</article>

<div class="article-separator"></div>