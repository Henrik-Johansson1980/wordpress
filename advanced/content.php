<?php if (is_search() || is_archive()) : ?>
    <div class="archive-post">
        <h4>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h4>
        <p>Posted On: <?php the_time('F j, Y g:i a'); ?> </p>
    </div>
<?php else : ?>
    <article class="post">
        <!--echo title-->
        <h2><?php the_title(); ?></h2>
        <!--Print article meta-->
        <p class="meta">Posted on:
            <!--Echo time-->
            <?php the_time('F j, Y g:i a'); ?>
            <!--Show author and link to autors posts page -->
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php echo get_the_author(); ?>
            </a> | Posted In
            <?php
            // Get te category
            $categories = get_the_category();
            //Separate catecories by
            $separator = ", ";
            $output = '';
            //If there is categories
            if ($categories) {
                //Loop and add them to output, separated by the separator.
                foreach ($categories as $category) {
                    $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . ' </a>'
                        . $separator;
                }
            }
            //Echo the output, remove last separator.
            echo trim($output, $separator);
            ?>
        </p>
        <!--Featured image?-->
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        <!--Get the content-->
        <?php if (is_single()) : ?>
            <?php the_content(); ?>
        <?php else : ?>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
        <?php endif; ?>
    </article>
<?php endif; ?>