<?php 
/*
    Template Name: About Layout
*/
?>

<?php get_header(); ?>
<div class="container content">
    <main class="block">
        <!--Check for posts -->
        <?php if (have_posts()) : ?>
            <!--The loop -->
            <?php while (have_posts()) : the_post(); ?>
                <article class="page">
                    <h2><?php the_title(); ?></h2>
                    <p class="phone">Call us: 555-555-5555</p>
                    <?php the_content(); ?>
                    
                </article>
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