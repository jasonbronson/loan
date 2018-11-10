<?php

/**
 * Registers custom API routes 
 */
namespace API;
use API\PostData;
use \Libraries\Loader;


class RegisterRoutes {

    public function __construct(){
 
         $loader = new Loader();
         $loader->add_action('rest_api_init', $this, 'registerRoutes' );
         $loader->run();
        
    }

    public function registerRoutes(){
       
        register_rest_route( 'articles/v1', '/getall/', array(
            'methods' => 'GET',
            'callback' => array(get_class(new PostData), 'getPosts' ),
          ) );
    }


}