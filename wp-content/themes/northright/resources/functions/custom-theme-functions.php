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
add_filter('timber_context', 'northright_timber_context');
function northright_timber_context($context) {
  $context['options'] = get_fields('option');
  $context['password_protected'] = post_password_required();
  $context['sidebar'] = Timber::get_widgets('sidebar');

  $primary_menu = Timber::get_menu('Primary Navigation');
  $header_bottom_menu_items = [];

  if ($primary_menu) {
    $primary_items = $primary_menu->items;
    foreach ($primary_items as $item) {
      if ($item->header_bottom_nav_bar === true) {
        $header_bottom_menu_items[] = $item; // Move item to header bottom menu
      }
    }
  }

  // Create a new menu object for secondary navigation
  $header_bottom_menu = (object) [
    'items' => $header_bottom_menu_items
  ];

  $context['primary_nav'] = $primary_menu;
  $context['header_bottom_nav'] = $header_bottom_menu;
  $context['secondary_nav']  = Timber::get_menu('Secondary Navigation');
  $context['footer_nav']  = Timber::get_menu('Footer Navigation');

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
add_action('tgmpa_register', 'northright_register_required_plugins');
function northright_register_required_plugins() {
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
    'id'           => 'northright',      // Unique ID for your theme
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
add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['zip'] = 'application/zip';
  $mimes['gz'] = 'application/x-gzip';
  return $mimes;
}

/**
 * Register Sidebar
 */
add_action('widgets_init', 'northright_widgets_init');
function northright_widgets_init() {
  register_sidebar([
    'name'          => 'Sidebar',
    'id'            => 'sidebar',
    'description'   => 'Add widgets here to appear in your sidebar.',
    'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="c-widget__title">',
    'after_title'   => '</h3>',
  ]);
}

/**
 * Disable block widgets
 */
add_action('after_setup_theme', 'disable_block_widgets');
function disable_block_widgets() {
  remove_theme_support('widgets-block-editor');
}
