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
  $context['table']['anchor'] = $block['anchor'];
}

$context['section_header'] = get_field( 'table_section_header' );
$context['table']['content'] = get_field( 'table' );
$context['table']['background'] = get_field( 'table_background' );
$context['table']['row_striping'] = get_field( 'table_row_striping' );
$context['table']['column_striping'] = get_field( 'table_column_striping' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/table/table.twig',
 '/resources/views/patterns/03-organisms/sections/table/table.twig',
);
Timber::render( $templates, $context );


