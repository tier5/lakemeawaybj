<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>	
	
	<!--[if lt IE 9]>
	<script type="text/javascript" src="<?php echo THEME_URI; ?>js/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="container site-container">
		<header class="container site-header">
			<div class="substrate top-substrate">
				<?php ThemexStyle::renderBackground(); ?>
			</div>
			<!-- background -->
		<div class="top-header">
		<div class="row">
		<!--<div class="header-left">
		<?php //if( is_user_logged_in() ) {?>
        <a href="<?php //bloginfo('url')?>/login/"><button>My Account</button></a>
		<a href="<?php //echo wp_logout_url( '/' ); ?>">Log Out</a>
		<?php //}else {?>
		
		<a href="<?php //bloginfo('url')?>/login/"><button>Owner Login</button></a>
			
		<?php //} ?>
		</div>-->
		<div class="header-left">
		<?php //if( is_user_logged_in() ) {?>
        <!--<a href="#"><button>My Account</button></a>-->
		<!--<a href="<?php echo wp_logout_url( '/' ); ?>">Log Out</a>-->
		<?php //} ?>
		</div>
		<div class="header-right">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('header-right-social-icon')) ?>
		</div>
		</div>		</div>
		
		<?php //echo tml_is_login_page();?>
		
			<div class="row supheader">
				<div class="logo">
					<a href="<?php echo SITE_URL; ?>" rel="home">
						<img src="<?php echo ThemexCore::getOption('logo', THEME_URI.'images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>" />
					</a>
				</div>
				<!-- logo -->
				<div class="social-links">
					<?php ThemexLink::renderData(); ?>
				</div>
				<!-- social links -->
				<?php if(ThemexCore::getOption('header_text')) { ?>
				<div class="header-text">
					<h5><?php echo themex_get_string('header_text', 'option', ThemexCore::getOption('header_text')); ?></h5>
				</div>
				<!-- header text -->	
				<?php } ?>
				<nav class="header-menu">
					<?php wp_nav_menu(array('theme_location' => 'main_menu','container_class' => 'menu')); ?>
				</nav>				
				<div class="clear"></div>
				<div class="select-menu select-field">
					<?php ThemexInterface::renderDropdownMenu('main_menu'); ?>
					<span>&nbsp;</span>
				</div>
				<!--/ select menu-->						
			</div>
			<!-- supheader -->
			<?php if(is_front_page() && is_page()) { ?>
			<div class="row subheader">
				<?php if(ThemexCore::getOption('header_layout')=='fullwidth') { ?>
				<div class="subheader-block">
					<?php get_template_part('module','slider'); ?>
				</div>
				<?php } else { ?>
				<div class="threecol column subheader-block">
				<?php if(is_active_sidebar('header')) { ?>
					<div class="header-widgets">
					<?php dynamic_sidebar('header'); ?>
					</div>
				<?php } else { ?>
					<?php get_template_part('module', 'search'); ?>
				<?php } ?>
				</div>
				<div class="ninecol column subheader-block last">
					<?php get_template_part('module','slider'); ?>
				</div>
				<?php } ?>
			</div>
			<!-- subheader -->
			<?php } ?>
			<div class="block-background header-background"></div>
		</header>
		<!-- header -->
		<?php if(is_front_page()||is_home()){ ?><div class="home_sec_two">
	<?php } else {?>
	<div class="content_hight">
		<?php } ?>
		<section class="container site-content">
			<div class="row">