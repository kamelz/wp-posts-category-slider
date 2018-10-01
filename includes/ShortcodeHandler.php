<?php namespace App\Includes;

use App\Includes\Traits\SliderViewTrait;

class ShortcodeHandler{
	
	use SliderViewTrait;

	public function addPostsSlider($args){
			
		$category = $args['category']??[];
		$limit = $args['limit']?? 3;

		return $this->withCategory($category)
			 ->limited($limit)
			 ->render();

	}

}