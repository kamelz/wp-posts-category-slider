<?php namespace App\Includes;

use App\Includes\Files;

class Language{

	public function __construct() {
		session_start();
    }
    
    public function setLanguage($lang){

		$_SESSION['lang'] = (new Files)->loadLangFile($lang);	
    }
    
    public static function lang($lang){

    	return $_SESSION['lang']["$key"];
    }
}