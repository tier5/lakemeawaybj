<?php
/**
 * Themex Form
 *
 * Handles custom forms
 *
 * @class ThemexForm
 * @author Themex
 */
 
class ThemexForm {

	/** @var array Contains module data. */
	public static $data;

	/**
	 * Adds actions and filters
     *
     * @access public
     * @return void
     */
	public static function init() {
	
		//refresh data
		self::refresh();
		
		//add field action
		add_action('wp_ajax_themex_form_add', array(__CLASS__, 'addField'));
		
		//submit form action
		add_action('wp_ajax_themex_form_submit', array(__CLASS__, 'submitData'));
		add_action('wp_ajax_nopriv_themex_form_submit', array(__CLASS__, 'submitData'));
	}
	
	/**
	 * Refreshes module data
     *
     * @access public
     * @return void
     */
	public static function refresh() {
		self::$data=ThemexCore::getOption(__CLASS__);
	}
	
	/**
	 * Renders module settings
     *
     * @access public
	 * @param string $slug
     * @return string
     */
	public static function renderSettings($slug) {
		global $post;
		$out='';
		
		if(get_post_type()=='tour') {			
			if(self::isActive($slug)) {
				foreach(self::$data[$slug]['fields'] as $field) {
					$field['name']=themex_stripslashes($field['name']);
					$ID=themex_sanitize_key($field['name']);
					
					$items=array('0' => '&ndash;');
					if($field['type']=='select') {
						$items=array_merge($items, explode(',', themex_stripslashes($field['options'])));
					}
					
					$out.='<tr><th><h4 class="themex-meta-title">'.$field['name'].'</h4></th><td>';
					
					$out.=ThemexInterface::renderOption(array(
						'id' => '_'.THEMEX_PREFIX.$ID,
						'type' => $field['type'],
						'options' => $items,
						'value' => ThemexCore::getPostMeta($post->ID, $ID),
					));

					$out.='</td></tr>';
				}
			}
		} else {
			if($slug!='search') {
				$out.=ThemexInterface::renderOption(array(
					'id' => __CLASS__.'['.$slug.'][email]',
					'name' => __('Form Email', 'midway'),
					'type' => 'text',
					'description' => __('Enter email address to use instead of the default email address', 'midway'),
					'value' => isset(self::$data[$slug]['email'])?self::$data[$slug]['email']:'',
				));
				
				$out.=ThemexInterface::renderOption(array(
					'id' => __CLASS__.'['.$slug.'][description]',
					'name' => __('Form Description', 'midway'),
					'type' => 'textarea',
					'description' => __('Enter form description to show before the form fields', 'midway'),
					'value' => isset(self::$data[$slug]['description'])?themex_stripslashes(self::$data[$slug]['description']):'',
				));
				
				$out.=ThemexInterface::renderOption(array(
					'id' => __CLASS__.'['.$slug.'][message]',
					'name' => __('Form Message', 'midway'),
					'type' => 'textarea',
					'description' => __('Enter form message to show when form is submitted', 'midway'),
					'value' => isset(self::$data[$slug]['message'])?themex_stripslashes(self::$data[$slug]['message']):'',
				));
				
				$out.=ThemexInterface::renderOption(array(
					'id' => __CLASS__.'['.$slug.'][captcha]',
					'name' => __('Enable Captcha', 'midway'),
					'type' => 'checkbox',
					'value' => isset(self::$data[$slug]['captcha'])?self::$data[$slug]['captcha']:'',
				));
			}
			
			$out.=ThemexInterface::renderOption(array(
				'name' => __('Form Fields', 'midway'),
				'type' => 'title',
			));
			
			if(isset(self::$data[$slug]['fields']) && is_array(self::$data[$slug]['fields'])) {			
				foreach(self::$data[$slug]['fields'] as $ID=>$field) {					
					$field['form']=$slug;
					$field['id']=$ID;
					$out.=self::renderField($field);
				}
			} else {
				$out.=self::renderField(array(
					'id' => uniqid(),
					'name' => '',
					'type' => 'string',
					'form' => $slug,
				));
			}
		}		
			
		return $out;
	}
	
