<?php
/**
 * The Header for our theme.
 *
 * @package consultancy-services-pro
 */

$sticky_header="";
if ( get_theme_mod('consultancy_services_pro_header_section_sticky',true) == "1" ) {
  $sticky_header="yes";
}else{

  $sticky_header="no";
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="#">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> 
        <?php if ( ! function_exists( 'wp_body_open' ) ) { function wp_body_open() { do_action( 'wp_body_open' ); } }?> >
  <header id="masthead" class="site-header" role="banner">
    <a class="screen-reader-text skip-link" href="#maincontent" ><?php esc_html_e( 'Skip to content', 'consultancy-services-pro' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'consultancy-services-pro' ); ?></span></a>
    <?php if ( get_theme_mod('consultancy_services_pro_products_spinner_enable',true) == "1" ) { ?>
      <div class="spinner-loading-box">
        <!-- <div class="lds-ripple"><div></div><div></div></div> -->
<div class="loader">
  <div class="dot dot1"><i></i></div>
  <div class="dot dot2"><i></i></div>
  <div class="dot dot3"><i></i></div>
  <div class="dot dot4"><i></i></div>
  <div class="dot dot5"><i></i></div>
  <div class="dot dot6"><i></i></div>
  <div class="dot dot7"><i></i></div>
  <div class="dot dot8"><i></i></div>
  <div class="dot dot9"><i></i></div>
</div>
</div>
      </div>
    <?php } ?>
    <div id="header">
      <div id="header-menu">
        <div class="header-wrap">
          <?php
            get_template_part('template-parts/header/topbar'); 
            get_template_part('template-parts/header/content-header'); 
          ?>
        </div>
        <span id="sticky-onoff"><?php echo esc_html($sticky_header); ?></span>
      </div>
    </div>
  </header>