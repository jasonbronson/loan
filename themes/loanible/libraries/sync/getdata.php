<?php

namespace sync;

class GetData {

    /**
     * Get the data from any json url feed
     * @author jason bronson <jasonbronson@gmail.com>
     */ 
    public function getPost($url, $ignoreSSLVerify=false){

        //localhost only testing
        if($ignoreSSLVerify){
            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );  
        }

        $response = file_get_contents($url, false, stream_context_create($arrContextOptions));
        
        if($this->isJson($response)){
            return $response;
        }else{
            return null;
        }

    }

    /**
     * Checks if incoming string is json data
     *
     * @param [string] $str
     * @return boolean
     */
    public function isJson($str) {
        $json = json_decode($str);
        return $json && $str != $json;
    }


}