<?php
/**
 * The template for block
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @param   array $block The block settings and attributes
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$context = Timber::context();
if (!empty($block['anchor'])) {
  $context['latest_posts']['anchor'] = $block['anchor'];
}

if (get_field( 'latest_posts_post_type' )) {
  $post_type = get_field( 'latest_posts_post_type' );
} else {
  $post_type = 'post';
}

if (get_field( 'latest_posts_layout' ) == 'grid' && get_field( 'latest_posts_sidebar' )) {
  $posts_per_page = 5;
} else {
  $posts_per_page = 6;
}

$context['latest_posts']['posts'] = Timber::get_posts([
  'post_type' => $post_type,
  'posts_per_page' => $posts_per_page
]);
$context['section_header'] = get_field( 'latest_posts_section_header' );
$context['latest_posts']['background'] = get_field( 'latest_posts_background' );
$context['latest_posts']['layout'] = get_field( 'latest_posts_layout' );
$context['latest_posts']['sidebar'] = get_field( 'latest_posts_sidebar' );
$context['latest_posts']['button'] = get_field( 'latest_posts_button' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/feeds/latest-posts.twig',
  '/resources/views/patterns/03-organisms/sections/feeds/latest-posts.twig',
);
Timber::render( $templates, $context );


