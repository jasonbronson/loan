<?php


namespace sync;

/**
 * Handles all the searching for existing sync'd data 
 * @author jason bronson <jasonbronson@gmail.com>
 */
class Search {


    /**
     * Not yet implemented
     *
     * @param [type] $title
     * @return void
     */
    public function searchByTitle($title){
        
    }
    
    /**
     * Searches for an existing synced article by post meta details
     * example meta_key = sync_posts_id
     * meta_value = 1234
     *
     * @param [object] $item
     * @return id
     */
    public function searchByPostMeta($item){
        
		global $wpdb;
        $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='sync_posts_id' AND meta_value='{$item->id}'", OBJECT);
        //var_dump($row); exit;
		return $row;

	}


}