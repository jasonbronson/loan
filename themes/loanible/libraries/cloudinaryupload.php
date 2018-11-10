<?php 

namespace Libraries;
use Cloudinary;
use Cloudinary\Uploader;

class CloudinaryUpload {


    public function uploadFile($file, $name){

        Cloudinary::config(array( 
          "cloud_name" => "estars", 
          "api_key" => "516182383958285", 
          "api_secret" => "Gf3_QyMx28Pv6ORW_aRl-KdCmdU" 
        ));
        
        $response = Cloudinary\Uploader::upload($file, array(
          "resource_type" => "video",
          "public_id" => "wsoe-video/$name",
          "resource_type" => "video",
          "overwrite" => TRUE,
          
          //"chunk_size" => "6_000_000",
          /*"eager" => array(
            array("width" => 300, "height" => 300, "crop" => "pad", "audio_codec" => "none"), 
            array("width" => 160, "height" => 100, "crop" => "crop", "gravity" => "south", "audio_codec" => "none")), 
          "eager_async" => TRUE, 
          "eager_notification_url" => "http://mysite/notify_endpoint"*/
            )
          );
          return $response;
      }




}