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
  $context['split_media_content']['anchor'] = $block['anchor'];
}

$context['split_media_content']['kicker'] = get_field( 'split_media_content_kicker' );
$context['split_media_content']['heading'] = get_field( 'split_media_content_heading' );
$context['split_media_content']['content_editor'] = get_field( 'split_media_content_content_editor' );
$context['split_media_content']['button'] = get_field( 'split_media_content_button' );
$context['split_media_content']['media'] = get_field( 'split_media_content_media' );
$context['split_media_content']['cards'] = get_field( 'split_media_content_cards' );
$context['split_media_content']['layout_media'] = get_field( 'split_media_content_layout_media' );
$context['split_media_content']['layout'] = get_field( 'split_media_content_layout' );
$context['split_media_content']['background'] = get_field( 'split_media_content_background' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/split-media-content/split-media-content.twig',
  '/resources/views/patterns/03-organisms/sections/split-media-content/split-media-content.twig',
);
Timber::render( $templates, $context );


