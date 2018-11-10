<?php
/**
 * Load up the custom post types
 */
$cptArgs = array(
    'show_in_menu' => 'custom_posts'
);

$postTypes = array("video");
$titles = array("video" => "video_title");
$cpt = new \Libraries\CustomPostTypes( $postTypes, $titles );
$cpt->registerCustomPostType( 'video', 'Video', 'Videos', $cptArgs, 'video' );

