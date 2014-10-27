<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Circumference
 * @since 1.0.0
 */

get_header(); ?>

<?php get_sidebar( 'top' ); ?>
<?php get_sidebar( 'inset-top' ); ?>
    
<section id="cir-content-area" role="main">

<?php $blogstyle = get_theme_mod( 'blog_style', 'blogright' );

	switch ($blogstyle) {
		// Right Column
		case "blogright" :
			echo '<div class="container"><div class="row"><div class="col-md-8"><div id="cir-content" role="main">';
			// get all the posts
				if ( have_posts() ) : while ( have_posts() ) : the_post();				
					// get the article layout
					get_template_part( 'content', get_post_format() );					
				endwhile;
					// get the pagination
					circumference_paging_nav();
				else :
					// if no posts
					get_template_part( 'content', 'none' );					
				endif; 
			echo '</div></div><div class="col-md-4"><aside id="cir-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';
		break;		
		
		
		// Left Column
		case "blogleft" :
			echo '<div class="container"><div class="row"><div class="col-md-4"><aside id="cir-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-8"><div id="cir-content" role="main">';
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;
					circumference_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div></div></div></div>';
		break;		
		
		
		// Left and Right Column
		case "blogleftright" :
			echo '<div class="container"><div class="row"><div class="col-md-3"><aside id="cir-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-6"><div id="cir-content" role="main">';
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;
					circumference_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div></div><div class="col-md-3"><aside id="cir-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';	
		break;			
	
		
		// Wide Column
		case "blogwide" :
												
			echo '<div class="container"><div class="row"><div class="col-md-12"><div id="cir-content" role="main">';
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;
					circumference_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			
			echo '</div></div></div></div>';	
		break;	
			
		
	}
?>

</section>

<?php get_sidebar( 'inset-bottom' ); ?>
<?php get_sidebar( 'content-bottom' ); ?>


<?php
get_footer();