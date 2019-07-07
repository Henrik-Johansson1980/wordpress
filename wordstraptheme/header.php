<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
        <a class="navbar-brand" href="<?php bloginfo('url') ?>"><?php bloginfo('name'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
          <?php
          wp_nav_menu(array(
            'theme_location'  => 'primary',
            'depth'            => 2,
            'container'       => false,
            'menu_class'      => 'nav navbar-nav',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
          ));
          ?>
          <form method="get" role="search" action="<?php echo esc_url(home_url('/'));?>" class="form-inline my-2 my-lg-0">
          <label for="navbar-search" class="sr-only"><?php _e('Search', 'textdomain'); ?></label>
          <div class="form-group">
            <input type="text" class="form-control" name="s" id="navbar-search" placeholder="Search...">
            <button type="submit" class="btn btn-outline-primary ml-1"><?php _e('Search', 'textdomain'); ?></button>
          </div>
          </form>
        </div>
      </nav>
    </header>