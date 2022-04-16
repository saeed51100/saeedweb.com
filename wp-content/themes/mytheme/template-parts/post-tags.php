<hr/>
<?php
if ( has_tag() ) {
	$tags = get_the_tags();
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
}
?>
<hr/>