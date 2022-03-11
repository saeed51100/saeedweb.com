<?php get_header(); ?>

    <div class="row container bg-info" style="margin-top: 58px">

        <?php get_template_part('sidebarloop'); ?>


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 <!--bg-light--> bg-warning">
            <div class="container">

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) :
                        the_post(); ?>

                        <div class="bg-light m-3 rounded shadow">
                            <section class="title-bar">
                                <div class="container">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                            </section>
                            <section class="main">
                                <div class="container">
                                    <article class="post">

                                        <div class="post-thumbnail">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail(); ?>
                                            <?php endif; ?>
                                        </div>

                                        <ul class="meta">
                                            <li>By
                                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                    <?php the_author(); ?>
                                                </a>
                                            </li>
                                            <li><?php the_time('F j, Y g:i a'); ?></li>
                                            <li>
                                                <?php
                                                $categories = get_the_category();
                                                $separator = ", ";
                                                $output = '';

                                                if ($categories) {
                                                    foreach ($categories as $category) {
                                                        $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
                                                        //$output .= $category->cat_name . $separator;

                                                    }
                                                }
                                                echo trim($output, $separator);
                                                ?>
                                            </li>
                                        </ul>
                                        <br>

                                        <?php the_content(); ?>


                                    </article>
                                    <div class="clr"></div>
                                </div>
                            </section>
                        </div>
                        <div class="bg-light m-3 rounded shadow">
                            <div class="comments">
                                <h2>Tags</h2>


                                <?php
                                if (has_tag()) {
                                    $tags = get_the_tags();
                                    foreach ($tags as $tag) :
                                        $tag_link = get_tag_link($tag->term_id);
                                        ?>
                                        <div style="display: inline;">
                                            <button type="button" class="btn btn-secondary my-1 p-1">
                                                <a href="<?php echo $tag_link; ?>" title="<?php echo $tag->name; ?>"
                                                   class="m-0  <?php echo $tag->slug ?>"
                                                   style="text-decoration: none"><?php echo $tag->name ?></a>
                                            </button>
                                        </div>
                                    <?php
                                    endforeach;
                                }
                                ?>


                                <br>
                                <br>


                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="bg-light m-3 rounded shadow">
                            <?php comments_template(); ?>
                        </div>


                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </main>

    </div>


<?php get_footer(); ?>