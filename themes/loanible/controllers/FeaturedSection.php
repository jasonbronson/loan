<?php
/**
 * Featured Section Controller
 *
 */
namespace Controllers;
use Libraries\Posts;
class FeaturedSection extends Controller {
	public function __construct(){
	}
	public function get($id){
		$data = array(
			'visible' => get_field('featured_content_section_visible', $id),
			'type' => get_field('featured_section_type', $id),
			'graphic_overlay_ad_slot' => get_field('graphic_overlay_ad_slot', $id),
			'graphic_overlay_heading_text' => get_field('graphic_overlay_heading_text', $id),
			'description' => get_field('featured_section_description', $id),
			'heading' => get_field('videographic_h1_heading', $id),
			'graphic_overlay_image' => get_field('graphic_overlay_image', $id),
			
		);
		$data['type'] = get_field('featured_section_type', $id);
		switch($data['type']){
			case "image":
				$data['image'] = get_field('featured_section_image', $id);
				$data['image_link'] = get_field('featured_section_image_link', $id);
			break;
			case "video-url":
				$url = get_field('featured_section_video_url', $id);
				$data['video_url'] = $url;
				$data['video_shortlink'] = $this->getVideoShortLink($url);
			break;
		}
		$data = (object) $data;
		
		return $data;
	}
}
