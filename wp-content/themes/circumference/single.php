<?php
/**
 * The Template for displaying all single posts.
 * @package Circumference
 * @since 1.0.0
 */

get_header(); ?>

<section id="cir-content-area" role="main">

<?php $singlelayout = get_theme_mod( 'single_layout', 'singleright' );

	switch ($singlelayout) {
		// Right Column
		case "singleright" :
			echo '<div class="container"><div class="row"><div class="col-md-8"><div id="cir-content" role="main">';
			// get the full post
				while ( have_posts() ) : the_post(); 
					get_template_part( 'content', 'single' ); 
					if( get_theme_mod( 'hide_postnav' ) == '') { 
						circumference_post_nav();
					}
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			echo '</div></div><div class="col-md-4"><aside id="cir-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';
		break;
		
		
		// Left Column
		case "singleleft" :
			echo '<div class="container"><div class="row"><div class="col-md-4"><aside id="cir-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-8"><div id="cir-content" role="main">';
			// get the full post
				while ( have_posts() ) : the_post(); 
					get_template_part( 'content', 'single' );
					if( get_theme_mod( 'hide_postnav' ) == '') { 
						circumference_post_nav();
					}							
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			echo '</div></div></div></div>';
		break;		
		
		
		// Left and Right Column
		case "singleleftright" :
			echo '<div class="container"><div class="row"><div class="col-md-4"><aside id="cir-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-4"><div id="cir-content" role="main">';
			// get the full post
				while ( have_posts() ) : the_post(); 
					get_template_part( 'content', 'single' ); 
					if( get_theme_mod( 'hide_postnav' ) == '') { 
						circumference_post_nav();
					}							
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			echo '</div></div><div class="col-md-4"><aside id="cir-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';	
		break;	
		
		// Wide Column
		case "singlewide" :									
			echo '<div class="container"><div class="row"><div class="col-md-12"><div id="cir-content" role="main">';
			// get the full post
				while ( have_posts() ) : the_post(); 
					get_template_part( 'content', 'single' ); 
					if( get_theme_mod( 'hide_postnav' ) == '') { 
						circumference_post_nav();
					}							
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			echo '</div></div></div></div>';
		break;			
		
	}
?>

</section>

<?php get_sidebar( 'content-bottom' ); ?>


<?php
get_footer();