<?php namespace App\Includes;

class Files{

	public function __construct() {
		if(!defined('ASSETS_PATH'))
			define('ASSETS_PATH',plugin_dir_path(__FILE__).'../assets');
		
		if(!defined('LANGS_PATH'))
			define('LANGS_PATH',plugin_dir_path(__FILE__).'lang');
    }

    public function injectScript(){
		$file = new Files();
		$file->loadAsset('js');
		$file->loadAsset('css');
	}

	public function loadjQuery(){
	    if ( ! wp_script_is( 'jquery', 'enqueued' )) {
			wp_register_script( 'jQuery', 'https://code.jquery.com/jquery-3.3.1.min.js');
	        //Enqueue
	        wp_enqueue_script( 'jQuery' );
	    }
	}

	public function injectExternalAssets(){

		wp_register_style('posts-categories-slider-swiper-style', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css');
		wp_register_script( 'posts-categories-slider-swiper-script','https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.js');

	    wp_enqueue_script('posts-categories-slider-swiper-script');
    	wp_enqueue_style('posts-categories-slider-swiper-style');
	}
	
	public function loadLangFile($lang){

		return include LANGS_PATH.'/'.$lang.'.php';
	}

	public function loadAsset($extension){
		$extensionLength = strlen($extension);
 		$files = scandir(ASSETS_PATH."/$extension");
		
		switch ($extension) {
			case 'css':
				$register = "wp_register_style";
				$enqueue = "wp_enqueue_style";
				break;
			
			default:
				$register = "wp_register_script";
				$enqueue = "wp_enqueue_script";
				break;
		}

		foreach ($files as $file) {
			if($file !== '.' && $file !== '..' && substr($file,$extensionLength * - 1) === $extension ){
				$path = plugins_url( "../assets/$extension/".$file,__FILE__ );
				$register(substr($file, 0, ($extensionLength + 1) * - 1 ),$path);
				$enqueue(substr($file, 0,($extensionLength + 1) * - 1 ));
			}
		}
	}
}