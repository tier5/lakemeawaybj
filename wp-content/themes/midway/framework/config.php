<?php
//Theme Configuration
$config = array (
	
	//Theme Modules
	'modules' => array(
		'ThemexInterface',
		'ThemexStyle',
		'ThemexForm',
		'ThemexSidebar',
		'ThemexShortcode',
		'ThemexWoo',
		'ThemexTour',
		'ThemexLink',
	),
	
	//Theme Components
	'components' => array(
	
		//Supports
		'supports' => array (
			'automatic-feed-links',
			'post-thumbnails',
			'woocommerce',
		),
		
		//Rewrite Rules
		'rewrite_rules' => array (
		
		),
	
		//User Roles
		'user_roles' => array (

		),
		
		//Custom Menus
		'custom_menus' => array (
			array(
				'slug' => 'main_menu',
				'name' => __('Main Menu', 'midway'),
			),
			
			array(
				'slug' => 'footer_menu',
				'name' => __('Footer Menu', 'midway'),
			),
		),
		
		//Image Sizes
		'image_sizes' => array (
		
			array(
				'name' => 'preview',
				'width' => 440,
				'height' => 330,
				'crop' => true,
			),
		
			array(
				'name' => 'normal',
				'width' => 440,
				'height' => 9999,
				'crop' => false,
			),
			
			array(
				'name' => 'extended',
				'width' => 600,
				'height' => 9999,
				'crop' => false,
			),

			array(
				'name' => 'wide',
				'width' => 768,
				'height' => 9999,
				'crop' => false,
			),
		),
		
		//Editor styles
		'editor_styles' => array(
			'styled-list list-1' => __('List Style', 'midway').' 1',
			'styled-list list-2' => __('List Style', 'midway').' 2',
			'styled-list list-3' => __('List Style', 'midway').' 3',
			'styled-list list-4' => __('List Style', 'midway').' 4',
			'styled-list list-5' => __('List Style', 'midway').' 5',
		),
		
		//Admin Styles
		'admin_styles' => array(
			
			//colorpicker
			array(
				'name' => 'wp-color-picker',
			),
			
			//thickbox
			array(	
				'name' => 'thickbox',
			),
			
			//datepicker
			array(	
				'name' => 'jquery-ui-datepicker',
				'uri' => THEMEX_URI.'assets/css/datepicker.css'
			),
			
			//interface
			array(	
				'name' => 'themex-style',
				'uri' => THEMEX_URI.'assets/css/style.css'
			),			
		),
		
		//Admin Scripts
		'admin_scripts' => array(
			
			//colorpicker
			array(
				'name' => 'wp-color-picker',
			),
			
			//thickbox
			array(	
				'name' => 'thickbox',
			),
			
			//uploader
			array(	
				'name' => 'media-upload',
			),
			
			//slider
			array(	
				'name' => 'jquery-ui-slider',
			),
			
			//datepicker
			array(	
				'name' => 'jquery-ui-datepicker',
			),
			
			//popup
			array(
				'name' => 'themex-popup',
				'uri' => THEMEX_URI.'assets/js/themex.popup.js',
			),
			
			//interface
			array(
				'name' => 'themex-interface',
				'uri' => THEMEX_URI.'assets/js/themex.interface.js',
				'labels' => array(
					'dayNamesMin' => array(
						__('Sunday', 'midway'), 
						__('Monday', 'midway'), 
						__('Tuesday', 'midway'), 
						__('Wednesday', 'midway'), 
						__('Thursday', 'midway'), 
						__('Friday', 'midway'), 
						__('Saturday', 'midway'),
					),					
					'dayNamesMin' => array(
						__('Su', 'midway'), 
						__('Mo', 'midway'), 
						__('Tu', 'midway'), 
						__('We', 'midway'), 
						__('Th', 'midway'), 
						__('Fr', 'midway'), 
						__('Sa', 'midway'),
					),
					'monthNames' => array(
						__('January', 'midway'), 
						__('February', 'midway'), 
						__('March', 'midway'), 
						__('April', 'midway'), 
						__('May', 'midway'), 
						__('June', 'midway'), 
						__('July', 'midway'), 
						__('August', 'midway'), 
						__('September', 'midway'), 
						__('October', 'midway'), 
						__('November', 'midway'), 
						__('December', 'midway'),
					),
					'firstDay' => get_option('start_of_week'),
					'prevText' => __('Prev', 'midway'),
					'nextText' => __('Next', 'midway'),
				),
			),			
		),
		
		//User Styles
		'user_styles' => array(
		
			//colorbox
			array(	
				'name' => 'colorbox',
				'uri' => THEME_URI.'js/colorbox/colorbox.css',
			),
			
			//datepicker
			array(	
				'name' => 'jquery-ui-datepicker',
				'uri' => THEMEX_URI.'assets/css/datepicker.css'
			),
			
			//general
			array(	
				'name' => 'general',
				'uri' => CHILD_URI.'style.css',
			),
		),
		
		//User Scripts
		'user_scripts' => array(
			
			//jquery
			array(	
				'name' => 'jquery',
			),
			
			//comment
			array(	
				'name' => 'comment-reply',
			),
			
			//slider
			array(	
				'name' => 'jquery-ui-slider',
			),
			
			//datepicker
			array(	
				'name' => 'jquery-ui-datepicker',
			),
			
			//hover intent
			array(	
				'name' => 'hoverintent',
				'uri' => THEME_URI.'js/jquery.hoverIntent.min.js',
			),
			
			//touch punch
			array(	
				'name' => 'jquery-ui-touchpunch',
				'uri' => THEME_URI.'js/jquery.ui.touchPunch.js',
			),
			
			//colorbox
			array(	
				'name' => 'colorbox',
				'uri' => THEME_URI.'js/colorbox/jquery.colorbox.min.js',
			),
			
			//placeholder
			array(	
				'name' => 'placeholder',
				'uri' => THEME_URI.'js/jquery.placeholder.min.js',
			),
			
			//slider
			array(	
				'name' => 'themex-slider',
				'uri' => THEME_URI.'js/jquery.themexSlider.js',
			),
			
			//twitter
			array(	
				'name' => 'twitter-fetcher',
				'uri' => THEME_URI.'js/jquery.twitterFetcher.js',
			),
			
			//pattern
			array(	
				'name' => 'text-pattern',
				'uri' => THEME_URI.'js/jquery.textPattern.js',
			),

			//general
			array(	
				'name' => 'general-js',
				'uri' => THEME_URI.'js/general.js',
				'labels' => array(
					'dateFormat' => themex_js_date(get_option(THEMEX_PREFIX.'date_format', 'd/m/Y')),
					'dayNames' => array(
						__('Sunday', 'midway'), 
						__('Monday', 'midway'), 
						__('Tuesday', 'midway'), 
						__('Wednesday', 'midway'), 
						__('Thursday', 'midway'), 
						__('Friday', 'midway'), 
						__('Saturday', 'midway'),
					),					
					'dayNamesMin' => array(
						__('Su', 'midway'), 
						__('Mo', 'midway'), 
						__('Tu', 'midway'), 
						__('We', 'midway'), 
						__('Th', 'midway'), 
						__('Fr', 'midway'), 
						__('Sa', 'midway'),
					),
					'monthNames' => array(
						__('January', 'midway'), 
						__('February', 'midway'), 
						__('March', 'midway'), 
						__('April', 'midway'), 
						__('May', 'midway'), 
						__('June', 'midway'), 
						__('July', 'midway'), 
						__('August', 'midway'), 
						__('September', 'midway'), 
						__('October', 'midway'), 
						__('November', 'midway'), 
						__('December', 'midway'),
					),				
					'firstDay' => get_option('start_of_week'),
					'prevText' => __('Prev', 'midway'),
					'nextText' => __('Next', 'midway'),
				),
			),
		),
		
		//Widget Settings
		'widget_settings' => array (
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="section-title"><h4>',
			'after_title' => '</h4></div>',
		),
		
		//Widget Areas
		'widget_areas' => array (
			array(
				'name' => __('Header', 'midway'),
				'before_widget' => '<div class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<div class="section-title"><h3>',
				'after_title' => '</h3></div>',
				'id' => 'header',
			),
			
			array(
				'name' => __('Footer', 'midway'),
				'before_widget' => '<div class="column threecol"><div class="widget %2$s">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="section-title"><h3>',
				'after_title' => '</h3></div>',
				'id' => 'footer',
			),
		),
		
		//Widgets
		'widgets' => array (
			'ThemexPosts',
			'ThemexTweets',
			'ThemexSubscribe',
		),
		
		//Post types
		'post_types' => array (
		
			//Tour
			array (
				'id' => 'tour',
				'labels' => array (
					'name' => __('Tours', 'midway'),
					'singular_name' => __( 'Tour', 'midway' ),
					'add_new' => __('Add New', 'midway'),
					'add_new_item' => __('Add New Tour', 'midway'),
					'edit_item' => __('Edit Tour', 'midway'),
					'new_item' => __('New Tour', 'midway'),
					'view_item' => __('View Tour', 'midway'),
					'search_items' => __('Search Tours', 'midway'),
					'not_found' =>  __('No Tours Found', 'midway'),
					'not_found_in_trash' => __('No Tours Found in Trash', 'midway'),
				 ),
				'public' => true,
				'exclude_from_search' => false,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
				'rewrite' => array('slug' => __('tour', 'midway')),
			),
			
			//Gallery
			array (
				'id' => 'gallery',
				'labels' => array (
					'name' => __('Galleries', 'midway'),
					'singular_name' => __( 'Gallery', 'midway' ),
					'add_new' => __('Add New', 'midway'),
					'add_new_item' => __('Add New Gallery', 'midway'),
					'edit_item' => __('Edit Gallery', 'midway'),
					'new_item' => __('New Gallery', 'midway'),
					'view_item' => __('View Gallery', 'midway'),
					'search_items' => __('Search Galleries', 'midway'),
					'not_found' =>  __('No Galleries Found', 'midway'),
					'not_found_in_trash' => __('No Galleries Found in Trash', 'midway'),
				 ),
				'public' => true,
				'exclude_from_search' => false,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array('title', 'editor', 'thumbnail'),
				'rewrite' => array('slug' => __('gallery', 'midway')),
			),
			
			//Testimonial
			array (
				'id' => 'testimonial',
				'labels' => array (
					'name' => __('Testimonials', 'midway'),
					'singular_name' => __( 'Testimonial', 'midway' ),
					'add_new' => __('Add New', 'midway'),
					'add_new_item' => __('Add New Testimonial', 'midway'),
					'edit_item' => __('Edit Testimonial', 'midway'),
					'new_item' => __('New Testimonial', 'midway'),
					'view_item' => __('View Testimonial', 'midway'),
					'search_items' => __('Search Testimonials', 'midway'),
					'not_found' =>  __('No Testimonials Found', 'midway'),
					'not_found_in_trash' => __('No Testimonials Found in Trash', 'midway'),
				 ),
				'public' => true,
				'exclude_from_search' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array('title', 'editor'),
				'rewrite' => array('slug' => __('testimonial', 'midway')),
			),
			
			//Slide
			array (
				'id' => 'slide',
				'labels' => array (
					'name' => __('Slides', 'midway'),
					'singular_name' => __( 'Slide', 'midway' ),
					'add_new' => __('Add New', 'midway'),
					'add_new_item' => __('Add New Slide', 'midway'),
					'edit_item' => __('Edit Slide', 'midway'),
					'new_item' => __('New Slide', 'midway'),
					'view_item' => __('View Slide', 'midway'),
					'search_items' => __('Search Slides', 'midway'),
					'not_found' =>  __('No Slides Found', 'midway'),
					'not_found_in_trash' => __('No Slides Found in Trash', 'midway'),
				 ),
				'public' => true,
				'exclude_from_search' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
				'rewrite' => array('slug' => __('slide', 'midway')),
			),
		),
		
		//Taxonomies
		'taxonomies' => array (
		
			//Tour Category
			array(
				'taxonomy' => 'tour_category',
				'object_type' => array('tour'),
				'settings' => array(
					'hierarchical' => true,
					'show_in_nav_menus' => true,			
					'labels' => array(
	                    'name' => __( 'Tour Categories', 'midway'),
	                    'singular_name' => __( 'Tour Category', 'midway'),
						'menu_name' => __( 'Categories', 'midway' ),
	                    'search_items' => __( 'Search Tour Categories', 'midway'),
	                    'all_items' => __( 'All Tour Categories', 'midway'),
	                    'parent_item' => __( 'Parent Tour Category', 'midway'),
	                    'parent_item_colon' => __( 'Parent Tour Category', 'midway'),
	                    'edit_item' => __( 'Edit Tour Category', 'midway'),
	                    'update_item' => __( 'Update Tour Category', 'midway'),
	                    'add_new_item' => __( 'Add New Tour Category', 'midway'),
	                    'new_item_name' => __( 'New Tour Category Name', 'midway')
	            	),
					'rewrite' => array(
						'slug' => __('tours', 'midway'),
						'hierarchical' => true,
					),
				),
			),
			
			//Tour Destination
			array(
				'taxonomy' => 'tour_destination',
				'object_type' => array('tour'),
				'settings' => array(
					'hierarchical' => true,
					'show_in_nav_menus' => true,			
					'show_admin_column' => true,
					'labels' => array(
	                    'name' => __( 'Destinations', 'midway'),
	                    'singular_name' => __( 'Destination', 'midway'),
						'menu_name' => __( 'Destinations', 'midway' ),
	                    'search_items' => __( 'Search Destinations', 'midway'),
	                    'all_items' => __( 'All Destinations', 'midway'),
	                    'parent_item' => __( 'Parent Destination', 'midway'),
	                    'parent_item_colon' => __( 'Parent Destination', 'midway'),
	                    'edit_item' => __( 'Edit Destination', 'midway'),
	                    'update_item' => __( 'Update Destination', 'midway'),
	                    'add_new_item' => __( 'Add New Destination', 'midway'),
	                    'new_item_name' => __( 'New Destination Name', 'midway')
	            	),
					'rewrite' => array(
						'slug' => __('destinations', 'midway'),
						'hierarchical' => true,
					),
				),
			),
			
			//Tour Type
			array(
				'taxonomy' => 'tour_type',
				'object_type' => array('tour'),
				'settings' => array(
					'hierarchical' => true,
					'show_in_nav_menus' => true,			
					'show_admin_column' => true,
					'labels' => array(
	                    'name' => __( 'Types', 'midway'),
	                    'singular_name' => __( 'Type', 'midway'),
						'menu_name' => __( 'Types', 'midway' ),
	                    'search_items' => __( 'Search Types', 'midway'),
	                    'all_items' => __( 'All Types', 'midway'),
	                    'parent_item' => __( 'Parent Type', 'midway'),
	                    'parent_item_colon' => __( 'Parent Type', 'midway'),
	                    'edit_item' => __( 'Edit Type', 'midway'),
	                    'update_item' => __( 'Update Type', 'midway'),
	                    'add_new_item' => __( 'Add New Type', 'midway'),
	                    'new_item_name' => __( 'New Type Name', 'midway')
	            	),
					'rewrite' => array(
						'slug' => __('types', 'midway'),
						'hierarchical' => true,
					),
				),
			),
			
			//Gallery Category
			array(
				'taxonomy' => 'gallery_category',
				'object_type' => array('gallery'),
				'settings' => array(
					'hierarchical' => true,
					'show_in_nav_menus' => true,			
					'show_admin_column' => true,
					'labels' => array(
	                    'name' => __( 'Gallery Categories', 'midway'),
	                    'singular_name' => __( 'Gallery Category', 'midway'),
						'menu_name' => __( 'Categories', 'midway' ),
	                    'search_items' => __( 'Search Gallery Categories', 'midway'),
	                    'all_items' => __( 'All Gallery Categories', 'midway'),
	                    'parent_item' => __( 'Parent Gallery Category', 'midway'),
	                    'parent_item_colon' => __( 'Parent Gallery Category', 'midway'),
	                    'edit_item' => __( 'Edit Gallery Category', 'midway'),
	                    'update_item' => __( 'Update Gallery Category', 'midway'),
	                    'add_new_item' => __( 'Add New Gallery Category', 'midway'),
	                    'new_item_name' => __( 'New Gallery Category Name', 'midway')
	            	),
					'rewrite' => array(
						'slug' => __('galleries', 'midway'),
						'hierarchical' => true,
					),
				),
			),
		),
		
		//Meta Boxes
		'meta_boxes' => array(
		
			//Page
			array(
				'id' => 'page_metabox',
				'title' =>  __('Page Options', 'midway'),
				'page' => 'page',
				'context' => 'normal',
				'priority' => 'high',
				'options' => array(
					array(	
						'name' => __('Background', 'midway'),
						'id' => 'background',
						'type' => 'uploader',
						'description' => __('Choose an image from WordPress media library', 'midway'),
					),
				),			
			),
		
			//Tour
			array(
				'id' => 'tour_metabox',
				'title' =>  __('Tour Options', 'midway'),
				'page' => 'tour',
				'context' => 'normal',
				'priority' => 'high',
				'options' => array(					
					array(	
						'name' => __('Price', 'midway'),
						'id' => 'price',
						'type' => 'number',
						'default' => '0',
					),
					
					array(
						'name' => __('Duration', 'midway'),
						'id' => 'duration',
						'type' => 'number',
					),
				
					array(
						'name' => __('Departure Date', 'midway'),
						'id' => 'date_departure',
						'type' => 'date',
					),
					
					array(	
						'name' => __('Arrival Date', 'midway'),
						'id' => 'date_arrival',
						'type' => 'date',
					),
					
					array(	
						'name' => __('Booking', 'midway'),
						'id' => 'booking',
						'type' => 'select',
						'options' => array(
							'1' => __('Enabled', 'midway'),
							'0' => __('Disabled', 'midway'),
						),
					),
					
					array(	
						'name' => __('Booking URL', 'midway'),
						'id' => 'booking_url',
						'type' => 'text',
						'description' => __('Enter booking page URL to replace the default booking form', 'midway'),
					),
					
					array(
						'name' => __('Booking Product', 'midway'),
						'id' => 'product',
						'type' => 'select_post',
						'post_type' => 'product',
						'description' => __('Choose WooCommerce product to charge for booking', 'midway'),
					),
					
					array(	
						'name' => __('Video URL', 'midway'),
						'id' => 'video_url',
						'type' => 'text',
						'description' => __('Enter embedded video URL to replace an image gallery', 'midway'),
					),
					
					array(
						'id' => 'ThemexForm',
						'slug' => 'search',
						'type' => 'module',
					),
				),			
			),
			
			//Slide
			array(
				'id' => 'slide_metabox',
				'title' =>  __('Slide Options', 'midway'),
				'page' => 'slide',
				'context' => 'normal',
				'priority' => 'high',
				'options' => array(
					array(
						'name' => __('Video URL', 'midway'),
						'id' => 'video_url',
						'type' => 'text',
						'description' => __('Enter embedded video URL to replace an image', 'midway'),
					),
					
					array(	
						'name' => __('Link URL', 'midway'),
						'id' => 'link_url',
						'type' => 'text',
						'description' => __('Enter a URL for the slide image', 'midway'),
					),
				),			
			),
			
			//Gallery
			array(
				'id' => 'gallery_metabox',
				'title' =>  __('Gallery Options', 'midway'),
				'page' => 'gallery',
				'context' => 'normal',
				'priority' => 'high',
				'options' => array(
					array(	
						'name' => __('Video URL', 'midway'),
						'id' => 'video_url',
						'type' => 'text',
						'description' => __('Enter embedded video URL to replace an image gallery', 'midway'),
					),
				),
			),
		),
		
		//Shortcodes
		'shortcodes' => array(
		
			//Button
			array(
				'id' => 'button',
				'name' => __('Button', 'midway'),
				'shortcode' => '[button color="{{color}}" size="{{size}}" url="{{url}}" target="{{target}}"]{{content}}[/button]',
				'options' => array(
					array(			
						'id' => 'color',
						'name' => __('Color', 'midway'),						
						'type' => 'select',
						'options' => array(
							'primary' => __('Primary', 'midway'),
							'grey' => __('Grey', 'midway'),
						),
					),
				
					array(			
						'id' => 'size',
						'name' => __('Size', 'midway'),						
						'type' => 'select',
						'options' => array(
							'small' => __('Small', 'midway'),
							'medium' => __('Medium', 'midway'),
							'large' => __('Large', 'midway'),
						),
					),
					
					array(			
						'id' => 'url',
						'name' => __('Link', 'midway'),			
						'type' => 'text',
					),
					
					array(			
						'id' => 'target',
						'name' => __('Target', 'midway'),			
						'type' => 'select',
						'options' => array(
							'self' => __('Current Tab', 'midway'),
							'blank' => __('New Tab', 'midway'),
						),
					),
					
					array(
						'id' => 'content',
						'name' => __('Text', 'midway'),						
						'type' => 'text',
					),					
				),
			),
		
			//Columns
			array(
				'id' => 'column',
				'name' => __('Columns', 'midway'),
				'shortcode' => '{{clone}}',
				'clone' => array(
					'shortcode' => '[{{column}}]{{content}}[/{{column}}]',
					'options' => array(
						array(
							'id' => 'column',
							'name' => __('Width', 'midway'),
							'type' => 'select',
							'options' => array(
								'one_sixth' => __('One Sixth', 'midway'),
								'one_sixth_last' => __('One Sixth Last', 'midway'),
								'one_fourth' => __('One Fourth', 'midway'),
								'one_fourth_last' => __('One Fourth Last', 'midway'),
								'one_third' => __('One Third', 'midway'),
								'one_third_last' => __('One Third Last', 'midway'),
								'five_twelfths' => __('Five Twelfths', 'midway'),
								'five_twelfths_last' => __('Five Twelfths Last', 'midway'),
								'one_half' => __('One Half', 'midway'),
								'one_half_last' => __('One Half Last', 'midway'),
								'seven_twelfths' => __('Seven Twelfths', 'midway'),
								'seven_twelfths_last' => __('Seven Twelfths Last', 'midway'),
								'two_thirds' => __('Two Thirds', 'midway'),
								'two_thirds_last' => __('Two Thirds Last', 'midway'),
								'three_fourths' => __('Three Fourths', 'midway'),
								'three_fourths_last' => __('Three Fourths Last', 'midway'),
							),
						),
						
						array(
							'id' => 'content',
							'name' => __('Text', 'midway'),						
							'type' => 'textarea',
						),
					),
				),
			),
			
			//Contact Form
			array(
				'id' => 'contact_form',
				'name' => __('Contact Form', 'midway'),
				'shortcode' => '[contact_form]',
				'options' => array(
		
				),
			),
			
			//Galleries
			array(
				'id' => 'galleries',
				'name' => __('Galleries', 'midway'),
				'shortcode' => '[galleries number="{{number}}" columns="{{columns}}" order="{{order}}" category="{{category}}" caption="{{caption}}"]',
				'options' => array(
					array(
						'id' => 'number',
						'name' => __('Number', 'midway'),
						'value' => '4',
						'type' => 'number',
					),

					array(
						'id' => 'columns',
						'name' => __('Columns', 'midway'),
						'value' => '4',
						'type' => 'select',
						'options' => array(
							'3' => '3',
							'4' => '4',
						),
					),
					
					array(			
						'id' => 'order',
						'name' => __('Order', 'midway'),			
						'type' => 'select',
						'options' => array(
							'date' => __('Date', 'midway'),
							'random' => __('Random', 'midway'),
						),
					),
					
					array(			
						'id' => 'category',
						'name' => __('Category', 'midway'),			
						'type' => 'select_category',
						'taxonomy' => 'gallery_category',
					),
					
					array(			
						'id' => 'caption',
						'name' => __('Caption', 'midway'),			
						'type' => 'select',
						'options' => array(
							'visible' => __('Visible', 'midway'),
							'hidden' => __('Hidden', 'midway'),
							'none' => __('None', 'midway'),
						),
					),
				),
			),
			
			//Google Map
			array(
				'id' => 'map',
				'name' => __('Google Map', 'midway'),
				'shortcode' => '[map align="{{align}}" height="{{height}}" latitude="{{latitude}}" longitude="{{longitude}}" zoom="{{zoom}}" description="{{description}}"]',
				'options' => array(
					array(			
						'id' => 'align',
						'name' => __('Align', 'midway'),			
						'type' => 'select',
						'options' => array(
							'none' => __('None', 'midway'),
							'top' => __('Top', 'midway'),
							'bottom' => __('Bottom', 'midway'),
						),
					),
					
					array(
						'id' => 'height',
						'name' => __('Height', 'midway'),
						'value' => '250',
						'type' => 'number',
					),

					array(
						'id' => 'latitude',
						'name' => __('Latitude', 'midway'),
						'value' => '0',
						'type' => 'text',
					),
					
					array(
						'id' => 'longitude',
						'name' => __('Longitude', 'midway'),
						'value' => '0',
						'type' => 'text',
					),
					
					array(
						'id' => 'zoom',
						'name' => __('Zoom', 'midway'),
						'value' => '10',
						'type' => 'number',
					),
					
					array(					
						'id' => 'description',
						'name' => __('Description', 'midway'),							
						'type' => 'textarea',						
					),
				),
			),
			
			//Image
			array(
				'id' => 'image',
				'name' => __('Image', 'midway'),
				'shortcode' => '[image url="{{url}}"]{{content}}[/image]',
				'options' => array(
					array(			
						'id' => 'url',
						'name' => __('Link URL', 'midway'),						
						'type' => 'text',
					),
			
					array(
						'id' => 'content',
						'name' => __('Image URL', 'midway'),						
						'type' => 'text',
					),				
				),
			),
			
			//Itinerary
			array(
				'id' => 'itinerary',
				'name' => __('Itinerary', 'midway'),
				'shortcode' => '[itinerary]{{clone}}[/itinerary]',
				'clone' => array(
					'shortcode' => '[day title="{{title}}" image="{{image}}"]{{content}}[/day]',
					'options' => array(
						array(
							'id' => 'title',
							'name' => __('Title', 'midway'),
							'type' => 'text',
						),

						array(
							'id' => 'image',
							'name' => __('Image URL', 'midway'),
							'type' => 'text',
						),
						
						array(					
							'id' => 'content',
							'name' => __('Text', 'midway'),							
							'type' => 'textarea',						
						),
					),
				),
			),
			
			//Posts
			array(
				'id' => 'posts',
				'name' => __('Posts', 'midway'),
				'shortcode' => '[posts number="{{number}}" order="{{order}}" category="{{category}}"]',
				'options' => array(
					array(
						'id' => 'number',
						'name' => __('Number', 'midway'),
						'value' => '1',
						'type' => 'number',
					),		
					
					array(			
						'id' => 'order',
						'name' => __('Order', 'midway'),			
						'type' => 'select',
						'options' => array(
							'date' => __('Date', 'midway'),
							'random' => __('Random', 'midway'),
						),
					),
					
					array(			
						'id' => 'category',
						'name' => __('Category', 'midway'),			
						'type' => 'select_category',
						'taxonomy' => 'category',
					),
				),
			),
			
			//Section
			array(
				'id' => 'section',
				'name' => __('Section', 'midway'),
				'shortcode' => '[section background="{{background}}"]{{content}}[/section]',
				'options' => array(
					array(			
						'id' => 'background',
						'name' => __('Background', 'midway'),						
						'type' => 'text',
					),				
			
					array(
						'id' => 'content',
						'name' => __('Text', 'midway'),						
						'type' => 'textarea',
					),				
				),
			),
			
			//Sidebar
			array(
				'id' => 'sidebar',
				'name' => __('Sidebar', 'midway'),
				'shortcode' => '[sidebar name="{{name}}"]',
				'options' => array(
					array(			
						'id' => 'name',
						'name' => __('Name', 'midway'),						
						'type' => 'select_sidebar',
					),			
				),
			),
			
			//Search Form
			array(
				'id' => 'search_form',
				'name' => __('Search Form', 'midway'),
				'shortcode' => '[search_form]',
				'options' => array(
		
				),
			),
			
			//Tabs
			array(
				'id' => 'tabs',
				'name' => __('Tabs', 'midway'),
				'shortcode' => '[tabs type="{{type}}"]{{clone}}[/tabs]',
				'options' => array(
					array(			
						'id' => 'type',
						'name' => __('Type', 'midway'),			
						'type' => 'select',
						'options' => array(
							'horizontal' => __('Horizontal', 'midway'),
							'vertical' => __('Vertical', 'midway'),
						),
					),
				),
				'clone' => array(
					'shortcode' => '[tab title="{{title}}"]{{content}}[/tab]',
					'options' => array(
						array(
							'id' => 'title',
							'name' => __('Title', 'midway'),
							'type' => 'text',
						),
						
						array(					
							'id' => 'content',
							'name' => __('Text', 'midway'),							
							'type' => 'textarea',						
						),
					),
				),
			),
			
			//Testimonials
			array(
				'id' => 'testimonials',
				'name' => __('Testimonials', 'midway'),
				'shortcode' => '[testimonials number="{{number}}" order="{{order}}" pause="{{pause}}" speed="{{speed}}"]',
				'options' => array(
					array(
						'id' => 'number',
						'name' => __('Number', 'midway'),
						'value' => '3',
						'type' => 'number',
					),		
					
					array(			
						'id' => 'order',
						'name' => __('Order', 'midway'),			
						'type' => 'select',
						'options' => array(
							'date' => __('Date', 'midway'),
							'random' => __('Random', 'midway'),
						),
					),
					
					array(
						'id' => 'pause',
						'name' => __('Pause', 'midway'),
						'value' => '0',
						'type' => 'number',
					),
					
					array(
						'id' => 'speed',
						'name' => __('Speed', 'midway'),
						'value' => '400',
						'type' => 'number',
					),
				),
			),
			
			//Title
			array(
				'id' => 'title',
				'name' => __('Title', 'midway'),
				'shortcode' => '[title size="{{size}}"]{{content}}[/title]',
				'options' => array(
					array(
						'id' => 'content',
						'name' => __('Title', 'midway'),
						'type' => 'text',
					),
					
					array(
						'id' => 'size',
						'name' => __('Size', 'midway'),			
						'type' => 'select',
						'options' => array(
							'small' => __('Small', 'midway'),
							'large' => __('Large', 'midway'),
						),
					),	
				),
			),
			
			//Toggles
			array(
				'id' => 'toggle',
				'name' => __('Toggle', 'midway'),
				'shortcode' => '[toggle title="{{title}}"]{{content}}[/toggle]',
				'options' => array(
					array(
						'id' => 'title',
						'name' => __('Title', 'midway'),
						'type' => 'text',
					),		
					
					array(					
						'id' => 'content',
						'name' => __('Text', 'midway'),							
						'type' => 'textarea',					
					),				
				),
			),
			
			//Tours
			array(
				'id' => 'tours',
				'name' => __('Tours', 'midway'),
				'shortcode' => '[tours number="{{number}}" columns="{{columns}}" order="{{order}}" category="{{category}}" type="{{type}}" destination="{{destination}}"]',
				'options' => array(
					array(
						'id' => 'number',
						'name' => __('Number', 'midway'),
						'value' => '4',
						'type' => 'number',
					),

					array(
						'id' => 'columns',
						'name' => __('Columns', 'midway'),
						'value' => '4',
						'type' => 'select',
						'options' => array(
							'3' => '3',
							'4' => '4',
						),
					),
					
					array(			
						'id' => 'order',
						'name' => __('Order', 'midway'),			
						'type' => 'select',
						'options' => array(
							'date' => __('Date', 'midway'),
							'random' => __('Random', 'midway'),
						),
					),
					
					array(			
						'id' => 'category',
						'name' => __('Category', 'midway'),			
						'type' => 'select_category',
						'taxonomy' => 'tour_category',
					),
					
					array(			
						'id' => 'type',
						'name' => __('Type', 'midway'),			
						'type' => 'select_category',
						'taxonomy' => 'tour_type',
					),
					
					array(			
						'id' => 'destination',
						'name' => __('Destination', 'midway'),			
						'type' => 'select_category',
						'taxonomy' => 'tour_destination',
					),
				),
			),
		),
		
		//Custom Styles
		'custom_styles' => array(
			array(
				'elements' => 'body',
				'attributes' => array(
					array(
						'name' => 'background-image',
						'option' => 'background_image',
					),
				),
			),
			
			array(
				'elements' => 'body, input, select, textarea',
				'attributes' => array(
					array(
						'name' => 'font-family',
						'option' => 'content_font',
					),
				),
			),
			
			array(
				'elements' => 'h1,h2,h3,h4,h5,h6, .button, .header-menu a, .woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit,.woocommerce #content input.button,.woocommerce-page a.button,.woocommerce-page button.button,.woocommerce-page input.button,.woocommerce-page #respond input#submit,.woocommerce-page #content input.button',
				'attributes' => array(
					array(
						'name' => 'font-family',
						'option' => 'heading_font',
					),
				),
			),
			
			array(
				'elements' => 'a, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .header-menu ul ul a:hover, .header-menu > div > ul > li.current-menu-item > a,.header-menu > div > ul > li.current-menu-parent > a,.header-menu > div > ul > li.hover > a,.header-menu > div > ul > li:hover > a',
				'attributes' => array(
					array(
						'name' => 'color',
						'option' => 'primary_color',
					),
				),
			),
			
			array(
				'elements' => 'input[type="submit"], input[type="button"], .button, .colored-icon, .widget_recent_comments li:before, .ui-slider .ui-slider-range, .tour-itinerary .tour-day-number h5, .testimonials-slider .controls a.current, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover',
				'attributes' => array(
					array(
						'name' => 'background-color',
						'option' => 'primary_color',
					),
				),
			),
			
			array(
				'elements' => '.header .logo a, .header .header-text h5, .header .social-links span, .header-menu a, .header-menu a span, .site-footer .row, .site-footer a, .header-widgets .widget, .header-widgets .widget a, .header-widgets .section-title h3',
				'attributes' => array(
					array(
						'name' => 'color',
						'option' => 'secondary_color',
					),
				),
			),
			
			array(
				'elements' => '.header-menu ul ul li, .header-menu > div > ul > li.current-menu-item > a, .header-menu > div > ul > li.current-menu-parent > a, .header-menu > div > ul > li.hover > a, .header-menu > div > ul > li:hover > a',
				'attributes' => array(
					array(
						'name' => 'background-color',
						'option' => 'secondary_color',
					),
				),
			),
			
			array(
				'elements' => '::-moz-selection',
				'attributes' => array(
					array(
						'name' => 'background-color',
						'option' => 'primary_color',
					),
				),
			),
			
			array(
				'elements' => '::selection',
				'attributes' => array(
					array(
						'name' => 'background-color',
						'option' => 'primary_color',
					),
				),
			),
		),
		
		//Fonts
		'fonts' => array(
			'ABeeZee' => 'ABeeZee',
			'Abel' => 'Abel',
			'Abril Fatface' => 'Abril Fatface',
			'Aclonica' => 'Aclonica',
			'Acme' => 'Acme',
			'Actor' => 'Actor',
			'Adamina' => 'Adamina',
			'Advent Pro' => 'Advent Pro',
			'Aguafina Script' => 'Aguafina Script',
			'Aladin' => 'Aladin',
			'Aldrich' => 'Aldrich',
			'Alegreya' => 'Alegreya',
			'Alegreya SC' => 'Alegreya SC',
			'Alex Brush' => 'Alex Brush',
			'Alfa Slab One' => 'Alfa Slab One',
			'Alice' => 'Alice',
			'Alike' => 'Alike',
			'Alike Angular' => 'Alike Angular',
			'Allan' => 'Allan',
			'Allerta' => 'Allerta',
			'Allerta Stencil' => 'Allerta Stencil',
			'Allura' => 'Allura',
			'Almendra' => 'Almendra',
			'Almendra SC' => 'Almendra SC',
			'Amaranth' => 'Amaranth',
			'Amatic SC' => 'Amatic SC',
			'Amethysta' => 'Amethysta',
			'Andada' => 'Andada',
			'Andika' => 'Andika',
			'Angkor' => 'Angkor',
			'Annie Use Your Telescope' => 'Annie Use Your Telescope',
			'Anonymous Pro' => 'Anonymous Pro',
			'Antic' => 'Antic',
			'Antic Didone' => 'Antic Didone',
			'Antic Slab' => 'Antic Slab',
			'Anton' => 'Anton',
			'Arapey' => 'Arapey',
			'Arbutus' => 'Arbutus',
			'Architects Daughter' => 'Architects Daughter',
			'Arimo' => 'Arimo',
			'Arizonia' => 'Arizonia',
			'Armata' => 'Armata',
			'Artifika' => 'Artifika',
			'Arvo' => 'Arvo',
			'Asap' => 'Asap',
			'Asset' => 'Asset',
			'Astloch' => 'Astloch',
			'Asul' => 'Asul',
			'Atomic Age' => 'Atomic Age',
			'Aubrey' => 'Aubrey',
			'Audiowide' => 'Audiowide',
			'Average' => 'Average',
			'Averia Gruesa Libre' => 'Averia Gruesa Libre',
			'Averia Libre' => 'Averia Libre',
			'Averia Sans Libre' => 'Averia Sans Libre',
			'Averia Serif Libre' => 'Averia Serif Libre',
			'Bad Script' => 'Bad Script',
			'Balthazar' => 'Balthazar',
			'Bangers' => 'Bangers',
			'Basic' => 'Basic',
			'Battambang' => 'Battambang',
			'Baumans' => 'Baumans',
			'Bayon' => 'Bayon',
			'Belgrano' => 'Belgrano',
			'Belleza' => 'Belleza',
			'Bentham' => 'Bentham',
			'Berkshire Swash' => 'Berkshire Swash',
			'Bevan' => 'Bevan',
			'Bigshot One' => 'Bigshot One',
			'Bilbo' => 'Bilbo',
			'Bilbo Swash Caps' => 'Bilbo Swash Caps',
			'Bitter' => 'Bitter',
			'Black Ops One' => 'Black Ops One',
			'Bokor' => 'Bokor',
			'Bonbon' => 'Bonbon',
			'Boogaloo' => 'Boogaloo',
			'Bowlby One' => 'Bowlby One',
			'Bowlby One SC' => 'Bowlby One SC',
			'Brawler' => 'Brawler',
			'Bree Serif' => 'Bree Serif',
			'Bubblegum Sans' => 'Bubblegum Sans',
			'Buda' => 'Buda',
			'Buenard' => 'Buenard',
			'Butcherman' => 'Butcherman',
			'Butterfly Kids' => 'Butterfly Kids',
			'Cabin' => 'Cabin',
			'Cabin Condensed' => 'Cabin Condensed',
			'Cabin Sketch' => 'Cabin Sketch',
			'Caesar Dressing' => 'Caesar Dressing',
			'Cagliostro' => 'Cagliostro',
			'Calligraffitti' => 'Calligraffitti',
			'Cambo' => 'Cambo',
			'Candal' => 'Candal',
			'Cantarell' => 'Cantarell',
			'Cantata One' => 'Cantata One',
			'Cardo' => 'Cardo',
			'Carme' => 'Carme',
			'Carter One' => 'Carter One',
			'Caudex' => 'Caudex',
			'Cedarville Cursive' => 'Cedarville Cursive',
			'Ceviche One' => 'Ceviche One',
			'Changa One' => 'Changa One',
			'Chango' => 'Chango',
			'Chau Philomene One' => 'Chau Philomene One',
			'Chelsea Market' => 'Chelsea Market',
			'Chenla' => 'Chenla',
			'Cherry Cream Soda' => 'Cherry Cream Soda',
			'Chewy' => 'Chewy',
			'Chicle' => 'Chicle',
			'Chivo' => 'Chivo',
			'Coda' => 'Coda',
			'Coda Caption' => 'Coda Caption',
			'Codystar' => 'Codystar',
			'Comfortaa' => 'Comfortaa',
			'Coming Soon' => 'Coming Soon',
			'Concert One' => 'Concert One',
			'Condiment' => 'Condiment',
			'Content' => 'Content',
			'Contrail One' => 'Contrail One',
			'Convergence' => 'Convergence',
			'Cookie' => 'Cookie',
			'Copse' => 'Copse',
			'Corben' => 'Corben',
			'Cousine' => 'Cousine',
			'Coustard' => 'Coustard',
			'Covered By Your Grace' => 'Covered By Your Grace',
			'Crafty Girls' => 'Crafty Girls',
			'Creepster' => 'Creepster',
			'Crete Round' => 'Crete Round',
			'Crimson Text' => 'Crimson Text',
			'Crushed' => 'Crushed',
			'Cuprum' => 'Cuprum',
			'Cutive' => 'Cutive',
			'Damion' => 'Damion',
			'Dancing Script' => 'Dancing Script',
			'Dangrek' => 'Dangrek',
			'Dawning of a New Day' => 'Dawning of a New Day',
			'Days One' => 'Days One',
			'Delius' => 'Delius',
			'Delius Swash Caps' => 'Delius Swash Caps',
			'Delius Unicase' => 'Delius Unicase',
			'Della Respira' => 'Della Respira',
			'Devonshire' => 'Devonshire',
			'Didact Gothic' => 'Didact Gothic',
			'Diplomata' => 'Diplomata',
			'Diplomata SC' => 'Diplomata SC',
			'Doppio One' => 'Doppio One',
			'Dorsa' => 'Dorsa',
			'Dosis' => 'Dosis',
			'Dr Sugiyama' => 'Dr Sugiyama',
			'Droid Sans' => 'Droid Sans',
			'Droid Sans Mono' => 'Droid Sans Mono',
			'Droid Serif' => 'Droid Serif',
			'Duru Sans' => 'Duru Sans',
			'Dynalight' => 'Dynalight',
			'EB Garamond' => 'EB Garamond',
			'Eater' => 'Eater',
			'Economica' => 'Economica',
			'Electrolize' => 'Electrolize',
			'Emblema One' => 'Emblema One',
			'Emilys Candy' => 'Emilys Candy',
			'Engagement' => 'Engagement',
			'Enriqueta' => 'Enriqueta',
			'Erica One' => 'Erica One',
			'Esteban' => 'Esteban',
			'Euphoria Script' => 'Euphoria Script',
			'Ewert' => 'Ewert',
			'Exo' => 'Exo',
			'Expletus Sans' => 'Expletus Sans',
			'Fanwood Text' => 'Fanwood Text',
			'Fascinate' => 'Fascinate',
			'Fascinate Inline' => 'Fascinate Inline',
			'Federant' => 'Federant',
			'Federo' => 'Federo',
			'Felipa' => 'Felipa',
			'Fjord One' => 'Fjord One',
			'Flamenco' => 'Flamenco',
			'Flavors' => 'Flavors',
			'Fondamento' => 'Fondamento',
			'Fontdiner Swanky' => 'Fontdiner Swanky',
			'Forum' => 'Forum',
			'Francois One' => 'Francois One',
			'Fredericka the Great' => 'Fredericka the Great',
			'Fredoka One' => 'Fredoka One',
			'Freehand' => 'Freehand',
			'Fresca' => 'Fresca',
			'Frijole' => 'Frijole',
			'Fugaz One' => 'Fugaz One',
			'GFS Didot' => 'GFS Didot',
			'GFS Neohellenic' => 'GFS Neohellenic',
			'Galdeano' => 'Galdeano',
			'Gentium Basic' => 'Gentium Basic',
			'Gentium Book Basic' => 'Gentium Book Basic',
			'Geo' => 'Geo',
			'Geostar' => 'Geostar',
			'Geostar Fill' => 'Geostar Fill',
			'Germania One' => 'Germania One',
			'Give You Glory' => 'Give You Glory',
			'Glass Antiqua' => 'Glass Antiqua',
			'Glegoo' => 'Glegoo',
			'Gloria Hallelujah' => 'Gloria Hallelujah',
			'Goblin One' => 'Goblin One',
			'Gochi Hand' => 'Gochi Hand',
			'Gorditas' => 'Gorditas',
			'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
			'Graduate' => 'Graduate',
			'Gravitas One' => 'Gravitas One',
			'Great Vibes' => 'Great Vibes',
			'Gruppo' => 'Gruppo',
			'Gudea' => 'Gudea',
			'Habibi' => 'Habibi',
			'Hammersmith One' => 'Hammersmith One',
			'Handlee' => 'Handlee',
			'Hanuman' => 'Hanuman',
			'Happy Monkey' => 'Happy Monkey',
			'Henny Penny' => 'Henny Penny',
			'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
			'Holtwood One SC' => 'Holtwood One SC',
			'Homemade Apple' => 'Homemade Apple',
			'Homenaje' => 'Homenaje',
			'IM Fell DW Pica' => 'IM Fell DW Pica',
			'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
			'IM Fell Double Pica' => 'IM Fell Double Pica',
			'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
			'IM Fell English' => 'IM Fell English',
			'IM Fell English SC' => 'IM Fell English SC',
			'IM Fell French Canon' => 'IM Fell French Canon',
			'IM Fell French Canon SC' => 'IM Fell French Canon SC',
			'IM Fell Great Primer' => 'IM Fell Great Primer',
			'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
			'Iceberg' => 'Iceberg',
			'Iceland' => 'Iceland',
			'Imprima' => 'Imprima',
			'Inconsolata' => 'Inconsolata',
			'Inder' => 'Inder',
			'Indie Flower' => 'Indie Flower',
			'Inika' => 'Inika',
			'Irish Grover' => 'Irish Grover',
			'Istok Web' => 'Istok Web',
			'Italiana' => 'Italiana',
			'Italianno' => 'Italianno',
			'Jim Nightshade' => 'Jim Nightshade',
			'Jockey One' => 'Jockey One',
			'Jolly Lodger' => 'Jolly Lodger',
			'Josefin Sans' => 'Josefin Sans',
			'Josefin Slab' => 'Josefin Slab',
			'Judson' => 'Judson',
			'Julee' => 'Julee',
			'Junge' => 'Junge',
			'Jura' => 'Jura',
			'Just Another Hand' => 'Just Another Hand',
			'Just Me Again Down Here' => 'Just Me Again Down Here',
			'Kameron' => 'Kameron',
			'Karla' => 'Karla',
			'Kaushan Script' => 'Kaushan Script',
			'Kelly Slab' => 'Kelly Slab',
			'Kenia' => 'Kenia',
			'Khmer' => 'Khmer',
			'Knewave' => 'Knewave',
			'Kotta One' => 'Kotta One',
			'Koulen' => 'Koulen',
			'Kranky' => 'Kranky',
			'Kreon' => 'Kreon',
			'Kristi' => 'Kristi',
			'Krona One' => 'Krona One',
			'La Belle Aurore' => 'La Belle Aurore',
			'Lancelot' => 'Lancelot',
			'Lato' => 'Lato',
			'League Script' => 'League Script',
			'Leckerli One' => 'Leckerli One',
			'Ledger' => 'Ledger',
			'Lekton' => 'Lekton',
			'Lemon' => 'Lemon',
			'Lilita One' => 'Lilita One',
			'Limelight' => 'Limelight',
			'Linden Hill' => 'Linden Hill',
			'Lobster' => 'Lobster',
			'Lobster Two' => 'Lobster Two',
			'Londrina Outline' => 'Londrina Outline',
			'Londrina Shadow' => 'Londrina Shadow',
			'Londrina Sketch' => 'Londrina Sketch',
			'Londrina Solid' => 'Londrina Solid',
			'Lora' => 'Lora',
			'Love Ya Like A Sister' => 'Love Ya Like A Sister',
			'Loved by the King' => 'Loved by the King',
			'Lovers Quarrel' => 'Lovers Quarrel',
			'Luckiest Guy' => 'Luckiest Guy',
			'Lusitana' => 'Lusitana',
			'Lustria' => 'Lustria',
			'Macondo' => 'Macondo',
			'Macondo Swash Caps' => 'Macondo Swash Caps',
			'Magra' => 'Magra',
			'Maiden Orange' => 'Maiden Orange',
			'Mako' => 'Mako',
			'Marck Script' => 'Marck Script',
			'Marko One' => 'Marko One',
			'Marmelad' => 'Marmelad',
			'Marvel' => 'Marvel',
			'Mate' => 'Mate',
			'Mate SC' => 'Mate SC',
			'Maven Pro' => 'Maven Pro',
			'Meddon' => 'Meddon',
			'MedievalSharp' => 'MedievalSharp',
			'Medula One' => 'Medula One',
			'Megrim' => 'Megrim',
			'Merienda One' => 'Merienda One',
			'Merriweather' => 'Merriweather',
			'Metal' => 'Metal',
			'Metamorphous' => 'Metamorphous',
			'Metrophobic' => 'Metrophobic',
			'Michroma' => 'Michroma',
			'Miltonian' => 'Miltonian',
			'Miltonian Tattoo' => 'Miltonian Tattoo',
			'Miniver' => 'Miniver',
			'Miss Fajardose' => 'Miss Fajardose',
			'Modern Antiqua' => 'Modern Antiqua',
			'Molengo' => 'Molengo',
			'Monofett' => 'Monofett',
			'Monoton' => 'Monoton',
			'Monsieur La Doulaise' => 'Monsieur La Doulaise',
			'Montaga' => 'Montaga',
			'Montez' => 'Montez',
			'Montserrat' => 'Montserrat',
			'Moul' => 'Moul',
			'Moulpali' => 'Moulpali',
			'Mountains of Christmas' => 'Mountains of Christmas',
			'Mr Bedfort' => 'Mr Bedfort',
			'Mr Dafoe' => 'Mr Dafoe',
			'Mr De Haviland' => 'Mr De Haviland',
			'Mrs Saint Delafield' => 'Mrs Saint Delafield',
			'Mrs Sheppards' => 'Mrs Sheppards',
			'Muli' => 'Muli',
			'Mystery Quest' => 'Mystery Quest',
			'Neucha' => 'Neucha',
			'Neuton' => 'Neuton',
			'News Cycle' => 'News Cycle',
			'Niconne' => 'Niconne',
			'Nixie One' => 'Nixie One',
			'Nobile' => 'Nobile',
			'Nokora' => 'Nokora',
			'Norican' => 'Norican',
			'Nosifer' => 'Nosifer',
			'Nothing You Could Do' => 'Nothing You Could Do',
			'Noticia Text' => 'Noticia Text',
			'Nova Cut' => 'Nova Cut',
			'Nova Flat' => 'Nova Flat',
			'Nova Mono' => 'Nova Mono',
			'Nova Oval' => 'Nova Oval',
			'Nova Round' => 'Nova Round',
			'Nova Script' => 'Nova Script',
			'Nova Slim' => 'Nova Slim',
			'Nova Square' => 'Nova Square',
			'Numans' => 'Numans',
			'Nunito' => 'Nunito',
			'Odor Mean Chey' => 'Odor Mean Chey',
			'Old Standard TT' => 'Old Standard TT',
			'Oldenburg' => 'Oldenburg',
			'Oleo Script' => 'Oleo Script',
			'Open Sans' => 'Open Sans',
			'Open Sans Condensed' => 'Open Sans Condensed',
			'Orbitron' => 'Orbitron',
			'Original Surfer' => 'Original Surfer',
			'Oswald' => 'Oswald',
			'Over the Rainbow' => 'Over the Rainbow',
			'Overlock' => 'Overlock',
			'Overlock SC' => 'Overlock SC',
			'Ovo' => 'Ovo',
			'Oxygen' => 'Oxygen',
			'PT Mono' => 'PT Mono',
			'PT Sans' => 'PT Sans',
			'PT Sans Caption' => 'PT Sans Caption',
			'PT Sans Narrow' => 'PT Sans Narrow',
			'PT Serif' => 'PT Serif',
			'PT Serif Caption' => 'PT Serif Caption',
			'Pacifico' => 'Pacifico',
			'Parisienne' => 'Parisienne',
			'Passero One' => 'Passero One',
			'Passion One' => 'Passion One',
			'Patrick Hand' => 'Patrick Hand',
			'Patua One' => 'Patua One',
			'Paytone One' => 'Paytone One',
			'Permanent Marker' => 'Permanent Marker',
			'Petrona' => 'Petrona',
			'Philosopher' => 'Philosopher',
			'Piedra' => 'Piedra',
			'Pinyon Script' => 'Pinyon Script',
			'Plaster' => 'Plaster',
			'Play' => 'Play',
			'Playball' => 'Playball',
			'Playfair Display' => 'Playfair Display',
			'Podkova' => 'Podkova',
			'Poiret One' => 'Poiret One',
			'Poller One' => 'Poller One',
			'Poly' => 'Poly',
			'Pompiere' => 'Pompiere',
			'Pontano Sans' => 'Pontano Sans',
			'Port Lligat Sans' => 'Port Lligat Sans',
			'Port Lligat Slab' => 'Port Lligat Slab',
			'Prata' => 'Prata',
			'Preahvihear' => 'Preahvihear',
			'Press Start 2P' => 'Press Start 2P',
			'Princess Sofia' => 'Princess Sofia',
			'Prociono' => 'Prociono',
			'Prosto One' => 'Prosto One',
			'Puritan' => 'Puritan',
			'Quantico' => 'Quantico',
			'Quattrocento' => 'Quattrocento',
			'Quattrocento Sans' => 'Quattrocento Sans',
			'Questrial' => 'Questrial',
			'Quicksand' => 'Quicksand',
			'Qwigley' => 'Qwigley',
			'Radley' => 'Radley',
			'Raleway' => 'Raleway',
			'Rammetto One' => 'Rammetto One',
			'Rancho' => 'Rancho',
			'Rationale' => 'Rationale',
			'Redressed' => 'Redressed',
			'Reenie Beanie' => 'Reenie Beanie',
			'Revalia' => 'Revalia',
			'Ribeye' => 'Ribeye',
			'Ribeye Marrow' => 'Ribeye Marrow',
			'Righteous' => 'Righteous',
			'Roboto' => 'Roboto',
			'Roboto Condensed' => 'Roboto Condensed',
			'Rochester' => 'Rochester',
			'Rock Salt' => 'Rock Salt',
			'Rokkitt' => 'Rokkitt',
			'Ropa Sans' => 'Ropa Sans',
			'Rosario' => 'Rosario',
			'Rosarivo' => 'Rosarivo',
			'Rouge Script' => 'Rouge Script',
			'Ruda' => 'Ruda',
			'Ruge Boogie' => 'Ruge Boogie',
			'Ruluko' => 'Ruluko',
			'Ruslan Display' => 'Ruslan Display',
			'Russo One' => 'Russo One',
			'Ruthie' => 'Ruthie',
			'Sail' => 'Sail',
			'Salsa' => 'Salsa',
			'Sanchez' => 'Sanchez',
			'Sancreek' => 'Sancreek',
			'Sansita One' => 'Sansita One',
			'Sarina' => 'Sarina',
			'Satisfy' => 'Satisfy',
			'Schoolbell' => 'Schoolbell',
			'Seaweed Script' => 'Seaweed Script',
			'Sevillana' => 'Sevillana',
			'Shadows Into Light' => 'Shadows Into Light',
			'Shadows Into Light Two' => 'Shadows Into Light Two',
			'Shanti' => 'Shanti',
			'Share' => 'Share',
			'Shojumaru' => 'Shojumaru',
			'Short Stack' => 'Short Stack',
			'Siemreap' => 'Siemreap',
			'Sigmar One' => 'Sigmar One',
			'Signika' => 'Signika',
			'Signika Negative' => 'Signika Negative',
			'Simonetta' => 'Simonetta',
			'Sirin Stencil' => 'Sirin Stencil',
			'Six Caps' => 'Six Caps',
			'Slackey' => 'Slackey',
			'Smokum' => 'Smokum',
			'Smythe' => 'Smythe',
			'Sniglet' => 'Sniglet',
			'Snippet' => 'Snippet',
			'Sofia' => 'Sofia',
			'Sonsie One' => 'Sonsie One',
			'Sorts Mill Goudy' => 'Sorts Mill Goudy',
			'Special Elite' => 'Special Elite',
			'Spicy Rice' => 'Spicy Rice',
			'Spinnaker' => 'Spinnaker',
			'Spirax' => 'Spirax',
			'Squada One' => 'Squada One',
			'Stardos Stencil' => 'Stardos Stencil',
			'Stint Ultra Condensed' => 'Stint Ultra Condensed',
			'Stint Ultra Expanded' => 'Stint Ultra Expanded',
			'Stoke' => 'Stoke',
			'Sue Ellen Francisco' => 'Sue Ellen Francisco',
			'Sunshiney' => 'Sunshiney',
			'Supermercado One' => 'Supermercado One',
			'Suwannaphum' => 'Suwannaphum',
			'Swanky and Moo Moo' => 'Swanky and Moo Moo',
			'Syncopate' => 'Syncopate',
			'Tangerine' => 'Tangerine',
			'Taprom' => 'Taprom',
			'Telex' => 'Telex',
			'Tenor Sans' => 'Tenor Sans',
			'The Girl Next Door' => 'The Girl Next Door',
			'Tienne' => 'Tienne',
			'Tinos' => 'Tinos',
			'Titan One' => 'Titan One',
			'Trade Winds' => 'Trade Winds',
			'Trocchi' => 'Trocchi',
			'Trochut' => 'Trochut',
			'Trykker' => 'Trykker',
			'Tulpen One' => 'Tulpen One',
			'Ubuntu' => 'Ubuntu',
			'Ubuntu Condensed' => 'Ubuntu Condensed',
			'Ubuntu Mono' => 'Ubuntu Mono',
			'Ultra' => 'Ultra',
			'Uncial Antiqua' => 'Uncial Antiqua',
			'UnifrakturCook' => 'UnifrakturCook',
			'UnifrakturMaguntia' => 'UnifrakturMaguntia',
			'Unkempt' => 'Unkempt',
			'Unlock' => 'Unlock',
			'Unna' => 'Unna',
			'VT323' => 'VT323',
			'Varela' => 'Varela',
			'Varela Round' => 'Varela Round',
			'Vast Shadow' => 'Vast Shadow',
			'Vibur' => 'Vibur',
			'Vidaloka' => 'Vidaloka',
			'Viga' => 'Viga',
			'Voces' => 'Voces',
			'Volkhov' => 'Volkhov',
			'Vollkorn' => 'Vollkorn',
			'Voltaire' => 'Voltaire',
			'Waiting for the Sunrise' => 'Waiting for the Sunrise',
			'Wallpoet' => 'Wallpoet',
			'Walter Turncoat' => 'Walter Turncoat',
			'Wellfleet' => 'Wellfleet',
			'Wire One' => 'Wire One',
			'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
			'Yellowtail' => 'Yellowtail',
			'Yeseva One' => 'Yeseva One',
			'Yesteryear' => 'Yesteryear',
			'Zeyada' => 'Zeyada',
		),	
	),
	
	//Theme Options
	'options' => array(
	
		//General Settings
		array(	
			'name' => __('General', 'midway'),
			'type' => 'section'
		),

			array(	
				'name' => __('Site Favicon', 'midway'),
				'description' => __('Choose an image for your site favicon', 'midway'),
				'id' => 'favicon',
				'type' => 'uploader',
			),

			array(	
				'name' => __('Site Logo', 'midway'),
				'description' => __('Choose an image for your site logo', 'midway'),
				'id' => 'logo',
				'type' => 'uploader',
			),

			array(	
				'name' => __('Copyright Text', 'midway'),
				'description' => __('Enter copyright text to show in the theme footer', 'midway'),
				'id' => 'copyright',
				'type' => 'textarea',
				'translate' => true,
			),

			array(	
				'name' => __('Tracking Code', 'midway'),
				'description' => __('Enter Google Analytics code to track your site visitors', 'midway'),
				'id' => 'tracking',
				'type' => 'textarea',
			),

		//Styling
		array(
			'name' => __('Styling', 'midway'),
			'type' => 'section',
		),	

			array(	
				'name' => __('Primary Color', 'midway'),
				'default' => '#FF9000',
				'id' => 'primary_color',
				'type' => 'color',
			),

			array(	
				'name' => __('Secondary Color', 'midway'),
				'default' => '#FFFFFF',
				'id' => 'secondary_color',
				'type' => 'color',
			),

			array(	
				'name' => __('Background Image', 'midway'),
				'id' => 'background_image',
				'description' => __('Choose an image from WordPress media library', 'midway'),
				'type' => 'uploader',
			),
			
			array(	
				'name' => __('Background Type', 'midway'),
				'id' => 'background_type',
				'type' => 'select',
				'options' => array(
					'fullwidth' => __('Full Width', 'midway'),
					'tiled' => __('Tiled', 'midway'),
				),
			),
			
			array(	
				'name' => __('Heading Font' ,'midway'),					
				'id' => 'heading_font',
				'default' => 'Signika',
				'type' => 'select_font',
			),

			array(	
				'name' => __('Content Font', 'midway'),
				'id' => 'content_font',
				'default' => 'Open Sans',
				'type' => 'select_font',
			),

			array(	
				'name' => __('Custom CSS', 'midway'),
				'description' => __('Enter custom CSS code to overwrite the default styles', 'midway'),
				'id' => 'css',
				'type' => 'textarea',
			),

		//Header
		array(	
			'name' => __('Header', 'midway'),
			'type' => 'section',
		),
				
			array(	
				'name' => __('Header Layout', 'midway'),
				'id' => 'header_layout',
				'type' => 'select_image',
				'options' => array(
					'left' => THEMEX_URI.'assets/images/layouts/layout-split.png',
					'fullwidth' => THEMEX_URI.'assets/images/layouts/layout-solid.png',
				),
			),
			
			array(	
				'name' => __('Header Text', 'midway'),
				'id' => 'header_text',
				'description' => __('Enter text to show in the theme header', 'midway'),
				'type' => 'textarea',
				'translate' => true,
			),
			
			array(
				'id' => 'ThemexLink',
				'name' => __('Social Links', 'midway'),
				'type' => 'module',
			),
			
		//Slider
		array(	
			'name' => __('Slider', 'midway'),
			'type' => 'section',
		),
			
			array(	
				'name' => __('Slider Type', 'midway'),
				'id' => 'slider_type',
				'type' => 'select',
				'options' => array(
					'fade' => __('Fade Slider', 'midway'),
					'motion' => __('Motion Slider', 'midway'),
				),
			),
					
			array(	
				'name' => __('Slider Pause', 'midway'),
				'default' => '0',
				'id' => 'slider_pause',
				'min_value' => 0,
				'max_value' => 15000,
				'unit'=>'ms',
				'type' => 'slider',
			),
			
			array(	
				'name' => __('Slider Speed', 'midway'),
				'default' => '400',
				'id' => 'slider_speed',
				'min_value' => 0,
				'max_value' => 1000,
				'unit'=>'ms',
				'type' => 'slider',
			),
			
		//Tours
		array(	
			'name' => __('Tours', 'midway'),
			'type' => 'section',
		),
		
			array(	
				'name' => __('Tours Layout', 'midway'),
				'id' => 'tours_layout',
				'type' => 'select_image',
				'options' => array(
					'fullwidth' => THEMEX_URI.'assets/images/layouts/layout-full.png',
					'left' => THEMEX_URI.'assets/images/layouts/layout-left.png',
					'right' => THEMEX_URI.'assets/images/layouts/layout-right.png',				
				),
			),
		
			array(	
				'name' => __('Tours View', 'midway'),
				'id' => 'tours_view',
				'type' => 'select',
				'options' => array(
					'grid' => __('Grid', 'midway'),
					'list' => __('List', 'midway'),
				),
			),
			
			array(	
				'name' => __('Tours Order', 'midway'),
				'id' => 'tours_order',
				'type' => 'select',
				'options' => array(
					'none' => __('None', 'midway'),			
					'date' => __('Date', 'midway'),
					'price' => __('Price', 'midway'),
				),
			),
			
			array(	
				'name' => __('Tours Per Page', 'midway'),
				'id' => 'tours_per_page',
				'type' => 'number',
				'default' => '12',
			),
			
			array(	
				'name' => __('Related Tours Order', 'midway'),
				'id' => 'tours_related_order',
				'type' => 'select',
				'options' => array(
					'random' => __('Random', 'midway'),
					'category' => __('Category', 'midway'),
					'destination' => __('Destination', 'midway'),
					'type' => __('Type', 'midway'),						
				),
			),
			
			array(	
				'name' => __('Related Tours Number', 'midway'),
				'id' => 'tours_related_number',
				'type' => 'number',
				'default' => '4',
			),
			
			array(	
				'name' => __('Date Format', 'midway'),
				'id' => 'date_format',
				'type' => 'select',
				'options' => array(
					'd/m/Y' => 'd/m/Y',
					'm/d/Y' => 'm/d/Y',
					'Y/m/d' => 'Y/m/d',					
				),
			),
			
			array(	
				'name' => __('Currency Symbol', 'midway'),
				'id' => 'currency_symbol',
				'type' => 'text',
				'default' => '$',
			),
			
			array(	
				'name' => __('Currency Position', 'midway'),
				'id' => 'currency_position',
				'type' => 'select',
				'options' => array(
					'left' => __('Left', 'midway'),
					'right' => __('Right', 'midway'),
				),
			),
			
		//Galleries
		array(	
			'name' => __('Galleries', 'midway'),
			'type' => 'section',
		),
		
			array(	
				'name' => __('Galleries Layout', 'midway'),
				'id' => 'galleries_layout',
				'type' => 'select_image',
				'options' => array(					
					'three' => THEMEX_URI.'assets/images/layouts/layout-four.png',
					'four' => THEMEX_URI.'assets/images/layouts/layout-three.png',					
				),
			),
			
			array(	
				'name' => __('Galleries Per Page', 'midway'),
				'id' => 'galleries_per_page',
				'type' => 'number',
				'default' => '12',
			),
			
			array(	
				'name' => __('Galleries Caption', 'midway'),
				'id' => 'galleries_caption',
				'type' => 'select',
				'options' => array(
					'visible' => __('Visible', 'midway'),
					'hidden' => __('Hidden', 'midway'),
					'none' => __('None', 'midway'),
				),
			),
			
		//Search Form
		array(	
			'name' => __('Search Form', 'midway'),
			'type' => 'section',
		),
		
			array(	
				'name' => __('Hide Destination Field', 'midway'),
				'id' => 'search_destination',
				'type' => 'checkbox',
			),
			
			array(	
				'name' => __('Hide Type Field', 'midway'),
				'id' => 'search_type',
				'type' => 'checkbox',
			),
			
			array(	
				'name' => __('Hide Date Fields', 'midway'),
				'id' => 'search_date',
				'type' => 'checkbox',
			),
			
			array(	
				'name' => __('Hide Price Field', 'midway'),
				'id' => 'search_price',
				'type' => 'checkbox',
			),
			
			array(
				'id' => 'ThemexForm',
				'slug' => 'search',
				'type' => 'module',
			),
			
		//Booking Form
		array(	
			'name' => __('Booking Form', 'midway'),
			'type' => 'section',
		),
			
			array(
				'id' => 'ThemexForm',
				'slug' => 'booking',
				'type' => 'module',
			),
			
		//Question Form
		array(	
			'name' => __('Question Form', 'midway'),
			'type' => 'section',
		),
			
			array(
				'id' => 'ThemexForm',
				'slug' => 'question',
				'type' => 'module',
			),
		
		//Contact Form
		array(	
			'name' => __('Contact Form', 'midway'),
			'type' => 'section',
		),
			
			array(
				'id' => 'ThemexForm',
				'slug' => 'contact',
				'type' => 'module',
			),
			
		//Checkout Form
		array(
			'name' => __('Checkout Form', 'midway'),
			'type' => 'section',
		),
		
			array(
				'id' => 'ThemexWoo',
				'type' => 'module',
			),
			
		//Sidebars
		array(	
			'name' => __('Sidebars', 'midway'),
			'type' => 'section',
		),
		
			array(
				'id' => 'ThemexSidebar',
				'type' => 'module',
			),		
	),
	
);