<?php ob_start();?>
<?php
/*
Plugin Name: Dynamic Sidebar Menu
Plugin URI: http://sutlej.net/downloads/dynamic-sidebar-menu/
Description: Grabs custom menu name from page/post to display the custom sidebar menu 
Author: Rana Mansoor Akbar Khan
Version: 0.0.2
Author URI: http://www.sutlej.net/
*/

class DynaSidebarMenuWidget extends WP_Widget
{
function DynaSidebarMenuWidget()
  {
    $widget_ops = array('classname' => 'DynaSidebarMenuWidget', 'description' => 'Grabs custom menu name from page or post to display the custom menu on your sidebar' );
    $this->WP_Widget('DynaSidebarMenuWidget', 'Dynamic Side Menu', $widget_ops);
  }
 
function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ,'default' => '' ) );
     $title = $instance['title'];
	 $default= $instance['default'];
	 $nav_menu = $instance['nav_menu'];
	 $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
?><p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('default'); ?>">Custom Field Name: <input class="widefat" id="<?php echo $this->get_field_id('default'); ?>" name="<?php echo $this->get_field_name('default'); ?>" type="text" value="<?php echo attribute_escape($default); ?>" /></label></p>
  <p class="p-<?php echo $this->get_field_id('nav_menu'); ?>"  ><?php // If no menus exists, direct the user to go and create some.
			if ( !$menus ) {
				?>
				<p class="p-<?php echo $this->get_field_id('nav_menu'); ?>" ><?php
				printf( __('No menus have been created yet. <a href="%s">Create some</a>.', THEME_NS), admin_url('nav-menus.php') );
				?>
				</p>
				<?php
			} else { ?>
			<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Fallback Menu:', THEME_NS); ?></label><br />
			<select class="widefat" id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>"><?php 
			}
			foreach ( $menus as $menu ) {
				$selected = $nav_menu == $menu->name ? ' selected="selected"' : '';
				echo '<option'. $selected .' value="'. $menu->name .'">'. $menu->name .'</option>';
			}
		?></select>
		</p><?php
  }
function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['default'] = $new_instance['default'];
    $instance['nav_menu'] = $new_instance['nav_menu'];
		return $instance;
  }
function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $default =  $instance['default'];
	$nav_menu =  $instance['nav_menu'];
    if (!empty($title))
      echo $before_title . $title . $after_title;;
//Determine if cutom field is defined or not
$field_set = false;
$custom_field_keys = get_post_custom_keys(get_the_ID());
if ($custom_field_keys) {
if(in_array($default, $custom_field_keys)) {
$field_set = true;
}
}
// check if custom field is set
if ($field_set) {
$menu_name =  get_post_meta(get_the_ID(), $default, true);
   	echo $menu_name;
} else {    
$menu_name = $nav_menu;
	echo $menu_name;
}//check ends
?><style type="text/css"></style><?php
//Display the menu
 $defaults = array(
	'theme_location'  => '',
	'menu'            => $menu_name, 
	'container'       => '', 
	'container_class' => '', 
	'container_id'    => '',
	'menu_class'      => 'art-vmenu', 
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '<span class="art-vmenu-separator-span"> </span>',
	'items_wrap'      => '<ul id="%1$s" class="art-vmenu mak">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);  

 wp_nav_menu($defaults); 
	/* 
	echo theme_get_menu(array(
					'source' => 'Custom Menu',
					'depth' => 0,
					'menu' => wp_get_nav_menu_object($menu_name),
					'class' => 'art-vmenu'
				));
	echo $after_widget;
	*/
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("DynaSidebarMenuWidget");') );
?>