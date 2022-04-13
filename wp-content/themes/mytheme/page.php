<?php get_header(); ?>

    <div id="page" class="container">
        <div class="row" style="margin-top: 58px">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
                <div class="container">
                    <?php if (have_posts()) : ?>
                    <?php while (have_posts()) :
                    the_post(); ?>
                    <section class="row title-bar">
                        <div class="container">
                            <div class="col-md-12" style="padding-top: 15px">
                                <h1><?php the_title(); ?></h1>
                            </div>
                        </div>
                    </section>

                    <section class="row main">
                        <div class="container">
                            <div class="col-md-12">

                                <article class="page">
                                    <div class="post-thumbnail">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <br>
                                    <?php the_content(); ?>
                                </article>
                                <div class="clr"></div>
                                <?php endwhile; ?>
                                <?php endif; ?>

                    </section>


                </div>
            </main>
        </div>
    </div>


<?php get_footer(); ?>