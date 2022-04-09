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
