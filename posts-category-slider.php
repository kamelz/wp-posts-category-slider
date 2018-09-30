<?php namespace App;

require_once 'vendor/autoload.php';
require_once 'helper.php';


/**
 * @package           Posts Category Slider
 *
 * @wordpress-plugin
 * Plugin Name:       Posts Category Slider
 * Plugin URI:        http://example.com/attribute-grouper
 * Description:       Create attributes and group them by a name to display them in a post/page.
 * Version:           1.0.0
 * Author:            Mohamed Kamel
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       attribute-grouper
 * Domain Path:       /languages
 */
use App\Includes\Bootstrap;

class PostsCategorySliderMain{

	function __construct()
	{ 
		if(!$this->isWordPress()) die;

		define( 'POSTS_CATEGORY_VERSION', '1.0.0' );
		
		$this->bootstrap();
	}

	/**
	 * Register the plguin assets and shortcodes.
	 * @param  Bootstrap $app          
	 */
	public function bootstrap(){
		
		$app = new Bootstrap();

		$app->registerAssets();
		$app->registerShortcodes();
	}

	/**
	 * If this file is called directly, abort.
	 * @return bool 
	 */
	public function isWordPress(){

		return defined( 'ABSPATH' );
	}	
}
session_start();
(new PostsCategorySliderMain());
