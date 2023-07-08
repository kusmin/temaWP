<?php

function add_author_data($response, $post) {
	$author_id = $post->post_author;  // get the author id from the post object
	$author = get_userdata($author_id);  // get the author's user data

	// add author_name field to response
	$response->data['author_name'] = $author->display_name;

	return $response;
}

add_filter('rest_prepare_post', 'add_author_data', 10, 2);
