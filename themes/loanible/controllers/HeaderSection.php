<?php
/**
 * Header Section Controller
 *
 */
namespace Controllers;


class HeaderSection {
	
	public function __construct(){
	}

	public function get($id){
		$data = (object) array(
			'main_logo' => get_field('main_logo', $id),
			'social_icons' => get_field('social_icons', 'options'),
		);


		return $data;
	}
}
