<?php

class PostsCategorySliderActivator {
	
	use SliderViewTrait;

	public function __construct() {
		add_action( 'init', [$this,'registerShortcodes']);
    }


	public function activate() {

	
		flush_rewrite_rules();
	}

	public function registerShortcodes(){
				
		add_shortcode( 'pcs', [$this,'addPostsSlider'] );
	}
}