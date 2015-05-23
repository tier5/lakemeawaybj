<?php
/**
 * Themex Interface
 *
 * Renders pages and options
 *
 * @class ThemexInterface
 * @author Themex
 */
 
class ThemexInterface {

	/** @var array Contains an array of messages. */
	public static $messages;

	/**
	 * Adds actions and filters
     *
     * @access public
     * @return void
     */
	public static function init() {
	
		//add options page
		add_action('admin_menu', array(__CLASS__,'addPage'));
		
		//render thickbox				
		add_action('admin_init', array(__CLASS__,'renderTB'));
		
		//render embed
		add_filter('embed_oembed_html', array(__CLASS__,'renderEmbed'), 99, 4 );
		
		//render footer				
		add_action('wp_footer', array(__CLASS__,'renderFooter'));
		
		//render comment form
		add_filter('comment_form_defaults', array(__CLASS__,'renderCommentForm'));
		
		//render user toolbar
		add_filter('show_admin_bar', array(__CLASS__,'renderToolbar'));
	}
	
	/**
	 * Renders thickbox page
     *
     * @access public
     * @return void
     */
	public static function renderTB() {
		if(isset($_GET['themex_uploader'])) {
			add_filter('media_upload_tabs', array(__CLASS__,'filterTBTabs'));
			add_filter('attachment_fields_to_edit', array(__CLASS__,'renderTBUploader'), 10, 2);
		}
	}	
	
	/**
	 * Filters thickbox tabs
     *
     * @access public
	 * @param array $tabs
     * @return array
     */
	public static function filterTBTabs($tabs) {
		unset($tabs['type_url'], $tabs['gallery']);
    	return $tabs;
	}	
	
	/**
	 * Filters thickbox uploader
     *
     * @access public
	 * @param array $fields
	 * @param object $post
     * @return array
     */
	public static function renderTBUploader($fields, $post) {
		
		//save fields
		$filename=basename($post->guid);
		$attachment_id=$post->ID;
		$attachment['post_title']='';
		$attachment['url']=$fields['image_url']['value'];
		$attachment['post_excerpt']='';
		
		//unset fields
		unset($fields);
		
		//send button
		$send_button="<input type='submit' class='button' name='send[$attachment_id]' value='".__( 'Insert This Item' , 'midway' )."' />&nbsp;&nbsp;&nbsp;";
		$send_button.="<input type='radio' checked='checked' value='full' id='image-size-full-$attachment_id' name='attachments[$attachment_id][image-size]' style='display:none;' />";
		$send_button.="<input type='hidden' value='' name='attachments[$attachment_id][post_title]' id='attachments[$attachment_id][post_title]' />";
		$send_button.="<input type='hidden' value='$attachment[url]' class='themex_image_url' name='attachments[$attachment_id][url]' id='attachments[$attachment_id][url]' />";
		$send_button.="<input type='hidden' value='' name='attachments[$attachment_id][post_excerpt]' id='attachments[$attachment_id][post_excerpt]' />";
		$fields['buttons']=array( 'tr' => "\t\t<tr class='submit'><td></td><td class='savesend'>$send_button</td></tr>\n" );
		
		return $fields;
	}
	
	/**
	 * Renders embedded video
     *
     * @access public
	 * @param string $html
     * @return string
     */
	public static function renderEmbed($html) {
		return '<div class="embedded-video">'.$html.'</div>';
	}
	
	/**
	 * Filter embedded video
     *
     * @access public
	 * @param string $content
     * @return string
     */
	public static function filterEmbed($url) {
		$html=wp_oembed_get($url[0]);	
		if($html) {
			$html=apply_filters('embed_oembed_html', $html);
		} else {
			$html=$url[0];
		}
		
		return $html;
	}
	
	/**
	 * Adds options page to menu
     *
     * @access public
     * @return void
     */
	public static function addPage() {
		add_theme_page(__('Theme Options','midway'), __('Theme Options','midway'), 'administrator', 'theme-options', array(__CLASS__,'renderPage'));
	}
	
