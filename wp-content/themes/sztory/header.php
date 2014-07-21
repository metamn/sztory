<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	  
	  <title><?php wp_title( '|', true, 'right' ); ?></title>
	  
	  <link rel="profile" href="http://gmpg.org/xfn/11">
	  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	  
	  <!-- Enable HTML5 compatibility with old browsers -->
      <!--[if lt IE 9]>
          <script src="<?php echo get_template_directory_uri(); ?>/assets/html5shiv.js"></script>
      <![endif]-->

      <!-- Enable responsiveness on old browsers -->
      <!--[if (lt IE 9) & (!IEMobile)]>
          <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <![endif]-->
	  
	  <!-- The stylesheet via Compass and SASS -->
	  <link href="<?php echo get_template_directory_uri(); ?>/assets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
      <link href="<?php echo get_template_directory_uri(); ?>/assets/print.css" media="print" rel="stylesheet" type="text/css" />
    
      <!--[if lt IE 9]>
          <link href="<?php echo get_template_directory_uri(); ?>/assets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
      <![endif]-->
	  <?php wp_head(); ?>
  </head>
  
  <body <?php body_class(); ?>>
  
