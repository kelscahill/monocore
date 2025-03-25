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
  $context['social_proof']['anchor'] = $block['anchor'];
}

$context['section_header'] = get_field( 'social_proof_section_header' );
$context['social_proof']['testimonials'] = get_field( 'social_proof_testimonials' );
$context['social_proof']['layout'] = get_field( 'social_proof_layout' );
$context['social_proof']['card_background'] = get_field( 'social_proof_card_background' );
$context['social_proof']['background'] = get_field( 'social_proof_background' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/social-proof/social-proof.twig',
  '/resources/views/patterns/03-organisms/sections/social-proof/social-proof.twig',
);
Timber::render( $templates, $context );


