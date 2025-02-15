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
  $context['grid']['anchor'] = $block['anchor'];
}

$context['section_header'] = get_field( 'grid_section_header' );
$context['grid']['posts_type'] = get_field( 'grid_posts_type' );
$context['grid']['posts_post_type'] = get_field( 'grid_posts_post_type' );
$context['grid']['posts_custom'] = get_field( 'grid_posts_custom' );
$context['grid']['posts_filter_shortcode'] = get_field( 'grid_posts_filter_shortcode' );
$context['grid']['posts_results_shortcode'] = get_field( 'grid_posts_results_shortcode' );
$context['grid']['posts_manual'] = get_field( 'grid_posts_manual' );
$context['grid']['layout'] = get_field( 'grid_layout' );
$context['grid']['background'] = get_field( 'grid_background' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/grid/grid.twig',
  '/resources/views/patterns/03-organisms/sections/grid/grid.twig',
);
Timber::render( $templates, $context );


