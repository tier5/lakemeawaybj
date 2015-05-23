<?php
//Error reporting
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR);

//Define constants
define('SITE_URL', home_url());
define('AJAX_URL', admin_url('admin-ajax.php'));
define('THEME_PATH', get_template_directory().'/');
define('THEME_URI', get_template_directory_uri().'/');
define('CHILD_URI', get_stylesheet_directory_uri().'/');
define('THEMEX_PATH', THEME_PATH.'framework/');
define('THEMEX_URI', THEME_URI.'framework/');
define('THEMEX_PREFIX', 'themex_');

//Set content width
$content_width=1140;

//Load language files
load_theme_textdomain('midway', THEME_PATH.'languages');

//Include theme functions
include(THEMEX_PATH.'functions.php');

//Include configuration
include(THEMEX_PATH.'config.php');

//Include core class
include(THEMEX_PATH.'classes/themex.core.php');

//Create theme instance
$themex=new ThemexCore($config);

register_sidebar( array(
		'name'          => __( 'Footer Left', 'Amajit' ),
		'id'            => 'footer-left',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
register_sidebar( array(
		'name'          => __( 'Footer Right', 'Amajit' ),
		'id'            => 'footer-right',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

        register_sidebar( array(
		'name'          => __( 'Header Left Button', 'Amajit' ),
		'id'            => 'header-left-button',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        register_sidebar( array(
		'name'          => __( 'Header Right Social Icon', 'Amajit' ),
		'id'            => 'header-right-social-icon',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        register_sidebar( array(
		'name'          => __( 'Home Sidebar Newsletter', 'Amajit' ),
		'id'            => 'home-sidebar-newsletter',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<div class="section-title"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );
        
   