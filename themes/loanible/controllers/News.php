<?php
/**
 * News Controller
 *
 */
namespace Controllers;
use Libraries\Posts;
use Libraries\Options;

class News extends Posts {
	
    protected $options;
	
    public function __construct(){
		$this->options = new Options();
		
	}

	public function getAll($postsPerPage = null, $paged = null, $offset = null){
		$this->args = array(
			'post_type' => 'post',
			'post_status' => 'publish'
		);
		return parent::getAll($postsPerPage, $paged, $offset);
	}

	protected function getDataObject($post){
		
		$authorData = $this->getAuthorById($post->ID, $post->post_author);
		
		$data = array(
			'id' => $post->ID,
			'title' => $post->post_title,
			'content' => apply_filters( 'the_content', $post->post_content),
			'url' => $post->post_name,
			'permalink' => get_the_permalink($post->ID),
			'image' => get_field('news_featured_image', $post->ID),
			'image_alt' => get_field('featured_image_alt_tagText', $post->ID),
			'date' => $post->post_date,
			'date_formatted' => date(DATE_FORMAT, strtotime($post->post_date)),
			'short_description' => get_field('news_short_description', $post->ID),
			'author_display_name' => $authorData['display_name'],
			'author_user_login' => $authorData['login'],
            
        );
        
		return (object) $data;
	}

	public function get($id){
		
		$post = get_post($id);
		$data = $this->getDataObject($post);
        
		return $data;
	}


	
}
