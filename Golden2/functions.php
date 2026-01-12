<?php
add_theme_support('post-thumbnails');
function golden_dragon_styles() {
  wp_enqueue_style('golden-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'golden_dragon_styles');
?>
