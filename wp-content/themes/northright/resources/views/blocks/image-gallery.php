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
  $context['image_gallery']['anchor'] = $block['anchor'];
}

$context['image_gallery']['heading'] = get_field( 'image_gallery_heading' );
$context['image_gallery']['content_editor'] = get_field( 'image_gallery_content_editor' );
$context['image_gallery']['gallery_type'] = get_field( 'image_gallery_gallery_type' );
$context['image_gallery']['gallery'] = get_field( 'image_gallery_gallery' );
$context['image_gallery']['content_reference'] = get_field( 'image_gallery_content_reference' );
$context['image_gallery']['grid_layout'] = get_field( 'image_gallery_grid_layout' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/image-gallery/image-gallery.twig',
  '/resources/views/patterns/03-organisms/sections/image-gallery/image-gallery.twig',
);
Timber::render( $templates, $context );


