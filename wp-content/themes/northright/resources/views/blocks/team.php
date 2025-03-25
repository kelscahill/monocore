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
  $context['team']['anchor'] = $block['anchor'];
}

$context['section_header'] = get_field( 'team_section_header' );
$context['team']['members'] = get_field( 'team_members' );
$context['team']['layout'] = get_field( 'team_layout' );
$context['team']['background'] = get_field( 'team_background' );

$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/03-organisms/sections/team/team.twig',
  '/resources/views/patterns/03-organisms/sections/team/team.twig',
);
Timber::render( $templates, $context );


