<main class="col-md-9 col-lg-9">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

            <div class="m-3 p-3 bg-light rounded shadow ">
                <article class="row post">
                    <div class="container col-md-9 py-2 px-4">

						<?php get_template_part( 'template-parts/meta' ); ?>
                        <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                        </a>
						<?php the_excerpt(); ?>

                    </div>

                    <div class="container col-md-3 d-md-block sidebar collapse p-2" style="position: relative;">

                        <div class="post-thumbnail shadow">
							<?php if ( has_post_thumbnail() ): ?>
								<?php the_post_thumbnail(); ?>
							<?php endif; ?>
                        </div>
                        <div style="position:absolute; left: 0; right: 0; bottom: 0; padding: inherit">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block shadow">
								<?php echo __( 'Read More' ); ?>
                            </a>
                        </div>


                    </div>
                </article>
                <div class="clr"></div>
            </div>
		<?php endwhile; ?>


        <!--
		https://fellowtuts.com/bootstrap/wordpress-pagination-bootstrap-4-style/
		-->
        <div id="pagination" class="container justify-content-center pull-left" style="direction: ltr">
			<?php
			if ( function_exists( "fellowtuts_wpbs_pagination" ) ) {
				fellowtuts_wpbs_pagination();
				//fellowtuts_wpbs_pagination($the_query->max_num_pages);
			}
			?>
        </div>


	<?php endif; ?>


</main>
