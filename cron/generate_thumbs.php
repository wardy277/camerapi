<?php


foreach($fiels as $file){
	$filename = filename;
	$base_dir = dirname($filename);
	
	$thumbs_dir = $base_dir."/thumbs";
	$thumb_filename = $thumbs_dir."/".$filename.".jpg";
	
	//multiple thumbnails?
	if(!is_dir($thumbs_dir)){
		//create thumbs dir
	}
	
	if(!file_exists($thumb_filename)){
		//generate thumbnails
	}
	
}
