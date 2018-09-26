<?php

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


// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if(! function_exists('add_action')){
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'POSTS_CATEGORY_VERSION', '1.0.0' );

require_once plugin_dir_path( __FILE__ ) . 'loader.php';


if(class_exists('Bootstrap')){

	(new Bootstrap)->registerShortcodes() ;
}

		add_action('init', 'importStyleAndScript');
		



	function load_jquery() {

	    if ( ! wp_script_is( 'jquery', 'enqueued' )) {
		
			wp_register_script( 'jQuery', 'https://code.jquery.com/jquery-3.3.1.min.js');
	        //Enqueue
	        wp_enqueue_script( 'jQuery' );

	    }
	}

    function importStyleAndScript() {
	
		load_jquery();

		wp_register_style('posts-categories-slider-swiper-style', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css');
		wp_register_script( 'posts-categories-slider-swiper-script','https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.js');





		wp_register_style('posts-categories-slider-style', plugins_url('assets/css/posts-categories-slider-style.css',__FILE__ ));

		wp_register_script( 'posts-categories-slider-script', plugins_url( 'assets/js/posts-categories-slider-script.js',__FILE__ ));


	    wp_enqueue_script('posts-categories-slider-swiper-script');
    	wp_enqueue_style('posts-categories-slider-swiper-style');
    	
    	wp_enqueue_style('posts-categories-slider-style');
	    wp_enqueue_script('posts-categories-slider-script');

	}

