<?php get_header(); ?>
<div class="container content">
  <main class="block">
    <!--Check for posts -->
    <?php if (have_posts()) : ?>
      <!--The loop -->
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
      <?php endwhile; ?>
    <?php else : ?>
      <!--If there are no posts-->
      <?php echo wpautop('Sorry, no posts available...'); ?>
    <?php endif; ?>
  </main>
  <aside class="sidebar">
    <?php if (is_active_sidebar('sidebar')) : ?>
      <?php dynamic_sidebar('sidebar'); ?>
    <?php endif; ?>
  </aside>
</div>
<?php get_footer(); ?>