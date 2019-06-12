<?php get_header(); ?>
<div class="container">
    <main>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post">
                    <h3><?php the_title(); ?></h3>
                    <div class="meta">
                        Created by
                        <a href=" <?php get_author_posts_url( get_the_author_meta('ID'));?>">
                            <?php the_author(); ?>
                        </a>
                        on <?php the_date(); ?>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                    <!--Show full post-->
                    <?php the_content(); ?>
                </article>
            <?php endwhile; ?>
        <?php else :  ?>
            <?php echo wpautop('Sorry, No Posts were found... =( '); ?>
        <?php endif; ?>
        <?php comments_template(); ?>
    </main>
    <aside class="sidebar">
        <?php if (is_active_sidebar('sidebar')) : ?>
            <?php dynamic_sidebar('sidebar'); ?>
        <?php endif; ?>
    </aside>
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>