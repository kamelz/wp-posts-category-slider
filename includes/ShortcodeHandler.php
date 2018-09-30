<?php namespace App\Includes;

use App\Includes\Traits\SliderViewTrait;

class ShortcodeHandler{
	
	use SliderViewTrait;

	public function addPostsSlider($args){
			
		$type = $args['type']??'basic';
		$category = $args['category_id']??[];
		$limit = $args['limit']?? 3;

		return $this->sliderType($type)
			 ->withCategory($category)
			 ->limited($limit)
			 ->render();

	}

}