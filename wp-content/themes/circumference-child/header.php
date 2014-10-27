<?php
/**
 * The Header for our theme
 *
 * @package Circumference
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> style="font-size: <?php echo get_theme_mod( 'body_fontsize', '100' ); ?>%;">


	<?php $pagewidth = get_theme_mod( 'page_width', 'default' );
	 switch ($pagewidth) {
		case "default" : 
			echo '<div id="cir-wrapper" style="border-color:';
			echo get_theme_mod( 'topborder', '#000000' ) . ';">';
		 break;
		case "boxedmedium" : 
			echo '<div id="cir-wrapper-boxed-medium" style="border-color:';
			echo get_theme_mod( 'topborder', '#000000' ) . ';">';
		break;	
		case "boxedsmall" : 
			echo '<div id="cir-wrapper-boxed-small" style="border-color:';
			echo get_theme_mod( 'topborder', '#000000' ) . ';">';
		break;			
		} 
	?>		
 

<div id="cir-ann-social-wrapper" style="background-color: <?php echo get_theme_mod( 'announce_bg', '#25B7C3' ); ?>; color: <?php echo get_theme_mod( 'announce_text', '#ffffff' ); ?>; border-color: <?php echo get_theme_mod( 'announce_border', '#f3f3f3' ); ?>;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php get_sidebar( 'announcement' ); ?>
        <div id="cir-social-wrapper"><?php get_template_part( 'partials/social-bar' ); ?></div>
      </div>
    </div>
  </div>
    
</div>


<header id="cir-site-header" role="banner">
    <div class="row">
     <!--
		<?php 
            if ( has_nav_menu( 'primary' ) ) :
                echo '<div class="col-md-5">';
            elseif (has_nav_menu( 'secondary' ) ) :
				echo '<div class="col-md-12">';
			else :
                echo '<div class="col-md-5">';
            endif;
        ?> 
            
        <div id="cir-logo-group-wrapper">
          <?php get_template_part( 'partials/logo-group' ); ?>
        </div>
      </div>
      
      <?php if ( has_nav_menu( 'primary' ) ) : ?>
      <div class="col-md-7"> -->
          <a href=".">
              <div id="top-logo" class="logo" >
              </div>
          </a>
      		<div id="navbar" class="navbar" style="margin: <?php echo get_theme_mod( 'nav_margin', '14px 0 0 0' ); ?>;">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
                    <div class="menu-toggle-wrapper hidden-md hidden-lg">
                      <h3 class="menu-toggle"><?php _e( 'Menu', 'circumference' ); ?></h3>
                    </div>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'circumference' ); ?>">
					<?php _e( 'Skip to content', 'circumference' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false,'menu_class' => 'nav-menu' ) ); ?>
				</nav><!-- #site-navigation -->       
        <a href="javascript:void"><div class="toggle-menu-btn"></div></a>         
			</div><!-- #navbar -->       

      <div id="toggle-menu">
          <ul>
              <a href="index.html"><li>Home</li></a>
              <a href="about.html"><li>About Us</li></a>
              <a href="activity.html"><li>BSPP Activities</li></a>
              <a href="#"><li>Sharing</li></a>
              <a href="partner.html"><li>BSPP Partners</li></a>
              <a href="#"><li>Joining BSPP</li></a>
              <a href="#"><li>Contact Us</li></a>
              <li class="toggle-menu-search"><input type="text" placeholder="Search in BSPP..."><input type="button"></li>
          </ul>    
    </div>

      <div class="language">
          <a href="http://localhost/wordpress/">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      </div>             
        <!-- </div> -->
        <?php endif; ?>
    </div>
  
</header>

<?php if ( has_nav_menu( 'secondary' ) ) : ?>
<!-- <div id="secondary-nav" style="background-color: <?php echo get_theme_mod( 'secondary_navbg', '#c6b274' ); ?>;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="navbar" class="navbar">
          <nav id="site-navigation2" class="navigation main-navigation" role="navigation">
            <div class="menu-toggle-wrapper hidden-md hidden-lg">
              <h3 class="menu-toggle2"><?php _e( 'Menu', 'circumference' ); ?></h3>
              </div>
            <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'circumference' ); ?>">
            <?php _e( 'Skip to content', 'circumference' ); ?></a>
            <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false,'menu_class' => 'nav-menu' ) ); ?>
            </nav>              
          </div>
      </div>
      </div>
  </div>
</div> -->
<?php endif; ?>
	
<!-- aside id="cir-banner" style="background-color: <?php echo get_theme_mod( 'banner_bg_colour', '#c6b274' ); ?>; <?php if ( get_header_image() ) : ?>background-image: url(<?php header_image(); ?>);<?php endif; ?><?php if( get_post_meta($post->ID, 'header_background', true) ) { ?> background-image: url(<?php echo esc_url (the_field('header_background')); ?>); <?php } ?> color: <?php echo get_theme_mod( 'banner_text_colour', '#ffffff' ); ?>;">
		
			<?php get_sidebar( 'banner' ); ?>
		
</aside -->
	
    
<!-- div id="cir-breadcrumbs-wrapper" style="background-color: <?php echo get_theme_mod( 'breadcrumbs_bg', '#e2e5e7' ); ?>; color:<?php echo get_theme_mod( 'breadcrumbs_text', '#9ca4a9' ); ?>;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <?php 
	  	if(! is_front_page() ) : 
	  		if(function_exists('bcn_display')) {
			bcn_display();
			}
		 endif; 
		?>
    </div>
    </div>
  </div>
</div -->

<?php get_sidebar( 'cta' ); ?>

<div id="cir-content-wrapper" style="color:<?php echo get_theme_mod( 'content_text', '#656565' ); ?>;">