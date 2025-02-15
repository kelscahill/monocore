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
$post = Timber::get_post($query->post);
$context['block'] = $post;
$templates = array(
  get_stylesheet_directory() . '/resources/views/patterns/02-molecules/blocks/block.twig',
  '/resources/views/patterns/02-molecules/blocks/block.twig',
);

Timber::render( $templates, $context );
