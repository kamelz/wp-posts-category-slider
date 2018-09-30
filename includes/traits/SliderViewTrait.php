<?php namespace App\Includes\Traits;

trait SliderViewTrait{
	
	public $type;
	public $args;

	public function sliderType($type){
		$this->type = $type;
		//todo validate 
		return $this;
	}

	public function withCategory($category){
		$this->args['category'] = $category;
		//todo validate 
		return $this;
	}

	public function limited($limit){
		$this->args['posts_per_page'] = $limit;
		//todo validate 
		return $this;
	}

	public function render(){

		$posts = $this->getPosts();
		
		$html = '<div class="swiper-container">';
		$html .= '<div class="swiper-wrapper">';

		for($i=0; $i< count($posts); $i++ ){
			$html .= '<div class="swiper-slide flex-column">';
			$html .= get_the_post_thumbnail($posts[$i]->ID,'thumbnail');

			$html .= "<h2>".$posts[$i]->post_title."</h2>";

			$html .= "<a href='".get_post_permalink($posts[$i]->ID)."'>".lang('more')."</a></div>";
		}

		$html .= '</div>'; //swiper-wrapper
		$html .= '<div class="swiper-button-next"></div>'; 
		$html .= '<div class="swiper-button-prev"></div>'; 
		$html .= '</div>'; //swiper-container
		
		return $html;
	}

	public function getPosts(){

		return get_posts($this->args);
	}
}


