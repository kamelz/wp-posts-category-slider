<?php namespace App\Includes\Traits;

class ShortcodeHandler{
	
	use SliderViewTrait;

	public function addPostsSlider($args){
		if(isset($args['category_id'])){
			
			$type = $args['type']??'basic';
			$limit = $args['limit']?? 0; // 0 => all

			return $this->sliderType($type)
				 ->withCategory($args['category_id'])
				 ->limited($limit)
				 ->render();
		}
	}

}