<?php
/**
 * Class to validate the video url
 * @author jbronson
 * 
 */
namespace ACF;
use \Libraries\Loader;

class VideoUrlValidation{

    public function __construct(){
        
        $loader = new Loader();
        $loader->add_filter('acf/validate_value/name=video_url',$this, 'validate', 10, 4 );
        $loader->add_filter('acf/validate_value/name=featured_section_video_url',$this, 'validate', 10, 4 );
        $loader->run();

    }

    public function validate( $valid, $value, $field, $input ) {
        
        if( !$valid ) {
            return $valid;    
        }

        if(!preg_match('/v=/', $value)){
            $valid = "Video must be in the following format https://www.youtube.com/watch?v=OxoUUbMii7Q ";    
        }

        return $valid;
        
    }
    
    

}