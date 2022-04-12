<div class="scrollarea mx-2 bg-light rounded shadow">
    <div class="side-widget m-3">
        <h3>برچسب ها</h3>
        <hr style="height: 3px">
    </div>
    <div class="m-2">
		<?php
		$tags = get_tags();
		foreach ( $tags as $tag ) :
			$tag_link = get_tag_link( $tag->term_id );
			?>
            <div class="d-inline p-1">
                <a href="<?php echo $tag_link; ?>">
					<?php echo $tag->name ?>
                </a>
            </div>
		<?php
		endforeach;
		?>
    </div>
</div>
