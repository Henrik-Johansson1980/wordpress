<?php get_header(); ?>
<div class="container-fluid index">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <h3 class="card-header">Blog Posts</h3>
        <div class="card-body">
          <?php if (have_posts()) :  ?>
            <?php while (have_posts()) : the_post(); ?>
              <article class="post">
                <div class="row">
                  <?php if (has_post_thumbnail()) : ?>
                    <div class="col-md-3">
                      <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <h2><a href="<?php echo the_permalink(); ?>">
                          <?php echo the_title(); ?>
                        </a>
                      </h2>
                      <p class="meta">
                        Posted at: <?php the_time() ?> <?php the_date(); ?> By: <strong><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="text-dark"><?php the_author(); ?></a></strong>
                      </p>
                      <p><?php echo get_the_excerpt(); ?></p>
                      <br>
                      <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary">Read More &raquo;
                      </a>
                    </div>
                  <?php else : ?>
                    <div class="col-md-12">
                      <h2>
                        <a href="<?php echo the_permalink(''); ?>"><?php echo the_title(); ?></a>
                      </h2>
                      <p class="meta">
                        Posted at: <?php the_time() ?> <?php the_date(); ?> By: <strong><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="text-dark"><?php the_author(); ?></a></strong>
                      </p>
                      <p><?php echo get_the_excerpt(); ?></p>
                      <br>
                      <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary">Read More &raquo;</a>
                    </div>
                  </div>
                <?php endif; ?>
            </div>
            </article>
          <?php endwhile; ?>
        <?php else : ?>
          <?php wpautop('Sorry! No posts available'); ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-md-4">
      <?php if (is_active_sidebar('sidebar')) : ?>
        <?php dynamic_sidebar('sidebar'); ?>
      <?php endif; ?>
    </div>
  </div>
  <?php get_footer(); ?>
