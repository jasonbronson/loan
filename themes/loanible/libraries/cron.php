<?php
/**
 * Cron Class
 *
 * This is for behind the scenes jobs that get execute 
 * from an ajax call to keep it hidden from bots.
 **/

namespace Libraries;
use Libraries\Loader;
// use Libraries\Options;

class Cron {

    public function __construct(){

        //$this->options = new Options();
        
        $loader = new Loader();
        $loader->add_action('wp_ajax_nopriv_cronsync', $this, 'runSync' );
        $loader->add_action('wp_ajax_cronsync', $this, 'runSync' );
        $loader->run();

    }

    /**
     * Runs the job for syncing posts between other website and this website
     * 
     * Example call
     * wp-admin/admin-ajax.php?action=cronsync&limit=50 
     * 
     * @return json
     */
    public function runSync(){
        
        $limit = get_field('synchronize_posts_to_sync');
        $url = get_field('synchronize_url', 'options');
        $updatePost = new \Sync\UpdatePost();
        $response = $updatePost->fetchAndUpdate("{$url}?limit=$limit", true);
        wp_send_json($response);

    }


}