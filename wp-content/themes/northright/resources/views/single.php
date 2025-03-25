<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$post = Timber::get_post();
$context['post'] = $post;
$context['prev_post'] = get_previous_post();
$context['next_post'] = get_next_post();

Timber::render( array( '05-pages/single-' . $post->ID . '.twig', '05-pages/single-' . $post->post_type . '.twig', '05-pages/single.twig' ), $context );
