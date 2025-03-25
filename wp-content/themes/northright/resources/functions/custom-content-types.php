<?php
/**
 *
 * @file
 * Register custom content types.
 *
 * @package WordPress
 */

function register_custom_post_types() {
  /**
   * Post Type: Examples.
   */

  // $labels = array(
  //   'name' => __( 'Examples' ),
  //   'singular_name' => __( 'Example' ),
  //   'menu_name' => __( 'Examples' ),
  //   'all_items' => __( 'All Examples' ),
  //   'add_new' => __( 'Add New Example' ),
  //   'add_new_item' => __( 'Add New Example Item' ),
  //   'edit_item' => __( 'Edit Example' ),
  //   'new_item' => __( 'New Example' ),
  //   'view_item' => __( 'View Example' ),
  //   'view_items' => __( 'View Example' ),
  //   'search_items' => __( 'Search Examples' ),
  //   'not_found' => __( 'No Examples Found' ),
  //   'not_found_in_trash' => __( 'No Examples Found in Trash' ),
  //   'parent_item_colon' => __( 'Parent Example' ),
  // );

  // $args = array(
  //   'label' => __( 'Examples' ),
  //   'labels' => $labels,
  //   'description' => '',
  //   'public' => true,
  //   'publicly_queryable' => true,
  //   'show_ui' => true,
  //   'show_in_rest' => true,
  //   'rest_base' => '',
  //   'has_archive' => true,
  //   'show_in_menu' => true,
  //   'exclude_from_search' => false,
  //   'capability_type' => 'example',
  //   'map_meta_cap' => true,
  //   'hierarchical' => false,
  //   'rewrite' => array( 'slug' => 'example', 'with_front' => true ),
  //   'query_var' => true,
  //   'menu_icon' => 'dashicons-palmtree',
  //   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
  //   'menu_position' => 4,
  //   'taxonomies' => array( 'category', 'post_tag' )
  // );

  // register_post_type( 'examples', $args );
}
add_action('init', 'register_custom_post_types');