	/**
	 * Renders options page
     *
     * @access public
     * @return void
     */
	public static function renderPage() {	
		include(THEMEX_PATH.'templates/index.php');		
	}
	
	/**
	 * Renders options page menu
     *
     * @access public
     * @return void
     */
	public static function renderMenu() {
		
		$out='<ul>';	
		
		foreach(ThemexCore::$options as $option) {
			if($option['type']=='section') {
				$out.='<li><a href="#'.themex_sanitize_key($option['name']).'">'.$option['name'].'</a></li>';
			}			
		}		
		
		$out.='</ul>';
		
		echo $out;		
	}
	
	/**
	 * Renders page sections
     *
     * @access public
     * @return void
     */
	public static function renderSections() {
	
		$first=true;
		$out='';
	
		foreach(ThemexCore::$options as $option) {
			
			if($option['type']=='section') {
				if($first) {
					$first=false;
				} else {
					$out.='</div>';
				}
				
				$out.='<div class="themex-section" id="'.themex_sanitize_key($option['name']).'"><h2>'.$option['name'].'</h2>';
			} else {
				$option['id']=THEMEX_PREFIX.$option['id'];
				$out.=self::renderOption($option);
			}
		}

		$out.='</div>';
		
		echo $out;		
	}
	
	/**
	 * Renders metabox
     *
     * @access public
     * @return void
     */
	public static function renderMetabox() {
	
		global $post;
		
		//create nonce
		$out='<input type="hidden" name="themex_nonce" value="'.wp_create_nonce($post->ID).'" />'; 
		$out.='<table class="themex-metabox">';
		
		//render metabox
		foreach(ThemexCore::$components['meta_boxes'] as $meta_box) {
			if($meta_box['page']==$post->post_type) {
				foreach($meta_box['options'] as $option) {					
					
					//get option value
					$option['value']=ThemexCore::getPostMeta($post->ID, $option['id']);

					//render option
					if($option['type']=='module') {
						$option['wrap']=false;
						$out.=self::renderOption($option);
					} else {
						$option['id']='_'.THEMEX_PREFIX.$option['id'];						
						$out.='<tr><th><h4 class="themex-meta-title">'.$option['name'].'</h4></th><td>'.self::renderOption($option).'</td></tr>';
					}					
				}
			}
		}
		
		$out.='</table>';
		
		echo $out;
	}
	
