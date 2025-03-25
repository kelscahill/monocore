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
  $context['statistics']['anchor'] = $block['anchor'];
}

$context['statistics']['heading'] = get_field( 'statistics_heading' );
$context['statistics']['content_editor'] = get_field( 'statistics_content_editor' );
$context['statistics']['button'] = get_field( 'statistics_button' );
$context['statistics']['layout'] = get_field( 'statistics_layout_style' );
$context['statistics']['items'] = get_field( 'statistics_items' );
$context['statistics']['background'] = get_field( 'statistics_background' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/statistics/statistics.twig',
  '/resources/views/patterns/03-organisms/sections/statistics/statistics.twig',
);
Timber::render( $templates, $context );


