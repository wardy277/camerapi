<?php

class DirListing {
	
	public function __construct($dir=''){
		$this->base_dir = $dir;
		
		foreach(glob($dir.'*{.avi,.mpg,.mp4}', GLOB_BRACE) as $video){
			$this->videos[] = new Video($video); 
			
		}
		
		$this->images = glob($dir.'*{.png,.jpg}', GLOB_BRACE);
		
	}
	
	public function getVideos(){
		return $this->videos;
	}
	
	
	
}
