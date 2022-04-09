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