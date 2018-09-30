<?php namespace App\Includes;

use App\Includes\ShortcodeHandler;
use App\Includes\Files;

class Bootstrap{

	public function __construct() {

		$this->setLanguage('ar');
    }
    
    public function registerAssets(){
		add_action('init', [new Files,'loadjQuery']);
		add_action('init', [new Files,'injectExternalAssets']);
		add_action('init', [new Files,'injectScript']);
	}

	public function registerShortcodes(){

		add_shortcode( 'pcs', [new ShortcodeHandler,'addPostsSlider'] );
	}

	public function setLanguage($lang){

		$_SESSION['lang'] = (new Files)->loadLangFile($lang);	
	}
}