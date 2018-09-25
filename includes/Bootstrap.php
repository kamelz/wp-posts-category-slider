<?php

class Bootstrap{

		public function __construct() {
		add_action( 'init', [$this,'registerShortcodes']);
    }


	public function registerShortcodes(){
				
		add_shortcode( 'pcs', [new ShortcodeHandler,'addPostsSlider'] );
	}

}