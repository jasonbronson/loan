<?php
/**
 * Class to upload an attachment to CDN
 * Triggers on validate attachment by passing the acf field name into the constructor
 * @author jbronson
 * 
 */
namespace ACF;
use \Libraries\Loader;
use \Libraries\CloudinaryUpload;

class CDN extends CloudinaryUpload {

    public function __construct($fieldName){
          
        $loader = new Loader();
        $loader->add_filter("acf/validate_attachment/name=$fieldName", $this, 'uploadToCDN', 10, 4 );
        $loader->add_filter("add_attachment", $this, 'updateCDN', 10, 1 );
        $loader->run();

    }

    public function uploadToCDN( $errors, $file, $attachment, $field ) {
       
            //Field Attributes
            $fieldName = isset($field['name'])?$field['name']:null;
            $id = isset($field['ID'])?$field['ID']:null;

            //File Attributes
			$filePath = isset($attachment['tmp_name'])?$attachment['tmp_name']:null;
            //$fileType = isset($attachment['type'])?$attachment['type']:null;
            $fileType = $attachment['mime'];
            $fileName = isset($attachment['name'])?$attachment['name']:null;
            $fileSize = isset($attachment['size'])?$attachment['size']:null;
			
			if($fileType=="video/mp4" && !isset($attachment['id'])){
                        //Replace the name of the file so we can upload to the 
                        //CDN without the file extension.
                        $fileName = str_replace(".mp4", "", $fileName);
                        //Upload to the CDN
                        $response = $this->uploadFile($filePath, $fileName);
                        //Grab the https url from the CDN 
						$cdnUrl = isset($response['secure_url'])?$response['secure_url']:null;
                        //verify the URL is actually returned
                        if(empty($cdnUrl)){
							$errors[] = "  Failed adding file to CDN settings";
						}else{

                            //Store the CDN URL with the attachment in a custom acf field

                            // Would like to find a way to dynamically get the page/post id triggering this call
                            // for now it saves to temp options text field then updates after the attachment is finished saving
                            update_field('cdn_url_temp', $cdnUrl, 'options');
                            
						
                        }
                        
				
			}elseif($fileType != "video/mp4"){
				$errors[] = "Wrong file type! Must be a mp4 video file uploaded.";
			}

        return $errors;
        
    }

    public function updateCDN($attachmentId){
        
        $cdnURL = get_field('cdn_url_temp', 'options');
        update_field('cdn_url', $cdnURL, $attachmentId);
    }

    

}