	/**
	 * Renders option
     *
     * @access public
	 * @param array $option
     * @return string
     */
	public static function renderOption($option) {
	
		global $post, $wp_registered_sidebars, $wp_locale;
		$out='';
	
		//option wrapper
		if(!isset($option['wrap']) || $option['wrap']) {
			$out.='<div class="themex-option themex-'.str_replace('_', '-', $option['type']).'">';
			
			if(isset($option['name']) && $option['type']!='checkbox') {
				$out.='<h3 class="themex-option-title">'.$option['name'].'</h3>';
			}
		}
		
		//option before
		if(isset($option['before'])) {
			$out.=$option['before'];
		}
		
		//option description
		if(isset($option['description'])) {
			$out.='<div class="themex-tooltip"><div class="themex-tooltip-icon"></div><div class="themex-tooltip-text">'.$option['description'].'</div></div>';
		}
		
		//option attributes
		$attributes='';
		if(isset($option['attributes'])) {
			foreach($option['attributes'] as $name=>$value) {
				$attributes.=$name.'="'.$value.'" ';
			}
		}	
		
		//option value		
		if(!isset($option['value'])) {
			$option['value']='';
			if(isset($option['id'])) {
				$option['value']=themex_stripslashes(get_option($option['id']));
				if(($option['value']===false || $option['value']=='') && isset($option['default'])) {
					$option['value']=themex_stripslashes($option['default']);
				}
			} else if(isset($option['default'])) {
				$option['value']=themex_stripslashes($option['default']);
			}
		}		
		
		switch($option['type']) {
		
			//text field
			case 'text':
				$out.='<input type="text" id="'.$option['id'].'" name="'.$option['id'].'" value="'.$option['value'].'" '.$attributes.' />';
			break;
			
			//number field
			case 'number':
				$out.='<input type="number" id="'.$option['id'].'" name="'.$option['id'].'" value="'.abs(intval($option['value'])).'" '.$attributes.' />';
			break;
			
			//date field
			case 'date':
				$out.='<input type="text" id="'.$option['id'].'" name="'.$option['id'].'" value="'.$option['value'].'" class="date-field" '.$attributes.' />';
			break;
			
			//hidden field
			case 'hidden':
				$out.='<input type="hidden" id="'.$option['id'].'" name="'.$option['id'].'" value="'.$option['value'].'" '.$attributes.' />';
			break;
			
			//message field
			case 'textarea':
				$out.='<textarea id="'.$option['id'].'" name="'.$option['id'].'" '.$attributes.'>'.$option['value'].'</textarea>';
			break;
			
			//checkbox
			case 'checkbox':
				$checked='';
				if($option['value']=='true') {
					$checked='checked="checked"';
				}
				
				$out.='<input type="checkbox" id="'.$option['id'].'" name="'.$option['id'].'" value="true" '.$checked.' '.$attributes.' />';
				
				if(isset($option['name'])) {
					$out.='<label for="'.$option['id'].'">'.$option['name'].'</label>';
				}				
			break;
			
			//colorpicker
			case 'color':
				$out.='<input name="'.$option['id'].'" id="'.$option['id'].'" type="text" value="'.$option['value'].'" class="themex-colorpicker" />';
			break;
			
			//uploader
			case 'uploader':
				$out.='<input name="'.$option['id'].'" id="'.$option['id'].'" type="text" value="'.$option['value'].'" '.$attributes.' />';
				$out.='<a class="button themex-upload-button">'.__('Browse','midway').'</a>';
			break;
			
			//images selector
			case 'select_image':
				foreach($option['options'] as $name=>$src) {
					$out.='<image src="'.$src.'" ';
					
					if($name==$option['value']) {
						$out.='class="current"';
					}
					
					$out.=' data-value="'.$name.'" />';
				}
				
				$out.='<input type="hidden" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$option['value'].'" '.$attributes.' />';
			break;
			
			//custom dropdown
			case 'select':
				$out.='<select id="'.$option['id'].'" name="'.$option['id'].'" '.$attributes.'>';
				
				if(isset($option['options'])) {
					foreach($option['options'] as $name=>$title) {
						$selected='';
						if($option['value']!='' && ($name==$option['value'] || (is_array($option['value']) && in_array($name, $option['value'])))) {
							$selected='selected="selected"';
						}
						
						$out.='<option value="'.$name.'" '.$selected.'>'.$title.'</option>';
					}
				}
				
				$out.='</select>';
			break;
			
			//fonts dropdown
			case 'select_font':
				$options=ThemexCore::$components['fonts'];
				asort($options);
				
				$out.=self::renderOption(array(
					'id' => $option['id'],
					'type' => 'select',
					'wrap' => false,
					'default' => $option['value'],
					'options' => $options,
				));
			break;
			
			//pages dropdown
			case 'select_page':
				$args=array(
					'selected' => $option['value'],
					'echo' => 0,
					'name' => $option['id'],
					'id' => $option['id'],
				);
				
				$out.=wp_dropdown_pages($args);
			break;
			
			//posts dropdown
			case 'select_post':				
				$atts=array(
					'numberposts'=> -1,
					'post_type' => $option['post_type'], 
					'orderby' => 'title',
					'order' => 'ASC',
					'post__not_in' => array($post->ID),
				);
				
				if(!current_user_can('manage_options')) {
					$atts['author']=get_current_user_id();
				}
				
				$items=get_posts($atts);
				
				$out.='<select id="'.$option['id'].'" name="'.$option['id'].'" '.$attributes.'>';
				$out.='<option value="0">'.__('None', 'midway').'</option>';
				
				foreach($items as $item) {
					$selected='';
					if($item->ID==$option['value']) {
						$selected='selected="selected"';
					}
					
					$out.='<option value="'.$item->ID.'" '.$selected.'>'.$item->post_title.'</option>';
				}
				
				$out.='</select>';
			break;
			
			//sidebars dropdown
			case 'select_sidebar':
				$sidebars=array();	
				foreach($wp_registered_sidebars as $sidebar) {
					$sidebars[$sidebar['name']]=$sidebar['name'];
				}
				
				$out.=self::renderOption(array(
					'id' => $option['id'],
					'type' => 'select',
					'wrap' => false,
					'options' => $sidebars,
				));
			break;
			
			//categories dropdown
			case 'select_category':			
				$args=array(
					'hide_empty' => 0,
					'echo'=> 0,
					'selected' => $option['value'],
					'show_option_all' => __('None', 'midway'),
					'hierarchical' => 0, 
					'name' => $option['id'],
					'id' => $option['id'],
					'depth' => 0,
					'tab_index' => 0,
					'taxonomy' => $option['taxonomy'],
					'hide_if_empty' => false,
				);
				
				if(isset($option['attributes'])) {
					$args['class']=$option['attributes']['class'];
				}
				
				$out.= wp_dropdown_categories($args);
			break;
			
			//range slider
			case 'slider':
				$out.='<div class="themex-slider-controls"></div><div class="themex-slider-value"></div>';
				$out.='<input type="hidden" class="slider-max" value="'.$option['max_value'].'" />';
				$out.='<input type="hidden" class="slider-min" value="'.$option['min_value'].'" />';
				$out.='<input type="hidden" class="slider-unit" value="'.$option['unit'].'" />';
				$out.='<input type="hidden" class="slider-value" name="'.$option['id'].'" id="'.$option['id'].'"  value="'.$option['value'].'" />';
			break;
			
			//week days
			case 'days':
				$days=array('mo', 'tu', 'we', 'th', 'fr', 'sa', 'su');
				$week=array(						
					__('Monday', 'midway'), 
					__('Tuesday', 'midway'), 
					__('Wednesday', 'midway'), 
					__('Thursday', 'midway'), 
					__('Friday', 'midway'), 
					__('Saturday', 'midway'),
					__('Sunday', 'midway'), 
				);
				
				foreach($week as $index=>$day) {
					$out.=self::renderOption(array(
						'id' => $option['id'].'['.$days[$index].']',
						'name' => $day,
						'type' => 'checkbox',
					));
				}
			break;
			
			//module settings
			case 'module':
				$out.='<div class="'.substr(strtolower(implode('-', preg_split('/(?=[A-Z])/', str_replace(THEMEX_PREFIX, '', $option['id'])))), 1).'">';
				if(isset($option['slug'])) {
					$out.=call_user_func(array(str_replace(THEMEX_PREFIX, '', $option['id']), 'renderSettings'), $option['slug']);
				} else {
					$out.=call_user_func(array(str_replace(THEMEX_PREFIX, '', $option['id']), 'renderSettings'));
				}		
				$out.='</div>';
			break;
		}
		
		//option after
		if(isset($option['after'])) {
			$out.=$option['after'];
		}
		
		//wrap option
		if(!isset($option['wrap']) || $option['wrap']) {
			$out.='</div>';
		}
		
		return $out;
	}
	
