<?php
add_theme_support('post-thumbnails');

/**
 * Cardo font is loaded via @import at the top of style.css.
 * Nothing else needs enqueuing for the homepage CSS.
 */
function kispa_styles() {
  wp_enqueue_style('kispa-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'kispa_styles');

/**
 * Register a "member_school" custom post type so the homepage
 * can list schools without relying on tags or categories.
 */
function kispa_register_member_school() {
  register_post_type('member_school', array(
    'labels' => array(
      'name'          => 'Member Schools',
      'singular_name' => 'Member School',
      'add_new_item'  => 'Add New Member School',
      'edit_item'     => 'Edit Member School',
    ),
    'public'       => true,
    'has_archive'  => false,
    'menu_icon'    => 'dashicons-welcome-learn-more',
    'supports'     => array('title', 'editor', 'thumbnail', 'page-attributes'),
    'show_in_rest' => true,
  ));
}
add_action('init', 'kispa_register_member_school');

/**
 * Helper: pull the 10 most recent member schools for the homepage grid.
 */
function kispa_get_member_schools($limit = 10) {
  return get_posts(array(
    'post_type'      => 'member_school',
    'posts_per_page' => intval($limit),
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
  ));
}

/**
 * "publication" custom field for member schools (shown under the school name).
 */
function kispa_member_school_meta() {
  register_post_meta('member_school', 'publication', array(
    'show_in_rest'  => true,
    'single'        => true,
    'type'          => 'string',
    'auth_callback' => function () { return current_user_can('edit_posts'); },
    'sanitize_callback' => 'sanitize_text_field',
  ));
}
add_action('init', 'kispa_member_school_meta');
