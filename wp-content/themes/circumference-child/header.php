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

  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_HK/sdk.js#xfbml=1&appId=184368601642819&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
          <a href="./?lang=<?php echo the_curlang() ?>">
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

      <div class="language">
          <a class="<?php echo the_curlang() ?>" href="./?lang=<?php if (the_curlang()=='zh_hk'): ?>en_us<?php else: ?>zh_hk<?php endif ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      </div>             
        <!-- </div> -->
        <?php endif; ?>
    </div>
    <div id="toggle-menu">
      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false,'menu_class' => 'nav-menu' ) ); ?>
  
      </div>
</header>

<?php if ( has_nav_menu( 'secondary' ) ) : ?>

<?php endif; ?>

<?php get_sidebar( 'cta' ); ?>

<div id="cir-content-wrapper" style="color:<?php echo get_theme_mod( 'content_text', '#656565' ); ?>;">