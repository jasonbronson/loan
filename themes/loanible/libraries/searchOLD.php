<?php
// Search SQL filter for matching against post title only.
function __custom_search()
{
	global $wpdb;
	$ajaxRequest = false;
	$search = get_search_query();
	if(empty($search)){
		$search = isset($_REQUEST['s'])?$_REQUEST['s']:null;
	}
	if ( empty( $search ) )
		return new WP_Query();

	$offset = isset($_REQUEST['offset'])?$_REQUEST['offset']:0;
	$postsperpage = isset($_REQUEST['postsperpage'])?$_REQUEST['postsperpage']:10;
	$uri = $_SERVER['REQUEST_URI'];
	$uriData = parse_url($uri);
	if( strpos($uriData['path'], "ajax") !== false){
		$ajaxRequest = true;
	}

	if( !$match || strpos($search, "*") !== false){
		$args = array('s' => $search, 'posts_per_page' => $postsperpage, 'offset' => $offset);
	}else{
		$args = array('s' => $search, 'inclusive' => 1, 'posts_per_page' => $postsperpage, 'offset' => $offset);
	}

	$results =	new WP_Query( $args );
	foreach($results->posts as $post){
		$temp['title'] = $post->post_title;
		$author = get_userdata($post->post_author);
		$temp['author_display_name'] = $author->data->display_name;
		$temp['author_user_login'] = $author->data->user_login;
		$temp['thumbnail'] = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
		$temp['alt'] = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
		$temp['url'] = $post->post_name;
		$posts[] = $temp;
	}

	// // test to see if there are more results...
	// $args['offset'] = 10;
	// $args['posts_per_page'] = 1;
	// $test_for_more = new WP_Query( $args );
	// if (!$test_for_more->posts) {
	// 	// no results after first set.
	// 	echo '[///-there-are-no-more-results-///]';
	// }else{
	// 	echo '[///-there-are-more-results-///]';
	// }

	if($ajaxRequest){
		$temp = array();
		$temp['totalitems'] = $results->found_posts;
		$temp['posts'] = $posts;
		$response = json_encode($temp);
		wp_die($response);
	}
	return $results;
}

//Forces the search engine to only search by whole words unless * is used
function __custom_search_query($search, $wp_query){
	
	global $wpdb;
	$q = $wp_query->query_vars;
	$n = ! empty( $q['exact'] ) ? '' : '%';
	$search = '';
	$searchand = '';

	if(!isset($q['search_terms'])){
		return;
	}
	
	if(strpos($search, "*" ) !== false){
		foreach ( (array) $q['search_terms'] as $term ) {
			$term = esc_sql( like_escape( $term ) );
			$search .= " ({$searchand}($wpdb->posts.post_title like ' {$term}%')";
			$searchand = ' OR ';
			$search .= "{$searchand}($wpdb->posts.post_content REGEXP '% {$term}%') )";
		}
	}else{
		foreach ( (array) $q['search_terms'] as $term ) {
			$term = esc_sql( like_escape( $term ) );
			$search .= " ({$searchand}($wpdb->posts.post_title REGEXP '[[:<:]]{$term}[[:>:]]')";
			$searchand = ' OR ';
			$search .= "{$searchand}($wpdb->posts.post_content REGEXP '[[:<:]]{$term}[[:>:]]') )";
		}
	}
	
	if ( ! empty( $search ) ) {
		$search = " AND ({$search}) ";
	if ( ! is_user_logged_in() )
		$search .= " AND ($wpdb->posts.post_password = '') ";
	}
	return $search;	
}