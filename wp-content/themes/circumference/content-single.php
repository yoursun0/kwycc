<?php
/**
 * Full post content
 * @package Circumference
 * @since 1.0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
		<?php if( get_theme_mod( 'hide_edit' ) == '') { ?>
		<?php edit_post_link( __( 'Edit', 'circumference' ), '<span class="edit-link">', '</span>' ); ?>
        <?php } ?>
		<?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php circumference_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
<div class="entry-content clearfix">

<?php if( get_theme_mod( 'hide_featured' ) == '') { ?>
	<?php // do not show featured image if post is paged
    $paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : false;
       if ( $paged === false ): 
       
       if ( has_post_thumbnail()) :
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
        endif; 
        
    endif; ?>
<?php } ?>
	
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->

	<footer class="entry-meta">	
    <?php if( get_theme_mod( 'hide_postinfo' ) == '') { ?>	
			<?php the_tags(__('<span class="meta-tagged">Tagged with:<span class="entry-meta-value">', 'circumference') . ' ', ', ', '</span></span><br />'); ?> 
			<?php printf(__('<span class="meta-posted">Posted in:<span class="entry-meta-value"> %s', 'circumference'), get_the_category_list(', ')); ?></span></span> <br />
            <?php printf( __( '<span class="meta-author">Articles by %s', 'circumference' ), '<span class="vcard entry-meta-value"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span></span>' ); ?><br />
            <span class="meta-date"><?php _e('Published: ', 'circumference');?> <span class="entry-meta-value"><?php the_time(get_option('date_format')); ?></span></span>    <?php } ?>
			<?php circumference_multi_pages(); ?>
    </footer><!-- .entry-meta -->
</article><!-- #post-## -->
