<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset') ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title><?php bloginfo('name'); ?></title>
  <!--Link to stylesheet-->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <div class="container">
      <h1>
        <!--Output blogname and link to home page-->
        <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
        <small><?php bloginfo('description'); ?></small>
        <!--Print description-->
      </h1>
      <div class="h-right">
        <form method="get" action="<?php esc_url(home_url('/')); ?>">
          <input type="text" name="s" placeholder="Search..." />
          <button>Search</button>
        </form>
      </div>
    </div>
  </header>
  <nav>
    <div class="container">
      <?php
      //Get menu items
      $args = array(
        'theme_location' => 'primary'
      );
      ?>
      <!--Print menu-->
      <?php wp_nav_menu($args); ?>

    </div>
  </nav>