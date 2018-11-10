<?php
/**
 * Footer Section Controller
 *
 */
namespace Controllers;

class FooterSection {
	public function __construct(){
	}

	public function get($id){
		$data = (object) array(
			'social_icons' => get_field('social_icons', 'options'),
		);


		return $data;
	}
}
