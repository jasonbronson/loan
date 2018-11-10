<?php
/**
 * Class to load up the authors list
 * @author jbronson
 * 
 */
namespace ACF;
use \Libraries\Loader;

class Authors{

    public function __construct(){
        
        $loader = new Loader();
        $loader->add_filter('acf/load_field/name=blog_authors',$this, 'getAll' );
        $loader->run();

    }

    public function getAll( $field ) {
        $args = array(
            'orderby' => 'name',
            'style' => 'none',
            'order' => 'ASC',
            'fields' => array('user_login', 'ID', 'display_name')
        );
        $field['choices'][] = null;
        $authors = get_users( $args );
        foreach($authors as $author){
            $field['choices'][$author->ID] = $author->display_name;
        }
        // return the field
        return $field;
        
    }
    
    

}