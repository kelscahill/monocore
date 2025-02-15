<?php
/**
 *
 * @file
 * Register custom theme functions.
 *
 * @package WordPress
 */

/**
 * ACF Save json files
 */
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path) {
  $path = get_stylesheet_directory() . '/acf-json';
  return $path;
}

/**
 * Use ACF options site wide
 */
add_filter('timber_context', 'mytheme_timber_context');
function mytheme_timber_context($context) {
  $context['options'] = get_fields('option');
  $context['password_protected'] = post_password_required();
  return $context;
}

/**
 * ACF Options Page
 */
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' => 'General Settings',
    'menu_title' => 'General Settings',
    'menu_slug'  => 'general_settings',
    'position'   => 20,
    'capability' => 'edit_posts',
    'icon_url'   => 'dashicons-admin-tools',
    'redirect'   => false
  ));
}

/**
 * Provides automatic updates for the WordPress theme and plugins (http://wp-updates.com/)
 */
if (!is_child_theme()) {
  require_once get_template_directory() . '/app/plugin-activation.php';
}

/**
 * Require plugins on theme install
 */
add_action('tgmpa_register', 'monocore_register_required_plugins');
function monocore_register_required_plugins() {
  $plugins = array(
    // ACF Pro
    array(
      'name'               => 'Advanced Custom Fields PRO',
      'slug'               => 'advanced-custom-fields-pro',
      //'source'             => 'https://connect.advancedcustomfields.com/index.php?a=download&p=pro&k=b3JkZXJfaWQ9NzY2MjZ8dHlwZT1wZXJzb25hbHxkYXRlPTIwMTYtMDMtMDUgMTk6MzY6MzU=&t=6.2.8',
      'required'           => true,
      'force_activation'   => true,
    ),
    // Font Awesome
    array(
      'name'              => 'Font Awesome',
      'slug'              => 'font-awesome',
      //'source'            => 'https://downloads.wordpress.org/plugin/font-awesome.4.4.0.zip',
      'required'          => true,
      'force_activation'  => true,
    ),
    // Search & Filter Pro
    array(
      'name'              => 'Search & Filter Pro',
      'slug'              => 'search-filter-pro',
      'required'          => false,
    ),
  );

  $config = array(
    'id'           => 'monocore',      // Unique ID for your theme
    'default_path' => '',                // Default path for pre-packaged plugins
    'menu'         => 'tgmpa-install-plugins', // Menu slug
    'has_notices'  => true,              // Show admin notices
    'dismissable'  => true,              // Allow users to dismiss the notice
    'dismiss_msg'  => '',                // If 'dismissable' is false, this message will be output at top of nag
    'is_automatic' => true,              // Automatically activate plugins after installation
    'message'      => '',                // Message to output right before the plugins table
  );
  tgmpa($plugins, $config);
}

// /*
//  * Only load the following themes
//  */
// // List of themes to show (use theme folder names)
// $allowed_themes = array(basename(get_stylesheet_directory()));
// // Show only specific themes on the theme page
// function filter_themes($themes) {
//   global $allowed_themes;
//   foreach ($themes as $theme_slug => $theme_data) {
//     if (!in_array($theme_slug, $allowed_themes)) {
//       unset($themes[$theme_slug]);
//     }
//   }
//   return $themes;
// }
// add_filter('wp_prepare_themes_for_js', 'filter_themes');

/**
 * Allow SVG's through WP media uploader
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['zip'] = 'application/zip';
  $mimes['gz'] = 'application/x-gzip';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');