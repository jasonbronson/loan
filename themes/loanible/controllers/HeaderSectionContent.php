<?php
/**
 * Header Content Section Controller
 *
 */
namespace Controllers;
use Libraries\Posts;
class HeaderSectionContent {
	public function __construct(){
	}
	public function get($id){
		$data = (object) array(
			'visible' => get_field('show_header_section', $id),
			'header_image' => get_field('header_background_image', $id),
			'header_h1' => get_field('header_h1', $id),
			'header_h1_link' => get_field('header_h1_link', $id),
			'header_h1_position' => get_field('header_h1_position', $id),
			'header_image_animation_autoplay' => get_field('header_image_animation_autoplay', $id),
			'header_image_animation_file_upload' => get_field('header_image_animation_file_upload', $id),
			'header_image_animation_position' => get_field('header_image_animation_position', $id),
			'header_image_animation_link' => get_field('header_image_animation_link', $id),
		);
		return $data;
	}
}
