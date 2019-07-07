<?php
require_once('class-wp-bootstrap-navwalker.php');
require_once('widgets/class-wp-widget-recent-posts.php');
require_once('widgets/class-wp-widget-recent-comments.php');
require_once('widgets/class-wp-widget-categories.php');

function wordstrap_theme_assets() {
  wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '4.3.1', 'all');
  wp_enqueue_style( 'my-stylesheet', get_stylesheet_uri() );
  wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.js', array(), '4.3.1', true);
  wp_enqueue_script('jquery');
}

// Theme setup
function wordstrap_theme_setup()
{
  //Featured Image Support
  add_theme_support('post-thumbnails');

  //Register menu
  register_nav_menus(array(
    'primary' => __('Primary Menu')
  ));
}

// widget locations
function wordstrap_init_widgets($id) {
  register_sidebar( array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<div class="card">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="card-header"><h3>',
    'after_title' => '</h3></div><div class="card-body">'
  ));
}

//Register widgets
function wordstrap_register_widgets(){
  register_widget('WP_Widget_Recent_Posts_Custom');
  register_widget('WP_Widget_Recent_Comments_Custom');
  register_widget('WP_Widget_Categories_Custom');
}

//Add class list-group-item to categories li
function add_new_class_list_categories($list) {
  $list = str_replace('cat-item', ' cat-item  list-group-item', $list);
  return $list;
}

//Actions
add_action('after_setup_theme', 'wordstrap_theme_setup');
add_action('wp_enqueue_scripts', 'wordstrap_theme_assets');
add_action('widgets_init', 'wordstrap_init_widgets');
add_action('widgets_init', 'wordstrap_register_widgets');

//Filters
add_filter('wp_list_categories','add_new_class_list_categories');

function add_theme_comments($comment, $args, $depth) {
  if ( 'div' === $args['style'] ) {
      $tag       = 'div';
      $add_below = 'comment';
  } else {
      $tag       = 'li class="comment-item"';
      $add_below = 'div-comment';
  }?>
  <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
  if ( 'div' != $args['style'] ) { ?>
      <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
  } ?>
      <div class="comment-author vcard"><?php 
          if ( $args['avatar_size'] != 0 ) {
              echo get_avatar( $comment, $args['avatar_size'] ); 
          } 
          printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
      </div><?php 
      if ( $comment->comment_approved == '0' ) { ?>
          <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
      } ?>
      <div class="comment-meta commentmetadata">
          <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
              /* translators: 1: date, 2: time */
              printf( 
                  __('%1$s at %2$s'), 
                  get_comment_date(),  
                  get_comment_time() 
              ); ?>
          </a><?php 
          edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
      </div>

      <?php comment_text(); ?>

      <div class="reply"><?php 
              comment_reply_link( 
                  array_merge( 
                      $args, 
                      array( 
                          'add_below' => $add_below, 
                          'depth'     => $depth, 
                          'max_depth' => $args['max_depth'] 
                      ) 
                  ) 
              ); ?>
      </div><?php 
  if ( 'div' != $args['style'] ) : ?>
      </div><?php 
  endif;
}