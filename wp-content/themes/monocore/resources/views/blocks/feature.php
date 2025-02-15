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
  $context['feature']['anchor'] = $block['anchor'];
}

$context['feature']['kicker'] = get_field( 'feature_kicker' );
$context['feature']['title'] = get_field( 'feature_title' );
$context['feature']['description'] = get_field( 'feature_description' );
$context['feature']['button'] = get_field( 'feature_button' );
$context['feature']['media'] = get_field( 'feature_media' );
$context['feature']['carousel'] = get_field( 'feature_carousel' );
$context['feature']['carousel_autoplay'] = get_field( 'feature_carousel_autoplay' );
$context['feature']['background'] = get_field( 'feature_background' );
$context['feature']['layout'] = get_field( 'feature_layout' );
$context['feature']['text_position'] = get_field( 'feature_text_position' );
$context['feature']['cards'] = get_field( 'feature_cards' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/feature/feature.twig',
  '/resources/views/patterns/03-organisms/sections/feature/feature.twig',
);
Timber::render( $templates, $context );


