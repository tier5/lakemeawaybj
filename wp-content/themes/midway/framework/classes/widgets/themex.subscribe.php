<?php
class ThemexSubscribe extends WP_Widget {

	//Widget Setup
	function __construct() {
		$widget_ops=array('classname' => 'widget-subscribe', 'description' => __('Mailing list signup form', 'midway'));
		parent::__construct('widget-subscribe', __('Newsletter', 'midway'), $widget_ops);
		$this->alt_option_name='widget-subscribe';
		
		add_action('wp_ajax_themex_subscribe', array(__CLASS__, 'submitData'));
		add_action('wp_ajax_nopriv_themex_subscribe', array(__CLASS__, 'submitData'));
	}

	//Widget View
	function widget( $args, $instance ) {
		extract($args, EXTR_SKIP);
		$instance=wp_parse_args((array)$instance, array(
			'title' => __('Newsletter', 'midway'),
			'description' => '',
		));
		
		$title=apply_filters('widget_title', empty($instance['title'])?__('Newsletter', 'midway'):$instance['title'], $instance, $this->id_base);
		
		$out=$before_widget;
		$out.=$before_title.$title.$after_title;
		
		$out.='<p>'.$instance['description'].'</p>';
		$out.='<form action="'.AJAX_URL.'" method="POST" class="ajax-form">';
		$out.='<div class="message"></div>';
		$out.='<div class="field-container"><input type="text" name="email" placeholder="'.__('Email Address', 'midway').'" /></div>';
		$out.='<input type="submit" name="submit" value="Sign Me Up"  />';
		$out.='<input type="hidden" class="action" value="'.THEMEX_PREFIX.'subscribe" />';
		$out.='</form>';
		
		$out.=$after_widget;
		echo $out;
	}
	
	//Submit Widget
	function submitData() {
		parse_str($_POST['data'], $data);
		
		if(!isset($data['email']) || empty($data['email'])) {
			ThemexInterface::$messages[]=__('Email address is required', 'midway');
			ThemexInterface::renderMessages();
		} else if(!is_email($data['email'])) {
			ThemexInterface::$messages[]=__('Email address is incorrect', 'midway');
			ThemexInterface::renderMessages();
		} else {
			$emails=ThemexCore::getOption('emails');
			if($emails) {
				$emails=explode(', ', $emails);
			} else {
				$emails=array();
			}
			
			if(!in_array($data['email'], $emails)) {
				$emails[]=$data['email'];
				ThemexCore::updateOption('emails', implode(', ', $emails));
				
				ThemexInterface::$messages[]=__('Thank you for subscribing!', 'midway');
				ThemexInterface::renderMessages(true);
			} else {
				ThemexInterface::$messages[]=__('You have already subscribed', 'midway');
				ThemexInterface::renderMessages();
			}
		}
				
		die();
	}

	//Update Widget
	function update($new_instance, $old_instance) {
		$instance=$old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['description'] = $new_instance['description'];
		ThemexCore::updateOption('emails', $new_instance['emails']);
		
		return $instance;
	}
	
	//Widget Form
	function form($instance) {
		$instance=wp_parse_args( (array)$instance, array(
			'title' => '',
			'description' => '',
		));
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'midway'); ?>:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description', 'midway'); ?>:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" rows="3"><?php echo $instance['description']; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('emails'); ?>"><?php _e('Mailing List', 'midway'); ?>:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('emails'); ?>" name="<?php echo $this->get_field_name('emails'); ?>" rows="4"><?php echo ThemexCore::getOption('emails'); ?></textarea>
		</p>
	<?php
	}
}