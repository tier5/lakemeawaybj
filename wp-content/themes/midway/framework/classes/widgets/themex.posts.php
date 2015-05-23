<?php
class ThemexPosts extends WP_Widget {

	//Widget Setup
	function __construct() {
		$widget_ops=array('classname' => 'widget-selected-posts', 'description' => __('Posts from selected category', 'midway'));
		parent::__construct('widget-selected-posts', __('Selected Posts','midway'), $widget_ops);
		$this->alt_option_name='widget-selected-posts';
	}

	//Widget View
	function widget( $args, $instance ) {
		extract($args, EXTR_SKIP);
		$instance=wp_parse_args((array)$instance, array(
			'title' => __('Recent Posts', 'midway'),
			'number' => '3',
			'category' => '0',
			'order' => 'date',
		));
		
		$title=apply_filters( 'widget_title', empty($instance['title'])?__('Recent Posts', 'midway'):$instance['title'], $instance, $this->id_base);
		
		$args=array(
			'post_type' => 'post',
			'orderby' => $instance['order'],
			'showposts' => $instance['number'],
			'cat' => $instance['category'],
		);
		
		$query=new WP_Query($args);
		
		$out=$before_widget;
		$out.=$before_title.$title.$after_title;
		
		ob_start();		
		while ($query->have_posts()) {		
			$query->the_post();
			get_template_part('content', 'post-menu');
		}
		$out.=ob_get_contents();
		ob_end_clean();
		
		$out.=$after_widget;
		echo $out;
	}

	//Update Widget
	function update($new_instance, $old_instance) {
		$instance=$old_instance;
		$instance['title']=$new_instance['title'];
		$instance['order']=$new_instance['order'];
		$instance['category']=$new_instance['category'];
		$instance['number']=intval($new_instance['number']);
		
		return $instance;
	}
	
	//Widget Form
	function form($instance) {
		$instance=wp_parse_args( (array)$instance, array(
			'title' => '',
			'number' => '3',
			'category' => '0',
			'order' => 'date',
		));
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'midway'); ?>:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number', 'midway'); ?>:</label>
			<input class="widefat" type="number" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order', 'midway'); ?>:</label>
			<?php 
			echo ThemexInterface::renderOption(array(
				'id' => $this->get_field_name('order'),
				'type' => 'select',
				'value' => $instance['order'],
				'wrap' => false,
				'options' => array(
					'date' => __('Date', 'midway'),
					'rand' => __('Random', 'midway'),					
				),
				'attributes' => array(
					'class' => 'widefat',
				),
			));
			?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category', 'midway'); ?>:</label>
			<?php 
			echo ThemexInterface::renderOption(array(
				'id' => $this->get_field_name('category'),
				'type' => 'select_category',
				'value' => $instance['category'],
				'taxonomy' => 'category',
				'wrap' => false,
				'attributes' => array(
					'class' => 'widefat',
				),
			));
			?>
		</p>
	<?php
	}
}