<?php get_header(); ?>
<div class="container">
    <main>
        <!--The Loop-->
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post">
                    <h3>
                        <!--Get title and make it a link to the single post-->
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="meta">
                        Created by 
                        <!--Print author and Create a link to the authors posts page-->
                        <a href=" <?php get_author_posts_url( get_the_author_meta('ID'));?>">
                            <?php the_author(); ?>
                        </a>
                        <!--Print date the post was published-->
                        on <?php the_date(); ?>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                    <!--Show an excerpt of the content-->
                    <?php the_excerpt(); ?>
                    <br>
                    <a class="btn" href="<?php the_permalink(); ?>">
                        Read More...
                    </a>
                </article>
            <?php endwhile; ?>
        <?php else :  ?>
            <!--If there are no posts print this message-->
            <?php echo wpautop('Sorry, No Posts were found... =( '); ?>
        <?php endif; ?>
    </main>
    <!--Sidebar widget-->
    <aside class="sidebar">
        <?php if (is_active_sidebar('sidebar')) : ?>
            <?php dynamic_sidebar('sidebar'); ?>
        <?php endif; ?>
    </aside>
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>