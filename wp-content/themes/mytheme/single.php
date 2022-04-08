<?php get_header(); ?>

    <div style="background-color: #F3EDDE">
        <div class="container">
            <div class="row" style="margin-top: 38px">

				<?php get_template_part( 'template-parts/sidebarloop' ); ?>
                <main class="col-md-9 col-lg-9">
                    <div class="container">

						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) :
								the_post(); ?>

                                <div class="bg-light p-3 my-3 rounded shadow">
                                    <section class="title-bar rounded-top">
                                        <div class="container">
                                            <h1><?php the_title(); ?></h1>
                                        </div>
                                    </section>
                                    <section class="main">
                                        <div class="container">
                                            <article class="post">

                                                <div class="post-thumbnail">
													<?php if ( has_post_thumbnail() ): ?>
														<?php the_post_thumbnail(); ?>
													<?php endif; ?>
                                                </div>

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
                                                <br>

												<?php the_content(); ?>


                                            </article>
                                            <div class="clr"></div>
                                        </div>
                                    </section>

	                                <?php get_template_part( 'template-parts/post-tags' ); ?>

									<?php

									// If comments are open or there is at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) {
										comments_template();
									}
									?>


                                </div>


							<?php endwhile; ?>
						<?php endif; ?>

                    </div>
                </main>

            </div>
        </div>

    </div>

<?php get_footer(); ?>