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
  $context['accordion']['anchor'] = $block['anchor'];
}

$context['section_header'] = get_field( 'accordion_section_header' );
$context['accordion']['items'] = get_field( 'accordion_items' );
$context['accordion']['style'] = get_field( 'accordion_style' );
$context['accordion']['background'] = get_field( 'accordion_background' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/accordion/accordion.twig',
 '/resources/views/patterns/03-organisms/sections/accordion/accordion.twig',
);
Timber::render( $templates, $context );


