<?php

/**
 *
 * @file
 * Register custom theme functions.
 *
 * @package WordPress
 */

/*
 * Sync fields from parent
 */
function parent_theme_field_groups($paths) {
  $path = get_template_directory().'/acf-json';
  $paths[] = $path;
  return $paths;
}
add_filter('acf/settings/load_json', 'parent_theme_field_groups');

add_filter('http_request_args', function ($args, $url) {
  $args['sslverify'] = false;
  return $args;
}, 10, 2);
