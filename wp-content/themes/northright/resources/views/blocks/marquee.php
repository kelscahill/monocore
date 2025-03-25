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
  $context['marquee']['anchor'] = $block['anchor'];
}
$context['marquee']['text'] = get_field( 'marquee_text' );
$context['marquee']['background'] = get_field( 'marquee_background' );
$context['marquee']['orientation'] = get_field( 'marquee_orientation' );
$context['marquee']['text_size'] = get_field( 'marquee_text_size' );
$context['marquee']['width'] = get_field( 'marquee_width' );


$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/marquee/marquee.twig',
  '/resources/views/patterns/03-organisms/sections/marquee/marquee.twig',
);
Timber::render( $templates, $context );
