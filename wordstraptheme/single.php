<?php get_header(); ?>
<div class="container-fluid index">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <h2 class="card-header"><?php echo the_title(); ?></h2>
        <div class="card-body">
          <?php if (have_posts()) :  ?>
            <?php while (have_posts()) : the_post(); ?>
              <article class="post">
                <div class="row">
                  <div class="col-md-12">
                  <?php if (has_post_thumbnail()) : ?>
                      <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                      </div>
                    <?php endif; ?>
                    <br />
                    <p class="meta">
                      Posted at: <?php the_time() ?> <?php the_date(); ?> By: <strong><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="text-dark"><?php the_author(); ?></a></strong>
                    </p>
                    <p><?php the_content(); ?></p>
                  </div>
                </div>
            </div>
            </article>
          <?php endwhile; ?>
        <?php else : ?>
          <?php wpautop('Sorry! No posts available'); ?>
        <?php endif; ?>
        <?php comments_template(); ?>
      </div>
    </div>
    <div class="col-md-4">
      <?php if (is_active_sidebar('sidebar')) : ?>
        <?php dynamic_sidebar('sidebar'); ?>
      <?php endif; ?>
    </div>
  </div>
  <?php get_footer(); ?>
