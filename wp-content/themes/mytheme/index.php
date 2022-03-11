<?php get_header(); ?>

    <div class="row container bg-info" style="margin-top: 58px">

		<?php get_template_part( 'sidebarloop' ); ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 <!--bg-light--> bg-warning">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
                    <!--
					saeed:  keep two side-by-side div elements
					with same height using d-flex.
					 http://jsfiddle.net/4dgaurav/hF72b/1/
					-->
                    <div class="bg-light m-3 rounded shadow p-3">
                        <article class="d-flex post">
                            <div class="container col-md-9">
                                <ul class="meta">
                                    <li>By
                                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
											<?php the_author(); ?>
                                        </a>
                                    </li>
                                    <li><?php the_time( 'F j, Y g:i a' ); ?></li>
                                    <li>
										<?php
										$categories = get_the_category();
										$separator  = ", ";
										$output     = '';

										if ( $categories ) {
											foreach ( $categories as $category ) {
												$output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $separator;
												//$output .= $category->cat_name . $separator;

											}
										}
										echo trim( $output, $separator );
										?>
                                    </li>
                                </ul>

                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>

								<?php the_excerpt(); ?>
                            </div>
                            <div class="container d-flex flex-column-reverse col-md-3">

                                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block">
									<?php echo __( 'Read More' ); ?>
                                </a>

                                <div class="post-thumbnail">
									<?php if ( has_post_thumbnail() ): ?>
										<?php the_post_thumbnail(); ?>
									<?php endif; ?>
                                </div>

                            </div>
                        </article>
                        <div class="clr"></div>
                    </div>
				<?php endwhile; ?>


                <!--
				https://fellowtuts.com/bootstrap/wordpress-pagination-bootstrap-4-style/
				-->
                <div class="container justify-content-center pull-left" style="direction: ltr">
					<?php
					if ( function_exists( "fellowtuts_wpbs_pagination" ) ) {
						fellowtuts_wpbs_pagination();
						//fellowtuts_wpbs_pagination($the_query->max_num_pages);
					}
					?>
                </div>


			<?php endif; ?>


        </main>

    </div>


<?php get_footer(); ?>