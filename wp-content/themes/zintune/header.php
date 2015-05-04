<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <!--FAVICON-->
        <link rel='shortcut icon' type='image/x-icon' ref="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
        <!--TYPOGRAPHY-->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/fontello.min.css" rel="stylesheet">
        <!--STYLESHEETS-->
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
		<!--<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" />-->
        
         <!--JS-->
        
        
		<?php wp_head(); ?>
	</head>
	<body id="top" <?php body_class(); ?>>
        <!-- HEADER -->
        <div id="header" class="navbar-wrapper">
            <!-- Wrapper-->
            <div class="container">
              <!-- Fixed navbar -->
              <div class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle btn pull-right" data-toggle="collapse" data-target=".navbar-collapse">
                        <p class="h4">MENU</p>
                        <span class="nav-menu icon-params inverse"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url()?>">
                        <img id="logo" src="                         <?php
    $logo_header_link = esc_attr( get_option('logo_header_img') );
    if (isset($logo_header_link) && !empty($logo_header_link)) : 
        echo $logo_header_link;
else : 
    echo get_template_directory_uri(); ?>/img/logo.png
                        <?php endif;?>
                    "></a>
                  </div>
                  <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right menu-btn text-center">
                      <button type="button" class="btn pull-right">
                        <p class="h4">MENU</p>
                        <span class="nav-menu icon-params inverse"></span>
                      <!--<span class="icon-params"></span>
                      <span class="icon-params"></span>-->
                    </button>
                    </ul>
                      <?php wp_nav_menu( array('theme_location' => 'header-menu',
      'items_wrap' => '<ul class="nav navbar-nav navbar-right menu text-center text-capitalize">%3$s</ul>'));?>
                    <!--<ul class="nav navbar-nav navbar-right menu text-center">
                      <li class="active"><a href="#">Home</a></li>
                      <li><a href="#about">Prjkts</a></li>
                      <li><a href="#about">Artsns</a></li>
                      <li><a href="#about">About</a></li>
                      <li><a href="#contact">Contact</a></li>
                    </ul>-->
                    
                  </div><!--/.nav-collapse -->
                </div>
              </div>
            </div>
            
            <!--<h1 class="page-header"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>-->
            <!--<?php bloginfo( 'description' ); ?>
            <?php get_search_form(); ?>-->
        </div><!-- /Wrapper--><!-- /HEADER -->