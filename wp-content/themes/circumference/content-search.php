<?php
/**
 * Search content
 * @package Circumference
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><span class="icon-forward"></span> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
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
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-meta"></footer><!-- .entry-meta -->
</article><!-- #post-## -->
