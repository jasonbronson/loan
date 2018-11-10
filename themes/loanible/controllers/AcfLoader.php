<?php

 
//trigger upload to CDN when attaching a file
//$cdn = new \ACF\CDN('featured_section_video_file');

//acf custom field search
//$acfCustomFieldSearchPosts = new \ACF\customfields\searchposts\FieldSearchposts();

//validate the youtube url
require_once( THEME_PATH . '/libraries/acf/videoUrlValidation.php' );
$videoValidate = new \ACF\VideoUrlValidation();