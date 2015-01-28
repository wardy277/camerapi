<?php

class Video extends Entity {
	
	public function __construct($video){
		
		$data = array(	'src' => $video,
						'path' => dirname($video),
						'name' => @end(explode("/", $video)),
					 );
		
		parent::__construct($data);
				
	}
}
