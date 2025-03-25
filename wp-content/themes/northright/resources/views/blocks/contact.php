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
  $context['contact']['anchor'] = $block['anchor'];
}

$context['section_header'] = get_field( 'contact_section_header' );
$context['contact']['address'] = get_field( 'contact_address' );
$context['contact']['phone'] = get_field( 'contact_phone' );
$context['contact']['email'] = get_field( 'contact_email' );
$context['contact']['content_editor'] = get_field( 'contact_content_editor' );
$context['contact']['media_type'] = get_field( 'contact_media_type' );
$context['contact']['image'] = get_field( 'contact_image' );
$context['contact']['image_mobile'] = get_field( 'contact_image_mobile' );
$context['contact']['map'] = get_field( 'contact_map' );
$context['contact']['layout'] = get_field( 'contact_layout' );
$context['contact']['background'] = get_field( 'contact_background' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/contact/contact.twig',
  '/resources/views/patterns/03-organisms/sections/contact/contact.twig',
);
Timber::render( $templates, $context );


