<?php
/**
 * Template Name: Documentation template
 */

$context = Timber::context();
$post = Timber::get_post();
$context['post'] = $post;

$blocks = parse_blocks($post->post_content);
$grouped_blocks = [];
$block_titles = [];
$block_descriptions = [];

foreach ($blocks as $index => $block) {
  if (strpos($block['blockName'], 'acf/') === 0) {
    $type = $block['blockName'];
    if (!isset($grouped_blocks[$type])) {
      $grouped_blocks[$type] = [];
      // Fetch block properties
      $block_type = acf_get_block_type($type);
      $block_titles[$type] = $block_type['title'] ?? '';
      $block_descriptions[$type] = $block_type['description'] ?? '';
    }
    $grouped_blocks[$type][] = [
      'index' => $index,
      'block' => $block
    ];
  }
}

$context['blocks'] = $blocks;
$context['grouped_blocks'] = $grouped_blocks;
$context['block_title'] = $block_titles;
$context['block_description'] = $block_descriptions;
$context['current_block'] = isset($_GET['block']) ? sanitize_text_field($_GET['block']) : (!empty($grouped_blocks) ? array_key_first($grouped_blocks) : null);

Timber::render( array( '05-pages/template-documentation.twig' ), $context );