	/**
	 * Saves module settings
     *
     * @access public
	 * @param array $data
     * @return void
     */
	public static function saveSettings($data) {
		if(is_array($data)) {
			foreach($data as $slug => $form) {
				if(isset($form['fields']) && is_array($form['fields'])) {
					foreach($form['fields'] as $field) {
						$ID=themex_sanitize_key($field['name']);
						if(isset($field['name'])) {
							themex_add_string($ID, 'name', $field['name']);
						}
						
						if(isset($field['options'])) {
							themex_add_string($ID, 'options', $field['options']);
						}
					}
				}
				
				if(isset($form['description'])) {
					themex_add_string($slug, 'description', $form['description']);
				}
				
				if(isset($form['message'])) {
					themex_add_string($slug, 'message', $form['message']);
				}
			}
		}
	}
	
	/**
	 * Renders module data
     *
     * @access public
	 * @param string $slug
	 * @param string $format
	 * @param array $values
     * @return string
     */
	public static function renderData($slug, $format,  $values=array()) {
		$out='';
		$counter=0;
		
		if(self::isActive($slug)) {
			if($format!='search') {
				if(isset(self::$data[$slug]['description'])) {
					$description=themex_get_string($slug, 'description', self::$data[$slug]['description']);
					$out.='<p>'.$description.'</p>';
				}
				
				$out.='<div class="message"></div>';
			}
			
			foreach(self::$data[$slug]['fields'] as $field) {				
				$ID=themex_sanitize_key($field['name']);
				$field['name']=themex_get_string($ID, 'name', $field['name']);
				$counter++;

				if($format!='search') {
					if($field['type']=='textarea') {
						$out.='<div class="clear"></div>';
					} else {
						$out.='<div class="sixcol column ';
					
						if($counter%2==0) {
							$out.='last"><div class="clear"></div>';
						} else {
							$out.='">';
						}
					}					
				}
				
				$items=array('0' => $field['name']);
				if($field['type']=='select') {
					$field['options']=themex_get_string($ID, 'options', $field['options']);
					$items=array_merge($items, explode(',', $field['options']));
					$out.='<div class="select-field"><span></span>';
				} else {
					$out.='<div class="field-container">';
				}
				
				$args=array(
					'id' => $ID,
					'type' => $field['type'],
					'options' => $items,
					'wrap' => false,
				);
				
				if(in_array($field['type'], array('email', 'number'))) {
					$args['type']='text';
				}
				
				if($field['type']=='checkbox') {
					$args['name']=$field['name'];
				}
				
				if($format=='search') {
					if($field['type']=='select') {
						$args['value']=$field['name'];
						if(isset($values[$ID])) {
							$args['value']=$values[$ID];
						} else if($field['type']=='select') {
							$args['value']=0;
						}
					} else {
						$args['value']=isset($values[$ID])?$values[$ID]:$field['name'];
					}
				} else {
					$args['attributes']=array(
						'placeholder' => $field['name'],
					);
				}
			
				$out.=ThemexInterface::renderOption($args);
				
				$out.='</div>';
				if($format!='search' && $field['type']!='textarea') {
					$out.='</div>';
				}
			}
			
			if(isset(self::$data[$slug]['captcha'])) {
				$out.='<div class="captcha clearfix">';
				$out.='<img src="'.THEMEX_URI.'assets/images/captcha/captcha.php" alt="" />';
				$out.='<input type="text" name="captcha" id="captcha" size="6" value="" placeholder="'.__('Code', 'midway').'" /></div>';
			}
		}
		
		echo $out;
	}
	
	/**
	 * Saves module data
     *
     * @access public
	 * @param string $slug
     * @return void
     */
	public static function saveData($slug) {
		global $post;
		
		if(self::isActive($slug)) {
			foreach(self::$data[$slug]['fields'] as $field) {
				$ID=themex_sanitize_key($field['name']);
				
				if(isset($_POST['_'.THEMEX_PREFIX.$ID])) {				
					ThemexCore::updatePostMeta($post->ID, $ID, themex_stripslashes($_POST['_'.THEMEX_PREFIX.$ID]));						
				}
			}
		}
	}
	
