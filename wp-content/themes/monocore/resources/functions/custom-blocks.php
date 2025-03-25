<?php
/**
 *
 * @file
 * Register custom block types.
 *
 * @package WordPress
 */

function register_child_custom_block_types() {
  if ( function_exists( 'acf_register_block_type' ) ) {
    /* Register an example block. */
    // acf_register_block_type(
    //   array(
    //     'name'            => 'example',
    //     'title'           => 'Example',
    //     'description'     => 'A custom example block.',
    //     'category'        => 'custom',
    //     'icon'            => 'insert',
    //     'keywords'        => array( 'example' ),
    //     'render_template' => '/resources/views/blocks/example.php',
    //     'mode'            => 'edit',
    //     'supports'        => array(
    //       'mode' => false,
    //       'anchor' => true,
    //     ),
    //   )
    // );
  }
}
add_action( 'init', 'register_child_custom_block_types' );