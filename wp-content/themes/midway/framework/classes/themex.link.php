<?php
/**
 * Themex Link
 *
 * Handles theme links
 *
 * @class ThemexLink
 * @author Themex
 */
 
class ThemexLink {

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
     * @return string
     */
	public static function renderSettings() {
		$out='';
		$links=array(
			array(
				'id' => 'rss',
				'name' => 'RSS',
			),			
			array(
				'id' => 'google',
				'name' => 'Google',
			),
			array(
				'id' => 'youtube',
				'name' => 'YouTube',
			),
			array(
				'id' => 'facebook',
				'name' => 'Facebook',
			),
			array(
				'id' => 'linkedin',
				'name' => 'LinkedIn',
			),
			array(
				'id' => 'tumblr',
				'name' => 'Tumblr',
			),			
			array(
				'id' => 'twitter',
				'name' => 'Twitter',
			),
			array(
				'id' => 'skype',
				'name' => 'Skype',
			),
			array(
				'id' => 'vimeo',
				'name' => 'Vimeo',
			),
			array(
				'id' => 'blogger',
				'name' => 'Blogger',
			),
			array(
				'id' => 'flickr',
				'name' => 'Flickr',
			),
			array(
				'id' => 'stumbleupon',
				'name' => 'StumbleUpon',
			),
		);
		
		foreach($links as $link) {
			$out.=ThemexInterface::renderOption(array(
				'id' => __CLASS__.'['.$link['id'].'][name]',
				'type' => 'hidden',
				'value' => $link['name'],
				'wrap' => false,
			));
			
			$out.=ThemexInterface::renderOption(array(
				'id' => __CLASS__.'['.$link['id'].'][url]',
				'name' => $link['name'],
				'type' => 'text',
				'value' => isset(self::$data[$link['id']]['url'])?self::$data[$link['id']]['url']:'',
			));
		}
			
		return $out;
	}
	
	/**
	 * Renders module data
     *
     * @access public
     * @return string
     */
	public static function renderData() {
		$out='';
		
		if(!empty(self::$data)) {
			foreach(self::$data as $name=>$link) {
				if(!empty($link['url'])) {
					$out.='<a class="'.$name.'" href="'.$link['url'].'" target="_blank" title="'.$link['name'].'"></a>';
				}				
			}
		}
		
		echo $out;
	}
}