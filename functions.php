<?php

// Theme foundation
include_once 'includes/config.php';
include_once 'includes/meta.php';

// Add other includes to this file as needed.
/**
 * Adds support for "category_slugs" and "tag_slugs" params
 * in REST API results for posts.
 *
 * Ported over from Today-Bootstrap
 *
 * @since 1.0.3
 */
function tu_add_tax_query_to_posts_endpoint( $args, $request ) {
	$params = $request->get_params();
	$tax_query = array();
	if ( isset( $params['category_slugs'] ) ) {
		$tax_query[] =
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $params['category_slugs']
			);
	}
	if ( isset( $params['tag_slugs'] ) ) {
		$tax_query[] =
			array(
				'taxonomy' => 'post_tag',
				'field'    => 'slug',
				'terms'    => $params['tag_slugs']
			);
	}
	if ( count( $tax_query ) > 0 ) {
		$args['tax_query'] = $tax_query;
	}
	return $args;
}
add_action( 'rest_post_query', 'tu_add_tax_query_to_posts_endpoint', 2, 10 );
