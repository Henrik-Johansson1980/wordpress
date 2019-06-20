<?php
require_once('widgets/class-wp-widget-categories.php');
function theme_setup() {
  //Support featured images
  add_theme_support('post-thumbnails');

  set_post_thumbnail_size(900, 600, true);

  //Post format support
  add_theme_support('post-formats', array('gallery'));
}

add_action( 'after_setup_theme', 'theme_setup' );

//Widget locations
function init_widgets(){
  register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar'
  ));
}
add_action( 'widgets_init', 'init_widgets' );

//Register widget

function custom_register_widget() {
  register_widget('WP_Widget_Categories_Custom');
}

add_action('widgets_init', 'custom_register_widget');


?>