<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */
$context = Timber::context();
$context['posts'] = Timber::get_posts();
$queried_object = get_queried_object();

if ($queried_object instanceof WP_User) {
  // If it's a user page
  $context['user'] = $queried_object;
  $context['post']['kicker'] = 'Author';
  $context['post']['title'] = ucwords(strtolower($queried_object->display_name));
  $context['post']['dek'] = get_user_meta($queried_object->ID, 'description', true);
} else if ($queried_object instanceof WP_Term) {
  // If it's a term page
  $context['term'] = $queried_object;
  $context['post']['taxonomy'] = $queried_object->taxonomy;
  $context['post']['kicker'] = ucwords(strtolower($queried_object->taxonomy));
  $context['post']['title'] = ucwords(strtolower($queried_object->name));
  $context['post']['dek'] = $queried_object->description;
} else {
  $context['post']['title'] = ucwords(strtolower($queried_object->name));
  $context['post']['dek'] = $queried_object->description;
}
Timber::render( array( '05-pages/index.twig' ), $context );