	/**
	 * Renders dropdown menu
     *
     * @access public
	 * @param string $slug
     * @return void
     */
	public static function renderDropdownMenu($slug) {
		$locations = get_nav_menu_locations();		
		$menu=wp_get_nav_menu_object($locations[$slug]);
		
		if(isset($menu->term_id)) {		
			$menu_items=wp_get_nav_menu_items($menu->term_id);
			
			$out= '<select>';
			foreach ( (array) $menu_items as $key => $menu_item ) {
				$out.='<option value="'.$menu_item->url.'">'.$menu_item->title.'</option>';
			}
			$out.='</select>';
			
			echo $out;			
		} else {
			wp_dropdown_pages();
		}
	}
	
	/**
	 * Renders comment
     *
     * @access public
	 * @param mixed $comment
	 * @param array $args
	 * @param int $depth
     * @return void
     */
	public static function renderComment($comment, $args, $depth) {
		$GLOBALS['comment']=$comment;
		$GLOBALS['depth']=$depth;
		get_template_part('content', 'comment');
	}
	
	/**
	 * Renders comment form
     *
     * @access public
	 * @param array $fields
     * @return void
     */
	public static function renderCommentForm($fields) {
		$fields['logged_in_as']='<div class="formatted-form">';
		$fields['comment_notes_before']='<div class="formatted-form">';
		$fields['comment_notes_after']='</div>';
		$fields['fields']['author']='<div class="sixcol column"><div class="field-container"><input id="author" name="author" type="text" value="" size="30" placeholder="'.__('Name', 'midway').'" /></div></div>';
		$fields['fields']['email']='<div class="sixcol column last"><div class="field-container"><input id="email" name="email" type="text" value="" size="30" placeholder="'.__('Email', 'midway').'" /></div></div>';
		$fields['fields']['url']='';
		$fields['comment_field']='<div class="field-container"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.__('Comment', 'midway').'"></textarea></div>';
		
		$fields['title_reply']='';
		$fields['title_reply_to']='';
		$fields['label_submit']=__('Add Comment', 'midway');
		
		return $fields;
	}
	
