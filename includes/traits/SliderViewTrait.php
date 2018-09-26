<?php

trait SliderViewTrait{
	
	public $type;
	public $category;
	public $limit;

	public function sliderType($type){
		$this->type = $type;
		//todo validate 
		return $this;
	}

	public function withCategory($category){
		$this->category = $category;
		//todo validate 
		return $this;
	}

	public function limited($limit){
		$this->limit = $limit;
		//todo validate 
		return $this;
	}

	public function render(){
		$args  = [];
		// $args[] = null !==  $this->category?['category' => $this->category]:[]; 
		// $args[] = null !==  $this->limit?['posts_per_page' => $this->limit]:[]; 
		if(null !==  $this->category){
			$args['category'] =  $this->category;
		}

		if(null !==  $this->category){
			$args['posts_per_page'] =  $this->limit;

		}

		$posts = $this->getPosts($args);
		$html = '<div class="swiper-container">';
		$html .= '<div class="swiper-wrapper">';

		for($i=0; $i< count($posts); $i++ ){
			$html .= '<div class="swiper-slide flex-column">';
			$html .= get_the_post_thumbnail($posts[$i]->ID,'thumbnail');

			$html .= "<h2>".$posts[$i]->post_title."</h2>";

			$html .= "<a href='".get_post_permalink($posts[$i]->ID)."'>المزيد</a></div>";
		}

		$html .= '</div>'; //swiper-wrapper
		$html .= '<div class="swiper-button-next"></div>'; 
		$html .= '<div class="swiper-button-prev"></div>'; 
		$html .= '</div>'; //swiper-container
		

		 return $html;
	}

	public function getPosts($args){
		//with category args

		return get_posts($args);
	}
}