	/**
	 * Adds new field
     *
     * @access public
     * @return void
     */
	public static function addField() {
		$slug=sanitize_text_field($_POST['value']);
		$out=self::renderField(array(
			'id' => uniqid(),
			'name' => '',
			'type' => 'string',
			'form' => $slug,
		));
		
		echo $out;		
		die();
	}
	
	/**
	 * Renders field option
     *
     * @access public
	 * @param array $field
     * @return string
     */
	public static function renderField($field) {
		$out='<div class="themex-form-item themex-option" id="'.$field['form'].'_'.$field['id'].'">';
		$out.='<a class="themex-button themex-remove-button themex-trigger" title="'.__('Remove', 'midway').'" data-action="themex_form_remove" data-element="'.$field['form'].'_'.$field['id'].'"></a>';
		
		$out.=ThemexInterface::renderOption(array(
			'id' => $field['form'].'_'.$field['id'].'_value',
			'type' => 'hidden',
			'value' => $field['form'],
			'wrap' => false,
			'after' => '<a class="themex-button themex-add-button themex-trigger" title="'.__('Add', 'midway').'" data-action="themex_form_add" data-element="'.$field['form'].'_'.$field['id'].'" data-value="'.$field['form'].'_'.$field['id'].'_value"></a>',				
		));
		
		$out.=ThemexInterface::renderOption(array(
			'id' => __CLASS__.'['.$field['form'].'][fields]['.$field['id'].'][name]',
			'type' => 'text',
			'attributes' => array('placeholder' => __('Name', 'midway')),
			'value' => isset(self::$data[$field['form']]['fields'][$field['id']]['name'])?themex_stripslashes(self::$data[$field['form']]['fields'][$field['id']]['name']):'',
			'wrap' => false,
		));
	
		if($field['form']=='search') {
			$out.=ThemexInterface::renderOption(array(
				'id' => __CLASS__.'['.$field['form'].'][fields]['.$field['id'].'][type]',
				'type' => 'select',
				'options' => array(
					'text' => __('String', 'midway'),
					'date' => __('Date', 'midway'),
					'select' => __('Select', 'midway'),			
				),
				'value' => isset(self::$data[$field['form']]['fields'][$field['id']]['type'])?self::$data[$field['form']]['fields'][$field['id']]['type']:'',
				'wrap' => false,
			));
		} else {
			$out.=ThemexInterface::renderOption(array(
				'id' => __CLASS__.'['.$field['form'].'][fields]['.$field['id'].'][type]',
				'type' => 'select',
				'options' => array(
					'text' => __('String', 'midway'),
					'number' => __('Number', 'midway'),
					'email' => __('Email', 'midway'),
					'date' => __('Date', 'midway'),
					'textarea' => __('Text', 'midway'),					
					'select' => __('Select', 'midway'),
					'checkbox' => __('Checkbox', 'midway'),
				),
				'value' => isset(self::$data[$field['form']]['fields'][$field['id']]['type'])?self::$data[$field['form']]['fields'][$field['id']]['type']:'',
				'wrap' => false,
			));
		}
		
		$out.=ThemexInterface::renderOption(array(
			'id' => __CLASS__.'['.$field['form'].'][fields]['.$field['id'].'][options]',
			'type' => 'text',
			'attributes' => array('placeholder' => __('Options', 'midway')),
			'value' => isset(self::$data[$field['form']]['fields'][$field['id']]['options'])?themex_stripslashes(self::$data[$field['form']]['fields'][$field['id']]['options']):'',
			'wrap' => false,
		));
		
		if($field['form']!='search') {
			$out.=ThemexInterface::renderOption(array(
				'id' => __CLASS__.'['.$field['form'].'][fields]['.$field['id'].'][optional]',
				'name' => __('Optional', 'midway'),
				'type' => 'checkbox',
				'value' => isset(self::$data[$field['form']]['fields'][$field['id']]['optional'])?self::$data[$field['form']]['fields'][$field['id']]['optional']:'',
				'wrap' => false,
				'before' => '<div class="clear"></div>',
			));
		}
		
		$out.='</div>';
		
		return $out;
	}
	
