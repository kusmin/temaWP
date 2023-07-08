<?php

/**
 * Plugin Name: My LinkedIn AutoPost
 * Plugin URI: https://yourwebsite.com/
 * Description: This plugin posts updates to LinkedIn when a post is published.
 * Version: 1.0
 * Author: Renan Ribeiro Lage
 * Author URI: https://updev.dev.br/
 **/

function autopost_to_linkedin( $ID, $post ) {
	$linkedin_api_url = 'https://api.linkedin.com/v2/ugcPosts';
	$access_token = get_option('linkedin_autopost_access_token');
	$person_id = get_option('linkedin_autopost_person_id');
	$organization_id = get_option('linkedin_autopost_organization_id');

	$post_data = array(
		'author' => 'urn:li:organization:' . $organization_id,
		'lifecycleState' => 'PUBLISHED',
		'specificContent' => array(
			'com.linkedin.ugc.ShareContent' => array(
				'shareCommentary' => array(
					'text' => $post->post_title
				),
				'shareMediaCategory' => 'ARTICLE',
				'media' => array(
					array(
						'status' => 'READY',
						'description' => array(
							'text' => $post->post_excerpt,
						),
						'originalUrl' => get_permalink($post),
						'title' => array(
							'text' => $post->post_title,
						)
					)
				)
			)
		),
		'visibility' => array(
			'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC'
		)
	);


	$args = array(
		'headers' => array(
			'Authorization' => 'Bearer ' . $access_token,
			'Content-Type' => 'application/json',
			'X-Restli-Protocol-Version' => '2.0.0'
		),
		'body' => json_encode($post_data)
	);

	$response = wp_remote_post( $linkedin_api_url, $args );

	// Handle the response (omitted for brevity)
}

add_action( 'publish_post', 'autopost_to_linkedin', 10, 2 );

function autopost_to_linkedin_menu() {
	add_options_page(
		'My LinkedIn AutoPost Settings',
		'LinkedIn AutoPost',
		'manage_options',
		'linkedin-autopost',
		'autopost_to_linkedin_options'
	);
}

function autopost_to_linkedin_options() {
	if (!current_user_can('manage_options')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}

	// Save settings if form was submitted
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['start_oauth'])) {
		check_admin_referer('linkedin_autopost_options');

		// The user wants to start the OAuth flow
		$client_id = get_option('linkedin_autopost_client_id');
		$redirect_uri = home_url('/?linkedin-oauth');
		$state = wp_create_nonce('linkedin_oauth');
		$scope = 'r_liteprofile r_emailaddress w_member_social'; // Adjust this to your needs

		$auth_url = "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={$client_id}&redirect_uri={$redirect_uri}&state={$state}&scope={$scope}";
		wp_redirect($auth_url);
		exit;
	} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
		check_admin_referer('linkedin_autopost_options');
		update_option('linkedin_autopost_access_token', sanitize_text_field($_POST['access_token']));
		update_option('linkedin_autopost_person_id', sanitize_text_field($_POST['person_id']));
		update_option('linkedin_autopost_organization_id', sanitize_text_field($_POST['organization_id']));
		update_option('linkedin_autopost_client_id', sanitize_text_field($_POST['client_id']));
		update_option('linkedin_autopost_client_secret', sanitize_text_field($_POST['client_secret']));

		echo '<div id="message" class="updated fade"><p><strong>Options saved.</strong></p></div>';
	}

	// Retrieve settings from the database
	$access_token = get_option('linkedin_autopost_access_token', '');
	$person_id = get_option('linkedin_autopost_person_id', '');
	$organization_id = get_option('linkedin_autopost_organization_id', '');
	$client_id = get_option('linkedin_autopost_client_id', '');
	$client_secret = get_option('linkedin_autopost_client_secret', '');

	echo '<div class="wrap">';
	echo '<h2>My LinkedIn AutoPost Settings</h2>';
	echo '<form method="post" action="">';
	wp_nonce_field('linkedin_autopost_options');
	echo '<table class="form-table">';
	echo '<tr><th scope="row">Access Token</th><td><input type="text" name="access_token" value="'.esc_attr($access_token).'" class="regular-text" /></td></tr>';
	echo '<tr><th scope="row">Person ID</th><td><input type="text" name="person_id" value="'.esc_attr($person_id).'" class="regular-text" /></td></tr>';
	echo '<tr><th scope="row">Organization ID</th><td><input type="text" name="organization_id" value="'.esc_attr($organization_id).'" class="regular-text" /></td></tr>';
	echo '<tr><th scope="row">Client ID</th><td><input type="text" name="client_id" value="'.esc_attr($client_id).'" class="regular-text" /></td></tr>';  // New field
	echo '<tr><th scope="row">Client Secret</th><td><input type="text" name="client_secret" value="'.esc_attr($client_secret).'" class="regular-text" /></td></tr>';  // New field
	echo '</table>';
	submit_button('Save Settings');
	echo '<input type="submit" name="start_oauth" id="start_oauth" class="button button-secondary" value="Start OAuth Flow">';
	echo '</form>';
	echo '</div>';
}

add_action('admin_menu', 'autopost_to_linkedin_menu');

function autopost_to_linkedin_init() {
	add_rewrite_endpoint('linkedin-oauth', EP_ROOT);
}
add_action('init', 'autopost_to_linkedin_init');

function autopost_to_linkedin_template_redirect() {
	global $wp_query;

	if (!isset($wp_query->query_vars['linkedin-oauth'])) {
		return;
	}

	// This is the OAuth redirect URI
	// Exchange the code for an access token and save it
	$code = $_GET['code'];

	// Your client_id and client_secret
	$client_id = get_option('linkedin_autopost_client_id');
	$client_secret = get_option('linkedin_autopost_client_secret');

	$token_url = 'https://www.linkedin.com/oauth/v2/accessToken';
	$body = [
		'grant_type' => 'authorization_code',
		'code' => $code,
		'client_id' => $client_id,
		'client_secret' => $client_secret,
		'redirect_uri' => home_url('/?linkedin-oauth')

	];

	$response = wp_remote_post($token_url, [
		'body' => $body,
		'headers' => [
			'Content-Type' => 'application/x-www-form-urlencoded'
		]
	]);

	if (is_wp_error($response)) {
		// Handle error
	}

	$response_body = json_decode(wp_remote_retrieve_body($response), true);
	if (!isset($response_body['access_token'])) {
		// Handle error
	}

	$access_token = $response_body['access_token'];
	update_option('linkedin_autopost_access_token', $access_token);

	echo 'Access token updated. You can now close this page.';
	exit;
}
add_action('template_redirect', 'autopost_to_linkedin_template_redirect');
