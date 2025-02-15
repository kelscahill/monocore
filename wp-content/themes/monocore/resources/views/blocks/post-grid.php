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
  $context['post_grid']['anchor'] = $block['anchor'];
}

if (get_field( 'post_grid_post_type' )) {
  $post_type = get_field( 'post_grid_post_type' );
} else {
  $post_type = 'post';
}

$context['post_grid']['posts'] = Timber::get_posts([
  'post_type' => $post_type
]);
$context['section_header'] = get_field( 'post_grid_section_header' );
$context['post_grid']['background'] = get_field( 'post_grid_background' );
$context['post_grid']['display'] = get_field( 'post_grid_display' );
$context['post_grid']['shortcodes'] = get_field( 'post_grid_shortcodes' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/feeds/post-grid.twig',
  '/resources/views/patterns/03-organisms/sections/feeds/post-grid.twig',
);
Timber::render( $templates, $context );


