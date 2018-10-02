<?php namespace App\Includes;

use App\Includes\Files;

class Language{

	public function __construct() {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}
    
    public function setLanguage($lang){
		$_SESSION[plugin_basename(__FILE__ ).'_lang'] = (new Files)->loadLangFile($lang);	
    }
    
    public static function lang($key){

    	return $_SESSION[plugin_basename(__FILE__ ).'_lang']["$key"];
    }
}