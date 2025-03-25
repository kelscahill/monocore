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
  $context['cta']['anchor'] = $block['anchor'];
}

$context['section_header'] = get_field( 'cta_section_header' );
$context['cta']['content_editor'] = get_field( 'cta_content_editor' );
$context['cta']['button'] = get_field( 'cta_button' );
$context['cta']['layout'] = get_field( 'cta_layout' );
$context['cta']['background'] = get_field( 'cta_background' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/cta/cta.twig',
  '/resources/views/patterns/03-organisms/sections/cta/cta.twig',
);
Timber::render( $templates, $context );