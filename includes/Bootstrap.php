<?php namespace App\Includes;

use Traits\ShortcodeHandler;

class Bootstrap{


	
	public function registerAssets(){

	 $files = scandir(ASSETS_PATH.'/js');

	 foreach ($files as $file) {
	 	if($file !== '.' && $file !== '..' && substr($file,-2) === 'js' ){
	 		$this->injectScript($file);
	 	}
	 }

	}

	public function __construct() {
		define('ASSETS_PATH',plugin_dir_path(__FILE__).'../assets');
		// add_action( 'init', [$this,'registerShortcodes']);
    }

	public function injectScript($file){

		// die(var_dump(substr( $file, 0, -3)));
		wp_register_script( substr( $file, substr( $file, 0, -3)), ASSETS_PATH.'js/'.$file);
	    wp_enqueue_script(substr( $file, substr( $file, 0, -3)));

	}

	public function registerShortcodes(){
				
		add_shortcode( 'pcs', [new ShortcodeHandler,'addPostsSlider'] );
	}

}