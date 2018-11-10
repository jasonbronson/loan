<?php

namespace Controllers;

class Controller {


    public function getVideoShortLink($url){
		
		
		if( !empty($url) ){

			$urlParsed = parse_url($url);

			if(preg_match('/youtu.be/', $url)){
				$shortLink = str_replace("/", "", $urlParsed['path']);
				return $shortLink;	
			}
			if(preg_match('/watch/', $url)){
				$shortLink = str_replace("v=", "", $urlParsed['query']);
				return $shortLink; 
			}
			if(preg_match('/embed/', $url)){
				$shortLink = str_replace("/embed/", "", $urlParsed['path']);
				return $shortLink; 
			}

		}

	}

}