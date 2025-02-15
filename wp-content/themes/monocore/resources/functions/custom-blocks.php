<?php
/**
 *
 * @file
 * Register custom block types.
 *
 * @package WordPress
 */

function register_custom_block_types() {
  if ( function_exists( 'acf_register_block_type' ) ) {
    /* Register a marquee block. */
    acf_register_block_type(
      array(
        'name'            => 'marquee',
        'title'           => 'Marquee',
        'description'     => 'Use this block to create a scrolling text banner, ideal for announcements or highlighting key information.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'marquee' ),
        'render_template' => '/resources/views/blocks/marquee.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register a feature block. */
    acf_register_block_type(
      array(
        'name'            => 'feature',
        'title'           => 'Feature',
        'description'     => 'Showcase a key feature or product with this prominent block, typically used at the top of a page or in key sections.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'feature', 'hero', 'banner', 'section' ),
        'render_template' => '/resources/views/blocks/feature.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register a split media content block. */
    acf_register_block_type(
      array(
        'name'            => 'split_media_content',
        'title'           => 'Split Media Content',
        'description'     => 'Create a visually appealing layout with media on one side and content on the other, perfect for presenting information alongside related images or videos.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'split', 'media', 'content', 'section' ),
        'render_template' => '/resources/views/blocks/split-media-content.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register a table block. */
    acf_register_block_type(
      array(
        'name'            => 'table',
        'title'           => 'Table',
        'description'     => 'Display structured data in a tabular format, useful for comparing information or presenting data sets.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'table' ),
        'render_template' => '/resources/views/blocks/table.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register a value points block. */
    acf_register_block_type(
      array(
        'name'            => 'value_points',
        'title'           => 'Value Points',
        'description'     => 'Highlight key benefits or value propositions in a concise, easy-to-read format, ideal for summarizing product features or service advantages.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'value', 'points', 'section' ),
        'render_template' => '/resources/views/blocks/value-points.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register an accordion block. */
    acf_register_block_type(
      array(
        'name'            => 'accordion',
        'title'           => 'Accordion',
        'description'     => 'Organize content into collapsible sections, perfect for FAQs, product details, or any content that benefits from a compact, expandable format.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'accordion', 'expand', 'rows', 'section' ),
        'render_template' => '/resources/views/blocks/accordion.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register a grid block. */
    acf_register_block_type(
      array(
        'name'            => 'grid',
        'title'           => 'Grid',
        'description'     => 'Create a flexible grid layout for displaying multiple items such as product cards, team members, or portfolio pieces in an organized, visually appealing manner.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'grid', 'cards', 'section' ),
        'render_template' => '/resources/views/blocks/grid.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register a social proof block. */
    acf_register_block_type(
      array(
        'name'            => 'social_proof',
        'title'           => 'Social Proof',
        'description'     => 'Showcase testimonials, reviews, or client logos to build trust and credibility with your audience.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'social', 'proof', 'section' ),
        'render_template' => '/resources/views/blocks/social-proof.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register a cta block. */
    acf_register_block_type(
      array(
        'name'            => 'cta',
        'title'           => 'CTA',
        'description'     => 'Create a compelling call-to-action section to encourage user engagement, such as signing up for a newsletter or making a purchase.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'cta', 'banner', 'section' ),
        'render_template' => '/resources/views/blocks/cta.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register a team block. */
    acf_register_block_type(
      array(
        'name'            => 'team',
        'title'           => 'Team',
        'description'     => 'Introduce your team members with photos, bios, and roles, ideal for about pages or showcasing company leadership.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'team', 'members', 'section' ),
        'render_template' => '/resources/views/blocks/team.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register a contact block. */
    acf_register_block_type(
      array(
        'name'            => 'contact',
        'title'           => 'Contact',
        'description'     => 'Add a contact form or display contact information to allow visitors to easily get in touch or find your location.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'contact', 'section' ),
        'render_template' => '/resources/views/blocks/contact.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register a statistics block. */
    acf_register_block_type(
      array(
        'name'            => 'statistics',
        'title'           => 'Statistics',
        'description'     => 'Present key metrics, achievements, or data points in a visually striking manner to highlight important information or results.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'statistics', 'section' ),
        'render_template' => '/resources/views/blocks/statistics.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
    /* Register a post grid block. */
    acf_register_block_type(
      array(
        'name'            => 'post_grid',
        'title'           => 'Post Grid',
        'description'     => 'Use this block to create a flexible grid layout for displaying posts in a visually appealing manner.',
        'category'        => 'custom',
        'icon'            => 'insert',
        'keywords'        => array( 'post', 'grid', 'section' ),
        'render_template' => '/resources/views/blocks/post-grid.php',
        'mode'            => 'edit',
        'supports'        => array(
          'mode' => false,
          'anchor' => true,
        ),
      )
    );
  }
}
add_action( 'init', 'register_custom_block_types' );