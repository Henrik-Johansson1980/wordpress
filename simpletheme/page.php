<?php get_header(); ?>
<div class="container">
    <main>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post">
                    <h3>
                        <?php the_title(); ?>
                    </h3>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                    <!--Show full content-->
                    <?php the_content(); ?>
                </article>
            <?php endwhile; ?>
        <?php else :  ?>
            <?php echo wpautop('Sorry, No Posts were found... =( '); ?>
        <?php endif; ?>
    </main>
    <aside class="sidebar">
        <?php if (is_active_sidebar('sidebar')) : ?>
            <?php dynamic_sidebar('sidebar'); ?>
        <?php endif; ?>
    </aside>
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>