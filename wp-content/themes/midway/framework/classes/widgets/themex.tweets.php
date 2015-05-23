<?php
class ThemexTweets extends WP_Widget {

	//Widget Setup
	function __construct() {
		$widget_ops=array('classname' => 'widget-twitter', 'description' => __('Shows your recent tweets', 'midway'));
		parent::__construct('widget-twitter', __('Recent Tweets','midway'), $widget_ops);
		$this->alt_option_name='widget-twitter';
	}

	//Widget View
	function widget( $args, $instance ) {
		extract($args, EXTR_SKIP);
		$instance=wp_parse_args((array)$instance, array(
			'title' => __('Recent Tweets', 'midway'),
			'number' => '3',
			'id' => '',
		));
		
		$title=apply_filters('widget_title', empty($instance['title'])?__('Recent Tweets', 'midway'):$instance['title'], $instance, $this->id_base);
		
		$out=$before_widget;
		$out.=$before_title.$title.$after_title;
		
		$out.='<div id="tweets"></div>';
		$out.='<input type="hidden" class="twitter-id" value="'.$instance['id'].'" />';
		$out.='<input type="hidden" class="twitter-number" value="'.$instance['number'].'" />';
		
		$out.=$after_widget;
		echo $out;
	}

	//Update Widget
	function update($new_instance, $old_instance) {
		$instance=$old_instance;
		$instance['title']=$new_instance['title'];
		$instance['id']=$new_instance['id'];
		$instance['number']=intval($new_instance['number']);
		
		return $instance;
	}
	
	//Widget Form
	function form($instance) {
		$instance=wp_parse_args( (array)$instance, array(
			'title' => '',
			'id' => '',
			'number' => '3',
		));
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'midway'); ?>:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Widget ID', 'midway'); ?>:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" value="<?php echo $instance['id']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number', 'midway'); ?>:</label>
			<input class="widefat" type="number" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
	<?php
	}
}