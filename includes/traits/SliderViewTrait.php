<?php namespace App\Includes\Traits;
use App\Includes\Language;
trait SliderViewTrait{

	public $args;

	public function withCategory($category){
		$key = is_numeric($category)?'category':'category_name';
		$this->args[$key] = $category;
		return $this;
	}

	public function limited($limit){
		$this->args['posts_per_page'] = $limit;

		return $this;
	}

	public function render(){

		$posts = get_posts($this->args);
		
		$html = '<div class="swiper-container">';
		$html .= '<div class="swiper-wrapper">';

		for($i=0; $i< count($posts); $i++ ){
			$html .= '<div class="swiper-slide flex-column">';
			$html .= get_the_post_thumbnail($posts[$i]->ID,'thumbnail');

			$html .= "<h2>".$posts[$i]->post_title."</h2>";

			$html .= "<a href='".get_post_permalink($posts[$i]->ID)."'>".Language::lang('more')."</a></div>";
		}

		$html .= '</div>'; //swiper-wrapper
		$html .= '<div class="swiper-button-next"></div>'; 
		$html .= '<div class="swiper-button-prev"></div>'; 
		$html .= '</div>'; //swiper-container
		
		return $html;
	}
}