	/**
	 * Submits form data
     *
     * @access public
     * @return void
     */
	public static function submitData() {
		self::refresh();
		parse_str($_POST['data'], $data);		
		
		if(isset($data['slug']) && self::isActive($data['slug'])) {
			if(isset(self::$data[$data['slug']]['captcha'])) {
				session_start();
				$posted_code=md5($data['captcha']);
				$session_code=$_SESSION['captcha'];
				
				if($session_code!= $posted_code) {
					ThemexInterface::$messages[]=__('The verification code is incorrect', 'midway');
				}
			}
			
			foreach(self::$data[$data['slug']]['fields'] as $field) {
				$ID=themex_sanitize_key($field['name']);
				$field['name']=themex_get_string($ID, 'name', $field['name']);
				
				if(((!isset($data[$ID]) || trim($data[$ID])=='') || ($field['type']=='select' && $data[$ID]==0)) && $field['type']!='checkbox' && !isset($field['optional'])) {
					ThemexInterface::$messages[]='"'.$field['name'].'" '.__('field is required', 'midway');
				} else {
					if($field['type']=='number' && !is_numeric($data[$ID])) {
						ThemexInterface::$messages[]='"'.$field['name'].'" '.__('field can only contain numbers', 'midway');
					}
					
					if($field['type']=='email' && !is_email($data[$ID])) {
						ThemexInterface::$messages[]=__('You have entered an invalid email address', 'midway');
					}
				}
			}
			
			if(!empty(ThemexInterface::$messages)) {
				ThemexInterface::renderMessages();
			} else {
				$subject=__('Contact', 'midway');
				if($data['slug']=='booking') {
					$subject=__('Booking', 'midway');
				} else if($data['slug']=='question') {
					$subject=__('Question', 'midway');
				}
				
				$message='';
				if(in_array($data['slug'], array('booking', 'question'))) {
					$message.=__('Tour', 'midway').': '.get_the_title($data['id']).'<br />';
				}
				
				foreach(self::$data[$data['slug']]['fields'] as $field) {
					$ID=themex_sanitize_key($field['name']);
					
					if($field['type']=='checkbox') {
						if(isset($data[$ID])) {
							$data[$ID]=__('Yes', 'midway');
						} else {
							$data[$ID]=__('No', 'midway');
						}
					} else if($field['type']=='select') {
						$items=explode(',', $field['options']);
						if(isset($items[$data[$ID]-1])) {
							$data[$ID]=$items[$data[$ID]-1];
						} else {
							$data[$ID]='&ndash;';
						}			
					}
				
					$message.=$field['name'].': '.$data[$ID].'<br />';
				}
				
				$email=get_option('admin_email');
				if(!empty(self::$data[$data['slug']]['email'])) {
					$email=self::$data[$data['slug']]['email'];
				}
				
				$product='';
				if($data['slug']=='booking') {
					$product=ThemexCore::getPostMeta($data['id'], 'product');
				}
		
				if(themex_mail($email, $subject, $message)) {
					if(ThemexWoo::isActive() && !empty($product)) {			
						ThemexWoo::addProduct($product);
						ThemexInterface::$messages[]='<a href="'.ThemexWoo::getURL('checkout').'" class="redirect"></a>';
					} else if(isset(self::$data[$data['slug']]['message'])) {
						$message=themex_get_string($data['slug'], 'message', self::$data[$data['slug']]['message']);
						ThemexInterface::$messages[]=$message;
					}
				}
				
				ThemexInterface::renderMessages(true);					
			}
		}
		
		die();
	}
	
	/**
	 * Checks form activity
     *
     * @access public
	 * @param string $slug
     * @return bool
     */
	public static function isActive($slug) {
		if(isset(self::$data[$slug]['fields']) && !empty(self::$data[$slug]['fields'])) {
			$field=reset(self::$data[$slug]['fields']);
			if(!empty($field['name'])) {
				return true;
			}			
		}
		
		return false;
	}
}