	/**
	 * Renders editor
     *
     * @access public
	 * @param string $ID
	 * @param string $content
     * @return void
     */
	public static function renderEditor($ID, $content='') {
		$settings=array(
			'media_buttons'=>false,
			'teeny'=>true,
			'quicktags' => false,
			'textarea_rows' => 10,
			'tinymce' => array(
				'theme_advanced_buttons1' => 'bold,italic,undo,redo',
				'theme_advanced_buttons2' => '',
				'theme_advanced_buttons3' => ''
			)
		);
		
		wp_editor($content, $ID, $settings);
	}
	
	/**
	 * Renders pagination
     *
     * @access public
     * @return void
     */
	public static function renderPagination() {		
		global $wp_query;
		
		$args['base']=str_replace(999999999, '%#%', get_pagenum_link(999999999));
		$args['total']=$wp_query->max_num_pages;
		$args['current']=themex_paged();

		$args['mid_size']=5;
		$args['end_size']=1;
		$args['prev_text']='';
		$args['next_text']='';
		
		$out=paginate_links($args);
		if($out!='') {
			$out='<nav class="pagination">'.$out.'</nav>';
		}
		
		echo $out;
	}
	
	/**
	 * Renders page title
     *
     * @access public
     * @return void
     */
	public static function renderPageTitle() {
		global $post;
		$type=get_post_type();
		
		$out=wp_title('', false);
		
		if(is_single()) {
			if($type=='post') {
				$categories=wp_get_post_terms($post->ID, 'category');
				if(!empty($categories)) {
					$out=$categories[0]->name;
				}
			} else {
				$types=get_post_types(null, 'objects');
				$out=$types[$type]->labels->name;
			}
		} else if(get_query_var('author')) {
			$out=__('Profile', 'midway');
		}

		if(empty($out)) {
			$out=__('Archives', 'midway');
		}
		
		echo $out;
	}
	
	/**
	 * Renders footer
     *
     * @access public
     * @return void
     */
	public static function renderFooter() {
		$out=ThemexCore::getOption('tracking');	
		echo $out;
	}
	
	/**
	 * Renders user toolbar
     *
     * @access public
     * @return bool
     */
	public static function renderToolbar() {
		if(current_user_can('edit_posts') && get_user_option('show_admin_bar_front', get_current_user_id())!='false') {
			return true;
		}
		
		return false;
	}
	
	/**
	 * Renders messages
     *
     * @access public
	 * @param array $messages
	 * @param bool $success
     * @return void
     */
	public static function renderMessages($success=false) {
		$out='';
		$class='error';
		if($success) {
			$class='success';
		}
		
		if(isset(self::$messages)) {
			$out.='<ul class="'.$class.'">';			
			foreach(self::$messages as $message) {
				$out.='<li>'.$message.'</li>';
			}			
			$out.='</ul>';
		}

		echo $out;
	}
}