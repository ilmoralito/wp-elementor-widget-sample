<?php

namespace RC_TAGS_LIST;

use Elementor\Widget_Base;

if (!defined('ABSPATH')) exit;

class Tags extends Widget_Base {
  public static $slug = 'rc-tags-list';
  public static $plugin_dir = '/wp-content/plugins/rc-tags-list/';

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_style('rc-tags-list-style', self::$plugin_dir . 'assets/css/rc-tags-list.css');
  }

  public function get_script_depends()
  {
    return [];
  }

  public function get_style_depends()
  {
    return ['rc-tags-list-style'];
  }

  public function get_name()
  {
    return self::$slug;
  }

  public function get_title()
  {
    return __('Tags list', self::$slug);
  }

  public function get_icon()
  {
    return 'fa fa-list';
  }

  public function get_categories()
  {
    return ['ribera-calderon'];
  }

  protected function render()
  {
    $tags = get_tags();
    $html = '<div class="post_tags">';
    $html .= "<ul class='tags'>";

    foreach ( $tags as $tag ) {
      $tag_link = get_tag_link( $tag->term_id );

      $html .= '<li>';
      $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>- {$tag->name}</a>";
      $html .= '</li>';
    }

    $html .= "</ul>";
    $html .= '</div>';

    echo $html;
  }
}