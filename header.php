<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aliya_Y._Robinson
 */

?>

<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html dir="ltr" lang="en-US"class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" lang="en-US" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" lang="en-US" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="en-US" class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]>
<!--><html dir="ltr" lang="en-US" class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php bloginfo( 'name' ); ?> | Front End Interactive Developer</title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->
  <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" />
  <?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?>>
  <a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to content', 'ayr' ); ?></a>
  <header class="site-header" role="banner">
    <div class="wrapper">
      <h1 class="logo-wrapper">
        <span class="hide-copy">
          <?php bloginfo( 'name' ); ?>
        </span>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo1.png" alt="logo">
        </a>
      </h1>
      <button class="menu-btn hide-copy">
        menu
        <span class="menu-nav-btn__bar"></span>
        <span class="menu-nav-btn__bar"></span>
        <span class="menu-nav-btn__bar"></span>
      </button>
      <?php $walker = new ayr_nav_walker; ?>
      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'nav', 'container_class' => 'site-nav', 'walker' => $walker ) ); ?>
    </div>
  </header>
  <main class="site-content" role="main">
    <div class="content-holder"></div>
    <div class="content-wrapper" id="main-content">