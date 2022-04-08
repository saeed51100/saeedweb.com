<?php get_header(); ?>

    <div style="background-color: #F3EDDE">
        <div class="container">
            <div class="row" style="margin-top: 38px">

		        <?php get_template_part( 'sidebarloop' ); ?>
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
							        <?php
							        if ( has_tag() ) {
								        $tags = get_the_tags();
								        foreach ( $tags as $tag ) :
									        $tag_link = get_tag_link( $tag->term_id );
									        ?>
                                            <div style="display: inline;">
                                                <button type="button" class="btn my-1 p-1">
                                                    <a href="<?php echo $tag_link; ?>" title="<?php echo $tag->name; ?>"
                                                       class="m-0  <?php echo $tag->slug ?>"
                                                       style="text-decoration: none"><?php echo $tag->name ?></a>
                                                </button>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                                                    <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                                                    <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                                </svg>
                                            </div>
								        <?php
								        endforeach;
							        }
							        ?>
                                </div>


                                <!--
								Output comments wrapper if it's a post, or if comments are open,
								or if there's a comment number – and check for password.
								-->
						        <?php

						        if (
							        //	( is_singular() || is_page() ) &&
							        ( comments_open() || get_comments_number() )
							        && ! post_password_required()
						        ) {
							        ?>
                                    <div class="bg-light rounded shadow">
								        <?php comments_template(); ?>
                                    </div>

							        <?php
						        }
						        ?>


					        <?php endwhile; ?>
				        <?php endif; ?>

                    </div>
                </main>

            </div>
        </div>

    </div>

<?php get_footer(); ?>