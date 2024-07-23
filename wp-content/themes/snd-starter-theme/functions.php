<?php
define('SND_START_THEME_DIR', get_template_directory());
define('SND_START_THEME_URL', get_template_directory_uri());
define('SND_START_THEME_VERSION', '1.0.0');

add_action('wp_enqueue_scripts', 'snd_starter_enqueue_styles');
function snd_starter_enqueue_styles()
{
  wp_enqueue_style('theme-style', get_stylesheet_uri(), null, filemtime(SND_START_THEME_DIR . '/style.css'));
}

add_action('after_setup_theme', 'snd_starter_theme_setup');
function snd_starter_theme_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  register_nav_menus(
    array(
      'primary' => 'Верхняя область навигации',
      'mobile'  => 'Мобильная область навигации',
      'footer'  => 'Нижняя область навигации',
    )
  );

  add_theme_support(
    'custom-logo',
    array(
      'height'               => 300,
      'width'                => 100,
      'flex-width'           => true,
      'flex-height'          => true,
      'unlink-homepage-logo' => true,
    )
  );

  add_theme_support(
    'html5',
    array(
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
      'navigation-widgets',
      'search-form',
    )
  );

  add_theme_support('wp-block-styles');
  add_theme_support('align-wide');
  add_theme_support('editor-styles');

  add_editor_style();

  add_theme_support('responsive-embeds');
  add_theme_support('link-color');
  add_theme_support('custom-spacing');

  add_filter('rss_widget_feed_link', '__return_empty_string');
}

if ( class_exists('WooCommerce') ) {
  require_once('includes/woocommerce-functions.php');
}