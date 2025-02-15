<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */
$context = Timber::context();
// Custom query for posts, excluding private pages
$search_args = [
  'post_type'   => 'any', // Adjust if you want to limit to specific post types
  'post_status' => 'publish', // Exclude private posts
  's'           => get_search_query(),
];
$context['posts'] = Timber::get_posts($search_args);
$context['search_query'] = get_search_query();
$context['search_found_posts'] = count($context['posts']);
Timber::render(array('05-pages/search.twig'), $context);
