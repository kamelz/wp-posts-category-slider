<?php namespace App\Includes;

use App\Includes\Files;
use App\Includes\Language;
use App\Includes\ShortcodeHandler;

class Bootstrap{

	public function __construct() {

		(new Language)->setLanguage('en');
    }
    
    public function registerAssets(){
		add_action('init', [new Files,'loadjQuery']);
		add_action('init', [new Files,'injectExternalAssets']);
		add_action('init', [new Files,'injectScript']);
	}

	public function registerShortcodes(){

		add_shortcode( 'pcs', [new ShortcodeHandler,'addPostsSlider'] );
	}
}