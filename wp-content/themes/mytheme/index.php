<?php get_header(); ?>

<div style="background-color: #f3edde">
    <div class="container">
        <div class="row" style="margin-top: 38px">

	        <?php get_sidebar(); ?>
            <?php get_template_part( 'template-parts/list-posts' ); ?>

        </div>
    </div>

</div>
<?php get_footer(); ?>
