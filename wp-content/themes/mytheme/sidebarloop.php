<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-success sidebar collapse">


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
                <button type="button" class="btn btn-secondary my-1 p-1">
                    <a href="<?php echo $tag_link; ?>" title="<?php echo $tag->name; ?>"
                       class="m-0  <?php echo $tag->slug ?>"
                       style="text-decoration: none"><?php echo $tag->name ?>
                    </a>
                </button>
            </div>
		<?php
		endforeach;
		?>
    </div>

</nav>