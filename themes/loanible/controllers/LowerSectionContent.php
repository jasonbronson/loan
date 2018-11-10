<?php
/**
 * Lower Section Content Controller
 *
 */
namespace Controllers;
use Libraries\Posts;

class LowerSectionContent extends Controller {
	
    public function __construct(){
		
	}

	public function get($id){
		
		$data = array();
		$count = 1;
		if( have_rows('sort_modules') ):

			while ( have_rows('sort_modules') ) : the_row();
				$temp = array();
				if( get_row_layout() == 'module_item_video' ):
		
					$temp['type'] = "video";
					$post = get_sub_field('postobject_video');
					$temp['video_url'] = get_field('video_url', $post->ID);
					$temp['title'] = $post->post_title; //get_field('video_title', $post->ID);
					$temp['description'] = get_field('video_description', $post->ID);
					$temp['short_description'] = get_field('video_short_description', $post->ID);
					$temp['date'] = get_field('video_date', $post->ID);
					$temp['video_shortlink'] = $this->getVideoShortLink($temp['video_url']);

				elseif( get_row_layout() == 'module_item_content' ): 
		
					$temp['type'] = "content";
					$post = get_sub_field('postobject_content');
					
					$temp['id'] = $post->ID;
					$temp['title'] = $post->post_title;
					$temp['description'] = $post->post_description;
					$temp['content'] = apply_filters( 'the_content', $post->post_content);
					$temp['url'] = $post->post_name;
					$image = get_field('news_featured_image', $post->ID);
					if(!empty($image)){
						$temp['thumbnail'] = $image['sizes']['thumbnail'];
						$temp['image_large'] = $image['sizes']['large'];
						$temp['image_medium'] = $image['sizes']['medium'];
						$temp['image_caption'] = $image['caption'];
						$temp['image_alt'] = $image['alt'];
					}
					$temp['date'] = $post->post_date;
					$temp['date_formatted'] = date(DATE_FORMAT, strtotime($post->post_date));
					$temp['link'] = get_the_permalink($post->ID);
					$temp['short_description'] = get_field('news_short_description', $post->ID);

					//$temp['featured_image'] = get_field('news_featured_image', $post->ID);
					if(get_sub_field('override_content', $id)){

						$image = get_sub_field('override_image');

						//Only override if an image is specified
						if(!empty($image)){
							$temp['thumbnail'] = $image['sizes']['thumbnail'];
							$temp['image_large'] = $image['sizes']['large'];
							$temp['image_medium'] = $image['sizes']['medium'];
							$temp['image_caption'] = $image['caption'];
							$temp['image_alt'] = $image['alt'];
						}

						//Only override if a title is specified
						$title = get_sub_field('override_title', $id);
						if( !empty($title) ){
							$temp['title'] = $title;
						}

						//Only override if a date is specified
						$date = get_sub_field('override_date', $id);
						if( !empty($date) ){
							$temp['date'] = $date;
							$temp['date_formatted'] = get_sub_field('override_date', $id); //no need to modify
						}

						//Only override if a description is specified
						$description = get_sub_field('override_description', $id);
						if( !empty($description) ){
							$temp['short_description'] = $description;
						}
						
						
					}

					

				endif;
				
				//limit short description
				if (strlen(strip_tags($temp['short_description'])) > 70){
					$text = mb_substr(strip_tags($temp['short_description']),0,70);
					$text_space_pos = mb_strrpos($text, ' ');
					$temp['short_description'] = mb_substr(strip_tags($temp['short_description']),0,$text_space_pos)."...";
				
				}
				
				$data[] = (object) $temp;
				$count++;
				if($count > 12){
					break;
				}
			endwhile;
			
		endif;
	   
		$data['heading_text'] = get_field('lowercontent_title', $id);
		$data['description'] = get_field('lowercontent_description', $id);
		$data['visible'] = get_field('show_lower_content_section', $id);
		
		$data = (object) $data;
        
		return $data;
	}
	

	
	
}
