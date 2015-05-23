<?php
/**
 * Themex Woo
 *
 * Handles WooCommerce data
 *
 * @class ThemexWoo
 * @author Themex
 */
 
class ThemexWoo {

	/** @var array Contains module data. */
	public static $data;
	
	/** @var mixed Contains plugin instance. */
	public static $woocommerce;
	
	/**
	 * Adds actions and filters
     *
     * @access public
     * @return void
     */
	public static function init() {
		//refresh data
		self::refresh();
			
		if(self::isActive()) {
		
			//get plugin instance
			self::$woocommerce=$GLOBALS['woocommerce'];
			
			//filter fields
			add_filter('woocommerce_checkout_fields', array(__CLASS__, 'filterFields'), 10, 1);
			
			//filter classes
			add_filter('body_class', array(__CLASS__, 'filterClasses'), 99);
		}
	}
	
	/**
	 * Refreshes module data
     *
     * @access public
     * @return void
     */
	public static function refresh() {
		self::$data=(array)ThemexCore::getOption(__CLASS__);
	}
	
	/**
	 * Renders module settings
     *
     * @access public
     * @return string
     */
	public static function renderSettings() {
		$out='<input type="hidden" name="'.__CLASS__.'[]" value="" />';
	
		$out.=ThemexInterface::renderOption(array(	
			'name' => __('Show Country', 'academy'),
			'id' => __CLASS__.'[billing_country]',
			'type' => 'checkbox',
			'default' => themex_value(self::$data, 'billing_country'),
		));
		
		$out.=ThemexInterface::renderOption(array(	
			'name' => __('Show City', 'academy'),
			'id' => __CLASS__.'[billing_city]',
			'type' => 'checkbox',
			'default' => themex_value(self::$data, 'billing_city'),
		));
			
		$out.=ThemexInterface::renderOption(array(
			'name' => __('Show State', 'academy'),
			'id' => __CLASS__.'[billing_state]',
			'type' => 'checkbox',
			'default' => themex_value(self::$data, 'billing_state'),
		));
			
		$out.=ThemexInterface::renderOption(array(
			'name' => __('Show Address', 'academy'),
			'id' => __CLASS__.'[billing_address]',
			'type' => 'checkbox',
			'default' => themex_value(self::$data, 'billing_address'),
		));
			
		$out.=ThemexInterface::renderOption(array(	
			'name' => __('Show Postcode', 'academy'),
			'id' => __CLASS__.'[billing_postcode]',
			'type' => 'checkbox',
			'default' => themex_value(self::$data, 'billing_postcode'),
		));
			
		$out.=ThemexInterface::renderOption(array(	
			'name' => __('Show Company', 'academy'),
			'id' => __CLASS__.'[billing_company]',
			'type' => 'checkbox',
			'default' => themex_value(self::$data, 'billing_company'),
		));
			
		$out.=ThemexInterface::renderOption(array(
			'name' => __('Show Phone', 'academy'),
			'id' => __CLASS__.'[billing_phone]',
			'type' => 'checkbox',
			'default' => themex_value(self::$data, 'billing_phone'),
		));
	
		return $out;
	}
	
	/**
	 * Gets product price
     *
     * @access public
	 * @param int $ID
     * @return string
     */
	public static function getPrice($ID, $period='') {
		$price='';
		
		if(self::isActive() && intval($ID)!=0) {			
			if(class_exists('WC_Subscriptions_Product')) {
				$price=WC_Subscriptions_Product::get_price_string($ID);
				$prices=explode(' / ', $price);
				
				if(isset($prices[0])) {
					$price=$prices[0];
				}				
			} else {
				$product=new WC_Product_Simple($ID);
				$price=$product->get_price_html();
			}
		}
		
		if(!empty($price) && !empty($period)) {
			$price.=' / '.themex_period($period);
		}
	
		return $price;
	}
	
	/**
	 * Adds product to cart
     *
     * @access public
	 * @param int $ID
     * @return void
     */
	public static function addProduct($ID, $redirect=false) {
		self::$woocommerce->cart->empty_cart();
		self::$woocommerce->cart->add_to_cart($ID, 1);
		
		if($redirect) {
			wp_redirect(self::$woocommerce->cart->get_checkout_url());
			exit();
		}		
	}
	
	/**
	 * Gets related post
     *
     * @access public
	 * @param int $ID
     * @return mixed
     */
	public static function getRelatedPost($ID, $type) {
		$post=array();
		$order=new WC_Order($ID);
		$products=$order->get_items();		
		
		if(!empty($products)) {
			$product=reset($products);
			$ID=$product['product_id'];
		}
		
		$posts=get_posts(array(
			'numberposts' => 1,
			'post_type' => $type,
			'meta_query' => array(
				array(
					'key' => '_'.THEMEX_PREFIX.'product',
					'value' => $ID,
				),
			),			
		));		

		if(!empty($posts)) {			
			$post=$posts[0];			
			if(!empty($products)) {
				$post->post_author=$order->user_id;
			}
		}
		
		return $post;
	}
	
	/**
	 * Filters checkout fields
     *
     * @access public
	 * @param array $fields
     * @return array
     */
	public static function filterFields($fields) {
		self::$data['billing_first_name']=true;
		self::$data['billing_last_name']=true;
		self::$data['billing_email']=true;
		self::$data['shipping_first_name']=true;
		self::$data['shipping_last_name']=true;
		self::$data['order_comments']=true;
		self::$data['account_password']=true;
		
		foreach($fields as $form_key => $form) {
			foreach($form as $field_key => $field) {
				$short_key=str_replace(array('shipping_', 'billing_', '_1', '_2'), '', $field_key);				
				if(isset(self::$data[$field_key]) || isset(self::$data['billing_'.$short_key]) || isset(self::$data['shipping_'.$short_key])) {
					if(isset($fields[$form_key][$field_key]['label'])) {
						$fields[$form_key][$field_key]['placeholder']=$fields[$form_key][$field_key]['label'];
					}
				} else {
					unset($fields[$form_key][$field_key]);
				}
			}
		}
		
		return $fields;
	}
	
	/**
	 * Filters body classes
     *
     * @access public
	 * @param array $classes
     * @return array
     */
	public static function filterClasses($classes) {
		$classes=array_diff($classes, array('woocommerce-page', 'woocommerce'));	
		return $classes;
	}
	
	/**
	 * Gets page URL
     *
     * @access public
	 * @param string $slug
     * @return string
     */
	public static function getURL($slug) {
		$url=get_permalink(woocommerce_get_page_id($slug));		
		return $url;
	}
	
	/**
	 * Checks plugin activity
     *
     * @access public
     * @return bool
     */
	public static function isActive() {
		if(class_exists('Woocommerce')) {
			return true;
		}
		
		return false;
	}
}