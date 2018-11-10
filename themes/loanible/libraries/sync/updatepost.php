<?php

namespace sync;
use Sync\GetData;
use Sync\Search;

/**
 * Updates or inserts new posts from a json feed from another wordpress instance
 * @author jason bronson <jasonbronson@gmail.com>
 */
class UpdatePost {

    protected $getData;
     
    public function __construct(){
        $this->getData = new GetData();
        $this->search = new Search();
    }

    /**
     * Fetch json data from a wordpress json feed 
     * update or insert new posts 
     *
     * @param [string] $url
     * @param [boolean] $ignoreSSLVerify
     * @return json
     */
    public function fetchAndUpdate($url, $ignoreSSLVerify){
        
        try{
            $response = $this->getData->getPost($url, $ignoreSSLVerify);
            $log = array();
            $data = json_decode($response, true);
            foreach($data as $item){
                //build out the data for updating the post
                $item = (object) $item;
                $postData = array(
                    'ID' => null,
                    'post_author' => $item->author_id,
                    'post_date' => $item->date,
                    'post_content' => $item->content,
                    'post_excerpt' => 'SYNCED',
                    'post_title' => $item->title,
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'post_name' => $item->url,
                    'comment_status' => 'closed',
                    'ping_status' => 'closed',
                    'meta_input' => array('sync_posts_id'=>$item->id),
                    
                );

                //if found update it
                $searchItem = $this->search->searchByPostMeta($item);
                if(empty($searchItem)){
                    //insert item
                    $id = wp_insert_post($postData);
                    if(empty($id)){
                        $log[] = "Error Inserting Post {$searchItem->post_id}: {$wp_error}";
                    }else{
                        $log[] = "Inserted Post New Post {$item->url} ";
                    }
                    $postID = $id;

                }else{

                    try{
                        //replace the ID with existing one found
                        $postData['ID'] = $searchItem->post_id;
                        remove_action('pre_post_update', 'wp_save_post_revision');// stop revisions
                        //update existing item 
                        if(!wp_update_post($postData, true)){
                            $log[] = "Error Updating Post {$postData->post_id}: {$wp_error}";
                        }else{
                            $log[] = "Updated Post {$searchItem->post_id}";
                        }
                        $postID = $searchItem->post_id;
                        add_action('pre_post_update', 'wp_save_post_revision');//  enable revisions again
                    }catch(\Exception $e){

                        add_action('pre_post_update', 'wp_save_post_revision');//  enable revisions again
                    }
                   

                }

                //update/insert ACF fields
                update_field('blog_date', $item->date_site_format, $postID);
                update_field('blog_subtitle', $item->subtitle, $postID);
                update_field('blog_short_description', $item->short_description, $postID);
                update_field('blog_image', $item->image_medium, $postID);
                update_field('blog_author', $item->author_display_name, $postID);
                update_field('blog_image_full', $item->image_fullsize, $postID);
                //update_field('blog_author_url', $item->blog_author_url, $postID);
                
                //add tags to POST
                $addTags = null;
                foreach($item->tags as $tag){
                    $addTags .= $tag['name'].",";
                }
                wp_set_post_tags( $postID, $addTags, false );

                

            }
            return $log;
        }catch(Exception $e){
            die("Error Thrown $e");
        }
        

    }



}