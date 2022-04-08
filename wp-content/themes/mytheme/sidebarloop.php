<nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block <!--bg-light--> sidebar collapse"
style="background-color: #f3edde">


    <!--
	saeed:
	https://stackoverflow.com/questions/39047664/how-to-display-all-posts-in-wordpress
	-->

    <ul class="btn-toggle-nav list-unstyled scrollarea mx-2 bg-light rounded shadow">
		<?php
		$current_id = get_the_ID();
		$args       = array(
			'post_type'      => 'post',
			'orderby'        => 'ID',
			'post_status'    => 'publish',
			'order'          => 'DESC',
			'posts_per_page' => - 1 // this will retrive all the post that is published
		);
		$result     = new WP_Query( $args );
		if ( $result->have_posts() ) :
			?>
			<?php while ( $result->have_posts() ) : $result->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"
                   class="link-dark rounded
    	<?php echo( $post->ID == $current_id && is_single() ? 'list-group-item' : '' ); ?>">
					<?php the_title(); ?>
                </a>
            </li>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
    </ul>


    <div class="comments mx-2 bg-light rounded shadow">
        <h2>Tags</h2>
		<?php
		$tags = get_tags();
		foreach ( $tags as $tag ) :
			$tag_link = get_tag_link( $tag->term_id );
			?>
            <div style="display: inline;">
                <button type="button" class="btn <!--btn-secondary--> my-1 p-1">
                    <a href="<?php echo $tag_link; ?>" title="<?php echo $tag->name; ?>"
                       class="m-0  <?php echo $tag->slug ?>"
                       style="text-decoration: none">
						<?php echo $tag->name ?>
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                        <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                        <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                    </svg>
                </button>
            </div>
		<?php
		endforeach;
		?>
    </div>

</nav>