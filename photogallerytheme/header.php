<!DOCTYPE html>
<html>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title><?php bloginfo('name'); ?></title>
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="w3-container w3-light-blue w3-padding-24">
    <div class="w3-row">
      <div class="w3-col m9 l9">
        <h1><?php bloginfo('name'); ?></h1>
      </div>
      <div class="w3-col m3 l3"></div>
      <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
        <input name="s" type="text" placeholder="Search..." />
      </form>
    </div>
  </header>
  <main>
    <div class="w3-row">
      <aside class="w3-col m3 l3">
        <?php if (is_active_sidebar('sidebar')) : ?>
          <?php dynamic_sidebar('sidebar'); ?>
        <?php endif; ?>
      </aside>
      <div class="w3-col m9 l9">
        <div class="w3-row">