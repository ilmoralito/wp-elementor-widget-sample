<?php

/**
 * Plugin Name: Posts tags list
 * Description: Some usefull description
 * Version: 0.0.1
 * Author: Mario Martinez
 * Author URI: mariorojermartinez@gmail.com
 * Text Domain: rc-tags-list
 */

namespace RC_TAGS_LIST;

use Elementor\Plugin;

if ( !defined( 'ABSPATH' ) ) exit;

add_action( 'elementor/elements/categories_registered', function ( $elements_manager ) {
  $elements_manager->add_category(
    'ribera-calderon',
    [
      'title' => __( 'Ribera del Calderon Tags list', 'rc-tags-list' ),
      'icon' => 'fa fa-list',
    ]
  );
});

add_action( 'elementor/widgets/widgets_registered', function () {
  require_once('widgets/Tags.php');

  $instance = new Tags();

  Plugin::instance()->widgets_manager->register_widget_type( $instance );
});
