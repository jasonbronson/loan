<?php

namespace API;
use \Libraries\Posts;

class PostData {

    public function __construct(){
       
   }

   /**
    * Retrieve all posts data from posts class
    */
   public static function getPosts(){
    
        $posts = new Posts();
        $temp =  $posts->getAll(20);
        foreach($temp->posts as $post){
            $data[] = $post; 
        }

        wp_send_json($data);
   }

}