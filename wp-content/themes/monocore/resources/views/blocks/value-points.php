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
  $context['value_points']['anchor'] = $block['anchor'];
}
$context['section_header'] = get_field( 'value_points_section_header' );
$context['value_points']['button'] = get_field( 'value_points_button' );
$context['value_points']['items'] = get_field( 'value_points_items' );
$context['value_points']['text_align'] = get_field( 'value_points_text_align' );
$context['value_points']['layout'] = get_field( 'value_points_layout' );
$context['value_points']['columns'] = get_field( 'value_points_columns' );
$context['value_points']['split_media_layout'] = get_field( 'value_points_split_media_layout' );
$context['value_points']['split_media_image'] = get_field( 'value_points_split_media_image' );
$context['value_points']['background'] = get_field( 'value_points_background' );
$context['value_points']['point_type'] = get_field( 'value_points_point_type' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/value-points/value-points.twig',
  '/resources/views/patterns/03-organisms/sections/value-points/value-points.twig',
);
Timber::render( $templates, $context );


