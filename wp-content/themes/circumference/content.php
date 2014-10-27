<?php
/**
 * Main content 
 * @package Circumference
 * @since 1.0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
		
<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<span class="featured-post">
			<?php _e( 'Featured', 'circumference' ); ?>
		</span>
	<?php endif; ?>		
		<?php if( get_theme_mod( 'hide_edit' ) == '') { ?>
		<?php edit_post_link( __( 'Edit', 'circumference' ), '<span class="edit-link">', '</span>' ); ?>
        <?php } ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else _e('Untitled', 'circumference'); ?> </a>
        </h1>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php circumference_posted_on(); ?>            
            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
            <span class="comments-link">
				<?php 
                    echo '<span class="entry-comments">';
                    _e( 'Comments: ', 'circumference' );
                    comments_popup_link( __( 'Leave a comment', 'circumference' ), __( '1 Comment', 'circumference' ), __( '% Comments', 'circumference' ) ); 
                endif; ?> 
                </span>
            </span>       
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

<div class="entry-content clearfix">
	<?php if ( has_post_thumbnail()) :
        $featuredimage = get_theme_mod( 'featured_image', 'big' );
            switch ($featuredimage) {
                case "big" :
                echo '<div class="post-thumbnail">';
                    the_post_thumbnail();
                echo '</div>';
            break;
                case "small" : 
                echo '<div class="post-thumbnail alignleft">';
                    the_post_thumbnail();
                echo '</div>';
            break;
        } 		
    endif; ?>
        	
        

 		<?php 
			$excon = get_theme_mod( 'excerpt_content', 'content' );
			$excerpt = get_theme_mod( 'excerpt_limit', '50' );
				 switch ($excon) {
					case "content" :
						the_content(__('Continue Reading...', 'circumference'));
					break;
					case "excerpt" : 
						echo '<p>' . circumference_excerpt($excerpt) . '</p>' ;
						echo '<p class="more-link"><a href="' . get_permalink() . '">' . __('Continue Reading...', 'circumference') . '</a>' ;
					break;
			}
		?>   
          
        
  
        
		
	</div><!-- .entry-content -->

	<footer class="summary-entry-meta">
		<?php circumference_multi_pages(); ?>
    </footer><!-- .entry-meta -->
    
</article><!-- #post-## -->

<div class="article-separator"></div>
