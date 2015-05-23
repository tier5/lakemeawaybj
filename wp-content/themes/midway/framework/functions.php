<?php
/**
 * Decodes HTML entities
 *
 * @param string $string
 * @return string
 */
function themex_html($string) {
	return do_shortcode(html_entity_decode($string));
}

/**
 * Removes slashes
 *
 * @param string $string
 * @return string
 */
function themex_stripslashes($string) {
	if(!is_array($string)) {
		return stripslashes(stripslashes($string));
	}
	
	return $string;	
}

/**
 * Gets string sections
 *
 * @param string $content
 * @param int $sections
 * @return string
 */
function themex_sections($content, $sections) {	
	$paragraphs=explode('</p>', $content);
	$excerpt='';

	for($j=0; $j<intval($sections); $j++) {
		if(isset($paragraphs[$j])) {
			$excerpt.=$paragraphs[$j].'</p>';
		}
	}
	
	return $excerpt;
}

/**
 * Gets page number
 *
 * @return int
 */
function themex_paged() {
	$paged=get_query_var('paged')?get_query_var('paged'):1;
	$paged=(get_query_var('page'))?get_query_var('page'):$paged;
	
	return $paged;
}

/**
 * Gets array value
 *
 * @param array $array
 * @param string $key
 * @param string $default
 * @return mixed
 */
function themex_value($array, $key, $default='') {
	$value='';
	
	if(isset($array[$key])) {
		if(is_array($array[$key])) {
			$value=reset($array[$key]);
		} else {
			$value=$array[$key];
		}		
	} else if ($default!='') {
		$value=$default;
	}
	
	return $value;
}

/**
 * Detects search page
 *
 * @return bool
 */
function themex_search() {
	if(isset($_GET['s']) && empty($_GET['s'])) {
		return true;
	}
	
	return false;
}

/**
 * Sends encoded email
 *
 * @param string $recipient
 * @param string $subject
 * @param string $message
 * @return bool
 */
function themex_mail($recipient, $subject, $message, $keywords=array()) {
	$headers="MIME-Version: 1.0".PHP_EOL;
	$headers.="Content-Type: text/html; charset=UTF-8".PHP_EOL;
	
	if(!empty($keywords)) {
		foreach($keywords as $keyword => $value) {
			$message=str_replace('%'.$keyword.'%', $value, $message);
		}
	}
	
	if(wp_mail($recipient, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $headers)) {
		return true;
	}
	
	return false;
}

/**
 * Converts date format
 *
 * @param string $format
 * @return string
 */
function themex_js_date($format) {
	$result='dd/mm/yy';	
	switch($format) {
		case 'Y/m/d':
			$result='yy/mm/dd';
		break;
		case 'm/d/Y':
			$result='mm/dd/yy';
		break;
	}
	
	return $result;
}


/**
 * Gets static string
 *
 * @param string $key
 * @param string $type
 * @param string $default
 * @return string
 */
function themex_get_string($key, $type, $default) {
	$name=$key.'-'.$type;
	$string=$default;
	$strings=array();
	include(THEMEX_PATH.'strings.php');

	if(isset($strings[$name])) {
		$string=$strings[$name];
	}
	
	$string=themex_stripslashes($string);
	$string=str_replace("’", "'", $string);
	$string=do_shortcode($string);
	
	return $string;
}

/**
 * Adds static string
 *
 * @param string $key
 * @param string $type
 * @param string $string
 * @return void
 */
function themex_add_string($key, $type, $string) {
	$name=$key.'-'.$type;
	$string=themex_stripslashes($string);
	$string=str_replace("'", "’", $string);
	$strings=array();
	include(THEMEX_PATH.'strings.php');
	
	if(!empty($string) && !isset($strings[$name])) {
		$file=@fopen(THEMEX_PATH.'strings.php', 'a');
		
		if($file!==false) {
			fwrite($file, "\r\n".'$strings'."['".$name."']=__('".$string."', 'midway');");
			fclose($file);
		}
	}
}

/**
 * Removes static strings
 *
 * @return void
 */
function themex_remove_strings() {
	$file=@fopen(THEMEX_PATH.'strings.php', 'w');	
	if($file!==false) {
		fwrite($file, '<?php ');
		fclose($file);
	}
}

/**
 * Sanitizes key
 *
 * @param string $string
 * @return string
 */
function themex_sanitize_key($string) {
	$replacements=array(
		// Latin
		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
		'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
		'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
		'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
		'ß' => 'ss', 
		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
		'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
		'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
		'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
		'ÿ' => 'y',
 
		// Greek
		'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
		'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
		'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
		'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
		'Ϋ' => 'Y',
		'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
		'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
		'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
		'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
		'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
 
		// Turkish
		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 
 
		// Russian
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
		'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
		'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
		'Я' => 'Ya',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
		'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
		'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
		'я' => 'ya',
 
		// Ukrainian
		'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
		'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
 
		// Czech
		'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
		'Ž' => 'Z', 
		'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
		'ž' => 'z', 
 
		// Polish
		'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
		'Ż' => 'Z', 
		'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
		'ż' => 'z',
 
		// Latvian
		'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
		'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
		'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
		'š' => 's', 'ū' => 'u', 'ž' => 'z'
	);
	
	$string=trim($string);
	$string=str_replace(array_keys($replacements), $replacements, $string);
	$string=preg_replace('/\s+/', '-', $string);
	$filtered=$string;
	
	$string=preg_replace('/[^A-Za-z0-9-]/', '', $string);
	$string=strtolower($string);
	
	if(empty($string) || $string[0]=='-') {
		$string='a'.md5($filtered);
	}
	
	return $string;
}